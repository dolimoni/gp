<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_main extends MY_Model
{

    public function select(){
        $this->db->select('*');
        $this->db->from('subjectt');
        $result=$this->db->get()->row_array();
        return $result;
    }
}