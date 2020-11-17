<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Translatereport_model extends MY_Model
{
    protected $_table_name = 'articles_translated_report';
    protected $_primary_key = 'article_report_id';
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
