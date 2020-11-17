<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_i18_model extends MY_Model
{
    protected $_table_name = 'articles_translate_i18';
	protected $_primary_key = 'article_i18_id';
	protected $_timestamps = true;



    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

   

}