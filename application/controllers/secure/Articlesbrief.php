<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Articlesbrief extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('articlebrief_model');
		$this->load->model('articlebriefbacklink_model');
		$this->load->model('linkbuilding_article_model');
        $this->load->model('linkbuilding_article_i18_model');
        $this->load->model('linkbuilding_paragraph_model');
        $this->load->model('linkbuilding_paragraph_i18_model');
        $this->load->model('linkbuilding_callouts_i18_model');
		
		$this->data['websites'] = $this->articlebrief_model->get_github_repo();
       
    }

    public function index()
    {
		$this->load->model('campaign_model');
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_type = $this->session->userdata('user_type');
		if($user_type == 5)
		{
			redirect('secure/publishers','refresh');
		}
		$this->data['subview'] = 'secure/articlebrief/index';
		$this->data['campaigns'] = $this->campaign_model->get_by([]); 
		$this->load->view('_main_layout', $this->data);
        
    }

    public function add($id = NULL)
    {
        //pre($_POST);
        if ($id) {
            $this->data['campaign'] = (array) $this->campaign_model->get($id);
        } else {
            $this->data['campaign'] = $this->campaign_model->get_new();
        }
        $rules = $this->campaign_model->rules_campaign;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'campaign_name',
				'campaign_budget',
				'campaign_quantity',
				'campaign_startdate',
				'campaign_enddate',
				'campaign_notes',
				'campaign_websites',
				'campaign_niche',
				'campaign_type',
				'campaign_content_coordinator',
				'campaign_outreach_coordinator',
				'campaign_writer',
				'campaign_status'
			);
            $data = $this->campaign_model->array_from_post($post_array);
			if ($this->input->post("campaign_niche[]")) {
                $data['campaign_niche'] = implode(",",$this->input->post("campaign_niche[]"));
			}

			if ($this->input->post("campaign_websites[]")) {
                $data['campaign_websites'] = implode(",",$this->input->post("campaign_websites[]"));
			}
			$now = date('Y-m-d H:i:s');
			if (!$id) {
				$data['campaign_createddate'] = $now;
			}
			
			pre($data);
			$last_insert_id = $this->campaign_model->save($data, $id);
            

			if($error){
				
			}else{

				if ($last_insert_id) {
					if($id && $this->user_is_admin){
						$this->session->set_flashdata('success', '<strong>'.$data['campaign_name'].'</strong> has been updated!');
						$redirect_path = 'secure/campaigns';
					}else if($this->user_is_admin){
						$redirect_path = 'secure/campaigns';
						$this->session->set_flashdata('success', '<strong>'.$data['campaign_name'].'</strong> has been created!');
					}else if($id && !$this->user_is_admin){
						$this->session->set_flashdata('success', '<strong>Campaign</strong> has been updated!');
						$redirect_path = 'secure/campaign/edit/' . $id;
					}else{
						$this->session->set_flashdata('error', 'You do not have access to the requested area/action.');
						$redirect_path = '/';
					}
					redirect($redirect_path, 'refresh');
				}
				//redirect("secure/user/edit/$last_insert_id", 'refresh');
			}
		}
        $this->data['subview'] = 'secure/campaign/add';
        $this->load->view('_main_layout', $this->data);
       
    }
    
    public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}

	public function ajax_list()
    {
		$post_array = $_POST;
		$articlebrief_rows = $this->articlebrief_model->get_datatables($post_array);
        $data = array();
		$no = $post_array['start'];
		$user_info = $this->get_user_info($this->session->userdata('id'));
        foreach ($articlebrief_rows as $articlebrief_row) {
            $no++;
            $row = array();
			$delbutton = '';
			$export_url = "";
			$user_type = $user_info['user_type'];
			if($articlebrief_row->brief_id && ($user_type == 1 || $user_type == 6))
			{
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/linkbuildingarticle/delete/' . $articlebrief_row->brief_id .'/'.$articlebrief_row->article_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this Article?"
					data-message="Article will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#articlebrief_list_table">
					<span class="text-danger"><i class="fas fa-trash-alt"></i><span> Delete</span></span>
				</a>';
			}
			if ($articlebrief_row->article_id){
				
				$article_url = $articlebrief_row->language_id.'/'.$articlebrief_row->brief_id .'/'. $articlebrief_row->article_id;
				$export_url = '<a class="dropdown-item text-secondary" href="' . site_url('secure/linkbuildingarticle/exporthtmlzip/'. $article_url) . '">'.
								'<i class="fas fa-download"></i> Export Zip'.
							'</a>';
			}else{
				$article_url = 'en/'.$articlebrief_row->brief_id;
			}
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/linkbuildingarticle/i18/'. $article_url) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'. $export_url.$delbutton.
						'</div>'.
					'</div>'.
				'</div>';
			$full_name  = '<div class="user-avatar cell-detail user-info text-left">';
			if($articlebrief_row->brief_article_writer)
			{
				$writer = $this->get_user_info($articlebrief_row->brief_article_writer);
				$full_name .= '<span title="">'. ucwords($writer['user_name']) . '</span>';
			}
			if($articlebrief_row->campaign_content_coordinator)
			{
				$c_coordinator = $this->get_user_info($articlebrief_row->campaign_content_coordinator);
				$full_name .= '<span title="">'. ucwords($c_coordinator['user_name']) . '</span>';
			}
			if($articlebrief_row->campaign_outreach_coordinator)
			{
				$outreach = $this->get_user_info($articlebrief_row->campaign_outreach_coordinator);
				$full_name .= '<span title="">'. ucwords($outreach['user_name']) . '</span>';
			}
			$full_name .= '</div>';
			if($articlebrief_row->article_status != "deleted")
			{
				$row[] 	= nice_date($articlebrief_row->brief_assign_date, 'Y-m-d');
				$row[] 	= $full_name;
				$row[] 	= $this->get_domain($articlebrief_row->publisher_url);
				$row[] 	= $articlebrief_row->campaign_name;
				$row[] 	= ucwords($articlebrief_row->article_title);
				$row[] 	= $articlebrief_row->brief_article_status;
				$row[] 	= $actions;
				$data[] = $row;
			}
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->articlebrief_model->count_all($post_array),
			"recordsFiltered" => $this->articlebrief_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function articles_build_backlinks_list()
	{
		
		$websites = $this->input->post("websites");
		//pre($websites);
		
		$this->db->select("*");
		$this->db->from('articles_translate_i18');
		$this->db->where('article_status', 'published');
		$this->db->where('language_id', 'en');
		$this->db->group_start();
        foreach ($websites  as $website) {
			$this->db->or_where('article_site_id', $website);
		}
		$this->db->group_end();
		$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		$result_array = $this->db->get()->result_array();
		//pre($this->db->last_query());
		//pre($result_array);
		$response = '';
		foreach ($result_array  as $result) {

			$response .= '<tr>';
			$response .= '<th scope="row">'.$result['article_site_id'].'</th>';
			$response .= '<td>'.$result['article_title'].'</td>';
			$response .= '<td>'.$result['publish_date'].'</td>';
			$response .= '<td>'.$result['article_meta_keyword'].'</td>';
			$response .= '<td>'.$result['article_content_score'].'</td>';
			$response .= '<td>'.$result['article_backlinks_count']. '/'.$result['article_backlinks_target_count'].'</td>';
			$response .= '<td>'.$result['article_site_id'].'</td>';
			$response .= '<td><a href="#newconsdfds" class="selected">Select</a></td>';
			$response .= '</tr>';
		}
		echo $response;
	}
	public function assignArticle(){
		$this->input->post("brief_writer_id");
		$publisher_id = $this->input->post("brief_publisher_id");
		$campaign_id = $this->input->post("brief_campaign_id");
		$id = null;
		$now = date('Y-m-d H:i:s');
		  $article_status ='Waiting for content coordinator to assign writer';
		if($this->input->post("brief_article_writer")){
		  $article_status ='Waiting for writer to submit article';
		}
		$assign_article_data_save = array(
			'campaign_id' => $campaign_id,
			'publisher_id' => $publisher_id,
			'brief_article_writer' => $this->input->post("brief_article_writer"),
			'brief_article_length' => $this->input->post("brief_article_length"),
			'brief_article_cost' => $this->input->post("brief_article_cost"),
			'brief_notes' => $this->input->post("brief_article_note"),
			'brief_article_status' => $article_status,
			'brief_assign_date' => $now 

		);
		//pre($assign_article_data_save);
		//die;
		$last_insert_id = $this->articlebrief_model->save($assign_article_data_save, $id);

		$this->db->select("*");
		$this->db->from('link_wp_articles');
		$this->db->where('campaign_id', $campaign_id);
		$result_array = $this->db->get()->result_array();
		$backlink_id = null;
		foreach ($result_array as $row) {
			$link_brief_backlinks_data_save = array(
				'brief_id' => $last_insert_id,
				'backlink_anchortext' => $row['article_anchortext'],
				'backlink_url' => $row['article_wp_url']
			);
			$this->articlebriefbacklink_model->save($link_brief_backlinks_data_save, $backlink_id);
        }
		
		
	}


	public function delete_assigned_article(){
		$brief_id = $this->input->post("brief_id");
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($brief_id > 0){
				$data = array(
					'publisher_id' => null,
				);
		
		$this->db->where('brief_id', $brief_id);
		$this->db->update('link_briefs', $data);
			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "Assigned article has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));

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
			$data_article_en = (array) $this->linkbuilding_article_i18_model->get_by($where_s, TRUE);
			//pre($data_article_en);
			$data_article_i18_array = (array) $this->linkbuilding_article_i18_model->get_by_array($where);
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
				$this->linkbuilding_article_i18_model->save($data, $article_i18_id);
				//pre($this->db->last_query());
			}
			
            
			if ($this->db->affected_rows()) {
				if($data_article_en['article_status'] == 'published'){
					$language_array = array("en","fr","de","it","ja","es");
                   /*foreach ($language_array  as $key => $value) {
                        $language_id = $value;
						$this->deletePublishedArticle($id, $language_id);
					}*/
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
			//$data_article_i18 = (array) $this->linkbuilding_article_i18_model->get_by($where, TRUE);
			$data_article_i18_array = (array) $this->linkbuilding_article_i18_model->get_by_array($where);
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
				$this->linkbuilding_article_i18_model->save($data, $article_i18_id);
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

	public function delete_paragraph($language_id, $section_id)
    {
		//pre_exit($language_id);
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($section_id > 0){
			$this->load->model('linkbuilding_paragraph_model');
			$this->linkbuilding_paragraph_model->deleteArticleParagraph($section_id, $language_id);
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

	public function delete_callout($language_id, $callout_id)
    {
		//pre_exit($language_id);
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];

		if($callout_id > 0){
			$this->load->model('linkbuilding_callouts_i18_model');
			$this->linkbuilding_callouts_i18_model->deleteArticleCallout($callout_id, $language_id);
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

	public function get_user_info($user_id){
		$this->load->model('user_model');
		//$this->db->where('user_id', $user_id);
		$user = (array) $this->user_model->get($user_id, true);
        return $user;
	}

	private function get_domain($url)
	{
	  $pieces = parse_url($url);
	  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
	  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
		return $regs['domain'];
	  }
	  return '';
	}

	public function report()
	{
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$this->data['subview'] = 'secure/articlebrief/report-articlebrief';
		$this->data['user'] = $this->writer_list();
        $this->load->view('_main_layout', $this->data);
	}

	public function writer_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 0);
		$this->db->or_where('user_type', 4);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }
        return $return_array;
	}

	public function ajax_report_articlebrief()
	{
		$this->load->model('articlebrief_report_model');
		$post_array = $_POST;
		$articlebrief_rows = $this->articlebrief_report_model->get_datatables($post_array);
		$data = array();
		$no = $post_array['start'];
		foreach ($articlebrief_rows as $articlebrief_row) {
			$no++;
			$row = array();
			// $publisher_urls = $publisher_row->publisher_url;
			$article_titles = $articlebrief_row->article_title;
			$view = '<a href="javascript:void(0)" class="view-link-articles" data-input="'.$article_titles.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Articles"><span class="fa fa-eye"></span></a>';
			$row[] 	= $articlebrief_row->user_name;
			$row[] 	= $articlebrief_row->draft + $articlebrief_row->pending;
			$row[] 	= $articlebrief_row->submitted;
			$row[] 	= $articlebrief_row->approved;
			$row[] 	= $articlebrief_row->published;
			$row[] = $view;
			$data[] = $row;
		}
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->articlebrief_report_model->count_all($post_array),
			"recordsFiltered" => $this->articlebrief_report_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
}
