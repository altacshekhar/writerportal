<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlemaster_model extends MY_Model
{
    protected $_table_name = 'articles';
	protected $_primary_key = 'article_id';
	protected $_timestamps = false;

	public $rules = array(
        'article_title' => array(
            'field' => 'article_title',
            'label' => 'Article Headline',
            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[70]',
        ),
        /*'article_image_alt' => array(
            'field' => 'article_image_alt',
            'label' => 'Image Description',
            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[70]',
        ),*/
       'article_description' => array(
            'field' => 'article_description',
            'label' => 'Summary',
            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[250]',
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

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function getArticle($id, $language_id)
    {
        $this->load->model('article_i18_model');
        $new_article = $this->get_new_t(true);
        $table_article_i18 = $this->article_i18_model->getTableName();
        $table_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
        $table_article = $this->getTableName();
        $table_article_PK = $this->getTablePrimaryKey();



        $this->db->select('language_id');
        $this->db->from($table_article_i18);
        $this->db->where($table_article_i18.'.article_id', (int) $id);
        $this->db->where($table_article_i18.'.language_id', $language_id);     
        $row_array = $this->db->get()->row_array();
    

        $this->db->select('*');
        $this->db->from($table_article);
       if($row_array){
            $this->db->join($table_article_i18, 'articles_translate_i18.article_id =  articles.article_id', 'LEFT');
            $this->db->where($table_article_i18.'.language_id', $language_id);        
        }
       $this->db->where($table_article.'.article_id', (int) $id);
        $result_array = $this->db->get()->row_array();
        if($row_array){
            $return_array = $result_array;
        }else{
            $return_array = array_merge($new_article, $result_array);
        }
     //   pre($return_array);
        return $return_array;
    }
    public function getArticleLanguages($id)
    {
         
        $this->load->model('article_i18_model');
        $table_article_i18 = $this->article_i18_model->getTableName();
        $table_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
        $this->db->select('language_id');
        $this->db->from($table_article_i18);
        $this->db->where($table_article_i18.'.article_id', (int) $id);
        
        $result_array = $this->db->get()->result_array();
       
        $return_array = array();
        foreach ($result_array as $row) {
            $return_array[] = $row['language_id'];
        }
        
        return $return_array;
    }

    public function getUserArticles($user_id = null, $where = null, $single = false)
    {

        $this->load->model('user_model');

        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_article = $this->getTableName();
        $table_article_PK = $this->getTablePrimaryKey();

		$table_user_select_fields = array(
			$table_user . '.user_id',
			$table_user . '.user_fname',
			$table_user . '.user_lname',
			$table_user . '.user_email',
            $table_user . '.user_image',
            $table_user . '.user_bo_info',
            $table_user . '.meta_author_description',
            $table_user . '.meta_author_url',
            $table_user . '.meta_author_facebook_url',
            $table_user . '.meta_author_twitter_url',
            $table_user . '.meta_author_instagram_url',
            $table_user . '.meta_author_linkedin_url'
		);

        $this->db->select($table_article.'.*, '. implode($table_user_select_fields, ', '));
        $this->db->from($table_article);
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK"
        );

        if ($user_id) {
            $this->db->where($table_user . '.' . $table_user_PK, $user_id);
        }

        if ($where) {
            $this->db->where($where);
        }

        $this->db->order_by("$table_article.article_date", "desc");
        $list_article = $this->db->get(null, $single)->result_array();
        // pre($this->db->last_query());
        //die;
       // pre($list_article);
        return $list_article;

    }

    public function getArticlesI18($article_id, $language_id, $where = null, $single = false)
    {
        $this->load->model('user_model');
        $this->load->model('article_i18_model');

        //$this->load->model('ingredients');
        //$this->load->model('article_section_steps');

        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_article_i18 = $this->article_i18_model->getTableName();
        $table_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
        $table_article_i18_id = "article_id";
        $table_article_i18_language_id = "language_id";

        $table_article = $this->getTableName();
        $table_article_PK = $this->getTablePrimaryKey();
        $table_select_fields = array(
			$table_user . '.user_id',
			$table_user . '.user_fname',
			$table_user . '.user_lname',
			$table_user . '.user_email',
            $table_user . '.user_image',
            $table_user . '.user_bo_info',
            $table_user . '.meta_author_description',
            $table_user . '.meta_author_url',
            $table_user . '.meta_author_facebook_url',
            $table_user . '.meta_author_twitter_url',
            $table_user . '.meta_author_instagram_url',
            $table_user . '.meta_author_linkedin_url',
            $table_article . '.article_author',
            $table_article . '.article_type',
            $table_article . '.article_category',
            $table_article . '.article_published_website'
		);
        $this->db->select($table_article_i18.'.*, '. implode($table_select_fields, ', '));
        $this->db->from($table_article_i18);
        $this->db->join(
            $table_article,
            "$table_article.$table_article_PK = $table_article_i18.$table_article_i18_id"
        );
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK"
        );
        $this->db->where("$table_article_i18.$table_article_i18_language_id", $language_id);
        
        $this->db->where("$table_article.$table_article_PK", (int) $article_id);

        if ($where) {
            $this->db->where($where);
        }

        $this->db->order_by("$table_article_i18.article_date", "desc");
        $results = $this->db->get(null, $single)->result_array();

        //pre_exit($this->db->last_query());
        //pre($results);
       
        if (count($results) > 0) {
            $list_article = array();
            foreach ($results as $result) {
                $article_id = $result['article_id'];
                $list_article[$article_id] = $result;
                $list_article[$article_id]['paragraphs'] = $this->getArticleParagraphsI18($article_id, $language_id);
            }
           // pre($list_article);
        //die;
            return $list_article;
        } else {
            return false;
        }
	}

	public function _get_datatables_query($post_array)
    { 

        

        $this->load->model('article_i18_model');
		$table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_article = $this->getTableName();
        $table_article_PK = $this->getTablePrimaryKey();
        
        $table_article_i18 = $this->article_i18_model->getTableName();
		$table_article_i18_PK = "article_id";

		$column_order = array(
			$table_article_i18 . '.article_title',
			$table_user . '.user_fname',
			$table_article . '.article_website',
			$table_article . '.article_type',
			$table_article_i18 . '.date_added'
		);
		$column_search_global = array(
			$table_article_i18 . '.article_title',
			$table_user . '.user_email',
			$table_user . '.user_fname',
			$table_user . '.user_lname'
		);
		$column_search = array(
			$table_article . '.article_published_website',
			$table_article_i18 . '.language_id',
			$table_article . '.article_type',
			$table_article_i18 . '.article_status'
		);
		$order = array(
			$table_article_i18 . '.date_added' => 'DESC'
		); // default order

		$table_user_select_fields = array(
			$table_user . '.user_id',
			$table_user . '.user_fname',
			$table_user . '.user_lname',
			$table_user . '.user_email',
            $table_user . '.user_image',
            $table_article . '.article_type',
            $table_article . '.article_website',
            $table_article . '.article_published_website',
		);
        //$this->db->distinct($table_article_i18 . '.article_id');
        $this->db->select($table_article_i18.'.*, '. implode($table_user_select_fields, ', '));
		$this->db->from($table_article_i18);
		$this->db->join(
            $table_article,
            "$table_article.$table_article_PK = $table_article_i18.$table_article_i18_PK"
        );
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK"
        );
        //$this->db->where($table_article_i18 . '.language_id', 'en');
        ///$this->db->limit(1, 0);
		if(!$this->session->userdata('is_admin')){
			$this->db->where($table_user . '.user_id', $this->session->userdata('id'));
        }
        
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
        //$this->db->group_by($table_article_i18 . '.article_id'); 
		if(array_key_exists('columns', $post_array)){
			foreach ($post_array['columns'] as $key=>$column_array)
			{
				if($column_array['searchable'] && $column_array['search']['value']){
                    $search_value = $column_array['search']['value'];
                    if(strtolower(trim($search_value)) == 'skyscraper' ){
                        $this->db->where('article_skyscraper', true);
                    }else{
                        $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
                    }
				}
			}
        }

        $where = (count($whereArray)>0) ? 'WHERE ('. implode(' OR ', $whereArray) . ')' : '' ;
        

        $tempQuery = 'SELECT 
                        articles_translate_i18.article_id, articles_translate_i18.article_i18_id
                        FROM 
                            "articles_translate_i18"
                        JOIN 
                            "articles" ON "articles"."article_id" = "articles_translate_i18"."article_id"
                        JOIN 
                            "article_user" ON "article_user"."user_id" = "articles"."user_id"
                        '.$where.'
                        GROUP BY 
                            articles_translate_i18.article_id, articles_translate_i18.article_i18_id
                        LIMIT  ' . $post_array['length'] .' OFFSET '.$post_array['start'];

    
       // log_message("ERROR", PHP_EOL .'tempQuery==' . PHP_EOL . $tempQuery);


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

    public function getArticleParagraphsI18($article_id, $language_id)
    {
        $this->load->model('paragraph_model');
        return $this->paragraph_model->get_paragraph_i18_list($article_id, $language_id);
    }

    public function get_meta_tags($language_id)
    {
        $this->load->model('metatag_model');
        $where   = "meta_product_language_id = '" . $language_id . "'";
        $result_array = $this->metatag_model->get_by($where, FALSE);
        //pre($this->db->last_query());
        return json_decode(json_encode($result_array), TRUE);
    }

    public function get_meta_author_details($user_id)
    {
        $this->load->model('user_model');
        $where   = "user_id = '" . $user_id . "'";
        $result_array = $this->user_model->get_by($where, TRUE);
        //pre($this->db->last_query());
        return json_decode(json_encode($result_array), TRUE);
    }

    public function get_default_website_settings(){
		$this->load->model('website_model');
		$result_array = $this->website_model->get();
		return json_decode(json_encode($result_array), TRUE);
    }
}