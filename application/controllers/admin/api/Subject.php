<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_subject');
	}

    public function apiAdd()
    {

        $this->log_begin();
        try {

            $this->log_end(array('status' => 'success'));
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $url=$this->input->post('url');
            $uploads = $this->input->post('uploads');
            $synthesis_description = $this->input->post('synthesis_description');

            if (isset($uploads['pdf'])) {
                $data['course']=$uploads['pdf'];
            }
            if (isset($uploads['img'])) {
                $data['image']=$uploads['img'];
            }
            if (isset($uploads['pdf_program'])) {
                $data['program']=$uploads['pdf_program'];
            }
            $subject_id=$this->model_subject->add('subject',$data);

            //ajouter une synthèse à la formation.

            $synthesis = array(
                'subject'=>$subject_id,
                'description'=>$synthesis_description,
                'url'=>$url,
            );

            if($url!==''){
                $synthesis['path']=$url;
            }
            else if (isset($uploads['video'])) {
                $synthesis['path']=$uploads['video'];
            }

            $this->model_subject->addSynthesis($synthesis);

            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }


    public function apiEdit()
    {

        $this->log_begin();
        try {

            $this->log_end(array('status' => 'success'));
            $data['title'] = $this->input->post('title');
            $subject_id = $this->input->post('id');
            $data['description'] = $this->input->post('description');
            $url=$this->input->post('url');
            $synthesis_description = $this->input->post('synthesis_description');
            $uploads = $this->input->post('uploads');

            if (isset($uploads['pdf'])) {
                $data['course']=$uploads['pdf'];
            }
            if (isset($uploads['img'])) {
                $data['image']=$uploads['img'];
            }
            if (isset($uploads['pdf_program'])) {
                $data['program']=$uploads['pdf_program'];
            }
            $this->model_subject->edit('subject',$data,$subject_id);

            //modifier une synthèse à la formation.

            $synthesis = array(
                'subject'=>$subject_id,
                'description'=>$synthesis_description,
                'url'=>$url,
            );

            $db_synthesis=$this->model_subject->getSynthesis($subject_id);

            if($url!==''){
                $synthesis['path']=$url;
            }
            else if(isset($uploads['video'])) {
                $synthesis['path']=$uploads['video'];
            }else if($db_synthesis['url']!=='' and $url===''){
                $synthesis['path']='';
            }

            $this->model_subject->addSynthesis($synthesis);

            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }

    public function apiDelete()
    {

        $this->log_begin();
        try {

            $subject_id = $this->input->post('subject_id');
            $this->model_subject->delete('subject',$subject_id);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }


}

