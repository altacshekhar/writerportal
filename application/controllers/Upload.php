<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'path'));
    }

    public function index()
    {
        // $this->load->view('upload_form', array('error' => ' '));
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }

    public function pixabay()
    {
		$image_upload_dir = $this->config->item('image_upload_dir');
        $path = FCPATH . $image_upload_dir;
        $image_data = $this->input->post('image');
        if (isset($image_data)) {
            $image_data = str_replace('data:image/png;base64,', '', $image_data);
            $image_data = str_replace(' ', '+', $image_data);
            $image = base64_decode($image_data);
            $filename = time() . '.png';
            //$path = set_realpath('assets/images/uploads/');
            file_put_contents($path . $filename, $image);
            $image_url = site_url($image_upload_dir . $filename);
            $data['image_name'] = $filename;
            $data['image_url'] = $image_url;
            $data['image_path'] = $path;
            die($image_url);
        }
        die('ERROR');
    }

    public function do_multi_upload($field = 'userfile', $return_info = true, $filenames = null)
    {

        // Is $_FILES[$field] set? If not, no reason to continue.
        if (!isset($_FILES[$field])) {

            $this->set_error('upload_no_file_selected');
            return false;
        }
        //If not every file filled was used, clear the empties
        foreach ($_FILES[$field]['name'] as $k => $n) {
            if (empty($n)) {
                foreach ($_FILES[$field] as $kk => $f) {
                    unset($_FILES[$field][$kk][$k]);
                }
            }
        }

		// Is the upload path valid?
        if (!$this->validate_upload_path($field)) {
            // errors will already be set by validate_upload_path() so just return FALSE
            return false;
		}

        //Multiple file upload
        if (is_array($_FILES[$field])) {
            //$count = count($_FILES[$field]['name']); //Number of files to process
            foreach ($_FILES[$field]['name'] as $k => $file) {
                // Was the file able to be uploaded? If not, determine the reason why.
                if (!is_uploaded_file($_FILES[$field]['tmp_name'][$k])) {
                    $error = (!isset($_FILES[$field]['error'][$k])) ? 4 : $_FILES[$field]['error'][$k];
                    switch ($error) {
                        case 1: // UPLOAD_ERR_INI_SIZE
                            $this->set_error('upload_file_exceeds_limit');
                            break;
                        case 2: // UPLOAD_ERR_FORM_SIZE
                            $this->set_error('upload_file_exceeds_form_limit');
                            break;
                        case 3: // UPLOAD_ERR_PARTIAL
                            $this->set_error('upload_file_partial');
                            break;
                        case 4: // UPLOAD_ERR_NO_FILE
                            $this->set_error('upload_no_file_selected');
                            break;
                        case 6: // UPLOAD_ERR_NO_TMP_DIR
                            $this->set_error('upload_no_temp_directory');
                            break;
                        case 7: // UPLOAD_ERR_CANT_WRITE
                            $this->set_error('upload_unable_to_write_file');
                            break;
                        case 8: // UPLOAD_ERR_EXTENSION
                            $this->set_error('upload_stopped_by_extension');
                            break;
                        default:$this->set_error('upload_no_file_selected');
                            break;
                    }
                    return false;
                }

                // Set the uploaded data as class variables
                $this->file_temp = $_FILES[$field]['tmp_name'][$k];
                $this->file_size = $_FILES[$field]['size'][$k];
                $this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$field]['type'][$k]);
                $this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
                if (empty($filenames)) {
                    $this->file_name = $this->_prep_filename($_FILES[$field]['name'][$k]);
                } else {
                    $this->file_name = $this->_prep_filename($filenames[$k]);
                }
                $this->file_ext = $this->get_extension($this->file_name);
                $this->client_name = $this->file_name;

                // Is the file type allowed to be uploaded?
                if (!$this->is_allowed_filetype()) {
                    $this->set_error('upload_invalid_filetype');
                    return false;
                }

                // if we're overriding, let's now make sure the new name and type is allowed
                if ($this->_file_name_override != '') {
                    $this->file_name = $this->_prep_filename($this->_file_name_override);

                    // If no extension was provided in the file_name config item, use the uploaded one
                    if (strpos($this->_file_name_override, '.') === false) {
                        $this->file_name .= $this->file_ext;
                    }

                    // An extension was provided, lets have it!
                    else {
                        $this->file_ext = $this->get_extension($this->_file_name_override);
                    }

                    if (!$this->is_allowed_filetype(true)) {
                        $this->set_error('upload_invalid_filetype');
                        return false;
                    }
                }

                // Convert the file size to kilobytes
                if ($this->file_size > 0) {
                    $this->file_size = round($this->file_size / 1024, 2);
                }

                // Is the file size within the allowed maximum?
                if (!$this->is_allowed_filesize()) {
                    $this->set_error('upload_invalid_filesize');
                    return false;
                }

                // Are the image dimensions within the allowed size?
                // Note: This can fail if the server has an open_basdir restriction.
                if (!$this->is_allowed_dimensions()) {
                    $this->set_error('upload_invalid_dimensions');
                    return false;
                }

                // Sanitize the file name for security
                $this->file_name = $this->clean_file_name($this->file_name);

                // Truncate the file name if it's too long
                if ($this->max_filename > 0) {
                    $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
                }

                // Remove white spaces in the name
                if ($this->remove_spaces == true) {
                    $this->file_name = preg_replace("/\s+/", "_", $this->file_name);
                }

                /*
                 * Validate the file name
                 * This function appends an number onto the end of
                 * the file if one with the same name already exists.
                 * If it returns false there was a problem.
                 */
                $this->orig_name = $this->file_name;

                if ($this->overwrite == false) {
                    $this->file_name = $this->set_filename($this->upload_path, $this->file_name);

                    if ($this->file_name === false) {
                        return false;
                    }
                }

                /*
                 * Run the file through the XSS hacking filter
                 * This helps prevent malicious code from being
                 * embedded within a file.  Scripts can easily
                 * be disguised as images or other file types.
                 */
                if ($this->xss_clean) {
                    if ($this->do_xss_clean() === false) {
                        $this->set_error('upload_unable_to_write_file');
                        return false;
                    }
                }

                /*
                 * Move the file to the final destination
                 * To deal with different server configurations
                 * we'll attempt to use copy() first.  If that fails
                 * we'll use move_uploaded_file().  One of the two should
                 * reliably work in most environments
                 */
                if (!@copy($this->file_temp, $this->upload_path . $this->file_name)) {
                    if (!@move_uploaded_file($this->file_temp, $this->upload_path . $this->file_name)) {
                        $this->set_error('upload_destination_error');
                        return false;
                    }
                }

                /*
                 * Set the finalized image dimensions
                 * This sets the image width/height (assuming the
                 * file was an image).  We use this information
                 * in the "data" function.
                 */
                $this->set_image_properties($this->upload_path . $this->file_name);

                if ($return_info === true) {

                    $return_value[$k] = $this->data();

                } else {

                    $return_value = true;

                }
            }
            return $return_value;

        } else //Single file upload, rely on native CI upload class
        {
            $upload = self::do_upload();
            return $upload;
        }

    }

    public function delete(){

        $id = '';
        $action = '';
        $image_path = $_POST['image'];
        $list = (array_values(array_filter(explode("|", $_POST['action']))));
        if(array_key_exists(0, $list))
        $action = $list[0];

        if(array_key_exists(1, $list))
        $lang = $list[1];

        if(array_key_exists(2, $list))
        $id = $list[2];

        if(array_key_exists(3, $list))
        $image_path = $list[3];




        if($image_path){
			$image_upload_dir = $this->config->item('image_upload_dir');
			$path = FCPATH . $image_upload_dir;
            $image_name = basename($image_path);
            $image_path = $path . $image_name;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }

        if($action == 'article' && $id ){
           //$this->load->model('article_model');
           $this->load->model('article_i18_model');
           $data['article_image'] = '';
           $data['article_image_alt'] = '';
           $where   = "article_id='" . (int)  $id . "' AND language_id = '" . $lang . "'";
           $article_i18_row =  (array) $this->article_i18_model->get_by($where, TRUE);
           if($article_i18_row){
            $article_i18_id = $article_i18_row['article_i18_id'];
            }
           $this->article_i18_model->save($data, $article_i18_id);
        }

        if($action=='section' && $id){
            //$this->load->model('paragraph_model');
            $this->load->model('paragraph_i18_model');
            $data['section_image'] = '';  
            $data['section_video'] = '';
            $data['section_image_alt'] = '';
            $data['section_meta_video_name'] = '';
            $data['section_meta_video_description'] = '';
            $data['section_meta_video_url'] = '';
            $data['section_meta_video_thumbnail_1x1'] = '';
            $data['section_meta_video_thumbnail_4x3'] = '';
            $data['section_meta_video_thumbnail_16x9'] = '';
            $data['section_meta_video_uploaddate'] = '';
            $data['section_meta_video_minutes'] = '';
            $data['section_meta_video_seconds'] = '';
            $data['section_meta_video_interaction_count'] = '';
            $data['section_meta_video_expires'] = '';
            $data['section_image_attribution'] = '';
            $data['section_image_license'] = '';
            $where   = "section_id='" . (int)  $id . "' AND language_id = '" . $lang . "'";
            $paragraph_i18_row =  (array) $this->paragraph_i18_model->get_by($where, TRUE);
            if($paragraph_i18_row){
            $section_i18_id = $paragraph_i18_row['section_i18_id'];
            }
            $this->paragraph_i18_model->save($data, $section_i18_id);
        }

        if($action=='social-channel' && $id){
            $this->load->model('promotion_model');
            $data['msg_multimedia'] = '';
            $this->promotion_model->save($data, $id);
        }

        $dataArray = ['success' => 1];
        $flashes = [
            'type'  	  => 'notice',
            'message'     => "Image or Video has been deleted!"
        ];
        $dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));

    }


}
