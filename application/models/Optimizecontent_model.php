<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Optimizecontent_model extends MY_Model
{
    protected $_table_name = 'articles_translate_i18';
	protected $_primary_key = 'article_i18_id';
	protected $_timestamps = true;

    public function getTableName()
    {
        return $this->_table_name;
    }

    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

    public function getMaxArticleID()
    {
        $table = $this->getTableName();
        $this->db->select_max($table.'.article_id');
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function setNull($aid = '')
    {
        $row = 0;
        if($aid > 0)
        {
            $this->db->where('article_id',$aid);
            $this->db->update('articles_translate_i18',['article_content_performance_temp' => null,'article_content_performance' => null]);
            $row = $this->db->affected_rows();
        }
        return $row;
    }

    public function setScoreNull()
    {
        $this->db->where('article_content_score','0');
        $this->db->update('articles_translate_i18',['article_content_score' => null,'article_target_score' => null]);
        $row = $this->db->affected_rows();
        return $row;
    }

    public function setNullLess($aid = '')
    {
        $row = 0;
        if($aid > 0)
        {
            $this->db->where('article_id <= ',$aid);
            $this->db->update('articles_translate_i18',['article_content_performance_temp' => null,'article_content_performance' => null]);
            $row = $this->db->affected_rows();
        }
        return $row;
    }

    public function getArticlesByArticleID($article_id = '')
    {
        $table = $this->getTableName();
        $fields = [$table.'.article_id',$table.'.language_id',$table.'.article_title',$table.'.article_meta_keyword',$table.'.article_content_performance_temp',$table.'.article_content_performance',$table.'.article_target_score',$table.'.article_content_score'];
        $this->db->select(implode(',',$fields));
        $this->db->from($table);
        if($article_id)
            $this->db->where($table.'.article_id',$article_id);
        //$this->db->where($table.'.article_content_performance_temp',null);
        $this->db->order_by('article_id','desc');
        //$this->db->limit(1);
        $articles = $this->db->get()->result();
        return $articles;
    }

    public function getAllArticles($article_id = '')
    {
        $table = $this->getTableName();
        $fields = [$table.'.article_id',$table.'.language_id',$table.'.article_title',$table.'.article_meta_keyword',$table.'.article_content_performance_temp',$table.'.article_content_performance'];
        $this->db->select(implode(',',$fields));
        $this->db->from($table);
        if($article_id)
            $this->db->where($table.'.article_id',$article_id);
        $this->db->where($table.'.article_target_score',null);
        $this->db->order_by('article_id','desc');
        $this->db->limit(1);
        $articles = $this->db->get()->result();
        return $articles;
    }

    public function getArticleContent($article_id = '')
    {
        $table = $this->getTableName();
        $table1 = "articles"; 
        $fields = [$table1.'.article_id',$table.'.language_id',$table.'.article_title',$table.'.article_meta_keyword',$table.'.article_content_performance_temp',$table.'.article_content_performance',$table.'.article_description',$table1.'.article_type',$table.'.article_target_score',$table.'.article_content_score'];
        $this->db->select(implode(',',$fields));
        $this->db->from($table1);
        $this->db->join($table,$table.'.article_id = '.$table1.'.article_id','LEFT');
        if($article_id)
            $this->db->where($table1.'.article_id',$article_id);
        //$this->db->where($table.'.article_content_score',null);
        $this->db->where($table.'.article_title != ',"");
        $this->db->order_by('article_id','desc');
        $this->db->limit(1);
        $articles = $this->db->get()->result();
        return $articles;
    }

    public function getArticleSectionContent($article_id = '')
    {
        $table = "articles";
        $table1 = "article_section";
        $table2 = "article_section_translate_i18";
        $table3 = "article_section_callouts_translate_i18";
        $table4 = "article_section_steps_translate_i18";
        $table5 = "article_section_ingredients_translate_i18";
        $fields = [$table.".article_id"];
        $this->db->select(implode(',',$fields));
        $this->db->select("string_agg(".$table2.".section_title, ' ') as section_title",false);
        $this->db->select("string_agg(".$table2.".section_text, ' ') as section_text",false);
        $this->db->select("string_agg(".$table3.".callout_title, ' ') as callout_title",false);
        $this->db->select("string_agg(".$table3.".callout_text, ' ') as callout_text",false);
        $this->db->select("string_agg(".$table4.".step_description, ' ') as step_description",false);
        $this->db->select("string_agg(".$table5.".ingredient_name, ' ') as ingredient_name",false);
        $this->db->from($table);
        $this->db->join($table1,$table1.'.article_id = '.$table.'.article_id','LEFT');
        $this->db->join($table2,$table2.'.section_id = '.$table1.'.section_id','LEFT');
        $this->db->join($table3,$table3.'.section_id = '.$table1.'.section_id','LEFT');
        $this->db->join($table4,$table4.'.section_id = '.$table1.'.section_id','LEFT');
        $this->db->join($table5,$table5.'.section_id = '.$table1.'.section_id','LEFT');
        $this->db->where($table.".article_id",$article_id);
        $this->db->group_by($fields);
        return $this->db->get()->result();
    }


    public function getArticleCalloutContent($article_id = '')
    {
        $table = "articles";
        $table1 = "article_section";
        $table2 = "article_section_callouts_translate_i18";
        $fields = [$table.".article_id"];
        $this->db->select(implode(',',$fields));
        $this->db->select("string_agg(".$table2.".callout_title, ' ') as callout_title",false);
        $this->db->select("string_agg(".$table2.".callout_text, ' ') as callout_text",false);
        $this->db->from($table);
        $this->db->join($table1,$table1.'.article_id = '.$table.'.article_id','LEFT');
        $this->db->join($table2,$table2.'.section_id = '.$table1.'.section_id','LEFT');
        $this->db->where($table.".article_id",$article_id);
        $this->db->group_by($fields);
        return $this->db->get()->result();
    }

}