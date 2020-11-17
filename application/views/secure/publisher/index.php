<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Publishers
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a href="<?php echo site_url('secure/publishers/report')?>" class="btn btn-primary excel-download" data-toggle="tooltip" data-placement="top" title="Export Publisher Sample">
					<span class="fas fa-chart-bar"></span>
					Report
					</a>
				</div>
				<div class="btn-group">
					<a href="<?php echo site_url('data/publisher-format.csv')?>" class="btn btn-success excel-download" data-toggle="tooltip" data-placement="top" title="Export Publisher Sample">
					<span class="fas fa-download"></span>
					</a>
				</div>
				<div class="btn-group">
					<a href="javascript:void(0)" class="btn btn-info excel-upload" data-toggle="tooltip" data-placement="top" title="Upload Publishers CSV">
					<span class="fas fa-upload"></span>
					</a>
				</div>
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/publishers/add'); ?>" role="button">
						<span class="fas fa-user-plus"></span>
						Add Publisher
					</a>
				</div>
			</div>
			
		</div>
		
		<div class="highlight">
			<div class="search-publisher-filters">
				<div class="row form-row">
					<div class="col-sm-3 ">
						<div class="form-group">
							<label class="control-label" for="publisher_type_select">Type</label>
							<select id="publisher_type_select" class="form-control select-2" data-column="0">
								<option value=''>--Select All Publisher Type --</option>
								<?php 
								if(!empty($type))
								{
									foreach($type as $t)
									{
										echo '<option value="'.strtolower($t->type_name).'">'.ucwords($t->type_name).'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-4 ">
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label class="control-label" for="datatablePublisherSearch">.</label>
							<span class="form-icon-wrapper has-clear">
								<span class="form-icon form-icon-right close form-control-clear d-none">
									<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
								</span>
								<input type="text" id="datatablePublisherSearch" class="form-control form-icon-input-right" placeholder="Search Publisher" aria-label="Search Publisher">
							</span>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="publisher_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="" style="width: 9rem;">Publisher</th>
						<th class="text-center" style="width: 9rem;">Niche</th>
						<th class="text-center" style="width: 9rem;">Type</th>
						<th style="width: 9.5rem;" class="text-center">Traffic</th>
						<th style="width: 9.5rem;" class="text-center">DA</th>
						<th style="width: 9.5rem;" class="text-center">RD</th>
						<th style="width: 9.5rem;" class="text-center">Est. Cost </th>
						<th style="width: 9.5rem;" class="text-center">Status</th>
						<th style="width: 9.5rem;" class="text-center">Last Activity</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

