<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Websites extends Admin_Controller
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
        $this->load->model('website_model');
	}
	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['subview'] = 'secure/website/index';
        $this->load->view('_main_layout', $this->data);
	}
	
	public function ajax_list()
    {
		$post_array = $_POST;
		$website_rows = $this->website_model->get_datatables($post_array);
        $data = array();
        $no = $post_array['start'];
        foreach ($website_rows as $website_row) {
            $no++;
            $row = array();
			$delbutton = '';
			
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/websites/delete/' . $website_row->wds_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this website default setting ?"
					data-message="website default setting will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#websites_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span>Delete</span></span>
				</a>';
			
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/websites/edit/' . $website_row->wds_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';

			$row[] 	= $website_row->wds_id;
			$row[] 	= $website_row->website;
            $row[] 	= $website_row->default_meta_product;
			$row[] 	= $website_row->available_blog_categories;
			$row[] 	= '<pre>'.$website_row->rakefile.'</pre>';
			$row[] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->website_model->count_all($post_array),
			"recordsFiltered" => $this->website_model->count_filtered($post_array),
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

		if($id){
            $this->data['website_config_row'] = (array) $this->website_model->get($id);
        }else{
           	$this->data['website_config_row'] = $this->website_model->get_new();
		}
		$this->data['github_repo'] = $this->website_model->get_github_repo();
		//$this->data['languages'] = $this->website_model->get_languages();
		//$this->data['product_cta_list'] = get_meta_product_cta_list_array();
		//$this->data['content_cta_list'] = get_meta_content_cta_list_array();
		$rules = $this->website_model->rules_wbsite_default_settings;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'website',
				'default_meta_product',
				'available_blog_categories',
				'rakefile',
				'meta_product_unique_key'
			);
			$data = $this->website_model->array_from_post($post_array);
			$data['meta_product_unique_key'] = url_title(strtolower(trim($this->input->post("default_meta_product"))));
			$last_insert_id = $this->website_model->save($data, $id);
			$this->session->set_flashdata('success', 'Website default setting successfully added or updated');
			redirect('secure/websites', 'refresh');
		}

		$this->data['subview'] = 'secure/website/add';
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