<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cta_model extends MY_Model
{
    protected $_table_name = 'wp_cta_lookup';
    protected $_primary_key = 'cta_lookup_id';
	protected $_order_by = '';
	protected $_timestamps = true;

    public $rules_cta_config = array(
        'cta_website' => array(
            'field' => 'cta_website',
            'label' => 'cta website',
            'rules' => 'trim|required',
        ),
        'cta_type' => array(
            'field' => 'cta_type',
            'label' => 'cta type',
            'rules' => 'trim|required',
        ),
        'cta_headline' => array(
            'field' => 'cta_headline',
            'label' => 'cta headline',
            'rules' => 'trim|required',
        ),
        'cta_sub_headline' => array(
            'field' => 'cta_sub_headline',
            'label' => 'cta subheadline',
            'rules' => 'trim|required',
        ),
        'cta_background_type' => array(
            'field' => 'cta_background_type',
            'label' => 'cta background type',
            'rules' => 'trim|required',
        ),
        'cta_button_text' => array(
            'field' => 'cta_button_text',
            'label' => 'cta button text',
            'rules' => 'trim|required',
        ),
        'cta_button_color' => array(
            'field' => 'cta_button_color',
            'label' => 'cta button color',
            'rules' => 'trim|required',
        ),
        'cta_form_id' => array(
            'field' => 'cta_form_id',
            'label' => 'cta form id',
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
        $cta = array(
			'cta_site_id'=>'',
            'cta_product_id'=>'',
            'cta_language_id'=>'',
            'cta_website'=>'',
            'cta_type'=>'',
            'cta_name'=>'',
            'cta_headline'=>'',
            'cta_sub_headline'=>'',
            'cta_button_text'=>'',
            'cta_button_color'=>'',
			'cta_background_type'=>'',
            'cta_background'=>'',
            'cta_background_image'=>'',
            'cta_background_video'=>'',
            'cta_background_color'=>'',
			'cta_form_id'=>''
		);
        return $cta;
	}
	public function update_cta_image($cta_lookup_id){
		if($_FILES['cta_background_image']['error'] == 0 && $this->upload->file_name){
			$relative_url = 'assets/images/cta/'.$this->upload->file_name;
			$data['cta_background_image'] = $relative_url;
			$last_insert_id = $this->save($data, $cta_lookup_id);
		}
	}

	private function _get_datatables_query($post_array)
    {

		$table_cta = $this->getTableName();
        $table_cta_PK = $this->getTablePrimaryKey();

		$column_order = array(
			$table_cta . '.cta_website',
			$table_cta . '.cta_type',
			$table_cta . '.cta_headline',
			'total_cta'
		);
		$column_search_global = array(
			$table_cta . '.cta_website',
			$table_cta . '.cta_type',
			$table_cta . '.cta_headline'
		);
		$column_search = array(
			$table_cta . '.cta_website',
			$table_cta . '.cta_type',
            $table_cta . '.cta_headline'
        );
		//$order = array(
			//$table_user . '.date_modified' => 'DESC'
		//); // default order

		$this->db->select($table_cta.'.*, COUNT('.$table_cta.'.cta_lookup_id) as total_cta');
		$this->db->from($table_cta);
		/*$this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK", 'RIGHT'
		);*/
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

		$this->db->group_by($table_cta. '.' . $table_cta_PK);
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
