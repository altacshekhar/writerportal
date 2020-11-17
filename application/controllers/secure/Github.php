<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Github extends Admin_Controller
{
    private  $user_is_admin;
	private  $session_id;
	private  $is_user_logged_in;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('github_model');
        $this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];

		if(!$this->user_is_admin){
			show_404(uri_string());
		}
    }

    public function index()
    {
        $this->data['subview'] = 'secure/github/index';
        $this->load->view('_main_layout', $this->data);
    }

    public function add($id = NULL)
    {
        if ($id) {
            $this->data['github_row'] = (array) $this->github_model->get($id);
        } else {
            $this->data['github_row'] = $this->github_model->get_new();
        }
        $rules = $this->github_model->rules_github_repo;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'site_id',
                'github_repo',
                'github_client_id',
				'github_article_path',
				'github_article_image_path',
				'default_meta_product',
				'available_blog_categories',
				'meta_product_unique_key',
				'rakefile'
			);
			$data = $this->github_model->array_from_post($post_array);

			$github_api_key = $this->input->post('github_api_key');
			if($github_api_key){
				$data['github_api_key'] = $github_api_key;
			}
			$data['meta_product_unique_key'] = url_title(strtolower(trim($this->input->post("default_meta_product"))));
            $last_insert_id = $this->github_model->save($data, $id);

            if ($last_insert_id) {
                if($id){
                    $this->session->set_flashdata('success', '<strong>'.$data['site_id'].'</strong> Repository has been updated!');
                }else{
                    $this->session->set_flashdata('success', '<strong>'.$data['site_id'].'</strong> Repository has been created!');
                }

                redirect('secure/github', 'refresh');
            }

		}
        $this->data['subview'] = 'secure/github/add';
        $this->load->view('_main_layout', $this->data);
    }

    public function edit($id = null)
    {
		if(!$id &&!$this->user_is_admin && $this->session_id != $id){
			show_404(uri_string());
		}
        $this->add($id);
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
			$github_row = $this->github_model->get($id,true);
			$this->github_model->delete($id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$github_row->github_repo</strong> has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
    }

    public function _unique_site_name($site_id)
    {
        $id = $this->uri->segment(4);
        $this->db->where('site_id', $this->input->post('site_id'));
        !$id || $this->db->where('id !=', $id);
        $row = $this->github_model->get();
        if ($row) {
            $this->form_validation->set_message('_unique_site_name', '%s is alredy exist.');
            return false;
        }
        return true;
	}

	public function ajax_list()
    {
		$this->load->helper('text');
		$post_array = $_POST;
		$github_rows = $this->github_model->get_datatables($post_array);
		$no = $post_array['start'];
        foreach ($github_rows as $github_row) {
			$actions  =	'<div class="btn-group-xs">';
			$actions .=	'<div class="dropdown">';
			$actions .= '<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>';
			$actions .= '<div class="dropdown-menu">';
			$actions .= '<a class="dropdown-item text-primary" href="' . site_url('secure/github/edit/' . $github_row->id) . '">';
			$actions .= '<i class="fas fa-pencil-alt"></i> Edit';
			$actions .= '</a>';
			$actions .= '<a class="dropdown-item"';
			$actions .= 'href="' . site_url('/secure/github/delete/' . $github_row->id) . '"';
			$actions .= 'data-toggle="confirmation"';
			$actions .= 'data-icon-type="error"';
			$actions .= 'data-title="Delete this Repo?"';
			$actions .= 'data-message="This can not be <b>Undone</b>."';
			$actions .= 'data-confirm-text="Delete"';
			$actions .= 'data-confirm-class="btn-danger"';
			$actions .= 'data-confirm-callback="datatableReload"';
			$actions .= 'data-cancel-text="Cancel"';
			$actions .= 'data-cancel-callback="dismissConfirmation"';
			$actions .= 'data-cancel-class="btn-default"';
			$actions .= 'data-target="#site_list_table">';
			$actions .= '<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>';
			$actions .= '</a>';
			$actions .= '</div>';
			$actions .= '</div>';
			$actions .= '</div>';

			$row = array();
			$row[] 	= $github_row->site_id;
            $row[] 	= $github_row->github_repo;
            //$row[] 	= $github_row->github_client_id;
          //  $row[] 	= $github_row->github_api_key;
			$row[] 	= $github_row->github_article_path;
			$row[] 	= $github_row->github_article_image_path;
			$row[] 	= $github_row->default_meta_product;
			$row[] 	= $github_row->available_blog_categories;
			$row[] 	= '<pre>'.character_limiter($github_row->rakefile, 20).'</pre>';
			$row[] 	= $actions;
            $data[] = $row;
		}
		$output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->github_model->count_all(),
			"recordsFiltered" => $this->github_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
}