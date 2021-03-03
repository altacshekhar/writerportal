<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articletype_model extends MY_Model
{
    public function get_type()
    {
       $articletype = array('null'=> 'Select','article'=> 'Article','news'=> 'News','recipe'=>'Recipe','pillar'=>'Pillar','supporting'=>'Supporting');
       return $articletype;
    }
}