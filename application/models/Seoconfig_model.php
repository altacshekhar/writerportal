<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seoconfig_model extends MY_Model
{
    protected $_table_name = 'configuration';
	protected $_primary_key = 'config_name';
	protected $_timestamps = false;

	public $rules_seo_config = array(
        'seofconfig_api_url' => array(
            'field' => 'seoconfig_api_url',
            'label' => 'Api Url',
            'rules' => 'trim|required|xss_clean',
		),
		'seoconfig_search_count' => array(
            'field' => 'seoconfig_search_count',
            'label' => 'Search Count',
            'rules' => 'trim|required|xss_clean',
		)
	);

	public function get_new()
    {
        return array(
			'seoconfig_api_url'		=> $this->config->item('seoconfig_api_url'),
			'seoconfig_search_count'	=> $this->config->item('seoconfig_search_count')
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