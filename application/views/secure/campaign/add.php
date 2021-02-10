<?php
defined('BASEPATH') or exit('No direct script access allowed');
$is_readonly = false;
$is_disable = "";

if($backlink_list_array['form_action'] == "publish")
{
	$is_readonly = true;
	$is_disable = "disabled";
}
//echo $is_readonly;
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
									'class' => 'form-control',
								);
								if($is_readonly)
									$data_campaign_name['readonly'] = true;
								echo form_input($data_campaign_name);
								echo form_error('campaign_name');
								if(array_key_exists('campaign_id',$campaign))
								{
									$data_campaign_id = array(
										'name'  => 'campaign_id',
										'value' => set_value('campaign_id', $campaign['campaign_id']),
										'type'  => 'hidden',
										'id'    => 'campaign_id'
									);
									echo form_input($data_campaign_id);
								}
								
							?>
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_status">
							Status<span class="text-danger">*</span>
						</label>
						<div class="col-sm-3">
								<?php
									$campaign_status = array(
										'Waiting for outreach coordinator to assign' => 'Waiting for outreach coordinator to assign',
										'publishers' => 'publishers',
										'Deleted' => 'Deleted',
										'In Progress' => 'In Progress',
										'Complete' => 'Complete'
									);
									
									if( $campaign['campaign_status']){
										$selected_campaign_status =  $campaign['campaign_status'];
									}else{
										$selected_campaign_status ='In Progress';
									}
									echo form_dropdown("campaign_status", $campaign_status, $selected_campaign_status, 'class="form-control-sm select-2" '.$is_disable );
									echo form_error("campaign_status");
									if($is_disable)
									{
										echo '<input type="hidden" name="campaign_status" value="'.$selected_campaign_status.'" />';
									}

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
									'data-date-format'=>"yyyy-mm-dd"
								);
								
								if($is_readonly)
									$data_campaign_startdate['readonly'] = true;

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
								$campaign_enddate = date('Y-m-d',strtotime('+14days'));
							}
								$data_campaign_enddate = array(
									'name' => 'campaign_enddate',
									'value' => set_value('campaign_enddate', $campaign_enddate),
									'placeholder' => 'End Date',
									'class' => 'form-control',
									'id' => 'campaign_enddate',
									'data-date-format'=>"yyyy-mm-dd"
								);
								if($is_readonly)
									$data_campaign_enddate['readonly'] = true;
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
								
								if($is_readonly)
									$data_campaign_budget['readonly'] = true;
								echo form_input($data_campaign_budget);
								echo form_error('campaign_budget');
							?> 
						</div>
						<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_quantity">
						Number of Backlink Articles
						</label>
						<div class="col-sm-3">
							<?php
								if($campaign['campaign_quantity'] > 0)
								{
									$data_campaign_quantity = array(
										'id' => 'campaign_quantity',
										'name' => 'campaign_quantity',
										'value' => set_value('campaign_quantity', $campaign['campaign_quantity']),
										'placeholder' => 'Number of Backlink',
										'class' => 'form-control',
										'type' => 'number',
										'readonly' => 'true',
									);
								}
								else
								{
									$data_campaign_quantity = array(
										'id' => 'campaign_quantity',
										'name' => 'campaign_quantity',
										'value' => set_value('campaign_quantity', $campaign['campaign_quantity']),
										'placeholder' => 'Number of Backlink',
										'class' => 'form-control',
										'type' => 'number'
									);
								}
								
								if($is_readonly)
									$data_campaign_quantity['readonly'] = true;
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
								if($is_readonly)
									$data_campaign_notes['readonly'] = true;
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
									$js = 'id="campaign_websites" multiple="multiple" class="select-2 form-control-sm" required="required" data-msg-required="Please select websites" '.$is_disable;
									echo form_dropdown("campaign_websites[]", $campaign_websites, $selected_campaign_websites, $js);
									echo form_error("campaign_websites[]");
									if($is_disable)
									{
										foreach($selected_campaign_websites as $scw)
										{
											echo '<input type="hidden" name="campaign_websites[]" id="campaign_websites" value="'.$scw.'" />';
										}
									}

								?>
						</div>
						<!-- <label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_niche">
							Niche<span class="text-danger">*</span>
						</label>
						<div class="col-md-3 col-sm-6">
								<?php
								$campaign_niche = array();
								if(!empty($niche))
								{
									foreach($niche as $n)
									{
										$campaign_niche[strtolower($n->niche_name)] = ucwords($n->niche_name);
									}
								}	
									
									if( $campaign['campaign_niche']){
										$selected_campaign_niche = explode(",",$campaign['campaign_niche']);
										//pre($selected_cat);
									}else{
										$selected_campaign_niche = '';	
									}
									$js = 'id="campaign_niche" multiple="multiple" class="select-2 form-control-sm" required="required" data-msg-required="Please select niche" '.$is_disable;
									echo form_dropdown("campaign_niche[]", $campaign_niche, $selected_campaign_niche, $js);
									echo form_error("campaign_niche[]");
									if($is_disable)
									{
										foreach($selected_campaign_niche as $scn)
										{
											echo '<input type="hidden" name="campaign_niche[]" id="campaign_niche" value="'.$scn.'" />';
										}
									}
								?>
							
						</div> -->

						<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_type">
							Type<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
								<?php
									$campaign_type = array();
									if(!empty($type))
									{
										foreach($type as $t)
										{
											$campaign_type[strtolower($t->type_name)] = ucwords($t->type_name);
										}
									}
									
									if( $campaign['campaign_type']){
										//$selected_campaign_type =  explode(",",$campaign['campaign_type']);
										$selected_campaign_type =  $campaign['campaign_type'];
									}else{
										$selected_campaign_type = '';
									}
									$js = 'id="campaign_type" class="select-2 form-control-sm" required="required" data-msg-required="Please select type" '.$is_disable;
									echo form_dropdown("campaign_type", $campaign_type, $selected_campaign_type, $js);
									echo form_error("campaign_type");
									if($is_disable)
									{
										echo '<input type="hidden" name="campaign_type" id="campaign_type" value="'.$selected_campaign_type.'" />';
									}
								?>
						</div>
					</div>
					<div class="form-group row">
					
					</div>
					<div class="form-group row">
					<label class="col-md-2 col-sm-6 h6 col-form-label" for="campaign_content_coordinator">
					Content Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
							//pre($campaign['campaign_content_coordinator']);
								$select_content_coordinator = '';
								 if($user_id && $user_type == 3){
									$select_content_coordinator = $user_id;
								 }else if($campaign['campaign_content_coordinator']){
									$select_content_coordinator = $campaign['campaign_content_coordinator'];
								 }
								$js = 'id="campaign_content_coordinator"  class="select-2 form-control-sm" required="required" '.$is_disable;
								echo form_dropdown("campaign_content_coordinator", $content_coordinators, $select_content_coordinator, $js);
								echo form_error("campaign_content_coordinator");
								if($is_disable)
								{
									echo '<input type="hidden" name="campaign_content_coordinator" id="campaign_content_coordinator" value="'.$select_content_coordinator.'" />';
								}
							?> 
						</div>
						<label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_outreach_coordinator">
						Outreach Coordinator<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
								$js = 'id="campaign_outreach_coordinator"  class="select-2 form-control-sm" required="required" '.$is_disable;
								echo form_dropdown("campaign_outreach_coordinator", $outreach_coordinators, $campaign['campaign_outreach_coordinator'], $js);
								echo form_error("campaign_outreach_coordinator");
								if($is_disable)
								{
									echo '<input type="hidden" name="campaign_outreach_coordinator" id="campaign_outreach_coordinator" value="'.$campaign['campaign_outreach_coordinator'].'" />';
								}
							?>
						</div>
						
						<!-- <label class="col-md-auto col-sm-6 h6 col-form-label" for="campaign_writer">
							Writer<span class="text-danger">*</span>
						</label>
						<div class="col-md-2 col-sm-6">
							<?php
								$js = 'id="campaign_writer"  class="select-2 form-control-sm" required="required"';
								echo form_dropdown("campaign_writer", $writers, $campaign['campaign_writer'], $js);
								echo form_error("campaign_writer");
							?>
						</div> -->
						
					</div>
 					<!---backlink section start --->
					
					<div class="row mb-1 mt-5">
						<h4 class="pr-2">Backlinks</h4>
						<?php 
						//echo $backlink_list_array['form_action'];
						if($backlink_list_array['form_action'] == "draft" || $backlink_list_array['form_action'] == "" || $backlink_list_array['form_action'] == null)
						{?>
						<a class="btn btn-success btn-sm articles-build-backlinks" href="javascript:void(0);" role="button">Add</a>
						<div id="add-loading-image" style="display:none;"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="align-middle" style="height:30px" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/> <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z"> <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/> </path></svg> Loading...</span></div>
						<?php 
						}
						?>
					</div>
					<div id="backlink-list">
						<?php
						if($backlink_list_array['backlink_list']){
							$this->load->view('secure/campaign/backlink_template', $backlink_list_array);
						}	
						?>
					</div>
					<?php 
					if($campaign['campaign_quantity'] > 0 && ($backlink_list_array['form_action'] == "draft" || $backlink_list_array['form_action'] == "" || $backlink_list_array['form_action'] == null))
					{?>
					<div class="row mb-1">
						<a class="btn btn-success btn-sm add-more-articles" href="javascript:void(0);" role="button">Add Article</a>
						<div id="loading-image" style="display:none;"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="align-middle" style="height:30px" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/> <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z"> <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/> </path></svg> Loading...</span></div>
					</div>
					<?php }
					?>
					<?php if($user_type == 1 || $user_type == 6){ ?>
					<div class="row mb-1 mt-5">
						<div class="col-md-6">
						<div class="row">
							<div class="col-md-9">
								<h4 class="pr-2">Select publishers for backlink outreach</h4>
							</div>
							<?php if($backlink_list_array['form_action'] == "draft" || $backlink_list_array['form_action'] == "") {?>
							<div class="col-md-3 pl-0">
								<a class="btn btn-success btn-sm publishers-backlink-outreach" href="javascript:void(0);" role="button">Add</a>
							</div>
							<?php 
							}
							?>
						</div>
						</div>
						<div class="col-md-6">
							<div class="row">
							    <div class="col-md-9">
								<h4 class="pr-1">Send template email to all publishers</h4>
								</div>
								<div class="col-md-3 pl-0">
								<a class="send-to-all-publishers pb-2" target="_blank" href="javascript:void(0);" role="button"><i class="fas fa-envelope text-primary fa-2x"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="backlink-publishers">
					  <div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
								<th scope="col">Publisher</th>
								<th scope="col">Traffic</th>
								<th scope="col">DA</th>
								<th scope="col">Cost</th>
								<th scope="col"></th>
								<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								//pre($publisher);
								$publisher_dropdown[''] = '---Select---';
								if(!empty($publisher))
								{
									$i = 0;
									foreach($publisher as $key => $pub)
									{
										if($pub['publisher_id'] > 0)
										{
                                            $data_campaign_publishers = array(
												'type' => 'hidden',
												'name' => "campaign_publishers[$i][campaign_publisher_id]",
												'value' => set_value("campaign_publishers[$i][campaign_publisher_id]", $pub['campaign_publisher_id']),
												'placeholder' => '',
												'class' => 'form-control'
											);
											echo form_input($data_campaign_publishers);
											$data_campaign_publishers_id = array(
												'type' => 'hidden',
												'name' => "campaign_publishers[$i][publisher_id]",
												'value' => set_value("campaign_publishers[$i][publisher_id]", $pub['publisher_id']),
												'placeholder' => '',
												'class' => 'form-control'
											);
											$i++;
											echo form_input($data_campaign_publishers_id);
											$publisher_dropdown[$pub['publisher_id']] = get_domain($pub['publisher_url']); 
											echo '<tr id="row_'.$pub['campaign_publisher_id'].'" class="publishers-row" data-campaign_publsiher_id="'.$pub['campaign_publisher_id'].'" data-name="'.get_domain($pub['publisher_url']).'" data-id="'.$pub['publisher_id'].'"><td>'.get_domain($pub['publisher_url']).'</td><td>'.$pub['publisher_url_traffic'].'</td>
											<td>'.$pub['publisher_url_domainauthority'].'</td><td>'.$pub['publisher_estimated_cost'].'</td>
											<td><a target="_blank" href="https://zimbra.altametrics.com/mail?view=compose&to='.$pub['publisher_email'].'&subject=&body=" class="publisher-email" data-publisher-email="'.$pub['publisher_email'].'"><i class="fas fa-envelope"></i></a></td>
											<td>';
											if($backlink_list_array['form_action'] == "draft" || $backlink_list_array['form_action'] == "")
											{
												echo '<button type="button" class="btn btn-link text-danger delete-publisher-row p-0"><i class="fas fa-times"></i></button>';
											}
											echo '</td></tr>';
										}	
									}
								}
								?>
							</tbody>
						</table>
						</div>

					</div>
					<?php } ?>
					

					<!-- <div class="row">

					<div class="build-backlinks col-md-6" style="overflow-x: scroll">
						<?php 
						//pre($backlinks);
						$del_div_str = "";
						$i = 1;
						$delete_article_id = array();
						foreach($backlinks as $k => $backlink)
						{
							echo '<div class="form-row-'.$i.' backlink-row d-flex">';
							$mt = "";
							if($i == 1)
								$mt = "mt-2";
							echo '<div class="col-md-2 mb-1 '.$mt.'">
									<label for="">Article '.$i.'</label></div>';
							echo '<div class="col-md-2 mb-1 '.$mt.'">
									<label for="">Anchor Text </label></div>';
							$backlink_anchortext = $backlink['article_anchortext'];
							$url = explode(',',$backlink['article_wp_url']);
							$wp_article_id = explode(',',$backlink['article_wp_new_id']);
							if(empty($wp_article_id))
								$wp_article_id = $backlink['article_wp_id'];
							$key = $i-1;
							for($j = 0; $j < count($backlink_anchortext); $j++){ 
								$url_val = $url[$j];
										echo '<div class="col-md-3 mb-1 del-row-'.$j.'">';
										if($i == 1)
										{
											echo '<label title="'.$url_val.'">'.substr($url_val,0,14).'..</label>';
										}
										
										$data_article_wp_url = array(
											'type' => 'hidden',
											'name' => "backlinks[$key][article_wp_url][]",
											'value' => set_value("backlinks[$key][article_wp_url][]", $url_val, $html_escape=FALSE),
											'placeholder' => '',
											'id' => 'backlinks-url-'.$i.'-'.$j,
											'class' => 'form-control'
										);
										echo form_input($data_article_wp_url);
										if(is_array($wp_article_id) && array_key_exists($j,$wp_article_id))
											$wp_id =  $wp_article_id[$j];
										$data_article_new_wp_id = array(
											'type' => 'hidden',
											'name' => "backlinks[$key][article_wp_id][]",
											'value' => set_value("backlinks[$key][article_wp_id][]", $wp_id),
											'placeholder' => '',
											'id' => 'backlinks-wp-id-'.$i.'-'.$j,
											'class' => 'form-control backlink-articles-id'
										);
										echo form_input($data_article_new_wp_id);
										echo form_error('article_wp_id');

										$data_article_anchortext = array(
										'name' => "backlinks[$key][article_anchortext][]",
										'value' => set_value("backlinks[$key][article_anchortext][]", $backlink_anchortext[$j]),
										'placeholder' => '',
										'class' => 'form-control col-md-12',
										'id' => 'backlinks-anchor-text-'.$i.'-'.$j,
										'required' => 'required',
									);
									echo form_input($data_article_anchortext);
									echo form_error('article_anchortext');
									echo '</div>';
									$delete_article_id[] = $backlink['link_wp_articles_id'];

								if($i == $campaign['campaign_quantity'])
								{
									$del_div_str .= '<div class="col-md-3 del-row-'.$j.' text-center">
									<label for=""></label>
									<a class="deleteBacklink"
										href="javascript:void(0);"
										data-backlink-id="'.implode(',',array_unique($delete_article_id)).'" data-col-id="'.$j.'">
										<i class="fas fa-times text-danger fa-lg"></i>
									</a>
									</div>';
								}
							}
							echo '</div>';
							$data_link_wp_articles_id_hide = array(
								'type' => 'hidden',
								'name' => "backlinks[$key][link_wp_articles_id]",
								'value' => $backlinks[$k]['link_wp_articles_id'],
								'class' => 'link_wp_articles_id'
							);
							echo form_input($data_link_wp_articles_id_hide); 
							if($i == $campaign['campaign_quantity'])
							{
								echo '<div class="delete-row d-flex"><div class="col-md-2 mb-1 mt-1"><label for="" title="">&nbsp;</label></div><div class="col-md-2 mb-1 mt-1"><label for="" title="">&nbsp;</label></div>'.$del_div_str.'</div>'; 
							}
							$i++;
						}
						?>
					</div>
					<div class="col-md-6 build-writer-info">
						<?php 
						//pre($briefs);
						if(!empty($briefs))
						{	
						$i = 1;	
						foreach($briefs as $brief)
						{
							echo '<div class="form-row backlink-row d-flex">';
							echo '<div class="col-md-3 mb-1">';
							echo $i == 1 ? "<label>Publisher</label>" : "";
							$js = 'id="publisher_'.$i.'"  class="select-2 form-control-sm"';
							echo form_dropdown("publisher[]", $publisher_dropdown, $brief['publisher_id'], $js);
							echo form_error("publisher[]");
							echo '</div>';
							echo '<div class="col-md-3 mb-1">';
							echo $i == 1 ? "<label>Writer</label>" : "";
							$js = 'id="campaign_writer_'.$i.'"  class="select-2 form-control-sm"';
							echo form_dropdown("campaign_writer[]", $writer, $brief['brief_article_writer'], $js);
							echo form_error("campaign_writer[]");
							echo '</div>';
							echo '<div class="col-md-2 mb-1">';
							echo $i == 1 ? "<label>Length</label>" : "";
							$data_length = array(
								'name' => "length[]",
								'id' => "length_".$i,
								'value' => set_value("length[]", $brief['brief_article_length']),
								'placeholder' => '',
								'class' => 'form-control col-md-12',
							);
							echo form_input($data_length); 
							$data_writer_hidden = array(
								'type' => 'hidden',
								'name' => "brief_id[]",
								'id' => "brief_id_".$i,
								'value' => set_value("brief_id[]", $brief['brief_id']),
								'placeholder' => '',
								'class' => 'form-control col-md-12',
							);
							echo form_input($data_writer_hidden); 
							if(!empty($briefs_backlinks) && array_key_exists($i-1,$briefs_backlinks))
							{
								if($briefs_backlinks[$i-1]['backlink_id'] > 0)
								{
									$data_backlink_hidden = array(
										'type' => 'hidden',
										'name' => "backlink_id[]",
										'id' => "backlink_id_".$i,
										'value' => set_value("backlink_id[]", $briefs_backlinks[$i-1]['backlink_id']),
										'placeholder' => '',
										'class' => 'form-control col-md-12',
									);
									echo form_input($data_backlink_hidden); 
								}
							}
							echo '</div>';	
							echo '<div class="col-md-2 mb-1">';
							echo $i == 1 ? "<label>Cost</label>" : "";
							$data_cost = array(
								'name' => "cost[]",
								'id' => "cost_".$i,
								'value' => set_value("cost[]", $brief['brief_article_cost']),
								'placeholder' => '',
								'class' => 'form-control col-md-12',
							);
							echo form_input($data_cost); 
							echo '</div>';
							echo '<div class="col-md-2 mb-1">';
							echo $i == 1 ? "<label>Notes</label>" : "";
							$data_notes = array(
								'name' => "notes[]",
								'id' => "notes_".$i,
								'value' => set_value("notes[]", $brief['brief_notes']),
								'placeholder' => '',
								'class' => 'form-control col-md-12',
							);
							echo form_input($data_notes); 
							echo '</div>';		
							echo '</div>';
							$i++;
						}
						}
						?>
					</div>
					</div> -->
					<?php } ?>
					<div class="form-group row">
						<div class="col-md-4 col-sm-6 col-xs-12 offset-md-8 offset-sm-6">
						<?php 
						$hide_save = "";
						if($backlink_list_array['form_action'] == "publish")
						{
							$hide_save = "hide";
						}?>
						&nbsp;&nbsp;&nbsp;&nbsp;
							<button type="submit" name="form_action" value="draft" class="ml-2 float-right btn btn-primary <?php echo $hide_save;?>" data-disable-with="Loading..." autocomplete="off">
								<i class="fas fa-save"></i>
								Save
							</button>
							<button type="submit" name="form_action" value="publish" class="float-right btn btn-success" data-disable-with="Loading..." autocomplete="off">
								<i class="fas fa-check"></i>
								Save &amp; Publish
							</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>