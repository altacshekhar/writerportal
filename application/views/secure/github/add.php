<div class="clearfix position-relative py-5">
	<div class="container">
		<div class="view-account">
			<div id="profile-main" class="view-account-side-bar hidden-xs">
				<div class="profile-pic">
					<div class="p-relative upload-image-preview p-2">
					<svg class="w-100" class="octicon octicon-mark-github" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
					</div>
				</div>
			</div>
			<div id="profile-tab" class="content-panel py-2 px-3">
				<div class="clearfix">
					<h3 class="h4">
						<i class="fab fa-github icon-left"></i>
						<?php
						if(isset($github_row['id'])) {
							echo 'Edit Website Default Setting';
						} else {
						echo 'Create New Website Default Setting';
						};
						?>

					</h3>
					<p class="text-muted">A repository contains all the files for project, including the revision history.</p>
					<hr class=" mb-2">
				</div>
				<?php
				//pre( $github_row);
				$attributes = array('class' => 'form-horizontal form-validate form-validate', 'id' => 'git-repository-form');
				echo form_open_multipart('', $attributes);
				?>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="site_id">
						Site Name
					</label>
					<div class="col-sm-6">
						<?php
						$data_site_id = array(
							'id' => 'site_id',
							'name' => 'site_id',
							'value' => set_value('site_id', $github_row['site_id']),
							'placeholder' => 'Website domain, ex. hubworks.com',
							'class' => 'form-control'
						);
						echo form_input($data_site_id);
						?>
						<small class="form-text text-muted">
							Website domain, ex. hubworks.com
						</small>
						<?php echo form_error('site_id');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="github_repo">
						Github Repository URL
					</label>
					<div class="col-sm-6">
						<?php
						$data_github_repo = array(
							'id' => 'github_repo',
							'name' => 'github_repo',
							'value' => set_value('github_repo', $github_row['github_repo']),
							'placeholder' => 'https://github.com/Altametrics/hubworks-staging',
							'class' => 'form-control'
						);
						echo form_input($data_github_repo);
						?>
						<?php echo form_error('github_repo');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="github_client_id">
					Github Client Id <span class="small text-muted"></span>
					</label>
					<div class="col-sm-6">
						<?php
						$github_client_id = array(
							'id' => 'github_client_id',
							'name' => 'github_client_id',
							'value' => set_value('github_client_id', $github_row['github_client_id']),
							'placeholder' => 'Github Client Id, ex. hubworks',
							'class' => 'form-control'
						);
						echo form_input($github_client_id);
						?>
						<?php echo form_error('github_client_id');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="github_api_key">
						Github API Key
					</label>
					<div class="col-sm-6">
						<?php
						$github_api_key = array(
							'id' => 'github_api_key',
							'name' => 'github_api_key',
							'value' => '',//set_value('github_api_key', $github_row['github_api_key']),
							'placeholder' => 'API key, ex. 5669486798491e36686097474csn46c19568679d',
							'class' => 'form-control'
						);
						echo form_input($github_api_key);
						?>
						<small class="form-text text-muted">
						The API key for Github integration
						</small>
						<?php echo form_error('github_api_key');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="github_article_path">
						Github article path
					</label>
					<div class="col-sm-6">
						<?php
						$data_github_article_path = array(
							'id' => 'github_article_path',
							'name' => 'github_article_path',
							'value' => set_value('github_article_path', $github_row['github_article_path']),
							'placeholder' => '_article',
							'class' => 'form-control'
						);
						echo form_input($data_github_article_path);
						?>
						<small class="form-text text-muted">
							The path to the article folder
						</small>
						<?php echo form_error('github_article_path');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="github_article_image_path">
						Github article image path
					</label>
					<div class="col-sm-6">
						<?php
						$data_github_article__image_path = array(
							'id' => 'github_article_image_path',
							'name' => 'github_article_image_path',
							'value' => set_value('github_article_image_path', $github_row['github_article_image_path']),
							'placeholder' => '_images',
							'class' => 'form-control'
						);
						echo form_input($data_github_article__image_path);
						?>
						<small class="form-text text-muted">
							The path to the article image folder
						</small>
						<?php echo form_error('github_article_path');?>
					</div>
				</div>
				<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="default_meta_product">
							Default Meta Product
						</label>
						<div class="col-sm-6">
						<?php
						$default_meta_product = array(
								'id' => 'default_meta_product',
								'name' => 'default_meta_product',
								'value' => set_value('default_meta_product', $github_row['default_meta_product']),
								'placeholder' => 'Default Meta Product (ex. Zip Schedules)',
								'class' => 'form-control'
							);
							echo form_input($default_meta_product);
							
							?>
							<small class="form-text text-muted">
								Enter the default meta product for meta tags
							</small>
							<?php echo form_error('default_meta_product'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="available_blog_categories">
							Available Blog Categories 
						</label>
						<div class="col-sm-6">
						<?php
						$available_blog_categories = array(
								'id' => 'available_blog_categories',
								'name' => 'available_blog_categories',
								'value' => set_value('available_blog_categories', $github_row['available_blog_categories']),
								'placeholder' => 'Available Blog Categories (ex. Business Management, Human Resources, Operations, Quality and Safety, Scheduling, Reporting, News)',
								'rows' => 4,
								'cols' => 50,
								'class' => 'form-control'
							);
							echo form_textarea($available_blog_categories);
							
							?>
							<small class="form-text text-muted">
								Enter the available blog categories for meta tags
							</small>
							<?php echo form_error('available_blog_categories'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 col-sm-6 h6 col-form-label" for="rakefile">
						Rakefile Content 
						</label>
						<div class="col-sm-6">
						<?php
						$rakefile = array(
								'id' => 'rakefile',
								'name' => 'rakefile',
								'value' => set_value('rakefile', $github_row['rakefile'], $html_escape=FALSE),
								'placeholder' => 'Rakefile content',
								'rows' => 6,
								'cols' => 50,
								'class' => 'form-control'
							);
							echo form_textarea($rakefile);
							
							?>
							<small class="form-text text-muted">
								Enter the updated rakefile content for publishing website
							</small>
							<?php echo form_error('rakefile'); ?>
						</div>
					</div>
				<div class="form-group row mt-3">
					<div class="col-md-8 col-sm-9 col-xs-12 offset-md-4 offset-sm-3">
						<button type="submit" name="submitForm" value="" class="btn btn-primary " data-disable-with="Loading..." autocomplete="off">
							<i class="fas fa-check"></i>
							<?php if(isset($github_row['id'])) {
								echo 'Update Default Settings';
								} else {
									echo 'Save Default Settings';
								};?>
						</button>
						<a href="<?php echo site_url('/secure/github') ?>" class="btn ml-1 btn-default">
							Cancel
						</a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>