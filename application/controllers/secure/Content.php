<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Content extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		
    }

    public function index()
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
        $user_type = $this->session->userdata('user_type');
        if($user_type == 5 || $user_type == 6)
		{
			redirect('secure/linkbuilding','refresh');
		}
        else
        {
            redirect('secure/articleslist', 'refresh');
        }
    }

}
