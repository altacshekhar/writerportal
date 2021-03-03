<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Linkbuilding extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		//$this->load->model('campaign_model');
		//$this->load->model('livelink_model');
		//$this->data['websites'] = $this->campaign_model->get_github_repo();
       
    }

    public function index()
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
        $user_type = $this->session->userdata('user_type');
        //echo $user_type;
        if($user_type==5){
            redirect('secure/publishers', 'refresh');
        }
        elseif($user_type == 1 || $user_type == 6)
        {
            redirect('secure/campaigns', 'refresh');
        }
        else{
            redirect('secure/articlesbrief', 'refresh'); 
        }
        
    }

}
