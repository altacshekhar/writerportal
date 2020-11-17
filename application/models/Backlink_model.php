<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backlink_model extends MY_Model
{
    protected $_table_name = 'article_backlink';
    protected $_primary_key = 'backlink_id';

    protected $_article_id;
    protected $_backlink_id;
    protected $_backlink_url;
    protected $_backlink_required;
    protected $_backlink_domain_authority;
    protected $_backlink_validation;
    protected $_link_text;
    protected $_link_url;

	public function get_new()
    {
        $backlink = new stdClass();
        $backlink->backlink_id = '';
		$backlink->backlink_url = '';
		$backlink->backlink_required = '';
		$backlink->backlink_domain_authority = '';
		$backlink->backlink_validation = '';
		$backlink->link_text = '';
		$backlink->link_url = '';
        return (array) $backlink;
    }

	public function get_backlink_list($article_id)
    {
		$this->db->select('*');
		$this->db->where('article_id', $article_id);
		$query = $this->db->get($this->_table_name);
		$list_backlink = array();
		if($query->num_rows()>0)
        {
			foreach ($query->result() as $row)
            {
				$list_backlink[$row->backlink_id] = array(
					'article_id' => $row->article_id,
					'backlink_id' => $row->backlink_id,
					'backlink_url' => $row->backlink_url,
					'backlink_required' => $row->backlink_required,
					'backlink_domain_authority' => $row->backlink_domain_authority,
					'backlink_validation' => $row->backlink_validation,
					'link_text' => $row->link_text,
					'link_url' => $row->link_url
				);

			}

		}
		else
        {

         $list_backlink =  array();

		}
		return $list_backlink;
	}

	public function get_all_backlink_list()
    {
		$list_backlink = array();
        $this->db->select('*');
		$this->db->from('articles');
		$this->db->join('article_user', 'article_user.user_id = articles.user_id', 'inner' );
		$this->db->join('article_section', 'article_section.article_id = articles.article_id', 'inner');
        $this->db->join('article_backlink', 'article_backlink.article_id = articles.article_id', 'inner');
		$this->db->where('article_backlink.backlink_required', 1);
		$queryrs = $this->db->get();
		//pre($this->db->last_query());
		//log_message('error', 'Some variable did not contain a value.');
		if($queryrs->num_rows()>0)
        {
			foreach ($queryrs->result() as $key=>$row)
            {
			//	pre($row);
				
				$list_backlink[$row->article_id]['article_id'] = $row->article_id;
				$list_backlink[$row->article_id]['article_title'] = $row->article_title;
				$list_backlink[$row->article_id]['user_email'] = $row->user_email;
				$list_backlink[$row->article_id]['user_full_name'] = $row->user_name;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['article_id'] = $row->article_id;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['section_id'] = $row->section_id;
				$list_backlink[$row->article_id]['article_section'][$row->section_id]['section_text'] = $row->section_text;
				$list_backlink[$row->article_id]['backlinks'][$row->backlink_id] = array(
					'article_id' => $row->article_id,
					'section_id' => $row->section_id,
					'backlink_id' => $row->backlink_id,
					'backlink_url' => $row->backlink_url,
					'backlink_required' => $row->backlink_required,
					'backlink_domain_authority' => $row->backlink_domain_authority,
					'backlink_validation' => $row->backlink_validation,
					'link_text' => $row->link_text,
					'link_url' => $row->link_url					
				);
				
				/*$list_backlink[$key]['article_id'] = $row->article_id;
				$list_backlink[$key]['user_email'] = $row->user_email;
				$list_backlink[$key]['user_full_name'] = $row->user_name;
				$list_backlink[$key]['sections'][$row->section_id]= array(
					'section_id' => $row->section_id,
					'section_text' => $row->section_text
				);
				$list_backlink[$key]['backlinks'][$row->backlink_id] = array(					
					'backlink_id' => $row->backlink_id,
					'backlink_url' => $row->backlink_url,
					'backlink_required' => $row->backlink_required,
					'backlink_domain_authority' => $row->backlink_domain_authority,
					'backlink_validation' => $row->backlink_validation,
					'link_text' => $row->link_text,
					'link_url' => $row->link_url					
				);*/
			}

		}

		return $list_backlink;
	}


	public function deleteArticleBacklink($backlinks_remove_array){ 
		$remove_backlink_arr  = array();
		$backlinks_arr = array();
		foreach($backlinks_remove_array['backlinks'] as $link){
			$remove_backlink_arr[] = $link['backlink_id'];
			$backlinks_arr[] = 'contains(@href,"'.$link['link_url'].'")';	 
		}
		$backlinks_str = '//a['.implode(' or ', $backlinks_arr) . ']';
		foreach($backlinks_remove_array['article_section'] as $article_section){
			$section_id = $article_section['section_id'];
			$section_text = $article_section['section_text']; 
			$dom = new DOMDocument;
			$dom->loadHTML($section_text, LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD);
			$xp = new DOMXPath($dom);
			$links = $xp->query($backlinks_str);
			foreach ($links as $link) {
				$link->parentNode->removeChild($link);
			}
			$data_paragraph['section_text'] = $dom->saveHTML();
			$this->paragraph_model->save($data_paragraph, $section_id);
		}
		if(count($remove_backlink_arr) > 0)
		{
			$this->db->where_in('backlink_id', $remove_backlink_arr);
			$this->db->delete($this->_table_name);
		}
		return true;
	}

	public function save_article_backlink($backlinks, $article_id){
		//pre_exit($backlinks);

		if(is_array($backlinks)){
			$this->deleteSeleted('article_id', $article_id);
			foreach ($backlinks  as $key=>$backlink) {
				//pre_exit($backlink);
				//pre($backlink);
				if($backlink['backlink_url']){
					$data_backlink = $backlink;
					$data_backlink['article_id'] = $article_id;
					$this->save($data_backlink);
				}
			}
		}
	}

}
