<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Link Building Articles
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a href="<?php echo site_url('secure/articlesbrief/report')?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Report">
					<span class="fas fa-chart-bar"></span>
					Report
					</a>
				</div>
			</div>
		</div>
		<div class="highlight">
					<div class="search-articlebrief-filters">
						<div class="row form-row">
							<div class="col-sm-3 ">
								<!-- <div class="form-group">
									<label class="control-label" for="campaign_type_select">Link Type</label>
									<select id="campaign_type_select" class="form-control select-2" data-column="0">
										<option value=''>--Select All Link Type --</option>
										<option value='guest post'>Guest Post</option>
										<option value='reciprocal'>Reciprocal</option>
										<option value='press release'>Press Release</option>
										
									</select>
								</div> -->
								<div class="form-group">
									<label class="control-label" for="campaign"> Campaigns</label>
									<select id="campaign" class="form-control select-2" data-column="0">
									<option value=''>--Select All Campaigns --</option>
									<?php 
									foreach($campaigns as $campaign)
									{
										
										echo '<option value="'.$campaign->campaign_id.'">'.$campaign->campaign_name.'</option>';
									}
									?>
									</select>
								</div>
							</div>
							<div class="col-sm-4 ">
							</div>
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label" for="datatableArticlebriefSearch">.</label>
									<span class="form-icon-wrapper has-clear">
										<span class="form-icon form-icon-right close form-control-clear d-none">
											<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
										</span>
										<input type="text" id="datatableArticlebriefSearch" class="form-control form-icon-input-right" placeholder="Search Article" aria-label="Search Article">
									</span>

								</div>
							</div>
						</div>
					</div>
				</div>
		<div class="table-responsive">
			<table id="articlebrief_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" style="width: 9rem;">Assigned Date</th>
						<th class="text-left" style="width: 15rem;">Writer <br>Content Coordinator<br> Outreach Coordinator </th>
						<th class="text-center" style="width: 10rem;">Publisher</th>
						<th class="text-center" style="width: 9rem;">Campaign</th>
						<th class="text-center" style="width: 9rem;">Article Title</th>
						<th class="text-center" style="width: 9.5rem;">Status</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

