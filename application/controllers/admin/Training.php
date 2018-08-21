<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_company');
        $this->load->model('model_subject');
        $this->load->model('model_former');
        $this->load->model('model_training');
	}
	public function getAll()
	{
        $this->log_begin();
        $this->model_training->updateStatusForAll();
        $data['trainings'] = $this->model_training->getAll('training',true);
        $data['params'] = $this->getParams();
        $this->parser->parse('admin/training/list', $data);
    }

	public function add()
    {

        $this->log_begin();

        $data['params'] = $this->getParams();
        $params=array(
            'order_by'=>'created_by',
            'order_by_sort'=>'asc',
        );
        $data['companies']=$this->model_company->getAll('company',null,$params);
        $where=array(
            'deleted'=>'false'
        );
        $data['subjects']=$this->model_subject->getAll('subject',$where);
        $data['formers']=$this->model_former->getAll('former');
        $this->parser->parse('admin/training/add', $data);

        $this->log_end(array('status' => 'success'));

    }

    public function show($id){
        $this->log_begin();
        $data['params'] = $this->getParams();
        $this->model_training->updateStatus($id);
	    $data['training']=$this->model_training->getWithRelations($id);
	    $data['trainees']=$this->model_training->getTrainees($id);
	    $data['traineesInCompany']=$this->model_training->getUnsubscibedTrenees($id,$data['training']['company']);
	    $data['traineesInCompanyNames']=$this->model_training->getUnsubscibedTreneesNames($id,$data['training']['company']);
	    $data['emails']=$this->model_training->getEmails($id);
        $this->parser->parse('admin/training/show', $data);
        $this->log_end(array('status' => 'success'));
    }

    public function edit($id){
        $this->log_begin();
        $data['params'] = $this->getParams();
        $this->model_training->updateStatus($id);
	    $data['training']=$this->model_training->getWithRelations($id);
	    $data['training_dates']=$this->model_training->getTrainingDate($id);
        $data['companies']=$this->model_company->getAll('company');
        $where=array(
            'deleted'=>'false'
        );
        $data['subjects']=$this->model_subject->getAll('subject',$where);
        $data['formers']=$this->model_former->getAll('former');
        $this->parser->parse('admin/training/edit', $data);
        $this->log_end(array('status' => 'success'));
    }


    public function certificate($id){
        $this->log_begin();
        $data['params'] = $this->getParams();
        $user_id=$this->session->userdata('id');
        $user=$this->model_training->getById('trainee',$user_id);
        $data['trainee_name']=$user['first_name'].' '.$user['last_name'];
        $data['training']=$this->model_training->getWithRelations($id);
        $data['training_dates']=$this->model_training->getTrainingDate($id);
        $data['count_days']=count( $data['training_dates']);
        $data['count_hours']=$data['count_days']*7;
        $data['dates_session']=$this->datesString($data['training_dates']);
        $myLastElement = end($data['training_dates']);
        $data['certificat_date']='Le '.strftime("%d %B %Y", strtotime($myLastElement['date']));
        //$this->createPDF1($data);
       // $this->parser->parse('admin/training/pdf/examples/example_051',null);
        $this->parser->parse('admin/training/pdf/certificate',$data);
    }

    private function datesString($training_dates){
        reset($training_dates);
        $last = count($training_dates)-1;
        setlocale(LC_TIME, "fr_FR");

        $result='Session du ';
	    foreach ($training_dates as $key=> $training_date){

            if ($last === $key){
                $result.=' et '.strftime("%d %B %Y", strtotime($training_date['date']));
            }else{
                $result .= substr($training_date['date'], 0, 2).',';
            }
        }
        return $result;
    }


}

