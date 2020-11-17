<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Channelsui extends Admin_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];

		if(!$this->user_is_admin){
			redirect('/', 'refresh');
		}
        $this->load->model('channelui_model');
	}
	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['subview'] = 'secure/channelui/index';
        $this->load->view('_main_layout', $this->data);
	}
	
	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$channelui_rows = $this->channelui_model->get_datatables($post_array);
		//pre($channel_rows);
		//die;
		//pre_exit($post_array);
		//log_message("ERROR", print_r($user_rows, TRUE));
        $data = array();
        $no = $post_array['start'];
        foreach ($channelui_rows as $channelui_row) {
            $no++;
            $row = array();

			//$date_modified = $channelui_row->date_modified;

			$delbutton = '';
			
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/channelsui/delete/' . $channelui_row->channel_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this channel ?"
					data-message="Channel ui will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#channel_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/channelsui/edit/' . $channelui_row->channel_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';
				$language=explode(",",$channelui_row->article_language_id);
				$lang_array = array_map('strtoupper', $language);
				$language_id=implode(",",$lang_array);

            $row[] 	= $channelui_row->channel_id;
            $row[] 	= ucwords($channelui_row->article_promo_channel);
            //$row[] 	= $channelui_row->article_promo_channel_api_key;
			//$row[] 	= ucwords($channelui_row->site_id);
			//$row[] 	= $language_id;
			//$row[] 	= $channelui_row->article_promo_channel_publish_days;
			//$row[] 	= $channelui_row->article_promo_channel_publish_times;
			$row[] 	= ($channelui_row->article_promo_channel_show_headline  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_show_msg_intro  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_show_msg_text  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_show_msg_cta  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_show_msg_url_link  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_show_msg_multimedia  ? 'True' : 'False');
			$row[] 	= ($channelui_row->article_promo_channel_status  ? 'Active' : 'Inactive');
            //$row[] 	= $channelui_row->total_channel;
			$row[] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->channelui_model->count_all($post_array),
			"recordsFiltered" => $this->channelui_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function add($id = NULL){
		
		if(!$this->is_user_logged_in || (!$this->user_is_admin && $this->session_id != $id)){
			show_404(uri_string());
		}

		if ($id) {
            $this->data['channel_config_row'] = (array) $this->channelui_model->get($id);
        } else {
           	$this->data['channel_config_row'] = $this->channelui_model->get_new();
		}
		$this->data['github_repo'] = $this->channelui_model->get_github_repo();
		$this->data['languages'] = $this->channelui_model->get_languages();
		//pre($this->data);
		$rules = $this->channelui_model->rules_channel_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'article_promo_channel',
				'article_promo_channel_show_headline',
				'article_promo_channel_show_msg_intro',
				'article_promo_channel_show_msg_text',
				'article_promo_channel_show_msg_url_link',
				'article_promo_channel_show_msg_multimedia',
				'article_promo_channel_show_msg_cta',
				'article_promo_channel_status'
			);
			$data = $this->channelui_model->array_from_post($post_array);
			$last_insert_id = $this->channelui_model->save($data, $id);
			$this->session->set_flashdata('success', 'Channel ui configuration successfully added');
			redirect('secure/channelsui', 'refresh');
		}

		$this->data['subview'] = 'secure/channelui/add';
        $this->load->view('_main_layout', $this->data);
	}

	public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}
}