<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hootsuitconfig_model extends MY_Model
{
    protected $_table_name = 'configuration';
	protected $_primary_key = 'config_name';
	protected $_timestamps = false;

	public $rules_hootsuit_config = array(
        'hootsuit_api_url' => array(
            'field' => 'hootsuit_api_url',
            'label' => 'Api Url',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_auth_url' => array(
            'field' => 'hootsuit_auth_url',
            'label' => 'Auth Url',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_client_id' => array(
            'field' => 'hootsuit_client_id',
            'label' => 'Client Id',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_client_secret' => array(
            'field' => 'hootsuit_client_secret',
            'label' => 'Client Secret',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_user_password' => array(
            'field' => 'hootsuit_user_password',
            'label' => 'User Password',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_redirect_uri' => array(
            'field' => 'hootsuit_redirect_uri',
            'label' => 'Redirect Uri',
            'rules' => 'trim|required|xss_clean',
		),
		'hootsuit_api_code' => array(
            'field' => 'hootsuit_api_code',
            'label' => 'Api Code',
            'rules' => 'trim|required|xss_clean',
		)
	);

	public function get_new()
    {
        return array(
			'hootsuit_api_url'		=> $this->config->item('hootsuit_api_url'),
			'hootsuit_auth_url'	=> $this->config->item('hootsuit_auth_url'),
			'hootsuit_client_id'	=> $this->config->item('hootsuit_client_id'),
			'hootsuit_client_secret'	=> $this->config->item('hootsuit_client_secret'),
			'hootsuit_user_password'	=> $this->config->item('hootsuit_user_password'),
			'hootsuit_redirect_uri'	=> $this->config->item('hootsuit_redirect_uri'),
			'hootsuit_api_code'	=> $this->config->item('hootsuit_api_code'),
			'hootsuit_access_token'	=> $this->config->item('hootsuit_access_token'),
			'hootsuit_expires_in'	=> $this->config->item('hootsuit_expires_in'),
			'hootsuit_refresh_token' => $this->config->item('hootsuit_refresh_token'),
			'hootsuit_token_type'	=> $this->config->item('hootsuit_token_type'),
			'hootsuit_create_time'	=> $this->config->item('hootsuit_create_time'),
			'hootsuit_expire_time'	=> $this->config->item('hootsuit_expire_time')
        );
	}

	public function get_all()
	{
		return $this->db->get($this->_table_name);
	}

	public function update_config($data)
	{
		$success = true;
		foreach($data as $key=>$value)
		{
			if(!$this->save_config($key,$value))
			{
				$success = false;
				break;
			}
		}
		return $success;
	}

	public function save_config($key,$value)
	{
		//$where = 'config_name ="' . $key . '"';
		$where = "config_name ='" . $key . "'";
		$row = $this->get_by($where, TRUE);
		$config_data = array(
			'config_name' => $key,
			'config_value' => $value,
			'autoload' => ''
		);

		if($row){
			$this->db->where('config_name', $key);
			return $this->db->update($this->_table_name, $config_data);
		}else{
			$this->db->set($config_data);
			return $this->db->insert($this->_table_name);
		}
	}

	public function load_config()
	{
		foreach($this->db->get_all()->result() as $site_config)
		{
			$CI->config->set_item($site_config->key,$site_config->value);
		}
	}
}