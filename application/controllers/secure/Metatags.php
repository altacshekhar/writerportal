<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Metatags extends Admin_Controller
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
        $this->load->model('metatag_model');
	}
	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['subview'] = 'secure/metatag/index';
        $this->load->view('_main_layout', $this->data);
	}
	
	public function ajax_list()
    {
		$post_array = $_POST;
		$metatag_rows = $this->metatag_model->get_datatables($post_array);
        $data = array();
        $no = $post_array['start'];
        foreach ($metatag_rows as $metatag_row) {
            $no++;
            $row = array();
			$delbutton = '';
			
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/metatags/delete/' . $metatag_row->lookup_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this meta tag ?"
					data-message="Meta tag will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#metatags_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span>Delete</span></span>
				</a>';
			
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/metatags/edit/' . $metatag_row->lookup_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';

			$row[] 	= $metatag_row->lookup_id;
			$row[] 	= $metatag_row->meta_product_id;
            $row[] 	= strtoupper($metatag_row->meta_product_language_id);
			$row[] 	= $metatag_row->meta_category;
			$row[] 	= $metatag_row->meta_product_name;
			$row[] 	= $metatag_row->meta_product;
			$row[] 	= $metatag_row->meta_product_description;
			$row[] 	= $metatag_row->product_cta;
			//$row[] 	= $metatag_row->content_cta;
			$row[] 	= $metatag_row->leadcapture_cta;
			$row[] 	= $metatag_row->meta_product_image;
			$row[] 	= $metatag_row->meta_product_icon;
			$row[] 	= $metatag_row->meta_product_part_id;
			$row[] 	= $metatag_row->meta_product_brand;
			$row[] 	= $metatag_row->meta_product_price;
			$row[] 	= $metatag_row->meta_product_price_currency;
			$row[] 	= $metatag_row->meta_product_review_count;
			$row[] 	= $metatag_row->meta_product_rating_value;
			$row[] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->metatag_model->count_all($post_array),
			"recordsFiltered" => $this->metatag_model->count_filtered($post_array),
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
            $this->data['metatag_config_row'] = (array) $this->metatag_model->get($id);
        }else{
           	$this->data['metatag_config_row'] = $this->metatag_model->get_new();
		}
		$this->data['github_repo'] = $this->metatag_model->get_github_repo();
		$this->data['languages'] = $this->metatag_model->get_languages();
		$this->data['product_cta_list'] = get_meta_product_cta_list_array();
		$this->data['content_cta_list'] = get_meta_content_cta_list_array();
		$this->data['leadcapture_cta_list'] = get_meta_leadcapture_cta_list_array();
		$rules = $this->metatag_model->rules_meta_tags_config;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'meta_product_id',
				'meta_product_language_id',
				'meta_category',
				'meta_product_name',
				'meta_product',
				'meta_product_description',
				'product_cta',
				'content_cta',
				'leadcapture_cta',
				'meta_product_image',
				'meta_product_icon',
				'meta_product_part_id',
				'meta_product_brand',
				'meta_product_price',
				'meta_product_price_currency',
				'meta_product_review_count',
				'meta_product_rating_value',
				'meta_product_unique_key'
			);
			$data = $this->metatag_model->array_from_post($post_array);

			//$data['meta_product_language_id']= $this->input->post('meta_product_language_id');
			$data['content_cta']='signup';
			$data['meta_product_unique_key'] = url_title(strtolower(trim($this->input->post("meta_product_id"))));
			$last_insert_id = $this->metatag_model->save($data, $id);
			$this->session->set_flashdata('success', 'Meta tag successfully added or updated');
			redirect('secure/metatags', 'refresh');
		}

		$this->data['subview'] = 'secure/metatag/add';
        $this->load->view('_main_layout', $this->data);
	}

	public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
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