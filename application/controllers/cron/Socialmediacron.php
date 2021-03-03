<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once APPPATH . 'third_party/instagram-photo-video-upload-api/instagram-photo-video-upload-api.class.php';
require_once APPPATH . 'third_party/twitteroauth/autoload.php';
require_once APPPATH . 'third_party/facebook/vendor/autoload.php';
//require APPPATH . "third_party/LinkedIn/vendor/autoload.php";
//require APPPATH . "third_party/LinkedIn/LinkedIn.php";
use Abraham\TwitterOAuth\TwitterOAuth;
//use myPHPnotes\LinkedIn;
class Socialmediacron extends Frontend_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->model('channel_model');
		$this->load->model('promotion_model');
		$this->load->model('article_i18_model');
		//$this->load->library('image_lib');
		
  
    }
	public function index()
  	{
      echo "Socialmediacron";

	}

	public function twitter()
	{
		$log_message = 'Twitter Log Start'  .PHP_EOL;
		$channel='twitter';
		echo $today = date('Y-m-d H:i:s');
		echo '<br>';
		echo $current_day = strtolower(date('D'));
		echo '<br>';
		echo $current_time = date("H:i");
		$channel_sites = $this->get_channel_sites($channel);
		foreach($channel_sites as $site){
			$publish_days = explode(',',$site['article_promo_channel_publish_days']);
			$publish_times = explode(',',$site['article_promo_channel_publish_times']);
			$languages = explode(',',strtolower($site['article_language_id']));
			$site_datetime_last_deployed = $this->get_site_datetime_last_deployed($site['site_id']);
			
			if(ENVIRONMENT == 'production'){
				/////// CONFIG Live ///////
				$consumer_key = $site['article_promo_channel_consumer_key'];
				$consumer_secret = $site['article_promo_channel_consumer_secret'];
				$access_token = $site['article_promo_channel_api_access_token'];
				$access_token_secret = $site['article_promo_channel_api_access_token_secret_key'];
			}else{
				/////// CONFIG Testing ///////
				$consumer_key = '4MbxFDa19cvy3xyZT6X7e01S5';
				$consumer_secret = 'lpZGkuo6utPA6VmV0bCEojw3xGlRYzTZilnK8HeoF6Lmzuaf69';
				$access_token = '1100095849139298312-9Uu1kQwH7gNQoBQbrdZ4UcOnnblFkF';
				$access_token_secret = 'Mjubh3DCi9cCNjalPtUwfRvClyO6oV1aO0tNP6d7004FT';
			}
			
			if(in_array($current_day, $publish_days)){
					foreach($languages as $language){
						$promo_message = $this->promotion_model->get_promo_message($site['site_id'], $language, $site['article_promo_channel'], $site_datetime_last_deployed );
						pre($promo_message);

						//Twitter Api 
						if(!empty($promo_message)){
						$log_message .= 'msg_id = ' . $promo_message['msg_id'] . PHP_EOL;
						$log_message .= 'article_id = ' . $promo_message['article_id'] . PHP_EOL;
						$log_message .= 'msg_article_headline = ' . $promo_message['msg_article_headline'] . PHP_EOL;
						$log_message .= 'msg_datetime_published = ' . $promo_message['msg_datetime_published'] . PHP_EOL;
						$log_message .= 'msg_sequence = ' . $promo_message['msg_sequence'] . PHP_EOL;
						$log_message .= 'site_id = ' . $promo_message['site_id'] . PHP_EOL;
						$log_message .= 'article_language_id = ' . $promo_message['article_language_id'] . PHP_EOL;
						$log_message .= 'msg_datetime_next_send = ' . $promo_message['msg_datetime_next_send'] . PHP_EOL;
						

							$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret); /// testing account
							//pre($twitter_socialmedia);
							$image_url='';
							$video_url='';
							$tweet='';
							$linkurl='';
								if($promo_message['msg_multimedia'])
								{
									$image_url = $promo_message['msg_multimedia'];
									$parse_url = parse_url($image_url);
									$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
								}
								/*if( $promo_message['msg_multimedia'])
								{
									$video_url = 'https://www.youtube.com/watch?v='.$promo_message['msg_multimedia'];	
								}*/
								if( $promo_message['msg_text'])
								{
									$tweet = $promo_message['msg_text'];	
								}
								if( $promo_message['msg_url_link'])
								{
									$linkurl = $promo_message['msg_url_link'];	
								}
								$log_message .= 'tweet = ' . $tweet . PHP_EOL;
								$log_message .= 'image = ' . $image_url . PHP_EOL;
								$log_message .= 'video = ' . $video_url . PHP_EOL;
								$log_message .= 'linkurl = ' . $linkurl . PHP_EOL;
								pre('tweet:'.$tweet);
								pre('image:'.$image_url);
								if($tweet){
									$media1 = $connection->upload('media/upload', ['media' =>$image_url]);	
									//pre($media1);
									$parameters = [
										'status' => $tweet. PHP_EOL .$linkurl. PHP_EOL .$video_url,
										'media_ids' => implode(',', [$media1->media_id_string])
										];
									$result = $connection->post('statuses/update', $parameters);
									$id = $promo_message['msg_id'];
									$tweet_data_save = array();
									$tweet_data_save['msg_datetime_next_send'] = date('Y-m-d H:i:s', strtotime('+41 days'));
									pre($tweet_data_save);
								
									$this->promotion_model->save($tweet_data_save, $id);
									//pre($result);
									$log_message .= 'updated[msg_datetime_next_send] = ' . $tweet_data_save['msg_datetime_next_send'] . PHP_EOL;
									//$log_message .= 'result = ' . $result . PHP_EOL;
									$log_message .= 'Twitter post published for site '. $site['site_id'] . PHP_EOL;
								}
			
						$log_message .= 'Twitter post published for site '. $site['site_id'] . PHP_EOL;
					
			
						//End
					}else{	
						$log_message .= 'There is no record for twitter post published' . PHP_EOL;
					}
					}
			}else{
				$log_message .= 'Twitter post current day '. $current_day . PHP_EOL;
				$log_message .= 'Twitter post current time '. $current_time . PHP_EOL;
				$log_message .= 'Twitter post publish day '. $site['article_promo_channel_publish_days'] . PHP_EOL;
				$log_message .= 'Twitter post publish time '. $site['article_promo_channel_publish_times'] . PHP_EOL;
				$log_message .= 'Twitter post publish day & time not match with current day & time.' . PHP_EOL;
			}

		}
		
		$log_message .= 'Twitter Log End' . PHP_EOL;
		$this->writeLog($log_message);
	}

	
	public function instagram()
	{
		$table_promotion = $this->promotion_model->getTableName();
		$table_promotion_PK = $this->promotion_model->getTablePrimaryKey();
		$log_message = 'Instagram Log Start'  .PHP_EOL;
		$channel='instagram';
		echo $today=date('Y-m-d H:i:s');
		echo '<br>';
		echo $current_day = strtolower(date('D'));
		echo '<br>';
		echo $current_time = date("H:i");
		$channel_sites = $this->get_channel_sites($channel);
		pre($channel_sites);
		foreach($channel_sites as $site){
			$publish_days = explode(',',$site['article_promo_channel_publish_days']);
			$publish_times = explode(',',$site['article_promo_channel_publish_times']);
			$languages = explode(',',strtolower($site['article_language_id']));
			$site_datetime_last_deployed = $this->get_site_datetime_last_deployed($site['site_id']);
			if(ENVIRONMENT == 'production'){
				/////// CONFIG Live ///////
				$channel_username = $site['article_promo_channel_username'];
				$channel_password = $site['article_promo_channel_password'];
							//////////////////////
			}else{
				/////// CONFIG Testing ///////
				$channel_username = 'mithilesh.smartact';
				$channel_username = 'mthakur@1989';
				//////////////////////
			}
			
			if(in_array($current_day, $publish_days)){
				foreach($languages as $language){
					$promo_message = $this->promotion_model->get_promo_message($site['site_id'], $language, $site['article_promo_channel'], $site_datetime_last_deployed);
						pre($promo_message);
						//Instagram Api 
						if($promo_message){
						$log_message .= 'msg_id = ' . $promo_message['msg_id'] . PHP_EOL;
						$log_message .= 'article_id = ' . $promo_message['article_id'] . PHP_EOL;
						$log_message .= 'msg_article_headline = ' . $promo_message['msg_article_headline'] . PHP_EOL;
						$log_message .= 'msg_datetime_published = ' . $promo_message['msg_datetime_published'] . PHP_EOL;
						$log_message .= 'msg_sequence = ' . $promo_message['msg_sequence'] . PHP_EOL;
						$log_message .= 'site_id = ' . $promo_message['site_id'] . PHP_EOL;
						$log_message .= 'article_language_id = ' . $promo_message['article_language_id'] . PHP_EOL;
						$log_message .= 'msg_datetime_next_send = ' . $promo_message['msg_datetime_next_send'] . PHP_EOL;
						$image_url='';
						$video_url='';
						$captionText='';
						$photoFilename='';
						$videoFilename='';
						$linkurl='';
						$extension = pathinfo($promo_message['msg_multimedia'],PATHINFO_EXTENSION);
						if($extension =='png'|| $extension =='jpg' || $extension =='jpeg'){
							if($promo_message['msg_multimedia'])
							{
								$image_url = $promo_message['msg_multimedia'];
								$parse_url = parse_url($image_url);
								pre(basename($parse_url['path']));
								$this->resizeimage(basename($parse_url['path']), $setting = array('height'=>314, 'width'=>600));
								//$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
								$image_url = realpath(APPPATH . '../assets/images/uploads/socialmedia/' . basename($parse_url['path']) );

								$photoFilename = $image_url;
								
								//$photoFilename = 'https://colorlib.com/wp/wp-content/uploads/sites/2/instagram-image-size.png';
							}
						}else{
							$video_url = 'https://www.youtube.com/watch?v='.$promo_message['msg_multimedia'];
							//$video_url ='I:\xampp\htdocs\writerportal\assets\video\video-cucumber.mp4';
							$videoFilename = $video_url;	

						}

						if($promo_message['msg_headline'])
						{
							$captionText = $promo_message['msg_headline'];	
						}
						if($promo_message['msg_url_link'])
						{
							$linkurl = $promo_message['msg_url_link'];	
						}

							$log_message .= 'captionText = ' . $captionText . PHP_EOL;
							$log_message .= 'image = ' . $photoFilename . PHP_EOL;
							$log_message .= 'video = ' . $video_url . PHP_EOL;
							$log_message .= 'linkurl = ' . $linkurl . PHP_EOL;
							pre('captionText:'.$captionText);
							pre('photoFilename:'.$photoFilename);
							if($captionText && $photoFilename ){
								//$captionText= $captionText. PHP_EOL .$linkurl. PHP_EOL .$video_url;
								$obj = new InstagramUpload();
								pre($channel_username);
								pre($channel_password);
								$obj->Login($channel_username, $channel_password);
								pre($photoFilename);
								pre($captionText);
								$obj->UploadPhoto($photoFilename, $captionText);
								pre($obj);
								//$log_message .= 'result = ' . $obj . PHP_EOL;
								$id = $promo_message['msg_id'];
								$instagram_data_save = array();
								$instagram_data_save['msg_datetime_next_send'] = date('Y-m-d H:i:s', strtotime('+41 days'));
								pre($instagram_data_save);
							
								$this->promotion_model->save($instagram_data_save, $id);
								$log_message .= 'updated[next_send_date] = ' . $instagram_data_save['msg_datetime_next_send'] . PHP_EOL;
								$log_message .= 'Instagram post published for site '. $site['site_id'] . PHP_EOL;
							}else{
								$log_message .= 'Instagram post captionText & photoFilename not found for site '. $site['site_id'] . PHP_EOL;
							}

					}
				}
			}else{
				$log_message .= 'Instagram post current day '. $current_day . PHP_EOL;
				$log_message .= 'Instagram post current time '. $current_time . PHP_EOL;
				$log_message .= 'Instagram post publish day '. $site['article_promo_channel_publish_days'] . PHP_EOL;
				$log_message .= 'Instagram post publish time '. $site['article_promo_channel_publish_times'] . PHP_EOL;
				$log_message .= 'Instagram post publish day & time not match with current day & time.' . PHP_EOL;
			}
		}
		$log_message .= 'Instagram Log End'. PHP_EOL;
		$this->writeLog($log_message);
	}



	public function facebook()
	{

		$table_promotion = $this->promotion_model->getTableName();
		$table_promotion_PK = $this->promotion_model->getTablePrimaryKey();
		$log_message = 'Facebook Log Start'  .PHP_EOL;
		$channel='facebook';
		echo $today=date('Y-m-d H:i:s');
		echo '<br>';
		echo $current_day = strtolower(date('D'));
		echo '<br>';
		echo $current_time = date("H:i");
		$channel_sites = $this->get_channel_sites($channel);
		pre($channel_sites);
		foreach($channel_sites as $site){
			$publish_days = explode(',',$site['article_promo_channel_publish_days']);
			$publish_times = explode(',',$site['article_promo_channel_publish_times']);
			$languages = explode(',',strtolower($site['article_language_id']));
			$site_datetime_last_deployed = $this->get_site_datetime_last_deployed($site['site_id']);
			
			if(ENVIRONMENT == 'production'){
				/////// CONFIG Live ///////
				$access_token = $site['article_promo_channel_api_access_token'];
				$app_id = $site['article_promo_channel_api_key'];
				$app_secret = $site['article_promo_channel_api_secret_key'];
				$page_id = $site['article_promo_channel_page_id'];
				
			}else{
				/////// CONFIG Testing ///////
				$access_token = 'EAAEWQ1K8ZBLcBADrc9drgLOPjIMcXty1WNSaO3vW0u69n5jvtTAiUEX1NN4XNP2aNexzD3DWIkoeCqMLZBjGw7hS1PGw24VkO6TP00lBOpDoS3tZAdJtWVM1ZBOZBI4U46UVeK0WejqxytoAv7GSYFVUzTqkPMkMrGSF9BKe5jgqDAFqcYKWK';
				$app_id = '305953383446711';
				$app_secret = '429be1c6b6b75e091eb59bdfd1d53058';
				$page_id = '762998144082598';
			}
			
			if(in_array($current_day, $publish_days)){
				foreach($languages as $language){
					
					$promo_message = $this->promotion_model->get_promo_message($site['site_id'], $language, $site['article_promo_channel'], $site_datetime_last_deployed);
						pre($promo_message);
					if($promo_message){
						$log_message .= 'msg_id = ' . $promo_message['msg_id'] . PHP_EOL;
						$log_message .= 'article_id = ' . $promo_message['article_id'] . PHP_EOL;
						$log_message .= 'msg_article_headline = ' . $promo_message['msg_article_headline'] . PHP_EOL;
						$log_message .= 'msg_headline = ' . $promo_message['msg_headline'] . PHP_EOL;
						$log_message .= 'msg_intro = ' . $promo_message['msg_intro'] . PHP_EOL;
						$log_message .= 'msg_text = ' . $promo_message['msg_text'] . PHP_EOL;
						$log_message .= 'msg_datetime_published = ' . $promo_message['msg_datetime_published'] . PHP_EOL;
						$log_message .= 'msg_sequence = ' . $promo_message['msg_sequence'] . PHP_EOL;
						$log_message .= 'site_id = ' . $promo_message['site_id'] . PHP_EOL;
						$log_message .= 'article_language_id = ' . $promo_message['article_language_id'] . PHP_EOL;
						$log_message .= 'msg_datetime_next_send = ' . $promo_message['msg_datetime_next_send'] . PHP_EOL;
						$image_url='';
						$video_url='';
						$messageText='';
						$headlineText='';
						$introText ='';
						$photoFilename='';
						$videoFilename='';
						$linkurl='';
						$extension = pathinfo($promo_message['msg_multimedia'],PATHINFO_EXTENSION);
						if($extension =='png'|| $extension =='jpg' || $extension =='jpeg'){
							if($promo_message['msg_multimedia'])
							{
								$image_url = $promo_message['msg_multimedia'];
								$parse_url = parse_url($image_url);
								pre(basename($parse_url['path']));
								$this->resizeimage(basename($parse_url['path']), $setting = array('height'=>314, 'width'=>600));
								//$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
								//$image_url = realpath(APPPATH . '../assets/images/uploads/socialmedia/' . basename($parse_url['path']) );
								$image_url = site_url('assets/images/uploads/socialmedia/' . basename($parse_url['path']) );
								$photoFilename = $image_url;
								
								//$photoFilename = 'https://colorlib.com/wp/wp-content/uploads/sites/2/instagram-image-size.png';
							}
						}else{
							$video_url = 'https://www.youtube.com/watch?v='.$promo_message['msg_multimedia'];
							//$video_url ='I:\xampp\htdocs\writerportal\assets\video\video-cucumber.mp4';
							$videoFilename = $video_url;	

						}

						if($promo_message['msg_headline'])
						{
							$headlineText = $promo_message['msg_headline'];	
						}
						if($promo_message['msg_text'])
						{
							$messageText = $promo_message['msg_text'];	
						}
						if($promo_message['msg_intro'])
						{
							$introText = $promo_message['msg_intro'];	
						}
						if($promo_message['msg_url_link'])
						{
							$linkurl = $promo_message['msg_url_link'];	
						}
						$log_message .= 'msg_headline = ' . $headlineText . PHP_EOL;
						$log_message .= 'messageText = ' . $messageText . PHP_EOL;
						$log_message .= 'msg_intro = ' . $introText . PHP_EOL;
						$log_message .= 'image = ' . $photoFilename . PHP_EOL;
						$log_message .= 'video = ' . $video_url . PHP_EOL;
						$log_message .= 'linkurl = ' . $linkurl . PHP_EOL;
						if($messageText){
							$default_access_token = $access_token;
							$fb = new \Facebook\Facebook([
							'app_id' => $app_id,
							'app_secret' => $app_secret,
							'default_graph_version' => 'v2.10',
							'default_access_token' => $default_access_token
							]);
							/* PHP SDK v5.0.0 */
							/* make the API call */
							if($messageText && $photoFilename){
							try {
								// Returns a `Facebook\FacebookResponse` object
								$response = $fb->post(
									'/'.$page_id.'/photos',
								array (
									'url' => $photoFilename,
									'published' => '1',
									'caption' => $messageText,
								)
								);
							} catch(Facebook\Exceptions\FacebookResponseException $e) {
								echo 'Graph returned an error: ' . $e->getMessage();
								exit;
							} catch(Facebook\Exceptions\FacebookSDKException $e) {
								echo 'Facebook SDK returned an error: ' . $e->getMessage();
								exit;
							}
							$graphNode = $response->getGraphNode();
							}else if($messageText && $videoFilename){
								try {
									// Returns a `Facebook\FacebookResponse` object
									$response = $fb->post(
										'/'.$page_id.'/videos',
									array (
										'source' => $videoFilename,
										'published' => '1',
										'description' => $messageText,
									)
									);
								} catch(Facebook\Exceptions\FacebookResponseException $e) {
									echo 'Graph returned an error: ' . $e->getMessage();
									exit;
								} catch(Facebook\Exceptions\FacebookSDKException $e) {
									echo 'Facebook SDK returned an error: ' . $e->getMessage();
									exit;
								}
								$graphNode = $response->getGraphNode();
							}else{
								
								try {
									// Returns a `FacebookFacebookResponse` object
									
									$response = $fb->post(
										'/'.$page_id.'/feed',
										array (
										'message' => $messageText,
										'link' => $linkurl,
										'published' => '1'
										)
								);

								} catch(\Facebook\Exceptions\FacebookResponseException $e) {
									// When Graph returns an error
									echo '<br>'.'Graph returned an error: ' . $e->getMessage();
									exit;
								} catch(\Facebook\Exceptions\FacebookSDKException $e) {
									// When validation fails or other local issues
									echo '<br>'.'Facebook SDK returned an error: ' . $e->getMessage();
									exit;
								}
								$graphNode = $response->getGraphNode();
								echo '<pre>';
								print_r($graphNode);
								
							}
							/* handle the result */
							$id = $promo_message['msg_id'];
							$facebook_data_save = array();
							$facebook_data_save['msg_datetime_next_send'] = date('Y-m-d H:i:s', strtotime('+41 days'));
							pre($facebook_data_save);
						
							$this->promotion_model->save($facebook_data_save, $id);
							$log_message .= 'updated[next_send_date] = ' . $facebook_data_save['msg_datetime_next_send'] . PHP_EOL;
							$log_message .= 'Facebook post published for site '. $site['site_id'] . PHP_EOL;
						}else{
							$log_message .= 'Facebook post messageText & photoFilename not found for site '. $site['site_id'] . PHP_EOL;
						}
					}

				}
			}else{
				$log_message .= 'Facebook post current day '. $current_day . PHP_EOL;
				$log_message .= 'Facebook post current time '. $current_time . PHP_EOL;
				$log_message .= 'Facebook post publish day '. $site['article_promo_channel_publish_days'] . PHP_EOL;
				$log_message .= 'Facebook post publish time '. $site['article_promo_channel_publish_times'] . PHP_EOL;
				$log_message .= 'Facebook post publish day & time not match with current day & time.' . PHP_EOL;
			}

		}

		$log_message .= 'Facebook Log End'. PHP_EOL;
		$this->writeLog($log_message);
		
	}

	public function linkedin()
	{
		$linkedin_socialmedia = $this->promotion_model->linkedin_socialmedia_list();

		$app_id = "81vgbnu5dc0v1j";
		$app_secret = "XQksi1uVFOx5zb5s";
		$app_callback = "http://localhost/writerportalsocial/cron/socialmediacron/linkedincallback";
		$app_scopes = "r_emailaddress r_basicprofile r_liteprofile w_member_social rw_company_admin w_share";
		$ssl = false; // ALWAYS TRUE FOR PRODUCTION USE
		$linkedin = new LinkedIn($app_id, $app_secret, $app_callback, $app_scopes, $ssl);
		//$linkedin->getAuthUrl();
		pre($linkedin->getAuthUrl());
	}

	public function linkedincallback()
	{
		
		pre($_GET['code']);
		die;

		if ($_GET['state'] != $_SESSION['linkedincsrf']) {
			die("INVALID REQUEST");
		}
		
		$accessToken = $linkedin->getAccessToken($_GET['code']);
		if (!$accessToken) {
			die("NO ACCESS TOKEN FOUND. LOGIN AGAIN");
		}
		$this->session->set_userdata('linkedInAccessToken', $accessToken);
		

		pre($_SESSION['linkedInAccessToken']);
	}
	
	public function get_channel_sites($channel)
	{
		$table_channel = $this->channel_model->getTableName();
		$table_channel_PK = $this->channel_model->getTablePrimaryKey();
		$this->db->select('*');
		$this->db->from($table_channel);
		$this->db->where('article_promo_channel', $channel);
		$this->db->where('article_promo_channel_status', true);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_site_datetime_last_deployed($site_id){
		
		$this->db->select('*');
		$this->db->from('wp_sites');
		$this->db->where('site_id', $site_id);
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	public function writeLog($log_message = null)
	{
		$log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'socialmedia-cron-log-' . date('Y-m-d') . '.php';

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
        $message .=  '==================================================================================================' .PHP_EOL;
        $message .=  $log_date . PHP_EOL;
		$message .=  '==================================================================================================' .PHP_EOL;
		
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
  }

}
