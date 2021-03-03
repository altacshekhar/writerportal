<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlemaster extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('articlemaster_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->model('articlecategory_model');
        
    }

    public function saveMasterArticle($id = null, $lang = 'en', $json_output=true)
    {
        $return['is_redirect'] = 'no';
        if ($this->user_model->loggedin()) {
                //pre($this->input->post());
                $data = []; 
                $data_i18  = []; 
                //$now = date('Y-m-d H:i:s');
                //$data['date_added'] = $now;
                //$data['date_modified'] = $now;
                $search = array("http://", "https://", "www.");
				$website = rtrim(str_replace($search, "", site_url()),"/");
				$data['article_website'] = $website;
                $data['site_id'] = $this->input->post('website'); 
                $data['user_id'] = $this->session->userdata('id');
                $data['article_author'] = $this->session->userdata('full_name');
                if($this->input->post('keyword')){
                    $data_i18['keywords'] = trim(ucwords($this->input->post('keyword')));
                    $data_i18['article_meta_keyword'] = trim(ucwords($this->input->post('keyword')));
                }
                
                $data_i18['article_site_id'] = $this->input->post('website');  
                $data_i18['language_id'] = $lang;  
                $data_i18['article_status'] = 'draft';
                $data_i18['article_title'] = '';
                $data_i18['article_description'] = '';
                if($this->input->post('siteStructure') == 'cluster'){
                   
                    $data['article_type'] = $this->input->post('articleClusterType');
                    $data_i18['article_site_structure_type'] = $this->input->post('siteStructure');

                    if($this->input->post('articleClusterType') == 'pillar'){

                        $data_i18['article_permalink'] = $this->input->post('permalink');

                    }elseif($this->input->post('articleClusterType') == 'supporting'){
                        if($this->input->post('article_master_pillar')){
                            $article_master_pillar = explode("/",$this->input->post('article_master_pillar'));
                           
                            $data_i18['article_permalink'] = $article_master_pillar[0].'/'.$this->input->post('keyword_permalink');
                        }
                        

                    }

                }elseif($this->input->post('siteStructure') == 'blog'){
                    
                    $data['article_type'] = $this->input->post('articleBlogType');
                    $data['article_category'] = $this->input->post('category');
                    $data_i18['article_tags'] = $this->input->post('tags');
                    $data_i18['article_site_structure_type'] = $this->input->post('siteStructure');

                    if($this->input->post('skyscraper') == 'true'){

                        $data_i18['article_skyscraper'] = $this->input->post('skyscraper');

                    }
                }

                if($this->input->post('article_icon')){

                    $data_i18['article_icon'] = $this->input->post('article_icon');

                }
                $data_i18['article_content_cta']='signup';
                if($this->input->post('website')){
                    $website_id = $this->input->post('website');
                    $metaDetail = $this->article_model->get_metatag_info($website_id, $lang);
                    if($metaDetail){
                        if(array_key_exists("meta_product",$metaDetail))
                        {
                          $data_i18['article_meta_product'] = $metaDetail['meta_product'];
                        }
                        if(array_key_exists("meta_category",$metaDetail))
                        {
                          $data_i18['article_meta_category'] = $metaDetail['meta_category'];   
                        }
                        if(array_key_exists("meta_product_name",$metaDetail))
                        {
                          $data_i18['article_meta_product_name'] = $metaDetail['meta_product_name'];   
                        }
                        if(array_key_exists("meta_product_description",$metaDetail))
                        {
                          $data_i18['article_meta_product_desc'] = $metaDetail['meta_product_description']; 
                        }
                        if(array_key_exists("meta_product_image",$metaDetail))
                        {
                          $data_i18['article_meta_product_image'] = $metaDetail['meta_product_image'];   
                        }
                        if(array_key_exists("meta_product_icon",$metaDetail))
                        {
                          $data_i18['article_meta_product_icon'] = $metaDetail['meta_product_icon'];   
                        }
                        if(array_key_exists("meta_product_id",$metaDetail))
                        {
                          $data_i18['article_meta_product_id'] = $metaDetail['meta_product_id']; 
                        }
                        if(array_key_exists("meta_product_part_id",$metaDetail))
                        {
                          $data_i18['article_meta_part_id'] = $metaDetail['meta_product_part_id'];  
                        }
                        if(array_key_exists("meta_product_review_count",$metaDetail))
                        {
                          $data_i18['article_meta_product_reviewcount'] = $metaDetail['meta_product_review_count'];   
                        }
                        if(array_key_exists("meta_product_price_currency",$metaDetail))
                        {
                          $data_i18['article_meta_product_price_currency'] = $metaDetail['meta_product_price_currency'];   
                        }
                        if(array_key_exists("meta_product_brand",$metaDetail))
                        {
                          $data_i18['article_meta_product_brand'] = $metaDetail['meta_product_brand'];  
                        }
                        if(array_key_exists("meta_product_price",$metaDetail))
                        {
                          $data_i18['article_meta_product_price'] = $metaDetail['meta_product_price']; 
                        }
                        if(array_key_exists("meta_product_rating_value",$metaDetail))
                        {
                          $data_i18['article_meta_product_ratingvalue'] = $metaDetail['meta_product_rating_value'];   
                        }
                        if(array_key_exists("product_cta",$metaDetail))
                        {
                          $data_i18['article_product_cta'] = $metaDetail['product_cta'];    
                        }
                        if(array_key_exists("leadcapture_cta",$metaDetail))
                        {
                          $data_i18['article_leadcapture_cta'] = $metaDetail['leadcapture_cta'];   
                        }
                        if(array_key_exists("meta_product_unique_key",$metaDetail))
                        {
                          $data_i18['meta_product_unique_key'] = $metaDetail['meta_product_unique_key'];   
                        }
                    }
                }
                $user_id = $this->session->userdata('id');
                $metaAuthDetail =  (array) $this->article_model->get_meta_author_details($user_id);
                if(array_key_exists("meta_author_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_url'] = $metaAuthDetail['meta_author_url'];
                }
				if(array_key_exists("user_name",$metaAuthDetail))
                {
                  $data_i18['article_meta_author'] = $metaAuthDetail['user_name'];
                }
                if(array_key_exists("meta_author_description",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_desc'] = $metaAuthDetail['meta_author_description'];
                }
                if(array_key_exists("meta_author_facebook_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_facebook'] = $metaAuthDetail['meta_author_facebook_url'];
                }
                if(array_key_exists("meta_author_twitter_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_twitter'] = $metaAuthDetail['meta_author_twitter_url'];
                }
                if(array_key_exists("meta_author_instagram_url",$metaAuthDetail))
                {
                  //$data_i18['article_meta_author_instagram'] = $metaAuthDetail['meta_author_instagram_url'];
                }
                if(array_key_exists("meta_author_linkedin_url",$metaAuthDetail))
                {
                  //$data_i18['article_meta_author_linkedin'] = $metaAuthDetail['[meta_author_linkedin_url'];
                }
                //$this->db->insert('articles', $data);
                //$article_last_insert_id = $this->db->insert_id();
                $article_last_insert_id = $this->article_model->save($data, $id);
                if($article_last_insert_id){

                    $data_i18['article_id'] = $article_last_insert_id;
                    if($this->input->post('siteStructure') == 'cluster' && $this->input->post('articleClusterType') == 'pillar'){

                        $data_i18['article_pillar_id'] = $article_last_insert_id;

                    }
                    if($this->input->post('siteStructure') == 'cluster' && $this->input->post('articleClusterType') == 'supporting'){
                        if($this->input->post('article_master_pillar')){
                            $article_master_pillar = explode("/",$this->input->post('article_master_pillar'));
                            $data_i18['article_pillar_id'] = $article_master_pillar[1];
                        }
 

                    }

                    //$this->db->insert('articles_translate_i18', $data_i18);
                    $this->article_i18_model->save($data_i18, null);

                }
                
                $article_type = $data['article_type'];
                if($data['article_type'] == 'news'){

                    $article_type =  'pressrelease';
                }

                $redirect_url =  $article_type.'/i18/'.$lang.'/'.$article_last_insert_id;

                    $return['is_redirect'] = 'yes';
                    $return['redirect'] = site_url($redirect_url);
                   
         }else{
                    //$return['redirect'] = site_url('article/en'); 
         }
        if($json_output){
            $this->output->set_content_type('application/ json')->set_output(json_encode($return));
        }else{
            return $return;
        }
                
    }

    public function saveContributorArticle($id = null, $lang = 'en', $json_output=true)
    {
        //pre($_POST);
        //die;
        $return['is_redirect'] = 'no';
        if ($this->user_model->loggedin()) {
                //pre($this->input->post());
                $data = []; 
                $data_i18  = []; 
                //$now = date('Y-m-d H:i:s');
                //$data['date_added'] = $now;
                //$data['date_modified'] = $now;
                $search = array("http://", "https://", "www.");
				$website = rtrim(str_replace($search, "", site_url()),"/");
				$data['article_website'] = $website;
                $data['site_id'] = $this->input->post('cwebsite'); 
                $data['user_id'] = $this->session->userdata('id');
                $data['article_author'] = $this->session->userdata('full_name');
                if($this->input->post('ckeyword')){
                    $data_i18['keywords'] = trim(ucwords($this->input->post('ckeyword')));
                    $data_i18['article_meta_keyword'] = trim(ucwords($this->input->post('ckeyword')));
                }
                
                $data_i18['article_site_id'] = $this->input->post('cwebsite');  
                $data_i18['language_id'] = $lang;  
                $data_i18['article_status'] = 'draft';
                $data['article_type'] = 'article';
                $data['article_category'] = $this->input->post('ccategory');
                $data_i18['article_tags'] = $this->input->post('ctags');
                $data_i18['article_site_structure_type'] = 'blog';
                $data_i18['article_title'] = '';
                $data_i18['article_description'] = '';
                if($this->input->post('cwebsite')){
                    $website_id = $this->input->post('website');
                    $metaDetail = $this->article_model->get_metatag_info($website_id, $lang);
                    if($metaDetail){
                        if(array_key_exists("meta_product",$metaDetail))
                        {
                          $data_i18['article_meta_product'] = $metaDetail['meta_product'];
                        }
                        if(array_key_exists("meta_category",$metaDetail))
                        {
                          $data_i18['article_meta_category'] = $metaDetail['meta_category'];   
                        }
                        if(array_key_exists("meta_product_name",$metaDetail))
                        {
                          $data_i18['article_meta_product_name'] = $metaDetail['meta_product_name'];   
                        }
                        if(array_key_exists("meta_product_description",$metaDetail))
                        {
                          $data_i18['article_meta_product_desc'] = $metaDetail['meta_product_description']; 
                        }
                        if(array_key_exists("meta_product_image",$metaDetail))
                        {
                          $data_i18['article_meta_product_image'] = $metaDetail['meta_product_image'];   
                        }
                        if(array_key_exists("meta_product_icon",$metaDetail))
                        {
                          $data_i18['article_meta_product_icon'] = $metaDetail['meta_product_icon'];   
                        }
                        if(array_key_exists("meta_product_id",$metaDetail))
                        {
                          $data_i18['article_meta_product_id'] = $metaDetail['meta_product_id']; 
                        }
                        if(array_key_exists("meta_product_part_id",$metaDetail))
                        {
                          $data_i18['article_meta_part_id'] = $metaDetail['meta_product_part_id'];  
                        }
                        if(array_key_exists("meta_product_review_count",$metaDetail))
                        {
                          $data_i18['article_meta_product_reviewcount'] = $metaDetail['meta_product_review_count'];   
                        }
                        if(array_key_exists("meta_product_price_currency",$metaDetail))
                        {
                          $data_i18['article_meta_product_price_currency'] = $metaDetail['meta_product_price_currency'];   
                        }
                        if(array_key_exists("meta_product_brand",$metaDetail))
                        {
                          $data_i18['article_meta_product_brand'] = $metaDetail['meta_product_brand'];  
                        }
                        if(array_key_exists("meta_product_price",$metaDetail))
                        {
                          $data_i18['article_meta_product_price'] = $metaDetail['meta_product_price']; 
                        }
                        if(array_key_exists("meta_product_rating_value",$metaDetail))
                        {
                          $data_i18['article_meta_product_ratingvalue'] = $metaDetail['meta_product_rating_value'];   
                        }
                        if(array_key_exists("product_cta",$metaDetail))
                        {
                          $data_i18['article_product_cta'] = $metaDetail['product_cta'];    
                        }
                        if(array_key_exists("content_cta",$metaDetail))
                        {
                          $data_i18['article_content_cta'] = $metaDetail['content_cta'];   
                        }
                        if(array_key_exists("meta_product_unique_key",$metaDetail))
                        {
                          $data_i18['meta_product_unique_key'] = $metaDetail['meta_product_unique_key'];   
                        }
                    }
                }
                $user_id = $this->session->userdata('id');
                $metaAuthDetail =  (array) $this->article_model->get_meta_author_details($user_id);
                if(array_key_exists("meta_author_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_url'] = $metaAuthDetail['meta_author_url'];
                }
				if(array_key_exists("user_name",$metaAuthDetail))
                {
                  $data_i18['article_meta_author'] = $metaAuthDetail['user_name'];
                }
                if(array_key_exists("meta_author_description",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_desc'] = $metaAuthDetail['meta_author_description'];
                }
                if(array_key_exists("meta_author_facebook_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_facebook'] = $metaAuthDetail['meta_author_facebook_url'];
                }
                if(array_key_exists("meta_author_twitter_url",$metaAuthDetail))
                {
                  $data_i18['article_meta_author_twitter'] = $metaAuthDetail['meta_author_twitter_url'];
                }
                if(array_key_exists("meta_author_instagram_url",$metaAuthDetail))
                {
                  //$data_i18['article_meta_author_instagram'] = $metaAuthDetail['meta_author_instagram_url'];
                }
                if(array_key_exists("meta_author_linkedin_url",$metaAuthDetail))
                {
                  //$data_i18['article_meta_author_linkedin'] = $metaAuthDetail['[meta_author_linkedin_url'];
                }
                //$this->db->insert('articles', $data);
                //$article_last_insert_id = $this->db->insert_id();
                $article_last_insert_id = $this->article_model->save($data, $id);
                if($article_last_insert_id){

                    $data_i18['article_id'] = $article_last_insert_id;
                    $this->article_i18_model->save($data_i18, null);

                }
                
                $article_type = $data['article_type'];
                $redirect_url =  $article_type.'/i18/'.$lang.'/'.$article_last_insert_id;

                    $return['is_redirect'] = 'yes';
                    $return['redirect'] = site_url($redirect_url);
                   
         }else{
                    //$return['redirect'] = site_url('article/en'); 
         }
        if($json_output){
            $this->output->set_content_type('application/ json')->set_output(json_encode($return));
        }else{
            return $return;
        }
                
    }

    public function register()
    {
        $return['status'] = false;
        $return['message'] = 'Request is not authorized';
        if ($this->input->is_ajax_request()) {

            $rules = $this->user_model->rules_admin;
            $this->form_validation->set_rules($rules);

			$return['status'] = $this->form_validation->run();
            if (!$return['status']) {

                $return['name'] = strip_tags(form_error('name'));
				$return['email'] = strip_tags(form_error('email'));
                $return['message'] = 'ERROR';
            } else {

                $data['user_email'] = $this->input->post('email');
                $data['user_name'] = $this->input->post('name');
                $nameArr = explode(' ', $this->input->post('name'));
                if(count($nameArr) > 1){
                    $lastcount = count($nameArr) - 1;
                    $data['user_lname'] = $nameArr[$lastcount];
                    unset($nameArr[$lastcount]);
				}

				$user_info = $this->user_model->get_by(
                    //'user_email = "' . $this->input->post('email') . '"', true

                    "user_email = '" . $this->input->post('email') . "'", true
                );
                $user_id = NULL;
                if($user_info){
                    $user_id = $user_info->user_id;
				}
                $data['user_fname'] = implode(' ', $nameArr);
                $random_password = $this->get_random_password();
                $_POST['password'] = $random_password;
                $data['user_password'] = $this->user_model->hash($random_password);
                $last_insert_user_id = $this->user_model->save($data, $user_id);

                if ($this->user_model->login() == true) {

					/*** Registration Send Email ****/
					$from_name = $this->config->item('emailconfig_from_name');
					$from_email 	  = $this->config->item('emailconfig_from_email');
					$htmlContent  = '';
					$htmlContent .= '<p>Thank you for joing us! We’re happy to see you in our portal.</p>';
					$htmlContent .= '<p>Here is your user account details which can be updated in your {portal_name} Writer Portal account anytime.</p>';
					$htmlContent .= '<p>Email: <br>'. $data['user_email'] . '</p>';
					$htmlContent .= '<p>Password: <br><strong>' . $random_password . '</strong></p>';
					$htmlContent .= '<p>&nbsp;</p>';
					$htmlContent .= '<p>Kindest Regards,<br>';
					$htmlContent .= '{portal_name} Team</p>';

					$emailer_data['from_name']		 = $from_name;
					$emailer_data['from_email']		 = $from_email;
					$emailer_data['to_name'] 		 = $data['user_name'];
					$emailer_data['to_email']		 = $data['user_email'];
					$emailer_data['message_subject'] = 'Welcome to {portal_name} Writer Portal!';
					$emailer_data['message_body'] 	 = $htmlContent;

					$message = $this->load->view('component/email', $emailer_data, TRUE);
					$this->send_email($emailer_data, $message);
                    /*** Send Email End ****/
                   if($this->input->post('formType') == 'articlecontributor-form'){
                    $article_return = $this->saveContributorArticle(null, 'en', false);    
                   }else{
                    $article_return = $this->saveMasterArticle(null, 'en', false);
                    
                   }
                    

                    $return['redirect'] = $article_return['redirect'];
                    //$return['redirect'] = site_url('secure/articleslist');
                    $return['message'] = 'User successfully logged in';
                    $this->session->set_flashdata('success', 'User successfully logged in');
                } else {
                    //$this->session->set_flashdata('error', 'That email/password combination does not exist');
                }
            }
        }
        $this->output
        ->set_content_type('application/json')
		->set_output(json_encode($return));
    }

    public function get_random_password(){

        //return 'pass123';
         return random_string('alnum', 8);
    }

    public function get_permalink($website, $permalink, $article_type){
      $return['success'] = false;
      $articles='articles';
      $articles_i18='articles_translate_i18';
      if($article_type == 'pillar'){
        $this->db->select('*');
        $this->db->from($articles_i18);
        $this->db->join($articles, 'articles.article_id =  articles_translate_i18.article_id', 'LEFT');
        $this->db->where($articles_i18.'.language_id', 'en');
        $this->db->where($articles_i18.'.article_site_id', $website);
        $this->db->where($articles_i18.'.article_permalink',   $permalink);
        //$this->db->where($articles_i18.'.article_status!=',  'deleted');
        $this->db->where($articles.'.article_type', $article_type);
        $query = $this->db->get();
        $result = $query->result_array();
          if($result){
  
            $return['success'] = true;
  
          }else{
  
              $return['success'] = false;
          }
      }
        $this->output
        ->set_content_type('application/json')
		->set_output(json_encode($return));
    }

   /* public function isUniquePermalink()
    {
        //$website = $this->input->get('website');
        //$permalink = $this->input->get('permalink');
        $website = 'hubworks.com';
        $permalink = 'employee-engagement';
        pre($website);
        pre($permalink);
        $this->db->select('keywords, article_permalink, article_pillar_id');
        $this->db->from('articles_translate_i18');
        $this->db->where('language_id', 'en');
        $this->db->where('article_site_id', $website);
        $this->db->where('article_permalink', $permalink);
        $query = $this->db->get(null, true);
        $result = $query->result_array();
        pre($result);
        

        if ($result) {
            echo 'false';
        } else {
            echo 'true';
        }
    }*/

    public function get_pillar_article($website ='hubworks.com'){
        $articles='articles';
        $articles_i18='articles_translate_i18';

        $this->db->select('*');
        $this->db->from($articles_i18);
        $this->db->join($articles, 'articles.article_id =  articles_translate_i18.article_id', 'LEFT');
        $this->db->where($articles_i18.'.language_id', 'en');
        $this->db->where($articles_i18.'.article_site_id', $website);
        $this->db->where($articles_i18.'.article_status',  'published');
        $this->db->where($articles.'.article_type', 'pillar');
        $query = $this->db->get();
        $result_array = $query->result_array();
        $this->output
        ->set_content_type('application/json')
		->set_output(json_encode($result_array));
    }
   
    
}
