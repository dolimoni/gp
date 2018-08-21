<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_company');
	}

    public function apiAdd()
    {

        $this->log_begin();
        try {

            $this->log_begin();
            $company = $this->input->post('company');
            $contacts = $this->input->post('contacts');
            $id=$this->model_company->add('company',$company);
            if($contacts!==null){
                $this->model_company->addContacts($id,$contacts);
            }
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

            $this->log_begin();
            $id = $this->input->post('id');
            $company = $this->input->post('company');
            $contacts = $this->input->post('contacts');
            $id=$this->model_company->edit('company',$company,$id);
            if($contacts!==null){
                $this->model_company->editContacts($contacts);
            }
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

            $company_id = $this->input->post('company_id');
            $this->model_company->delete('company',$company_id);
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

