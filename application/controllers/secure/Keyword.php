<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Keyword extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('keyword_model');
		$this->load->model('user_model');
		$this->load->model('contentarticlesbrief_model');
		$this->load->model('article_model');
    }

    public function index()
    {
        if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_id = $this->data['user_id'];
		$user_type = $this->data['user_type'];
        if ($this->data['is_admin']) {
            $user_id = null;
        }
		//$this->data['articles'] = $this->article_model->getUserArticles($user_id);
		$this->data['github_repo'] = $this->article_model->get_github_repo();
		$this->data['languages'] = $this->article_model->get_languages();
		$this->data['users'] = $this->article_model->get_users($user_type, $user_id);
        $this->data['subview'] = 'secure/keyword/index';
        $this->load->view('_main_layout', $this->data);
    }

	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$keywords = $this->keyword_model->get_datatables($post_array);

		$columns = array(
			array("title"=>'Website'),
			array("title"=>'Keyword'),
			array("title"=>'Monthly Searches'),
			array("title"=>'Content Score'),
			array("title"=>'Link Building'),
			array("title"=>'Focus Keyword'),
			array("title"=>'Status Next Step')
		);


        $data = array();
        foreach ($keywords as $keyword) {
			$row = array();
			//pre($keyword);

			$date_modified = $keyword->date_added;
			

			$status		 = strtolower($keyword->status);
	

			$dropdown_item_attr  = 'class="dropdown-item"';
			$dropdown_item_attr .= 'data-toggle="confirmation"';
			$dropdown_item_attr .= 'data-confirm-callback="datatableReload"';
			$dropdown_item_attr .= 'data-cancel-text="Cancel"';
			$dropdown_item_attr .= 'data-cancel-callback="dismissConfirmation"';
			$dropdown_item_attr .= 'data-cancel-class="btn-default"';
			$dropdown_item_attr .= 'data-target="#keyword_list_table"';

			$delbutton ='';
		
			$dropdown_item_attr .= 'href="' . site_url('/secure/keyword/delete_keyword/'. $keyword->keyword_id) . '"';
			$dropdown_item_attr .= 'data-icon-type="error"';
			$dropdown_item_attr .= 'data-title="Delete this Keyword?"';
			$dropdown_item_attr .= 'data-message="This Keyword Deleted"';
			$dropdown_item_attr .= 'data-confirm-text="Delete"';
			$dropdown_item_attr .= 'data-confirm-class="btn-danger"';
			$del_btn_text 	= '<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>';
			$delbutton  = '<a '. $dropdown_item_attr . '>' . $del_btn_text . '</a>';
			if($keyword->brief_id){
				$add_brief = $keyword->keyword_id . '/' . $keyword->brief_id;
			}else{
				$add_brief = $keyword->keyword_id;
			}

			$actions = '';
			$actions .= '<div class="btn-group-xs">';
			$actions .= '<div class="dropdown">';
			$actions .= '<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>';
			$actions .= '<div class="dropdown-menu">';
			if(!$keyword->brief_id){
				/*$actions .= '<a class="dropdown-item text-primary add-spinner" href="' . site_url('/secure/keywordanalysis/details/'.$keyword->keyword_id) . '">';
				$actions .= '<i class="fas fa-pencil-alt"></i> Keyword Analysis';
				$actions .= '</a>';*/
			}
			if($keyword->status != 1){
				$actions .= '<a class="dropdown-item text-primary add-spinner" href="' . site_url('/secure/contentarticlesbrief/add/'. $add_brief) . '">';
				$actions .= '<i class="fas fa-pencil-alt"></i> Article Brief';
				$actions .= '</a>';
			}
			$actions .= $delbutton;
			$actions .= '</div>';
			$actions .= '</div>';
			$actions .= '</div>';

			$languages_array = $this->article_model->get_languages();
			$row['website'] = $keyword->website;
			//$row['full_name'] = preg_replace('!\s+!', ' ', $full_name);
			$row['keyword'] = $keyword->keyword;
			$row['monthly_search'] = $keyword->monthly_search;
			$row['content_score'] = $keyword->content_score;
			$row['link_building'] = $keyword->link_building;
            $row['focus_keyword'] = $keyword->focus_keyword;
			$row['status'] = get_keyword_status((int) $keyword->status);
			$row['keyword_action'] = preg_replace('!\s+!', ' ', $actions);
			
            $data[] = $row;
		}

		$show_action = true;


        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->keyword_model->count_all($post_array),
			"recordsFiltered" => $this->keyword_model->count_filtered($post_array),
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
        $results = $this->keyword_model->get_items();
	}

	public function delete_keyword($id)
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
			
			$where = "keyword_id = '".$id."'";
			$data_article_brief_array = (array) $this->contentarticlesbrief_model->get_by($where, TRUE);
			//pre($data_article_brief_array);
			if(!empty($data_article_brief_array)){
				$where = "brief_id = '".$data_article_brief_array['brief_id']."'";
				//$data_article_array = (array) $this->article_model->get_by($where, TRUE);
				$data_article_array = array();
				if(!empty($data_article_array)){

					$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'info',
						'message'     => 'First removed the article from the writer portal.'
					];

				}else{

					$tables = array('article_keyword', 'article_brief');
					$where = "keyword_id = '".$id."'";
					$this->db->delete($tables, $where);

					$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'info',
						'message'     => 'The keyword removed from the writer portal.'
					];

				}
				//pre($data_article_brief_array);
			}else{
				$where = "keyword_id = '".$id."'";
				$this->db->delete('article_keyword', $where);

				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'info',
					'message'     => 'The keyword removed from the writer portal.'
				];

			}

		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
    }

	public function savePrimaryKeyword($id = null, $lang = 'en', $json_output=true)
    {
		$return['is_redirect'] = 'no';
		if ($this->user_model->loggedin()) {
			$keyword = trim(ucwords($this->input->post('keyword')));
			$data['website'] = $this->input->post('website'); 
			$data['keyword'] = $keyword;
			$data['status'] = 1;  // status: 1 => 'Analyzing'
			$data['keyword_analyze_by'] = $this->session->userdata('id');
			$keyword_id = $this->keyword_model->save($data, $id);
			$keyword_result = $this->get_keyword_analysis_details($keyword_id,'en', $keyword);
			if($keyword_result)
			{
				$keyword_analysis_details = $keyword_result['keyword_analysis'];
				$keyword_data = $keyword_result['keyword_data'];
				$focus_keyword_count = 0;
				foreach ($keyword_data['should_use'] as $should_use) {
					if($should_use['priority']==1){
						$focus_keyword_count = $focus_keyword_count+1;
					}
				}
				$update_data['status'] = 2;
				$update_data['monthly_search'] = $keyword_analysis_details['monthly_searches'] == "N/A" ? null : $keyword_analysis_details['monthly_searches'];
				$update_data['content_score'] = $keyword_analysis_details['content_difficult_score'];
				$update_data['link_building'] = $keyword_analysis_details['link_difficult_score'];
				$update_data['focus_keyword'] = $focus_keyword_count;
				$this->keyword_model->save($update_data, $keyword_id);
			}
			//$redirect_url =  'secure/keyword';
			$redirect_url = 'secure/contentarticlesbrief/add/'.$keyword_id;
			$return['is_redirect'] = 'yes';
			$return['redirect'] = site_url($redirect_url);
		}else{

		}

		if($json_output){
            $this->output->set_content_type('application/json')->set_output(json_encode($return));
        }else{
            return $return;
        }
	}
}

