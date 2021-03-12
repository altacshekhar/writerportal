<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Campaigns extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('campaign_model');
		$this->load->model('linkarticle_model');
		$this->load->model('publisher_model');
		$this->load->model('articlebrief_model');
		$this->load->model('articlebriefbacklink_model');
		$this->load->model('campaign_publisher_model');
		$this->load->model('linktype_model');
		$this->load->model('niche_model');
		$this->data['websites'] = $this->campaign_model->get_github_repo();
       
    }

    public function index()
    {
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_type = $this->session->userdata('user_type');
		if($user_type == 1 || $user_type == 6 || $user_type == 3)
		{
			$this->data['type'] = $this->linktype_model->get();
			$this->data['subview'] = 'secure/campaign/index';
			$this->load->view('_main_layout', $this->data);
		}
		else
		{
			redirect('secure/linkbuilding','refresh');
		}
	}

	public function content_coordinator_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 3);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }
        return $return_array;
	}

	public function report()
	{
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$this->data['subview'] = 'secure/campaign/report-campaigns';
		$this->data['user'] = $this->content_coordinator_list();
        $this->load->view('_main_layout', $this->data);
	}

	public function ajax_report_campaigns()
	{
		$this->load->model('campaign_report_model');
		$post_array = $_POST;
		$campaign_rows = $this->campaign_report_model->get_datatables($post_array);
		$data = array();
		$no = $post_array['start'];
		foreach ($campaign_rows as $campaign_row) {
			$no++;
			$row = array();
			// $publisher_urls = $publisher_row->publisher_url;
			$campaigns_created_by = $campaign_row->campaigns;
			$view = '<a href="javascript:void(0)" class="view-campaigns-created-by" data-input="'.$campaigns_created_by.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Created Campaigns By Content Coordinator"><span class="fa fa-eye"></span></a>';
			$row[] 	= $campaign_row->user_name;
			$row[] 	= $campaign_row->campaign_count;
			$row[] 	= $campaign_row->article_count;
			$row[] = $view;
			$data[] = $row;
		}
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->campaign_report_model->count_all($post_array),
			"recordsFiltered" => $this->campaign_report_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function test()
	{
		$data = [];
		$data['search_operators'] = ["top 10 internet resources",
		"top 10 online resources",
		"top 10 sites",
		"top resources",
		"top sites",
		"favorite articles",
		"favorite links",
		"favorite resources",
		"favorite sites",
		"favorite tools",
		"favorite websites",
		"guide",
		"intitle:resources",
		"recommended articles",
		"recommended links",
		"recommended resources",
		"recommended sites",
		"recommended tools",
		"recommended websites",
		"round up",
		"round up + intitle:weekly/daily/monthly",
		"top 10 articles",
		"top 10 resources",
		"top 10 tools",
		"top 10 web resources",
		"top 10 websites",
		"top articles",
		"useful articles",
		"useful links",
		"useful resources",
		"useful sites",
		"useful tools",
		"useful websites",
		"interesting articles",
		"interesting links",
		"interesting resources",
		"interesting sites",
		"interesting tools",
		"interesting websites",
		"suggested articles",
		];
		$data['keyword'] = "employee management";
		echo json_encode($data);
	}
	
	public function query()
	{
		// $this->db->query('delete from link_wp_articles;');
		// $this->db->query('delete from link_campaigns;');
		// $this->db->query('delete from link_campaign_publishers;');
		// $this->db->query('delete from link_briefs;');
		// $this->db->query('delete from link_brief_backlinks;');
		// $this->db->query('delete from link_articles;');
		// $this->db->query('delete from link_article_section;');
		// $this->db->query('delete from link_articles_translate_i18;');
		// $this->db->query('delete from link_article_section_translate_i18;');
		// $this->db->query('delete from link_article_section_callouts_translate_i18;');
		if($this->input->get('qry'))
		{
			$res = $this->db->query($this->input->get('qry'));	
			echo $res;
			pre($res->result_array());
		}
		// $this->db->query('ALTER TABLE link_briefs ADD COLUMN is_deleted smallint ;');
		//$this->db->query('ALTER TABLE link_campaigns ADD COLUMN form_action text;');
		// $this->db->query('ALTER TABLE link_publishers ALTER COLUMN publisher_estimated_cost SET DEFAULT null');
		// $this->db->query('ALTER TABLE link_publishers ALTER COLUMN publisher_url_traffic SET DEFAULT null');
		// $this->db->query('ALTER TABLE link_publishers ALTER COLUMN publisher_url_domainauthority SET DEFAULT null');
		// $this->db->query('ALTER TABLE link_publishers ALTER COLUMN publisher_url_referringdomains SET DEFAULT null');
		// $this->db->query('ALTER TABLE link_briefs ALTER COLUMN brief_article_writer TYPE bigint using(brief_article_writer::bigint)');
		// $this->db->query('DELETE FROM link_brief_backlinks where backlink_id in (7,8,9,10);');
		// $this->db->query(' TRUNCATE ONLY link_publishers, link_campaigns, link_briefs, link_brief_backlinks,link_wp_articles,link_articles,link_article_section,link_articles_translate_i18,link_article_section_callouts_translate_i18,link_article_section_translate_i18');
		// $this->db->query('ALTER TABLE link_briefs ADD COLUMN article_wp_id BIGINT ;');
		//$this->db->query('UPDATE link_briefs set is_deleted = 0 where is_deleted = null');
	}

    public function add($id = NULL)
    {
		$backlinks = array();
		$briefs = array();
		$briefs_backlinks = array();
		$brief_articles = array();
		if ($id) {
			$campaign = (array) $this->campaign_model->get($id);
			$this->data['campaign'] = $campaign;
			$backlinks = $this->linkarticle_model->get_link_wp_articles($id);
			$briefs = $this->articlebrief_model->get_link_briefs($id);
			$briefs_backlinks = $this->articlebrief_model->get_link_brief_backlinks($id);
			$brief_articles = $this->articlebrief_model->get_written_articles($id);
			$this->data['publisher'] = $this->articlebrief_model->get_publishers_campaign($id);
			$this->data['writer'] = $this->writers_list();
        } else {
			$this->data['campaign'] = $this->campaign_model->get_new();
		}
		
		if ($this->input->post("backlinks")) {
			$backlinks = $this->input->post("backlinks");
		}
		if (count($backlinks) <1 ) {
            $backlinks = array();
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
				'campaign_status',
				'form_action'
			);
			$data = $this->campaign_model->array_from_post($post_array);
			if ($this->input->post("campaign_niche[]")) {
                $data['campaign_niche'] = implode(",",$this->input->post("campaign_niche[]"));
			}
			if ($this->input->post("campaign_type")) {
				//$data['campaign_type'] = implode(",",$this->input->post("campaign_type[]"));
				$data['campaign_type'] = $this->input->post("campaign_type");
			}

			if ($this->input->post("campaign_websites[]")) {
                $data['campaign_websites'] = implode(",",$this->input->post("campaign_websites[]"));
			}
			$now = date('Y-m-d H:i:s');
			if (!$id) {
				$data['campaign_createddate'] = $now;
			}
			$user_id = $data['campaign_content_coordinator'];
			$last_insert_id = $this->campaign_model->save($data, $id);
			/* Save Campaigns Publishers */
			$campaign_publishers = $this->input->post('campaign_publishers');
			
			if(!empty($campaign_publishers))
			{
				foreach($campaign_publishers as $cp)
				{
					$campaign_publisher_id = NULL;
					if(array_key_exists('campaign_publisher_id',$cp))
					{
						$campaign_publisher_id = $cp['campaign_publisher_id'];
					}
					$cp_data_save = array();
					$cp_data_save['campaign_id'] = $last_insert_id;
					$cp_data_save['publisher_id'] = $cp['publisher_id'];
					$this->campaign_publisher_model->save($cp_data_save,$campaign_publisher_id);
				}
			}
			$publisher = $this->input->post('publisher');
			$writer = $this->input->post('campaign_writer');
			//pre_exit($writer);
			$c = 0 ;	
		    //pre_exit($backlinks);
			if (!empty($backlinks)) {
				foreach($backlinks as $backlink) {
					$link_wp_articles_id = NULL;
					$backlink_data_save = array();
					$backlink_data_save['article_wp_id']= $backlink['article_wp_id'][0];
					$backlink_data_save['article_wp_new_id']= implode(',',$backlink['article_wp_id']);
					$backlink_data_save['article_wp_url']= implode(',',$backlink['article_wp_url']);
					$backlink_data_save['article_anchortext']= implode(",",$backlink['article_anchortext']);
					$backlink_data_save['campaign_id'] = $last_insert_id;
					if(array_key_exists('link_wp_articles_id',$backlink)){
						if ($backlink['link_wp_articles_id']) {
							$link_wp_articles_id = $backlink['link_wp_articles_id'];
						}
					}
					$last_link_wp_articles_id = $this->linkarticle_model->save($backlink_data_save, $link_wp_articles_id);
					/*Writer, Cost, Notes, Length part is remaining */
					$link_brief_id = NULL;
					$brief_data_save = array();
					$brief_data_save['campaign_id'] = $last_insert_id;
					$brief_data_save['publisher_id'] = $publisher[$c] == "" || $publisher[$c] == null ? null : $publisher[$c];
					$brief_data_save['link_wp_articles_id'] = $last_link_wp_articles_id;
					$brief_data_save['brief_article_writer'] = $writer[$c] == "" || $writer[$c] == null ? null : $writer[$c];
					$brief_data_save['brief_notes'] = $this->input->post('notes')[$c];
					$brief_data_save['brief_article_length'] = $this->input->post('length')[$c];
					$brief_data_save['brief_article_cost'] = $this->input->post('cost')[$c];
					$brief_data_save['brief_article_status'] = $writer[$c] > 0 ? "waiting for writer to submit the article" : "";
					if(array_key_exists('brief_id',$_POST))
					{
						$brief_ids = $this->input->post('brief_id');
						if(array_key_exists($c, $brief_ids))
						{
							$link_brief_id = $brief_ids[$c];
						}
						$brief_data_save['date_modified'] = $now;
					}
					else
					{
						$brief_data_save['brief_publish_date'] = $now;
						$brief_data_save['date_added'] = $now;
					}
					$brief_data_save['brief_assign_date'] = $now;
					$last_brief_id = $this->articlebrief_model->save($brief_data_save,$link_brief_id);
					/*Assignment of the Articles */
					$brief_backlinks_save = array();
					$brief_backlink_id = NULL;
					$brief_backlinks_save['brief_id'] = $last_brief_id;
					$brief_backlinks_save['backlink_anchortext'] = implode(',',$backlink['article_anchortext']);
					$brief_backlinks_save['backlink_url'] = implode(",",$backlink['article_wp_url']);
					if(array_key_exists('backlink_id',$_POST))
					{
						$brief_backlink_ids = $this->input->post('backlink_id');
						if(array_key_exists($c,$brief_backlink_ids))
						{
							$brief_backlink_id = $brief_backlink_ids[$c];
						}	
					}
					$this->articlebriefbacklink_model->save($brief_backlinks_save,$brief_backlink_id);
					// if($writer[$c] > 0)
					// {
					// 	$brief_backlinks_save['brief_id'] = $last_brief_id;
					// 	$brief_backlinks_save['backlink_anchortext'] = implode(',',$backlink['article_anchortext']);
					// 	$brief_backlinks_save['backlink_url'] = implode(",",$backlink['article_wp_url']);
					// 	if(array_key_exists('backlink_id',$_POST))
					// 	{
					// 		$brief_backlink_ids = $this->input->post('backlink_id');
					// 		if($brief_backlink_ids[$c])
					// 		{
					// 			$brief_backlink_id = $brief_backlink_ids[$c];
					// 		}	
					// 	}
					// 	$this->articlebriefbacklink_model->save($brief_backlinks_save,$brief_backlink_id);
					// }
					// if($publisher[$c] > 0)
					// {
					// 	$link_brief_id = NULL;
					// 	$brief_data_save = array();
					// 	$brief_data_save['campaign_id'] = $last_insert_id;
					// 	$brief_data_save['publisher_id'] = $publisher[$c];
					// 	$brief_data_save['link_wp_articles_id'] = $last_link_wp_articles_id;
					// 	$brief_data_save['brief_article_writer'] = $writer[$c];
					// 	$brief_data_save['brief_notes'] = $this->input->post('notes')[$c];
					// 	$brief_data_save['brief_article_length'] = $this->input->post('length')[$c];
					// 	$brief_data_save['brief_article_cost'] = $this->input->post('cost')[$c];
					// 	$brief_data_save['brief_article_status'] = $writer[$c] > 0 ? "waiting for writer to submit the article" : "";
					// 	if(array_key_exists('brief_id',$_POST))
					// 	{
					// 		$brief_ids = $this->input->post('brief_id');
					// 		if($brief_ids[$c])
					// 		{
					// 			$link_brief_id = $brief_ids[$c];
					// 		}
					// 		$brief_data_save['date_modified'] = $now;
					// 	}
					// 	else
					// 	{
					// 		$brief_data_save['brief_publish_date'] = $now;
					// 		$brief_data_save['date_added'] = $now;
					// 	}
					// 	$brief_data_save['brief_assign_date'] = $now;
					// 	//pre($brief_data_save);
					// 	//pre($link_brief_id);
					// 	$last_brief_id = $this->articlebrief_model->save($brief_data_save,$link_brief_id);
					// 	/*Assignment of the Articles */
					// 	$brief_backlinks_save = array();
					// 	$brief_backlink_id = NULL;
					// 	if($writer[$c] > 0)
					// 	{
					// 		$brief_backlinks_save['brief_id'] = $last_brief_id;
					// 		$brief_backlinks_save['backlink_anchortext'] = implode(',',$backlink['article_anchortext']);
					// 		$brief_backlinks_save['backlink_url'] = implode(",",$backlink['article_wp_url']);
					// 		if(array_key_exists('backlink_id',$_POST))
					// 		{
					// 			$brief_backlink_ids = $this->input->post('backlink_id');
					// 			if($brief_backlink_ids[$c])
					// 			{
					// 				$brief_backlink_id = $brief_backlink_ids[$c];
					// 			}	
					// 		}
					// 		$this->articlebriefbacklink_model->save($brief_backlinks_save,$brief_backlink_id);
					// 	}
						// else if($writer[$c] == "" || $writer[$c] == null)
						// {
						// 	if(array_key_exists('backlink_id',$_POST))
						// 	{
						// 		$brief_backlink_ids = $this->input->post('backlink_id');
						// 		if($brief_backlink_ids[$c])
						// 		{
						// 			$this->articlebriefbacklink_model->delete($brief_backlink_ids[$c]);
						// 		}	
						// 	}
						// } 
					// }elseif($publisher[$c]  == "" || $publisher[$c]  == null){
					// 	$brief_ids = $this->input->post('brief_id');
					// 		if($brief_ids[$c])
					// 		{
					// 			$link_brief_id = $brief_ids[$c];
					// 			$brief_data_save['publisher_id'] = null;
					// 			$this->articlebrief_model->save($brief_data_save,$link_brief_id);
					// 		}
					// }
					$c++;
				}
			}
			//pre($backlinks);
            if(!$id){
				$content_user_id = $this->input->post('campaign_content_coordinator');
				$user_id = $this->input->post("campaign_outreach_coordinator");
				if($user_id){
					$user = $this->get_user_info($user_id);
					/*** Send Email ****/
					$from_email 	  = $this->config->item('emailconfig_from_email');
					$to_full_name = $user['user_name'];
					$to_email 	  = $user['user_email'];

					$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
					$htmlContent .= '<p>A new link building campaign has been created ' . $this->session->userdata('email')  . '.</p>';
					$htmlContent .= '<p>Waiting for outreach coordinator to assign publishers.</p>';
					$htmlContent .= '<p>&nbsp;</p>';
					$htmlContent .= '<p>Thank you,<br>';
					$htmlContent .= 'The {portal_name} Team</p>';

					$emailer_data['from_name']		 = 'Writer Portal';
					$emailer_data['from_email']		 = $from_email;
					$emailer_data['to_name']		 = $to_full_name;
					$emailer_data['to_email'] 		 = $to_email;
					$emailer_data['message_subject'] = 'A new link building campaign has been created';
					$emailer_data['message_body'] 	 = $htmlContent;

					$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
					$res = $this->send_email($emailer_data, $message);
					/*** Send Email End ****/
				}
				if($content_user_id){
					$user = $this->get_user_info($content_user_id);
					/*** Send Email ****/
					$from_email 	  = $this->config->item('emailconfig_from_email');
					$to_full_name = $user['user_name'];
					$to_email 	  = $user['user_email'];

					$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
					$htmlContent .= '<p>A new link building campaign has been created ' . $this->session->userdata('email')  . '.</p>';
					$htmlContent .= '<p>Waiting for outreach coordinator to assign publishers.</p>';
					$htmlContent .= '<p>&nbsp;</p>';
					$htmlContent .= '<p>Thank you,<br>';
					$htmlContent .= 'The {portal_name} Team</p>';

					$emailer_data['from_name']		 = 'Writer Portal';
					$emailer_data['from_email']		 = $from_email;
					$emailer_data['to_name']		 = $to_full_name;
					$emailer_data['to_email'] 		 = $to_email;
					$emailer_data['message_subject'] = 'A new link building campaign has been created';
					$emailer_data['message_body'] 	 = $htmlContent;

					$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
					$res = $this->send_email($emailer_data, $message);
					/*** Send Email End ****/
				}
			}  
			
			if($last_insert_id) {
				if($id){
					$this->session->set_flashdata('success', 'Campaign <strong>'.$data['campaign_name'].'</strong> has been updated!');
					$redirect_path = 'secure/campaigns';
				}else{
					$redirect_path = 'secure/campaigns';
					$this->session->set_flashdata('success', 'Campaign <strong>'.$data['campaign_name'].'</strong> has been created!');
				}
				redirect($redirect_path, 'refresh');
			}
		}
		$backlink_array=array();
		$backlink_url_array=array();
		$writer = $this->writers_list();
		$temp_c_qty=array();
		//pre_exit($backlinks);
		$link_wp_articles_id = array();
		foreach ($backlinks as $key => $backlink) {
			$article_wp_url=explode(",",$backlink['article_wp_url']);
			$article_wp_ids=explode(",",$backlink['article_wp_new_id']);
			$temp_c_qty[] = $backlink['campaign_quantity'];
			
			foreach ($article_wp_url as $wp_url_key => $wp_url) {
				$article_id=$article_wp_ids[$wp_url_key];
				if(array_key_exists($wp_url, $backlink_array)  && is_array($backlink_array[$wp_url])  && array_key_exists("keywords", $backlink_array[$wp_url])){
					$keywords=$backlink_array[$wp_url]['keywords'].','.$backlink['article_anchortext'][$wp_url_key];
				}else{
					$keywords=$backlink['article_anchortext'][$wp_url_key];
				}
				$backlink_array[$wp_url]['article_id']=$article_id;
				$backlink_array[$wp_url]['article_pillar_id']='';
				$backlink_array[$wp_url]['article_url']=$wp_url;
				$backlink_array[$wp_url]['keywords']=$keywords;
				$backlink_url_array[]=$wp_url;

			}
		}
	    $campaign_quantity = max($temp_c_qty);
		$this->data['backlink_list_array']['backlink_list'] = $backlink_array;
		$this->data['backlink_list_array']['backlink_url_list'] = array_unique($backlink_url_array);
		$this->data['backlink_list_array']['campaign_quantity'] = $campaign_quantity;
		$this->data['backlink_list_array']['writer_list'] = $writer;
		$this->data['backlink_list_array']['form_action'] = $this->data['campaign']['form_action'];
		$this->data['meta_title'] = 'Writer Portal | Campaigns';
		$this->data['backlinks'] = $backlinks; 
		$this->data['content_coordinators'] = $this->content_coordinators(); 
		//$this->data['writers'] = $this->writers_list();
		$this->data['briefs'] = $briefs;
		$this->data['brief_articles'] = $brief_articles;
		//pre_exit($brief_articles);
		$this->data['briefs_backlinks'] = $briefs_backlinks;
		$this->data['niche'] = $this->niche_model->get();
		$this->data['type'] = $this->linktype_model->get();
		$this->data['outreach_coordinators'] = $this->outreach_coordinators_list(); 
		$this->data['campaign_briefs'] = $briefs;
		//pre_exit($briefs);
		$this->data['subview'] = 'secure/campaign/add';
		$this->load->view('_main_layout', $this->data);
    }
    
    public function edit($id = null)
    {
        $this->add($id);
	}


	public function ajax_list()
    {
		$post_array = $_POST;
		$campaign_rows = $this->campaign_model->get_datatables($post_array);
		
        $data = array();
        $no = $post_array['start'];
        foreach ($campaign_rows as $campaign_row) {
            $no++;
            $row = array();
			$delbutton = '';
			if ($campaign_row->campaign_id){
				$delbutton = '<a class="dropdown-item text-danger"
					href="' . site_url('/secure/campaigns/delete/' . $campaign_row->campaign_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this Campaign?"
					data-message="Campaign will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#campaign_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			}
			$publisher_cnt = 0;
			$writer_cnt = 0;
			$campaign_brief = $this->campaign_model->campaignBriefDetails($campaign_row->campaign_id);
			//pre_exit($campaign_brief);
			if($campaign_brief)
			{
				$publisher_data = $campaign_brief[0]->publisher_cnt;
				$publisher_ar = explode(',',$publisher_data);
				$publisher_cnt = count(array_filter($publisher_ar, function($x) { return !empty(trim($x)); }));
				$writer_data = $campaign_brief[0]->brief_article_writer;
				$writer_ar = explode(',',$writer_data);
				$writer_cnt = count(array_filter($writer_ar, function($x) { return !empty(trim($x)); }));
			}
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/campaigns/edit/' . $campaign_row->campaign_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';
				if($campaign_row->campaign_startdate){
					$campaign_startdate = nice_date($campaign_row->campaign_startdate, 'Y-m-d');
				}else{
					$campaign_startdate ='';
				}
				if($campaign_row->campaign_enddate){
					$campaign_enddate = nice_date($campaign_row->campaign_enddate, 'Y-m-d');
				}else{
					$campaign_enddate ='';
				}    
			$publisher_url = array();
			$pub_url = explode(',',$campaign_row->publisher_url);
			$total_publisher = count(array_filter($pub_url, function($x) { return !empty(trim($x)); }));
			foreach($pub_url as $purl)
			{
				$publisher_url[] = get_domain(trim($purl));
			}
			
			$row[] 	= $campaign_startdate; //nice_date($campaign_row->campaign_startdate, 'Y-m-d');
			$row[] 	= $campaign_enddate; //nice_date($campaign_row->campaign_startdate, 'Y-m-d');
            $row[] 	= ucwords($campaign_row->campaign_name);
			$row[] 	= implode('<br>',$publisher_url);
			$row[] 	= $publisher_cnt.' / '.$campaign_row->campaign_quantity;
			$row[] 	= $writer_cnt.' / '.$campaign_row->campaign_quantity;
			$row[] 	= $campaign_row->campaign_quantity;
			$row[] 	= $this->get_user_name($campaign_row->campaign_content_coordinator);
			$row[] 	= $actions;
            $data[] = $row;
        }
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->campaign_model->count_all($post_array),
			"recordsFiltered" => $this->campaign_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function articles_build_backlinks_list()
	{
		$websites = $this->input->post("websites");
		$selected_backlink = $this->input->post("selected_backlink") ? : array() ;
		$this->db->select("*");
		$this->db->from('articles');
		$this->db->join('articles_translate_i18','articles_translate_i18.article_id = articles.article_id','left');
		$this->db->where('articles_translate_i18.article_status', 'published');
		$this->db->where('articles_translate_i18.language_id', 'en');
		$this->db->group_start();
		$this->db->where('articles.article_type', 'pillar');
		$this->db->or_where('articles.article_type', 'supporting');
		$this->db->group_end();
		if(count($websites)>1){
			$this->db->group_start();
			foreach ($websites  as $website) {
				$this->db->or_where('articles_translate_i18.article_site_id', $website);
			}
			$this->db->group_end();
		}else{
			$this->db->where('articles_translate_i18.article_site_id', $websites[0]);
		}
		$this->db->order_by('articles_translate_i18.publish_date', 'DESC'); 
		$result_array = $this->db->get()->result_array();
		$temp_array=array();
		$website_array=array();
		foreach ($result_array  as $result) {
			$article_type = $result['article_type'];
			if($article_type == "pillar")
			{
				$article_url =  'https://' . $result['article_site_id'] . '/' . $result['article_permalink'] . '.html';
				$keywords = $this->get_topic_cluster($result['article_id'], $result['article_pillar_id']);
			}
			elseif($article_type == "supporting")
			{
				$article_url =  'https://' . $result['article_site_id'] . '/' . $result['article_permalink'] . '.html';
				$keywords = $this->get_topic_cluster($result['article_id'], $result['article_pillar_id']);	
			}
			//echo $result['article_id'].','.$result['article_pillar_id'].','.$keywords;
			$backlink_article = '';
			if($result['article_backlinks_count'] != "" && $result['article_backlinks_target_count'] != "")
				$backlink_article = $result['article_backlinks_count']. '/'.$result['article_backlinks_target_count'];
			if($article_type == "pillar" || $article_type == "supporting")
			{
				$temp_array[$result['article_id']]['article_site_id'] =$result['article_site_id'];
				$temp_array[$result['article_id']]['backlink_article'] =$backlink_article;
				$temp_array[$result['article_id']]['article_title'] = $result['article_title'];
				$temp_array[$result['article_id']]['publish_date'] =date('Y-m-d',strtotime($result['publish_date']));
				$temp_array[$result['article_id']]['article_meta_keyword'] =$result['article_meta_keyword'];
				$temp_array[$result['article_id']]['article_content_score'] =$result['article_content_score'];
				$temp_array[$result['article_id']]['article_status'] =ucwords($result['article_status']);
				$temp_array[$result['article_id']]['article_id'] =$result['article_id'];
				$temp_array[$result['article_id']]['article_url'] =$article_url;
				$temp_array[$result['article_id']]['keywords'] =$keywords;
				$temp_array[$result['article_id']]['article_pillar_id'] =$result['article_pillar_id'];
				$website_array[] = $result['article_site_id'];
			}
		}
		$data['article_list'] = $temp_array;
		$data['website_list'] = array_unique($website_array);
		$data['selected_backlink'] = $selected_backlink;
		echo $message = $this->load->view('secure/campaign/article_list', $data, TRUE);	
	}

	public function delete_campaign_publishers()
	{
		$delete = $this->input->post("delete_id");
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];
		if($delete > 0)
		{
			$this->campaign_publisher_model->delete($delete);
			$dataArray = ['success' => 1];
			$flashes = [
				'type'    => 'notice',
				'message' => "Campaign Publisher deleted successfully."
			];
		}
		$dataArray['flashes'] = $flashes;
		//pre_exit($dataArray);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}

	public function delete_backlink(){
		$backlink_ids = $this->input->post("backlink_id");
		$col_index = $this->input->post('col_index');
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.'
		];
		if($backlink_ids)
		{
			foreach($backlink_ids as $backlink_id)
			{
				if($backlink_id > 0){
					$wp_article = $this->linkarticle_model->get($backlink_id);
					$anchortext = explode(',',$wp_article->article_anchortext);
					if(array_key_exists($col_index,$anchortext))
						unset($anchortext[$col_index]);
					$url = explode(',',$wp_article->article_wp_url);
					if(array_key_exists($col_index,$url))
						unset($url[$col_index]);
					$wp_id = explode(',',$wp_article->article_wp_new_id);
					if(array_key_exists($col_index,$wp_id))
						unset($wp_id[$col_index]);
					$update = array(
						'article_wp_url' => implode(',',$url),
						'article_anchortext' => implode(',',$anchortext),
						'article_wp_new_id' => implode(',',$wp_id)
					);
					$this->linkarticle_model->save($update,$backlink_id);
					/* update the link brief backlinks  */
					$brief_backlinks_data = $this->articlebriefbacklink_model->getUserBriefBacklinks($backlink_id);
					if(!empty($brief_backlinks_data))
					{
						$update_brief_backlinks = array(
							'backlink_anchortext' => implode(',',$anchortext),
							'backlink_url' => implode(',',$url)
						);
						$this->articlebriefbacklink_model->save($update_brief_backlinks,$brief_backlinks_data[0]->backlink_id);
					}
					if ($this->db->affected_rows()) {
						$dataArray = ['success' => 1];
						$flashes = [
							'type'  	  => 'notice',
							'message'     => "Backlink has been deleted!"
						];
					}
				}
			}
		}
		else{
			$flashes = [
				'type'  	  => 'notice',
				'message'     => "Backlink has been deleted!"
			];
		}
		
		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}

	public function semrush_test()
	{
		$targets = "https://wheniwork.com/blog/people-management";
		$this->curl_backlinks_count_request($targets);
	}

	public function plist(){
		$this->db->select("*");
		$this->db->from('link_publishers');		
		$result_array = $this->db->get()->result_array();
		//pre($this->db->last_query());
		//pre($result_array);
	}

	public function writer_list()
	{
		$writer = $this->writers_list_string();
		echo $writer;
	}

	public function new_publishers_list(){
		$niches = $this->input->post("niches");
		$type = $this->input->post("type");
		// $this->db->select("*");
		// $this->db->from('link_publishers');
		// //$this->db->where('publisher_type', $type);
		// if(count($niches)>1){
		// 	$this->db->group_start();
		// 	foreach ($niches  as $niche) {
		// 		$this->db->or_like('publisher_niche', $niche);
		// 	}
		// 	$this->db->group_end();
		// }else{
		// 	$this->db->like('publisher_niche', $niches[0]);
		// }

		// if(count($type)>1){
		// 	$this->db->group_start();
		// 	foreach ($type  as $t) {
		// 		$this->db->or_like('publisher_type', $t);
		// 	}
		// 	$this->db->group_end();
		// }else{
		// 	$this->db->like('publisher_type', $type[0]);
		// }
		// //$this->db->order_by('date_added', 'DESC'); //ASC, DESC
		// $result_array = $this->db->get()->result_array();
		// $response = '';
		// if(!empty($result_array)){

		// 	foreach ($result_array  as $result) {
		// 		$response .= '<option value="'.$result['publisher_id'].'">'.$result['publisher_url'].'</option>';
		// 	}
		// }
		$writer = $this->writers_list_string();
		echo $writer;
	}

	public function delete($id)
    {
		$this->load->model('articlebrief_model');
        if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        if (!$this->user_model->loggedin()) {
            redirect('/', 'refresh');
        }
        $dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'You do not have access to the requested area/action.'
		];

		if ($this->input->is_ajax_request()) {
			$campaign_row = $this->campaign_model->get($id,true);
			$briefs = $this->articlebrief_model->get_by(array('campaign_id' => $id,'brief_article_status !=' => ""));
			if(empty($briefs))
			{
				$this->campaign_model->delete($id);

				if ($this->db->affected_rows()) {
					$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'notice',
						'message'     => "<strong>$campaign_row->campaign_name</strong> has been deleted!"
					];
				}
			}
			else
			{
				$flashes = [
					'type'  	  => 'warning',
					'message'     => "<strong>$campaign_row->campaign_name</strong> Campaign can not be removed. Please remove the article first, associated with this campaign.
					"
				];
			}			
		}
		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
	}

	private function countPublisherArticles()
	{
		$response = [];
		$this->db->select('count(article_id) as publisher_articles',false);
		$this->db->select('link_publishers.publisher_url');
		$this->db->from('link_articles');
		$this->db->join('link_briefs','link_briefs.brief_id = link_articles.brief_id','left');
		$this->db->join('link_publishers','link_publishers.publisher_id = link_briefs.publisher_id','left');
		$this->db->group_by('link_publishers.publisher_id');
		$result = $this->db->get()->result_array();
		foreach($result as $key => $value)
		{
			if($value['publisher_url'])
                $response[$value['publisher_url']] = $value['publisher_articles'];
		}
		asort($response);
		return $response;
	}
	
	public function publishers_list(){
		$list_publishers_article = $this->countPublisherArticles();
		$websites = $this->input->post("websites");
		$types = $this->input->post("type");
		$campaign_id = $this->input->post('campaign_id');
		//pre($websites);
		$added_publishers = array();
		if($campaign_id)
		{
			$campaign_publishers = $this->campaign_publisher_model->get_by(array('campaign_id' => $campaign_id));
			if($campaign_publishers)
			{
				foreach($campaign_publishers as $cp)
				{
					$added_publishers[] = $cp->publisher_id;
				} 
			}
		}
		//$this->db->select('count(link_articles.article_id) as publisher_articles',false);
		$this->db->select('count(link_campaign_publishers.campaign_id) as campaigns_no',false);
		$this->db->select("link_publishers.*");
		$this->db->from('link_publishers');
		$this->db->join('link_briefs','link_briefs.publisher_id = link_publishers.publisher_id','left');
		//$this->db->join('link_articles','link_articles.brief_id = link_briefs.brief_id','left');
		$this->db->join('link_campaign_publishers','link_campaign_publishers.publisher_id = link_publishers.publisher_id','left');
		//$this->db->where('publisher_type', $type);
		if(count($websites)>1){
			$this->db->group_start();
			foreach ($websites  as $website) {
				$this->db->or_like('link_publishers.publisher_websites', $website);
			}
			$this->db->group_end();
		}else{
			$this->db->like('link_publishers.publisher_websites', $websites[0]);
		}
		// if(count($types)>1){
		// 	$this->db->group_start();
		// 	foreach ($types  as $type) {
		// 		$this->db->or_like('link_publishers.publisher_type', $type);
		// 	}
		// 	$this->db->group_end();
		// }else{
		// 	$this->db->like('link_publishers.publisher_type', $types);
		// }
		$this->db->like('link_publishers.publisher_type', $types);
		if($added_publishers)
		    $this->db->where_not_in('link_publishers.publisher_id',$added_publishers);
		$this->db->group_by('link_publishers.publisher_id');
		$this->db->order_by('campaigns_no','asc');
		$result_array = $this->db->get()->result_array();
		//pre_exit($result_array);
		$response = '';
		// $not_publish_article = [];
		// $publish_article = [];
		if(!empty($result_array)){
			foreach ($result_array  as $result) {
				$response .= '<tr>';
				$response .= '<th scope="row">'.$this->get_domain($result['publisher_url']).'</th>';
				$response .= '<td>'.$result['publisher_url_traffic'].'</td>';
				$response .= '<td>'.$result['publisher_url_domainauthority'].'</td>';
				$response .= '<td> $'.$result['publisher_estimated_cost'].'</td>';
				$response .= '<td>'.$result['campaigns_no'].'</td>';
				$response .= '<td><a href="javascript:void(0);" data-id="'.$result['publisher_id'].'" data-publisher-email="'.$result['publisher_email'].'" data-publisher-url="'.$this->get_domain($result['publisher_url']).'" data-traffic="'.$result['publisher_url_traffic'].'" data-da="'.$result['publisher_url_domainauthority'].'" data-cost="'.$result['publisher_estimated_cost'].'" class="selected-outreach-publisher">Select</a></td>';
				$response .= '</tr>';
			}
		}else{

				$response .= '<tr>';
				$response .= '<td valign="top" colspan="5" class="text-danger text-center ">There is no data available in table</td>';
				$response .= '</tr>';

		}
		
		echo $response;

	}

	public function writers_list_string()
	{
		$response = "";
		$this->load->model('user_model');
		$this->db->where('user_type', 4);
		$this->db->or_where('user_type', 0);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		foreach ($result_array as $row) {
			$response .= '<option value="'.$row['user_id'].'">'.$row['user_name'].'</option>';
        }
        return $response;
	}

	public function writers_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 4);
		$this->db->or_where('user_type', 0);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
		$return_array[''] =  '---Select---';
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }
        return $return_array;
	}

	public function get_user_name($user_id = null){
		if($user_id){
			$this->load->model('user_model');
		$this->db->where('user_id', $user_id);
		$result = (array) $this->user_model->get(null,true);
		$user_name = ucwords($result['user_name']);
		return  $user_name;

		}else{
			return  $user_name ='';
		}
		
	}
	public function get_user_info($user_id){
		$this->load->model('user_model');
		//$this->db->where('user_id', $user_id);
		$user = (array) $this->user_model->get($user_id, true);
        return $user;
	}

	public function outreach_coordinators_list(){

		$this->load->model('user_model');
		$this->db->where('user_type', 6);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
		$return_array[''] =  '---Select---';
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] =  ucwords($row['user_name']);
        }

        return $return_array;
		
	}

	public function content_coordinators(){
		$this->load->model('user_model');
		$this->db->where('user_type', 3);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
		$return_array[''] =  '---Select---';
		foreach ($result_array as $row) {
            $return_array[$row['user_id']] =  ucwords($row['user_name']);
        }

        return $return_array;

	}

	public function get_users_by_type($user_type){
        $this->load->model('user_model');
        if($user_type && $user_type!=4){
            //$this->db->where('user_type!=', 1);
        }else{
            $this->db->where('user_id', $user_id); 
        }
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
        $return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }

        return $return_array;
	} 
	
	private function get_domain($url)
	{
		$pieces = parse_url($url);
		$domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
		return $regs['domain'];
		}
		return false;
	}

	public function get_topic_cluster($article_id, $pillar_id)
	{
		$this->db->select("article_meta_keyword");
		$this->db->from('articles_translate_i18');
		$this->db->group_start();
		$this->db->where('article_id!=article_pillar_id');
		$this->db->or_where('article_id = article_pillar_id');
		$this->db->group_end();
		$this->db->where('article_pillar_id', $pillar_id);
		$this->db->where('article_status', 'published');
		$this->db->where('language_id', 'en');
		$this->db->order_by('publish_date', 'DESC'); //ASC, DESC
		$result_array = $this->db->get()->result_array();
		$keyword_array = array();
		foreach ($result_array  as $result) {
			array_push($keyword_array, trim($result['article_meta_keyword']));
		}
		shuffle($keyword_array);
		return implode(",",$keyword_array);	
	}

	public function get_all_backlink()
	{
		$backlink_array = array();
		$article_list = $this->input->post("article_list");
		$campaign_quantity = $this->input->post("campaign_quantity");
		$campaign_id = $this->input->post("campaign_id");
		$niches = $this->input->post("niches");
		$type = $this->input->post("type");
		$template = $this->input->post("template");
		$writer = $this->writers_list();
		$campaign_data = $this->campaign_model->get($campaign_id);
		foreach ($article_list  as $article) {
			$temp = json_decode($article, true);
			$backlink_array[$temp['article_url']] = $temp;
			$backlink_url_array[] = $temp['article_url'];
			//$backlink_array[] = $this->get_topic_cluster($temp_array['article_id'], $temp_array['article_pillar_id']);
		}
		$data['backlink_list'] = $backlink_array;
		$data['backlink_url_list'] = $backlink_url_array;
		$data['form_action'] = $campaign_data->form_action;
		//pre_exit($data);
		$data['campaign_quantity'] = $campaign_quantity;
		$data['writer_list'] = $writer;
		$data['publisher'] = $this->articlebrief_model->get_publishers_campaign($campaign_id);
		$data['campaign_briefs'] = $this->articlebrief_model->get_link_briefs($campaign_id);
		//pre_exit($data['campaign_briefs']);
		$data['brief_articles'] = $this->articlebrief_model->get_written_articles($campaign_id);
		$briefs = $this->articlebrief_model->get_link_briefs($campaign_id);
		$briefs_backlinks = $this->articlebrief_model->get_link_brief_backlinks($campaign_id);
		$data['briefs'] = $briefs;
		$data['briefs_backlinks'] = $briefs_backlinks;
		$this->load->view('secure/campaign/backlink_template', $data);	
	}

	public function get_backlink_col(){
		
	}
}