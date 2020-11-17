<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{
    protected $_table_name = 'category';
	protected $_primary_key = 'category_id';
	protected $_order_by = 'category_id';
	protected $_timestamps = false;

 public $rules_category = array(
        'category_name' => array(
            'field' => 'category_name',
            'label' => 'Category Name',
            'rules' => 'trim|required|xss_clean|min_length[3]|max_length[50]|xss_clean',
        ),
        'category_slug' => array(
            'field' => 'category_slug',
            'label' => 'Category Slug',
            'rules' => 'trim|required|xss_clean|min_length[3]|max_length[50]',
        ),

    );

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
        return array(
            'category_parent'=>'',
            'category_name'=>'',
            'category_slug'=>''
        );
    }

    public function get_category($cat){
        //$where = 'category_parent="' . $cat . '"';
        $where = "category_parent='$cat'";
		$result_array = $this->get_by( $where);
		return json_decode(json_encode($result_array), TRUE);
    }
    public function get_category_by_array($cat){
        //$where = 'category_parent="' . $cat . '"';
        $where = "category_parent='$cat'";
        $result_array = $this->get_by( $where);
        $return_array = array(''=> 'Select Category');
        foreach($result_array as $row){
            $return_array[$row->category_slug] = $row->category_name;
        }
		return json_decode(json_encode($return_array), TRUE);
    }

    public function get_category_json($cat){
        //$where = 'category_parent="' . $cat . '"';
        $where = "category_parent='$cat'";
        $result_array = $this->get_by( $where);
        $return_array = array();
        foreach($result_array as $row){
            $return_array[$row->category_slug] = $row->category_name;
        }
		return json_encode($return_array);
    }


	public function _get_datatables_query($post_array)
    {
		$table_cat = $this->getTableName();

		$column_order = array(
			'category_id', 'category_parent', 'category_name', 'category_slug'
		);
		$column_search_global = $column_order;

		$order = array(
			'category_id' => 'DESC'
		); // default order

		$this->db->select('*');
		$this->db->from($table_cat);

		//pre($post_array);
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
