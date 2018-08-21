<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainee extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_training');
        $this->load->model('model_trainee');
	}

    public function apiCreateUser()
    {
        try {
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            if($user['email']===''){
                $user['email']=null;
            }
            $user["password"] = md5($password);


            if($this->model_trainee->emailAlreadyExists($user['email'])){
                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode(array('status'=>'warning','message'=>'L\'adresse email est déjà utilisé')));
                return false;
            }


            $this->model_trainee->createTrainee($user);

            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
           // redirect('admin/trainee/getAll', 'refresh');
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }

    public function apiEditUser()
    {

        try {
            $id = $this->input->post("id");
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            if ($password != "") {
                $user["password"] = md5($password);
            }
            $this->model_trainee->editUser($id, $user);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
            //redirect('/admin/config/', 'refresh');
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }

}

