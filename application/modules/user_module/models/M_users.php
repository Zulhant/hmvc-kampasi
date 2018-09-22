<?php

class M_users extends CI_Model
{

    function getList(){
        $this->db->from('users');
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function insert_user($body){
        return $this->db->insert('users', $body);
    }
    
}
