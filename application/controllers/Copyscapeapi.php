<?php
defined('BASEPATH') or exit('No direct script access allowed');

define('COPYSCAPE_USERNAME', 'mgala');
define('COPYSCAPE_API_KEY', 'gthqd5s4wb1023pe');

define('COPYSCAPE_API_URL', 'https://www.copyscape.com/api/');

class CopyscapeApi extends Frontend_Controller
{
    public function index()
    {
		$search  = array('#777777', '#000000');
		$replace = array('#999999', '#24292E');
		$this->load->helper('security');
		$search_text = strip_tags(xss_clean($_POST['html']));
		$results = $this->copyscape_api_text_search_internet($search_text, 'ISO-8859-1');
		$now = new DateTime();
		//$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		$body = '';
		if (!array_key_exists('error', $results)){
			$body .= '<div class="alert alert-primary">';
			$body .= '<strong>' . $results['count'] .' results </strong>';
			$body .= 'found for  ' . $results['querywords'] .' words on ' . $now->format('d M Y H:i');
			if(($results['count']) > 0){
				$body .= ' Click a result below to see your content highlighted.';
			}
			$body .= '</div>';
			if(($results['count']) > 0){
				foreach($results['result'] as $result){
					$body .= '<p>';
					$body .= '<a href="' . $result['viewurl'] . '" target="_blank"><u>' . $result['title'] . '</u></a><br>';
					$body .= str_replace($search, $replace, $result['htmlsnippet']) . '<br>';
					$body .= '<font color="#006600">' . $result['url'] . '</font>';
					$body .= '</p>';
				}
			}
		}else{
			$body .= '<div class="alert alert-danger">';
			$body .= '<strong>Error Found! </strong>' . $results['error'];
			$body .= '</div>';
		}

		die($body);



			//pre_exit($this->copyscape_api_text_search_internet($exampletext, 'ISO-8859-1', 2));

		/*	$this->my_echo_title('Response for a simple URL Internet search');
			$this->my_print_r($this->copyscape_api_url_search_internet('http://www.copyscape.com/example.html'));

			$this->my_echo_title('Response for a URL Internet search with full comparisons for the first two results');
			$this->my_print_r($this->copyscape_api_url_search_internet('http://www.copyscape.com/example.html', 2));

			$this->my_echo_title('Response for a simple text Internet search');
			$this->my_print_r($this->copyscape_api_text_search_internet($exampletext, 'ISO-8859-1'));

			$this->my_echo_title('Response for a text Internet search with full comparisons for the first two results');
			$this->my_print_r($this->copyscape_api_text_search_internet($exampletext, 'ISO-8859-1', 2));

			$this->my_echo_title('Response for a check balance request');
			$this->my_print_r($this->copyscape_api_check_balance());

			$this->my_echo_title('Response for a URL add to private index request');
			$this->my_print_r($this->copyscape_api_url_add_to_private('http://www.copyscape.com/example.html'));

			$this->my_echo_title('Response for a text add to private index request');
			$response = $this->copyscape_api_text_add_to_private($exampletext, 'ISO-8859-1', 'Extract from Declaration of Independence', 'EXAMPLE_1234');
			$this->my_print_r($response);
			$handle = $response['handle'];

			$this->my_echo_title('Response for a URL private index search');
			$this->my_print_r($this->copyscape_api_url_search_private('http://www.copyscape.com/example.html'));

			$this->my_echo_title('Response for a delete from private index request');
			$this->my_print_r($this->copyscape_api_delete_from_private($handle));

			$this->my_echo_title('Response for a text search of both Internet and private index with full comparisons for the first result (of each type)');
			$this->my_print_r($this->copyscape_api_text_search_internet_and_private($exampletext, 'ISO-8859-1', 1));*/
	}

	private function copyscape_api_url_search_internet($url, $full=null)
	{
		return $this->copyscape_api_url_search($url, $full, 'csearch');
	}

	private function copyscape_api_text_search_internet($text, $encoding, $full=null)
	{
		return $this->copyscape_api_text_search($text, $encoding, $full, 'csearch');
	}

	private function copyscape_api_check_balance()
	{
		return $this->copyscape_api_call('balance');
	}

	private function copyscape_api_url_search_private($url, $full=null)
	{
		return $this->copyscape_api_url_search($url, $full, 'psearch');
	}

	private function copyscape_api_url_search_internet_and_private($url, $full=null)
	{
		return $this->copyscape_api_url_search($url, $full, 'cpsearch');
	}

	private function copyscape_api_text_search_private($text, $encoding, $full=null)
	{
		return $this->copyscape_api_text_search($text, $encoding, $full, 'psearch');
	}

	private function copyscape_api_text_search_internet_and_private($text, $encoding, $full=null)
	{
		return $this->copyscape_api_text_search($text, $encoding, $full, 'cpsearch');
	}

	private function copyscape_api_url_add_to_private($url, $id=null)
	{
		$params['q']=$url;

		if (isset($id))
			$params['i']=$id;

		return $this->copyscape_api_call('pindexadd', $params);
	}

	private function copyscape_api_text_add_to_private($text, $encoding, $title=null, $id=null)
	{
		$params['e']=$encoding;

		if (isset($title))
			$params['a']=$title;

		if (isset($id))
			$params['i']=$id;

		return $this->copyscape_api_call('pindexadd', $params, null, $text);
	}

	private function copyscape_api_delete_from_private($handle)
	{
		$params['h']=$handle;

		return $this->copyscape_api_call('pindexdel', $params);
	}

	private function my_echo_title($title)
	{
		echo '<P><BIG><B>'.htmlspecialchars($title).':</B></BIG></P>';
		flush();
	}

	private function my_print_r($variable)
	{
		echo '<PRE>'.htmlspecialchars(print_r($variable, true)).'</PRE><HR>';
		flush();
	}

	private function copyscape_api_url_search($url, $full=null, $operation='csearch')
	{
		$params['q']=$url;

		if (isset($full))
			$params['c']=$full;

		return $this->copyscape_api_call($operation, $params, array(2 => array('result' => 'array')));
	}

	private function copyscape_api_text_search($text, $encoding, $full=null, $operation='csearch')
	{
		$params['e']=$encoding;

		if (isset($full))
			$params['c']=$full;

		return $this->copyscape_api_call($operation, $params, array(2 => array ('result' => 'array')), $text);
	}

	private function copyscape_api_call($operation, $params=array(), $xmlspec=null, $postdata=null)
	{
		$url=COPYSCAPE_API_URL.'?u='.urlencode(COPYSCAPE_USERNAME).
			'&k='.urlencode(COPYSCAPE_API_KEY).'&o='.urlencode($operation);

		foreach ($params as $name => $value)
			$url.='&'.urlencode($name).'='.urlencode($value);

		$curl=curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, isset($postdata));

		if (isset($postdata))
			curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);

		$response=curl_exec($curl);
		curl_close($curl);

		if (strlen($response))
			return $this->copyscape_read_xml($response, $xmlspec);
		else
			return false;
	}

	private function copyscape_read_xml($xml, $spec=null)
	{
		global $copyscape_xml_data, $copyscape_xml_depth, $copyscape_xml_ref, $copyscape_xml_spec;

		$copyscape_xml_data=array();
		$copyscape_xml_depth=0;
		$copyscape_xml_ref=array();
		$copyscape_xml_spec=$spec;

		$parser = xml_parser_create();

		xml_set_element_handler($parser, array($this,'copyscape_xml_start'), array($this,'copyscape_xml_end'));
		xml_set_character_data_handler($parser, array($this,'copyscape_xml_data'));

		if (!xml_parse($parser, $xml, true))
			return false;

		xml_parser_free($parser);

		return $copyscape_xml_data;
	}

	private function copyscape_xml_start($parser, $name, $attribs)
	{
		global $copyscape_xml_data, $copyscape_xml_depth, $copyscape_xml_ref, $copyscape_xml_spec;

		$copyscape_xml_depth++;

		$name=strtolower($name);

		if ($copyscape_xml_depth==1)
			$copyscape_xml_ref[$copyscape_xml_depth]=&$copyscape_xml_data;

		else {
			if (!is_array($copyscape_xml_ref[$copyscape_xml_depth-1]))
				$copyscape_xml_ref[$copyscape_xml_depth-1]=array();

			if (@$copyscape_xml_spec[$copyscape_xml_depth][$name]=='array') {
				if (!is_array(@$copyscape_xml_ref[$copyscape_xml_depth-1][$name])) {
					$copyscape_xml_ref[$copyscape_xml_depth-1][$name]=array();
					$key=0;
				} else
					$key=1+max(array_keys($copyscape_xml_ref[$copyscape_xml_depth-1][$name]));

				$copyscape_xml_ref[$copyscape_xml_depth-1][$name][$key]='';
				$copyscape_xml_ref[$copyscape_xml_depth]=&$copyscape_xml_ref[$copyscape_xml_depth-1][$name][$key];

			} else {
				$copyscape_xml_ref[$copyscape_xml_depth-1][$name]='';
				$copyscape_xml_ref[$copyscape_xml_depth]=&$copyscape_xml_ref[$copyscape_xml_depth-1][$name];
			}
		}
	}

	private function copyscape_xml_end($parser, $name)
	{
		global $copyscape_xml_depth, $copyscape_xml_ref;

		unset($copyscape_xml_ref[$copyscape_xml_depth]);

		$copyscape_xml_depth--;
	}

	private function copyscape_xml_data($parser, $data)
	{
		global $copyscape_xml_depth, $copyscape_xml_ref;

		if (is_string($copyscape_xml_ref[$copyscape_xml_depth]))
			$copyscape_xml_ref[$copyscape_xml_depth].=$data;
	}

	public function copyscape_verify()
	{
		$id = $_POST['article_id'];
		$lang = $_POST['lang_id'];
		
		$data_copyscape = array(
			'article_copyscape' => true
		);
		$this->db->update('articles_translate_i18', $data_copyscape, array('article_id' => $id, 'language_id' => $lang));
		
	}
}