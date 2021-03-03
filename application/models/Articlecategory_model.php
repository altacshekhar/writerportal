<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlecategory_model extends MY_Model
{
    public function get_list()
    {
       $articlecategory = array('null'=> 'Select','menu'=> 'Food & Beverage','operations'=> 'Operations','technology'=> 'Technology','marketing'=> 'Marketing','workforce'=> 'Workforce','leadership'=> 'Leadership');
       return $articlecategory;
    }
}