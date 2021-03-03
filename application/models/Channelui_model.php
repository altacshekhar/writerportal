<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Channelui_model extends MY_Model
{
    protected $_table_name = 'wp_article_promo_channels';
    protected $_primary_key = 'channel_id';
	protected $_order_by = '';
	protected $_timestamps = false;

    public $rules_channel_config = array(
        'article_promo_channel' => array(
            'field' => 'article_promo_channel',
            'label' => 'promo channel',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_status' => array(
            'field' => 'article_promo_channel_status',
            'label' => 'channel status',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_headline' => array(
            'field' => 'article_promo_channel_show_headline',
            'label' => 'headline',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_msg_intro' => array(
            'field' => 'article_promo_channel_show_msg_intro',
            'label' => 'msg intro',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_msg_text' => array(
            'field' => 'article_promo_channel_show_msg_text',
            'label' => 'msg text',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_msg_url_link' => array(
            'field' => 'article_promo_channel_show_msg_url_link',
            'label' => 'msg url link',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_msg_multimedia' => array(
            'field' => 'article_promo_channel_show_msg_multimedia',
            'label' => 'msg multimedia',
            'rules' => 'trim|required',
        ),
        'article_promo_channel_show_msg_cta' => array(
            'field' => 'article_promo_channel_show_msg_cta',
            'label' => 'msg cta',
            'rules' => 'trim|required',
        )
    );

    public function __construct()
    {
        parent::__construct();
    }

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
        $channels = array(
			'site_id'=>'',
            'article_language_id'=>'',
            'article_promo_channel'=>'',
            'article_promo_channel_api_key'=>'',
            'article_promo_channel_api_secret_key'=>'',
			'article_promo_channel_publish_days'=>'',
			'article_promo_channel_publish_times'=>'',
			'article_promo_channel_show_headline'=>'',
			'article_promo_channel_show_msg_intro'=>'',
			'article_promo_channel_show_msg_text'=>'',
            'article_promo_channel_show_msg_url_link'=>'',
            'article_promo_channel_show_msg_multimedia'=>'',
            'article_promo_channel_show_msg_cta'=>'',
			'article_promo_channel_status'=>''
		);
        return $channels;
	}


	private function _get_datatables_query($post_array)
    {

		$table_channels = $this->getTableName();
        $table_channels_PK = $this->getTablePrimaryKey();

		$column_order = array(
			$table_channels . '.channel_id',
			$table_channels . '.article_promo_channel',
			$table_channels . '.article_promo_channel_api_key',
            $table_channels . '.site_id',
            $table_channels . '.article_language_id',
            $table_channels . '.article_promo_channel_publish_days',
            $table_channels . '.article_promo_channel_publish_times',
            $table_channels . '.article_promo_channel_show_headline',
            $table_channels . '.article_promo_channel_show_msg_intro',
            $table_channels . '.article_promo_channel_show_msg_text',
            $table_channels . '.article_promo_channel_show_msg_cta',
            $table_channels . '.article_promo_channel_show_msg_url_link',
            $table_channels . '.article_promo_channel_show_msg_multimedia',
            $table_channels . '.article_promo_channel_status',
			'total_channel'
		);
		$column_search_global = array(
			$table_channels . '.site_id',
			$table_channels . '.article_promo_channel',
			$table_channels . '.article_language_id'
		);
		$column_search = array(
			$table_channels . '.site_id',
			$table_channels . '.article_promo_channel',
			$table_channels . '.article_language_id');
		//$order = array(
			//$table_user . '.date_modified' => 'DESC'
		//); // default order

		$this->db->select($table_channels.'.*, COUNT('.$table_channels.'.channel_id) as total_channel');
		$this->db->from($table_channels);
		/*$this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK", 'RIGHT'
		);
		$i = 0;

        foreach ($column_search_global as $item) // loop column
        {
			$search_value = $post_array['search']['value'];
            if( $search_value)
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, strtolower($search_value));
                }
                else
                {
                    $this->db->or_like($item, strtolower($search_value));
                }
                if(count($column_search_global) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
		}*/

		if(isset($post_array['columns'])){
			foreach ($post_array['columns'] as $key=>$column_array)
			{
				if($column_array['searchable'] && $column_array['search']['value']){
					$this->db->where($column_search[$key], strtolower($column_array['search']['value']));
				}
			}
		}

        if(isset($post_array['order'])) // here order processing
        {
            $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
		}

		$this->db->group_by($table_channels. '.' . $table_channels_PK);
    }

    function get_datatables($post_array)
    {
        $this->_get_datatables_query($post_array);
        if($post_array['length'] != -1)
        $this->db->limit($post_array['length'], $post_array['start']);
		$query = $this->db->get();
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
}
