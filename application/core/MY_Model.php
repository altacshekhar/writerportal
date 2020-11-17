<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function array_from_post($fields)
    {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function array_from_post_i18($fields, $lang)
    {
        $data = array();
        foreach ($fields as $field) {
            $data[$field] = $this->input->post("article[$lang][$field]");
        }
        return $data;
    }

    public function get_new()
    {
		$return_array = array();
		$fields = $this->db->list_fields($this->_table_name);
		foreach($fields as $field){
			$return_array[$field] = '';
		}
        return $return_array;
	}
    public function get_new_t ($i18 = false)
    {
		$return_array = array();
		$fields = $this->db->list_fields($this->_table_name);
		foreach($fields as $field){
			$return_array[$field] = '';
        }
        if($i18){

            $i18fields = $this->db->list_fields($this->_table_name."_translate_i18");
		foreach($i18fields as $i18field){
			$return_array[$i18field] = '';
        }

        }
        return $return_array;
    }

    public function get($id = null, $single = false)
    {

        if ($id != null) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        if (!$this->db->order_by($this->_order_by)) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = false)
    {
        $this->db->where($where);
		return $this->get(null, $single);
    }

    public function get_by_array($where, $single = false)
    {
        $this->db->where($where);
	return $this->db->get($this->_table_name)->result_array();
    }

    public function save($data, $id = null)
    {
        // Set timestamps
        if ($this->_timestamps == true) {
            $now = date('Y-m-d H:i:s');
            $id || $data['date_added'] = $now;
            $data['date_modified'] = $now;
        }

        // Insert
        if ($id === null) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }
    

    public function delete($id)
    {
        $filter = $this->_primary_filter;
        $id = $filter($id);

        if (!$id) {
            return false;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    public function deleteSeleted($deleteField, $deleteId)
    {
        $this->db->where($deleteField, $deleteId);
        $this->db->delete($this->_table_name);
    }

    public function get_github_repo(){
		$this->load->model('github_model');
		$result_array = $this->github_model->get();
		return json_decode(json_encode($result_array), TRUE);
    }

    public function get_languages(){
		$this->load->model('language_model');
		$result_array = $this->language_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
        $return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['language_id']] = $row['language_name'];
        }

        return $return_array;
    }
    
    public function get_users($user_type, $user_id){
        $this->load->model('user_model');
        if($user_type && $user_type!=4){
            //$this->db->where('user_type!=', 1);
        }else{
            $this->db->where('user_id', $user_id); 
        }
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
        $return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }

        return $return_array;
    } 

    public function get_pillar_article($website ='hubworks.com'){
        $articles='articles';
        $articles_i18='articles_translate_i18';

        $this->db->select('*');
        $this->db->from($articles_i18);
        $this->db->join($articles, 'articles.article_id =  articles_translate_i18.article_id', 'LEFT');
        $this->db->where($articles_i18.'.language_id', 'en');
        $this->db->where($articles_i18.'.article_site_id', $website);
        $this->db->where($articles_i18.'.article_status',  'published');
        $this->db->where($articles_i18.'.article_permalink!=', null);
        $this->db->where($articles_i18.'.keywords!=', null);
        $this->db->where($articles.'.article_type', 'pillar');
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_pillar_article_by_id($pillar_id, $website, $lang){
        $articles='articles';
        $articles_i18='articles_translate_i18';

        $this->db->select('*');
        $this->db->from($articles_i18);
        $this->db->join($articles, 'articles.article_id =  articles_translate_i18.article_id', 'LEFT');
        $this->db->where($articles_i18.'.language_id', $lang);
        $this->db->where($articles_i18.'.article_site_id', $website);
        $this->db->where($articles_i18.'.article_pillar_id',  $pillar_id);
        $this->db->where($articles.'.article_type', 'pillar');
        $query = $this->db->get();
        return $result = $query->result_array();
         //pre($this->db->last_query());
    }

    public function get_metatag_info($website, $lang){
        $product_id = get_product_id($website);
        if(!$product_id){
            $product_id = 'zip-schedules'; 
        }
        $meta_product_lookup ='wp_meta_product_lookup';
        $this->db->select('*');
        $this->db->from($meta_product_lookup);
        $this->db->where($meta_product_lookup.'.meta_product_language_id', $lang);
        $this->db->where($meta_product_lookup.'.meta_product_unique_key',  $product_id);
        $query =  $this->db->get();
        return $result = (array) $result = $query->row();
         //pre($this->db->last_query());
    }
   
    
}
