<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
        $this->load->view('public/index');
	}

	public function seminaire()
	{
        $this->load->view('public/seminaire');
	}

	public function conseil()
	{
        $this->load->view('public/conseil');
	}

	public function formation()
	{
        $this->load->view('public/formation');
	}

	public function informatique()
	{
        $this->load->view('public/formation');
	}

	public function management()
	{
        $this->load->view('public/management');
	}

	public function contact()
	{
        $this->load->view('public/contact');
	}

	public function identificationCompte()
	{
        $this->load->view('public/identification-compte');
	}
	public function signup()
	{
        $this->load->view('public/signup');
	}


}