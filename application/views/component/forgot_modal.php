<div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-center-viewport" role="document">
		<div class="modal-content be-loading p-1">
			<div class="modal-header modal-header-borderless">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
				</button>
			</div>
			<div class="modal-body pt-2 px-5 pb-4">
				<?php
				$attributes = array('class' => 'form-horizontal form-hub-secure form-validate', 'id' => 'forgot-form');
				echo form_open('user/forgot', $attributes);
				?>
					<!-- Signin -->
					<div id="signin" data-target-group="idForm">
						<!-- Title -->
						<header class="mb-2">
							<h2 class="h3 text-center mb-1">Forgot Password?</h2>
							<p>
								Please enter the email you created your account with,
								and if there is a match we'll email your password to you.
							</p>
						</header>
						<!-- End Title -->
						<div id="forget_form_error" class="form_error small"></div>
						<!-- Input -->
						<div class="form-group mb-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span class="fas fa-envelope fa-fw"></span>
									</span>
								</div>
								<input type="email"
									class="form-control"
									name="email"
									data-error-class="u-has-error"
									data-success-class="u-has-success"
									placeholder="Enter your email address"
									data-msg="Please enter a valid email address.">
							</div>
						</div>
						<!-- End Input -->
						<div class="clearfix">
							<button type="submit" class="btn btn-block btn-primary">Get new password</button>
						</div>
						<div class="mt-2 mb-0 text-muted alert alert-light">
							<p class="mb-0">Spam Filter Note</p>
							<div class="small">
								If you don't get an email from us within a few minutes please check your spam filter. The email will be
								coming from <strong>donotreply@hubworks.com</strong>
							</div>
						</div>
					</div>
					<!-- End Signin -->
				<?php echo form_close(); ?>
			</div>
			<div class="be-spinner">
				<svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://-www.w3.org/2000/svg">
					<circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
				</svg>
			</div>
		</div>
	</div>
</div>