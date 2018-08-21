<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 8/2/18
 * Time: 1:03 AM
 */

class Image extends CI_Controller
{
    public function upload(){

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

        $data=array(
            'print_response'=>false,
            'param_name'=>'cv',
        );
        $upload_handler4=new UploadHandler($data);

        $response1=$upload_handler1->get_response();
        $response2=$upload_handler2->get_response();
        $response3=$upload_handler3->get_response();
        $response4=$upload_handler4->get_response();


        $response=array(
            'files'=>$response1['img']+$response2['pdf']+$response3['video']+$response4['cv'],
            'type'=>'video'
        );

        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($response));

    }


    public function uploadSubjectFiles(){
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

        $data=array(
            'print_response'=>false,
            'param_name'=>'pdf_program',
        );
        $upload_handler4=new UploadHandler($data);

        $response1=$upload_handler1->get_response();
        $response2=$upload_handler2->get_response();
        $response3=$upload_handler3->get_response();
        $response4=$upload_handler4->get_response();


        $response=array(
            'files'=>$response1['img']+$response2['pdf']+$response3['video']+$response4['pdf_program']
        );

        $this->output
            ->set_content_type("application/json")
            ->set_output(json_encode($response));
    }
}