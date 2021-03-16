<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/aws/aws-autoloader.php';
use Aws\Translate\TranslateClient;
use Aws\Exception\AwsException;

class Translate extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
        $this->load->model('callouts_i18_model');
		$this->load->model('social_media_callouts_i18_model');
        $this->load->model('ingredients_i18_model');
        $this->load->model('steps_i18_model');
        $this->load->model('backlink_i18_model');
        $this->load->model('promotion_model');
        $this->load->model('articletype_model');
        $this->load->model('articlecategory_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->model('channelui_model');
        $this->load->model('website_model');
        $this->load->model('metatag_model');
    }

    public function index(){
		$website ='plumpos.com';
		//$article_id = $this->input->get('id');
		$this->db->select("*");
		$this->db->from('articles_translate_i18');
		$this->db->where('article_status', 'published');
		$this->db->where('article_i18_status', true);
		//$this->db->where('article_i18_status', false);
		$this->db->where('article_i18_publish_status', false);
		$this->db->where('article_site_id', $website);
		//$this->db->where('article_id', $article_id);
        //$this->db->where('article_status', 'submitted');
		$this->db->where('language_id', 'en');
		$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$this->db->limit(5);
		$result_array = $this->db->get()->result_array();
		pre($this->db->last_query());
		pre($result_array);
		//die;
		foreach ($result_array  as $result) {
			echo($result['article_id']);
			pre($result);
			$article_id = (int) $result['article_id'];
			
			//$language_array = array("ar","fr","de","it","ja","es");
			$language_array = array("fr","de","it","ja","es");
			//$language_array = array("ar","ja");
			//$except_article_array = array(339,334,325,321,319,317,307,304,279,222,178,171,161,159,157,156,153,146,142,139,115,84,80,57,52,46,41,39,32,31,27,18,758,594,588,547,339,338,337,336,335,334,332,331,330,329,328,327,325,324,323,322,321,319,318,317,316,314,313,311,310,307,306,305,304,303,302,301,300,299,285,280,279,278,277,276,275,244,243,242,241,240,239,238,237,236,235,234,233,232,231,230,228,227,226,225,224,223,222,221,220,219,218,217,216,215,214,213,212,210,209,208,207,206,205,204,203,191,189,186,184,183,178,176);
			//$except_article_array = array(1116,1115,1113,1112,1109,1108,1106,1077,1076,1075,1050,1047,1046,1044,1043,1018,818,756,754,753,752,751,750,749,685,682,677,674,670,668,667,666,652,647,638,637,635,616,614,612,611,608,532,531,529,687,736,738,739,740,741);
			$except_article_array = array(1116,1115);
			if (in_array($article_id, $except_article_array)){
				
			}else{
				foreach ($language_array  as $key => $value) {
					$langid = $value;
					pre($langid);
					pre($article_id);
					$this->publishArticleI18n($article_id, $langid, $website);
					$this->db->set('article_i18_status', true);
					$this->db->set('article_i18_publish_status', true);
						//$this->db->where('language_id', $lang);
						$this->db->where('article_id', $article_id);
						$this->db->update('articles_translate_i18');
						pre($this->db->last_query());						
		
				}
			}
				
				//$article_id = 906;
				//$this->publishArticleI18n($article_id, 'en');
				//sleep(5);
				
		
		}
		//553 555 483  500 502  515 517 521   526 556 554  567
		//$article_id = 906;		
		//$this->publishArticleI18n($article_id, 'en');
		/*$article_id = 1089;
		pre($article_id);
			$language_array = array("en","fr","de","it","ja","es");
				foreach ($language_array  as $key => $value) {
					$langid = $value;
					pre($langid);
					pre($article_id);
					$this->publishArticleI18n($article_id, $langid);
		
				}*/
				
    }
	
	public function site_by_i18n_translater(){
		//$article_id = $this->input->get('id');
		$site_id = $this->input->get('site_id');
		pre($site_id);
		if($site_id){
			$this->db->select("*");
			$this->db->from('articles_translate_i18');
			$this->db->where('article_status', 'published');
			//$this->db->where('article_i18_status', true);
			$this->db->where('article_i18_status', false);
			$this->db->where('article_site_id', $site_id);
			//$this->db->where('article_id', $article_id);
			//$this->db->where('article_status', 'submitted');
			$this->db->where('language_id', 'en');
			$this->db->order_by('date_added', 'DESC'); //ASC, DESC
			//$this->db->limit(1);
			$result_array = $this->db->get()->result_array();
			//pre($result_array);
			//die;
			foreach ($result_array  as $result) {
				pre($this->db->last_query());
				echo($result['article_id']);
				pre($result);
				$article_id = (int) $result['article_id'];
				$article_title = $result['article_title'];
				//$except_article_array = array(1116,1115,1113,1112,1109,1108,1106,1077,1076,1075,1050,1047,1046,1044,1043,1018,818,756,754,753,752,751,750,749,685,682,677,674,670,668,667,666,652,647,638,637,635,616,614,612,611,608,532,531,529,687,736,738,739,740,741);
				$except_article_array = array(1116,1115);
				if (in_array($article_id, $except_article_array)){
					
					$status = true;
				}else{
					$status = $this->articlesTranslater($article_id);
				}
				
				if($status){
					echo "update";
						$this->db->set('article_i18_status', true);
						//$this->db->where('language_id', $lang);
						$this->db->where('article_id', $article_id);
						$this->db->update('articles_translate_i18'); 
						pre($this->db->last_query());
						if($this->db->affected_rows()){
							$language_array = array("fr","de","it","ja","es");
							//$language_array = array("ar");
							foreach ($language_array  as $key => $value) {
								$langid = $value;
								//$this->publishArticleI18n($article_id, $langid);
					
							}
						}else{

							verify_i18n($article_id, $article_title);
							$this->db->set('article_i18_status', true);
							//$this->db->where('language_id', $lang);
							$this->db->where('article_id', $article_id);
							$this->db->update('articles_translate_i18'); 
						}
				}else{

					verify_i18n($article_id, $article_title);
					$this->db->set('article_i18_status', true);
					//$this->db->where('language_id', $lang);
					$this->db->where('article_id', $article_id);
					$this->db->update('articles_translate_i18'); 
				}
			}
			
		}
        
    }
	public function hub_i18n_translater(){
		$article_id = $this->input->get('id');
		pre($article_id);
		if($article_id){
			$this->db->select("*");
			$this->db->from('articles_translate_i18');
			$this->db->where('article_status', 'published');
			//$this->db->where('article_i18_status', true);
			//$this->db->where('article_i18_status', false);
			$this->db->where('article_site_id', 'zipclock.com');
			$this->db->where('article_id', $article_id);
			//$this->db->where('article_status', 'submitted');
			$this->db->where('language_id', 'en');
			$this->db->order_by('date_added', 'DESC'); //ASC, DESC
			$this->db->limit(1);
			$results = $this->db->get()->row();
			pre($this->db->last_query());
			echo($results->article_id);
			pre($results);
			$article_id = (int) $results->article_id;
			$article_title = $results->article_title;
			$except_article_array = array(339,334,325,321,319,317,307,304,279,222,178,171,161,159,157,156,153,146,142,139,115,84,80,57,52,46,41,39,32,31,27,18);
			if (in_array($article_id, $except_article_array)){
				
				$status = true;
			}else{
				$status = $this->articlesTranslater($article_id);
			}
			
			if($status){
				echo "update";
					$this->db->set('article_i18_status', true);
					//$this->db->where('language_id', $lang);
					$this->db->where('article_id', $article_id);
					$this->db->update('articles_translate_i18'); 
					//pre($this->db->last_query());
					/*if($this->db->affected_rows()){
						//$language_array = array("fr","fr","de","it","ja","es");
						$language_array = array("ar");
						foreach ($language_array  as $key => $value) {
							$langid = $value;
							//$this->publishArticleI18n($article_id, $langid);
				
						}
					}else{

						verify_i18n($article_id, $article_title);
						$this->db->set('article_i18_status', true);
						//$this->db->where('language_id', $lang);
						//$this->db->where('article_id', $article_id);
						//$this->db->update('articles_translate_i18'); 
					}*/
			}else{

				verify_i18n($article_id, $article_title);
				//$this->db->set('article_i18_status', true);
				//$this->db->where('language_id', $lang);
				//$this->db->where('article_id', $article_id);
				//$this->db->update('articles_translate_i18'); 
			}
			
		}
        
    }

    public function i18n_translater(){
        $this->db->select("*");
		$this->db->from('articles_translate_i18');
		$this->db->where('article_status', 'published');
		$this->db->where('article_i18_status', false);
        //$this->db->where('article_i18_status', true);
        //$this->db->where('article_id', $article_id);
		$this->db->where('language_id', 'en');
		$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$this->db->limit(1);
		$results = $this->db->get()->row();
		pre($this->db->last_query());
		echo($results->article_id);
        pre($results);
        $article_id = (int) $results->article_id;
		$article_title = $results->article_title;
		$website = $results->article_site_id;
		$except_article_array = array(832,1076);
		if (in_array($article_id, $except_article_array)){
			
			$status = true;
		}else{
			$status = $this->articlesTranslater($article_id);
		}
        
        if($status){
			echo "update";
				$this->db->set('article_i18_status', true);
				//$this->db->where('language_id', $lang);
				$this->db->where('article_id', $article_id);
				$this->db->update('articles_translate_i18'); 
				pre($this->db->last_query());
				if($this->db->affected_rows()){
					//$language_array = array("ar","fr","de","it","ja","es");
					$language_array = array("fr","de","it","ja","es");
					//$language_array = array("ar");
					foreach ($language_array  as $key => $value) {
						$langid = $value;
						//$this->publishArticleI18n($article_id, $langid, $website);
			
					}
				}else{

					//$this->verify_i18n($article_id, $article_title);
					$this->db->set('article_i18_status', true);
					//$this->db->where('language_id', $lang);
					$this->db->where('article_id', $article_id);
					$this->db->update('articles_translate_i18'); 
				}
		}else{

            //$this->verify_i18n($article_id, $article_title);
			$this->db->set('article_i18_status', true);
			//$this->db->where('language_id', $lang);
			$this->db->where('article_id', $article_id);
			$this->db->update('articles_translate_i18'); 
        }
        
        
    }
	
	public function publishArticleI18n($article_id = NULL, $language_id, $website, $delete = FALSE)
    {
		$error = TRUE;
		$return_message = '';
		$to_name = '';
		$to_email = '';
		$article_title = '';
		$return =  array('error'=>true, 'message' => 'Somthing Wrong, Please try again');

		/*if ($this->input->post('article_publish_id')) {
            $article_id = $this->input->post('article_publish_id');
		}*/

		//$article_published_website = 'anyconnector.com';
		$article_published_website = $website;
		
		/*if ($this->input->post('article_published_website')) {
			$article_published_website = strtolower($this->input->post('article_published_website'));
		}*/
		$this->load->model('github_model');
		//$where = 'site_id = "' . $article_published_website . '"';
		$where = "site_id =  '".$article_published_website."'";
		$github_row = $this->github_model->get_by($where, TRUE);
		//pre($github_row);
		

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
			
			$response  	= $this->pushContentGithubI18n($article, $content, $delete);
			
		}
	}
	
	protected function pushContentGithubI18n($article, $body, $delete){
		pre($article);
		$return['error'] 	=  TRUE;
		$return['message'] 	=  'Somthing Wrong, Please try again';
		$article_id = $article['article_id'];
		$article_published_website = 'hubworks.com';
		if($article['article_published_website']){
			$article_published_website = strtolower($article['article_published_website']);
		}
		$legacy_body = $body;
		pre($body);
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

		/*$a_update_image = $article_image = trim($article['article_image']);
		if($article_image){
			$article_image_pathinfo = pathinfo($article_image);
			$a_update_image =  $repo_folder. '.' . $article_image_pathinfo['extension'];
			$image_array[$array_key]['article_id'] 		 = trim($article['article_id']);
			$image_array[$array_key]['image_name'] 		 = $a_update_image;
			$image_array[$array_key]['image_url'] 		 = $article_image;
			$image_array[$array_key]['pathinfo'] 		 = $article_image_pathinfo;
			$image_array[$array_key]['image_sha']  		 = $article['image_sha'];
			$image_array[$array_key]['image_commit_sha'] = $article['image_commit_sha'];
		}*/

		/*$paragraphs = $article['paragraphs'];
		$section_image_name = $article_title;

		if(is_array($paragraphs) && count($paragraphs) > 0){

			foreach ($paragraphs as $paragraph) {
				$p_update_image = $paragraph_image = trim($paragraph['section_image']);
				if($paragraph_image){
					if($paragraph['section_title']){
                        $section_image_name = $paragraph['section_title'];
					} 
					$array_key++;
					$paragraph_image_pathinfo = pathinfo($paragraph_image);
					$p_update_image =  slugify($section_image_name). '-' . $paragraph['section_id'] . '.' . $paragraph_image_pathinfo['extension'];
					$image_array[$array_key]['section_id'] 		 = trim($paragraph['section_id']);
					$image_array[$array_key]['image_url'] 		 = $paragraph_image;
					$image_array[$array_key]['image_name'] 		 = $p_update_image;
					$image_array[$array_key]['pathinfo']   		 = $paragraph_image_pathinfo;
					$image_array[$array_key]['image_sha']  		 = $paragraph['image_sha'];
					$image_array[$array_key]['image_commit_sha'] = $paragraph['image_commit_sha'];
				}
			}
		}*/

		//require_once APPPATH . 'third_party/vendor/autoload.php'; // Old code path
		require_once FCPATH . 'vendor/autoload.php';  //New Code path

		$client = new \Github\Client();

		$tokenOrLogin = $github_row->github_client_id;
		$password	  = $github_row->github_api_key;
		//$tokenOrLogin ='f53d7554f9241367c5ae432016af7864158c14ea'; // Personal access tokens old
		//$tokenOrLogin ='797c4ab4630a3a320b731012df1d61da9bcddb0f'; // Personal access tokens (12-02-2021)
		$tokenOrLogin ='8640637d67d243a0d5ad23874f159440e5d6619d'; // Personal access tokens (05-03-2021)

		//$client->authenticate($tokenOrLogin, $password, \Github\Client::AUTH_HTTP_PASSWORD);
		try {
			$client->authenticate($tokenOrLogin, null, Github\Client::AUTH_ACCESS_TOKEN); //New code
		}catch (\RuntimeException $e)
		{
		//pre($e->getMessage());
		}

		$committer_name  = ucwords('Chandra Shekhar');
		$committer_email = 'cshekhar@altametrics.com';
		$committer 		 = array('name' => $committer_name, 'email' => $committer_email);

		$article_commit_message = 'CMS Created ' . $repo_folder;
		if($delete){
			$article_commit_message = 'CMS Deleted ' . $repo_folder;
		}
		/*$post_commit_message = $this->input->post('article_commit_message');
		if ($post_commit_message) {
			$article_commit_message = $post_commit_message;
		}*/

        //$git_commit_message = strip_tags(cleanMdHTML($article_commit_message));

        $git_commit_message = 'CMS Created ( i18n ) - '.$article_title.' - '.date('Y-m-d H:i:s');


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
		//pre($git_repository_folder);
		
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
		//pre($git_repo_folder_array);
		//die;
		//pre_exit($git_repo_folder_array);
		foreach($git_repo_folder_array as $git_repository_folder){

			$git_commit_path = rtrim($git_repository_folder, "/") . '/';
			pre($body);
			if($git_repository_folder=='_default_articles'){
				echo '_default_articles';
				$body = $legacy_body;
				pre($body);
                $body = str_replace("language: en","language: default", $body);
				//$body = str_replace("layout: article_amp_v2","layout: article_v2", $body);
				//$body = str_replace("layout: article_amp_v2","layout: article_v2", $body);
				$body = str_replace("video_language: default","video_language: en", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				//$body = str_replace("amp_page: true","amp_page: ", $body);
				echo '_default_articles after';
				pre($body);
            }
			if($git_repository_folder=='_default_articles_amp'){
				echo '_default_articles_amp';
				pre($body);
				$i18n_link = "i18n_link: ".$article['article_id'];
                $body = str_replace($i18n_link,'', $body);
                $body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
                $body = str_replace("language: en","language: default", $body);
				$body = str_replace("layout: article_v2","layout: article_amp_v2", $body);
				$body = str_replace("video_language: default","video_language: en", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				echo '_default_articles_amp after';
				pre($body);
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
			//pre($body);
			if($git_repository_folder == '_default_topiccluster'){
				//echo '_default_topiccluster';
				//pre($body);
				$body = $legacy_body;
				$body = str_replace("language: en","language: default", $body);
				//$body = str_replace("layout: topic_cluster_amp","layout: topic_cluster", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				//echo '_default_topiccluster after';
				//pre($body);
			}
			if($git_repository_folder == '_'.$article['language_id'] .'_topiccluster'){

				$permalink ="permalink: ".$article['language_id'].'/';
				$body = str_replace("permalink: ", $permalink, $body);
			}
			if($git_repository_folder == '_default_topiccluster_amp'){
				//echo '_default_topiccluster_amp';
				//pre($body);
				$i18n_link = "i18n_link: ".$article['article_id'];
                $body = str_replace($i18n_link,'', $body);
                $body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
				$body = str_replace("language: en","language: default", $body);
				$body = str_replace("layout: topic_cluster","layout: topic_cluster_amp", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				$body = str_replace("permalink: ","permalink: amp/", $body);
				//echo '_default_topiccluster_amp after';
				//pre($body);
			}
			if($git_repository_folder == '_'.$article['language_id'] .'_topiccluster_amp'){
				$i18n_link = "i18n_link: ".$article['article_id'];
                $body = str_replace($i18n_link,'', $body);
                $body = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n",  $body);
				$body = str_replace("layout: topic_cluster","layout: topic_cluster_amp", $body);
				//$body = str_replace("amp_page: ","amp_page: true", $body);
				$body = str_replace("amp_page: true","amp_page: ", $body);
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
		/*if(count($image_array)>0){
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
				//$gitOldImage = $client->api('repo')->contents()->show($git_username, $git_repository, $git_img_path, $git_repository_branch);
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
		}*/
		 
		
		return $return;
    }
	
	public function articlesTranslater($article_id = NULL) {
		//$article_id='577';
		$this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
        $this->load->model('callouts_i18_model');
        $this->load->model('backlink_i18_model');
        $this->load->model('promotion_model');
			
		//$article_id = $this->input->get('id');
        $currentLanguage = 'en';
        //$targetLanguage_array = array("ar","fr","de","it","ja","es");
		$targetLanguage_array = array("fr","de","it","ja","es");
		 //$targetLanguage_array = array("ar");
        $client = new Aws\Translate\TranslateClient([
            'region' => 'us-east-1',
            'version' => 'latest',
            'credentials' => [
                'key' => 'AKIAZGQ7R7W4WKVQ3PH2',
                'secret' => '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',
          ]
        ]);
		pre($article_id);
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
                                'article_meta_product' => $article_current_language_row['article_meta_product'],
                                'article_meta_category' => $article_current_language_row['article_meta_category'],
                                'article_meta_keyword' => $article_current_language_row['article_meta_keyword'],
                                'article_meta_abstract' => $article_current_language_row['article_meta_abstract'],
                                'article_meta_product_name' => $article_current_language_row['article_meta_product_name'],
                                'article_meta_product_desc' => $article_current_language_row['article_meta_product_desc'],
								'article_image_license' => $article_current_language_row['article_image_license'],
								'article_tags' => $article_current_language_row['article_tags'],
								'servings' => $article_current_language_row['servings'],
								'prep_time' => $article_current_language_row['prep_time'],
                                
                            );
                            echo "Article Translate Array in English";
                            pre($data_article_translate_array);
                             /***  Backlinks Current Language Data Array For Translate Start ****/
                           
                             /***  Backlinks Current Language Data Array For Translate End ****/
                            /***  Social Media Current Language Data Array For Translate Start ****/
                            $where_social_current_language   = "article_id='" . (int)  $article_id . "' AND article_language_id = '" . $currentLanguage . "'";
                            $article_social_current_language_rows =  (array) $this->promotion_model->get_by_array($where_social_current_language);

                           // echo "Social Media Section in English";
                            //pre($article_social_current_language_rows);

                            $data_article_social_translate_array =[];

                            foreach($article_social_current_language_rows  as $key_s => $social_row) {

                                $data_article_social_translate_array[$key_s] = array(
                                        'msg_headline' => $social_row['msg_headline'],
                                        'msg_intro' => $social_row['msg_intro'],
										'msg_text' => $social_row['msg_text'],
										'msg_article_headline' => $social_row['msg_article_headline'],
										'msg_url_link' => $social_row['msg_url_link'],
                                );

                            }
                            echo "Social Media Section Translate Array in English";
                            pre($data_article_social_translate_array);
							
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
									$result = $client->translateText([
										'SourceLanguageCode' => $currentLanguage,
										'TargetLanguageCode' => $targetLanguage,
										'Text' => implode(' <command /> ', $data_article_translate_array),
									]);
									pre(implode('  <command />  ', $data_article_translate_array));
									$return_article_str = $result['TranslatedText'];
									pre($return_article_str);
									$return_article_array = explode('<command />',$return_article_str);
									pre($return_article_array,'return_article_array');
                                } catch(AwsException $e) {
                                    // output error message if fails
                                    pre("Failed: ".$e->getMessage());
                                }
                                $data_article_translated = $article_current_language_row;
                                unset($data_article_translated['article_i18_id']);
                            
                                $data_article_translated['language_id'] = $targetLanguage;
                                $data_article_translated['article_title'] = $return_article_array[0];
                                $data_article_translated['article_description'] = $return_article_array[1];
								$data_article_translated['article_image_alt'] = $return_article_array[2];
								$data_article_translated['article_meta_author'] = $return_article_array[3];
								$data_article_translated['article_meta_author_desc'] = $return_article_array[4];
								$data_article_translated['article_meta_product'] = $return_article_array[5];
								$data_article_translated['article_meta_category'] = $return_article_array[6];
								$data_article_translated['article_meta_keyword'] = $return_article_array[7];
								$data_article_translated['article_meta_abstract'] = $return_article_array[8];
								$data_article_translated['article_meta_product_name'] = $return_article_array[9];
								$data_article_translated['article_meta_product_desc'] = $return_article_array[10];
								$data_article_translated['article_image_license'] = $return_article_array[11];
								$data_article_translated['article_tags'] = $return_article_array[12];
								$data_article_translated['servings'] = $return_article_array[13];
								$data_article_translated['prep_time'] = $return_article_array[14];
                                
								
								pre($data_article_translated, 'data_article_translated');
                                    if(!empty($article_target_language_row)){
                                            
                                        $this->article_i18_model->save($data_article_translated, $article_target_language_row['article_i18_id'] );
                                        //pre($this->db->last_query());

                                    }else{

                                        $this->article_i18_model->save($data_article_translated);
                                        //pre($this->db->last_query());
                                    }

                                    
                                     /***  Backlinks  Translate Start ****/
									 
                                    /***  Backlinks  Translate End ****/
                                    /***  Social Channels Translate Start ****/
									//echo "Social Channels Translate Start";
									//pre($data_article_social_translate_array);
									if(!empty($data_article_social_translate_array)){
										pre($targetLanguage);
										try {
											$return_article_social_array =[];
											foreach ($data_article_social_translate_array  as $keysocial => $valuesocialtext) {
												//pre($valuesocialtext,'valuesocialtext');
												$socialtext_array = $valuesocialtext;
												unset($socialtext_array['msg_url_link']);
											$result_s = $client->translateText([
												'SourceLanguageCode' => $currentLanguage,
												'TargetLanguageCode' => $targetLanguage,
												'Text' => implode(' <command /> ', $socialtext_array),
											]);
												$return_article_social_str = $result_s['TranslatedText'];
												$return_article_social_array[$keysocial] = explode('<command />',$return_article_social_str);
												if($valuesocialtext['msg_url_link']){
													$parts = parse_url($valuesocialtext['msg_url_link']);
													$social_url = $parts['scheme'].'://'.$parts['host'].'/'.$targetLanguage.$parts['path'];
												}else{
													$social_url ='';
												}
												$return_article_social_array[$keysocial][4] = $social_url;
											}
										} catch(AwsException $e) {
											// output error message if fails
											pre("Failed: ".$e->getMessage());
										}
										pre($return_article_social_array,'return_article_social_array');
									//pre($return_article_social_array);
									$where_social_target_language   = "article_id='" . (int)  $article_id . "' AND article_language_id = '" . $targetLanguage . "'";
									$article_social_target_language_row =  (array) $this->promotion_model->get_by_array($where_social_target_language);

									$data_article_social_translated = $article_social_current_language_rows;

									$data_article_social_update_translated = $article_social_target_language_row;
									//pre($data_article_social_translated,'data_article_social_translated');
									//pre($data_article_social_update_translated,'data_article_social_update_translated');
									foreach($return_article_social_array  as $key_s => $social) {
										foreach($social  as $key_s_t => $social_s_t) {

											unset($data_article_social_translated[$key_s]['msg_id']);
											$data_article_social_translated[$key_s]['article_language_id'] = $targetLanguage;
											if($key_s_t == 0){
												$data_article_social_translated[$key_s]['msg_headline'] = $social_s_t;
											}
											if($key_s_t == 1){
												$data_article_social_translated[$key_s]['msg_intro'] = $social_s_t;
											}
											if($key_s_t == 2){
												$data_article_social_translated[$key_s]['msg_text'] = $social_s_t;
											}
											if($key_s_t == 3){
												$data_article_social_translated[$key_s]['msg_article_headline'] = $social_s_t;
											}
											if($key_s_t == 4){
												$data_article_social_translated[$key_s]['msg_url_link'] = $social_s_t;
											}
											
										}
									}
									foreach($return_article_social_array  as $key_u_s => $u_social) {
										foreach($u_social  as $key_u_s_t => $u_t_social) {
											if($key_u_s_t == 0){
												$data_article_social_update_translated[$key_u_s]['msg_headline'] = $u_t_social;
											}
											if($key_u_s_t == 1){
												$data_article_social_update_translated[$key_u_s]['msg_intro'] = $u_t_social;
											}
											if($key_u_s_t == 2){
												$data_article_social_update_translated[$key_u_s]['msg_text'] = $u_t_social;
											}
											if($key_u_s_t == 3){
												$data_article_social_update_translated[$key_u_s]['msg_article_headline'] = $u_t_social;
											}
											if($key_u_s_t == 4){
												$data_article_social_update_translated[$key_u_s]['msg_url_link'] = $u_t_social;
											}
										}
									}
									//pre($data_article_social_translated,'data_article_social_translated');
									//pre($data_article_social_update_translated,'data_article_social_update_translated');
									
									 //pre($article_social_target_language_row,'article_social_target_language_row');
									//pre($data_article_social_translated, 'data_article_social_translated');
										if(!empty($article_social_target_language_row)){

											foreach($data_article_social_update_translated  as $key_u_ts => $t_u_social) {
													//pre($t_u_social,'update social');
													$msg_id = $t_u_social['msg_id'];
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
												//pre($t_i_social,'insert social');
												$socialmedia = $t_i_social;
												//pre($socialmedia,'insert social final array');
												$this->promotion_model->save($socialmedia);
												//pre($this->db->last_query());
											}
										}
                               }
                            /***  Social Channels Translate End ****/

                        }
                        

                    }
            
                }
				$this->save_article_report($article_id);
				$this->paragraphsTranslate($article_id);
				
				return true;
        }
			return false;
	}
	
	public function paragraphsTranslate($article_id = NULL) {
		//$article_id='577';
		echo "Paragraphs Translate Strat For  Article Id: ". $article_id;
		$this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
		$this->load->model('callouts_i18_model');
		$this->load->model('ingredients_i18_model');
        $this->load->model('steps_i18_model');
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
            //$targetLanguage_array = array("ar","fr","de","it","ja","es");
			$targetLanguage_array = array("fr","de","it","ja","es");
			//$targetLanguage_array = array("ar");
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
								$this->db->delete('article_section_social_media_callouts_translate_i18', $where_c_d);
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

							$where_article_social_media_callouts_current_language_i18   = "section_id = '" . (int)  $m_p_value['section_id'] . "' AND language_id = '" . $m_p_value['language_id'] . "'";
                            $article_social_media_callouts_current_language_i18_row =  (array) $this->social_media_callouts_i18_model->get_by_array($where_article_social_media_callouts_current_language_i18);
                            //echo "<br>callout in en<br>";
							//pre($article_callouts_current_language_i18_row);
							 //echo "<br>social media callout in en<br>";
							//pre($article_social_media_callouts_current_language_i18_row);
							
							$where_article_ingredients_current_language_i18   = "section_id = '" . (int)  $m_p_value['section_id'] . "' AND language_id = '" . $m_p_value['language_id'] . "'";
							$article_ingredients_current_language_i18_row =  (array) $this->ingredients_i18_model->get_by_array($where_article_ingredients_current_language_i18);
							pre($article_ingredients_current_language_i18_row,'ingredients');
							
							$where_article_steps_current_language_i18   = "section_id = '" . (int)  $m_p_value['section_id'] . "' AND language_id = '" . $m_p_value['language_id'] . "'";
                            $article_steps_current_language_i18_row =  (array) $this->steps_i18_model->get_by_array($where_article_steps_current_language_i18);
							pre($article_steps_current_language_i18_row,'steps');

                            //echo "Section data from chield section--".$m_p_value['section_id'];
                            //pre($article_c_paragraph_current_language_i18_row);
                            if(!empty($article_c_paragraph_current_language_i18_row)){
                                $data_article_paragraph_translate_array= array(
									'section_title' => $article_c_paragraph_current_language_i18_row['section_title'],
									'section_text' => $article_c_paragraph_current_language_i18_row['section_text'],
									'section_image_alt' => $article_c_paragraph_current_language_i18_row['section_image_alt'],
                                    'section_image_license' => $article_c_paragraph_current_language_i18_row['section_image_license']
									
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
                                   // pre($data_article_callouts_translate_array);
                                    try {
                                        $return_article_callouts_array=[];
                                        foreach ($data_article_callouts_translate_array  as $c_key => $c_value) {
                                            //echo "c_value";
											//pre($c_value);
											$c_result = $client->translateText([
												'SourceLanguageCode' => $currentLanguage,
												'TargetLanguageCode' => $targetLanguage,
												'Text' => implode(' <command /> ', $c_value),
											]);
											//pre(implode(' <command /> ', $c_value));
											$return_article_callouts_str = $c_result['TranslatedText'];
											//pre($return_article_callouts_str);
											$return_article_callouts_array[$c_key] = explode('<command />',$return_article_callouts_str);
											//pre($return_article_callouts_array,'return_article_callouts_array');
                                        }
                                        //echo "Callouts Section data return array";
                                        //pre($return_article_callouts_array);
                                    
                                
                                    } catch(AwsException $e) {
                                        // output error message if fails
                                        //pre("Failed: ".$e->getMessage());
                                    }
								}

								if(!empty($article_social_media_callouts_current_language_i18_row) && count($article_social_media_callouts_current_language_i18_row) > 0){
                                    $data_article_sm_callouts_translate_array=[];
                                    foreach($article_social_media_callouts_current_language_i18_row  as $smc_key => $smcallouts) {
                                         /**
                                         *  create array for Callouts translate field
                                        */
                                        $data_article_sm_callouts_translate_array[$smc_key] = array(
        
                                            'social_media_callout_title' => $smcallouts['social_media_callout_title'],
                                            
                                        );
                                    }
                                   // pre($data_article_sm_callouts_translate_array);
                                    try {
                                        $return_article_sm_callouts_array=[];
                                        foreach ($data_article_sm_callouts_translate_array  as $smc_key => $smc_value) {
                                            //echo "smc_value";
											//pre($smc_value);
											$c_result = $client->translateText([
												'SourceLanguageCode' => $currentLanguage,
												'TargetLanguageCode' => $targetLanguage,
												'Text' => implode(' <command /> ', $smc_value),
											]);
											//pre(implode(' <command /> ', $c_value));
											$return_article_sm_callouts_str = $c_result['TranslatedText'];
											//pre($return_article_callouts_str);
											$return_article_sm_callouts_array[$c_key] = explode('<command />',$return_article_sm_callouts_str);
											//pre($return_article_sm_callouts_array,'return_article_sm_callouts_array');
                                        }
                                        //echo "Social Media Callouts Section data return array";
                                        //pre($return_article_sm_callouts_array);
                                    
                                
                                    } catch(AwsException $e) {
                                        // output error message if fails
                                        //pre("Failed: ".$e->getMessage());
                                    }
								}
				    if(!empty($article_ingredients_current_language_i18_row) && count($article_ingredients_current_language_i18_row) > 0){
	                                    $data_article_ingredients_translate_array=[];
	                                    foreach($article_ingredients_current_language_i18_row  as $in_key => $ingredients) {
	                                         /**
	                                         *  create array for Callouts translate field
	                                        */
	                                        $data_article_ingredients_translate_array[$in_key] = array(
        
	                                            'ingredient_name' => $ingredients['ingredient_name'],
	                                            'ingredient_qty' => $ingredients['ingredient_qty'],
                                            
	                                        );
	                                    }
	                                   // pre($data_article_callouts_translate_array);
	                                    try {
	                                        $return_article_ingredients_array=[];
	                                        foreach ($data_article_ingredients_translate_array  as $i_key => $i_value) {
	                                            //echo "i_value";
												//pre($i_value);
												$i_result = $client->translateText([
													'SourceLanguageCode' => $currentLanguage,
													'TargetLanguageCode' => $targetLanguage,
												'Text' => implode(' <command /> ', $i_value),
												]);
											//pre(implode(' <command /> ', $i_value));
												$return_article_ingredients_str = $i_result['TranslatedText'];
												//pre($return_article_ingredients_str);
											$return_article_ingredients_array[$i_key] = explode('<command />',$return_article_ingredients_str);
												//pre($return_article_ingredients_array,'return_article_ingredients_array');
	                                        }
	                                        echo "Ingredients Section data return array";
	                                        pre($return_article_ingredients_array);
                                    
                                
	                                    } catch(AwsException $e) {
	                                        // output error message if fails
	                                        //pre("Failed: ".$e->getMessage());
	                                    }
				    }
				    if(!empty($article_steps_current_language_i18_row) && count($article_steps_current_language_i18_row) > 0){
	                                    $data_article_steps_translate_array=[];
	                                    foreach($article_steps_current_language_i18_row  as $s_key => $steps) {
	                                         /**
	                                         *  create array for steps translate field
	                                        */
	                                        $data_article_steps_translate_array[$s_key] = array(
        
	                                            'step_description' => $steps['step_description'],
                                            
	                                        );
	                                    }
	                                   // pre($data_article_steps_translate_array);
	                                    try {
	                                        $return_article_steps_array=[];
	                                        foreach ($data_article_steps_translate_array  as $st_key => $st_value) {
	                                            //echo "st_value";
												//pre($st_value);
												$s_result = $client->translateText([
													'SourceLanguageCode' => $currentLanguage,
													'TargetLanguageCode' => $targetLanguage,
												'Text' => implode(' <command /> ', $st_value),
												]);
												//pre(implode(' <command /> ', $st_value));
												$return_article_steps_str = $s_result['TranslatedText'];
												//pre($return_article_steps_str);
											$return_article_steps_array[$st_key] = explode('<command />',$return_article_steps_str);
												//pre($return_article_steps_array,'return_article_steps_array');
	                                        }
	                                        echo "steps Section data return array";
	                                        pre($return_article_steps_array);
                                    
                                
	                                    } catch(AwsException $e) {
	                                        // output error message if fails
	                                        //pre("Failed: ".$e->getMessage());
	                                    }
				    }
								pre($targetLanguage);
								//pre($data_article_paragraph_translate_array);
                                    try {
									$p_result = $client->translateText([
										'SourceLanguageCode' => $currentLanguage,
										'TargetLanguageCode' => $targetLanguage,
										'Text' => implode(' <command /> ', $data_article_paragraph_translate_array),
									]);
									pre($data_article_paragraph_translate_array);
									pre(implode(' <command /> ', $data_article_paragraph_translate_array));
									$return_article_paragraph_str = $p_result['TranslatedText'];
									pre($return_article_paragraph_str);
									$return_article_paragraph_array = explode('<command />',$return_article_paragraph_str);
									pre($return_article_paragraph_array,'Section data return array');
                                        $data_article_paragraph_insert_array = $article_c_paragraph_current_language_i18_row;
                                        unset($data_article_paragraph_insert_array['section_i18_id']);
                                        unset($data_article_paragraph_insert_array['section_id']);
                                      // pre($data_article_paragraph_insert_array);
                                            $data_paragraph['article_id'] = $article_id;
											$data_paragraph['language_id'] = $targetLanguage;
											$data_article_paragraph_insert_array['language_id']= $targetLanguage;
											if(count($return_article_paragraph_array)>4){
												$data_article_paragraph_insert_array['section_title']= strip_tags($return_article_paragraph_array[0]);
												$data_article_paragraph_insert_array['section_text']= $return_article_paragraph_array[1];
												$data_article_paragraph_insert_array['section_image_alt']= $return_article_paragraph_array[3];
												
												$data_article_paragraph_insert_array['section_image_license']= $return_article_paragraph_array[4];
												
											}else{
												$data_article_paragraph_insert_array['section_title']= strip_tags($return_article_paragraph_array[0]);
												$data_article_paragraph_insert_array['section_text']= $return_article_paragraph_array[1];
												$data_article_paragraph_insert_array['section_image_alt']= $return_article_paragraph_array[2];
												
												$data_article_paragraph_insert_array['section_image_license']= $return_article_paragraph_array[3];
											}
											
											//pre($data_article_paragraph_insert_array,'Section data insert array');
                                        $section_id = $this->paragraph_model->save($data_paragraph);
                                        $data_article_paragraph_insert_array['section_id'] = $section_id;
                                        pre($data_article_paragraph_insert_array, 'Final article paragraph insert array');
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
													unset($data_article_callout_insert_array[$t_c_i_keytext]['callout_i18_id']);
													unset($data_article_callout_insert_array[$t_c_i_keytext]['section_id']);
													$data_article_callout_insert_array[$t_c_i_keytext]['section_id'] = $section_id;
													$data_article_callout_insert_array[$t_c_i_keytext]['language_id']= $targetLanguage;
													$data_article_callout_insert_array[$t_c_i_keytext]['callout_title'] = $t_c_i_valuetext[0];
													$data_article_callout_insert_array[$t_c_i_keytext]['callout_text'] = $t_c_i_valuetext[1];
                                                } 
                                                //echo "insert callout array last";
                                                //pre( $data_article_callout_insert_array);
                                                foreach ($data_article_callout_insert_array  as $calloutkeytext =>  $callout) {
                                                    //echo "final insert callout array last";
                                                    //pre($calloutkeytext);
                                                    pre($callout ,'Final insert callout array');
                                                    $this->callouts_i18_model->save($callout);
                                                    //pre($this->db->last_query());
                                                    
                                                }
                                            }

					 					}


										 if(!empty($article_social_media_callouts_current_language_i18_row) && count($article_social_media_callouts_current_language_i18_row) > 0){

                                            $data_article_sm_callout_insert_array = $article_social_media_callouts_current_language_i18_row;                                       
                                            //pre($data_article_callout_insert_array);
                                            if(!empty($return_article_sm_callouts_array)){
                                                foreach ($return_article_sm_callouts_array  as $t_smc_i_keytext => $t_smc_i_valuetext) {
                                                    echo "insert social media callout";
													pre($t_smc_i_valuetext);
													unset($data_article_sm_callout_insert_array[$t_smc_i_keytext]['social_media_callout_i18_id']);
													unset($data_article_sm_callout_insert_array[$t_smc_i_keytext]['section_id']);
													$data_article_sm_callout_insert_array[$t_smc_i_keytext]['section_id'] = $section_id;
													$data_article_sm_callout_insert_array[$t_smc_i_keytext]['language_id']= $targetLanguage;
													$data_article_sm_callout_insert_array[$t_smc_i_keytext]['social_media_callout_title'] = $t_smc_i_valuetext[0];
													
                                                } 
                                                //echo "insert callout array last";
                                                //pre( $data_article_callout_insert_array);
                                                foreach ($data_article_sm_callout_insert_array  as $smcalloutkeytext =>  $smcallout) {
                                                    echo "final insert social media callout array last";
                                                    pre($smcalloutkeytext);
                                                    pre($smcallout ,'Final insert social media callout array');
                                                    $this->social_media_callouts_i18_model->save($smcallout);
                                                    pre($this->db->last_query());
                                                    
                                                }
                                            }

					 					}
										
					if(!empty($article_ingredients_current_language_i18_row) && count($article_ingredients_current_language_i18_row) > 0){

                                            $data_article_ingredients_insert_array = $article_ingredients_current_language_i18_row;                                       
                                            //pre($data_article_ingredients_insert_array);
                                            if(!empty($return_article_ingredients_array)){
                                                foreach ($return_article_ingredients_array  as $ti_c_i_keytext => $ti_c_i_valuetext) {
                                                    //echo "insert ingredientt";
													//pre($ti_c_i_keytext);
													unset($data_article_ingredients_insert_array[$ti_c_i_keytext]['ingredient_i18_id']);
													unset($data_article_ingredients_insert_array[$ti_c_i_keytext]['section_id']);
													$data_article_ingredients_insert_array[$ti_c_i_keytext]['section_id'] = $section_id;
													$data_article_ingredients_insert_array[$ti_c_i_keytext]['language_id']= $targetLanguage;
													$data_article_ingredients_insert_array[$ti_c_i_keytext]['ingredient_name'] = $ti_c_i_valuetext[0];
													$data_article_ingredients_insert_array[$ti_c_i_keytext]['ingredient_qty'] = $ti_c_i_valuetext[1];
                                                } 
                                                //echo "insert ingredient array last";
                                                //pre( $data_article_ingredients_insert_array);
                                                foreach ($data_article_ingredients_insert_array  as $ingredientkeytext =>  $ingredient) {
                                                    //echo "final insert ingredient array last";
                                                    //pre($ingredientkeytext);
                                                    pre($ingredient ,'Final insert ingredient array');
                                                    $this->ingredients_i18_model->save($ingredient);
                                                    //pre($this->db->last_query());
                                                    
                                                }
                                            }

										}
										
										if(!empty($article_steps_current_language_i18_row) && count($article_steps_current_language_i18_row) > 0){

                                            $data_article_steps_insert_array = $article_steps_current_language_i18_row;                                       
                                            //pre($data_article_steps_insert_array);
                                            if(!empty($return_article_steps_array)){
                                                foreach ($return_article_steps_array  as $ts_c_i_keytext => $ts_c_i_valuetext) {
                                                    //echo "insert step";
													//pre($ts_c_i_valuetext);
													unset($data_article_steps_insert_array[$ts_c_i_keytext]['step_i18_id']);
													unset($data_article_steps_insert_array[$ts_c_i_keytext]['section_id']);
													$data_article_steps_insert_array[$ts_c_i_keytext]['section_id'] = $section_id;
													$data_article_steps_insert_array[$ts_c_i_keytext]['language_id']= $targetLanguage;
													$data_article_steps_insert_array[$ts_c_i_keytext]['step_description'] = $ts_c_i_valuetext[0];
                                                } 
                                                //echo "insert step array last";
                                                //pre( $data_article_steps_insert_array);
                                                foreach ($data_article_steps_insert_array  as $stepkeytext =>  $step) {
                                                    //echo "final insert step array last";
                                                    //pre($stepkeytext);
                                                    pre($step ,'Final insert step array');
                                                    $this->steps_i18_model->save($step);
                                                    //pre($this->db->last_query());
                                                    
                                                }
                                            }

                                        }
                                        
                                    
                                
                                    } catch(AwsException $e) {
                                        // output error message if fails
										$error = $e->getMessage();
										pre("Failed: ".$error);
										$article_title = $this->get_article_title($article_id);
										$this->verify_i18n($article_id, $article_title, $error);
                                    }
                            }
        

                        }
                }
				
			}
			$this->save_article_report_i18n($article_id);
			return true;

        }
		return false;
    }

	public function verify_i18n($article_id, $article_title, $error = null ){
        /*** Send Email ****/
        //$article_id=1;
        //$article_title ='Article i18n';
		//pre($article_id);
		
		$this->load->library('email');
		//$from_name = $this->config->item('emailconfig_from_name');
		$from_name = 'AWS Translate(i18n) Failed';
		$from_email 	  = $this->config->item('emailconfig_from_email');
		$to_name = 'Chandra Shekhar';
		$to_email = 'kavastyhi@altametrics.com';
		$message_subject = 'Article i18n Translate Failed';

		$htmlContent  = '<p>Hello ' . $to_name . '!</p>';

        $htmlContent .= "<p>Article Id: ".$article_id. "<br>";
        $htmlContent .= "Article Title: ".$article_title ."</p>";
		if($error){
			$htmlContent .= "AWS ERROR: ". $error ."</p>";
		}

		$htmlContent .= '<p>&nbsp;</p>';
		$htmlContent .= '<p>Thank you,<br>';
		$htmlContent .= 'The {portal_name} Team</p>';

		$emailer_data['from_name']		 = $from_name;
		$emailer_data['from_email']		 = $from_email;
		$emailer_data['to_name']		 = $to_name;
		$emailer_data['to_email'] 		 = $to_email;
		$emailer_data['message_subject'] = $message_subject;
		$emailer_data['message_body'] 	 = $htmlContent;

        $message = $this->load->view('component/i18nemail', $emailer_data, TRUE);
        pre($message);
		$return['emailsend'] = 'true';
		$this->send_email($emailer_data, $message);
		/*** Send Email End ****/

	}
	
	public function export_csv(){
		$site_id='hubworks.com';
		$this->db->select("*");
		$this->db->from('articles_translate_i18');
		$this->db->where('article_status', 'published');
        //$this->db->where('article_i18_status', true);
		//$this->db->where('article_i18_status', false);
		$this->db->where('article_site_id', 'hubworks.com');
		$this->db->where('language_id', 'en');
		$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$result_array = $this->db->get()->result_array();
		
		$file_name = $site_id.'_'.date('Ymd').'.csv';
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$file_name"); 
			header("Content-Type: application/csv;");

			$file = fopen('php://output', 'w'); 
			$header = array("ID","Site","Article Title","Article Type"); 
			fputcsv($file, $header);
		
		foreach ($result_array  as $result) {
			
			    $row_array['article_id'] = $result['article_id'];
				$row_array['article_site_id'] = $result['article_site_id'];
				$row_array['article_title'] = $result['article_title'];
				$row_array['article_type'] = '';
				//$row_array['article_type'] = $result['article_type'];
				fputcsv($file, $row_array); 
		
		}

		fclose($file); 
		exit;
				
    }
	
	public function get_section_info(){
		$article_id = $this->input->get('id');
		$lang = $this->input->get('lang');
		
		$this->db->select("*");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $lang);
		$result_array = $this->db->get('article_section')->result_array();
		pre($this->db->last_query());
		//pre($result_array);
		//pre($result_array[0]['section_id']);
		foreach ($result_array  as $result) {
		$section_id = $result['section_id'];;	
		
		$this->db->select("*");
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $lang);
		$result_array = $this->db->get('article_section_translate_i18')->result_array();
		pre($this->db->last_query());
		pre($result_array);
		}
		

	}
	
	public function update_user_name(){

		$this->db->select("*");
		$result_array = $this->db->get('articles')->result_array();
		pre($this->db->last_query());
		pre($result_array);
		
		foreach ($result_array  as $result) {
		$article_id	 = $result['article_id'];	
		$user_id= $result['user_id'];
		$this->db->select("*");
		$this->db->where('user_id', (int) $user_id);
		
		$result = $this->db->get('article_user')->row();
		pre($this->db->last_query());
		$u_name= $result->user_fname ." ".$result->user_lname;
		pre($u_name);
		/*$this->db->set('article_meta_author', $u_name);
			
			$this->db->where('article_id', $article_id);
			$this->db->update('articles_translate_i18');
			pre($this->db->last_query());
		$this->db->set('article_author', $u_name);
			//$this->db->where('language_id', $lang);
			$this->db->where('article_author','');
			$this->db->where('article_id', $article_id);
			$this->db->update('articles');
			pre($this->db->last_query());*/
			
		}
		

	}

	public function save_article_report($article_id){
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
		$this->load->model('translatereport_model');


		$where = "article_status = 'published'";
		$article_list = $this->article_model->getArticlesI18($article_id, 'en', $where, true);
		$article = $article_list[$article_id];
		$total_chars_array = array();
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
				$total_chars_array[] = $paragraph['social_media_callout_title'];

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
				$string_Temp =  $article_id .'=='. $article['article_title'] . '==' . strlen($content_string) .'<br>';
               
				//pre($string_Temp . $content_string);
		//pre($total_chars_array);
		$today = date('Y-m-d H:i:s');
		$report_data_save = array(
			'article_id' => $article_id,
			'article_title' => $article['article_title'],
			'article_publish_website' => $article['article_site_id'],
			'article_publish_url' => $article['article_site_id'],
			'article_translated_lang' => 'en',
			'article_char_count' => strlen($content_string),
			'article_translated_date' => $today,
		);
        $id = null;
		$this->translatereport_model->save($report_data_save, null);


	}

	public function save_article_report_i18n($article_id){
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
		$this->load->model('translatereport_model');

		$this->db->select("*");
		$this->db->from('articles_translated_report');
		$this->db->where('article_i18_status', false);
		$this->db->where('article_id', $article_id);
		$this->db->where('article_translated_lang', 'en');
		$this->db->order_by('date_added', 'ASC'); //ASC, DESC
		$this->db->limit(1);
		$results = $this->db->get()->row();
		//pre($this->db->last_query());
		//pre($results);
		$article_id = (int) $results->article_id;
		$article_title = $results->article_title;
		$article_publish_website = $results->article_publish_website;
		$article_publish_url = $results->article_publish_url;
		//$language_array = array("ar","fr","de","it","ja","es");
		$language_array = array("fr","de","it","ja","es");
		foreach ($language_array  as $key => $value) {
		$lang_id = $value;
		$where = "article_status = 'published'";
		$article_list = $this->article_model->getArticlesI18($article_id, $lang_id, $where, true);
		//pre($article_list);
		$article = $article_list[$article_id];
		$total_chars_array = array();
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
				$total_chars_array[] = $paragraph['social_media_callout_title'];

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
		$socialmedia_list = $this->promotion_model->get_socialmedia_list($article_id, $lang_id);
				foreach ($socialmedia_list as $socialmedis) {
					$social_row = $socialmedis[0];
					$total_chars_array[] = $social_row['msg_headline'];
					$total_chars_array[] = $social_row['msg_intro'];
					$total_chars_array[] = $social_row['msg_text'];
					$total_chars_array[] = $social_row['msg_article_headline'];
				}

				$content_string = implode(' ', array_filter($total_chars_array));
				$string_Temp =  $article_id .'=='. $article['article_title'] . '==' . strlen($content_string) .'<br>';
               
				//pre($string_Temp . $content_string);
		//pre($total_chars_array);
		$today = date('Y-m-d H:i:s');
		$report_data_save = array(
			'article_id' => $article_id,
			'article_title' => $article_title,
			'article_publish_website' => $article_publish_website,
			'article_publish_url' => $article_publish_url,
			'article_translated_lang' => $lang_id,
			'article_char_count' => strlen($content_string),
			'article_translated_date' => $today,
			'article_i18_status' => true,
		);
		$this->translatereport_model->save($report_data_save, null);
		}

		$this->db->set('article_i18_status', true);
		$this->db->where('article_translated_lang', 'en');
		$this->db->where('article_id', $article_id);
		$this->db->update('articles_translated_report');
		pre($this->db->last_query());
	}
	public function articles_translated_report(){
		$this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
		$this->load->model('translatereport_model');

		$this->db->select("*");
		$this->db->from('articles_translated_report');
		$this->db->order_by('date_added', 'ASC'); //ASC, DES
		$result_array = $this->db->get()->result_array();
		pre($this->db->last_query());
		pre($result_array);
		
	}
	public function articles_translated_report_email(){
		$week = get_week_dates();
		$week_start = date( "Y-m-d H:i:s", strtotime($week['start']) );
		$week_end = date( "Y-m-d H:i:s", strtotime($week['end']." 23:59:59") );
		$this->db->select("*");
		$this->db->from('articles_translated_report');
		$this->db->where('article_i18_status', true);
		$this->db->where('article_translated_lang!=', 'en');
		$this->db->where('article_translated_date >=', $week_start);
		$this->db->where('article_translated_date <=', $week_end); 
		//$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$result_array = $this->db->get()->result_array();
		
		$file_name = 'articles_translated_report_'.date('Ymd').'.csv';
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$file_name"); 
			header("Content-Type: application/csv;");

			$file = fopen('php://output', 'w'); 
			$header = array("Article ID","Article Title","Website","Language","Total Character Count" ,"Article Translate Date"); 
			fputcsv($file, $header);
		
		foreach ($result_array  as $result) {
			
				$row_array['article_id'] = $result['article_id'];
				$row_array['article_title'] = $result['article_title'];
				$row_array['article_publish_website'] = $result['article_publish_website'];
				$row_array['article_translated_lang'] = $result['article_translated_lang'];
				$row_array['article_char_count'] = $result['article_char_count'];
				$row_array['article_translated_date'] = $result['article_translated_date'];
				fputcsv($file, $row_array); 
		
		}

		fclose($file); 
		exit;
		/*$file_name = 'articles_translated_report_'.date('Ymd').'.csv';
		if (!$file = fopen('php://temp', 'w+')) return FALSE;
		fputcsv($file, array("Article ID","Article Title","Website","Language","Total Character Count" ,"Article Translate Date"));
		foreach ($result_array  as $result) {
			
			$row_array['article_id'] = $result['article_id'];
			$row_array['article_title'] = $result['article_title'];
			$row_array['article_publish_website'] = $result['article_publish_website'];
			$row_array['article_translated_lang'] = $result['article_translated_lang'];
			$row_array['article_char_count'] = $result['article_char_count'];
			$row_array['article_translated_date'] = $result['article_translated_date'];
			fputcsv($file, $row_array); 
	
	}

	rewind($file);

    // Return the data
		$data_string = stream_get_contents($file);
		$attachment = chunk_split(base64_encode($data_string));
		$this->load->library('email');
		//$from_name = $this->config->item('emailconfig_from_name');
		$from_name = 'AWS Translate(i18n) Report';
		$from_email 	  = $this->config->item('emailconfig_from_email');
		$to_name = 'Chandra Shekhar';
		$to_email = 'kavastyhi@altametrics.com';
		$message_subject = 'Article i18n Translate Report';

		$htmlContent  = '<p>Hello ' . $to_name . '!</p>';

		//$htmlContent .= "<p>Article Id: ".$article_id. "<br>";
		
		$htmlContent .= '<p>&nbsp;</p>';
		$htmlContent .= '<p>Thank you,<br>';
		$htmlContent .= 'The {portal_name} Team</p>';

		$emailer_data['from_name']		 = $from_name;
		$emailer_data['from_email']		 = $from_email;
		$emailer_data['to_name']		 = $to_name;
		$emailer_data['to_email'] 		 = $to_email;
		$emailer_data['message_subject'] = $message_subject;
		$emailer_data['message_body'] 	 = $htmlContent;

        $message = $this->load->view('component/i18nemail', $emailer_data, TRUE);
        //pre($message);
		$return['emailsend'] = 'true';
		//$attach= realpath(APPPATH . '../report/articles_translated_report_20200902.csv');
		$attach = $attachment;
		$this->send_email($emailer_data, $message, $attach);*/
		/*** Send Email End ****/
				
    }

	public function update_user_info(){
		$user_id = 125;

		$this->db->select("*");
		$this->db->where('user_id', (int) $user_id);
		$result_array = $this->db->get('articles')->result_array();
		//pre($this->db->last_query());
		//pre($result_array);
		
		foreach ($result_array  as $result) {
		$article_id	 = $result['article_id'];	
		$user_id= $result['user_id'];
		$this->db->select("*");
		$this->db->where('user_id', (int) $user_id);
		
		$result = $this->db->get('article_user')->row();
		//pre($result);
		//pre($this->db->last_query());
		$u_name= $result->user_fname ." ".$result->user_lname;
		$user_bo_info = $result->user_bo_info;
		$meta_author_url = $result->meta_author_url;
		$meta_author_facebook_url = $result->meta_author_facebook_url;
		$meta_author_twitter_url = $result->meta_author_twitter_url;
		//pre($u_name);
		$data = array(
			'article_meta_author' => $u_name,
			'article_meta_author_desc' => $user_bo_info,
			'article_meta_author_url' => $meta_author_url,
			'article_meta_author_facebook' => $meta_author_facebook_url,
			'article_meta_author_twitter' => $meta_author_twitter_url
		);
		//pre($data);
			$this->db->where('article_id', $article_id);
			$this->db->where('language_id', 'en');
			$this->db->update('articles_translate_i18', $data);
			pre($this->db->last_query());
			echo "===================================================================";
		/*$this->db->set('article_meta_author', $u_name);
			
			$this->db->where('article_id', $article_id);
			$this->db->update('articles_translate_i18');
			pre($this->db->last_query());
		$this->db->set('article_author', $u_name);
			//$this->db->where('language_id', $lang);
			$this->db->where('article_author','');
			$this->db->where('article_id', $article_id);
			$this->db->update('articles');
			pre($this->db->last_query());*/
			
		}
		

	}

	public function daily_translated_report_email()
	{
		$st_date = array_key_exists('st',$_GET) ? date('Y-m-d',strtotime($_GET['st'])) : date('Y-m-d',strtotime('-1 days'));
		$week_start = date( "Y-m-d H:i:s", strtotime($st_date." 00:00:00"));
		$ed_date = array_key_exists('et',$_GET) ? date('Y-m-d',strtotime($_GET['et'])) : date('Y-m-d',strtotime('-1 days'));
		$week_end = date("Y-m-d H:i:s", strtotime($ed_date." 23:59:59"));
		//pre($week_start);
		//pre($week_end);
		$this->db->select("*");
		$this->db->from('articles_translated_report');
		$this->db->where('article_i18_status', true);
		$this->db->where('article_translated_lang!=', 'en');
		$this->db->where('article_translated_date >=', $week_start);
		$this->db->where('article_translated_date <=', $week_end); 
		//$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$result_array = $this->db->get()->result_array();
		$total_char = 0;
		$lang_ar = array();
		foreach($result_array as $ar)
		{
			$total_char += $ar['article_char_count'];
			$lang_ar[] = $ar['article_translated_lang'];
		}
		$lang_ar = array_unique($lang_ar);
		// pre($lang_ar);
		// pre($result_array);
		$this->load->library('email');
		//$from_name = $this->config->item('emailconfig_from_name');
		$from_name = 'AWS Translate(i18n) Report';
		$from_email 	  = $this->config->item('emailconfig_from_email');
		$to_name = 'Chandra Shekhar';
		$to_email = 'vshiv@altametrics.com, websiteprojects@altametrics.com, nkumar@altametrics.com';
		//$to_email = 'singhg@altametrics.com, cshekhar@altametrics.com';
		$message_subject = 'Amazon translated characters count report';
		$htmlContent  = '<p>Hello Team, </p>';
		//$htmlContent .= "<p>Article Id: ".$article_id. "<br>";
		$htmlContent .= '<p>Total characters converted : '.$total_char.' from '.date('m-d-Y H:i:s',strtotime($week_start)).' to '.date('m-d-Y H:i:s',strtotime($week_end)).'. 
		<br>Converted Language : '.implode(',',$lang_ar).'</p>';
		$emailer_data['from_name']		 = $from_name;
		$emailer_data['from_email']		 = $from_email;
		$emailer_data['to_name']		 = $to_name;
		$emailer_data['to_email'] 		 = $to_email;
		$emailer_data['message_subject'] = $message_subject;
		$emailer_data['message_body'] 	 = $htmlContent;
		$message = $this->load->view('component/i18nemail', $emailer_data, TRUE);
        //pre($message);
		$return['emailsend'] = 'true';
		$this->send_email($emailer_data, $message);
		/*** Send Email End ****/
	}
	
	
	public function alta(){
		
		$this->db->select("*");
		$this->db->where('article_site_id', 'altametrics.com');
		$this->db->where('language_id', 'en');
		$this->db->where('article_status', 'deleted');
		//$this->db->where('article_meta_keyword', 'business intelligence');
		$result_array = $this->db->get('articles_translate_i18')->result_array();
		//pre($this->db->last_query());
		pre($result_array);
		

	}

}
