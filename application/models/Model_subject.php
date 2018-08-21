<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_subject extends MY_Model
{
    public function addSynthesis($synthesis){
        $this->db->where('subject',$synthesis['subject']);
        $q = $this->db->get("synthesis");
        if ($q->num_rows() > 0) {
            $db_synthesis = $q->row_array();
            $this->db->where('id',$db_synthesis['id']);
            $this->db->update('synthesis',$synthesis);
        }else{
            $this->db->insert('synthesis',$synthesis);
        }
    }

    public function getWithRelations($id){
        $this->db->select('s.*,ss.description as ss_description,ss.path as ss_path,ss.url');
        $this->db->from('subject s');
        $this->db->join('synthesis ss','ss.subject=s.id','left');
        $this->db->where('s.id',$id);
        $this->db->where('s.deleted','false');
        $result=$this->db->get()->row_array();
        return $result;
    }

    public function getSynthesis($subject){
        $this->db->where('subject',$subject);
        return $this->db->get('synthesis')->row_array();
    }

}