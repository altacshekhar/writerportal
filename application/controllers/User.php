<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
    }

    public function index()
    {
		show_404(uri_string());
	}
    public function login()
    {
        $return['status'] = false;
        $return['message'] = 'That email/password combination does not exist';

        // Set up the form
        $rules = $this->user_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() === true) {
            // User login and redirect

            if ($this->user_model->login() == true) {
                $return['redirect'] = site_url('secure/articleslist');
                $return['message'] = 'User successfully logged in';
            } else {
                //$this->session->set_flashdata('error', 'That email/password combination does not exist');
            }
            $return['status'] = $this->user_model->loggedin();
        }
        echo json_encode($return);

    }

    public function register()
    {
        $return['status'] = false;
        $return['message'] = 'Request is not authorized';
        if ($this->input->is_ajax_request()) {

            $rules = $this->user_model->rules_admin;
            $this->form_validation->set_rules($rules);

			$return['status'] = $this->form_validation->run();
            if (!$return['status']) {

                $return['name'] = strip_tags(form_error('name'));
				$return['email'] = strip_tags(form_error('email'));
                $return['message'] = 'ERROR';
            } else {

                $data['user_email'] = $this->input->post('email');
                $data['user_name'] = $this->input->post('name');
                $nameArr = explode(' ', $this->input->post('name'));
                if(count($nameArr) > 1){
                    $lastcount = count($nameArr) - 1;
                    $data['user_lname'] = $nameArr[$lastcount];
                    unset($nameArr[$lastcount]);
				}

				$user_info = $this->user_model->get_by(
                    //'user_email = "' . $this->input->post('email') . '"', true

                    "user_email = '" . $this->input->post('email') . "'", true
                );
                $user_id = NULL;
                if($user_info){
                    $user_id = $user_info->user_id;
				}
                $data['user_fname'] = implode(' ', $nameArr);
                $random_password = $this->get_random_password();
                $_POST['password'] = $random_password;
                $data['user_password'] = $this->user_model->hash($random_password);
                $last_insert_user_id = $this->user_model->save($data, $user_id);

                if ($this->user_model->login() == true) {

					/*** Registration Send Email ****/
					$from_name = $this->config->item('emailconfig_from_name');
					$from_email 	  = $this->config->item('emailconfig_from_email');
					$htmlContent  = '';
					$htmlContent .= '<p>Thank you for joing us! We’re happy to see you in our portal.</p>';
					$htmlContent .= '<p>Here is your user account details which can be updated in your {portal_name} Writer Portal account anytime.</p>';
					$htmlContent .= '<p>Email: <br>'. $data['user_email'] . '</p>';
					$htmlContent .= '<p>Password: <br><strong>' . $random_password . '</strong></p>';
					$htmlContent .= '<p>&nbsp;</p>';
					$htmlContent .= '<p>Kindest Regards,<br>';
					$htmlContent .= '{portal_name} Team</p>';

					$emailer_data['from_name']		 = $from_name;
					$emailer_data['from_email']		 = $from_email;
					$emailer_data['to_name'] 		 = $data['user_name'];
					$emailer_data['to_email']		 = $data['user_email'];
					$emailer_data['message_subject'] = 'Welcome to {portal_name} Writer Portal!';
					$emailer_data['message_body'] 	 = $htmlContent;

					$message = $this->load->view('component/email', $emailer_data, TRUE);
					$this->send_email($emailer_data, $message);
					/*** Send Email End ****/

                    $return['redirect'] = site_url('secure/articleslist');
                    $return['message'] = 'User successfully logged in';
                    $this->session->set_flashdata('success', 'User successfully logged in');
                } else {
                    //$this->session->set_flashdata('error', 'That email/password combination does not exist');
                }
            }
        }
        $this->output
        ->set_content_type('application/json')
		->set_output(json_encode($return));
    }
    public function forgot()
    {

        $return = array();
        $email = $this->input->post('email');
        $row = (array) $this->user_model->get_by('user_email="' .  $email .'"', true);

        if ($row) {

            $random_password = $this->get_random_password();
            $id=$row['user_id'];
            $to_email = $row['user_email'];
            $to_name  = $row['user_fname']." ".$row['user_lname'];
            $data['user_password'] = $this->user_model->hash($random_password);
			$last_insert_user_id = $this->user_model->save($data, $id);

			if($last_insert_user_id){
				/*** Reset password Send Email ****/
				$from_name 	  = $this->config->item('emailconfig_from_name');
				$from_email   = $this->config->item('emailconfig_from_email');
				$htmlContent  = '<p>Hello ' . $to_name . '!</p>';
				$htmlContent .= '<p>You have requested to change your password.</p>';
				$htmlContent .= '<p>Here is your password which can be updated in your {portal_name} Writer Portal account anytime.</p>';
				$htmlContent .= '<p>Password:<br>';
				$htmlContent .= '<strong>' . $random_password . '</strong></p>';
				//$htmlContent .= '<p>If you did not request for a password reset, please <a href="https://hubworks.com/contact-us.html" target="_blank">contact us</a>.</p><br>';
				$htmlContent .= '<p>Kindest Regards,<br>';
				$htmlContent .= '{portal_name} Team</p>';

				$emailer_data['from_name']		 = $from_name;
				$emailer_data['from_email']		 = $from_email;
				$emailer_data['to_name']		 = $to_name;
				$emailer_data['to_email'] 		 = $to_email;
				$emailer_data['message_subject'] = 'Reset Password';
				$emailer_data['message_body'] 	 = $htmlContent;

				$message = $this->load->view('component/email', $emailer_data, TRUE); // this will return you html data as message
				$this->send_email($emailer_data, $message);
				/*** Send Email End ****/
			}

			$return['status'] = true;
			$return['redirect'] = site_url('home');
			$return['message'] = '<div class="text-success mb-1">Your password successfully sent to your email.</div>';
			$return['password'] = $random_password;


        }else{
            $return['status'] = false;
            $return['message'] = '<div class="text-danger mb-1">We couldn’t find an account matching the email you entered. Please check your email and try again.</div>';
        }
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($return));
    }
    public function logout()
    {
        $this->user_model->logout();
        redirect('/', 'refresh');
	}

    public function isUniqueEmail()
    {
        //pre($_POST);
        $this->db->where('user_email', $this->input->get('email'));
        $user = $this->user_model->get(null, true);
        //echo $this->db->last_query();

        if ($user) {
            //$this->form_validation->set_message('_unique_email', '%s is alredy register.');
            echo 'false';
        } else {
            echo 'true';
        }
    }



    public function _unique_email($str)
    {
        $id = $this->uri->segment(3);
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

    public function loggedin()
    {
        echo $this->user_model->loggedin();
	}
    public function get_random_password(){

        //return 'pass123';
         return random_string('alnum', 8);
    }

}
