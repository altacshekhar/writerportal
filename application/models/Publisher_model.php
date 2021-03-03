<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publisher_model extends MY_Model
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

	/*public $rules_publisher = array(
        'publisher_first_name ' => array(
            'field' => 'publisher_first_name',
            'label' => 'first name',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_last_name ' => array(
            'field' => 'publisher_last_name',
            'label' => 'last name',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_email ' => array(
            'field' => 'publisher_email',
            'label' => 'email',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_phone ' => array(
            'field' => 'publisher_phone',
            'label' => 'phone',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_notes ' => array(
            'field' => 'publisher_notes',
            'label' => 'notes',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_niche ' => array(
            'field' => 'publisher_niche',
            'label' => 'niche',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_type ' => array(
            'field' => 'publisher_type',
            'label' => 'type',
            'rules' => 'trim|required|xss_clean',
        ),
        'publisher_url' => array(
            'field' => 'publisher_url',
            'label' => 'url',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_url_traffic' => array(
            'field' => 'publisher_url_traffic',
            'label' => 'traffic',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_url_domainauthority' => array(
            'field' => 'publisher_url_domainauthority',
            'label' => 'domainauthority',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_estimated_cost' => array(
            'field' => 'publisher_estimated_cost',
            'label' => 'estimated cost',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_requirements' => array(
            'field' => 'publisher_requirements',
            'label' => 'url',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_status' => array(
            'field' => 'publisher_status',
            'label' => 'status',
            'rules' => 'trim|required|xss_clean',
		)
	);*/
	
	public $rules_publisher = array(
            'publisher_first_name' => array(
            'field' => 'publisher_first_name',
            'label' => 'first name',
            'rules' => 'trim|xss_clean',
		),
		'publisher_last_name' => array(
            'field' => 'publisher_last_name',
            'label' => 'last name',
            'rules' => 'trim|xss_clean',
		),
		'publisher_email' => array(
            'field' => 'publisher_email',
            'label' => 'email',
            'rules' => 'trim|xss_clean',
		),
		// 'publisher_niche[]' => array(
            // 'field' => 'publisher_niche[]',
            // 'label' => 'niche',
            // 'rules' => 'trim|required|xss_clean',
		// ),
		'publisher_type[]' => array(
            'field' => 'publisher_type[]',
            'label' => 'type',
            'rules' => 'trim|required|xss_clean',
            ),
            'publisher_website[]' => array(
                  'field' => 'publisher_websites[]',
                  'label' => 'websites',
                  'rules' => 'trim|required|xss_clean',
            ),
            'publisher_url' => array(
            'field' => 'publisher_url',
            'label' => 'url',
            'rules' => 'trim|required|xss_clean',
		),
		'publisher_url_traffic' => array(
            'field' => 'publisher_url_traffic',
            'label' => 'traffic',
            'rules' => 'trim|xss_clean',
		),
		'publisher_url_domainauthority' => array(
            'field' => 'publisher_url_domainauthority',
            'label' => 'domainauthority',
            'rules' => 'trim|xss_clean',
            ),
		'publisher_url_referringdomains' => array(
            'field' => 'publisher_url_referringdomains',
            'label' => 'referringdomains',
            'rules' => 'trim|xss_clean',
		),
		'publisher_estimated_cost' => array(
            'field' => 'publisher_estimated_cost',
            'label' => 'estimated cost',
            'rules' => 'trim|xss_clean',
		),
		'publisher_status' => array(
            'field' => 'publisher_status',
            'label' => 'status',
            'rules' => 'trim|required|xss_clean',
		)
    );
      public function get_new()
      {
            $publisher = array(
                  'publisher_first_name'=>'',
                  'publisher_last_name'=>'',
                  'publisher_email'=>'',
                  'publisher_phone'=>'',
                  'publisher_notes'=>'',
                  'publisher_niche'=>'',
                  'publisher_type'=>'',
                  'publisher_url'=>'',
                  'publisher_url_traffic'=>'',
                  'publisher_url_domainauthority'=>'',
                  'publisher_url_referringdomains'=>'',
                  'publisher_estimated_cost'=>'',
                  'publisher_requirements'=>'',
                  'publisher_status'=>''
            );
            return $publisher;
      }
      
      private function _get_datatables_query($post_array)
      {
            $this->load->model('article_model');

            $table_publisher = $this->getTableName();
            $table_publisher_PK = $this->getTablePrimaryKey();
            //pre_exit($post_array);
            //$table_article = $this->article_model->getTableName();
            //$table_article_PK = $this->article_model->getTablePrimaryKey();
            $column_order = array(
                  $table_publisher.'.publisher_url',
                  $table_publisher . '.publisher_niche',
                  $table_publisher . '.publisher_type',
                  $table_publisher . '.publisher_url_domainauthority',
                  $table_publisher . '.publisher_url_referringdomains',
                  $table_publisher . '.publisher_estimated_cost',
                  $table_publisher . '.publisher_status',
                  $table_publisher . '.date_added',
            );
            $column_search_global = array(
                  $table_publisher . '.publisher_first_name',
                  $table_publisher . '.publisher_last_name',
                  $table_publisher . '.publisher_niche',
                  $table_publisher . '.publisher_type',
                  $table_publisher . '.publisher_notes',
                  $table_publisher . '.publisher_status',
                  $table_publisher . '.publisher_url',
            );
            $column_search = array(
                  $table_publisher . '.publisher_type',
                  $table_publisher . '.publisher_status',
            );
              $order = array(
                    $table_publisher . '.publisher_url' => 'ASC'
              ); // default order
  
              $this->db->select($table_publisher.'.*');
              $this->db->from($table_publisher);
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
                              $this->db->where($column_search[$key], $column_array['search']['value']);
                        }
                  }
            }
            if(isset($post_array['order'])) // here order processing
            {
                  if($post_array['order']['0']['column'] == 0)
                  {
                        $this->db->order_by("substring(".$column_order[$post_array['order']['0']['column']].",'.*://([^/]*)')", $post_array['order']['0']['dir'],false);
                  }
                  else if($post_array['order']['0']['column'] == 3 || $post_array['order']['0']['column'] == 4 || $post_array['order']['0']['column'] == 5)
                  {
                        $this->db->order_by("TO_NUMBER(".$column_order[$post_array['order']['0']['column']].",'9G999g999')", $post_array['order']['0']['dir'],false);
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
            $this->db->group_by($table_publisher. '.' . $table_publisher_PK);
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

      public function isDomainRootExist($domain = '')
      {
            $this->db->from($this->_table_name);
            $this->db->like($this->_table_name.'.publisher_url',$domain);
            $query = $this->db->get();
            return $query->num_rows();
      }

}
