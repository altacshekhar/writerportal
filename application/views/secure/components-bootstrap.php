<style>
	section {
    padding: 4.5rem 0;
}
.feature-list {
	list-style: none;
    margin-bottom: 0;
}
.feature-list > li {
    margin-bottom: 3rem;
}
.feature-list > li[class*="col"] {
    display: flex;
    flex-direction: column;
}
</style>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
<section class="jumbotron-page-title pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-12 col-md-7">
				<div class="space-lg pb-0">
					<h1 class="display-5 no-wrap text-white">
						Bootstrap Components
					</h1>
					<span class="lead">
						Wingman leverages the power of the Bootstrap 4 framework to create a robust suite of detailed, and varied pages.
					</span>
				</div>
			</div>
			<!--end of col-->
		</div>
		<!--end of row-->
	</div>
</section>
<section>
	<div class="container">
		<div class="f-modal-alert">
			<div class="f-modal-icon f-modal-error animate">
				<span class="f-modal-x-mark">
					<span class="f-modal-line f-modal-left animateXLeft"></span>
					<span class="f-modal-line f-modal-right animateXRight"></span>
				</span>
				<div class="f-modal-placeholder"></div>
				<div class="f-modal-fix"></div>
			</div>
			<div class="f-modal-icon f-modal-warning scaleWarning">
				<span class="f-modal-body pulseWarningIns"></span>
				<span class="f-modal-dot pulseWarningIns"></span>
			</div>
			<div class="f-modal-icon f-modal-success animate">
				<span class="f-modal-line f-modal-tip animateSuccessTip"></span>
				<span class="f-modal-line f-modal-long animateSuccessLong"></span>
				<div class="f-modal-placeholder"></div>
				<div class="f-modal-fix"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-10">
				<ul class="row feature-list">


					<li class="col-12" id="alerts">
						<div class="mb-5">
							<h5 class="h3 mb-2">Alerts</h5>
							<span class="lead">Use default Bootstrap markup to display Alerts elements. See the Bootstrap documentation for
								a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/alerts/">View Alerts on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="alert alert-primary" role="alert">
							This is a primary alert—check it out!
						</div>
						<div class="alert alert-secondary" role="alert">
							This is a secondary alert—check it out!
						</div>
						<div class="alert alert-success" role="alert">
							This is a success alert—check it out!
						</div>
						<div class="alert alert-danger" role="alert">
							This is a danger alert—check it out!
						</div>
						<div class="alert alert-warning" role="alert">
							This is a warning alert—check it out!
						</div>
						<div class="alert alert-info" role="alert">
							This is a info alert—check it out!
						</div>
						<div class="alert alert-light" role="alert">
							This is a light alert—check it out!
						</div>
						<div class="alert alert-dark" role="alert">
							This is a dark alert—check it out!
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="badge">
						<div class="mb-5">
							<h5 class="h3 mb-2">Badge</h5>
							<span class="lead">Use default Bootstrap markup to display Badge elements. See the Bootstrap documentation for a
								full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/badge/">View Badge on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Badges</h6>
								<h5>Version 1.2
									<span class="badge badge-primary">New</span>
								</h5>
								<h5>Items
									<span class="badge badge-secondary">4</span>
								</h5>
								<h5>Issue Tracking
									<span class="badge badge-success">On Track</span>
								</h5>
								<h5>Subscription
									<span class="badge badge-danger">Expired</span>
								</h5>
								<h5>Invoice
									<span class="badge badge-warning">Pending</span>
								</h5>
								<h5>Category
									<span class="badge badge-info badge-pill">Pill</span>
								</h5>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Indicators</h6>
								<h5>On track
									<span class="badge badge-success badge-indicator"></span>
								</h5>
								<h5>Needs Attention
									<span class="badge badge-warning badge-indicator"></span>
								</h5>
								<h5>In Danger
									<span class="badge badge-danger badge-indicator"></span>
								</h5>
							</div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.badge-indicator</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.badge</code> to display badge as an indicator circle</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="breadcrumb">
						<div class="mb-5">
							<h5 class="h3 mb-2">Breadcrumb</h5>
							<span class="lead">Use default Bootstrap markup to display Breadcrumb elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/breadcrumb/">View Breadcrumb on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<nav aria-label="breadcrumb" role="navigation" class="bg-secondary px-3">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">Home</li>
							</ol>
						</nav>

						<nav aria-label="breadcrumb" role="navigation" class="bg-dark text-light px-3">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#">Home</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Library</li>
							</ol>
						</nav>

						<nav aria-label="breadcrumb" role="navigation" class="bg-primary text-white px-3">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="#">Home</a>
								</li>
								<li class="breadcrumb-item">
									<a href="#">Library</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data</li>
							</ol>
						</nav>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="buttons">
						<div class="mb-5">
							<h5 class="h3 mb-2">Buttons</h5>
							<span class="lead">Use default Bootstrap markup to display Buttons elements. See the Bootstrap documentation for
								a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/buttons/">View Buttons on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Button Colors</h6>
								<button type="button" class="btn btn-primary">Primary</button>
								<button type="button" class="btn btn-secondary">Secondary</button>
								<button type="button" class="btn btn-success">Success</button>
								<button type="button" class="btn btn-danger">Danger</button>
								<button type="button" class="btn btn-warning">Warning</button>
								<button type="button" class="btn btn-info">Info</button>
								<button type="button" class="btn btn-light">Light</button>
								<button type="button" class="btn btn-dark">Dark</button>
								<button type="button" class="btn btn-link">Link</button>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Button Sizes</h6>
								<button type="button" class="btn btn-success btn-lg">Large button</button>
								<button type="button" class="btn btn-primary">Standard button</button>
								<button type="button" class="btn btn-outline-primary btn-sm">Small button</button>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="card">
						<div class="mb-5">
							<h5 class="h3 mb-2">Card</h5>
							<span class="lead">Use default Bootstrap markup to display Card elements. See the Bootstrap documentation for a
								full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/card/">View Card on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="row">
							<div class="col-12 col-md-6 col-lg-5">
								<div class="card">
									<img class="card-img-top" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">Card title</h4>
										<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
											content.</p>
										<a href="#" class="btn btn-primary">Go somewhere</a>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-7">
								<div class="card">
									<div class="card-header card-header-borderless d-flex justify-content-between">
										<small class="text-muted">
											<i class="fa fa-add-to-list mr-1"></i> Added a new item</small>
										<small class="text-muted">A few moments ago</small>
									</div>
									<div class="card-body">
										<div class="media">
											<img alt="Image" src="holder.js/60x60?auto=yes&theme=gray" class="avatar avatar-square" />
											<div class="media-body">
												<span class="h5 mb-0">Kin</span>
												<span>Digital Fashion Assistant</span>
											</div>
										</div>
									</div>
									<div class="card-footer d-flex justify-content-between">
										<div>
											<button class="btn btn-sm btn-outline-secondary">Comment</button>
											<button class="btn btn-sm btn-outline-primary">
												<i class="fa fa-thumbs-up"></i>
											</button>
										</div>
										<div class="text-small">
											<ul class="list-inline">
												<li class="list-inline-item">
													<i class="fa fa-thumbs-up"></i> 12</li>
												<li class="list-inline-item">
													<i class="fa fa-share-alternative"></i> 8</li>
											</ul>
										</div>
									</div>
								</div>
								<!--end of card-->
							</div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.card-lg</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.card</code> to increase padding inside the card</dd>
									<dt class="col-4">
										<code>.card-sm</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.card</code> to decrease padding inside the card</dd>
									<dt class="col-4">
										<code>.card-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.card</code> to remove default border</dd>
									<dt class="col-4">
										<code>.card-header-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.card-header</code> to remove bottom border</dd>
									<dt class="col-4">
										<code>.card-footer-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.card-footer</code> to remove top border</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="dropdowns">
						<div class="mb-5">
							<h5 class="h3 mb-2">Dropdowns</h5>
							<span class="lead">Use default Bootstrap markup to display Dropdowns elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/dropdowns/">View Dropdowns on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="mb-5">
							<div class="dropdown d-inline-block">
								<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
									Default
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<h6 class="dropdown-header title-decorative">Dropdown header</h6>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
							<div class="dropdown d-inline-block">
								<button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
									Smaller Menu
								</button>
								<div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton2">
									<h6 class="dropdown-header title-decorative">Dropdown header</h6>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
							<div class="dropdown d-inline-block">
								<button class="btn btn-outline-primary dropdown-toggle dropdown-toggle-no-arrow" type="button" id="dropdownMenuButton3"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-dots-three-horizontal"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-sm" aria-labelledby="dropdownMenuButton3">
									<h6 class="dropdown-header title-decorative">Dropdown header</h6>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.dropdown-menu-sm</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.dropdown-menu</code> to decrease padding inside the menu</dd>
									<dt class="col-4">
										<code>.dropdown-toggle-no-arrow</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.dropdown-toggle</code> to remove default arrow icon</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="forms">
						<div class="mb-5">
							<h5 class="h3 mb-2">Forms</h5>
							<span class="lead">Use default Bootstrap markup to display Forms elements. See the Bootstrap documentation for a
								full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/forms/">View Forms on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Form Group</h6>
								<form>
									<div class="form-group">
										<label for="exampleInputEmail1">Email address</label>
										<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Input Sizes</h6>
								<form>
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" id="exampleInputSm" aria-describedby="inputSm"
										placeholder="Form Control Small">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="exampleInputSt" aria-describedby="inputSt" placeholder="Form Control Standard">
									</div>
									<div class="form-group">
										<input type="text" class="form-control form-control-lg" id="exampleInputLg" aria-describedby="inputLg"
										placeholder="Form Control Large">
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Input Group</h6>
								<form>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">@</span>
										</div>
										<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Custom Inputs</h6>
								<form class="d-flex flex-column">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="custom-check-1">
										<label class="custom-control-label" for="custom-check-1">Check this custom checkbox</label>
									</div>
									<div class="custom-control custom-checkbox-switch">
										<input type="checkbox" class="custom-control-input" id="custom-switch-1">
										<label class="custom-control-label" for="custom-switch-1">Switch this custom checkbox</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radio1" name="radio" type="radio" class="custom-control-input">
										<label class="custom-control-label" for="radio1">Toggle this custom radio</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radio2" name="radio" type="radio" class="custom-control-input">
										<label class="custom-control-label" for="radio2">Or toggle this other custom radio</label>
									</div>
									<select class="custom-select mb-2">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
									<div class="custom-file mb-2" for="file2">
										<input type="file" id="file2" class="custom-file-input height-0">
										<span class="btn btn-primary">
											<i class="fa fa-upload-to-cloud">&nbsp;</i>Upload a file</span>
									</div>
								</form>
							</div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.form-control-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.form-control</code> to remove default border</dd>
									<dt class="col-4">
										<code>.custom-checkbox-switch</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.custom-checkbox</code> to display checkbox as an 'on/off' switch</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="list-group">
						<div class="mb-5">
							<h5 class="h3 mb-2">List Group</h5>
							<span class="lead">Use default Bootstrap markup to display List Group elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/list group/">View List Group on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<ul class="list-group mb-5">
							<li class="list-group-item">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Morbi leo risus</li>
							<li class="list-group-item">Porta ac consectetur ac</li>
							<li class="list-group-item">Vestibulum at eros</li>
						</ul>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.list-group-lg</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.list-group</code> to increase the Y padding of child items</dd>
									<dt class="col-4">
										<code>.list-group-comments</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.list-group</code> when displaying a list of discussion comments for correct child formatting</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="modal">
						<div class="mb-5">
							<h5 class="h3 mb-2">Modal</h5>
							<span class="lead">Use default Bootstrap markup to display Modal elements. See the Bootstrap documentation for a
								full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/modal/">View Modal on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
							Launch demo modal
						</button>

						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
							<div class="modal-dialog modal-lg modal-center-viewport" role="document">
								<div class="modal-content">
									<div class="modal-header modal-header-borderless justify-content-end">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												<i class="fa fa-cross"></i>
											</span>
										</button>
									</div>
									<div class="modal-body d-flex justify-content-center">
										<div class="text-center w-75">
											<span class="h1">Howdy, I'm a modal</span>
											<span class="lead">I'm centered inside the viewport for a more aesthetically pleasing experience.</span>
											<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="w-75" />
										</div>
									</div>
									<div class="modal-footer modal-footer-borderless justify-content-center">
										<button type="button" class="btn btn-lg btn-primary my-4" data-dismiss="modal">Thanks, You're dismissed</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.modal-header-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.modal-header</code> to remove border and padding from bottom</dd>
									<dt class="col-4">
										<code>.modal-footer-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.modal-footer</code> to remove border and padding from top</dd>
									<dt class="col-4">
										<code>.modal-center-viewport</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.modal-dialog</code> to center the modals contents vertically and horizontally within the viewport</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="navbar">
						<div class="mb-5">
							<h5 class="h3 mb-2">Navbar</h5>
							<span class="lead">Use default Bootstrap markup to display Navbar elements. See the Bootstrap documentation for
								a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/navbar/">View Navbar on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="bg-white navbar-light">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-1" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-1">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-1" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-1">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-1" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-1">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>

										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="#">Sign up</a>
												<span>&nbsp;or&nbsp;</span>
												<a href="#">Sign in</a>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="bg-primary navbar-dark">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-2" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-2">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-2" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-2">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-2" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-2">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>

										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="#">Sign up</a>
												<span>&nbsp;or&nbsp;</span>
												<a href="#">Sign in</a>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="bg-dark navbar-dark">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="assets/img/logo-white.svg" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-3" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-3">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-3" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-3">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-3" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-3">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>

										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="#">Sign up</a>
												<span>&nbsp;or&nbsp;</span>
												<a href="#">Sign in</a>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="my-4"></div>
						<div class="bg-white navbar-light">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="assets/img/logo-gray.svg" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-4" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-4">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-4" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-4">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-4" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-4">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>
										<form class="form-inline col p-0 pl-md-2 pr-md-3">
											<input class="form-control w-100" type="search" placeholder="Search" aria-label="Search">
										</form>



										<ul class="navbar-nav">
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01-4"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-xs" />
													<span class="badge badge-danger">8</span>
												</a>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01-4">
													<a class="dropdown-item" href="#">Notifications
														<span class="badge badge-danger">8</span>
													</a>
													<a class="dropdown-item" href="#">Profile</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Settings</a>
													<a class="dropdown-item" href="#">Groups</a>
													<a class="dropdown-item" href="#">Log out</a>
												</div>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="bg-primary navbar-dark">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="assets/img/logo-white.svg" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-5" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-5">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-5" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-5">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-5" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-5">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>
										<form class="form-inline col p-0 pl-md-2 pr-md-3">
											<input class="form-control w-100" type="search" placeholder="Search" aria-label="Search">
										</form>



										<ul class="navbar-nav">
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01-5"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img alt="Image" src="assets/img/avatar-male-3.jpg" class="avatar avatar-xs" />
													<span class="badge badge-danger">8</span>
												</a>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01-5">
													<a class="dropdown-item" href="#">Notifications
														<span class="badge badge-danger">8</span>
													</a>
													<a class="dropdown-item" href="#">Profile</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Settings</a>
													<a class="dropdown-item" href="#">Groups</a>
													<a class="dropdown-item" href="#">Log out</a>
												</div>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="bg-dark navbar-dark">
							<div class="container">
								<nav class="navbar navbar-expand-lg">
									<a class="navbar-brand" href="index.html">
										<img alt="Wingman" src="assets/img/logo-white.svg" />
									</a>
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav-6" aria-controls="navbarNav"
									aria-expanded="false" aria-label="Toggle navigation">
										<i class="fa fa-menu h4"></i>
									</button>
									<div class="collapse navbar-collapse justify-content-between" id="navbarNav-6">
										<ul class="navbar-nav">
											<li class="nav-item">
												<a href="index.html" class="nav-link">Overview</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-6" role="button" data-toggle="dropdown">Pages</a>
												<div class="dropdown-menu" aria-labelledby="pagesDropdown-6">

													<a class="dropdown-item" href="pages-landing.html">
														<span class="h6 mb-0">Landing Pages</span>
														<p class="text-small text-muted">Showcase your product in style</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-app.html">
														<span class="h6 mb-0">App Pages</span>
														<p class="text-small text-muted">Build detailed, functional web apps</p>
													</a>

													<div class="dropdown-divider"></div>


													<a class="dropdown-item" href="pages-inner.html">
														<span class="h6 mb-0">Inner Pages</span>
														<p class="text-small text-muted">Complete your online presence</p>
													</a>


												</div>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-6" role="button" data-toggle="dropdown">Components</a>
												<div class="dropdown-menu" aria-labelledby="componentsDropdown-6">

													<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

													<a class="dropdown-item" href="components-wingman.html">Wingman</a>

												</div>
											</li>
										</ul>
										<form class="form-inline col p-0 pl-md-2 pr-md-3">
											<input class="form-control w-100" type="search" placeholder="Search" aria-label="Search">
										</form>



										<ul class="navbar-nav">
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01-6"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-xs" />
													<span class="badge badge-danger">8</span>
												</a>
												<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01-6">
													<a class="dropdown-item" href="#">Notifications
														<span class="badge badge-danger">8</span>
													</a>
													<a class="dropdown-item" href="#">Profile</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Settings</a>
													<a class="dropdown-item" href="#">Groups</a>
													<a class="dropdown-item" href="#">Log out</a>
												</div>
											</li>
										</ul>

									</div>
									<!--end nav collapse-->
								</nav>
							</div>
							<!--end of container-->
						</div>
						<div class="my-4"></div>
						<div class="bg-white navbar-light">
							<div class="container">
								<nav class="row navbar navbar-expand-lg align-items-center">
									<div class="col-12 col-lg-auto order-lg-2 d-flex justify-content-between">
										<a class="navbar-brand m-0" href="index.html">
											<img alt="Wingman" src="assets/img/logo-gray.svg" />
										</a>
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-toggle"
										aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
											<i class="fa fa-menu h4"></i>
										</button>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-1">
										<div class="collapse navbar-collapse navbar-toggle">
											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="index.html" class="nav-link">Overview</a>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-7" role="button" data-toggle="dropdown">Pages</a>
													<div class="dropdown-menu" aria-labelledby="pagesDropdown-7">

														<a class="dropdown-item" href="pages-landing.html">
															<span class="h6 mb-0">Landing Pages</span>
															<p class="text-small text-muted">Showcase your product in style</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-app.html">
															<span class="h6 mb-0">App Pages</span>
															<p class="text-small text-muted">Build detailed, functional web apps</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-inner.html">
															<span class="h6 mb-0">Inner Pages</span>
															<p class="text-small text-muted">Complete your online presence</p>
														</a>


													</div>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-7" role="button" data-toggle="dropdown">Components</a>
													<div class="dropdown-menu" aria-labelledby="componentsDropdown-7">

														<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

														<a class="dropdown-item" href="components-wingman.html">Wingman</a>

													</div>
												</li>
											</ul>
										</div>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-3">
										<div class="collapse navbar-collapse navbar-toggle justify-content-end">



											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="documentation/index.html" class="nav-link">Docs</a>
												</li>
												<li class="nav-item">
													<a href="documentation/changelog.html" class="nav-link">Changelog
														<span class="badge badge-secondary mr-2">v1.0.5</span>
													</a>
												</li>
												<li class="nav-item d-flex align-items-center">
													<a href="https://themes.getbootstrap.com/product/wingman-landing-page-app-template" class="btn btn-success">Purchase
														Now</a>
												</li>
											</ul>

										</div>
									</div>
									<!--end of col-->
								</nav>
								<!--end of row-->
							</div>
							<!--end of container-->
						</div>
						<div class="bg-primary navbar-dark">
							<div class="container">
								<nav class="row navbar navbar-expand-lg align-items-center">
									<div class="col-12 col-lg-auto order-lg-2 d-flex justify-content-between">
										<a class="navbar-brand m-0" href="index.html">
											<img alt="Wingman" src="assets/img/logo-white.svg" />
										</a>
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-toggle"
										aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
											<i class="fa fa-menu h4"></i>
										</button>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-1">
										<div class="collapse navbar-collapse navbar-toggle">
											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="index.html" class="nav-link">Overview</a>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-8" role="button" data-toggle="dropdown">Pages</a>
													<div class="dropdown-menu" aria-labelledby="pagesDropdown-8">

														<a class="dropdown-item" href="pages-landing.html">
															<span class="h6 mb-0">Landing Pages</span>
															<p class="text-small text-muted">Showcase your product in style</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-app.html">
															<span class="h6 mb-0">App Pages</span>
															<p class="text-small text-muted">Build detailed, functional web apps</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-inner.html">
															<span class="h6 mb-0">Inner Pages</span>
															<p class="text-small text-muted">Complete your online presence</p>
														</a>


													</div>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-8" role="button" data-toggle="dropdown">Components</a>
													<div class="dropdown-menu" aria-labelledby="componentsDropdown-8">

														<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

														<a class="dropdown-item" href="components-wingman.html">Wingman</a>

													</div>
												</li>
											</ul>
										</div>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-3">
										<div class="collapse navbar-collapse navbar-toggle justify-content-end">



											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="documentation/index.html" class="nav-link">Docs</a>
												</li>
												<li class="nav-item">
													<a href="documentation/changelog.html" class="nav-link">Changelog
														<span class="badge badge-secondary mr-2">v1.0.5</span>
													</a>
												</li>
												<li class="nav-item d-flex align-items-center">
													<a href="https://themes.getbootstrap.com/product/wingman-landing-page-app-template" class="btn btn-success">Purchase
														Now</a>
												</li>
											</ul>

										</div>
									</div>
									<!--end of col-->
								</nav>
								<!--end of row-->
							</div>
							<!--end of container-->
						</div>
						<div class="bg-dark navbar-dark">
							<div class="container">
								<nav class="row navbar navbar-expand-lg align-items-center">
									<div class="col-12 col-lg-auto order-lg-2 d-flex justify-content-between">
										<a class="navbar-brand m-0" href="index.html">
											<img alt="Wingman" src="assets/img/logo-white.svg" />
										</a>
										<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-toggle"
										aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
											<i class="fa fa-menu h4"></i>
										</button>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-1">
										<div class="collapse navbar-collapse navbar-toggle">
											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="index.html" class="nav-link">Overview</a>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown-9" role="button" data-toggle="dropdown">Pages</a>
													<div class="dropdown-menu" aria-labelledby="pagesDropdown-9">

														<a class="dropdown-item" href="pages-landing.html">
															<span class="h6 mb-0">Landing Pages</span>
															<p class="text-small text-muted">Showcase your product in style</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-app.html">
															<span class="h6 mb-0">App Pages</span>
															<p class="text-small text-muted">Build detailed, functional web apps</p>
														</a>

														<div class="dropdown-divider"></div>


														<a class="dropdown-item" href="pages-inner.html">
															<span class="h6 mb-0">Inner Pages</span>
															<p class="text-small text-muted">Complete your online presence</p>
														</a>


													</div>
												</li>
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="componentsDropdown-9" role="button" data-toggle="dropdown">Components</a>
													<div class="dropdown-menu" aria-labelledby="componentsDropdown-9">

														<a class="dropdown-item" href="components-bootstrap.html">Bootstrap</a>

														<a class="dropdown-item" href="components-wingman.html">Wingman</a>

													</div>
												</li>
											</ul>
										</div>
									</div>
									<!--end of col-->
									<div class="col-12 col-lg order-lg-3">
										<div class="collapse navbar-collapse navbar-toggle justify-content-end">



											<ul class="navbar-nav">
												<li class="nav-item">
													<a href="documentation/index.html" class="nav-link">Docs</a>
												</li>
												<li class="nav-item">
													<a href="documentation/changelog.html" class="nav-link">Changelog
														<span class="badge badge-secondary mr-2">v1.0.5</span>
													</a>
												</li>
												<li class="nav-item d-flex align-items-center">
													<a href="https://themes.getbootstrap.com/product/wingman-landing-page-app-template" class="btn btn-success">Purchase
														Now</a>
												</li>
											</ul>

										</div>
									</div>
									<!--end of col-->
								</nav>
								<!--end of row-->
							</div>
							<!--end of container-->
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="navs">
						<div class="mb-5">
							<h5 class="h3 mb-2">Navs</h5>
							<span class="lead">Use default Bootstrap markup to display Navs elements. See the Bootstrap documentation for a
								full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/navs/">View Navs on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Horizontal</h6>
								<ul class="nav">
									<li class="nav-item">
										<a class="nav-link active" href="#">Active</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Link</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#">Link</a>
									</li>
									<li class="nav-item">
										<a class="nav-link disabled" href="#">Disabled</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Vertical</h6>
								<nav class="nav flex-md-column">
									<a class="nav-link active" href="#">Active</a>
									<a class="nav-link" href="#">Link</a>
									<a class="nav-link" href="#">Link</a>
									<a class="nav-link disabled" href="#">Disabled</a>
								</nav>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h6 class="title-decorative">Tabs (Using Bootstrap JS)</h6>
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab1" data-toggle="tab" href="#tab1-content" role="tab" aria-controls="general"
										aria-selected="true">Tab One</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab2" data-toggle="tab" href="#tab2-content" role="tab" aria-controls="billing"
										aria-selected="false">Tab Two</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="tab3" data-toggle="tab" href="#tab3-content" role="tab" aria-controls="security"
										aria-selected="false">Tab Three</a>
									</li>
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active" id="tab1-content" role="tabpanel" aria-labelledby="tab1-content">
										<span class="h4">Tab One Content</span>
									</div>
									<div class="tab-pane fade" id="tab2-content" role="tabpanel" aria-labelledby="tab2-content">
										<span class="h4">Tab Two Content</span>
									</div>
									<div class="tab-pane fade" id="tab3-content" role="tabpanel" aria-labelledby="tab3-content">
										<span class="h4">Tab Three Content</span>
									</div>
								</div>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="pagination">
						<div class="mb-5">
							<h5 class="h3 mb-2">Pagination</h5>
							<span class="lead">Use default Bootstrap markup to display Pagination elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/pagination/">View Pagination on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">
											<i class="fa fa-chevron-left"></i>
										</span>
										<span class="sr-only">Previous</span>
									</a>
								</li>
								<li class="page-item active">
									<a class="page-link" href="#">1</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#">2</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#">3</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">
											<i class="fa fa-chevron-right"></i>
										</span>
										<span class="sr-only">Next</span>
									</a>
								</li>
							</ul>
						</nav>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="progress">
						<div class="mb-5">
							<h5 class="h3 mb-2">Progress</h5>
							<span class="lead">Use default Bootstrap markup to display Progress elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/progress/">View Progress on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="progress mb-3">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div class="progress mb-3">
							<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
							aria-valuemax="100"></div>
						</div>
						<div class="progress mb-3">
							<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
							aria-valuemax="100"></div>
						</div>
						<div class="progress mb-3">
							<div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
							aria-valuemax="100"></div>
						</div>
						<div class="progress mb-3">
							<div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
							aria-valuemax="100"></div>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.progress-sm</code>
									</dt>
									<dd class="col-8">Apply to
										<code>.progress</code> to decrease the default height of the progress bar</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="tables">
						<div class="mb-5">
							<h5 class="h3 mb-2">Tables</h5>
							<span class="lead">Use default Bootstrap markup to display Tables elements. See the Bootstrap documentation for
								a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/content/tables/">View Tables on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div class="mb-5">
							<table class="table table-hover align-items-center table-borderless">
								<thead>
									<tr>
										<th scope="col">Name</th>
										<th scope="col">Email</th>
										<th scope="col">Location</th>
									</tr>
								</thead>
								<tbody>

									<tr class="bg-white">
										<th scope="row">
											<div class="media align-items-center">
												<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-sm" />
												<div class="media-body">
													<span class="h6 mb-0">Daniel Cameron</span>
													<span class="text-muted">Product Designer</span>
												</div>
											</div>
										</th>
										<td>daniel.cameron@wingman.co</td>
										<td>San Francisco, USA</td>
									</tr>
									<tr class="table-divider"></tr>

									<tr class="bg-white">
										<th scope="row">
											<div class="media align-items-center">
												<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-sm" />
												<div class="media-body">
													<span class="h6 mb-0">Caitlyn Halsy</span>
													<span class="text-muted">Marketing Professional</span>
												</div>
											</div>
										</th>
										<td>caitlyn.halsy@wingman.co</td>
										<td>Melbourne, AU</td>
									</tr>
									<tr class="table-divider"></tr>

									<tr class="bg-white">
										<th scope="row">
											<div class="media align-items-center">
												<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-sm" />
												<div class="media-body">
													<span class="h6 mb-0">Toby Marsh</span>
													<span class="text-muted">Developer</span>
												</div>
											</div>
										</th>
										<td>toby.marsh@wingman.co</td>
										<td>Denver, USA</td>
									</tr>
									<tr class="table-divider"></tr>

									<tr class="bg-white">
										<th scope="row">
											<div class="media align-items-center">
												<img alt="Image" src="<?php echo site_url('assets/images/icons/nobody.jpg') ?>" class="avatar avatar-sm" />
												<div class="media-body">
													<span class="h6 mb-0">Lucille Freebody</span>
													<span class="text-muted">Graphic Designer</span>
												</div>
											</div>
										</th>
										<td>lucille.freebody@wingman.co</td>
										<td>Bathwick, UK</td>
									</tr>
									<tr class="table-divider"></tr>

								</tbody>
							</table>
						</div>
						<div class="card bg-secondary">
							<div class="card-body">
								<h6 class="title-decorative">Additional Class Reference</h6>
								<dl class="row justfiy-content-between">
									<dt class="col-4">
										<code>.table-borderless</code>
									</dt>
									<dd class="col-8">Apply to
										<code>&lt;table&gt;</code> to remove all borders from the table and its child elements</dd>
									<dt class="col-4">
										<code>.bg-white</code>
									</dt>
									<dd class="col-8">Apply to
										<code>&lt;tr&gt;</code> to format the row as a singular 'card' styled entity</dd>
									<dt class="col-4">
										<code>.table-divider</code>
									</dt>
									<dd class="col-8">Apply to and empty
										<code>&lt;tr&gt;</code> act as a spacer between two
										<code>&lt;tr&gt;</code> elements</dd>
								</dl>
							</div>
						</div>
						<hr class="mb-0">
					</li>

					<li class="col-12" id="tooltips">
						<div class="mb-5">
							<h5 class="h3 mb-2">Tooltips</h5>
							<span class="lead">Use default Bootstrap markup to display Tooltips elements. See the Bootstrap documentation
								for a full list of options
								and modifiers.</span>
							<a target="_blank" href="http://getbootstrap.com/docs/4.0/components/tooltips/">View Tooltips on Bootstrap
								<i class="fa fa-popup"></i>
							</a>
						</div>


						<div>
							<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
								Tooltip on top
							</button>
							<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
								Tooltip on right
							</button>
							<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
								Tooltip on bottom
							</button>
							<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
								Tooltip on left
							</button>
						</div>
						<hr class="mb-0">
					</li>



				</ul>
			</div>
			<div class="col">
				<nav id="nav-components" class="nav flex-md-column" data-sticky="below-nav">


					<a data-smooth-scroll href="#alerts" class="nav-link text-small">Alerts</a>

					<a data-smooth-scroll href="#badge" class="nav-link text-small">Badge</a>

					<a data-smooth-scroll href="#breadcrumb" class="nav-link text-small">Breadcrumb</a>

					<a data-smooth-scroll href="#buttons" class="nav-link text-small">Buttons</a>

					<a data-smooth-scroll href="#card" class="nav-link text-small">Card</a>

					<a data-smooth-scroll href="#dropdowns" class="nav-link text-small">Dropdowns</a>

					<a data-smooth-scroll href="#forms" class="nav-link text-small">Forms</a>

					<a data-smooth-scroll href="#list-group" class="nav-link text-small">List Group</a>

					<a data-smooth-scroll href="#modal" class="nav-link text-small">Modal</a>

					<a data-smooth-scroll href="#navbar" class="nav-link text-small">Navbar</a>

					<a data-smooth-scroll href="#navs" class="nav-link text-small">Navs</a>

					<a data-smooth-scroll href="#pagination" class="nav-link text-small">Pagination</a>

					<a data-smooth-scroll href="#progress" class="nav-link text-small">Progress</a>

					<a data-smooth-scroll href="#tables" class="nav-link text-small">Tables</a>

					<a data-smooth-scroll href="#tooltips" class="nav-link text-small">Tooltips</a>



				</nav>
			</div>
		</div>
		<!--end of row-->
	</div>
	<!--end of container-->
</section>
<section>
	<div class="container">
		<div class="k-sink py-4">
			<!-- Cards -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-cards">Cards</h2>
					<p class="lead">Bootstrap cards provide a flexible and extensible content container with multiple variants and
						options.</p>
					<hr class="mt-3 mb-4" />
				</div>
				<div class="">
					<div class="row">
						<div class="col-lg-4">
							<div class="row">
								<div class="col-12 col-md-6 col-lg-12">
									<!-- Basic -->
									<div class="card mb-3">
										<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
											<a href="" onclick="return false;" class="btn btn-primary">Go somewhere</a>
										</div>
									</div>
									<!--Links -->
									<div class="card mb-3">
										<div class="card-body">
											<h5 class="card-title">Titles, Text, and Links</h5>
											<div class="card-subtitle mb-2 text-muted">Card Subtitle</div>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
											<a href="" onclick="return false;" class="card-link">Card link</a>
											<a href="" onclick="return false;" class="card-link">Another link</a>
										</div>
									</div>
									<!-- List groups -->
									<div class="card mb-3">
										<div class="card-body">
											<h5 class="card-title">List Groups</h5>
											<p class="card-text">Create lists of content in a card with a flush list group.</p>
										</div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Cras justo odio</li>
											<li class="list-group-item">Dapibus ac facilisis in</li>
											<li class="list-group-item">Vestibulum at eros</li>
										</ul>
									</div>
									<!-- Top Image -->
									<div class="card mb-3">
										<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray&text=Top Image">
										<div class="card-body">
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-6 col-lg-12">
									<!-- Kitchen Sink -->
									<div class="card mb-3">
										<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
										<div class="card-body">
											<h4 class="card-title">Kitchen Sink</h4>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
											<a href="" onclick="return false;" class="btn btn-primary">Go somewhere</a>
										</div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Cras justo odio</li>
											<li class="list-group-item">Dapibus ac facilisis in</li>
											<li class="list-group-item">Vestibulum at eros</li>
										</ul>
										<div class="card-body">
											<a href="" onclick="return false;" class="card-link">Card link</a>
											<a href="" onclick="return false;" class="card-link">Another link</a>
										</div>
									</div>
									<!-- Quote -->
									<div class="card mb-3">
										<div class="card-header">Quote</div>
										<div class="card-body">
											<blockquote class="blockquote mb-0">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
												<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
											</blockquote>
										</div>
									</div>
									<!-- Bottom Image -->
									<div class="card mb-3">
										<div class="card-body">
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
										<img class="card-img-bottom" src="holder.js/160x90?auto=yes&theme=gray&text=Bottom Image">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<!-- Card block -->
							<div class="card mb-3">
								<div class="card-body">
									This is some text within a card block.
								</div>
							</div>
							<div class="card-deck mb-3">
								<!-- Text Left -->
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Text Left</h5>
										<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
										<a href="" onclick="return false;" class="btn btn-primary">Go <span class="d-none d-md-inline">somewhere</span></a>
									</div>
								</div>
								<!-- Text Center -->
								<div class="card text-center">
									<div class="card-body">
										<h5 class="card-title">Text Center</h5>
										<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
										<a href="" onclick="return false;" class="btn btn-primary">Go <span class="d-none d-md-inline">somewhere</span></a>
									</div>
								</div>
								<!-- Text Right -->
								<div class="card text-right">
									<div class="card-body">
										<h5 class="card-title">Text Right</h5>
										<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
										<a href="" onclick="return false;" class="btn btn-primary">Go <span class="d-none d-md-inline">somewhere</span></a>
									</div>
								</div>
							</div>
							<!-- Tabs -->
							<div class="card text-center mb-3">
								<div class="card-header">
									<ul class="nav nav-tabs card-header-tabs">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false;">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false;">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
										</li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Special title treatment</h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="" onclick="return false;" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
							<!-- Pills -->
							<div class="card text-center mb-3">
								<div class="card-header">
									<ul class="nav nav-pills card-header-pills">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false;">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false;">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
										</li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Special title treatment</h5>
									<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									<a href="" onclick="return false;" class="btn btn-primary">Go somewhere</a>
								</div>
							</div>
							<div class="card bg-light mb-3">
								<div class="card-body">
									<h5 class="card-title">Card Group</h5>
									<p class="card-text">Use cards as a single, attached element with equal width and height columns.</p>
									<!-- Card Group -->
									<div class="card-group mb-3">
										<div class="card">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Group</h5>
												<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
													content. This content is a little bit longer.</p>
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
											</div>
										</div>
										<div class="card">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Group</h5>
												<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
											</div>
										</div>
										<div class="card d-none d-md-flex">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Group</h5>
												<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
													content. This card has even longer content than the first to show that equal height action.</p>
												<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
											</div>
										</div>
									</div>

									<h5 class="card-title">Card Deck</h5>
									<p class="card-text">A set of equal width and height cards that aren’t attached to one another.</p>
									<!-- Card Deck -->
									<div class="card-deck">
										<div class="card">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Deck</h5>
												<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
													content. This content is a little bit longer.</p>
											</div>
											<div class="card-footer">
												<small class="text-muted">Last updated 3 mins ago</small>
											</div>
										</div>
										<div class="card">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Deck</h5>
												<p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
											</div>
											<div class="card-footer">
												<small class="text-muted">Last updated 3 mins ago</small>
											</div>
										</div>
										<div class="card d-none d-md-flex">
											<img class="card-img-top" src="holder.js/160x90?auto=yes&theme=gray">
											<div class="card-body">
												<h5 class="card-title">Card Deck</h5>
												<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
													content. This card has even longer content than the first to show that equal height action.</p>
											</div>
											<div class="card-footer">
												<small class="text-muted">Last updated 3 mins ago</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Backgrounds -->
							<div class="row">
								<div class="col-md-4">
									<div class="card text-white bg-primary mb-3">
										<div class="card-header">Primary</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-secondary mb-3">
										<div class="card-header">Secondary</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-success mb-3">
										<div class="card-header">Success</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-danger mb-3">
										<div class="card-header">Danger</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-warning mb-3">
										<div class="card-header">Warning</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-info mb-3">
										<div class="card-header">Info</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card bg-light mb-3">
										<div class="card-header">Light</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card text-white bg-dark mb-3">
										<div class="card-header">Dark</div>
										<div class="card-body">
											<h5 class="card-title">Card Title</h5>
											<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
												content.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Buttons -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-buttons">Buttons</h2>
					<p class="lead">Use Bootstrap's custom button styles for actions in forms, dialogs, and more with support for
						multiple sizes, states, and more.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-8 mb-3">
						<!-- Colors -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Different Colors</h5>
								<p class="card-text">Use available button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>,
									<code>&lt;input&gt;</code> element to quickly create a styled button.</p>
								<p class="card-text mb-3">
									<a href="" onclick="return false;" class="btn btn-primary">Primary</a>
									<a href="" onclick="return false;" class="btn btn-secondary">Secondary</a>
									<a href="" onclick="return false;" class="btn btn-success">Success</a>
									<a href="" onclick="return false;" class="btn btn-danger">Danger</a>
									<a href="" onclick="return false;" class="btn btn-warning">Warning</a>
									<a href="" onclick="return false;" class="btn btn-info">Info</a>
									<a href="" onclick="return false;" class="btn btn-light">Light</a>
									<a href="" onclick="return false;" class="btn btn-dark">Dark</a>
									<a href="" onclick="return false;" class="btn btn-link">Link</a>
								</p>
								<h5 class="card-title">Outline Buttons</h5>
								<p class="card-text">In need of a button, but not the hefty background colors they bring?</p>
								<p class="card-text">
									<a href="" onclick="return false;" class="btn btn-outline-primary">Primary</a>
									<a href="" onclick="return false;" class="btn btn-outline-secondary">Secondary</a>
									<a href="" onclick="return false;" class="btn btn-outline-success">Success</a>
									<a href="" onclick="return false;" class="btn btn-outline-danger">Danger</a>
									<a href="" onclick="return false;" class="btn btn-outline-warning">Warning</a>
									<a href="" onclick="return false;" class="btn btn-outline-info">Info</a>
									<a href="" onclick="return false;" class="btn btn-outline-light">Light</a>
									<a href="" onclick="return false;" class="btn btn-outline-dark">Dark</a>
								</p>
							</div>
						</div>
						<!-- Groups and Toolbars -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Button Groups and Toolbars</h5>
								<p class="card-text">Wrap a series of buttons with <code>.btn</code> in <code>.btn-group</code>. Combine sets
									of <code>.btn-group</code> into a <code>.btn-toolbar</code>.</p>
								<div class="clearfix">
									<div class="btn-toolbar pull-left">
										<div class="btn-group btn-group-toggle mr-2 mb-1" data-toggle="buttons">
											<label class="btn btn-danger active">
												<input type="checkbox" checked autocomplete="off"> Left
											</label>
											<label class="btn btn-danger active">
												<input type="checkbox" autocomplete="off"> Center
											</label>
											<label class="btn btn-danger">
												<input type="checkbox" autocomplete="off"> Right
											</label>
										</div>

										<div class="btn-group btn-group-toggle mr-2 mb-1" data-toggle="buttons">
											<label class="btn btn-primary active">
												<input type="radio" checked="checked">
												<i class="fa fa-align-left"></i>
											</label>
											<label class="btn btn-primary">
												<input type="radio">
												<i class="fa fa-align-center"></i>
											</label>
											<label class="btn btn-primary">
												<input type="radio">
												<i class="fa fa-align-justify"></i>
											</label>
											<label class="btn btn-primary">
												<input type="radio">
												<i class="fa fa-align-right"></i>
											</label>
										</div>
									</div>
									<div class="btn-toolbar pull-left">
										<div class="btn-group mr-2 mb-1">
											<button class="btn btn-outline-secondary">1</button>
											<button class="btn btn-outline-secondary">2</button>
											<button class="btn btn-outline-secondary">3</button>
											<button class="btn btn-outline-secondary">4</button>
											<button class="btn btn-outline-secondary">5</button>
										</div>

										<div class="btn-group mb-1">
											<button type="button" class="btn btn-info">Single</button>
											<div class="btn-group">
												<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
													Group
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="" onclick="return false;">Dropdown link</a>
													<a class="dropdown-item" href="" onclick="return false;">Dropdown link</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Icon Buttons -->
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Icon Buttons</h5>
								<p class="card-text">To any button you can add an icon. Place <code>&lt;i class="{icon-class}"
										/&gt;&lt;span&gt;Text&lt;/span&gt;</code> inside it.</p>
								<p class="card-text">
									<button class="btn btn-success" type="button">
										<i class="fa fa-plus"></i>
										<span>Create</span>
									</button>
									<button class="btn btn-warning" type="button">
										<i class="fa fa-edit"></i>
										<span>Edit</span>
									</button>
									<button class="btn btn-danger" type="button">
										<i class="fa fa-remove"></i>
										<span>Delete</span>
									</button>
									<button class="btn btn-info" type="button">
										<i class="fa fa-refresh"></i>
										<span>Reload</span>
									</button>
									<button class="btn btn-primary" type="button">
										<i class="fa fa-send"></i>
										<span>Send</span>
									</button>
									<button class="btn btn-secondary" type="button">
										<i class="fa fa-heart"></i>
									</button>
									<button class="btn btn-outline-secondary" type="button">
										<i class="fa fa-star"></i>
										<span>Star</span>
									</button>
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-3">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Button Sizes</h5>
								<p class="card-text">Fancy larger or smaller buttons? Add <code>.btn-lg</code> or <code>.btn-sm</code> for
									additional sizes. Block buttons span the full width of a parent by adding <code>.btn-block</code>.</p>
								<p class="card-text">
									<button class="btn btn-secondary btn-lg btn-block" type="button">Block Button</button>
									<button class="btn btn-primary btn-lg" type="button">Large Button</button>
									<button class="btn btn-secondary btn-lg" type="button">Large Button</button>
									<br>
									<button class="btn btn-primary" type="button">Default Button</button>
									<button class="btn btn-secondary" type="button">Default Button</button>
									<br>
									<button class="btn btn-primary btn-sm" type="button">Small Button</button>
									<button class="btn btn-secondary btn-sm" type="button">Small Button</button>
								</p>
								<h5 class="card-title">Button Tags</h5>
								<p>You can use <code>.btn</code> class on <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code> or <code>&lt;input&gt;</code>
									elements.</p>
								<p class="card-text">
									<a class="btn btn-primary" href="" onclick="return false;" role="button">Link</a>
									<button class="btn btn-primary" type="button">Button</button>
									<input class="btn btn-primary" type="button" value="Input">
								</p>
								<h5 class="card-title">Button States</h5>
								<p>Buttons may also appear active or disabled.</p>
								<p class="card-text">
									<a href="" onclick="return false;" class="btn btn-primary">Normal</a>
									<a href="" onclick="return false;" class="btn btn-primary active">Active</a>
									<a href="" onclick="return false;" class="btn btn-primary disabled">Disabled</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Forms -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-forms">Forms</h2>
					<p class="lead">Examples and usage guidelines for form control styles, layout options, and custom components for
						creating a wide variety of forms.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-4">
						<!-- Form Controls -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Form Controls</h5>
								<p class="card-text">Textual controls has the <code>.form-control</code> class.</p>
								<form onsubmit="return false;">
									<div class="form-group">
										<label>Email address</label>
										<input type="email" class="form-control" placeholder="name@example.com">
									</div>
									<div class="form-group">
										<label>Example select</label>
										<select class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									<div class="form-group">
										<label>Example multiple select</label>
										<select multiple class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									<div class="form-group mb-0">
										<label>Example textarea</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
								</form>
							</div>
						</div>
						<!-- File Input -->
						<div class="card mb-3">
							<div class="card-body">
								<form onsubmit="return false;">
									<div class="form-group mb-0">
										<label for="exampleFormControlFile1">Example file input</label>
										<input type="file" class="form-control-file" id="exampleFormControlFile1">
									</div>
								</form>
							</div>
						</div>
						<!-- Checkboxes and Radios -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Checkboxes and Radios</h5>
								<p class="card-text">Default stacked and inlined inputs.</p>
								<div class="row">
									<div class="col">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="def-check-1">
											<label class="form-check-label" for="def-check-1">
												Checkbox
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" value="1" id="def-radio-1">
											<label class="form-check-label" for="def-radio-1">
												Radio
											</label>
										</div>
										<div class="form-check disabled mb-0">
											<input class="form-check-input" type="checkbox" value="" id="def-check-2" disabled>
											<label class="form-check-label" for="def-check-2">
												Disabled
											</label>
										</div>
									</div>
									<div class="col">
										<div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="inline-check-1">
												<label class="form-check-label" for="inline-check-1">
													Inline
												</label>
											</div>
											<div class="form-check form-check-inline disabled">
												<input class="form-check-input" type="checkbox" id="inline-check-2" disabled>
												<label class="form-check-label" id="inline-check-2">2</label>
											</div>
										</div>
										<div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="inlineRadioOptions" value="1" id="inline-radio-1">
												<label class="form-check-label" id="inline-radio-1">
													Inline
												</label>
											</div>
											<div class="form-check form-check-inline disabled">
												<input class="form-check-input" type="radio" name="inlineRadioOptions" value="2" id="inline-radio-2"
												disabled>
												<label class="form-check-label" id="inline-radio-2">2</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Sizing -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Sizing</h5>
								<p class="card-text">Set size with <code>.form-control-lg</code> and <code>.form-control-sm</code>.</p>
								<form onsubmit="return false;">
									<div class="form-group">
										<input class="form-control form-control-lg mb-1" type="text" placeholder=".form-control-lg">
										<input class="form-control mb-1" type="text" placeholder="Default input">
										<input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
									</div>
								</form>
								<p class="cart-text"><code>&lt;select&gt;</code> can be sized too:</p>
								<form onsubmit="return false;">
									<div class="form-group mb-0">
										<select class="form-control form-control-lg mb-1">
											<option>Large select</option>
										</select>
										<select class="form-control mb-1">
											<option>Default select</option>
										</select>
										<select class="form-control form-control-sm">
											<option>Small select</option>
										</select>
									</div>
								</form>
							</div>
						</div>
						<!-- Disabled Form -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Disabled Form</h5>
								<p class="card-text">Add the disabled attribute to a <code>&lt;fieldset&gt;</code>.</p>
								<form onsubmit="return false;">
									<fieldset disabled>
										<div class="form-group">
											<label>Disabled input</label>
											<input type="text" class="form-control" value="Disabled input">
										</div>
										<div class="form-group">
											<label>Disabled select</label>
											<select class="form-control">
												<option>Disabled select</option>
											</select>
										</div>
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="dis-check-1">
												<label class="form-check-label" for="dis-check-1">
													Can't check this
												</label>
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Submit</button>
									</fieldset>
								</form>
							</div>
						</div>
						<!-- Input Groups -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Input Groups</h5>
								<p class="card-text">Extend form controls by adding things.</p>
								<form onsubmit="return false;">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">$</span>
											</span>
											<input type="text" class="form-control">
											<span class="input-group-append">
												<span class="input-group-text">.00</span>
											</span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<input type="checkbox">
												</span>
											</span>
											<input type="text" class="form-control">
											<span class="input-group-append">
												<button class="btn btn-secondary" type="button">Go!</button>
											</span>
										</div>
									</div>
									<div class="form-group mb-0">
										<div class="input-group">
											<input type="text" class="form-control">
											<div class="input-group-append">
												<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
													Action
												</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="" onclick="return false;">Action</a>
													<a class="dropdown-item" href="" onclick="return false;">Another action</a>
													<a class="dropdown-item" href="" onclick="return false;">Something else here</a>
													<div role="separator" class="dropdown-divider"></div>
													<a class="dropdown-item" href="" onclick="return false;">Separated link</a>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<!-- Inline Form -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Inline Form</h5>
								<p class="card-text">Use the <code>.form-inline</code> class to display a series of labels, form controls, and
									buttons on a single row.</p>
								<form onsubmit="return false;" class="form-inline flex-nowrap flex-column align-items-stretch flex-sm-row align-items-sm-start">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Jane Doe">
									<div class="input-group mb-2 mr-sm-2 mb-sm-0">
										<div class="input-group-prepend">
											<span class="input-group-text">@</span>
										</div>
										<input type="text" class="form-control" placeholder="Username">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
						<!-- Horizontal Form -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Horizontal Form</h5>
								<p class="card-text">Create horizontal forms with the grid by adding the <code>.row</code> class to form
									groups.</p>
								<form onsubmit="return false;">
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Email</label>
										<div class="col-md-10">
											<input type="email" class="form-control" placeholder="Email">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Password</label>
										<div class="col-md-8">
											<input type="password" class="form-control" placeholder="Password">
										</div>
									</div>
									<fieldset class="form-group">
										<div class="row">
											<legend class="col-form-label col-md-2">Radios</legend>
											<div class="col-md-10">
												<div class="form-check form-check-inline my-1">
													<input class="form-check-input" type="radio" name="gridRadios" value="1" id="h-form-check-1" checked>
													<label class="form-check-label" for="h-form-check-1">
														Option
													</label>
												</div>
												<div class="form-check form-check-inline my-1">
													<input class="form-check-input" type="radio" name="gridRadios" value="2" id="h-form-check-2">
													<label class="form-check-label" for="h-form-check-2">
														Another Option
													</label>
												</div>
											</div>
										</div>
									</fieldset>
									<div class="form-group row">
										<label class="col-md-2 col-form-label">Checkbox</label>
										<div class="col-md-10">
											<div class="form-check my-1">
												<input class="form-check-input" type="checkbox" id="h-form-check-3">
												<label class="form-check-label" for="h-form-check-3">
													Check This
												</label>
											</div>
										</div>
									</div>
									<hr class="mb-3">
									<div class="form-group row mb-0">
										<div class="col-md-10">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- Layout -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Layouts</h5>
								<p class="card-text">Forms can be built using grid classes.</p>
								<form onsubmit="return false;" class="mb-3">
									<div class="row">
										<div class="col">
											<input type="text" class="form-control" placeholder="First name">
										</div>
										<div class="col">
											<input type="text" class="form-control" placeholder="Middle name">
										</div>
										<div class="col">
											<input type="text" class="form-control" placeholder="Last name">
										</div>
									</div>
								</form>
								<p class="card-text">Swap <code>.row</code> for <code>.form-row</code> for tighter and more compact layouts.</p>
								<form onsubmit="return false;">
									<div class="form-row">
										<div class="col">
											<input type="text" class="form-control" placeholder="First name">
										</div>
										<div class="col">
											<input type="text" class="form-control" placeholder="Middle name">
										</div>
										<div class="col">
											<input type="text" class="form-control" placeholder="Last name">
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- Help Text -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Help Text</h5>
								<p class="card-text">Block-level help text in forms can be created using <code>.form-text</code>.</p>
								<form onsubmit="return false;" class="mb-3">
									<label>Password</label>
									<input type="password" class="form-control">
									<small class="form-text text-muted">
										Your password must be 8-20 characters long, contain letters and numbers, and must not contain emoji.
									</small>
								</form>
								<hr class="mb-3">
								<p class="card-text">Inline form can use any typical inline HTML element (<code>span</code>, <code>small</code>,
									etc).</p>
								<form onsubmit="return false;" class="form-inline">
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="form-control mx-sm-3" value="password">
										<small class="text-muted">
											Must be 8-20 characters long.
										</small>
									</div>
								</form>
							</div>
						</div>
						<!-- Control States -->
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Control States</h5>
								<p class="card-text">Provide valuable, actionable feedback to your users with Bootstrap's validation styles.</p>
								<div class="row">
									<div class="col-sm-4">
										<form onsubmit="return false;">
											<div class="form-group">
												<input class="form-control" type="text" value="Disabled" disabled>
											</div>
											<div class="form-group">
												<input class="form-control is-invalid" type="text" value="Invalid">
											</div>
											<div class="form-group">
												<input class="form-control is-valid" type="text" value="Valid">
											</div>
										</form>
									</div>
									<div class="col-sm-4">
										<form onsubmit="return false;">
											<div class="form-group">
												<select class="form-control" disabled>
													<option value="">Disabled</option>
													<option value="1">One</option>
													<option value="2">Two</option>
													<option value="3">Three</option>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control is-invalid">
													<option value="">Invalid</option>
													<option value="1">One</option>
													<option value="2">Two</option>
													<option value="3">Three</option>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control is-valid">
													<option value="">Valid</option>
													<option value="1">One</option>
													<option value="2">Two</option>
													<option value="3">Three</option>
												</select>
											</div>
										</form>
									</div>
									<div class="col-sm-4">
										<form onsubmit="return false;">
											<div class="form-group">
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="checkbox" class="form-check-input position-static" value="" id="states-check-1" disabled>
												</div>
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="radio" class="form-check-input" value="" id="states-check-2" disabled>
													<label class="form-check-label" for="states-check-2">
														Disabled
													</label>
												</div>
											</div>
											<div class="form-group">
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="checkbox" class="form-check-input position-static is-invalid" value="" id="states-check-3">
												</div>
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="radio" class="form-check-input is-invalid" value="" id="states-check-4">
													<label class="form-check-label" for="states-check-4">
														Invalid
													</label>
												</div>
											</div>
											<div class="form-group">
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="checkbox" class="form-check-input position-static is-valid" value="" id="states-check-5">
												</div>
												<div class="form-check form-check-inline my-1 mr-0">
													<input type="radio" class="form-check-input is-valid" value="" id="states-check-6">
													<label class="form-check-label" for="states-check-6">
														Valid
													</label>
												</div>
											</div>
										</form>
									</div>
								</div>
								<hr class="mb-3">
								<h5 class="card-title">Custom Forms</h5>
								<p class="card-text">For even more customization use completely custom form elements.</p>
								<div class="row">
									<div class="col-md-4 mb-3 mb-md-0">
										<div class="form-group">
											<label>Select Menu</label>
											<select class="custom-select w-100">
												<option selected>Default</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="form-group">
											<select class="custom-select w-100" disabled>
												<option selected>Disabled</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="form-group">
											<select class="custom-select w-100 is-invalid">
												<option selected>Invalid</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
										<div class="form-group mb-0">
											<select class="custom-select w-100 is-valid">
												<option selected>Valid</option>
												<option value="1">One</option>
												<option value="2">Two</option>
												<option value="3">Three</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
										<label>File Input</label>
										<div class="form-group">
											<div class="custom-file w-100">
												<input type="file" class="custom-file-input" id="c-file-1">
												<label class="custom-file-label" for="c-file-1">Choose File</label>
											</div>
										</div>
										<div class="form-group">
											<div class="custom-file w-100">
												<input type="file" class="custom-file-input" id="c-file-2" disabled>
												<label class="custom-file-label" for="c-file-2">Choose File</label>
											</div>
										</div>
										<div class="form-group">
											<div class="custom-file w-100">
												<input type="file" class="custom-file-input is-invalid" id="c-file-3">
												<label class="custom-file-label" for="c-file-3">Choose File</label>
											</div>
										</div>
										<div class="form-group mb-0">
											<div class="custom-file w-100">
												<input type="file" class="custom-file-input is-valid" id="c-file-4">
												<label class="custom-file-label" for="c-file-4">Choose File</label>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<label class="d-block">Check and Radio</label>
										<div class="form-group">
											<div class="custom-control custom-checkbox custom-control-inline my-1">
												<input type="checkbox" class="custom-control-input" id="c-check-1">
												<label class="custom-control-label" for="c-check-1">Checkbox</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline my-1">
												<input type="radio" class="custom-control-input" id="c-check-2">
												<label class="custom-control-label" for="c-check-2">Radio</label>
											</div>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox custom-control-inline my-1">
												<input type="checkbox" class="custom-control-input" id="c-check-3" disabled>
												<label class="custom-control-label" for="c-check-3">Checkbox</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline my-1">
												<input type="radio" class="custom-control-input" id="c-check-4" disabled>
												<label class="custom-control-label" for="c-check-4">Radio</label>
											</div>
										</div>
										<div class="form-group">
											<div class="custom-control custom-checkbox custom-control-inline my-1">
												<input type="checkbox" class="custom-control-input is-invalid" id="c-check-5">
												<label class="custom-control-label" for="c-check-5">Checkbox</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline my-1">
												<input type="radio" class="custom-control-input is-invalid" id="c-check-6">
												<label class="custom-control-label" for="c-check-6">Radio</label>
											</div>
										</div>
										<div class="form-group mb-0">
											<div class="custom-control custom-checkbox custom-control-inline my-1">
												<input type="checkbox" class="custom-control-input is-valid" id="c-check-7">
												<label class="custom-control-label" for="c-check-7">Checkbox</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline my-1">
												<input type="radio" class="custom-control-input is-valid" id="c-check-8">
												<label class="custom-control-label" for="c-check-8">Radio</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modals -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-modal">Modals</h2>
					<p class="lead">Add dialogs to your site for lightboxes, user notifications, or completely custom content.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Live Demo</h5>
								<p class="card-text">Toggle a working modal demo by clicking the button below.</p>
								<p class="card-text mb-0">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demo-modal">Demo modal</button>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#long-modal">Long modal</button>
								</p>
								<!-- Demo Modal -->
								<div class="modal fade" id="demo-modal" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="mb-0">Woohoo, you're reading this text in a modal!</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary">Save changes</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Long Modal -->
								<div class="modal fade" id="long-modal" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
												<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget
													quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
												<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue
													laoreet rutrum faucibus dolor auctor.</p>
												<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl
													consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary">Save changes</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Sizing</h5>
								<p class="card-text">Modals have two optional sizes, available via modifier classes.</p>
								<p class="card-text mb-0">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#large-modal">Large modal</button>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#small-modal">Small modal</button>
								</p>
								<!-- Large Modal -->
								<div class="modal fade" id="large-modal" tabindex="-1" role="dialog">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="mb-0">Woohoo, you're reading this text in a large modal!</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary">Save changes</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Long Modal -->
								<div class="modal fade" id="small-modal" tabindex="-1" role="dialog">
									<div class="modal-dialog modal-sm" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p class="mb-0">Hey, it's a small modal!</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary">Save changes</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Modal Components</h5>
								<p class="card-text">Below is a static modal example. Included are the modal header, modal body, and modal
									footer.</p>
								<div class="">
									<div class="modal static-modal px-1 px-sm-3 px-md-0">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Modal Title</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="mb-0">Modal body text goes here.</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Save changes</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Popovers -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-popovers">Popovers</h2>
					<p class="lead">Bootstrap popovers to any element on your site.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Live Demo</h5>
								<p class="card-text">Click the button below to toggle popover.</p>
								<button type="button" class="btn btn-primary" data-toggle="popover" data-placement="auto" data-title="Popover Title"
								data-content="And here's some amazing content. It's very engaging. Right?">Toggle Popover</button>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Four Directions</h5>
								<p class="card-text">Click the button below to toggle popover.</p>
								<p class="card-text">
									<button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="top" data-title="Popover on Top"
									data-trigger="hover" data-content="And here's some amazing content. It's very engaging. Right?">Top Popover</button>
									<button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="right" data-title="Popover on Right"
									data-trigger="hover" data-content="And here's some amazing content. It's very engaging. Right?">Right Popover</button>
									<button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="left" data-title="Popover on Left"
									data-trigger="hover" data-content="And here's some amazing content. It's very engaging. Right?">Left Popover</button>
									<button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="bottom" data-title="Popover on Bottom"
									data-trigger="hover" data-content="And here's some amazing content. It's very engaging. Right?">Bottom Popover</button>
								</p>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Dismissible</h5>
								<p class="card-text">The <code>focus</code> trigger hide popover on next click.</p>
								<button type="button" class="btn btn-secondary" data-toggle="popover" data-placement="auto" data-title="Popover Title"
								data-trigger="focus" data-content="And here's some amazing content. It's very engaging. Right?">Top Popover</button>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Static Popovers</h5>
								<p class="card-text">Four options are available: top, right, bottom, and left aligned.</p>
								<div class="bg-light d-flex flex-wrap justify-content-center" style="padding: 1rem 0;">
									<div class="popover bs-popover-top static-popover m-3">
										<div class="arrow"></div>
										<h3 class="popover-header">Popover Top</h3>
										<div class="popover-body">Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare
											sem lacinia quam venenatis vestibulum.</div>
									</div>

									<div class="popover bs-popover-right static-popover m-3">
										<div class="arrow"></div>
										<h3 class="popover-header">Popover Right</h3>
										<div class="popover-body">Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare
											sem lacinia quam venenatis vestibulum.</div>
									</div>

									<div class="popover bs-popover-bottom static-popover m-3">
										<div class="arrow"></div>
										<h3 class="popover-header">Popover Bottom</h3>
										<div class="popover-body">Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare
											sem lacinia quam venenatis vestibulum.</div>
									</div>

									<div class="popover bs-popover-left static-popover m-3">
										<div class="arrow"></div>
										<h3 class="popover-header">Popover Left</h3>
										<div class="popover-body">Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare
											sem lacinia quam venenatis vestibulum.</div>
									</div>

									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Tooltips -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-tooltips">Tooltips</h2>
					<p class="lead">Add small overlays of content for housing secondary information.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Live Demo</h5>
								<p class="card-text">Hover over the buttons below to see their tooltips.</p>
								<p class="card-text">
									<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="I'm a tooltip!">Left</button>
									<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="I'm a tooltip!">Top</button>
									<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="I'm a tooltip!">Bottom</button>
									<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" title="I'm a tooltip!">Right</button>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Static Demo</h5>
								<p class="card-text">Four options are available: top, right, bottom, and left aligned.</p>
								<div class="">
									<div class="tooltip bs-tooltip-top static-tooltip" role="tooltip">
										<div class="arrow"></div>
										<div class="tooltip-inner">
											Tooltip on the top
										</div>
									</div>
									<div class="tooltip bs-tooltip-right static-tooltip" role="tooltip">
										<div class="arrow"></div>
										<div class="tooltip-inner">
											Tooltip on the right
										</div>
									</div>
									<div class="tooltip bs-tooltip-bottom static-tooltip" role="tooltip">
										<div class="arrow"></div>
										<div class="tooltip-inner">
											Tooltip on the bottom
										</div>
									</div>
									<div class="tooltip bs-tooltip-left static-tooltip" role="tooltip">
										<div class="arrow"></div>
										<div class="tooltip-inner">
											Tooltip on the left
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Navbars -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-navigation">Navbars</h2>
					<p class="lead">Bootstrap's powerful, responsive navigation header.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="row">
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Brand</h5>
										<p class="card-text">A link, a heading and an image:</p>
										<nav class="navbar navbar-light bg-light mb-2">
											<a class="navbar-brand" href="" onclick="return false;">Navbar</a>
										</nav>
										<nav class="navbar navbar-light bg-light mb-2">
											<span class="h1 navbar-brand mb-0">Navbar</span>
										</nav>
										<nav class="navbar navbar-light bg-light">
											<a class="navbar-brand" href="" onclick="return false;">
												<img src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top"
												alt="">
												<span class="align-middle">Bootstrap</span>
											</a>
										</nav>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Forms and Text</h5>
										<p class="card-text">Place various form controls.</p>
										<nav class="navbar navbar-light bg-light mb-2">
											<form class="form-inline flex-nowrap">
												<div class="mr-2">
													<input class="form-control w-100" type="text" placeholder="Search">
												</div>
												<button class="btn btn-outline-success" type="button">Go</button>
											</form>
										</nav>
										<nav class="navbar navbar-light bg-light mb-2">
											<form class="form-inline">
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">@</span>
													</span>
													<input type="text" class="form-control" placeholder="Username">
												</div>
											</form>
										</nav>
										<nav class="navbar navbar-light bg-light mb-1">
											<span class="navbar-text">
												Inline text element
											</span>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Examples</h5>
								<p class="card-text">Here are some examples of sub-components included in a responsive navbar that
									automatically collapses at the <code>lg</code> breakpoint.</p>
								<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
									<a class="navbar-brand" href="" onclick="return false;">Navbar</a>

									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-1">
										<span class="navbar-toggler-icon"></span>
									</button>


									<div class="collapse navbar-collapse" id="navbar-1">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item active">
												<a class="nav-link" href="" onclick="return false;">Home</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false;">Link</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
													Dropdown link
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="">Action</a>
													<a class="dropdown-item" href="">Another action</a>
													<a class="dropdown-item" href="">Something else here</a>
												</div>
											</li>
											<li class="nav-item">
												<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
											</li>
										</ul>
										<form class="form-inline my-2 my-lg-0 flex-nowrap">
											<div class="mr-2">
												<input class="form-control mr-0" type="text" placeholder="Search">
											</div>
											<button class="btn btn-success my-2 my-sm-0" type="button">Go</button>
										</form>
									</div>
								</nav>
								<h5 class="card-title">Color Themes</h5>
								<p class="card-text">Theming the navbar has never been easier thanks to the combination of theming classes and
									<code>background-color</code> utilities.</p>
								<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
									<a class="navbar-brand" href="" onclick="return false;">Navbar</a>

									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-2">
										<span class="navbar-toggler-icon"></span>
									</button>

									<div class="collapse navbar-collapse" id="navbar-2">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item active">
												<a class="nav-link" href="" onclick="return false;">Home</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false;">Link</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
													Dropdown link
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="">Action</a>
													<a class="dropdown-item" href="">Another action</a>
													<a class="dropdown-item" href="">Something else here</a>
												</div>
											</li>
											<li class="nav-item">
												<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
											</li>
										</ul>
										<form onsubmit="return false;" class="form-inline my-2 my-lg-0 flex-nowrap">
											<div class="mr-2">
												<input class="form-control mr-0" type="text" placeholder="Search">
											</div>
											<button class="btn btn-light my-2 my-sm-0" type="button">Go</button>
										</form>
									</div>
								</nav>
								<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2">
									<a class="navbar-brand" href="" onclick="return false;">Navbar</a>

									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-3">
										<span class="navbar-toggler-icon"></span>
									</button>

									<button v-b-toggle.navbarSupportedContent class="navbar-toggler" type="button">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbar-3">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item active">
												<a class="nav-link" href="" onclick="return false;">Home</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false;">Link</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
													Dropdown link
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="">Action</a>
													<a class="dropdown-item" href="">Another action</a>
													<a class="dropdown-item" href="">Something else here</a>
												</div>
											</li>
											<li class="nav-item">
												<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
											</li>
										</ul>
										<form onsubmit="return false" class="form-inline my-2 my-lg-0 flex-nowrap">
											<div class="mr-2">
												<input class="form-control mr-0" type="text" placeholder="Search">
											</div>
											<button class="btn btn-light my-2 my-sm-0" type="button">Go</button>
										</form>
									</div>
								</nav>
								<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-2">
									<a class="navbar-brand" href="" onclick="return false;">Navbar</a>

									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-4">
										<span class="navbar-toggler-icon"></span>
									</button>

									<div class="collapse navbar-collapse" id="navbar-4">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item active">
												<a class="nav-link" href="" onclick="return false;">Home</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false;">Link</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
													Dropdown link
												</a>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="">Action</a>
													<a class="dropdown-item" href="">Another action</a>
													<a class="dropdown-item" href="">Something else here</a>
												</div>
											</li>
											<li class="nav-item">
												<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
											</li>
										</ul>
										<form onsubmit="retun false;" class="form-inline my-2 my-lg-0 flex-nowrap">
											<div class="mr-2">
												<input class="form-control mr-0" type="text" placeholder="Search">
											</div>
											<button class="btn btn-light my-2 my-sm-0" type="button">Go</button>
										</form>
									</div>
								</nav>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Responsive Behaviors</h5>
								<p class="card-text">With Bootstrap's <code>utilities</code>, you can easily choose when to show or hide
									particular navbar elements.</p>
								<div class="row">
									<div class="col-md-4 mb-3 mb-md-0">
										<nav class="navbar navbar-light bg-light">
											<a class="navbar-brand" href="" onclick="return false;">Navbar</a>

											<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-5" aria-expanded="false"
											aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
											</button>

											<div class="collapse navbar-collapse" id="navbar-5">
												<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
													<li class="nav-item active">
														<a class="nav-link" href="" onclick="return false;">Home</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="" onclick="return false;">Link</a>
													</li>
													<li class="nav-item">
														<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
													</li>
												</ul>
												<form onsubmit="return false" class="form-inline my-2 my-lg-0 flex-nowrap">
													<div class="pr-2">
														<input class="form-control w-100" type="text" placeholder="Search">
													</div>
													<button class="btn btn-outline-success my-2 my-sm-0" type="button">Go</button>
												</form>
											</div>
										</nav>
									</div>
									<div class="col-md-4 mb-3 mb-md-0">
										<nav class="navbar navbar-light bg-light">

											<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-6" aria-expanded="false"
											aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
											</button>

											<div class="collapse navbar-collapse" id="navbar-6">
												<a class="navbar-brand" href="" onclick="return false;">Hidden brand</a>
												<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
													<li class="nav-item active">
														<a class="nav-link" href="" onclick="return false;">Home</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="" onclick="return false;">Link</a>
													</li>
													<li class="nav-item">
														<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
													</li>
												</ul>
												<form onsubmit="return false" class="form-inline my-2 my-lg-0 flex-nowrap">
													<div class="pr-2">
														<input class="form-control w-100" type="text" placeholder="Search">
													</div>
													<button class="btn btn-outline-success my-2 my-sm-0" type="button">Go</button>
												</form>
											</div>
										</nav>
									</div>
									<div class="col-md-4">
										<nav class="navbar navbar-light bg-light">

											<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-7" aria-expanded="false"
											aria-label="Toggle navigation">
												<span class="navbar-toggler-icon"></span>
											</button>

											<a class="navbar-brand" href="" onclick="return false;">Navbar</a>
											<div class="collapse navbar-collapse" id="navbar-7">
												<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
													<li class="nav-item active">
														<a class="nav-link" href="" onclick="return false;">Home</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="" onclick="return false;">Link</a>
													</li>
													<li class="nav-item">
														<a class="nav-link disabled" href="" onclick="return false;">Disabled</a>
													</li>
												</ul>
												<form onsubmit="return false" class="form-inline my-2 my-lg-0 flex-nowrap">
													<div class="pr-2">
														<input class="form-control w-100" type="text" placeholder="Search">
													</div>
													<button class="btn btn-outline-success my-2 my-sm-0" type="button">Go</button>
												</form>
											</div>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Navs -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2>Navs</h2>
					<p class="lead">Bootstrap's included navigation components.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="row">
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Vertical Nav</h5>
										<p class="card-text">Stack your navigation.</p>
										<ul class="nav flex-column">
											<li class="nav-item">
												<a class="nav-link active" href="" onclick="return false">Active</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false">Link</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="" onclick="return false">Link</a>
											</li>
											<li class="nav-item">
												<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Vertical Pills</h5>
										<p class="card-text">Stack your pills.</p>
										<div class="nav flex-column nav-pills">
											<a class="nav-link active" href="" onclick="return false">Home</a>
											<a class="nav-link" href="" onclick="return false">Profile</a>
											<a class="nav-link" href="" onclick="return false">Messages</a>
											<a class="nav-link" href="" onclick="return false">Settings</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Basic Nav</h5>
								<p class="card-text">The base <code>.nav</code> component provide a strong foundation for building navigation
									components.</p>
								<ul class="nav">
									<li class="nav-item">
										<a class="nav-link active" href="" onclick="return false">Active</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="" onclick="return false">Link</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="" onclick="return false">Link</a>
									</li>
									<li class="nav-item">
										<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
									</li>
								</ul>
								<hr class="mt-2 mb-3">
								<h5 class="card-title">Flexible Markup</h5>
								<p class="card-text">Nav could be a regular <code>ul</code> list as well as a custom <code>.nav</code> element
									with anchor items.</p>
								<nav class="nav">
									<a class="nav-link active" href="" onclick="return false">Active</a>
									<a class="nav-link" href="" onclick="return false">Link</a>
									<a class="nav-link" href="" onclick="return false">Link</a>
									<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
								</nav>
							</div>
						</div>
						<div class="card-deck mb-3 flex-column flex-md-row">
							<div class="card mb-3 mb-md-0">
								<div class="card-body">
									<h5 class="card-title">Tabs</h5>
									<p class="card-text">Add the <code>.nav-tabs</code> to get a tabbed interface.</p>
									<ul class="nav nav-tabs mb-3">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
										</li>
									</ul>
									<p class="card-text">Tabs with dropdowns:</p>
									<ul class="nav nav-tabs">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false">Active</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Dropdown</a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="">Action</a>
												<a class="dropdown-item" href="">Another action</a>
												<a class="dropdown-item" href="">Something else here</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="">Separated link</a>
											</div>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Pills</h5>
									<p class="card-text">Use <code>.nav-pills</code> instead:</p>
									<ul class="nav nav-pills mb-3">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false">Active</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
										</li>
									</ul>
									<p class="card-text">Pills with dropdowns:</p>
									<ul class="nav nav-pills">
										<li class="nav-item">
											<a class="nav-link active" href="" onclick="return false">Active</a>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true"
											aria-expanded="false">Dropdown</a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="">Action</a>
												<a class="dropdown-item" href="">Another action</a>
												<a class="dropdown-item" href="">Something else here</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="">Separated link</a>
											</div>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="" onclick="return false">Link</a>
										</li>
										<li class="nav-item">
											<a class="nav-link disabled" href="" onclick="return false">Disabled</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Fade Effect</h5>
								<p class="card-text">Easy make tabs fade in with <code>.fade</code> class.</p>
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tabs-first" role="tab" aria-controls="tsbd-first"
										aria-selected="true">First</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tabs-second" role="tab" aria-controls="tabs-second"
										aria-selected="false">Second</a>
									</li>
									<li class="nav-item">
										<a class="nav-link disabled" data-toggle="tab" href="#tabs-disabled" role="tab" aria-controls="tabsdisabled"
										aria-selected="false">Disabled</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="tabs-first" role="tabpanel">
										<p class="mt-2">Navigation available in Bootstrap share general markup and styles, from the base <code>.nav</code>
											class to the active and disabled states. Swap modifier classes to switch between each style.</p>
									</div>
									<div class="tab-pane fade" id="tabs-second" role="tabpanel">
										<p class="mt-2">The base <code>.nav</code> component is built with flexbox and provide a strong foundation
											for building all types of navigation components. It includes some style overrides (for working with lists).</p>
									</div>
									<div class="tab-pane fade" id="tabs-disabled" role="tabpanel">
										<p class="mt-2">Disabled tab!</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Dropdowns -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-dropdowns">Dropdowns</h2>
					<p class="lead">Toggle contextual overlays for displaying lists of links and more with the Bootstrap dropdown
						plugin.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-3">
						<div class="row">
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Menu Headers</h5>
										<p class="card-text">Add a header to label sections.</p>
										<div class="dropdown-menu w-100 mb-md-3 mb-lg-0" style="position: static; display: block;">
											<h6 class="dropdown-header">Dropdown header</h6>
											<a class="dropdown-item" href="" onclick="return false">Action</a>
											<a class="dropdown-item disabled" href="" onclick="return false">Disabled</a>
											<a class="dropdown-item" href="" onclick="return false">Another action</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-12">
								<div class="card mb-3">
									<div class="card-body">
										<h5 class="card-title">Menu Dividers</h5>
										<p class="card-text">Separate related menu items.</p>
										<div class="dropdown-menu w-100" style="position: static; display: block;">
											<a class="dropdown-item" href="" onclick="return false">Action</a>
											<a class="dropdown-item" href="" onclick="return false">Another action</a>
											<a class="dropdown-item" href="" onclick="return false">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="" onclick="return false">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Examples</h5>
								<p class="card-text">Dropdowns are toggleable, contextual overlays for displaying lists of links and more.</p>
								<div style="margin-bottom: 1rem">
									<div class="btn-group">
										<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
								</div>
								<p class="card-text">Create split button dropdowns with the addition <code>.dropdown-toggle-split</code>
									element.</p>
								<div>
									<div class="btn-group">
										<button type="button" class="btn btn-primary">Action</button>
										<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-secondary">Action</button>
										<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-success">Action</button>
										<button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-info">Action</button>
										<button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-warning">Action</button>
										<button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-danger">Action</button>
										<button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Menu Variations</h5>
								<p class="card-text">Dropdown menus can be triggered above elements, contains <code>buttons</code> as items and
									be align along the right side.</p>
								<div style="margin-bottom: 1rem">
									<div class="btn-group dropup">
										<button type="button" class="btn btn-secondary">Dropup</button>
										<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group dropup mr-2">
										<button type="button" class="btn btn-secondary">
											Split Dropup
										</button>
										<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group mr-2">
										<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Button Items
										</button>
										<div class="dropdown-menu">
											<button class="dropdown-item" type="button">Action</button>
											<button class="dropdown-item" type="button">Another action</button>
											<button class="dropdown-item" type="button">Something else here</button>
										</div>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Right Align
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<button class="dropdown-item" type="button">Action</button>
											<button class="dropdown-item" type="button">Another action</button>
											<button class="dropdown-item" type="button">Something else here</button>
										</div>
									</div>
								</div>
								<h5 class="card-title">Sizing</h5>
								<p class="card-text">Button dropdowns work with buttons of all sizes, including default and split dropdown
									buttons.</p>
								<div>
									<div class="btn-group align-bottom">
										<button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Large
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group align-bottom mr-2">
										<button class="btn btn-secondary btn-lg" type="button">
											Split Large
										</button>
										<button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>

									<div class="btn-group align-bottom">
										<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Normal
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group align-bottom mr-2">
										<button class="btn btn-secondary" type="button">
											Split Normal
										</button>
										<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>

									<div class="btn-group align-bottom">
										<button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											Small
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
									<div class="btn-group align-bottom mr-2">
										<button class="btn btn-sm btn-secondary" type="button">
											Split Small
										</button>
										<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="">Action</a>
											<a class="dropdown-item" href="">Another action</a>
											<a class="dropdown-item" href="">Something else here</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="">Separated link</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- List Groups -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-list-groups">List Groups</h2>
					<p class="lead">Flexible and powerful component for displaying a series of content.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Badges</h5>
								<p class="card-text">Add badges to any list group item with the help of some <code>utilities</code>.</p>
								<div class="list-group">
									<a href="" onclick="return false" class="list-group-item d-flex justify-content-between align-items-center active">
										Notifications
										<span class="badge badge-light badge-pill">14</span>
									</a>
									<a href="" onclick="return false" class="list-group-item d-flex justify-content-between align-items-center">
										Messages
										<span class="badge badge-primary badge-pill">2</span>
									</a>
									<a href="" onclick="return false" class="list-group-item d-flex justify-content-between align-items-center">
										Tasks
										<span class="badge badge-primary badge-pill">1</span>
									</a>
									<a href="" onclick="return false" class="list-group-item d-flex justify-content-between align-items-center">
										Settings
										<span class="badge badge-primary badge-pill"></span>
									</a>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Custom Content</h5>
								<p class="card-text">Add nearly any HTML within.</p>
								<div class="list-group">
									<a href="" onclick="return false" class="list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small>3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
											blandit.</p>
										<small>Donec id elit non mi porta.</small>
									</a>
									<a href="" onclick="return false" class="list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
											blandit.</p>
										<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
									<a href="" onclick="return false" class="list-group-item list-group-item-action flex-column align-items-start">
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1">List group item heading</h5>
											<small class="text-muted">3 days ago</small>
										</div>
										<p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius
											blandit.</p>
										<small class="text-muted">Donec id elit non mi porta.</small>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Items Variations</h5>
								<p class="card-text">Modify and extend items to support just about any content within.</p>
								<div class="row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<p class="card-text">Basic example:</p>
										<ul class="list-group">
											<li class="list-group-item">Dapibus ac facilisis in</li>
											<li class="list-group-item">Morbi leo risus</li>
											<li class="list-group-item disabled">Cras justo odio</li>
										</ul>
									</div>
									<div class="col-sm-6">
										<p class="card-text">Links and buttons:</p>
										<div class="list-group">
											<button type="button" class="list-group-item list-group-item-action active">Button Item</button>
											<a href="" onclick="return false" class="list-group-item list-group-item-action">Link Item</a>
											<button type="button" class="list-group-item list-group-item-action" disabled>Disabled Item</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Contextual Classes</h5>
								<p class="card-text">Use contextual classes to style list items with a stateful background and color.</p>
								<div class="row">
									<div class="col">
										<ul class="list-group">
											<li class="list-group-item list-group-item-primary">Primary list item</li>
											<li class="list-group-item list-group-item-secondary">Secondary list item</li>
											<li class="list-group-item list-group-item-success">Success list item</li>
											<li class="list-group-item list-group-item-danger">Danger list item</li>
										</ul>
									</div>
									<div class="col">
										<ul class="list-group">
											<li class="list-group-item list-group-item-warning">Warning list item</li>
											<li class="list-group-item list-group-item-info">Info list item</li>
											<li class="list-group-item list-group-item-light">Light list item</li>
											<li class="list-group-item list-group-item-dark">Dark list item</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Tabbable Panes</h5>
								<p class="card-text">Extend your list group to create tabbable panes of local content.</p>
								<div class="row">
									<div class="col-sm-3 mb-3 mb-sm-0">
										<div class="list-group">
											<a href="" onclick="return false" class="list-group-item list-group-item-action active">Home</a>
											<a href="" onclick="return false" class="list-group-item list-group-item-action">Profile</a>
											<a href="" onclick="return false" class="list-group-item list-group-item-action">Settings</a>
										</div>
									</div>
									<div class="col-sm-9">
										<div class="tab-content">
											<div class="tab-pane fade show active" id="list-home">
												<p>Velit aute mollit ipsum ad dolor consectetur nulla officia culpa adipisicing exercitation fugiat tempor.
													Voluptate deserunt sit sunt nisi aliqua fugiat proident ea ut.<br>Culpa aliquip eiusmod dolor. Anim ad
													Lorem aliqua in cupidatat nisi enim eu nostrud do aliquip veniam minim.</p>
											</div>
											<div class="tab-pane fade" id="list-profile">
												<p>Mollit voluptate reprehenderit occaecat nisi ad non minim tempor sunt voluptate consectetur exercitation
													id ut nulla. Ea et fugiat aliquip nostrud sunt incididunt consectetur.</p>
											</div>
											<div class="tab-pane fade" id="list-settings">
												<p>Culpa aliquip eiusmod dolor. Anim ad Lorem aliqua in cupidatat nisi enim eu nostrud do aliquip veniam
													minim.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Jumbotron -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-jumbotron">Jumbotron</h2>
					<p class="lead">Lightweight, flexible component for showcasing hero unit style content.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div>
					<div class="jumbotron">
						<h1 class="display-3">Hello, world!</h1>
						<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to
							featured content or information.</p>
						<hr class="my-2">
						<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
						<p class="lead">
							<a class="btn btn-primary btn-lg" href="" onclick="return false">Learn more</a>
						</p>
					</div>
					<div class="jumbotron jumbotron-fluid mb-3">
						<div class="container">
							<h1 class="display-3">Fluid Jumbo</h1>
							<p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Collapse -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-collapse">Collapse</h2>
					<p class="lead">Toggle the visibility of content across your project with a few classes and JavaScript plugins.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Accordion</h5>
								<p class="card-text">Create an accordion with cards.</p>
								<div id="accordion">
									<div class="card">
										<div class="card-header">
											<a data-toggle="collapse" href="#accordion-1" aria-expanded="true" aria-controls="accordion-1">
												Collapsible Group Item #1
											</a>
										</div>
										<div id="accordion-1" class="collapse show">
											<div class="card-body">
												Anim pariatur.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header">
											<a class="collapsed" data-toggle="collapse" href="#accordion-2" aria-expanded="false" aria-controls="accordion-2">
												Item #2
											</a>
										</div>
										<div id="accordion-2" class="collapse">
											<div class="card-body">
												Anim pariatur cliche reprehenderit, enim.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header">
											<a class="collapsed" data-toggle="collapse" href="#accordion-3" aria-expanded="false" aria-controls="accordion-3">
												Item #3
											</a>
										</div>
										<div id="accordion-3" class="collapse">
											<div class="card-body">
												Anim pariatur cliche reprehenderit, enim.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Example</h5>
								<p class="card-text">Click the buttons below to show and hide another element.</p>
								<p>
									<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapse1" aria-expanded="false" aria-controls="multiCollapse1">Toggle
										first element</a>
									<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapse2"
									aria-expanded="false" aria-controls="multiCollapse2">Toggle second element</button>
									<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse"
									aria-expanded="false" aria-controls="multiCollapse1 multiCollapse2">Toggle both elements</button>
								</p>
								<div class="row">
									<div class="col">
										<div class="collapse multi-collapse show" id="multiCollapse1">
											<div class="card card-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
												keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Anim pariatur cliche
												reprehenderit.
											</div>
										</div>
									</div>
									<div class="col">
										<div class="collapse multi-collapse show" id="multiCollapse2">
											<div class="card card-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
												keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Anim pariatur cliche
												reprehenderit.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Carousel -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-carousel">Carousel</h2>
					<p class="lead">A slideshow component for cycling through elements.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">Slides Only</h5>
								<p class="card-text">Here’s a carousel with slides only.</p>
								<div class="carousel slide" data-ride="carousel" data-interval="3000">
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Second slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Third slide">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">With Controls</h5>
								<p class="card-text">Adding controls and indicators.</p>
								<div class="carousel slide" id="carousel-indicators" data-ride="carousel" data-interval="3000">
									<ol class="carousel-indicators">
										<li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-indicators" data-slide-to="1"></li>
										<li data-target="#carousel-indicators" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="First slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Second slide">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Third slide">
										</div>
									</div>
									<a class="carousel-control-prev" href="#carousel-indicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carousel-indicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card mb-3">
							<div class="card-body">
								<h5 class="card-title">With Captions</h5>
								<p class="card-text">Add captions to your slides easily.</p>
								<div class="carousel slide" id="carousel-captions" data-ride="carousel" data-interval="3000">
									<ol class="carousel-indicators">
										<li data-target="#carousel-captions" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-captions" data-slide-to="1"></li>
										<li data-target="#carousel-captions" data-slide-to="2"></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="First slide">
											<div class="carousel-caption d-none d-md-block">
												<p>Nulla vitae elit libero.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Second slide">
											<div class="carousel-caption d-none d-md-block">
												<p>Lorem ipsum dolor sit amet.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" src="holder.js/160x90?auto=yes&theme=gray" alt="Third slide">
											<div class="carousel-caption d-none d-md-block">
												<p>Praesent commodo cursus.</p>
											</div>
										</div>
									</div>
									<a class="carousel-control-prev" href="#carousel-captions" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carousel-captions" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Typography -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-typography">Typography</h2>
					<p class="lead">Bootstrap typography, including global settings, headings, body text, lists, and more.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Headings</h5>
									<p class="card-text" style="margin-bottom: 16px;">All HTML headings, <code>&lt;h1&gt;</code> through <code>&lt;h1&gt;</code>,
										are available.</p>
									<h1>h1. Bootstrap heading</h1>
									<h2>h2. Bootstrap heading</h2>
									<h3>h3. Bootstrap heading</h3>
									<h4>h4. Bootstrap heading</h4>
									<h5>h5. Bootstrap heading</h5>
									<h6>h6. Bootstrap heading</h6>
									<hr class="mt-4 mb-3">
									<p class="card-text">Secondary Heading:</p>
									<h3>
										Display Heading
										<small class="text-muted">Secondary Text</small>
									</h3>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Display Headings</h5>
									<p class="card-text mb-0">A larger, slightly more opinionated heading style.</p>
									<h1 class="display-1">Display 1</h1>
									<h1 class="display-2">Display 2</h1>
									<h1 class="display-3">Display 3</h1>
									<h1 class="display-4">Display 4</h1>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Inline Text Elements</h5>
									<p class="card-text">Styling for common inline HTML5 elements.</p>
									<div class="bg-light p-3 rounded">
										<p>You can use the mark tag to <mark>highlight</mark> text.</p>
										<p><del>This line of text is meant to be treated as deleted text.</del></p>
										<p><s>This line of text is meant to be treated as no longer accurate.</s></p>
										<p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
										<p><u>This line of text will render as underlined</u></p>
										<p><small>This line of text is meant to be treated as fine print.</small></p>
										<p><strong>This line rendered as bold text.</strong></p>
										<p class="mb-0"><em>This line rendered as italicized text.</em></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Lead</h5>
									<p class="card-text">Make a paragraph stand out by adding <code>.lead</code>.</p>
									<p class="lead mb-0">
										Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
									</p>
									<hr class="my-3">
									<h5 class="card-title">Blockquotes</h5>
									<p class="card-text">Wrap <code>&lt;blockquote class="blockquote"&gt;</code> around any HTML as the quote.</p>
									<blockquote class="blockquote">
										<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
										<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
									</blockquote>
									<hr class="my-3">
									<h5 class="card-title">Abbreviations</h5>
									<p class="card-text" style="margin-bottom: 7px;">Stylized implementation of HTML’s <code>&lt;abbr&gt;</code>
										element — <abbr title="HyperText Markup Language" class="initialism">HTML</abbr>.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Inline Code</h5>
									<p class="card-text">Wrap inline snippets of code with <code>&lt;code&gt;</code>.</p>
									<hr class="my-3">
									<h5 class="card-title">Code Blocks</h5>
									<p class="card-text">Use <code>&lt;pre&gt;</code>s for multiple lines of code.</p>
									<pre class="mb-0"><code>&lt;p&gt;Sample text here...&lt;/p&gt;<br>&lt;p&gt;And another line of sample text here...&lt;/p&gt;</code></pre>
									<hr class="my-3">
									<h5 class="card-title">Variables</h5>
									<p class="card-text">For indicating variables use the <code>&lt;var&gt;</code> tag: <var>y</var> = <var>m</var><var>x</var>
										+ <var>b</var></p>
									<hr class="my-3">
									<h5 class="card-title">User Input</h5>
									<p class="card-text">Use the <code>&lt;kbd&gt;</code> to indicate input that is typically entered via
										keyboard.</p>
									<p class="card-text">
										Type <kbd>cd</kbd> followed by the name of the directory.<br>
										To edit settings, press <kbd><kbd>ctrl</kbd> + <kbd>,</kbd></kbd>
									</p>
									<hr class="my-3">
									<h5 class="card-title">Sample Output</h5>
									<p class="card-text">For indicating sample output from a program use the <code>&lt;samp&gt;</code> tag.</p>
									<p class="card-text">
										<samp>This text is meant to be treated as sample output.</samp>
									</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Image Thumbnails</h5>
									<p class="card-text">Use <code>.img-thumbnail</code> to give an image a rounded border appearance.</p>
									<div class="d-flex justify-content-around flex-column flex-sm-row">
										<img class="img-thumbnail" src="holder.js/200x200?theme=gray">
										<img class="img-thumbnail d-none d-sm-block" src="holder.js/200x200?theme=gray">
									</div>
									<hr class="my-3">
									<h5 class="card-title">Responsive Images</h5>
									<p class="card-text">Responsive scales with the parent element.</p>
									<div class="">
										<img class="img-fluid w-100" src="holder.js/160x90?auto=yes&theme=gray">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Figures</h5>
									<p class="card-text">Displaying related images and text with the figure component in Bootstrap</p>
									<div class="row">
										<div class="col">
											<figure class="figure w-100 mb-0">
												<img class="figure-img img-fluid rounded w-100" src="holder.js/160x90?auto=yes&theme=gray">
												<figcaption class="figure-caption">A caption for the above image.</figcaption>
											</figure>
										</div>
										<div class="col">
											<figure class="figure w-100 mb-0">
												<img class="figure-img img-fluid rounded w-100" src="holder.js/160x90?auto=yes&theme=gray">
												<figcaption class="figure-caption text-right">A caption for the above image.</figcaption>
											</figure>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Tables -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-tables">Tables</h2>
					<p class="lead">Examples for opt-in styling of tables.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div>
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Basic Markup</h5>
									<p class="card-text">Here’s how <code>.table</code>-based tables look in Bootstrap. You can also invert the
										colors with <code>.table-dark</code>.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table mb-3 mb-lg-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table table-dark">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<hr class="my-3">
									<h5 class="card-title">Head Options</h5>
									<p class="card-text">Use one of two modifier classes to make <code>&lt;thead&gt;</code>s appear light or dark
										gray.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table mb-3 mb-lg-0">
													<thead class="thead-default">
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table mb-0">
													<thead class="thead-dark">
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Striped Rows</h5>
									<p class="card-text">Use <code>.table-striped</code> to add zebra-striping to any table row within the <code>&lt;tbody&gt;</code>.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-striped mb-3 mb-lg-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table table-striped table-dark">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Larry</td>
															<td>the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<hr class="my-3">
									<h5 class="card-title">Hoverable Rows</h5>
									<p class="card-text">Add <code>.table-hover</code> to enable a hover state on table rows within a <code>&lt;tbody&gt;</code>.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-hover mb-3 mb-lg-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table table-hover table-dark mb-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Bordered Table</h5>
									<p class="card-text">Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-bordered mb-3 mb-lg-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@TwBootstrap</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">4</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table table-bordered table-dark">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@TwBootstrap</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">4</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<hr class="my-3">
									<h5 class="card-title">Small Table</h5>
									<p class="card-text">Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-sm table-bordered mb-3 mb-md-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col">
											<div class="table-responsive">
												<table class="table table-sm table-bordered table-dark mb-0">
													<thead>
														<tr>
															<th>#</th>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Mark</td>
															<td>Otto</td>
															<td>@mdo</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Jacob</td>
															<td>Thornton</td>
															<td>@fat</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td colspan="2">Larry the Bird</td>
															<td>@twitter</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Contextual Classes</h5>
									<p class="card-text">Use contextual classes to color table rows or individual cells.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Type</th>
															<th>Column heading</th>
															<th>Column heading</th>
															<th>Column heading</th>
														</tr>
													</thead>
													<tbody>
														<tr class="table-active">
															<th scope="row">Active</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr>
															<th scope="row">Default</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-primary">
															<th scope="row">Primary</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-secondary">
															<th scope="row">Secondary</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-success">
															<th scope="row">Success</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-danger">
															<th scope="row">Danger</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-warning">
															<th scope="row">Warning</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-info">
															<th scope="row">Info</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-light">
															<th scope="row">Light</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
														<tr class="table-dark">
															<th scope="row">Dark</th>
															<td>Column content</td>
															<td>Column content</td>
															<td>Column content</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<hr class="my-3">
									<h5 class="card-title">Responsive Tables</h5>
									<p class="card-text">Create responsive tables by adding <code>.table-responsive</code> to any <code>.table</code>
										to make them scroll horizontally on small devices.</p>
									<div class="row">
										<div class="col">
											<div class="table-responsive">
												<table class="table table-bordered mb-0">
													<thead>
														<tr>
															<th>#</th>
															<th>Table heading</th>
															<th>Table heading</th>
															<th>Table heading</th>
															<th>Table heading</th>
															<th>Table heading</th>
															<th>Table heading</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<th scope="row">1</th>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
														</tr>
														<tr>
															<th scope="row">2</th>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
														</tr>
														<tr>
															<th scope="row">3</th>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
															<td>Table cell</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Miscellaneous -->
			<div class="k-sink__section">
				<div class="k-sink__title">
					<h2 ref="k-miscellaneous">Miscellaneous</h2>
					<p class="lead">Small but not less important components.</p>
					<hr class="mt-3 mb-4">
				</div>
				<div>
					<div class="row">
						<div class="col-md-6 col-lg-4">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Pagination</h5>
									<p class="card-text">Indicate a series of related content exists across multiple pages.</p>
									<nav>
										<ul class="pagination">
											<li class="page-item"><a class="page-link" href="" onclick="return false">Previous</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">1</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">2</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">3</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">Next</a></li>
										</ul>
									</nav>
									<p class="card-text">Disabled and active states:</p>
									<nav>
										<ul class="pagination">
											<li class="page-item disabled">
												<a class="page-link" href="" tabindex="-1" onclick="return false">Previous</a>
											</li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">1</a></li>
											<li class="page-item active">
												<a class="page-link" href="" onclick="return false">2</a>
											</li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">3</a></li>
											<li class="page-item">
												<a class="page-link" href="" onclick="return false">Next</a>
											</li>
										</ul>
									</nav>
									<p class="card-text">Add additional sizes:</p>
									<nav>
										<ul class="pagination pagination-sm">
											<li class="page-item disabled">
												<a class="page-link" href="" tabindex="-1" onclick="return false">Previous</a>
											</li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">1</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">2</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">3</a></li>
											<li class="page-item">
												<a class="page-link" href="" onclick="return false">Next</a>
											</li>
										</ul>
									</nav>
									<nav>
										<ul class="pagination pagination-lg m-0">
											<li class="page-item disabled">
												<a class="page-link" href="" tabindex="-1" onclick="return false">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
											<li class="page-item active"><a class="page-link" href="" onclick="return false">1</a></li>
											<li class="page-item"><a class="page-link" href="" onclick="return false">2</a></li>
											<li class="page-item d-none d-sm-inline-block"><a class="page-link" href="" onclick="return false">3</a></li>
											<li class="page-item">
												<a class="page-link" href="" onclick="return false">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-4">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Progress</h5>
									<p class="card-text">Use Bootstrap custom progress bars featuring support for stacked bars, animated
										backgrounds, and text labels.</p>

									<div class="progress mb-2">
										<div class="progress-bar" style="width: 25%"></div>
									</div>

									<div class="progress mb-2">
										<div class="progress-bar" style="width: 50%">50%</div>
									</div>

									<div class="progress mb-2">
										<div class="progress-bar bg-success" style="width: 25%"></div>
									</div>
									<div class="progress mb-2">
										<div class="progress-bar bg-info" style="width: 50%"></div>
									</div>
									<div class="progress mb-2">
										<div class="progress-bar bg-warning" style="width: 75%"></div>
									</div>
									<div class="progress mb-2">
										<div class="progress-bar bg-danger" style="width: 100%"></div>
									</div>
									<div class="progress mb-2">
										<div class="progress-bar" style="width: 15%"></div>
										<div class="progress-bar bg-success" style="width: 30%"></div>
										<div class="progress-bar bg-info" style="width: 20%"></div>
									</div>

									<div class="progress mb-2">
										<div class="progress-bar progress-bar-striped bg-primary" style="width: 50%"></div>
									</div>

									<div class="progress" style="margin-bottom: 15px;">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 75%"></div>
									</div>

									<div class="progress mb-2 mt-2" style="height: 1px;">
										<div class="progress-bar" style="width: 25%;"></div>
									</div>

									<div class="progress" style="height: 1px;">
										<div class="progress-bar bg-success" style="width: 50%;"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Breadcrumb</h5>
									<p class="card-text">Indicate the current page's location within a navigational hierarchy.</p>
									<ol class="breadcrumb">
										<li class="breadcrumb-item active">Home</li>
									</ol>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="" onclick="return false">Home</a></li>
										<li class="breadcrumb-item active">Library</li>
									</ol>
									<ol class="breadcrumb" style="margin-bottom: 23px;">
										<li class="breadcrumb-item"><a href="" onclick="return false">Home</a></li>
										<li class="breadcrumb-item"><a href="" onclick="return false">Library</a></li>
										<li class="breadcrumb-item active">Data</li>
									</ol>
									<p class="card-text">It's possible to use the <code>nav</code> element.</p>
									<nav class="breadcrumb mb-0">
										<a class="breadcrumb-item" href="" onclick="return false">Home</a>
										<a class="breadcrumb-item" href="" onclick="return false">Library</a>
										<a class="breadcrumb-item" href="" onclick="return false">Data</a>
										<span class="breadcrumb-item active">Bootstrap</span>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Alerts</h5>
									<p class="card-text">Provide contextual feedback messages for typical user actions with the handful of
										available and flexible alert messages.</p>
									<div class="alert alert-info alert-dismissible fade show" role="alert">
										<button class="close" type="button" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<a href="" class="alert-link" onclick="return false">Heads up!</a> This alert needs your attention, it's not
										important.
									</div>
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<button class="close" type="button" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<a href="" class="alert-link" onclick="return false">Well done!</a> You successfully read this alert message.
									</div>
									<div class="alert alert-warning alert-dismissible fade show" role="alert">
										<button class="close" type="button" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<a href="" class="alert-link" onclick="return false">Warning!</a> Better check yourself, you're not looking
										too good.
									</div>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<button class="close" type="button" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<a href="" class="alert-link" onclick="return false">Oh snap!</a> Change a few things up and try submitting
										again.
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card mb-3">
								<div class="card-body">
									<h5 class="card-title">Badges</h5>
									<p class="card-text">Small count and labeling component. It can be used as part of links or buttons to provide
										a counter.</p>
									<p class="card-text">
										<button class="btn btn-secondary">
											Notifications <span class="badge badge-light ml-1">4</span>
										</button>
									</p>
									<p class="card-text mb-1">Contextual variations:</p>
									<p class="card-text" style="margin-bottom: 20px;">
										<span class="badge badge-primary">Primary</span>
										<span class="badge badge-secondary">Secondary</span>
										<span class="badge badge-success">Success</span>
										<span class="badge badge-danger">Danger</span>
										<span class="badge badge-warning">Warning</span>
										<span class="badge badge-info">Info</span>
										<span class="badge badge-light">Light</span>
										<span class="badge badge-dark">Dark</span>
									</p>
									<p class="card-text mb-1">Using the <code>.badge</code> classes with the <code>&lt;a&gt;</code> element
										quickly provide actionable badges with hover and focus states.</p>
									<p class="card-text" style="margin-bottom: 21px;">
										<a href="" class="badge badge-primary">Primary</a>
										<a href="" class="badge badge-secondary">Secondary</a>
										<a href="" class="badge badge-success">Success</a>
										<a href="" class="badge badge-danger">Danger</a>
										<a href="" class="badge badge-warning">Warning</a>
										<a href="" class="badge badge-info">Info</a>
										<a href="" class="badge badge-light">Light</a>
										<a href="" class="badge badge-dark">Dark</a>
									</p>
									<p class="card-text">Use the <code>.badge-pill</code> modifier class to make badges more rounded.</p>
									<p class="card-text">
										<span class="badge badge-pill badge-primary">Primary</span>
										<span class="badge badge-pill badge-secondary">Secondary</span>
										<span class="badge badge-pill badge-success">Success</span>
										<span class="badge badge-pill badge-danger">Danger</span>
										<span class="badge badge-pill badge-warning">Warning</span>
										<span class="badge badge-pill badge-info">Info</span>
										<span class="badge badge-pill badge-light">Light</span>
										<span class="badge badge-pill badge-dark">Dark</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
