<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_trainee extends MY_Model
{
    public function createTrainee($user){
        $data['last_name']=$user['last_name'];
        $data['first_name']=$user['first_name'];
        $data['email']=$user['email'];
        $data['password']=$user['password'];
        $data['company']=$user['company'];
        $data['date_of_birth']=$user['date_of_birth'];
        $data['sexe']=$user['sexe'];
        $this->db->insert("trainee",$data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function emailAlreadyExists($email){
        $this->db->where('email',$email);
        $q = $this->db->get("trainee");
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function getByIdWithRelations($id)
    {
        $this->db->select('t.*');
        $this->db->select('c.name c_name');
        $this->db->from('trainee t');
        $this->db->where('t.id',$id);
        $this->db->join('company c','c.id=t.company','left');
        $result=$this->db->get()->row_array();
        return $result;
    }

    public function getAllWithRelations(){
        $this->db->select('t.*');
        $this->db->select('c.name c_name');
        $this->db->from('trainee t');
        $this->db->join('company c','c.id=t.company','left');
        $this->db->where('t.deleted','false');
        $this->db->order_by('created_at','desc');
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function editUser($user_id,$user){

        $data['last_name']=$user['last_name'];
        $data['first_name']=$user['first_name'];
        $data['mobile']=$user['mobile'];
        $data['email']=$user['email'];
        $data['address']=$user['address'];
        $data['company']=$user['company'];
        $data['sexe']=$user['sexe'];
        if(isset($user['password'])){
            $data['password']=$user['password'];
        }

        $this->db->where("id", $user_id);
        $this->db->update("trainee",$data);
    }

    public function login($email,$password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('deleted', 'false');
        $query = $this->db->get('trainee');
        if($query->num_rows()==1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAllTraining($id){
        $this->db->select('t.*');
        $this->db->select('tt.scoreTest');
        $this->db->select('s.title,min(date) start_date,max(date) end_date');
        $this->db->select('s.title,f.first_name f_first_name,f.last_name f_last_name');
        $this->db->from('training t');
        $this->db->join('training_trainees tt','tt.training=t.id');
        $this->db->join('former f','t.former=f.id');
        $this->db->join('subject s','t.subject=s.id');
        $this->db->join('training_dates td','td.training=t.id');
        $this->db->group_by('tt.training');
        $this->db->where('tt.trainee',$id);
        $result=$this->db->get()->result_array();
        return $result;
    }


    public function ForgotPassword($email)
    {
        $this->db->select('email');
        $this->db->from('trainee');
        $this->db->where('email', $email);
        $query=$this->db->get();
        return $query->row_array();
    }


    public function sendpassword($data)
    {
        $email = $data['email'];
        $this->db->select('*');
        $this->db->from('trainee');
        $this->db->where('email', $email);
        $query=$this->db->get();
        if($query->num_rows()==1) {
            $user= $query->row_array();
            $passwordplain = "";
            $passwordplain  = rand(999999999,9999999999);
            $newpass['password'] = md5($passwordplain);
            $this->db->where('email', $email);
            $this->db->update('trainee', $newpass);


            //message title

            $e_params['title']='Réinitialisation du mot de passe';



            //message content

            $e_params['message']='Dear '.$user['first_name'].','. "\r\n";
            $e_params['message'].='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $e_params['message'].='<br>Please Update your password.';
            $e_params['message'].='<br>Thanks & Regards';
            $e_params['message'].='<br>Your company name';


            //send to

            $e_params['send_to']= $email;


            $this->load->model('model_util');

            $sent=$this->model_util->sendEmail($e_params);

            if (!$sent) {
                $this->session->set_flashdata('msg','Failed to send password, please try again!');
                redirect(base_url().'/identificationCompte','refresh');
            } else {
                $this->session->set_flashdata('msg','Password sent to your email!');
                redirect(base_url(),'refresh');
            }

        }else
        {
            $this->session->set_flashdata('msg','Email not found try again!');
            redirect(base_url().'/identificationCompte','refresh');
        }
    }
}