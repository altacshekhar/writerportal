<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/aws/aws-autoloader.php';
use Aws\Translate\TranslateClient;
use Aws\Exception\AwsException;
class Pillar extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('article_i18_model');
        $this->load->model('paragraph_model');
        $this->load->model('paragraph_i18_model');
        $this->load->model('callouts_i18_model');
        //$this->load->model('backlink_model');
        //$this->load->model('backlink_i18_model');
        $this->load->model('promotion_model');
        $this->load->model('articletype_model');
        $this->load->model('articlecategory_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
        $this->load->model('channelui_model');
        $this->load->model('website_model');
        $this->load->model('metatag_model');
        $this->load->model('contentarticlesbrief_model');
    }

    public function index($id = null, $lang = 'en')
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}   
		$image_upload_dir = $this->config->item('image_upload_dir');
        $path = FCPATH . $image_upload_dir;
  
        //$this->data['paragraphs'] = $this->paragraph_model->get_by(array('article_id' => 3));
        $paragraphs = array();
        //$backlinks=array();
        $twitter_blank_array = array( array(
            'article_language_id' => $lang,
            'msg_id' => '',
            'msg_channel' => 'twitter',
            'msg_sequence' => 1,
            'msg_article_headline' => '',
            'msg_multimedia' => '',
            'image_url_base64' => '',
            'video_url' => '',
            'msg_text' => '',
            'msg_url_link' => '',
        )
        );
        $linkedin_blank_array = array( array(
            'article_language_id' => $lang,
            'msg_id' => '',
            'msg_channel' => 'linkedin',
            'msg_sequence' => 1,
            'msg_article_headline' => '',
            'msg_multimedia' => '',
            'image_url_base64' => '',
            'video_url' => '',
            'msg_text' => '',
            'msg_url_link' => '',
        )
        );
        $facebook_blank_array = array( array(
            'article_language_id' => $lang,
            'msg_id' => '',
            'msg_channel' => 'facebook',
            'msg_sequence' => 1,
            'msg_article_headline' => '',
            'msg_multimedia' => '',
            'image_url_base64' => '',
            'video_url' => '',
            'msg_text' => '',
            'msg_url_link' => '',
         )
        );
        $instagram_blank_array = array( array(
            'article_language_id' => $lang,
            'msg_id' => '',
            'msg_channel' => 'instagram',
            'msg_sequence' => 1,
            'msg_article_headline' => '',
            'msg_multimedia' => '',
            'image_url_base64' => '',
            'video_url' => '',
            'msg_text' => '',
            'msg_url_link' => '',
        )
        );
        $twitters = array();
        $linkedins = array();
        $facebooks = array();
        $instagrams = array();
        $twitter = $this->input->post('twitter');
       
        $twitters = (!empty($twitter)) ? $twitter : $twitter_blank_array;
        $linkedin = $this->input->post('linkedin');
       
        $linkedins = (!empty($linkedin)) ? $linkedin : $linkedin_blank_array;
        $facebook = $this->input->post('facebook');
       
        $facebooks = (!empty($facebook)) ? $facebook :  $facebook_blank_array;
        $instagram = $this->input->post('instagram');
       
        $instagrams = (!empty($instagram)) ? $instagram : $instagram_blank_array;
       $social_channels = array_merge($twitters,  $linkedins,  $facebooks, $instagrams);
   
       // $social_channels = array_merge($twitters, $instagrams);
        //pre_exit($_POST);
  //     pre($_POST);
      //pre_exit($social_channels);
        if ($id && $this->input->post("article[$lang][article_title]") == false) {
            $article    = $this->article_model->getArticle($id, $lang);
            $language_array    = $this->article_model->getArticleLanguages($id);
            $language_array[] = $lang;
            $paragraphs = $this->paragraph_model->get_paragraph_i18_list($id, $lang);
            //$backlinks = $this->backlink_i18_model->get_backlink_i18_list($id, $lang);
         //  pre($language_array);
            $this->load->model('contentarticlesbrief_model');
            $this->data['cta_from_brief'] = $this->contentarticlesbrief_model->getCtaFromBrief($id);
           
        } else {
            $article = $this->article_model->get_new_t(true);
            $language_array = array($lang);
            $this->data['cta_from_brief'] = [];
            // pre($article);
        }
        $language_array = array_unique($language_array);
        $socialmedia = $this->promotion_model->get_socialmedia_list($id, $lang);
        //pre($socialmedia);
        $twitters    = $socialmedia['twitter'];
        $linkedins   = $socialmedia['linkedin'];
        $facebooks   = $socialmedia['facebook'];
        $instagrams  = $socialmedia['instagram'];

        if ($this->input->post("article[$lang][paragraph]")) {
            $paragraphs = $this->input->post("article[$lang][paragraph]");
        }
        if (count($paragraphs) <1 ) {
            $paragraphs[0] = $this->paragraph_model->get_new_t(true);
            $paragraphs[0]['callouts'][0] = $this->callouts_i18_model->get_new();
        
        }
        /*if ($this->input->post("article[$lang][backlinks]")) {
            $backlinks = $this->input->post("article[$lang][backlinks]");
        }*/
        if ($this->input->post('twitter')) {
            $twitters = $this->input->post('twitter');
        }
        if ($this->input->post('linkedin')) {
            $linkedins = $this->input->post('linkedin');
        } 
        if ($this->input->post('facebook')) {
            $facebooks = $this->input->post('facebook');
        } 
        if ($this->input->post('instagram')) {
            $instagrams = $this->input->post('instagram');
        } 
        
        $this->data['lang'] = $lang;
        $this->data['article'] = $article;
        $this->data['paragraphs'] = $paragraphs;
        //$this->data['backlinks'] = $backlinks;
        $this->data['socialmedia_messages'] = $socialmedia;
       /* $this->data['twitters'] = $twitters;
        $this->data['linkedins'] = $linkedins;
        $this->data['facebooks'] = $facebooks;
        $this->data['instagrams'] = $instagrams;*/
 
        $this->data['types'] = $this->articletype_model->get_type();
        $this->data['category'] = $this->category_model->get_category_by_array('article');
        $this->data['product_list'] = get_product_list_array();

        //$rules = $this->article_model->rules;
        $rules = array(
            "article[$lang][article_title]" => array(
                'field' => "article[$lang][article_title]",
                'label' => 'Article Headline',
                'rules' => 'trim|required|xss_clean|min_length[10]|max_length[70]',
            ),
            "article[$lang][article_description]" => array(
                'field' => "article[$lang][article_description]",
                'label' => 'Summary',
                'rules' => 'trim|required|xss_clean|min_length[10]|max_length[250]',
            ),
        );
        $this->form_validation->set_rules($rules);
        $formSubmit = $this->input->post('submitForm');

        if ($this->form_validation->run() == true) {

            if ($id) {
                $article = $this->article_model->getArticle($id, $lang);
            }
			if( $this->input->post('form_action') == 'publish' &&  $id){

				//if($article['article_title'] != $this->input->post('article_title')){
                    //$language_array = array("en","ar","fr","de","it","ja","es");
					$language_array = array("en");
                    foreach ($language_array  as $key => $value) {
                        $lang_id = $value;
                        $this->deletePublishedArticle($id, $lang_id);
                        if(isset($_SESSION['warning'])){
                            unset($_SESSION['warning']);
                        }
                    }
				//}
			}
            $data = $this->article_model->array_from_post_i18(array(
		        'article_author',
            ), $lang);

            $data_i18 = $this->article_i18_model->array_from_post_i18(array(
                'article_title',
                'article_description',
                'article_image_alt',
                'article_tags',
                'article_icon',
                'article_meta_lookup_id',
                'article_image_attribution',
                'article_image_license',
                'article_meta_product',
                'article_meta_category',
                'article_meta_abstract',
                'article_meta_author_facebook',
                'article_meta_author_twitter',
                'article_meta_product_name',
                'article_meta_product_desc',
                'article_meta_product_image',
                'article_meta_product_icon',
                'article_meta_product_id',
                'article_meta_part_id',
                'article_meta_product_reviewcount',
                'article_meta_product_price_currency',
                'article_meta_product_brand',
                'article_meta_product_price',
                'article_meta_product_ratingvalue',
                'article_meta_author_url',
				'article_meta_author',
                'article_meta_author_desc',
                'date_modified',
                'publish_date',
                'article_toc_ordered',
                'article_product_cta',
                'article_leadcapture_cta',
                'meta_product_unique_key',
                'article_skyscraper',
                ), $lang);
            
            $imageBase64Data = $this->input->post("article[$lang][summary_image_base64]");
            $social_article_image='';
			if($imageBase64Data){
				$old_article_image = $this->input->post("article[$lang][article_image]");
                $data_i18['article_image'] 	= $this->save_base64_image($imageBase64Data, $data_i18['article_title'], $old_article_image);
                //$social_article_image = $data_i18['article_image'];
            //  $data_i18['article_image_license'] =  'Creative Commons Zero';
                $data_i18['article_image_attribution'] = $this->input->post("article[$lang][article_image_attribution]");
                $data_i18['article_image_license'] = $this->input->post("article[$lang][article_image_license]");
			}
            if($this->input->post("article[$lang][article_skyscraper]") == ''){
                $data_i18['article_skyscraper'] = 'false';
            }
			$data_i18['article_status'] = 'submitted';
			if($this->input->post('form_action') == 'savedraft'){
                $data_i18['article_status'] = 'draft';
            }elseif( $article['article_status'] == 'published' || $article['article_status'] == 'pending'){
                $data_i18['article_status'] = 'pending';
            }

            $article_type = 'pillar';
            if ($this->input->post("article[$lang][article_type]")) {
                $article_type = $this->input->post("article[$lang][article_type]");
            }
			$article_title = $data_i18['article_title'];
            $data['article_type'] = $article_type;
            if ($this->input->post("article[$lang][article_category][]")) {
                $data['article_category'] = implode(",",$this->input->post("article[$lang][article_category][]"));
            }
            if (!$id) {
            	$data['user_id'] = $this->session->userdata('id');
                $data['article_author'] = $this->session->userdata('full_name');
                if($this->input->post("article[$lang][article_author]")){
                    $data['article_author'] = $this->input->post("article[$lang][article_author]"); 
                }

				$search = array("http://", "https://", "www.");
				$website = rtrim(str_replace($search, "", site_url()),"/");
				$data['article_website'] = $website;
            }else{
                $data['article_author'] = $article['article_author'];
            }
            $previous_status = $this->input->post('article_previous_status');
            $form_action     = $this->input->post('form_action');
            if($form_action == 'publish'){
                $form_action = 'published';
            }
            if($form_action == 'submit'){
                $form_action = 'submitted';
            }
            $data_i18['article_previous_status'] = $form_action;
            if($previous_status != $form_action && ! empty($previous_status)){

                $data_i18['article_previous_status'] = $previous_status;
            }
            $article_last_insert_id = $this->article_model->save($data, $id);
            //pre($this->db->last_query());
            //pre($this->db->insert_id());
            //die;

            $data_i18['article_title'] =$this->input->post("article[$lang][article_title]");
            $data_i18['article_description']=$this->input->post("article[$lang][article_description]");
            $data_i18['article_image_alt']=$this->input->post("article[$lang][article_image_alt]");
            $data_i18['article_id']= $article_last_insert_id;
            $data_i18['language_id']= $lang;
            if($this->input->post("article[$lang][article_icon]")){
                $data_i18['article_icon'] = $this->input->post("article[$lang][article_icon]");
            }else{
                $data_i18['article_icon'] = $article['article_icon'];
            }
            if($this->input->post("article_content_performance")){
                $data_i18['article_content_performance'] = $this->input->post("article_content_performance");
            }
            if($this->input->post("article_content_score") || $this->input->post("article_content_score")=='0'){
                $data_i18['article_content_score'] = $this->input->post("article_content_score");
            }
            if($this->input->post("article_target_score") || $this->input->post("article_target_score")=='0'){
                $data_i18['article_target_score'] = $this->input->post("article_target_score");
            }
            //$where   = 'article_id=' . (int)  $article_last_insert_id . ' AND language_id = "' . $lang . '"';
            $where   = "article_id='" . (int)  $article_last_insert_id . "' AND language_id = '" . $lang . "'";
            $i18_row =  (array) $this->article_i18_model->get_by($where, TRUE);

            if($i18_row){
                $article_i18_id = $i18_row['article_i18_id'];
                $article_status = $i18_row['article_status'];
            }else{
                $article_i18_id=NULL;  
            }
           
            $data_i18['article_meta_abstract'] = $this->input->post("article[$lang][article_description]");
            $data_i18['article_content_cta']='signup';
            if($id){
                $data_i18['meta_product_unique_key'] = $article['meta_product_unique_key'];
                $data_i18['article_meta_author_url'] = $article['article_meta_author_url'];
                $data_i18['article_meta_author_desc'] = $article['article_meta_author_desc'];
                $data_i18['article_meta_author_facebook'] = $article['article_meta_author_facebook'];
                $data_i18['article_meta_author_twitter'] = $article['article_meta_author_twitter'];
               // $data_i18['article_meta_author_instagram'] = $article['article_meta_author_instagram'];
                //$data_i18['article_meta_author_linkedin'] = $article['article_meta_author_linkedin'];
                $data_i18['article_meta_product'] = $article['article_meta_product'];
                $data_i18['article_meta_category'] = $article['article_meta_category'];
                $data_i18['article_meta_product_name'] = $article['article_meta_product_name'];
                $data_i18['article_meta_product_desc'] = $article['article_meta_product_desc'];
                $data_i18['article_meta_product_image'] = $article['article_meta_product_image'];
                $data_i18['article_meta_product_icon'] = $article['article_meta_product_icon'];
                $data_i18['article_meta_product_id'] = $article['article_meta_product_id'];
                $data_i18['article_meta_part_id'] = $article['article_meta_part_id'];
                $data_i18['article_meta_product_reviewcount'] = $article['article_meta_product_reviewcount'];
                $data_i18['article_meta_product_price_currency'] = $article['article_meta_product_price_currency'];
                $data_i18['article_meta_product_brand'] = $article['article_meta_product_brand'];
                $data_i18['article_meta_product_price'] = $article['article_meta_product_price'];
                $data_i18['article_meta_product_ratingvalue'] = $article['article_meta_product_ratingvalue'];
                $data_i18['article_product_cta'] = $article['article_product_cta'];
                $data_i18['article_leadcapture_cta'] = $article['article_leadcapture_cta'];
                //$data_i18['article_icon'] = $article['article_icon'];

            }
            if($id && $this->input->post("article[$lang][meta_product_unique_key]")){
                $meta_product_unique_key = $this->input->post("article[$lang][meta_product_unique_key]");
                $where   = "meta_product_unique_key='" . $meta_product_unique_key . "' AND meta_product_language_id = '" . $lang . "'";
                $metaDetail =  (array)  $this->metatag_model->get_by($where, true);
                //pre($this->db->last_query());
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

            }

            $this->article_i18_model->save($data_i18, $article_i18_id);
            //pre($this->db->last_query());
            //pre($this->db->insert_id());
            //die;
            //$this->session->set_flashdata('articleType', $article_type);
            /*$backlinks=$this->input->post("article[$lang][backlinks]");

            /*if (!empty($backlinks)) {
                $this->backlink_i18_model->save_article_backlink($backlinks, $article_last_insert_id, $lang);

            }*/


           /*** Paragraphs Start ****/

			
            $section_image_name = $data_i18['article_title'];
           if (!empty($paragraphs)) {
                foreach ($paragraphs as $paragraph) {
                    if($paragraph['section_title']){
                        $section_image_name = $paragraph['section_title'];
                    }

					if($paragraph['section_title'] || $paragraph['section_image_base64'] || trim($paragraph['section_text'])){
                        //$data_paragraph = $paragraph;
                        $data_paragraph = array();
                        //$unset_array = array('section_title', 'section_meta_video_name', 'section_meta_video_description', 'section_text','section_image_alt');
                        $data_paragraph_i18 = $paragraph;
						$data_paragraph_i18['section_heading_type']            = $paragraph['section_heading_type'];
						$data_paragraph_i18['section_title']            = $paragraph['section_title'];
						$data_paragraph_i18['section_meta_video_name']  = $paragraph['section_meta_video_name'];
						$data_paragraph_i18['section_meta_video_description'] = $paragraph['section_meta_video_description'];
                        $data_paragraph_i18['section_text']                    =  cleanHtml($data_paragraph_i18['section_text']);
                        if(array_key_exists('section_image_alt', $data_paragraph)){
                            $data_paragraph_i18['section_image_alt']           =  $data_paragraph['section_image_alt'];
                        }
                       

                        //$data_paragraph=array_diff_key($data_paragraph, array_flip($unset_array));
						$section_id = NULL;
						$sectionimageBase64Data = $data_paragraph_i18['section_image_base64'];
						if($sectionimageBase64Data){
							$old_paragraph_image = $data_paragraph_i18['section_image'];
							$data_paragraph_i18['section_image'] = $this->save_base64_image($sectionimageBase64Data, $section_image_name, $old_paragraph_image);
                            $data_paragraph_i18['section_image_license'] = $data_paragraph_i18['section_image_license'];
						}

						if ($paragraph['section_id']) {
							$section_id = $paragraph['section_id'];
						}

                        $data_paragraph['article_id'] = $article_last_insert_id;
                        $data_paragraph['language_id'] = $lang;
						unset($data_paragraph_i18['callouts']);
						unset($data_paragraph_i18['section_image_base64']);
                        $section_id = $this->paragraph_model->save($data_paragraph, $section_id);

                        //$where_s   = 'section_id = ' . (int)  $section_id . ' AND language_id = "' . $lang . '"';
                        $where_s   = "section_id = '" . (int)  $section_id . "' AND language_id = '" . $lang . "'";
                        $i18_s_row =  (array) $this->paragraph_i18_model->get_by($where_s, TRUE);

                        $data_paragraph_i18['section_id']  =  $section_id;
                        $data_paragraph_i18['language_id'] = $lang;
                        if($i18_s_row){
                            $section_i18_id= $i18_s_row['section_i18_id'];
                        }else{
                            $section_i18_id=NULL;  
                        }

                        $this->paragraph_i18_model->save($data_paragraph_i18, $section_i18_id);
                        $callouts = array();
						if(array_key_exists('callouts', $paragraph)){
                            $callouts = $paragraph['callouts'];
                            $this->callouts_i18_model->save_article_i18_callouts($callouts, $section_id, $lang);
                        }
						
					}
                }
           }
            /*** Paragraphs End ****/
                        /***  Social Channels Start ****/
                        if (!empty($social_channels)) {
                            $msg_status_array = array();
                            $social_channel_image_setting = array();
                            if(empty($twitter)){
                                $msg_status_array = array(
                                    'twitter' => 1,
                                    'facebook' => 1,
                                    'linkedin' => 1,
                                    'instagram' => 1
                                );
                            }
                           
                            if(!empty($this->input->post("msg_status"))){
                                $msg_status_array = $this->input->post("msg_status"); 
                            }
                            $social_channel_image_setting['facebook'] = array('width'=>1200, 'height'=>628);
                            $social_channel_image_setting['twitter'] = array('width'=>440, 'height'=>220);
                            $social_channel_image_setting['linkedin'] = array('width'=>1104, 'height'=>736);
                            $social_channel_image_setting['instagram'] = array('width'=>1080, 'height'=>1080);
                            foreach ($social_channels as $social_channel) {
                               
                         //       pre($social_channel, '$social_channel');
                                $social_id = NULL;
                                $social_data_save = array();
                                $channel_name = strtolower($social_channel['msg_channel']);
                                $setting = $social_channel_image_setting[$channel_name];
                                $social_data_save['msg_channel'] = $channel_name;
                                $social_data_save['msg_sequence'] = $social_channel['msg_sequence'];
                                $social_data_save['article_language_id'] = $social_channel['article_language_id'];
                                $social_data_save['site_id'] = $article['article_site_id'];
                                $social_data_save['msg_article_headline'] = $this->input->post("article[$lang][article_title]");
                                $social_data_save['msg_headline'] = $this->input->post("article[$lang][article_title]");
                                $social_data_save['msg_text'] = $this->input->post("article[$lang][article_description]");
                                $social_data_save['msg_intro'] = $this->input->post("article[$lang][article_description]");
                                //$social_data_save['msg_multimedia'] = $this->input->post("article[$lang][article_image]");
                                $msg_info = $this->promotion_model->get_promo_message_id($article_last_insert_id, $lang, $channel_name);
                                //pre($msg_info);
                                if(!empty($msg_info)){
                                    $social_id = $msg_info['msg_id'];
                                    $social_data_save['msg_text'] = $msg_info['msg_text']; 
                                }
                                $social_data_save['msg_url_link'] = 'https://' . $article['article_site_id'] . '/' . $article['article_permalink'] . '.html';
                                if( $this->input->post('form_action') == 'publish'){
                                    
                                    $social_data_save['article_published_status'] = true;
                                }else{
                                    $social_data_save['article_published_status'] = false;  
                                }
                                $social_data_save['msg_cta'] = $article['article_product_cta'];
                               /* if($social_article_image){
                                    $social_data_save['msg_multimedia'] = $social_article_image;
                                }*/
                               
                                if (!$social_data_save['article_language_id']) {
                                    $social_data_save['article_language_id'] = $lang;
                                }
                                if ($social_channel['msg_id']) {
                                    $social_id = $social_channel['msg_id'];
                                }
                                $social_data_save['article_id'] = $article_last_insert_id;
                                //$social_data_save['date_published'] ='';

            
                                if(array_key_exists('msg_cta',$social_channel)){
                                    if($social_channel['msg_cta']){
                                        $social_data_save['msg_cta'] = $social_channel['msg_cta'];
                                    }
                                   
                                }
            
                                if(array_key_exists('video_url',$social_channel) && !empty(trim($social_channel['video_url']))){
                                    $social_data_save['msg_multimedia'] = $social_channel['video_url'];
                                }
                                if(array_key_exists('msg_multimedia',$social_channel) && !empty(trim($social_channel['msg_multimedia']))){
                                    $social_data_save['msg_multimedia'] = $social_channel['msg_multimedia'];
                                }
                                $socialimageBase64Data = $imageBase64Data;
                               if(array_key_exists('image_url_base64',$social_channel) && !empty(trim($social_channel['image_url_base64']))){
                                   
                                    $socialimageBase64Data = $social_channel['image_url_base64'];
                                   
                                } 
                               // pre($socialimageBase64Data);
                                if($socialimageBase64Data && empty(trim($social_channel['msg_multimedia']))){
                                    $old_social_channel_image = $social_channel['msg_multimedia'];
                                    $social_channel_image_video =   $this->save_base64_image($socialimageBase64Data, $article_last_insert_id .'-' .$channel_name, $old_social_channel_image, $setting);
                                    $social_data_save['msg_multimedia'] = $social_channel_image_video;
                                } 
                               
                                
                               
                               // pre($social_data_save['msg_multimedia']);
                                /*if(array_key_exists('msg_article_headline',$social_channel)){
                                    $social_data_save['msg_article_headline'] = $social_channel['msg_article_headline'];
                                }else{
                                    $social_data_save['msg_article_headline'] = $this->input->post("article[$lang][article_title]");
                                }*/

                                if(array_key_exists('msg_headline',$social_channel)){
                                    if($social_channel['msg_headline']){
                                        $social_data_save['msg_headline'] = $social_channel['msg_headline'];
                                    }
                                }

                                if(array_key_exists('msg_intro',$social_channel)){
                                    if($social_channel['msg_intro']){
                                         $social_data_save['msg_intro'] = $social_channel['msg_intro'];
                                    }
                                }

                                if(array_key_exists('msg_text', $social_channel)){
                                    if($social_channel['msg_text']){
                                        $social_data_save['msg_text'] = $social_channel['msg_text'];
                                    }
                                    
                                }

                                if(array_key_exists('msg_url_link',$social_channel)){
                                    if($social_channel['msg_url_link']){
                                    $social_data_save['msg_url_link'] = $social_channel['msg_url_link'];
                                    }
                                }
								if(!empty($msg_status_array)){
									if(array_key_exists($channel_name, $msg_status_array)){
									   
										$social_data_save['msg_status'] = 'true';
									   
									}else{
										
										$social_data_save['msg_status'] = 'false';
									  
									}	
								}else{
                                    
                                    $social_data_save['msg_status'] = 'false';
                                  
                                }
                                //pre($social_data_save);
                                $this->promotion_model->save($social_data_save, $social_id);
				//pre($this->db->last_query());
            
                            }
                         }
		  /***  Social Channels  End ****/
			if( $this->input->post('form_action') == 'publish' &&  $id){
					$this->get_target_backlinks_count($id);
					//$this->articles_translater($id);
				  
            }
             
            if( $this->input->post('form_action') == 'publish' &&  $id){
                $this->publishArticle($id,$lang);
                //$language_array = array("en","ar","fr","de","it","ja","es");
                /*foreach ($language_array  as $key => $value) {
                    $langid = $value;
                    $this->publishArticle($id, $langid);
			    }*/
                
            }
            if ($article_status == 'submitted') {

				/*** Send Email ****/
				$to_full_name = $this->config->item('emailconfig_from_name');
				$to_email 	  = $this->config->item('emailconfig_from_email');

				$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
				$htmlContent .= '<p>An article has been submitted by ' . $this->session->userdata('email')  . '.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>Please review and perform action accordingly.</p>';
				$htmlContent .= '<p>&nbsp;</p>';
				$htmlContent .= '<p>Thank you,<br>';
				$htmlContent .= 'The {portal_name} Team</p>';

				$emailer_data['from_name']		 = 'Writer Portal';
				$emailer_data['from_email']		 = $to_email;
				$emailer_data['to_name']		 = $to_full_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = 'Article Submitted To {portal_name} Writer Portal';
				$emailer_data['message_body'] 	 = $htmlContent;

				$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
				$this->send_email($emailer_data, $message);
				/*** Send Email End ****/

				$this->session->set_flashdata('formSubmitted', 'true');

            }elseif( $this->input->post('form_action') == 'publish' &&  $id){
                //$this->session->set_flashdata('warning', '<strong class="alert-link">' . $article_title . '</strong> has been Published!');
			}else {
				$this->session->set_flashdata('success', '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $article_title . '</span> has been updated!');
			}
            if ($this->user_model->loggedin()) {
                redirect('secure/articleslist', 'refresh');
            }
        } else {

        }
        $keyword = $article['article_title'];
        if($article['article_meta_keyword']){
            $keyword = $article['article_meta_keyword'];
        }
		$this->data['article_languages'] =  $language_array;
		$this->data['subview'] = 'pillar';
		$this->data['nestedview'] = 'pillar_i18';
		$this->data['meta_title'] = 'Pillar Article';
        $this->data['channels'] = (array) $this->channelui_model->get();
        $this->data['github_repo'] = $this->article_model->get_github_repo();
        $this->data['websites'] = (array) $this->get_product_id_list();
        $this->data['meta_tags'] = (array) $this->article_model->get_meta_tags($lang);
        $this->data['languages'] = $this->article_model->get_languages();
        $this->data['optimizecontent'] = $this->get_optimizecontent_keyword_list($id, $lang, $keyword);
        $this->data['articlesbrief'] = (array) $this->contentarticlesbrief_model->get($article['article_brief_id']);
        $this->data['writers'] = $this->contentarticlesbrief_model->get_user_list();
        //$this->data['script_to_load'] = array(site_url('assets/js/seophrase.js'));
        //$this->data['script_to_load'] = array(site_url('assets/js/newarticle.js'));
		$this->load->view('_main_layout', $this->data);
    }

   /* public function edit($id = NULL)
    {
        $is_admin = $this->session->userdata('is_admin');
        if (!$this->user_model->loggedin() && !$is_admin) {
            redirect('/', 'refresh');
        }
        $id || show_404(uri_string());
        $this->data['article'] = $this->article_model->get($id);
        $this->data['article'] || show_404(uri_string());
        $this->index($id);
    }*/

    public function i18($lang = 'en', $id= NULL){
        //echo $lang;
       if($id){
        $is_admin = $this->session->userdata('is_admin');
        if (!$this->user_model->loggedin() && !$is_admin) {
            redirect('/', 'refresh');
        }
        $id || show_404(uri_string());
        $this->index($id, $lang);
        //$this->article_model->getArticle( $id, $lang );
       }else{

        $this->index($id=NULL, $lang);
       }
    }
    public function getSkyscraperArticles($lang = 'en'){
        
        $skyscraper = $this->article_model->get_all_skyscraper_articles($lang);
        echo json_encode($skyscraper);
        
    }
    public function getAllSkyscraperArticles($lang = 'en'){
        $article_id = $this->input->post("articleid");
        $article_type = $this->input->post("articletype");
        $lang = $this->input->post("articlelang");
        $lang = 'en';
        $skyscraper = $this->article_model->getAllSkyscraperArticles($article_id, $article_type, $lang);
        echo json_encode($skyscraper);
        
    }

}
