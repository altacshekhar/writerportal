<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative py-1">
	<div class="container">
	<div class="view-account">
			<div id="profile-tab" class=" py-2 px-3">
				<div class="clearfix">
					<h3 class="h4">
						<i class="fas fa-tags icon-left"></i>
						Campaign
					</h3>
					<hr class=" mb-2">
				</div>
				<?php echo form_open_multipart('', array('class' => 'form-horizontal form-validate', 'id' => 'campaign-form'));?>
				<?php if($user_type == 3 || $user_type == 1 || $user_type == 6){ ?>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_name">
							Name<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
							<?php
								$data_campaign_name = array(
									'name' => 'campaign_name',
									'value' => set_value('campaign_name', $campaign['campaign_name']),
									'placeholder' => 'Name',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_name);
								echo form_error('campaign_name');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_status">
							Status<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
								<?php
									$campaign_status = array(
										'' => '--Select Status--',
										'Waiting for outreach coordinator to assign' => 'Waiting for outreach coordinator to assign',
										'publishers' => 'publishers',
										'Deleted' => 'Deleted',
										'In Progress' => 'In Progress',
										'Complete' => 'Complete'
									);
									
									if( $campaign['campaign_status']){
										$selected_campaign_status =  $campaign['campaign_status'];
										//pre($selected_cat);
									}else{
										$selected_campaign_status ='';
									}
									echo form_dropdown("campaign_status", $campaign_status, $selected_campaign_status, 'class="form-control-sm select-2"' );
									echo form_error("campaign_status");

								?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_startdate">
						Start Date<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
							<?php
							$temp_number_start = (int) $campaign['campaign_startdate'];
							$campaign_startdate = nice_date( $campaign['campaign_startdate'], 'Y-m-d');
							if($campaign_startdate=='Unknown' || $campaign_startdate =='Invalid Date' || $temp_number_start < 1){
								$campaign_startdate = date('Y-m-d');
							}
								$data_campaign_startdate = array(
									'name' => 'campaign_startdate',
									'value' => set_value('campaign_startdate', $campaign_startdate),
									'placeholder' => 'Start Date',
									'class' => 'form-control',
									'id' => 'campaign_startdate',
									'data-date-format'=>"yyyy-mm-dd",
								);
								echo form_input($data_campaign_startdate);
								echo form_error('campaign_startdate');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_enddate">
						End Date<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
							<?php
							$temp_number_end = (int) $campaign['campaign_enddate'];
							$campaign_enddate = nice_date( $campaign['campaign_enddate'], 'Y-m-d');
							if($campaign_enddate=='Unknown' || $campaign_enddate =='Invalid Date' || $temp_number_end < 1){
								$campaign_enddate = date('Y-m-d');
							}
								$data_campaign_enddate = array(
									'name' => 'campaign_enddate',
									'value' => set_value('campaign_enddate', $campaign_enddate),
									'placeholder' => 'End Date',
									'class' => 'form-control',
									'id' => 'campaign_enddate',
									'data-date-format'=>"yyyy-mm-dd",
									
									
								);
								echo form_input($data_campaign_enddate);
								echo form_error('campaign_enddate');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_budget">
						Budget<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
							<?php
								$data_campaign_budget = array(
									'name' => 'campaign_budget',
									'value' => set_value('campaign_budget', $campaign['campaign_budget']),
									'placeholder' => 'Budget',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_budget);
								echo form_error('campaign_budget');
							?> 
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_quantity">
						Backlink Article Qty 
						</label>
						<div class="col-sm-3">
							<?php
								$data_campaign_quantity = array(
									'id' => 'campaign_quantity',
									'name' => 'campaign_quantity',
									'value' => set_value('campaign_quantity', $campaign['campaign_quantity']),
									'placeholder' => 'Backlink Qty',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_quantity);
								echo form_error('campaign_quantity');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_notes">
							Note
						</label>
						<div class="col-sm-10">
						<?php
							$data_campaign_notes = array(
									'id' => 'campaign_notes',
									'name' => 'campaign_notes',
									'value' => set_value('campaign_notes', $campaign['campaign_notes'], $html_escape=FALSE),
									'placeholder' => 'Note',
									'rows' => 3,
									'cols' => 50,
									'class' => 'form-control'
								);
								echo form_textarea($data_campaign_notes);
							
							?> 
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_websites">
						Website<span class="text-danger">*</span>
						</label>
						<div class="col-md-3 col-sm-6">
						<?php
								$campaign_websites = array();
								foreach ($websites as $website) {
									if(array_key_exists('site_id', $website)){
										$campaign_websites[strtolower($website['site_id'])] = ucwords($website['site_id']);
									}
								}
									
									if( $campaign['campaign_websites']){
										$selected_campaign_websites = explode(",",$campaign['campaign_websites']);
										//pre($selected_cat);
									}else{
										$selected_campaign_websites = '';	
									}
									$js = 'id="campaign_websites" multiple="multiple" class="select-2 form-control-sm" required="required" data-msg-required="Please select websites"';
									echo form_dropdown("campaign_websites[]", $campaign_websites, $selected_campaign_websites, $js);
									echo form_error("campaign_websites[]");

								?>
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_niche">
							Niche<span class="text-danger">*</span>
						</label>
						<div class="col-md-3 col-sm-6">
								<?php
									$campaign_niche = array(
										'grocery' => 'Grocery',
										'manufacturing' => 'Manufacturing',
										'restaurant tech' => 'Restaurant Tech',
										'small business' => 'Small Business'
									);
									
									if( $campaign['campaign_niche']){
										$selected_campaign_niche = explode(",",$campaign['campaign_niche']);
										//pre($selected_cat);
									}else{
										$selected_campaign_niche = '';	
									}
									$js = 'id="campaign_niche" multiple="multiple" class="select-2 form-control-sm" required="required" data-msg-required="Please select niche"';
									echo form_dropdown("campaign_niche[]", $campaign_niche, $selected_campaign_niche, $js);
									echo form_error("campaign_niche[]");

								?>
							
						</div>

						<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_type">
							Type<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
								<?php
									$campaign_type = array(
										'' => '--Select Type--',
										'guest post' => 'Guest Post',
										'reciprocal' => 'Reciprocal',
										'press release' => 'Press Release'
									);
									
									if( $campaign['campaign_type']){
										$selected_campaign_type =  $campaign['campaign_type'];
										//pre($selected_cat);
									}else{
										$selected_campaign_type = '';
									}
									$js = 'id="campaign_type"  class="select-2 form-control-sm" required="required" data-msg-required="Please select type"';
									echo form_dropdown("campaign_type", $campaign_type, $selected_campaign_type, $js);
									echo form_error("campaign_type");

								?>
						</div>
	
						
					</div>
					<div class="form-group row">
					
					</div>
					<div class="form-group row">
					<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_content_coordinator">
					Content Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-md-3 col-sm-6">
							<?php
							//pre($campaign['campaign_content_coordinator']);
								$select_content_coordinator = '';
								 if($user_id && $user_type == 3){
									$select_content_coordinator = $user_id;
								 }else if($campaign['campaign_content_coordinator']){
									$select_content_coordinator = $campaign['campaign_content_coordinator'];
								 }
								$js = 'id="campaign_content_coordinator"  class="select-2 form-control-sm" required="required"';
								echo form_dropdown("campaign_content_coordinator", $content_coordinators, $select_content_coordinator, $js);
								echo form_error("campaign_content_coordinator");
							?> 
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_outreach_coordinator">
						Outreach Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-md-3 col-sm-6">
							<?php
								$js = 'id="campaign_outreach_coordinator"  class="select-2 form-control-sm" required="required"';
								echo form_dropdown("campaign_outreach_coordinator", $outreach_coordinators, $campaign['campaign_outreach_coordinator'], $js);
								echo form_error("campaign_outreach_coordinator");
							?>
						</div>
						<!--<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_writer">
							Writer<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
								//$js = 'id="campaign_writer"  class="select-2 form-control-sm" required="required"';
								//echo form_dropdown("campaign_writer", $writers, $campaign['campaign_writer'], $js);
								//echo form_error("campaign_writer");
							?>
						</div>-->
						
					</div>

					<div class="row mb-1 mt-5">
						<h4 class="pr-2">Backlinks</h4>
						<a class="btn btn-success btn-sm articles-build-backlinks" href="javascript:void(0);" role="button">Add</a>
					</div>
					<div class="build-backlinks">
					<?php 
					//pre($backlinks);
					$backlink_count = 0;
					foreach($backlinks as $backlink){ ?>
						<div class="form-row backlink-row d-flex">
								<div class="col-md-4 mb-1">
								<label for="">URL</label>
								<?php
									$data_article_wp_url = array(
										'name' => "backlinks[$backlink_count][article_wp_url]",
										'value' => set_value("backlinks[$backlink_count][article_wp_url]", $backlink['article_wp_url'], $html_escape=FALSE),
										'placeholder' => '',
										'class' => 'form-control'
									);
									echo form_input($data_article_wp_url);
									echo form_error('article_wp_url');

									$data_article_id_hide = array(
										'type' => 'hidden',
										'name' => "backlinks[$backlink_count][article_wp_id]",
										'value' => $backlink['article_wp_id'],
										'class' => 'article_wp_id',
										'required' => 'required',
									);
									echo form_input($data_article_id_hide); 
									$data_link_wp_articles_id_hide = array(
										'type' => 'hidden',
										'name' => "backlinks[$backlink_count][link_wp_articles_id]",
										'value' => $backlink['link_wp_articles_id'],
										'class' => 'link_wp_articles_id'
									);
									echo form_input($data_link_wp_articles_id_hide); 
									?>
					     </div>
						 <?php
						 $article_anchortext_array = $backlink['article_anchortext'];
						 //pre($article_anchortext_array);
						 foreach($article_anchortext_array as $key => $value){
							 //pre(gettype($value));
							$i=$key+1;
						 //for($i=1; $i<= count($article_anchortext_array); $i++  ){ ?>
						 
							 <div class="col mb-1">
								 <label for="">Anchor text <?php echo $i ?></label>
								 <?php
								// pre($value) ;
								//pre($value[$i-1]) ;
								 $data_article_anchortext = array(
									 'name' => "backlinks[$backlink_count][article_anchortext][$key]",
									 'value' => set_value("backlinks[$backlink_count][article_anchortext][$key]", $value),
									 'placeholder' => '',
									 'class' => 'form-control',
									 'required' => 'required',
								 );
								 echo form_input($data_article_anchortext);
								 echo form_error('article_anchortext');
								 ?>
								 
								 
								 
							 </div>
						 <?php }
					 ?>
							<div class="col pt-2 mt-1">
								<label for=""></label>
								<a class="deleteBacklink"
									href="javascript:void(0);"
									data-backlink-id="<?php echo $backlink['link_wp_articles_id']?>">
									<i class="fas fa-times text-danger fa-lg"></i>
								</a>
								
							</div>
					</div>
					<?php 
					 $backlink_count++;
					}
					?>
					</div>
					<?php } ?>
					<?php if(array_key_exists("campaign_id",$campaign) && ($user_type == 1 || $user_type == 6)){ ?>
					<div class="row mb-1 mt-5">
						<div class="col-md-6">
						<div class="row">
							<div class="col-md-9">
								<h4 class="pr-2">Select publishers for backlink outreach</h4>
							</div>
							<div class="col-md-3 pl-0">
								<a class="btn btn-success btn-sm publishers-backlink-outreach" href="javascript:void(0);" role="button">Add</a>
							</div>
						</div>
						</div>
						<div class="col-md-6">
							<div class="row">
							    <div class="col-md-9">
								<h4 class="pr-1">Send template email to all publishers</h4>
								</div>
								<div class="col-md-3 pl-0">
								<a class="send-to-all-publishers pb-2" href="javascript:void(0);" role="button"><i class="fas fa-envelope text-primary fa-2x"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="backlink-publishers">
					  <div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Website</th>
								<th scope="col">Traffic</th>
								<th scope="col">DA</th>
								<th scope="col">Cost</th>
								<th scope="col"></th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
						</div>

					</div>
					<?php } ?>
					<div class="form-group row mt-3">
						<div class="col-md-2 col-sm-3 col-xs-12 offset-md-10 offset-sm-9">
							<button type="submit" name="submitForm" value="" class="btn btn-primary " data-disable-with="Loading..." autocomplete="off">
								<i class="fas fa-save"></i>
								Save
							</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>