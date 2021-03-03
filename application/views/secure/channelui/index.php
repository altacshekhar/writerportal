<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage UI Channels
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/channelsui/add'); ?>" role="button">
						<span class="fas fa-plus-circle"></span>
						Add New UI Channel
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="channelui_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" style="width: 1rem;">#Id</th>
						<th class="text-center" style="width: 9rem;">Channel</th>
						<th class="text-center" style="width: 1rem;">Headline</th>
						<th class="text-center" style="width: 1rem;">Intro</th>
						<th class="text-center" style="width: 1rem;">Text</th>
						<th class="text-center" style="width: 1rem;">CTA</th>
						<th class="text-center" style="width: 1rem;">Link</th>
						<th class="text-center" style="width: 1rem;">Multimedia</th>
						<th class="text-center" style="width: 1rem;">Status</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

