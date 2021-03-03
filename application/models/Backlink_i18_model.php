<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backlink_i18_model extends MY_Model
{
    protected $_table_name = 'article_backlink_translate_i18';
    protected $_primary_key = 'backlink_id';

    protected $_article_id;
    protected $backlink_id;
    protected $_backlink_url;
    protected $_backlink_required;
    protected $_backlink_domain_authority;
    protected $_backlink_validation;
    protected $_link_text;
    protected $_link_url;

	public function get_new()
    {
        $backlink = new stdClass();
        $backlink->backlink_i18_id = '';
		$backlink->backlink_url = '';
		$backlink->backlink_required = '';
		$backlink->backlink_domain_authority = '';
		$backlink->backlink_validation = '';
		$backlink->link_text = '';
		$backlink->link_url = '';
        return (array) $backlink;
    }

	public function get_backlink_i18_list($article_id, $language_id)
    {
		$this->db->select('*');
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $language_id);
		$this->db->order_by('backlink_id', "asc"); 
		$query = $this->db->get($this->_table_name);
		$list_backlink = array();
		if($query->num_rows()>0)
        {
			foreach ($query->result() as $row)
            {
				$list_backlink[$row->backlink_id] = array(
					'article_id' => $row->article_id,
					'backlink_id' => $row->backlink_id,
					'backlink_url' => $row->backlink_url,
					'backlink_required' => $row->backlink_required,
					'backlink_domain_authority' => $row->backlink_domain_authority,
					'backlink_validation' => $row->backlink_validation,
					'link_text' => $row->link_text,
					'skyscraper_article_title' => $row->skyscraper_article_title,
					'link_url' => $row->link_url
				);

			}

		}
		else
        {

         $list_backlink =  array();

		}
		return $list_backlink;
	}


	public function get_all_backlink_i18_list()
    {
		$list_backlink = array();
        $this->db->select('*');
		$this->db->from('articles');
		$this->db->join('article_user', 'article_user.user_id = articles.user_id', 'inner' );
		$this->db->join('articles_translate_i18', 'articles_translate_i18.article_id = articles.article_id', 'inner' );
		$this->db->join('article_section', 'article_section.article_id = articles.article_id', 'inner');
		$this->db->join('article_section_translate_i18', 'article_section_translate_i18.section_id = article_section.section_id', 'inner');
        $this->db->join('article_backlink_translate_i18', 'article_backlink_translate_i18.article_id = articles.article_id', 'inner');
		$this->db->where('article_backlink_translate_i18.backlink_required', 1);
		$queryrs = $this->db->get();
		//pre($this->db->last_query());
		//log_message('error', 'Some variable did not contain a value.');
		if($queryrs->num_rows()>0)
        {
			foreach ($queryrs->result() as $key=>$row)
            {
			//	pre($row);
				
				$list_backlink[$row->article_id]['article_id'] = $row->article_id;
				$list_backlink[$row->article_id]['article_title'] = $row->article_title;
				$list_backlink[$row->article_id]['user_email'] = $row->user_email;
				$list_backlink[$row->article_id]['user_full_name'] = $row->user_name;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['article_id'] = $row->article_id;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['section_id'] = $row->section_id;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['section_text'] = $row->section_text;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['language_id'] = $row->language_id;
				$list_backlink[$row->article_id]['backlinks'][$row->backlink_id] = array(
					'article_id' => $row->article_id,
					'section_id' => $row->section_id,
					'language_id' => $row->language_id,
					'backlink_id' => $row->backlink_id,
					'backlink_url' => $row->backlink_url,
					'backlink_required' => $row->backlink_required,
					'backlink_domain_authority' => $row->backlink_domain_authority,
					'backlink_validation' => $row->backlink_validation,
					'link_text' => $row->link_text,
					'skyscraper_article_title' => $row->skyscraper_article_title,
					'link_url' => $row->link_url					
				);

			}

		}

		return $list_backlink;
	}


	public function deleteArticleBacklink($backlinks_remove_array){ 
		$this->load->model('paragraph_i18_model');
		$remove_backlink_arr  = array();
		$backlinks_arr = array();
		foreach($backlinks_remove_array['backlinks'] as $link){
			$remove_backlink_arr[] = $link['backlink_id'];
			$backlinks_arr[] = 'contains(@href,"'.$link['link_url'].'")';	 
		}
		$backlinks_str = '//a['.implode(' or ', $backlinks_arr) . ']';
		foreach($backlinks_remove_array['article_section'] as $article_section){
			$section_id = $article_section['section_id'];
			$section_text = $article_section['section_text'];
			$language_id = $article_section['language_id'];  
			$dom = new DOMDocument;
			$dom->loadHTML($section_text, LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD);
			$xp = new DOMXPath($dom);
			$links = $xp->query($backlinks_str);
			foreach ($links as $link) {
				$link->parentNode->removeChild($link);
			}
			$where = "language_id='".$language_id."' AND section_id = '".$section_id."'";
			$data_paragraph_i18 = (array) $this->paragraph_i18_model->get_by($where, TRUE);
			$section_i18_id=$data_paragraph_i18['section_i18_id'];
			$data_paragraph['section_text'] = $dom->saveHTML();
			$this->paragraph_i18_model->save($data_paragraph, $section_i18_id);
		}
		if(count($remove_backlink_arr) > 0)
		{
			$this->db->where_in('backlink_id', $remove_backlink_arr);
			$this->db->delete($this->_table_name);
		}
		return true;
	}

	public function save_article_backlink($backlinks, $article_id, $language_id){
		//pre_exit($backlinks);

		if(is_array($backlinks)){
			//$this->deleteSeleted('article_id', $article_id);

			$this->db->delete($this->_table_name, array(
				'article_id' => $article_id,
				'language_id' => $language_id
			));
			//pre($this->db->last_query()); 
			foreach ($backlinks  as $key=>$backlink) {
				//pre_exit($backlink);
				//pre($backlink);
				if($backlink['backlink_url']){
					$data_backlink = $backlink;
					$data_backlink['article_id'] = $article_id;
					$data_backlink['language_id'] = $language_id;
					$this->save($data_backlink);
				}
			}
		}
	}

	public function get_all_skyscraper_articles($language_id){

		$table_article_i18='articles_translate_i18';
        $table_article_i18_PK='article_id';
        $table_article = 'articles';
        $table_article_PK='article_id';
        $table_article_select_fields = array(
            $table_article . '.article_type',
            $table_article . '.article_website',
            $table_article . '.article_published_website',
		);

        $this->db->select($table_article_i18.'.*, '. implode($table_article_select_fields, ', '));
        //$this->db->select('*');
        $this->db->from($table_article_i18);
        $this->db->join(
            $table_article,
            "$table_article.$table_article_PK = $table_article_i18.$table_article_i18_PK"
        );
       $this->db->where($table_article_i18.'.article_skyscraper', 'true');
       //$this->db->where($table_article_i18.'.language_id', $language_id); 
        //$this->db->where($table_article_i18.'.article_status', 'published');
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
		

		$table_article_i18='articles_translate_i18';
        $table_article_i18_PK='article_id';
        $table_article = 'articles';
        $table_article_PK='article_id';
        $table_article_select_fields = array(
            $table_article . '.article_type',
            $table_article . '.article_website',
            $table_article . '.article_published_website',
		);
		if($article_type == 'supporting'){
			$support_query = $this->db->select('*')
			->from($table_article_i18)
			->where($table_article_i18.'.article_id', $article_id)
			->get();
			$support_results= $support_query->row();
			//pre($support_results);
			$article_id = $support_results->article_pillar_id;
			//flush();
		} 
        $this->db->select($table_article_i18.'.*, '. implode($table_article_select_fields, ', '));
        //$this->db->select('*');
        $this->db->from($table_article_i18);
        $this->db->join(
            $table_article,
            "$table_article.$table_article_PK = $table_article_i18.$table_article_i18_PK"
		);
		if($article_type == 'article' || $article_type == 'news' || $article_type == 'recipe'){
	  	 $this->db->where($table_article_i18.'.article_skyscraper', 'true');
		}
	   //$this->db->where($table_article_i18.'.language_id', $language_id);
	   if($article_type == 'pillar'){
		$this->db->where($table_article_i18.'.article_pillar_id', $article_id);
	   }
	   if($article_type == 'supporting'){
		$this->db->where($table_article_i18.'.article_pillar_id', $article_id);
	   } 
		$this->db->where($table_article_i18.'.article_status', 'published');
		if($article_type == 'article' || $article_type == 'news' || $article_type == 'recipe'){
			$this->db->order_by("$table_article.article_published_website ASC, $table_article_i18.article_title ASC");
		}else{
			$this->db->order_by("$table_article.article_type ASC, $table_article_i18.article_title ASC");
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
