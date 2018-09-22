<?php

class User_module extends MY_Controller
{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_users');
    }

    public function getUsers(){
        return $this->m_users->getList();
    }

    public function insert($body){
        return $this->m_users->insert_user($body);
    }

    public function check_user($str){
        return $this->m_users->check_user_data($str);
    }
}
