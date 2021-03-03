<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- ========== FOOTER ========== -->
<footer class="footer-container">
	<div class="container pt-5 pb-3">
		<div class="row justify-content-md-between">
			<?php foreach ($menu['FooterMain'] as $footer_main) {?>
			<div class="col-6 col-md-3 col-lg-3 order-lg-3 mb-2 mb-lg-0 md-flex">
				<h6 class="heading text-uppercase text-white mb-1">
					<?php echo $footer_main['title']; ?>
				</h6>
				<div class="list-group list-group-flush list-group-transparent">
					<?php foreach ($footer_main['subcategories'] as $subcategories) {?>
					<a href="<?php echo $subcategories['link']; ?>" class="list-group-item list-group-item-action" <?php if($subcategories['external']) echo 'target="_blank"'; ?>>
						<?php echo $subcategories['text']; ?>
					</a>
					<?php
						};
					?>
				</div>
			</div>
			<?php
				};
			?>
		</div>
	</div>
</footer>
<footer id="footer-nav" class="footer-bar">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 md-flex align-self-center">
				<div class="copyright">
					<?php echo str_replace('%year%', date('Y'), $menu['CopyrightText']['text']);?>
				</div>
			</div>
			<div class="col-md-4 md-flex align-self-center">
				<div class="footer-social-icons text-right">
					<?php foreach ($menu['SocialMedia'] as $social_media): ?>
					<a class="<?php echo $social_media['class']; ?>" href="<?php echo $social_media['link']; ?>" title="<?php echo $social_media['text']; ?>"
					<?php if($social_media['external']) echo 'target="_blank"'; ?>>
						<?php echo $social_media['icon']; ?>
					</a>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php

	include_once 'pixabay_modal.php';
//	include_once 'upload_image_modal.php';
	include_once 'modal-success.php';
	if ($is_user_logged_in && $user_type && $user_type!=4 ) {
		if(isset($article['article_id'])){
			include_once 'article_publish_modal.php';
			
		}
	}
	if ($is_user_logged_in) {
		include_once 'thank_you_writer_modal.php';
		include_once 'admin_sidebar.php';
		
	} else {
		include_once 'login_modal.php';
		include_once 'signup_modal.php';
		include_once 'forgot_modal.php';
	}
	include_once 'article_build_backlinks_modal.php';
	include_once 'publishers_backlink_outreach_modal.php';
	include_once 'article_assign_modal.php';
	include_once 'language_modal.php';
	include_once 'copyscape_result_modal.php';
	include_once 'article_master_modal.php';
	include_once 'article_contributor_writer_modal.php';
	include_once 'article_keyword_modal.php';
	include_once 'article_brief_modal.php';
	include_once 'brief_article_modal.php';
	include_once 'seophrase_modal.php';
	include_once 'upload_publishers_modal.php';
	include_once 'publishers_report_modal_list.php';
	include_once 'campaigns_report_modal.php';
	include_once 'articlebrief_report_modal.php';
	include_once 'livelinks_report_modal.php';
	include_once 'cta_preview_modal.php';
	?>
<a href="#site-header-wrapper" class="scroll-top-wrapper text-white show go-to">
	<span class="scroll-top-inner">
		<i class="fas fa-arrow-circle-up fa-2x"></i>
	</span>
</a>

<!-- ========== END FOOTER ========== -->
<script src="<?php echo site_url('assets/js/plugins.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/mark-js/dist/jquery.mark.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/trumbowyg/trumbowyg.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/trumbowyg/plugins/colors/trumbowyg.colors.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/trumbowyg/plugins/skyscraper/trumbowyg.skyscraper.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/trumbowyg/plugins/table/trumbowyg.table.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/app.js?t='.time()); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/article_master.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/article_contributor.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/article_keyword.js'); ?>" type="text/javascript"></script>
<script src="<?php //echo site_url('assets/js/primary_keyword_phrase.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/atd-jquery/scripts/jquery.atd.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/atd-jquery/scripts/csshttprequest.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/fontawesome-iconpicker/dist/js/fontawesome-iconpicker.js'); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/vendor/youtube-background/jquery.youtube-background.js'); ?>" type="text/javascript"></script>


<?php if ($is_user_logged_in){?>
<script src="<?php echo site_url('assets/js/s_app.js?t='.time()); ?>" type="text/javascript"></script>
<script src="<?php echo site_url('assets/js/readability.js?t='.time()); ?>" type="text/javascript"></script>
<?php }
	if ($this->session->flashdata('formSubmitted')) {?>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('#thankyouModal').modal('show');
		});
	</script>
	<?php
	}
	$alertClasses = [
		'success' => 'alert-success',
		'notice'  => 'alert-success',
		'warning' => 'alert-warning',
		'error'   => 'alert-danger',
		'info' 	  => 'alert-info',
		'default' => 'alert-inverse'
	];
	$flashes = $this->session->flashdata();
	$flash_str = '';

	foreach ($flashes as $type => $messages):
		if (array_key_exists($type, $alertClasses)){
			$message = (is_array($messages)) ? $messages[0] : $messages;
			if($message){
				$flash_str .= '<div class="alert '. $alertClasses[$type] .' alert-dismissible alert-new">';
				$flash_str .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg></span></button>';
				$flash_str .= '<span>'. $message .'</span>';
				$flash_str .= '</div>';
			}
		}
		endforeach;
	?>

<div id="flashes" class="alert-growl-container"><?php echo $flash_str;?></div>
<?php
	if(isset($script_to_load) && is_array($script_to_load)){
		if($article['language_id'] == '' ){
		foreach ($script_to_load as $script) {
			echo '<script src="'. $script .'" type="text/javascript"></script>';	
		}
	  }
	} 
?>
</body>
</html>
