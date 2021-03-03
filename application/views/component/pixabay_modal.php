<div class="modal fade pixabayModal" id="pixabayModal" tabindex="-1" role="dialog" aria-labelledby="pixabayModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content p-1">
			<div class="modal-header pt-0">

				<ul class="nav nav-tabs" id="pixabayModalTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="pixabay-image-tab" data-toggle="tab" href="#pixabay-image" role="tab" aria-controls="home" aria-selected="true">
							<h4 class="modal-title">Insert Image</h4>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link youtube-video-tab" id="youtube-video-tab" data-toggle="tab" href="#video-tab" role="tab" aria-controls="profile" aria-selected="false">
							<h4 class="modal-title">Insert Youtube Video</h4>
						</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link image-crop-tab" id="image-crop-tab" data-toggle="tab" href="#crop-tab" role="tab" aria-controls="profile" aria-selected="false">
							<h5 class="modal-title h3">Crop Image</h5>
						</a>
					</li> -->
				</ul>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
				</button>
			</div>
			<div class="modal-body">

				<div class="tab-content" id="pixabayModalTabContent">
					<div class="tab-pane fade show active" id="pixabay-image" role="tabpanel" aria-labelledby="pixabay-image-tab">
						<div class="row">
							<div class="col-8">
								<form id="pixabay_images_form" action="" method="post">
									<div class="input-group mb-1">
										<input type="text" id="pixabay_query" class="form-control" name="pixabay_query" maxlenght="90" autofocus placeholder='Search for "red roses", "flowers -red", "city OR town", etc.'
										autocomplete="off">
										<div data-repeater-delete="" class="input-group-append">
											<button class="btn btn-info" type="submit">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>

									<div class="form-row">
										<div class="custom-control custom-checkbox d-flex align-items-center mb-1 mb-sm-0 mr-3">
											<input type="checkbox" id="filter_photos" name="filter_photos" class="custom-control-input" value="photo">
											<label class="custom-control-label" for="filter_photos">Photos</label>
										</div>
										<div class="custom-control custom-checkbox d-flex align-items-center mb-1 mb-sm-0 mr-3">
											<input type="checkbox" id="filter_cliparts" name="filter_cliparts" class="custom-control-input" value="clipart">
											<label class="custom-control-label" for="filter_cliparts">Cliparts</label>
										</div>
										<div class="custom-control custom-checkbox d-flex align-items-center mb-1 mb-sm-0 mr-3">
											<input type="checkbox" id="filter_horizontal" name="filter_horizontal" class="custom-control-input" value="horizontal">
											<label class="custom-control-label" for="filter_horizontal">Horizontal</label>
										</div>
										<div class="custom-control custom-checkbox d-flex align-items-center mb-1 mb-sm-0 mr-3">
											<input type="checkbox" id="filter_vertical" name="filter_vertical" class="custom-control-input" value="vertical">
											<label class="custom-control-label" for="filter_vertical">Vertical</label>
										</div>
										<?php /*
										$photos_category = array('fashion', 'nature', 'backgrounds', 'science', 'education', 'people', 'feelings', 'religion', 'health', 'places', 'animals', 'industry', 'food', 'computer', 'sports', 'transportation', 'travel', 'buildings', 'business', 'music');
										foreach ($photos_category as $category){?>
										<div class="custom-control custom-checkbox d-flex align-items-center mb-1 mb-sm-0 mr-3">
											<input type="checkbox" id="filter_category_<?php echo $category?>" name="category" class="custom-control-input">
											<label class="custom-control-label" for="filter_category_<?php echo $category?>"><?php echo ucwords($category);?></label>
										</div>
										<?php }*/?>
									</div>

								</form>
							</div>
							<div class="col-4">
								<form>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="customFileUpload" accept="image/jpg,image/png,image/jpeg" >
										<label class="custom-file-label" for="customFileUpload">Choose file...</label>
									</div>
								</form>
							</div>
						</div>



						<div class="hr-line-dashed my-1"></div>
						<p class="pixabay_results_help text-center" style="display: none">
							<span class="text-secondary">Clicking an image will download and add the image to your article.</span>
							<span class="text-danger">Do not click an image just to "preview" it.</span>
						</p>
						<div id="pixabay_results" class="flex-images">
							<div class="mt-4 mb-5 text-center text-light h1">—— No matches were found ——</div>
						</div>
					</div>
					<div class="tab-pane fade" id="video-tab" role="tabpanel" aria-labelledby="youtube-video-tab">

						<form id="video_url_form" name="video_url_form" action="" method="post">
							<div class="form-group mb-2">
								<label class="h6" for="video_url">
									Youtube Video Id or URL
								</label>
								<div class="input-group">
									<input type="text" require
										id="video_url"
										name="video_url"
										autocomplete="off"
										class="form-control"
										value=""
										data-error-class="u-has-error"
										data-success-class="u-has-success"
										placeholder="EX. Njz5RqRm01o   OR   https://www.youtube.com/watch?v=Njz5RqRm01o"
										data-msg="Please enter a valid Youtube id or URL.">
									<div class="input-group-append">
										<button class="btn btn-info" type="submit">
											Add
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>