<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends BaseController {

	public function __construct()
	{
        parent::__construct();

        $this->load->model('model_util');
        $this->load->model('model_subject');
	}


	public function index()
	{
        $this->log_begin();
        $data=array(
            'deleted'=>'false'
        );
        $params=array(
            'order_by'=>'created_at',
            'order_by_sort'=>'desc',
        );
        $data['subjects']=$this->model_subject->getAll('subject',$data,$params);
        $data['params'] = $this->getParams();
        $this->load->view('admin/subject/index',$data);
	}

	public function create()
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $this->load->view('admin/subject/create',$data);
	}



	public function edit($id)
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $data["subject"]=$this->model_subject->getWithRelations($id);
        $this->load->view('admin/subject/edit',$data);
	}


	public function show($id)
	{
        $this->log_begin();
        $data['params'] = $this->getParams();
        $data["subject"]=$this->model_subject->getWithRelations($id);
        $this->load->view('admin/subject/show',$data);
	}


	public function test(){

        ini_set('memory_limit', '-1');
        //$this->load->library('uploadHandler');
        require_once(APPPATH.'libraries/UploadHandler.php');


        $data=array(
            'print_response'=>false,
            'param_name'=>'img',
        );
        $upload_handler1=new UploadHandler($data);


        $data=array(
            'print_response'=>false,
            'param_name'=>'pdf',
        );
        $upload_handler2=new UploadHandler($data);

        $data=array(
            'print_response'=>false,
            'param_name'=>'video',
        );
        $upload_handler3=new UploadHandler($data);

        $response1=$upload_handler1->get_response();
        $response2=$upload_handler2->get_response();
        $response3=$upload_handler3->get_response();


        ini_set('memory_limit', '256');

        $response=array(
            'files'=>$response1['img']+$response2['pdf']+$response3['video'],
            'type'=>'video'
        );

        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($response));

    }






}