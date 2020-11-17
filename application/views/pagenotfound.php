<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>
		<?php echo $meta_title; ?>
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="<?php echo site_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	<style>
		/***** NOT FOUND PANEL *****/
		.notfoundpanel {
			left: 50%;
			letter-spacing: 0.04em;
			position: absolute;
			text-align: center;
			top: 50%;
			transform: translate(-50%, -55%);
		}

		@media (max-width: 640px) {
			.notfoundpanel {
				position: static;
				transform: none;
				padding-top: 20px;
				padding-bottom: 20px;
			}
		}

		.notfoundpanel h1 {
			font-size: 200px;
			font-weight: 700;
			line-height: 160px;
			font-family: 'Open Sans', 'Helvetica Neue', Helvetica, sans-serif;
			color: #3b4354;
			margin: 0 0 20px;
			letter-spacing: 0.04em;
		}

		@media (max-width: 640px) {
			.notfoundpanel h1 {
				font-size: 100px;
				line-height: 100px;
			}
		}

		.notfoundpanel h3 {
			margin-top: 0;
			font-weight: 300;
			font-size: 30px;
			color: #505b72;
			text-transform: uppercase;
			line-height: 1.2;
		}

		@media (max-width: 640px) {
			.notfoundpanel h3 {
				font-size: 24px;
			}
		}

		.notfoundpanel h4 {
			margin: 30px 0 20px;
			font-size: 14px;
			font-weight: 500;
			line-height: 25px;
			color: #5b6781;
			letter-spacing: .3px;
		}

		.notfoundpanel .page-copyright {
			margin-top: 60px;
			color: #37474f;
			font-size: 12px;
			letter-spacing: 1px;
		}

		@media (max-width: 640px) {
			.notfoundpanel .page-copyright {
				margin-top: 20px;
			}
		}

	</style>
</head>

<body>
	<section id="container">
		<div class="container notfoundpanel">
			<h1 class="animated fadeInDown">404!</h1>
			<h3 class="animated fadeInDown">The page you are looking for has not been found!</h3>
			<h4 class="animated fadeInDown">The page you are looking for might have been removed, had its name changed, or
				unavailable.</h4>
			<a class="btn btn-primary animated fadeInDown" href="<?php echo base_url() ?>">
				GO TO HOME PAGE
			</a>
			<footer class="page-copyright animated fadeInDown">
			<p>&copy; <?php echo date('Y')?>. All RIGHT RESERVED <?php echo ucwords(getDoaminName())?>.COM.</p>
			</footer>
		</div><!-- notfoundpanel -->
	</section>
</body>

</html>
