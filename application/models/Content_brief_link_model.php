<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content_brief_link_model extends MY_Model
{
    protected $_table_name = 'content_brief_article_links';
	protected $_primary_key = 'content_brief_link_id';
	protected $_timestamps = false;



    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

    public function get_brief_link_list($brief_id, $link_type)
    {
        $table_content_brief_article_links = $this->getTableName();
        $table_content_brief_article_links_PK = $this->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_content_brief_article_links);
        $this->db->where($table_content_brief_article_links.'.brief_id', (int) $brief_id);
		$this->db->where($table_content_brief_article_links.'.content_brief_link_type', $link_type); 
		$this->db->order_by($table_content_brief_article_links.'.content_brief_link_id', "asc");       
		//$query = $this->db->get()->row_array();
		$query = $this->db->get();
	//	pre($this->db->last_query());
	//	pre($query);
		$list_link = array();
		if($query->num_rows()>0)
        {
			//pre($query->result());
			foreach ($query->result() as $row)
            {
				$list_link[$row->content_brief_articles_id]['link_id'] = $row->content_brief_link_id;
                $list_link[$row->content_brief_articles_id]['id'] = $row->content_brief_articles_id;
                $list_link[$row->content_brief_articles_id]['text'] = $row->content_brief_anchor_text;
                $list_link[$row->content_brief_articles_id]['url'] = $row->content_brief_url;
                $list_link[$row->content_brief_articles_id]['type'] = $row->content_brief_link_type;
			}

		}
		else
        {
			
		}
		//pre($list_link);
		return $list_link;
	}
    public function deleteSitelink($id){
        $this->db->where('content_brief_link_id', $id);
        $this->db->delete($this->_table_name);
    }
    public function deleteCrosslink($id){
        $this->db->where('content_brief_link_id', $id);
        $this->db->delete($this->_table_name);
    }
    public function get_link_list($brief_id){
        //$this->db->where('content_brief_link_id', $id);
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where($this->_table_name.'.brief_id', (int) $brief_id);
		$this->db->order_by($this->_table_name.'.content_brief_link_id', "asc");       
		//$query = $this->db->get()->row_array();
		$query = $this->db->get();
        $list_link = array();
		if($query->num_rows()>0)
        {
			//pre($query->result());
			foreach ($query->result() as $row)
            {
                $list_link[$row->content_brief_articles_id]['link_id'] = $row->content_brief_link_id;
                $list_link[$row->content_brief_articles_id]['id'] = $row->content_brief_articles_id;
                $list_link[$row->content_brief_articles_id]['text'] = $row->content_brief_anchor_text;
                $list_link[$row->content_brief_articles_id]['url'] = $row->content_brief_url;
                $list_link[$row->content_brief_articles_id]['type'] = $row->content_brief_link_type;
                $list_link[$row->content_brief_articles_id]['used'] = $row->is_used;
			}

		}
        return $list_link;
    }
    

}