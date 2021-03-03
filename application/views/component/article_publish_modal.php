<div id="article-publish-modal" class="article-publish-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="article_publishModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<?php
		$attributes = array('class' => 'form-horizontal form-validate form-validate', 'id' => 'publish-article-form');
		echo form_open('', $attributes);
		//pre($github_repo);
		?>
		<div class="modal-content be-loading p-1">
			<div class="modal-header">
				<h5 class="modal-title h3 mx-auto">Publish Article</h5>
			</div>
			<div class="modal-body">
			<?php if(!$article['site_id']){ ?>
				<div id="publish-article-error" class="mb-2" style="display:none"></div>
				<div class="form-group mb-2">
					<label class="h6">
						Select a website to publish the article.
					</label>
					<select id="article_published_website" name="article_published_website" class="form-control select-2" data-column="2">
						<option value=''>Select Website</option>
						<?php foreach ($github_repo as $repo) {?>
						<option value='<?php echo strtolower($repo['site_id']); ?>'  <?php if($repo['site_id'] == $article['site_id']) echo "selected"; ?>>
							<?php echo ucwords($repo['site_id']) ?>
						</option>
						<?php }?>
					</select>
				</div>
				<?php }else {?>
					<h6 class="modal-title  mx-auto mb-2">Article will be publish at <?php echo $article['site_id'] ?> .</h6>
					<input type="hidden" id="article_published_website" name="article_published_website" value="<?php echo $article['site_id'] ?>">

				<?php } ?>

				<div class="form-group mb-0">
					<div class="row">
						<div class="col-sm-5">
							<label class="h6">
							Commit Message
							</label>
						</div>
						<div class="col-sm-7 text-right small">
							Character Remaining:
							<span class="text-success font-weight-bold char-remain">70</span>
						</div>
					</div>
					<textarea id="article_commit_message"  name="article_commit_message" cols="50" rows="1" maxlength="70" placeholder="max 70 characters in length" class="form-control calc-length"></textarea>
					<small class="form-text text-muted">
						Add an optional extended description…
					</small>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="article_publish_id" value="<?php echo $article['article_id'];?>" class="image_attribution"  />
				<div class="row mx-auto">
					<div class="col-6">
						<button type="button" class="btn btn-success btn-block publish-article-github">
							<i class="fas fa-upload"></i>
							Publish
						</button>
					</div>
					<div class="col-6">
						<button type="button" class="btn btn-default btn-block" data-dismiss="modal">
							<i class="fas fa-times"></i>
							Cancel
						</button>
					</div>
				</div>
			</div>
			<div class="be-spinner">
				<svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://-www.w3.org/2000/svg">
					<circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
				</svg>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
