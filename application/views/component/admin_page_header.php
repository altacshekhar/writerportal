<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $meta_title; ?></title>
	<?php
	echo meta('description', $menu['MetaData']['description']);
	echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
	//echo meta('keywords', 'love, passion, intrigue, deception');
	$logo_url = site_url('assets/images/' . $menu['NavBrand']['logo']);
	?>
	<link rel="shortcut icon" href="<?php echo site_url($menu['NavBrand']['favIcon']); ?>" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i" rel="stylesheet" />
	<!-- font-awesome style -->
	<link href="<?php //echo site_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" crossorigin="anonymous"/>
	<link href="<?php echo site_url('assets/vendor/fontawesome-web/css/all.css'); ?>" rel="stylesheet" />
	<!-- select2 style -->
	<link href="<?php echo site_url('assets/vendor/select-2/css/select2.css'); ?>" rel="stylesheet" />
	<!-- data-tables style -->
	<link href="<?php echo site_url('assets/vendor/datatable/css/data-tables.css'); ?>" rel="stylesheet" />
	<!-- trumbowyg style -->
	<link href="<?php echo site_url('assets/vendor/trumbowyg/ui/trumbowyg.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('assets/vendor/trumbowyg/plugins/colors/ui/trumbowyg.colors.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('assets/vendor/trumbowyg/plugins/table/ui/trumbowyg.table.min.css'); ?>" rel="stylesheet" />

	<!-- jQuery UI style -->
	<link href="<?php echo site_url('assets/vendor/jquery-ui/jquery-ui.min.css'); ?>" rel="stylesheet" />
	<!-- Bootstrap -->
	<link href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
	<!-- Croppie -->
	<link href="<?php echo site_url('assets/vendor/croppie/css/croppie.css'); ?>" rel="stylesheet" />
	<!-- Fontawesome Iconpicker -->
	<link href="<?php echo site_url('assets/vendor/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.css'); ?>" rel="stylesheet" />
	<!-- Custom Css -->
	<link href="<?php echo site_url('assets/css/style.css'); ?>" rel="stylesheet" rel="stylesheet" />
	<link href="<?php echo site_url('assets/vendor/atd-jquery/css/atd.css'); ?>" rel="stylesheet" rel="stylesheet" />
	<script type="text/javascript">
		var base_url = '<?php echo site_url(); ?>';
	</script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<header id="site-header-wrapper" class="site-header-wrapper">
		<div class="site-header">
			<!-- <nav class="navbar navbar-expand-md sticky-top navbar-dark"> -->
			<nav id="navbar-sticky" class="navbar navbar-dark navbar-expand-md header-fullscreen sticky-header navbar-static-top">
				<div class="container">
					<button type="button" class="btn btn-link text-white right-sidebar-toggler" ><i class="fas fa-bars fa-lg"></i></button>
				
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hubNavbarCollapse" aria-controls="navbarCollapse"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="hubNavbarCollapse">
						<ul class="navbar-nav" id="admin-navbar">
						<?php if($user_type == 1 || $user_type == 3 || $user_type == 6){  ?>
							<li class="nav-item">
								<a class="nav-link" href="#">Dashboard </a>
							</li>
						<?php } ?>
						<?php  if($user_type >= 0 && $user_type != 5 && $user_type != 6){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="content"  || $this->uri->segment(2)=="articleslist" || $this->uri->segment(1)=="supporting" || $this->uri->segment(1)=="pillar" || $this->uri->segment(1)=="article" || $this->uri->segment(1)=="pressrelease" || $this->uri->segment(1)=="recipe"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/content') ?>">Content </a>
							</li>
						<?php } ?>
						<?php  if($user_type && $user_type != 5 && $user_type != 6){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="coach"  || $this->uri->segment(2)=="seocoach"){echo "active";}?>">
								<!--<a class="nav-link" href="#<?php //echo site_url('/secure/coach') ?>">Coach</a>-->
							</li>
						<?php } ?>
						<?php if($user_type >= 0){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="linkbuilding" || $this->uri->segment(2)=="publishers" || $this->uri->segment(2)=="campaigns" || $this->uri->segment(2)=="articlesbrief" || $this->uri->segment(2)=="livelinks" || $this->uri->segment(2)=="linkbuildingarticle"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/linkbuilding') ?>">Link Building </a>
							</li>
						<?php } ?>
							
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="bottom-bar">
			<nav class="navbar navbar-expand-sm pt-0 pb-0">
				<div class="container">
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav">
						<?php if($this->uri->segment(2)=="articleslist" || $this->uri->segment(2)=="keyword" || $this->uri->segment(2)=="keywordanalysis" ){ ?>
							<?php if($user_type == 1 || $user_type == 3){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="keyword" || $this->uri->segment(2)=="keywordanalysis"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/keyword') ?>">Content Brief </a>
							</li>
							<?php } ?>
							<?php if($user_type && ($user_type != 5 || $user_type != 6)){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="articleslist"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/articleslist') ?>">Articles </a>
							</li>
							<?php } ?>
							<?php } ?>
						<?php if($this->uri->segment(2)=="linkbuilding" || $this->uri->segment(2)=="publishers" || $this->uri->segment(2)=="campaigns" || $this->uri->segment(2)=="articlesbrief" || $this->uri->segment(2)=="livelinks"){ ?>
							<?php if($user_type == 1 || $user_type == 5 || $user_type == 6){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="publishers"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/publishers') ?>">Publishers </a>
							</li>
							<?php } ?>
							<?php if($user_type == 1 || $user_type == 3 || $user_type == 6){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="campaigns"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/campaigns') ?>">Campaigns </a>
							</li>
							<?php } ?>
							<?php if($user_type >= 0 && $user_type != 5){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="articlesbrief"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/articlesbrief') ?>">Articles </a>
							</li>
							<?php } ?>
							<?php if($user_type == 1 || $user_type == 6){ ?>
							<li class="nav-item <?php if($this->uri->segment(2)=="livelinks"){echo "active";}?>">
								<a class="nav-link" href="<?php echo site_url('/secure/livelinks') ?>">Live Links </a>
							</li>
							<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<?php $this->load->view('component/admin_sidebar'); ?>
