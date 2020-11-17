<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
if ($is_user_logged_in) {
	$this->load->view('component/admin_page_header');
}else{
	$this->load->view('component/page_header');
}
?>

<div class="wrapper-content-page">
	<?php $this->load->view($subview); ?>
	<?php if(isset($nestedview)) $this->load->view($nestedview); ?>
</div>
<?php $this->load->view('component/page_footer'); ?>
