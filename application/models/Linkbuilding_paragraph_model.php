<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linkbuilding_paragraph_model extends MY_Model
{
    protected $_table_name = 'link_article_section';
    protected $_primary_key = 'section_id';

	public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }
	
	public function get_paragraph_i18_list($article_id, $language_id)
    {
		$this->load->model('linkbuilding_paragraph_i18_model');
        $table_link_article_section_i18 = $this->linkbuilding_paragraph_i18_model->getTableName();
        $table_link_article_section_i18_PK = $this->linkbuilding_paragraph_i18_model->getTablePrimaryKey();
        $table_link_article_section = $this->getTableName();
        $table_link_article_section_PK = $this->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_link_article_section);
		$this->db->join($table_link_article_section_i18, 'link_article_section_translate_i18.section_id = link_article_section.section_id', 'LEFT');
        $this->db->where($table_link_article_section.'.article_id', (int) $article_id);
		$this->db->where($table_link_article_section_i18.'.language_id', $language_id); 
		$this->db->order_by($table_link_article_section_i18.'.section_i18_id', "asc");       
		//$query = $this->db->get()->row_array();
		$query = $this->db->get();
	//	pre($this->db->last_query());
	//	pre($query);
		$list_paragraph = array();
		if($query->num_rows()>0)
        {
			//pre($query->result());
			foreach ($query->result() as $row)
            {
				$list_paragraph[$row->section_id] = (array) $row;

				$callouts = $this->get_callouts_i18_list($row->section_id, $language_id);

				if($callouts)
					$list_paragraph[$row->section_id]['callouts'] = $callouts;
				else{
					$this->load->model('linkbuilding_callouts_i18_model');
					$list_paragraph[$row->section_id]['callouts'][0] =  $this->linkbuilding_callouts_i18_model->get_new();
				}

				/*$ingredients = $this->get_ingredients_i18_list($row->section_id, $language_id);

				if($ingredients)
					$list_paragraph[$row->section_id]['ingredients'] = $ingredients;
				else{
					$this->load->model('ingredients_i18_model');
					$list_paragraph[$row->section_id]['ingredients'][0] =  $this->ingredients_i18_model->get_new();
				}

				$steps = $this->get_steps_i18_list($row->section_id, $language_id);

				if($steps)
					$list_paragraph[$row->section_id]['steps'] = $steps;
				else{
					$this->load->model('steps_i18_model');
					$list_paragraph[$row->section_id]['steps'][0] =  $this->steps_i18_model->get_new();
				}*/
			}

		}
		else
        {
			$this->load->model('linkbuilding_callouts_i18_model');
			//$this->load->model('ingredients_i18_model');
			//$this->load->model('steps_i18_model');
			$list_paragraph[0] =  $this->get_new_t(true);
			$list_paragraph[0]['callouts'][0] =  $this->linkbuilding_callouts_i18_model->get_new();
			//$list_paragraph[0]['ingredients'][0] =  $this->ingredients_i18_model->get_new();
			//$list_paragraph[0]['steps'][0] =  $this->steps_i18_model->get_new();
		}
		return $list_paragraph;
	}

	public function get_callouts_i18_list($section_id, $language_id)
    {
		$this->load->model('linkbuilding_callouts_i18_model');
		$callouts = $this->linkbuilding_callouts_i18_model->get_by('section_id=' . $section_id);
		return json_decode(json_encode($callouts), TRUE);
	}

	/*public function get_ingredients_i18_list($section_id, $language_id)
    {
		$this->load->model('ingredients_i18_model');
		$ingredients = $this->ingredients_i18_model->get_by('section_id=' . $section_id);
		return json_decode(json_encode($ingredients), TRUE);
	}

	public function get_steps_i18_list($section_id, $language_id)
    {
		$this->load->model('steps_i18_model');
		$steps =  $this->steps_i18_model->get_by('section_id=' . $section_id);
		return json_decode(json_encode($steps), TRUE);
	}*/



	public function deleteArticleParagraph($section_id,  $language_id){

		//$this->load->model('steps_i18_model');
		//$this->load->model('ingredients_i18_model');
		$this->load->model('linkbuilding_callouts_i18_model');
		$this->load->model('linkbuilding_paragraph_i18_model');
		$where = "language_id='".$language_id."' AND section_id = '".$section_id."'";
		$data_section_i18 = (array) $this->paragraph_i18_model->get_by($where, TRUE);
		$data_section_i18_id=$data_section_i18['section_i18_id'];
	
		//$section = $this->get($section_id);
		$image_upload_dir = $this->config->item('image_upload_dir');
		$section_image_pathinfo = pathinfo($data_section_i18['section_image']);
		if($section_image_pathinfo['basename']){
			$image_path = FCPATH . $image_upload_dir . $section_image_pathinfo['basename'];
			if(file_exists($image_path))
			{
				unlink($image_path);
			}
		}
		//pre_exit($data_section_i18);
		$paragraph_i18_table = $this->linkbuilding_paragraph_i18_model->getTableName();
		$this->db->where('section_i18_id', $data_section_i18_id);
		$this->db->delete($paragraph_i18_table);
		//pre($this->db->last_query());
		$this->db->flush_cache();

		//$ingredient_table = $this->ingredients_i18_model->getTableName();
		//$steps_table = $this->steps_i18_model->getTableName();
		$callouts_table = $this->linkbuilding_callouts_i18_model->getTableName();
		//$tables = array($ingredient_table, $steps_table, $callouts_table);
		$tables = array($callouts_table);
		$this->db->delete($tables, array('section_id' => $section_id, 'language_id' => $language_id)); 
		//pre($this->db->last_query());
		$this->db->flush_cache();

		// Delete self
		parent::delete($section_id);
		//pre($this->db->last_query());
	}

}
