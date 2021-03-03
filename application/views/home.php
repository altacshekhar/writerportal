<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section class="d-flex jumbotron-hero-home-page">
	<div class="container d-flex flex-column" style="min-height: 40vh;">
		<div class="row mt-auto">
			<div class="col-lg-7 col-md-7">
				<h1 class="display-3 text-white">Write an Article</h1>
				<p class="h2 mb-2 text-white">Become an official Contributing Writer! </p>
				<p class="lead mb-0 text-white">
					Submit your article and get featured on our website.
				</p>
				<p class="lead mb-3 text-white">Full credit is, given to you for all your hard work. If your post is accepted.</p>
				<a class="btn btn-outline-white btn-lg go-to" href="#features">
					Get Started
					<span class="fas fa-long-arrow-alt-right ml-1"></span>
              	</a>
			</div>
		</div>
	</div>
</section>
<div id="features" class="pt-5 pb-3 features">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 d-md-flex">
				<div class="card py-1">
					<div class="card-body d-flex flex-row ">
						<div class="rounded-avatar bg-danger mr-2 flex-shrink-0">
							<img src="<?php echo site_url('assets/images/icons/icon-1.svg'); ?>" class="avatar w-100">
						</div>
						<div>
							<a href="<?php echo site_url('/article') ?>">
								<h4>I want to submit an Article</h4>
							</a>
							<p class="mb0">
								To submit an article please <a href="<?php echo site_url('/article') ?>">fill out our article submission form</a>.
							</p>
							<a href="javascript:void(0);" class="article-contributor-add">
								Get Started
								<span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-6 d-md-flex">
				<div class="card py-1">
					<div class="card-body d-flex flex-row">
						<div class="rounded-avatar bg-dark mr-2 flex-shrink-0">
							<img src="<?php echo site_url('assets/images/icons/icon-4.svg'); ?>" class="avatar w-100">
						</div>
						<div>
							<a href="https://hubworks.com/contact-us.html" target="_blank">
								<h4>I have other writing I want to share</h4>
							</a>
							<p class="mb0">
								Please contact us and we can discuss the best way to publish your writing.
							</p>
							<div class="clearfix">
								<a href="https://hubworks.com/contact-us.html" target="_blank">
									Contact Us
									<span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="login-form-container" class="card rounded-0 mb-0">
	<div class="card-body p-md-5">
		<div class="mb-md-3 mt-md-1">
			<div class="w-75 text-center mx-auto mb-3">
				<div class="rounded-avatar bg-primary mb-1 flex-shrink-0 mx-auto">
					<img src="<?php echo site_url('assets/images/icons/icon-4.svg'); ?>" class="avatar w-100">
				</div>
				<h2 class="h1"><span class="font-weight-medium">I am already a contributing Writer</span></h2>
				<p>I want to submit a new article or manage one already submitted.</p>
			</div>
			<div class="mx-auto" style="max-width: 960px;">
				<!-- Login Form -->
				<?php if (!$is_user_logged_in) {
				$attributes = array('class' => 'form-horizontal form-hub-secure login-form', 'id' => 'login-form');
				echo form_open('user/login', $attributes);?>
				<div class="row justify-content-md-center">
					<div class="col-lg-5 mb-2 mb-lg-0">
						<!-- Input -->
						<div class="form-group mb-0">
							<label class="h6 small d-block text-uppercase" for="email">Email address</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span class="fas fa-envelope fa-fw"></span>
									</span>
								</div>
								<input type="email" class="form-control" name="email" data-error-class="u-has-error" data-success-class="u-has-success"
								data-msg="Please enter a valid email address." placeholder="Email">
							</div>
						</div>
						<!-- End Input -->
					</div>

					<div class="col-lg-5 mb-2 mb-lg-0">
						<!-- Input -->
						<div class="form-group mb-0 position-relative">
							<label class="h6 small d-block text-uppercase">Password</label>
							<a href="javascript:void(0);" class="forgot-password text-muted position-absolute" data-toggle="modal"
							data-target="#forgotPassword" style="right: .2rem;top: -.67rem;">
								<i class="fas fa-unlock-alt"></i>
								<span>Forgot password?</span>
							</a>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<span class="fas fa-key fa-fw"></span>
									</span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="Password" data-error-class="u-has-error"
								data-success-class="u-has-success" data-msg="Your password is invalid. Please try again.">
							</div>
						</div>
						<!-- End Input -->
					</div>
					<div class="col-lg-2">
					<label class="h6 small d-none d-md-block">&nbsp;</label>
						<button type="submit" class="btn btn-block btn-primary">Login</button>
					</div>
				</div>
				<div id="alert-login-error" class="alert-login-error alert alert-danger mt-2 mb-0" style="display:none">
					We couldn’t find an account matching the email and password you entered. Please check your email and password
					and try again.
				</div>
				<?php
				echo form_close();
				}?>
				<!-- End Login Form -->
				<?php if ($is_user_logged_in) {?>
					<div class="text-center">
						<a class="btn btn-primary" href="<?php  echo site_url('/secure/articleslist') ?>">
							Manage Articles
							<i class="fas fa-long-arrow-alt-right button-icon-right"></i>
						</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>
