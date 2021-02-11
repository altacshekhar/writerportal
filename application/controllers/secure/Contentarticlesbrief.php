<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contentarticlesbrief extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model('keyword_model');
		$this->load->model('article_model');
		$this->load->model('article_i18_model');
		$this->load->model('paragraph_i18_model');
		$this->load->model('paragraph_model');
        $this->load->model('articlemaster_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
		$this->load->model('articlecategory_model');
		$this->load->model('contentarticlesbrief_model');
		$this->load->model('contentarticlebrief_paragraph_model');
		$this->load->model('contentarticlebrief_cta_model');
		$this->load->model('cta_model');
		$this->load->library('Pdf');
		$this->load->helper("file");
		//$this->data['websites'] = $this->articlebrief_model->get_github_repo();

    }

    public function index($keyword_id = NULL)
    {
		//pre_exit($this->session->userdata());
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		/*$rules = array(
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

		}*/
	    $this->data['subview'] = 'secure/contentarticlebrief/add';
        $this->load->view('_main_layout', $this->data);

    }

    public function add($keyword_id, $id = NULL)
    {
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
        if ($id) {
			$this->data['articlesbrief'] = (array) $this->contentarticlesbrief_model->get($id);
			$this->data['articlebrief_paragraph'] = $this->contentarticlebrief_paragraph_model->get_by(['brief_id' => $id]);
			$this->data['articlebrief_cta'] = $this->contentarticlebrief_cta_model->get_by(['brief_id' => $id]);
			if(!$this->data['articlesbrief']['brief_primary_keyword'])
				$this->data['articlesbrief']['brief_primary_keyword'] = $this->get_keyword($keyword_id);
        } else {
			$this->data['articlesbrief'] = $this->contentarticlesbrief_model->get_new();
			$this->data['articlesbrief']['brief_primary_keyword'] = $this->get_keyword($keyword_id);
			$this->data['articlebrief_paragraph'] = [];
			$this->data['articlebrief_cta'] = [];
		}
		$this->data['articlesbrief']['website'] = $this->get_website($keyword_id);
		$keyword_analysis = [];
		$keyword_data = $this->keyword_model->get($keyword_id,true);
		if($keyword_data)
			$keyword_analysis = json_decode($keyword_data->keyword_analysis,true);
		$this->data['keyword_analysis'] = $keyword_analysis;
		$website = $this->get_brief_website($keyword_id);
		$this->data['cta_data'] = $this->cta_model->get_by(['cta_website' => $website]);
		$rules = $this->contentarticlesbrief_model->rules_brief;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'brief_primary_keyword',
				'brief_article_icon',
				'brief_article_site_structure',
				'brief_article_type',
				'brief_article_permalink',
				'brief_created_by',
				'brief_headline',
				'brief_introduction',
				'brief_body_outline',
				'brief_demographics',
				'brief_think_now',
				'brief_want_them',
				'brief_strength',
				'brief_get_across',
				'brief_psycho_fears',
				'brief_psycho_pain_points',
				'brief_psycho_wants',
				'brief_psycho_goals'
			);
			$data = $this->contentarticlesbrief_model->array_from_post($post_array);
			$data['keyword_id'] = $keyword_id;
			$data['brief_language_id'] = 'en';
			$now = date('Y-m-d H:i:s');
			$last_insert_id = $this->contentarticlesbrief_model->save($data, $id);
			$brief_id = $last_insert_id;
			if($id)
			{
				$brief_id = $id;
			}
			/* New Article Creation on Assigning Writer */
			$article_id = null;
			$is_article_creation = $this->input->post('submitForm');
			if($is_article_creation == "assign_writer")
			{
				$data['brief_word_length'] = $this->input->post('brief_word_length');
				$data['brief_assigned_to'] = $this->input->post('brief_assigned_to');

				if($this->input->post('brief_article_site_structure') == 'cluster'){

					$data['brief_article_type'] = $this->input->post('articleClusterType');
					$data['brief_article_site_structure'] = $this->input->post('brief_article_site_structure');
					if($this->input->post('articleClusterType') == 'pillar'){
						$data['brief_article_permalink'] = $this->create_unique_slug(slugify(trim($this->input->post('brief_primary_keyword'))));

					}elseif($this->input->post('articleClusterType') == 'supporting'){
						if($this->input->post('brief_article_pillar')){
							$brief_article_pillar = explode("/",$this->input->post('brief_article_pillar'));
							   $brief_primary_keyword =  $brief_article_pillar[0].'/'.slugify(trim($this->input->post('brief_primary_keyword')));
							$data['brief_article_permalink'] = $this->create_unique_slug($brief_primary_keyword);
							$data['brief_article_pillar_id'] = $brief_article_pillar[1];
							$save_article_i18['article_pillar_id'] = $brief_article_pillar[1];
 						}
					}
				}elseif($this->input->post('brief_article_site_structure') == 'blog'){
					$data['brief_article_type'] = $this->input->post('articleBlogType');
					$data['brief_article_category'] = $this->input->post('brief_article_category');
					$data['brief_article_tags'] = $this->input->post('brief_article_tags');
					$data['brief_article_site_structure'] = $this->input->post('brief_article_site_structure');

					if($this->input->post('brief_article_skyscraper') == 'true'){
						$data['brief_article_skyscraper'] = $this->input->post('brief_article_skyscraper');
					}
				}
				if(array_key_exists('article_id',$this->input->post()))
				{
					$article_id = $this->input->post('article_id');
				}
				$assigned_user_id = $this->input->post('brief_assigned_to');
				$assign_user_data = $this->user_model->get($assigned_user_id);
				$save_article['user_id'] = $assigned_user_id;
				$save_article['site_id'] = $website; //$this->input->post('brief_website');
				$save_article['article_type'] = $data['brief_article_type'];
				$save_article['article_author'] = $assign_user_data->user_fname.' '.$assign_user_data->user_lname;
				$save_article['article_category'] = $data['brief_article_category'];
				$save_article['article_published_website'] = $this->input->post('brief_website');
				if (!$id) {
					$data['brief_created_date'] = $now;
				}
				$this->contentarticlesbrief_model->save($data, $brief_id);
				$save_article['article_brief_id'] = $brief_id;
				$last_article_id = $this->article_model->save($save_article,$article_id);
				if($last_article_id)
				{
					$save_article_i18['article_permalink'] = $data['brief_article_permalink'];
					//$save_article_i18['article_pillar_id'] = $this->input->post('brief_article_pillar_id');
					$save_article_i18['article_site_structure_type'] = $this->input->post('brief_article_site_structure');
					$save_article_i18['article_site_id'] = $website;//$this->input->post('brief_website');
					$save_article_i18['article_meta_product_id'] = get_product_id($website);
					$save_article_i18['meta_product_unique_key'] = get_product_id($website);
					$save_article_i18['article_meta_author'] = '';
					$save_article_i18['article_icon'] =  $this->input->post('brief_article_icon');
					$save_article_i18['article_permalink'] = $data['brief_article_permalink'];
					$save_article_i18['article_status'] = 'content brief';
					$save_article_i18['keywords'] =  $this->input->post('brief_primary_keyword');
					$save_article_i18['article_meta_keyword'] =  $this->input->post('brief_primary_keyword');
					$save_article_i18['article_title'] = $data['brief_headline'];
					$save_article_i18['article_description'] = $data['brief_introduction'];
					$save_article_i18['language_id'] = 'en';
					$save_article_i18['article_id'] = $last_article_id;
					$this->article_i18_model->save($save_article_i18);
					$article_id = $last_article_id;
				}
			}
			$article_section = [];
			$article_section_i18 = [];
			$rules = $this->contentarticlebrief_paragraph_model->rules_paragraph;
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() === true) {
				$para_title = $this->input->post('paragraph_title');
				$para_heading = $this->input->post('headings');
				$brief_para_ids = [];
				if(array_key_exists('brief_para_id',$this->input->post()))
				{
					$brief_para_ids = $this->input->post('brief_para_id');
				}
				for($i = 0; $i < count($para_title); $i++)
				{
					if($para_title[$i])
					{
						$brief_para_id = null;
						$save_brief_para['paragraph_title'] = $para_title[$i];
						$save_brief_para['heading'] = $para_heading[$i];
						$save_brief_para['brief_id'] = $brief_id;
						$brief_para_id = array_key_exists($i,$brief_para_ids) ? $brief_para_ids[$i] : null;
						$this->contentarticlebrief_paragraph_model->save($save_brief_para,$brief_para_id);
						$save_brief_para = [];
						if($is_article_creation == "assign_writer")
						{
							$section_id = $this->paragraph_model->save(['language_id' => 'en','article_id' => $last_article_id]);
							$section_i18 = ['section_id' => $section_id,'section_heading_type' => $para_heading[$i],'language_id' => 'en','section_title' => $para_title[$i]];
							$section_i18['section_meta_video_name'] = '';
							$section_i18['section_meta_video_description'] = '';
							$section_i18['section_meta_video_url'] = '';
							$section_i18['section_meta_video_thumbnail_1x1'] = '';
							$section_i18['section_meta_video_thumbnail_4x3'] = '';
							$section_i18['section_meta_video_thumbnail_16x9'] = '';
							$section_i18['section_meta_video_uploaddate'] = '';
							$section_i18['section_meta_video_minutes'] = '';
							$section_i18['section_meta_video_seconds'] = '';
							$section_i18['section_meta_video_interaction_count'] = '';
							$section_i18['section_meta_video_expires'] = '';
							$section_i18['section_image_attribution'] = '';
							$this->paragraph_i18_model->save($section_i18);
						}
					}
				}
			}
			/* cta data insert to article brief cta table */
			$brief_post_array = array(
				'cta_id',
				'brief_cta_language_id',
				'brief_cta_headline',
				'brief_cta_sub_headline',
				'brief_cta_website',
				'brief_cta_type',
				'brief_cta_button_text',
				'brief_cta_button_color',
				'brief_cta_background_type',
				'brief_cta_background',
				'brief_cta_background_image',
				'brief_cta_background_color',
				'brief_cta_background_video',
				'brief_cta_form_id'
			);
			$brief_data = $this->contentarticlebrief_cta_model->array_from_post($brief_post_array);

			if($brief_data)
			{
				$brief_cta = $brief_data['cta_id'];
				$brief_cta_ids = [];
				if(array_key_exists('brief_cta_id',$this->input->post()))
				{
					$brief_cta_ids = $this->input->post('brief_cta_id');
				}
				for($i = 0; $i < count($brief_cta); $i++)
				{
					if($brief_cta[$i])
					{
						$brief_cta_id = null;
						$save_brief_cta['cta_id'] = $brief_cta[$i];
						$save_brief_cta['brief_cta_language_id'] = $brief_data['brief_cta_language_id'][$i];
						$save_brief_cta['brief_cta_headline'] = $brief_data['brief_cta_headline'][$i];
						$save_brief_cta['brief_cta_sub_headline'] = $brief_data['brief_cta_sub_headline'][$i];
						$save_brief_cta['brief_cta_website'] = $brief_data['brief_cta_website'][$i];
						$save_brief_cta['brief_cta_site_id'] = $brief_data['brief_cta_website'][$i];
						$save_brief_cta['brief_cta_product_id'] = get_product_id($brief_data['brief_cta_website'][$i]);
						$save_brief_cta['brief_cta_type'] = $brief_data['brief_cta_type'][$i];
						$save_brief_cta['brief_cta_button_text'] = $brief_data['brief_cta_button_text'][$i];
						$save_brief_cta['brief_cta_button_color'] = $brief_data['brief_cta_button_color'][$i];
						$save_brief_cta['brief_cta_background_type'] = $brief_data['brief_cta_background_type'][$i];
						$save_brief_cta['brief_cta_background'] = $brief_data['brief_cta_background'][$i];
						$save_brief_cta['brief_cta_background_image'] = $brief_data['brief_cta_background_image'][$i];
						$save_brief_cta['brief_cta_background_color'] = $brief_data['brief_cta_background_color'][$i];
						$save_brief_cta['brief_cta_background_video'] = $brief_data['brief_cta_background_video'][$i];
						$save_brief_cta['brief_cta_form_id'] = $brief_data['brief_cta_form_id'][$i];
						$save_brief_cta['article_id'] = $article_id;
						$save_brief_cta['brief_id'] = $brief_id;
						$brief_cta_id = array_key_exists($i,$brief_cta_ids) ? $brief_cta_ids[$i] : null;
						$this->contentarticlebrief_cta_model->save($save_brief_cta,$brief_cta_id);
						$save_brief_cta = [];
					}
				}
			}
			$key_data_save = array();
			$key_data_save['status'] = 3; //status: 3 => 'Brief submitted. Ready for writer to submit article.'
			$this->keyword_model->save($key_data_save, $keyword_id);
			if(!$id){
				$user_id = $this->input->post("brief_assigned_to");
				if($user_id){
					$user = $this->get_user_info($user_id);
					/*** Send Email ****/
					$from_email 	  = $this->config->item('emailconfig_from_email');
					$to_full_name = $user['user_name'];
					$to_email 	  = $user['user_email'];

					$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
					$htmlContent .= '<p>A New article assigned by ' . $this->session->userdata('email')  . '.</p>';
					$htmlContent .= '<p>Waiting for writer to submit article.</p>';
					$htmlContent .= '<p>&nbsp;</p>';
					$htmlContent .= '<p>Thank you,<br>';
					$htmlContent .= 'The {portal_name} Team</p>';

					$emailer_data['from_name']		 = 'Writer Portal';
					$emailer_data['from_email']		 = $from_email;
					$emailer_data['to_name']		 = $to_full_name;
					$emailer_data['to_email'] 		 = $to_email;
					$emailer_data['message_subject'] = 'Article Brief Created For {portal_name} Writer Portal';
					$emailer_data['message_body'] 	 = $htmlContent;

					$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
					$briefdata['brief'] = $data;
					$html = $this->load->view('secure/contentarticlebrief/pdf', $briefdata, TRUE);
					$filename = FCPATH.'/data/'. slugify($this->input->post('brief_primary_keyword')).'-'.$last_insert_id.'.pdf'; ;
					$this->pdf->loadHtml($html);
					$this->pdf->setPaper('A4','portrait');//landscape
					$this->pdf->render();
					$output = $this->pdf->output();
					file_put_contents($filename, $output);
					$send = $this->send_email($emailer_data, $message, $filename);
					/*** Send Email End ****/
					if($send){
						delete_files($filename);
					}

				}
				$this->session->set_flashdata('success', '<span class="font-weight-bold alert-link css-truncate css-truncate-target"></span> Article Brief has been created!');

			}elseif($id){
				$this->session->set_flashdata('success', '<span class="font-weight-bold alert-link css-truncate css-truncate-target"></span> Article Brief has been updated!');
			}

			if ($this->user_model->loggedin()) {
				redirect('secure/keyword', 'refresh');
			}
		}
		$this->data['keyword_id'] = $keyword_id;
		$this->data['writers'] = $this->get_user_list();
		$this->data['optimizecontent'] = $this->get_brief_keyword_list($keyword_id);
		//pre_exit($this->data['optimizecontent']);
		$this->data['pillar_list'] = $this->article_model->get_pillar_article($website);
        $this->data['subview'] = 'secure/contentarticlebrief/add';
        $this->load->view('_main_layout', $this->data);
    }

    public function edit($id = null)
    {
		if(!$id && !$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}

	public function get_keyword($keyword_id)
    {
		$this->load->model('keyword_model');
		//$this->db->where('user_id', $user_id);
		$keyword = (array) $this->keyword_model->get($keyword_id, true);
        return $keyword['keyword'];
	}

	public function get_website($keyword_id)
    {
		$this->load->model('keyword_model');
		//$this->db->where('user_id', $user_id);
		$keyword = (array) $this->keyword_model->get($keyword_id, true);
        return $keyword['website'];
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

	public function get_user_info($user_id)
	{
		$this->load->model('user_model');
		//$this->db->where('user_id', $user_id);
		$user = (array) $this->user_model->get($user_id, true);
        return $user;
	}

	public function get_brief_keyword_list($keyword_id)
    {

		$this->db->select("keyword_content_performance");
		$this->db->where('keyword_id', (int) $keyword_id);
		$result_array = $this->db->get('article_keyword')->result_array();
		$keyword_content_performance = $result_array[0]['keyword_content_performance'];
		$response = json_decode($keyword_content_performance, true);
		return $response;
	}

	public function get_brief_website($keyword_id)
    {
		$this->db->select("website");
		$this->db->where('keyword_id', (int) $keyword_id);
		$website = $this->db->get('article_keyword')->row()->website;
		return $website;
	}

	public function export_article_brief($id)
	{
		$this->load->library('Pdf');
		$data['brief'] = $brief = $this->contentarticlesbrief_model->get_article_brief($id);
		$html = $this->load->view('secure/contentarticlebrief/pdf', $data, TRUE);
		$filename = slugify($brief['brief_primary_keyword']).'-'.$id.'.pdf';
		$this->pdf->loadHtml($html);
		// $customPaper = array(0,0,570,570);
		//$this->pdf->set_paper($customPaper);
		$this->pdf->setPaper('A4','portrait');//landscape
		$this->pdf->render();
		$this->pdf->stream($filename, array('Attachment'=>1));
		//'Attachment'=>0 for view and 'Attachment'=>1 for download file
		//pre($brief);
	}

	public function saveMasterArticle($id = null, $lang = 'en', $json_output=true)
    {
        $return['is_redirect'] = 'no';
        if ($this->user_model->loggedin()) {
				$briefid = $this->input->post("article_brief");
                $data = [];
                $data_i18  = [];
                $search = array("http://", "https://", "www.");
				$website = rtrim(str_replace($search, "", site_url()),"/");
				$data['article_website'] = $website;
				$brief = $this->contentarticlesbrief_model->get_article_brief($briefid);
                //$data['site_id'] = $this->input->post('website');
                $data['user_id'] = $this->session->userdata('id');
                $data['article_author'] = $this->session->userdata('full_name');
				$data['article_brief_id'] = $brief['brief_id'];
				$data_i18['keywords'] = trim(ucwords($brief['brief_primary_keyword']));
				$data_i18['article_meta_keyword'] = trim(ucwords($brief['brief_primary_keyword']));


                $data_i18['article_site_id'] = $brief['website'];
                $data_i18['language_id'] = $lang;
                $data_i18['article_status'] = 'draft';
                $data_i18['article_title'] = '';
                $data_i18['article_description'] = '';
                if($brief['brief_article_site_structure'] == 'cluster'){

                    $data['article_type'] = $brief['brief_article_type'];
                    $data_i18['article_site_structure_type'] = $brief['brief_article_site_structure'];

                    if($brief['brief_article_type'] == 'pillar'){
                        $data_i18['article_permalink'] = $this->create_unique_slug(slugify(trim($brief['brief_primary_keyword'])));

                    }elseif($brief['brief_article_type'] == 'supporting'){
					    $brief_article_permalink = explode("/", $brief['brief_article_permalink']);
						$article_permalink = $brief_article_permalink[0].'/'.slugify(trim($brief['brief_primary_keyword']));
						$data_i18['article_permalink'] = $this->create_unique_slug($article_permalink);
                    }

                }elseif($brief['brief_article_site_structure'] == 'blog'){

                    $data['article_type'] = $brief['brief_article_type'];
                    $data['article_category'] = $brief['brief_article_category'];
                    $data_i18['article_tags'] = $brief['brief_article_tags'];
                    $data_i18['article_site_structure_type'] = $brief['brief_article_site_structure'];

                    if($brief['brief_article_skyscraper'] == 'true'){

                        $data_i18['article_skyscraper'] = $brief['brief_article_skyscraper'];

                    }
                }

                if($brief['brief_article_icon']){

                    $data_i18['article_icon'] = $brief['brief_article_icon'];

                }
                if($brief['website']){
                    $website_id = $brief['website'];
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
                    if($brief['brief_article_site_structure'] == 'cluster' && $brief['brief_article_type'] == 'pillar'){

                        $data_i18['article_pillar_id'] = $article_last_insert_id;

                    }
                    if($brief['brief_article_site_structure'] == 'cluster' && $brief['brief_article_type'] == 'supporting'){

						$data_i18['article_pillar_id'] = $brief['brief_article_pillar_id'];

                    }

					//$this->db->insert('articles_translate_i18', $data_i18);
					$this->article_i18_model->save($data_i18, null);
					$data_brief_update = array(
						"brief_status" => true
					);
					$this->contentarticlesbrief_model->save($data_brief_update, $brief['brief_id']);

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
            $this->output->set_content_type('application/json')->set_output(json_encode($return));
        }else{
            return $return;
        }

	}

	public function test(){
		$slug = $this->create_unique_slug($string='staffing/business-crisis-management');
		//$brief = $this->contentarticlesbrief_model->get_article_brief(1);
		pre($slug);
	  }

	public function create_unique_slug($slug, $table='articles_translate_i18', $field='article_permalink', $key=NULL, $value=NULL)
	{
		$i = 0;
		$params = array ();
		$params[$field] = $slug;

		if($key)$params["$key !="] = $value;

		while ($this->db->where($params)->get($table)->num_rows())
		{
			if (!preg_match ('/-{1}[0-9]+$/', $slug ))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );

			$params [$field] = $slug;
		}
		return $slug;
	}

	public function loadeditedPreview()
	{
		$cta_data = $this->input->post();
		echo '<button type="button" class="btn btn-sm mb-1 btn-secondary show-brief-cta" data-cta-id="'.$cta_data['cta_id'].'">Edit CTA</button>';
		echo $this->load->view('component/cta_preview',$cta_data,true);
		$cta_data = ['cta_data' => $cta_data];
		echo $this->load->view('secure/contentarticlebrief/add-cta-form',$cta_data,true);
	}

	public function getCtaLookUpData()
	{
		$cta_id = $this->input->post('cta_id');
		$cta_seq = $this->input->post('cta_seq');
		$cta_data = $this->cta_model->get($cta_id);
		$cta_data->cta_seq = $cta_seq;
		//pre_exit($cta_data);
		echo $this->load->view('secure/contentarticlebrief/cta_form',['cta_data' => $cta_data],TRUE);
	}

	public function list_of_article()
	{
		$articles = $this->article_i18_model->get_by(['article_status' => 'published','article_site_structure_type' => 'cluster','language_id' => 'en']);
		$data['articles'] = $articles;
		$this->load->view('secure/articleslist/list_of_article',$data);
	}

}
