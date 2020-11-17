<div id="article-assign-modal" class="article-assign-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="article_assignModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<?php
		$attributes = array('class' => 'form-horizontal form-validate form-validate', 'id' => 'assign_article_form');
		echo form_open('', $attributes);
		//pre($github_repo);
		?>
		<div class="modal-content be-loading p-1">
			<div class="modal-header">
				<h5 class="modal-title h3 mx-auto">Assign Article</h5>
			</div>
			<div class="modal-body">
			<div id="brief-article-error" class="mb-2" style="display:none"></div>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label">Writer</label>
				<div class="col-sm-10">
				<?php
					$js = 'id="brief_article_writer"  class="form-control" required="required"';
					echo form_dropdown("brief_article_writer", $writers, '', $js);
					echo form_error("brief_article_writer");
				?>
				</div>
			</div>
			<div class="form-group row">
				<label for="brief_article_length" class="col-sm-2 col-form-label">Length </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="brief_article_length" id="brief_article_length" placeholder="Article Length">
					<input type="hidden"  name="brief_writer_id" id="brief_writer_id">
					<input type="hidden"  name="brief_campaign_id" id="brief_campaign_id">
					<input type="hidden"  name="brief_publisher_id" id="brief_publisher_id">
				</div>
			</div>
			<div class="form-group row">
				<label for="brief_article_cost" class="col-sm-2 col-form-label">Cost </label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="brief_article_cost" id="brief_article_cost" placeholder="Article Cost">
				</div>
			</div>
			<div class="form-group row">
				<label for="brief_article_note" class="col-sm-2 col-form-label">Note</label>
				<div class="col-sm-10">
					<textarea id="brief_article_note"  name="brief_article_note" cols="50" rows="3" maxlength="70" placeholder="Note text here..." class="form-control"></textarea>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				
				<div class="row mx-auto">
					<div class="col-6">
						<button type="submit" class="btn btn-success btn-block">
							<i class="fas fa-save"></i>
							Save
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
