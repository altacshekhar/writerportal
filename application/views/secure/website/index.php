<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Website Default Settings
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/websites/add'); ?>" role="button">
						<span class="fas fa-plus-circle"></span>
						Add New Website Default Settings
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="websites_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" >#Id</th>
						<th class="text-center" >Website</th>
						<th class="text-center" >Default Meta Product</th>
						<th class="text-center" >Available Blog Categories</th>
						<th class="text-center" >Rakefile</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

