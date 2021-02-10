<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Livelinks extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('campaign_model');
		$this->load->model('publisher_model');
		$this->load->model('livelink_model');
		$this->load->model('articlebrief_model');
		$this->data['websites'] = $this->campaign_model->get_github_repo();
       
    }

    public function index()
    {
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$user_type = $this->session->userdata('user_type');
		if($user_type == 1 || $user_type == 6)
		{
			$this->data['subview'] = 'secure/livelink/index';
			$this->load->view('_main_layout', $this->data);
		}
		else
		{
			redirect('secure/linkbuilding','refresh');
		}
    }

	public function ajax_list()
    {
		//sleep(10);
		$post_array = $_POST;
		$livelink_rows = $this->livelink_model->get_datatables($post_array);
		//pre_exit($post_array);
		//log_message("ERROR", print_r($user_rows, TRUE));
        $data = array();
        $no = $post_array['start'];
        foreach ($livelink_rows as $livelink_row) {
            $no++;
			$row = array();
			$deletebtn = "";
			$user_type = $this->session->userdata('user_type');
			if($user_type == 1)
			{
				$deletebtn = '<a class="dropdown-item text-danger"
					href="' . site_url('/secure/livelinks/delete/' . $livelink_row->brief_id) . '"
					data-toggle="confirmation"
					data-icon-type="error"
					data-title="Delete this Livelink?"
					data-message="Livelink monitoring will be deleted and this can not be <b>Undone</b>."
					data-confirm-text="Delete"
					data-confirm-class="btn-danger"
					data-confirm-callback="datatableReload"
					data-cancel-text="Cancel"
					data-cancel-callback="dismissConfirmation"
					data-cancel-class="btn-default"
					data-target="#livelink_list_table">
					<span><i class="fas fa-trash-alt text-danger"></i><span> Delete</span></span>
				</a>';
			}
			$actions = 	'<div class="btn-group-xs">'.
					'<div class="dropdown">'.
						'<button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle" data-toggle="dropdown">Action</button>'.
						'<div class="dropdown-menu">'.
							'<a class="dropdown-item text-primary live-link-validation" href="' . site_url('secure/livelinks/validate/' . $livelink_row->brief_id) . '">'.
								'<i class="fas fa-check-circle"></i> Validate'.
							'</a>'.$deletebtn.
						'</div>'.
					'</div>'.
				'</div>';
				if($livelink_row->brief_live_validation_date){
					$live_validation_date = nice_date($livelink_row->brief_live_validation_date, 'Y-m-d');
				}else{
					$live_validation_date ='';
				}
				if($livelink_row->brief_publish_date){
					$published_date = nice_date($livelink_row->brief_publish_date, 'Y-m-d');
				}else{
					$published_date ='';
				} 
				if($livelink_row->brief_live_validation_status=='failed'){
					$live_validation_status = '<span class="text-danger">'.ucwords($livelink_row->brief_live_validation_status).'</span>';
				}else{
					$live_validation_status = '<span class="text-success">'.ucwords($livelink_row->brief_live_validation_status).'</span>';
				}  
            $row[] 	= $published_date;
            $row[] 	= $livelink_row->brief_live_url;
            $row[] 	= count(explode(',',$livelink_row->backlink_anchortext));
			$row[] 	= $livelink_row->brief_article_cost;
			$row[] 	= $live_validation_date;
			$row[] 	= $live_validation_status;
			$row[] 	= $actions;
            $data[] = $row;
        }

        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->livelink_model->count_all($post_array),
			"recordsFiltered" => $this->livelink_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}

	public function validate($brief_id) 
	{
		$log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'backlink-log-' . date('Y-m-d') . '.php';

		$log_message  = '';

        if ( ! file_exists($filepath))
        {
       		$log_message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }
        $log_message .=  PHP_EOL ;
        $log_message .=  '===================' .PHP_EOL;
        $log_message .= $log_date . PHP_EOL;
        $log_message .=  '===================' .PHP_EOL;
		$live_link_list = $this->livelink_model->get_all_live_link($brief_id);
		
        $backlinks_remove_array = array();
       	//pre_exit($live_link_list); 
		foreach ($live_link_list as $key => $live_link_row)
		{
			$outreach = $this->get_user_info($live_link_row->campaign_outreach_coordinator);
            $to_full_name = $live_link_row->publisher_first_name . ' '.$live_link_row->publisher_last_name ;
			$to_email 	  = $live_link_row->publisher_email.','.$outreach['user_email'];
			//$to_email 	  = 'krishan.awasthi@gmail.com';
			$now = date('Y-m-d H:i:s');
            
			$publish_url = $live_link_row->brief_live_url;
			$search_url  = $live_link_row->backlink_url;
			$search_text = $live_link_row->backlink_anchortext;
			$url = 'https://wplseotools.hubworks.com/livelinkvalidation';
            //$url = 'https://whookqa.hubworks.com/livelinkvalidation';
        
            /* Init cURL resource */
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            /* Array Parameter Data */
            $data_array = array(
                'search_url'=>$search_url,
                'search_string'=>$search_text,
                'publish_url'=>$publish_url
			);
			//pre($data_array);
			$log_message .= 'Api url = ' . $url . PHP_EOL;
            $log_message .= 'search_url = ' . $search_text . PHP_EOL;
            $log_message .= 'publish_url = ' . $publish_url . PHP_EOL;

			$data =  json_encode($data_array);
			/* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json'
                    ));
                
            /* execute request */
			$output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //echo $httpCode;
            $log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
            if($output === false)
            {
                $log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
            }
            else
            {
				$result = json_decode($output, true);
				$log_message .= $result;
				if($result['status'] == "valid")
				{
					$backlink_data_update = array();
					$published_data = array();
					$backlink_data_update['brief_live_validation_date'] = $now;
					if($live_link_row->publisher_status == 'Dead Link Alert'){
						//echo 'Dead Link Alert 3';
						$backlink_data_update['brief_live_validation_status'] = 'valid';
						$published_data['publisher_status'] ='Published';

						$this->articlebrief_model->save($backlink_data_update, $live_link_row->brief_id);
						$this->publisher_model->save($published_data, $live_link_row->publisher_id);
						$published_data['publisher_activity_date'] = $now;

						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent .= '<p>A backlink was found at ' .  $publish_url . ' for ' . $search_text . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		 = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject'] = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 

					}elseif($live_link_row->brief_live_validation_status == 'valid' || $live_link_row->brief_live_validation_status == ''){
						
						$backlink_data_update['brief_live_validation_date'] = $now;
						$backlink_data_update['brief_live_validation_status'] = 'valid';

						$this->articlebrief_model->save($backlink_data_update, $live_link_row->brief_id);
					}
				}
				elseif($result['status'] == "Invalid")
				{
					$backlink_data_update = array();
					$published_data = array();
					$backlink_data_update['brief_live_validation_date'] = $now;

					if($live_link_row->publisher_status == 'Dead Link Alert'){
						
                          //echo 'Dead Link Alert 1,2';
						$backlink_data_update['brief_live_validation_status'] = 'failed';
						$published_data['publisher_status'] ='Blacklist';
						$published_data['publisher_activity_date'] = $now;

						$this->articlebrief_model->save($backlink_data_update, $live_link_row->brief_id);
						$this->publisher_model->save($published_data, $live_link_row->publisher_id);
						
						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is no longer valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent  .= '<p>A backlink was not found at ' .  $publish_url . ' for ' . $search_text . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		     = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject']  = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 

					}elseif($live_link_row->brief_live_validation_status == 'valid' || $live_link_row->brief_live_validation_status == ''){

						//echo ' 1,2 valid';
						$backlink_data_update['brief_live_validation_status'] = 'failed';
						$published_data['publisher_status'] = 'Dead Link Alert';
						$published_data['publisher_activity_date'] = $now;

						$this->articlebrief_model->save($backlink_data_update, $live_link_row->brief_id);
						$this->publisher_model->save($published_data, $live_link_row->publisher_id);

						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is no longer valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent  .= '<p>A backlink was not found at ' .  $publish_url . ' for ' . $search_text . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		     = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject']  = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 
					}
				}
			}
		}
		flock($fp, LOCK_EX);
        fwrite($fp, $log_message);
        flock($fp, LOCK_UN);
		fclose($fp);
		redirect('secure/livelinks', 'refresh');
	}
	public function validate_old($brief_id)
    {
		
        $log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'backlink-log-' . date('Y-m-d') . '.php';

		$message  = '';

        if ( ! file_exists($filepath))
        {
       		$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }
        $message .=  PHP_EOL ;
        $message .=  '===================' .PHP_EOL;
        $message .= $log_date . PHP_EOL;
        $message .=  '===================' .PHP_EOL;
        $live_link_list = $this->livelink_model->get_all_live_link($brief_id);
        $backlinks_remove_array = array();
       	// pre_exit($live_link_list); 
		// foreach ($live_link_list as $key => $live_link)
		// {

		// }
        //pre_exit($backlinks);
        foreach($live_link_list as $live_link_row){
			$outreach = $this->get_user_info($live_link_row['campaign_outreach_coordinator']);
            $to_full_name = $live_link_row['publisher_first_name'] . ' '.$live_link_row['publisher_last_name'] ;
			$to_email 	  = $live_link_row['publisher_email'].','.$outreach['user_email'];
			//$to_email 	  = 'krishan.awasthi@gmail.com';
			$now = date('Y-m-d H:i:s');
            foreach($live_link_row['backlinks'] as $backlink_row){
                $search_link = $live_link_row['brief_live_url'];
				$target_url  = $backlink_row['backlink_url'];

                $userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
                $message .= 'link_url = ' . $search_link . PHP_EOL;
                $message .= 'target_url = ' . $target_url . PHP_EOL;
               
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                curl_setopt($ch, CURLOPT_URL,$target_url);
                curl_setopt($ch, CURLOPT_FAILONERROR, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				$html_content= curl_exec($ch);
				//pre($html_content);
                if (!$html_content) {
                    $message .="cURL error number:" .curl_errno($ch) . PHP_EOL;
                    $message .= "cURL error:" . curl_error($ch) . PHP_EOL;
                    exit;
                }           
        
                // parse the html into a DOMDocument
                $dom = new DOMDocument();
                @$dom->loadHTML($html_content);        
        
                // grab all the on the page
                $xpath = new DOMXPath($dom);
                $hrefs = $xpath->evaluate("/html/body//a");
        
                // find result
				$result = $this->is_my_link_there($hrefs, $search_link);
				//echo('result');
				//pre($result);
				$message .=  PHP_EOL ;
				
				if($result == 1 || $result == 2) { 
					$backlink_data_update = array();
					$published_data = array();
					$backlink_data_update['brief_live_validation_date'] = $now;

					if($live_link_row['publisher_status']=='Dead Link Alert'){
						
                          //echo 'Dead Link Alert 1,2';
						$backlink_data_update['brief_live_validation_status'] = 'failed';
						$published_data['publisher_status'] ='Blacklist';
						$published_data['publisher_activity_date'] = $now;

						$this->articlebrief_model->save($backlink_data_update, $live_link_row['brief_id']);
						$this->publisher_model->save($published_data, $live_link_row['publisher_id']);
						

						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is no longer valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent  .= '<p>A backlink was not found at ' .  $target_url . ' for ' . $search_link . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		     = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject']  = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 

					}elseif($live_link_row['brief_live_validation_status']=='valid' || $live_link_row['brief_live_validation_status']==''){

						//echo ' 1,2 valid';
						$backlink_data_update['brief_live_validation_status'] = 'failed';
						$published_data['publisher_status'] ='Dead Link Alert';
						$published_data['publisher_activity_date'] = $now;

						$this->articlebrief_model->save($backlink_data_update, $live_link_row['brief_id']);
						$this->publisher_model->save($published_data, $live_link_row['publisher_id']);

						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is no longer valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent  .= '<p>A backlink was not found at ' .  $target_url . ' for ' . $search_link . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		     = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject']  = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 
					}

				}

				if($result == 3) { 
					$backlink_data_update = array();
					$published_data = array();
					$backlink_data_update['brief_live_validation_date'] = $now;
					if($live_link_row['publisher_status']=='Dead Link Alert'){
						//echo 'Dead Link Alert 3';
						$backlink_data_update['brief_live_validation_status'] = 'valid';
						$published_data['publisher_status'] ='Published';

						$this->articlebrief_model->save($backlink_data_update, $live_link_row['brief_id']);
						$this->publisher_model->save($published_data, $live_link_row['publisher_id']);
						$published_data['publisher_activity_date'] = $now;

						/*** Send Email Start ****/ 
						$message_subject = 'The backlink is valid';
						$htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
						$htmlContent .= '<p>A backlink was found at ' .  $target_url . ' for ' . $search_link . '</p>';
						$htmlContent .= '<p>&nbsp;</p>';
						$htmlContent .= '<p>Thank you,<br>';
						$htmlContent .= 'The {portal_name} Team</p>';
						$emailer_data['from_name']		 = 'Writer Portal';
						$emailer_data['from_email']		 = $to_email;
						$emailer_data['to_name']		 = $to_full_name;
						$emailer_data['to_email'] 		 = $to_email;
						$emailer_data['message_subject'] = $message_subject;
						$emailer_data['message_body'] 	 = $htmlContent;
		
						$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
						//pre($message);
						$send = $this->send_email($emailer_data, $message);
						//pre($send);
						/*** Send Email End ****/ 

					}elseif($live_link_row['brief_live_validation_status']=='valid' || $live_link_row['brief_live_validation_status']==''){
						//echo 'valid 3';

						$backlink_data_update['brief_live_validation_date'] = $now;
						$backlink_data_update['brief_live_validation_status'] = 'valid';

						$this->articlebrief_model->save($backlink_data_update, $live_link_row['brief_id']);
					}
				}
            }
        }
       
        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
		fclose($fp);
		redirect('secure/livelinks', 'refresh');
	}
	
	public function is_my_link_there($hrefs, $my_url) {

        for ($i = 0; $i < $hrefs->length; $i++) {    
            $href = $hrefs->item($i);    
            $url = $href->getAttribute('href');    
            if ($my_url == $url) {    
                $rel = $href->getAttribute('rel');    
               if ($rel == 'nofollow') {    
                    return 2;
                }   
                return 3; // found
            } 
        }
        return 1; // not found
	}
	
	public function get_user_info($user_id){
		$this->load->model('user_model');
		//$this->db->where('user_id', $user_id);
		$user = (array) $this->user_model->get($user_id, true);
        return $user;
	}

	public function test_mail(){
		$message_subject = 'The backlink is valid';
		$htmlContent  = '<p>Hello test</p>';
		$emailer_data['from_name']		 = 'Writer Portal';
		$emailer_data['from_email']		 = 'kavastyhi@altametrics.com';
		$emailer_data['to_name']		 = 'krishan';
		$emailer_data['to_email'] 		 = 'krishan.awasthi@gmail.com';
		$emailer_data['message_subject'] = $message_subject;
		$emailer_data['message_body'] 	 = $htmlContent;
		$message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
		$send = $this->send_email($emailer_data, $message);
		pre($send);
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
			$livelink_row = $this->livelink_model->get($id,true);
			$this->livelink_model->save(['is_deleted' => 1],$id);

			if ($this->db->affected_rows()) {
				$dataArray = ['success' => 1];
				$flashes = [
					'type'  	  => 'notice',
					'message'     => "<strong>$livelink_row->brief_live_url</strong> has been deleted!"
				];
			}
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($dataArray));
	}

	public function report()
	{
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$this->data['subview'] = 'secure/livelink/report-livelinks';
		$this->data['user'] = $this->writer_list();
        $this->load->view('_main_layout', $this->data);
	}

	public function writer_list(){
		$this->load->model('user_model');
		$this->db->where('user_type', 6);
		$result_array = $this->user_model->get();
        $result_array = json_decode(json_encode($result_array), TRUE);
		$return_array = array();
        foreach ($result_array as $row) {
            $return_array[$row['user_id']] = $row['user_name'];
        }
        return $return_array;
	}

	public function ajax_report_livelinks()
	{
		$this->load->model('livelink_report_model');
		$post_array = $_POST;
		$livelink_rows = $this->livelink_report_model->get_datatables($post_array);
		$data = array();
		$no = $post_array['start'];
		foreach ($livelink_rows as $livelink_row) {
			$no++;
			$row = array();
			// $publisher_urls = $publisher_row->publisher_url;
			$livelinks = $livelink_row->brief_live_url;
			$view = '<a href="javascript:void(0)" class="view-livelinks" data-input="'.$livelinks.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Livelinks"><span class="fa fa-eye"></span></a>';
			$row[] 	= $livelink_row->user_name;
			$row[] 	= $livelink_row->valid;
			$row[] 	= $livelink_row->failed;
			$row[] = $view;
			$data[] = $row;
		}
        $output = array(
			"draw" => $post_array['draw'],
			"recordsTotal" => $this->livelink_report_model->count_all($post_array),
			"recordsFiltered" => $this->livelink_report_model->count_filtered($post_array),
			"data" => $data,
		);
		$this->output
        ->set_content_type('application/json')
		->set_output(json_encode($output));
	}
}
