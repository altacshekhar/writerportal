<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Meta Tags
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/metatags/add'); ?>" role="button">
						<span class="fas fa-plus-circle"></span>
						Add New Meta Tag
					</a>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table id="metatags_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center" >#Id</th>
						<th class="text-center" >Meta Product Id</th>
						<th class="text-center" >Language</th>
						<th class="text-center" >Meta Category</th>
						<th class="text-center" >Meta Product Name</th>
						<th class="text-center" >Meta Product</th>
						<th class="text-center" >Meta Product Description</th>
						<th class="text-center" >Product CTA</th>
						<th class="text-center" >Content CTA</th>
						<th class="text-center" >Meta Product Image</th>
						<th class="text-center" >Meta Product Icon</th>
						<th class="text-center" >Meta Product Part Id</th>
						<th class="text-center" >Meta Product Brand</th>
						<th class="text-center" >Meta Product Price</th>
						<th class="text-center" >Meta Product Price Currecny</th>
						<th class="text-center" >Meta Product Review Count</th>
						<th class="text-center" >Meta Product Rating Value</th>
						<th style="width: 6rem;"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

