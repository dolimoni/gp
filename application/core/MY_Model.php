<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function getAll($table,$data=null,$user_params=null){

        $params=array(
            'order_by'=>'id',
            'order_by_sort'=>'asc'
        );

        if($data!==null){
            $this->db->where($data);
        }
        if($user_params!==null){
            $params=$user_params;
        }
        $this->db->order_by($params['order_by'],$params['order_by_sort']);
        return $this->db->get($table)->result_array();
    }

    public function add($table,$data){
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function edit($table,$data,$id){
        $this->db->where('id',$id);
        $this->db->update($table, $data);
    }

    public function getById($table,$id){
        $this->db->where('id',$id);
        $row=$this->db->get($table)->row_array();
        return $row;
    }

    public function getByAttribut($table,$attribute,$value){
        $this->db->where($attribute,$value);
        $result=$this->db->get($table)->result_array();
        return $result;
    }

    public function delete($table,$id){
        $data=array(
            'deleted'=>'true'
        );
        $this->db->where('id',$id);

        $this->db->update($table,$data);
    }

    public function hardDelete($table,$id){
        $this->db->where('id',$id);
        $this->db->delete($table);
    }

}

?>