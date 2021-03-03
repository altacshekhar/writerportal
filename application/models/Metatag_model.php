<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Metatag_model extends MY_Model
{
    protected $_table_name = 'wp_meta_product_lookup';
    protected $_primary_key = 'lookup_id';
	protected $_order_by = '';
	protected $_timestamps = false;

    public $rules_meta_tags_config = array(
        'meta_product_language_id' => array(
            'field' => 'meta_product_language_id',
            'label' => 'language',
            'rules' => 'trim|required',
        ),
        'meta_product_id' => array(
            'field' => 'meta_product_id',
            'label' => 'meta product id',
            'rules' => 'trim|required',
        ),
        'meta_category' => array(
            'field' => 'meta_category',
            'label' => 'meta category',
            'rules' => 'trim|required',
        ),
        'meta_product_name' => array(
            'field' => 'meta_product_name',
            'label' => 'meta product name',
            'rules' => 'trim|required',
        ),
        'meta_product' => array(
            'field' => 'meta_product',
            'label' => 'meta product',
            'rules' => 'trim|required',
        ),
        'meta_product_description' => array(
            'field' => 'meta_product_description',
            'label' => 'meta product description',
            'rules' => 'trim|required',
        ),
        'product_cta' => array(
            'field' => 'product_cta',
            'label' => 'product cta',
            'rules' => 'trim|required',
        ),
        'leadcapture_cta' => array(
            'field' => 'leadcapture_cta',
            'label' => 'leadcapture cta',
            'rules' => 'trim|required',
        ),
        'meta_product_image' => array(
            'field' => 'meta_product_image',
            'label' => 'meta product image',
            'rules' => 'trim|required',
        ),
        'meta_product_icon' => array(
            'field' => 'meta_product_icon',
            'label' => 'meta product icon',
            'rules' => 'trim|required',
        ),
        'meta_product_part_id' => array(
            'field' => 'meta_product_part_id',
            'label' => 'meta product part id',
            'rules' => 'trim|required',
        ),
        'meta_product_brand' => array(
            'field' => 'meta_product_brand',
            'label' => 'meta product brand',
            'rules' => 'trim|required',
        ),
        'meta_product_price' => array(
            'field' => 'meta_product_price',
            'label' => 'meta product price',
            'rules' => 'trim|required',
        ),
        'meta_product_price_currency' => array(
            'field' => 'meta_product_price_currency',
            'label' => 'meta product price currency',
            'rules' => 'trim|required',
        ),
        'meta_product_review_count' => array(
            'field' => 'meta_product_review_count',
            'label' => 'meta product review count',
            'rules' => 'trim|required',
        ),
        'meta_product_rating_value' => array(
            'field' => 'meta_product_rating_value',
            'label' => 'meta product rating value',
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
        $metatags = array(
			'meta_product_id'=>'',
            'meta_product_language_id'=>'',
            'meta_category'=>'',
            'meta_product_name'=>'',
            'meta_product'=>'',
			'meta_product_description'=>'',
			'product_cta'=>'',
            'content_cta'=>'',
            'leadcapture_cta'=>'',
			'meta_product_image'=>'',
			'meta_product_icon'=>'',
            'meta_product_part_id'=>'',
            'meta_product_brand'=>'',
            'meta_product_price'=>'',
            'meta_product_price_currency'=>'',
            'meta_product_review_count'=>'',
            'meta_product_rating_value'=>''
		);
        return $metatags;
	}


	private function _get_datatables_query($post_array)
    {

		$table_metatags = $this->getTableName();
        $table_metatags_PK = $this->getTablePrimaryKey();

		$column_order = array(
			$table_metatags . '.lookup_id',
			$table_metatags . '.meta_product_id',
			$table_metatags . '.meta_product_language_id',
            $table_metatags . '.meta_category',
            $table_metatags . '.meta_product_name',
            $table_metatags . '.meta_product',
            $table_metatags . '.meta_product_description',
            $table_metatags . '.product_cta',
            //$table_metatags . '.content_cta',
            $table_metatags . '.leadcapture_cta',
            $table_metatags . '.meta_product_image',
            $table_metatags . '.meta_product_icon',
            $table_metatags . '.meta_product_part_id',
            $table_metatags . '.meta_product_brand',
            $table_metatags . '.meta_product_price',
            $table_metatags . '.meta_product_review_count',
            $table_metatags . '.meta_product_rating_value',
			'total_metatags'
		);
		$column_search_global = array(
			$table_metatags . '.meta_product_id',
			$table_metatags . '.meta_product_language_id',
			$table_metatags . '.meta_product_name'
		);
		$column_search = array(
			$table_metatags . '.meta_product_id',
			$table_metatags . '.meta_product_language_id',
			$table_metatags . '.meta_product_name');
		//$order = array(
			//$table_user . '.date_modified' => 'DESC'
		//); // default order

		$this->db->select($table_metatags.'.*, COUNT('.$table_metatags.'.lookup_id) as total_metatags');
		$this->db->from($table_metatags);
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

		$this->db->group_by($table_metatags. '.' . $table_metatags_PK);
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
