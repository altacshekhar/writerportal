<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Seoconfig extends Admin_Controller
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
        $this->load->model('seoconfig_model');
	}

	public function index(){
		$this->data['config_row'] = $this->seoconfig_model->get_new();
		$rules = $this->seoconfig_model->rules_seo_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'seoconfig_api_url',
				'seoconfig_search_count'
			);
			$update_data = $this->seoconfig_model->array_from_post($post_array);
			$success = $this->seoconfig_model->update_config($update_data);
			$this->session->set_flashdata('success', 'SEO configuration successfully updated');
			redirect('secure/seoconfig', 'refresh');
		}

		$this->data['subview'] = 'secure/config/seo';
        $this->load->view('_main_layout', $this->data);
	}
}