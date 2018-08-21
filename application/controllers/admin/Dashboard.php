<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BaseController {

	public function __construct()
	{
		parent::__construct();

        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }

	}

	public function logout()
	{
           $this->log_begin();
	       $this->session->sess_destroy();
           $this->log_end(null);
	       redirect('/');
	}
}
