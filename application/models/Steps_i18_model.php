<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Steps_i18_model extends MY_Model
{
    protected $_table_name = 'article_section_steps_translate_i18';
    protected $_primary_key = 'step_i18_id';

	protected $_section_id;
    protected $_step_i18_id;
    protected $_step_order;
	protected $_step_description;

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
        $step = new stdClass();
        $step->section_id = '';
		$step->step_i18_id = '';
		$step->step_order = '';
		$step->step_description = '';
        return (array) $step;
	}

	public function get_steps_i18_list($section_id, $language_id)
    {
		$this->db->select('*');
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $language_id); 
		$this->db->order_by('step_i18_id', "asc");
		$query = $this->db->get($this->_table_name);
		if($query->num_rows()>0)
        {
			$list_steps = array();
			foreach ($query->result() as $row)
            {
				$list_steps[$row->section_id] = array(

					'section_id' => $row->section_id,
					'step_id' => $row->step_id,
					'step_order' => $row->step_order,
					'step_description' => $row->step_description

				);
			}
			return $list_steps;
		}
		else
        {
            return FALSE;
        }
	}

	public function save_article_i18_steps($steps, $section_id, $language_id){
		if(is_array($steps)){
			//$this->deleteSeleted('section_id', $section_id);
			$this->db->delete($this->_table_name, array(
				'section_id' => $section_id,
				'language_id' => $language_id
			));
			//pre($this->db->last_query()); 
			foreach ($steps  as $key=>$step) {
				if($step['step_description']){
					$data_step = $step;
					unset($data_step['step_i18_id']);
					$data_step['section_id'] = $section_id;
					$data_step['language_id'] = $language_id;
					$data_step['step_order'] = $key + 1;
					$this->save($data_step);
				}
			}
		}
	}
}
