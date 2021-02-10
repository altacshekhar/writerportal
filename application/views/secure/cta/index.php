<?php
	defined('BASEPATH') or exit('No direct script access allowed');
	$cta_types  = "<option value=''>Select Type (all)</option>";
	$cta_types .= "<option value='signup'>Signup</option>";
	$cta_types .= "<option value='leadcapture'>Lead Capture</option>";
	//$cta_types .= "<option value='salesdemo'>Sales Demo</option>";
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage CTA
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/cta/add'); ?>" role="button">
						<span class="fas fa-plus-circle"></span>
						Add New CTA
					</a>
				</div>
			</div>
		</div>
		<div class="highlight">
			<div class="cta-search-filters">
				<div class="row form-row">
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="website_select">Website</label>
							<select id="website_select" class="form-control select-2" data-column="0">
								<option value=''>Select Website (all)</option>
								<?php foreach ($github_repo as $repo) {?>
								<option value='<?php echo $repo['site_id'] ?>'><?php echo ucwords($repo['site_id']) ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="type_select">Type</label>
							<select id="type_select" class="form-control select-2" data-column="1">
								<?php echo $cta_types; ?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
					</div>	
					<div class="col-sm-3">
						<div class="form-group">
							<label class="control-label" for="datatableCtaSearch">.</label>
							<span class="form-icon-wrapper has-clear">
								<span class="form-icon form-icon-right close form-control-clear d-none">
									<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
								</span>
								<input type="text" id="datatableCtaSearch" class="form-control form-icon-input-right" placeholder="Search CTA or Websites" aria-label="Search CTA or Websites">
							</span>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="cta_list_table" class="table table-striped table-bordered table-hover">
				<thead></thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

