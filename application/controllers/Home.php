<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend_Controller
{
    public function index()
    {
        $this->data['meta_title'] = $this->data['menu']['MetaData']['title'];
        $this->data['subview'] = 'home';
        $this->load->view('_main_layout', $this->data);
	}
	
	public function get_permalink(){
		$website='zipreporting.com';
		$permalink='business-model';

        $this->db->select('keywords, article_permalink, article_pillar_id');
        $this->db->where('language_id', 'en');
        $this->db->where('article_site_id', $website);
        $this->db->where('article_permalink', $permalink);
        $query = $this->db->get('articles_translate_i18');
        $result = $query->result_array();
		pre($result);
        
    }
	//1945, 1936, 1935, 1933, 1931, 1930, 1928, 1927, 1908, 1907, 1904, 1903, 1901, 1899, 1898, 1886, 1874, 1869, 1861, 1858
	//1852, 1851, 1847, 1846, 1845, 1843, 1839, 1838, 1837, 1836, 1835, 1834, 1829, 1827, 1825, 1820, 1819, 1815, 1813, 1809, 1804, 1801, 1800, 1792, 1783, 1775, 1773, 1772, 1771, 1770, 1769, 1768, 1767, 1751, 1748, 1744, 1743, 1742, 1737, 1736, 1735, 1733, 1731, 1730, 1729, 1728, 1725, 1716, 1709
	public function get_msg_info(){
		$article_id= 1858;
        $this->db->select('*');
        $this->db->where('article_language_id', 'en');
        $this->db->where('article_id', $article_id);
        $query = $this->db->get('wp_promo_messages');
        $result = $query->result_array();
		pre($result);
        
    }

	public function functionName()
	{
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
		$where = "article_published_website !='' AND article_id = 32";
		$all_articles = $this->article_model->get_by($where);
		//pre($all_articles);
		foreach ($all_articles as $article) {

			$total_chars_array = array();
			$article_id = $article->article_id;
			$where = "article_status = 'published'";
			$article_list = $this->article_model->getArticlesI18($article_id, 'en', $where, true);
			if($article_list){

				$article = $article_list[$article_id];

				$total_chars_array[] =  $article['article_title'];
				$total_chars_array[] =  $article['article_description'];
				$total_chars_array[] =  $article['article_image_alt'];
				//$total_chars_array[] =  $article['article_meta_author'];
				$total_chars_array[] =  $article['article_meta_author_desc'];
				$total_chars_array[] =  $article['article_meta_product'];
				$total_chars_array[] =  $article['article_meta_category'];
				$total_chars_array[] =  $article['article_meta_keyword'];
				$total_chars_array[] =  $article['article_meta_abstract'];
				$total_chars_array[] =  $article['article_meta_product_name'];
				$total_chars_array[] =  $article['article_meta_product_desc'];
				$total_chars_array[] =  $article['article_image_license'];
				$total_chars_array[] =  $article['article_tags'];
				$total_chars_array[] =  $article['servings'];
				$total_chars_array[] =  $article['prep_time'];
				if($article['paragraphs']){
					foreach ($article['paragraphs'] as $paragraph) {
						$total_chars_array[] = $paragraph['section_title'];
						$total_chars_array[] = $paragraph['section_text'];
						$total_chars_array[] = $paragraph['section_image_alt'];
						$total_chars_array[] = $paragraph['section_image_license'];

						foreach ($paragraph['callouts'] as $callouts) {
							$total_chars_array[] = $callouts['callout_title'];
							$total_chars_array[] = $callouts['callout_text'];
						}
						foreach ($paragraph['ingredients'] as $ingredient) {
							$total_chars_array[] = $ingredient['ingredient_name'];
						}
						foreach ($paragraph['steps'] as $steps) {
							$total_chars_array[] = $steps['step_description'];
						}
					}
				}
				$socialmedia_list = $this->promotion_model->get_socialmedia_list($article_id, 'en');
				foreach ($socialmedia_list as $socialmedis) {
					$social_row = $socialmedis[0];
					$total_chars_array[] = $social_row['msg_headline'];
					$total_chars_array[] = $social_row['msg_intro'];
					$total_chars_array[] = $social_row['msg_text'];
					$total_chars_array[] = $social_row['msg_article_headline'];
				}

				$content_string = implode(' ', array_filter($total_chars_array));
				$string_Temp =  $article_id .'=='. $article['article_title'] . '==' . strlen($content_string) .'br>';

				pre($string_Temp . $content_string);
				//echo strlen($content_string) . '<br>';
			}
		}



		//pre($content_string);
	}



	/*public function merge_query(){
		$this->load->model('article_model');
        $this->load->model('article_i18_model');
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM articles';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article = $row;
			$data_article_i18['language_id'] =  'en';
			
			$data_article['article_id'] = $row['article_id']; 
			$data_article['user_id'] = $row['user_id']; 
			$data_article['article_author'] = $row['article_author']; 
			$data_article['site_id'] = $row['site_id']; 
			$data_article['article_type'] = $row['article_type']; 
			$data_article['article_website'] = $row['article_website']; 
			$data_article['article_published_website'] = $row['article_published_website']; 
			$data_article['article_category'] = $row['article_category']; 
			$this->db->set($data_article);
            $this->db->insert('articles');

			$data_article_i18['article_i18_id'] =  $row['article_id'];
			$data_article_i18['article_id'] =  $row['article_id'];
			$data_article_i18['language_id'] =  'en';
			$data_article_i18['article_title'] =  $row['article_title'];
			$data_article_i18['article_description'] =  $row['article_description'];
			$data_article_i18['keywords'] =  $row['keywords'];
			$data_article_i18['article_tags'] =  $row['article_tags'];
			$data_article_i18['article_image_alt'] =  $row['article_image_alt'];
			$data_article_i18['article_status'] =  $row['article_status'];
			$data_article_i18['servings'] =  $row['servings'];
			$data_article_i18['prep_time'] =  $row['prep_time'];
			$data_article_i18['article_meta_product'] =  $row['article_meta_product'];
			$data_article_i18['article_meta_category'] =  $row['article_meta_category'];
			$data_article_i18['article_meta_keyword'] =  $row['article_metakeyword'];
			$data_article_i18['article_meta_abstract'] =  $row['article_meta_abstract'];
			$data_article_i18['article_meta_author_facebook'] =  $row['article_meta_author_facebook'];
			$data_article_i18['article_meta_author_twitter'] =  $row['article_meta_author_twitter'];
			$data_article_i18['article_meta_product_name'] =  $row['article_meta_product_name'];
			$data_article_i18['article_meta_product_desc'] =  $row['article_meta_product_desc'];
			$data_article_i18['article_meta_product_image'] =  $row['article_meta_product_image'];
			$data_article_i18['article_meta_product_icon'] =  $row['article_meta_product_icon'];
			$data_article_i18['article_meta_product_id'] =  $row['article_meta_product_id'];
			$data_article_i18['article_meta_part_id'] =  $row['article_meta_part_id'];
			$data_article_i18['article_meta_product_reviewcount'] =  $row['article_meta_product_reviewcount'];
			$data_article_i18['article_meta_product_price_currency'] =  $row['article_meta_product_price_currency'];
			$data_article_i18['article_meta_product_brand'] =  $row['article_meta_product_brand'];
			$data_article_i18['article_meta_product_price'] =  $row['article_meta_product_price'];
			$data_article_i18['article_meta_product_ratingvalue'] =  $row['article_meta_product_ratingvalue'];
			$data_article_i18['article_meta_author_url'] =  $row['article_meta_author_url'];
			$data_article_i18['article_toc_ordered'] =  $row['article_toc_ordered'];
			$data_article_i18['article_product_cta'] =  $row['article_product_cta'];
			$data_article_i18['article_content_cta'] =  $row['article_content_cta'];
			$data_article_i18['article_image'] =  $row['article_image'];
			$data_article_i18['article_image_attribution'] =  $row['article_image_attribution'];
			$data_article_i18['article_image_license'] =  $row['article_image_license'];
			$data_article_i18['article_publish_name'] =  $row['article_publish_name'];
			$data_article_i18['article_sha'] =  $row['article_sha'];
			$data_article_i18['article_commit_sha'] =  $row['article_commit_sha'];
			$data_article_i18['article_image_publish_name'] =  $row['article_image_publish_name'];
			$data_article_i18['image_sha'] =  $row['image_sha'];
			$data_article_i18['image_commit_sha'] =  $row['image_commit_sha'];
			
			if(strtotime($row['article_date'])){
				$data_article_i18['article_date'] =  $row['article_date'];
			}
			if(strtotime($row['publish_date'])){
				$data_article_i18['publish_date'] =  $row['publish_date'];
			}
	
			$data_article_i18['article_previous_status'] =  $row['article_status'];

			if(strtotime($row['date_added'])){
				$data_article_i18['date_added'] 	=  $row['date_added'];
			}
			if(strtotime($row['date_modified'])){
				$data_article_i18['date_modified'] =  $row['date_modified'];
			}

			$this->db->set($data_article_i18);
            $this->db->insert('articles_translate_i18');
		}

	}
	public function merge_s_query(){
		$this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_section';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['section_id'] = $row['section_id'];
			$data_article['language_id'] =  'en';
			$data_article['article_id'] = $row['article_id']; 
			
			$this->db->set($data_article);
            $this->db->insert('article_section');

			$data_article_i18['section_i18_id'] =  $row['section_id'];
			$data_article_i18['section_id'] =  $row['section_id'];
			$data_article_i18['language_id'] =  'en';
			$data_article_i18['section_title'] =  $row['section_title'];
			$data_article_i18['section_image_alt'] =  $row['section_image_alt'];
			$data_article_i18['section_text'] =  $row['section_text'];
			$data_article_i18['section_image'] =  $row['section_image'];
			$data_article_i18['section_video'] =  $row['section_video'];
			$data_article_i18['section_meta_video_name'] =  $row['section_meta_video_name'];
			$data_article_i18['section_meta_video_description'] =  $row['section_meta_video_description'];
			$data_article_i18['section_meta_video_url'] =  $row['section_meta_video_url'];
			$data_article_i18['section_meta_video_thumbnail_1x1'] =  $row['section_meta_video_thumbnail_1x1'];
			$data_article_i18['section_meta_video_thumbnail_4x3'] =  $row['section_meta_video_thumbnail_4x3'];
			$data_article_i18['section_meta_video_thumbnail_16x9'] =  $row['section_meta_video_thumbnail_16x9'];
			$data_article_i18['section_meta_video_uploaddate'] =  $row['section_meta_video_uploaddate'];
			$data_article_i18['section_meta_video_minutes'] =  $row['section_meta_video_minutes'];
			$data_article_i18['section_meta_video_seconds'] =  $row['section_meta_video_seconds'];
			$data_article_i18['section_meta_video_interaction_count'] =  $row['section_meta_video_interaction_count'];
			$data_article_i18['section_meta_video_expires'] =  $row['section_meta_video_expires'];
			$data_article_i18['section_image_attribution'] =  $row['section_image_attribution'];
			$data_article_i18['section_image_license'] =  $row['section_image_license'];
			$data_article_i18['section_cta'] =  $row['section_cta'];
			$data_article_i18['section_cta_product'] =  $row['section_cta_product'];
 
			$data_article_i18['article_section_sha'] =  $row['article_section_sha'];
			$data_article_i18['article_section_commit_sha'] =  $row['article_section_commit_sha'];
			$data_article_i18['article_section_image_publish_name'] =  $row['article_section_image_publish_name'];
			$data_article_i18['image_sha'] =  $row['image_sha'];
			$data_article_i18['image_commit_sha'] =  $row['image_commit_sha'];
			   

			if(strtotime($row['date_added'])){
				$data_article_i18['date_added'] 	=  $row['date_added'];
			}
			if(strtotime($row['date_modified'])){
				$data_article_i18['date_modified'] =  $row['date_modified'];
			}

			$this->db->set($data_article_i18);
            $this->db->insert('article_section_translate_i18');
		}

	}

	public function merge_step_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_section_steps';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['step_i18_id'] = $row['step_id'];
			$data_article['language_id'] =  'en';
			$data_article['section_id'] = $row['section_id']; 
			$data_article['step_description'] = $row['step_description']; 
			$data_article['step_order'] = $row['step_order']; 
			
			$this->db->set($data_article);
            $this->db->insert('article_section_steps_translate_i18');

		}

	}

	public function merge_ingredients_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_section_ingredients';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['ingredient_i18_id'] = $row['ingredient_id'];
			$data_article['language_id'] =  'en';
			$data_article['section_id'] = $row['section_id']; 
			$data_article['ingredient_name'] = $row['ingredient_name']; 
			$data_article['ingredient_qty'] = $row['ingredient_qty']; 
			$data_article['ingredient_order'] = $row['ingredient_order']; 
			
			$this->db->set($data_article);
            $this->db->insert('article_section_ingredients_translate_i18');

		}

	}
	public function merge_backlink_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_backlink';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['backlink_id'] = $row['backlink_id'];
			$data_article['language_id'] =  'en';
			$data_article['article_id'] = $row['article_id']; 
			$data_article['backlink_url'] = $row['backlink_url']; 
			$data_article['backlink_required'] = $row['backlink_required']; 
			$data_article['backlink_domain_authority'] = $row['backlink_domain_authority'];
			$data_article['backlink_validation'] = $row['backlink_validation']; 
			$data_article['link_text'] = $row['link_text']; 
			$data_article['link_url'] = $row['link_url'];  
			
			$this->db->set($data_article);
            $this->db->insert('article_backlink_translate_i18');

		}

	}
	public function merge_promotion_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_writer_promotion_queue';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['id'] = $row['id'];
			//$data_article['language_id'] =  'en';
			$data_article['article_id'] = $row['article_id']; 
			$data_article['message_id'] = $row['message_id']; 
			$data_article['channel'] = $row['channel']; 
			$data_article['headline'] = $row['headline'];
			$data_article['intro_text'] = $row['intro_text']; 
			$data_article['desc_text'] = $row['desc_text']; 
			$data_article['url_link'] = $row['url_link'];
			$data_article['image_url'] = $row['image_url'];
			$data_article['video_url'] = $row['video_url']; 
			$data_article['cta'] = $row['cta']; 
			$data_article['site_id'] = $row['site_id']; 
			if(strtotime($row['date_published'])){
				$data_article['date_published'] 	=  $row['date_published'];
			}
			if(strtotime($row['next_send_date'])){
				$data_article['next_send_date'] =  $row['next_send_date'];
			}   
			
			$this->db->set($data_article);
            $this->db->insert('article_writer_promotion_queue');

		}

	}

	public function merge_github_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_github';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['id'] =  $row['id'];
			$data_article['site_id'] =  $row['site_id']; 
			$data_article['github_repo'] =  $row['github_repo']; 
			$data_article['github_client_id'] =  $row['github_client_id']; 
			$data_article['github_api_key'] =  $row['github_api_key'];
			$data_article['github_article_path'] =	 $row['github_article_path']; 
			$data_article['github_article_image_path'] =  $row['github_article_image_path']; 
			
			
			$this->db->set($data_article);
            $this->db->insert('article_github');

		}

	}

	public function merge_user_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM article_user';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['user_id'] =  $row['user_id'];
			$data_article['user_fname'] =  $row['user_fname']; 
			$data_article['user_lname'] =  $row['user_lname']; 
			$data_article['user_name'] =  $row['user_name']; 
			$data_article['user_email'] =  $row['user_email'];
			$data_article['user_password'] =	 $row['user_password']; 
			$data_article['user_image'] =  $row['user_image'];
			$data_article['user_phone'] =  $row['user_phone'];
			$data_article['user_bo_info'] =	 $row['user_bo_info'];
			$data_article['meta_author_description'] =	 $row['meta_author_description']; 
			$data_article['meta_author_url'] =	 $row['meta_author_url']; 
			$data_article['meta_author_facebook_url'] =	 $row['meta_author_facebook_url']; 
			$data_article['meta_author_twitter_url'] =	 $row['meta_author_twitter_url']; 
			$data_article['meta_author_instagram_url'] = $row['meta_author_instagram_url']; 
			$data_article['meta_author_linkedin_url'] =	 $row['meta_author_linkedin_url'];  
			$data_article['user_is_admin'] =  (int)$row['user_is_admin'];
			if(strtotime($row['user_signup_date'])){
				$data_article['user_signup_date'] 	=  $row['user_signup_date'];
			}
			if(strtotime($row['date_modified'])){
				$data_article['date_modified'] =  $row['date_modified'];
			}
			if(strtotime($row['date_modified'])){
				$data_article['date_modified'] =  $row['date_modified'];
			} 
			  
			
			
			$this->db->set($data_article);
            $this->db->insert('article_user');

		}

	}

	public function merge_category_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM category';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['category_id'] =  $row['category_id'];
			$data_article['category_parent'] =  $row['category_parent']; 
			$data_article['category_name'] =  $row['category_name']; 
			$data_article['category_slug'] =  $row['category_slug']; 
			
			if(strtotime($row['date_modified'])){
				$data_article['date_modified'] =  $row['date_modified'];
			}
			if(strtotime($row['date_modified'])){
				$data_article['date_modified'] =  $row['date_modified'];
			} 
			  
			
			$this->db->set($data_article);
            $this->db->insert('category');

		}

	}
	public function merge_configuration_query(){
		
		$otherdb = $this->load->database('otherdb', TRUE);
		$sql2 = 'SELECT * FROM configuration';
		$result=(array)$otherdb->query($sql2)->result_array();
		foreach($result as $row){
			pre($row);
			$data_article['config_id'] =  $row['config_id'];
			$data_article['config_name'] =  $row['config_name']; 
			$data_article['config_value'] =  $row['config_value']; 
			$data_article['autoload'] =  $row['autoload']; 
 
			  
			
			$this->db->set($data_article);
            $this->db->insert('configuration');

		}

	}*/
	//1832, 1822
	public function run_query(){
		$sql = "UPDATE  article_keyword SET  website = 'zipclock.com', keyword = 'Biometric Time Clock' WHERE keyword_id = 2 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = "UPDATE  articles_translate_i18 SET  article_leadcapture_cta = 'leadcapture';";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = "UPDATE  wp_meta_product_lookup SET  leadcapture_cta = 'leadcapture';";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = 'ALTER TABLE public.wp_meta_product_lookup ADD COLUMN leadcapture_cta character varying(50);';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		//die;
		$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_leadcapture_cta character varying(100);';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;
		$sql = "UPDATE  webhook_response SET  webhook_status = 'publish' WHERE webhook_status = 'pending' ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = "UPDATE wp_meta_product_lookup SET  meta_product_unique_key = 'zip-training', product_cta = 'ziptraining', meta_product_id = 'Zip Training', meta_product_name = 'Zip Training', meta_product_image = 'logo-zip-training.png', meta_product_icon = 'icon-zip-training.png' WHERE meta_product_unique_key = 'zip-training-lms' ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = "UPDATE articles_translate_i18 SET  article_site_id = 'ziptraining.com', meta_product_unique_key = 'zip-training', article_product_cta = 'ziptraining', article_meta_product_id = 'Zip Training', article_meta_product_name = 'Zip Training', article_meta_product_image = 'logo-zip-training.png', article_meta_product_icon = 'icon-zip-training.png' WHERE article_site_id = 'ziptraininglms.com' ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		$sql = "UPDATE articles SET  site_id = 'ziptraining.com', article_published_website = 'ziptraining.com' WHERE article_published_website = 'ziptraininglms.com' ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;
		/*$sql = "UPDATE articles_translate_i18 SET  article_permalink = 'test-20202110', article_meta_keyword = 'test 20202110', keywords = 'test 20202110' WHERE article_site_id = 'altametrics.com' AND article_status = 'deleted' ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		    /*$sql = "DELETE FROM wp_promo_messages  WHERE article_id = 1858 AND msg_multimedia IS NULL;";
			$this->db->query($sql);
			echo "DELETE" . PHP_EOL;
			echo $this->db->last_query() . PHP_EOL;
			pre($this->db->error());
			die;
		    $sql = "DELETE FROM wp_promo_messages  WHERE msg_id = 23036 ;";
			$this->db->query($sql);
			 $sql1 = "DELETE FROM wp_promo_messages  WHERE msg_id = 22953 ;";
			$this->db->query($sql1);
			 $sql2 = "DELETE FROM wp_promo_messages  WHERE msg_id = 22961 ;";
			$this->db->query($sql2);
			$sql3 = "DELETE FROM wp_promo_messages  WHERE msg_id = 22954 ;";
			$this->db->query($sql3);
			$sql4 = "DELETE FROM wp_promo_messages  WHERE msg_id = 22952 ;";
			$this->db->query($sql4);
			$sql5 = "DELETE FROM wp_promo_messages  WHERE msg_id = 22962 ;";
			$this->db->query($sql5);
			echo "UPDATE" . PHP_EOL;
			echo $this->db->last_query() . PHP_EOL;
			pre($this->db->error());
			die;*/
		/*$sql = "UPDATE articles_translate_i18 SET  article_i18_publish_status = true  WHERE article_i18_status = true ;";
			$this->db->query($sql);
			echo "UPDATE" . PHP_EOL;
			echo $this->db->last_query() . PHP_EOL;
			pre($this->db->error());
			die;*/
			/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_i18_publish_status boolean DEFAULT False;';
			$this->db->query($sql);
			pre($this->db->error());
			echo "done";
		die;*/
		/*$sql1 = "UPDATE articles_translate_i18 SET  article_meta_author_url = 'https://hubworks.com/authors/chloe-henderson.html', article_meta_author_desc = 'Chloe received a bachelor&#039;s degree in journalism and mass communication from Ashford University and is currently a digital content creator for Hubworks. In her free time, she enjoys acting, writing, and spending time with family.' WHERE article_id = 806 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		
		/*$sql = "UPDATE wp_article_promo_channels SET  article_promo_channel_show_headline = false, article_promo_channel_show_msg_intro = false WHERE channel_id = 3 ;";
		$this->db->query($sql);
		$sql1 = "UPDATE wp_article_promo_channels SET  article_promo_channel_show_headline = false, article_promo_channel_show_msg_intro = false WHERE channel_id = 4 ;";
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		die;*/
		
		/*$sql = "UPDATE articles_translate_i18 SET  keywords = 'Quantitative Demand Forecasting', article_meta_keyword = 'Quantitative Demand Forecasting'  WHERE article_id = 669 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		
		/*$sql = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 687 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		
		$sql1 = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 736 ;";
		$this->db->query($sql1);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		
		$sql2 = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 738 ;";
		$this->db->query($sql2);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		
		$sql3 = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 739 ;";
		$this->db->query($sql3);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		
		$sql4 = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 740 ;";
		$this->db->query($sql4);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		
		$sql5 = "UPDATE articles_translate_i18 SET  article_site_id = 'zipforecasting.com'  WHERE article_id = 741 ;";
		$this->db->query($sql5);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_meta_author character varying(255);';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = "UPDATE articles_translate_i18 SET  article_meta_author_twitter = '@HubworksApp'  WHERE article_meta_author_twitter IS NOT NULL ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		//phpinfo();
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ALTER COLUMN prep_time TYPE character varying (255) COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		$sql = 'ALTER TABLE public.articles_translate_i18 ALTER COLUMN servings TYPE character varying (255) COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;
		$sql = 'ALTER TABLE public.articles_translate_i18 ALTER COLUMN article_meta_product_name TYPE text COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ALTER COLUMN article_image_license TYPE text COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql1 = "ALTER TABLE public.articles_translate_i18 ADD COLUMN article_i18_status boolean DEFAULT False;";
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		//$this->get_target_backlinks_count($id = 976);
		die;*/
		
		/*$sql = 'ALTER TABLE public.article_section_translate_i18 ALTER COLUMN article_section_image_publish_name TYPE character varying (255) COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = "UPDATE wp_promo_channels_schedule SET  schedule_time = '8:00,13:00'  WHERE channel_name = 'linkedin' ;";
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql = "UPDATE wp_promo_channels_schedule SET  schedule_time = '8:00,13:00'  WHERE channel_name = 'facebook' ;";
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql = "UPDATE wp_promo_channels_schedule SET  schedule_time = '8:00,13:00'  WHERE channel_name = 'instagram' ;";
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;
		$sql = "UPDATE wp_promo_channels_schedule SET  schedule_time = '1:00,2:00,3:00,4:00,5:00,6:00,7:00,8:00,9:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00,23:00,24:00'  WHERE channel_name = 'twitter' ;";
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		
		/*$sql = "UPDATE articles SET  article_author = 'Chloe Henderson'  WHERE article_id = 806 ;";
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql1 = "UPDATE articles_translate_i18 SET  article_meta_author_url = 'https://hubworks.com/authors/chloe-henderson.html', article_meta_author_desc = 'Chloe received a bachelor&#039;s degree in journalism and mass communication from Ashford University and is currently a digital content creator for Hubworks. In her free time, she enjoys acting, writing, and spending time with family.' WHERE article_id = 806 ;";
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ALTER COLUMN keywords TYPE character varying (255) COLLATE pg_catalog."default";';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		die;*/
		/*$sql = "UPDATE articles_translate_i18 SET  article_site_id = 'hubworks.com'  WHERE article_id = 588 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_backlinks_count character varying;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql1 = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_backlinks_target_count character varying;';
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		die;*/
		
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_content_score character varying;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
		$sql1 = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_target_score character varying;';
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		
		$sql2 = 'ALTER TABLE public.wp_promo_messages ADD COLUMN article_published_status boolean DEFAULT False;';
		$this->db->query($sql2);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = 'ALTER TABLE public.wp_article_promo_channels_config ADD COLUMN article_promo_channel_social_id bigint;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
	/*$sql = 'ALTER TABLE public.wp_promo_messages ADD COLUMN msg_status boolean DEFAULT True;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_content_performance_temp json;';
		$this->db->query($sql);
		$sql1 = "COMMENT ON COLUMN public.articles_translate_i18.article_content_performance_temp IS 'This column is used for export content performance keywords';";
		$this->db->query($sql1);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_content_performance json;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		die;*/
		/*$sql = "UPDATE articles_translate_i18 SET  keywords = 'Forecast Definition Business', article_meta_keyword = 'Forecast Definition Business', article_permalink = 'business-forecasting-guide/forecast-definition-business'  WHERE article_id = 611 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		/*$sql = "UPDATE articles_translate_i18 SET article_pillar_id = 663, article_permalink = 'forecasting-methods/quantitative-demand-forecasting'  WHERE article_id = 669 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		
		/*$sql = "UPDATE articles_translate_i18 SET article_icon = 'far fa-calendar-alt'  WHERE article_id = 594 AND article_i18_id = 572 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		
		/*$sql = "UPDATE articles_translate_i18 SET article_pillar_id = 594, article_permalink = 'employee-scheduling-apps/scheduling-mistakes'  WHERE article_id = 588 AND article_i18_id = 556 ;";
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		die;*/
		/*echo $this->db->last_query() . PHP_EOL;
		$sql = 'UPDATE articles_translate_i18 SET article_pillar_id = 607 WHERE article_id = 610 AND article_i18_id = 588 ;';
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql2 = 'UPDATE articles_translate_i18 SET article_pillar_id = 607 WHERE article_id = 643 AND article_i18_id = 621 ;';
		$this->db->query($sql2);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql3 = 'UPDATE articles_translate_i18 SET article_pillar_id = 607 WHERE article_id = 644 AND article_i18_id = 622 ;';
		$this->db->query($sql3);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql4 = 'UPDATE articles_translate_i18 SET article_pillar_id = 607 WHERE article_id = 640 AND article_i18_id = 618 ;';
		$this->db->query($sql4);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		
		
		pre($this->db->error());
		echo "UPDATE";
		die;*/
		/*$sql = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 616 AND article_i18_id = 594 ;';
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql2 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 635 AND article_i18_id = 613 ;';
		$this->db->query($sql2);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql3 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 611 AND article_i18_id = 589 ;';
		$this->db->query($sql3);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql4 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 612 AND article_i18_id = 590 ;';
		$this->db->query($sql4);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql5 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 614 AND article_i18_id = 592 ;';
		$this->db->query($sql5);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql6 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 638 AND article_i18_id = 616 ;';
		$this->db->query($sql6);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql7 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 637 AND article_i18_id = 615 ;';
		$this->db->query($sql7);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql8 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 647 AND article_i18_id = 625 ;';
		$this->db->query($sql8);
		echo "UPDATE" . PHP_EOL;
		echo $this->db->last_query() . PHP_EOL;
		$sql9 = 'UPDATE articles_translate_i18 SET article_pillar_id = 608 WHERE article_id = 652 AND article_i18_id = 630 ;';
		$this->db->query($sql9);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		
		pre($this->db->error());
		echo "UPDATE";
		die;*/
		/*$sql = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 654 AND article_i18_id = 632 ;';
		$this->db->query($sql);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql2 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 653 AND article_i18_id = 631 ;';
		$this->db->query($sql2);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql3 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 651 AND article_i18_id = 629 ;';
		$this->db->query($sql3);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql4 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 655 AND article_i18_id = 633 ;';
		$this->db->query($sql4);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql5 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 658 AND article_i18_id = 636 ;';
		$this->db->query($sql5);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql6 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 660 AND article_i18_id = 638 ;';
		$this->db->query($sql6);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql7 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 661 AND article_i18_id = 639 ;';
		$this->db->query($sql7);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		$sql8 = 'UPDATE articles_translate_i18 SET article_pillar_id = 650 WHERE article_id = 665 AND article_i18_id = 643 ;';
		$this->db->query($sql8);
		echo "UPDATE" . PHP_EOL;;
		echo $this->db->last_query() . PHP_EOL;
		pre($this->db->error());
		echo "UPDATE";
		die;*/
		
		/*$sql = 'ALTER TABLE public.article_user ADD COLUMN user_type bigint NOT NULL DEFAULT 0;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
		
	    $sql = 'UPDATE article_user SET user_type = 1 WHERE user_is_admin = 1;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "UPDATE";
		die;*/
		/*$sql = 'ALTER TABLE public.articles_translate_i18 ADD COLUMN article_icon character varying;';
		$this->db->query($sql);
		pre($this->db->error());
		echo "done";
//$text="スクリーンショットスクリーンショットスクリーンショット@#!%$*()*~'";
//echo $text=url_title($text);

		die;*/
	
	/*$sql = 'CREATE TABLE `article_writer_promotion_queue` (`id` int(11) NOT NULL,
		  `article_id` int(11) NOT NULL,
		  `date_published` datetime DEFAULT NULL,
		  `message_id` int(11) DEFAULT NULL,
		  `channel` varchar(50) DEFAULT NULL,
		  `headline` varchar(255) DEFAULT NULL,
		  `intro_text` text,
		  `desc_text` text,
		  `url_link` varchar(255) NOT NULL,
		  `image_url` varchar(255) DEFAULT NULL,
		  `video_url` varchar(255) DEFAULT NULL,
		  `cta` varchar(255) DEFAULT NULL,
		  `site_id` varchar(255) DEFAULT NULL,
		  `next_send_date` datetime DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
		$this->db->query($sql);
		$sql1 = 'ALTER TABLE `article_writer_promotion_queue`ADD PRIMARY KEY (`id`);';
		$this->db->query($sql1);
		$sql2 = 'ALTER TABLE `article_writer_promotion_queue` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;';
		$this->db->query($sql2);
		
		pre($this->db->error());
		echo "done";
		die;*/
		//$sql = 'ALTER TABLE `articles` ADD `article_metakeyword` VARCHAR(200) NULL  AFTER `article_meta_category`,  ADD `article_meta_abstract` VARCHAR(200) NULL  AFTER `article_metakeyword`,  ADD `article_meta_author_facebook` VARCHAR(80) NULL  AFTER `article_meta_abstract`,  ADD `article_meta_author_twitter` VARCHAR(200) NULL  AFTER `article_meta_author_facebook`,  ADD `article_meta_product_name` VARCHAR(80) NULL  AFTER `article_meta_author_twitter`,  ADD `article_meta_product_desc` VARCHAR(80) NULL  AFTER `article_meta_product_name`,  ADD `article_meta_product_image` VARCHAR(80) NULL  AFTER `article_meta_product_desc`,  ADD `article_meta_product_icon` VARCHAR(80) NULL  AFTER `article_meta_product_image`,  ADD `article_meta_product_id` VARCHAR(80) NULL  AFTER `article_meta_product_icon`,  ADD `article_meta_part_id` VARCHAR(80) NULL  AFTER `article_meta_product_id`,  ADD `article_meta_product_reviewcount` VARCHAR(80) NULL  AFTER `article_meta_part_id`,  ADD `article_meta_product_price_currency` VARCHAR(80) NULL  AFTER `article_meta_product_reviewcount`,  ADD `article_meta_product_brand` VARCHAR(80) NULL  AFTER `article_meta_product_price_currency`,  ADD `article_meta_product_price` VARCHAR(80) NULL  AFTER `article_meta_product_brand`,  ADD `article_meta_product_ratingvalue` VARCHAR(80) NULL  AFTER `article_meta_product_price`,  ADD `article_meta_author_url` VARCHAR(80) NULL  AFTER `article_meta_product_ratingvalue`;';

		//$this->db->query($sql);
		//pre($this->db->error());
		//$sql1 = 'ALTER TABLE `article_section`  ADD `section_meta_video_name` VARCHAR(200) NOT NULL  AFTER `section_image_alt`,  ADD `section_meta_video_description` VARCHAR(200) NOT NULL  AFTER `section_meta_video_name`,  ADD `section_meta_video_url` VARCHAR(200) NOT NULL  AFTER `section_meta_video_description`,  ADD `section_meta_video_thumbnail_1x1` VARCHAR(200) NOT NULL  AFTER `section_meta_video_url`,  ADD `section_meta_video_thumbnail_4x3` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_1x1`,  ADD `section_meta_video_thumbnail_16x9` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_4x3`,  ADD `section_meta_video_uploaddate` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_16x9`,  ADD `section_meta_video_minutes` VARCHAR(200) NOT NULL  AFTER `section_meta_video_uploaddate`,  ADD `section_meta_video_seconds` VARCHAR(200) NOT NULL  AFTER `section_meta_video_minutes`,  ADD `section_meta_video_interaction_count` VARCHAR(200) NOT NULL  AFTER `section_meta_video_seconds`,  ADD `section_meta_video_expires` VARCHAR(200) NOT NULL  AFTER `section_meta_video_interaction_count`;';
		//$this->db->query($sql1);
		//pre($this->db->error());
		//$sql2 = 'ALTER TABLE `article_section` CHANGE `section_meta_video_name` `section_meta_video_name` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_description` `section_meta_video_description` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_url` `section_meta_video_url` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_1x1` `section_meta_video_thumbnail_1x1` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_4x3` `section_meta_video_thumbnail_4x3` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_16x9` `section_meta_video_thumbnail_16x9` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_uploaddate` `section_meta_video_uploaddate` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_minutes` `section_meta_video_minutes` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_seconds` `section_meta_video_seconds` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_interaction_count` `section_meta_video_interaction_count` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_expires` `section_meta_video_expires` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;';
		//$this->db->query($sql2);
		//pre($this->db->error());
		
		
		//$sql = 'ALTER TABLE `articles` CHANGE `article_metakeyword` `article_metakeyword` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_abstract` `article_meta_abstract` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_author_facebook` `article_meta_author_facebook` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_author_twitter` `article_meta_author_twitter` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_name` `article_meta_product_name` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_desc` `article_meta_product_desc` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_image` `article_meta_product_image` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_icon` `article_meta_product_icon` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_id` `article_meta_product_id` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_part_id` `article_meta_part_id` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_reviewcount` `article_meta_product_reviewcount` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_price_currency` `article_meta_product_price_currency` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_brand` `article_meta_product_brand` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_price` `article_meta_product_price` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_product_ratingvalue` `article_meta_product_ratingvalue` VARCHAR(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `article_meta_author_url` `article_meta_author_url` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;';
		//$this->db->query($sql);
		//$sql = 'ALTER TABLE `article_section` CHANGE `section_meta_video_name` `section_meta_video_name` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_description` `section_meta_video_description` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_url` `section_meta_video_url` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_1x1` `section_meta_video_thumbnail_1x1` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_4x3` `section_meta_video_thumbnail_4x3` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_thumbnail_16x9` `section_meta_video_thumbnail_16x9` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_uploaddate` `section_meta_video_uploaddate` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_minutes` `section_meta_video_minutes` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_seconds` `section_meta_video_seconds` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_interaction_count` `section_meta_video_interaction_count` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `section_meta_video_expires` `section_meta_video_expires` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;';
		//$this->db->query($sql);
		
		//$sql = 'ALTER TABLE `article_section`  ADD `section_meta_video_name` VARCHAR(200) NOT NULL  AFTER `section_image_alt`,  ADD `section_meta_video_description` VARCHAR(200) NOT NULL  AFTER `section_meta_video_name`,  ADD `section_meta_video_url` VARCHAR(200) NOT NULL  AFTER `section_meta_video_description`,  ADD `section_meta_video_thumbnail_1x1` VARCHAR(200) NOT NULL  AFTER `section_meta_video_url`,  ADD `section_meta_video_thumbnail_4x3` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_1x1`,  ADD `section_meta_video_thumbnail_16x9` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_4x3`,  ADD `section_meta_video_uploaddate` VARCHAR(200) NOT NULL  AFTER `section_meta_video_thumbnail_16x9`,  ADD `section_meta_video_minutes` VARCHAR(200) NOT NULL  AFTER `section_meta_video_uploaddate`,  ADD `section_meta_video_seconds` VARCHAR(200) NOT NULL  AFTER `section_meta_video_minutes`,  ADD `section_meta_video_interaction_count` VARCHAR(200) NOT NULL  AFTER `section_meta_video_seconds`,  ADD `section_meta_video_expires` VARCHAR(200) NOT NULL  AFTER `section_meta_video_interaction_count`;';
		//$this->db->query($sql);
		//$sql = "CREATE TABLE `article_backlink` (  `backlink_id` int(11) NOT NULL,  `article_id` int(11) NOT NULL,  `backlink_url` text NOT NULL,  `backlink_required` int(1) DEFAULT '0',  `backlink_domain_authority` varchar(255) DEFAULT NULL,  `backlink_validation` int(2) DEFAULT NULL,  `link_text` varchar(255) DEFAULT NULL,  `link_url` text) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		//$this->db->query($sql);
		//$sql1 = "ALTER TABLE `article_backlink` ADD PRIMARY KEY (`backlink_id`);";
		//$this->db->query($sql1);
		//$sql2 = "ALTER TABLE `article_backlink` MODIFY `backlink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
		//$this->db->query($sql2);

		//echo "done";
		//$sql = "ALTER TABLE `articles` ADD `article_product_cta` VARCHAR(100) NULL DEFAULT NULL AFTER `article_toc_ordered`, ADD `article_content_cta` VARCHAR(100) NULL DEFAULT NULL AFTER `article_product_cta`;";
		//$sql = 'UPDATE `article_user` SET `user_is_admin` = 1 WHERE `article_user`.`user_email` = "cshekhar@altametrics.com"';
		//$this->db->query($sql);
		echo "done";
		die;
		$log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'chron-log-' . date('Y-m-d') . '.php';

		$message  = '';

        if ( ! file_exists($filepath))
        {
       		$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">" . PHP_EOL;
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }

        $message .= 'NOTICE - ' . $log_date . ' this is 3 message' . PHP_EOL;
        $message .= 'NOTICE - ' . $log_date . ' this is des' . PHP_EOL;

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);
die;

		die;
		$sitesearch = 'http://www.copyscape.com/api/?u=mgala&k=gthqd5s4wb1023pe&o=csearch&e=UTF-8&t=urlencode(No website is truly safe from the threat of content theft — and not all duplicated content is created maliciously. Regardless of the copier’s intentions, however, a site that falls victim to stolen content can suffer severe hits to its traffic flow, which can directly translate to revenue loss.)';
		$curl=curl_init();
		curl_setopt($curl, CURLOPT_URL, $sitesearch);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response=curl_exec($curl);

		$sites = simplexml_load_string ($response);
		pre($sites);
		foreach ($sites->result as $xml):
		$foundurl =$xml->url;
		$title =$xml->title;
		$wordsmatched=$xml->wordsmatched;
		$textmatched=$xml->textmatched;
		echo $html_results =  $html_results.$title.'<br>'.$foundurl.'<br>'.$textmatched.'<br>';
		endforeach;
		die;
		echo cleanHtml('$client = new \Github\Client(); \Github\Client::AUTH_HTTP_PASSWORD');
		/*
		ALTER TABLE `articles` ADD `article_prev_status` VARCHAR(50) NULL DEFAULT NULL AFTER `article_status`;

		"UPDATE `articles` SET `article_status` = 'submitted' WHERE `articles`.`article_status` = 'unpublish';";
		"UPDATE `articles` SET `article_status` = 'publish' WHERE `articles`.`article_status` = 'published';";
		$this->load->model('github_model');
		$where = 'site_id = "' . $article_published_website . '"';
		$github_row = $this->github_model-> get_by($where, TRUE);

		require_once APPPATH . 'third_party/vendor/autoload.php';

		$client = new \Github\Client();

		$tokenOrLogin = $github_row->github_client_id;
		$password	  = $github_row->github_api_key;

		$client->authenticate($tokenOrLogin, $password, \Github\Client::AUTH_HTTP_PASSWORD);

		$committer_name  = ucwords($this->session->userdata('full_name'));
		$committer_email = $this->session->userdata('email');
		$committer 		 = array('name' => $committer_name, 'email' => $committer_email);

		$article_commit_message = 'CMS Created ' . $repo_folder;

		die;
		$sql = 'UPDATE `article_user` SET `user_is_admin` = 1 WHERE `article_user`.`user_email` = "cshekhar@altametrics.com"';
		$this->db->query($sql);
		pre($this->db->affected_rows());
		die;
		$this->load->model('article_model');
		$article_list = $this->article_model->getArticles(1, null, true);
		echo cleanHtml($article_list[1]['paragraphs'][1]['section_text']);
		return true;

		$htmlContent  = '<p>Thank you for joing us! We\'re happy to see you in {portal_name} portal.</p>';
		$htmlContent .= '<p>Here is your user account details which can be updated in your Writer Portal account anytime.</p>';
		$htmlContent .= '<p>Username:<br>';
		$htmlContent .= 'psd2html2cms@gmail.com</p>';
		$htmlContent .= '<p>Password:<br>';
		$htmlContent .= '<strong>G5Rx0RO2</strong><br></p>';
		$htmlContent .= '<p>Kindest Regards,<br>';
		$htmlContent .= 'The {portal_name} Team</p>';

		$emailer_data['name'] 			 = "C Shekhar";
		$emailer_data['email'] 			 = 'cshekhar@altametrics.com';
		$emailer_data['message_subject'] = 'Welcome to {portal_name} Writer Portal!';
		$emailer_data['message_body'] 	 = $htmlContent;

		$message = $this->load->view('component/email',$emailer_data,TRUE); // this will return you html data as message

		$this->send_email($emailer_data, $message);
		die;


		// $sql = "RENAME TABLE `writerportal`.`article` TO `writerportal`.`articles`";
		// $this->db->query($sql);
		// pre($this->db->affected_rows());

		/*$sql = "ALTER TABLE `article_github` CHANGE `github_api_key` `github_api_key` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL";
		$this->db->query($sql);
		pre($this->db->affected_rows());*/

	}
	 public function curltest($env = Null, $cont = Null, $keyword = Null)
    {
		pre('ENV: '.$env);
        $no_of_search_count = 20;
		if($keyword){
			$keyword = urldecode($keyword);	
		}else{
			$keyword= 'Business Forecasting';	
		}
		
		$raw_content = "<p>If you love pancakes, it’s simply impossible for you not to be passionate about IHOP, the international pancake chain that has been serving some of the best pancakes in the world since 1958. Yes, in case you didn’t know, IHOP is more than half a century old, 61 years old this July (2019) to be precise. </p><p>According to Wikipedia, the international house of pancakes opened its very first location on July 7 in Burbank, California. And just in case you are wondering, yes, IHOP is an acronym or short form for International House of Pancakes! </p><p>The chain’s full name was shortened in 1973 for marketing purposes, and from 1994, the acronym appeared on the restaurant’s logo, thus replacing the full name. Today, the brand boasts of more than 1,600 locations </p><p>worldwide, and is believed to serve more than 700 million pancakes every year. </p><p>Today’s recipe is a copy cat of IHOP as you may have already guessed, and is bound to produce the fluffiest, most buttery pancakes you’ve had in a long time. Good luck! </p><br><br>";
		if($cont == 1){
			$content = strip_tags($raw_content);	
		}else{
			$content =	'';
		}
		
		
		$article_id = 111;
		$lang_id = 'en';
		$env = strtolower($env);
					/* API URL */
			if($env == 'qa'){
				$url = 'https://whookqa.hubworks.com/keywordphrase';
			
			}else{ 
			
				$url = 'https://wplseotools.hubworks.com/keywordphrase';
			}
			
			pre('Api Url'.$url);
		
			/* Init cURL resource */
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			/* Array Parameter Data */
			$data_array = array(
				'keyword'=>$keyword,
				'page_content'=>$content,
				'page_id'=>$article_id,
				'lang'=>$lang_id,
				'no_of_search_count'=>$no_of_search_count
			);
			echo 'Input Array Parameter Data';
			pre($data_array);

			$data =  json_encode($data_array, JSON_PRETTY_PRINT);
			/* pass encoded JSON string to the POST fields */
			pre('Input JSON Parameter Data: <br>'.$data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
			/* set the content type json */
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type:application/json'
					));
				
			/* execute request */
			$output = curl_exec($ch);
			pre('Curl response in JSON: <br>'.json_encode(json_decode($output), JSON_PRETTY_PRINT));
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			pre('Http Code: ' . $httpCode);
				//echo $httpCode;
			if($output === false)
			{
				pre('Curl error: ' . curl_error($ch));
				
			    //echo 'Curl error: ' . curl_error($ch);
				
				
			}
			else
			{
				$result = json_decode($output, true);
				echo 'Curl response in Array: ';
				pre($result);
			}
			/* close cURL resource */
			curl_close($ch);

	}
}
