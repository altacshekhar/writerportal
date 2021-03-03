<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_category extends CI_Migration {

	public function __construct() {
		parent::__construct();
		$this->load->dbforge();
		$this->down();
	}
	public function up()
	{
		$this->dbforge->add_field(array(
			'category_id' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'category_parent' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'category_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE
			),
			'category_slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'constraint' => '255',
				'null' => TRUE
			),
			'date_added' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'date_modified' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			)
		));
		$this->dbforge->add_key('category_id', TRUE);
		$this->dbforge->create_table('category');

		$data = array(
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Business Management",
				"category_slug" 	=> "business",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Human Resources",
				"category_slug" 	=> "labor",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Operations",
				"category_slug" 	=> "operations",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Scheduling",
				"category_slug" 	=> "scheduling",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Reporting",
				"category_slug" 	=> "reporting",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Technology",
				"category_slug" 	=> "technology",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Marketing",
				"category_slug" 	=> "marketing",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Workforce",
				"category_slug" 	=> "workforce",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Leadership",
				"category_slug" 	=> "leadership",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Food and Beverage",
				"category_slug" 	=> "food-and-beverage",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "Quality & Safety",
				"category_slug" 	=> "quality-and-safety",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
            array(
				"category_parent" 	=> "article",
				"category_name" 	=> "News",
				"category_slug" 	=> "news",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Menu Innovation",
				"category_slug" 	=> "menu",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Operations",
				"category_slug" 	=> "operations",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Technology",
				"category_slug" 	=> "technology",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Marketing",
				"category_slug" 	=> "marketing",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Workforce",
				"category_slug" 	=> "workforce",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "Leadership",
				"category_slug" 	=> "leadership",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "news",
				"category_name" 	=> "News",
				"category_slug" 	=> "news",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "recipe",
				"category_name" 	=> "Quick Service",
				"category_slug" 	=> "qsr",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "recipe",
				"category_name" 	=> "Fast Casual",
				"category_slug" 	=> "fcr",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "recipe",
				"category_name" 	=> "Table Service",
				"category_slug" 	=> "tsr",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "recipe",
				"category_name" 	=> "Independent",
				"category_slug" 	=> "inds",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			),
			array(
				"category_parent" 	=> "recipe",
				"category_name" 	=> "News",
				"category_slug" 	=> "news",
				"date_added" 		=> strftime("%Y-%m-%d %H:%M:%S"),
				"date_modified" 	=> strftime("%Y-%m-%d %H:%M:%S")
			)
         );

         $this->db->insert_batch('category', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('category');
	}
}