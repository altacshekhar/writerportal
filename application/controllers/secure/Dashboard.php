<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
       
    }

    public function index()
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
        $user_type = $this->session->userdata('user_type');
        redirect('secure/kpis', 'refresh');
    }

}
