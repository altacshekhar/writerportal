<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Articlebrief_model extends MY_Model
{
    protected $_table_name = 'link_briefs';
    protected $_primary_key = 'brief_id';
      
      public function getTableName()
      {
          return $this->_table_name;
      }
  
      public function getTablePrimaryKey()
      {
          return $this->_primary_key;
      }
      
      private function _get_datatables_query($post_array)
      {     
            $this->load->model('user_model');
            $this->load->model('campaign_model');
		    $this->load->model('linkarticle_model');
		    $this->load->model('publisher_model');
            $this->load->model('linkbuilding_article_model');
            $this->load->model('linkbuilding_article_i18_model');
            
            $table_user = $this->user_model->getTableName();
            $table_user_PK = $this->user_model->getTablePrimaryKey();

            $table_link_article = $this->linkbuilding_article_model->getTableName();
            $table_link_article_PK = $this->linkbuilding_article_model->getTablePrimaryKey();
            
            $table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
            $table_link_article_i18_PK = "article_id";

            $table_link_briefs = $this->getTableName();
            $table_brief_id_PK = $this->getTablePrimaryKey();

            $table_campaign = $this->campaign_model->getTableName();
            $table_campaign_PK = $this->campaign_model->getTablePrimaryKey();

            $table_publisher = $this->publisher_model->getTableName();
            $table_publisher_PK = $this->publisher_model->getTablePrimaryKey();
  
            //$table_article = $this->article_model->getTableName();
            //$table_article_PK = $this->article_model->getTablePrimaryKey();
  
              $column_order = array(
                    $table_link_briefs . '.brief_assign_date',
                    '',
                    $table_publisher . '.publisher_url',
                    $table_campaign . '.campaign_name',
                    $table_link_article_i18 . '.article_title',
                    $table_link_briefs . '.brief_article_status',
              );
              $column_search_global = array(
                    $table_link_article_i18 . '.article_title',
                    $table_campaign . '.campaign_name',
              );
              $column_search = array(
                  $table_campaign . '.campaign_id'
              );
              $order = array(
                  $table_link_briefs . '.brief_assign_date' => 'ASC'
              ); // default order
              $table_user_select_fields = array(
                  $table_user . '.user_id',
                  $table_user . '.user_type',
                  $table_user . '.user_fname',
                  $table_user . '.user_lname',
                  $table_user . '.user_email',
                  $table_user . '.user_image',
                  $table_link_article_i18 . '.article_title',
                  $table_campaign . '.campaign_name',
                  $table_publisher . '.publisher_first_name',
                  $table_publisher . '.publisher_last_name',
                );
              $this->db->select('*');
              $this->db->select($table_link_briefs.'.brief_id');
              $this->db->from($table_link_briefs);
              $this->db->join(
              $table_link_article,
              "$table_link_article.brief_id = $table_link_briefs.brief_id","left"
            );
           
            $this->db->join(
                  $table_link_article_i18,
                  "$table_link_article_i18.article_id = $table_link_article.article_id","left"
            );
            $this->db->join(
                  $table_campaign,
                  "$table_campaign.campaign_id = $table_link_briefs.campaign_id","left"
            );
            $this->db->join(
                  $table_publisher,
                  "$table_publisher.publisher_id = $table_link_briefs.publisher_id","left"
            );
            $whereArray = [];
              $i = 0;
  
            foreach ($column_search_global as $item) // loop column
            {
                    $search_value = $post_array['search']['value'];
                    //echo $search_value;
                if( $search_value)
                {
                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like('LOWER(' .$item. ')', strtolower($search_value));
                    }
                    else
                    {
                        $this->db->or_like('LOWER(' .$item. ')', strtolower($search_value));
                    }
                    if(count($column_search_global) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
  
              if(isset($post_array['columns'])){
                    foreach ($post_array['columns'] as $key=>$column_array)
                    {
                          if($column_array['searchable'] && $column_array['search']['value']!=''){
                                $this->db->where($column_search[$key], strtolower($column_array['search']['value']));
                          }
                    }
              }
  
          if(isset($post_array['order'])) // here order processing
          {
              //$this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
                if($post_array['order']['0']['column'] == 2)
                {
                    $this->db->order_by("substring(".$column_order[$post_array['order']['0']['column']].",'.*://([^/]*)')", $post_array['order']['0']['dir'],false);
                }
                else
                {
                    $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
                }
          }
          else if(isset($this->order))
          {
              $order = $this->order;
              $this->db->order_by(key($order), $order[key($order)]);
            }
            $this->db->group_start();
            $this->db->where($table_link_briefs . '.brief_article_writer !=', null);
            $this->db->or_where($table_link_briefs . '.publisher_id !=', null);
            $this->db->group_end();
    }

    public function get_link_brief_backlinks($campaign_id)
    {
        //$this->load->model('campaign_model');
        $this->load->model('articlebriefbacklink_model');
        // $table_link_campaigns = $this->campaign_model->getTableName();
        // $table_link_campaigns_PK = $this->campaign_model->getTablePrimaryKey();
        $table_link_brief = $this->getTableName();
        $table_link_brief_PK = $this->getTablePrimaryKey();
        $table_link_brief_backlink = $this->articlebriefbacklink_model->getTableName();
        $table_link_brief_backlink_PK = $this->articlebriefbacklink_model->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_link_brief_backlink);
        $this->db->join($table_link_brief, 'link_brief_backlinks.brief_id = link_briefs.brief_id', 'LEFT');
        $this->db->where($table_link_brief.'.campaign_id', (int) $campaign_id);
		$this->db->order_by($table_link_brief.'.brief_id', "asc");       
        $query = $this->db->get();
        $list_brief_backlink = array();
		if($query->num_rows()>0)
        {
			//pre($query->result());
			foreach ($query->result() as $row)
            {
                $list_brief_backlink[] = (array) $row;
            }
        }else{
            $list_brief_backlink =  array();
        }
        return $list_brief_backlink;
    }

    public function get_written_articles($campaign_id)
    {
        $this->load->model(array('linkbuilding_article_model','linkbuilding_article_i18_model'));
        $table_link_brief = $this->getTableName();
        $table_link_brief_PK = $this->getTablePrimaryKey();
        $table_link_articles = $this->linkbuilding_article_model->getTableName();
        $table_link_articles_PK = $this->linkbuilding_article_model->getTablePrimaryKey();
        $table_link_articles_i18 = $this->linkbuilding_article_i18_model->getTableName();
        $table_link_articles_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_link_articles);
        $this->db->join($table_link_brief,'link_briefs.brief_id = link_articles.brief_id','LEFT');
        $this->db->join($table_link_articles_i18,'link_articles_translate_i18.article_id = link_articles.article_id','LEFT');
        $this->db->where('link_briefs.campaign_id',$campaign_id);
        $query = $this->db->get();
        $list_article = array();
		if($query->num_rows()>0)
        {
			foreach ($query->result() as $row)
            {
                $list_article[$row->brief_id] = (array) $row;
            }
        }else{
            $list_article =  array();
        }
        return $list_article;
    }

    public function get_link_briefs($campaign_id)
    {
        $this->load->model(array('campaign_model','linkarticle_model','linkbuilding_article_model','linkbuilding_article_i18_model'));
        $table_link_campaigns = $this->campaign_model->getTableName();
        $table_link_campaigns_PK = $this->campaign_model->getTablePrimaryKey();
        $table_link_brief = $this->getTableName();
        $table_link_brief_PK = $this->getTablePrimaryKey();
        $table_link_wp_article = $this->linkarticle_model->getTableName();
        $table_link_wp_article_PK = $this->linkarticle_model->getTablePrimaryKey();
        $table_link_article = $this->linkbuilding_article_model->getTableName();
        $table_link_article_PK= $this->linkbuilding_article_model->getTablePrimaryKey();
        $table_link_article_i18 = $this->linkbuilding_article_i18_model->getTableName();
        $table_link_article_i18_PK = $this->linkbuilding_article_i18_model->getTablePrimaryKey();
        $this->db->select('*');
        $this->db->from($table_link_wp_article);
        $this->db->join($table_link_brief, 'link_wp_articles.link_wp_articles_id = link_briefs.link_wp_articles_id', 'LEFT');
        $this->db->join($table_link_campaigns, 'link_campaigns.campaign_id = link_wp_articles.campaign_id', 'LEFT');
        //$this->db->join($table_link_article, 'link_articles.brief_id = link_briefs.brief_id', 'LEFT');
        //$this->db->join($table_link_article_i18, 'link_articles_translate_i18.article_id = link_articles.article_id', 'LEFT');
        $this->db->where($table_link_wp_article.'.campaign_id', (int) $campaign_id);
		$this->db->order_by($table_link_brief.'.brief_id', "asc");       
        $query = $this->db->get();
       //pre($this->db->last_query());
        //die;
        $list_brief = array();
		if($query->num_rows()>0)
        {
			foreach ($query->result() as $row)
            {
                $list_brief[] = (array) $row;
            }
        }else{

            $list_brief =  array();
        }

        return $list_brief;
    }

    public function get_publishers_campaign($campaign_id = '')
    {
        $this->db->select("*");
        $this->db->from('link_campaign_publishers');
        $this->db->join('link_publishers','link_publishers.publisher_id = link_campaign_publishers.publisher_id','LEFT');
        $this->db->where('link_campaign_publishers.campaign_id',$campaign_id);
        $this->db->order_by('link_campaign_publishers.publisher_id','asc');
        $result = $this->db->get()->result();
        $result_array = [];
        foreach($result as $res)
        {
            $result_array[$res->publisher_id] = (array) $res;
        }
        return $result_array;
    }

    public function get_publishers_list($niches='',$type ='')
    {
        $this->db->select("*");
		$this->db->from('link_publishers');
		//$this->db->where('publisher_type', $type);
		if(count($niches)>1){
			$this->db->group_start();
			foreach ($niches  as $niche) {
				$this->db->or_like('publisher_niche', $niche);
			}
			$this->db->group_end();
		}else{
			$this->db->like('publisher_niche', $niches[0]);
        }
        if(count($type)>1){
			$this->db->group_start();
			foreach ($type  as $t) {
				$this->db->or_like('publisher_type', $t);
			}
			$this->db->group_end();
		}else{
			$this->db->like('publisher_type', $type[0]);
        }
        $result = array();
		//$this->db->order_by('date_added', 'DESC'); //ASC, DESC
        $result_array = $this->db->get()->result_array();
        $result[''] =  '---select---';
        foreach($result_array as $res)
        {
            $result[$res['publisher_id']] = $res['publisher_url'];
        }
        return $result;
    }
  
      function get_datatables($post_array)
      {
          $this->_get_datatables_query($post_array);
          if($post_array['length'] != -1)
          $this->db->limit($post_array['length'], $post_array['start']);
              $query = $this->db->get();
              //pre($this->db->last_query());
              //log_message("ERROR", $this->db->last_query());
          return $query->result();
      }
  
      function count_filtered($post_array)
      {
          $this->_get_datatables_query($post_array);
              $query = $this->db->get();
  
          return $query->num_rows();
      }
  
      public function count_all()
      {
          $this->db->from($this->_table_name);
          return $this->db->count_all_results();
      }

      public function getArticleBriefInfo(){
            
      }

}
