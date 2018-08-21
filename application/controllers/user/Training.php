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
        $id=$this->session->userdata('id');
        $this->model_training->updateStatusForAll();
        $data['trainings'] = $this->model_training->getAll('training',true);
        $data['coming_trainings']=$this->model_training->getComingTrainings($id);
        $data['finished_trainings']=$this->model_training->getFinishedTrainings($id);
        $data['current_trainings']=$this->model_training->getCurrentTrainings($id);
        $data['undefinded_trainings']=$this->model_training->getUndefindedTrainingsDate($id);
        $data['params'] = $this->getParams();
        $this->parser->parse('user/training/list', $data);
    }

	public function add()
    {

        $this->log_begin();

        $data['params'] = $this->getParams();
        $data['companies']=$this->model_company->getAll('company');
        $data['subjects']=$this->model_subject->getAll('subject');
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
	    $synthesis_list=$this->model_training->getByAttribut('synthesis','subject',$data['training']['subject']);
        $data['synthesis']=$synthesis_list[0];
        if($data['training']['local_synthesis']==='false'){
            $data['training']['synthesis_video']=$data['synthesis']['path'];
            $data['training']['synthesis_description']=$data['synthesis']['description'];
            $data['training']['path']=$data['synthesis']['path'];
        }
	    $data['traineesInCompany']=$this->model_training->getUnsubscibedTrenees($id,$data['training']['company']);
        $this->parser->parse('user/training/show', $data);
        $this->log_end(array('status' => 'success'));
    }


    public function allSynth(){
        $this->log_begin();
        $id=$this->session->userdata('id');
        $data['params'] = $this->getParams();
        $data['trainings']=$this->model_training->geTrainingsByTrainee($id);
        $this->parser->parse('user/training/synthesis', $data);
        $this->log_end(array('status' => 'success'));
    }

    public function synthesis($id){
        $this->log_begin();
        $data['params'] = $this->getParams();
        $this->model_training->updateStatus($id);
        $data['training']=$this->model_training->getWithRelations($id);
        $data['trainees']=$this->model_training->getTrainees($id);
        $synthesis_list=$this->model_training->getByAttribut('synthesis','subject',$data['training']['subject']);
        if(isset($synthesis_list[0])){
            $data['synthesis']=$synthesis_list[0];
        }
        if($data['training']['local_synthesis']==='false'){
            $data['training']['synthesis_video']=$data['synthesis']['path'];
            $data['training']['synthesis_description']=$data['synthesis']['description'];
        }
        if($data['training']['publish_synthesis']==='false' or $data['training']['synthesis_video']===''){
            redirect('user/welcome');
        }
        $data['traineesInCompany']=$this->model_training->getUnsubscibedTrenees($id,$data['training']['company']);
        $this->parser->parse('user/training/synthesis_one', $data);
        $this->log_end(array('status' => 'success'));
    }




}

