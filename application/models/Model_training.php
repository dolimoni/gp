<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_training extends MY_Model
{

    function addDates($dates,$training){

        $this->db->where('training',$training);
        $this->db->delete('training_dates');

        foreach ($dates as $date){
            $data=array(
                'date'=>$date,
                'training'=>$training
            );
            $this->db->insert('training_dates',$data);
        }
    }

    public function updateStatus($training_id){
        $training=$this->getById('training',$training_id);
        $interval=$this->getInterval($training_id);
        if($interval['start_date']<=date('Y-m-d') && date('Y-m-d')<=$interval['end_date']){
            $this->db->where('id',$training_id);
            $this->db->update('training',array('status'=>'En cours'));
        }else if(date('Y-m-d')>$interval['end_date']){
            $this->db->where('id',$training_id);
            $this->db->update('training',array('status'=>'Terminé'));
        }else if(date('Y-m-d')<$interval['start_date']){
            $this->db->where('id',$training_id);
            $this->db->update('training',array('status'=>'A venir'));
        }
    }

    public function updateStatusForAll(){
        $trainings=$this->getAll('training',true);
        foreach ($trainings as $training){
            $this->updateStatus($training['id']);
        }
    }

    public function getInterval($training_id){
        $this->db->select('min(date) start_date,max(date) end_date');
        $this->db->from('training t');
        $this->db->join('training_dates td', 'td.training = t.id','left');
        $this->db->where('t.id',$training_id);
        $this->db->group_by('t.id');
        $interval=$this->db->get()->row_array();
        return $interval;
    }

    public function getAll($table,$eager=true,$user_params=null)
    {
        $trainings=array();
        if($eager){
            $this->db->select('t.*');
            $this->db->select('count(tt.training) participants');
            $this->db->select('c.name c_name,f.first_name f_first_name,s.title');
            $this->db->from('training t');
            $this->db->join('company c', 'c.id = t.company','left');
            $this->db->join('former f', 'f.id = t.former','left');
            $this->db->join('subject s', 's.id = t.subject','left');
            $this->db->join('training_trainees tt', 'tt.training = t.id','left');
            $this->db->group_by('t.id');
            $this->db->order_by('t.created_at','desc');
            $trainings = $this->db->get()->result_array();
        }

        foreach ($trainings as $key=> $training){
            $this->db->select('min(date) start_date,max(date) end_date');
            $this->db->from('training_dates td');
            $this->db->where('training',$training['id']);
            $this->db->group_by('td.training');
            $training_dates = $this->db->get()->row_array();

            $trainings[$key]['start_date']=$training_dates['start_date'];
            $trainings[$key]['end_date']=$training_dates['end_date'];


            $this->db->select('date');
            $this->db->from('training_dates td');
            $this->db->where('training',$training['id']);
            $training_dates = $this->db->get()->result_array();

            $trainings[$key]['days']=count($training_dates);


        }
        return $trainings;
    }

    public function getNotFinishedTrainings(){
        $this->db->select('*');
        $this->db->from('training');
        $this->db->where('status!="Terminé"');
        return $this->db->get()->result_array();
    }
    public function getTrainingDates($id){
        $this->db->select('min(date) start_date,max(date) end_date');
        $this->db->from('training_dates td');
        $this->db->where('training',$id);
        $this->db->group_by('td.training');
        $training_dates = $this->db->get()->row_array();
        $training_dates['days']=count($training_dates);
        return $training_dates;
    }

    public function getWithRelations($id){
        $this->db->select('t.*,ss.description ss_description');
        $this->db->select('c.name c_name,c.address c_address,f.first_name f_first_name,s.title,min(date) start_date,
        max(date) end_date,s.description s_description,s.image s_image,s.course s_course,ss.url,s.program s_program');
        $this->db->from('training t');
        $this->db->join('company c', 'c.id = t.company');
        $this->db->join('former f', 'f.id = t.former');
        $this->db->join('subject s', 's.id = t.subject');
        $this->db->join('synthesis ss', 'ss.subject = s.id','left');
        $this->db->where('t.id',$id);
        $this->db->join('training_dates td', 'td.training = t.id','left');
        $this->db->group_by('t.id');
        $training = $this->db->get()->row_array();
        return $training;
    }

    public function getTrainingDate($id){
        $this->db->select('DATE_FORMAT(td.date,"%d-%m-%Y") date');
        $this->db->from('training t');
        $this->db->join('training_dates td','td.training=t.id','left');
        $this->db->where('t.id',$id);
        $training_dates = $this->db->get()->result_array();
        return $training_dates;
    }

    public function getTrainees($id){
        $this->db->select('t.*,tt.scoreTest');
        $this->db->from('training_trainees tt');
        $this->db->join('trainee t','t.id=tt.trainee');
        $this->db->where('tt.training',$id);
        $trainees = $this->db->get()->result_array();
        return $trainees;
    }

    public function getUnsubscibedTrenees($training_id,$company_id){

        $sql='SELECT * FROM trainee t where t.company=? and t.deleted="false" and id NOT IN (SELECT trainee FROM training_trainees tt where tt.training=?)';
        $query=$this->db->query($sql, array($company_id,$training_id));
        $result= $query->result_array();

        return $result;
    }

    public function getUnsubscibedTreneesNames($training_id,$company_id){

        $sql='SELECT concat_ws(" ", first_name, last_name) as label,first_name as value,id,email,last_name
              FROM trainee t where t.company=? and t.deleted="false" and id NOT IN (SELECT trainee FROM training_trainees tt where tt.training=?)';
        $query=$this->db->query($sql, array($company_id,$training_id));
        $result = $query->result_array();
        return $result;
    }

    public function addTraineesToTraining($training_id,$trainees){
            $response=array();
            foreach ($trainees as $trainee){
                if($this->isUserAlreadySubscribedInTraining($training_id,$trainee)){
                    $data=array(
                        'scoreTest'=>$trainee['scoreTest'],
                    );
                    $this->db->where('training',$training_id);
                    $this->db->where('trainee',$trainee['id']);
                    $this->db->update('training_trainees',$data);
                }else{
                    $data=array(
                        'training'=>$training_id,
                        'trainee'=>$trainee['id'],
                        'scoreTest'=>$trainee['scoreTest'],
                    );
                    $this->db->insert('training_trainees',$data);
                    $db_trainee=$this->model_training->getById('trainee',$trainee['id']);
                    if(true){
                        $sent=$this->sendSubscriptionEmail($db_trainee);
                        $response['email_sent']=$sent;
                    }
                }
            }
            return $response;
    }

    private function sendSubscriptionEmail($trainee){
        $sent=false;
        $this->load->model('model_util');
        $e_params['send_to']=$trainee['email'];
        $e_params['title']='Bienvenu';
        $e_params['message']=
            '<h2>Bonjour</h2>'.
            '<p>Vous êtes bien inscrit dans la formation</p>'.
            '<p>Général performance</p>';
        $sent = $this->model_util->sendEmail($e_params);
        return $sent;
    }

    public function isUserAlreadySubscribedInTraining($training_id,$trainee){
        $this->db->where('trainee',$trainee['id']);
        $this->db->where('training',$training_id);
        $q = $this->db->get("training_trainees");
        if ($q->num_rows() > 0) {
           return true;
        }else{
            return false;
        }
    }

    public function deleteTraineeFromTraining($training,$trainee){
        $this->db->where('training',$training);
        $this->db->where('trainee',$trainee);
        $this->db->delete('training_trainees');
    }

    public function editTrainee($data){
        $this->db->where('training',$data['training']);
        $this->db->where('trainee',$data['trainee']);
        $this->db->update('training_trainees',array('scoreTest'=>$data['scoreTest']));
    }

    public function addSynthesis($synthesis){
        $this->db->where('training',$synthesis['training']);
        $q = $this->db->get("synthesis");
        if ($q->num_rows() > 0) {
            $db_synthesis = $q->row_array();
            $this->db->where('id',$db_synthesis['id']);
            $this->db->update('synthesis',$synthesis);
        }else{
            $this->db->insert('synthesis',$synthesis);
        }
    }

    public function updateStartMailNotifications($training,$boolean){
        $this->db->where('id',$training);
        $this->db->update('training',array('enable_training_start_mail'=>$boolean));
    }

    public function sendTrainingNotification($training_id){
        $response=array('sendTrainingNotification'=>false,'diffDays'=>-1);
        $training=$this->getById('training',$training_id);
        $interval=$this->getInterval($training_id);
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($interval['start_date']);
        $interval = $date1->diff($date2);
        $diffDays=$interval->days;
        if(($diffDays=="7" or $diffDays=="1") and $training['enable_training_start_mail']==='true'){
            $response['days']=$diffDays;
            $response['sendTrainingNotification']=true;
        }
        return $response;
    }

    private function publish_course($id){

        $publish_course=false;
        $training_interval=$this->getInterval($id);
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($training_interval['start_date']);
        $interval = $date1->diff($date2);
        $diffDays=$interval->days;

        $this->db->where('id',3);
        $jj=$this->db->get('email_type')->row()->jj;

        // Le jour de la formation
        if($diffDays==$jj){
            $publish_course=true;
            $data=array(
                'publish_course'=>'true'
            );
            $response['publish_course']=true;
            $this->db->where('id',$id);
            $this->db->update('training',$data);
        }
        return $publish_course;
    }

    private function publish_program($id){

        $publish_program=false;
        $training_interval=$this->getInterval($id);
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($training_interval['start_date']);
        $interval = $date1->diff($date2);

        $diffDays=$interval->days;

        // La formation n'a pas commencé encore
        if($diffDays===7 and date('Y-m-d')<$training_interval['start_date']){
            $publish_program=true;
            $data=array(
                'publish_program'=>'true'
            );
            $this->db->where('id',$id);
            $this->db->update('training',$data);
        }
        return $publish_program;
    }

    private function publish_synthesis($id){

        $publish=false;
        $training_interval=$this->getInterval($id);
        $date1 = new DateTime(date('Y-m-d'));
        $date2 = new DateTime($training_interval['start_date']);
        $interval = $date1->diff($date2);

        $diffDays=$interval->days;

        // La formation a été commencé il y a 7 jours
        if($diffDays===7 and date('Y-m-d')>$training_interval['start_date']){
            $this->db->where('training',$id);
            $q = $this->db->get("synthesis");
            if ($q->num_rows() > 0) {
                $data=array(
                    'publish'=>'true'
                );
                $publish=true;
                $db_synthesis = $q->row_array();
                $this->db->where('id',$db_synthesis['id']);
                $this->db->update('synthesis',$data);
            }
        }
        return $publish;
    }

    public function publish($id){
        $response['publish']=$this->publish_synthesis($id);
        $response['publish_program']=$this->publish_program($id);
        $response['publish_course']=$this->publish_course($id);
        return $response;
    }

    public function update($id,$data){
        $this->db->where('id',$id);
        $this->db->update('training',$data);
    }

    public function sendMailToTrainingGroup($training_id,$email_params){
        $trainees=$this->getTrainees($training_id);
        $training=$this->getWithRelations($training_id);
        foreach ($trainees as $trainee){
            $email_data['trainee']=$trainee;
            $email_data['email']=$email_params;
            $email_data['training']=$training;
            $email_data['training']+=$this->getInterval($training_id);
            $body = $this->load->view('admin/email/'.$email_params["template"].'.php',$email_data,TRUE);
            $data['e_params']['message']=$body;
            $data['e_params']['send_to']=$trainee['email'];
            $data['e_params']['title']=$this->emailTitle($email_params,$training);
            $this->model_util->sendEmail($data['e_params']);
        }
    }


    public function getSynthsByTrainee($id){
        $this->db->select('sy.*,s.title,s.image');
        $this->db->from('training t');
        $this->db->join('training_trainees tt','t.id=tt.training');
        $this->db->join('subject s','s.id=t.subject');
        $this->db->join('synthesis sy','s.id=sy.subject');
        $this->db->where('sy.publish','true');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function geTrainingsByTrainee($user_id){
        $this->db->select('t.*');
        $this->db->select('c.name c_name,c.address c_address,f.first_name f_first_name,s.title,min(date) start_date,
        max(date) end_date,s.description s_description,s.image s_image,s.course s_course,ss.path');
        $this->db->select('DATEDIFF( max(date),min(date)) as days');

        $this->db->select('DATEDIFF(min(date),"'.date('Y-m-d').'") as start_in');
        $this->db->select('DATEDIFF(max(date),"'.date('Y-m-d').'") as finished_in');
        $this->db->from('training t');
        $this->db->join('company c', 'c.id = t.company');
        $this->db->join('former f', 'f.id = t.former');
        $this->db->join('subject s', 's.id = t.subject');
        $this->db->join('synthesis ss', 's.id = ss.subject','left');
        $this->db->join('training_dates td', 'td.training = t.id','left');
        $this->db->join('training_trainees tt', 'tt.training = t.id','left');
        $this->db->where('tt.trainee',$user_id);
        $this->db->group_by('t.id');
        $this->db->order_by('start_in');
        $trainings = $this->db->get()->result_array();

        return $trainings;


    }

    public function getComingTrainings($user_id){
        $trainings=$this->geTrainingsByTrainee($user_id);
        foreach ($trainings as $key=> $training){
            if($training['start_in']<=0){
                unset($trainings[$key]);
            }

        }
        return $trainings;
    }

    public function getFinishedTrainings($user_id){
        $trainings=$this->geTrainingsByTrainee($user_id);
        foreach ($trainings as $key=> $training){
            if($training['finished_in']>0 or $training['start_date']==='0000-00-00'){
                unset($trainings[$key]);
            }

        }
        return $trainings;
    }

    public function getCurrentTrainings($user_id){
        $trainings=$this->geTrainingsByTrainee($user_id);
        foreach ($trainings as $key=> $training){
            if(($training['start_in']>0 or $training['finished_in']<0)){
                unset($trainings[$key]);
            }

        }
        return $trainings;
    }
    public function getUndefindedTrainingsDate($user_id){
        $trainings=$this->geTrainingsByTrainee($user_id);
        foreach ($trainings as $key=> $training){
            if($training['start_date']!=='0000-00-00'){
                unset($trainings[$key]);
            }

        }
        return $trainings;
    }

    public function getEmails($id,$where=null){
        $this->db->select('e.*,et.type,et.template,et.title et_title,et.id et_id');
        $this->db->from('emails e');
        $this->db->join('email_type et','et.id=e.email_type');
        $this->db->where('training',$id);
        if($where!==null){
            $this->db->where($where);
        }
        return $this->db->get()->result_array();
    }


    private function emailTitle($email_params,$training){

        switch ($email_params['et_id']) {
        case "1":
                $interval=$this->getInterval($training['id']);
                return "Rappel de votre formation ".$training['title']." du ".$interval['start_date'];
        break;
        case "2":
                $interval=$this->getInterval($training['id']);
                return "Rappel de votre formation ".$training['title']." du ".$interval['start_date'];
        break;
        case "3":
                return "Support de votre formation ".$training['title'];
        break;
            case "4":
                return "Programme de votre formation ".$training['title'];
        break;
            case "5":
                return "Attestation de votre formation ".$training['title'];
        break;
            case "6":
                return "Synthèse de votre formation ".$training['title'];
        break;
            default:
                return "Contact";
        }
    }
}