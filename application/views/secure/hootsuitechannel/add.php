<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative py-5">
	<div class="container">
	<div class="view-account">
			<div id="profile-main" class="view-account-side-bar hidden-xs">
				<div class="profile-pic">
					<div class="p-relative upload-image-preview p-2">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 297 297" style="enable-background:new 0 0 297 297;" xml:space="preserve" fill="rgba(0, 0, 0, .7)">

							<path d="M170.755,154.495l-13.94-13.941c2.221-4.142,4.02-8.484,5.378-12.984h19.715c3.314,0,6-2.687,6-6V92.251
								c0-3.314-2.687-6-6-6h-19.715c-1.358-4.5-3.157-8.842-5.379-12.983l13.941-13.942c2.344-2.343,2.344-6.142,0-8.485L150.024,30.11
								c-2.342-2.344-6.143-2.344-8.485,0l-13.941,13.941c-4.142-2.222-8.484-4.021-12.984-5.379V18.956c0-3.314-2.687-6-6-6H79.295
								c-3.314,0-6,2.687-6,6v19.715c-4.5,1.358-8.842,3.157-12.983,5.379l-13.94-13.941c-1.126-1.126-2.652-1.758-4.243-1.758
								c-1.591,0-3.117,0.632-4.242,1.757L17.153,50.839c-2.344,2.344-2.344,6.143-0.001,8.486l13.941,13.942
								c-2.222,4.142-4.021,8.484-5.379,12.983H6c-3.314,0-6,2.687-6,6v29.318c0,3.314,2.687,6,6,6h19.714
								c1.358,4.499,3.157,8.841,5.379,12.984l-13.94,13.941c-2.344,2.343-2.344,6.142,0,8.485l20.731,20.731
								c2.341,2.343,6.142,2.344,8.485,0.001l13.941-13.94c4.143,2.222,8.485,4.021,12.984,5.379v19.715c0,3.314,2.687,6,6,6h29.318
								c3.314,0,6-2.687,6-6V175.15c4.499-1.358,8.841-3.157,12.983-5.379l13.942,13.941c2.342,2.342,6.143,2.343,8.485-0.001
								l20.731-20.731C173.099,160.637,173.099,156.838,170.755,154.495z M93.954,129.339c-12.367,0-22.429-10.062-22.429-22.429
								c0-12.368,10.062-22.429,22.429-22.429c12.367,0,22.429,10.061,22.429,22.429C116.383,119.277,106.321,129.339,93.954,129.339z"
								/>
							<path d="M296.899,212.598l-3.774-20.458c-0.289-1.566-1.188-2.951-2.498-3.855c-1.311-0.902-2.923-1.247-4.491-0.958
								l-12.502,2.307c-1.239-2.266-2.643-4.432-4.204-6.488l7.209-10.471c0.902-1.311,1.247-2.926,0.958-4.491
								s-1.188-2.951-2.498-3.854l-17.136-11.798c-2.728-1.876-6.465-1.19-8.345,1.54l-7.208,10.47c-2.479-0.725-5.002-1.264-7.56-1.612
								l-2.307-12.502c-0.601-3.259-3.736-5.417-6.989-4.812l-20.458,3.774c-1.566,0.289-2.951,1.188-3.855,2.498
								c-0.902,1.311-1.247,2.926-0.958,4.491l2.307,12.502c-2.266,1.239-4.432,2.643-6.488,4.204l-10.471-7.209
								c-1.311-0.901-2.924-1.247-4.492-0.958c-1.565,0.289-2.951,1.188-3.854,2.498l-11.798,17.136
								c-0.902,1.311-1.247,2.926-0.958,4.492c0.289,1.565,1.188,2.951,2.498,3.854l10.47,7.208c-0.725,2.478-1.264,5.002-1.612,7.56
								l-12.503,2.307c-1.565,0.289-2.951,1.188-3.854,2.498c-0.902,1.311-1.247,2.926-0.958,4.491l3.775,20.458
								c0.602,3.259,3.735,5.419,6.99,4.812l12.502-2.307c1.238,2.265,2.644,4.432,4.204,6.488l-7.208,10.47
								c-0.903,1.311-1.248,2.926-0.959,4.491s1.188,2.951,2.498,3.854l17.136,11.798c2.727,1.876,6.465,1.19,8.345-1.54l7.208-10.47
								c2.478,0.726,5.002,1.264,7.56,1.613l2.307,12.502c0.533,2.891,3.056,4.912,5.894,4.912c0.361,0,0.728-0.032,1.095-0.101
								l20.458-3.774c1.566-0.289,2.951-1.188,3.855-2.498c0.902-1.311,1.247-2.926,0.958-4.491l-2.307-12.502
								c2.266-1.239,4.432-2.643,6.487-4.204l10.471,7.209c1.31,0.901,2.921,1.244,4.491,0.958c1.565-0.289,2.951-1.188,3.854-2.498
								l11.798-17.136c1.879-2.73,1.19-6.465-1.54-8.345l-10.47-7.208c0.726-2.478,1.264-5.002,1.613-7.56l12.502-2.307
								C295.346,218.985,297.501,215.856,296.899,212.598z M239.41,222.818c-4.432,6.436-13.272,8.069-19.712,3.637
								c-6.437-4.433-8.068-13.275-3.636-19.712c2.147-3.118,5.379-5.213,9.102-5.901c0.867-0.16,1.737-0.239,2.601-0.239
								c2.843,0,5.617,0.857,8.008,2.504C242.209,207.537,243.84,216.38,239.41,222.818z"/>
						</svg>
					</div>
				</div>
			</div>
			<div id="profile-tab" class="content-panel py-2 px-3">
				<div class="clearfix">
					<h3 class="h4">
						<i class="fas fa-envelope icon-left"></i>
						Promotional Message Channel Configuration
					</h3>
					<hr class=" mb-2">
				</div>
				<?php echo form_open_multipart('', array('class' => 'form-horizontal form-validate', 'id' => 'channelconfig-form'));?>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="site_id">
							Site
						</label>
						<div class="col-sm-6">
						<?php
							$site = array();
							$site['']="---select site---";
							foreach ($github_repo as $repo){
								//$site[strtolower($repo['site_id'])] = ucwords($repo['site_id']);
								$site[strtolower($repo['site_id'])] = ucfirst(str_replace('.com', '',ucwords($repo['site_id'])));
								//$site[ucfirst(str_replace('.com', '',strtolower($repo['site_id'])))] = ucfirst(str_replace('.com', '',ucwords($repo['site_id'])));
							}	
							echo form_dropdown('site_id', $site, $channel_config_row["site_id"], 'class="custom-select"' );
							echo form_error('site_id');
						?>
							<small class="form-text text-muted">
							Select the site for promotional message channel 
							</small>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="article_promo_channel">
							Channel
						</label>
						<div class="col-sm-6">
							<?php
							$channel = array(
								''  	=> '---select channel---',
								'twitter'  	=> 'Twitter',
								'linkedin' 	=> 'LinkedIn',
								'facebook'  => 'Facebook',
								'instagram' => 'Instagram'
							);
							echo form_dropdown('article_promo_channel', $channel, $channel_config_row["article_promo_channel"], 'class="custom-select"' );
							echo form_error('article_promo_channel');
							?>
							<small class="form-text text-muted">
							Select the article promotion channel
							</small>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="article_promo_channel_social_id">
							Channel Social Id
						</label>
						<div class="col-sm-6">
							<?php
							$data_social_id= array(
								'id' => 'article_promo_channel_social_id',
								'name' => 'article_promo_channel_social_id',
								'value' => set_value('article_promo_channel_social_id', $channel_config_row['article_promo_channel_social_id']),
								'placeholder' => 'Channel Social Id',
								'class' => 'form-control'
							);
							echo form_input($data_social_id);
							?>
							<small class="form-text text-muted">
							Channel social id is used to post on hootsuit platform
							</small>
							<?php echo form_error('article_promo_channel_social_id');?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="article_language_id">
							Language
						</label>
						<div class="col-sm-6">
							<?php
							$language = array();
							foreach ($languages as $key=>$value){
								$language[$key]=ucwords($value);
							}
							if($channel_config_row["article_language_id"]){
								//$selected_lang=explode(",",$channel_config_row["article_language_id"]);
								$selected_lang = $channel_config_row["article_language_id"];
							}else{
								$selected_lang='en';
							}
							$js = 'id="channel-language" class="custom-select"';
							echo form_dropdown('article_language_id', $language, $selected_lang, $js );
							echo form_error('article_language_id');
							?>
							<small class="form-text text-muted">
							Select the languages for promotional message channel
							
							</small>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label">
							Status
						</label>
						<div class="col-sm-6">
							<?php
							switch ($channel_config_row["article_promo_channel_status"]) {
								case "1":
									$article_promo_channel_status = 'y';
								break;
								case "0":
									$article_promo_channel_status='n';
								break;
								
								default:
								$article_promo_channel_status='';
							}
							$channel_status = array(
								''  	=> '---select status---',
								'y'  	=> 'Active',
								'n' 	=> 'Inactive'
							);
							echo form_dropdown('article_promo_channel_status', $channel_status, $article_promo_channel_status, 'class="custom-select"' );
							echo form_error('article_promo_channel_status');
							?>
						</div>
					</div>
					<div class="form-group row mt-3">
						<div class="col-md-8 col-sm-9 col-xs-12 offset-md-4 offset-sm-3">
							<button type="submit" name="submitForm" value="" class="btn btn-primary " data-disable-with="Loading..." autocomplete="off">
								<i class="fas fa-save"></i>
								Save Channel Config
							</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>