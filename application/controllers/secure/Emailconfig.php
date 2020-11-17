<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Emailconfig extends Admin_Controller
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
        $this->load->model('emailconfig_model');
	}

	public function index(){
		/*$emailer_data['name'] 			 = 'Test';
		$emailer_data['email'] 			 = 'cshekhar@altametrics.com';
		$emailer_data['message_subject'] = 'Writer Portal Test!';
		$message = 'this is testing';
		$this->send_email($emailer_data, $message);*/

		$this->data['config_row'] = $this->emailconfig_model->get_new();


		$rules = $this->emailconfig_model->rules_email_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'emailconfig_from_name',
                'emailconfig_from_email',
                'emailconfig_smtp_host',
				'emailconfig_smtp_port',
				'emailconfig_smtp_crypto',
				'emailconfig_smtp_user',
			);
			$update_data = $this->emailconfig_model->array_from_post($post_array);
			$emailconfig_smtp_pass = $this->input->post('emailconfig_smtp_pass');

			if($emailconfig_smtp_pass){
				$update_data['emailconfig_smtp_pass'] = $this->input->post('emailconfig_smtp_pass');
			}
			$success = $this->emailconfig_model->update_config($update_data);
			$this->session->set_flashdata('success', 'Email configuration successfully updated');
			redirect('secure/emailconfig', 'refresh');
		}

		$this->data['subview'] = 'secure/config/email';
        $this->load->view('_main_layout', $this->data);
	}
}