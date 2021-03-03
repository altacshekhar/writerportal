<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends MY_Model
{
    protected $_table_name = 'article_user';
    protected $_primary_key = 'user_id';
	protected $_order_by = '';
	protected $_timestamps = true;

    public $rules = array(
        'user_email ' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
        ),
        'user_password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required',
        ),
    );

    public $rules_admin = array(
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean',
        ),
        'user_email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean',
        ), /*,
		'password' => array(
		'field' => 'password',
		'label' => 'Password',
		'rules' => 'trim|required',
		)*/
    );

    public $rules_user_profile = array(
       /* 'user_name' => array(
            'field' => 'user_name',
            'label' => 'User Name*',
            'rules' => 'trim|required|xss_clean',
        ),*/
        'user_fname' => array(
            'field' => 'user_fname',
            'label' => 'First Name',
            'rules' => 'trim|required|xss_clean',
        ),
        'user_lname' => array(
            'field' => 'user_lname',
            'label' => 'Last Name',
            'rules' => 'trim|required|xss_clean',
        ),
       /* 'user_is_admin' => array(
            'field' => 'user_is_admin',
            'label' => 'User Type',
            'rules' => 'trim|required|xss_clean',
        ),*/
        'user_email' => array(
            'field' => 'user_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean',
        ),
        'user_phone' => array(
            'field' => 'user_phone',
            'label' => 'Phone',
            'rules' => 'trim|xss_clean',
        ),
        'user_bo_info' => array(
            'field' => 'user_bo_info',
            'label' => 'User Info',
            'rules' => 'trim|xss_clean',
        ),
        'meta_author_url' => array(
            'field' => 'meta_author_url',
            'label' => 'Meta Author Url',
            'rules' => 'trim|xss_clean',
        ),
        'meta_author_facebook_url' => array(
            'field' => 'meta_author_facebook_url',
            'label' => 'Facebook Url',
            'rules' => 'trim|xss_clean',
        ),
        'meta_author_twitter_url' => array(
            'field' => 'meta_author_twitter_url',
            'label' => 'Twitter Url',
            'rules' => 'trim|xss_clean',
        ),
        'user_password' => array(
            'field' => 'user_password',
            'label' => 'Password',
            'rules' => 'trim',
        ),
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

    public function login()
    {

        $user = $this->get_by(
            //'user_email = "' . $this->input->post('email') . '" AND user_password = "' . $this->hash($this->input->post('password')) . '"', true

            "user_email = '" . $this->input->post('email') . "' AND user_password = '" . $this->hash($this->input->post('password')) . "'", true
        );

        if ($user) {
            // Log in user
            $data = array(
                'full_name' => $user->user_fname . ' ' . $user->user_lname,
                'email' => $user->user_email,
                'boinfo' => $user->user_bo_info,
                'author_url' => $user->meta_author_url,
                'author_facebook_url' => $user->meta_author_facebook_url,
                'author_twitter_url' => $user->meta_author_twitter_url,
                'id' => $user->user_id,
                'loggedin' => true,
                'user_type' => $user->user_type,
                'is_admin' => $user->user_is_admin,
            );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function loggedin()
    {
        return (bool) $this->session->userdata('loggedin');
    }
    public function get_new()
    {
        $user = array(
			'user_fname'=>'',
			'user_lname'=>'',
			'user_email'=>'',
			'user_name'=>'',
			'user_password'=>'',
			'user_phone'=>'',
			'user_image'=>'',
            'user_bo_info'=>'',
            'meta_author_url'=>'',
            'meta_author_description'=>'',
            'meta_author_facebook_url'=>'',
            'meta_author_twitter_url'=>'',
            'meta_author_instagram_url'=>'',
            'meta_author_linkedin_url'=>'',
            'user_is_admin'=>'',
            'user_type'=>'',
			'user_signup_dat'=>''
		);
        return $user;
	}

	public function get_user_article()
    {
		$this->load->model('article_model');

		$table_user = $this->getTableName();
        $table_user_PK = $this->getTablePrimaryKey();

        $table_article = $this->article_model->getTableName();
        $table_article_PK = $this->article_model->getTablePrimaryKey();

        $this->db->select($table_user.'.*, COUNT('.$table_article.'.article_id) as total_article');
        $this->db->from($table_article);
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK", 'RIGHT'
		);
		$this->db->group_by($table_user. '.' . $table_user_PK);
		$user_rows = $this->db->get()->result();
		//echo $this->db->last_query();
		return $user_rows;
	}

	public function get_article_group($user_id)
    {
		$this->load->model('article_model');

		$table_user = $this->getTableName();
        $table_user_PK = $this->getTablePrimaryKey();

        $table_article = $this->article_model->getTableName();
        $table_article_PK = $this->article_model->getTablePrimaryKey();

        $this->db->select($table_article.'.article_type, COUNT('.$table_article.'.article_id) as total_article');
        $this->db->from($table_article);
        $this->db->join(
            $table_user,
            "$table_user.$table_user_PK = $table_article.$table_user_PK", 'RIGHT'
		);
		$this->db->where($table_user . '.' . $table_user_PK, $user_id);
		$this->db->group_by($table_article. '.article_type');
		$user_rows = $this->db->get()->result();
		//echo $this->db->last_query();
		$return_array = array();
		if($user_rows){
			foreach($user_rows as $row){
				$return_array[$row->article_type] = $row->total_article;
			}
		}

		return $return_array;
	}

    public function hash($string)
    {
        return hash('sha512', $string . config_item("encryption_key"));
	}

	public function update_profile_pic($user_id){
		if($_FILES['user_image']['error'] == 0 && $this->upload->file_name){
			$relative_url = 'assets/images/profile/'.$this->upload->file_name;
			$data['user_image'] = $relative_url;
			$last_insert_id = $this->save($data, $user_id);
		}
	}

	private function _get_datatables_query($post_array)
    {
		$this->load->model('article_model');

		$table_user = $this->getTableName();
        $table_user_PK = $this->getTablePrimaryKey();

        $table_article = $this->article_model->getTableName();
        $table_article_PK = $this->article_model->getTablePrimaryKey();

		$column_order = array(
			$table_user . '.user_fname',
			$table_user . '.user_phone',
			$table_user . '.user_signup_date',
			$table_user . '.user_is_admin',
			'total_article'
		);
		$column_search_global = array(
			$table_user . '.user_fname',
            $table_user . '.user_lname',
            $table_user . '.user_name',
			$table_user . '.user_email',
			$table_user . '.user_phone',
		);
		$column_search = array(
            $table_user . '.user_type');
		$order = array(
			$table_user . '.date_modified' => 'DESC'
		); // default order

		$this->db->select($table_user.'.*, COUNT('.$table_article.'.article_id) as total_article');
		$this->db->from($table_article);
		$this->db->join(
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
            $this->db->order_by($column_order[$post_array['order']['0']['column']], $post_array['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
		}

		$this->db->group_by($table_user. '.' . $table_user_PK);
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
