<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends BaseController {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }

	}

	public function index(){
        $this->log_begin();
        $id=$this->session->userdata('id');
        $data['params'] = $this->getParams();
        $data['trainings']=$this->model_training->geTrainingsByTrainee($id);
        $data['coming_trainings']=$this->model_training->getComingTrainings($id);
        $data['finished_trainings']=$this->model_training->getFinishedTrainings($id);
        $data['undefinded_trainings']=$this->model_training->getUndefindedTrainingsDate($id);
        $this->load->view('user/welcome/index',$data);
    }

}