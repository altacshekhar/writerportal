<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paragraph_i18_model extends MY_Model
{
    protected $_table_name = 'article_section_translate_i18';
	protected $_primary_key = 'section_i18_id';
	
	public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

	
}
