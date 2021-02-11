	<div class="modal fade" id="articleKeywordModal" tabindex="-1" role="dialog" aria-labelledby="articleKeywordModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-center-viewport modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add keyword</h5>
				</div>
				<div class="modal-body py-0">
					<?php
					$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'articlekeyword-form');
					echo form_open('', $attributes);
					$categories = json_decode($article_categories);
					//pre($pillar_articles);
					?>
					<div class="form-group">
						<label class="control-label" for="article-keyword-website">Select Website</label>
						<select class="custom-select select-2" id="article-keyword-website" name="website">
							<option value="">--Select website--</option>
							<?php foreach ($websites as $website) {
								if (array_key_exists('site_id', $website)) {
							?>
							<option value='<?php echo strtolower($website['site_id']); ?>'>
								<?php echo ucwords($website['site_id']) ?>
							</option>
							<?php
								}
							}?>
						</select>
						<small id="article-keyword-website" class="form-text text-muted"></small>
					</div>
					<div class="form-group">
						<label class="control-label text-muted small" for="article-keyword-phrase">Enter keyword phrase (2-4 words)</label>
						<input type="text" class="form-control keyword" id="article-keyword-phrase" name="keyword" placeholder="ex. Employee Scheduling">
					</div>
				</div>
				<div class="modal-footer pt-0">
					<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary add-keyword-phrase"><span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>Submit</button>
				</div>
				<!-- End Signin -->
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	</div>