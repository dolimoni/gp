<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_emails extends MY_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_emails');
    }


    public function init($training_id){
        $this->load->model('model_training');
        $emails_type=$this->db->get('email_type')->result_array();
        $interval=$this->model_training->getInterval($training_id);
        foreach ($emails_type as $email_type){
            $jj=$email_type["jj"];
            if($jj=='9999'){
                $date1 = new DateTime($interval['start_date']);
                $date2 = new DateTime($interval['end_date']);
                $diff = $date1->diff($date2);
                $jj=$diff->days;
            }
            $data=array(
                'email_type'=>$email_type['id'],
                'training'=>$training_id,
                'sent'=>"false",
                'sending_date'=>date('Y-m-d', strtotime($interval['start_date']. ' '.$jj.' days')) ,
            );
            $this->db->insert('emails',$data);
        }
    }


    public function update($email_id){
        $db_email=$this->getById('emails',$email_id);
        if($db_email['sent']==='false'){
            $this->db->where('id',$email_id);
            $this->db->update('emails',array('sent'=>'true','sending_date'=>date('Y-m-d H:i:s')));
        }else{
            $data=array(
                'email_type'=>$db_email['email_type'],
                'training'=>$db_email['training'],
                'sent'=>'true',
                'sending_date'=>date('Y-m-d'),
            );
            $this->db->insert('emails',$data);
        }
    }

    public function canISendIt($email_id,$manual=true){
        $yes=true;
        $email=$this->model_emails->getById('emails',$email_id);
        $training=$this->model_training->getById('training',$email['training']);
        $subject=$this->model_training->getById('subject',$training['subject']);
        $interval=$this->model_training->getInterval($email['training']);


        switch ($email['email_type']) {
            case "1":
                if($training['enable_training_start_mail']==='false'){
                    $yes=false;
                }
                else if($interval['start_date']<=date('Y-m-d')){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            case "2":
                if($training['enable_training_start_mail']==='false'){
                    $yes=false;
                }else if($interval['start_date']<=date('Y-m-d')){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            case "3":
                if($training['publish_course']==='false'){
                    $yes=false;
                }else if($training['local_course']==='true' and $training['course']===''){
                    $yes=false;
                }else if($training['local_course']==='false' and $subject['course']===''){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            case "4":
                if($training['publish_program']==='false'){
                    $yes=false;
                }else if($training['local_program']==='true' and $training['program']===''){
                    $yes=false;
                }else if($training['local_program']==='false' and $subject['program']===''){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            case "5":
                if($training['publish_certificat']==='false'){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            case "6":
                if($training['publish_synthesis']==='false'){
                    $yes=false;
                }else if($training['local_synthesis']==='true' and $training['course']===''){
                    $yes=false;
                }else if($training['local_course']==='false' and $subject['course']===''){
                    $yes=false;
                }else if($email['sent']==="true" and !$manual){
                    $yes=false;
                }
                break;
            default:
                $yes=true;
        }

        return $yes;
    }

    public function getwithRelations($id){
        $this->db->select('e.*,et.type,et.template,et.title et_title,et.id et_id');
        $this->db->from('emails e');
        $this->db->join('email_type et','et.id=e.email_type');
        $this->db->where('e.id',$id);
        return $this->db->get()->row_array();
    }

}