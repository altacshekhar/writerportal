<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_media_callouts_i18_model extends MY_Model
{
    protected $_table_name = 'article_section_social_media_callouts_translate_i18';
    protected $_primary_key = 'social_media_callout_i18_id';

	protected $_section_id;
    protected $_social_media_callout_i18_id;
	protected $_social_media_callout_title;
	
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
        $callout = new stdClass();
        $callout->section_id = '';
		$callout->social_media_callout_i18_id = '';
		$callout->social_media_callout_title = '';
        return (array) $callout;
	}

	public function get_social_media_callouts_i18_list($section_id, $language_id)
    {
		$this->db->select('*');
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $language_id); 
		$this->db->order_by('social_media_callout_i18_id', "asc");
		$query = $this->db->get($this->_table_name);
		if($query->num_rows()>0)
        {
			$list_social_media_callouts = array();
			foreach ($query->result() as $row)
            {
				$list_social_media_callouts[$row->section_id] = array(

					'section_id' => $row->section_id,
					'social_media_callout_i18_id' => $row->social_media_callout_i18_id,
					
					'social_media_callout_title' => $row->social_media_callout_title,

				);
			}
			return $list_social_media_callouts;
		}
		else
        {
            return FALSE;
        }
	}

	public function save_article_i18_social_media_callouts($callout, $section_id, $language_id){
		//pre($callout);
		
		if(is_array($callout)){
			//$this->deleteSeleted('section_id', $section_id);
			$this->db->delete($this->_table_name, array(
				'section_id' => $section_id,
				'language_id' => $language_id
			));
			//pre($this->db->last_query()); 
			
				if($callout['social_media_callout_title']){
					$data_callout = $callout;
					unset($data_callout['social_media_callout_i18_id']);
					$data_callout['section_id'] = $section_id;
					$data_callout['language_id'] = $language_id;
					$this->save($data_callout);
					//pre($this->db->last_query());
					
				}
			
		}
	}

	public function deleteArticleSocialMediaCallout($sm_callout_id,  $language_id){

		//$where = "language_id='".$language_id."' AND callout_i18_id = '".$callout_id."'";
	    // Delete self
		parent::delete($sm_callout_id);
		//pre($this->db->last_query());
	}


}
