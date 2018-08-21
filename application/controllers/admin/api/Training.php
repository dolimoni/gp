<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends BaseController {

	public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('isLogin')) {
            redirect('login');
        }
        $this->load->model('model_training');
	}

    public function apiAdd()
    {

        $this->log_begin();
        try {
            $former=$this->input->post('former');
            $company=$this->input->post('company');
            $subject=$this->input->post('subject');
            $synthesis_description=$this->input->post('synthesis_description');
            $publish_program=$this->input->post('publish_program');
            $publish_course=$this->input->post('publish_course');
            $publish_synthesis=$this->input->post('publish_synthesis');
            $publish_certificat=$this->input->post('publish_certificat');
            $enable_training_start_mail=$this->input->post('enable_training_start_mail');
            $training = array(
                'former'=>$former,
                'company'=>$company,
                'subject'=>$subject,
                'synthesis_description'=>$synthesis_description,
                'publish_course'=>$publish_course,
                'publish_synthesis'=>$publish_synthesis,
                'publish_program'=>$publish_program,
                'publish_certificat'=>$publish_certificat,
            );
            if ($_FILES['course']['name']) {
                $upload = $this->model_util->uploadFile('course');
                $training['course']=$upload['path'];
                $training['local_course']='true';
            }
            if ($_FILES['synthesis_video']['name']) {
                $upload = $this->model_util->uploadFile('synthesis_video');
                $training['synthesis_video']=$upload['path'];
                $training['local_synthesis']='true';
            }
            if ($_FILES['program']['name']) {
                $upload = $this->model_util->uploadFile('program');
                $training['program']=$upload['path'];
            }

            $training_dates_string = $this->input->post('training_dates');
            $training_dates = explode(",", $training_dates_string);
            $training_id=$this->model_training->add('training',$training);
            $this->model_training->addDates($training_dates,$training_id);
            $this->model_training->updateStartMailNotifications($training_id,$enable_training_start_mail);
            $this->load->model('model_emails');
            $this->model_emails->init($training_id);
            $this->log_middle($training);
            $this->log_end(array('status' => 'success'));
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success','training_id'=>$training_id)));
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
            $former=$this->input->post('former');
            $company=$this->input->post('company');
            $subject=$this->input->post('subject');
            $id=$this->input->post('id');
            $synthesis_description=$this->input->post('synthesis_description');
            $publish_program=$this->input->post('publish_program');
            $publish_course=$this->input->post('publish_course');
            $publish_synthesis=$this->input->post('publish_synthesis');
            $publish_certificat=$this->input->post('publish_certificat');
            $enable_training_start_mail=$this->input->post('enable_training_start_mail');
            $training = array(
                'former'=>$former,
                'company'=>$company,
                'subject'=>$subject,
                'synthesis_description'=>$synthesis_description,
                'publish_course'=>$publish_course,
                'publish_synthesis'=>$publish_synthesis,
                'publish_program'=>$publish_program,
                'publish_certificat'=>$publish_certificat,
            );
            if ($_FILES['course']['name']) {
                $upload = $this->model_util->uploadFile('course');
                $training['course']=$upload['path'];
                $training['local_course']='true';
            }
            if ($_FILES['synthesis_video']['name']) {
                $upload = $this->model_util->uploadFile('synthesis_video');
                $training['synthesis_video']=$upload['path'];
                $training['local_synthesis']='true';
            }
            if ($_FILES['program']['name']) {
                $upload = $this->model_util->uploadFile('program');
                $training['program']=$upload['path'];
                $training['local_program']='true';
            }

            $training_dates_string = $this->input->post('training_dates');
            $training_dates = explode(",", $training_dates_string);
            $this->model_training->edit('training',$training,$id);
            $this->model_training->addDates($training_dates,$id);
            $this->model_training->updateStartMailNotifications($id,$enable_training_start_mail);
            $this->log_middle($training);
            $this->log_end(array('status' => 'success'));
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success','training_id'=>$id)));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }

    public function apiAddSynthesis()
    {

        $this->log_begin();
        try {
            $description=$this->input->post('description');
            $publish=$this->input->post('publish');
            $publish_program=$this->input->post('publish_program');
            $publish_course=$this->input->post('publish_course');
            $training_id=$this->input->post('training_id');
            $enable_training_start_mail=$this->input->post('enable_training_start_mail');
            $training_data=array('program'=>'');
            $synthesis = array(
                'training'=>$training_id,
                'description'=>$description,
                'publish'=>$publish,
            );
            if ($_FILES['video']['name']) {
                $upload = $this->model_util->uploadFile('video');
                $synthesis['path']=$upload['path'];
            }
            if ($_FILES['program']['name']) {
                $upload = $this->model_util->uploadFile('program');
                $training_data['program']=$upload['path'];
            }
            $training_data['publish_program']=$publish_program;
            $training_data['publish_course']=$publish_course;
            $this->model_training->addSynthesis($synthesis);
            $this->model_training->update($training_id,$training_data);
            $this->model_training->updateStartMailNotifications($training_id,$enable_training_start_mail);
            $this->log_end(array('status' => 'success'));
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success','training_id'=>$training_id)));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }


    public function apiAddTraineesToTraining()
    {

        $this->log_begin();
        try {
            $trainees = $this->input->post('trainees');
            $training_id = $this->input->post('training');
            $response = $this->model_training->addTraineesToTraining($training_id,$trainees);
            $this->log_end(array('status' => 'success'));
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success','email_sent'=>$response['email_sent'])));
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
            $this->log_end(array('status' => 'error'));
        }

    }


    public function apiDeleteTraineeFromTraining()
    {

        $this->log_begin();
        try {
            $data = $this->input->post('data');
            $this->model_training->deleteTraineeFromTraining($data['training'],$data['trainee']);
            $this->log_end(array('status' => 'success'));
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

    public function apiEditTrainee()
    {

        $this->log_begin();
        try {
            $data = $this->input->post('data');
            $this->model_training->editTrainee($data);
            $this->log_end(array('status' => 'success'));
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

        try {
            $id = $this->input->post("id");
            $this->model_training->hardDelete('training',$id);
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'success')));
            $this->log_end(array('status' => 'success'));
            //redirect('/admin/config/', 'refresh');
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }

    public function apiSendEmail()
    {

        $this->log_begin();
        try {
            $response=array('status' => 'success');
            $training_id = $this->input->post("training_id");
            $email_id = $this->input->post("email_id");
            $this->load->model('model_emails');
            $email=$this->model_emails->getwithRelations($email_id);

            if($this->model_emails->canISendIt($email_id)){
                $this->model_training->sendMailToTrainingGroup($training_id,$email);
                $this->model_emails->update($email_id);
            }else{
                $response['status']='warning';
            }
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode($response));
            $this->log_end(array('status' => 'success'));
            //redirect('/admin/config/', 'refresh');
        } catch (Exception $e) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(array('status' => 'error')));
        }
    }


}

