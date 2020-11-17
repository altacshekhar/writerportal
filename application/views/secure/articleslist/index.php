<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_image_url = 'assets/images/profile/'.$user_id.'.jpg';

$article_types  = "<option value=''>Select Type (all)</option>";
$article_types .= "<option value='Article'>Article</option>";
$article_types .= "<option value='News'>News</option>";
$article_types .= "<option value='Recipe'>Recipe</option>";
$article_types .= "<option value='Pillar'>Pillar</option>";
$article_types .= "<option value='Supporting'>Supporting</option>";

$statue_selects  = "<option value=''>Select Status (all)</option>";
//$statue_selects .= "<option value='Skyscraper'>Skyscraper</option>";
$statue_selects .= "<option value='Submitted'>Submitted</option>";
$statue_selects .= "<option value='Pending'>Pending</option>";
$statue_selects .= "<option value='Published'>Published</option>";
$statue_selects .= "<option value='Deleted'>Deleted</option>";
$statue_selects .= "<option value='Draft'>Draft</option>";
?>
<style>
	#wrapper{
		width: 100%;
		max-width: 1400px;
		min-width: 320px;
		margin: 0 auto;
		padding-right: 2rem;
    	padding-left: 2rem;
	}
	#wrapper .left-side-menu {
		width: 280px;
		z-index: 999;
		bottom: 0;
		position: fixed;
		top: 62px;
		left: 0;
		display: none;
		background-color: #fff
	}
	#wrapper .content-page {
		margin-top: 2rem;
		overflow: hidden;
		min-height: 80vh;
	}
	.user {
		background-color: rgba(222, 226, 230, .4);
		position: relative;
		cursor: default;
		padding: 1.25rem;
		text-align: center;
		border:1px solid #e4e7ed;
	}
	.user__img {
		width: 4rem;
		height: 4rem;
		border-radius: 50%;
		margin-bottom:1rem;
	}
	.user__name {
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
		font-size: 1.14rem;
	}
	.user__email {
		font-size: .8462rem;
		color: #999;
		margin-top: .1rem;
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}

	.content__title {
    	margin-bottom: 1rem;
	}

	.hw-sidebar-body {
		background-color: #FFFFFF;
		border: 1px solid #e4e7ed;
		border-top:0;
		padding: 0.75rem 0;
	}

	.hw-sidebar-body .list-group-item{
		border:0
	}

</style>
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
					Manage Articles
				</h1>
				<div class="toolbar-action">
					<div class="btn-group">
						<a href="javascript:void(0);" class="btn btn-white <?php echo ($user_type) ? 'article-master-add' : 'article-contributor-add' ?>">
							<span class="fas fa-plus"></span>
							Add Article
						</a>
					</div>
				</div>
			</header>
			<div class="content__inner">
				<div class="highlight">
					<div class="search-filters">
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
							<div class="col-sm-2">
								<div class="form-group">
									<label class="control-label" for="article_types_select">Article Types</label>
									<select id="article_types_select" class="form-control select-2" data-column="2">
										<?php echo $article_types; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label class="control-label" for="user_select">Author</label>
									<select id="user_select" class="form-control select-2" data-column="1">
										<option value=''>Select Author (all)</option>
										<?php 
										foreach ($users as $key=>$value) {?>
										<option value='<?php echo $key ?>'><?php echo ucwords($value) ?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label class="control-label" for="article_types_select">Article Status</label>
									<select id="statue_select" class="form-control select-2" data-column="5">
										<?php echo $statue_selects; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="control-label" for="article_types_select">.</label>
									<span class="form-icon-wrapper has-clear">
										<span class="form-icon form-icon-right close form-control-clear d-none">
											<span class="form-icon-item" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></span>
										</span>
										<input type="text" id="datatableSearch" class="form-control form-icon-input-right" placeholder="Search Articles" aria-label="Search Articles">
									</span>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive mb-2">
					<table id="article_list_table" class="table table-striped table-bordered table-hover">
						<thead></thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
