<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contentarticlebrief_paragraph_model extends MY_Model
{
    protected $_table_name = 'article_brief_paragraph';
    protected $_primary_key = 'brief_para_id';
    protected $_timestamps = false;

    protected $_brief_id;
    
    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }
	public $rules_paragraph = array(
            'paragraph_title[]' => array(
            'field' => 'paragraph_title[]',
            'label' => 'paragraph title',
            'rules' => 'trim|required|xss_clean',
		),
		'headings[]' => array(
            'field' => 'headings[]',
            'label' => 'headings',
            'rules' => 'trim|required|xss_clean',
		)
      );
    public function get_new()
    {
        $paragraph = array(
                'brief_id'=>'',
                'paragraph_title'=>'',
                'heading'=>''
        );
        return $paragraph;
    }

    public function get_paragraph_by_brief($brief_id)
    {
        $this->db->select('*');
        $this->db->from('article_brief_paragraph');
        $this->db->where('brief_id', $brief_id);
        $this->db->order_by("brief_para_id", "asc");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
