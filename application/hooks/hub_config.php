<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Loads configuration from database into global CI config
function load_config()
{
	$CI =&get_instance();
	foreach($CI->emailconfig_model->get_all()->result() as $site_config)
	{
		$CI->config->set_item($site_config->config_name, $site_config->config_value);
	}
}