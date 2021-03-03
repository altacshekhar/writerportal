	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-center-viewport" role="document">
			<div class="modal-content">
				<div class="modal-header modal-header-borderless">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
						</span>
					</button>
				</div>
				<div class="modal-body pt-2 px-5 pb-4">
					<?php
						$attributes = array('class' => 'form-horizontal form-hub-secure', 'id' => 'signup-form');
						echo form_open('user/register', $attributes);
						?>
						<!-- Signin -->
						<div id="signin" data-target-group="idForm">
							<!-- Title -->
							<header class="text-center mb-3">
								<h2 class="h4">Submit My Article</h2>
								<p>Fill out the form to get started.</p>
							</header>
							<!-- End Title -->

							<!-- Input -->
							<div class="form-group mb-2">
								<label for="login-email">Full Name</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<span class="fas fa-users fa-fw"></span>
										</span>
									</div>
									<input
										type="text"
										class="form-control"
										name="name"
										placeholder="Full Name"
										data-error-class="u-has-error"
										data-success-class="u-has-success"
										placeholder="Email">
								</div>
							</div>
							<!-- End Input -->

							<!-- Input -->
							<div class="form-group mb-2">
								<label for="login-email">Email Address</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<span class="fas fa-envelope fa-fw"></span>
										</span>
									</div>
									<input
										type="email"
										class="form-control"
										name="email"
										data-error-class="u-has-error"
										data-success-class="u-has-success"
										placeholder="Email">
								</div>
							</div>
							<!-- End Input -->
							<div class="clearfix">
								<button type="submit" class="btn btn-block btn-primary">Submit</button>
							</div>
							<div class="text-black-50 small mt-2">
								By clicking "Submit", you agree to our
								<a href="javascript:void(0)">Terms of Use</a> and <a href="javascript:void(0)">Privacy Policy</a>. We’ll occasionally send you account related emails.
							</div>
						</div>
						<!-- End Signin -->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>