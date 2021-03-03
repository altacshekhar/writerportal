<div class="clearfix position-relative py-4">
	<div class="container">
		<div class="view-account">
			<div id="profile-main" class="view-account-side-bar hidden-xs">
				<div class="profile-pic">
					<div class="p-relative upload-image-preview">
						<img class="w-100" src="<?php echo (base_url() . ($user['user_image'] ? $user['user_image'] : 'assets/images/icons/nobody.jpg')) .'?id=' . time(); ?>">
					</div>
					<label class="d-block bg-info p-2 text-white text-center" for="user_image">
						<i class="fas fa-camera fa-lg mb-1"></i>
						<h2 class="h4 text-white m-0">Upload Profile Picture</h2>
					</label>
				</div>
				<?php
					echo ($user_image_error) ? '<div id="user_image_error small" class="alert alert-danger">' . $user_image_error . '</div>' : '';
					echo form_error('user_image','<div id="user_image_error small" class="alert alert-danger">', '</div>');
				?>
			</div>
			<div id="profile-tab" class="content-panel py-2 px-3">
				<div class="clearfix">
					<h3 class="h4">
						<i class="fas fa-user icon-left"></i>
						Personal Info
					</h3>
					<p class="text-muted">Add some detail to your profile to personalise it and let others know who you are</p>
					<hr class=" mb-2">
				</div>
				<?php
				$attributes = array('class' => 'form-horizontal form-validate', 'id' => 'add-user-form');
				echo form_open_multipart('', $attributes);
				?>
				<?php
				//pre($user['user_image']);
				$data_user_image = array(
					'id'=>"user_image",
					'name' => 'user_image',
					'value' => set_value('user_image', $user['user_image']),
					'class' => 'd-none manual-file-chooser d-none'
				);
				echo form_upload($data_user_image);
				?>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Full Name<span class="text-danger">*</span></label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-md-6">
								<?php
								$data_user_fname = array(
									'name' => 'user_fname',
									'value' => set_value('user_fname', $user['user_fname']),
									'placeholder' => 'First Name',
									'class' => 'form-control'
								);
								echo form_input($data_user_fname);
								echo form_error('user_fname');
								?>
							</div>
							<div class="col-md-6">
								<?php
								$data_user_lname = array(
									'name' => 'user_lname',
									'value' => set_value('user_lname', $user['user_lname']),
									'placeholder' => 'Last Name',
									'class' => 'form-control'
								);
								echo form_input($data_user_lname);
								echo form_error('user_lname');
								?>
							</div>
						</div>
						<small class="form-text text-muted">
							This will displayed on public profile, notifications and other places.
						</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Email address<span class="text-danger">*</span></label>
					<div class="col-sm-6">
						<?php
						$data_user_email = array(
							'type'=> 'email',
							'name' => 'user_email',
							'value' => set_value('user_email', $user['user_email']),
							'placeholder' => 'Email',
							'class' => 'form-control'
						);
						echo form_input($data_user_email);
						?>
						<small class="form-text text-muted">
							Used to log in to account
						</small>
						<?php echo form_error('user_email');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Phone<span class="text-danger">*</span></label>
					<div class="col-sm-6">
						<?php
					$data_user_phone = array(
						'name' => 'user_phone',
						'value' => set_value('user_phone', $user['user_phone']),
						'placeholder' => 'Phone',
						'class' => 'form-control'
					);
					echo form_input($data_user_phone);
					echo form_error('user_phone');
					?>
					</div>
				</div>
				<div class="form-group row">
					<?php if($is_admin){ ?>
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Role</label>
					<div class="col-sm-6">
						<?php
						$user_type = array(
							''  => 'Contributing Writer',
							'1' => 'Administrator',
							'3' => 'Content Coordinator',
							'4' => 'Staff Writer',
							'5' => 'Link Prospector',
							'6' => 'Outreach Coordinator',
						);
						echo form_dropdown('user_type', $user_type, $user["user_type"], 'class="custom-select"' );
						echo form_error('user_type');
						?>
					</div>
					<?php } ?>
				</div>
				<div class="clearfix mt-3">
					<h3 class="h4">
						<i class="fab fa-stack-exchange icon-left"></i>
						About Yourself
					</h3>
					<p class="text-muted">Add some detail to your profile to personalise it and let others know who you are</p>
					<hr class=" mb-2">
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Biographical Info</label>
					<div class="col-sm-7">
						<?php
						$data_user_phone_boinfo = array(
							'name' => 'user_bo_info',
							'rows' => 4,
							'cols' => 50,
							'value' => set_value('user_bo_info', $user['user_bo_info']),
							'class' => 'form-control'
						);
						echo form_textarea($data_user_phone_boinfo);
						echo form_error('user_bo_info');
						?>
						<small class="form-text text-muted">
							Share a little biographical information to fill out your profile. This may be shown publicly.
						</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Meta Author URL</label>
					<div class="col-sm-7">
						<?php
						$data_meta_author_url = array(
							'name' => 'meta_author_url',
							'rows' => 4,
							'cols' => 50,
							'value' => set_value('meta_author_url', $user['meta_author_url']),
							'placeholder' => 'https://your-domain.com/author-page.html',
							'class' => 'form-control'
						);
						echo form_input($data_meta_author_url);
						echo form_error('meta_author_url');
						?>
						<small class="form-text text-muted">
							Enter the URL of your author page.
						</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Facebook Url</label>
					<div class="col-sm-7">
						<?php
						$data_meta_author_facebook_url = array(
							'name' => 'meta_author_facebook_url',
							'rows' => 4,
							'cols' => 50,
							'value' => set_value('meta_author_facebook_url', $user['meta_author_facebook_url']),
							'placeholder' => 'https://facebook.com/profile.php?id=#############',
							'class' => 'form-control'
						);
						echo form_input($data_meta_author_facebook_url);
						echo form_error('user_bo_info');
						?>
						<small class="form-text text-muted">
							Enter the URL of your facebook profile.
						</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Twitter Url</label>
					<div class="col-sm-7">
						<?php
						$data_meta_author_twitter_url = array(
							'name' => 'meta_author_twitter_url',
							'rows' => 4,
							'cols' => 50,
							'value' => set_value('meta_author_twitter_url', $user['meta_author_twitter_url']),
							'placeholder' => '@YourTwitterHandle',
							'class' => 'form-control'
						);
						echo form_input($data_meta_author_twitter_url);
						echo form_error('user_bo_info');
						?>
						<small class="form-text text-muted">
						Enter the URL of your twitter account.
						</small>
					</div>
				</div>
				<div class="clearfix mt-3">
					<h3 class="h4 mb-0">
						<i class="fas fa-key icon-left"></i>
						Security
					</h3>
					<hr class=" mb-2">
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Password</label>
					<div class="col-sm-6">
						<?php
						$data_user_password = array(
							'type' => 'password',
							'name' => 'user_password',
							'value' => '',
							'placeholder' => 'New Password',
							'class' => 'form-control',
							'id' => 'user_password'
						);
						echo form_input($data_user_password);
						echo form_error('user_password');
						?>
						<small class="form-text text-muted">
							If you would like to change the password type a new one. Otherwise leave this blank.
						</small>
					</div>
				</div>
				<div class="form-group row mb-5">
					<label class="col-md-4 col-sm-6 h6 text-uppercase col-form-label text-right">Confirm Password</label>
					<div class="col-sm-6">
						<?php
						$data_password_confirm = array(
							'type' => 'password',
							'name' => 'password_confirm',
							'value' => '',
							'placeholder' => 'Confirm  Password',
							'class' => 'form-control',
							'id' => 'password_confirm'
						);
						echo form_input($data_password_confirm);
						echo form_error('data_password_confirm');
						?>
						<small class="form-text text-muted">
							Type your confirm password again.
						</small>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-8 col-sm-9 col-xs-12 offset-md-4 offset-sm-3">
						<button type="submit" name="submitForm" value="" class="btn btn-primary ">
							<i class="fas fa-check"></i>
							<?php if(isset($user['user_id'])) {
								echo 'Update Profile';
								} else {
									echo 'Add New User';
								};?>
						</button>
						<?php
						if($is_admin){
							$redirect_path = 'secure/user';
						}else{
							$redirect_path = 'secure/articleslist';
						}
						?>
						<a href="<?php echo site_url($redirect_path) ?>" class="btn ml-1 btn-default">
							Cancel
						</a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
