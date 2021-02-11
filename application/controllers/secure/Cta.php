<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cta extends Admin_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->user_type	 = $this->data['user_type'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];

		/*if(!$this->user_is_admin){
			redirect('/', 'refresh');
		}*/
        $this->load->model('cta_model');
	}
	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['github_repo'] = $this->cta_model->get_github_repo();
		$this->data['subview'] = 'secure/cta/index';
        $this->load->view('_main_layout', $this->data);
	}

	public function ajax_list()
    {
		$post_array = $_POST;
		$cta_rows = $this->cta_model->get_datatables($post_array);
        $data = array();
        $no = $post_array['start'];
        foreach ($cta_rows as $cta_row) {
            $no++;
            $row = array();
			$delbutton = '';

				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/cta/delete/' . $cta_row->cta_lookup_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this CTA ?"
					data-message="CTA will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#cta_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span>Delete</span></span>
				</a>';

			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary cta_preview" data-cta-id ="'.$cta_row->cta_lookup_id.'" href="javascript:void(0);">'.
								'<i class="fas fa-eye"></i> View'.
							'</a>'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/cta/edit/' . $cta_row->cta_lookup_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';

			//$row[] 	= $cta_row->cta_lookup_id;
			$row['cta_website'] = $cta_row->cta_website;
			$row['cta_type'] 	= $cta_row->cta_type;
			$row['cta_headline'] = $cta_row->cta_headline;
			$row['cta_background_type'] = ucfirst($cta_row->cta_background_type);
			$row['cta_action'] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->cta_model->count_all($post_array),
			"recordsFiltered" => $this->cta_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function add($id = NULL){
		//pre($_POST);
		//pre($_FILES);
		if(!$this->is_user_logged_in || (!$this->user_is_admin && $this->session_id != $id)){
			show_404(uri_string());
		}

		if($id){
            $this->data['cta_config_row'] = (array) $this->cta_model->get($id);
        }else{
           	$this->data['cta_config_row'] = $this->cta_model->get_new();
		}
		$this->data['github_repo'] = $this->cta_model->get_github_repo();
		$this->data['languages'] = $this->cta_model->get_languages();
		$this->data['product_cta_list'] = get_meta_product_cta_list_array();
		$this->data['content_cta_list'] = get_meta_content_cta_list_array();
		$this->data['cta_background_image_error'] =false;
		$rules = $this->cta_model->rules_cta_config;
		$this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'cta_website',
				'cta_language_id',
				'cta_type',
				'cta_headline',
				'cta_sub_headline',
				'cta_background_type',
				'cta_background_video',
				'cta_background_color',
				'cta_button_text',
				'cta_button_color',
				'cta_form_id'

			);
			$data = $this->cta_model->array_from_post($post_array);
			$data['cta_language_id']= 'en';
			$last_insert_id = $this->cta_model->save($data, $id);
			$error = $this->edit_cta_image($last_insert_id);
			if($error){
				//pre_exit($_FILES);
				$this->data['cta_background_image_error'] = $error;
				$this->session->set_flashdata('error', $error);
			}else{
				$this->session->set_flashdata('success', 'CTA successfully added or updated');
			}
			redirect('secure/cta', 'refresh');
		}
		$this->data['product_list'] = get_product_list_array();
		$this->data['websites'] = (array) $this->get_product_id_list();
		$this->data['subview'] = 'secure/cta/add';
        $this->load->view('_main_layout', $this->data);
	}

	public function edit_cta_image($cta_lookup_id = NULL){
        //pre($_FILES);
		if($_FILES['cta_background_image']['error'] == 0){

			$config['upload_path'] = './assets/images/cta/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['remove_spaces'] = true;
			$config['file_name'] = $cta_lookup_id.'-'.$_FILES['cta_background_image']['name'];
			$config['max_size'] = '1000';

			$this->load->library('upload', $config);
			//pre_exit($_FILES);
			if (!$this->upload->do_upload('cta_background_image')){
			return $error = $this->upload->display_errors();
			}
			else{
				//Image Resizing
				$config['source_image']   = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 800;
				$config['height'] = 238;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){

				}

				$this->cta_model->update_cta_image($cta_lookup_id);
			}
		}
		else{

		}
	}

	public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
	}

	public function show($id)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
		$this->db->select("*");
		$this->db->where('cta_lookup_id', (int) $id);
		//$this->db->where('cta_language_id', $lang);
		$result_array = $this->db->get('wp_cta_lookup')->row_array();
		//pre($result_array);
		$template = $this->load->view('component/cta_preview', $result_array, TRUE); // This will return you html data as message
		echo($template );
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
			$cta_row = $this->cta_model->get($id,true);
			//$this->cta_model->delete($id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$cta_row->cta_headline</strong> has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
    }

	public function getMetatagInfo($product_id, $language_id, $author)
    {

		$where   = "meta_product_unique_key='" .  $product_id . "' AND meta_product_language_id = '" . $language_id . "'";
		$metatag_row =  (array) $this->metatag_model->get_by($where, TRUE);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($metatag_row));
		//pre($this->db->last_query());
		//pre($metatag_row);
		//die;
	}

}