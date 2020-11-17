<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Hootsuitechannels extends Admin_Controller
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
        $this->load->model('hootsuitechannel_model');
	}
	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['subview'] = 'secure/hootsuitechannel/index';
        $this->load->view('_main_layout', $this->data);
	}
	
	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$channel_rows = $this->hootsuitechannel_model->get_datatables($post_array);
		//pre($channel_rows);
		//die;
		//pre_exit($post_array);
		//log_message("ERROR", print_r($user_rows, TRUE));
        $data = array();
        $no = $post_array['start'];
        foreach ($channel_rows as $channel_row) {
            $no++;
            $row = array();

			//$date_modified = $channel_row->date_modified;

			$delbutton = '';
			
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/hootsuitechannels/delete/' . $channel_row->article_language_id .'/'.  $channel_row->channel_config_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this channel ?"
					data-message="Channel will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#hootsuite_channel_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/hootsuitechannels/edit/' . $channel_row->channel_config_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';
				//$language = explode(",",$channel_row->article_language_id);
				//$lang_array = array_map('strtoupper', $language);
				//$language_id = implode(",",$lang_array);
				$language_id = $channel_row->article_language_id;
				$row[] 	= $channel_row->channel_config_id;
				$row[] 	= ucwords($channel_row->site_id);
				$row[] 	= ucwords($channel_row->article_promo_channel);
				$row[] 	= $channel_row->article_promo_channel_social_id;
				$row[] 	= $language_id;
				$row[] 	= ($channel_row->article_promo_channel_status  ? 'Active' : 'Inactive');
				//$row[] 	= $channel_row->total_channel;
				$row[] 	= $actions;
				$data[] = $row;
        	}

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->hootsuitechannel_model->count_all($post_array),
			"recordsFiltered" => $this->hootsuitechannel_model->count_filtered($post_array),
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
            $this->data['channel_config_row'] = (array) $this->hootsuitechannel_model->get($id);
        } else {
           	$this->data['channel_config_row'] = $this->hootsuitechannel_model->get_new();
		}
		$this->data['github_repo'] = $this->hootsuitechannel_model->get_github_repo();
		$this->data['languages'] = $this->hootsuitechannel_model->get_languages();
		//pre($this->data);
		$rules = $this->hootsuitechannel_model->rules_channel_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'site_id',
				'article_language_id',
				'article_promo_channel',
				'article_promo_channel_social_id',
				'article_promo_channel_status'
			);
			$data = $this->hootsuitechannel_model->array_from_post($post_array);
			//$data['article_language_id']=implode(",",$this->input->post('article_language_id'));
			$data['article_language_id']= $this->input->post('article_language_id');
			$last_insert_id = $this->hootsuitechannel_model->save($data, $id);
			if($id){
				
				$this->session->set_flashdata('success', 'Channel configuration successfully updated');
			}else{
				$this->session->set_flashdata('success', 'Channel configuration successfully added');
			}
			redirect('secure/hootsuitechannels', 'refresh');
		}

		$this->data['subview'] = 'secure/hootsuitechannel/add';
        $this->load->view('_main_layout', $this->data);
	}

	public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}
	public function delete($language_id, $id)
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
			
			$where = "article_language_id='".$language_id."' AND channel_config_id = '".$id."'";
			$this->db->where($where);
			$this->db->delete('wp_article_promo_channels_config');
			if ($this->db->affected_rows()) {

				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'info',
					'message'     => 'The channel removed from the writer portal.'
				];

			}
		}
		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
	}
	public function truncate()
    {
		$this->db->truncate('wp_article_promo_channels_config');
	}
	
}