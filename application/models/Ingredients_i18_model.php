<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ingredients_i18_model extends MY_Model
{
    protected $_table_name = 'article_section_ingredients_translate_i18';
    protected $_primary_key = 'ingredient_i18_id';

	protected $_section_id;
	protected $_ingredient_i18_id;
    protected $_ingredient_order;
	protected $_ingredient_name;
	protected $_ingredient_qty;

	public function get_new()
    {
        $ingredient = new stdClass();
        $ingredient->section_id = '';
		$ingredient->ingredient_i18_id = '';
		$ingredient->ingredient_order = '';
		$ingredient->ingredient_name = '';
		$ingredient->ingredient_qty = '';
        return (array) $ingredient;
	}

	public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

	public function get_ingredients_i18_list($section_id, $language_id)
    {
		$this->db->select('*');
		$this->db->where('section_id', (int) $section_id);
		$this->db->where('language_id', $language_id);
		$this->db->order_by('ingredient_i18_id', "asc");
		$query = $this->db->get($this->_table_name);
		if($query->num_rows()>0)
        {
			$list_ingredients = array();
			foreach ($query->result() as $row)
            {
				$list_ingredients[$row->section_id] = array(

					'section_id' => $row->section_id,
					'ingredient_i18_id' => $row->ingredient_i18_id,
					'ingredient_order' => $row->ingredient_order,
					'ingredient_name' => $row->ingredient_name,
					'ingredient_qty' => $row->ingredient_qty

				);
			}
			return $list_ingredients;
		}
		else
        {
            return FALSE;
        }
	}

	public function save_article_i18_ingredients($ingredients, $section_id, $language_id){
		if(is_array($ingredients)){
			//$this->deleteSeleted('section_id', $section_id);
			$this->db->delete($this->_table_name, array(
				'section_id' => $section_id,
				'language_id' => $language_id
			));
			//pre($this->db->last_query()); 
			foreach ($ingredients  as $key => $ingredient) {
				if($ingredient['ingredient_name']){
					$data_ingredient = $ingredient;
					unset($data_ingredient['ingredient_i18_id']);
					$data_ingredient['section_id'] = $section_id;
					$data_ingredient['language_id'] = $language_id;
					$data_ingredient['ingredient_order'] = $key + 1;
					$this->save($data_ingredient);
				}
				//echo $this->db->last_query();
			}
		}
	}
}
