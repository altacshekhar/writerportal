<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Publishers extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('publisher_model');
		$this->load->model('niche_model');
		$this->load->model('linktype_model');
		$this->load->model('campaign_model');
		$this->load->model('linkarticle_model');
		$this->load->model('articlebrief_model');
		$this->load->model('linkbuilding_article_model');
		$this->load->model('linkbuilding_article_i18_model');
		$this->data['websites'] = $this->publisher_model->get_github_repo();
		//pre_exit($this->data['websites']);
    }

    public function index()
    {
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_type = $this->session->userdata('user_type');
		if($user_type == 1 || $user_type == 6 || $user_type == 5)
		{
			$this->data['type'] = $this->linktype_model->get();
			$this->data['subview'] = 'secure/publisher/index';
			$this->load->view('_main_layout', $this->data);
		}
		else
		{
			redirect('secure/linkbuilding','refresh');
		}
        
	}
	
	public function report()
	{
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$this->data['subview'] = 'secure/publisher/report-publishers';
		$this->data['user'] = $this->prospectors_list();
        $this->load->view('_main_layout', $this->data);
	}

    public function add($id = NULL)
    {
		$user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('id');
        if ($id) {
			$publisher  = (array) $this->publisher_model->get($id);
			//pre_exit($publisher['publisher_websites']);
			$this->data['publisher'] = $publisher;
        } else {
			$publisher  = $this->publisher_model->get_new();
			$this->data['publisher'] = $publisher;
			
        }
		$rules = $this->publisher_model->rules_publisher;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'publisher_first_name',
				'publisher_last_name',
				'publisher_email',
				'publisher_phone',
				'publisher_notes',
				'publisher_websites',
				'publisher_type',
				'publisher_url',
				'publisher_url_traffic',
				'publisher_url_domainauthority',
				'publisher_url_referringdomains',
				'publisher_estimated_cost',
				'publisher_requirements',
				'publisher_status'
			);
			$data = $this->publisher_model->array_from_post($post_array);
			if ($this->input->post("publisher_email")){
				$data['publisher_email'] = $data['publisher_email'] == "" ? null : $data['publisher_email'];
			}
			// if ($this->input->post("publisher_niche[]")){
            //     $data['publisher_niche'] = implode(",",$this->input->post("publisher_niche[]"));
			// }
			if ($this->input->post("publisher_type[]")){
                $data['publisher_type'] = implode(",",$this->input->post("publisher_type[]"));
			}
			if ($this->input->post("publisher_websites[]")){
                $data['publisher_websites'] = implode(",",$this->input->post("publisher_websites[]"));
			}
			if ($publisher['publisher_createdby']){
                $data['publisher_createdby'] = $publisher['publisher_createdby'];
			}else{
				$data['publisher_createdby'] = $user_id;
			}
			if($data['publisher_estimated_cost'] == "" || $data['publisher_estimated_cost'] == null)
				$data['publisher_estimated_cost'] = null;
			if($data['publisher_url_domainauthority'] == "" || $data['publisher_url_domainauthority'] == null)
				$data['publisher_url_domainauthority'] = null;
			if($data['publisher_url_referringdomains'] == "" || $data['publisher_url_referringdomains'] == null)
				$data['publisher_url_referringdomains'] = null;
			if($data['publisher_url_traffic'] == "" || $data['publisher_url_traffic'] == null)
				$data['publisher_url_traffic'] = null;
			$now = date('Y-m-d H:i:s');	
			//$status = ($data['publisher_url_referringdomains'] == "" || $data['publisher_url_domainauthority'] == "" || $data['publisher_url_traffic'] == "") ? "Fetching SEO Metrics" : $data['publisher_status'];
			//$status = ($data['publisher_url_referringdomains'] == "" || $data['publisher_url_domainauthority'] == "") ? "Fetching SEO Metrics" : "Active";
			//$status = 
			if (!$id) {
				$data['publisher_createddate'] = $now;
			}
			//$data['publisher_status'] = $status;
			$domain = $this->get_domain($this->input->post('publisher_url'));
			$is_domain = $this->publisher_model->isDomainRootExist($domain);
			if($is_domain && $id == null)
			{
				$redirect_path = 'secure/publishers';
				$this->session->set_flashdata('info', 'Publisher <strong>'.$domain.'</strong> already exists!');
			}
			else
			{
				$last_insert_id = $this->publisher_model->save($data, $id);
				if ($last_insert_id) {
					if($id){
						$this->session->set_flashdata('success', 'Publisher <strong>'.$data['publisher_first_name'].'</strong> has been updated!');
						$redirect_path = 'secure/publishers';
					}else{
						$redirect_path = 'secure/publishers';
						$this->session->set_flashdata('success', 'Publisher <strong>'.$data['publisher_first_name'].'</strong> has been created!');
					}
					redirect($redirect_path, 'refresh');
				}
			}
		}
		$this->data['meta_title'] = 'Writer Portal | Publishers';
		$this->data['unassigned_articles'] = $this->unassigned_articles_list($id);
		$this->data['assigned_articles'] = $this->assigned_articles_list($id);
		$this->data['writers'] = $this->writers_list();
		$this->data['niche'] = $this->niche_model->get();
		$this->data['type'] = $this->linktype_model->get();
		$this->data['subview'] = 'secure/publisher/add';
        $this->load->view('_main_layout', $this->data);
    }
    
    public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}

	public function ajax_report_publishers()
	{
		$this->load->model('publisher_report_model');
		$post_array = $_POST;
		$publisher_rows = $this->publisher_report_model->get_datatables($post_array);
		$data = array();
		$no = $post_array['start'];
		foreach ($publisher_rows as $publisher_row) {
			$no++;
			$row = array();
			$publisher_urls = $publisher_row->publisher_url;
			$view = '<a href="javascript:void(0)" class="view-publishers" data-input="'.$publisher_urls.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Publishers"><span class="fa fa-eye"></span></a>';
			$row[] 	= $publisher_row->user_name;
			$row[] 	= $publisher_row->publisher_count;
			$row[] = $view;
			$data[] = $row;
		}
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->publisher_report_model->count_all($post_array),
			"recordsFiltered" => $this->publisher_report_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function ajax_list()
    {
		$post_array = $_POST;
		$publisher_rows = $this->publisher_model->get_datatables($post_array);
		$data = array();
		$no = $post_array['start'];
		foreach ($publisher_rows as $publisher_row) {
		    $no++;
            $row = array();
			//$date_modified = $campaign_row->date_modified;
			$delbutton = '';
			if ($publisher_row->publisher_id){
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/publishers/delete/' . $publisher_row->publisher_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this Publisher?"
					data-message="Publisher will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#publisher_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			}
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/publishers/edit/' . $publisher_row->publisher_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';
			$domain_name = strtolower($this->get_domain($publisher_row->publisher_url));
			$url_parse = parse_url($publisher_row->publisher_url);
			$domain = strtolower(preg_replace('#^http(s)?://#',"", $url_parse['host']));
			$domain = preg_replace('/^www\./', '', $domain);
			$publisher_domain = '<span data-toggle="tooltip" data-placement="top" title="'.strtolower($publisher_row->publisher_url).'">'.$domain.'</span>';
			//$publisher_domain = strtolower($this->get_domain($publisher_row->publisher_url));
			if($publisher_row->date_added){
				$publisher_activity_date = nice_date($publisher_row->date_added, 'Y-m-d');
			}else{
				$publisher_activity_date ='';
			}
			$publisher_websites = explode(',',$publisher_row->publisher_websites);
			$publisher_websites = array_map('ucwords',$publisher_websites);
			$publisher_type = explode(',',$publisher_row->publisher_type);
			$publisher_type = array_map('ucwords',$publisher_type);
            $row[] 	= $publisher_domain;//$this->get_domain($publisher_row->publisher_url);
            $row[] 	= ucwords(implode('<br>',$publisher_websites));
            $row[] 	= ucwords(implode('<br>',$publisher_type));
			// $row[] 	= $publisher_row->publisher_url_traffic;
			$row[] 	= $publisher_row->publisher_url_domainauthority;
			$row[] 	= $publisher_row->publisher_url_referringdomains;
			$row[] 	= $publisher_row->publisher_estimated_cost;
			$row[] 	= $publisher_row->publisher_status;
			$row[] 	= $publisher_activity_date;
			$row[] 	= $actions;
			$data[] = $row;
			//$data[$this->get_domain($publisher_row->publisher_url)] = $row;
		}
		//pre_exit($data);
		//ksort($data);
		//$data = array_values($data);
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->publisher_model->count_all($post_array),
			"recordsFiltered" => $this->publisher_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
    public function unassigned_articles_list($id)
    {
		$table_link_campaigns = $this->campaign_model->getTableName();
        $table_link_campaigns_PK = $this->campaign_model->getTablePrimaryKey();

        $table_link_publishers = $this->publisher_model->getTableName();
		$table_link_publishers_PK = $this->publisher_model->getTablePrimaryKey();

		$table_link_briefs = $this->articlebrief_model->getTableName();
		$table_link_briefs_PK = $this->articlebrief_model->getTablePrimaryKey();
		$table_link_briefs_campaign_id ='campaign_id';
		$table_link_briefs_publisher_id ='publisher_id';
		$table_link_campaigns_campaign_enddate = 'campaign_enddate';
		$table_link_briefs_select_fields = array(
		$table_link_campaigns . '.campaign_id as campaign_id',
		$table_link_briefs . '.publisher_id as publisher_id',
		$table_link_briefs . '.brief_id',
		$table_link_briefs . '.brief_article_writer'
		);
        $this->db->select($table_link_campaigns.'.*, '. implode($table_link_briefs_select_fields, ', '));
		//$this->db->select('*');
        $this->db->from($table_link_campaigns);
        $this->db->join(
            $table_link_briefs,
            "$table_link_briefs.$table_link_briefs_campaign_id = $table_link_campaigns.$table_link_campaigns_PK", 'LEFT'
        );
        $this->db->join(
            $table_link_publishers,
            "$table_link_publishers.$table_link_publishers_PK = $table_link_briefs.$table_link_briefs_publisher_id", 'LEFT'
		);
		$this->db->where("$table_link_briefs.$table_link_briefs_publisher_id", (int) $id);
		
		$this->db->where("$table_link_campaigns.$table_link_campaigns_campaign_enddate >= ", date('Y-m-d'));
		
		$result_array = $this->db->get()->result_array();

		//pre($this->db->last_query());
		
		$unassigned_articles = array();
		foreach ($result_array as $key => $value) {
			$value['campaign_content_coordinator_name'] = $this->get_user_name((int) $value['campaign_content_coordinator']);
			$value['campaign_outreach_coordinator_name'] = $this->get_user_name((int) $value['campaign_outreach_coordinator']);
			//$value['campaign_writer_name'] = $this->get_user_name((int) $value['brief_article_writer']);
			$value['campaign_writer_name'] = '';
			if((int) $value['brief_article_writer'] > 0)
				$value['campaign_writer_name'] = $this->get_user_name((int) $value['brief_article_writer']);
			$unassigned_articles[$value['campaign_id'].'-'.$value['campaign_writer_name']] = $value;
		}
		//pre_exit($unassigned_articles);
		return $unassigned_articles;
		
		
	}

	public function assigned_articles_list($id)
    {

		$table_link_campaigns = $this->campaign_model->getTableName();
        $table_link_campaigns_PK = $this->campaign_model->getTablePrimaryKey();

        $table_link_publishers = $this->publisher_model->getTableName();
		$table_link_publishers_PK = $this->publisher_model->getTablePrimaryKey();

		$table_link_briefs = $this->articlebrief_model->getTableName();
		$table_link_briefs_PK = $this->articlebrief_model->getTablePrimaryKey();

		$table_link_article = $this->linkbuilding_article_model->getTableName();
		$table_link_article_PK = $this->linkbuilding_article_model->getTablePrimaryKey();

		$table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
		$table_link_article_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();


		
		$table_link_briefs_campaign_id ='campaign_id';
		$table_link_briefs_publisher_id ='publisher_id';
		$table_link_briefs_select_fields = array(
		$table_link_campaigns . '.campaign_id as campaign_id',
		$table_link_publishers . '.publisher_id as publisher_id',
		$table_link_briefs . '.brief_id',
		$table_link_briefs . '.brief_assign_date',
		$table_link_briefs . '.brief_live_url',
		$table_link_briefs . '.brief_article_status',
		$table_link_briefs . '.brief_article_writer',
		$table_link_article . '.article_id',
		$table_link_article_i18 . '.article_title',
		$table_link_article_i18 . '.article_status',
		);
        $this->db->select($table_link_campaigns.'.*, '. implode($table_link_briefs_select_fields, ', '));
		//$this->db->select('*');
        $this->db->from($table_link_campaigns);
        $this->db->join(
            $table_link_briefs,
            "$table_link_briefs.$table_link_briefs_campaign_id = $table_link_campaigns.$table_link_campaigns_PK", 'LEFT'
        );
        $this->db->join(
            $table_link_publishers,
            "$table_link_publishers.$table_link_publishers_PK = $table_link_briefs.$table_link_briefs_publisher_id", 'LEFT'
		);
		$this->db->join(
			$table_link_article,
			"$table_link_article.brief_id = $table_link_briefs.brief_id", 'Left'
		  );
		  $this->db->join(
			$table_link_article_i18,
			"$table_link_article_i18.article_id = $table_link_article.article_id", 'Left'
		  );
		$this->db->where("$table_link_briefs.$table_link_briefs_publisher_id", (int) $id);
		$result_array = $this->db->get()->result_array();
		$assigned_articles = array();
		foreach ($result_array as $key => $value) {
			$value['campaign_writer_name'] = '';
			if((int) $value['brief_article_writer'] > 0)
				$value['campaign_writer_name'] = $this->get_user_name((int) $value['brief_article_writer']);
			if($value['article_status'] != "deleted")
				$assigned_articles[$key] = $value;
		}
		return $assigned_articles;
	}

	public function delete($id)
    {
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
			$publisher_row = $this->publisher_model->get($id,true);
			$this->publisher_model->delete($id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$publisher_row->publisher_url</strong> has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
	}
	
	public function getAllCampaigns()
    {
		$this->db->select("*");
		$this->db->from('link_campaigns');
		$result_array = $this->db->get()->result_array();
		//pre($this->db->last_query());
		//pre($result_array);
		$response = '';
		if(!empty($result_array)){

			foreach ($result_array  as $result) {

				$response .= '<tr>';
				$response .= '<th scope="row">'.$result['campaign_name'].'</th>';
				$response .= '<td>'.$result['campaign_websites'].'</td>';
				$response .= '<td>'.$result['campaign_type'].'</td>';
				$response .= '<td>'.$result['campaign_content_coordinator'].'</td>';
				$response .= '<td>'.$result['campaign_outreach_coordinator'].'</td>';
				$response .= '<td>'.$result['campaign_writer'].'</td>';
				$response .= '<td><button type="button" class="btn btn-success btn-sm">Assign</button></td>';
				$response .= '<td><button type="button" class="btn btn-link text-danger delete-campaign-row"><i class="fas fa-times"></i></button></td>';
				$response .= '</tr>';
			}

		}else{

				$response .= '<tr>';
				$response .= '<td valign="top" colspan="6" class="text-danger text-center ">There is no data available in table</td>';
				$response .= '</tr>';

		}
		
		echo $response;
		
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

	public function get_user_name($user_id){
		$this->load->model('user_model');
		//$this->db->where('user_id', $user_id);
		$user = (array) $this->user_model->get($user_id, true);
        return $user['user_name'];
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
	
	public function doUpload()
    {
        if ($this->input->post('doUpload')) 
        {
            $path = getcwd()."/data/publishers/";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'csv';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            if (!$this->upload->do_upload('uploadFile')) {
                $error = $this->upload->display_errors();//array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
                if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
					$file_path_name = $path.$import_xls_file;
					$file_obj = fopen($file_path_name,"r");
					$i = 0;
					$cnt = 0;
					$userid = $this->session->userdata('id');
					$no_insert = 0;
					while(! feof($file_obj))
					{
						$insert = array();
						$file_data = fgetcsv($file_obj);
						if(!empty($file_data) && $i > 0)
						{
							$file_data = array_map("utf8_encode", $file_data);
							$link_type = explode(',',$file_data[7]); 
							$publisher_websites = explode(',',$file_data[6]);
							$publisher = $this->publisher_model->get_by(['publisher_url' => $file_data[0]],true);
							$publisher_id = null;
							$traffic = null;
							$da = null;
							$rd = null;
							$status = "Fetching SEO Metrics"; //$file_data[1] == "" ? "Not Contacted" : $file_data[1];
							$ecost = $file_data[8] == "" || $file_data[8] == null ? null : $file_data[8];
							if($publisher)
							{
								$publisher_id = $publisher->publisher_id;
								if($publisher->publisher_type)
								{
									$publisher_type = explode(',',$publisher->publisher_type);
									$link_type = array_merge($link_type,$publisher_type);
								}
								if($publisher->publisher_websites)
								{
									$existing_publisher_websites = explode(',',$publisher->publisher_websites);
									$publisher_websites = array_merge($publisher_websites,$existing_publisher_websites);
								}
								$traffic = $publisher->publisher_url_traffic;
								$da = $publisher->publisher_url_domainauthority;
								$rd = $publisher->publisher_url_referringdomains;
								$ecost = $publisher->publisher_estimated_cost;
								if($da && $rd)
									$status = "Active";
							}
							$link_type = array_map('ltrim',$link_type);
							$link_type = array_unique($link_type);
							
							$publisher_websites = array_map('ltrim',$publisher_websites);
							$publisher_websites = array_unique($publisher_websites);
							//$status = "Fetching SEO Metrics"; //$file_data[1] == "" ? "Not Contacted" : $file_data[1];
							$insert = array(
								'publisher_first_name' => $file_data[1],
								'publisher_last_name' => $file_data[2],
								'publisher_email' => $file_data[3] == "" ? null : $file_data[3],
								'publisher_phone' => $file_data[10],
								'publisher_notes' => $file_data[5],
								'publisher_websites' => implode(",",$publisher_websites),
								'publisher_type' => implode(",",$link_type),
								'publisher_url' => strtolower($file_data[0]),
								'publisher_url_traffic' => $traffic,
								'publisher_url_domainauthority' => $da, 
								'publisher_url_referringdomains' => $rd,
								'publisher_estimated_cost' => $ecost,
								'publisher_requirements' => $file_data[9],
								'publisher_status' => $status,
								'publisher_createdby' => $userid
							);
							if($publisher_id == null)
							{
								$insert['date_added'] = date('Y-m-d');
								$insert['publisher_createddate'] = date('Y-m-d');
							}
							$l_check = [];
							foreach($link_type as $ll)
							{
								$l_check[] = $this->linktype_model->checkandSave(strtolower(trim($ll)));
							}
							if(!in_array(0,$l_check))
							{
								$isSave = $this->publisher_model->save($insert,$publisher_id);
								if($isSave > 0)
									$cnt++;
							}
							else
							{
								$not_insert++;
							}
							// foreach($link_type as $ll)
							// {
							// 	$l_check[] = $this->linktype_model->checkandSave(strtolower(trim($ll)));
							// 	$l_type[] = strtolower(trim($ll));
							// }
							// $l_niche = array();
							// $l_ncheck = array();
							// $niches = explode(',',$file_data[6]);
							// foreach($niches as $niche)
							// {
							// 	$l_ncheck[] = $this->niche_model->checkandSave(strtolower(trim($niche)));
							// 	$l_niche[] = strtolower(trim($niche));
							// }
							// $userid = $this->session->userdata('id');
							// $domain = $this->get_domain($file_data[0]);
							// $is_domain = $this->publisher_model->isDomainRootExist(strtolower($domain));
							// if(!$is_domain && !in_array(0,$l_ncheck) && !in_array(0,$l_check))
							// {
							// 	$status = "Fetching SEO Metrics"; //$file_data[1] == "" ? "Not Contacted" : $file_data[1];
							// 	$traffic = null;
							// 	$da = null;
							// 	$rd = null;
							// 	//$status = "Not Contacted";
							// 	// $traffic = $file_data[9] == "" || $file_data[9] == null ? null : $file_data[9];
							// 	// $da = $file_data[11] == "" || $file_data[11] == null ? null : $file_data[11];
							// 	// $rd = $file_data[10] == "" || $file_data[10] == null ? null : $file_data[10];
							// 	$ecost = $file_data[8] == "" || $file_data[8] == null ? null : $file_data[8];
							// 	$insert = array(
							// 		'publisher_first_name' => $file_data[1],
							// 		'publisher_last_name' => $file_data[2],
							// 		'publisher_email' => $file_data[4] == "" ? null : $file_data[4],
							// 		'publisher_phone' => $file_data[10],
							// 		'publisher_notes' => $file_data[5],
							// 		'publisher_niche' => implode(",",$l_niche),
							// 		'publisher_type' => implode(",",$l_type),
							// 		'publisher_url' => strtolower($file_data[0]),
							// 		'publisher_url_traffic' => $traffic,
							// 		'publisher_url_domainauthority' => $da, 
							// 		'publisher_url_referringdomains' => $rd,
							// 		'publisher_estimated_cost' => $ecost,
							// 		'publisher_requirements' => $file_data[9],
							// 		'publisher_status' => $status,
							// 		'publisher_createdby' => $userid,
							// 		'publisher_createddate' => date('Y-m-d'),
							// 		'date_added' => date('Y-m-d')
							// 	);
							// 	$isSave = $this->publisher_model->save($insert);
							// 	if($isSave > 0)
							// 		$cnt++;
							// }
						}
						$i++;
					}
					$msg = $cnt." Publishers imported successfully";	
					if($not_insert > 0)
						$msg .= ", ".$not_insert." of records not imported due to errors.";
					$this->session->set_flashdata('success',$msg);
                } else {
					$this->session->set_flashdata('error', '<span class="font-weight-bold alert-link css-truncate css-truncate-target">Error in processing the file.</span>');
                }
			}
			else
			{
				$this->session->set_flashdata('error', '<span class="font-weight-bold alert-link css-truncate css-truncate-target">' . $error . '</span>');
			}
		}
		redirect('secure/publishers','refresh');
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

	public function prospectors_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 5);
		$this->db->or_where('user_type', 6);
		$this->db->or_where('user_type', 1);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }
        return $return_array;
	}


	public function cron_semrush_api()
	{	
		$this->db->select('*');
		$this->db->from('link_publishers');
		$this->db->where(['publisher_status !=' => 'Active']);
		$this->db->limit(10);
		$publishers = $this->db->get()->result();
		if($publishers)
		{
			foreach($publishers as $publisher)
			{
				$publisher = (Object) $publisher;
				$publisher_id = $publisher->publisher_id;
				$return = false;
				$endpoint = 'https://api.semrush.com/analytics/v1/';
				$target = $publisher->publisher_url;
				$target = preg_replace( "#^[^:/.]*[:/]+#i", "", $target);
				$params = array(
					'key'=>'320858172aee5f8cb6936ea13dd70980',
					'type'=>'backlinks_overview',
					'target'=>$target,
					'target_type'=>'root_domain',
					'export_columns'=>'ascore,domains_num',
				);
				$url = $endpoint . '?' . http_build_query($params);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch);
				curl_close($ch);
				$search = 'ERROR';
				if(!preg_match("/{$search}/i", $result)) {
					$result = trim(str_replace("ascore,domains_num", "", $result));
					$domain_array = array();
					foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $key=>$line){

							list($ascore, $domains_num) = str_getcsv($line,';');
							$domain_array['publisher_url_domainauthority'] = $ascore;
							$domain_array['publisher_url_referringdomains'] = $domains_num;
							if($ascore && $domains_num)
								$domain_array['publisher_status'] = 'Active';
					}
					if($domain_array)
						$this->publisher_model->save($domain_array,$publisher_id);
					echo json_encode($domain_array);
				}
			}
		}
	}

	public function semrush_api()
	{
		$return = false;
		$endpoint = 'https://api.semrush.com/analytics/v1/';
		$target = $this->input->post('url');
		$target = preg_replace( "#^[^:/.]*[:/]+#i", "", $target );
		//echo $target;
		$params = array(
			'key'=>'320858172aee5f8cb6936ea13dd70980',
			'type'=>'backlinks_overview',
			'target'=>$target,
			'target_type'=>'root_domain',
			'export_columns'=>'ascore,domains_num',
		);
		$url = $endpoint . '?' . http_build_query($params);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		//pre_exit($result);
		curl_close($ch);
		$search = 'ERROR';
		$domain_array = array();
		if(!preg_match("/{$search}/i", $result)) {
			$result = trim(str_replace("ascore,domains_num", "", $result));
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $result) as $key=>$line){

					list($ascore, $domains_num) = str_getcsv($line,';');
					$domain_array['da'] = $ascore;
					$domain_array['rd'] = $domains_num;
			
			}
		}
		exit(json_encode($domain_array));
	}

	public function auto_submit_contact_form()
	{
		$data = $this->publisher_model->get_by(['publisher_phone !=' => null,'publisher_email' => null,'contact_status' =>'not_contacted'],true);
		$data = (array) $data;
		//pre_exit($data);
		if($data)
		{
			$pub_id = $data['publisher_id'];
			$url = 'http://localhost:5000/formsubmit';
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			$data_array = array(
				'url'=>$data['publisher_phone'],
				'first_name'=>$data['publisher_first_name'],
				'last_name'=>$data['publisher_last_name'],
				'subject'=>"Contact Subject",
				'email'=>"singhg@altametrics.com",
				'message'=>'Test Content',
				'mobile'=>'+10909090909090'
			);
			$data =  json_encode($data_array);
			/* pass encoded JSON string to the POST fields */
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			/* set the content type json */
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type:application/json'
			));
			/* Array Parameter Data */
			$output = curl_exec($ch);
			if($output)
			{
				$result = json_decode($output);
				$publisher_data['contact_response'] = $result->msg;
				if($result->status == 1)
				{
					$publisher_data['contact_status'] = 'contacted';
				}
				$this->publisher_model->save($publisher_data,$pub_id);
				exit($output);
			}
		}
		else{
			exit(0);
		}
		
	}
}
