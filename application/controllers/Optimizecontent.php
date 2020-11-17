<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Optimizecontent extends Frontend_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('optimizecontent_model');
    }
    public function setTempNull()
    {
        $aid = $this->uri->segment(3);
        $res = $this->optimizecontent_model->setNull($aid);
        echo $res.'updated';
    }

    public function updateLess()
    {
        $res = $this->optimizecontent_model->setScoreNull();
        echo $res.'updated';
    }

    public function get_optimizecontent_keyword_list_score($article_id, $lang_id, $keyword, $content = Null )
    {
        $log_message = 'Optimize Content Log Start'  .PHP_EOL;
        $this->db->select("article_content_performance");
        $this->db->where('article_id', (int) $article_id);
        $this->db->where('language_id', $lang_id);
        $result_array = $this->db->get('articles_translate_i18')->result_array();
        $article_content_performance = $result_array[0]['article_content_performance'];
        $response = json_decode($article_content_performance, true);
        /*$url = $this->config->item('tfidfconfig_api_url');
        $no_of_search_count = (int) $this->config->item('tfidfconfig_search_count');
        pre($url);
        pre($no_of_search_count);*/
        if($content){
            
            $no_of_search_count = 20;
            $content = strip_tags($content);
                    /* API URL */
            $url = 'https://wplseotools.hubworks.com/keywordphrase';
            //$url = 'https://whookqa.hubworks.com/keywordphrase';
        
            /* Init cURL resource */
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            /* Array Parameter Data */
            $data_array = array(
                'keyword'=>$keyword,
                'page_content'=>$content,
                'page_id'=>$article_id,
                'lang'=>$lang_id,
                'no_of_search_count'=>$no_of_search_count
            );
            $log_message .= 'Api url = ' . $url . PHP_EOL;
            $log_message .= 'keyword = ' . $keyword . PHP_EOL;
            $log_message .= 'page_content = ' . $content . PHP_EOL;
            $log_message .= 'page_id = ' . $article_id . PHP_EOL;
            $log_message .= 'lang = ' . $lang_id . PHP_EOL;
            $log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
            
            //pre($data_array);

            $data =  json_encode($data_array);
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json'
                    ));
                
            /* execute request */
            $output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //echo $httpCode;
            $log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
            if($output === false)
            {
                //echo 'Curl error: ' . curl_error($ch);
                //echo 'Error';
                $log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
                //pre($output);
            }
            else
            {
                $log_message .= 'Curl Response = ' . $output . PHP_EOL;
                $result = json_decode($output, true);
                //echo 'Else';
                //pre($result);
                if($result['result']){
                     $data = array(
                        'article_content_performance_temp' =>$output,
                        'article_target_score' => !array_key_exists('error',$result['result']) ? $result['result']['content_performance']['target'] : 0,
                        'article_content_score' => !array_key_exists('error',$result['result']) ? $result['result']['content_performance']['performance_rank_score'] : 0
                        );
                    $this->db->update('articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));
                    $log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
                }
                $log_message .= 'Optimize Content Log End'  .PHP_EOL;
                $this->writeLog($log_message);
                return json_decode($output, true);
            }
            /* close cURL resource */
            curl_close($ch);

        }else if($response){
            $log_message .= 'Database Store Response = ' . $article_content_performance . PHP_EOL;
            $log_message .= 'Optimize Content Log End'  .PHP_EOL;
            $this->writeLog($log_message);
        
            return $response;

        }else{
            $no_of_search_count = 20;
            $content = strip_tags($content);
                    /* API URL */
            $url = 'https://wplseotools.hubworks.com/keywordphrase';
            //$url = 'https://whookqa.hubworks.com/keywordphrase';
        
            /* Init cURL resource */
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            /* Array Parameter Data */
            $data_array = array(
                'keyword'=>$keyword,
                'page_content'=>$content,
                'page_id'=>$article_id,
                'lang'=>$lang_id,
                'no_of_search_count'=>$no_of_search_count
            );
            $log_message .= 'Api url = ' . $url . PHP_EOL;
            $log_message .= 'keyword = ' . $keyword . PHP_EOL;
            $log_message .= 'page_content = ' . $content . PHP_EOL;
            $log_message .= 'page_id = ' . $article_id . PHP_EOL;
            $log_message .= 'lang = ' . $lang_id . PHP_EOL;
            $log_message .= 'no_of_search_count = ' . $no_of_search_count . PHP_EOL;
            
            //pre($data_array);

            $data =  json_encode($data_array);
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
            /* set return type json */
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type:application/json'
                    ));
                
            /* execute request */
            $output = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //echo $httpCode;
            $log_message .= 'Curl httpCode : = ' . $httpCode . PHP_EOL;
            if($output === false)
            {
                //echo 'Curl error: ' . curl_error($ch);
                $log_message .= 'Curl error: = ' . curl_error($ch) . PHP_EOL;
                
            }
            else
            {
                $log_message .= 'Curl Response = ' . $output . PHP_EOL;
            
                $result = json_decode($output, true);
                if($result['result']){
                    $data = array(
                        'article_content_performance_temp' =>$output,
                        'article_target_score' => !array_key_exists('error',$result['result']) ? $result['result']['content_performance']['target'] : 0,
                        'article_content_score' => !array_key_exists('error',$result['result']) ? $result['result']['content_performance']['performance_rank_score'] : 0
                    );
                    $this->db->update('articles_translate_i18', $data, array('article_id' => $article_id,'language_id' => $lang_id));

                    $log_message .= 'Update Query Run = ' . $this->db->last_query() . PHP_EOL;
                }
                $log_message .= 'Optimize Content Log End'  .PHP_EOL;
                $this->writeLog($log_message);
        
                /*$array_result = $result['result']['content_performance'];
                $total_already_use = (int) $array_result['total_already_use'];
                $total_more_often = (int) $array_result['total_more_often'];
                $total_questions = (int) $array_result['total_questions'];
                $total_should_use = (int) $array_result['total_should_use'];
                $total_stuffing = (int) $array_result['total_stuffing'];
                if($total_already_use || $total_more_often || $total_questions || $total_should_use || $total_stuffing ){
                    return json_decode($output, true);
                 }else{
                    return false; 
                 }*/
                 return json_decode($output, true);
            }
            /* close cURL resource */
            curl_close($ch);

        }
        //$log_message .= 'Optimize Content Log End'  .PHP_EOL;
        //$this->writeLog($log_message);
        
    }
    public function cronfunctionArticle()
    {
        $log_message = 'Optimize Content Log from CRON JOB Start:- '  .PHP_EOL;
        $fname = "crontemp.txt";
        $fpath = getcwd().'/data/'.$fname;
        if(!file_exists($fpath))
        {
            $a = $this->optimizecontent_model->getArticleContent();     
            $c = $a[0]->article_id - 1;
            $myfile = fopen($fpath, "w") or die("Unable to open file!");
            fwrite($myfile, $c);
        }
        else
        {
            $aid = file_get_contents($fpath);
            pre($aid);
            $a = $this->optimizecontent_model->getArticleContent($aid); 
            if(empty($a))
                $c = $aid - 1;   
            else 
                $c = $a[0]->article_id - 1;
            $myfile = fopen($fpath, "w") or die("Unable to open file!");
            fwrite($myfile, $c);
        }
        fclose($myfile);
        pre($a);
        if(!empty($a))
        {   
            $log_message .= "All Articles retrieved successfully.".PHP_EOL;
            $res = [];
            $keyword = $a[0]->article_title;
            if($a[0]->article_meta_keyword){
                $keyword = $a[0]->article_meta_keyword;
            }
            $content = "";
            $content .= strlen($a[0]->article_title) > 0 ? $a[0]->article_title : "";
            $content .= strlen($a[0]->article_description) > 0 ? strip_tags($a[0]->article_description) : "";
            $s = $this->optimizecontent_model->getArticleSectionContent($a[0]->article_id);
            $content .= strlen($s[0]->section_title) > 0 ? strip_tags($s[0]->section_title) : "";
            $content .= strlen($s[0]->section_text) > 0 ? strip_tags($s[0]->section_text) : "";
            $content .= strlen($s[0]->step_description) > 0 ? strip_tags($s[0]->step_description) : "";
            $content .= strlen($s[0]->ingredient_name) > 0 ? strip_tags($s[0]->ingredient_name) : "";
            $content = cleanHtml($content);
            pre($content);
            $log_message .= "Search Keyword : ".$keyword.PHP_EOL;
            $res = $this->get_optimizecontent_keyword_list_score($a[0]->article_id,$a[0]->language_id,$keyword,$content);
            $log_message .= "Request Completed Successfully. ".PHP_EOL;
            $data = $this->optimizecontent_model->getArticlesByArticleID($a[0]->article_id);
            pre($data);
        }
        $this->writeLog($log_message);
        exit;
    }

    public function index($article_id = Null, $lang_id = 'en', $keyword = Null)
    {
         //$article_id = $this->input->post('article_id');
         //$lang_id = $this->input->post('lang_id');
         //$keyword = $this->input->post('keyword');
        $return = $_POST;
        /* API URL */
        $url = 'http://www.mysite.com/api';
   
        /* Init cURL resource */
        $ch = curl_init($url);
   
        /* Array Parameter Data */
        $data = ['article_id'=>$article_id, 'lang'=>$lang_id, 'keyword'=>$keyword];
   
        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
             
        /* close cURL resource */
        curl_close($ch);

        echo json_encode($return);		
    }
    
    public function check_score($content = Null, $key = Null)
    {
        $return = "hello";
        echo json_encode($return);	
    }
    
    public function export_keyword_list($keyword)
    {
		
    }

}
