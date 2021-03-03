<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/aws/aws-autoloader.php';
use Aws\Translate\TranslateClient;
use Aws\Exception\AwsException;
class Linkbuildingarticle extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('linkbuilding_article_model');
        $this->load->model('linkbuilding_article_i18_model');
        $this->load->model('linkbuilding_paragraph_model');
        $this->load->model('linkbuilding_paragraph_i18_model');
        $this->load->model('linkbuilding_callouts_i18_model');
        $this->load->model('articlebrief_model');
        $this->load->model('articlebriefbacklink_model');
        $this->load->model('campaign_model');
        //$this->load->model('promotion_model');
        $this->load->model('articletype_model');
        $this->load->model('articlecategory_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
        //$this->load->model('channelui_model');
        $this->load->model('website_model');
        //$this->load->model('metatag_model');
        $this->load->library('html_to_doc');
    }

    public function delete($brief_id = '',$article_id = '')
    {
        $this->load->model('linkbuilding_article_model');
        $this->load->model('linkbuilding_article_i18_model');
        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
        $brief_id || show_404(uri_string());
        $dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];
        $user_type = $this->session->userdata('user_type');
        if($user_type == 1 || $user_type == 6)
        {
            if ($this->input->is_ajax_request()) {
                if($article_id)
                {
                    $where_s = "language_id='en' AND article_id = '".$article_id."'";
                    $where = "article_id = '".$article_id."'";
                    $link_article_en = (array) $this->linkbuilding_article_i18_model->get_by($where_s, TRUE);
                    $link_article_i18_array = (array) $this->linkbuilding_article_i18_model->get_by_array($where);
                    foreach($link_article_i18_array as $link_article_i18)
                    {
                        // $article_i18_id = $link_article_i18['article_i18_id'];
                        // if($link_article_i18['article_status'] == 'published'){
                        //     $data['article_previous_status'] = 'submitted';
                        // }else{
                        //     $data['article_previous_status'] = $link_article_i18['article_status'];
                        // }
                        // $data['article_status'] = 'deleted';
                        // $this->linkbuilding_article_i18_model->save($data, $article_i18_id);
                        $this->linkbuilding_article_i18_model->delete( $article_i18_id);
                    }
                    $this->linkbuilding_article_model->delete( $article_id);
                }
                if($brief_id)
                {
                    $this->articlebrief_model->delete($brief_id);
                }
                
                if ($this->db->affected_rows()) {
                    // if($link_article_en['article_status'] == 'published'){
                    //     $language_array = array("en","fr","de","it","ja","es");
                    //     foreach ($language_array  as $key => $value) {
                    //         $language_id = $value;
                    //         $this->deletePublishedArticle($id, $language_id);
                    //     }
                    //     $dataArray = ['success' => 1];
                    //     $flashes = [
                    //         'type'  	  => 'info',
                    //         'message'     => 'The link building article removed from the writer portal.'
                    //     ];
                    // }
                    // else
                    // {
                        
                    // }
                    $dataArray = ['success' => 1];
                        $flashes = [
                            'type'  	  => 'info',
                            'message'     => 'The link building article removed from the writer portal.'
                        ];
                }
            }
        }
        else
        {
            $dataArray = ['success' => 0];
            $flashes = [
                'type'  	  => 'error',
                'message'     => 'Request is not authorized.'
            ];
        }
        $dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
    }
    public function test()
    {
        echo phpinfo();
    }

    private function delete_directory($dirname) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                else
                        delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    public function exporthtmlzip($lang = 'en', $brief_id, $id = null)
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}   
        $user_type = $this->session->userdata('user_type');
        $image_upload_dir = $this->config->item('image_upload_dir');
        $path = FCPATH . $image_upload_dir;
        $paragraphs = array();
        $this->load->library('zip');
        ini_set('memory_limit',-1);
        if ($id) {
            $article    = $this->linkbuilding_article_model->getArticle($id, $lang, $brief_id);
            $folder = str_replace(" ","",$article['article_title']);
            $zipfile = str_replace(" ","",$article['article_title']).".zip";
            if(file_exists(getcwd().'/data/'.$zipfile))
                unlink(getcwd().'/data/'.$zipfile);
            if(is_dir(getcwd().'/data/'.$folder))
                $this->delete_directory(getcwd().'/data/'.$folder);
            mkdir(getcwd().'/data/'.$folder,0777, True);
            $fname = "";
            $language_array    = $this->linkbuilding_article_model->getArticleLanguages($id, $brief_id);
            $language_array[] = $lang;
            $paragraphs = $this->linkbuilding_paragraph_model->get_paragraph_i18_list($id, $lang, $brief_id);
            $fname .= str_replace(" ","",$article['article_title']).".html";
            $path = getcwd()."/data";
            $myfile = fopen($path.'/'.$folder.'/'.$fname,"w");
            $content = "";
            $img = "";
            if($article['article_image'])
                $img = end(explode('/',$article['article_image']));
            
            $content .= '<html><head><title>'.$article['article_title'].'</title></head><body>';
            $content .= '<h1>'.$article['article_title'].'</h1>';
            $content .= '<p>'.$article['article_description'].'</p>';
            // if($img)
            //     $content .= '<img src="'.$img.'" alt="'.$article['article_image_alt'].'" license="'.$article['article_image_license'].'" attribution="'.$article['article_image_attribution'].'" >';
            foreach($paragraphs as $key => $value)
            {
                $content .= '<'.$value['section_heading_type'].'>'.$value['section_title'].'</'.$value['section_heading_type'].'>';
                $img_section = "";
                if($value['section_image'])
                    $img_section = end(explode('/',$value['section_image']));
                if($img_section)    
                {
                    $this->zip->read_file(getcwd().'/assets/images/uploads/'.$img_section);
                    //$content .= '<img src="'.$img_section.'" alt="'.$value['section_image_alt'].'" license="'.$value['section_image_license'].'" attribution="'.$value['section_image_attribution'].'" >';
                }                    
                $content .= '<p>'.$value['section_text'].'</p>';
                if($value['callouts'])
                {
                    foreach($value['callouts'] as $call => $outs)
                    {
                        $content .= '<'.$value['section_heading_type'].'>'.$outs['callout_title'].'</'.$value['section_heading_type'].'>';
                        $content .= '<p>'.$outs['callout_text'].'</p>';
                    }
                }
            }
            $content .= '</body></html>';
            fwrite($myfile,$content);
            fclose($myfile);
            $this->html_to_doc->createDoc($content, getcwd().'/data/'.$folder."/".str_replace(".html",".doc",$fname));
            if($img)
                $this->zip->read_file(getcwd().'/assets/images/uploads/'.$img);
            //$this->zip->archive(getcwd().'/data/'.$zipfile);
            //$this->zip->read_file(getcwd().'/data/'.$folder.'/'.$fname);
            $this->zip->read_file(getcwd().'/data/'.$folder.'/'.str_replace(".html",".doc",$fname));
            $this->zip->archive(getcwd().'/data/'.$zipfile);
            $this->zip->download(getcwd().'/data/'.$zipfile);
        }
        $this->session->set_flashdata('success',$zipfile." created successfully.");
        redirect('secure/articlesbrief');
    }

    public function index($lang = 'en', $brief_id, $id = null)
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}   
        $user_type = $this->session->userdata('user_type');
		$image_upload_dir = $this->config->item('image_upload_dir');
        $path = FCPATH . $image_upload_dir;
        $paragraphs = array();
        //pre_exit($_POST);
        if ($id && $this->input->post("article[$lang][article_title]") == false) {
            $article    = $this->linkbuilding_article_model->getArticle($id, $lang, $brief_id);
            $language_array    = $this->linkbuilding_article_model->getArticleLanguages($id, $brief_id);
            $language_array[] = $lang;
            $paragraphs = $this->linkbuilding_paragraph_model->get_paragraph_i18_list($id, $lang, $brief_id);
        } else {
            $article = $this->linkbuilding_article_model->get_new_t(true);
            $language_array = array($lang);
            // pre($article);
        }
        $language_array = array_unique($language_array);

        if ($this->input->post("article[$lang][paragraph]")) {
            $paragraphs = $this->input->post("article[$lang][paragraph]");
        }
        if (count($paragraphs) <1 ) {
            $paragraphs[0] = $this->linkbuilding_paragraph_model->get_new_t(true);
            $paragraphs[0]['callouts'][0] = $this->linkbuilding_callouts_i18_model->get_new();
        
        }    
        if($article['language_id']==''){
            $article['language_id'] = $lang;
        }
        $this->data['lang'] = $lang;
        $this->data['article'] = $article;
        $this->data['paragraphs'] = $paragraphs;
        $this->data['types'] = $this->articletype_model->get_type();
        $this->data['category'] = $this->category_model->get_category_by_array('article');
        $this->data['product_list'] = get_product_list_array();

        //$rules = $this->linkbuilding_article_model->rules;
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
                $article = $this->linkbuilding_article_model->getArticle($id, $lang, $brief_id);
            }
			
            $data = $this->linkbuilding_article_model->array_from_post_i18(array(
		        'article_author',
            ), $lang);

            $data_i18 = $this->linkbuilding_article_i18_model->array_from_post_i18(array(
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
                'article_content_cta',
                'meta_product_unique_key',
                'article_skyscraper',
                ), $lang);
                if(!empty($paragraphs) && $this->input->post('form_action') =='submit') {
                    $paragraph_string='';
                    foreach ($paragraphs as $paragraph) {
                        $paragraph_string.=$paragraph['section_text'].' ' ;
                    }
                   // pre($paragraph_string);
                    $this->session->set_flashdata('error', 'Anchor text and associated backlink urls are missing from the article.');
                    //return true;
                }
            $imageBase64Data = $this->input->post("article[$lang][summary_image_base64]");
            $social_article_image='';
			if($imageBase64Data){
				$old_article_image = $this->input->post("article[$lang][article_image]");
                $data_i18['article_image'] 	= $this->save_base64_image($imageBase64Data, $data_i18['article_title'], $old_article_image);
                //$social_article_image = $data_i18['article_image'];
                //$data_i18['article_image_license'] =  'Creative Commons Zero';
                $data_i18['article_image_attribution'] = $this->input->post("article[$lang][article_image_attribution]");
                $data_i18['article_image_license'] = $this->input->post("article[$lang][article_image_license]");
			}
            if($this->input->post("article[$lang][article_skyscraper]") == ''){
                $data_i18['article_skyscraper'] = 'false';
            }
			$data_i18['article_status'] = 'submitted';
			// if($this->input->post('form_action') == 'savedraft'){
            //     $data_i18['article_status'] = 'draft';
            // }elseif( $article['article_status'] == 'published' || $article['article_status'] == 'pending'){
            //     $data_i18['article_status'] = 'pending';
            // }
            if($this->input->post('form_action') == 'savedraft'){
                $data_i18['article_status'] = 'draft';
            }
            elseif($this->input->post('form_action') == 'publish'){
                $data_i18['article_status'] = 'published';
            }
            elseif($this->input->post('form_action') == 'submit'){
                $data_i18['article_status'] = 'submitted';
            }
            elseif($this->input->post('form_action') == 'approve'){
                $data_i18['article_status'] = 'approved';
            }
            $data['brief_id'] = $brief_id;
            if($article['brief_id']){
                $data['brief_id'] =  $article['brief_id'];
            }
            $article_type = 'lbarticle';
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
            if($form_action == 'approve'){

                $form_action = 'approved';
            }
            $data_i18['article_previous_status'] = $form_action;
            if($previous_status != $form_action && ! empty($previous_status)){

                $data_i18['article_previous_status'] = $previous_status;
            }
            $article_last_insert_id = $this->linkbuilding_article_model->save($data, $id);
            if($this->input->post('form_action')=='submit' || $this->input->post('form_action') == 'savedraft' || $this->input->post('form_action') == 'approve' || $this->input->post('form_action') == 'publish' ){

                if($this->input->post('brief_article_writer')!=''){
                    //pre($this->input->post('brief_article_writer'));
                    $user_already_exist = $this->check_assign_writer($this->input->post('brief_article_writer'),$brief_id);
                    //pre($user_already_exist);
                    if(!$user_already_exist){
                        
                        $user = $this->get_user_info($brief_id, 3);
                        $user_w = $this->get_user_info($brief_id, 0);
                        /*** Send Email ****/
                        $from_email 	  = $this->config->item('emailconfig_from_email');
                        $to_full_name =  $user['user_name'];

                        $to_email 	  = $user['user_email'];
                        $to_email    .= !empty($user_w) ? ','.$user_w['user_email'] : "";
                        $htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
                        $htmlContent .= '<p>Writer is reassigned.</p>';
                        $htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
                        $htmlContent .= '<p>Please assign the writer.</p>';
                        $htmlContent .= '<p>&nbsp;</p>';
                        $htmlContent .= '<p>Thank you,<br>';
                        $htmlContent .= 'The {portal_name} Team</p>';
        
                        $emailer_data['from_name']		 = 'Writer Portal';
                        $emailer_data['from_email']		 = $from_email;
                        $emailer_data['to_name']		 = $to_full_name;
                        $emailer_data['to_email'] 		 = $to_email;
                        $emailer_data['message_subject'] = 'Writer Is Reassigned for Link Building Article To {portal_name} Writer Portal';
                        $emailer_data['message_body'] 	 = $htmlContent;
        
                        $message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
                        $this->send_email($emailer_data, $message);

                    }
                }else{
                    $user = $this->get_user_info($brief_id, $user_type = 3);
                    /*** Send Email ****/
                    $from_email 	  = $this->config->item('emailconfig_from_email');
                    $to_full_name =  $user['user_name'];
                    $to_email 	  = $user['user_email'];
    
                    $htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
                    $htmlContent .= '<p>No writer is assigned.</p>';
                    $htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
                    $htmlContent .= '<p>Please assign the writer.</p>';
                    $htmlContent .= '<p>&nbsp;</p>';
                    $htmlContent .= '<p>Thank you,<br>';
                    $htmlContent .= 'The {portal_name} Team</p>';
    
                    $emailer_data['from_name']		 = 'Writer Portal';
                    $emailer_data['from_email']		 = $from_email;
                    $emailer_data['to_name']		 = $to_full_name;
                    $emailer_data['to_email'] 		 = $to_email;
                    $emailer_data['message_subject'] = 'No Writer Is Assigned for Link Building Article To {portal_name} Writer Portal';
                    $emailer_data['message_body'] 	 = $htmlContent;
    
                    $message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
                    $this->send_email($emailer_data, $message);
                    /*** Send Email End ****/
                    
                }
                $brief_data = array(
                    'brief_notes' => $this->input->post('brief_notes')
                );
                if($user_type == 1 || $user_type == 6 || $user_type == 3){
                    $brief_data['brief_article_writer'] = $this->input->post('brief_article_writer');
                    $brief_data['brief_article_length'] = $this->input->post('brief_article_length');
                }

                if($user_type == 1 || $user_type == 6 ){
                    $brief_data['brief_live_url'] = $this->input->post('brief_live_url');
                }
                //pre_exit($brief_data);
                $this->articlebrief_model->save($brief_data, $brief_id);
            }
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
            $i18_row =  (array) $this->linkbuilding_article_i18_model->get_by($where, TRUE);

            if($i18_row){
                $article_i18_id = $i18_row['article_i18_id'];
                $article_status = $i18_row['article_status'];
            }else{
                $article_i18_id=NULL;  
            }
           
            $this->linkbuilding_article_i18_model->save($data_i18, $article_i18_id);
            //pre($this->db->last_query());
            //pre($this->db->insert_id());
            //die;

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
                        $section_id = $this->linkbuilding_paragraph_model->save($data_paragraph, $section_id);

                        //$where_s   = 'section_id = ' . (int)  $section_id . ' AND language_id = "' . $lang . '"';
                        $where_s   = "section_id = '" . (int)  $section_id . "' AND language_id = '" . $lang . "'";
                        $i18_s_row =  (array) $this->linkbuilding_paragraph_i18_model->get_by($where_s, TRUE);

                        $data_paragraph_i18['section_id']  =  $section_id;
                        $data_paragraph_i18['language_id'] = $lang;
                        if($i18_s_row){
                            $section_i18_id= $i18_s_row['section_i18_id'];
                        }else{
                            $section_i18_id=NULL;  
                        }

                        $this->linkbuilding_paragraph_i18_model->save($data_paragraph_i18, $section_i18_id);
                        $callouts = array();
						if(array_key_exists('callouts', $paragraph)){
                            $callouts = $paragraph['callouts'];
                            $this->linkbuilding_callouts_i18_model->save_article_i18_callouts($callouts, $section_id, $lang);
                        }
					}
                }
            }
            /*** Paragraphs End ****/
             
            if($this->input->post('form_action') == 'publish' &&  ($user_type == 1 || $user_type == 6)){
                $now = date('Y-m-d H:i:s');
                $brief_article_status['brief_article_status'] = 'Published - Live Link.';
                $brief_article_status['brief_publish_date'] = $now;

                $this->articlebrief_model->save($brief_article_status, $brief_id);
                $user = $this->get_user_info($brief_id, $user_type = 3);
                /*** Send Email ****/
                $from_email 	  = $this->config->item('emailconfig_from_email');
				$to_full_name =  $user['user_name'];
				$to_email 	  = $user['user_email'];

				$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
				$htmlContent .= '<p>A link building article has been published by ' . $this->session->userdata('email')  . '.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>Link is live, please review and perform action accordingly.</p>';
				$htmlContent .= '<p>&nbsp;</p>';
				$htmlContent .= '<p>Thank you,<br>';
				$htmlContent .= 'The {portal_name} Team</p>';

				$emailer_data['from_name']		 = 'Writer Portal';
				$emailer_data['from_email']		 = $from_email;
				$emailer_data['to_name']		 = $to_full_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = 'Link Building Article Published To {portal_name} Writer Portal';
				$emailer_data['message_body'] 	 = $htmlContent;

                $message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
				$this->send_email($emailer_data, $message);
                /*** Send Email End ****/
				$this->session->set_flashdata('formPublished', 'true');
                
            }
            if ($this->input->post('form_action') == 'submit' &&  $user_type != 5 ) {

                $brief_article_status['brief_article_status'] = 'Waiting for content coordinator to approve article.';

                $this->articlebrief_model->save($brief_article_status, $brief_id);
                $user = $this->get_user_info($brief_id, $user_type = 3);
                /*** Send Email ****/
                $from_email 	  = $this->config->item('emailconfig_from_email');
				$to_full_name =  $user['user_name'];
				$to_email 	  = $user['user_email'];

				$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
				$htmlContent .= '<p>A link building article has been submitted by ' . $this->session->userdata('email')  . '.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>Please review and perform action accordingly.</p>';
				$htmlContent .= '<p>&nbsp;</p>';
				$htmlContent .= '<p>Thank you,<br>';
				$htmlContent .= 'The {portal_name} Team</p>';

				$emailer_data['from_name']		 = 'Writer Portal';
				$emailer_data['from_email']		 = $from_email;
				$emailer_data['to_name']		 = $to_full_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = 'Link Building Article Submitted To {portal_name} Writer Portal';
				$emailer_data['message_body'] 	 = $htmlContent;

                $message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
				$this->send_email($emailer_data, $message);
                /*** Send Email End ****/
                
				$this->session->set_flashdata('formSubmitted', 'true');

            }
            if ($this->input->post('form_action') == 'approve' &&  ($user_type == 1 || $user_type == 3 || $user_type == 6)) {

				$brief_article_status['brief_article_status'] = 'Waiting for outreach coordinator to publish article.';

                $this->articlebrief_model->save($brief_article_status, $brief_id);
                $user = $this->get_user_info($brief_id, $user_type = 6);
                /*** Send Email ****/
                $from_email   = $this->config->item('emailconfig_from_email');
				$to_full_name =  $user['user_name'];
				$to_email 	  = $user['user_email'];

				$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
				$htmlContent .= '<p>An article has been approved by ' . $this->session->userdata('email')  . '.</p>';
				$htmlContent .= '<p><strong>Title:</strong> ' . $article_title . '</p>';
				$htmlContent .= '<p>Please review and perform action accordingly.</p>';
				$htmlContent .= '<p>&nbsp;</p>';
				$htmlContent .= '<p>Thank you,<br>';
				$htmlContent .= 'The {portal_name} Team</p>';

				$emailer_data['from_name']		 = 'Writer Portal';
				$emailer_data['from_email']		 = $from_email;
				$emailer_data['to_name']		 = $to_full_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = 'Link Building Article Approved For {portal_name} Writer Portal';
				$emailer_data['message_body'] 	 = $htmlContent;

				$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
				$this->send_email($emailer_data, $message);
                /*** Send Email End ****/
				$this->session->set_flashdata('formApproved', 'true');

            }elseif( $this->input->post('form_action') == 'publish' &&  $id){
                //$this->session->set_flashdata('warning', '<strong class="alert-link">' . $article_title . '</strong> has been Published!');
			}else {
				$this->session->set_flashdata('success', '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $article_title . '</span> has been updated!');
			}
            if ($this->user_model->loggedin()) {
                redirect('secure/articlesbrief', 'refresh');
            }
        } else {

        }
        $keyword = $article['article_title'];
        if($article['article_meta_keyword']){
            $keyword = $article['article_meta_keyword'];
        }
        $this->data['article_languages'] =  $language_array;
        $this->data['subview'] = 'secure/link_building_article/lbarticle_i18';
		$this->data['meta_title'] = 'Link Building Article';
        $this->data['github_repo'] = $this->article_model->get_github_repo();
        $this->data['websites'] = (array) $this->get_product_id_list();
        $this->data['languages'] = $this->article_model->get_languages();
        $this->data['writers'] = $this->writers_list();
        $this->data['brief'] = $this->getArticleBriefInfo($brief_id);
        $this->data['brief_backlinks'] = $this->getArticleBriefBacklinksInfo($brief_id);
        $keyword = $article['article_title'];
        if($this->data['brief_backlinks']){
            $keyword = $this->data['brief_backlinks'][0]['backlink_anchortext'];
        }
        $this->data['optimizecontent'] = $this->get_link_building_optimizecontent_keyword_list($brief_id, $lang, $keyword);
        //pre_exit($this->data['optimizecontent']);
        $this->load->view('_main_layout', $this->data);
    }

    public function getLinkBuildingOptimizeContent(){
        if ($this->input->is_ajax_request()){ 
            $this->load->library('parser');
            $article_id = $this->input->post('article_id');
            $lang_id = $this->input->post('lang_id');
			$keyword = $this->input->post('keyword');
			$content = $this->input->post('content');
			$remove_array = array("<br><br><br>","<br><br>","<br>","<br/>","<br />","<br></br>", "&nbsp;");
			$content = str_replace($remove_array, " ", $content);
			$json_data = $this->get_link_building_optimizecontent_keyword_list($article_id, $lang_id, $keyword, $content);
			$data['optimizecontent'] = $json_data;
			$dataArray = ['success' => true];
			$dataArray['newContent'] = $this->parser->parse('component/optimizecontent_lb', $data, TRUE);
			$dataArray['json_data'] = $json_data;
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($dataArray));
        }
    }

    public function i18($lang = 'en', $brief_id, $id= NULL){
        //echo $lang;
       if($id){
        $is_admin = $this->session->userdata('is_admin');
        if (!$this->user_model->loggedin() && !$is_admin) {
            redirect('/', 'refresh');
        }
        $id || show_404(uri_string());
        $this->index($lang, $brief_id, $id);
        //$this->article_model->getArticle( $id, $lang );
       }else{

        $this->index($lang, $brief_id, $id=NULL);
       }
    }
    public function getArticleBriefInfo($brief_id){

        $this->db->select("*");
		$this->db->from('link_briefs');
		$this->db->where('brief_id', $brief_id);
        $result = (array) $this->db->get()->row();
        return $result;
		
		/*foreach ($result_array as $row) {
			$link_brief_backlinks_data_save = array(
				'brief_id' => $last_insert_id,
				'backlink_anchortext' => $row['article_anchortext'],
				'backlink_url' => $row['article_wp_url']
			);
			$this->articlebriefbacklink_model->save($link_brief_backlinks_data_save, $backlink_id);
        }
        
        $ArticleBriefInfo = $this->articlebrief_model->getArticleBriefInfo($brief_id);
        pre($ArticleBriefInfo);
        echo json_encode($ArticleBriefInfo);*/
        
    }

    public function getArticleBriefBacklinksInfo($brief_id){


        $this->db->select("*");
		$this->db->from('link_brief_backlinks');
		$this->db->where('brief_id', $brief_id);
        $result_array = (array) $this->db->get()->result_array();
        
        
        return $result_array;
		
		/*foreach ($result_array as $row) {
			$link_brief_backlinks_data_save = array(
				'brief_id' => $last_insert_id,
				'backlink_anchortext' => $row['article_anchortext'],
				'backlink_url' => $row['article_wp_url']
			);
			$this->articlebriefbacklink_model->save($link_brief_backlinks_data_save, $backlink_id);
        }
        
        $ArticleBriefInfo = $this->articlebrief_model->getArticleBriefInfo($brief_id);
        pre($ArticleBriefInfo);
        echo json_encode($ArticleBriefInfo);*/
        
    }

    public function writers_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 4);
		$this->db->or_where('user_type', 0);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
		$return_array[''] =  '---select---';
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }

        return $return_array;
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

    public function get_user_info($brief_id, $user_type){
        $this->db->select("*");
        $this->db->from('link_campaigns');
        $this->db->join(
            'link_briefs',
            "link_briefs.campaign_id = link_campaigns.campaign_id"
        );
        $this->db->where('link_briefs.brief_id', $brief_id);
        $campaign = (array) $this->db->get()->row();
        // pre($this->db->last_query());
         if($user_type == 6){

            $user_id = $campaign['campaign_outreach_coordinator'];

         }
         if($user_type == 3){

            $user_id = $campaign['campaign_content_coordinator'];

         }
         if($user_type == 0 || $user_type == 4){

            $user_id = $campaign['campaign_writer'];

         }

        $this->db->select("*");
        $this->db->from('article_user');
        $this->db->where('user_id', $user_id);
        $user = (array) $this->db->get()->row();
       
        return $user;

    }

    public function check_assign_writer($user_id,$brief_id){
        $this->db->select("*");
        $this->db->from('link_briefs');
        $this->db->where('link_briefs.brief_article_writer', $user_id);
        $this->db->where('link_briefs.brief_id',$brief_id);
        $writer = (array) $this->db->get()->row();
        // pre($this->db->last_query());
        if(!empty($writer)){
           return true ;
        }else{
           return false ; 
        }

    }

    public function get_link_building_optimizecontent_keyword_list($article_id, $lang_id, $keyword, $content = Null )
    {
		$log_message = 'Link Building Optimize Content Log Start'  .PHP_EOL;
		$this->db->select("article_content_performance");
		$this->db->where('article_id', (int) $article_id);
		$this->db->where('language_id', $lang_id);
		$result_array = $this->db->get('link_articles_translate_i18')->result_array();
		$article_content_performance = $result_array ? $result_array[0]['article_content_performance'] : "";
		$response = json_decode($article_content_performance, true);
		if($content){
			$no_of_search_count = 20;
			$content = strip_tags($content);
			/* API URL */
			$url = 'https://wplseotools.hubworks.com/keywordphrase';
			//$url = 'https://whookqa.hubworks.com/keywordphrase';
			/* Init cURL resource */
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			/* Array Parameter Data */
			$data_array = array(
				'keyword'=>$keyword,
				'page_content'=>$content,
				'page_id'=> "lb_".$article_id,
				'lang'=>$lang_id,
				'no_of_search_count'=>$no_of_search_count
			);
			$log_message .= 'Api url = ' . $url . PHP_EOL;
		    $log_message .= 'keyword = ' . $keyword . PHP_EOL;
			$log_message .= 'page_content = ' . $content . PHP_EOL;
			$log_message .= 'page_id = lb_' . $article_id . PHP_EOL;
			$log_message .= 'lang = ' . $lang_id . PHP_EOL;
			$log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
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
            //pre($output);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				//echo $httpCode;
			$log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
			if($output === false)
			{
				$log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
			}
			else
			{
                //pre($output);
				$log_message .= 'Curl Response = ' . $output . PHP_EOL;
                $result = json_decode($output, true);
                //pre_exit($result);
				if($result['result']){
					$data = array(
						'article_content_performance_temp' =>$output
					);
					$this->db->update('link_articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));

					$log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
				}
				$log_message .= 'Optimize Content Log End'  .PHP_EOL;
				$this->writeLog($log_message);
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
				'page_id'=>"lb_".$article_id,
				'lang'=>$lang_id,
				'no_of_search_count'=>$no_of_search_count
			);
			$log_message .= 'Api url = ' . $url . PHP_EOL;
		    $log_message .= 'keyword = ' . $keyword . PHP_EOL;
			$log_message .= 'page_content = ' . $content . PHP_EOL;
			$log_message .= 'page_id = lb_' . $article_id . PHP_EOL;
			$log_message .= 'lang = ' . $lang_id . PHP_EOL;
			$log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
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
					$this->db->update('link_articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));

					$log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
				}
				$log_message .= 'Optimize Content Log End'  .PHP_EOL;
				$this->writeLog($log_message);
				 return json_decode($output, true);
			}
			/* close cURL resource */
			curl_close($ch);
		}
		//$log_message .= 'Optimize Content Log End'  .PHP_EOL;
		//$this->writeLog($log_message);
	}

}
