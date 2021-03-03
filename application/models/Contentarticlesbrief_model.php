<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contentarticlesbrief_model extends MY_Model
{
    protected $_table_name = 'article_brief';
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
	public $rules_brief = array(
            'brief_headline' => array(
            'field' => 'brief_headline',
            'label' => 'headline',
            'rules' => 'trim|required|xss_clean',
		),
		'brief_introduction' => array(
            'field' => 'brief_introduction',
            'label' => 'introduction',
            'rules' => 'trim|required|xss_clean',
		)
      );
      public function get_new()
      {
            $brief = array(
                  'keyword_id'=>'',
                  'brief_primary_keyword'=>'',
                  'brief_article_icon'=>'',
                  'brief_article_site_structure'=>'',
                  'brief_article_type'=>'',
                  'brief_article_permalink'=>'',
                  'brief_article_category'=>'',
                  'brief_article_tags'=>'',
                  'brief_assigned_to'=>'',
                  'brief_word_length'=>'',
                  'brief_headline'=>'',
                  'brief_introduction'=>'',
                  'brief_body_outline'=>'',
                  'brief_demographics'=>'',
                  'brief_think_now'=>'',
                  'brief_want_them'=>'',
                  'brief_strength'=>'',
                  'brief_get_across'=>'',
                  'brief_psycho_fears'=>'',
                  'brief_psycho_pain_points'=>'',
                  'brief_psycho_wants'=>'',
                  'brief_psycho_goals'=>''
            );
            return $brief;
      }
      

      public function get_article_brief($brief_id)
      {
        
        $this->load->model('keyword_model');
        $table_article_keyword = $this->keyword_model->getTableName();
        $table_article_keyword_PK = $this->keyword_model->getTablePrimaryKey();
        $table_article_brief = $this->getTableName();
        $table_article_brief_PK = $this->getTablePrimaryKey();

        $this->db->select('*');
        $this->db->from($table_article_brief);
        $this->db->join($table_article_keyword, 'article_keyword.keyword_id =  article_brief.keyword_id');
        $this->db->where($table_article_brief.'.brief_id', (int) $brief_id);
        $result_array = $this->db->get()->row_array();
       
        return $result_array;
      }
      public function get_brief_list_by_user()
      {
        $this->load->model('keyword_model');
        $table_article_keyword = $this->keyword_model->getTableName();
        $table_article_keyword_PK = $this->keyword_model->getTablePrimaryKey();
        $table_article_brief = $this->getTableName();
        $table_article_brief_PK = $this->getTablePrimaryKey();

        $this->db->select('*');
        $this->db->from($table_article_brief);
        $this->db->join($table_article_keyword, 'article_keyword.keyword_id =  article_brief.keyword_id');
        $this->db->where($table_article_brief.'.brief_status IS NULL');
        if($this->session->userdata('user_type') == 0 || $this->session->userdata('user_type') == 4){

            $this->db->where($table_article_brief.'.brief_assigned_to', $this->session->userdata('id'));
        }
        
        $result_array = $this->db->get()->result_array();
        //pre($this->db->last_query());
        //pre($result_array);
        return $result_array;
      }

      public function get_user_list()
      {
		$this->load->model('user_model');
		$this->db->where('user_type', 4);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
		$return_array[''] =  '---Select Staff Writer---';
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] =  ucwords($row['user_name']);
        }
        return $return_array;	
    }
    
    public function getCtaFromBrief($article_id = '')
    {
        $this->db->select("*");
        $this->db->from('article_brief_cta');
        $this->db->where('article_id', (int) $article_id);
        $this->db->order_by("brief_cta_id", "asc");
        return $this->db->get()->result_array();
    }
     

}
