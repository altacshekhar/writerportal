	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
						$attributes = array('class' => 'form-horizontal form-hub-secure login-form', 'id' => 'modal-login-form');
						echo form_open('user/login', $attributes);
						?>
						<!-- Signin -->
						<div id="signin" data-target-group="idForm">
							<!-- Title -->
							<header class="text-center mb-3">
								<h2 class="h4">Login</h2>
								<p>Login to manage your Articles.</p>
							</header>
							<!-- End Title -->

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
										data-msg="Please enter a valid email address."
										placeholder="Email">
								</div>
							</div>
							<!-- End Input -->
							<!-- Input -->
							<div class="form-group mb-0">
								<label for="login-email">Password</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<span class="fas fa-key fa-fw"></span>
										</span>
									</div>
									<input
										type="password"
										class="form-control"
										name="password"
										placeholder="Password"
										data-error-class="u-has-error"
										data-success-class="u-has-success"
										data-msg="Your password is invalid. Please try again.">
								</div>
							</div>
							<div class="clearfix">
								<a href="javascript:void(0);" class="forgot-password text-muted float-right" data-toggle="modal" data-target="#forgotPassword">
									<i class="fas fa-unlock-alt"></i>
									<span>Forgot password?</span>
								</a>
							</div>
                            <div class="clearfix">
								<button type="submit" class="btn btn-block btn-primary">Login</button>
							</div>
							<div class="clearfix text-center mt-1">
								<span class="text-muted">Don't have an account?</span>
								<a class="" href="javascript;" data-toggle="modal" data-target="#signupModal">Signup</a>
							</div>
						</div>
						<!-- End Signin -->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>