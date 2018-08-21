<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Former extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_former');
	}

    public function apiAdd()
    {

        $this->log_begin();
        try {

            $this->log_begin();
            $former = $this->input->post('former');
            $this->model_former->add('former',$former);
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
            $former = $this->input->post('former');
            $id = $this->input->post('id');
            $this->model_former->edit('former',$former,$id);
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

            $former_id = $this->input->post('former_id');
            $this->model_former->delete('former',$former_id);
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

