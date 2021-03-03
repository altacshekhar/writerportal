<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linkbuilding_article_model extends MY_Model
{
    protected $_table_name = 'link_articles';
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

    public function getArticle($id, $language_id, $brief_id)
    {
        $this->load->model('linkbuilding_article_i18_model');
        $new_article = $this->get_new_t(true);
        $table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
        $table_link_article_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();
        $table_link_article = $this->getTableName();
        $table_link_article_PK = $this->getTablePrimaryKey();



        $this->db->select('language_id');
        $this->db->from($table_link_article_i18);
        $this->db->where($table_link_article_i18.'.article_id', (int) $id);
        $this->db->where($table_link_article_i18.'.language_id', $language_id);     
        $row_array = $this->db->get()->row_array();
    

        $this->db->select('*');
        $this->db->from($table_link_article);
       if($row_array){
            $this->db->join($table_link_article_i18, 'link_articles_translate_i18.article_id =  link_articles.article_id', 'LEFT');
            $this->db->where($table_link_article_i18.'.language_id', $language_id);        
        }
       $this->db->where($table_link_article.'.article_id', (int) $id);
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
         
        $this->load->model('linkbuilding_article_i18_model');
        $table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
        $table_link_article_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();
        $this->db->select('language_id');
        $this->db->from($table_link_article_i18);
        $this->db->where($table_link_article_i18.'.article_id', (int) $id);
        
        $result_array = $this->db->get()->result_array();
       
        $return_array = array();
        $lang_array = array();
        foreach ($result_array as $row) {
            $lang_array[$row['language_id']] = $row['language_id'];
        }
        $language_array = array("en","fr","de","it","ja","es");
        foreach ($language_array as $lang) {
            if (array_key_exists($lang, $lang_array)){
                $return_array[$lang] = $lang_array[$lang] ;
            }
        }
       
        return $return_array;
    }

    public function getUserArticles($user_id = null, $where = null, $single = false)
    {

        $this->load->model('user_model');

        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_link_article = $this->getTableName();
        $table_link_article_PK = $this->getTablePrimaryKey();

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

        $this->db->select($table_link_article.'.*, '. implode($table_user_select_fields, ', '));
        $this->db->from($table_link_article);
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_link_article.$table_user_PK"
        );

        if ($user_id) {
            $this->db->where($table_user . '.' . $table_user_PK, $user_id);
        }

        if ($where) {
            $this->db->where($where);
        }

        $this->db->order_by("$table_link_article.article_date", "desc");
        $list_article = $this->db->get(null, $single)->result_array();
        // pre($this->db->last_query());
        //die;
       // pre($list_article);
        return $list_article;

    }

    public function getArticlesI18($article_id, $language_id, $brief_id, $where = null, $single = false)
    {
        $this->load->model('user_model');
        $this->load->model('linkbuilding_article_i18_model');

        //$this->load->model('ingredients');
        //$this->load->model('article_section_steps');

        $table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_link_article_i18 = $this->article_i18_model->getTableName();
        $table_link_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
        $table_link_article_i18_id = "article_id";
        $table_link_article_i18_language_id = "language_id";

        $table_link_article = $this->getTableName();
        $table_link_article_PK = $this->getTablePrimaryKey();
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
            $table_link_article . '.article_author',
            $table_link_article . '.article_type',
            $table_link_article . '.article_category',
            $table_link_article . '.article_published_website'
		);
        $this->db->select($table_link_article_i18.'.*, '. implode($table_select_fields, ', '));
        $this->db->from($table_link_article_i18);
        $this->db->join(
            $table_link_article,
            "$table_link_article.$table_link_article_PK = $table_link_article_i18.$table_link_article_i18_id"
        );
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_link_article.$table_user_PK"
        );
        $this->db->where("$table_link_article_i18.$table_link_article_i18_language_id", $language_id);
        
        $this->db->where("$table_link_article.$table_link_article_PK", (int) $article_id);

        if ($where) {
            $this->db->where($where);
        }

        $this->db->order_by("$table_link_article_i18.article_date", "desc");
        $results = $this->db->get(null, $single)->result_array();

        //pre_exit($this->db->last_query());
        //pre($results);
       
        if (count($results) > 0) {
            $list_article = array();
            foreach ($results as $result) {
                $article_id = $result['article_id'];
                $list_article[$article_id] = $result;
                $list_article[$article_id]['paragraphs'] = $this->getArticleParagraphsI18($article_id, $language_id, $brief_id);
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

        

        $this->load->model('linkbuilding_article_i18_model');
		$table_user = $this->user_model->getTableName();
        $table_user_PK = $this->user_model->getTablePrimaryKey();

        $table_link_article = $this->getTableName();
        $table_link_article_PK = $this->getTablePrimaryKey();
        
        $table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
		$table_link_article_i18_PK = "article_id";

		$column_order = array(
            $table_link_article_i18 . '.article_site_id',
			$table_user . '.user_fname',
            $table_link_article_i18 . '.article_title',
            $table_link_article_i18 . '.article_content_score',
            $table_link_article_i18 . '.article_backlinks_count',
			$table_link_article . '.article_type',
			$table_link_article_i18 . '.date_added'
		);
		$column_search_global = array(
			$table_link_article_i18 . '.article_title',
			$table_user . '.user_email',
			$table_user . '.user_fname',
			$table_user . '.user_lname'
		);
		$column_search = array(
            $table_link_article_i18 . '.article_site_id',
            $table_link_article . '.user_id',
            $table_link_article . '.article_type',
            $table_link_article_i18 . '.article_title',
            $table_link_article_i18 . '.article_backlinks_count',
			$table_link_article_i18 . '.article_status'
		);
		$order = array(
			$table_link_article_i18 . '.date_added' => 'DESC'
		); // default order

		$table_user_select_fields = array(
            $table_user . '.user_id',
            $table_user . '.user_type',
			$table_user . '.user_fname',
			$table_user . '.user_lname',
			$table_user . '.user_email',
            $table_user . '.user_image',
            $table_link_article . '.article_type',
            $table_link_article . '.article_website',
            $table_link_article . '.article_published_website',
		);
        //$this->db->distinct($table_link_article_i18 . '.article_id');
        $this->db->select($table_link_article_i18.'.*, '. implode($table_user_select_fields, ', '));
		$this->db->from($table_link_article_i18);
		$this->db->join(
            $table_link_article,
            "$table_link_article.$table_link_article_PK = $table_link_article_i18.$table_link_article_i18_PK"
        );
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_link_article.$table_user_PK"
        );
        $this->db->where($table_link_article_i18 . '.language_id', 'en');
        ///$this->db->limit(1, 0);
		if($this->session->userdata('user_type') == 0 || $this->session->userdata('user_type') == 4){
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
        //$this->db->group_by($table_link_article_i18 . '.article_id'); 
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
                   
				}else{
                    if($column_array['data'] =='article_status' && $column_array['search']['value']==null ){
                        $this->db->where($table_link_article_i18.'.article_status !=', 'deleted');
                        
                    }
                }
                
                
			}
        }

        $where = (count($whereArray)>0) ? 'WHERE ('. implode(' OR ', $whereArray) . ')' : '' ;
        

        $tempQuery = 'SELECT 
                        link_articles_translate_i18.article_id, link_articles_translate_i18.article_i18_id
                        FROM 
                            "link_articles_translate_i18"
                        JOIN 
                            "link_articles" ON "link_articles"."article_id" = "link_articles_translate_i18"."article_id"
                        JOIN 
                            "article_user" ON "article_user"."user_id" = "link_articles"."user_id"
                        '.$where.'
                        GROUP BY 
                        link_articles_translate_i18.article_id, link_articles_translate_i18.article_i18_id
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

    public function getArticleParagraphsI18($article_id, $language_id, $brief_id)
    {
        $this->load->model('linkbuilding_paragraph_model');
        return $this->linkbuilding_paragraph_model->get_paragraph_i18_list($article_id, $language_id);
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
    public function get_all_skyscraper_articles($language_id){

		$table_link_article_i18='link_articles_translate_i18';
        $table_link_article_i18_PK='article_id';
        $table_link_article = 'link_articles';
        $table_link_article_PK='article_id';
        $table_article_select_fields = array(
            $table_link_article . '.article_type',
            $table_link_article . '.article_website',
            $table_link_article . '.article_published_website',
		);

        $this->db->select($table_link_article_i18.'.*, '. implode($table_article_select_fields, ', '));
        //$this->db->select('*');
        $this->db->from($table_link_article_i18);
        $this->db->join(
            $table_link_article,
            "$table_link_article.$table_link_article_PK = $table_link_article_i18.$table_link_article_i18_PK"
        );
       $this->db->where($table_link_article_i18.'.article_skyscraper', 'true');
       //$this->db->where($table_link_article_i18.'.language_id', $language_id); 
        //$this->db->where($table_link_article_i18.'.article_status', 'published');
        $query = $this->db->get();
        //pre($this->db->last_query());
        $results= $query->result(); 
        //pre($results);    
        //$row_array = $this->db->get()->row_array();
        foreach ($results as $result) {
            $url='https://'.$result->article_published_website.'/blog/'.slugify($result->article_title).'.html';
            if($result->article_published_website=='rmagazine.com'){
               $article_type= $result->article_type;
                switch ($article_type) {
                    case "news":
                    $url='https://'.$result->article_published_website.'/news/'.slugify($result->article_title).'.html';
                        break;
                    case "recipe":
                    $url='https://'.$result->article_published_website.'/recipes/'.slugify($result->article_title).'.html';
                        break;
                    default:
                    $url='https://'.$result->article_published_website.'/articles/'.slugify($result->article_title).'.html';
                }

            }
            
            $return_arr[] = array("title"=>$result->article_title, "url"=> $url);
        }
		//pre($return_arr);
		return $return_arr; 

	}
    public function getAllSkyscraperArticles($article_id, $article_type, $language_id){
		

		$table_link_article_i18='link_articles_translate_i18';
        $table_link_article_i18_PK='article_id';
        $table_link_article = 'link_articles';
        $table_link_article_PK='article_id';
        $table_article_select_fields = array(
            $table_link_article . '.article_type',
            $table_link_article . '.article_website',
            $table_link_article . '.article_published_website',
		);
		if($article_type == 'supporting'){
			$support_query = $this->db->select('*')
			->from($table_link_article_i18)
			->where($table_link_article_i18.'.article_id', $article_id)
			->get();
			$support_results= $support_query->row();
			//pre($support_results);
			$article_id = $support_results->article_pillar_id;
			//flush();
		} 
        $this->db->select($table_link_article_i18.'.*, '. implode($table_article_select_fields, ', '));
        //$this->db->select('*');
        $this->db->from($table_link_article_i18);
        $this->db->join(
            $table_link_article,
            "$table_link_article.$table_link_article_PK = $table_link_article_i18.$table_link_article_i18_PK"
		);
		if($article_type == 'article' || $article_type == 'news' || $article_type == 'recipe'){
	  	 $this->db->where($table_link_article_i18.'.article_skyscraper', 'true');
		}
	   $this->db->where($table_link_article_i18.'.language_id', $language_id);
	   if($article_type == 'pillar'){
		$this->db->where($table_link_article_i18.'.article_pillar_id', $article_id);
	   }
	   if($article_type == 'supporting'){
		$this->db->where($table_link_article_i18.'.article_pillar_id', $article_id);
	   } 
		$this->db->where($table_link_article_i18.'.article_status', 'published');
		if($article_type == 'article' || $article_type == 'news' || $article_type == 'recipe'){
			$this->db->order_by("$table_link_article.article_published_website ASC, $table_link_article_i18.article_title ASC");
		}else{
			$this->db->order_by("$table_link_article.article_type ASC, $table_link_article_i18.article_title ASC");
		}
		
        $query = $this->db->get();
       // pre($this->db->last_query());
        $results= $query->result(); 
        //pre($results);    
		//$row_array = $this->db->get()->row_array();
		$return_arr = [];
        foreach ($results as $key => $result) { 
			$site = ucfirst(str_replace('.com', '',$result->article_published_website));
            $url='https://'.$result->article_published_website.'/blog/'.slugify($result->article_title).'.html';
            if($result->article_published_website=='rmagazine.com'){
               $article_type= $result->article_type;
                switch ($article_type) {
                    case "news":
					$url='https://'.$result->article_published_website.'/news/'.slugify($result->article_title).'.html';
                        break;
                    case "recipe":
                    $url='https://'.$result->article_published_website.'/recipes/'.slugify($result->article_title).'.html';
                        break;
                    default:
                    $url='https://'.$result->article_published_website.'/articles/'.slugify($result->article_title).'.html';
				}
			}
			if($result->article_type =='pillar' || $result->article_type =='supporting'){
					$article_type= $result->article_type;
					 switch ($article_type) {
						 case "pillar":
							 $url='https://'.$result->article_published_website.'/'.$result->article_permalink.'.html';
							 break;
						 case "supporting":
							 $url='https://'.$result->article_published_website.'/'.$result->article_permalink.'.html';
							 break;
						 default:
						 $url='https://'.$result->article_published_website.'/'.$result->article_permalink.'.html';
					 }
            }
            
            $return_arr[$key] = array("title"=>$result->article_title, "url"=> $url, "site"=> $site , "type"=> ucfirst($result->article_type));
        }
		//pre($return_arr);
		return $return_arr; 

	}
}