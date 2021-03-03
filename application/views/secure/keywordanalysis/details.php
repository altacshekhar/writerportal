<?php
defined('BASEPATH') or exit('No direct script access allowed');
//pre($keyword_analysis);

$keyword_analysis_details = $keyword_analysis['keyword_analysis'];
$average = $keyword_analysis['keyword_analysis']['average'];
$keyword_data = $keyword_analysis['keyword_data'];

?>

<div class="container">
	<div class="row mt-3">
		<div class="col-md-9">
			<div class="card-group">
				<div class="card">
					
					<div class="card-body p-1">
						<div class="d-flex align-items-end">
							<h5 class="display-4 m-0">
								<?php echo $keyword_analysis_details['content_difficult_score']; ?>	
							</h5>
							<!-- <span class="text-light"><i class="fas fa-info-circle align-top fa-lg fa-fw"></i></span> -->
						</div>
					<p class="card-text text-uppercase mb-0">Content Difficulty</p>
					<!-- <p class="card-text"><small class="text-muted"><i class="fas fa-exclamation-circle text-warning"></i> You'll need a content performance of at least <b>73</b> to rank in the top</small></p> -->
					
					<div class="progress" style="height: 4px;">
						<div class="progress-bar" role="progressbar" style="width: <?php echo $keyword_analysis_details['content_difficult_score']; ?>%" aria-valuenow="<?php echo $keyword_analysis_details['content_difficult_score']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!-- <p class="card-text "><small class="text-primary ">HARD</small></p> -->
					</div>
				</div>
				<div class="card">
					
					<div class="card-body p-1">
						<div class="d-flex align-items-end">
							<h5 class="display-4 m-0">
								<?php echo $keyword_analysis_details['link_difficult_score']; ?>
							</h5>
							<!-- <span class="text-light"><i class="fas fa-info-circle align-top fa-lg fa-fw"></i></span> -->
						</div>
					
					<p class="card-text text-uppercase mb-0">Links Difficulty </p>
					<!-- <p class="card-text"><small class="text-muted"><i class="fas fa-exclamation-circle text-warning"></i> You'll need links from - <b>5</b> sites to your page & - <b>1.1k</b> sites to your domain </small></p> -->
					<div class="progress" style="height: 4px;">
						<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $keyword_analysis_details['link_difficult_score']; ?>%" aria-valuenow="<?php echo $keyword_analysis_details['link_difficult_score']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<!-- <p class="card-text"><small class="text-danger">HARD</small></p> -->
					</div>
				</div>
				<div class="card">
					
					<div class="card-body p-1">
						<div class="d-flex align-items-end">
							<h5 class="display-4 m-0">
								<?php echo $keyword_analysis_details['monthly_searches']; ?>
							</h5>
							<!-- <span class="text-light"><i class="fas fa-info-circle align-top fa-lg fa-fw"></i></span> -->
						</div>
					
					<p class="card-text text-uppercase mb-0">Monthly Search </p>
					
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<?php
				//pre( $category_row);
				$attributes = array('class' => 'form-horizontal form-validate', 'id' => 'keywordanalysis-form');
				echo form_open_multipart('', $attributes);
				$focus_keyword_count = 0;
				foreach ($keyword_data['should_use'] as $should_use) {

					if($should_use['priority']==1){
						$focus_keyword_count = $focus_keyword_count+1;
					}

				}
				$data_keyword_id_hide = array(
					'type' => 'hidden',
					'name' => 'keyword_id',
					'id' => 'keyword_id',
					'value' => $keyword_id,
					'class' => 'keyword_id'
				);
				echo form_input($data_keyword_id_hide);
				$data_monthly_search_hide = array(
					'type' => 'hidden',
					'name' => 'monthly_search',
					'id' => 'monthly_search',
					'value' => $keyword_analysis_details['monthly_searches'],
					'class' => 'monthly_search'
				);
				echo form_input($data_monthly_search_hide);
				$data_content_score_hide = array(
					'type' => 'hidden',
					'name' => 'content_score',
					'id' => 'content_score',
					'value' => $keyword_analysis_details['content_difficult_score'],
					'class' => 'content_score'
				);
				echo form_input($data_content_score_hide);
				$data_link_building_hide = array(
					'type' => 'hidden',
					'name' => 'link_building',
					'id' => 'link_building',
					'value' => $keyword_analysis_details['link_difficult_score'],
					'class' => 'link_building'
				);
				echo form_input($data_link_building_hide);
				$data_focus_keyword_hide = array(
					'type' => 'hidden',
					'name' => 'focus_keyword',
					'id' => 'focus_keyword',
					'value' => $focus_keyword_count,
					'class' => 'focus_keyword'
				);
				echo form_input($data_focus_keyword_hide);
			?>
			<!-- <button type="submit" class="btn btn-primary mb-2">Add</button> -->

			<?php echo form_close(); ?>
		</div>
	</div>
	<div class="row mt-1">
		<div class="col-md-12">
	  		<span class="badge badge-pill badge-info font-italic"><i class="fas fa-info-circle"></i> Informational search intent</span>
	 	 </div>
	</div>
	<div class="row mt-1">
		<div class="col-md-12">
			<div class="card">
				<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
								<th scope="col">#</th>
								<th scope="col">Search results & Difficulty</th>
								<th scope="col">Content performance</th>
								<th scope="col">Focus keyword</th>
								<th scope="col">No. of words</th>
								<th scope="col">Domains to URL</th>
								<th scope="col">Domains to Site</th>
								<th scope="col">Date published</th>
								</tr>
							</thead>
							<tbody>
							<?php $count=1; foreach ($keyword_analysis_details['url_list'] as $url_list) { ?>
								<tr>
								<th scope="row"><?php echo $count; ?></th>
								<td style="width: 20px;"><?php echo $url_list['url']; ?></td>
								<td> 
									<div class="row no-gutters">
										<div class="col-3"><?php echo $url_list['content_performance']; ?></div>
										<div class="col analysis-details">
											<div class="progress" style="height: 10px;">
												<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $url_list['content_performance']; ?>%" aria-valuenow="<?php echo $url_list['content_performance']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>    
									</div>
								</td>
								<td><?php echo $url_list['focus_keyword']; ?></td>
								<td><?php echo $url_list['word_in_article']; ?></td>
								<td><?php echo $url_list['domain_to_url']; ?></td>
								<td><?php echo $url_list['domain_to_site']; ?></td>
								<td><?php echo $url_list['date_published']; ?></td>
								</tr>
								<?php $count++; } ?>
							</tbody>
							<tfoot>
								<tr>
								<th scope="row"></th>
								<th scope="row"><strong>Averages</strong></th>
								<td><strong><?php echo $average['content_performance']; ?></strong></td>
								<td><strong><?php echo $average['focus_keyword']; ?></strong></td>
								<td><strong><?php echo $average['word_in_article']; ?></strong></td>
								<td><strong><?php echo $average['domain_to_url']; ?></strong></td>
								<td colspan="2"><strong><?php echo $average['domain_to_site']; ?></strong></td>
								</tr>
							</tfoot>
						</table>
				</div>
			</div>
		</div>
	</div>
</div>
