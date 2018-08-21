<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_training');
	}

    public function apiAdd()
    {

        $this->log_begin();
        try {
            $training = $this->input->post('training');
            $training_dates = $this->input->post('training_dates');
            $training_id=$this->model_training->add('training',$training);
            $this->model_training->addDates($training_dates,$training_id);
            $this->log_middle($training);
            $this->log_end(array('status' => 'success'));
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


    public function apiAddTraineeToTraining()
    {

        $this->log_begin();
        try {
            $this->load->model('model_util');
            $data = $this->input->post('data');
            $this->model_training->addTraineeToTraining($data);
            $trainee=$this->model_training->getById('trainee',$data['trainee']);
            $e_params['send_to']=$trainee['email'];
            $e_params['title']='Bienvenu';
            $e_params['message']='Contenu de l email';
            //$this->model_util->sendEmail($e_params);
            $this->log_middle($data);
            $this->log_end(array('status' => 'success'));
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


    public function apiDeleteTraineeFromTraining()
    {

        $this->log_begin();
        try {
            $data = $this->input->post('data');
            $this->model_training->deleteTraineeFromTraining($data['training'],$data['trainee']);
            $this->log_end(array('status' => 'success'));
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

