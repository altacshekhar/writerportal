<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keyword_model extends MY_Model
{
    protected $_table_name = 'article_keyword';
	protected $_primary_key = 'keyword_id';
	protected $_timestamps = true;

    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

	public function _get_datatables_query($post_array)
    {
		$table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_article_keyword = $this->getTableName();
        $table_article_keyword_PK = $this->getTablePrimaryKey();
        $table_article_keyword_user_id='keyword_analyze_by';

        $table_article_brief = $this->contentarticlesbrief_model->getTableName();
        $table_article_brief_PK = $this->contentarticlesbrief_model->getTablePrimaryKey();
        $table_article_brief_keyword_id='keyword_id';

		$column_order = array(
            $table_article_keyword . '.website',
            $table_article_keyword . '.keyword',
            $table_article_keyword . '.monthly_search',
            $table_article_keyword . '.content_score',
            $table_article_keyword . '.link_building',
            $table_article_keyword . '.focus_keyword',
            $table_article_keyword . '.status'
		);
		$column_search_global = array(
            $table_article_keyword . '.website',
			$table_article_keyword . '.keyword',
            $table_article_keyword . '.status'
		);
		$column_search = array(
            $table_article_keyword . '.website',
            $table_article_keyword . '.status',
		);
		$order = array(
			$table_article_keyword . '.date_added' => 'DESC'
		); // default order

		$table_user_select_fields = array(
            $table_user . '.user_id',
            $table_user . '.user_type',
			$table_user . '.user_fname',
			$table_user . '.user_lname',
			$table_user . '.user_email',
            $table_user . '.user_image',
            $table_article_brief . '.brief_id',
            
		);
        $this->db->select($table_article_keyword.'.*, '. implode($table_user_select_fields, ', '));
       //$this->db->select('*');
		$this->db->from($table_article_keyword);
		$this->db->join(
            $table_article_brief,
            "$table_article_brief.$table_article_brief_keyword_id = $table_article_keyword.$table_article_keyword_PK", 'Left'
        );
       $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article_keyword.$table_article_keyword_user_id"
        );
        /* $this->db->where($table_article_keyword . '.language_id', 'en');*/
        ///$this->db->limit(1, 0);
		/*if($this->session->userdata('user_type') == 0 || $this->session->userdata('user_type') == 4){
			$this->db->where($table_user . '.user_id', $this->session->userdata('id'));
        }*/
        
        $whereArray = [];
		$i = 0;

        foreach ($column_search_global as $item) // loop column
        {
			if(isset($post_array['search'])){
				$search_value = $post_array['search']['value'];
				//$search_value = $post_array['columns'[0]['search']['value']];
				if( $search_value) // if datatable send POST for search
				{
                    $whereArray[] = $item." ILIKE '%".strtolower($search_value)."%'";
					if($i===0) // first loop
					{
						$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
						$this->db->where($item." ILIKE '%".strtolower($search_value)."%'", NULL, FALSE);
					}
					else
					{
						$this->db->or_where($item." ILIKE '%".strtolower($search_value)."%'", NULL, FALSE);
                    }
                    
					if(count($column_search_global) - 1 == $i){ //last loop
                        $this->db->group_end(); //close bracket
                    }
				}
			}

            $i++;
		}
		if(array_key_exists('columns', $post_array)){
			foreach ($post_array['columns'] as $key=>$column_array)
			{
				if($column_array['searchable'] && $column_array['search']['value']){
                    $search_value = $column_array['search']['value'];
                    $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
				}
			}
        }

        $where = (count($whereArray)>0) ? 'WHERE ('. implode(' OR ', $whereArray) . ')' : '' ;

        if(isset($post_array['order'])) // here order processing
        {
            $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
        }
        else if($order)
        {
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($post_array)
    {
        $this->_get_datatables_query($post_array);
        if($post_array['length'] != -1)
        $this->db->limit($post_array['length'], $post_array['start']);
		$query = $this->db->get();
		log_message("ERROR", 'last_query==' . PHP_EOL .$this->db->last_query());
        return $query->result();
    }

    function count_filtered($post_array)
    {
        $this->_get_datatables_query($post_array);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($post_array)
    {
        $this->_get_datatables_query($post_array);
        return $this->db->count_all_results();
	}
}