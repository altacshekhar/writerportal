<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require_once APPPATH . 'third_party/instagram-photo-video-upload-api/instagram-photo-video-upload-api.class.php';
require_once APPPATH . 'third_party/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

class Socialmediacron extends Frontend_Controller
{
	public function __construct()
    {
        parent::__construct();

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

		$table_promotion = $this->promotion_model->getTableName();
		$table_promotion_PK = $this->promotion_model->getTablePrimaryKey();
		$table_promotion_article_id = 'article_id';
		$table_article_i18 = $this->article_i18_model->getTableName();
		$table_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
		$table_article_i18_id = 'article_id';
		

		$log_message = 'Twitter Log Start'  .PHP_EOL;
		$channel='twitter';
		echo $today=date('Y-m-d H:i:s');
		//$this->db->where("channel='$channel' AND next_send_date <= '$today'");
		//$this->db->order_by("next_send_date","desc");
        
		$this->db->select($table_promotion .".*");
		$this->db->join(
            $table_article_i18,
            "$table_article_i18.$table_article_i18_id = $table_promotion.$table_promotion_article_id"
        );
		$this->db->where($table_promotion.".channel='".$channel."' AND ".$table_promotion.".next_send_date <= '".$today ."' AND ".$table_article_i18.".article_status = 'published'");
		$this->db->group_by($table_promotion . '.id');
		//$this->db->group_by($table_article_i18 . '.article_i18_id');
		$this->db->order_by($table_promotion . '.next_send_date','desc');
		$twitter_socialmedia =  (array)$this->promotion_model->get(NULL, TRUE); 
		pre($twitter_socialmedia);
			$log_message .= 'id = ' . $twitter_socialmedia['id'] . PHP_EOL;
			$log_message .= 'article_id = ' . $twitter_socialmedia['article_id'] . PHP_EOL;
			$log_message .= 'date_published = ' . $twitter_socialmedia['date_published'] . PHP_EOL;
			$log_message .= 'message_id = ' . $twitter_socialmedia['message_id'] . PHP_EOL;
			$log_message .= 'site_id = ' . $twitter_socialmedia['site_id'] . PHP_EOL;
			$log_message .= 'next_send_date = ' . $twitter_socialmedia['next_send_date'] . PHP_EOL;
			if($twitter_socialmedia['site_id']=="hubworks.com"){
			//$connection = new TwitterOAuth('4MbxFDa19cvy3xyZT6X7e01S5', 'lpZGkuo6utPA6VmV0bCEojw3xGlRYzTZilnK8HeoF6Lmzuaf69', '1100095849139298312-9Uu1kQwH7gNQoBQbrdZ4UcOnnblFkF', 'Mjubh3DCi9cCNjalPtUwfRvClyO6oV1aO0tNP6d7004FT'); /// testing account
			if(ENVIRONMENT == 'production'){
			$connection = new TwitterOAuth('2ICVwaCJM6OreVz3mgm9FUijs', 'Z8T5Yd6gLH08GGGhcZHOWSnMmIq2TmwM759LKRSL34Aooxx8Qr', '3091054051-m7Zj1vVBvJkiBRfDfz40wbywN1AEJiY7cx04gi1', '01g5mZZ0eVsBLA8gFv0Hda3oiFZc7LXnWEt1gIZ3iCnI1'); // live account
			}
			

			//pre($twitter_socialmedia);
			$image_url='';
			$video_url='';
			$tweet='';
			$linkurl='';
				if( $twitter_socialmedia['image_url'])
				{
					$image_url = $twitter_socialmedia['image_url'];
					$parse_url = parse_url($image_url);
					$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
				}
				if( $twitter_socialmedia['video_url'])
				{
					$video_url = 'https://www.youtube.com/watch?v='.$twitter_socialmedia['video_url'];	
				}
				if( $twitter_socialmedia['intro_text'])
				{
					$tweet = $twitter_socialmedia['intro_text'];	
				}
				if( $twitter_socialmedia['url_link'])
				{
					$linkurl = $twitter_socialmedia['url_link'];	
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
					$id=$twitter_socialmedia['id'];
					$tweet_data_save = array();
					$tweet_data_save['next_send_date'] = date('Y-m-d H:i:s', strtotime('+41 days'));
					pre($tweet_data_save);
				   
					$this->promotion_model->save($tweet_data_save, $id);
					//pre($result);
					$log_message .= 'updated[next_send_date] = ' . $tweet_data_save['next_send_date'] . PHP_EOL;
					//$log_message .= 'result = ' . $result . PHP_EOL;
				}
		}

		$log_message .= 'Twitter Log End'  .PHP_EOL;
		$this->writeLog($log_message);

	}

	public function instagram()
	{
		$table_promotion = $this->promotion_model->getTableName();
		$table_promotion_PK = $this->promotion_model->getTablePrimaryKey();
		$table_promotion_article_id = 'article_id';
		$table_article_i18 = $this->article_i18_model->getTableName();
		$table_article_i18_PK = $this->article_i18_model->getTablePrimaryKey();
		$table_article_i18_id = 'article_id';

		$log_message = 'Instagram Log Start'  .PHP_EOL;
		$channel='instagram';
		echo $today=date('Y-m-d H:i:s');
		//$this->db->where("channel='$channel' AND next_send_date <= '$today'");
		//$this->db->order_by("next_send_date","desc");
		$this->db->select($table_promotion .".*");
		$this->db->join(
            $table_article_i18,
            "$table_article_i18.$table_article_i18_id = $table_promotion.$table_promotion_article_id"
        );
		$this->db->where($table_promotion.".channel='".$channel."' AND ".$table_promotion.".next_send_date <= '".$today ."' AND ".$table_article_i18.".article_status = 'published'");
		$this->db->group_by($table_promotion . '.id');
		//$this->db->group_by($table_article_i18 . '.article_i18_id');
		$this->db->order_by($table_promotion . '.next_send_date','desc');
		$instagram_socialmedia = (array) $this->promotion_model->get(NULL, TRUE); 
		pre($instagram_socialmedia);
		$image_url='';
		$video_url='';
		$captionText='';
		$photoFilename='';
		$videoFilename='';
		$linkurl='';
		$log_message .= 'id = ' . $instagram_socialmedia['id'] . PHP_EOL;
			$log_message .= 'article_id = ' . $instagram_socialmedia['article_id'] . PHP_EOL;
			$log_message .= 'date_published = ' . $instagram_socialmedia['date_published'] . PHP_EOL;
			$log_message .= 'message_id = ' . $instagram_socialmedia['message_id'] . PHP_EOL;
			$log_message .= 'site_id = ' . $instagram_socialmedia['site_id'] . PHP_EOL;
			$log_message .= 'next_send_date = ' . $instagram_socialmedia['next_send_date'] . PHP_EOL;
		if($instagram_socialmedia['site_id']=="hubworks.com"){
		if( $instagram_socialmedia['image_url'])
		{
			$image_url = $instagram_socialmedia['image_url'];
			$parse_url = parse_url($image_url);
			$image_url = realpath(APPPATH . '../assets/images/uploads/' . basename($parse_url['path']) );
			$photoFilename=$image_url;
		}
		if( $instagram_socialmedia['intro_text'])
		{
			$captionText = $instagram_socialmedia['intro_text'];	
		}
		if( $instagram_socialmedia['url_link'])
		{
			$linkurl = $instagram_socialmedia['url_link'];	
		}
		if( $instagram_socialmedia['video_url'])
		{
			$video_url = 'https://www.youtube.com/watch?v='.$instagram_socialmedia['video_url'];
			//$video_url ='I:\xampp\htdocs\writerportal\assets\video\video-cucumber.mp4';
			$videoFilename = $video_url;	
		}

			/////// CONFIG Testing ///////
			//$username = 'mithilesh.smartact';
			//$password = 'mthakur@1989';
			
			if(ENVIRONMENT == 'production'){
			/////// CONFIG Live ///////
				$username = 'hubworksapp';
				$password = 'Xhubworks#123';
			//////////////////////
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
				$obj->Login("hubworksapp", "Xhubworks#123");
				$obj->UploadPhoto($photoFilename, $captionText);
				//pre($obj);
				//$log_message .= 'result = ' . $obj . PHP_EOL;
				$id=$instagram_socialmedia['id'];
				$instagram_data_save = array();
				$instagram_data_save['next_send_date'] = date('Y-m-d H:i:s', strtotime('+41 days'));
				pre($instagram_data_save);
			   
				$this->promotion_model->save($instagram_data_save, $id);
				$log_message .= 'updated[next_send_date] = ' . $instagram_data_save['next_send_date'] . PHP_EOL;
			}

			
		}

		$log_message .= 'Instagram Log End'.PHP_EOL;
		$this->writeLog($log_message);
			
			
	}

	public function facebook()
	{
		$facebook_socialmedia = $this->promotion_model->facebook_socialmedia_list();

		//pre($facebook_socialmedia);
	}

	public function linkedin()
	{
		$linkedin_socialmedia = $this->promotion_model->linkedin_socialmedia_list();

		//pre($linkedin_socialmedia);
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
