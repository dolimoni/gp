<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_util extends CI_Model {

    public function getUser($id){
        $this->db->where("id",$id);
        return $this->db->get("users")->row_array();
    }

    public function allUsers(){
        $this->db->order_by("id","asc");
        $this->db->where("status", "enabled");
        return $this->db->get("users")->result_array();
    }

    public function createUser($data,$actions){
        $this->load->model('model_ACL');
        $this->db->insert("users",$data);
        $user_id = $this->db->insert_id();
        $this->model_ACL->createDefaultAclForUser($user_id, $data["type"]);
        $this->model_ACL->updateUserAcl($user_id,$actions, $data["type"]);

    }
    public function editUser($user_id,$data,$actions){
        $this->load->model('model_ACL');
        $this->db->where("id", $user_id);

        $this->db->update("users",$data);
        $this->model_ACL->updateUserAcl($user_id, $actions, "user");
    }

    public function deleteUser($user_id)
    {
        $this->db->where('user', $user_id);
        $this->db->delete('acl');

        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }
    public function isLastDayInMonth($day){
        $date = new DateTime('now');
        $date = $date->format('Y-m-d');

        $lastDay = $this->getLastDayInMonth();

        if($date === $lastDay){
            return true;
        }
        return false;
    }

    public function getLastDayInMonth($day){
        $date1 = new DateTime($day);
        $date1->modify('last day of this month');
        return $date1->format('Y-m-d');
    }
    public function getFirstDayInMonth($day){
        $date1 = new DateTime($day);
        $date1->modify('first day of this month');
        return $date1->format('Y-m-d');
    }

    public function query($query){

        $dbResult = $this->db->query($query);
        return $dbResult;
    }


    public function populate(){
        $sql = "SET FOREIGN_KEY_CHECKS = 0;";
        $this->query($sql);

        $this->load->library('database');
        $queries = $this->database->getQueries();
        foreach ($queries as $query) {
            $this->db->query($query);
        }

        $sql = "SET FOREIGN_KEY_CHECKS = 1;";
        $this->query($sql);
    }

    public function diffDate($start, $end){
        // Date d'aujourd'hui
        $endDateTime = new DateTime($end);

        $startDateTime = new DateTime($start);


        $interval = date_diff($startDateTime, $endDateTime);
        $diffJours = $interval->format('%R%a');

        return $diffJours;
    }

    function date_fct($a, $b)
    {
        return strtotime($a) - strtotime($b);
    }

    public function sortDate($data, $columnName)
    {
        $columnArray = array_column($data, $columnName);


        usort($columnArray, array($this, "date_fct"));

        $response = array();

        foreach ($columnArray as $columnElement) {
            foreach ($data as $dataElement) {
                if ($columnElement === $dataElement[$columnName]) {
                    $response[] = $dataElement;
                }
            }
        }

        return $response;
    }

    public function sortDateBreak($data, $columnName)
    {
        $columnArray = array_column($data, $columnName);


        usort($columnArray, array($this, "date_fct"));

        $response = array();

        foreach ($columnArray as $key0=> $columnElement) {
            foreach ($data as $key => $dataElement) {
                if ($columnElement === $dataElement[$columnName]) {
                    $element= $data[$key];
                    $response[] = $element;
                    break;
                }
            }
        }

        return $response;
    }

    public function mergeDateArray($a1,$a2){
        $sums = array();
        $sums= $a1;
        foreach ($a2 as $key2 => $item2) {
            $date_exists = false;
            foreach ($a1 as $key1 => $item1) {
                if($item1["paymentDate"]=== $item2["paymentDate"]){
                    $sums[$key1]["price"] += $item2["price"];
                    $date_exists = true;
                    break;
                }
            }
            if (!$date_exists) {
                $sums[]= $item2;
            }
        }
        return $sums;
    }


    /**
     *
     * $e_params['send_to']='khalid.essalhi8@gmail.com';
     * $e_params['title']='Bienvenu';
     * $e_params['message']
     *
     * */
    public function sendEmail($e_params) {

        /*$config = array (
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'manager.contact8@gmail.com',
            'smtp_pass' => 'boujida2030',
            'mailtype' => 'html',
            'newline' => "\r\n",
            'charset'  => 'utf-8',
            'priority' => '1'
        );*/
        $send_to = "";
        $this->load->library('email');
        /*$this->email->initialize($config);*/
        $this->email->from('manager.contact8@gmail.com', 'Contact');
        $emails = explode(";", $e_params['send_to']);
        foreach ($emails as $value) {
            if (filter_var($value, FILTER_VALIDATE_EMAIL) and $value==!NULL) {
                $send_to .= $value.",";
            }
        }

        $this->email->to(rtrim($send_to,", "));
        //$this->email->attach(base_url($e_params['attach']), 'attachment', 'commande.pdf');
        $this->email->subject($e_params['title']);
        $this->email->message(mb_convert_encoding($e_params['message'], "UTF-8"));
        //
        //return $this->email->send();
        if ($this->email->send()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function load_lib($n, $f = null)
    {
        return extension_loaded($n) or dl(((PHP_SHLIB_SUFFIX === 'dll') ? 'php_' : '') . ($f ? $f : $n) . '.' . PHP_SHLIB_SUFFIX);
    }




    public function uploadFile($global,$type='file')
    {
        $response=array(
            'status'=>'',
            'path'=>'',
        );
        $valid_file = true;
        $message = '';
        //if they DID upload a file...
        if ($_FILES[$global]['name']) {
            //if no errors...
            if (!$_FILES[$global]['error']) {
                $path = $_FILES[$global]['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                //now is the time to modify the future file name and validate the file
                $new_file_name = strtolower(bin2hex(openssl_random_pseudo_bytes(16))); //rename file
                $new_file_name .= '.' . $ext;
                    if ($_FILES[$global]['size'] > (50024000)) //can't be larger than 50 MB
                {
                    $valid_file = false;
                    $message = 'Oops!  Your file\'s size is to large.';
                }

                //if the file has passed the test
                if ($valid_file) {
                    $file_path = 'assets/upload/'.$type.'/' . $new_file_name;
                    move_uploaded_file($_FILES[$global]['tmp_name'], FCPATH . $file_path);
                    $message = 'Congratulations!  Your file was accepted.';
                    $response['status']='success';
                }
            } //if there is an error...
            else {
                //set that to be the returned message
                $message = 'Ooops!  Your upload triggered the following error:  ' . $_FILES[$global]['error'];
            }
        }
        $save_path = $file_path;
        $response['path']=$save_path;
        return $response;

    }


    public function uploadFiles($global,$type='file'){
        foreach ($_FILES[$global]['name'] as $key=> $item){
            $file=array(
                'name'=>$_FILES[$global]['name'][$key],
                'type'=>$_FILES[$global]['type'][$key],
                'tmp_name'=>$_FILES[$global]['tmp_name'][$key],
                'error'=>$_FILES[$global]['error'][$key],
                'size'=>$_FILES[$global]['size'][$key],
            );
            $_FILES['file']=$file;
            $this->uploadFile('file',$type);
        }
    }



}