<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_Controller extends My_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['error'] = array();
    }
}
