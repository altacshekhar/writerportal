<?php

class Components extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['subview'] = 'secure/components-bootstrap';
        $this->load->view('_main_layout', $this->data);
    }
}
