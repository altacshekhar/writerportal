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
						Publisher
					</h3>
					<hr class=" mb-2">
				</div>
				<?php echo form_open_multipart('', array('class' => 'form-horizontal form-validate', 'id' => 'publisher-form'));?>

					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Url<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_publisher_url = array(
									'name' => 'publisher_url',
									'value' => set_value('publisher_url', $publisher['publisher_url']),
									'placeholder' => 'Url',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_url);
								echo form_error('publisher_url');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Status<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
								<?php
									$publisher_status = array(
										'Not Contacted' => 'Not Contacted',
										'Waiting for Reply' => 'Waiting for Reply',
										'In Progress' => 'In Progress',
										'Published' => 'Published',
										'Not Interested' => 'Not Interested',
										'Too Expensive' => 'Too Expensive',
										'Not Relevant' => 'Not Relevant',
										'Dead Link Alert' => 'Dead Link Alert',
										'Blacklisted' => 'Blacklisted',
										'Manual Remove' => 'Manual Remove',
										'Other' => 'Other'
									);
									
									if( $publisher['publisher_status']){
										$selected_publisher_status =  $publisher['publisher_status'];
										//pre($selected_cat);
									}else{
										$selected_publisher_status = 'Not Contacted';
									}
									echo form_dropdown("publisher_status", $publisher_status, $selected_publisher_status, 'class="form-control-sm select-2"' );
									echo form_error("publisher_status");

								?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
						First Name
						</label>
						<div class="col-sm-2">
							<?php
								$data_publisher_first_name = array(
									'name' => 'publisher_first_name',
									'value' => set_value('publisher_first_name', $publisher['publisher_first_name']),
									'placeholder' => 'First Name',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_first_name);
								echo form_error('publisher_first_name');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
						Last Name
						</label>
						<div class="col-sm-2">
							<?php
								$data_publisher_last_name = array(
									'name' => 'publisher_last_name',
									'value' => set_value('publisher_last_name', $publisher['publisher_last_name']),
									'placeholder' => 'Last Name',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_last_name);
								echo form_error('publisher_last_name');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Email<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_publisher_email = array(
									'name' => 'publisher_email',
									'value' => set_value('publisher_email', $publisher['publisher_email']),
									'placeholder' => 'Email',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_email);
								echo form_error('publisher_email');
							?> 
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Contact Form 
						</label>
						<div class="col-sm-2">
							<?php
								$data_publisher_phone = array(
									'name' => 'publisher_phone',
									'value' => set_value('publisher_phone', $publisher['publisher_phone']),
									'placeholder' => 'Contact Form',
									'class' => 'form-control',
									'type' => 'text'
								);
								echo form_input($data_publisher_phone);
								echo form_error('publisher_phone');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Note
						</label>
						<div class="col-md-10 col-sm-6">
						<?php
							$data_publisher_notes = array(
									'id' => 'publisher_notes',
									'name' => 'publisher_notes',
									'value' => set_value('publisher_notes', $publisher['publisher_notes'], $html_escape=FALSE),
									'placeholder' => 'Requirements',
									'rows' => 3,
									'cols' => 50,
									'class' => 'form-control'
								);
								echo form_textarea($data_publisher_notes);
							
							?> 
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Niche<span class="text-danger">*</span>
						</label>
						<div class="col-md-4  col-sm-6">
								<?php
									$publisher_niche = array();
									if(!empty($niche))
									{
										foreach($niche as $n)
										{
											$publisher_niche[strtolower($n->niche_name)] = ucwords($n->niche_name);
										}
									}
									
									if( $publisher['publisher_niche']){
										$selected_publisher_niche = explode(",",$publisher['publisher_niche']);
										//pre($selected_cat);
									}else{
										$selected_publisher_niche = '';	
									}
									$js = 'id="publisher_niche" multiple="multiple" class="select-2" required="required" data-msg-required="Please select niche"';
									echo form_dropdown("publisher_niche[]", $publisher_niche, $selected_publisher_niche, $js);
									echo form_error("publisher_niche[]");

								?>
							
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Type<span class="text-danger">*</span>
						</label>
						<div class="col-md-3  col-sm-6">
								<?php
									$publisher_type = array();
									if(!empty($type))
									{
										foreach($type as $t)
										{
											$publisher_type[strtolower($t->type_name)] = ucwords($t->type_name);
										}
									}
									
									if( $publisher['publisher_type']){
										$selected_publisher_type =  explode(",",$publisher['publisher_type']);
									}else{
										$selected_publisher_type = '';
									}
									$jspt = 'id="publisher_type" multiple="multiple" class="select-2" required="required" data-msg-required="Please select publisher type"';
									echo form_dropdown("publisher_type[]", $publisher_type, $selected_publisher_type, $jspt );
									echo form_error("publisher_type[]");

								?>
						</div>
	
					</div>
					<div class="form-group row">
					<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
						Traffic<!-- Traffic<span class="text-danger">*</span> -->
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
								$data_publisher_url_traffic = array(
									'name' => 'publisher_url_traffic',
									'value' => set_value('publisher_url_traffic', $publisher['publisher_url_traffic']),
									'placeholder' => 'Traffic',
									'class' => 'form-control',
									'type' => 'number'
								);
								echo form_input($data_publisher_url_traffic);
								echo form_error('publisher_url_traffic');
							?> 
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="meta_product_language_id">
							DA<!-- DA<span class="text-danger">*</span> -->
						</label>
						<div class="col-md-1 col-sm-6">
							<?php
								$data_publisher_url_domainauthority = array(
									'name' => 'publisher_url_domainauthority',
									'value' => set_value('publisher_url_domainauthority', $publisher['publisher_url_domainauthority']),
									'placeholder' => 'DA',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_url_domainauthority);
								echo form_error('publisher_url_domainauthority');
							?>
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="meta_product_language_id">
							RD<!-- RD<span class="text-danger">*</span> -->
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
								$data_publisher_url_referringdomains = array(
									'name' => 'publisher_url_referringdomains',
									'value' => set_value('publisher_url_referringdomains', $publisher['publisher_url_referringdomains']),
									'placeholder' => 'RD',
									'class' => 'form-control'
								);
								echo form_input($data_publisher_url_referringdomains);
								echo form_error('publisher_url_referringdomains');
							?>
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="meta_product_language_id">
						Est. Cost<!-- Est. Cost<span class="text-danger">*</span> -->
						</label>
						<div class="col-md-auto col-sm-6">
							<?php
								$data_publisher_estimated_cost = array(
									'name' => 'publisher_estimated_cost',
									'value' => set_value('publisher_estimated_cost', $publisher['publisher_estimated_cost']),
									'placeholder' => 'Est. Cost',
									'class' => 'form-control',
									'type' => 'number'
								);
								echo form_input($data_publisher_estimated_cost);
								echo form_error('publisher_estimated_cost');
							?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="meta_product_language_id">
							Requirements
						</label>
						<div class="col-sm-10">
						<?php
						$data_publisher_requirements = array(
								'id' => 'publisher_requirements',
								'name' => 'publisher_requirements',
								'value' => set_value('publisher_requirements', $publisher['publisher_requirements'], $html_escape=FALSE),
								'placeholder' => 'Requirements',
								'rows' => 3,
								'cols' => 50,
								'class' => 'form-control'
							);
							echo form_textarea($data_publisher_requirements);
							
							?> 
						</div>
					</div>
					<?php 
					// pre($publisher);
					// pre($user_type);
					if(array_key_exists("publisher_id",$publisher) && ($user_type == 1 || $user_type == 6)){ ?>
					<div class="row mb-1 mt-5">
						<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 pr-0">
								<h4 class="">Campaigns</h4>
							</div>
							<div class="col-md-3 pl-0">
								<a class="btn btn-success btn-sm publisher-campaigns hide" href="javascript:void(0);" role="button">Add</a>
							</div>
						</div>
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
					<div class="publisher-campaigns-list">
					  <div class="table-responsive" style="max-height:400px">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Campaign</th>
								<th scope="col">Websites</th>
								<th scope="col">Link Type</th>
								<th scope="col">Content Coord</th>
								<th scope="col">Outreach Coord</th>
								<th scope="col">Writer</th>
								<!-- <th scope="col"></th> -->
								</tr>
							</thead>
							<tbody>
								<?php 
								$response ='';
								//pre($unassigned_articles);
								if(!empty($unassigned_articles)){
								foreach ($unassigned_articles  as $unassigned_article) {	
								
								$response .= '<tr>';
								$response .= '<th scope="row">'.$unassigned_article['campaign_name'].'</th>';
								$response .= '<td>'.$unassigned_article['campaign_websites'].'</td>';
								$response .= '<td>'.$unassigned_article['campaign_type'].'</td>';
								$response .= '<td>'.$unassigned_article['campaign_content_coordinator_name'].'</td>';
								$response .= '<td>'.$unassigned_article['campaign_outreach_coordinator_name'].'</td>';
								$response .= '<td>'.$unassigned_article['campaign_writer_name'].'</td>';
								// $response .= '<td class="text-center"><button type="button" class="btn btn-success btn-sm article-assign" data-writer="'.$unassigned_article['campaign_writer'].'" data-campaign-id="'.$unassigned_article['campaign_id'].'" data-publisher-id="'.$publisher['publisher_id'].'">Assign</button></td>';
								//$response .= '<td class="text-center"><button type="button" class="btn btn-link text-danger delete-unassigned-article-row"><i class="fas fa-times"></i></button></td>';
								$response .= '</tr>';
							 }
							  echo $response;
							 } ?>
							</tbody>
						</table>
						</div>

					</div>

					<div class="row mb-1 mt-5">
						<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 pr-0">
								<h4 class="">Articles</h4>
							</div>
						</div>
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
					<div class="assigned-articles-list">
					  <div class="table-responsive" style="max-height:400px">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Date</th>
								<th scope="col">Campaign</th>
								<th scope="col">Title</th>
								<th scope="col">Writer</th>
								<th scope="col">Live Url</th>
								<th scope="col">Status</th>
								<th scope="col"></th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$response ='';
								//pre($assigned_articles);
								if(!empty($assigned_articles)){
									foreach ($assigned_articles  as $assigned_article) {
								if($assigned_article['article_id']){
									$article_url = $assigned_article['brief_id'] .'/'. $assigned_article['article_id'];
								}else{
									$article_url = $assigned_article['brief_id'];
								}	
								if($assigned_article['brief_assign_date']){
									$assign_date = nice_date($assigned_article['brief_assign_date'], 'Y-m-d');
								}else{
									$assign_date ='';
								} 
								if($assigned_article['brief_article_writer'] != "" && $assigned_article['brief_article_writer'] > 0)
								{
									$response .= '<tr>';
									$response .= '<th scope="row">'.$assign_date.'</th>';
									$response .= '<th scope="row">'.$assigned_article['campaign_name'].'</th>';
									$response .= '<td>'.$assigned_article['article_title'].'</td>';
									$response .= '<td>'.$assigned_article['campaign_writer_name'].'</td>';
									$response .= '<td>'.$assigned_article['brief_live_url'].'</td>';
									$response .= '<td>'.$assigned_article['brief_article_status'].'</td>';
									$response .= '<td class="text-center"><a href="' . site_url('secure/linkbuildingarticle/i18/en/' . $article_url) .'" class="btn btn-link" role="button" aria-pressed="true"><i class="fas fa-long-arrow-alt-right fa-w-14 fa-2x"></i></a></td>';
									$response .= '<td class="text-center"><button type="button" class="btn btn-link text-danger delete-assigned-article-row" data-brief-id="'.$assigned_article['brief_id'].'"><i class="fas fa-times"></i></button></td>';
									$response .= '</tr>';
								}
							 }
							  echo $response;
							 } ?>
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