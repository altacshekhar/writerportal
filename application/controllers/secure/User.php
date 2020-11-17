<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends Admin_Controller
{
	private  $user_is_admin;
	private  $session_id;
	private  $is_user_logged_in;

    public function __construct()
    {
		parent::__construct();
		$this->user_is_admin = $this->data['is_admin'];
		$this->session_id 	=  $this->data['user_id'];
		$this->is_user_logged_in 	=  $this->data['is_user_logged_in'];
    }

	public function index()
    {
		if(!$this->user_is_admin){
			show_404(uri_string());
		}
		//$this->data['users'] = $this->user_model->get_user_article();
		$this->data['subview'] = 'secure/user/index';
        $this->load->view('_main_layout', $this->data);
	}
	public function add($id = NULL)
    {
		if(!$this->is_user_logged_in || (!$this->user_is_admin && $this->session_id != $id)){
			show_404(uri_string());
		}

        if ($id) {
            $this->data['user'] = (array) $this->user_model->get($id);
        } else {
            $this->data['user'] = $this->user_model->get_new();
		}
		$this->data['user_image_error'] =false;
		$rules = $this->user_model->rules_user_profile;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_rules('user_image', '', 'callback__file_check');
		if ($this->form_validation->run() === true) {
			$post_array  = array(
				'user_name',
				'user_fname',
				'user_lname',
				'user_is_admin',
				'user_type',
				'user_email',
				'user_phone',
				'user_bo_info',
				'meta_author_url',
				'meta_author_facebook_url',
				'meta_author_twitter_url',
				'meta_author_instagram_url',
				'meta_author_linkedin_url'
			);
			$data = $this->user_model->array_from_post($post_array);
			$password = $this->input->post('user_password');
			if(!$password && !$id){
				$password = random_string('alnum', 8);
			}
			$data['meta_author_description'] = $this->input->post('user_bo_info');
			$data['user_name'] = $data['user_fname'] . ' ' . $data['user_lname'];
			$user_type = $this->input->post('user_type');
			if($user_type == ''){
				$data['user_type'] = 0 ;
			}
			if($user_type == 1){
				$data['user_is_admin'] = $user_type;
			}else{
				$data['user_is_admin'] = 0 ;
			}
			if($password){
				$data['user_password'] = $this->user_model->hash($password);
			}
			$last_insert_id = $this->user_model->save($data, $id);
			$error = $this->edit_profilepic($last_insert_id);

			if($error){
				//pre_exit($_FILES);
				$this->data['user_image_error'] = $error;
				$this->session->set_flashdata('error', $error);
			}else{

				if ($last_insert_id) {
					if($id && $this->user_is_admin){
						$this->session->set_flashdata('success', '<strong>'.$data['user_name'].'</strong> has been updated!');
						$redirect_path = 'secure/user';
					}else if($this->user_is_admin){
						$redirect_path = 'secure/user';
						$this->session->set_flashdata('success', '<strong>'.$data['user_name'].'</strong> has been created!');
					}else if($id && !$this->user_is_admin){
						$this->session->set_flashdata('success', '<strong>Your profile</strong> has been updated!');
						$redirect_path = 'secure/user/edit/' . $id;
					}else{
						$this->session->set_flashdata('error', 'You do not have access to the requested area/action.');
						$redirect_path = '/';
					}
					redirect($redirect_path, 'refresh');
				}
				//redirect("secure/user/edit/$last_insert_id", 'refresh');
			}
		}
		$this->data['subview'] = 'secure/user/add';
        $this->load->view('_main_layout', $this->data);
	}

	public function edit_profilepic($user_id = NULL){
        //pre($_FILES);
		if($_FILES['user_image']['error'] == 0){

			$config['upload_path'] = './assets/images/profile/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['overwrite'] = true;
			$config['remove_spaces'] = true;
			$config['file_name'] = $user_id;
			$config['max_size'] = '100';

			$this->load->library('upload', $config);
			//pre_exit($_FILES);
			if (!$this->upload->do_upload('user_image')){
			return $error = $this->upload->display_errors();
			}
			else{
				//Image Resizing
				$config['source_image']   = $this->upload->upload_path.$this->upload->file_name;
				$config['maintain_ratio'] = FALSE;
				$config['width'] = 300;
				$config['height'] = 300;

				$this->load->library('image_lib', $config);

				if ( ! $this->image_lib->resize()){

				}

				$this->user_model->update_profile_pic($user_id);
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



	public function user_article($user_id){
		$article = $this->user_model->get_article_group($user_id);
		$article_count = 0;
		if(isset($article['article'])){
			$article_count = $article['article'];
		}

		$news_count = 0;
		if(isset($article['news'])){
			$news_count = $article['news'];
		}

		$recipe_count = 0;
		if(isset($article['recipe'])){
			$recipe_count = $article['recipe'];
		}

		$article_str = '<ul class="list-group list-group-flush">
			<li class="list-group-item d-flex justify-content-between align-items-center px-0 pt-0">
				Article Submitted
				<label class="text-primary font-weight-bold m-0">' . $article_count . '</label>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center px-0">
				Press Release Submitted
				<label class="text-primary font-weight-bold m-0">' . $news_count . '</label>
			</li>
			<li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
				Recipe Submitted
				<label class="text-primary font-weight-bold m-0">' . $recipe_count . '</label>
			</li>
		</ul>';
		echo  $article_str;
	}

	 /*
     * file value and type check during validation
     */
    public function _file_check($str){
		$this->load->helper('file');

		$allowed_mime_type_arr = array('image/jpeg','image/jpg','image/png');
        $mime = get_mime_by_extension($_FILES['user_image']['name']);
        if(isset($_FILES['user_image']['name']) && $_FILES['user_image']['name']!=""){

            if(in_array($mime, $allowed_mime_type_arr)){

				if ($_FILES['user_image']['size'] > 100000){
					$this->form_validation->set_message('_file_check', 'The file you have uploaded exceeds the 100 KB file size.');
					return false;
				}else{
					return true;
				}
            }else{
                $this->form_validation->set_message('_file_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }
	}


	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$user_rows = $this->user_model->get_datatables($post_array);
		//pre_exit($post_array);
		//log_message("ERROR", print_r($user_rows, TRUE));
        $data = array();
        $no = $post_array['start'];
        foreach ($user_rows as $user_row) {
            $no++;
            $row = array();

			$date_modified = $user_row->date_modified;

			$user_image = base_url() . 'assets/images/icons/nobody.jpg';
			if($user_row->user_image && file_exists(FCPATH . $user_row->user_image))
				$user_image = base_url() . $user_row->user_image;

			$popover_title = $user_row->user_email;
			$user_full_name = '<span class="text-light p-0">--</span>';
			if($user_row->user_fname || $user_row->user_lname){
				$user_full_name = ucwords($user_row->user_fname . ' ' . $user_row->user_lname);
				$popover_title = "<span class='d-block'>$user_full_name</span>" . "<span class='d-block small text-muted'>$user_row->user_email</span>";
			}

			$full_name = '
						<div class="user-avatar cell-detail user-info">
							<img class="mt-0 mt-md-2 mt-lg-0" src="'. $user_image .'" alt="Avatar">'.
							'<span>'. $user_full_name . '</span>'.
							'<span class="cell-detail-description">'.
								$user_row->user_email .
							'</span>'.
						'</div>';
						switch ($user_row->user_type) {
							case "1":
								$user_admin_str =  '<span class="label-sm label-admin">Administrator</span>';
							  break;
							case "2":
								$user_admin_str =  '<span class="label-sm label-admin">Administrator</span>';
							  break;
							case "3":
								$user_admin_str =  '<span class="label-sm label-pub">Content Coordinator</span>';
							  break;
							case "4":
								$user_admin_str =  '<span class="label-sm label-pub">Staff Writer</span>';
								break;
							case "5":
								$user_admin_str =  '<span class="label-sm label-pub">Link Prospector</span>';
								break;
							case "6":
								$user_admin_str =  '<span class="label-sm label-pub">Outreach Coordinator</span>';
								break;
							default:
							$user_admin_str =  '<span class="label-sm label-other">Contributing Writer</span>';
						  }
			/*if ($user_row->user_type == 1){
				$user_admin_str =  '<span class="label-sm label-admin">Administrator</span>';
			}if ($user_row->user_type == 3){
				$user_admin_str =  '<span class="label-sm label-pub">Publisher</span>';
			}if ($user_row->user_type == 4){
				$user_admin_str =  '<span class="label-sm label-pub">Staff Writer</span>';
			}else{
				$user_admin_str =  '<span class="label-sm label-other">Contributing Writer</span>';
			}*/

			$total_article = '<a tabindex="0"
				id="'. $user_row->user_id .'"
				class="show-user-article-popover label bg-primary text-white"
				role="button"
				data-html="true"
				data-toggle="popover"
				title="' . $popover_title . '"
				data-content="">' . $user_row->total_article . '</a>';

			$delbutton = '';
			if ($user_row->user_is_admin!=1){
				//$delbutton = "<a class='dropdown-item text-danger delArticle' id='del_article_" . $user_row->user_id . "' href='javascript:void(0);' data-article-id=" .  $user_row->user_id . " id='del_article_" .  $user_row->user_id . "'><i class='fa fa-trash'></i> Delete</a>";
				$delbutton = '<a class="dropdown-item"
					href="' . site_url('/secure/user/delete/' . $user_row->user_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this user?"
					data-message="All article written by this contributor will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#user_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			}
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary" href="' . site_url('secure/user/edit/' . $user_row->user_id) . '">'.
								'<i class="fas fa-pencil-alt"></i> Edit'.
							'</a>'
							. $delbutton.
						'</div>'.
					'</div>'.
				'</div>';

            $row[] 	= $full_name;
            $row[] 	= $user_row->user_phone;
            $row[] 	= $user_row->user_signup_date;
            $row[] 	= $user_admin_str;
            $row[] 	= $total_article;
			$row[] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->user_model->count_all($post_array),
			"recordsFiltered" => $this->user_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

    public function article_list()
    {
        $results = $this->article_model->get_items();
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
			$user_row = $this->user_model->get($id,true);
			if (!$user_row->user_is_admin==1) {

				$name = '';
				if($user_row->user_fname || $user_row->user_lname){
					$name = trim(ucwords($user_row->user_fname . ' ' . $user_row->user_lname));
				}

				if($name==''){
					$name = $user_row->user_email;
				}

				$this->user_model->delete($id);
				if ($this->db->affected_rows()) {
					$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'notice',
						'message'     => "<strong>$name</strong> has been deleted!"
					];
				}
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
    }

	public function _unique_email($str)
    {
        $id = $this->uri->segment(4);
        $this->db->where('user_email', $this->input->post('user_email'));
        !$id || $this->db->where('user_id !=', $id);
        $user = $this->user_model->get();
       // echo $this->db->last_query();
        if ($user) {
            $this->form_validation->set_message('_unique_email', '%s is alredy register.');
            return false;
        }
        return true;
    }

	public function logout()
    {
        $this->user_model->logout();
        redirect('/', 'refresh');
	}

}
