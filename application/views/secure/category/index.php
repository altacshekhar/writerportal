<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Category
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/category/add'); ?>" role="button">
						<i class="fas fa-plus"></i> Add New Category
					</a>
				</div>
			</div>
		</div>
		<?php
		if($this->session->flashdata('category')){ ?>
			<div id="add-repository" class="alert alert-success text-center alert-dismissible"><?php echo $this->session->flashdata('category'); ?> </div>
		<?php } ?>

		<div class="table-responsive">
			<table id="category_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th scope="col">
						   Category Name
						</th>
						<th scope="col">
						  Sub Category Name
						</th>
						<th scope="col">
						   Category Slug
						</th>
						<th scope="col" style="width: 6rem;">

						</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	</div>
</div>
