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
            $user["password"] = md5($password);
                $this->model_trainee->createTrainee($user);

            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
            redirect('/admin/config/', 'refresh');
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
            $user['company']=0;
            if ($password != "") {
                $user["password"] = md5($password);
            }
            $this->load->model('model_company');
            if($user['company']!==''){
                $company=$this->model_company->addUserCompany($user['company']);
                $user['company']=$company;
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

    public function apiEditImage()
    {

        try {
            $response=$this->updateImage();
            $data['image']=$response['files'][0]->url;
            $id=$this->session->userdata('id');
            $this->model_training->edit('trainee',$data,$id);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')+$response));
            $this->log_end(array('status' => 'success'));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }


}

