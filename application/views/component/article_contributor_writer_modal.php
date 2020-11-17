	<div class="modal fade" id="articleContributorModal" tabindex="-1" role="dialog" aria-labelledby="newArticleModalLabel"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-lg" role="document">
	        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Article</h5>
			</div>
	             <div class="modal-body">
	                <?php
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlecontributor-form');
						echo form_open('', $attributes);
						$categories = json_decode($article_categories);
						//pre($pillar_articles);
						?>
							<div class="form-group row">
								<label for="article-ontributor-website" class="col-sm-3 col-form-label">Website</label>
								<div class="col-sm-9">
									<select class="form-control" id="article-ontributor-website" name="cwebsite">
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
								</div>
							</div>
							<div class="row">
								<input type="hidden" id="contributorblog" name="csiteStructure" value="blog">
								<input type="hidden" id="contributorblogArticle" name="carticleBlogType" value="article" >
								<input type="hidden" id="contributorformType" name="formType" value="" >
						    </div>
							<div class="row">
								<label for="article-contributor-keyword" class="col-sm-3 col-form-label">Keyword<span class="text-danger">*</span></label>
								<div class="col-sm-9">
									<div class="form-group">
										<input type="text" class="form-control keyword" id="article-contributor-keyword" name="ckeyword" placeholder="ex. Employee Scheduling">
										<div id="keyword_words_count_contributor" ></div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="article-contributor-category" class="col-sm-3 col-form-label">Category</label>
								<div class="col-sm-9">
									<select class="form-control" id="article-contributor-category" name="ccategory">
									<?php
									foreach ($categories as $key => $value) {?>
										<option value="<?php echo $key ?>"><?php echo $value ?></option>
									<?php
									
										}
									
									?>
										
									</select>
								</div>
							</div>
							<div class="row">
								<label for="contributortags" class="col-sm-3 col-form-label">Tags<span class="text-danger">*</span></label>
								<div class="col-sm-9">
									<div class="form-group">
										<input type="text" class="form-control" id="contributortags" name="ctags" placeholder="ex. Food Safety, Healthy Food, HACCP">
									</div>
								</div>
							</div>
	            </div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary add-contributor-article"><span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>Add</button>
			</div>
	            <!-- End Signin -->
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>