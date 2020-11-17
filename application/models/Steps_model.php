<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Steps_model extends MY_Model
{
    protected $_table_name = 'article_section_steps';
    protected $_primary_key = 'step_id';

	protected $_section_id;
    protected $_step_id;
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
		$step->step_id = '';
		$step->step_order = '';
		$step->step_description = '';
        return (array) $step;
	}

	public function get_steps_list($section_id)
    {
		$this->db->select('*');
		$this->db->where('section_id', $section_id);
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

	public function save_article_steps($steps, $section_id){
		if(is_array($steps)){
			$this->deleteSeleted('section_id', $section_id);
			foreach ($steps  as $key=>$step) {
				if($step['step_description']){
					$data_step = $step;
					$data_step['section_id'] = $section_id;
					$data_step['step_order'] = $key + 1;
					$this->save($data_step);
				}
			}
		}
	}
}
