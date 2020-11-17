
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign_publisher_model extends MY_Model
{
    protected $_table_name = 'link_campaign_publishers';
    protected $_primary_key = 'campaign_publisher_id';
      
    public function getTableName()
    {
        return $this->_table_name;
    }
  
    public function getTablePrimaryKey()
    {
        return $this->_primary_key;
    }

    public function delete($_id){
		parent::delete($_id);		
	}

}
