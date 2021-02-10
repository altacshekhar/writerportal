	<div class="modal fade" id="articleBriefModal" tabindex="-1" role="dialog" aria-labelledby="articleBriefModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-md" role="document">
	        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Article</h5>
			</div>
	             <div class="modal-body">
	                <?php
					//pre($brief_articles);
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'article-brief-form');
						echo form_open('', $attributes);
						$categories = json_decode($article_categories);
						//pre($brief_articles);
						?>
							<div class="form-row">
								<div class="col-sm-12">
								
									<div class="form-group">
										<label for="article_brief">Select Article</label>
										<select class="form-control" id="article_brief" name="article_brief">
											<option value="" >--Select Article --</option>
											<?php  foreach ($brief_articles as $brief_article) {
													if(array_key_exists('brief_headline', $brief_article)){
													?>
														<option value='<?php echo $brief_article['brief_id']; ?>'>
															<?php echo ucwords($brief_article['brief_headline']) ?>
														</option>
														<?php 
													} 
												}
											?>
										</select>
										<small id="articleHelp" class="form-text text-muted"></small>
									</div>
									
								</div>
							</div>
	            </div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-sm btn-primary add-article-brief"><span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>Submit</button>
			</div>
	            <!-- End Signin -->
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>