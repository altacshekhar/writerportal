<?php
if (!defined('BASEPATH')) { exit('No direct script access allowed'); }

error_reporting(E_ALL);
ini_set("display_errors", 0);

class Hootsuiteapicron extends Frontend_Controller
{
	
	protected $current_date;
	protected $current_day;
	protected $current_time;
	protected $hootsuitconfig;

    public function __construct()
    {
    	 parent::__construct();
         $this->load->library('session');
		 $this->load->model('seoconfig_model');
		 $this->load->model('channel_model');
		 $this->load->model('promotion_model');
		 $this->load->model('article_i18_model');
		 $this->load->model('hootsuitconfig_model');
		 $this->current_date = date('Y-m-d H:i:s');
		 $this->current_day = strtolower(date('D'));
		 $this->current_time = date("H:i");
    }

	public function index() {
		


		echo $today = date('Y-m-d H:i:s');
		echo '<br>';
		echo $current_day = strtolower(date('D'));
		echo '<br>';
		echo $current_time = date("G:i");
		echo '<br>';
		//echo $current_time_plush_5 = (string) date("H:i", strtotime('+5 minutes'));
		echo $current_time_plush_5 = (string) date('G:i', strtotime('+5 minutes'));
		//echo $current_time_plush_7 = (string) date("H:i", strtotime('+7 minutes'));
		$log_message =  PHP_EOL ;
        $log_message .=  '==================================================================================================' .PHP_EOL;
        $log_message .=  $today . PHP_EOL;
		$log_message .=  '==================================================================================================' .PHP_EOL;
		$log_message .= 'Social Media Post Log Start'  .PHP_EOL;
		$token_data = $this->get_token_data();
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$log_message .= '                      Token Info                      ' . PHP_EOL;
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$log_message .= 'access_token: ' . $token_data['access_token'] . PHP_EOL;
		$log_message .= 'expires_in: ' . $token_data['expires_in'] . PHP_EOL;
		$log_message .= 'refresh_token: ' . $token_data['refresh_token'] . PHP_EOL;
		$log_message .= 'token_type: ' . $token_data['token_type'] . PHP_EOL;
		$log_message .= 'create_time: ' . $token_data['create_time'] . PHP_EOL;
		$log_message .= 'expire_time: ' . $token_data['expire_time'] . PHP_EOL;
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$log_message .= '             Current Date, Time and Day Info          ' . PHP_EOL;
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$log_message .= 'date: ' . $today . PHP_EOL;
		$log_message .= 'current_day: ' . $current_day . PHP_EOL;
		$log_message .= 'current_time: ' . $current_time . PHP_EOL;
		$log_message .= 'current_time_plush_5_minutes: ' . $current_time_plush_5 . PHP_EOL;
		$log_message .= '------------------------------------------------------' . PHP_EOL;
		$this->writeLog($log_message);
		
		
		//pre($token_data);
		if (array_key_exists("access_token", $token_data) && $token_data['access_token']){
			
			$channels_schedule_rows = $this->get_promo_channels_schedule_info($current_day);
			/*$channels_schedule_rows = array(
			
				array("channel_name" => 'twitter',
				"schedule_day" => 'mon,tue,wed,thu,fri',
				"schedule_time" => '1:00,2:00,3:00,4:00,5:00,6:00,7:00,8:00,9:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00,23:00,24:00'
			    ),
				array("channel_name" => 'facebook',
				"schedule_day" => 'mon,tue,wed,thu,fri',
				"schedule_time" => '1:00,2:00,3:00,4:00,5:00,6:00,7:00,8:00,9:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00,23:00,24:00'
				),
				array("channel_name" => 'instagram',
				"schedule_day" => 'mon,tue,wed,thu,fri',
				"schedule_time" => '1:00,2:00,3:00,4:00,5:00,6:00,7:00,8:00,9:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00,23:00,24:00'
				),
				array("channel_name" => 'linkedin',
				"schedule_day" => 'mon,tue,wed,thu,fri',
				"schedule_time" => '1:00,2:00,3:00,4:00,5:00,6:00,7:00,8:00,9:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00,23:00,24:00'
			    ),
			);*/
			pre($channels_schedule_rows);
			if (!empty($channels_schedule_rows)){
			foreach($channels_schedule_rows as $channels_schedule_info){
				$channel = $channels_schedule_info['channel_name'];
				$publish_day = $channels_schedule_info['schedule_day'];
				//$publish_days =  explode(',',$channels_schedule_info['schedule_day']);
				pre($channels_schedule_info['schedule_time']);
				pre(str_replace(', ',',',$channels_schedule_info['schedule_time']));
				//$publish_times = explode(',',str_replace(', ',',',$channels_schedule_info['schedule_time']));
				$publish_times = explode(',',$channels_schedule_info['schedule_time']);
				pre($channels_schedule_info);
				pre($publish_times);
				$log_message =  '------------------------------------------------------' . PHP_EOL;
				$log_message .= '         Promotion Channel Schedule Info             ' . PHP_EOL;
				$log_message .= '------------------------------------------------------' . PHP_EOL;
				$log_message .= 'channel = ' . $channels_schedule_info['channel_name'] . PHP_EOL;
				$log_message .= 'publish_day = ' . $channels_schedule_info['schedule_day'] . PHP_EOL;
				$log_message .= 'publish_times = ' . $channels_schedule_info['schedule_time'] . PHP_EOL;
				$log_message .= '------------------------------------------------------' . PHP_EOL;
				$this->writeLog($log_message);
				//$site_datetime_last_deployed = $this->get_site_datetime_last_deployed($site);
				//if($publish_day == $current_day && in_array($current_time_plush_5, $publish_times)){
				pre($publish_times);
				pre($this->promotion_model->get_hootsuit_promo_message($channel, $site_datetime_last_deployed = ''));				
				if($publish_day == $current_day  && in_array($current_time_plush_5, $publish_times)){
				$hootsuit_promo_message = $this->promotion_model->get_hootsuit_promo_message($channel, $site_datetime_last_deployed = '');
					pre($hootsuit_promo_message);
				
					if(!empty($hootsuit_promo_message)){
						$log_message = '------------------------------------------------------' . PHP_EOL;
						$log_message .= '             Promotion Message Info                   ' . PHP_EOL;
						$log_message .= '------------------------------------------------------' . PHP_EOL;
						$log_message .= 'msg_id = ' . $hootsuit_promo_message['msg_id'] . PHP_EOL;
						$log_message .= 'site_id = ' . $hootsuit_promo_message['site_id'] . PHP_EOL;
						$log_message .= 'article_language_id = ' . $hootsuit_promo_message['article_language_id'] . PHP_EOL;
						$log_message .= 'article_id = ' . $hootsuit_promo_message['article_id'] . PHP_EOL;
						$log_message .= 'msg_channel = ' . $hootsuit_promo_message['msg_channel'] . PHP_EOL;
						$log_message .= 'msg_article_headline = ' . $hootsuit_promo_message['msg_article_headline'] . PHP_EOL;
						$log_message .= 'msg_intro = ' . $hootsuit_promo_message['msg_intro'] . PHP_EOL;
						$log_message .= 'msg_text = ' . $hootsuit_promo_message['msg_text'] . PHP_EOL;
						$log_message .= 'msg_url_link = ' . $hootsuit_promo_message['msg_url_link'] . PHP_EOL;
						$log_message .= 'msg_multimedia = ' . $hootsuit_promo_message['msg_multimedia'] . PHP_EOL;
						$log_message .= 'msg_cta = ' . $hootsuit_promo_message['msg_cta'] . PHP_EOL;
						$log_message .= 'msg_datetime_published = ' . $hootsuit_promo_message['msg_datetime_published'] . PHP_EOL;
						$log_message .= 'msg_sequence = ' . $hootsuit_promo_message['msg_sequence'] . PHP_EOL;
						$log_message .= 'site_id = ' . $hootsuit_promo_message['site_id'] . PHP_EOL;
						$log_message .= 'article_language_id = ' . $hootsuit_promo_message['article_language_id'] . PHP_EOL;
						$log_message .= 'msg_datetime_next_send = ' . $hootsuit_promo_message['msg_datetime_next_send'] . PHP_EOL;
						$log_message .= 'msg_status = ' . $hootsuit_promo_message['msg_status'] . PHP_EOL;
						$log_message .= '------------------------------------------------------' . PHP_EOL;

						$social_id_array = $this->get_promo_channels_social_id($hootsuit_promo_message['site_id'], $hootsuit_promo_message['msg_channel'], $lang='en');
						$log_message .= '------------------------------------------------------' . PHP_EOL;
						$log_message .= '             Promotion Social ID for site and channel Info                   ' . PHP_EOL;
						$log_message .= '------------------------------------------------------' . PHP_EOL;
						$log_message .= 'article_promo_channel_social_id = ' . $social_id_array['article_promo_channel_social_id'] . PHP_EOL;
						$log_message .= 'site_id = ' . $social_id_array['site_id'] . PHP_EOL;
						$log_message .= 'article_promo_channel = ' . $social_id_array['article_promo_channel'] . PHP_EOL;
						$log_message .= '------------------------------------------------------' . PHP_EOL;
						$this->writeLog($log_message);
						//pre($social_id_array);
						$social_ids	= array($social_id_array['article_promo_channel_social_id']);
						if($social_id_array['article_promo_channel_social_id']){
							$log_message = 'Social id exist in configuration for this channel and site.' . PHP_EOL;

							$this->writeLog($log_message);
						}else{
							$log_message = 'ERROR :: Social id does not exist in configuration for this channel and site.' . PHP_EOL;

							$this->writeLog($log_message);
						}

						//pre($social_ids);
						
						$post_message='';
						$msg_multimedia='';
						$image_url='';
						$video_url='';
						$msg_url_link='';
						$msg_headline ='';
						$msg_intro ='';
						$msg_text =''; 
						$msg_cta =''; 
						$media_data = [];
						if( $hootsuit_promo_message['msg_headline'])
						{
							$msg_headline = $hootsuit_promo_message['msg_headline'];	
						}

						if( $hootsuit_promo_message['msg_intro'])
						{
							$msg_intro = substr($hootsuit_promo_message['msg_intro'],0,40).'...';	
						}else{
							$msg_intro = substr($hootsuit_promo_message['msg_text'],0,40).'...'; 
						}

						if( $hootsuit_promo_message['msg_text'])
						{
							$msg_text = $hootsuit_promo_message['msg_text'];	
						}

						if( $hootsuit_promo_message['msg_url_link'])
						{
							$msg_url_link = $hootsuit_promo_message['msg_url_link'];	
						}

						if( $hootsuit_promo_message['msg_cta'])
						{
							$msg_cta = $hootsuit_promo_message['msg_cta'];	
						}
						if($hootsuit_promo_message['msg_multimedia'])
						{
							$extension = pathinfo($hootsuit_promo_message['msg_multimedia'],PATHINFO_EXTENSION);
							if($extension =='png'|| $extension =='jpg' || $extension =='jpeg' || $extension =='gif')
							{
								if($hootsuit_promo_message['msg_multimedia'])
								{
									$image_url = $hootsuit_promo_message['msg_multimedia'];
									$parse_url = parse_url($image_url);
									pre(basename($parse_url['path']));
									/*if($hootsuit_promo_message['msg_channel']=='linkedin'){
										
										$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
										
									}else{
										
										$image_url = $this->resizeimage(basename($parse_url['path']), $setting = array('height'=>314, 'width'=>600));
										pre(site_url('assets/images/uploads/socialmedia/' . basename($parse_url['path']) ));
									}*/
									$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
									pre($image_url);
									
									//$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
									//$image_url = realpath(APPPATH . '../assets/images/uploads/socialmedia/' . basename($parse_url['path']) );
									//$image_url = site_url('assets/images/uploads/socialmedia/' . basename($parse_url['path']) );
									$media_data = $this->upload_media($token_data, $image_url);
								}
								/*$image_url = $hootsuit_promo_message['msg_multimedia'];
								$parse_url = parse_url($image_url);
								$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
								$media_data = $this->upload_media($token_data, $image_url);*/
							}else{
								$msg_multimedia = 'http://www.youtube.com/watch?v=' . $hootsuit_promo_message['msg_multimedia'];
								//$msg_multimedia = 'https://www.youtube.com/embed/' . $hootsuit_promo_message['msg_multimedia'] . '?autoplay=1&modestbranding=1&rel=0&cc_load_policy=1&cc_lang_pref=' . $hootsuit_promo_message['article_language_id']; 
							}	
						}
						/*if( $hootsuit_promo_message['msg_multimedia'])
						{
							$video_url = 'https://www.youtube.com/watch?v='.$hootsuit_promo_message['msg_multimedia'];	
						}*/
						
						
						    //pre(ENVIRONMENT);
							if(ENVIRONMENT == 'development'){
								$scheduled_date = strtotime('+5 days');
							}else{
								$date = new DateTime("now", new DateTimeZone('UTC') );
								$tempdate = $date->format('Y-m-d H:i:s');
								pre('tempdate :'.$tempdate);
								$tempdate = strtotime($tempdate);
								$scheduled_date = strtotime("+7 minutes", $tempdate);
								//$scheduled_date = strtotime('+5 days', $tempdate);
								pre('scheduled_datekk :'.date('Y-m-d H:i:s', $scheduled_date));
							}
							
							
							
							//$scheduled_date = strtotime('+5 minutes');
							$scheduled_time_p1	= date('Y-m-d', $scheduled_date);
							$scheduled_time_p2	= date('H:i:s', $scheduled_date);
							$scheduled_time		= $scheduled_time_p1 . 'T' .  $scheduled_time_p2 . 'Z';
							pre('scheduled_time :'.$scheduled_time);
							if($hootsuit_promo_message['msg_channel']=='twitter'){

								$log_message = '------------------------------------------------------' . PHP_EOL;
								$log_message .= '            Twitter Promotion Message Info            ' . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
			
								$post_message .= $msg_text . "\r\n";
								$post_message .= $msg_url_link . "\r\n";
								$post_message .= $msg_multimedia . "\r\n";
								$log_message .= 'Twitter Post Message: ' . $post_message . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
								$this->writeLog($log_message);
			
							}
							if($hootsuit_promo_message['msg_channel']=='linkedin'){
			
								$log_message = '------------------------------------------------------' . PHP_EOL;
								$log_message .= '          Linkedin Promotion Message Info             ' . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
			
			
								//$post_message .= $msg_headline . "\r\n";
								//$post_message .= $msg_intro . "\r\n";
								$post_message .= $msg_text . "\r\n";
								$post_message .= $msg_multimedia . "\r\n";
								$post_message .= $msg_url_link;
			
								$log_message .= 'Linkedin Post Message: ' . $post_message . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
								$this->writeLog($log_message);
								
			
							}
							if($hootsuit_promo_message['msg_channel']=='facebook'){
			
								$log_message = '------------------------------------------------------' . PHP_EOL;
								$log_message .= '          Facebook Promotion Message Info             ' . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
			
			
								//$post_message .= $msg_headline . "\r\n";
								//$post_message .= $msg_intro . "\r\n";
								$post_message .= $msg_text . "\r\n";
								$post_message .= $msg_url_link . "\r\n";
								$post_message .= $msg_multimedia . "\r\n";
			
								$log_message .= 'Facebook Post Message: ' . $post_message . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
								$this->writeLog($log_message);
			
							}
							if($hootsuit_promo_message['msg_channel']=='instagram'){
			
								$log_message = '------------------------------------------------------' . PHP_EOL;
								$log_message .= '          Instagram Promotion Message Info            ' . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
			
			
								$post_message .= $msg_text . "\r\n";
								$post_message .= $msg_url_link . "\r\n";
								$post_message .= $msg_multimedia . "\r\n";
								$post_message .= $msg_cta . "\r\n";
			
								$log_message .= 'Instagram Post Message: ' . $post_message . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
								$this->writeLog($log_message);
			
							}
							
							$messages_result 	= $this->schedule_message($token_data, $post_message, $social_ids, $scheduled_time, $media_data);
							$id = $hootsuit_promo_message['msg_id'];
							$channel_data_save = array();
							$channel_data_save['msg_datetime_next_send'] = date('Y-m-d H:i:s', strtotime('+41 days'));
							if($messages_result == 'SCHEDULED'){
								$log_message = '------------------------------------------------------' . PHP_EOL;
								$log_message .= '          Message successfully scheduled             ' . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;

								if(ENVIRONMENT == 'development'){
									//$this->promotion_model->save($channel_data_save, $id);
								}else{
								  //$this->promotion_model->save($channel_data_save, $id);	
								}
							     $log_message .= 'Message Datetime Next Send: ' .  $channel_data_save['msg_datetime_next_send'] . PHP_EOL;
								$log_message .= '------------------------------------------------------' . PHP_EOL;
							   $this->writeLog($log_message);
							}else{
								$log_message = 'ERROR :: Message not scheduled.' . PHP_EOL;
								$log_message = 'Api Result Message : ' . $messages_result . PHP_EOL;

								$this->writeLog($log_message);
							}
							$this->promotion_model->save($channel_data_save, $id);
							
							//$this->writeLog($log_message);
						
					}else{

						$log_message = 'There is no message to schedule.' . PHP_EOL;

						$this->writeLog($log_message);
						continue;

					}

				}else{

					$log_message = 'Channel schedule day and time not match with current day and time.' . PHP_EOL;

					$this->writeLog($log_message);
				}

			}
		   }else{
			$log_message =  'Today ('.$current_day.') is not schedule day for messages.' . PHP_EOL;

			$this->writeLog($log_message);
		   }
			
		}else{

			$log_message = 'ERROR :: Access token is missing or invalid.' . PHP_EOL;

			$this->writeLog($log_message);
		}
		$log_message = 'Social Media Post Log End' . PHP_EOL;
		$this->writeLog($log_message);
	}
	public function verify() {

		$response_code_verify_link =  $this->config->item('hootsuit_auth_url') . 'auth?response_type=code&client_id=' . $this->config->item('hootsuit_client_id') . '&redirect_uri=' . $this->config->item('hootsuit_redirect_uri');
		/*** Send Email ****/
		$this->load->library('email');
		$from_name = $this->config->item('emailconfig_from_name');
		$from_email 	  = $this->config->item('emailconfig_from_email');
		$to_name = 'Chandra Shekhar';
		$to_email = 'kavastyhi@altametrics.com';
		$message_subject = 'Verify Your Hootsuite Account';

		$htmlContent  = '<p>Hello ' . $to_name . '!</p>';

		$htmlContent .= "<a href='".$response_code_verify_link."' target='_blank'>Click here to verify</a>";

		$htmlContent .= '<p>&nbsp;</p>';
		$htmlContent .= '<p>Thank you,<br>';
		$htmlContent .= 'The {portal_name} Team</p>';

		$emailer_data['from_name']		 = $from_name;
		$emailer_data['from_email']		 = $from_email;
		$emailer_data['to_name']		 = $to_name;
		$emailer_data['to_email'] 		 = $to_email;
		$emailer_data['message_subject'] = $message_subject;
		$emailer_data['message_body'] 	 = $htmlContent;

		$message = $this->load->view('component/hootsouitemail', $emailer_data, TRUE);
		$return['emailsend'] = 'true';
		$this->send_email($emailer_data, $message);
		/*** Send Email End ****/

	}
	/*
	 * GET NEW REFRESH TOKEN IF PERVIOUS TOKEN IS EXPIRE
	 */
	public function get_token_data()
	{
		$return_token_data = array();
		$token_data = $this->hootsuitconfig_model->get_new();
		//pre($token_data);
		
		
		if ($token_data) {
			$token_data_array = array(
				'access_token' => $token_data['hootsuit_access_token'],
				'expires_in' => $token_data['hootsuit_expires_in'],
				'refresh_token' => $token_data['hootsuit_refresh_token'],
				'token_type' => $token_data['hootsuit_token_type'],
				'create_time' => $token_data['hootsuit_create_time'],
				'expire_time' => $token_data['hootsuit_expire_time']
			);
			$return_token_data = $token_data_array;
			$current_time 		= time();
			$token_expire_time 	= (int) $token_data['hootsuit_create_time'] + ($token_data['hootsuit_expires_in'] - 600);
			$previous_refresh_token	= $token_data['hootsuit_refresh_token'];
			 //pre('current_time: '.$current_time);
			 //pre('token_expire_time: '.$token_expire_time);
			 
			if($previous_refresh_token && $current_time >= $token_expire_time){
				//pre('previous_refresh_token: '. $previous_refresh_token);
				$return_token_data = $this->request_new_token('refresh_token', $previous_refresh_token);
			}
		}

		if (array_key_exists("hootsuit_refresh_token",$token_data) && $token_data['hootsuit_refresh_token']==''){
			$return_token_data = $this->request_new_token();
		}
		//pre($return_token_data);
		return $return_token_data;
	}
	
	private function request_new_token($grant_type=null, $previous_refresh_token = null){
		$return_array = array();
		$token_post_url = $this->config->item('hootsuit_auth_url') . 'token';
		$post_header = array(
			'Content-Type: application/x-www-form-urlencoded'
		);

		if($grant_type == 'refresh_token' && $previous_refresh_token){
			$post_data_array = array(
				'grant_type' 	=> 'refresh_token',
				'refresh_token'	=> trim($previous_refresh_token),
				'redirect_uri' 	=> trim($this->config->item('hootsuit_redirect_uri'))
			);
		} else {
			$post_data_array = array(
				'grant_type' => 'authorization_code',
				'code' => $this->config->item('hootsuit_api_code'),
				'redirect_uri' => $this->config->item('hootsuit_redirect_uri')
			);
		}
		//pre($post_data_array);
		
		$post_fields = http_build_query($post_data_array);
		$ch = curl_init($token_post_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_USERPWD, $this->config->item('hootsuit_user_password'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
		$curl_response 	= curl_exec($ch);
		sleep(5);
		if(curl_error($ch)){
			echo 'Request Error:' . curl_error($ch);
		}else{
			
			$response_array  = json_decode($curl_response, JSON_OBJECT_AS_ARRAY);
			pre($response_array);
			if (array_key_exists("error",$response_array)){
				$update_token_data = array(
					'hootsuit_access_token' => '',
					'hootsuit_expires_in' => '',
					'hootsuit_refresh_token' => '',
					'hootsuit_token_type' => '',
					'hootsuit_create_time' => '',
					'hootsuit_expire_time' => '',
				);
				
				$success = $this->hootsuitconfig_model->update_config($update_token_data);
				
				$this->verify();
				//$response_code =  $this->config->item('hootsuit_auth_url') . 'auth?response_type=code&client_id=' . $this->config->item('hootsuit_client_id') . '&redirect_uri=' . $this->config->item('hootsuit_redirect_uri');
				//header("Location: $response_code");

			} else {

				$create_time = time();
				$expires_in  = $response_array['expires_in'];

				$token_data  = array();
				$token_data['access_token'] 	= $response_array['access_token'];
				$token_data['expires_in']		= $expires_in;
				$token_data["refresh_token"]	= $response_array['refresh_token'];
				$token_data["token_type"]		= $response_array['token_type'];
				$token_data['create_time']		= $create_time;
				$token_data['expire_time']		= $create_time + ($expires_in - 600);
				$update_token_data = array(
					'hootsuit_access_token' => $token_data['access_token'],
					'hootsuit_expires_in' => $token_data['expires_in'],
					'hootsuit_refresh_token' => $token_data['refresh_token'],
					'hootsuit_token_type' => $token_data['token_type'],
					'hootsuit_create_time' => time(),
					'hootsuit_expire_time' => $token_data['expire_time']
				);
				
				$success = $this->hootsuitconfig_model->update_config($update_token_data);
				$return_array = $token_data;

			}
		}
		curl_close($ch);
		return $return_array;
	}

	public function schedule_message($token_data, $post_message, $social_ids, $scheduled_time, $media = array()){

		$access_token	= $token_data['access_token'];
		$authorization	= $token_data['token_type'] . ' ' . $access_token;

		$http_header = array(
			"Content-Type: application/json",
			"Authorization: $authorization"
		);

		$post_data = array();
		$post_data['text'] 				= $post_message;
		$post_data['socialProfileIds'] 	= $social_ids;
		$post_data['scheduledSendTime'] = $scheduled_time;
		if (is_array($media) && array_key_exists("data", $media)){
			$post_data['media'] = array(array('id' => $media['data']['id'],'videoOptions'=>array('title'=>'Test video','category'=>'ENTERTAINMENT1')));
		}
		pre($post_data);
		$post_fields = json_encode($post_data);
		sleep(5);
		$curl_opt_url = $this->config->item('hootsuit_api_url') . 'v1/messages';

		$curl = curl_init($curl_opt_url);
		curl_setopt($curl, CURLOPT_TIMEOUT, 9000);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $http_header);
		$messages_response = curl_exec($curl);
		$err = curl_error($curl);
		pre($messages_response);
		if($err){
			echo 'Request Error:' . $err;
			$return = 'FAILED';
		}else{
			
			$messages_result 	= json_decode($messages_response, TRUE);
			pre($messages_result);
			if(array_key_exists("data",$messages_result)){
				$return = $messages_result['data'][0]['state'];
				
			}else{
				
				$return = 'ERROR FOUND IN HOOTSUITE API RESPONSE :: '. $messages_response;
				
			}
			
		}

		curl_close($curl);
		echo $return;
		return $return;
		
	}

	public function get_mediaStatus($token_data, $url) {

		$access_token	= $token_data['access_token'];
		$authorization	= $token_data['token_type'] . ' ' . $access_token;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 9000);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			"Authorization: $authorization"
			)                                                                       
		); 

		// Submit the POST request
	    $result = curl_exec($ch); 	

		if ($result){
			$media_staus = json_decode($result, TRUE);
		} 
		curl_close($ch);
		print_r($media_staus); die;
		return  $media_staus;
	}



	public function upload_media($token_data, $file_path){

		$access_token	= $token_data['access_token'];
		$authorization	= $token_data['token_type'] . ' ' . $access_token;

		$file_size  = filesize($file_path);
		$mime_type	= mime_content_type($file_path);



		$http_header = array(
			"Authorization: $authorization"
		);

		$file_info 	 = array('sizeBytes' => $file_size, 'mimeType' => $mime_type);
		$post_fields = json_encode($file_info, JSON_UNESCAPED_SLASHES);

		$media_result = array();

		$media_post_url = $this->config->item('hootsuit_api_url') . 'v1/media';
		$ch = curl_init($media_post_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
		$curl_response 	= curl_exec($ch);
		if(curl_error($ch)){
			echo 'Request Error:' . curl_error($ch);
		}else{
			$media_result 	= json_decode($curl_response, TRUE);
		}
		curl_close($ch);

		if (array_key_exists("data",$media_result)){
			$media_data = $media_result['data'];
			if (array_key_exists("uploadUrl",$media_data)){

				$fileHandle = fopen($file_path, 'r');

				$media_http_header = array(
					"Content-Type: $mime_type",
					"Content-Length: $file_size"
				);

				$media_upload_url = $media_result['data']['uploadUrl'];
				$curl_um_conn = curl_init($media_upload_url);
				curl_setopt($curl_um_conn, CURLOPT_PUT, true);
				curl_setopt($curl_um_conn, CURLOPT_HTTPHEADER, $media_http_header);
				curl_setopt($curl_um_conn, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl_um_conn, CURLOPT_INFILE, $fileHandle);
				curl_setopt($curl_um_conn, CURLOPT_INFILESIZE,  $file_size);
				$curl_response 	= curl_exec($curl_um_conn);
				if(curl_error($curl_um_conn)){
					echo 'Request Error:' . curl_error($curl_um_conn);
				}else{
					$response_code = curl_getinfo($curl_um_conn, CURLINFO_HTTP_CODE);
					if($response_code != 200){
						$media_result = array();
					}
				}
				curl_close($curl_um_conn);
			}
		}
		return $media_result;
	}


	public function get_site_datetime_last_deployed($site_id){
		
		$this->db->select('*');
		$this->db->from('wp_sites');
		$this->db->where('site_id', $site_id);
		$query = $this->db->get();
		return $query->result_array();
		
	}
/*
	 * GET NEW REFRESH TOKEN IF PERVIOUS TOKEN IS EXPIRE
	 */
	public function get_promo_channels_schedule_info($day  = null){
		$this->db->select('*');
		$this->db->from('wp_promo_channels_schedule');
		/*if($channel){
			$this->db->where('channel_name', $channel);
		}*/
		if($day){
			$this->db->where('schedule_day', $day);
		}
		$query = $this->db->get();
		return  $query->result_array();
		//pre($this->db->last_query());
	}

	public function get_promo_channels_social_id($site_id = null, $channel = null, $lang  ='en'){
		$this->db->select('*');
		$this->db->from('wp_article_promo_channels_config');
		$this->db->where('site_id', $site_id);
		$this->db->where('article_promo_channel', $channel);
		$this->db->where('article_language_id', $lang);
		$query = $this->db->get();
		//pre($query->row());
		return (array) $query->row();
		//pre($this->db->last_query());
	}
	
	public function writeLog($log_message = null)
	{
		$log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'socialmedia-post-cron-log-' . date('Y-m-d') . '.php';

		$message  = '';
		if ( ! file_exists($filepath))
        {
       		$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }

		
		flock($fp, LOCK_EX);
        fwrite($fp, $message . $log_message);
        flock($fp, LOCK_UN);
        fclose($fp);
	}

  /**
    *
    * Image Manipulation 
    * 
   */
  public function resizeimage($filename=NULL, $setting = array())
  {

	 //$source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;
	 //$target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/socialmedia/';
	 //$filename;
	 
	 //$source_path = realpath(APPPATH . '../assets/images/uploads/243-instagram-1554410144-5140.png');
	 $source_path =  realpath(APPPATH . '../assets/images/uploads/' . $filename );
	 $target_path = realpath(APPPATH . '../assets/images/uploads/socialmedia/');

	 //pre("source_path : ".$source_path );
	 //pre("target_path : ".$target_path );
	
	 $width="1080";
	 $height="608";
	 if(array_key_exists('height', $setting) && $setting['height']){
		$height = $setting['height'];
		}
	 if(array_key_exists('width', $setting) && $setting['width']){
		$width = $setting['width'];
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source_path;
		$config['new_image'] = $target_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		$config['thumb_marker'] = "";
		$config['width']         = $width;
		$config['height']       =  $height;

		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}


	 $this->image_lib->clear();
	 sleep(2);
	 $image_url = realpath(APPPATH . '../assets/images/uploads/socialmedia/' . $filename );
	 return  $image_url;
  }
}
?>