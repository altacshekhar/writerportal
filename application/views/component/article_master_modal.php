	<div class="modal fade" id="articleMasterModal" tabindex="-1" role="dialog" aria-labelledby="newArticleModalLabel"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog modal-center-viewport modal-dialog-centered modal-lg" role="document">
	        <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Article</h5>
			</div>
	             <div class="modal-body">
	                <?php
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlemaster-form');
						echo form_open('', $attributes);
						$categories = json_decode($article_categories);
						//pre($pillar_articles);
						?>
							<div class="form-group row">
								<label for="article-master-website" class="col-sm-3 col-form-label">Website</label>
								<div class="col-sm-9">
								<select class="form-control" id="article-master-website" name="website">
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
								<label for="article-master-iconpicker" class="col-sm-3 col-form-label">Article Icon</label>
								<div class="col-sm-9">
									<div class="form-group">
										<input class="form-control article-iconpicker" value="fas fa-paper-plane" type="text" name="article_icon" autocomplete="off">
										<small class="form-text text-muted">Use only free Font Awesome icons for the article icon field.</small>
										<input type="hidden" id="masterformType" name="formType" value="" >
									</div>
								</div>
							</div>
							<div class="row">
 								<legend class="col-form-label col-sm-3 pt-0">Site Structure</legend>
							  <div class="col-sm-9 article-modal-article-type">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="topicCluster" name="siteStructure" value="cluster" class="custom-control-input" data-show-class=".cluster-show" checked>
									<label class="custom-control-label" for="topicCluster">Topic Cluster</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="blog" name="siteStructure" value="blog" class="custom-control-input" data-show-class=".blog-show" >
									<label class="custom-control-label" for="blog">Blog</label>
								</div>
							  </div>
						    </div>
							<div class="row">
 								<legend class="col-form-label col-sm-3 pt-0">Article Type</legend>
							  <div class="col-sm-9 article-modal-type">
								<div class="article-modal-article-type cluster-show">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="pillarArticle" name="articleClusterType" value="pillar" class="custom-control-input"  data-show-class=".pillar-show" checked>
										<label class="custom-control-label" for="pillarArticle">Pillar Article</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="supportingArticle" name="articleClusterType" value="supporting" class="custom-control-input"  data-show-class=".supporting-show">
										<label class="custom-control-label" for="supportingArticle">Supporting Article</label>
									</div>
								</div>
								<div class="article-modal-article-type blog-show">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="blogArticle" name="articleBlogType" value="article" data-json-category='<?php echo $article_categories ?>' class="custom-control-input" checked>
										<label class="custom-control-label" for="blogArticle">Blog Article</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="recipeArticle" name="articleBlogType" value="recipe" data-json-category='<?php echo $recipe_categories ?>' class="custom-control-input">
										<label class="custom-control-label" for="recipeArticle">Recipe Article</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="pressRelease" name="articleBlogType" value="news" data-json-category='<?php echo $news_categories ?>' class="custom-control-input">
										<label class="custom-control-label" for="pressRelease">Press Release</label>
									</div>
								</div>
							  </div>
							</div>
							<div class="row">
								<label for="article-master-keyword" class="col-sm-3 col-form-label">Keyword<span class="text-danger">*</span></label>
								<div class="col-sm-9">
									<div class="form-group">
										<input type="text" class="form-control keyword" id="article-master-keyword" name="keyword" placeholder="ex. Employee Scheduling">
										<input type="hidden" class="form-control permalink" id="article-master-keyword-permalink" name="keyword_permalink">
										<small class="form-text text-muted"></small>
										<div id="keyword_response" ></div>
										<div id="keyword_words_count" ></div>
										
									</div>
								</div>
							</div>
							<div class="pillar-show">
							<div class=" row" >
								<label for="article-master-permalink" class="col-sm-3 col-form-label">Permalink<span class="text-danger">*</span>
								</label>
								<div class="col-sm-9">
								<div class="form-group">
									<input type="text" class="form-control permalink" id="article-master-permalink" name="permalink" placeholder="ex. employee-scheduling">
									<small class="form-text text-muted">A permalink should be unique for the selected website.</small>
									<div id="permalink_response" ></div>
								</div>
								</div>
							</div>
							</div>
							<div class="supporting-show">
							<div class="row">
								<label for="article-master-pillar" class="col-sm-3 col-form-label">Pillar Article</label>
								<div class="col-sm-9">
									<div class="form-group">
										<select class="form-control" id="article-master-pillar" name="article_master_pillar">
										<?php
										foreach ($pillar_articles as $pillararticle) { ?>

											<option value="<?php echo $pillararticle['article_permalink'] . '/' . trim($pillararticle['article_pillar_id']) ?>"><?php echo ucwords($pillararticle['keywords']) ?></option>
										<?php
										
											}
										?>
										</select>
									</div>
								</div>
							</div>
							</div>
							<div class="blog-show">
							<div class="form-group row">
								<label for="article-master-category" class="col-sm-3 col-form-label">Category</label>
								<div class="col-sm-9">
								<select class="form-control" id="article-master-category" name="category">
								<?php
								foreach ($categories as $key => $value) {?>
									<option value="<?php echo $key ?>"><?php echo $value ?></option>
								<?php
								
									}
								
								?>
									
								</select>
								</div>
							</div>
							</div>
							<div class="blog-show">
								<div class="row">
									<label for="tags" class="col-sm-3 col-form-label">Tags<span class="text-danger">*</span></label>
									<div class="col-sm-9">
										<div class="form-group">
											<input type="text" class="form-control" id="tags" name="tags" placeholder="ex. Food Safety, Healthy Food, HACCP">
										</div>
									</div>
								</div>
							</div>
							<div class="blog-show">
								<div class="form-group row">
									<label for="skyscraper " class="col-sm-3 col-form-label">Skyscraper</label>
									<div class="col-sm-9">
									<input class="" type="checkbox" id="skyscraper" name="skyscraper" value="true">
									</div>
								</div>
							</div>
						
	            </div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary add-master-article"><span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>Add</button>
			</div>
	            <!-- End Signin -->
	            <?php echo form_close(); ?>
	        </div>
	    </div>
	</div>
	</div>