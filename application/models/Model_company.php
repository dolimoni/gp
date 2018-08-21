<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_company extends MY_Model
{


    public function getAllWithRelations(){
        $this->db->select('c.*');
        $this->db->from('company c');
        $this->db->join('company_contact cc','cc.company=c.id','left');
        $this->db->where('c.deleted','false');
        $this->db->order_by('created_at','desc');
        $result=$this->db->get()->result_array();
        return $result;
    }

    public function addUserCompany($comany_name){
        $this->db->where('name',$comany_name);
        $q = $this->db->get("company");
        if ($q->num_rows() > 0) {
            $db_company = $q->row_array();
            return $db_company['id'];
        }else{
            $this->db->insert('company',array('name'=>$comany_name));
            return $this->db->insert_id();
        }
    }


    public function addContacts($company,$contacts){
        foreach ($contacts as $contact){
            $contact['company']=$company;
            $this->db->insert('company_contact',$contact);
        }
    }

    public function editContacts($contacts){
        foreach ($contacts as $contact){
            $data=array(
                'phone'=>$contact['phone'],
                'gsm'=>$contact['gsm'],
                'email'=>$contact['email'],
            );
            $this->db->where('id',$contact['id']);

            $this->db->update('company_contact',$data);
        }
    }

    public function getContacts($company){
        $this->db->where('company',$company);
        return $this->db->get('company_contact')->result_array();
    }

}