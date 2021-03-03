<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Callouts_i18_model extends MY_Model
{
    protected $_table_name = 'article_section_callouts_translate_i18';
    protected $_primary_key = 'callout_i18_id';

	protected $_section_id;
    protected $_callout_i18_id;
    protected $_callout_order;
	protected $_callout_title;
	protected $_callout_text;

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
		$callout->callout_i18_id = '';
		$callout->callout_order = '';
		$callout->callout_title = '';
		$callout->callout_text = '';
        return (array) $callout;
	}

	public function get_callouts_i18_list($section_id, $language_id)
    {
		$this->db->select('*');
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $language_id); 
		$this->db->order_by('callout_i18_id', "asc");
		$query = $this->db->get($this->_table_name);
		if($query->num_rows()>0)
        {
			$list_callouts = array();
			foreach ($query->result() as $row)
            {
				$list_callouts[$row->section_id] = array(

					'section_id' => $row->section_id,
					'callout_id' => $row->callout_id,
					'callout_order' => $row->step_order,
					'callout_title' => $row->callout_title,
					'callout_text' => $row->callout_text

				);
			}
			return $list_callouts;
		}
		else
        {
            return FALSE;
        }
	}

	public function save_article_i18_callouts($callouts, $section_id, $language_id){
		if(is_array($callouts)){
			//$this->deleteSeleted('section_id', $section_id);
			$this->db->delete($this->_table_name, array(
				'section_id' => $section_id,
				'language_id' => $language_id
			));
			//pre($this->db->last_query()); 
			foreach ($callouts  as $key=>$callout) {
				if($callout['callout_title']){
					$data_callout = $callout;
					unset($data_callout['callout_i18_id']);
					$data_callout['section_id'] = $section_id;
					$data_callout['language_id'] = $language_id;
					$data_callout['callout_order'] = $key + 1;
					$this->save($data_callout);
				}
			}
		}
	}

	public function deleteArticleCallout($callout_id,  $language_id){

		//$where = "language_id='".$language_id."' AND callout_i18_id = '".$callout_id."'";
	    // Delete self
		parent::delete($callout_id);
		//pre($this->db->last_query());
	}


}
