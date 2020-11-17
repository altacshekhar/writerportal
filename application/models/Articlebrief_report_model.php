<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlebrief_report_model extends MY_Model
{
    protected $_table_name = 'link_briefs';
    protected $_primary_key = 'brief_id';
    protected $_timestamps = true;
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
        $this->load->model('user_model');
        $this->load->model('linkbuilding_article_i18_model');
        $this->load->model('linkbuilding_article_model');
        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();
        $table_link_briefs = $this->getTableName();
        $table_link_briefs_PK = $this->getTablePrimaryKey();
        $table_link_articles = $this->linkbuilding_article_model->getTableName();
        $table_link_articles_PK = $this->linkbuilding_article_model->getTablePrimaryKey();
        $table_link_articles_i18 = $this->linkbuilding_article_i18_model->getTableName();
        $table_link_articles_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();
        // $column_order = array(
        //     $table_campaign . '.campaign_content_coordinator'
        // );
        $column_order = array('user_name');
        // $column_search_global = array(
        //     $table_publisher . '.publisher_createdby',
        //     $table_publisher . '.date_added'
        // );
        $column_search = array(
            $table_link_briefs . '.brief_article_writer',
            $table_link_briefs . '.date_added',
            $table_link_briefs . '.date_added'
        );
        $order = array(
            'user_name' => 'ASC'
        ); // default order
        $this->db->select('string_agg(distinct '.$table_link_articles_i18.'.article_title,\'<br>\') as article_title',false);
        $this->db->select('CONCAT('.$table_user.'.user_fname,\' \','.$table_user.'.user_lname) as user_name', false);
        $this->db->select('SUM(CASE WHEN '.$table_link_articles_i18.'.article_status = \'submitted\' THEN 1 ELSE 0 END) as submitted',false);
        $this->db->select('SUM(CASE WHEN '.$table_link_articles_i18.'.article_status = \'draft\' THEN 1 ELSE 0 END) as draft',false);
        $this->db->select('SUM(CASE WHEN '.$table_link_articles_i18.'.article_status = \'pending\' THEN 1 ELSE 0 END) as pending',false);
        $this->db->select('SUM(CASE WHEN '.$table_link_articles_i18.'.article_status = \'published\' THEN 1 ELSE 0 END) as published',false);
        $this->db->select('SUM(CASE WHEN '.$table_link_articles_i18.'.article_status = \'approved\' THEN 1 ELSE 0 END) as approved',false);
        $this->db->from($table_link_briefs);
        $this->db->join($table_user,$table_user.'.user_id = cast(coalesce(nullif('.$table_link_briefs.'.brief_article_writer,\'\'),\'0\') as bigint)','left');
        $this->db->join($table_link_articles,$table_link_articles.'.brief_id = '.$table_link_briefs.'.brief_id','left');
        $this->db->join($table_link_articles_i18,$table_link_articles_i18.'.article_id = '.$table_link_articles.'.article_id','left');
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
        $this->db->where($table_link_briefs.'.brief_article_writer !=','');
        //$this->db->where($table_link_articles_i18.'.article_title !=','');
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
        $this->db->group_by($table_link_briefs. '.brief_article_writer');
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
