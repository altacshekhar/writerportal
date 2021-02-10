<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linkarticle_model extends MY_Model
{
    protected $_table_name = 'link_wp_articles';
    protected $_primary_key = 'link_wp_articles_id';

      protected $_brief_id;
      
      public function getTableName()
      {
          return $this->_table_name;
      }
  
      public function getTablePrimaryKey()
      {
          return $this->_primary_key;
      }
      public function get_new()
    {
        $wp_articles = new stdClass();
        $wp_articles->article_wp_id = '';
		$wp_articles->campaign_id = '';
		$wp_articles->article_wp_url = '';
		$wp_articles->article_anchortext = '';
        return (array) $wp_articles;
	}

    public function get_link_wp_articles($campaign_id)
    {
        $this->load->model('campaign_model');
        $table_link_campaigns = $this->campaign_model->getTableName();
        $table_link_campaigns_PK = $this->campaign_model->getTablePrimaryKey();
        $table_link_wp_articles = $this->getTableName();
        $table_link_wp_articles_PK = $this->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_link_wp_articles);
		$this->db->join($table_link_campaigns, 'link_campaigns.campaign_id = link_wp_articles.campaign_id', 'LEFT');
        $this->db->where($table_link_wp_articles.'.campaign_id', (int) $campaign_id);
		$this->db->order_by($table_link_wp_articles.'.link_wp_articles_id', "asc");       
        $query = $this->db->get();
        $list_backlink = array();
		if($query->num_rows()>0)
        {
			//pre($query->result());
			foreach ($query->result() as $row)
            {
                $list_backlink[$row->link_wp_articles_id] = (array) $row;

                $list_backlink[$row->link_wp_articles_id]['article_anchortext'] = explode(",", $row->article_anchortext);

            }
        }else{

            $list_backlink =  array();
        }

        return $list_backlink;
    }

    public function delete($backlink_id){

		parent::delete($backlink_id);
		
	}

}
