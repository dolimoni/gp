<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trainee extends BaseController {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }

        $this->load->model('model_util');
        $this->load->model('model_trainee');
        $this->load->model('model_ACL');
	}

    public function show($id)
    {
        $this->log_begin();
        $data["user"]=$this->model_trainee->getById('trainee',$id);
        $data["user"]['mobile']='A faire';
        $data["user"]['address']='A faire';
        $data["trainings"] = $this->model_trainee->getAllTraining($id);
        $data['params'] = $this->getParams();
        $data['params']["config_params"] = $this->model_params->getConfigParams();
        $this->load->view('user/config/index',$data);
    }


	public function getAll()
	{
        $this->log_begin();
        $data["user"]=$this->model_util->getUser(6);
        $data["allUsers"] = $this->model_trainee->getAllWithRelations();
        $data['params'] = $this->getParams();
        $data['params']["config_params"] = $this->model_params->getConfigParams();
        $this->load->view('admin/trainee/index',$data);
	}

	public function createUser()
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $data['companies'] = $this->model_company->getAll('company',null,array('order_by'=>'created_by','order_by_sort'=>'asc'));
        $this->load->view('admin/trainee/createUser',$data);
	}



	public function editUser($id)
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $data["user"]=$this->model_trainee->getById('trainee',$id);
        $data["user"]['position']='Trainee';
        $data['companies'] = $this->model_company->getAll('company',null,array('order_by'=>'created_by','order_by_sort'=>'asc'));
        $this->load->view('admin/trainee/editUser',$data);
	}

    public function apiEditUser()
    {

        try {
            $id = $this->input->post("id");
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            $actions = $this->input->post("actions");
            if ($password != "") {
                $user["password"] = md5($password);
            }
            $this->model_util->editUser($id, $user, $actions);
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

    public function apiDeleteUser()
    {
        $this->log_begin();
        try {
            $trainee_id = $this->input->post('trainee_id');
            $this->model_trainee->delete('trainee',$trainee_id);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
        } catch (Exception $e) {

            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }

	public function delete()
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $this->load->view('admin/config/delete',$data);
	}

	public function apiDelete()
	{

        try {

            $this->log_begin();
            $tables=$this->input->post("deletes");
            $this->model_util->customClear($tables);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
            redirect('admin/config/delete', 'refresh');
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }

	}

	public function apiEditParameters(){
        try {

            $this->load->model("model_params");
            $this->log_begin();
            $parameters = $this->input->post("parameters");
            $response=$this->model_params->update($parameters);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode($response));
            $this->log_end(array('status' => 'success'));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }

}