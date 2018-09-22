<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
        $template['content'] = 'admin/home/home.php'; 
		$this->load->view('admin/template', $template);
	}
}
