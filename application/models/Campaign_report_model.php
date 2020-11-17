<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign_report_model extends MY_Model
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

    private function _get_datatables_query($post_array)
    {
        $this->load->model('user_model');
        $this->load->model('articlebrief_model');
        $table_campaign = $this->getTableName();
        $table_campaign_PK = $this->getTablePrimaryKey();
        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();
        $table_link_briefs = $this->articlebrief_model->getTableName();
        $table_link_briefs_PK = $this->articlebrief_model->getTablePrimaryKey();
        // $column_order = array(
        //     $table_campaign . '.campaign_content_coordinator'
        // );
        $column_order = array('user_name');
        // $column_search_global = array(
        //     $table_publisher . '.publisher_createdby',
        //     $table_publisher . '.date_added'
        // );
        $column_search = array(
            $table_campaign . '.campaign_content_coordinator',
            $table_campaign . '.date_added',
            $table_campaign . '.date_added'
        );
        $order = array(
            'user_name' => 'ASC'
        ); // default order

        $this->db->select('count('.$table_link_briefs.'.campaign_id) as article_count',false);
        $this->db->select('count(distinct '.$table_campaign.'.campaign_id) as campaign_count',false);
        $this->db->select('CONCAT('.$table_user.'.user_fname,\' \','.$table_user.'.user_lname) as user_name', false);
        $this->db->select('string_agg(distinct '.$table_campaign.'.campaign_name,\'<br>\') as campaigns',false);
        $this->db->from($table_campaign);
        $this->db->join($table_user,$table_user.'.user_id = '.$table_campaign.'.campaign_content_coordinator','left');
        $this->db->join($table_link_briefs,$table_link_briefs.'.campaign_id = '.$table_campaign.'.campaign_id','left');
        $i = 0;
        if(isset($post_array['columns'])){
            foreach ($post_array['columns'] as $key=>$column_array)
            {
                if($column_array['searchable'] && $column_array['search']['value'] != ''){
                    if($key == 0)
                        $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
                    elseif($key == 1)
                        $this->db->where($column_search[$key].' >= ', strtolower($column_array['search']['value']));
                    elseif($key == 2)
                        $this->db->where($column_search[$key].' <= ', strtolower($column_array['search']['value']));
                }
            }
        }
        //pre($post_array['order']);
        if(isset($post_array['order'])) // here order processing
        {
            $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
        }
        //pre_exit($order);
        //$this->db->group_by($table_link_briefs.'.campaign_id');
        $this->db->group_by($table_campaign. '.campaign_content_coordinator');
        $this->db->group_by($table_user. '.user_fname');
        $this->db->group_by($table_user. '.user_lname');
        //$this->db->group_by($table_link_briefs. '.brief_id');
    }
  
    function get_datatables($post_array)
    {
        $this->_get_datatables_query($post_array);
        if($post_array['length'] != -1)
        $this->db->limit($post_array['length'], $post_array['start']);
        $query = $this->db->get();
        //   $this->db->last_query();
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
