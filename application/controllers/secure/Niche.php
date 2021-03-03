<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Niche extends Admin_Controller
{
    private  $user_is_admin;
	private  $session_id;
	private  $is_user_logged_in;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('niche_model');
        $this->user_is_admin = $this->data['is_admin'];
		$this->session_id	 =  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
    }

    public function index()
    {
        $this->data['subview'] = 'secure/niche/index';
        $this->load->view('_main_layout', $this->data);
    }

    public function add($id = NULL)
    {
        if ($id) {
            $this->data['niche_row'] = (array) $this->niche_model->get($id);
        } else {
            $this->data['niche_row'] = $this->niche_model->get_new();
        }
        $rules = $this->niche_model->rules_category;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === true) {
			$post_array  = array(
				'niche_name'
			);
			$data = $this->niche_model->array_from_post($post_array);
			$savedata[key($data)] = strtolower($data[key($data)]);
		    $last_insert_id = $this->niche_model->save($savedata, $id);

            if ($last_insert_id) {
                if($id){
                    $this->session->set_flashdata('success', '<span class="font-weight-bold css-truncate css-truncate-target">'.$data['niche_name'].'</span> Niche has been updated!');
                }else{
                    $this->session->set_flashdata('success', '<span class="font-weight-bold css-truncate css-truncate-target">'.$data['niche_name'].'</span> Niche has been created!');
                }
                redirect('secure/niche', 'refresh');
            }

		}
        $this->data['subview'] = 'secure/niche/add';
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
			$niche_row = $this->niche_model->get($id,true);
			$this->niche_model->delete($id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$niche_row->niche_name</strong> has been deleted!"
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
		$niche_rows = $this->niche_model->get_datatables($post_array);
		$no = $post_array['start'];
		$data = array();
        foreach ($niche_rows as $niche_row) {
			$actions  =	'<div class="btn-group-xs">';
			$actions .=	'<div class="dropdown">';
			$actions .= '<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>';
			$actions .= '<div class="dropdown-menu">';
			$actions .= '<a class="dropdown-item text-primary" href="' . site_url('secure/niche/edit/' . $niche_row->niche_id) . '">';
			$actions .= '<i class="fas fa-pencil-alt"></i> Edit';
			$actions .= '</a>';
			$actions .= '<a class="dropdown-item"';
			$actions .= 'href="' . site_url('/secure/niche/delete/' . $niche_row->niche_id) . '"';
			$actions .= 'data-toggle="confirmation"';
			$actions .= 'data-icon-type="error"';
			$actions .= 'data-title="Delete this Niche?"';
			$actions .= 'data-message="This can not be <b>Undone</b>."';
			$actions .= 'data-confirm-text="Delete"';
			$actions .= 'data-confirm-class="btn-danger"';
			$actions .= 'data-confirm-callback="datatableReload"';
			$actions .= 'data-cancel-text="Cancel"';
			$actions .= 'data-cancel-callback="dismissConfirmation"';
			$actions .= 'data-cancel-class="btn-default"';
			$actions .= 'data-target="#niche_list_table">';
			$actions .= '<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>';
			$actions .= '</a>';
			$actions .= '</div>';
			$actions .= '</div>';
			$actions .= '</div>';

			$row = array();
			$row[] 	= ucwords($niche_row->niche_name);
			$row[] 	= $actions;
            $data[] = $row;
		}
		$output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->niche_model->count_all(),
			"recordsFiltered" => $this->niche_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
}