<aside id="right-sidebar-content" class="hw-sidebar">
	<div class="hw-sidebar-container">
		<div class="justify-content-between align-items-center">
			<div class="d-flex justify-content-between align-items-center p-2">
				<h4 class="mb-0">My Account</h4>
				<button type="button" class="close ml-auto right-sidebar-toggler">
					<span aria-hidden="true">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
						</svg>
					</span>
				</button>
			</div>
			<header class="d-flex justify-content-start align-items-center user-nav-account-header p-2">
				<div class="list-inline-item align-middle mr-1">
					<?php $user_image_url = 'assets/images/profile/'.$user_id.'.jpg';?>
					<img class="user-nav-account-header-img" src="<?php echo get_user_image($user_image_url).'?id=' . time(); ?>" alt="<?php echo $current_user_full_name ?>">
				</div>
				<div class="list-inline-item align-middle">
					<h5 class="d-block">
						<?php echo $current_user_full_name ?>
					</h5>
					<span class="small d-block text-black-50">
						<?php echo $current_user_email; ?>
					</span>
				</div>
			</header>
		</div>
		<div class="hw-sidebar-body py-2 px-2" style="height: 479px;
    overflow-y: scroll;">
			<div class="list-group">
				<?php if($user_type == 1 || $user_type == 3 || $user_type == 6){ ?>
				<a href="#<?php //echo site_url('/secure/dashboard') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
					<span class="fas fa-home hw-sidebar-account-list-icon"></span>
					Dashboard
				</a>
				<?php } ?>
				<a href="<?php echo site_url('secure/user/edit/'.$user_id) ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
					<span class="fas fa-user-circle hw-sidebar-account-list-icon"></span>
					Edit Profile
				</a>
				<?php if($user_type >= 0 && $user_type != 5 && $user_type != 6){ ?>
				<a href="<?php echo site_url('/secure/content') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
					<span class="fas fa-file-alt hw-sidebar-account-list-icon"></span>
					Content
				</a>
				<?php } ?>
				<?php if($user_type >= 0){ ?>
				<a href="<?php echo site_url('/secure/linkbuilding') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
					<span class="fas fa-link hw-sidebar-account-list-icon"></span>
					Link Building
				</a>
				<?php } ?>
				<?php if($user_type == 0 || $user_type == 1 || $user_type == 3 || $user_type == 4){ ?>
				<a href="javascript:void(0);" class="list-group-item list-group-item-action hw-sidebar-list-group-item <?php echo ($user_type) ? 'article-master-add' : 'article-contributor-add' ?>">
					<span class="fas fa-plus hw-sidebar-account-list-icon"></span>
					Add Article
				</a>
				<?php } ?>
			</div>
			<hr class="my-1">
			<div class="list-group">
					<?php if($is_admin){ ?>
					<a href="<?php echo site_url('/secure/user') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-users hw-sidebar-account-list-icon"></span>
						Manage Users
					</a>
					<a href="<?php echo site_url('/secure/publishers') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-users hw-sidebar-account-list-icon"></span>
						Manage Publishers
					</a>
					<a href="<?php echo site_url('/secure/category') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-bars hw-sidebar-account-list-icon"></span>
						Manage Category
					</a>
					<a href="<?php echo site_url('/secure/niche') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-bars hw-sidebar-account-list-icon"></span>
						Manage Niche
					</a>
					<a href="<?php echo site_url('/secure/linktype') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-bars hw-sidebar-account-list-icon"></span>
						Manage Type
					</a>
					<a href="<?php echo site_url('secure/github') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fab fa-github hw-sidebar-account-list-icon"></span>
						Website Settings
					</a>
					<a href="<?php echo site_url('secure/channelsui') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item hide">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Promotion UI
					</a>
					<a href="<?php echo site_url('secure/hootsuitechannels') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Promotion Channels
					</a>
					<a href="<?php echo site_url('secure/metatags') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-tag hw-sidebar-account-list-icon"></span>
						Meta Tags
					</a>
					<a href="<?php echo site_url('secure/emailconfig') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-envelope hw-sidebar-account-list-icon"></span>
						Mail Send Settings
					</a>
					<a href="https://webhook.hubworks.com/s-log-list.php" target="_blank" class="list-group-item list-group-item-action hw-sidebar-list-group-item">
						<span class="fas fa-cog hw-sidebar-account-list-icon"></span>
						Rake Process Status
					</a>
					<?php } ?>
					<a href="<?php echo site_url('user/logout') ?>" class="list-group-item list-group-item-action hw-sidebar-list-group-item font-weight-bold text-danger">
						<span class="fas fa-power-off hw-sidebar-account-list-icon text-danger"></span>
						Logout
					</a>
				</div>
		</div>
	</div>
</aside>
