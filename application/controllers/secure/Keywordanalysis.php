<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Keywordanalysis extends Admin_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model('keyword_model');
		$this->load->model('articlebrief_model');
		$this->load->model('articlebriefbacklink_model');
		$this->load->model('linkbuilding_article_model');
        $this->load->model('linkbuilding_article_i18_model');
        $this->load->model('linkbuilding_paragraph_model');
        $this->load->model('linkbuilding_paragraph_i18_model');
        $this->load->model('linkbuilding_callouts_i18_model');
		
		$this->data['websites'] = $this->articlebrief_model->get_github_repo();
       
    }

    public function index($keyword_id)
    {
		//pre_exit($this->session->userdata());
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$keyword_array = $this->get_keyword($keyword_id);
		$keyword = $keyword_array['keyword'];
		$this->data['keyword_id'] = $keyword_id;
		$this->data['keyword_analysis'] = $this->get_keyword_analysis_details($keyword_id,'en', $keyword);
	    $this->data['subview'] = 'secure/keywordanalysis/details';
        $this->load->view('_main_layout', $this->data);
        
	}
	public function details($keyword_id)
    {
		//pre_exit($this->session->userdata());
		if (!$this->user_model->loggedin()) {redirect('/', 'refresh');}
		$this->index($keyword_id);
        
	}

    public function add()
    {
		$dataArray = ['success' => 0];
		$flashes = [
			'type'  	  => 'error',
			'message'     => 'Request is not authorized.',
			'redirect'    => false
		];
		$savedata  = $this->input->post();
		$keyword_id  = $this->input->post('keyword_id');
		$savedata['status'] = 2 ; //status: 2 => 'Keyword analysis completed.  Waiting for Content Coordinator to submit article brief.'
		
		$last_insert_id = $this->keyword_model->save($savedata, $keyword_id);

		if ($last_insert_id) {
			if($keyword_id){
				$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'notice',
						'message'     => "Keyword analysis has been created!",
						'redirect'    => site_url('secure/keyword')
					];
				//$this->session->set_flashdata('success', 'Keyword analysis has been created!');
			}else{
				$dataArray = ['success' => 1];
					$flashes = [
						'type'  	  => 'notice',
						'message'     => "Keyword analysis has been created!",
						'redirect'    => site_url('secure/keyword')
					];
				//$this->session->set_flashdata('success', 'Keyword analysis has been created!');
			}
			//redirect('secure/keyword', 'refresh');
		}

		$dataArray['flashes'] = $flashes;
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataArray));
	}
	
    public function get_keyword($keyword_id)
    {
		
    	$keyword = (array) $this->keyword_model->get($keyword_id, true);
        return $keyword; 
    }

}
