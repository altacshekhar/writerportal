<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Backlink extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('paragraph_model');
        //$this->load->model('backlink_model');
        $this->load->model('backlink_i18_model');
        $this->load->model('articletype_model');
        $this->load->model('articlecategory_model');
        $this->load->model('user_model');
        $this->load->model('category_model');
    }

    public function index()
    {
        $log_date  = date($this->config->item('log_date_format'));
		$log_path = $this->config->item('log_path');
		$log_path = ($log_path !== '') ? $log_path : APPPATH . 'logs/';
		$filepath = $log_path . 'backlink-log-' . date('Y-m-d') . '.php';

		$message  = '';

        if ( ! file_exists($filepath))
        {
       		$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">";
        }

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
    	    return FALSE;
        }
        $message .=  PHP_EOL ;
        $message .=  '===================' .PHP_EOL;
        $message .= $log_date . PHP_EOL;
        $message .=  '===================' .PHP_EOL;
        $articles = $this->backlink_i18_model->get_all_backlink_i18_list();
        $backlinks_remove_array = array();
      pre($articles);

        //pre_exit($backlinks);
        foreach($articles as $article_row){
            $to_full_name = $article_row['user_full_name'];
            $to_email 	  = $article_row['user_email'];
            $backlinks_remove_array['article_section'] = $article_row['article_section'];
            foreach($article_row['backlinks'] as $backlink_row){
                $search_link = $backlink_row['link_url'];
                $target_url  = $backlink_row['backlink_url'];;
                $backlink_validation = $backlink_row['backlink_validation'];

                $userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
                $message .= 'link_url = ' . $search_link . PHP_EOL;
                $message .= 'target_url = ' . $target_url . PHP_EOL;
               
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
                curl_setopt($ch, CURLOPT_URL,$target_url);
                curl_setopt($ch, CURLOPT_FAILONERROR, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $html_content= curl_exec($ch);
                if (!$html_content) {
                    $message .="cURL error number:" .curl_errno($ch) . PHP_EOL;
                    $message .= "cURL error:" . curl_error($ch) . PHP_EOL;
                    exit;
                }           
        
                // parse the html into a DOMDocument
                $dom = new DOMDocument();
                @$dom->loadHTML($html_content);        
        
                // grab all the on the page
                $xpath = new DOMXPath($dom);
                $hrefs = $xpath->evaluate("/html/body//a");
        
                // find result
                $result = $this->is_my_link_there($hrefs, $search_link);

                if ($result == 1) { // Backlink not found Condition
                  
                   $message_subject = 'The backlink is no longer valid';
                   $htmlContent  = '<p>Hello ' . $to_full_name . '!</p>';
                   $htmlContent  = '<p>A backlink was not found at ' .  $target_url . ' for ' . $search_link . '</p>';   
                   
                   switch ($backlink_validation) {
                       case 0:                          
                           $backlink_validation++;
                           $message .= "There is no link!!! set backlink validation 1"  . PHP_EOL;
                           $htmlContent .= '<p>Please restore the backlink or the link will automatically be removed after 7 days</p>';
   
                           break;
                       case 1:                          
                           $backlink_validation++;
                           $message .= "There is no link!!! set backlink validation case 2"  . PHP_EOL;
                           $htmlContent .= '<p>Please restore the backlink or the link will automatically be removed after 7 days.</p>';                          
    
                           break;
                       case 2:                            
                            $backlink_validation++;                      
                            $message .= "There is no link!!! set backlink validation  3"  . PHP_EOL;
                            $htmlContent .= '<p>The link will be removed in the next site update.  To avoid link removal, please restore the backlink ASAP</p>';
                        
                           break;
                       case 3:
                           $message .= "There is no link!!! delete backlink from article"  . PHP_EOL;
                           $htmlContent .= '<p>i.	Your link has been removed because your backlink is no longer valid</p>';
                           $backlinks_remove_array['backlinks'][$backlink_row['backlink_id']] = $backlink_row;
                           
                           break;
                   }
                   
                   $this->set_backlink_validation($backlink_validation, $backlink_row['backlink_id']);
                   $message .= "There is no link!!!"  . PHP_EOL;
   
                   $htmlContent .= '<p>&nbsp;</p>';
                   $htmlContent .= '<p>Thank you,<br>';
                   $htmlContent .= 'The {portal_name} Team</p>';
                   $emailer_data['from_name']		 = 'Writer Portal';
                   $emailer_data['from_email']		 = $to_email;
                   $emailer_data['to_name']		     = $to_full_name;
                   $emailer_data['to_email'] 		 = $to_email;
                   $emailer_data['message_subject']  = $message_subject;
                   $emailer_data['message_body'] 	 = $htmlContent;
   
                   $message = $this->load->view('component/email', $emailer_data, TRUE); // This will return you html data as message
                   //$this->send_email($emailer_data, $message);
                   /*** Send Email End ****/
               } else {
                if($backlink_validation < 3){
                    $this->set_backlink_validation(0, $backlink_row['backlink_id']);
                    $message .= "Link Found!!! set backlink validation 0"  . PHP_EOL;  
                }
            }
                $message .=  PHP_EOL ;
            }
        }
        if(array_key_exists("backlinks",$backlinks_remove_array) && count($backlinks_remove_array['backlinks'])>0){
            $this->backlink_i18_model->deleteArticleBacklink($backlinks_remove_array);
        }
        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);
    }

    public function is_my_link_there($hrefs, $my_url) {

        for ($i = 0; $i < $hrefs->length; $i++) {    
            $href = $hrefs->item($i);    
            $url = $href->getAttribute('href');    
            if ($my_url == $url) {    
                $rel = $href->getAttribute('rel');    
              /*  if ($rel == 'nofollow') {    
                    return 2;
                }   */
                return 3; // found
            } 
        }
        return 1; // not found
    }
    
    public function check_backlink_validation()
    {

    }

    public function set_backlink_validation($backlink_validation=0, $backlinkid)
    {
     // pre($backlinkid);
      $data_backlink_validation['backlink_validation']= $backlink_validation; 
      $this->backlink_i18_model->save($data_backlink_validation, $backlinkid);

    }

    public function domain_authority_rank()
    {
        $domain_names = $this->input->post('domain_names');
        if($domain_names){
            $domain_name_str = implode('%7C', $domain_names); 
            $userAgent = 'Googlebot/2.1 (http://www.googlebot.com/bot.html)';
            $target_url = 'https://api.openrank.io/?key=Ybzb4wuuMlXnDMFrMLJKnVhJ73HuAOj3AGon+r336j4&d=' . $domain_name_str;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($ch, CURLOPT_URL,$target_url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            echo $html_content= curl_exec($ch);
        }else{
            echo '{}';
        }
    }

}
