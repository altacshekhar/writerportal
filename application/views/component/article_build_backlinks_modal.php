	<div class="modal fade" id="articleBuildBacklinksModal" tabindex="-1" role="dialog" aria-labelledby="articleBuildBacklinksModalLabel"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
	        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Articles</h5>
			</div>
	             <div class="modal-body">
				 <div class="row ml-1 mr-1 mb-1">
				 <div class="col-md-3">
					<select class="form-control-sm select-2 filter-websites">
						<option value="">--Select All Websites--</option>
					</select>
				</div>
				 </div>
	                <?php
						//$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlebuildbacklinks-form');
						//echo form_open('', $attributes);
					?>
					<div class="row ml-1 mr-1 ">
						<div class="table-responsive" style="max-height:350px">
							<table class="table table-bordered">
								<thead>
									<tr>
									<th scope="col">Website</th>
									<th scope="col">Title</th>
									<th scope="col">Published</th>
									<th scope="col">Keyword</th>
									<th scope="col">Content</th>
									<th scope="col">Backlinks</th>
									<th scope="col">Status</th>
									<th scope="col"></th>
									</tr>
								</thead>
								<tbody style="overflow-y: auto">
									
								</tbody>
							</table>
						</div>
					</div>
						
	            </div>
			<div class="modal-footer">
				<span id="publisher_writer" style="display:none;"></span>
			    <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Done</button>
			</div>
	            <!-- End Signin -->
	            <?php //echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>