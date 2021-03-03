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
		<?php if (key_exists('TopBar', $menu)): ?>
		<div class="top-bar">
			<nav class="navbar navbar-expand-sm pt-0 pb-0">
				<div class="container">
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav ml-auto">
							<?php foreach ($menu['TopBar'] as $top_bar): ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo $top_bar['link']; ?>" <?php if($top_bar['external']) echo 'target="_blank"'; ?>>
								<?php echo $top_bar['text']; ?> <span class="sr-only">(current)</span></a>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<?php endif;?>
		<div class="site-header">
			<!-- <nav class="navbar navbar-expand-md sticky-top navbar-dark"> -->
			<nav id="navbar-sticky" class="navbar navbar-dark navbar-expand-md header-fullscreen sticky-header navbar-static-top">
				<div class="container">
					<a class="navbar-brand d-flex align-items-center" href="<?php echo site_url() ?>">
						<img src="<?php echo $logo_url;  ?>" class="navbar-logo" alt="<?php echo $menu['NavBrand']['logoAlt'] ?>"></img>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hubNavbarCollapse" aria-controls="navbarCollapse"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="hubNavbarCollapse">
						<ul class="navbar-nav ml-auto">
							<?php foreach ($menu['TopMainNav'] as $top_menu): ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo $top_menu['link']; ?>" <?php if($top_menu['external']) echo 'target="_blank"'; ?>>
									<?php echo $top_menu['text']; ?> <span class="sr-only">(current)</span>
								</a>
							</li>
							<?php endforeach;?>
						</ul>

						<?php if ($is_user_logged_in) {
							 $user_image_url = 'assets/images/profile/'.$user_id.'.jpg';
							 ?>
							<a id="right-sidebar-toggler-1" class="btn btn-bd-download hw-sidebar-account-toggle-bg ml-md-1 right-sidebar-toggler-1"
							href="<?php echo site_url('/secure/dashboard') ?>" role="button">
								<span class="position-relative">
									<span class="hw-sidebar-account-toggle-text">
										<?php echo $current_user_full_name ?></span>
									<img class="hw-sidebar-account-toggle-img" src="<?php echo get_user_image($user_image_url).'?id=' . time(); ?>"
									alt="Image Description">
								</span>
							</a>
						<?php } else {?>
							<a class="btn btn-primary btn-sm ml-md-1 <?php if(site_url(uri_string()) == site_url(''))  echo ' go-to ';?>"
							href="<?php echo site_url('#login-form-container')?>">
								Login
							</a>
						<?php }?>
					</div>
				</div>
			</nav>
		</div>
	</header>