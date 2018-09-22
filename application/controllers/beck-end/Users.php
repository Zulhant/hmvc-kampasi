<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->load->module('user_module');
    }
    
	public function index()
	{
        $data['code'] = 0;
        $data['content'] = 'admin/user/user.php'; 
        $data['listUsers'] = $this->user_module->getUsers();
		$this->load->view('admin/template', $data);
    }
    
    public function insert(){
        $this->load->library('form_validation');
        $data['content'] = 'admin/user/user.php'; 
        $data['listUsers'] = $this->user_module->getUsers();
        $data['message'] = 'Data success disimpan';
        $this->form_validation->set_rules('username', 'Username', 'required', 
                array(
                    'required' => 'Username harus di isi'
                )
            );
        $this->form_validation->set_rules('email', 'Email', 'required', 
                array(
                    'required' => 'Username harus di isi'
                )
        );
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE){
            $this->get_template($data);
        }else{
            $body = array(
                'username' =>$this->input->post('username'),
                'email' =>$this->input->post('email'),
                'name' =>$this->input->post('name'),
                'isActive' => true,
                'password' => md5($this->input->post('password'))
            );
            $query = $this->user_module->insert($body);
            if ($query){
               $data["code"] = 200;
               $data['msg'] = 'Data Sukses disimpan';
               $data['label'] = 'success';
          
            }else{
               $data["code"] = 400;
               $data['msg'] = 'Data Gagal disimpan';
               $data['label'] = 'warning';
            }
            $this->get_template($data);
        }
    }

    function  get_template($data){
       return $this->load->view('admin/template', $data);
    }
    
}
