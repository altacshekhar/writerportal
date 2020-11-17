	<div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog" aria-labelledby="thankyouModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-lg modal-center-viewport" role="document">
			<div class="modal-content">
				<div class="modal-body d-flex justify-content-center">
				<div class="text-center mt-3 w-75">
				<img class="mb-2" src="<?php echo site_url('assets/images/icons/thank-you.svg');?>" height="150">
						<h3 class="h1 mb-2">Thank You !</h3>
						<p class="lead text-muted">Your article has been received. An editor will review your submission shortly.</p>
						<p class="lead text-muted">You will receive a notification to the email address you supplied when your article is published.</p>
					</div>
				</div>
				<div class="modal-footer modal-footer-borderless justify-content-center">
					<a class="btn btn-primary mt-1 mb-3" href="<?php echo site_url($this->session->flashdata('articleType')); ?>" >Submit Another Article</a>
					<a class="btn btn-danger mt-1 mb-3" href="javascript:void(0)" data-dismiss="modal">Continue</a>
				</div>
			</div>
		</div>
	</div>