<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Github_model extends MY_Model
{
    protected $_table_name = 'article_github';
	protected $_primary_key = 'id';
	protected $_order_by = 'site_id';
	protected $_timestamps = false;

 public $rules_github_repo = array(
        'site_id' => array(
            'field' => 'site_id',
            'label' => 'Site Name',
            'rules' => 'trim|required|xss_clean|min_length[5]|max_length[70]|callback__unique_site_name|xss_clean',
        ),
        'github_repo' => array(
            'field' => 'github_repo',
            'label' => 'Github Repo',
            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[200]|valid_url',
        ),
        'github_client_id' => array(
            'field' => 'github_client_id',
            'label' => 'Github Client Id',
            'rules' => 'trim|required|xss_clean|min_length[3]|max_length[200]',
        ),
     /*  'github_api_key' => array(
            'field' => 'github_api_key',
            'label' => 'Github Api Key',
            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[200]',
        ),*/
       'github_article_path' => array(
            'field' => 'github_article_path',
            'label' => 'Github Article Path',
            'rules' => 'trim|required|xss_clean|min_length[2]|max_length[50]',
        ),
        'github_article_image_path' => array(
            'field' => 'github_article_image_path',
            'label' => 'Github Article Image Path',
            'rules' => 'trim|required|xss_clean|min_length[2]|max_length[50]',
        ),
        'default_meta_product' => array(
            'field' => 'default_meta_product',
            'label' => 'Default meta product',
            'rules' => 'trim|required|xss_clean',
        ),
        'available_blog_categories' => array(
            'field' => 'available_blog_categories',
            'label' => 'Available blog categories',
            'rules' => 'trim|required|xss_clean',
        ),
        'rakefile' => array(
            'field' => 'rakefile',
            'label' => 'Rake file content',
            'rules' => 'trim|required',
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
            'site_id'=>'',
            'github_repo'=>'',
            'github_client_id'=>'',
            'github_api_key'=>'',
            'github_article_path'=>'',
            'github_article_image_path'=>'',
            'default_meta_product'=>'',
            'available_blog_categories'=>'',
            'meta_product_unique_key'=>'',
            'rakefile'=>''
        );
	}


	public function _get_datatables_query($post_array)
    {
		$table_git = $this->getTableName();

		$column_order = array(
			'site_id', 'github_repo', 'github_client_id', 'github_api_key', 'github_article_path'
		);
		$column_search_global = $column_order;

		$order = array(
			'site_id' => 'DESC'
		); // default order

		$this->db->select('*');
		$this->db->from($table_git);

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
