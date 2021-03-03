<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->data['meta_title'] = ucfirst(getDoaminName()) . ' Article Portal';
		$this->load->model('user_model');

		$this->form_validation->set_error_delimiters('<div class="invalid-feedback d-block">', '</div>');

        // User Login Check
        $exception_urls = array(
            'admin/user/login',
            'admin/user/register',
            'admin/user/forgot',
            'admin/user/logout',
        );
        if (in_array(uri_string(), $exception_urls) == false) {
            if ($this->user_model->loggedin() == false) {
                // redirect('admin/user/login');
            }
        }
	}
}
