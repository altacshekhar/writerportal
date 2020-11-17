<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Livelink_model extends MY_Model
{
    protected $_table_name = 'link_briefs';
    protected $_primary_key = 'brief_id';

      protected $_brief_id;
      
      public function getTableName()
      {
          return $this->_table_name;
      }
  
      public function getTablePrimaryKey()
      {
          return $this->_primary_key;
      }
      
      private function _get_datatables_query($post_array)
      {
            $this->load->model('campaign_model');
            $this->load->model('linkarticle_model');
            $this->load->model('publisher_model');
            $this->load->model('linkbuilding_article_model');
            $this->load->model('linkbuilding_article_i18_model');

            $table_link_briefs = $this->getTableName();
            $table_link_briefs_PK = $this->getTablePrimaryKey();
            $table_link_briefs_brief_id = 'brief_id';

            $table_link_brief_backlinks = 'link_brief_backlinks';
            $table_link_brief_backlinks_PK = 'backlink_id';
            $table_link_brief_backlinks_brief_id = 'brief_id';
            //$table_article = $this->article_model->getTableName();
            //$table_article_PK = $this->article_model->getTablePrimaryKey();
  
              $column_order = array(
                    //$table_link_briefs . '.campaign_startdate',
                    $table_link_briefs . '.brief_live_url',
                    //$table_link_briefs . '.campaign_websites',
                    $table_link_briefs . '.brief_article_cost',
                    $table_link_briefs . '.brief_live_validation_date',
                    $table_link_briefs . '.brief_live_validation_status',
              );
              $column_search_global = array(
                    $table_link_briefs . '.brief_live_url',
                    $table_link_briefs . '.brief_live_validation_status',
                    $table_link_briefs . '.brief_article_cost',
              );
              $column_search = array(
              $table_link_briefs . '.brief_live_validation_status');
              $order = array(
                    $table_link_briefs . '.brief_live_validation_date' => 'DESC'
              ); // default order
  
              $this->db->select($table_link_briefs.'.*, COUNT('.$table_link_brief_backlinks.'.brief_id) as total_backlink');
              $this->db->from($table_link_briefs);
              $this->db->join(
                $table_link_brief_backlinks,
                "$table_link_brief_backlinks.$table_link_brief_backlinks_brief_id = $table_link_briefs.$table_link_briefs_brief_id", 'inner'
                );
                //$this->db->where($table_link_briefs . '.brief_article_status', 'Published - Live Link');
                $this->db->like($table_link_briefs . '.brief_article_status', 'Published - Live Link');
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
            $this->db->where('is_deleted',null);
            $this->db->or_where('is_deleted',0);
          if(isset($post_array['order'])) // here order processing
          {
              $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
          }
          else if(isset($this->order))
          {
              $order = $this->order;
              $this->db->order_by(key($order), $order[key($order)]);
              }
  
              $this->db->group_by($table_link_briefs. '.' . $table_link_briefs_PK);
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

      public function get_all_live_link($brief_id){
        $list_backlink = array();
        $this->load->model('publisher_model');
        $this->load->model('campaign_model');
        $table_link_briefs = $this->getTableName();
        $table_link_briefs_PK = $this->getTablePrimaryKey();
        $table_link_briefs_publisher_id = 'publisher_id';
        $table_link_briefs_campaign_id = 'campaign_id';
        $table_link_briefs_brief_id = 'brief_id';

        $table_link_publishers = $this->publisher_model->getTableName();
        $table_link_publishers_PK = $this->publisher_model->getTablePrimaryKey();
        $table_link_publishers_publisher_id = 'publisher_id';

        $table_link_campaigns = $this->campaign_model->getTableName();
        $table_link_pcampaigns_PK = $this->campaign_model->getTablePrimaryKey();
        $table_link_campaigns_campaign_id = 'campaign_id';

        $table_link_brief_backlinks = 'link_brief_backlinks';
        $table_link_brief_backlinks_PK = 'backlink_id';
        $table_link_brief_backlinks_brief_id = 'brief_id';

        $this->db->select('*');
        $this->db->from($table_link_briefs);
        $this->db->join(
            $table_link_brief_backlinks,
            "$table_link_brief_backlinks.$table_link_brief_backlinks_brief_id = $table_link_briefs.$table_link_briefs_brief_id", 'inner'
            );
        // $this->db->join(
        // $table_link_publishers,
        // "$table_link_publishers.$table_link_publishers_publisher_id = $table_link_briefs.$table_link_briefs_publisher_id", 'inner'
        // );
        // $this->db->join(
        //     $table_link_campaigns,
        //     "$table_link_campaigns.$table_link_campaigns_campaign_id = $table_link_briefs.$table_link_briefs_campaign_id", 'inner'
        //     );
        $this->db->like($table_link_briefs . '.brief_article_status', 'Published - Live Link');
        $this->db->where($table_link_briefs . '.brief_id', $brief_id);
        $queryrs = $this->db->get();
        return $queryrs->result();
        // if($queryrs->num_rows()>0)
        // {
        //     return $queryrs->result();
            // foreach ($queryrs->result() as $key=>$row)
            // {
            //     $list_backlink = $row;
                //$list_backlink= $row;
                // $list_backlink[$row->brief_id]['brief_id'] =$row->brief_id;
                // $list_backlink[$row->brief_id]['campaign_id'] =$row->campaign_id;
                // $list_backlink[$row->brief_id]['publisher_id'] =$row->publisher_id;
                // $list_backlink[$row->brief_id]['brief_live_url'] =$row->brief_live_url;
                // $list_backlink[$row->brief_id]['publisher_first_name'] =$row->publisher_first_name;
                // $list_backlink[$row->brief_id]['publisher_last_name'] =$row->publisher_last_name;
                // $list_backlink[$row->brief_id]['publisher_email'] =$row->publisher_email;
                // $list_backlink[$row->brief_id]['publisher_status'] =$row->publisher_status;
                // $list_backlink[$row->brief_id]['brief_article_status'] =$row->brief_article_status;
                // $list_backlink[$row->brief_id]['brief_live_validation_status'] =$row->brief_live_validation_status;
                // $list_backlink[$row->brief_id]['campaign_outreach_coordinator'] =$row->campaign_outreach_coordinator;
                // $list_backlink[$row->brief_id]['backlinks'][$row->backlink_id] = array(
				// 	'brief_id' => $row->brief_id,
				// 	'backlink_id' => $row->backlink_id,
				// 	'backlink_url' => $row->backlink_url,
				// 	'backlink_anchortext' => $row->backlink_anchortext,					
				// );
               
            // }
        // }
        // return $list_backlink;

      }

}
