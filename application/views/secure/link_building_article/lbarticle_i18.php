<div class="container hide">
	<ul class="nav nav-tabs custom-nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="article-tab" data-toggle="tab" href="#article" role="tab" aria-controls="article" aria-selected="true">Article</a>
		</li>
		<?php if($user_type && $user_type !=4){?>
		<li class="nav-item">
			<a class="nav-link" id="promotion-tab" data-toggle="tab" href="#promotion" role="tab" aria-controls="promotion" aria-selected="false">Promotion</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="metadata-tab" data-toggle="tab" href="#metadata" role="tab" aria-controls="metadata" aria-selected="false">Meta Data</a>
		</li>
		<?php } ?>
	</ul>
</div>
<?php
$article_status = strtolower($article['article_status']);
$attributes = array('class' => 'form-horizontal form-bordered form-validate article-form', 'id' => 'article-form');
if($article['language_id']=='en'){
	echo form_open('', $attributes);
}
?>
<div class="tab-content" id="articleTabContent">
	<!--- Article Tab Section Start  --->
	<div class="tab-pane fade show active" id="article" role="tabpanel" aria-labelledby="article-tab">
		<div class="container">
		<?php if($article['article_id']){?>
		<!-- <nav class="breadcrumb mb-0">
			<a class="breadcrumb-item" href="<?php echo site_url('/secure/linkbuilding') ?>">Link Building</a>
			<a class="breadcrumb-item" href="<?php echo site_url('/secure/linkbuildingarticle') ?>">Articles</a>
			<a class="breadcrumb-item active" href="<?php echo site_url('/secure/articlesbrief')?>">Edit Article</a>
			
		</nav> -->
		<?php }?>
			<div class="form-actions inline-spacing mt-3 mb-2">
				<?php 
					$keyword = $article['article_title'];
					if($article['article_meta_keyword']){
						$keyword = $article['article_meta_keyword'];
					}
				?>
				<button type="submit" name="submitForm" value="savedraft" class="btn btn-success btn-icon article-button-click" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<i class="fas fa-save"></i> <?php echo ($user_type) ? 'Save' : 'Save'?>
				</button>

				<button type="submit" name="submitForm" value="submit" class="btn btn-success btn-icon article-button-click" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<i class="fas fa-check "></i>
					<?php echo ($user_type) ? 'Submit' : 'Submit'?>
				</button>
				<?php
				$data_lang_hide = array(
					'type' => 'hidden',
					'name' => 'language_id',
					'id' => 'language_id',
					'value' => $lang,
					'class' => 'language_id'
				);
				echo form_input($data_lang_hide);
				$data_article_id_hide = array(
					'type' => 'hidden',
					'name' => 'article_id',
					'id' => 'article_id',
					'value' => $article['article_id'],
					'class' => 'article_id'
				);
				echo form_input($data_article_id_hide);
				$data_keyword_hide = array(
					'type' => 'hidden',
					'name' => 'keyword',
					'id' => 'keyword',
					'value' => $article['article_meta_keyword'],
					'class' => 'keyword'
				);
				echo form_input($data_keyword_hide);
				$data_article_type_hide = array(
					'type' => 'hidden',
					'name' => 'articletype',
					'id' => 'articletype',
					'value' => 'pillar',
					'class' => 'keyword'
				);
				echo form_input($data_article_type_hide);
				$data_article_content_performance_hide = array(
					'type' => 'hidden',
					'name' => 'article_content_performance',
					'id' => 'article_content_performance',
					'value' => $article['article_content_performance'],
					'class' => 'article_content_performance'
				);
				echo form_input($data_article_content_performance_hide);
				$data_article_content_score_hide = array(
					'type' => 'hidden',
					'name' => 'article_content_score',
					'id' => 'article_content_score',
					'value' => $article['article_content_score'],
					'class' => 'article_content_score'
				);
				echo form_input($data_article_content_score_hide);
				$data_article_target_score_hide = array(
					'type' => 'hidden',
					'name' => 'article_target_score',
					'id' => 'article_target_score',
					'value' => $article['article_target_score'],
					'class' => 'article_target_score'
				);
				echo form_input($data_article_target_score_hide);
				$data_button_click_hide = array(
					'type' => 'hidden',
					'name' => 'form_action',
					'id' => 'form_action',
					'value' => '',
					'class' => 'form_action'
				);
				echo form_input($data_button_click_hide);
				if($article['site_id']){
					$article_published_website = $article['site_id'];
				}else{
					$article_published_website = $article['article_published_website'];
				}

				$data_article_published_website_hide = array(
					'type' => 'hidden',
					'name' => 'article_published_website',
					'value' => $article_published_website,
					'id' => 'article_website_id'
				);
				echo form_input($data_article_published_website_hide);

				$data_article_commit_message_hide = array(
					'type' => 'hidden',
					'name' => 'article_commit_message',
					'value' => '',
					'id' => 'article_commit_message1'
				);
				echo form_input($data_article_commit_message_hide);
				$data_article_previous_status_hide = array(
					'type' => 'hidden',
					'name' => 'article_previous_status',
					'value' => $article_status,
					'id' => 'article_previous_status'
				);
				echo form_input($data_article_previous_status_hide);
				if($is_user_logged_in){
					$redirect_path = 'secure/articlesbrief';
				}else{
					$redirect_path = '/';
				}
				?>
				<a href="<?php echo site_url($redirect_path) ?>" class="btn btn-default btn-icon <?php echo ($article['language_id']=='en') ? '' : 'inactiveLink'?>" >
					<i class="fas fa-times"></i>
					Cancel
				</a>
				<?php if($user_type ==1 || $user_type==3 || $user_type==6){?>
				<button type="button"
					data-article="<?php echo $article['article_id'] ?>"
					data-lang="<?php echo $article['language_id'] ?>"
					value="copyscape"
					class="btn btn-success btn-icon verify_copyscape" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<?php if($article['article_copyscape']){ ?>
					<i class="fas fa-check-square" aria-hidden="true"></i><?php } ?>
					Copyscape
				</button>

				<button type="submit" name="submitForm" value="approve" class="btn btn-primary btn-icon article-approve" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<i class="fas fa-check "></i>
					<?php echo ($user_type) ? 'Approve' : 'Approve'?>
				</button>
				<?php } ?>
				<?php
					if($article['language_id']=='en'){
						$disabled = ' ';
					}else{
						$disabled = 'disabled';
					}
				if ($article_status == 'deleted') {
					$delbutton = '<button type="button" class="btn btn-warning btn-icon"
						href="' . site_url('/secure/articlesbrief/restore_article/'.$lang.'/'. $article['article_id']) . '"
						data-toggle="confirmation"
						data-icon-type="warning"
						data-title="Are you sure ?"
						data-message="The article will be Restore."
						data-confirm-text="Restore"
						data-confirm-callback="executeAction"
						data-confirm-class="btn-warning"
						data-cancel-text="Cancel"
						data-cancel-callback="dismissConfirmation"
						data-cancel-class="btn-default"
						data-target="' . site_url('secure/articlesbrief') . '" '.$disabled.' >
						<i class="fas fa-undo"></i> Restore
					</button>';
				} else {
					$delbutton = '<button type="button" class="btn btn-danger btn-icon"
						href="' . site_url('/secure/articlesbrief/delete_article/'.$lang.'/'. $article['article_id']) . '"
						data-toggle="confirmation"
						data-icon-type="error"
						data-title="Delete this Article?"
						data-message="If published, the article will be removed from the website on the next update."
						data-confirm-text="Delete"
						data-confirm-class="btn-danger"
						data-confirm-callback="executeAction"
						data-cancel-text="Cancel"
						data-cancel-callback="dismissConfirmation"
						data-cancel-class="btn-default"
						data-target="' . site_url('secure/articlesbrief') . '" '.$disabled.' >
						<i class="fas fa-trash-alt"></i> Delete
					</button>';
				}
				
				if($article['article_id'] && $article['article_i18_id']){
				if ($article_status != 'deleted' && $article_status != 'draft' && ($user_type ==1 || $user_type==6)){
					if($article['article_copyscape']==false && $article_status =='approved' ){?>
					<button type="submit" name="submitForm" value="publish" class="btn btn-info btn-icon link-building-article-published" disabled>
						<i class="fas fa-check "></i>
						Published
					</button>

					<?php }else{

									?>
					<button type="submit" name="submitForm" value="publish" class="btn btn-info btn-icon link-building-article-published" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
						<i class="fas fa-check "></i>
						Published
					</button>
					<?php
					} }

					//echo $delbutton ?>
				<button type="button"
				    data-brief_id="<?php echo $article['brief_id'] ?>"
					data-article="<?php echo $article['article_id'] ?>"
					data-lang="<?php echo $article['language_id'] ?>"
					data-url="<?php echo base_url('secure/linkbuildingarticle/exporthtmlzip') ?>"
					value="export"
					class="btn btn-primary btn-icon export-zip" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<i class="fas fa-download" aria-hidden="true"></i>
					Export Zip
				</button>
				<button type="button" data-article="<?php echo $article['article_id'] ?>" data-brief="<?php echo $article['brief_id'] ?>"
					data-lang="<?php echo $article['language_id'] ?>" data-keyword="<?php echo $keyword ?>" id="link-building-check-score" class="btn btn-secondary btn-icon link-building-check-score" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
					<span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
					<i class="fas fa-tachometer-alt"></i> 
					Check Score
				</button>
				<?php } ?>
				

			</div>
			<div class="row">
				<div class="col-md-8">

					<div class="article-body">
						<!-------------Article Summary Start---------------->
						<div class="article-summary p-container">
							<div class="row">
								<div class="col-md-12">
									<div class="page-inner-header mb-2">
										<h3 class="mb-0">Article Summary</h3>
									</div>
									<div class="form-group mb-2">
										<div class="row">
											<div class="col-md-8">
												<label class="h6" for="article_title">Headline<span
														class="text-danger">*</span>
												</label>
											</div>
											<div class="col-md-4 text-right">
												
											</div>
										</div>
										<div class="input-group">
												<?php
													$data_article_title = array(
														'name' => "article[$lang][article_title]",
														'value' => set_value("article[$lang][article_title]", $article['article_title'], $html_escape=FALSE),
														'placeholder' => 'Headline max 70 characters in length',
														'maxlength' => 70,
														'rangelength' => '[10, 70]',
														'required' => 'required',
														'data-msg-required'=>"The Article Headline field is required.",
														'class' => 'form-control calc-length primary-keyword-phrase seo-content-keywords'
													);
													echo form_input($data_article_title);
													echo form_error("article[$lang][article_title]");
													?>
											<div class="input-group-append align-items-center input-text">
												<span class="input-group-text font-weight-bold text-success char-remain" id="">70</span>
												<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword phrase does not appear in the title.</small>" class="fas fa-exclamation-triangle"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group mb-2">
										<?php
													$article_image = set_value("article[$lang][article_image]", $article['article_image']);
													?>
										<label class="h6" for="top_image_desc">Top Image</label>
										<div class="position-relative">
											<div class="holder-style holder-active embed-responsive remove-youtube-tab mb-2 <?php if($article_image) echo 'embed-responsive-16by9';?>"
												href="#pixabayModal" data-toggle="modal" data-target="#pixabayModal" data-v-width="580" data-v-height="580" data-b-width="100%" data-b-height="1280"
												style="background-image: url('<?php echo $article_image;?>')" ;>
												<div class="youtubevideo"></div>
												<div
													class="holder-icon <?php if(!$article_image) echo 'uploading';?>">
													<div class="holder-icon-text">
														<img src="<?php echo base_url(); ?>assets/images/add.svg"
															style="height:30px">
														<div class="d-block">Click to add an image</div>
													</div>
												</div>
												<?php
															$data_upload_image_hide = array(
																'type' => 'hidden',
																'name' => "article[$lang][article_image]",
																'value' => set_value("article[$lang][article_image]", $article['article_image']),
																'class' => 'upload_image'
															);
															echo form_input($data_upload_image_hide);

															$data_upload_image_base64_hide = array(
																'type' => 'hidden',
																'name' => "article[$lang][summary_image_base64]",
																'value' => '',
																'class' => 'upload_image_base64'
															);
															echo form_input($data_upload_image_base64_hide);

															$article_image_attribution = set_value('article_image_attribution', $article['article_image_attribution']);
															$data_article_image_attribution_hide = array(
																'type' => 'hidden',
																'name' => "article[$lang][article_image_attribution]",
																'value' => $article_image_attribution,
																'class' => 'image_attribution'
															);
															echo form_input($data_article_image_attribution_hide);
															$article_image_license = set_value("article[$lang][article_image_license]", $article['article_image_license']);
															$data_article_image_license_hide = array(
																'type' => 'hidden',
																'name' => "article[$lang][article_image_license]",
																'value' => $article_image_license,
																'class' => 'image_license'
															);
															echo form_input($data_article_image_license_hide);
															?>

											</div>
											<a href="javascript:void(0);"
												class="fas fa-trash-alt holder-style-edit delete_image is_article_image text-danger"
												data-action="lb_article|<?php echo $lang ?>|<?php echo $article['article_id']?>|<?php echo $article['article_image']?>|0"
												data-toggle="tooltip" data-placement="top" title="Remove Multimedia"
												<?php if($article_image) echo 'style="display:block"';?>></a>
										</div>
									</div>
									<div class="form-group mb-2 section-image-found">
										<div class="row">
											<div class="col-md-8">
												<label class="h6" for="article_image_alt">Image
													Description
												</label>
											</div>
											<div class="col-md-4 text-right">
												
											</div>
										</div>
										<div class="input-group">
										<?php
													$data_article_image_alt = array(
														'name' => "article[$lang][article_image_alt]",
														'value' => set_value("article[$lang][article_image_alt]", $article['article_image_alt'], $html_escape=FALSE),
														'placeholder' => 'Please enter a short description of the image',
														'maxlength' => 70,
														'rangelength' => '[10, 70]',
														'required' => 'required',
														'data-msg-required'=>"Please enter a short description of the image",
														'class' => 'form-control article_image_alt calc-length primary-keyword-phrase seo-content-keywords'
													);
													if(!$article_image){
														$data_article_image_alt['disabled'] = 'disabled';
													}
													echo form_input($data_article_image_alt);
													echo form_error('article_image_alt');
													?>
											<div class="input-group-append align-items-center input-text">
												<span class="input-group-text text-success font-weight-bold char-remain" id="">70</span>
												<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>A keyword does not appear in the image description.</small>" class="fas fa-exclamation-triangle"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group mb-2">
										<div class="row">
											<div class="col-md-8">
												<label class="h6">Summary<span
														class="text-danger">*</span>
													<small class="text-lowercase ml-1"></small>
												</label>
											</div>
											<div class="col-md-4 text-right">
												
											</div>
										</div>
										<div class="input-group">
												<?php
													$data_article_description = array(
														'name' => "article[$lang][article_description]",
														'rows' => 4,
														'cols' => 50,
														'value' => set_value("article[$lang][article_description]", $article['article_description'], $html_escape=FALSE),
														'maxlength' => 200,
														'placeholder' => 'Summary max 200 characters in length',
														'rangelength' => '[10, 250]',
														'required' => 'required',
														'data-msg-required'=>"Summary is required.",
														'class' => 'form-control calc-length primary-keyword-phrase seo-content-keywords'
													);
													echo form_textarea($data_article_description);
													echo form_error("article[$lang][article_description]");
													?>
											<div class="input-group-append align-items-center input-textarea">
												<span class="input-group-text text-success font-weight-bold char-remain" id="">200</span>
												<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword phrase does not appear in the article summary.</small>" class="fas fa-exclamation-triangle"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-------------Article Summary End---------------->
						<hr class="my-3">
						<!-------------Paragraphs Start---------------->
						<div class="repeater">
							<div data-repeater-list="article[<?php echo $lang?>][paragraph]">
								<?php
											$section_count = 0;
											foreach($paragraphs as $paragraph){
												//pre($paragraph);
												$section_id = set_value('section_id', $paragraph['section_id']);
												//$id_i18 = set_value('id', $paragraph['id']);
												?>
								<div id="paragraph-<?php echo $section_id?>"
									class="mb-2 repeat-paragraph p-container" data-repeater-item>
									<div class="row">
										<div class="col-md-12">
											<div class="page-inner-header position-relative mb-2">
											<div class="delete-paragraph-container">
												<?php if($section_id && $section_count >= 0){?>
												
												<a class="deleteParagraph"
													href="<?php echo site_url('/secure/articlesbrief/delete_paragraph/'.$lang.'/' . $section_id);?>"
													data-toggle="confirmation" data-icon-type="error"
													data-title="Delete this section?"
													data-message="This paragraph will be removed from article and this can not be <b>Undone</b>."
													data-confirm-text="Delete" data-confirm-class="btn-danger"
													data-confirm-callback="repeaterReload" data-cancel-text="Cancel"
													data-cancel-callback="dismissConfirmation"
													data-cancel-class="btn-default"
													data-target="#paragraph-<?php echo $section_id?>">
													<i class="fas fa-trash-alt text-danger"
														data-toggle="tooltip" data-placement="top"
														data-original-title="Remove Paragraph"></i>
												</a>
												<?php }else{?>
													<a href="javascript:void(0);" data-repeater-delete ><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Paragraph"></i></a>
												<?php }?>
												</div>
												<div class="row">
													<div class="col-md-6">
														<h3 class="mb-0">Paragraph</h3>
														<?php
																			$data_section_id_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_id',
																				'value' => $section_id,
																				'class' => 'section_id'
																			);
																			echo form_input($data_section_id_hide);
																			/*$data_section_id_i18_hide = array(
																				'type' => 'hidden',
																				'name' => 'id',
																				'value' => $id_i18,
																				'class' => 'id'
																			);
																			echo form_input($data_section_id_i18_hide);*/
																			?>
													</div>
													<div class="col-md-6">
													</div>
												</div>
											</div>

											<div class="form-group mb-2">
												<div class="row">
													<div class="col-md-8">
														<label class="h6" for="article_title">Title
														</label>
													</div>
													<div class="col-md-4 text-right">
														
													</div>
												</div>
												<div class="row">
													<div class="col-md-10">
														<div class="input-group">
																<?php
																		$data_section_title = array(
																			'name' => 'section_title',
																			'value' => set_value('section_title', $paragraph['section_title'], $html_escape=FALSE),
																			'maxlength' => 70,
																			'placeholder' => 'Paragraph title max 70 characters in length',
																			'class' => 'form-control calc-length primary-keyword-phrase seo-content-keywords'
																		);
																		echo form_input($data_section_title);
																		echo form_error('section_title');
																		?>
															<div class="input-group-append align-items-center input-text">
																<span class="input-group-text text-success font-weight-bold char-remain" id="">70</span>
																<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>A keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
															</div>
														</div>
												</div>
												<div class="col-md-2">
																<?php
																					$heading_type = array(
																						'h2' => 'H2',
																						'h3' => 'H3',
																					);
																					$selected_heading_type ='h2';
																					if($paragraph['section_heading_type']){
																						$selected_heading_type = $paragraph['section_heading_type'];
																						//pre($selected_cat);
																					}else{
																						$selected_heading_type = 'h2';
																					}
																					echo form_dropdown("section_heading_type", $heading_type, $selected_heading_type, 'class="form-control-sm select-2"' );
																					echo form_error("section_heading_type");

																					?>
													</div>
												</div>

											</div>
											<!--- Image or Video Section Start  --->
											<div class="form-group text-right">
												
											</div>
											<div class="collapse <?php if($paragraph['section_image'] ||  $paragraph['section_video'] ) echo 'show';?> image-video-collapse-<?php echo $section_count?> image-video-collapse">

												<div class="form-group mb-2">
													<?php
																	$section_image = set_value('section_image', $paragraph['section_image']);
																	$section_video = set_value('section_video', $paragraph['section_video']);
																	$show_loading = true;
																	if($section_image || $section_video){
																		$show_loading = false;
																	}
																	?>
													<label class="h6">Image or Video</label>
													<div class="position-relative">
														<div class="holder-style holder-active embed-responsive <?php if(!$show_loading) echo 'embed-responsive-16by9';?> mb-2"
															href="#pixabayModal" data-toggle="modal"
															data-target="#pixabayModal"
															style="background-image: url('<?php echo $section_image;?>')">
															<div class="youtubevideo">
																<?php
																				if($section_video){
																					echo '<iframe width="560" height="315" src="//www.youtube.com/embed/' . $section_video . '" frameborder="0" allowfullscreen></iframe>';
																				}?>
															</div>
															<div
																class="holder-icon <?php if($show_loading) echo 'uploading';?>">
																<div class="holder-icon-text">
																	<img src="<?php echo base_url(); ?>assets/images/add.svg"
																		style="height:30px">
																	<div class="d-block">Click to add an image</div>
																</div>
															</div>
																		<?php
																			$data_section_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_image',
																				'value' => $section_image,
																				'class' => 'upload_image'
																			);
																			echo form_input($data_section_hide);

																			$data_image_base64_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_image_base64',
																				'value' => '',
																				'class' => 'upload_image_base64'
																			);
																			echo form_input($data_image_base64_hide);

																			$section_image_attribution = set_value('section_image_attribution', $paragraph['section_image_attribution']);
																			$data_section_image_attribution_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_image_attribution',
																				'value' => $section_image_attribution,
																				'class' => 'image_attribution'
																			);
																			echo form_input($data_section_image_attribution_hide);

																			$section_image_license = set_value('section_image_license', $paragraph['section_image_license']);
																			$data_section_image_license_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_image_license',
																				'value' => $section_image_license,
																				'class' => 'image_license'
																			);
																			echo form_input($data_section_image_license_hide);

																			$section_video = set_value('section_video', $paragraph['section_video']);
																			$data_section_section_video_hide = array(
																				'type' => 'hidden',
																				'name' => 'section_video',
																				'value' => $section_video,
																				'class' => 'section_video'
																			);
																			echo form_input($data_section_section_video_hide);
																			?>

														</div>
														<div class= "delete-image-container">
														<a href="javascript:void(0);"
															class="fas fa-trash-alt holder-style-edit delete_image text-danger"
															data-action="lb_section|<?php echo $lang ?>|<?php echo $paragraph['section_id']?>|<?php echo $paragraph['section_image']?>|0"
															data-toggle="tooltip" data-placement="top"
															title="Remove Multimedia"
															<?php if(!$show_loading) echo 'style="display:block"';?>></a>
														</div>
													</div>
												</div>
												<?php
																if($section_video){
																$hide='';
																}elseif($section_image OR $section_image==''){
																	$hide='hide';
																}

																?>

												<div class="form-group mb-2 section-video-found hide">
													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Name</label>
															<?php
																		$section_meta_video_name = isset($paragraph['section_meta_video_name']) ? $paragraph['section_meta_video_name'] : '';
																		$data_section_meta_video_name = array(
																			'name' => 'section_meta_video_name',
																			'value' => set_value('section_meta_video_name', $section_meta_video_name, $html_escape=FALSE),
																			'placeholder' => 'Please enter a meta video name of the video',
																			'class' => 'form-control article_meta_video_name seo-content-keywords'
																		);
																		echo form_input($data_section_meta_video_name);
																		echo form_error('section_meta_video_name');
																	?>
														</div>
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video
																Description</label>
															<?php
																			$section_meta_video_description = isset($paragraph['section_meta_video_description']) ? $paragraph['section_meta_video_description'] : '';
																			$data_section_meta_video_description = array(
																				'name' => 'section_meta_video_description',
																				'value' => set_value('section_meta_video_description', $section_meta_video_description, $html_escape=FALSE),
																				'placeholder' => 'Please enter a Meta description of the Video',
																				'class' => 'form-control article_meta_video_description seo-content-keywords'
																			);
																			echo form_input($data_section_meta_video_description);
																			echo form_error('section_meta_video_description');
																	?>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Url</label>
															<?php
																			$section_meta_video_url = isset($paragraph['section_meta_video_url']) ? $paragraph['section_meta_video_url'] : '';
																			$data_section_meta_video_url = array(
																				'name' => 'section_meta_video_url',
																				'value' => set_value('section_meta_video_url', $section_meta_video_url, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video url of the video',
																				'class' => 'form-control article_meta_video_url'
																			);
																			echo form_input($data_section_meta_video_url);
																			echo form_error('section_meta_video_url');
																		?>
														</div>
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Thumbnail
																1x1</label>
															<?php
																			$section_meta_video_thumbnail_1x1 = isset($paragraph['section_meta_video_thumbnail_1x1']) ? $paragraph['section_meta_video_thumbnail_1x1'] : '';
																			$data_section_meta_video_thumbnail_1x1 = array(
																				'name' => 'section_meta_video_thumbnail_1x1',
																				'value' => set_value('section_meta_video_thumbnail_1x1', $section_meta_video_thumbnail_1x1, $html_escape=FALSE),
																				'placeholder' => 'Please enter a Meta meta video thumbnail 1x1 of the Video',
																				'class' => 'form-control article_meta_video_thumbnail_1x1'
																			);
																			echo form_input($data_section_meta_video_thumbnail_1x1);
																			echo form_error('section_meta_video_thumbnail_1x1');
																	?>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Thumbnail
																4x3</label>
															<?php
																			$section_meta_video_thumbnail_4x3 = isset($paragraph['section_meta_video_thumbnail_4x3']) ? $paragraph['section_meta_video_thumbnail_4x3'] : '';
																			$data_section_meta_video_thumbnail_4x3 = array(
																				'name' => 'section_meta_video_thumbnail_4x3',
																				'value' => set_value('section_meta_video_thumbnail_4x3', $section_meta_video_thumbnail_4x3, $html_escape=FALSE),
																				'placeholder' => 'Please enter a Meta meta video thumbnail 4x3 of the Video',
																				'class' => 'form-control article_meta_video_thumbnail_4x3'
																			);
																			echo form_input($data_section_meta_video_thumbnail_4x3);
																			echo form_error('section_meta_video_thumbnail_4x3');
																	?>
														</div>
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Thumbnail
																16x9</label>
															<?php
																			$section_meta_video_thumbnail_16x9 = isset($paragraph['section_meta_video_thumbnail_16x9']) ? $paragraph['section_meta_video_thumbnail_16x9'] : '';
																			$data_section_meta_video_thumbnail_16x9 = array(
																				'name' => 'section_meta_video_thumbnail_16x9',
																				'value' => set_value('section_meta_video_thumbnail_16x9', $section_meta_video_thumbnail_16x9, $html_escape=FALSE),
																				'placeholder' => 'Please enter a Meta meta video thumbnail 16x9 of the Video',
																				'class' => 'form-control article_meta_video_thumbnail_16x9'
																			);
																			echo form_input($data_section_meta_video_thumbnail_16x9);
																			echo form_error('section_meta_video_thumbnail_16x9');
																	?>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Upload Date</label>
															<?php
																			$section_meta_video_uploaddate = isset($paragraph['section_meta_video_uploaddate']) ? $paragraph['section_meta_video_uploaddate'] : '';
																			$data_section_meta_video_uploaddate = array(
																				'name' => 'section_meta_video_uploaddate',
																				'value' => set_value('section_meta_video_uploaddate', $section_meta_video_uploaddate, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video uploaddate of the Video',
																				'class' => 'form-control article_meta_video_uploaddate'
																			);
																			echo form_input($data_section_meta_video_uploaddate);
																			echo form_error('section_meta_video_uploaddate');
																	?>
														</div>
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Minutes</label>
															<?php
																			$section_meta_video_minutes = isset($paragraph['section_meta_video_minutes']) ? $paragraph['section_meta_video_minutes'] : '';
																			$data_section_meta_video_minutes = array(
																				'name' => 'section_meta_video_minutes',
																				'value' => set_value('section_meta_video_minutes', $section_meta_video_minutes, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video minutes of the Video',
																				'class' => 'form-control article_meta_video_minutes'
																			);
																			echo form_input($data_section_meta_video_minutes);
																			echo form_error('section_meta_video_minutes');
																	?>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Seconds</label>
															<?php
																			$section_meta_video_seconds = isset($paragraph['section_meta_video_seconds']) ? $paragraph['section_meta_video_seconds'] : '';
																			$data_section_meta_video_seconds = array(
																				'name' => 'section_meta_video_seconds',
																				'value' => set_value('section_meta_video_seconds', $section_meta_video_seconds, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video seconds of the Video',
																													'class' => 'form-control article_meta_video_seconds'
																			);
																			echo form_input($data_section_meta_video_seconds);
																			echo form_error('section_meta_video_seconds');
																			?>
														</div>
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Interaction
																Count</label>
															<?php
																			$section_meta_video_interaction_count = isset($paragraph['section_meta_video_interaction_count']) ? $paragraph['section_meta_video_interaction_count'] : '';
																			$data_section_meta_video_interaction_count = array(
																				'name' => 'section_meta_video_interaction_count',
																				'value' => set_value('section_meta_video_interaction_count', $section_meta_video_interaction_count, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video interaction count of the Video',
																				'class' => 'form-control article_meta_video_interaction_count'
																			);
																			echo form_input($data_section_meta_video_interaction_count);
																			echo form_error('section_meta_video_interaction_count');
																			?>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6 mb-2">
															<label class="h6">Meta Video Expires</label>
															<?php
																			$section_meta_video_expires = isset($paragraph['section_meta_video_expires']) ? $paragraph['section_meta_video_seconds'] : '';
																			$data_section_meta_video_expires = array(
																				'name' => 'section_meta_video_expires',
																				'value' => set_value('section_meta_video_expires', $section_meta_video_expires, $html_escape=FALSE),
																				'placeholder' => 'Please enter a meta video expires of the Video',
																				'class' => 'form-control article_meta_video_expires'
																			);
																			echo form_input($data_section_meta_video_expires);
																			echo form_error('section_meta_video_expires');
																		?>
														</div>
														<div class="form-group col-md-6 mb-2">

														</div>
													</div>
												</div>

												<div
													class="form-group mb-2 section-image-found <?php if($section_video) echo 'hide'; ?>">
													<div class="row">
														<div class="col-md-8">
															<label class="h6"
																for="section_image_alt">Image Description
															</label>
														</div>
														<div class="col-md-4 text-right">
															
														</div>
													</div>
													<div class="input-group">
													<?php
																	$section_img_alt = isset($paragraph['section_image_alt']) ? $paragraph['section_image_alt'] : '';
																	$data_section_image_alt = array(
																		'name' => 'section_image_alt',
																		'value' => set_value('section_image_alt', $section_img_alt, $html_escape=FALSE),
																		'placeholder' => 'Please enter a short description of the image',
																		'maxlength' => 70,
																		'class' => 'form-control article_image_alt calc-length primary-keyword-phrase seo-content-keywords'
																	);
																	if(!$section_image){
																		$data_section_image_alt['disabled'] = 'disabled';
																	}
																	echo form_input($data_section_image_alt);
																	echo form_error('section_image_alt');
																	?>
														<div class="input-group-append align-items-center input-text">
															<span class="input-group-text text-success font-weight-bold char-remain" id="">70</span>
															<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>A keyword does not appear in the image description.</small>" class="fas fa-exclamation-triangle"></i></span>
														</div>
													</div>
												</div>
											</div>
											<!--- Image or Video Section End  --->
											<div class="form-group">
												<label class="h6">Article Text</label>
												<div class="input-group paragraph-warning">
													<?php
													$data_section_text = array(
														'name' => 'section_text',
														'rows' => 4,
														'cols' => 50,
														'value' => set_value('section_text', $paragraph['section_text'], $html_escape=FALSE),
														'class' => 'form-control init-link-editor primary-keyword-phrase paragraph-sentences'
													);
													echo form_textarea($data_section_text);
													echo form_error('section_text');
													?>
													<div class="input-group-append align-items-center input-textarea" style="right:30px;">
														<span class="input-group-text text-success font-weight-bold char-remain"  id="">3000</span>
														<?php if( $section_count == 0){?>
														<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword phrase does not appear in the first paragraph of the article.</small>" class="fas fa-exclamation-triangle"></i></span>
														<?php } ?>
														<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="" class="fas fa-exclamation-triangle para_sentences" ></i></span>
													</div>
												</div>
											</div>
											<!---- Callout Start ---->
											<div class="form-group text-right">
												
											</div>
											<!-- innner repeater -->
											<div
												class="inner-repeater callouts-collapse-<?php echo $section_count?> collapse <?php if($paragraph['callouts'][0]['callout_i18_id']) echo 'show';?> ">
												<div class="" data-repeater-list="callouts">

												<?php
												$callout_count = 0;
												foreach($paragraph['callouts'] as $callout){
													$callout_id = set_value('callout_i18_id', $callout['callout_i18_id']);
												//pre($callout);
												?>
													<div id="callout-<?php echo $callout_id?>"
														class="callout-editor mb-1" data-repeater-item>
														<div class="page-inner-header position-relative mb-2">
														<div class="delete-callout-container" >
															<?php if($callout_id && $callout_count >= 0){?>
															<a class="deleteCallout"
																href="<?php echo site_url('/secure/articlesbrief/delete_callout/'.$lang.'/' . $callout_id);?>"
																data-toggle="confirmation" data-icon-type="error"
																data-title="Delete this callout section?"
																data-message="This callout will be removed from article and this can not be <b>Undone</b>."
																data-confirm-text="Delete"
																data-confirm-class="btn-danger"
																data-confirm-callback="repeaterReload"
																data-cancel-text="Cancel"
																data-cancel-callback="dismissConfirmation"
																data-cancel-class="btn-default"
																data-target="#callout-<?php echo $callout_id?>">
																<i class="fas fa-trash-alt text-danger"
																	data-toggle="tooltip" data-placement="top"
																	data-original-title="Remove Callout"></i>
															</a>
															<?php }else{?>
																<a class="deleteCallout"
																href="javascript:void(0);"
																data-repeater-delete
																>
																<i class="fas fa-trash-alt text-danger"
																	data-toggle="tooltip" data-placement="top"
																	data-original-title="Remove Callout"></i>
																</a>

															<?php } ?>
															</div>
															<h3 class="mb-0">Callout</h3>
															<?php

															$data_callout_id_hide = array(
																'type' => 'hidden',
																'name' => 'callout_i18_id',
																'value' => $callout_id,
																'class' => 'callout_i18_id'
															);
															echo form_input($data_callout_id_hide);

														?>
														</div>
														<div class="form-group mb-2">
															<div class="row">
																<div class="col-md-8">
																	<label class="h6"
																		for="callout_title">Title
																	</label>
																</div>
																<div class="col-md-4 text-right">
																	
																</div>
															</div>
															<div class="input-group">
																<?php
																			$data_section_callout_title = array(
																				'name' => 'callout_title',
																				'value' => set_value('callout_title', $callout['callout_title'], $html_escape=FALSE),
																				'maxlength' => 50,
																				'placeholder' => 'Callout title max 50 characters in length',
																				'class' => 'form-control calc-length seo-content-keywords'
																			);
																			echo form_input($data_section_callout_title);
																			echo form_error('callout_title');
																			?>
																<div class="input-group-append align-items-center input-text">
																<span class="input-group-text text-success font-weight-bold char-remain" id="">50</span>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="h6">Callout Text</label>
															<?php

																$data_section_callout_text = array(
																	'name' => 'callout_text',
																	'rows' => 4,
																	'cols' => 25,
																	'value' => set_value('callout_text', $callout['callout_text'], $html_escape=FALSE),
																	'class' => 'form-control init-link-editor'
																);
																echo form_textarea($data_section_callout_text);
																echo form_error('callout_text');
																?>
														</div>
													</div>
													<?php
																		$callout_count++;
																		}
																	?>
												</div>
												<div class="form-group overflow-hidden">
													<a class="add-more-link-muted small" href="javascript:void();"
														data-repeater-create="">
														<i class="fas fa-plus"></i>
														Add Another Callout
													</a>
												</div>
											</div>
											<div class="form-group text-left">
												<span>
													<a class="add-more-link-muted small add-callout initial-callout-hide" data-callout=".callouts-collapse-<?php echo $section_count?>" data-toggle="collapse1" href="javascript:void(0);" role="button" aria-expanded="false" aria-controls="callouts-collapse">
														<i class="fas fa-plus fa-fw " style="margin-right:.25rem;font-size:85%;"></i>
														Add Callout
													</a>
												</span>
												<span class="ml-1">
													<a class="add-more-link-muted small add-image-video initial-image-video-hide"  href="javascript:void(0);" >
														<i class="fas fa-plus fa-fw " style="margin-right:.25rem;font-size:85%;"></i>
														Add Image or Video
													</a>
												</span>
											</div>
											<!---- Callout End ---->
										</div>
									</div>
								</div>
								<?php
												$section_count++;
											}?>
							</div>
							<div class="row">
								<div class="col-md-8">
									<div class="form-group overflow-hidden ">
										<a class="add-more-link-muted add-another-paragraph" href="javascript:;" data-repeater-create="" >
											<i class="fas fa-plus"></i>
											Add Another Paragraph
										</a>
										
									</div>
								</div>
							</div>

						</div>
						<!-------------Paragraphs End---------------->
						
						<!-------------Backlink Start---------------->
						<!-------------Backlink End---------------->
					</div>
				</div>
				<div class="col-md-4">
					<!-------------Sidebar Start---------------->
					<div id="optimizecontent-result-container"> 
						<?php
							$this->load->view('secure/link_building_article/lbarticle_widget');
						?>
					</div>
					<!------------- Sidebar End ---------------->
					<!-------------Widget TF IDF---------------->
					<div id="link-optimizecontent-result-container"> 
						<?php
							$this->load->view('component/optimizecontent_lb', $optimizecontent);
						?>
					</div>
					<!------------- Eidget TF IDF End ---------------->
				</div>
			</div>
		</div>
	</div>
	<!--- Article Tab Section End  --->
	<!--- Promotion Tab Section Start  --->
	<div class="tab-pane fade" id="promotion" role="tabpanel" aria-labelledby="promotion-tab">
	  <div class="container mt-2">
		<div class="row">
			<div class="col-md-9">
				<!-------------Social Media Section Start---------------->

				<!-------------Social Media Section End---------------->

			</div>
			<div class="col-md-3">
				
			</div>
		</div>
	  </div>
	</div>
	<!--- Promotion Tab Section End  --->

	<!--- Meta Data Tab Section Start  --->
	<div class="tab-pane fade" id="metadata" role="tabpanel" aria-labelledby="metadata-tab">
	    <div class="container mt-2">
			<div class="row">
				<div class="col-md-8">
					<!-------------Article Setting Start---------------->
				
					<!-------------Article Setting End---------------->

				</div>
				<div class="col-md-4">
					<!-------------Sidebar Start---------------->
					<!------------- Sidebar End ---------------->
				</div>
			</div>
		</div>
	</div>
	<!--- Meta Data Tab Section End  --->
</div>
<?php if($article['language_id']=='en'){ echo form_close(); }?>