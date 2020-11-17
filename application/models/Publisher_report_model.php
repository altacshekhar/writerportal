<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher_report_model extends MY_Model
{
    protected $_table_name = 'link_publishers';
    protected $_primary_key = 'publisher_id';
    protected $_timestamps = true;

      protected $_publisher_id;
      
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
            $table_publisher = $this->getTableName();
            $table_publisher_PK = $this->getTablePrimaryKey();
            $table_user = $this->user_model->getTableName();
            $table_user_PK = $this->user_model->getTablePrimaryKey();
            $column_order = array(
                $table_publisher . '.publisher_createdby',
                $table_publisher . '.date_added',
                $table_publisher . '.date_added'
            );
            // $column_search_global = array(
            //     $table_publisher . '.publisher_createdby',
            //     $table_publisher . '.date_added'
            // );
            $column_search = array($table_publisher . '.publisher_createdby', $table_publisher . '.date_added',
            $table_publisher . '.date_added');
            $order = array(
                $table_publisher . '.publisher_url' => 'ASC'
            ); // default order

            $this->db->select('count('.$table_publisher.'.publisher_id) as publisher_count',false);
            $this->db->select('CONCAT('.$table_user.'.user_fname,\' \','.$table_user.'.user_lname) as user_name', false);
            $this->db->select('string_agg('.$table_publisher.'.publisher_url,\'<br>\') as publisher_url',false);
            $this->db->from($table_publisher);
            $this->db->join($table_user,$table_user.'.user_id = '.$table_publisher.'.publisher_createdby','left');
            $i = 0;
            if(isset($post_array['columns'])){
                foreach ($post_array['columns'] as $key=>$column_array)
                {
                    if($column_array['searchable'] && $column_array['search']['value'] != ''){
                        //echo $key;
                        if($key == 0)
                            $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
                        elseif($key == 1)
                            $this->db->where($column_search[$key].' >= ', strtolower($column_array['search']['value']));
                        elseif($key == 2)
                            $this->db->where($column_search[$key].' <= ', strtolower($column_array['search']['value']));
                    }
                }
            }
              
            //pre_exit($post_array);
            if(isset($post_array['order'])) // here order processing
            {
                $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
            }
            else if(isset($this->order))
            {
                  $order = $this->order;
                  $this->db->order_by(key($order), $order[key($order)]);
            }
            $this->db->group_by($table_publisher. '.publisher_createdby');
            $this->db->group_by($table_user. '.user_fname');
            $this->db->group_by($table_user. '.user_lname');
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
