<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		<div class="d-flex justify-content-between">
			<div class="page-title-title">
				<h1 class="mb-2">
					Manage Type
				</h1>
			</div>
			<div class="toolbar-action">
				<div class="btn-group">
					<a class="btn btn-white" href="<?php echo site_url('/secure/linktype/add'); ?>" role="button">
						<i class="fas fa-plus"></i> Add New Type
					</a>
				</div>
			</div>
		</div>
		<?php
		if($this->session->flashdata('linktype')){ ?>
			<div id="add-repository" class="alert alert-success text-center alert-dismissible"><?php echo $this->session->flashdata('linktype'); ?> </div>
		<?php } ?>

		<div class="table-responsive">
			<table id="linktype_list_table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th scope="col">
						   Type
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
