<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Live Link
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a href="<?php echo site_url('secure/livelinks/report')?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Report">
					<span class="fas fa-chart-bar"></span>
					Report
					</a>
				</div>
			</div>
		</div>
		<div class="highlight">
					<div class="search-livelink-filters">
						<div class="row form-row">
							<div class="col-sm-3 ">
								<div class="form-group">
									<label class="control-label" for="campaign_type_select">Status</label>
									<select id="campaign_type_select" class="form-control select-2" data-column="0">
										<option value=''>--Select All Status --</option>
										<option value='valid'>Valid</option>
										<option value='failed'>Failed</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4 ">
							</div>
							<div class="col-sm-5">
								<div class="form-group">
									<label class="control-label" for="datatableLivelinkSearch">.</label>
									<span class="form-icon-wrapper has-clear">
										<span class="form-icon form-icon-right close form-control-clear d-none">
											<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
										</span>
										<input type="text" id="datatableLivelinkSearch" class="form-control form-icon-input-right" placeholder="Search" aria-label="Search">
									</span>

								</div>
							</div>
						</div>
					</div>
				</div>
		<div class="table-responsive">
			<table id="livelink_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" style="width: 9rem;">Date Published</th>
						<th class="text-center" style="width: 15rem;">Live URL</th>
						<th class="text-center" style="width: 5rem;">No. of Backlinks</th>
						<th class="text-center" style="width: 5rem;">Cost</th>
						<th class="text-center" style="width: 5.5rem;">Validation Date</th>
						<th class="text-center" style="width: 15rem;">Validation Status</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

