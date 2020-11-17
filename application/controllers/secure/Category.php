<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Category extends Admin_Controller
{
    private  $user_is_admin;
	private  $session_id;
	private  $is_user_logged_in;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];

		if(!$this->user_is_admin){
			show_404(uri_string());
		}
    }

    public function index()
    {
        $this->data['subview'] = 'secure/category/index';
        $this->load->view('_main_layout', $this->data);
    }

    public function add($id = NULL)
    {
        if ($id) {
            $this->data['category_row'] = (array) $this->category_model->get($id);
        } else {
            $this->data['category_row'] = $this->category_model->get_new();
        }
        $rules = $this->category_model->rules_category;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'category_parent',
				'category_name',
                'category_slug'
			);
			$data = $this->category_model->array_from_post($post_array);
		    $last_insert_id = $this->category_model->save($data, $id);

            if ($last_insert_id) {
                if($id){
                    $this->session->set_flashdata('success', '<span class="font-weight-bold css-truncate css-truncate-target">'.$data['category_name'].'</span> Category has been updated!');
                }else{
                    $this->session->set_flashdata('success', '<span class="font-weight-bold css-truncate css-truncate-target">'.$data['category_name'].'</span> Category has been created!');
                }

                redirect('secure/category', 'refresh');
            }

		}
        $this->data['subview'] = 'secure/category/add';
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
			$category_row = $this->category_model->get($id,true);
			$this->category_model->delete($id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$category_row->category_name</strong> has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
    }

	public function ajax_list()
    {
		$post_array = $_POST;
		$category_rows = $this->category_model->get_datatables($post_array);
		$no = $post_array['start'];
		$data = array();
        foreach ($category_rows as $category_row) {
			$actions  =	'<div class="btn-group-xs">';
			$actions .=	'<div class="dropdown">';
			$actions .= '<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>';
			$actions .= '<div class="dropdown-menu">';
			$actions .= '<a class="dropdown-item text-primary" href="' . site_url('secure/category/edit/' . $category_row->category_id) . '">';
			$actions .= '<i class="fas fa-pencil-alt"></i> Edit';
			$actions .= '</a>';
			$actions .= '<a class="dropdown-item"';
			$actions .= 'href="' . site_url('/secure/category/delete/' . $category_row->category_id) . '"';
			$actions .= 'data-toggle="confirmation"';
			$actions .= 'data-icon-type="error"';
			$actions .= 'data-title="Delete this Category?"';
			$actions .= 'data-message="This can not be <b>Undone</b>."';
			$actions .= 'data-confirm-text="Delete"';
			$actions .= 'data-confirm-class="btn-danger"';
			$actions .= 'data-confirm-callback="datatableReload"';
			$actions .= 'data-cancel-text="Cancel"';
			$actions .= 'data-cancel-callback="dismissConfirmation"';
			$actions .= 'data-cancel-class="btn-default"';
			$actions .= 'data-target="#category_list_table">';
			$actions .= '<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>';
			$actions .= '</a>';
			$actions .= '</div>';
			$actions .= '</div>';
			$actions .= '</div>';

			$row = array();
			$row[] 	= $category_row->category_parent;
			$row[] 	= $category_row->category_name;
            $row[] 	= $category_row->category_slug;
			$row[] 	= $actions;
            $data[] = $row;
		}
		$output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->category_model->count_all(),
			"recordsFiltered" => $this->category_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
}