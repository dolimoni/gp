<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Before uploade :
 *
 * change readSalesCSV destination in -f ftp
 *
 */

class Training extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
    }


    public function emailNotifications(){
        $this->log_begin();
        $this->load->model('model_emails');
        $trainings=$this->model_training->getNotFinishedTrainings();
        foreach ($trainings as $training){
            if($training['enable_training_start_mail']==='true'){
               $emails=$this->model_training->getemails($training['id'],array('sent'=>'false'));
               foreach ($emails as $email){
                   $dt = strtotime($email['sending_date']); //make timestamp with datetime string
                   $mydt= date("Y-m-d", $dt);
                   $sendIt=$this->model_emails->canISendIt($email['id']);
                   if($mydt==date('Y-m-d') and $sendIt){
                       $this->model_training->sendMailToTrainingGroup($training['id'],$email);
                       $this->model_emails->update($email['id']);
                   }
               }
           }
        }
    }


    public function log_begin()
    {
        log_message('info', "dolimoni=>Log_begin: " . $this->router->fetch_class() . " " . $this->router->fetch_method());
        $data = print_r($this->input->post(NULL, TRUE), TRUE);
        log_message('info', ($data));
    }

    public function log_middle($data)
    {
        log_message('info', "dolimoni=>Log_middle: " . json_encode($data));
    }

    public function log_end($data)
    {
        log_message('info', "dolimoni=>Log_end: " . json_encode($data));
    }


}

