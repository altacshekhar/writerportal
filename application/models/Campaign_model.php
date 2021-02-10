<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign_model extends MY_Model
{
    protected $_table_name = 'link_campaigns';
    protected $_primary_key = 'campaign_id';
    protected $_timestamps = true;

      protected $_campaign_id;
      
      public function getTableName()
      {
          return $this->_table_name;
      }
  
      public function getTablePrimaryKey()
      {
          return $this->_primary_key;
      }
	public $rules_campaign = array(
            'campaign_name' => array(
            'field' => 'campaign_name',
            'label' => 'campaign name',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_budget' => array(
            'field' => 'campaign_budget',
            'label' => 'campaign budget',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_quantity' => array(
            'field' => 'campaign_quantity',
            'label' => 'campaign quantity',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_startdate' => array(
            'field' => 'campaign_startdate',
            'label' => 'campaign startdate',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_enddate' => array(
            'field' => 'campaign_enddate',
            'label' => 'campaign enddate',
            'rules' => 'trim|required|xss_clean',
            ),
            'campaign_websites[]' => array(
            'field' => 'campaign_websites[]',
            'label' => 'campaign websites',
            'rules' => 'trim|required|xss_clean',
		),
		// 'campaign_niche[]' => array(
            // 'field' => 'campaign_niche[]',
            // 'label' => 'campaign niche',
            // 'rules' => 'trim|required|xss_clean',
		// ),
		'campaign_type' => array(
            'field' => 'campaign_type[]',
            'label' => 'campaign type',
            'rules' => 'trim|required|xss_clean',
            ),
		'campaign_content_coordinator' => array(
            'field' => 'campaign_content_coordinator',
            'label' => 'campaign content coordinator',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_outreach_coordinator' => array(
            'field' => 'campaign_outreach_coordinator',
            'label' => 'campaign outreach coordinator',
            'rules' => 'trim|required|xss_clean',
		),
		'campaign_status' => array(
            'field' => 'campaign_status',
            'label' => 'campaign status',
            'rules' => 'trim|required|xss_clean',
            ),
            'form_action' => array(
            'field' => 'form_action',
            'label' => 'form action',
            'rules' => 'trim|required|xss_clean',
            )
    );
      public function get_new()
      {
            $campaign = array(
                  'campaign_name'=>'',
                  'campaign_budget'=>'',
                  'campaign_quantity'=>'',
                  'campaign_startdate'=>'',
                  'campaign_enddate'=>'',
                  'campaign_notes'=>'',
                  'campaign_websites'=>'',
                  'campaign_niche'=>'',
                  'campaign_type'=>'',
                  'campaign_content_coordinator'=>'',
                  'campaign_outreach_coordinator'=>'',
                  'campaign_writer'=>'',
                  'campaign_status'=>''
            );
            return $campaign;
      }

      public function campaignBriefDetails($campaign_id = '')
      {
            $table_campaign = $this->getTableName();
            $table_campaign_PK = $this->getTablePrimaryKey();
            $this->load->model('campaign_publisher_model');
            $table_campaign_publisher = $this->campaign_publisher_model->getTableName();
            $table_campaign_publisher_PK = $this->campaign_publisher_model->getTablePrimaryKey();
            $this->load->model('articlebrief_model');
            $table_link_briefs = $this->articlebrief_model->getTableName();
            $table_link_briefs_PK = $this->articlebrief_model->getTablePrimaryKey();
            $this->db->select('string_agg(distinct '.$table_link_briefs.'.publisher_id::character varying,\',\') as publisher_cnt',false);
            $this->db->select('string_agg(distinct '.$table_link_briefs.'.brief_article_writer,\',\') as brief_article_writer',false);
            $this->db->from($table_campaign);
            $this->db->join($table_campaign_publisher,$table_campaign_publisher.'.campaign_id = '.$table_campaign.'.'.$table_campaign_PK,'left');
            $this->db->join($table_link_briefs,$table_link_briefs.'.campaign_id = '.$table_campaign.'.campaign_id','left');
            $this->db->where($table_link_briefs.'.'.$table_campaign_PK,$campaign_id);
            $this->db->group_by($table_link_briefs.'.'.$table_campaign_PK);
            return $this->db->get()->result();
      }
      
      private function _get_datatables_query($post_array)
      {
            $this->load->model('publisher_model');
            $this->load->model('campaign_publisher_model');
            $this->load->model('articlebrief_model');
            $table_campaign = $this->getTableName();
            $table_campaign_PK = $this->getTablePrimaryKey();
            $table_campaign_publisher = $this->campaign_publisher_model->getTableName();
            $table_campaign_publisher_PK = $this->campaign_publisher_model->getTablePrimaryKey();
            $table_publisher = $this->publisher_model->getTableName();
            $table_publisher_PK = $this->publisher_model->getTablePrimaryKey();
            $table_link_briefs = $this->articlebrief_model->getTableName();
            $table_link_briefs_PK = $this->articlebrief_model->getTablePrimaryKey();
            $column_order = array(
                  $table_campaign . '.campaign_startdate',
                  $table_campaign . '.campaign_enddate',
                  $table_campaign . '.campaign_name',
                  $table_publisher . '.publisher_url',
                  '',
                  '',
                  $table_campaign . '.campaign_quantity',
                  $table_campaign . '.campaign_content_coordinator',
            );
            $column_search_global = array(
                  $table_campaign . '.campaign_name',
                  $table_campaign . '.campaign_websites',
                  $table_campaign . '.campaign_niche',
                  $table_campaign . '.campaign_type',
            );
            $column_search = array(
            $table_campaign . '.campaign_type');
            $order = array(
                  $table_campaign . '.campaign_startdate' => 'ASC'
            ); // default order

            $this->db->select($table_campaign.'.*');
            $this->db->select('string_agg(distinct '.$table_publisher.'.publisher_url,\',\') as publisher_url',false);
            $this->db->from($table_campaign);
            $this->db->join($table_campaign_publisher,$table_campaign_publisher.'.campaign_id = '.$table_campaign.'.campaign_id','left');
            $this->db->join($table_publisher,$table_publisher.'.publisher_id = '.$table_campaign_publisher.'.publisher_id','left');
            $i = 0;
            foreach ($column_search_global as $item) // loop column
            {
                  $search_value = $post_array['search']['value'];
                  if( $search_value)
                  {
                        if($i===0) // first loop
                        {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like('LOWER(' .$item. ')', strtolower($search_value));
                        }
                        else
                        {
                        $this->db->or_like('LOWER(' .$item. ')', strtolower($search_value));
                        }
                        if(count($column_search_global) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                  }
                  $i++;
            }
            if(isset($post_array['columns'])){
                  foreach ($post_array['columns'] as $key=>$column_array)
                  {
                        if($column_array['searchable'] && $column_array['search']['value']!=''){
                              $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
                        }
                  }
            }
            if(isset($post_array['order'])) // here order processing
            {
                  if($post_array['order']['0']['column'] == 3)
                  {
                        $this->db->order_by("string_agg(distinct link_publishers.publisher_url, ', ')", $post_array['order']['0']['dir'],false);
                  }
                  else
                  {
                        $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
                  }
            }
            else if(isset($this->order))
            {
                  $order = $this->order;
                  $this->db->order_by(key($order), $order[key($order)]);
            }
            $this->db->group_by($table_campaign. '.' . $table_campaign_PK);
      }
  
      function get_datatables($post_array)
      {
          $this->_get_datatables_query($post_array);
          if($post_array['length'] != -1)
          $this->db->limit($post_array['length'], $post_array['start']);
              $query = $this->db->get();
              //log_message("ERROR", $this->db->last_query());
          return $query->result();
      }
  
      function count_filtered($post_array)
      {
          $this->_get_datatables_query($post_array);
              $query = $this->db->get();
  
          return $query->num_rows();
      }
  
      public function count_all()
      {
          $this->db->from($this->_table_name);
          return $this->db->count_all_results();
      }

}
