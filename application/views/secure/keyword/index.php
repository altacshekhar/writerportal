<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_image_url = 'assets/images/profile/'.$user_id.'.jpg';

$statue_selects  = "<option value=''>Select Status (all)</option>";
$statue_selects .= "<option value='1'>Analyzing</option>";
$statue_selects .= "<option value='2'>Keyword analysis completed</option>";
$statue_selects .= "<option value='3'>Brief submitted</option>";
?>
<div id="wrapper" class="clearfix position-relative">

	<div class="left-side-menu ">
		<div class="user">
                <img src="<?php echo get_user_image($user_image_url).'?id=' . time(); ?>" alt="<?php echo $current_user_full_name ?>" title="<?php echo $current_user_full_name ?>" class="user__img">
			<div>
				<div class="user__name" title="<?php echo $current_user_full_name ?>">
					<?php echo $current_user_full_name ?>
				</div>
				<div class="user__email" title="<?php echo $current_user_email; ?>">
					<?php echo $current_user_email; ?>
				</div>
			</div>
        </div>
		<div class="hw-sidebar-body">

				<div class="list-group">
					<a href="<?php echo site_url('/secure/articleslist') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-home hw-sidebar-account-list-icon"></span>
						Content 
					</a>
					<a href="<?php echo site_url('secure/user/edit/'.$user_id) ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-user-circle hw-sidebar-account-list-icon"></span>
						Edit Profile
					</a>
					<a href="javascript:void(0);" class="list-group-item list-group-item-action <?php echo ($user_type) ? 'article-master-add' : 'article-contributor-add' ?>">
						<span class="fas fa-plus hw-sidebar-account-list-icon"></span>
						Add Article
					</a>
				</div>
				<hr class="my-1">
				<div class="list-group">
					<?php if($is_admin){ ?>
					<a href="<?php echo site_url('/secure/user') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-users hw-sidebar-account-list-icon"></span>
						Manage Users
					</a>
					<a href="<?php echo site_url('/secure/publishers') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-users hw-sidebar-account-list-icon"></span>
						Manage Publishers
					</a>
					<a href="<?php echo site_url('/secure/category') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-bars hw-sidebar-account-list-icon"></span>
						Manage Category
					</a>
					<a href="<?php echo site_url('secure/github') ?>" class="list-group-item list-group-item-action">
						<span class="fab fa-github hw-sidebar-account-list-icon"></span>
						Website Settings
					</a>
					<a href="<?php echo site_url('secure/channelsui') ?>" class="list-group-item list-group-item-action hide">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Promotion UI
					</a>
					<a href="<?php echo site_url('secure/hootsuitechannels') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Promotion Channels
					</a>
					<a href="<?php echo site_url('secure/metatags') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-tag hw-sidebar-account-list-icon"></span>
						Meta Tags
					</a>
					<a href="<?php echo site_url('secure/emailconfig') ?>" class="list-group-item list-group-item-action">
						<span class="fas fa-envelope hw-sidebar-account-list-icon"></span>
						Mail Send Settings
					</a>
					<a href="https://webhook.hubworks.com/s-log-list.php" target="_blank" class="list-group-item list-group-item-action">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Rake Process Status
					</a>
					<?php } ?>
					<a href="<?php echo site_url('user/logout') ?>" class="list-group-item list-group-item-action font-weight-bold text-danger">
						<span class="fas fa-power-off hw-sidebar-account-list-icon text-danger"></span>
						Logout
					</a>
				</div>
			</div>
	    </div>
	<div class="content-page">
		<div class="content">
			<header class="content__title d-flex justify-content-between">
				<h1 class="mb-0">
					Content Briefs 
				</h1>
				<div class="toolbar-action">
					<div class="btn-group">
						<a href="javascript:void(0);" class="btn btn-white article-keyword-add">
							<span class="fas fa-plus"></span>
							Add Content Brief
						</a>
					</div>
				</div>
			</header>
			<div class="content__inner">
				<div class="highlight">
					<div class="keyword-search-filters">
						<div class="row form-row">
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label" for="website_select">Website</label>
									<select id="website_select" class="form-control select-2" data-column="0">
										<option value=''>Select Website (all)</option>
										<?php foreach ($github_repo as $repo) {?>
										<option value='<?php echo $repo['site_id'] ?>'><?php echo ucwords($repo['site_id']) ?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label" for="statue_select">Status</label>
									<select id="statue_select" class="form-control select-2" data-column="1">
										<?php echo $statue_selects; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
							</div>	
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label" for="datatableKeywordSearch">.</label>
									<span class="form-icon-wrapper has-clear">
										<span class="form-icon form-icon-right close form-control-clear d-none">
											<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
										</span>
										<input type="text" id="datatableKeywordSearch" class="form-control form-icon-input-right" placeholder="Search Keywords  OR Websites" aria-label="Search Keywords OR Websites">
									</span>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive mb-2">
					<table id="keyword_list_table" class="table table-striped table-bordered table-hover">
						<thead></thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
