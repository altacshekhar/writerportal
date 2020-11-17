<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promotion_model extends MY_Model
{
    protected $_table_name = 'wp_promo_messages';
	protected $_primary_key = 'msg_id';

	public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }
	
	public function get_socialmedia_list($article_id, $language)
	{
		$list_socialmedia = array();
		if($article_id){
			$this->db->select('*');
			$this->db->where('article_id', $article_id);
			$this->db->where('article_language_id', $language);
			$this->db->order_by("$this->_table_name.msg_id", "asc");
			$result_array = $this->db->get($this->_table_name)->result_array();
			$list_socialmedia = array();
			//pre($this->db->last_query());
			//pre($result_array);
			if(count($result_array)>0)
			{
				foreach ($result_array as $row)
				{
					$list_socialmedia[$row['msg_channel']][] = $row;
				}
			}
		}
		if(!array_key_exists('twitter', $list_socialmedia)){
			$list_socialmedia['twitter'][] =  $this->get_new();
			//pre($this->get_new());
		}
		if(!array_key_exists('linkedin', $list_socialmedia)){
			$list_socialmedia['linkedin'][] =  $this->get_new();
		}
		if(!array_key_exists('facebook', $list_socialmedia)){
			$list_socialmedia['facebook'][] =  $this->get_new();
		}
		if(!array_key_exists('instagram', $list_socialmedia)){
			$list_socialmedia['instagram'][] =  $this->get_new();
		}

		//pre_exit($list_socialmedia);
	 
		return $list_socialmedia;
	}

	public function update_socialmedia_list($article_id, $publish_date, $article_published_website, $language)
	{
		$list_socialmedia = array();
		if($article_id){
			$this->db->select('*');
			$this->db->where('article_id', $article_id);
			$this->db->where('article_language_id', $language);
			$result_array = $this->db->get($this->_table_name)->result_array();
			//pre($result_array);
			$list_socialmedia = array();
			if(count($result_array)>0)
			{
				foreach ($result_array as $row)
				{
				$promotion_data['msg_datetime_next_send'] =  date('Y-m-d H:i:s', strtotime($publish_date. ' + '.$row['msg_sequence'] .'days'));
				//$promotion_data['msg_datetime_next_send'] =  date('Y-m-d H:i:s', strtotime($publish_date));
				$promotion_data['site_id'] =  $article_published_website;
				$promotion_data['msg_datetime_published'] =  $publish_date;
				$this->save($promotion_data, $row['msg_id']);
				}
			}
		}
	
		return true;
	}

	public function twitter_socialmedia_list()
	{
		$twitter_list_socialmedia = array();
		$channel='twitter';
		$today=date('Y-m-d H:i:s');
		
			$this->db->select('*');
			$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
			$this->db->order_by("msg_datetime_next_send","desc");
			$this->db->limit('1');
			$result_array = $this->db->get($this->_table_name)->result_array();
			//pre($this->db->last_query());
			return $result_array;
			
	}

	public function linkedin_socialmedia_list()
	{
		$channel='linkedin';
		$today=date('Y-m-d H:i:s');
		
			$this->db->select('*');
			$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
			$this->db->order_by("msg_datetime_next_send","desc");
			$this->db->limit('1');
			$result_array = $this->db->get($this->_table_name)->result_array();
			//pre($this->db->last_query());
			return $result_array;
			
	}

	public function instagram_socialmedia_list()
	{
		$channel='instagram';
		$today=date('Y-m-d H:i:s');
		
			$this->db->select('*');
			$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
			$this->db->order_by("msg_datetime_next_send","desc");
			$this->db->limit('1');
			$result_array = $this->db->get($this->_table_name)->result_array();
			//pre($this->db->last_query());
			return $result_array;
			
	}

	public function facebook_socialmedia_list()
	{
		$channel='facebook';
		$today=date('Y-m-d H:i:s');
		
			$this->db->select('*');
			$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
			$this->db->order_by("msg_datetime_next_send","desc");
			$this->db->limit('1');
			$result_array = $this->db->get($this->_table_name)->result_array();
			//pre($this->db->last_query());
			return $result_array;
			
	}

	public function get_all_socialmedia_list($article_id, $language)
	{
		$list_socialmedia = array();
		if($article_id){
			$this->db->select('*');
			$this->db->where('article_id', $article_id);
			$this->db->where('article_language_id', $language);
			$this->db->order_by("$this->_table_name.msg_id", "asc");
			$result_array = $this->db->get($this->_table_name)->result_array();
			$list_socialmedia = array();
			//pre($this->db->last_query());
			//pre($result_array);
			if(count($result_array)>0)
			{
				foreach ($result_array as $row)
				{
					$list_socialmedia[$row['msg_channel']][] = $row;
				}
			}
		}
		if(!array_key_exists('twitter', $list_socialmedia)){
			$list_socialmedia['twitter'][] =  $this->get_new();
		}
		if(!array_key_exists('linkedin', $list_socialmedia)){
			$list_socialmedia['linkedin'][] =  $this->get_new();
		}
		if(!array_key_exists('facebook', $list_socialmedia)){
			$list_socialmedia['facebook'][] =  $this->get_new();
		}
		if(!array_key_exists('instagram', $list_socialmedia)){
			$list_socialmedia['instagram'][] =  $this->get_new();
		}

		//pre_exit($list_socialmedia);
	 
		return $list_socialmedia;
	}

	public function get_promo_message($site_id, $language, $channel, $site_datetime_last_deployed)
	{
		$this->load->model('channel_model');

		$today=date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('site_id', $site_id);
		$this->db->where('article_language_id', $language);
		//$this->db->where('msg_channel', $channel);
		$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
		//$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$site_datetime_last_deployed'");
		//$this->db->where('msg_datetime_published IS NOT NULL', NULL, FALSE);
		$this->db->order_by("msg_datetime_next_send","desc");
		$this->db->limit('1');
		$result_array = (array) $this->db->get()->row();
		//pre($this->db->last_query());
		//die;
		return $result_array;
			
	}

	public function get_all_promo_message($site_datetime_last_deployed)
	{
		$this->load->model('channel_model');

		$today=date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('site_id', $site_id);
		$this->db->where('article_language_id', $language);
		//$this->db->where('msg_channel', $channel);
		$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
		//$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$site_datetime_last_deployed'");
		//$this->db->where('msg_datetime_published IS NOT NULL', NULL, FALSE);
		$this->db->order_by("msg_datetime_next_send","desc");
		$this->db->limit('1');
		$result_array = (array) $this->db->get()->row();
		//pre($this->db->last_query());
		//die;
		return $result_array;
			
	}

	public function get_hootsuit_promo_message($channel, $site_datetime_last_deployed)
	{
		$this->load->model('channel_model');
		$today=date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->from($this->_table_name);
		 $this->db->where('site_id!=', null);
		 $this->db->where('msg_channel', $channel);
		 $this->db->where('article_published_status', true);
		 $this->db->where('msg_status', true);
		 $this->db->where('article_language_id', 'en');
		 $this->db->where("msg_datetime_next_send <= '$today'");
		//$this->db->where('site_id', $site_id);
		//$this->db->where('article_language_id', $language);
		//$this->db->where('msg_channel', $channel);
		//$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$today'");
		//$this->db->where("msg_channel='$channel' AND msg_datetime_next_send <= '$site_datetime_last_deployed'");
		//$this->db->where('msg_datetime_published IS NOT NULL', NULL, FALSE);
		$this->db->order_by("msg_datetime_next_send","desc");
		$this->db->limit('1');
		$result_array = (array) $this->db->get()->row();
		//pre($this->db->last_query());
		//die;
		return $result_array;
			
	}

	public function get_promo_message_id($article_id, $language, $channel)
	{
		$this->db->select('*');
		$this->db->from($this->_table_name);
		$this->db->where('article_id', $article_id);
		$this->db->where('article_language_id', $language);
		$this->db->where('msg_channel', $channel);
		$result_array = (array) $this->db->get()->row();
		//pre($this->db->last_query());
		//die;
		return $result_array;
			
	}
 

}
