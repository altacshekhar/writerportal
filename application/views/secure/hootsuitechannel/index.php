<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Channels
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/hootsuitechannels/add'); ?>" role="button">
						<span class="fas fa-plus-circle"></span>
						Add New Channel
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="hootsuite_channel_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" style="width: 1rem;">#Id</th>
						<th class="text-center" style="width: 9rem;">Site</th>
						<th class="text-center" style="width: 9rem;">Channel</th>
						<th class="text-center" style="width: 9rem;">Social ID</th>
						<th class="text-center" style="width: 1rem;">Lang</th>
						<th class="text-center" style="width: 1rem;">Status</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

