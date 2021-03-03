<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Hootsuitconfig extends Admin_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];

		if(!$this->user_is_admin){
			redirect('/', 'refresh');
		}
        $this->load->model('hootsuitconfig_model');
	}

	public function index(){
		if(isset($_GET['code'])){
			$update_code_data = array(
				'hootsuit_api_code' => $_GET['code'] ,
			);
			$success = $this->hootsuitconfig_model->update_config($update_code_data);
			$this->session->set_flashdata('success', 'Hootsuit code successfully updated');
			redirect('secure/hootsuitconfig', 'refresh');
		}
		$this->data['config_row'] = $this->hootsuitconfig_model->get_new();
		$rules = $this->hootsuitconfig_model->rules_hootsuit_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'hootsuit_api_url',
				'hootsuit_auth_url',
				'hootsuit_client_id',
				'hootsuit_client_secret',
				'hootsuit_user_password',
				'hootsuit_redirect_uri',
				'hootsuit_api_code',
				'hootsuit_access_token',
				'hootsuit_expires_in',
				'hootsuit_refresh_token',
				'hootsuit_token_type',
				'hootsuit_create_time',
				'hootsuit_expire_time'
			);
			$update_data = $this->hootsuitconfig_model->array_from_post($post_array);
			$success = $this->hootsuitconfig_model->update_config($update_data);
			$this->session->set_flashdata('success', 'Hootsuit configuration successfully updated');
			redirect('secure/hootsuitconfig', 'refresh');
		}

		$this->data['subview'] = 'secure/config/hootsuit';
        $this->load->view('_main_layout', $this->data);
	}
}