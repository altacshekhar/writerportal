	<div class="modal fade" id="articleKeywordModal" tabindex="-1" role="dialog" aria-labelledby="articleKeywordModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-md" role="document">
	        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add keyword</h5>
			</div>
	             <div class="modal-body">
	                <?php
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlekeyword-form');
						echo form_open('', $attributes);
						$categories = json_decode($article_categories);
						//pre($pillar_articles);
						?>
							<div class="form-row">
								
								<div class="col-sm-5">
								 <div class="form-group">
									<select class="form-control" id="article-keyword-website" name="website">
									<option value="" >--Select website--</option>
									<?php foreach ($websites as $website) {
											if(array_key_exists('site_id', $website)){
											?>
												<option value='<?php echo strtolower($website['site_id']); ?>'>
													<?php echo ucwords($website['site_id']) ?>
												</option>
												<?php 
											} 
										}

										?>
										
									</select>
									<small id="article-keyword-website" class="form-text text-muted">
										Select Website
									</small>
								  </div>
								</div>
								<div class="col-sm-7">
									<div class="form-group">
										<input type="text" class="form-control keyword" id="article-keyword-phrase" name="keyword" placeholder="ex. Employee Scheduling">
										<small class="form-text text-muted"> Enter keyword phrase (2-4 words)</small>
									</div>
								</div>
							</div>
	            </div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-sm btn-primary add-keyword-phrase"><span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>Submit</button>
			</div>
	            <!-- End Signin -->
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>