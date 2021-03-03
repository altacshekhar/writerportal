<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Website_model extends MY_Model
{
    protected $_table_name = 'wp_wbsite_default_settings';
    protected $_primary_key = 'wds_id';
	protected $_order_by = '';
	protected $_timestamps = false;

    public $rules_wbsite_default_settings = array(
        'website' => array(
            'field' => 'website',
            'label' => 'website',
            'rules' => 'trim|required',
        ),
        'default_meta_product' => array(
            'field' => 'default_meta_product',
            'label' => 'default meta product',
            'rules' => 'trim|required',
        ),
        'available_blog_categories' => array(
            'field' => 'available_blog_categories',
            'label' => 'available blog categories',
            'rules' => 'trim|required',
        )
    );

    public function __construct()
    {
        parent::__construct();
    }

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
        $default_settings = array(
			'website'=>'',
            'default_meta_product'=>'',
            'available_blog_categories'=>'',
            'rakefile'=>''
		);
        return $default_settings;
	}


	private function _get_datatables_query($post_array)
    {

		$table_wbsite_default_settings = $this->getTableName();
        $table_wbsite_default_settings_PK = $this->getTablePrimaryKey();

		$column_order = array(
			$table_wbsite_default_settings . '.wds_id',
			$table_wbsite_default_settings . '.website',
			$table_wbsite_default_settings . '.default_meta_product',
            $table_wbsite_default_settings . '.available_blog_categories',
            $table_wbsite_default_settings . '.rakefile',
			'total_wbsites'
		);
		$column_search_global = array(
			$table_wbsite_default_settings . '.website',
			$table_wbsite_default_settings . '.default_meta_product'
		);
		$column_search = array(
			$table_wbsite_default_settings . '.website',
			$table_wbsite_default_settings . '.default_meta_product');
		//$order = array(
			//$table_user . '.date_modified' => 'DESC'
		//); // default order

		$this->db->select($table_wbsite_default_settings.'.*, COUNT('.$table_wbsite_default_settings.'.wds_id) as total_wbsites');
		$this->db->from($table_wbsite_default_settings);
		/*$this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK", 'RIGHT'
		);
		$i = 0;

        foreach ($column_search_global as $item) // loop column
        {
			$search_value = $post_array['search']['value'];
            if( $search_value)
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, strtolower($search_value));
                }
                else
                {
                    $this->db->or_like($item, strtolower($search_value));
                }
                if(count($column_search_global) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
		}*/

		if(isset($post_array['columns'])){
			foreach ($post_array['columns'] as $key=>$column_array)
			{
				if($column_array['searchable'] && $column_array['search']['value']){
					$this->db->where($column_search[$key], strtolower($column_array['search']['value']));
				}
			}
		}

        if(isset($post_array['order'])) // here order processing
        {
            $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
		}

		$this->db->group_by($table_wbsite_default_settings. '.' . $table_wbsite_default_settings_PK);
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
