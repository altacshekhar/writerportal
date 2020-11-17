<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlebriefbacklink_model extends MY_Model
{
    protected $_table_name = 'link_brief_backlinks';
    protected $_primary_key = 'backlink_id';


      
      public function getTableName()
      {
          return $this->_table_name;
      }
  
      public function getTablePrimaryKey()
      {
          return $this->_primary_key;
      }


    public function getUserBriefBacklinks($wp_link_article_id )
	{
		$this->db->select('*');
		$this->db->from('link_wp_articles');
		$this->db->join('link_briefs','link_briefs.link_wp_articles_id = link_wp_articles.link_wp_articles_id','left');
		$this->db->join('link_brief_backlinks','link_brief_backlinks.brief_id = link_briefs.brief_id','left');
		$this->db->where('link_wp_articles.link_wp_articles_id',$wp_link_article_id);
		return $this->db->get()->result();
	}

}
