<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Leaderboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('campaign_model');
		$this->load->model('publisher_model');
		$this->load->model('livelink_model');
		$this->load->model('articlebrief_model');
		$this->data['websites'] = $this->campaign_model->get_github_repo();
       
    }

    public function index()
    {
	if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
        $this->data['subview'] = 'secure/leaderboard/index';
        $this->load->view('_main_layout', $this->data);
        
    }
}
