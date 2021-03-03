<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative py-5">
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

					<div class="form-group row">
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_name">
							Name<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
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
						<div class="col-sm-2">
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
						<div class="col-sm-2">
							<?php
								$data_campaign_startdate = array(
									'name' => 'campaign_startdate',
									'value' => set_value('campaign_startdate', $campaign['campaign_startdate']),
									'placeholder' => 'Start Date',
									'class' => 'form-control',
									'id' => 'campaign_startdate'
								);
								echo form_input($data_campaign_startdate);
								echo form_error('campaign_startdate');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_enddate">
						End Date<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_campaign_enddate = array(
									'name' => 'campaign_enddate',
									'value' => set_value('campaign_enddate', $campaign['campaign_enddate']),
									'placeholder' => 'End Date',
									'class' => 'form-control',
									'id' => 'campaign_enddate'
									
									
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
						<div class="col-sm-2">
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
							Backlink Qty 
						</label>
						<div class="col-sm-2">
							<?php
								$data_campaign_quantity = array(
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
						<div class="col-sm-2">
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
									$js = 'id="campaign_websites" multiple="multiple" class="select-2" required="required" data-msg-required="Please select websites"';
									echo form_dropdown("campaign_websites[]", $campaign_websites, $selected_campaign_websites, $js);
									echo form_error("campaign_websites[]");

								?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_niche">
							Niche<span class="text-danger">*</span>
						</label>
						<div class="col-sm-4">
								<?php
									$campaign_niche = array(
										'restaurant tech' => 'Restaurant Tech',
										'grocery' => 'Grocery',
										'manufacturing' => 'Manufacturing',
										'small business' => 'Small Business'
									);
									
									if( $campaign['campaign_niche']){
										$selected_campaign_niche = explode(",",$campaign['campaign_niche']);
										//pre($selected_cat);
									}else{
										$selected_campaign_niche = '';	
									}
									$js = 'id="campaign_niche" multiple="multiple" class="select-2" required="required" data-msg-required="Please select niche"';
									echo form_dropdown("campaign_niche[]", $campaign_niche, $selected_campaign_niche, $js);
									echo form_error("campaign_niche[]");

								?>
							
						</div>
						
					</div>
					<div class="form-group row">
					<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_type">
							Type<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
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
									echo form_dropdown("campaign_type", $campaign_type, $selected_campaign_type, 'class="form-control-sm select-2"' );
									echo form_error("campaign_type");

								?>
						</div>
	
					</div>
					<div class="form-group row">
					<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_content_coordinator">
					Content Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_campaign_content_coordinator = array(
									'name' => 'campaign_content_coordinator',
									'value' => set_value('campaign_content_coordinator', $campaign['campaign_content_coordinator']),
									'placeholder' => 'Content Coordinator',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_content_coordinator);
								echo form_error('campaign_content_coordinator');
							?> 
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_outreach_coordinator">
						Outreach Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_campaign_outreach_coordinator = array(
									'name' => 'campaign_outreach_coordinator',
									'value' => set_value('campaign_outreach_coordinator', $campaign['campaign_outreach_coordinator']),
									'placeholder' => 'Outreach Coordinator',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_outreach_coordinator);
								echo form_error('campaign_outreach_coordinator');
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_writer">
							Writer<span class="text-danger">*</span>
						</label>
						<div class="col-sm-2">
							<?php
								$data_campaign_writer = array(
									'name' => 'campaign_writer',
									'value' => set_value('campaign_writer', $campaign['campaign_writer']),
									'placeholder' => 'Writer',
									'class' => 'form-control'
								);
								echo form_input($data_campaign_writer);
								echo form_error('campaign_writer');
							?>
						</div>
						
					</div>

					<div class="row mb-1">
						<h4 class="pr-2">Select articles to build backlinks to </h4>
						<a class="btn btn-success btn-sm" href="#" role="button">Add</a>
					</div>
					<div class="row">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">URL</th>
								<th scope="col">Anchor text 1</th>
								<th scope="col">Anchor text 2</th>
								<th scope="col">Anchor text 3</th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<th scope="row">https://hubworks.com/</th>
								<td>Hubworks 1</td>
								<td>Hubworks 2</td>
								<td>Hubworks 3</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">https://zipschedules.com/</th>
								<td>Zip Schedules 1</td>
								<td>Zip Schedules 2</td>
								<td>Zip Schedules 3</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">https://zipforecasting.com/</th>
								<td>Zip Forecast 1</td>
								<td>Zip Forecast 2</td>
								<td>Zip Forecast 3</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row mb-1">
					<h4 class="pr-2">Select publishers for backlink outreach </h4>
					<a class="btn btn-success btn-sm" href="#" role="button">Add</a>
					<h4 class="pr-2">Send template email to all publishers </h4>
					<a class="btn btn-link btn-lg" href="#" role="button"><i class="fas fa-envelope text-primary"></i></a>
					</div>
					<div class="row">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Website</th>
								<th scope="col">Traffic</th>
								<th scope="col">DA</th>
								<th scope="col">Cost ($)</th>
								<th scope="col"></th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<th scope="row">hubworks.com</th>
								<td>400</td>
								<td>70</td>
								<td>10</td>
								<td><i class="fas fa-envelope text-primary"></i></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">zipschedules.com</th>
								<td>500</td>
								<td>80</td>
								<td>12</td>
								<td><i class="fas fa-envelope text-primary"></i></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">zipforecasting.com</th>
								<td>200</td>
								<td>60</td>
								<td>8</td>
								<td><i class="fas fa-envelope text-primary"></i></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row mb-1">
						<h4 class="pr-2">Unassigned articles</h4>
					</div>
					<div class="row">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Campaign</th>
								<th scope="col">Website</th>
								<th scope="col">Link Type</th>
								<th scope="col">Content Coordinator</th>
								<th scope="col">Outreach Coordinator</th>
								<th scope="col">Writer</th>
								<th scope="col">Assign Article</th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<th scope="row">Food Safety</th>
								<td>hubworks.com</td>
								<td>Hubworks 2</td>
								<td>Hubworks 3</td>
								<td>Hubworks 3</td>
								<td>Hubworks 3</td>
								<td><button type="button" class="btn btn-success btn-sm">Assign</button></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">Food Safety</th>
								<td>zipschedules.com</td>
								<td>Zip Schedules 2</td>
								<td>Zip Schedules 3</td>
								<td>Hubworks 3</td>
								<td>Hubworks 3</td>
								<td><button type="button" class="btn btn-success btn-sm">Assign</button></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">Food Safety</th>
								<td>zipforecasting.com</td>
								<td>Zip Forecast 2</td>
								<td>Zip Forecast 3</td>
								<td>Hubworks 3</td>
								<td>Hubworks 3</td>
								<td><button type="button" class="btn btn-success btn-sm">Assign</button></td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row mb-1">
						<h4 class="pr-2">Assigned articles</h4>
					</div>
					<div class="row">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Date</th>
								<th scope="col">Campaign</th>
								<th scope="col">Publisher</th>
								<th scope="col">Cost ($)</th>
								<th scope="col">Writer</th>
								<th scope="col">Live URL</th>
								<th scope="col">Status</th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
								<th scope="row">2020-08-07</th>
								<td>Food Safety Products</td>
								<td>john deo</td>
								<td>10</td>
								<td>Dakota Sheetz</td>
								<td>https://hubworks.com/employee-scheduling-apps.html</td>
								<td>wating</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">2020-08-06</th>
								<td>Food Safety Products</td>
								<td>Mike Neo</td>
								<td>15</td>
								<td>Michelle Jaco</td>
								<td>https://hubworks.com/employee-communication.html</td>
								<td>wating</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
								<tr>
								<th scope="row">2020-08-05</th>
								<td>Food Safety Products</td>
								<td>Staler Neo</td>
								<td>12</td>
								<td>Michelle Jaco</td>
								<td>https://hubworks.com/employee-communication.html</td>
								<td>wating</td>
								<td><i class="fas fa-times text-danger"></i></td>
								</tr>
							</tbody>
						</table>
					</div>

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