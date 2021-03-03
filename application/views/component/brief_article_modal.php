<!-- Article Brief  Model for Edit Values in Content Brief -->
<div class="modal fade" id="articleBriefCtaModal" tabindex="-1" role="dialog" aria-labelledby="articleBriefCtaModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Article Brief CTA</h5>
			</div>
			<?php 
			$attributes = array('class' => 'articlebrief-cta-form', 'id' => 'articlebrief-cta-form');
			echo form_open('', $attributes);
			?>
			<div class="modal-body">
			</div>
			<?php 
			echo form_close();
			?>
			<div class="modal-footer">
				<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="button" name="submitForm" value="" class="btn btn-primary btn-sm save-cta-config" data-disable-with="Loading..." autocomplete="off">
					<i class="fas fa-save"></i>
					Save Brief CTA
				</button>
			</div>
		</div>
	</div>
</div>