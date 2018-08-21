<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 8/3/18
 * Time: 1:27 PM
 */

class Signup extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_company');
        $this->load->model('model_trainee');
    }

    public function signup()
    {
        try {
            $user = $this->input->post("user");
            $password = $this->input->post("password");
            $user["password"] = md5($password);
            if($this->model_trainee->emailAlreadyExists($user['email'])){
                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode(array('status'=>'warning','message'=>'L\'adresse email est déjà utilisé')));
                return false;
            }
            $company_id=0;
            if(isset($user['company'])){
                $company_id=$this->model_company->addUserCompany($user['company']);
            }
            $user['company']=$company_id;
            $response=$this->model_trainee->createTrainee($user);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
            // redirect('admin/trainee/getAll', 'refresh');
        } catch (Exception $e) {
            $message='Une erreur s\'est produite' ;
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error','message'=>$message,'data',$e)));
        }
    }
}