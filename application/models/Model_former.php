<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_former extends MY_Model
{

    public function getAllWithRelations(){
        $this->db->select('f.*');
        $this->db->select('s.title');
        $this->db->select('count(t.id) count_trainings');
        $this->db->from('former f');
        $this->db->join('training t','t.former=f.id','left');
        $this->db->join('subject s','s.id=f.subject','left');
        $this->db->where('f.deleted','false');
        $this->db->group_by('f.id');
        $this->db->order_by('created_at','desc');
        $result=$this->db->get()->result_array();
        return $result;
    }

}