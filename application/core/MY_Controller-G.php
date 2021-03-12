<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $data = array();
    public function __construct()
    {
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('contentarticlesbrief_model');
		$this->load->model('category_model');
		$this->load->library('session');
        $this->data['error'] = array();
		$this->data['menu'] = $this->getMenu();
		$this->data['websites'] = $this->article_model->get_github_repo();
		//$this->data['categories'] = $this->category_model->get_category_by_array('article');
		$this->data['article_categories'] = $this->category_model->get_category_json('article');
		$this->data['news_categories'] = $this->category_model->get_category_json('news');
		$this->data['recipe_categories'] = $this->category_model->get_category_json('recipe');
		$this->data['pillar_articles'] = $this->article_model->get_pillar_article('hubworks.com');
		$this->data['brief_articles'] = $this->contentarticlesbrief_model->get_brief_list_by_user();

        $this->data['current_user_full_name'] = ucwords($this->session->userdata('full_name'));
        $this->data['current_user_email'] = $this->session->userdata('email');
		$this->data['current_user_id'] = $this->session->userdata('id');
		$this->data['user_id'] = $this->session->userdata('id');
		$this->data['is_admin'] = $this->session->userdata('is_admin');
		$this->data['user_type'] = $this->session->userdata('user_type');
		$this->data['is_user_logged_in'] = $this->session->userdata('loggedin');

	}

    public function getMenu()
    {
		$domain_name = getDoaminName();
		$fileName = FCPATH . 'data/' . $domain_name . '.json';
		if(!file_exists($fileName))
		{
			$domain_name = 'hubworks';
		}

		$this->load->library('curl');
		$output = $this->curl->simple_get(site_url('data/' . $domain_name . '.json'));

        return json_decode($output, true);
    }

	public function send_email($emailer_data, $message, $attach = null){

		if(ENVIRONMENT == 'development' || ENVIRONMENT == 'testing'){
			return TRUE;
		}

		$this->load->library('email');
		$this->load->library('parser');
		$parse_data = array(
			'portal_name' => $this->data['menu']['MetaData']['name'],
			'portal_logo' => site_url('assets/images/' . $this->data['menu']['NavBrand']['logo']),
			'portal_url' => $this->data['menu']['NavBrand']['brandLink']
		);

		$smtp_user = $this->config->item('emailconfig_smtp_user');
		if($smtp_user){
			$this->email->smtp_user = $smtp_user;
		}

		$smtp_host = $this->config->item('emailconfig_smtp_host');
		if($smtp_host){
			$this->email->smtp_host = $smtp_host;
		}

		$smtp_port = $this->config->item('emailconfig_smtp_port');
		if($smtp_port){
			$this->email->smtp_port = $smtp_port;
		}

		$smtp_pass = $this->config->item('emailconfig_smtp_pass');

		if($smtp_pass){
			$this->email->smtp_pass = $smtp_pass;
		}

		$smtp_crypto = $this->config->item('emailconfig_smtp_crypto');
		if($smtp_crypto){
			$this->email->smtp_crypto = $smtp_crypto;
		}

		$parse_message = $this->parser->parse_string($message, $parse_data);
		$parse_message_subject = $this->parser->parse_string($emailer_data['message_subject'], $parse_data);

		$this->email->from($emailer_data['from_email'], $emailer_data['from_name']);
		$this->email->to($emailer_data['to_email'], $emailer_data['to_name']);
		$this->email->subject($parse_message_subject);
		$this->email->message($parse_message);
		if($attach){
			$this->email->attach($attach);
		}
		if (!$this->email->send()){
			//pre($this->email->print_debugger());
			return FALSE;
			foreach ( $this->email->get_debugger_messages() as $debugger_message ){
				//echo $debugger_message;
			}
			// Remove the debugger messages as they're not necessary for the next attempt.
			$this->email->clear_debugger_messages();
		}
		else{
			return TRUE;
		}
	}
	
	public function deletePublishedArticle($article_id, $language_id){
		$this->publishArticle($article_id, $language_id, $delete = TRUE);
	}

	public function publishArticle($article_id = NULL, $language_id, $delete = FALSE)
    {
		$error = TRUE;
		$return_message = '';
		$to_name = '';
		$to_email = '';
		$article_title = '';
		$return =  array('error'=>true, 'message' => 'Somthing Wrong, Please try again');

		if ($this->input->post('article_publish_id')) {
            $article_id = $this->input->post('article_publish_id');
		}

		$article_published_website = 'hubworks.com';
		if ($this->input->post('article_published_website')) {
			$article_published_website = strtolower($this->input->post('article_published_website'));
		}
		$this->load->model('github_model');
		//$where = 'site_id = "' . $article_published_website . '"';
		$where = "site_id =  '".$article_published_website."'";
		$github_row = $this->github_model->get_by($where, TRUE);

		if(!$article_id){
			$return_message = 'Please Select Article to Publish;';
		}else if(!$github_row){
			$return_message = 'Github repository is not found';
		}else{
			$error = FALSE;

			$this->load->model('article_model');

			$article_list = $this->article_model->getArticlesI18($article_id, $language_id, null, true);
			//pre_exit($article_list);
			$article = $article_list[$article_id];
			//pre($article);
			
			if($article['article_author']){
                $author = ucwords($article['article_author']);
			}else{
				$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
			}
			
			//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
			$to_name = $author;
			$to_email = $article['user_email'];

			$article_title = trim($article['article_title']);

			$content = '';
			if(!$delete){
				//if($article_published_website == 'hubworks.com' || $article_published_website == 'zipschedules.com' || $article_published_website == 'zipclock.com' || $article_published_website == 'zipinventory.com' || $article_published_website == 'zipordering.com' || $article_published_website == 'ziphaccp.com' || $article_published_website == 'zipchecklist.com' || $article_published_website == 'zipposdashboard.com'){
				if($article_published_website == 'rmagazine.com'){
					$content 	= $this->createContentOthers($article);
				}elseif($article_published_website == 'altametrics.com'){
					if($article['article_type'] =='pillar' || $article['article_type'] =='supporting'){

						$content	= $this->createContentAltametricsTopicCluster($article);
					}else{
						$content	= $this->createContentAltametrics($article);	
					}
				}else{
					if($article['article_type'] =='pillar' || $article['article_type'] =='supporting'){

						$content	= $this->createContentHubworksTopicCluster($article);
					}else{
						$content	= $this->createContentHubworks($article);	
					}
					
				}
			}
			//pre($article);
			//pre($content);
			//pre($delete);
			$response  	= $this->pushContentGithub($article, $content, $delete);
			$error = $response['error'];

			$htmlContent  = '<p>Hello ' . $to_name . '!</p>';
			$return['error'] = $error;
			if($delete && !$error){
				$return_message = 'Article Deleted Successfully';
				$message_subject = 'Article Deleted Successfully';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>The article will be removed from the website on the next update.</p>';
			}else if(!$error){
				$return_message = 'Article Published Successfully';
				$message_subject = 'Article Published Successfully';
				$htmlContent .= '<p>Your article is published.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p><strong>Website URL:</strong> ' . $article_published_website . '</p>';
			}
			$return['emailsend'] = 'false';
			if(!$error){
				/*** Send Email ****/
				$this->load->library('email');
				$from_name = $this->config->item('emailconfig_from_name');
				$from_email 	  = $this->config->item('emailconfig_from_email');

				$htmlContent .= '<p>&nbsp;</p>';
				$htmlContent .= '<p>Thank you,<br>';
				$htmlContent .= 'The {portal_name} Team</p>';

				$emailer_data['from_name']		 = $from_name;
				$emailer_data['from_email']		 = $from_email;
				$emailer_data['to_name']		 = $to_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = $message_subject;
				$emailer_data['message_body'] 	 = $htmlContent;

				$message = $this->load->view('component/email', $emailer_data, TRUE);
				$return['emailsend'] = 'true';
				$this->send_email($emailer_data, $message);
				/*** Send Email End ****/
			}
		}

		$return['message'] = $return_message;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($return));
	}
	public function publishArticleI18n_old($article_id = NULL, $language_id, $delete = FALSE)
    {
		$error = TRUE;
		$return_message = '';
		$to_name = '';
		$to_email = '';
		$article_title = '';
		$return =  array('error'=>true, 'message' => 'Somthing Wrong, Please try again');

		if ($this->input->post('article_publish_id')) {
            $article_id = $this->input->post('article_publish_id');
		}

		$article_published_website = 'hubworks.com';
		if ($this->input->post('article_published_website')) {
			$article_published_website = strtolower($this->input->post('article_published_website'));
		}
		$this->load->model('github_model');
		//$where = 'site_id = "' . $article_published_website . '"';
		$where = "site_id =  '".$article_published_website."'";
		$github_row = $this->github_model->get_by($where, TRUE);

		if(!$article_id){
			$return_message = 'Please Select Article to Publish;';
		}else if(!$github_row){
			$return_message = 'Github repository is not found';
		}else{
			$error = FALSE;

			$this->load->model('article_model');

			$article_list = $this->article_model->getArticlesI18($article_id, $language_id, null, true);
			//pre_exit($article_list);
			$article = $article_list[$article_id];
			//pre($article);
			
			
			if($article['article_author']){
                $author = ucwords($article['article_author']);
			}else{
				$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
			}
			//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
			$to_name = $author;
			$to_email = $article['user_email'];

			$article_title = trim($article['article_title']);

			$content = '';
			if(!$delete){
				//if($article_published_website == 'hubworks.com' || $article_published_website == 'zipschedules.com' || $article_published_website == 'zipclock.com' || $article_published_website == 'zipinventory.com' || $article_published_website == 'zipordering.com' || $article_published_website == 'ziphaccp.com' || $article_published_website == 'zipchecklist.com' || $article_published_website == 'zipposdashboard.com'){
				if($article_published_website == 'rmagazine.com'){
					$content 	= $this->createContentOthers($article);
				}elseif($article_published_website == 'altametrics.com'){
					$content 	= $this->createContentAltametricsOld($article);
				}else{
					if($article['article_type'] =='pillar' || $article['article_type'] =='supporting'){

						$content	= $this->createContentHubworksTopicCluster($article);
					}else{
						$content	= $this->createContentHubworks($article);	
					}
					
				}
			}
			
			$response  	= $this->pushContentGithub($article, $content, $delete);
			$error = $response['error'];

			$htmlContent  = '<p>Hello ' . $to_name . '!</p>';
			$return['error'] = $error;
			/*if($delete && !$error){
				$return_message = 'Article Deleted Successfully';
				$message_subject = 'Article Deleted Successfully';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>The article will be removed from the website on the next update.</p>';
			}else if(!$error){
				$return_message = 'Article Published Successfully';
				$message_subject = 'Article Published Successfully';
				$htmlContent .= '<p>Your article is published.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p><strong>Website URL:</strong> ' . $article_published_website . '</p>';
			}
			$return['emailsend'] = 'false';*/
			
		}

		/*$return['message'] = $return_message;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($return));*/
	}


	protected function createContentHubworks($article){

		$article_tags = '';
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}
		$a_update_image = $article_image = trim($article['article_image']);

		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
		}
		
		$cta_product = trim($article['article_product_cta']);
		$metakeyword = trim($article['article_meta_keyword']);
		$meta_abstract = trim($article['article_meta_abstract']);
		$meta_author_facebook = trim($article['article_meta_author_facebook']);
		$meta_author_twitter = str_replace(array('&amp;#039;', '&#039;'),'',trim($article['article_meta_author_twitter']));
		$meta_product_name = trim($article['article_meta_product_name']);
		$meta_product_desc = trim($article['article_meta_product_desc']);
		$meta_product_image = trim($article['article_meta_product_image']);
		$meta_product_icon = trim($article['article_meta_product_icon']);
		$meta_product_id = trim($article['article_meta_product_id']);
		$meta_part_id = trim($article['article_meta_part_id']);
		$meta_product_price_currency = trim($article['article_meta_product_price_currency']);
		$meta_product_reviewcount = trim($article['article_meta_product_reviewcount']);
		$meta_product_brand = trim($article['article_meta_product_brand']);
		$meta_product_price = trim($article['article_meta_product_price']);
		$meta_product_ratingvalue = trim($article['article_meta_product_ratingvalue']);

		
		$cta_signup = ($cta_product) ? 'true' : 'false';
		$body = "---" . PHP_EOL;

		//$body .= 'layout: [article_v2,article_amp_v2]' . PHP_EOL; // layout: detail_recipe
		$body .= 'layout: article_v2' . PHP_EOL; // layout: detail_recipe
		$body .= 'language: ' . cleanMdHTML(trim($article['language_id'])) . PHP_EOL;
		$body .= 'i18n_link: ' . $article['article_id'] . PHP_EOL;
		$body .= 'permalink: ' . PHP_EOL;
		$body .= 'amp_page: true' . PHP_EOL;
		$body .= 'sitemap: true' . PHP_EOL;
		$body .= 'product_signup: ' . PHP_EOL;

		$body .= 'critical_css: article' . PHP_EOL;
		$body .= 'meta_json-ld_types: breadcrumb, article' . PHP_EOL;

		$body .= 'nav_top_show: false' . PHP_EOL;
		$body .= 'testimonials: 1' . PHP_EOL;

		$body .= 'cta_article: ' . PHP_EOL; 
		$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_signup: 4' . PHP_EOL;
		$body .= '  cta_headline: Online employee scheduling software that makes shift planning effortless. <br><strong>Try it free for 14 days.</strong>' . PHP_EOL;

		$body .= 'cta_popup: ' . PHP_EOL; 
		$body .= '  cta_web_notification: true'. PHP_EOL;
		$body .= '  cta_toast: 0'. PHP_EOL;
		$body .= '  cta_leadcapture_id: 27' . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			
		$body .= 't_meta_title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
		$body .= 't_meta_description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		$body .= 't_meta_keywords: ' . cleanMdHTML_i18n(trim($metakeyword) ). PHP_EOL;
		$body .= 't_meta_product: ' . trim($cta_product) . PHP_EOL;
		$body .= 't_meta_abstract: ' . cleanMdHTML_i18n(trim($meta_abstract)) . PHP_EOL;
			
		}else{
			
		$body .= 't_meta_title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		$body .= 't_meta_description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body .= 't_meta_keywords: ' . cleanMdHTML(trim($metakeyword)) . PHP_EOL;
		$body .= 't_meta_product: ' . cleanMdHTML(trim($cta_product)) . PHP_EOL;
		$body .= 't_meta_abstract: ' . cleanMdHTML(trim($meta_abstract)) . PHP_EOL;
			
		}
		
		$body .= 't_meta_category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
		$body .= 'p_meta_author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
		$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
		$body .= 't_meta_author_description: ' . cleanMdHTML_i18n(trim($author_bo_info)) . PHP_EOL;
		$body .= 'p_meta_author_facebook: ' .cleanMdHTML_i18n(trim($meta_author_facebook)) . PHP_EOL;
		$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML_i18n(trim($meta_author_twitter)) . "'". PHP_EOL;
		}else{
		$body .= 'p_meta_author: ' . cleanMdHTML(trim($author)) . PHP_EOL;
		$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
		$body .= 't_meta_author_description: ' .cleanMdHTML(trim($author_bo_info)) . PHP_EOL;
		$body .= 'p_meta_author_facebook: ' . cleanMdHTML(trim($meta_author_facebook)) . PHP_EOL;
		$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML(trim($meta_author_twitter)) . "'". PHP_EOL;	
		}
		
		$body .= 'p_meta_publisher: Hubworks' . PHP_EOL;
		$body .= 'i_meta_publisher_image: logo-hubworks-185x49.png' . PHP_EOL;
		$body .= 'v_meta_publisher_image_width: 185' . PHP_EOL;
		$body .= 'v_meta_publisher_image_height: 49' . PHP_EOL;
		$body .= 'p_meta_copyright: Hubworks' . PHP_EOL;

		$body .= 't_meta_product_name: ' . trim($meta_product_name) . PHP_EOL;
		$body .= 't_meta_product_desc: ' . trim($meta_product_desc) . PHP_EOL;
		$body .= 'i_meta_product_image: ' . trim($meta_product_image) . PHP_EOL;
		$body .= 'i_meta_product_icon: ' . trim($meta_product_icon) . PHP_EOL;
		
		$body .= 'v_meta_product_id: ' . cleanMdHTML(trim($meta_product_id)) . PHP_EOL;
		$body .= 'p_meta_product_brand: ' . cleanMdHTML(trim($meta_product_brand)) . PHP_EOL;
		$body .= 'v_meta_product_ratingvalue: ' . cleanMdHTML(trim($meta_product_ratingvalue)). PHP_EOL;
		$body .= 'v_meta_product_reviewcount: ' . cleanMdHTML(trim($meta_product_reviewcount)). PHP_EOL;
		$body .= 'p_meta_product_price_currency: ' . cleanMdHTML(trim($meta_product_price_currency)). PHP_EOL;
		$body .= 'v_meta_product_price: ' . trim($article['article_meta_product_price']) . PHP_EOL;
		$body .= 'v_meta_date_published: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_meta_date_modified: ' . nice_date($article['date_modified'], 'Y-m-d') . PHP_EOL;

		$body .= 'cta_webinar: true' . PHP_EOL;
		$body .= 'article_id: ' . trim($article['article_id']) . PHP_EOL;
		$body .= 'category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'date: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		//$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 'author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
			$body .= 'title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
		}else{
			$body .= 'author: ' . cleanMdHTML(trim($author)) . PHP_EOL;
			$body .= 'title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		}
		
		$body .= 'image: ' . $a_update_image . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 'image_attribution: ' . cleanMdHTML_i18n(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . cleanMdHTML_i18n(trim($article['article_image_license'])) . PHP_EOL;
		}else{
			$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;
		}
		
		
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
		$body .= 'description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		}else{
		$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;	
		}
		
		$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;

		$prep_time = trim($article['prep_time']);
		if($prep_time){
			$body .= 'preparation_time: ' . $prep_time . PHP_EOL;
		}

		$servings = trim($article['servings']);
		if($servings){
			$body .= 'servings: ' . $servings . PHP_EOL;
		}

		$body .= 'tags: ' . $article_tags . PHP_EOL;

		$body .= PHP_EOL;

		$paragraphs = $article['paragraphs'];

		if(is_array($paragraphs) && count($paragraphs) > 0){

			$body .= 'article:' . PHP_EOL;

			foreach ($paragraphs as $paragraph) {
			        if($paragraph['language_id'] == 'en'){
					$section_image_name = $article['article_title'];
				}else{
					$section_image_name = $this->get_article_title($article['article_id']);
				}

				$video_youtube = '';
				if ($paragraph['section_video']) {
					$video_youtube = 'true';
				}
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					
					/*if($paragraph['section_title']){
                        if($paragraph['language_id'] == 'en'){
							$section_image_name = $paragraph['section_title'];
						}else{
							$section_image_name = $this->get_section_title($article['article_id']);
						}
					} */
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
					//$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
				}
				$video_language='';
				if($paragraph['section_video']){
					$video_language = cleanMdHTML(trim($article['language_id']));
				}
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '  - sub_title: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
				}else{
					$body .= '  - sub_title: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;	
				}
				
				$body .= '    video: ' . trim($paragraph['section_video']) . PHP_EOL;
				$body .= '    video_language: '.$video_language . PHP_EOL;
				$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    meta_video_uploaddate: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;
				}else{
					$body .= '    meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    meta_video_uploaddate: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;
				}
				
				$body .= '    meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
				$body .= '    meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
				$body .= '    meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
				$body .= '    meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
				$body .= '    image: ' . $p_update_image . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    image_attribution: ' . cleanHtml_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
					$body .= '    image_license: ' . cleanHtml_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;
				}else{
					$body .= '    image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
					$body .= '    image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;					
				}
				
				
				$body .= '    cta_insert: ' . trim($paragraph['section_cta']) . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    body_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
				}else{
					$body .= '    body_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;	
				}
				
				$body .= '    callouts: ' . PHP_EOL;
				foreach ($paragraph['callouts'] as $callout) {
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
						$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
					}else{
						$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
						$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;
					}
					
				}
				$body .= '    social_media_callouts: ' . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
					$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					
				}else{
					$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
					$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
				}
				if( $article_type == 'recipe'){
					$body .= 'ingredients: ' . PHP_EOL;
					foreach ($paragraph['ingredients'] as $ingredient) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '  - ingredient_name: ' . cleanMdHTML_i18n(trim($ingredient['ingredient_name'])) . '     ' . cleanMdHTML_i18n($ingredient['ingredient_qty']) . PHP_EOL;
						}else{
							$body .= '  - ingredient_name: ' . cleanMdHTML(trim($ingredient['ingredient_name'])) . '     ' . cleanMdHTML($ingredient['ingredient_qty']) . PHP_EOL;
						}
						
					}

					$body .= 'directions: ' . PHP_EOL;
					foreach ($paragraph['steps'] as $steps) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '  - step: ' . cleanMdHTML_i18n($steps['step_description']) . PHP_EOL;
						}else{
							$body .= '  - step: ' . cleanMdHTML($steps['step_description']) . PHP_EOL;
						}
						
					}
				}
			}
		}

		$body .= "---" . PHP_EOL;

		return $body;
	}

	protected function createContentHubworksTopicCluster($article){

		$article_tags = '';
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}
		$a_update_image = $article_image = trim($article['article_image']);

		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
		}
		$cta_product = trim($article['article_product_cta']);
		$metakeyword = trim($article['article_meta_keyword']);
		$meta_abstract = trim($article['article_meta_abstract']);
		$meta_author_facebook = trim($article['article_meta_author_facebook']);
		$meta_author_twitter = str_replace(array('&amp;#039;', '&#039;'),'',trim($article['article_meta_author_twitter']));
		$meta_product_name = trim($article['article_meta_product_name']);
		$meta_product_desc = trim($article['article_meta_product_desc']);
		$meta_product_image = trim($article['article_meta_product_image']);
		$meta_product_icon = trim($article['article_meta_product_icon']);
		$meta_product_id = trim($article['article_meta_product_id']);
		$meta_part_id = trim($article['article_meta_part_id']);
		$meta_product_price_currency = trim($article['article_meta_product_price_currency']);
		$meta_product_reviewcount = trim($article['article_meta_product_reviewcount']);
		$meta_product_brand = trim($article['article_meta_product_brand']);
		$meta_product_price = trim($article['article_meta_product_price']);
		$meta_product_ratingvalue = trim($article['article_meta_product_ratingvalue']);

		
		$cta_signup = ($cta_product) ? 'true' : 'false';
		$body = "---" . PHP_EOL;

		//$body .= 'layout: [topic_cluster,topic_cluster_amp]' . PHP_EOL; // layout: topic_cluster
		$body .= 'layout: topic_cluster' . PHP_EOL; // layout: topic_cluster
		$body .= 'language: ' . cleanMdHTML(trim($article['language_id'])) . PHP_EOL;
		/*if($article_type == 'pillar'){
			$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . PHP_EOL;
		}else{
			$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . '.html' . PHP_EOL;
		}*/
		$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . '.html' . PHP_EOL;
		$body .= 'i18n_link: ' . $article['article_id'] . PHP_EOL;
		$body .= 'amp_page: true' . PHP_EOL;
		$body .= 'sitemap: true' . PHP_EOL;
		//$body .= 'product_signup: ' . PHP_EOL;

		$body .= 'critical_css: topic_cluster' . PHP_EOL;
		$body .= 'meta_json-ld_types: breadcrumb, article' . PHP_EOL;

		//$body .= 'nav_top_show: false' . PHP_EOL;
		//$body .= 'testimonials: 1' . PHP_EOL;

		$body .= 'cta: ' . PHP_EOL; 
		//$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_form_id: 4' . PHP_EOL;
		$body .= '  cta_inline_headline: Online employee scheduling software that makes shift planning effortless. <br><strong>Try it free for 14 days.</strong>' . PHP_EOL;
		$body .= '  cta_inline_button_text: Try Zip Schedules for free' . PHP_EOL;
		$body .= '  cta_toast: 0'. PHP_EOL;
		$body .= '  cta_popup_form_id: 27' . PHP_EOL;
		
         if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 't_meta_title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
			 $body .= 't_meta_description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		 }else{
			$body .= 't_meta_title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_meta_description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL; 
		 }
		
		//$body .= 't_meta_keywords: ' . cleanMdHTML(trim($metakeyword)) . PHP_EOL;
		//$body .= 't_meta_product: ' . cleanMdHTML(trim($cta_product)) . PHP_EOL;
		//$body .= 't_meta_abstract: ' . cleanMdHTML(trim($meta_abstract)) . PHP_EOL;
		$body .= 't_meta_category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 
			$body .= 'p_meta_author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
			$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
			$body .= 'i_meta_author_image: ' . basename($article['user_image']) . PHP_EOL;
			$body .= 't_meta_author_description: ' . cleanMdHTML_i18n(trim($author_bo_info)) . PHP_EOL;
			$body .= 'p_meta_author_facebook: ' . cleanMdHTML_i18n(trim($meta_author_facebook)) . PHP_EOL;
			$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML_i18n(trim($meta_author_twitter)) . "'". PHP_EOL;
			 
		 }else{
			 
			$body .= 'p_meta_author: ' . trim($author) . PHP_EOL;
			$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
			$body .= 'i_meta_author_image: ' . basename($article['user_image']) . PHP_EOL;
			$body .= 't_meta_author_description: ' . cleanMdHTML(trim($author_bo_info)) . PHP_EOL;
			$body .= 'p_meta_author_facebook: ' . cleanMdHTML(trim($meta_author_facebook)) . PHP_EOL;
			$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML(trim($meta_author_twitter)) . "'". PHP_EOL;
			 
		 }
		
		$body .= 'p_meta_publisher: Hubworks' . PHP_EOL;
		$body .= 'i_meta_publisher_image: logo-hubworks-185x49.png' . PHP_EOL;
		$body .= 'v_meta_publisher_image_width: 185' . PHP_EOL;
		$body .= 'v_meta_publisher_image_height: 49' . PHP_EOL;
		$body .= 'p_meta_copyright: Hubworks' . PHP_EOL;
		$body .= 'i_meta_image: ' . PHP_EOL;

		//$body .= 't_meta_product_name: ' . trim($meta_product_name) . PHP_EOL;
		//$body .= 't_meta_product_desc: ' . trim($meta_product_desc) . PHP_EOL;
		//$body .= 'i_meta_product_image: ' . trim($meta_product_image) . PHP_EOL;
		//$body .= 'i_meta_product_icon: ' . trim($meta_product_icon) . PHP_EOL;
		//$body .= 'v_meta_product_id: ' . cleanMdHTML(trim($meta_product_id)) . PHP_EOL;
		//$body .= 'p_meta_product_brand: ' . cleanMdHTML(trim($meta_product_brand)) . PHP_EOL;
		//$body .= 'v_meta_product_ratingvalue: ' . cleanMdHTML(trim($meta_product_ratingvalue)). PHP_EOL;
		//$body .= 'v_meta_product_reviewcount: ' . cleanMdHTML(trim($meta_product_reviewcount)). PHP_EOL;
		//$body .= 'p_meta_product_price_currency: ' . cleanMdHTML(trim($meta_product_price_currency)). PHP_EOL;
		//$body .= 'v_meta_product_price: ' . trim($article['article_meta_product_price']) . PHP_EOL;
		$body .= 'v_meta_date_published: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_meta_date_modified: ' . nice_date($article['date_modified'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_article_id: ' . $article['article_id'] . PHP_EOL;
		$body .= 'v_article_pillar_id: ' . $article['article_pillar_id'] . PHP_EOL;
		$body .= 'i_icon: ' . $article['article_icon'] . PHP_EOL;
		
         if($article_type=='pillar'){
			$body .= 't_pillar_name: ' . trim($article['article_meta_keyword']) . PHP_EOL;
		 }else{
			$body .= 't_pillar_name: ' . PHP_EOL;
		 }
		
		
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 't_keyword: ' . cleanMdHTML_i18n(trim($article['article_meta_keyword'])) . PHP_EOL;
			$body .= 't_summary: ' . cleanMdHTML_i18n($article['article_description']) . PHP_EOL;
			$body .= 't_h1_headline: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_h1_text: ' . cleanMdHTML_i18n($article['article_description']) . PHP_EOL;
		 }else{
			$body .= 't_keyword: ' . cleanMdHTML(trim($article['article_meta_keyword'])) . PHP_EOL;
			$body .= 't_summary: ' . cleanMdHTML($article['article_description']) . PHP_EOL;
			$body .= 't_h1_headline: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_h1_text: ' . cleanMdHTML($article['article_description']) . PHP_EOL; 
		 }
		
		$body .= 'i_h1_image: ' . $a_update_image . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 
			$body .= 't_h1_image_description: ' . cleanMdHTML_i18n(trim($article['article_image_alt'])) . PHP_EOL;
			$body .= 'v_h1_image_attribution: ' . cleanMdHTML_i18n(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'v_h1_image_license: ' . cleanMdHTML_i18n(trim($article['article_image_license'])) . PHP_EOL;
			 
		 }else{
			 
			$body .= 't_h1_image_description: ' . cleanMdHTML(trim($article['article_image_alt'])) . PHP_EOL;
			$body .= 'v_h1_image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'v_h1_image_license: ' . trim($article['article_image_license']) . PHP_EOL;
			 
		 }
		
				
		//$body .= 'image: ' . $a_update_image . PHP_EOL;
		//$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
		//$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;
		//$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		//$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;
		$paragraphs = $article['paragraphs'];

		if(is_array($paragraphs) && count($paragraphs) > 0){

			$body .= 'article:' . PHP_EOL;
			
			foreach ($paragraphs as $paragraph) {
				if($paragraph['language_id'] == 'en'){
					$section_image_name = $article['article_title'];
				}else{
					$section_image_name = $this->get_article_title($article['article_id']);
				}
				$video_youtube = '';
				if ($paragraph['section_video']) {
					$video_youtube = 'true';
				}
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				
				if($paragraph_image){
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
					/*if($paragraph['section_title'] && $paragraph['language_id'] == 'en'){
						
							$section_image_name = $paragraph['section_title'];
							$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
						
                       
					}else{
						
						$p_update_image = $paragraph_image_pathinfo['basename'];
						
					}*/ 
					
					
				}
				$video_language='';
				if($paragraph['section_video']){
					$video_language = cleanMdHTML(trim($article['language_id']));
				}
				if($paragraph['section_heading_type']=='h2'){
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '  - t_h2_headline: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h2_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
					}else{
						$body .= '  - t_h2_headline: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h2_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;	
					}
					
					$body .= '    v_h2_video: ' . trim($paragraph['section_video']) . PHP_EOL;
					$body .= '    v_h2_video_language: '.$video_language . PHP_EOL;
					//$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    t_h2_meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    t_h2_meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    v_h2_meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    v_h2_meta_video_upload_date: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;	
					}else{
					$body .= '    t_h2_meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    t_h2_meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_upload_date: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;	
					}
					
					$body .= '    v_h2_meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
					$body .= '    v_h2_meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
					$body .= '    v_h2_meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
					//$body .= '    v_h2_meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
					$body .= '    i_h2_image: ' . $p_update_image . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '    t_h2_image_description: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_attribution: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_license: ' . cleanMdHTML_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;
					}else{
						$body .= '    t_h2_image_description: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;	
						$body .= '    v_h2_image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;
					}
					
					
					$body .= '    callouts: ' . PHP_EOL;
					foreach ($paragraph['callouts'] as $callout) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
						}else{
							$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;
						}
					
					}

					$body .= '    social_media_callouts: ' . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
						
					}else{
						$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					}
				}
				if($paragraph['section_heading_type']=='h3'){
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '  - t_h3_headline: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h3_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
					}else{
						$body .= '  - t_h3_headline: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h3_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;
					}
					
					$body .= '    v_h3_video: ' . trim($paragraph['section_video']) . PHP_EOL;
					$body .= '    v_h3_video_language: '.$video_language . PHP_EOL;
					//$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    t_h3_meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    t_h3_meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    v_h3_meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    v_h3_meta_video_upload_date: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;
					}else{
						
					$body .= '    t_h3_meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    t_h3_meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_upload_date: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;
						
					}
					
					$body .= '    v_h3_meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
					$body .= '    v_h3_meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
					$body .= '    v_h3_meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
					//$body .= '    v_h3_meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
					$body .= '    i_h3_image: ' . $p_update_image . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '    t_h3_image_description: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_attribution: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_license: ' . cleanMdHTML_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;		
					}else{
						$body .= '    t_h3_image_description: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;						
					}
					
					
					$body .= '    callouts: ' . PHP_EOL;
					foreach ($paragraph['callouts'] as $callout) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
						}else{
							$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;	
						}
						
					}
					$body .= '    social_media_callouts: ' . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
						
					}else{
						$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					}
				}
				
				

			}
		}

		$body .= "---" . PHP_EOL;

		return $body;
	}

	protected function createContentAltametrics($article){

		$article_tags = '';
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}
		$a_update_image = $article_image = trim($article['article_image']);

		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
		}
		
		$cta_product = trim($article['article_product_cta']);
		$metakeyword = trim($article['article_meta_keyword']);
		$meta_abstract = trim($article['article_meta_abstract']);
		$meta_author_facebook = trim($article['article_meta_author_facebook']);
		$meta_author_twitter = str_replace(array('&amp;#039;', '&#039;'),'',trim($article['article_meta_author_twitter']));
		$meta_product_name = trim($article['article_meta_product_name']);
		$meta_product_desc = trim($article['article_meta_product_desc']);
		$meta_product_image = trim($article['article_meta_product_image']);
		$meta_product_icon = trim($article['article_meta_product_icon']);
		$meta_product_id = trim($article['article_meta_product_id']);
		$meta_part_id = trim($article['article_meta_part_id']);
		$meta_product_price_currency = trim($article['article_meta_product_price_currency']);
		$meta_product_reviewcount = trim($article['article_meta_product_reviewcount']);
		$meta_product_brand = trim($article['article_meta_product_brand']);
		$meta_product_price = trim($article['article_meta_product_price']);
		$meta_product_ratingvalue = trim($article['article_meta_product_ratingvalue']);

		
		$cta_signup = ($cta_product) ? 'true' : 'false';
		$body = "---" . PHP_EOL;

		//$body .= 'layout: [article_v2,article_amp_v2]' . PHP_EOL; // layout: detail_recipe
		$body .= 'layout: article_v2' . PHP_EOL; // layout: detail_recipe
		$body .= 'language: ' . cleanMdHTML(trim($article['language_id'])) . PHP_EOL;
		$body .= 'i18n_link: ' . $article['article_id'] . PHP_EOL;
		$body .= 'permalink: ' . PHP_EOL;
		$body .= 'amp_page: true' . PHP_EOL;
		$body .= 'sitemap: true' . PHP_EOL;
		$body .= 'product_signup: ' . PHP_EOL;

		$body .= 'critical_css: article' . PHP_EOL;
		$body .= 'meta_json-ld_types: breadcrumb, article' . PHP_EOL;

		$body .= 'nav_top_show: false' . PHP_EOL;
		$body .= 'testimonials: 1' . PHP_EOL;

		$body .= 'cta_article: ' . PHP_EOL; 
		$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_signup: 4' . PHP_EOL;
		$body .= '  cta_headline: Online employee scheduling software that makes shift planning effortless. <br><strong>Try it free for 14 days.</strong>' . PHP_EOL;

		$body .= 'cta_popup: ' . PHP_EOL; 
		$body .= '  cta_web_notification: true'. PHP_EOL;
		$body .= '  cta_toast: 0'. PHP_EOL;
		$body .= '  cta_leadcapture_id: 27' . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			
		$body .= 't_meta_title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
		$body .= 't_meta_description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		$body .= 't_meta_keywords: ' . cleanMdHTML_i18n(trim($metakeyword) ). PHP_EOL;
		$body .= 't_meta_product: ' . trim($cta_product) . PHP_EOL;
		$body .= 't_meta_abstract: ' . cleanMdHTML_i18n(trim($meta_abstract)) . PHP_EOL;
			
		}else{
			
		$body .= 't_meta_title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		$body .= 't_meta_description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body .= 't_meta_keywords: ' . cleanMdHTML(trim($metakeyword)) . PHP_EOL;
		$body .= 't_meta_product: ' . cleanMdHTML(trim($cta_product)) . PHP_EOL;
		$body .= 't_meta_abstract: ' . cleanMdHTML(trim($meta_abstract)) . PHP_EOL;
			
		}
		
		$body .= 't_meta_category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
		$body .= 'p_meta_author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
		$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
		$body .= 't_meta_author_description: ' . cleanMdHTML_i18n(trim($author_bo_info)) . PHP_EOL;
		$body .= 'p_meta_author_facebook: ' .cleanMdHTML_i18n(trim($meta_author_facebook)) . PHP_EOL;
		$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML_i18n(trim($meta_author_twitter)) . "'". PHP_EOL;
		}else{
		$body .= 'p_meta_author: ' . cleanMdHTML(trim($author)) . PHP_EOL;
		$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
		$body .= 't_meta_author_description: ' .cleanMdHTML(trim($author_bo_info)) . PHP_EOL;
		$body .= 'p_meta_author_facebook: ' . cleanMdHTML(trim($meta_author_facebook)) . PHP_EOL;
		$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML(trim($meta_author_twitter)) . "'". PHP_EOL;	
		}
		
		$body .= 'p_meta_publisher: Hubworks' . PHP_EOL;
		$body .= 'i_meta_publisher_image: logo-hubworks-185x49.png' . PHP_EOL;
		$body .= 'v_meta_publisher_image_width: 185' . PHP_EOL;
		$body .= 'v_meta_publisher_image_height: 49' . PHP_EOL;
		$body .= 'p_meta_copyright: Hubworks' . PHP_EOL;

		$body .= 't_meta_product_name: ' . trim($meta_product_name) . PHP_EOL;
		$body .= 't_meta_product_desc: ' . trim($meta_product_desc) . PHP_EOL;
		$body .= 'i_meta_product_image: ' . trim($meta_product_image) . PHP_EOL;
		$body .= 'i_meta_product_icon: ' . trim($meta_product_icon) . PHP_EOL;
		
		$body .= 'v_meta_product_id: ' . cleanMdHTML(trim($meta_product_id)) . PHP_EOL;
		$body .= 'p_meta_product_brand: ' . cleanMdHTML(trim($meta_product_brand)) . PHP_EOL;
		$body .= 'v_meta_product_ratingvalue: ' . cleanMdHTML(trim($meta_product_ratingvalue)). PHP_EOL;
		$body .= 'v_meta_product_reviewcount: ' . cleanMdHTML(trim($meta_product_reviewcount)). PHP_EOL;
		$body .= 'p_meta_product_price_currency: ' . cleanMdHTML(trim($meta_product_price_currency)). PHP_EOL;
		$body .= 'v_meta_product_price: ' . trim($article['article_meta_product_price']) . PHP_EOL;
		$body .= 'v_meta_date_published: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_meta_date_modified: ' . nice_date($article['date_modified'], 'Y-m-d') . PHP_EOL;

		$body .= 'cta_webinar: true' . PHP_EOL;
		$body .= 'article_id: ' . trim($article['article_id']) . PHP_EOL;
		$body .= 'category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'date: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		//$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 'author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
			$body .= 'title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
		}else{
			$body .= 'author: ' . cleanMdHTML(trim($author)) . PHP_EOL;
			$body .= 'title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		}
		
		$body .= 'image: ' . $a_update_image . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 'image_attribution: ' . cleanMdHTML_i18n(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . cleanMdHTML_i18n(trim($article['article_image_license'])) . PHP_EOL;
		}else{
			$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;
		}
		
		
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
		$body .= 'description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		}else{
		$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;	
		}
		
		$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;

		$prep_time = trim($article['prep_time']);
		if($prep_time){
			$body .= 'preparation_time: ' . $prep_time . PHP_EOL;
		}

		$servings = trim($article['servings']);
		if($servings){
			$body .= 'servings: ' . $servings . PHP_EOL;
		}

		$body .= 'tags: ' . $article_tags . PHP_EOL;

		$body .= PHP_EOL;

		$paragraphs = $article['paragraphs'];

		if(is_array($paragraphs) && count($paragraphs) > 0){

			$body .= 'article:' . PHP_EOL;

			foreach ($paragraphs as $paragraph) {
			        if($paragraph['language_id'] == 'en'){
					$section_image_name = $article['article_title'];
				}else{
					$section_image_name = $this->get_article_title($article['article_id']);
				}

				$video_youtube = '';
				if ($paragraph['section_video']) {
					$video_youtube = 'true';
				}
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					
					/*if($paragraph['section_title']){
                        if($paragraph['language_id'] == 'en'){
							$section_image_name = $paragraph['section_title'];
						}else{
							$section_image_name = $this->get_section_title($article['article_id']);
						}
					} */
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
					//$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
				}
				$video_language='';
				if($paragraph['section_video']){
					$video_language = cleanMdHTML(trim($article['language_id']));
				}
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '  - sub_title: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
				}else{
					$body .= '  - sub_title: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;	
				}
				
				$body .= '    video: ' . trim($paragraph['section_video']) . PHP_EOL;
				$body .= '    video_language: '.$video_language . PHP_EOL;
				$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    meta_video_uploaddate: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;
				}else{
					$body .= '    meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    meta_video_uploaddate: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;
				}
				
				$body .= '    meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
				$body .= '    meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
				$body .= '    meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
				$body .= '    meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
				$body .= '    image: ' . $p_update_image . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    image_attribution: ' . cleanHtml_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
					$body .= '    image_license: ' . cleanHtml_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;
				}else{
					$body .= '    image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
					$body .= '    image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;					
				}
				
				
				$body .= '    cta_insert: ' . trim($paragraph['section_cta']) . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    body_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
				}else{
					$body .= '    body_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;	
				}
				
				$body .= '    callouts: ' . PHP_EOL;
				foreach ($paragraph['callouts'] as $callout) {
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
						$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
					}else{
						$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
						$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;
					}
					
				}
				$body .= '    social_media_callouts: ' . PHP_EOL;
				if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
					$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					
				}else{
					$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
					$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
				}
				if( $article_type == 'recipe'){
					$body .= 'ingredients: ' . PHP_EOL;
					foreach ($paragraph['ingredients'] as $ingredient) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '  - ingredient_name: ' . cleanMdHTML_i18n(trim($ingredient['ingredient_name'])) . '     ' . cleanMdHTML_i18n($ingredient['ingredient_qty']) . PHP_EOL;
						}else{
							$body .= '  - ingredient_name: ' . cleanMdHTML(trim($ingredient['ingredient_name'])) . '     ' . cleanMdHTML($ingredient['ingredient_qty']) . PHP_EOL;
						}
						
					}

					$body .= 'directions: ' . PHP_EOL;
					foreach ($paragraph['steps'] as $steps) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '  - step: ' . cleanMdHTML_i18n($steps['step_description']) . PHP_EOL;
						}else{
							$body .= '  - step: ' . cleanMdHTML($steps['step_description']) . PHP_EOL;
						}
						
					}
				}
			}
		}

		$body .= "---" . PHP_EOL;

		return $body;
	}

	protected function createContentAltametricsTopicCluster($article){

		$article_tags = '';
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}
		$a_update_image = $article_image = trim($article['article_image']);

		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
		}
		$cta_product = trim($article['article_product_cta']);
		$metakeyword = trim($article['article_meta_keyword']);
		$meta_abstract = trim($article['article_meta_abstract']);
		$meta_author_facebook = trim($article['article_meta_author_facebook']);
		$meta_author_twitter = str_replace(array('&amp;#039;', '&#039;'),'',trim($article['article_meta_author_twitter']));
		$meta_product_name = trim($article['article_meta_product_name']);
		$meta_product_desc = trim($article['article_meta_product_desc']);
		$meta_product_image = trim($article['article_meta_product_image']);
		$meta_product_icon = trim($article['article_meta_product_icon']);
		$meta_product_id = trim($article['article_meta_product_id']);
		$meta_part_id = trim($article['article_meta_part_id']);
		$meta_product_price_currency = trim($article['article_meta_product_price_currency']);
		$meta_product_reviewcount = trim($article['article_meta_product_reviewcount']);
		$meta_product_brand = trim($article['article_meta_product_brand']);
		$meta_product_price = trim($article['article_meta_product_price']);
		$meta_product_ratingvalue = trim($article['article_meta_product_ratingvalue']);

		
		$cta_signup = ($cta_product) ? 'true' : 'false';
		$body = "---" . PHP_EOL;

		//$body .= 'layout: [topic_cluster,topic_cluster_amp]' . PHP_EOL; // layout: topic_cluster
		$body .= 'layout: topic_cluster' . PHP_EOL; // layout: topic_cluster
		$body .= 'language: ' . cleanMdHTML(trim($article['language_id'])) . PHP_EOL;
		/*if($article_type == 'pillar'){
			$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . PHP_EOL;
		}else{
			$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . '.html' . PHP_EOL;
		}*/
		$body .= 'permalink: ' . cleanMdHTML(trim($article['article_permalink'])) . '.html' . PHP_EOL;
		$body .= 'i18n_link: ' . $article['article_id'] . PHP_EOL;
		$body .= 'amp_page: true' . PHP_EOL;
		$body .= 'sitemap: true' . PHP_EOL;
		//$body .= 'product_signup: ' . PHP_EOL;

		$body .= 'critical_css: topic_cluster' . PHP_EOL;
		$body .= 'meta_json-ld_types: breadcrumb, article' . PHP_EOL;

		//$body .= 'nav_top_show: false' . PHP_EOL;
		//$body .= 'testimonials: 1' . PHP_EOL;

		$body .= 'cta: ' . PHP_EOL; 
		//$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_form_id: 4' . PHP_EOL;
		$body .= '  cta_inline_headline: Online employee scheduling software that makes shift planning effortless. <br><strong>Try it free for 14 days.</strong>' . PHP_EOL;
		$body .= '  cta_inline_button_text: Try Zip Schedules for free' . PHP_EOL;
		$body .= '  cta_toast: 0'. PHP_EOL;
		$body .= '  cta_popup_form_id: 27' . PHP_EOL;
		
         if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 't_meta_title: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
			 $body .= 't_meta_description: ' . cleanMdHTML_i18n(trim($article['article_description'])) . PHP_EOL;
		 }else{
			$body .= 't_meta_title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_meta_description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL; 
		 }
		
		//$body .= 't_meta_keywords: ' . cleanMdHTML(trim($metakeyword)) . PHP_EOL;
		//$body .= 't_meta_product: ' . cleanMdHTML(trim($cta_product)) . PHP_EOL;
		//$body .= 't_meta_abstract: ' . cleanMdHTML(trim($meta_abstract)) . PHP_EOL;
		$body .= 't_meta_category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 
			$body .= 'p_meta_author: ' . cleanMdHTML_i18n(trim($author)) . PHP_EOL;
			$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
			$body .= 'i_meta_author_image: ' . basename($article['user_image']) . PHP_EOL;
			$body .= 't_meta_author_description: ' . cleanMdHTML_i18n(trim($author_bo_info)) . PHP_EOL;
			$body .= 'p_meta_author_facebook: ' . cleanMdHTML_i18n(trim($meta_author_facebook)) . PHP_EOL;
			$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML_i18n(trim($meta_author_twitter)) . "'". PHP_EOL;
			 
		 }else{
			 
			$body .= 'p_meta_author: ' . trim($author) . PHP_EOL;
			$body .= 'p_meta_author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
			$body .= 'i_meta_author_image: ' . basename($article['user_image']) . PHP_EOL;
			$body .= 't_meta_author_description: ' . cleanMdHTML(trim($author_bo_info)) . PHP_EOL;
			$body .= 'p_meta_author_facebook: ' . cleanMdHTML(trim($meta_author_facebook)) . PHP_EOL;
			$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML(trim($meta_author_twitter)) . "'". PHP_EOL;
			 
		 }
		
		$body .= 'p_meta_publisher: Hubworks' . PHP_EOL;
		$body .= 'i_meta_publisher_image: logo-hubworks-185x49.png' . PHP_EOL;
		$body .= 'v_meta_publisher_image_width: 185' . PHP_EOL;
		$body .= 'v_meta_publisher_image_height: 49' . PHP_EOL;
		$body .= 'p_meta_copyright: Hubworks' . PHP_EOL;
		$body .= 'i_meta_image: ' . PHP_EOL;

		//$body .= 't_meta_product_name: ' . trim($meta_product_name) . PHP_EOL;
		//$body .= 't_meta_product_desc: ' . trim($meta_product_desc) . PHP_EOL;
		//$body .= 'i_meta_product_image: ' . trim($meta_product_image) . PHP_EOL;
		//$body .= 'i_meta_product_icon: ' . trim($meta_product_icon) . PHP_EOL;
		//$body .= 'v_meta_product_id: ' . cleanMdHTML(trim($meta_product_id)) . PHP_EOL;
		//$body .= 'p_meta_product_brand: ' . cleanMdHTML(trim($meta_product_brand)) . PHP_EOL;
		//$body .= 'v_meta_product_ratingvalue: ' . cleanMdHTML(trim($meta_product_ratingvalue)). PHP_EOL;
		//$body .= 'v_meta_product_reviewcount: ' . cleanMdHTML(trim($meta_product_reviewcount)). PHP_EOL;
		//$body .= 'p_meta_product_price_currency: ' . cleanMdHTML(trim($meta_product_price_currency)). PHP_EOL;
		//$body .= 'v_meta_product_price: ' . trim($article['article_meta_product_price']) . PHP_EOL;
		$body .= 'v_meta_date_published: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_meta_date_modified: ' . nice_date($article['date_modified'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_article_id: ' . $article['article_id'] . PHP_EOL;
		$body .= 'v_article_pillar_id: ' . $article['article_pillar_id'] . PHP_EOL;
		$body .= 'i_icon: ' . $article['article_icon'] . PHP_EOL;
		
         if($article_type=='pillar'){
			$body .= 't_pillar_name: ' . trim($article['article_meta_keyword']) . PHP_EOL;
		 }else{
			$body .= 't_pillar_name: ' . PHP_EOL;
		 }
		
		
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 't_keyword: ' . cleanMdHTML_i18n(trim($article['article_meta_keyword'])) . PHP_EOL;
			$body .= 't_summary: ' . cleanMdHTML_i18n($article['article_description']) . PHP_EOL;
			$body .= 't_h1_headline: ' . cleanMdHTML_i18n(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_h1_text: ' . cleanMdHTML_i18n($article['article_description']) . PHP_EOL;
		 }else{
			$body .= 't_keyword: ' . cleanMdHTML(trim($article['article_meta_keyword'])) . PHP_EOL;
			$body .= 't_summary: ' . cleanMdHTML($article['article_description']) . PHP_EOL;
			$body .= 't_h1_headline: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
			$body .= 't_h1_text: ' . cleanMdHTML($article['article_description']) . PHP_EOL; 
		 }
		
		$body .= 'i_h1_image: ' . $a_update_image . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 
			$body .= 't_h1_image_description: ' . cleanMdHTML_i18n(trim($article['article_image_alt'])) . PHP_EOL;
			$body .= 'v_h1_image_attribution: ' . cleanMdHTML_i18n(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'v_h1_image_license: ' . cleanMdHTML_i18n(trim($article['article_image_license'])) . PHP_EOL;
			 
		 }else{
			 
			$body .= 't_h1_image_description: ' . cleanMdHTML(trim($article['article_image_alt'])) . PHP_EOL;
			$body .= 'v_h1_image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'v_h1_image_license: ' . trim($article['article_image_license']) . PHP_EOL;
			 
		 }
		
				
		//$body .= 'image: ' . $a_update_image . PHP_EOL;
		//$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
		//$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;
		//$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		//$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;
		$paragraphs = $article['paragraphs'];

		if(is_array($paragraphs) && count($paragraphs) > 0){

			$body .= 'article:' . PHP_EOL;
			
			foreach ($paragraphs as $paragraph) {
				if($paragraph['language_id'] == 'en'){
					$section_image_name = $article['article_title'];
				}else{
					$section_image_name = $this->get_article_title($article['article_id']);
				}
				$video_youtube = '';
				if ($paragraph['section_video']) {
					$video_youtube = 'true';
				}
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				
				if($paragraph_image){
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
					/*if($paragraph['section_title'] && $paragraph['language_id'] == 'en'){
						
							$section_image_name = $paragraph['section_title'];
							$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
						
                       
					}else{
						
						$p_update_image = $paragraph_image_pathinfo['basename'];
						
					}*/ 
					
					
				}
				$video_language='';
				if($paragraph['section_video']){
					$video_language = cleanMdHTML(trim($article['language_id']));
				}
				if($paragraph['section_heading_type']=='h2'){
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '  - t_h2_headline: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h2_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
					}else{
						$body .= '  - t_h2_headline: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h2_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;	
					}
					
					$body .= '    v_h2_video: ' . trim($paragraph['section_video']) . PHP_EOL;
					$body .= '    v_h2_video_language: '.$video_language . PHP_EOL;
					//$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    t_h2_meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    t_h2_meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    v_h2_meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    v_h2_meta_video_upload_date: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;	
					}else{
					$body .= '    t_h2_meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    t_h2_meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    v_h2_meta_video_upload_date: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;	
					}
					
					$body .= '    v_h2_meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
					$body .= '    v_h2_meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
					$body .= '    v_h2_meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
					//$body .= '    v_h2_meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
					$body .= '    i_h2_image: ' . $p_update_image . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '    t_h2_image_description: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_attribution: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_license: ' . cleanMdHTML_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;
					}else{
						$body .= '    t_h2_image_description: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h2_image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;	
						$body .= '    v_h2_image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;
					}
					
					
					$body .= '    callouts: ' . PHP_EOL;
					foreach ($paragraph['callouts'] as $callout) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
						}else{
							$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;
						}
					
					}
					$body .= '    social_media_callouts: ' . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
						
					}else{
						$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					}
				}
				if($paragraph['section_heading_type']=='h3'){
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '  - t_h3_headline: ' . cleanMdHTML_i18n(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h3_text: ' . cleanMdHTML_i18n($paragraph['section_text']) . PHP_EOL;
					}else{
						$body .= '  - t_h3_headline: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL;
						$body .= '    t_h3_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL;
					}
					
					$body .= '    v_h3_video: ' . trim($paragraph['section_video']) . PHP_EOL;
					$body .= '    v_h3_video_language: '.$video_language . PHP_EOL;
					//$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    t_h3_meta_video_name: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_name'])) . PHP_EOL;
					$body .= '    t_h3_meta_video_description: ' . cleanMdHTML_i18n(trim($paragraph['section_meta_video_description'])) . PHP_EOL;
					$body .= '    v_h3_meta_video_url: ' . trim($paragraph['section_meta_video_url']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_1x1: ' . trim($paragraph['section_meta_video_thumbnail_1x1']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_4x3: ' . trim($paragraph['section_meta_video_thumbnail_4x3']) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_16x9: ' . trim($paragraph['section_meta_video_thumbnail_16x9']) . PHP_EOL;
					$body .= '    v_h3_meta_video_upload_date: ' . trim($paragraph['section_meta_video_uploaddate']) . PHP_EOL;
					}else{
						
					$body .= '    t_h3_meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
					$body .= '    t_h3_meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
					$body .= '    v_h3_meta_video_upload_date: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;
						
					}
					
					$body .= '    v_h3_meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
					$body .= '    v_h3_meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
					$body .= '    v_h3_meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
					//$body .= '    v_h3_meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
					$body .= '    i_h3_image: ' . $p_update_image . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '    t_h3_image_description: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_attribution: ' . cleanMdHTML_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_license: ' . cleanMdHTML_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;		
					}else{
						$body .= '    t_h3_image_description: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL;
						$body .= '    v_h3_image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;						
					}
					
					
					$body .= '    callouts: ' . PHP_EOL;
					foreach ($paragraph['callouts'] as $callout) {
						if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
							$body .= '      - t_callout_title: ' . cleanMdHTML_i18n(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML_i18n(trim($callout['callout_text'])) . PHP_EOL;
						}else{
							$body .= '      - t_callout_title: ' . cleanMdHTML(trim($callout['callout_title'])) . PHP_EOL;
							$body .= '        t_callout_text: ' . cleanMdHTML(trim($callout['callout_text'])) . PHP_EOL;	
						}
						
					}
					$body .= '    social_media_callouts: ' . PHP_EOL;
					if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
						$body .= '      t_title: ' . cleanMdHTML_i18n(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML_i18n(trim($paragraph['social_media_platforms'])) . PHP_EOL;
						
					}else{
						$body .= '      t_title: ' . cleanMdHTML(trim($paragraph['social_media_callout_title'])) . PHP_EOL;
						$body .= '      t_platforms: ' . cleanMdHTML(trim($paragraph['social_media_platforms'])) . PHP_EOL;
					}
				}
				
				

			}
		}

		$body .= "---" . PHP_EOL;
		return $body;
	}

	protected function createContentAltametricsOld($article){

		$article_tags = '';
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}
		$a_update_image = $article_image = trim($article['article_image']);

		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
		}
		$cta_product = trim($article['article_product_cta']);
		$metakeyword = trim($article['article_meta_keyword']);
		$meta_abstract = trim($article['article_meta_abstract']);
		$meta_author_facebook = trim($article['article_meta_author_facebook']);
		$meta_author_twitter = trim($article['article_meta_author_twitter']);
		$meta_product_name = trim($article['article_meta_product_name']);
		$meta_product_desc = trim($article['article_meta_product_desc']);
		$meta_product_image = trim($article['article_meta_product_image']);
		$meta_product_icon = trim($article['article_meta_product_icon']);
		$meta_product_id = trim($article['article_meta_product_id']);
		$meta_part_id = trim($article['article_meta_part_id']);
		$meta_product_price_currency = trim($article['article_meta_product_price_currency']);
		$meta_product_reviewcount = trim($article['article_meta_product_reviewcount']);
		$meta_product_brand = trim($article['article_meta_product_brand']);
		$meta_product_price = trim($article['article_meta_product_price']);
		$meta_product_ratingvalue = trim($article['article_meta_product_ratingvalue']);

		
		$cta_signup = ($cta_product) ? 'true' : 'false';
		$body = "---" . PHP_EOL;

		$body .= 'layout: [article,amp-article]' . PHP_EOL; // layout: detail_recipe
		$body .= 'language: '.cleanMdHTML(trim($article['language_id'])) . PHP_EOL;
		$body .= 'amp_page: true' . PHP_EOL;
		$body .= 'cta_toast: false'. PHP_EOL;
		$body .= 'cta_toast_id: '. PHP_EOL;
		$body .= 'cta_leadcapture: false' . PHP_EOL;
		$body .= 'cta_leadcapture_id: ' . PHP_EOL;
		$body .= 'cta_webinar: false' . PHP_EOL;
		$body .= 'cta: ' . PHP_EOL; 
		$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_signup: 4' . PHP_EOL;
		$body .= '  cta_headline: ' . PHP_EOL;
		$body .= 'article_id: ' . trim($article['article_id']) . PHP_EOL;
		$body .= 'category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'date: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'p_author_id: ' . trim($author_id) . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'author: ' . cleanHtml_i18n(trim($author)) . PHP_EOL;
			 $body .= 'title: ' . cleanHtml_i18n(trim($article['article_title'])) . PHP_EOL;
		 }else{
			 $body .= 'author: ' . trim($author) . PHP_EOL;
			 $body .= 'title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL; 
		 }
		
		$body .= 'image: ' . $a_update_image . PHP_EOL;
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'image_attribution: ' . cleanHtml_i18n(trim($article['article_image_attribution'])) . PHP_EOL;
			 $body .= 'image_license: ' . cleanHtml_i18n(trim($article['article_image_license'])) . PHP_EOL;
		 }else{
			$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;			
		 }
		
		
		if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			$body .= 'description: ' . trim($article['article_description']) . PHP_EOL; 
		 }else{
			$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL; 
		 }
		
		$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;
		$body .= 'tags: ' . $article_tags . PHP_EOL;
		$body .= 'permalink: ' . PHP_EOL;
		
		//$body .= 'sitemap: true' . PHP_EOL;
		/*$body .= 'product_signup: ' . PHP_EOL;

		$body .= 'critical_css: article' . PHP_EOL;
		$body .= 'meta_json-ld_types: breadcrumb, article' . PHP_EOL;

		$body .= 'nav_top_show: false' . PHP_EOL;
		$body .= 'testimonials: 1' . PHP_EOL;

		$body .= 'cta_article: ' . PHP_EOL; 
		$body .= '  cta_signup: ' . $cta_signup  . PHP_EOL;
		$body .= '  cta_product: ' . $cta_product . PHP_EOL;
		$body .= '  cta_inline_signup: 4' . PHP_EOL;
		$body .= '  cta_headline: Online employee scheduling software that makes shift planning effortless. <br><strong>Try it free for 14 days.</strong>' . PHP_EOL;

		$body .= 'cta_popup: ' . PHP_EOL; 
		$body .= '  cta_web_notification: true'. PHP_EOL;
		
		$body .= '  cta_leadcapture_id: 27' . PHP_EOL;

		$body .= 't_meta_title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		$body .= 't_meta_description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body .= 't_meta_keywords: ' . cleanMdHTML(trim($metakeyword)) . PHP_EOL;
		$body .= 't_meta_product: ' . cleanMdHTML(trim($cta_product)) . PHP_EOL;
		$body .= 't_meta_abstract: ' . cleanMdHTML(trim($meta_abstract)) . PHP_EOL;
		$body .= 't_meta_category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'p_meta_author: ' . trim($author) . PHP_EOL;
		$body .= 'p_meta_author_url: ' . trim($article['article_meta_author_url']) . PHP_EOL;
		$body .= 't_meta_author_description: ' . trim($author_bo_info) . PHP_EOL;
		$body .= 'p_meta_author_facebook: ' . cleanMdHTML(trim($meta_author_facebook)) . PHP_EOL;
		$body .= 'p_meta_author_twitter: ' . "'". cleanMdHTML(trim($meta_author_twitter)) . "'". PHP_EOL;
		$body .= 'p_meta_publisher: Hubworks' . PHP_EOL;
		$body .= 'i_meta_publisher_image: logo-hubworks-185x49.png' . PHP_EOL;
		$body .= 'v_meta_publisher_image_width: 185' . PHP_EOL;
		$body .= 'v_meta_publisher_image_height: 49' . PHP_EOL;
		$body .= 'p_meta_copyright: Hubworks' . PHP_EOL;

		$body .= 't_meta_product_name: ' . trim($meta_product_name) . PHP_EOL;
		$body .= 't_meta_product_desc: ' . trim($meta_product_desc) . PHP_EOL;
		$body .= 'i_meta_product_image: ' . trim($meta_product_image) . PHP_EOL;
		$body .= 'i_meta_product_icon: ' . trim($meta_product_icon) . PHP_EOL;
		$body .= 'v_meta_product_id: ' . cleanMdHTML(trim($meta_product_id)) . PHP_EOL;
		$body .= 'p_meta_product_brand: ' . cleanMdHTML(trim($meta_product_brand)) . PHP_EOL;
		$body .= 'v_meta_product_ratingvalue: ' . cleanMdHTML(trim($meta_product_ratingvalue)). PHP_EOL;
		$body .= 'v_meta_product_reviewcount: ' . cleanMdHTML(trim($meta_product_reviewcount)). PHP_EOL;
		$body .= 'p_meta_product_price_currency: ' . cleanMdHTML(trim($meta_product_price_currency)). PHP_EOL;
		$body .= 'v_meta_product_price: ' . trim($article['article_meta_product_price']) . PHP_EOL;
		$body .= 'v_meta_date_published: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'v_meta_date_modified: ' . nice_date($article['date_modified'], 'Y-m-d') . PHP_EOL;

		$body .= 'cta_webinar: true' . PHP_EOL;
		$body .= 'article_id: ' . trim($article['article_id']) . PHP_EOL;
		$body .= 'category: ' . trim($article['article_category']) . PHP_EOL;
		$body .= 'date: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'author: ' . trim($author) . PHP_EOL;
		$body .= 'title: ' . cleanMdHTML(trim($article['article_title'])) . PHP_EOL;
		$body .= 'image: ' . $a_update_image . PHP_EOL;
		$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
		$body .= 'image_license: ' . trim($article['article_image_license']) . PHP_EOL;
		$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body .= 'toc_ordered: ' . trim($article['article_toc_ordered']) . PHP_EOL;

		$prep_time = trim($article['prep_time']);
		if($prep_time){
			$body .= 'preparation_time: ' . $prep_time . PHP_EOL;
		}

		$servings = trim($article['servings']);
		if($servings){
			$body .= 'servings: ' . $servings . PHP_EOL;
		}

		$body .= 'tags: ' . $article_tags . PHP_EOL;*/

		$body .= PHP_EOL;

		$paragraphs = $article['paragraphs'];

		if(is_array($paragraphs) && count($paragraphs) > 0){

			$body .= 'article:' . PHP_EOL;
			if($paragraph['language_id'] == 'en'){
				$section_image_name = $article['article_title'];
			}else{
				$section_image_name = $this->get_article_title($article['article_id']);
			}
			foreach ($paragraphs as $paragraph) {
				$video_youtube = '';
				if ($paragraph['section_video']) {
					$video_youtube = 'true';
				}
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					/*if($paragraph['section_title']){
                        if($paragraph['language_id'] == 'en'){
							$section_image_name = $paragraph['section_title'];
						}else{
							$section_image_name = $this->get_section_title($article['article_id']);
						}
					}
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];*/ 
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
				}
				 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					 $body .= '  - sub_title: ' . trim($paragraph['section_title']) . PHP_EOL;
				 }else{
					$body .= '  - sub_title: ' . cleanMdHTML(trim($paragraph['section_title'])) . PHP_EOL; 
				 }
				
				$body .= '    video: ' . trim($paragraph['section_video']) . PHP_EOL;
				$body .= '    video_youtube: ' . trim($video_youtube) . PHP_EOL;
				//$body .= '    meta_video_name: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_name']))) . PHP_EOL;
				//$body .= '    meta_video_description: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_description']))) . PHP_EOL;
				//$body .= '    meta_video_url: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_url']))) . PHP_EOL;
				//$body .= '    meta_video_thumbnail_1x1: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_1x1']))) . PHP_EOL;
				//$body .= '    meta_video_thumbnail_4x3: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_4x3']))) . PHP_EOL;
				//$body .= '    meta_video_thumbnail_16x9: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_thumbnail_16x9']))) . PHP_EOL;
				//$body .= '    meta_video_uploaddate: ' . cleanHtml(cleanMdHTML(trim($paragraph['section_meta_video_uploaddate']))) . PHP_EOL;
				//$body .= '    meta_video_minutes: ' . trim($paragraph['section_meta_video_minutes']) . PHP_EOL;
				//$body .= '    meta_video_seconds: ' . trim($paragraph['section_meta_video_seconds']) . PHP_EOL;
				//$body .= '    meta_video_interaction_count: ' . trim($paragraph['section_meta_video_interaction_count']) . PHP_EOL;
				//$body .= '    meta_video_expires: ' . trim($paragraph['section_meta_video_expires']) . PHP_EOL;
				$body .= '    image: ' . $p_update_image . PHP_EOL;
				 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    image_attribution: ' . cleanHtml_i18n(trim($paragraph['section_image_attribution'])) . PHP_EOL;
					$body .= '    image_license: ' . cleanHtml_i18n(trim($paragraph['section_image_license'])) . PHP_EOL;
				 }else{
					$body .= '    image_attribution: ' . cleanMdHTML(trim($paragraph['section_image_attribution'])) . PHP_EOL; 
					$body .= '    image_license: ' . trim($paragraph['section_image_license']) . PHP_EOL;
				 }
				
				
				$body .= '    cta_insert: ' . trim($paragraph['section_cta']) . PHP_EOL;
				 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
					$body .= '    body_text: ' . $paragraph['section_text'] . PHP_EOL;
				 }else{
					$body .= '    body_text: ' . cleanMdHTML($paragraph['section_text']) . PHP_EOL; 
				 }
				

				/*if( $article_type == 'recipe'){
					$body .= 'ingredients: ' . PHP_EOL;
					foreach ($paragraph['ingredients'] as $ingredient) {
						$body .= '  - ingredient_name: ' . cleanMdHTML(trim($ingredient['ingredient_name'])) . '     ' . cleanMdHTML($ingredient['ingredient_qty']) . PHP_EOL;
					}

					$body .= 'directions: ' . PHP_EOL;
					foreach ($paragraph['steps'] as $steps) {
						$body .= '  - step: ' . cleanMdHTML($steps['step_description']) . PHP_EOL;
					}
				}*/
			}
		}

		$body .= "---" . PHP_EOL;

		return $body;
	}

	protected function createContentOthers($article){

		$array_key = 0;
		$image_array = array();
		$article_tags = '';
		$body_content = cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body_content .= '<!--more-->' . PHP_EOL;
		$article_type = strtolower($article['article_type']);
		if($article['language_id'] == 'en'){
			$article_title = cleanMdHTML(trim($article['article_title']));
		}else{
			$article_title = cleanMdHTML($this->get_article_title($article['article_id']));
		}
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];// str_replace(', ', ' ', $article['article_tags']);
			$article_tags = '[' . trim($article_tags) . ']';
		}
		if($article['user_id']){
			$author_id = $article['user_id'];
		}
		if($article['article_author']){
			$author = $article['article_author'];
		}else{
			$author = ucwords($article['user_fname'] . " " . $article['user_lname']);	
		}
		if($article['article_meta_author']){
			$author = ucwords($article['article_meta_author']);
		}
		if($article['article_meta_author_desc']){
			$author_bo_info = $article['article_meta_author_desc'];
		}else{
			$author_bo_info = ucwords($article['user_bo_info']);	
		}

		//$author = ucwords($article['user_fname'] . " " . $article['user_lname']);
		$a_update_image = $article_image = trim($article['article_image']);
		$repo_folder = slugify($article_title);

		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
			$image_array[$array_key]['image_name'] =  $repo_folder;
			$image_array[$array_key]['image_url'] =  $a_update_image;
		}

		$paragraphs = $article['paragraphs'];
		$section_image_name = $article_title;
		$body_str_recipe = '';
		if(is_array($paragraphs) && count($paragraphs) > 0){

			foreach ($paragraphs as $paragraph) {

				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					/*if($paragraph['section_title']){
                        if($paragraph['language_id'] == 'en'){
							$section_image_name = $paragraph['section_title'];
						}else{
							$section_image_name = $this->get_section_title($article['article_id']);
						}
					} */
					$array_key++;
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image = $paragraph_image_pathinfo['basename'];
					//$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
					$image_array[$array_key]['image_name'] =  slugify($paragraph['section_title']);
					$image_array[$array_key]['image_url'] =  $p_update_image;
				}
				if( $article_type == 'recipe'){
					$body_str_recipe .= 'ingredients: ' . PHP_EOL;
					foreach ($paragraph['ingredients'] as $ingredient) {
						$body_str_recipe .= '  - ingredient_name: ' . cleanMdHTML($ingredient['ingredient_name']) . '     ' . cleanMdHTML($ingredient['ingredient_qty']) . PHP_EOL;
					}

					$body_str_recipe .= 'directions: ' . PHP_EOL;
					foreach ($paragraph['steps'] as $steps) {
						$body_str_recipe .= '  - step: ' . cleanMdHTML($steps['step_description']) . PHP_EOL;
					}
				}
				if ($paragraph['section_video']) {
					$body_content .= '{% include youtubePlayer.html id="'. $paragraph['section_video'] .'" %}'. PHP_EOL;
				}else {
					if($p_update_image){
						$body_content .= '{% picture article_top ' . $p_update_image . ' class="img-responsive" alt="' . slugify($paragraph['section_title']) . '" %}<br>'. PHP_EOL;
					}
					if($paragraph['section_image_attribution']){
						$body_content .= '<em>Image from [pixabay.com](' . $paragraph['section_image_attribution'] . ')</em><br>' . PHP_EOL;
					}
					if($paragraph['section_title']){
						$body_content .= '## '. $paragraph['section_title']. PHP_EOL;
					}
				}
				if($paragraph['section_text']){
					$body_content .= '{::nomarkdown}'.cleanMdHTML($paragraph['section_text']).'{:/}' . PHP_EOL;
				}
			}
		}
		$layout = 'detail_article';
		if( $article_type == 'recipe'){
			$layout = 'detail_recipe';
		}
		if( $article_type == 'news'){
			$layout = 'detail_news';
		}

		$body = "---" . PHP_EOL;
		$body .= 'layout: ' . $layout . PHP_EOL;
		$body .= 'date: ' . nice_date($article['publish_date'], 'Y-m-d') . PHP_EOL;
		$body .= 'type: article' . PHP_EOL;
		//$body .= 'language: en_US' . PHP_EOL;
		$body .= 'sponsor: false' . PHP_EOL;
		$body .= 'featured: true' . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'category: ' . $article['article_category'] . PHP_EOL;
		 }else{
			$body .= 'category: ' . cleanMdHTML($article['article_category']) . PHP_EOL; 
		 }
		
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'headline: ' . cleanHtml_i18n(trim($article['article_title'])) . PHP_EOL;
		 }else{
			$body .= 'headline: ' . cleanMdHTML($article_title) . PHP_EOL; 
		 }
		
		//$body .= 'description: ' . cleanMdHTML(trim($article['article_description'])) . PHP_EOL;
		$body .= 'subheadline: '  . PHP_EOL;
		$body .= 'p_author_id: ' . $author_id . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'author: ' . cleanHtml_i18n($author) . PHP_EOL;
		 }else{ 
			$body .= 'author: ' . cleanMdHTML($author) . PHP_EOL;
		 }
		
		$body .= 'author_url: ' . slugify(trim(trim($article['user_fname']) . " " . trim($article['user_lname']))) . '.html' . PHP_EOL;
		$body .= 'image_1_img: ' . $a_update_image . PHP_EOL;
		$body .= 'image_1_name: ' . $repo_folder . PHP_EOL;
		$body .= 'image_1_caption: ' . $repo_folder . PHP_EOL;
		$body .= 'image_1_title: ' . $repo_folder . PHP_EOL;
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'image_attribution: ' . trim($article['article_image_attribution']) . PHP_EOL;
			 $body .= 'image_license: ' . $article['article_image_license'] . PHP_EOL;
		 }else{
			$body .= 'image_attribution: ' . cleanMdHTML(trim($article['article_image_attribution'])) . PHP_EOL;
			$body .= 'image_license: ' . cleanMdHTML($article['article_image_license']) . PHP_EOL; 
		 }
		

		$prep_time = trim($article['prep_time']);
		if($prep_time && $article_type == 'recipe'){
			 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
				 $body .= 'preparation_time: ' . $prep_time . PHP_EOL;
			 }else{
				$body .= 'preparation_time: ' . cleanMdHTML($prep_time) . PHP_EOL; 
			 }
			
		}

		$servings = trim($article['servings']);
		if($servings && $article_type == 'recipe'){
			$body .= 'servings: ' . ((int) $servings > 0 ? (int) $servings : '') . PHP_EOL;
		}
		 if($article['language_id'] == 'ja' || $article['language_id'] == 'ar'){
			 $body .= 'tags: ' . $article_tags . PHP_EOL;
		 }else{
			 $body .= 'tags: ' . cleanMdHTML($article_tags) . PHP_EOL;
		 }
		

		if(count($image_array)>0 && $article_type == 'recipe'){
			$body .= 'images: ' . PHP_EOL;
			foreach($image_array as $image){
				$body .= '  - image_img: ' . $image['image_url'] . PHP_EOL;
				$body .= '    image_alt: ' . $image['image_name'] . PHP_EOL;
			}
		}

		$body .= $body_str_recipe . PHP_EOL;
		$body .= "---" . PHP_EOL;
		$body .= PHP_EOL;
		$body .= $body_content . PHP_EOL;

		return $body;
	}
	protected function get_cta_info($article_id, $lang='en'){

		$this->db->select("*");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('brief_cta_language_id', $lang);
		$result_array = $this->db->get('article_brief_cta')->result_array();
		return $result_array;

	}
	protected function get_article_title($article_id, $lang='en'){

		$this->db->select("article_title");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $lang);
		$result_array = $this->db->get('articles_translate_i18')->result_array();
		$article_title = $result_array[0]['article_title'];	
		
		return trim($article_title);

	}

	protected function get_article_type($article_id){

		$this->db->select("article_type");
		$this->db->where('article_id', (int) $article_id);
		$result_array = $this->db->get('articles')->result_array();
		$article_type = $result_array[0]['article_type'];	
		
		return trim($article_type);

	}
	protected function get_section_title($article_id, $lang='en'){
		$this->db->select("section_id");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $lang);
		$result_array = $this->db->get('article_section')->result_array();
		//pre($result_array);
		//pre($result_array[0]['section_id']);
		$section_id = $result_array[0]['section_id'];	
		
		$this->db->select("section_title");
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $lang);
		$result_array = $this->db->get('article_section_translate_i18')->result_array();
		//pre($this->db->last_query());
		//pre($result_array);
		
		$section_title = $result_array[0]['section_title'];	
		
		return trim($section_title);

	}
	protected function pushContentGithub($article, $body, $delete){
		//pre($article);
		$return['error'] 	=  TRUE;
		$return['message'] 	=  'Somthing Wrong, Please try again';
		$article_id = $article['article_id'];
		$article_published_website = 'hubworks.com';
		if ($this->input->post('article_published_website')) {
			$article_published_website = strtolower($this->input->post('article_published_website'));
		}elseif($article['article_published_website']){
			$article_published_website = strtolower($article['article_published_website']);
		}
		$legacy_body = $body;
		$this->load->model('github_model');
		$this->load->model('promotion_model');
		//$where = 'site_id = "' . $article_published_website . '"';
		$where = "site_id =  '".$article_published_website."'";
		$github_row = $this->github_model->get_by($where, TRUE);

		$array_key = 0;
		$image_array = array();
		//$article_list = $this->article_model->getArticles($article_id, null, true);
		//$article = $article_list[$article_id];

		if($article['language_id'] == 'en'){
			$article_title = trim($article['article_title']);
		}else{
			$article_title = $this->get_article_title($article['article_id']);
		}
		$article_type = strtolower($article['article_type']);
		$repo_folder = slugify($article_title);
		$author = ucwords($article['user_fname'] . " " . $article['user_lname']);

		$article_tags = '';
		if (strlen($article['article_tags'])>1) {
			$article_tags = $article['article_tags'];
			$article_tags = '[' . trim($article_tags) . ']';
		}

		$a_update_image = $article_image = trim($article['article_image']);
		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
			$image_array[$array_key]['article_id'] 		 = trim($article['article_id']);
			$image_array[$array_key]['image_name'] 		 = $a_update_image;
			$image_array[$array_key]['image_url'] 		 = $article_image;
			$image_array[$array_key]['pathinfo'] 		 = $article_image_pathinfo;
			$image_array[$array_key]['image_sha']  		 = $article['image_sha'];
			$image_array[$array_key]['image_commit_sha'] = $article['image_commit_sha'];
		}

		$paragraphs = $article['paragraphs'];
		$section_image_name = $article_title;

		if(is_array($paragraphs) && count($paragraphs) > 0){

			foreach ($paragraphs as $paragraph) {
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					
					$array_key++;
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image =  $paragraph_image_pathinfo['basename'];
					$image_array[$array_key]['section_id'] 		 = trim($paragraph['section_id']);
					$image_array[$array_key]['image_url'] 		 = $paragraph_image;
					$image_array[$array_key]['image_name'] 		 = $p_update_image;
					$image_array[$array_key]['pathinfo']   		 = $paragraph_image_pathinfo;
					$image_array[$array_key]['image_sha']  		 = $paragraph['image_sha'];
					$image_array[$array_key]['image_commit_sha'] = $paragraph['image_commit_sha'];
				}
			}
		}

		//require_once APPPATH . 'third_party/vendor/autoload.php'; // Old code path
		require_once FCPATH . 'vendor/autoload.php';  //New Code path
		$client = new \Github\Client();

		$tokenOrLogin = $github_row->github_client_id;
		$password	  = $github_row->github_api_key;

		//$tokenOrLogin ='f53d7554f9241367c5ae432016af7864158c14ea'; // Personal access tokens old
		$tokenOrLogin ='797c4ab4630a3a320b731012df1d61da9bcddb0f'; // Personal access tokens

		//$client->authenticate($tokenOrLogin, $password, \Github\Client::AUTH_HTTP_PASSWORD); //old code

		try {
			$client->authenticate($tokenOrLogin, null, Github\Client::AUTH_ACCESS_TOKEN); //New code
		}catch (\RuntimeException $e)
		{
		//pre($e->getMessage());
		}

		$committer_name  = ucwords($this->session->userdata('full_name'));
		$committer_email = $this->session->userdata('email');
		$committer 		 = array('name' => $committer_name, 'email' => $committer_email);

		$article_commit_message = 'CMS Created ' . $repo_folder;
		if($delete){
			$article_commit_message = 'CMS Deleted ' . $repo_folder;
		}
		$post_commit_message = $this->input->post('article_commit_message');
		if ($post_commit_message) {
			$article_commit_message = $post_commit_message;
		}

		$git_commit_message = strip_tags(cleanMdHTML($article_commit_message));

		$git_repo_folder_array =  array();
		
		$search = array("www.", "http://", "https://", "github.com/");
		$github_row_repo = rtrim(str_replace($search, "", $github_row->github_repo),"/");
		$github_row_repo_array = explode('/', $github_row_repo);
		$git_username = $github_row_repo_array[0];
		$git_repository = $github_row_repo_array[1];
		$git_repository_folder = '_'.$article['language_id'] .rtrim($github_row->github_article_path, "/");
		$git_repository_folder_amp = '_'.$article['language_id'] .rtrim($github_row->github_article_path.'_amp', "/");
		//pre();
		if($article_type == 'pillar' || $article_type == 'supporting'){
			//$git_repository_folder = '_'.$article['language_id'] .'/'.rtrim($github_row->github_article_path, "/");
			//$git_repository_folder = '_'.$article['language_id'] .'/topiccluster';
			$git_repository_folder = '_'.$article['language_id'] .'_topiccluster';
			$git_repository_folder_amp = '_'.$article['language_id'] .'_topiccluster_amp';
		}
		
		$git_repository_category = $article['article_category'];
		
		$git_repository_branch = 'master';
		//$git_repository_branch = 'rmag_test';
		//$repo_name = strftime("%Y-%m-%d") . '-' . $repo_folder . ".md";
		//pre($article['publish_date']);
		$repo_name = nice_date($article['publish_date'], 'Y-m-d'). '-' . $repo_folder . ".md";
		//pre($repo_name);
		//pre($repo_name);
		if($article_published_website == 'rmagazine.com'){

			$repo_name = $repo_folder . ".md";
			if($article_type == 'article'){
				$git_repository_folder = '_articles';
			}
			if($article_type == 'news'){
				$git_repository_folder = '_news';
			}
			if($article_type == 'recipe'){
				$git_repository_folder = '_recipes';
			}
			/*if($article_type == 'pillar' || $article_type == 'supporting'){
				$git_repository_folder = '_topiccluster';
			}*/
		}
        
		$git_repo_folder_array[] = $git_repository_folder;
		$git_repo_folder_array[] = $git_repository_folder_amp;
		if($article['language_id'] == 'en' && ($article_type == 'article' || $article_type == 'news') ){
			$git_repo_folder_array[] = '_default_articles';
			$git_repo_folder_array[] = '_default_articles_amp';
		}
		if($article['language_id'] == 'en' && ($article_type == 'pillar' || $article_type == 'supporting') ){

			$git_repo_folder_array[] = '_default_topiccluster';
			$git_repo_folder_array[] = '_default_topiccluster_amp';
		}

		/*if($article_published_website == 'altametrics.com'){
			$repo_name = $repo_folder . ".md";
			unset($git_repo_folder_array[0],$git_repo_folder_array[1]);
			$git_repo_folder_array[] = '_articles';
			
		}*/
		//pre_exit($git_repo_folder_array);
		foreach($git_repo_folder_array as $git_repository_folder){

			$git_commit_path = rtrim($git_repository_folder, "/") . '/';

			if($git_repository_folder=='_default_articles'){
				$body = $legacy_body;
				$body = str_replace("language: en","language: default", $body);
				//$body = str_replace("layout: article_amp_v2","layout: article_v2", $body);
				$body = str_replace("video_language: default","video_language: en", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				//$body = str_replace("amp_page: true","amp_page: ", $body);
			}
			if($git_repository_folder=='_default_articles_amp'){
				$i18n_link = "i18n_link: ".$article['article_id'];
                $body = str_replace($i18n_link,'', $body);
                $body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
                $body = str_replace("language: en","language: default", $body);
				$body = str_replace("layout: article_v2","layout: article_amp_v2", $body);
				$body = str_replace("video_language: default","video_language: en", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
            }
			if($git_repository_folder == '_'.$article['language_id'] .'_articles_amp'){
				$i18n_link = "i18n_link: ".$article['article_id'];
                $body = str_replace($i18n_link,'', $body);
                $body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
				$body = str_replace("layout: article_v2","layout: article_amp_v2", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				//$body = str_replace("permalink: ","permalink: amp/", $body);
			}

			if($git_repository_folder == '_default_topiccluster'){
				$body = $legacy_body;
				$body = str_replace("language: en","language: default", $body);
				//$body = str_replace("layout: topic_cluster_amp","layout: topic_cluster", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				//$body = str_replace("amp_page: true","amp_page: ", $body);
			}
			if($git_repository_folder == '_'.$article['language_id'] .'_topiccluster'){

				$permalink ="permalink: ".$article['language_id'].'/';
				$body = str_replace("permalink: ", $permalink, $body);
			}
			if($git_repository_folder == '_default_topiccluster_amp'){
				$i18n_link = "i18n_link: ".$article['article_id'];
				$body = str_replace($i18n_link,'', $body);
				$body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
				$body = str_replace("language: en","language: default", $body);
				$body = str_replace("layout: topic_cluster","layout: topic_cluster_amp", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				$body = str_replace("permalink: ","permalink: amp/", $body);
			}
			if($git_repository_folder == '_'.$article['language_id'] .'_topiccluster_amp'){
				$i18n_link = "i18n_link: ".$article['article_id'];
				$body = str_replace($i18n_link,'', $body);
				$body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
				$body = str_replace("layout: topic_cluster","layout: topic_cluster_amp", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				$body = str_replace("permalink: ","permalink: amp/", $body);
			}
		   
			$git_file_path = $git_commit_path . $repo_name;
			//pre_exit($git_file_path);
			//$reference = "refs/heads/" . $git_repository_branch; //use reference in old code 
			$reference = "heads/" . $git_repository_branch; //use reference in new code 
			$article_repo_found = FALSE;
			$gitArticleInfo = array();

			//$articleExists = $client->api('repo')->contents()->exists($git_username, $git_repository, $git_file_path, $reference);

			//$articleOldFile = $client->api('repo')->contents()->show($git_username, $git_repository, $git_file_path, $article['article_commit_sha']);

			// Create reference for new code.
			try
			{
				$reference = $client->api('gitData')->references()->show($git_username, $git_repository, 'heads/master');
				
			}
			catch (\RuntimeException $e)
			{
				$reference = array();
			 	//pre($e->getMessage());
			}

			// File Exists
			try
			{
				
				$articleOldFile = $client->api('repo')->contents()->show($git_username, $git_repository, $git_file_path, $git_repository_branch);
				
			}
			catch (\RuntimeException $e)
			{
			
				$articleOldFile = array();
				//pre($e->getMessage());
			}
			//$articleOldFile = $client->api('repo')->contents()->show($git_username, $git_repository, $git_file_path, $git_repository_branch);
			//pre($articleOldFile);
			//die;
			if (array_key_exists('sha', $articleOldFile) && ($articleOldFile['sha'] == trim($article['article_sha']))) {
				$sha_exists = array_key_exists('sha', $articleOldFile);
			}else{
				try
				{
					
					$articleOldFile = $client->api('repo')->contents()->show($git_username, $git_repository, $git_file_path, $git_repository_branch);
					$sha_exists = array_key_exists('sha', $articleOldFile);
					
				}
				catch (\RuntimeException $e)
				{
				    $articleOldFile = array();
					$sha_exists = '';
					//pre($e->getMessage());
				}
				
			}
			$article_git_action = '';
			if ($sha_exists) {
				$git_sha = $articleOldFile['sha'];
				if($delete){
					try
					{
						$article_git_action = 'delete';
						$gitArticleInfo 	= $client->api('repo')->contents()->rm($git_username, $git_repository, $git_file_path, $git_commit_message, $git_sha, $git_repository_branch, $committer);
						$error_type = 'warning';
						$return['error'] 	=  TRUE;
						$return['message'] 	=  '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $article_title . '</span> has been deleted!';
						
					}
					catch (\RuntimeException $e)
					{
						//pre($e->getMessage());
					}
					
				}

				if(!$delete){
					try
					{
						$article_git_action = 'update';
						$gitArticleInfo 	= $client->api('repo')->contents()->update($git_username, $git_repository, $git_file_path, $body, $git_commit_message, $git_sha, $git_repository_branch, $committer);

						$error_type = 'success';
						$return['error'] 	=  FALSE;
						$return['message'] 	=  '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $article_title . '</span> has been Published!';
						
					}
					catch (\RuntimeException $e)
					{
						//pre($e->getMessage());
					}
					
				}
			}

			if(!$delete && !$sha_exists){
				try
				{
					$article_git_action = 'new';
					$gitArticleInfo 	= $client->api('repo')->contents()->create($git_username, $git_repository, $git_file_path, $body, $git_commit_message, $git_repository_branch, $committer);

					$error_type = 'success';
					$return['error'] 	=  TRUE;
					$return['message'] 	=  '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $article_title . '</span> has been Published!';
					
				}
				catch (\RuntimeException $e)
				{
					//pre($e->getMessage());
				}
				
			}

		}
		$return['action'] 	=  $article_git_action;

		if(array_key_exists('content', $gitArticleInfo) && array_key_exists('commit', $gitArticleInfo)){
			$article_repo_found = TRUE;
			$article_sha = $gitArticleInfo['content']['sha'];
			$article_commit_sha = $gitArticleInfo['commit']['sha'];

			$article_data['article_published_website'] = $article_published_website; //$_POST['site'];
			$article_data_i18['article_publish_name'] = $repo_name;
			if(!$article['publish_date']){
				$article_data_i18['publish_date'] = strftime("%Y-%m-%d %H:%M:%S");
			}
			if($article_git_action != 'delete'){
				$article_data_i18['article_status'] = 'published';
			}
			$article_data_i18['article_sha'] =  $article_sha;
			$article_data_i18['article_commit_sha'] = $article_commit_sha;

			$this->article_model->save($article_data, $article_id);

			$where = "language_id='".$article['language_id']."' AND article_id = '".$article_id."'";
			$data_article_i18 = (array) $this->article_i18_model->get_by($where, TRUE);
			$article_i18_id=$data_article_i18['article_i18_id'];
			
			$this->article_i18_model->save($article_data_i18, $article_i18_id);

			 //pre($article['publish_date']);
			 $data_promotion = array(
				'date_published' => $article['publish_date']
			);
			$this->db->where('article_id', $article_id);
			$this->db->update('article_writer_promotion_queue', $data_promotion);
			$this->promotion_model->update_socialmedia_list($article_id, $article['publish_date'], $article_published_website, $article['language_id']);
			//pre($this->db->last_query());
			
			
		}else{
			$error_type = 'danger';
			$return['error'] 	=  TRUE;
			$return['message'] 	=  'Github content OR commit issue.';
		}

		$this->session->set_flashdata($error_type, $return['message']);
		if(count($image_array)>0){
			$git_commit_image_path = '_images/';

			if($github_row->github_article_image_path){
				$git_commit_image_path =  rtrim($github_row->github_article_image_path, "/") . '/';
			}
			if($article_type == 'pillar' || $article_type == 'supporting'){

				$git_commit_image_path = '_images/topiccluster/';
			}
			foreach($image_array as $image){

				$image_repo_found = FALSE;
				$article_id = FALSE;
				$section_id = FALSE;
				if(array_key_exists('article_id', $image)){
					$article_id = $image['article_id'];
				}
				if(array_key_exists('section_id', $image)){
					$section_id = $image['section_id'];
				}

				$image_content = @file_get_contents($image['image_url']);
				$gitImageInfo = array();
				$image_name = $image['image_name'];
				$git_img_path = $git_commit_image_path . $image_name;
				//$gitOldImage = $client->api('repo')->contents()->show($git_username, $git_repository, $git_img_path, $image['image_commit_sha']);
				try
				{
					
					$gitOldImage = $client->api('repo')->contents()->show($git_username, $git_repository, $git_img_path, $git_repository_branch);
					$img_sha_exists = array_key_exists('sha', $gitOldImage);
					
				}
				catch (\RuntimeException $e)
				{
				    $gitOldImage = array();
					$img_sha_exists = '';
					//pre($e->getMessage());
				}
				
				
				$img_git_action = '';
				if ($img_sha_exists) {
					$git_img_sha = $gitOldImage['sha'];
					if($delete){
						try
						{
							$img_git_action = 'delete';
							$gitImageInfo 	= $client->api('repo')->contents()->rm($git_username, $git_repository, $git_img_path, $git_commit_message, $git_img_sha, $git_repository_branch, $committer);
							
						}
						catch (\RuntimeException $e)
						{
							//pre($e->getMessage());
						}
						
					}

					if(!$delete && $image_content){
						try
						{
							$img_git_action	= 'update';
							$gitImageInfo	= $client->api('repo')->contents()->update($git_username, $git_repository, $git_img_path, $image_content, $git_commit_message, $git_img_sha, $git_repository_branch, $committer);
							
						}
						catch (\RuntimeException $e)
						{
							//pre($e->getMessage());
						}
						
					}
				}

				if(!$delete && !$img_sha_exists && $image_content){
					try
					{
						$img_git_action	= 'new';
						$gitImageInfo 	= $client->api('repo')->contents()->create($git_username, $git_repository, $git_img_path, $image_content, $git_commit_message, $git_repository_branch, $committer);
						
					}
					catch (\RuntimeException $e)
					{
						//pre($e->getMessage());
					}
					
				}
				if(array_key_exists('content', $gitImageInfo) && array_key_exists('commit', $gitImageInfo)){
					$image_sha = $gitImageInfo['content']['sha'];
					$image_commit_sha = $gitImageInfo['commit']['sha'];

					$image_data['image_sha'] =  $image_sha;
					$image_data['image_commit_sha'] = $image_commit_sha;

					if((int) $article_id > 0){
						$article_data = $image_data;
						$article_data['article_image_publish_name'] = $image_name;
						$where = "language_id='".$article['language_id']."' AND article_id = '".$article_id."'";
						$data_article_i18 = (array) $this->article_i18_model->get_by($where, TRUE);
						$article_i18_id = $data_article_i18['article_i18_id'];
						$this->article_i18_model->save($article_data, $article_i18_id);

						//$this->article_model->save($article_data, $article_id);
					}

					if((int) $section_id > 0){
						$image_data['article_section_image_publish_name'] = $image_name;
						$this->load->model('paragraph_model');
						$this->load->model('paragraph_i18_model');
						$where = "language_id='".$article['language_id']."' AND section_id = '".$section_id."'";
						$data_article_section_i18 = (array) $this->paragraph_i18_model->get_by($where, TRUE);
						$article_section_i18_id = $data_article_section_i18['section_i18_id'];
						$this->paragraph_i18_model->save($image_data, $article_section_i18_id);
						//$this->paragraph_model->save($image_data, $section_id);
					}
				}
			}
		}
		 
		
		return $return;
	}
	public function save_base64_image($imageBase64Data, $imageName = NULL, $remove_image = NULL , $setting = array())
    {
		$this->load->helper('path');
		$image_url = '';
        $image_data = $imageBase64Data;
        if ($image_data) {
			$image_upload_dir = $this->config->item('image_upload_dir');
			$image_upload_dir_temp = $this->config->item('image_upload_dir_temp');
			$image_path = FCPATH . $image_upload_dir;
			$image_path_temp = FCPATH . $image_upload_dir_temp;
			$image_parts = explode(";base64,", $image_data);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);

			$filename = time() . '-' . rand(1000, 9999) . '.png';
			if($imageName){
				$filename = slugify($imageName) . '-' . $filename;
			}

           // $image_path = set_realpath('assets/images/uploads/');
		   file_put_contents($image_path_temp . $filename, $image_base64);
			$image_url = site_url($image_upload_dir . $filename);

			$save = FCPATH . $image_upload_dir. $filename; //This is the new file you saving
			$file = FCPATH . $image_upload_dir_temp  . $filename; //This is the original file

			list($width, $height) = getimagesize($file) ; 
			if(array_key_exists('height', $setting) && $setting['height']){
				$new_height = $setting['height'];
				
			}else{
				$new_height = $height;
			}
			if(array_key_exists('width', $setting) && $setting['width']){
				$new_width = $setting['width'];
				
			}else{
				$new_width = $width;
			}

			$tn = imagecreatetruecolor($new_width, $new_height) ; 
			
			$image = imagecreatefrompng($file) ; 
			imagecopyresampled($tn, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height) ; 

			imagejpeg($tn, $save, 70) ; 
			if(file_exists($file))
			{
				unlink($file);
			}
			imagedestroy($tn);
			if($remove_image)
			{
				$image_pathinfo = pathinfo($remove_image);
				$remove_image_path = $image_path . $image_pathinfo['basename'];
				if(file_exists($remove_image_path))
				{
					unlink($remove_image_path);
				}
			}
            /* $return['image_name'] 	= $filename;
            $return['image_url'] 	= $image_url;
            $return['image_path'] 	= $image_path; */
        }
		return $image_url;
    }

	public function pixabayUploadImage($imageBase64Data)
    {
        $image_data = $this->input->post('image');
        if (isset($image_data)) {
            $image_data = str_replace('data:image/png;base64,', '', $image_data);
            $image_data = str_replace(' ', '+', $image_data);
            $image = base64_decode($image_data);
            $filename = time() . '.png';
            $path = set_realpath('assets/images/uploads/');
            file_put_contents($path . $filename, $image);
            $image_url = site_url('assets/images/uploads/' . $filename);
            $data['image_name'] = $filename;
            $data['image_url'] = $image_url;
            $data['image_path'] = $path;
            die($image_url);
        }
        die('ERROR');
	}
	
	function get_product_id_list(){
		$this->load->model('metatag_model');
		$result_array = $this->metatag_model->get();
		return json_decode(json_encode($result_array), TRUE);
	}
	public function get_optimizecontent_keyword_list($article_id, $lang_id, $keyword, $content = Null )
    {
		$log_message = 'Optimize Content Log Start'  .PHP_EOL;
		$this->db->select("article_content_performance");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $lang_id);
		$result_array = $this->db->get('articles_translate_i18')->result_array();
		$article_content_performance = $result_array[0]['article_content_performance'];
		$response = json_decode($article_content_performance, true);
		//$url = $this->config->item('seoconfig_api_url');
		//$no_of_search_count = (int)$this->config->item('seoconfig_search_count');
		//pre($url);
		//pre($no_of_search_count);
		if($content){

			$no_of_search_count = 20;
			$content = strip_tags($content);
					/* API URL */
			//$url = 'https://wplseotools.hubworks.com/keywordphrase';
			$url = 'https://whookqa.hubworks.com/keywordphrase';
		
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
			$log_message .= 'Api url = ' . $url . PHP_EOL;
		        $log_message .= 'keyword = ' . $keyword . PHP_EOL;
			$log_message .= 'page_content = ' . $content . PHP_EOL;
			$log_message .= 'page_id = ' . $article_id . PHP_EOL;
			$log_message .= 'lang = ' . $lang_id . PHP_EOL;
			$log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
			
			//pre($data_array);

			$data =  json_encode($data_array);
			/* pass encoded JSON string to the POST fields */
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
			/* set the content type json */
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type:application/json'
					));
				
			/* execute request */
			$output = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				//echo $httpCode;
			$log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
			if($output === false)
			{
				//echo 'Curl error: ' . curl_error($ch);
				$log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
				
			}
			else
			{
				$log_message .= 'Curl Response = ' . $output . PHP_EOL;
			
				$result = json_decode($output, true);
				if($result['result']){
					$data = array(
						'article_content_performance_temp' =>$output
					);
					$this->db->update('articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));

					$log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
				}
				$log_message .= 'Optimize Content Log End'  .PHP_EOL;
				$this->writeLog($log_message);
		
				/*$array_result = $result['result']['content_performance'];
				$total_already_use = (int) $array_result['total_already_use'];
				$total_more_often = (int) $array_result['total_more_often'];
				$total_questions = (int) $array_result['total_questions'];
				$total_should_use = (int) $array_result['total_should_use'];
				$total_stuffing = (int) $array_result['total_stuffing'];
		        if($total_already_use || $total_more_often || $total_questions || $total_should_use || $total_stuffing ){
					return json_decode($output, true);
				 }else{
					return false; 
				 }*/
				 return json_decode($output, true);
			}
			/* close cURL resource */
			curl_close($ch);

		}else if($response){
			$log_message .= 'Database Store Response = ' . $article_content_performance . PHP_EOL;
			$log_message .= 'Optimize Content Log End'  .PHP_EOL;
			$this->writeLog($log_message);
		
			return $response;

		}else{
						$no_of_search_count = 20;
			$content = strip_tags($content);
					/* API URL */
			//$url = 'https://wplseotools.hubworks.com/keywordphrase';
			$url = 'https://whookqa.hubworks.com/keywordphrase';
		
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
			$log_message .= 'Api url = ' . $url . PHP_EOL;
		    $log_message .= 'keyword = ' . $keyword . PHP_EOL;
			$log_message .= 'page_content = ' . $content . PHP_EOL;
			$log_message .= 'page_id = ' . $article_id . PHP_EOL;
			$log_message .= 'lang = ' . $lang_id . PHP_EOL;
			$log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
			
			//pre($data_array);

			$data =  json_encode($data_array);
			/* pass encoded JSON string to the POST fields */
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
			/* set the content type json */
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type:application/json'
					));
				
			/* execute request */
			$output = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				//echo $httpCode;
			$log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
			if($output === false)
			{
				//echo 'Curl error: ' . curl_error($ch);
				$log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
				
			}
			else
			{
				$log_message .= 'Curl Response = ' . $output . PHP_EOL;
			
				$result = json_decode($output, true);
				if($result['result']){
					$data = array(
						'article_content_performance_temp' =>$output
					);
					$this->db->update('articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));

					$log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
				}
				$log_message .= 'Optimize Content Log End'  .PHP_EOL;
				$this->writeLog($log_message);
		
				/*$array_result = $result['result']['content_performance'];
				$total_already_use = (int) $array_result['total_already_use'];
				$total_more_often = (int) $array_result['total_more_often'];
				$total_questions = (int) $array_result['total_questions'];
				$total_should_use = (int) $array_result['total_should_use'];
				$total_stuffing = (int) $array_result['total_stuffing'];
		        if($total_already_use || $total_more_often || $total_questions || $total_should_use || $total_stuffing ){
					return json_decode($output, true);
				 }else{
					return false; 
				 }*/
				 return json_decode($output, true);
			}
			/* close cURL resource */
			curl_close($ch);

		}
		//$log_message .= 'Optimize Content Log End'  .PHP_EOL;
		//$this->writeLog($log_message);
		
	}

	public function getOptimizeContent(){
        if ($this->input->is_ajax_request()){ 
            $this->load->library('parser');
            $article_id = $this->input->post('article_id');
            $lang_id = $this->input->post('lang_id');
			$keyword = $this->input->post('keyword');
			$content = $this->input->post('content');
			$remove_array = array("<br><br><br>","<br><br>","<br>","<br/>","<br />","<br></br>", "&nbsp;");
			$content = str_replace($remove_array, " ", $content);
			$json_data = $this->get_optimizecontent_keyword_list($article_id, $lang_id, $keyword, $content);
			$data['optimizecontent'] = $json_data;
			/*if($data['optimizecontent']){
				$update_data = array(
					'article_content_performance' => json_encode($data['optimizecontent'])
				);
				$this->db->update('articles_translate_i18', $update_data, array('article_id' => $article_id,'language_id' => $lang_id));	
			}*/
            $dataArray = ['success' => true];
			$dataArray['newContent'] = $this->parser->parse('component/optimizecontent', $data, TRUE);
			$dataArray['json_data'] = $json_data;
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($dataArray));
            
        }
	}
	
	public function export_optimize_content_keywords($article_id, $lang_id){
            //$article_id = $this->input->post('article_id');
            //$lang_id = $this->input->post('lang_id');
			//$keyword = $this->input->post('keyword');
			
			$this->db->select("article_content_performance_temp");
			$this->db->where('article_id', (int) $article_id);
			$this->db->where('language_id', $lang_id);
			$result_array = $this->db->get('articles_translate_i18')->result_array();
	
			$output = $result_array[0]['article_content_performance_temp'];
			$response = json_decode($output, true);

			$response = $response['result'];

			$file_name = 'keyword_'.date('Ymd').'.csv';
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$file_name"); 
			header("Content-Type: application/csv;");

			$file = fopen('php://output', 'w'); 
			$header = array("KEYWORDS YOU ALREADY USE","KEYWORDS YOU SHOULD USE","KEYWORDS YOU SHOULD USE MORE OFTEN","KEYWORDS STUFFING","CONTENT IDEAS VIA QUESTIONS PEOPLE ASK"); 
			fputcsv($file, $header);
			$max_length_array  = array();
			if(is_array($response['already_use']) && array_key_exists('already_use', $response)){

				$max_length_array[0] = count( $response['already_use'] );
			}
			if(is_array($response['should_use']) && array_key_exists('should_use', $response)){

				$max_length_array[1] = count( $response['should_use'] );
			}
			if(is_array($response['more_often']) && array_key_exists('more_often', $response)){

				$max_length_array[2] =count( $response['more_often']);
			}
			if(is_array($response['stuffing']) && array_key_exists('stuffing', $response)){

				$max_length_array[3] = count( $response['stuffing']);
			}
			if(is_array($response['questions']) && array_key_exists('questions', $response)){

				$max_length_array[4] = count( $response['questions']);
			}

			$max_length  = max($max_length_array);

			$row_array  = [];
			for ($key = 0; $key <= $max_length; $key++) {
				$already_use_string = '';
				$should_use_string = '';
				$more_often_string = '';
				$stuffing_string = '';
				$questions_string = '';
			
				if(is_array($response['already_use']) && array_key_exists('already_use', $response) && array_key_exists($key , $response['already_use'])){
						$already_use_string = $response['already_use'][$key]['keyword'];
				}
				if(is_array($response['should_use']) && array_key_exists('should_use', $response)  && array_key_exists($key , $response['should_use'])){
						$should_use_string = $response['should_use'][$key]['keyword'];
				}
				if(is_array($response['more_often']) && array_key_exists('more_often', $response)  && array_key_exists($key , $response['more_often'])){
						$more_often_string = $response['more_often'][$key]['keyword'];
				}
				if(is_array($response['stuffing']) && array_key_exists('stuffing', $response)  && array_key_exists($key , $response['stuffing'])){
						$stuffing_string = $response['stuffing'][$key]['keyword'];
				}
				if(is_array($response['questions']) && array_key_exists('questions', $response)  && array_key_exists($key , $response['questions'])){
						$questions_string = $response['questions'][$key]['keyword'];
				}
				$row_array[$key]['already_use'] = $already_use_string;
				$row_array[$key]['should_use'] = $should_use_string;
				$row_array[$key]['more_often'] = $more_often_string;
				$row_array[$key]['stuffing'] = $stuffing_string;
				$row_array[$key]['questions'] = $questions_string;
			}
			if($row_array){
				foreach ($row_array as $key => $value)
				{ 
					fputcsv($file, $value); 
				}
			}

			fclose($file); 
			exit;
	}

	public function get_keyword_analysis_details($keyword_id, $lang_id, $keyword)
    {
		$log_message = 'Keyword Analysis Log Start'  .PHP_EOL;
		$this->db->select("keyword_analysis");
		$this->db->where('keyword_id', (int) $keyword_id);
		$result_array = $this->db->get('article_keyword')->result_array();
		$keyword_analysis = $result_array[0]['keyword_analysis'];
		$response = json_decode($keyword_analysis, true);
		if($response && 1==2){
			$log_message .= 'Database Store Response = ' . $keyword_analysis . PHP_EOL;
			$log_message .= 'Keyword Analysis Log End'  .PHP_EOL;
			$this->writeLog($log_message);
			return $response;
		}else{

			$no_of_search_count = 20;
				/* API URL */
			//$url = 'https://wplseotools.hubworks.com/keywordphrase';
			//$url = 'https://whookqa.hubworks.com/keywordanalysisdata';
			$url = 'http://localhost:5000/keywordanalysisdata';
			/* Init cURL resource */
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			/* Array Parameter Data */
			$data_array = array(
				'keyword'=>$keyword,
				'keyword_id'=>$keyword_id,
				'lang'=>$lang_id,
				'no_of_search_count'=>$no_of_search_count
			);
			$log_message .= 'Api url = ' . $url . PHP_EOL;
		    $log_message .= 'keyword = ' . $keyword . PHP_EOL;
			$log_message .= 'keyword_id = ' . $keyword_id . PHP_EOL;
			$log_message .= 'lang = ' . $lang_id . PHP_EOL;
			$log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
			
			//pre($data_array);

			$data =  json_encode($data_array);
			/* pass encoded JSON string to the POST fields */
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				
			/* set the content type json */
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
						'Content-Type:application/json'
					));
				
			/* execute request */
			$output = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				//echo $httpCode;
			$log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
			if($output === false)
			{
				//echo 'Curl error: ' . curl_error($ch);
				$log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
				
			}
			else
			{
				$log_message .= 'Curl Response = ' . $output . PHP_EOL;
			
				$result = json_decode($output, true);
				if($result['keyword_analysis']){
					$keyword_content_performance = json_encode($result['keyword_data']);
					$data = array(
						'keyword_analysis' =>$output,
						'keyword_content_performance' =>$keyword_content_performance,
					);
					$this->db->update('article_keyword', $data, array('keyword_id' => $keyword_id));

					$log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
				}
				$log_message .= 'Keyword Analysis Log End'  .PHP_EOL;
				$this->writeLog($log_message);
				return json_decode($output, true);
			}
			/* close cURL resource */
			curl_close($ch);

		}
		//$log_message .= 'Keyword Analysis Log End'  .PHP_EOL;
		//$this->writeLog($log_message);
		
	}
	public function get_articles_by_createdate()
	{
		pre(date('Y-m-d H:i:s', strtotime('-30 days')));
		pre(date('Y-m-d', strtotime('2020-05-05 13:38:49')));

		$createdate = date('Y-m-d H:i:s', strtotime('-30 days'));

		$this->db->select("*");
		$this->db->where('date_added <=', $createdate);
		$this->db->group_start();
		$this->db->where('article_status', 'draft');
		$this->db->or_where('article_status', 'submitted');
		$this->db->group_end();
		$articles_rows = $this->db->get('articles_translate_i18')->result_array();
		foreach ($articles_rows as $article) {

			$this->db->set('article_previous_status', $article['article_status']);
			$this->db->set('article_status', 'deleted');
			$this->db->where('article_id', $article['article_id']);
			$this->db->update('articles_translate_i18'); 

		}
		pre($this->db->last_query());
		//pre($result_array);
		

	}
	/*public function get_articles_by_publishsite()
	{
		
		$this->db->select("*");
		$this->db->where('article_published_website !=', '');
		//$this->db->limit(1);
		$articles_rows = $this->db->get('articles')->result_array();
		pre($articles_rows);
		//die;
		foreach ($articles_rows as $article) {

			$this->db->set('article_site_id', $article['article_published_website']);
			$this->db->where('article_status', 'published');
			$this->db->or_where('article_status', 'pending');
			$this->db->where('article_site_id', null);
			$this->db->where('article_id', $article['article_id']);
			$this->db->update('articles_translate_i18'); 
			pre($this->db->last_query());
		}
		pre($this->db->last_query());
		//pre($result_array);
		

	}*/
	
	public function articles_by_publishsite()
	{
		
		$this->db->select("*");
		$this->db->where('article_published_website', 'hubworks.com');
		$this->db->where('article_type', 'article');
		//$this->db->or_where('article_type', 'news');
		//$this->db->limit(1);
		$articles_rows = $this->db->get('articles')->result_array();
		pre($articles_rows);
		//die;
		foreach ($articles_rows as $article) {
			pre($article);

			$this->db->set('article_site_id', $article['article_published_website']);
			$this->db->where('article_id', $article['article_id']);
			$this->db->update('articles_translate_i18'); 
			pre($this->db->last_query());
			//pre($this->db->last_query());
		}
		
		//pre($result_array);
		

	}
	public function writeLog($log_message = null)
	{
		//pre($log_message);
		$log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'optimize-content-keywords-log-' . date('Y-m-d') . '.php';

		$message  = '';
		if ( ! file_exists($filepath))
        {
       		$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }
        $message .=  PHP_EOL ;
        $message .=  '==================================================================================================' .PHP_EOL;
        $message .=  $log_date . PHP_EOL;
		$message .=  '==================================================================================================' .PHP_EOL;
		
		flock($fp, LOCK_EX);
        fwrite($fp, $message . $log_message);
        flock($fp, LOCK_UN);
        fclose($fp);
	}
	public function get_current_backlinks_count(){
		$article_id = $this->input->get('id');
		$target = $this->input->get('t');
		pre('Article Id: '.$article_id .'<br><br>Target: '.$target);
		$this->db->select("*");
		$this->db->where('article_type', 'pillar');
		$this->db->or_where('article_type', 'supporting');
		//$this->db->where('article_id', $article_id);
		//$this->db->limit(5);
		$articles_rows = $this->db->get('articles')->result_array();
		pre($this->db->last_query());
		pre($articles_rows);
		//pre($this->db->last_query());
		//pre($articles_rows);
		if(!empty($articles_rows)){
			foreach ($articles_rows as $article) {

				$this->db->select("*");
				//$this->db->where('article_status', 'published');
				$this->db->where('language_id', 'en');
				$this->db->where('article_id',$article['article_id']);
				
				$articles_i18_rows = $this->db->get('articles_translate_i18')->result_array();
				pre($articles_i18_rows);
				if(!empty($articles_i18_rows)){

					foreach ($articles_i18_rows as $article_i18) {
						//pre($article_i18);
						$article_id = $article_i18['article_id'];
						if($article_i18['article_site_id'] && $article_i18['article_permalink']){

							$target = 'https://'. $article_i18['article_site_id'] . '/' . $article_i18['article_permalink'] .'.html';
							$backlinks_count = $this->curl_backlinks_count_request($target);
							echo "backlinks_count";
							pre($backlinks_count);
							if(!$backlinks_count){
							$backlinks_count = 0;	
							}
							
							//if($backlinks_count){
				
								$this->db->set('article_backlinks_count', (int) $backlinks_count);
								//$this->db->where('language_id', $lang);
								$this->db->where('article_id', $article_id);
								$this->db->update('articles_translate_i18'); 
								pre($this->db->last_query());
								
							//}

						}
			
					}
				}
			}	
		}

	}
	public function get_target_backlinks_count($article_id = null){
		/*if($this->input->get('id')){
		 $article_id = $this->input->get('id');		
		}*/
		if($article_id){
			$target_array = array();
			//pre($article_id);
			$this->db->select("*");
			//$this->db->where('article_status', 'published');
			$this->db->where('language_id', 'en');
			$this->db->where('article_id', $article_id);
			$articles_i18_rows = $this->db->get('articles_translate_i18')->result_array();
			//pre($this->db->last_query());
			//pre($articles_i18_rows);
			$article_content_performance = json_decode($articles_i18_rows[0]['article_content_performance'], true);
			//pre($article_content_performance['result']['serp']);
			$target_array = $article_content_performance['result']['serp'];
			if(!empty($target_array)){
					//pre($target_array);
					//echo '<strong>Keyword:</strong> "'.$article_content_performance['result']['content_performance']['optimizing_content_keyword'].'"<br><br>';
					//echo '20 SERP results: ';
					//pre($target_array);
					//$target = $this->input->get('t');
					//pre('Article Id: '.$article_id .'<br><br>Target: '.$target);
					$domains_num = $this->curl_target_backlinks_count_request($target_array);
					//echo 'Domains num array (Discard the top two SERP results) : ';
					//pre($domains_num,'Domains num==');
					if(!empty($domains_num)){
						$median = $this->median($domains_num);
						//pre('Target Backlinks(Median): '. $median);
						if($median){
							//pre($articles_i18_rows[0]['article_backlinks_count']);
							if($articles_i18_rows[0]['article_backlinks_count']==''){
								$this->db->set('article_backlinks_count', 0);
							}
							$this->db->set('article_backlinks_target_count', $median);
							$this->db->set('article_backlinks_target_count', $median);
							//$this->db->where('language_id', $lang);
							$this->db->where('article_id', $article_id);
							$this->db->update('articles_translate_i18'); 
							//pre($this->db->last_query());
						}
					}
			
			}
		}
	}
	public function curl_backlinks_count_request($target = null) {
		pre($target);
		$return = false;
		$endpoint = 'https://api.semrush.com/analytics/v1/';

		$params = array(
			'key'=>'320858172aee5f8cb6936ea13dd70980',
			'type'=>'backlinks_overview',
			'target'=>$target,
			'target_type'=>'url',
			'export_columns'=>'ascore,total,domains_num,urls_num,ips_num,ipclassc_num,follows_num,nofollows_num,sponsored_num,ugc_num,texts_num,images_num,forms_num,frames_num',
		);
		$url = $endpoint . '?' . http_build_query($params);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		pre($result);
		$search = 'ERROR';
		/*if(preg_match("/{$search}/i", $result)) {
			return $return;
		}*/
		//pre($result);
		if(!preg_match("/{$search}/i", $result)) {
			$result = trim(str_replace("ascore;total;domains_num;urls_num;ips_num;ipclassc_num;follows_num;nofollows_num;sponsored_num;ugc_num;texts_num;images_num;forms_num;frames_num", "", $result));
			//pre($result);
			$domain_array = array();
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $key=>$line){

					list($ascore, $total, $domains_num, $urls_num, $ips_num, $ipclassc_num, $follows_num, $nofollows_num, $sponsored_num, $ugc_num, $texts_num, $images_num, $forms_num, $frames_num) = str_getcsv($line,';');
					//print ' Domain: ' . $domain . ', backlinks_num: ' . $backlinks_num . '<br>';
					
					$domain_array[$target] = $backlinks_num;
			
			}
		}
        if(!empty($domain_array)){
			$return = count($domain_array);
		}
		return $return;
	}
	public function curl_target_backlinks_count_request($target_array = null) {
		//echo "curl_target_backlinks_count_request";
		//pre($target_array);
		$return = false;
		$endpoint = 'https://api.semrush.com/analytics/v1/';
		$domains_num_array = array();
		$tempcount = 1;
		if(!empty($target_array)){
			   foreach($target_array as $key=>$target){
						//pre($tempcount);
						if($tempcount > 10){
							break;
						}
						$params = array(
							'key'=>'320858172aee5f8cb6936ea13dd70980',
							'type'=>'backlinks_overview',
							'target'=>$target,
							'target_type'=>'url',
							'export_columns'=>'ascore,total,domains_num,urls_num,ips_num,ipclassc_num,follows_num,nofollows_num,sponsored_num,ugc_num,texts_num,images_num,forms_num,frames_num',
						);
						$url = $endpoint . '?' . http_build_query($params);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
						curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						$result = curl_exec($ch);
						curl_close($ch);
						$search = 'ERROR';
						//pre($result, 'result');
						/*if(preg_match("/{$search}/i", $result)) {
							$tempcount--;
							continue;
						}*/
						
						if(preg_match("/{$search}/i", $result)) {
							if($result) {
							 //pre($target.'<br><br>'.$result);
							}
						}
						if(!preg_match("/{$search}/i", $result)) {
							if($result) {
								//pre($target.'<br><br>'.$result);
								
							}else{
								//pre($target.'<br><br>There is no result for this target url');
							}
							
							//pre($result);
							$result = trim(str_replace("ascore;total;domains_num;urls_num;ips_num;ipclassc_num;follows_num;nofollows_num;sponsored_num;ugc_num;texts_num;images_num;forms_num;frames_num", "", $result));
							//pre($result);
							
							foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $key=>$line){
									list($ascore, $total, $domains_num, $urls_num, $ips_num, $ipclassc_num, $follows_num, $nofollows_num, $sponsored_num, $ugc_num, $texts_num, $images_num, $forms_num, $frames_num) = str_getcsv($line,';');
									//list($domains_num) = str_getcsv($line,';');
									//print ' Domain: ' . $domain . ', backlinks_num: ' . $backlinks_num . '<br>';
									$domains_num_array[$target] = $domains_num;
							
							}
						}
						if(!preg_match("/{$search}/i", $result)){
							$tempcount++;
						}
						
			   }
					//echo "Domains num array";
					arsort($domains_num_array);
					//pre($domains_num_array);
					$removefirstmax = $this->remove_element($domains_num_array,max($domains_num_array));
					if(!empty($removefirstmax)){
						
					  $final_domain_list = $this->remove_element($removefirstmax,max($removefirstmax));	
					}
				   
				   
				   if(!empty($final_domain_list)){

					$return = $final_domain_list;

				   }
				   //pre($return);
				   return $return;
		 }  
		return $return;

	}
	public function remove_element($array,$value) {
		return array_diff($array, (is_array($value) ? $value : array($value)));
	}

	public function median1($numbers=array())
	{
		if (!is_array($numbers))
			$numbers = func_get_args();
		
		rsort($numbers);
		$mid = (count($numbers) / 2);
		return ($mid % 2 != 0) ? $numbers{$mid-1} : (($numbers{$mid-1}) + $numbers{$mid}) / 2;
	}
	
	public function median($arr)
	{
		sort($arr);
		$count = count($arr); //count the number of values in array
		$middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
		if ($count % 2) { // odd number, middle is the median
			$median = $arr[$middleval];
		} else { // even number, calculate avg of 2 medians
			$low = $arr[$middleval];
			$high = $arr[$middleval+1];
			$median = (($low+$high)/2);
		}
		return $median;
	}
	
	public function articles_translater($article_id = NULL) {
		$this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
        $this->load->model('callouts_i18_model');
        $this->load->model('backlink_i18_model');
        $this->load->model('promotion_model');
			
		//$article_id = $this->input->get('id');
        $currentLanguage = 'en';
        $targetLanguage_array = array("ar","fr","de","it","ja","es");
        $client = new Aws\Translate\TranslateClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZGQ7R7W4WKVQ3PH2',
                'secret' => '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',
          ]
        ]);
		//pre($article_id);
		//pre($client);
		
         /**
         *  Article translate start
        */
        if($article_id){
            $where_current_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $currentLanguage . "'";
            $article_current_language_row =  (array) $this->article_i18_model->get_by($where_current_language, TRUE);
            //echo "Article in English";
           // pre($article_current_language_row);
                if(!empty($article_current_language_row)){
                   /* $where_current_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $currentLanguage . "'";
                    $article_current_language_row =  (array) $this->article_i18_model->get_by($where_current_language, TRUE);*/
                    //echo "Article in English";
                    //pre($article_current_language_row);

                    if(!empty($article_current_language_row)){

                             /**
                             *  Array of article field for translate 
                            */
                            $data_article_translate_array = array(

                                'article_title' => $article_current_language_row['article_title'],
                                'article_description' => $article_current_language_row['article_description'],
								'article_image_alt' => $article_current_language_row['article_image_alt'],
								'article_meta_author' => $article_current_language_row['article_meta_author'],
								'article_meta_author_desc' => $article_current_language_row['article_meta_author_desc'],
                                'article_tags' => $article_current_language_row['article_tags'],
                                'article_meta_product' => $article_current_language_row['article_meta_product'],
                                'article_meta_category' => $article_current_language_row['article_meta_category'],
                                'article_meta_keyword' => $article_current_language_row['article_meta_keyword'],
                                'article_meta_abstract' => $article_current_language_row['article_meta_abstract'],
                                'article_meta_product_name' => $article_current_language_row['article_meta_product_name'],
                                'article_meta_product_desc' => $article_current_language_row['article_meta_product_desc'],
								'article_image_license' => $article_current_language_row['article_image_license'],
								'servings' => $article_current_language_row['servings'],
								'prep_time' => $article_current_language_row['prep_time'],
                            );
                            //echo "Article Translate Array in English";
                            //pre($data_article_translate_array);
                             /***  Backlinks Current Language Data Array For Translate Start ****/
                            $where_backlink_current_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $currentLanguage . "'";
                            $article_backlink_current_language_rows =  (array) $this->backlink_i18_model->get_by_array($where_current_language);
                            //echo "Backlinks in English";
                            //pre($article_backlink_current_language_rows);
                            $data_article_backlink_translate_array =[] ;  
                            foreach($article_backlink_current_language_rows  as $key => $backlink_row) {

                                $data_article_backlink_translate_array[$key] = array(
                                    

                                    'link_text' => $backlink_row['link_text'],
                                );

                            }
                            //echo "Backlinks Translate Array in English";
                            //pre($data_article_backlink_translate_array);
                             /***  Backlinks Current Language Data Array For Translate End ****/
                            /***  Social Media Current Language Data Array For Translate Start ****/
                            $where_social_current_language   = "article_id='" . (int)  $article_id . "' AND article_language_id = '" . $currentLanguage . "'";
                            $article_social_current_language_rows =  (array) $this->promotion_model->get_by_array($where_social_current_language);

                           // echo "Social Media Section in English";
                            //pre($article_social_current_language_rows);

                            $data_article_social_translate_array =[];

                            foreach($article_social_current_language_rows  as $key_s => $social_row) {

                                $data_article_social_translate_array[$key_s] = array(

                                        'msg_article_headline' => $social_row['msg_article_headline'],
                                        'msg_headline' => $social_row['msg_headline'],
                                        'msg_intro' => $social_row['msg_intro'],
										'msg_text' => $social_row['msg_text'],
										'msg_url_link' => $social_row['msg_url_link'],
                                );

                            }
                           // echo "Social Media Section Translate Array in English";
                            //pre($data_article_social_translate_array);
							
                        /***  Social Media Current Language Data Array For Translate End ****/
                        // Article check for each language ("fr","de","it","ja","es")
                        foreach($targetLanguage_array  as $targetLanguage) {
                             //pre($targetLanguage);
                            $where_target_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $targetLanguage . "'";
                            $article_target_language_row =  (array) $this->article_i18_model->get_by($where_target_language, TRUE);
							//echo "article_target_language_row";
							//pre($article_target_language_row);

                                 //Article field translate from "en" to other languages ("fr","de","it","ja","es")
								//pre($data_article_translate_array);
                                try {
                                    $return_article_array =[];
                                    foreach ($data_article_translate_array  as $keytext => $valuetext) {
                                        if($valuetext!=''){
                                            $result = $client->translateText([
                                                'SourceLanguageCode' => $currentLanguage,
                                                'TargetLanguageCode' => $targetLanguage,
                                                'Text' => $valuetext,
                                            ]);
                                            $return_article_array[$keytext] = $result['TranslatedText'];

                                        }else{
                                            $return_article_array[$keytext]='';
                                        }
                                        
                                    }
                                } catch(AwsException $e) {
                                    // output error message if fails
                                    //pre("Failed: ".$e->getMessage());
                                }

                                $data_article_translated = $article_current_language_row;
                                unset($data_article_translated['article_i18_id']);
                            
                                $data_article_translated['language_id'] = $targetLanguage;
                                $data_article_translated['article_title'] = $return_article_array['article_title'];
                                $data_article_translated['article_description'] = $return_article_array['article_description'];
                                $data_article_translated['article_image_alt'] = $return_article_array['article_image_alt'];
								$data_article_translated['article_meta_author'] = $return_article_array['article_meta_author'];
								$data_article_translated['article_meta_author_desc'] = $return_article_array['article_meta_author_desc'];
                                $data_article_translated['article_tags'] = $return_article_array['article_tags'];
								$data_article_translated['article_meta_product'] = $return_article_array['article_meta_product'];
								$data_article_translated['article_meta_category'] = $return_article_array['article_meta_category'];
								$data_article_translated['article_meta_keyword'] = $return_article_array['article_meta_keyword'];
								$data_article_translated['article_meta_abstract'] = $return_article_array['article_meta_abstract'];
								$data_article_translated['article_meta_product_name'] = $return_article_array['article_meta_product_name'];
								$data_article_translated['article_meta_product_desc'] = $return_article_array['article_meta_product_desc'];
								$data_article_translated['article_image_license'] = $return_article_array['article_image_license'];
								$data_article_translated['servings'] = $return_article_array['servings'];
								$data_article_translated['prep_time'] = $return_article_array['prep_time'];
                                    if(!empty($article_target_language_row)){
                                            
                                        $this->article_i18_model->save($data_article_translated, $article_target_language_row['article_i18_id'] );
                                        //pre($this->db->last_query());

                                    }else{

                                        $this->article_i18_model->save($data_article_translated);
                                        //pre($this->db->last_query());
                                    }

                                    
                                     /***  Backlinks  Translate Start ****/
									 //pre($data_article_backlink_translate_array);
									 if(!empty($data_article_backlink_translate_array)){
										 try {
											$return_article_backlink_array =[];
											foreach ($data_article_backlink_translate_array  as $keybacklink => $valuebacklinktext) {

												//pre($keybacklink);
												//pre($valuebacklinktext);
												if($valuebacklinktext!=''){

													$result_b = $client->translateText([
														'SourceLanguageCode' => $currentLanguage,
														'TargetLanguageCode' => $targetLanguage,
														'Text' => $valuebacklinktext['link_text'],
													]);
													$return_article_backlink_array[$keybacklink]['link_text'] = $result_b['TranslatedText'];

												}else{
													$return_article_backlink_array[$keybacklink]['link_text'] = '';
												}
												
											}
										} catch(AwsException $e) {
											// output error message if fails
											//pre("Failed: ".$e->getMessage());
										}
										//echo "return_article_backlink_array";
										 //pre($return_article_backlink_array);

										 $where_backlink_target_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $targetLanguage . "'";
										 $article_backlink_target_language_row =  (array) $this->backlink_i18_model->get_by_array($where_backlink_target_language);

										 $data_article_backlink_translated = $article_backlink_current_language_rows;

										 $data_article_backlink_update_translated = $article_backlink_target_language_row;
										 
										 
										 foreach($return_article_backlink_array  as $key_b => $backlink) {
											unset($data_article_backlink_translated[$key_b]['backlink_id']);
											$data_article_backlink_translated[$key_b]['language_id'] = $targetLanguage;
											$data_article_backlink_translated[$key_b]['link_text'] = $backlink['link_text'];

										 }
										 foreach($return_article_backlink_array  as $key_u_b => $u_backlink) {
											$data_article_backlink_update_translated[$key_u_b]['link_text'] = $u_backlink['link_text'];

										 }
									   // pre($data_article_backlink_translated);
										  if(!empty($article_backlink_target_language_row)){
											  //echo "if";
											foreach($data_article_backlink_update_translated  as $key_u_tb => $t_u_backlink) {
												$backlink_id = $t_u_backlink['backlink_id'];
												$backlinks = array(
													'link_text' => $t_u_backlink['link_text'],
												);
												$this->backlink_i18_model->save($backlinks, $backlink_id);
												//pre($this->db->last_query());
											}

										  }else{
												//echo "else";
											foreach($data_article_backlink_translated  as $key_i_tb => $t_i_backlink) {
												$backlinks = array(
													'article_id' => $t_i_backlink['article_id'],
													'language_id' =>  $targetLanguage,
													'backlink_url' => $t_i_backlink['backlink_url'],
													'backlink_required' => $t_i_backlink['backlink_required'],
													'backlink_domain_authority' => $t_i_backlink['backlink_domain_authority'],
													'backlink_validation' => $t_i_backlink['backlink_validation'],
													'link_text' => $t_i_backlink['link_text'],
													'link_url' => $t_i_backlink['link_url'],
													'skyscraper_article_title' => $t_i_backlink['skyscraper_article_title'],
												);
												//pre($backlinks);
												 $this->backlink_i18_model->save($backlinks);
												// pre($this->db->last_query());
											}

										   
										  }
									 }
                                    /***  Backlinks  Translate End ****/
                                    /***  Social Channels Translate Start ****/
									//echo "Social Channels Translate Start";
									//pre($data_article_social_translate_array);
									if(!empty($data_article_social_translate_array)){
										try {
										$return_article_social_array =[];
										foreach ($data_article_social_translate_array  as $keysocial => $valuesocialtext) {
											foreach ($valuesocialtext  as $key_s => $values_s_text) {

												//pre($key_s);
												//pre($values_s_text);
												if($values_s_text!='' || $key_s != 'msg_url_link'){
													$result_s = $client->translateText([
														'SourceLanguageCode' => $currentLanguage,
														'TargetLanguageCode' => $targetLanguage,
														'Text' => $values_s_text,
													]);
													$return_article_social_array[$keysocial][$key_s] = $result_s['TranslatedText'];

												}else{
													$return_article_social_array[$keysocial][$key_s] = '';
													
												}

												if($key_s == 'msg_url_link'){
													if($values_s_text){
														$parts = parse_url($values_s_text);
														$social_url = $parts['scheme'].'://'.$parts['host'].'/'.$targetLanguage.$parts['path'];
														$return_article_social_array[$keysocial]['msg_url_link'] = $social_url;
													}else{
														$social_url ='';
														$return_article_social_array[$keysocial]['msg_url_link'] = $social_url;
													}
												}
											}  
										}
										//echo "ssssssssssssssssssssssssss";
										//pre($return_article_social_array);
									} catch(AwsException $e) {
										// output error message if fails
										//pre("Failed: ".$e->getMessage());
									}
									//pre($return_article_social_array);
									$where_social_target_language   = "article_id='" . (int)  $article_id . "' AND article_language_id = '" . $targetLanguage . "'";
									$article_social_target_language_row =  (array) $this->promotion_model->get_by_array($where_social_target_language);

									$data_article_social_translated = $article_social_current_language_rows;

									$data_article_social_update_translated = $article_social_target_language_row;
									
									
									foreach($return_article_social_array  as $key_s => $social) {
										foreach($social  as $key_s_t => $social_s_t) {
											//echo "kkkkkkkkkkkkkkkkkkkkkkkkkkkkk";
											//pre($social);
											unset($data_article_social_translated[$key_s]['msg_id']);
											$data_article_social_translated[$key_s]['article_language_id'] = $targetLanguage;
											$data_article_social_translated[$key_s][$key_s_t] = $social_s_t;
										}
									}
									foreach($return_article_social_array  as $key_u_s => $u_social) {
										foreach($u_social  as $key_u_s_t => $u_t_social) {
												$data_article_social_update_translated[$key_u_s][$key_u_s_t] = $u_t_social;
										}
									}
									//echo "social social";
									 //pre($article_social_target_language_row);
										//pre($data_article_social_translated);
									if(!empty($article_social_target_language_row)){
										foreach($data_article_social_update_translated  as $key_u_ts => $t_u_social) {
											//echo "update social";
											//pre($t_u_social);
											
												$msg_id = $t_u_social['msg_id'];
												//$parts = parse_url($t_u_social['msg_url_link']);
												//$path = str_replace("/".$targetLanguage,"", $parts['path']);
                                            	//$social_url = $parts['scheme'].'://'.$parts['host'].'/'.$targetLanguage.$path;
												$socialmedia = array(
													'msg_article_headline' => $t_u_social['msg_article_headline'],
													'msg_headline' => $t_u_social['msg_headline'],
													'msg_intro' => $t_u_social['msg_intro'],
													'msg_text' => $t_u_social['msg_text'],
													'msg_url_link' =>  $t_u_social['msg_url_link']
												);
												$this->promotion_model->save($socialmedia, $msg_id);
												//pre($this->db->last_query());
											
										}

										}else{
										 //pre($data_article_social_translated );
										foreach($data_article_social_translated  as $key_i_ts => $t_i_social) {
											//echo "insert social";
											//pre($t_i_social);
											$socialmedia = $t_i_social;
											//$parts = parse_url($t_i_social['msg_url_link']);
											//$path = str_replace("/".$targetLanguage,"", $parts['path']);
                                        	//$social_url = $parts['scheme'].'://'.$parts['host'].'/'.$targetLanguage.$path;
											//$socialmedia['msg_url_link'] = $t_i_social['msg_url_link'];
											//pre($socialmedia);
											$this->promotion_model->save($socialmedia);
											//pre($this->db->last_query());
										}

										
										}
                               }
                            /***  Social Channels Translate End ****/

                        }
                        

                    }
            
                }
				
				$this->paragraphs_translate($article_id);
				
				return true;
        }
			return false;
    }
    public function paragraphs_translate($article_id = NULL) {
		$this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
        $this->load->model('callouts_i18_model');
        $this->load->model('backlink_i18_model');
        $this->load->model('promotion_model');
        //$article_id='685';
		//$article_id = $this->input->get('id');
        $currentLanguage = 'en';
        $client = new Aws\Translate\TranslateClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZGQ7R7W4WKVQ3PH2',
                'secret' => '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',
          ]
        ]);
        if($article_id){
            $targetLanguage_array = array("ar","fr","de","it","ja","es");
            $this->db->where('article_id', (int)  $article_id);
            $this->db->where('language_id', $currentLanguage);
            $this->db->order_by('section_id', 'asc');
            $article_m_paragraph_current_language_row =  $this->db->get('article_section')->result_array();
            //echo "Section data from master section ";
            //pre($article_m_paragraph_current_language_row);
            if(!empty($article_m_paragraph_current_language_row)){
            foreach($targetLanguage_array  as $targetLanguage) {
                $where_article_m_paragraph_target_language   = "article_id='" . (int)  $article_id . "' AND language_id = '" . $targetLanguage . "'";
                $article_m_paragraph_target_language_row =  (array) $this->paragraph_model->get_by_array($where_article_m_paragraph_target_language);
                //pre($article_m_paragraph_target_language_row);
                    if(!empty($article_m_paragraph_target_language_row)){
                        foreach ($article_m_paragraph_target_language_row  as $mkeytext => $mvaluetext) {

                            $where_c_d = array(
                                'section_id' => (int)  $mvaluetext['section_id'],
                                'language_id' =>  $targetLanguage
                                );
                                $this->db->delete('article_section_callouts_translate_i18', $where_c_d);
                            $tables = array('article_section_steps_translate_i18', 'article_section_ingredients_translate_i18' , 'article_section_translate_i18');
                            $where_d = array(
                                'section_id' => (int)  $mvaluetext['section_id'],
                                'language_id' =>  $targetLanguage
                            );
                            $this->db->delete($tables, $where_d);
                            //pre($this->db->last_query());
                            $where_s_d = array(
                            'article_id' => $article_id,
                            'language_id' =>  $targetLanguage
                            );
                            $this->db->delete('article_section', $where_s_d);
                           // pre($this->db->last_query());
                        }
                    }
                }
                foreach($targetLanguage_array  as $targetLanguage) {
                            $data_article_paragraph_translate_array =[];
                            $data_article_callouts_translate_array =[];
                        foreach($article_m_paragraph_current_language_row  as $m_p_key => $m_p_value) {
                            
                            $where_article_c_paragraph_current_language_i18   = "section_id = '" . (int)  $m_p_value['section_id'] . "' AND language_id = '" . $m_p_value['language_id'] . "'";
                            $article_c_paragraph_current_language_i18_row =  (array) $this->paragraph_i18_model->get_by($where_article_c_paragraph_current_language_i18, TRUE);

                            $where_article_callouts_current_language_i18   = "section_id = '" . (int)  $m_p_value['section_id'] . "' AND language_id = '" . $m_p_value['language_id'] . "'";
                            $article_callouts_current_language_i18_row =  (array) $this->callouts_i18_model->get_by_array($where_article_callouts_current_language_i18);
                            //echo "<br>callout in en<br>";
                            //pre($article_callouts_current_language_i18_row);

                            //echo "Section data from chield section--".$m_p_value['section_id'];
                            //pre($article_c_paragraph_current_language_i18_row);
                            if(!empty($article_c_paragraph_current_language_i18_row)){
                                $data_article_paragraph_translate_array= array(
									'section_title' => $article_c_paragraph_current_language_i18_row['section_title'],
                                    'section_image_alt' => $article_c_paragraph_current_language_i18_row['section_image_alt'],
									'section_text' => $article_c_paragraph_current_language_i18_row['section_text'],
                                    'section_image_license' => $article_c_paragraph_current_language_i18_row['section_image_license'],
									
                                );
                                if(!empty($article_callouts_current_language_i18_row) && count($article_callouts_current_language_i18_row) > 0){
                                    $data_article_callouts_translate_array=[];
                                    foreach($article_callouts_current_language_i18_row  as $c_key => $callouts) {
                                         /**
                                         *  create array for Callouts translate field
                                        */
                                        $data_article_callouts_translate_array[$c_key] = array(
        
                                            'callout_title' => $callouts['callout_title'],
                                            'callout_text' => $callouts['callout_text'],
                                            
                                        );
                                    }
                                    //pre($data_article_callouts_translate_array);
                                    try {
                                        $return_article_callouts_array=[];
                                        foreach ($data_article_callouts_translate_array  as $c_key => $c_value) {
                                            //echo "c_value";
                                            //pre($c_value);
                                            foreach ($c_value  as $c_keytext => $c_valuetext) {
                                            //echo "c_valuetext";
                                                //pre($c_valuetext);
                                            
                                                    if($c_valuetext!=""){
                                                        $c_result = $client->translateText([
                                                            'SourceLanguageCode' => $currentLanguage,
                                                            'TargetLanguageCode' => $targetLanguage,
                                                            'Text' => $c_valuetext,
                                                        ]);
                                                        $return_article_callouts_array[$c_key][$c_keytext] = $c_result['TranslatedText'];
                                                    }else{
                                                        $return_article_callouts_array[$c_key][$c_keytext] = '';
                                                    }
                                                
                                            
                                                
                                            }
                                        }
                                        //echo "Callouts Section data return array";
                                        //pre($return_article_callouts_array);
                                    
                                
                                    } catch(AwsException $e) {
                                        // output error message if fails
                                        //pre("Failed: ".$e->getMessage());
                                    }
                                }
                                    try {
                                        foreach ($data_article_paragraph_translate_array  as $keytext => $valuetext) {
                                            //pre($valuetext);
                                        
                                                if($valuetext!=""){
                                                    $p_result = $client->translateText([
                                                        'SourceLanguageCode' => $currentLanguage,
                                                        'TargetLanguageCode' => $targetLanguage,
                                                        'Text' => $valuetext,
                                                    ]);
                                                    $return_article_paragraph_array[$keytext] = $p_result['TranslatedText'];
                                                }else{
                                                    $return_article_paragraph_array[$keytext] = '';
                                                }
                                            
                                        
                                            
                                        }
                                        //echo "Section data return array";
                                       // pre($return_article_paragraph_array);
                                        $data_article_paragraph_insert_array = $article_c_paragraph_current_language_i18_row;
                                        unset($data_article_paragraph_insert_array['section_i18_id']);
                                        unset($data_article_paragraph_insert_array['section_id']);
                                      // pre($data_article_paragraph_insert_array);
                                            $data_paragraph['article_id'] = $article_id;
                                            $data_paragraph['language_id'] = $targetLanguage;
                                        foreach ($return_article_paragraph_array  as $t_r_keytext => $t_r_valuetext) {
                                            $data_article_paragraph_insert_array['language_id']= $targetLanguage;
                                            $data_article_paragraph_insert_array[$t_r_keytext]= $t_r_valuetext;
                                        }
                                        // echo "Section data insert array";
                                        //pre($data_article_paragraph_insert_array);
                                        $section_id = $this->paragraph_model->save($data_paragraph);
                                        $data_article_paragraph_insert_array['section_id'] = $section_id;
                                        //pre($data_article_paragraph_insert_array);
                                        $this->paragraph_i18_model->save($data_article_paragraph_insert_array);
                                        //pre($this->db->last_query());
                                        //pre($article_callouts_current_language_i18_row);
                                        if(!empty($article_callouts_current_language_i18_row) && count($article_callouts_current_language_i18_row) > 0){

                                            $data_article_callout_insert_array = $article_callouts_current_language_i18_row;                                       
                                            //pre($data_article_callout_insert_array);
                                            if(!empty($return_article_callouts_array)){
                                                foreach ($return_article_callouts_array  as $t_c_i_keytext => $t_c_i_valuetext) {
                                                    //echo "insert callout";
                                                    //pre($t_c_i_valuetext);
                                                    foreach ($t_c_i_valuetext  as $t_c_keytext => $t_c_valuetext) {
                                                        unset($data_article_callout_insert_array[$t_c_i_keytext]['callout_i18_id']);
                                                        unset($data_article_callout_insert_array[$t_c_i_keytext]['section_id']);
                                                       // unset($data_article_callout_insert_array[$t_c_i_keytext]['callout_title']);
                                                        //unset($data_article_callout_insert_array[$t_c_i_keytext]['callout_text']);
                                                        $data_article_callout_insert_array[$t_c_i_keytext]['section_id'] = $section_id;
                                                        $data_article_callout_insert_array[$t_c_i_keytext]['language_id']= $targetLanguage;
                                                        $data_article_callout_insert_array[$t_c_i_keytext][$t_c_keytext]= $t_c_valuetext;
                                                    }

                                                } 
                                                //echo "insert callout array last";
                                            // pre( $data_article_callout_insert_array);
                                                foreach ($data_article_callout_insert_array  as $calloutkeytext =>  $callout) {
                                                    //echo "final insert callout array last";
                                                    //pre($calloutkeytext);
                                                    //pre($callout);
                                                    $this->callouts_i18_model->save($callout);
                                                    //pre($this->db->last_query());
                                                    
                                                }
                                            }

                                        }
                                        
                                    
                                
                                    } catch(AwsException $e) {
                                        // output error message if fails
                                        //pre("Failed: ".$e->getMessage());
                                    }
                            }
        

                        }
                }

            }
			return true;

        }
		return false;
    }

	

}
