<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagenotfound extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['meta_title'] = '404 Page Not Found';
        $this->output->set_status_header('404'); // setting header to 404
        $this->load->view('pagenotfound', $this->data); //loading view
    }
}
