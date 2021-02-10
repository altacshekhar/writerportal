<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contentarticlebrief_cta_model extends MY_Model
{
    protected $_table_name = 'article_brief_cta';
    protected $_primary_key = 'brief_cta_id';
    protected $_timestamps = true;

    public $rules_cta_config = array(
        'cta_website[]' => array(
            'field' => 'cta_website[]',
            'label' => 'cta website',
            'rules' => 'trim|required',
        ),
        'cta_type[]' => array(
            'field' => 'cta_type[]',
            'label' => 'cta type',
            'rules' => 'trim|required',
        ),
        'cta_headline[]' => array(
            'field' => 'cta_headline[]',
            'label' => 'cta headline',
            'rules' => 'trim|required',
        ),
        'cta_sub_headline[]' => array(
            'field' => 'cta_sub_headline[]',
            'label' => 'cta subheadline',
            'rules' => 'trim|required',
        ),
        'cta_background_type[]' => array(
            'field' => 'cta_background_type[]',
            'label' => 'cta background type',
            'rules' => 'trim|required',
        ),
        'cta_button_text[]' => array(
            'field' => 'cta_button_text[]',
            'label' => 'cta button text',
            'rules' => 'trim|required',
        ),
        'cta_button_color[]' => array(
            'field' => 'cta_button_color[]',
            'label' => 'cta button color',
            'rules' => 'trim|required',
        ),
        'cta_form_id[]' => array(
            'field' => 'cta_form_id[]',
            'label' => 'cta form id',
            'rules' => 'trim|required',
        )
    );

    
    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

    public function get_new()
    {
        $cta = array(
            'cta_id',
            'brief_cta_language_id',
            'brief_cta_headline',
            'brief_cta_sub_headline',
            'brief_cta_website',
            'brief_cta_type',
            'brief_cta_button_text',
            'brief_cta_button_color',
            'brief_cta_background_type',
            'brief_cta_background',
            'brief_cta_background_image',
            'brief_cta_background_color',
            'brief_cta_background_video',
            'brief_cta_form_id'
		);
        return $cta;
	}
	
}
