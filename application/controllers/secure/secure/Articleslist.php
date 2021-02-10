<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Articleslist extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
		$this->load->model('user_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
    }

    public function index()
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_id = $this->data['user_id'];
		$user_type = $this->data['user_type'];
        if ($this->data['is_admin']) {
            $user_id = null;
		}
		if($user_type == 5 || $user_type == 6)
		{
			redirect('secure/linkbuilding','refresh');
		}
		else
		{
			$this->data['github_repo'] = $this->article_model->get_github_repo();
			$this->data['languages'] = $this->article_model->get_languages();
			$this->data['users'] = $this->article_model->get_users($user_type, $user_id);
			$this->data['subview'] = 'secure/articleslist/index';
			$this->load->view('_main_layout', $this->data);
		}
    }

    public function modal()
    {
        //$this->load->view('admin/_layout_modal', $this->data);
	}

	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$articles = $this->article_model->get_datatables($post_array);
		//pre_exit($articles);
		$columns = array(
			array("title"=>'Website'),
			array("title"=>'Writer'),
			array("title"=>'Headline'),
			array("title"=>'Content  / Target (Score)'),
			array("title"=>'Article Type'),
			array("title"=>'Date')
		);

		$has_draft = false;
        $data = array();
        foreach ($articles as $article) {
			$row = array();
			//pre($article);

			$date_modified = $article->date_added;
			if($article->article_date && $article_status='published'){
				//$date_modified = $article->article_date;
			}

			$article_status		 = strtolower($article->article_status);
			$article_type		 = strtolower($article->article_type);
			$article_status_str  = '<div class="media article-status-media article-' . $article_status .'">';
			$article_status_str .= '<div class="media-left">';
			$article_status_str .= '<span class="rounded-circle icon-box" data-toggle="tooltip" title="'.ucfirst($article_type).'">';
			$article_status_str .= '<span class="icon-box-text">';
			$article_status_str .= ($article_type ? ucwords($article_type[0]) : '');
			$article_status_str .= '</span>';
			$article_status_str .= '</span>';
			$article_status_str .= '</div>';
			$article_status_str .= '<div class="media-body">';
			$article_status_str .= '<span class="d-block">';
			$article_status_str .= ucwords($article_status) . PHP_EOL;
			//$article_status_str .= ($article->article_skyscraper ? 'Skyscraper' : '');
			$article_status_str .= '</span>';
			$article_status_str .= '<abbr class="d-block text-muted" title="'.$date_modified.'">';
			$article_status_str .= nice_date($date_modified, 'Y-m-d');
			$article_status_str .= '</abbr>';
			$article_status_str .= '</div>';
			$article_status_str .= '</div>';

			$user_image = base_url() . 'assets/images/icons/nobody.jpg';
			if($article->user_image && file_exists(FCPATH . $article->user_image))
				$user_image = base_url() . $article->user_image .'?id='.time();

			$user_full_name = '<span class="text-light p-0">--</span>';
			if($article->user_fname || $article->user_lname){
				$user_full_name = ucwords($article->user_fname . ' ' . $article->user_lname);
			}

			$full_name  = '<div class="user-avatar cell-detail user-info">';
			$full_name .= '<img class="mt-0 mt-md-2 mt-lg-0" src="'. $user_image .'" alt="Avatar" title="'. $user_full_name . ' ('. $article->user_email. ')">';
			$full_name .= '<span title="'. $user_full_name . '">'. $user_full_name . '</span>';
			//$full_name .= '<span class="cell-detail-description" title="'. $article->user_email. '">'. $article->user_email. '</span>';
			switch ($article->user_type) {
				case "1":
					$user_type =  'Administrator';
					$user_type_class="label-admin";
				  break;
				case "2":
					$user_type =  'Administrator';
					$user_type_class="label-admin";
				  break;
				case "3":
					$user_type =  'Publisher';
					$user_type_class="label-pub";
				  break;
				case "4":
					$user_type =  'Staff Writer';
					$user_type_class="label-staff";
					break;
				default:
				$user_type =  'Contributor';
				$user_type_class="label-other";
			  }
			 $full_name .= '<span class="label-sm '. $user_type_class . '">'.$user_type.'</span>';
			$full_name .= '</div>';

			$dropdown_item_attr  = 'class="dropdown-item"';
			$dropdown_item_attr .= 'data-toggle="confirmation"';
			$dropdown_item_attr .= 'data-confirm-callback="datatableReload"';
			$dropdown_item_attr .= 'data-cancel-text="Cancel"';
			$dropdown_item_attr .= 'data-cancel-callback="dismissConfirmation"';
			$dropdown_item_attr .= 'data-cancel-class="btn-default"';
			$dropdown_item_attr .= 'data-target="#article_list_table"';

			$delbutton ='';
			if($this->session->userdata('is_admin')){
			if ($article_status == 'deleted') {
				//$dropdown_item_attr .= 'href="' . site_url('/secure/articleslist/restore_all_article/'. $article->article_id) . '"';
				$dropdown_item_attr .= 'href="' . site_url('/secure/articleslist/restore_article/'. $article->language_id .'/'. $article->article_id) . '"';
				$dropdown_item_attr .= 'data-icon-type="warning"';
				$dropdown_item_attr .= 'data-title="Are you sure ?"';
				$dropdown_item_attr .= 'data-message="The article will be Restore."';
				$dropdown_item_attr .= 'data-confirm-text="Restore"';
				$dropdown_item_attr .= 'data-confirm-class="btn-warning"';
				$del_btn_text 	= '<span><i class="fas fa-undo-alt text-info"></i><span> Restore</span></span>';
			} else {
				//$dropdown_item_attr .= 'href="' . site_url('/secure/articleslist/delete_all_article/'. $article->article_id) . '"';
				$dropdown_item_attr .= 'href="' . site_url('/secure/articleslist/delete_article/'. $article->language_id .'/'. $article->article_id) . '"';
				$dropdown_item_attr .= 'data-icon-type="error"';
				$dropdown_item_attr .= 'data-title="Delete this Article?"';
				$dropdown_item_attr .= 'data-message="If published, the article will be removed from the website on the next update."';
				$dropdown_item_attr .= 'data-confirm-text="Delete"';
				$dropdown_item_attr .= 'data-confirm-class="btn-danger"';
				$del_btn_text 	= '<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>';
			}
			$delbutton  = '<a '. $dropdown_item_attr . '>' . $del_btn_text . '</a>';
			}

			$controler_name = strtolower($article->article_type);

			if ($controler_name == 'news') {
				$controler_name = 'pressrelease';
			}

			$actions = '';
			$actions .= '<div class="btn-group-xs">';
			$actions .= '<div class="dropdown">';
			$actions .= '<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>';
			$actions .= '<div class="dropdown-menu">';
			$actions .= '<a class="dropdown-item text-primary" href="' . site_url($controler_name . '/i18/'.$article->language_id.'/' . $article->article_id) . '">';
			$actions .= '<i class="fas fa-pencil-alt"></i> Edit';
			$actions .= '</a>';
			$actions .= $delbutton;
			$actions .= '</div>';
			$actions .= '</div>';
			$actions .= '</div>';

			$article_website = '';
			if($article->article_website){
				$article_website 	 .= '<div class="d-block">';
				$article_website 	 .= '<span class="css-truncate css-truncate-target d-block"><b>Submitted:</b> ' . str_replace("null", "", $article->article_website)  .'</span>';
				if($article->article_status=='published'){
					$article_website .= '<span class="css-truncate css-truncate-target d-block"><b>Published:</b> ' . str_replace("null", "", $article->article_published_website)  .'</span>';
				}
				$article_website 	 .= '</div>';
			}
			$score ='';
			$score .= '<div  class="text-center mt-1">';
			$content_score_class = 'text-primary';
			$target_score_class='text-primary';
			$content_score_arrow ='';
			if($article->article_content_score > $article->article_target_score){
				$content_score_class = 'text-success';
				$content_score_arrow ='<i class="fas fa-long-arrow-alt-up"></i>';
			}else{
				$content_score_class='text-danger';
				$content_score_arrow='<i class="fas fa-long-arrow-alt-down"></i>';
			}
			if($article->article_content_score!=null){
				$score .=  '<span class="'.$content_score_class.'"><strong>' . $content_score_arrow .' ' . $article->article_content_score . '</strong></span>';
			}
			if($article->article_target_score!=null){
				$score .= ' / <span class="'.$target_score_class.'"><strong>'. $article->article_target_score .'</strong></span>';
			}
			$score .= '</div>';
			//Backlinks
			$backlink_count ='';
			$backlink_count .= '<div  class="text-center mt-1">';
			$backlink_count_class = 'text-primary';
			$backlink_target_count_class='text-primary';
			$backlink_count_arrow ='';
			if($article->article_backlinks_count > $article->article_backlinks_target_count){
				$backlink_count_class = 'text-success';
				$backlink_count_arrow ='<i class="fas fa-long-arrow-alt-up"></i>';
			}else{
				$backlink_count_class='text-danger';
				$backlink_count_arrow='<i class="fas fa-long-arrow-alt-down"></i>';
			}
			if($article->article_backlinks_count!=null){
				$backlink_count .=  '<span class="'.$backlink_count_class.'"><strong>' . $backlink_count_arrow .' ' . $article->article_backlinks_count . '</strong></span>';
			}
			if($article->article_backlinks_target_count!=null){
				$backlink_count .= ' / <span class="'.$backlink_target_count_class.'"><strong>'. $article->article_backlinks_target_count .'</strong></span>';
			}
			$backlink_count .= '</div>';
			$languages_array = $this->article_model->get_languages();
			$article_title = preg_replace('!\s+!', ' ', $article->article_title);
			$row['article_website'] = $article->article_site_id;
			$row['full_name'] = preg_replace('!\s+!', ' ', $full_name);
            $row['article_title'] = $article_title;
			$row['article_content_score'] = $score;
			$row['article_backlinks_count'] = $backlink_count;
            $row['article_type'] = ucwords(str_replace("null", "", $article->article_type));
			$row['article_status'] = preg_replace('!\s+!', ' ', $article_status_str);
			$row['article_action'] = preg_replace('!\s+!', ' ', $actions);
			if($article_status == 'draft'){
				$has_draft = true;
			}
            $data[] = $row;
		}

		$show_action = true;


        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->article_model->count_all($post_array),
			"recordsFiltered" => $this->article_model->count_filtered($post_array),
			"data" => $data,
			"columns" => $columns,
			"show_action" => $show_action
		);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($output));
    }
    public function article_list()
    {
        $results = $this->article_model->get_items();
	}

	public function delete_article($language_id, $id)
    {

        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
		$id || show_404(uri_string());

		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];
		if ($this->input->is_ajax_request()) {
			
			//$where = "language_id='".$language_id."' AND article_id = '".$id."'";
			$where_s = "language_id='en' AND article_id = '".$id."'";
			$where = "article_id = '".$id."'";
			$data_article_en = (array) $this->article_i18_model->get_by($where_s, TRUE);
			//pre($data_article_en);
			$data_article_i18_array = (array) $this->article_i18_model->get_by_array($where);
			foreach($data_article_i18_array as $data_article_i18){
				//pre($data_article_i18);
				$article_i18_id = $data_article_i18['article_i18_id'];
				//pre($data_article_i18['article_status']); 
				if($data_article_i18['article_status'] == 'published'){
					$data['article_previous_status'] = 'submitted';
				}else{
					$data['article_previous_status'] = $data_article_i18['article_status'];
				}

				$data['article_status'] = 'deleted';
				$this->article_i18_model->save($data, $article_i18_id);
				//$this->article_i18_model->save($data, $id);
				//pre($this->db->last_query());
			}
			$data_promo = [
				'article_published_status' => false,
				'msg_datetime_published' => NULL
			];
			//$where_promo = "article_language_id='".$language_id."' AND article_id = '".$id."'";
			$where_promo = "article_id = '".$id."'";
			$data_promo_messages = $this->promotion_model->get_by_array($where_promo);
			//pre($data_promo_messages);
			foreach($data_promo_messages as $data_promo_message){
				$msg_id = $data_promo_message['msg_id'];
				//pre($msg_id);
				$this->promotion_model->save($data_promo, $msg_id);
			}
			//$this->article_i18_model->save($data, $id);
			//pre($this->db->last_query());
            
			if ($this->db->affected_rows()) {
				if($data_article_en['article_status'] == 'published'){
					$language_array = array("en","fr","de","it","ja","es");
                    foreach ($language_array  as $key => $value) {
                        $language_id = $value;
						$this->deletePublishedArticle($id, $language_id);
					}
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'info',
					'message'     => 'The article will be removed from the website on next update.'
				];

				}else{
					$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'info',
						'message'     => 'The article removed from the writer portal.'
					];
				}
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
    }

    public function restore_article($language_id, $id)
    {
        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
		$id || show_404(uri_string());

		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];
		if ($this->input->is_ajax_request()) {
			//$where = "language_id='".$language_id."' AND article_id = '".$id."'";
			$where = "article_id = '".$id."'";
			//$data_article_i18 = (array) $this->article_i18_model->get_by($where, TRUE);
			$data_article_i18_array = (array) $this->article_i18_model->get_by_array($where);
			foreach($data_article_i18_array as $data_article_i18){
			
				$article_i18_id = $data_article_i18['article_i18_id'];
			
				$data['article_status'] = $data_article_i18['article_previous_status'];

				if($data_article_i18['article_previous_status']=='published'){
					$data['article_status'] = 'submitted';
				}
				//if($data_article_i18['article_previous_status']=='deleted'){
					//$data['article_status'] = 'submitted';
				//}
				//pre($data['article_status']);			
				$this->article_i18_model->save($data, $article_i18_id);
				//pre($this->db->last_query());
			}
			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'warning',
					'message'     => 'The article is restored.'
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}
	public function delete_all_article($id)
    {

        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
		$id || show_404(uri_string());

		if ($this->input->is_ajax_request()) {
			
			$where = "article_id = '".$id."'";
			$data_article_i18 = $this->article_i18_model->get_by($where);

			foreach($data_article_i18 as $article_i18_row){
				$this->delete_article( $article_i18_row->language_id, $article_i18_row->article_id);
			}

			
		}

    }
	public function restore_all_article($id)
    {
        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
		$id || show_404(uri_string());

		if ($this->input->is_ajax_request()) {

			
			$where = "article_id = '".$id."'";
			$data_article_i18 = $this->article_i18_model->get_by($where);

			foreach($data_article_i18 as $article_i18_row){
				$this->restore_article( $article_i18_row->language_id, $article_i18_row->article_id);
			}
		}

	}

	public function delete_paragraph($language_id, $section_id)
    {
		//pre_exit($language_id);
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($section_id > 0){
			$this->load->model('paragraph_model');
			$this->paragraph_model->deleteArticleParagraph($section_id, $language_id);
			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "Paragraph has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}
    public function delete_socialmedia_section($id)
    {
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($id > 0){
			$this->load->model('promotion_model');
			$this->promotion_model->delete($id);
			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "Social Media Post has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}

	public function delete_callout($language_id, $callout_id)
    {
		//pre_exit($language_id);
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($callout_id > 0){
			$this->load->model('callouts_i18_model');
			$this->callouts_i18_model->deleteArticleCallout($callout_id, $language_id);
			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "Callout has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}

}

