<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_params extends CI_Model {

    public function getConfigParams(){
        $params=$this->db->get("config")->row_array();
        $response=array();
        return $response;
    }
	public function config()
	{
        $result = $this->db->get('config')->row_array();
        $user =$this->getCommonCurrentUserData();
        $result["photo"]=$user["image"];
        return $result;
	}

	private function getCommonCurrentUserData(){
        $user=array();
        $currentUserData=$this->getCurrentUserData();
        $type=$this->session->userdata('type');
        if($type==='trainee'){
            $user['image']=$currentUserData['image'];
        }else{
            $user['image']=$currentUserData['photo'];
        }
        return $user;
    }

	private function getCurrentUserData(){
        $id=$this->session->userdata('id');
        $type=$this->session->userdata('type');
        if($type==='trainee'){
            $this->db->where("id","$id");
            $user=$this->db->get('trainee')->row_array();
            return $user;
        }else{
            $this->db->where('id',$id);
            $user=$this->db->get('users')->row_array();
            return $user;
        }
    }

	public function update($data)
	{
	    $response=array("status"=>"success");
        $this->db->update('config',$data);
        return $response;
	}

	public function acl($controller, $action, $user_id){
	    $this->db->where("controller", $controller);
	    $this->db->where("action", $action);
	    $this->db->where("user", $user_id);
	    $this->db->where("status", "enabled");
	    return $this->db->get("acl")->row_array();
    }

    public function enabledPages($user_id){
	    $this->db->where("user", $user_id);
	    $this->db->where("status", "enabled");
	    $this->db->where("visibility", "shown");
	    $actions = $this->db->get("acl")->result_array();


        $controllers = $actions;

        $l_controller=array();
        foreach ($controllers as $controller) {
            $l_controller[$controller["controller"]][$controller["action"]] = $controller;
        }
        $acl= $l_controller;
	    return $acl;

    }


}
		
