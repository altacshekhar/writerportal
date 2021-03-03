<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailconfig_model extends MY_Model
{
    protected $_table_name = 'configuration';
	protected $_primary_key = 'config_name';
	protected $_timestamps = false;

	public $rules_email_config = array(
        'emailconfig_from_name' => array(
            'field' => 'emailconfig_from_name',
            'label' => 'Name',
            'rules' => 'trim|required|min_length[4]|xss_clean',
		),
		'emailconfig_from_email' => array(
            'field' => 'emailconfig_from_email',
            'label' => 'Email',
            'rules' => 'trim|required|min_length[4]|xss_clean',
		),
		'emailconfig_smtp_host' => array(
            'field' => 'emailconfig_smtp_host',
            'label' => 'Host',
            'rules' => 'trim|required|min_length[4]|xss_clean',
		),
		'emailconfig_smtp_port' => array(
            'field' => 'emailconfig_smtp_port',
            'label' => 'Port',
            'rules' => 'trim|required|min_length[2]|xss_clean',
		),
		'emailconfig_smtp_user' => array(
            'field' => 'emailconfig_smtp_user',
            'label' => 'User',
            'rules' => 'trim|required|min_length[4]|xss_clean',
		),
		'emailconfig_smtp_pass' => array(
            'field' => 'emailconfig_smtp_pass',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[4]|xss_clean',
		)
	);

	public function get_new()
    {
        return array(
			'emailconfig_from_name'		=> $this->config->item('emailconfig_from_name'),
			'emailconfig_from_email'	=> $this->config->item('emailconfig_from_email'),
			'emailconfig_smtp_host'		=> $this->config->item('emailconfig_smtp_host'),
			'emailconfig_smtp_port'		=> $this->config->item('emailconfig_smtp_port'),
			'emailconfig_smtp_crypto'	=> $this->config->item('emailconfig_smtp_crypto'),
			'emailconfig_smtp_user'		=> $this->config->item('emailconfig_smtp_user'),
			'emailconfig_smtp_pass'		=> ''//$this->config->item('emailconfig_smtp_pass')
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
			'config_value' => $value
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