<div class="custom-nav-tab-container">
	<div class="container">
		<ul class="nav nav-tabs custom-nav-tabs" id="customTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link" id="article-brief-tab" data-toggle="tab" href="#articlebrief" role="tab" aria-controls="articlebrief" aria-selected="true">Article Brief</a>
			</li>
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
</div>
<?php
$primaryRuleArray = array(
	"rule"=>["primary"]	
);
$primary_keyword_rule = htmlentities(json_encode($primaryRuleArray));
$article_status = strtolower($article['article_status']);
$attributes = array('class' => 'form-horizontal form-bordered form-validate article-form', 'id' => 'article-form');
if($article['language_id']=='en'){
	echo form_open('', $attributes);
}

?>
<div class="tab-content" id="articleTabContent">
    <!--- Article Brief Tab Section Start  --->
	<div class="tab-pane fade" id="articlebrief" role="tabpanel" aria-labelledby="article-brief-tab">
		<div class="container mt-2">
			<div class="row">
				<div class="col-md-12">
					<!------------- Article Brief Section Start ---------------->

					<?php
						//$articlesbrief = array();
						$this->load->view('component/article_brief', $articlesbrief);
					?>
					<!------------- Article Brief Section End ---------------->

				</div>
			</div>
	  	</div>
	</div>
	<!--- Article Brief Tab Section End  --->

	<!--- Article Tab Section Start  --->
	<div class="tab-pane fade show active" id="article" role="tabpanel" aria-labelledby="article-tab">
	     <div class="container">
				<div class="language-navigation">
					<ul class="nav nav-tabs">
						<?php
						$segment_array = $this->uri->segment_array();
						$segment_array[2] = 'i18';
						foreach ($article_languages as $value) {
							$segment_array[3] = $value;
							$temp_str =  implode('/', $segment_array);
							$url =  site_url($temp_str);
							$active = ($value == $lang) ? 'active' : '' ;
							/*echo '<li class="nav-item">
							<a class="nav-link change-lang-tab '.$active.'" data-bind="'.$url.'" href="javascript:void(0);" >'.$languages[$value].'</a>
							</li>';*/
							echo '<li class="nav-item">
							<a class="nav-link '.$active.'" data-bind="'.$url.'" href="'.$url.'" >'.$languages[$value].'</a>
							</li>';
						}?>
						<!--<li class="nav-item">
							<a class="nav-link article-add-language" data-target="#language-modal" href="javascript:void(0);">
								<i class="fas fa-plus-circle" style="color:green"></i> Add Language
							</a>
						</li>-->
					</ul>
				</div>
				<div class="form-actions inline-spacing mt-2 mb-1">
						<?php 
								$keyword = $article['article_title'];
								if($article['article_meta_keyword']){
									$keyword = $article['article_meta_keyword'];
								}
						?>
						<button type="submit" name="submitForm" value="savedraft" class="btn btn-success btn-icon article-button-click" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
							<i class="fas fa-save"></i> <?php echo ($user_type) ? 'Save' : 'Save'?>
						</button>


						<a type="button" href="<?php echo site_url('/optimizecontent/export_optimize_content_keywords/'.$article['article_id'].'/'. $article['language_id']) ?>" data-keyword="<?php echo $article['article_meta_keyword'] ?>" data-article="<?php echo $article['article_id'] ?>"
					data-lang="<?php echo $article['language_id'] ?>" id="export-keywords" class="btn btn-secondary btn-icon export-keywords  <?php echo ($article['language_id']=='en') ? '' : 'inactiveLink'?>" target="_parent" >
							<i class="fas fa-key"></i>
							Export keywords
						</a>

						<button type="button" data-article="<?php echo $article['article_id'] ?>"
							data-lang="<?php echo $article['language_id'] ?>" data-keyword="<?php echo $keyword ?>" id="check-score" class="btn btn-secondary btn-icon check-score" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
							<span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span>
							<i class="fas fa-tachometer-alt"></i> 
							Check Score
						</button>

						<button type="submit" name="submitForm" value="submit" class="btn btn-success btn-icon article-button-click" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
							<i class="fas fa-check "></i> <?php echo ($user_type) ? 'Submit' : 'Submit'?>
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
							'value' => 'supporting',
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
							$redirect_path = 'secure/articleslist';
						}else{
							$redirect_path = '/';
						}
						?>
						<a href="<?php echo site_url($redirect_path) ?>" class="btn btn-default btn-icon <?php echo ($article['language_id']=='en') ? '' : 'inactiveLink'?>" >
							<i class="fas fa-times"></i>
							Cancel
						</a>
						<?php if($user_type && $user_type !=4){?>
						<button type="button"
							data-article="<?php echo $article['article_id'] ?>"
							data-lang="<?php echo $article['language_id'] ?>"
							value="copyscape"
							class="btn btn-success btn-icon verify_copyscape" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
							<?php if($article['article_copyscape']){ ?>
							<i class="fas fa-check-square" aria-hidden="true"></i><?php } ?>
							Copyscape
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
									href="' . site_url('/secure/articleslist/restore_article/'.$lang.'/'. $article['article_id']) . '"
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
									data-target="' . site_url('secure/articleslist') . '" '.$disabled.' >
									<i class="fas fa-undo"></i> Restore
								</button>';
							} else {
								$delbutton = '<button type="button" class="btn btn-danger btn-icon"
									href="' . site_url('/secure/articleslist/delete_article/'.$lang.'/'. $article['article_id']) . '"
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
									data-target="' . site_url('secure/articleslist') . '" '.$disabled.' >
									<i class="fas fa-trash-alt"></i> Delete
								</button>';
							}
							if($article['article_id'] && $article['article_i18_id']){
							if ($article_status != 'deleted' && $article_status != 'draft' && $user_type && $user_type !=4){
								if($article['article_copyscape']==false && $article_status =='submitted' ){?>
									<button type="button" value="publish" class="btn btn-primary btn-icon article-publish" disabled>
									<i class="fas fa-check "></i>
									Publish
								</button>

							<?php }else{
								
								?>
								<button type="button" value="publish" class="btn btn-primary btn-icon article-publish" <?php echo ($article['language_id']=='en') ? '' : 'disabled'?>>
									<i class="fas fa-check "></i>
									Publish
								</button>
							<?php
							} }
							echo $delbutton ?>

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
													<label class="h6" for="article_title">Headline<span class="text-danger">*</span>
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
													'check_keyword' => $primary_keyword_rule,
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
												<div class="holder-style holder-active embed-responsive remove-youtube-tab mb-2 <?php if($article_image) echo 'embed-responsive-16by9';?>" href="#pixabayModal" data-toggle="modal" data-target="#pixabayModal" style="background-image: url('<?php echo $article_image;?>')";>
													<div class="youtubevideo"></div>
													<div class="holder-icon <?php if(!$article_image) echo 'uploading';?>">
														<div class="holder-icon-text">
															<img src="<?php echo base_url(); ?>assets/images/add.svg" style="height:30px">
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

													$hero_image = '';
													if($article['article_image']){
														$hero_image = 1;
													}
													$data_upload_hero_image_hide = array(
														'type' => 'hidden',
														'name' => "hero_image",
														'value' => $hero_image,
														'class' => 'hero_image',
														'required' => 'required',
														'data-msg-required'=>"Top Image is required."
													);

													echo form_input($data_upload_hero_image_hide);

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
												<a href="javascript:void(0);" class="fas fa-trash-alt holder-style-edit delete_image is_article_image text-danger" data-action="article|<?php echo $lang ?>|<?php echo $article['article_id']?>|<?php echo $article['article_image']?>|0" data-toggle="tooltip" data-placement="top" title="Remove Multimedia" <?php if($article_image) echo 'style="display:block"';?>></a>
											</div>
										</div>
										<div class="form-group mb-2 section-image-found">
										<div class="row">
											<div class="col-md-8">
												<label class="h6" for="article_image_alt">
													Image Description
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
													<label class="h6">Summary<span class="text-danger">*</span>
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
													'check_keyword' => $primary_keyword_rule,
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
											<div id="paragraph-<?php echo $section_id?>" class="mb-2 repeat-paragraph p-container" data-repeater-item>
												<div class="row">
													<div class="col-md-12">
														<div class="page-inner-header position-relative mb-2">
											<div class="delete-paragraph-container">
												<?php if($section_id && $section_count >= 0){?>
																<a class="deleteParagraph"
																	href="<?php echo site_url('/secure/articleslist/delete_paragraph/'.$lang.'/' . $section_id);?>"
																	data-toggle="confirmation"
																	data-icon-type="error"
																	data-title="Delete this section?"
																	data-message="This paragraph will be removed from article and this can not be <b>Undone</b>."
																	data-confirm-text="Delete"
																	data-confirm-class="btn-danger"
																	data-confirm-callback="repeaterReload"
																	data-cancel-text="Cancel"
																	data-cancel-callback="dismissConfirmation"
																	data-cancel-class="btn-default"
																	data-target="#paragraph-<?php echo $section_id?>">
																	<i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Paragraph"></i>
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
																			'class' => 'form-control calc-length primary-keyword-phrase seo-content-keywords section_title'
																		);
																		$data_section_title['check_keyword_paragraph'] =	'true';
																		/*if($section_count == 0){
																			
																			$data_section_title['check_keyword'] = $primary_keyword_rule;	
																		}else{
																			
																			$data_section_title['check_keyword'] =	'true';
																		}*/
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
																	//$selected_heading_type ='h2';
																	if($paragraph['section_heading_type']){
																		$selected_heading_type = $paragraph['section_heading_type'];
																		//pre($selected_cat);
																	}else{
																		$selected_heading_type = 'h2';
																	}
																	echo form_dropdown("section_heading_type", $heading_type, $selected_heading_type, 'class="form-control-sm select-2 section_heading_type"' );
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
																<div class="holder-style holder-active embed-responsive mb-2 <?php if(!$show_loading) echo 'embed-responsive-16by9';?>" href="#pixabayModal" data-toggle="modal" data-target="#pixabayModal" style="background-image: url('<?php echo $section_image;?>')">
																	<div class="youtubevideo">
																		<?php
																		if($section_video){
																			echo '<iframe width="560" height="315" src="//www.youtube.com/embed/' . $section_video . '" frameborder="0" allowfullscreen></iframe>';
																		}?>
																	</div>
																	<div class="holder-icon <?php if($show_loading) echo 'uploading';?>">
																		<div class="holder-icon-text">
																			<img src="<?php echo base_url(); ?>assets/images/add.svg" style="height:30px">
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
																<a href="javascript:void(0);" class="fas fa-trash-alt holder-style-edit delete_image text-danger" data-action="section|<?php echo $lang ?>|<?php echo $paragraph['section_id']?>|<?php echo $paragraph['section_image']?>|0" data-toggle="tooltip" data-placement="top" title="Remove Multimedia" <?php if(!$show_loading) echo 'style="display:block"';?>></a>
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
																<label class="h6">Meta Video Description</label>
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
																<label class="h6">Meta Video Thumbnail 1x1</label>
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
																<label class="h6">Meta Video Thumbnail 4x3</label>
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
																<label class="h6">Meta Video Thumbnail 16x9</label>
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
																<label class="h6">Meta Video Interaction count</label>
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
												
													<div class="form-group mb-2 section-image-found <?php if($section_video) echo 'hide'; ?>">
														<div class="row">
															<div class="col-md-8">
																<label class="h6" for="section_image_alt">Image Description
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
																'class' => 'form-control article_image_alt calc-length primary-keyword-phrase seo-content-keywords section_image_alt'
															);
															$data_section_image_alt['check_keyword_paragraph'] ='true';
															/*if($section_count == 0){
																$data_section_image_alt['check_keyword_paragraph'] = $primary_keyword_rule;	
															}else{
																$data_section_image_alt['check_keyword_paragraph'] ='true';
															}*/
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
																'class' => 'form-control init-editor primary-keyword-phrase paragraph-sentences'
															);
															$data_section_text['check_seo_rules'] =	'true';
															/*if($section_count == 0){
																$ruleArray=array(
																	"rule"=>["keyword"]	
																);
																$data_section_text['check_seo_rules'] =	htmlentities(json_encode($ruleArray));
															}else{
																$data_section_text['check_seo_rules'] =	'true';
															}*/
															echo form_textarea($data_section_text);
															echo form_error('section_text');
															?>
													<div class="input-group-append align-items-center input-textarea" style="right:30px;">
														<span class="input-group-text text-success font-weight-bold char-remain"  id=""></span>
														<?php if( $section_count == 0){?>
														<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>A keyword phrase does not appear in the first paragraph of the article.</small>" class="fas fa-exclamation-triangle"></i></span>
														<?php } ?>
														<span class="input-group-text text-warning font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="" class="fas fa-exclamation-triangle para_sentences" ></i></span>
													</div>
												</div>
													</div>
													<!---- Callout Start ---->
													<div class="form-group text-right">
														
													</div>
													
													<!-- Callout Repeater -->
													<div class="inner-repeater callouts-collapse-<?php echo $section_count?> collapse <?php if($paragraph['callouts'][0]['callout_i18_id']) echo 'show';?> ">
														<div class="" data-repeater-list="callouts">
														
															<?php 
															$callout_count = 0;
															foreach($paragraph['callouts'] as $callout){
																$callout_id = set_value('callout_i18_id', $callout['callout_i18_id']);
															//pre($callout);
															?>
															<div id="callout-<?php echo $callout_id?>" class="callout-editor mb-1" data-repeater-item>
															<div class="page-inner-header position-relative mb-2">
															<div class="delete-callout-container" >
															<?php if($callout_id && $callout_count > 0){?>
															<a class="deleteCallout"
																href="<?php echo site_url('/secure/articleslist/delete_callout/'.$lang.'/' . $callout_id);?>"
																data-toggle="confirmation"
																data-icon-type="error"
																data-title="Delete this callout section?"
																data-message="This callout will be removed from article and this can not be <b>Undone</b>."
																data-confirm-text="Delete"
																data-confirm-class="btn-danger"
																data-confirm-callback="repeaterReload"
																data-cancel-text="Cancel"
																data-cancel-callback="dismissConfirmation"
																data-cancel-class="btn-default"
																data-target="#callout-<?php echo $callout_id?>">
																<i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Callout"></i>
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
																<h4 class="mb-0">Callout</h4>
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
																			<label class="h6" for="callout_title">Title
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
																			'class' => 'form-control calc-length seo-content-keywords callout_title'
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
																			'class' => 'form-control init-editor'
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
														<a class="add-more-link-muted small" href="javascript:void();" data-repeater-create="">
																<i class="fas fa-plus"></i>
																Add Another Callout
															</a>
														</div>
													</div>
													<!---- Social Media Callout Start ---->
													<div class="social-media-callouts-collapse-<?php echo $section_count?> collapse <?php if($paragraph['social_media_callout_i18_id']) echo 'show';?> ">
														<?php
															$social_media_callout_id = set_value('social_media_callout_i18_id', $paragraph['social_media_callout_i18_id']);
														?>
														
															<div class="page-inner-header position-relative mb-2">
																<div class="delete-social-media-callout-container" >
																	<?php 
																	if($social_media_callout_id){?>
																		<a class="deleteSocialMediaCallout"
																			href="<?php echo site_url('/secure/articleslist/delete_social_media_callout/'.$lang.'/' . $social_media_callout_id);?>"
																			data-toggle="confirmation" data-icon-type="error"
																			data-title="Delete this callout section?"
																			data-message="This social media callout will be removed from article and this can not be <b>Undone</b>."
																			data-confirm-text="Delete"
																			data-confirm-class="btn-danger"
																			data-confirm-callback="calloutReload"
																			data-cancel-text="Cancel"
																			data-cancel-callback="dismissConfirmation"
																			data-cancel-class="btn-default"
																			data-target=".social-media-callouts-collapse-<?php echo $section_count?>">
																			<i class="fas fa-trash-alt text-danger"
																				data-toggle="tooltip" data-placement="top"
																				data-original-title="Remove Social Media Callout"></i>
																		</a>
																		<?php }else{?>
																			<a class="deleteSocialMediaCallout delete-social-media-callout"
																			href="javascript:void(0)" 
																			data-delete-social-media-callout=".social-media-callouts-collapse-<?php echo $section_count?>">
																			
																			<i class="fas fa-trash-alt text-danger"
																				data-toggle="tooltip" data-placement="top"
																				data-original-title="Remove Social Media Callout"></i>
																			</a>

																		<?php } ?>
																</div>
																<h4 class="mb-0">Social Media Callout</h4>
																<?php

																	$data_social_media_callout_id_hide = array(
																		'type' => 'hidden',
																		'name' => 'social_media_callout_i18_id',
																		'value' => $social_media_callout_id,
																		'class' => 'social_media_callout_i18_id'
																	);
																	echo form_input($data_social_media_callout_id_hide);

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
																		$data_section_social_media_callout_title = array(
																			'name' => 'social_media_callout_title',
																			'value' => set_value('social_media_callout_title',$paragraph['social_media_callout_title'],  $html_escape=FALSE),
																			'maxlength' => 150,
																			'placeholder' => 'Callout title max 150 characters in length',
																			'class' => 'form-control calc-length seo-content-keywords callout_title social_media_callout_title'
																		);
																		echo form_input($data_section_social_media_callout_title);
																		echo form_error('social_media_callout_title');
																		?>
																	<div class="input-group-append align-items-center input-text">
																	<span class="input-group-text text-success font-weight-bold char-remain" id="">150</span>
																	</div>
																</div>
															</div>
														
															
													</div>
													<!---- Social Media Callout End ---->
													<div class="form-group text-left">
														<span>
													<a class="add-more-link-muted small add-callout initial-callout-hide" data-callout=".callouts-collapse-<?php echo $section_count?>" data-toggle="collapse1" href="javascript:void(0);" role="button" aria-expanded="false" aria-controls="callouts-collapse">
														<i class="fas fa-plus fa-fw " style="margin-right:.25rem;font-size:85%;"></i>
														Add Callout
													</a>
												</span>
												<span class="ml-1">
													<a class="add-more-link-muted small add-social-media-callout initial-callout-hide" data-social-media-callout=".social-media-callouts-collapse-<?php echo $section_count?>" data-toggle="collapse" href="javascript:void(0);" role="button" aria-expanded="false" aria-controls="callouts-collapse">
														<i class="fas fa-plus fa-fw " style="margin-right:.25rem;font-size:85%;"></i>
														Add Social Media Callout
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
								if($section_count == 1 && $cta_from_brief)
								{
									if(array_key_exists(0,$cta_from_brief))
									{
										$this->load->view('secure/contentarticlebrief/brief_cta_preview',$cta_from_brief[0]);
									}
								}
								if($section_count == 4 && $cta_from_brief)
								{
									if(array_key_exists(1,$cta_from_brief))
									{
										$this->load->view('secure/contentarticlebrief/brief_cta_preview',$cta_from_brief[1]);
									}
								}
								$section_count++;
							}
							?>
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
								<div class="col-md-12 mb-3">
									<?php 
									if(array_key_exists(2,$cta_from_brief))
									{
										$this->load->view('secure/contentarticlebrief/brief_cta_preview',$cta_from_brief[2]);
									}
									?>
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
							$this->load->view('component/optimizecontent', $optimizecontent);
						?>
					</div>
					<!------------- Sidebar End ---------------->
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

					<?php 
					if($user_type && $user_type!=4){ 
						//pre($socialmedia_messages);
						//pre($channels);
						
						?>

						<div class="row mb-2">
							<div class="col-md-12">
								<h3 class="mb-0">Article Promotion / Amplification</h3>
							</div>
						</div>
					<?php
						foreach($channels as $channel){ 
							//pre($channel->article_promo_channel);
							//pre($socialmedia_messages);
							if(array_key_exists($channel->article_promo_channel, $socialmedia_messages)){
								//pre($socialmedia_messages[$channel->article_promo_channel]);
							
								//pre($socialmedia_messages);
							//pre($socialmedia_section_count);
						if($channel->article_promo_channel!='instagram'){
							?>
						
						<div class="repeater-social-media-section">
							<div class="row text-right">
								<div class="col-md-12">
									<div class="form-group overflow-hidden ">
										
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col-md-10">
										<h4 class="mb-0"><?php echo ucfirst($channel->article_promo_channel);?></h4>
									</div>
									<div class="form-group col-md-2 text-right mb-0">
										<div class="d-flex align-items-center">
										<span class="text-success font-weight-bold ml-3">
											<!--<a class="mb-2" href="javascript:;" data-repeater-create="">
												<i class="fas fa-plus-circle fa-lg" style="color:green"></i>
											</a>-->
										</span>
										<span class="text-success font-weight-bold msg_status_switch ml-1">
										<?php
										//pre(array_key_exists("msg_status", $socialmedia_messages[$channel->article_promo_channel][0]));
											$msgid = $socialmedia_messages[$channel->article_promo_channel][0]['msg_id'];
											if($msgid!=''){
												if(array_key_exists("msg_status", $socialmedia_messages[$channel->article_promo_channel][0]) && $socialmedia_messages[$channel->article_promo_channel][0]['msg_status'] == 1){
													$msg_status = true;
												}
												if(array_key_exists("msg_status", $socialmedia_messages[$channel->article_promo_channel][0]) && $socialmedia_messages[$channel->article_promo_channel][0]['msg_status']==''){
													$msg_status = false;
												}
											}else{
												$msg_status = true;
											}
											//pre($socialmedia_messages[$channel->article_promo_channel][0]['msg_status']);
											//pre($msg_status);
											$data_article_promotion_message_status = array(
												'id' => 'msg_status_'.$channel->article_promo_channel,
												'name' => "msg_status[$channel->article_promo_channel]",
												'value' => $msg_status,
												'checked' => $msg_status,
												'data-switch' => 'success',
												'class' => 'checkbox-switch__input msg_status msg_status_switch'
											);
												echo form_checkbox($data_article_promotion_message_status);
											?>
											<label class="m-0" data-on-label="" data-off-label=""
												for="msg_status_<?php echo $channel->article_promo_channel ?>"></label>

										</span>
										</div>
									</div>
								</div>
								<hr class="my-1">
							<div data-repeater-list="<?php echo $channel->article_promo_channel ?>">
							<?php
								$socialmedia_section_count = 1;
								foreach($socialmedia_messages[$channel->article_promo_channel] as $socialmedia_message){
									$msg_id = set_value('msg_id', $socialmedia_message['msg_id']);
								?>
								<div id="socialmedia-<?php echo $msg_id ?>"  class="social-media-repeater-item p-container"  data-repeater-item>
									
									<div class="row">
										<div class="col-md-5">
											<div class="page-inner-header position-relative mb-0">
												<?php if($msg_id && $socialmedia_section_count > 1){?>
												<a class="deleteSocialmedia"
													href="<?php echo site_url('/secure/articleslist/delete_socialmedia_section/' . $msg_id);?>"
													data-toggle="confirmation"
													data-icon-type="error"
													data-title="Delete this social media post ?"
													data-message="This social media post will be removed from article and this can not be <b>Undone</b>."
													data-confirm-text="Delete"
													data-confirm-class="btn-danger"
													data-confirm-callback="repeaterReload"
													data-cancel-text="Cancel"
													data-cancel-callback="dismissConfirmation"
													data-cancel-class="btn-default"
													data-target="#socialmedia-<?php  echo $msg_id; ?>">
													<i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Social Media Post"></i>
												</a>
												<?php }?>	
												<?php
													$data_language_id_hide = array(
														'type' => 'hidden',
														'name' => 'article_language_id',
														'value' => $lang,
														'class' => 'language_id'
													);
													echo form_input($data_language_id_hide);
													
													$data_msg_id_hide = array(
														'type' => 'hidden',
														'name' => 'msg_id',
														'value' => $msg_id,
														'class' => 'msg_id'
													);
													echo form_input($data_msg_id_hide); 
													
													$data_msg_channel_hide = array(
														'type' => 'hidden',
														'name' => 'msg_channel',
														'value' => $channel->article_promo_channel,
														'class' => 'msg_channel'
													);
													echo form_input($data_msg_channel_hide);
					
													$data_msg_sequence_hide = array(
														'type' => 'hidden',
														'name' => 'msg_sequence',
														'value' => $socialmedia_section_count,
														'class' => 'msg_sequence'
													);
													echo form_input($data_msg_sequence_hide);
													
													$data_msg_article_headline_hide = array(
														'type' => 'hidden',
														'name' => 'msg_article_headline',
														'value' => $article['article_title'],
														'class' => 'msg_article_headline'
													);
													echo form_input($data_msg_article_headline_hide);
												?>
											</div>
										<?php if($channel->article_promo_channel_show_msg_multimedia){ ?>
											<div class="form-group">
												<?php
												//pre($socialmedia_message['msg_multimedia']);
												$msg_multimedia_section_image = '';
												$msg_multimedia_section_video = '';

												if(pathinfo($socialmedia_message['msg_multimedia'], PATHINFO_EXTENSION)){
													$msg_multimedia_section_image = set_value('msg_multimedia', $socialmedia_message['msg_multimedia']);
												}else{
													$msg_multimedia_section_video = set_value('video_url', $socialmedia_message['msg_multimedia']);
												}
												
												//pre($msg_multimedia_section_image);
												
												//$msg_multimedia_section_video = '';
												$msg_multimedia_show_loading = true;
												if($msg_multimedia_section_image || $msg_multimedia_section_video){
													$msg_multimedia_show_loading = false;
												}
												?>
												<label class="h6"><span class="text-danger"></span></label>
												<div class="position-relative ">
													<div class="holder-style holder-active embed-responsive mb-2 <?php if(!$msg_multimedia_show_loading) echo 'embed-responsive-16by9';?>" href="#pixabayModal" data-toggle="modal" data-target="#pixabayModal" style="background-image: url('<?php echo $msg_multimedia_section_image;?>')">
														<div class="youtubevideo">

														<?php

															if($msg_multimedia_section_video){
																echo '<iframe width="560" height="315" src="//www.youtube.com/embed/' . $msg_multimedia_section_video . '" frameborder="0" allowfullscreen></iframe>';
															}
														?>
															
															
														</div>
														<div class="holder-icon <?php if($msg_multimedia_show_loading) echo 'uploading';?>">
															<div class="holder-icon-text">
																<img src="<?php echo base_url(); ?>assets/images/add.svg" style="height:30px">
																<div class="d-block">Click to add an image</div>
															</div>
														</div>
														<?php
														//pre($msg_multimedia_section_image);
															$data_msg_multimedia_section_image_hide = array(
																'type' => 'hidden',
																'name' => 'msg_multimedia',
																'value' => $msg_multimedia_section_image,
																'class' => 'upload_image'
															);
															echo form_input($data_msg_multimedia_section_image_hide);
															$data_msg_multimedia_image_base64_hide = array(
																'type' => 'hidden',
																'name' => 'image_url_base64',
																'value' => '',
																'class' => 'upload_image_base64'
															);
															echo form_input($data_msg_multimedia_image_base64_hide);
															$data_msg_multimedia_section_video_hide = array(
																'type' => 'hidden',
																'name' => 'video_url',
																'value' => $msg_multimedia_section_video,
																'class' => 'section_video'
															);
															echo form_input($data_msg_multimedia_section_video_hide);
															$article_image_status = 0;
															if($msg_multimedia_section_image == $article['article_image']){
																$article_image_status = 1;
															}

														?>

													</div>
													<a href="javascript:void(0);" 
														class="fas fa-trash-alt holder-style-edit delete_image text-danger social-media-channel <?php echo ($article_image_status > 0) ? 'article_image' : ''?>" 
														data-action="social-channel|<?php echo $lang ?>|<?php echo $socialmedia_message['msg_id']?>|<?php echo $msg_multimedia_section_image?>|<?php echo $article_image_status?>" data-toggle="tooltip" data-placement="top" title="Remove Multimedia" <?php if(!$msg_multimedia_show_loading) echo 'style="display:block"';?>></a>
													
												</div>
											</div>
											<?php } ?>	
										</div>
										<div class="col-md-7">
											<?php if($channel->article_promo_channel_show_headline){ ?>
											<div class="form-group mb-2">
												<div class="row">
													<div class="col-md-8">
														<label class="h6">Headline<span class="text-danger"></span>
														</label>
													</div>
													<div class="col-md-4 text-right">
													</div>
												</div>
												<div class="input-group">
														<?php

														$data_msg_headline = array(
															'name' => 'msg_headline',
															'value' => set_value('msg_headline',$socialmedia_message['msg_headline'],  $html_escape=FALSE),
															'maxlength' => 100,
															'placeholder' => 'Headline max 100 characters in length',
															'class' => 'form-control calc-length',
															'data-msg-required'=>"Please enter headline"
														);
														echo form_input($data_msg_headline);
														echo form_error('msg_headline');
														?>
													<div class="input-group-append align-items-center input-text">
														<span class="input-group-text text-success font-weight-bold char-remain" id="">100</span>
													</div>
												</div>
											</div>
											<?php } if($channel->article_promo_channel_show_msg_intro){ ?>
											<div class="form-group mb-2">
												<div class="row">
													<div class="col-md-8">
														<label class="h6">Introduction Text<span class="text-danger"></span>
															
														</label>
													</div>
													<div class="col-md-4 text-right">
													</div>
												</div>
												<div class="input-group">
													<?php
													
													$data_msg_intro = array(
														'name' => 'msg_intro',
														'rows' => 4,
														'cols' => 50,
														'value' => set_value('msg_intro', $socialmedia_message['msg_intro'], $html_escape=FALSE),
														'maxlength' => 280,
														'placeholder' => 'Introduction text max 280 characters in length',
														'class' => 'form-control calc-length',
														'data-msg-required'=>"Please enter introduction text"
													);
													echo form_textarea($data_msg_intro);
													echo form_error('msg_intro');
													?>
													<div class="input-group-append align-items-center input-textarea">
														<span class="input-group-text text-success font-weight-bold char-remain" id="">280</span>
													</div>
												</div>
											</div>
											<?php } if($channel->article_promo_channel_show_msg_text){ ?>
											<div class="form-group mb-2">
												<div class="row">
													<div class="col-md-8">
														<label class="h6">Description Text<span class="text-danger"></span>
														</label>
													</div>
													<div class="col-md-4 text-right">
													</div>
												</div>
												<div class="input-group">
													<?php
													
													$data_msg_text = array(
														'name' => 'msg_text',
														'rows' => 4,
														'cols' => 50,
														'value' => set_value('msg_text', $socialmedia_message['msg_text'],  $html_escape=FALSE),
														'maxlength' => 280,
														'placeholder' => 'Description text max 280 characters in length',
														'class' => 'form-control calc-length',
														'data-msg-required'=>"Please description text"
													);
													echo form_textarea($data_msg_text);
													echo form_error('msg_text');
													?>
													<div class="input-group-append align-items-center input-textarea">
														<span class="input-group-text text-success font-weight-bold char-remain" id="">280</span>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="mb-2">
												<div class="row">
												<?php if($channel->article_promo_channel_show_msg_cta){ ?>
													<div class="<?php echo ($channel->article_promo_channel_show_msg_url_link) ? 'col-md-6' : 'col-md-12'?>">
														<div class="form-group">
															<label class="h6">Call to Action<span class="text-danger"></span>
																
															</label>
															<?php
																$msg_product_cta = $product_list;
																echo form_dropdown("msg_cta", $msg_product_cta, $socialmedia_message['msg_cta'], 'class="form-control" data-msg-required="Please select call to action"' );
																echo form_error("msg_cta");
															?>
														</div>
													</div>
													<?php } if($channel->article_promo_channel_show_msg_url_link){ ?>
													<div class="<?php echo ($channel->article_promo_channel_show_msg_cta) ? 'col-md-6' : 'col-md-12'?>">
														<div class="form-group">
															<label class="h6">
																Url Link<span class="text-danger"></span>
															</label>
															<?php
													
															$data_msg_url_link = array(
																'name' => 'msg_url_link',
																'value' => set_value('msg_url_link', $socialmedia_message['msg_url_link'], $html_escape=FALSE),
																'placeholder' => 'URL link',
																'class' => 'form-control',
																'data-msg-required'=>"Please enter url link"
															);
															echo form_input($data_msg_url_link);
															echo form_error('msg_url_link');
															?>
														</div>
													</div>
													<?php } ?>
												</div>		
											</div>


										</div>
									</div>
								</div>
								<?php 
								$socialmedia_section_count++;
								}
								?>
							</div>

						</div>
					<?php 
						
					}
					}
					}
					} ?>
					<!-------------Social Media Section End----------------> 
				</div>
				<div class="col-md-3">
					<!-------------Sidebar Start---------------->
						
					<!------------- Sidebar End ---------------->
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
					<?php if($user_type && $user_type !=4){?>
						<div class="row mt-2">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header h3 pb-0">Article Setting</div>
									<div class="card-body">
																			<!-------------Add Article publish info Start---------------->
									<div class="row">
										<label class="col-md-6 col-sm-6 h6 col-form-label"
											for="article-master-publish-website">
											Website
										</label>
										<div class="form-group col-md-6 col-sm-6 ">
										<select class="form-control" id="article-master-publish-website" name="publish-website-info" disabled>
											<option value='<?php echo strtolower($article['article_site_id']); ?>'>
												<?php echo ucwords($article['article_site_id']) ?>
											</option>
										</select>
										</div>
									</div>
									<div class="row">
										<legend class="col-form-label col-md-6 col-sm-6 pt-0">Site Structure</legend>
										<div class="col-md-6 col-sm-6 article-modal-article-type">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="topicCluster1" name="siteStructure" value="cluster" class="custom-control-input" data-show-class=".cluster-show" checked>
												<label class="custom-control-label" for="topicCluster1">Topic Cluster</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="blog1" name="siteStructure" value="blog" class="custom-control-input" data-show-class=".blog-show" disabled >
												<label class="custom-control-label" for="blog1">Blog</label>
											</div>
										</div>
									</div>
									<div class="row">
										<legend class="col-form-label col-sm-6 pt-0">Article Type</legend>
										<div class="col-sm-6 article-modal-type">
											<div class="article-modal-article-type cluster-show">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="pillarArticle1" name="articleClusterType" value="pillar" class="custom-control-input"  data-show-class=".pillar-show" disabled >
													<label class="custom-control-label" for="pillarArticle1">Pillar Article</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" id="supportingArticle1" name="articleClusterType" value="supporting" class="custom-control-input"  data-show-class=".supporting-show" checked >
													<label class="custom-control-label" for="supportingArticle1">Supporting Article</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<label for="article-master-publish-keyword" class="col-sm-6 col-form-label">Keyword<span class="text-danger">*</span></label>
										<div class="col-sm-6">
											<div class="form-group">
											<?php
												$data_article_master_keyword = array(
													'name' => "keyword",
													'value' => set_value("keyword", ucfirst($article['article_meta_keyword']), $html_escape=FALSE),
													'id' => 'article-master-publish-keyword',
													'disabled' => 'disabled',
													'class' => 'form-control'
												);
												echo form_input($data_article_master_keyword);
												?>
											</div>
										</div>
									</div>
									<div class="row hide" >
										<label for="article-master-publish-permalink" class="col-sm-6 col-form-label">Permalink<span class="text-danger">*</span>
										</label>
										<div class="col-sm-6">
											<div class="form-group">
													<?php
														$data_article_master_permalink = array(
															'name' => "permalink",
															'value' => set_value("permalink", $article['article_permalink'], $html_escape=FALSE),
															'id' => 'article-master-publish-permalink',
															'placeholder' => 'ex. employee-scheduling',
															'disabled' => 'disabled',
															'class' => 'form-control'
														);
														echo form_input($data_article_master_permalink);
													?>
												<small class="form-text text-muted">A permalink should be unique for the selected website.</small>
											</div>
										</div>
									</div>
									<div class="row">
										<label for="article-master-publish-pillar" class="col-sm-6 col-form-label">Pillar Article</label>
										<div class="col-sm-6">
											<div class="form-group">
												<select class="form-control" id="article-master-publish-pillar" name="article_master_pillar" disabled>
												<?php foreach ($pillararticle_info as $pillararticle) { 
														if(array_key_exists('article_pillar_id', $pillararticle)){ ?>
														<option value="<?php echo $pillararticle['article_permalink'] . '/' . trim($pillararticle['article_pillar_id']) ?>"><?php echo ucwords($pillararticle['article_meta_keyword']) ?></option>
												<?php 
														}
													} 
												?>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<!-------------Add Article publish info  End---------------->
									<!-------------Article Visible Setting Start---------------->
										<div class="row">
											<label class="col-md-6 col-sm-6 h6 col-form-label" for="article_meta_lookup_id">
												Product Id
											</label>
											<div class="form-group col-md-6 col-sm-6 ">
												<?php

														$product_id = array();
														$product_id[''] = '---Select Product Id---';
														foreach ($websites as $website){
															$product_id[$website['meta_product_unique_key']] = ucfirst(ucwords($website['meta_product_id']));
														}	
														echo form_dropdown("article[$lang][meta_product_unique_key]", $product_id, $article['meta_product_unique_key'], 'class="custom-select " required="required" data-msg-required="Please select product Id" id="article_meta_lookup_id"' );
														echo form_error("article[$lang][meta_product_unique_key]");
												?>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-6 col-sm-6 h6 col-form-label" for="article_toc_ordered">
												Table of content style
											</label>
											<div class="col-md-6 col-sm-6">
												<?php
														$toc = array(
															'true'         => 'Ordered List',
															'false'        => 'Unordered List',
														);
														echo form_dropdown("article[$lang][article_toc_ordered]", $toc, $article['article_toc_ordered'], 'class="form-control select-2"' );
														echo form_error("article[$lang][article_toc_ordered]");
													?>
											</div>
										</div>
										<div class="row">
											<label class="col-md-6 col-sm-6 h6 col-form-label" for="article_toc_ordered">
												Article Category
											</label>
											<div class="form-group col-md-6 col-sm-6">
											<?php
														/*$data_article_category = array(
															'name' => "article[$lang][article_category]",
															'value' => set_value("article[$lang][article_category]", $article['article_category'], $html_escape=FALSE),
															'placeholder' => 'Article Category ex (Scheduling, Reporting)',
															'class' => 'form-control',
															'required' => 'required',
															'data-msg-required'=>"Please enter article category"
														);
														echo form_input($data_article_category);
														echo form_error("article[$lang][article_category]");*/
													?>
												<?php   $selected_category = 'management';
														
														if($article["article_category"]){
															$selected_cat = explode(",",$article["article_category"]);
															//pre($selected_cat);
														}else{
															$selected_cat = explode(",",$selected_category);
														}
														//pre($selected_cat);
														$js = 'id="article_category" multiple="multiple" class="select-2" required="required" data-msg-required="Please select category"';
														echo form_dropdown("article[$lang][article_category][]", $category, $selected_cat, $js );
														echo form_error("article[$lang][article_category][]");
												?>
											</div>
										</div>
										<div class="row">
											<label class="col-md-6 col-sm-6 h6 col-form-label" for="article_toc_ordered">
												Tags
											</label>
											<div class="form-group col-md-6 col-sm-6">
												<?php
												/*$tags = array(
													''         => '---Select Tags---',
													'Business Management' => 'Business Management',
													'Human Resources'     => 'Human Resources',
													'Operations'       	  => 'Operations',
													'Quality & Safety'    => 'Quality & Safety',
													'Scheduling'          => 'Scheduling',
													'Reporting'        	  => 'Reporting',
													'News'        		  => 'News'
												);
												echo form_dropdown("article[$lang][article_tags]", $tags, $article['article_tags'], 'class="form-control select-2" required="required" data-msg-required="Please select content tags"' );
												echo form_error("article[$lang][article_tags]");*/
														$data_article_tags = array(
															'name' => "article[$lang][article_tags]",
															'value' => set_value("article[$lang][article_tags]", $article['article_tags'], $html_escape=FALSE),
															'placeholder' => 'Please enter tags ex (Operations,Scheduling)',
															'class' => 'form-control',
															'required' => 'required',
															'data-msg-required'=>"Please enter tags"
														);
														echo form_input($data_article_tags);
														echo form_error("article[$lang][article_tags]");
													?>
											</div>
										</div>
										<div class="row">
											<label class="col-md-6 col-sm-6 h6 col-form-label" for="article_toc_ordered">
												Skyscraper Article
											</label>
											<div class="form-group col-md-6 col-sm-6">
												<?php
													//$article_skyscraper=($article['article_skyscraper']=='true') ? 'true' : 'false';
													$data_article_skyscraper = array(
														'id' => 'article_skyscraper_chk',
														'name' => "article[$lang][article_skyscraper]",
														'value' => 'true',
														'checked' =>($article['article_skyscraper']=='true') ? TRUE : FALSE,
														'data-switch' => 'success',
														'class' => 'checkbox-switch__input change_article_skyscraper'
													);
														echo form_checkbox($data_article_skyscraper);
														echo form_error("article[$lang][article_skyscraper]");
													?>
													<label class="m-0" data-on-label="YES" data-off-label="NO" for="article_skyscraper_chk"></label>
											</div>
										</div>
										<div class="form-group row hide">
											<label class="col-md-6 col-sm-6 h6 d-block col-form-label" for="article_toc_ordered">
												Grammar and Spelling
											</label>
											<div class="col-md-6 col-sm-6">
												<button type="button" value="check_spelling" class="btn btn-sm w-50 btn-success check_spelling_1">
													Verify
												</button>
											</div>
										</div>
										<div class="form-group row hide">
											<label class="col-md-6 col-sm-6 h6 d-block col-form-label" for="article_toc_ordered">
												Copyscape
											</label>
											<div class="col-md-6 col-sm-6">
												<button type="button" data-article = "<?php echo $article['article_id'] ?>" data-lang = "<?php echo $article['language_id'] ?>" value="copyscape" class="btn btn-sm w-50 btn-success verify_copyscape" >
													Verify
												</button>
												<span id="verify_copyscape"><?php if($article['article_copyscape']){ ?><i class="fas fa-check-square" aria-hidden="true" style="color:#5ed84f"></i><?php } ?></span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-md-6 col-sm-6 h6  d-block col-form-label" for="article_toc_ordered">
												
												
											</label>
											<div class="col-md-6 col-sm-6">
												
											</div>
										</div>
									<!-------------Article Visible Setting End---------------->
									<!-------------Article Hidden Setting Start---------------->
									<?php 
									//if($article['article_id']){?>
									<div class="row article-setting">
											<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta product</label>
											<?php
													$data_article_meta_product = array(
														'name' => "article[$lang][article_meta_product]",
														'id' => "article_meta_product",
														'placeholder' => 'Please enter Meta product ex (cow)',
														'value' => set_value("article[$lang][article_meta_product]", $article['article_meta_product'], $html_escape=FALSE),
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product"
													);
													echo form_input($data_article_meta_product);
													echo form_error("article[$lang][article_meta_product]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta category </label>
											<?php
													$data_article_meta_category = array(
														'name' => "article[$lang][article_meta_category]",
														'id' => "article_meta_category",
														'value' => set_value("article[$lang][article_meta_category]", $article['article_meta_category'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta category',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta category"
													);
													echo form_input($data_article_meta_category);
													echo form_error("article[$lang][article_meta_category]");
												?>
										</div>
									</div>
										<div class="row article-setting">
											<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Keyword</label>
											<?php
													$data_article_meta_keyword = array(
														'name' => "article[$lang][article_meta_keyword]",
														'id' => "article_meta_keyword",
														'value' => set_value("article[$lang][article_meta_keyword]", $article['article_meta_keyword'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Keyword ex (cow, cat)',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta Keyword"
													);
													echo form_input($data_article_meta_keyword);
													echo form_error("article[$lang][article_meta_keyword]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Abstract </label>
											<?php
													$data_article_meta_abstract = array(
														'name' => "article[$lang][article_meta_abstract]",
														'id' => "article_meta_abstract",
														'value' => set_value("article[$lang][article_meta_abstract]", $article['article_meta_abstract'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Abstract',
														'class' => 'form-control',
														'data-msg-required'=>"Please enter meta abstract"
													);
													echo form_input($data_article_meta_abstract);
													echo form_error("article[$lang][article_meta_abstract]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Author Facebook Url</label>
											<?php
													if(!$article['article_meta_author_facebook']){
														$article['article_meta_author_facebook'] = $this->session->userdata('author_facebook_url');
													}
													$data_article_meta_author_facebook = array(
														'name' => "article[$lang][article_meta_author_facebook]",
														'id' => "article_meta_author_facebook",
														'value' => set_value("article[$lang][article_meta_author_facebook]", $article['article_meta_author_facebook'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Author Facebook',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta author facebook"
													);
													echo form_input($data_article_meta_author_facebook);
													echo form_error("article[$lang][article_meta_author_facebook]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Author Twitter Url</label>
											<?php
													if(!$article['article_meta_author_twitter']){
														$article['article_meta_author_twitter'] = $this->session->userdata('author_twitter_url');
													}
													$data_article_meta_author_twitter = array(
														'name' => "article[$lang][article_meta_author_twitter]",
														'id' => "article_meta_author_twitter",
														'value' => set_value("article[$lang][article_meta_author_twitter]", $article['article_meta_author_twitter'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Meta Author Twitter',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta author twitter"
													);
													echo form_input($data_article_meta_author_twitter);
													echo form_error("article[$lang][article_meta_author_twitter]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Name</label>
											<?php
													$data_article_meta_product_name = array(
														'name' => "article[$lang][article_meta_product_name]",
														'id' => "article_meta_product_name",
														'value' => set_value("article[$lang][article_meta_product_name]", $article['article_meta_product_name'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product name',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product name"
													);
													echo form_input($data_article_meta_product_name);
													echo form_error("article[$lang][article_meta_product_name]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Desc</label>
											<?php
													$data_article_meta_product_desc = array(
														'name' =>  "article[$lang][article_meta_product_desc]",
														'id' => "article_meta_product_desc",
														'value' => set_value("article[$lang][article_meta_product_desc]", $article['article_meta_product_desc'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Product Desc',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product desc"
													);
													echo form_input($data_article_meta_product_desc);
													echo form_error("article[$lang][article_meta_product_desc]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Image</label>
											<?php
													$data_article_meta_product_image = array(
														'name' => "article[$lang][article_meta_product_image]",
														'id' => "article_meta_product_image",
														'value' => set_value("article[$lang][article_meta_product_image]", $article['article_meta_product_image'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product image',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product image"
													);
													echo form_input($data_article_meta_product_image);
													echo form_error("article[$lang][article_meta_product_image]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Icon</label>
											<?php
													$data_article_meta_product_icon = array(
														'name' => "article[$lang][article_meta_product_icon]",
														'id' => "article_meta_product_icon",
														'value' => set_value("article[$lang][article_meta_product_icon]", $article['article_meta_product_icon'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Product Icon',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product icon"
													);
													echo form_input($data_article_meta_product_icon);
													echo form_error("article[$lang][article_meta_product_icon]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Id</label>
											<?php
													$data_article_meta_product_id = array(
														'name' => "article[$lang][article_meta_product_id]",
														'id' => "article_meta_product_id",
														'value' => set_value("article[$lang][article_meta_product_id]", $article['article_meta_product_id'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product id',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product id"
													);
													echo form_input($data_article_meta_product_id);
													echo form_error("article[$lang][article_meta_product_id]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Part Id</label>
											<?php
													$data_article_meta_part_id = array(
														'name' => "article[$lang][article_meta_part_id]",
														'id' => "article_meta_part_id",
														'value' => set_value("article[$lang][article_meta_part_id]", $article['article_meta_part_id'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Part Id',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta part id"
													);
													echo form_input($data_article_meta_part_id);
													echo form_error("article[$lang][article_meta_part_id]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Brand</label>
											<?php
													$data_article_meta_product_brand = array(
														'name' => "article[$lang][article_meta_product_brand]",
														'id' => "article_meta_product_brand",
														'value' => set_value("article[$lang][article_meta_product_brand]", $article['article_meta_product_brand'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product brand',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product brand"
													);
													echo form_input($data_article_meta_product_brand);
													echo form_error("article[$lang][article_meta_product_brand]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Price </label>
											<?php
													$data_article_meta_product_price = array(
														'name' => "article[$lang][article_meta_product_price]",
														'id' => "article_meta_product_price",
														'value' => set_value("article[$lang][article_meta_product_price]", $article['article_meta_product_price'], $html_escape=FALSE),
														'placeholder' => 'Please enter Meta Product Price',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product price"
													);
													echo form_input($data_article_meta_product_price);
													echo form_error("article[$lang][article_meta_product_price]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Reviewcount</label>
											<?php
													$data_article_meta_product_reviewcount = array(
														'name' => "article[$lang][article_meta_product_reviewcount]",
														'id' => "article_meta_product_reviewcount",
														'value' => set_value("article[$lang][article_meta_product_reviewcount]", $article['article_meta_product_reviewcount'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product reviewcount',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product reviewcount"
													);
													echo form_input($data_article_meta_product_reviewcount);
													echo form_error("article[$lang][article_meta_product_reviewcount]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Price Currency</label>
											<?php
													$data_article_meta_product_price_currency = array(
														'name' => "article[$lang][article_meta_product_price_currency]",
														'id' => "article_meta_product_price_currency",
														'value' => set_value("article[$lang][article_meta_product_price_currency]", $article['article_meta_product_price_currency'], $html_escape=FALSE),
														'placeholder' => 'Please enter article meta product price currency',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product price currency"
													);
													echo form_input($data_article_meta_product_price_currency);
													echo form_error("article[$lang][article_meta_product_price_currency]");
												?>
										</div>
									</div>
									<div class="row article-setting">
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta Product Rating value</label>
											<?php
													$data_article_meta_product_ratingvalue = array(
														'name' => "article[$lang][article_meta_product_ratingvalue]",
														'id' => "article_meta_product_ratingvalue",
														'value' => set_value("article[$lang][article_meta_product_ratingvalue]", $article['article_meta_product_ratingvalue'], $html_escape=FALSE),
														'placeholder' => 'Please enter meta product rating value',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter meta product rating value"
													);
													echo form_input($data_article_meta_product_ratingvalue);
													echo form_error("article[$lang][article_meta_product_ratingvalue]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta author url</label>
											<?php
													if(!$article['article_meta_author_url']){
														$article['article_meta_author_url'] = $this->session->userdata('author_url');
													}
														$data_article_meta_author_url = array(
															'name' => "article[$lang][article_meta_author_url]",
															'id' => "article_meta_author_url",
															'value' => set_value("article[$lang][article_meta_author_url]", $article['article_meta_author_url'], $html_escape=FALSE),
															'placeholder' => 'Please enter meta author url',
															'class' => 'form-control',
															'required' => 'required',
															'data-msg-required'=>"Please enter meta author url"
														);
														echo form_input($data_article_meta_author_url);
														echo form_error("article[$lang][article_meta_author_url]");
													?>
										</div>
									</div>
									<div class="row article-setting">
											<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta date modified</label>

											<?php
													$temp_number = (int) $article['date_modified'];
													$article_date_modified = nice_date($article['date_modified'], 'Y-m-d');
													if($article_date_modified=='Unknown' || $article_date_modified=='Invalid Date' || $temp_number < 1){
														$article_date_modified = date('Y-m-d');
													}
													$data_date_modified = array(
														'name' => "article[$lang][date_modified]",
														'value' => set_value("article[$lang][date_modified]", $article_date_modified),
														'placeholder' => '',
														'class' => 'form-control',
														'id' => 'datemodified',
														'autocomplete'=>"off",
														'data-date-format'=>"yyyy-mm-dd",
														'required' => 'required',
														'data-msg-required'=>"Please enter meta date modified"

													);
													echo form_input($data_date_modified);
													echo form_error("article[$lang][date_modified]");
												?>
										</div>
										<div class="form-group col-md-6 mb-2">
											<label class="h6">Meta author Description</label>
												<?php
														if(!$article['article_meta_author_desc']){
															$article['article_meta_author_desc'] = $this->session->userdata('boinfo');
														}
													$data_article_meta_author_description = array(
																'name' => "article[$lang][article_meta_author_desc]",
																'id' => "article_meta_author_desc",
																'value' => set_value("article[$lang][article_meta_author_desc]", $article['article_meta_author_desc'], $html_escape=FALSE),
																'placeholder' => 'Please enter meta author description',
																'class' => 'form-control',
																'required' => 'required',
																'data-msg-required'=>"Please enter meta author description"
															);
															echo form_input($data_article_meta_author_description);
															echo form_error("article[$lang][article_meta_author_desc]");
														?>
											
											</div>
										</div>

										<div class="row article-setting">
											<div class="form-group col-md-6 mb-2">
												<label class="h6">PRODUCT CTA</label>
												<?php
												$js = array(
													'id'       => 'article_product_cta',
													'class'=>"form-control select-2",
													'required'=>"required",
													'data-msg-required'=>"Please select product cta"
													
												);
												echo form_dropdown("article[$lang][article_product_cta]", $product_list, $article['article_product_cta'], $js);

													//echo form_dropdown("article[$lang][article_product_cta]", $product_list, $article['article_product_cta'], 'class="form-control select-2" required="required" data-msg-required="Please select product cta" id => "article_product_cta"' );
													echo form_error("article[$lang][article_product_cta]");
												?>
											</div>
											<div class="form-group col-md-6 mb-2">
												<label class="h6">Lead Capture CTA</label>
												<?php
												$js = array(
													'id'       => 'article_leadcapture_cta',
													'class'=>"form-control select-2",
													'required'=>"required",
													'data-msg-required'=>"Please select leadcapture cta"
													
												);
												$cta = array(
													''         => 'Select Lead Capture CTA',
													'leadcapture'         => 'Lead Capture'
												);
												echo form_dropdown("article[$lang][article_leadcapture_cta]", $cta, $article['article_leadcapture_cta'], $js);
												//echo form_dropdown("article[$lang][article_leadcapture_cta]", $cta, $article['article_leadcapture_cta'], 'class="form-control select-2" required="required" data-msg-required="Please select leadcapture cta" id => "article_leadcapture_cta"' );
												echo form_error("article[$lang][article_leadcapture_cta]");
												
												
												?>
											</div>
										</div>
										<div class="row article-setting">
											<div class="<?php echo ($article['article_id']) ? 'form-group col-md-6 mb-2' : 'form-group col-md-12 mb-2'?>">
												<label class="h6">Type</label>
												<?php
													echo form_dropdown("article[$lang][article_type]", $types, 'supporting', 'class="form-control select-2" required="required" data-msg-required="Please select article type" id => "article_type"' );
													echo form_error("article[$lang][article_type]");
												?>
											</div>
											
											<?php 
											if($article['article_id']){?>
											<div class="<?php echo ($article['article_id']) ? 'form-group col-md-6 mb-2' : 'form-group col-md-12 mb-2'?>">
												<label class="h6">Publish Date</label>
												<?php
													$temp_number = (int) $article['publish_date'];
													$article_publish_date = nice_date($article['publish_date'], 'Y-m-d');
													if($article_publish_date=='Unknown' || $article_publish_date=='Invalid Date' || $temp_number < 1){
														$article_publish_date = date('Y-m-d');
													}
													$data_publish_date = array(
														'name' => "article[$lang][publish_date]",
														'value' => set_value("article[$lang][publish_date]", $article_publish_date),
														'placeholder' => '',
														'class' => 'form-control',
														'id' => 'publishdate',
														'autocomplete'=>"off",
														'data-date-format'=>"yyyy-mm-dd",
														'required' => 'required',
														'data-msg-required'=>"Please enter publish date"

													);
													echo form_input($data_publish_date);
													echo form_error("article[$lang][publish_date]");
												?>
											</div>
											<?php } ?>
										</div>
										<div class="row article-setting">
										<div class="<?php echo ($article['article_id']) ? 'form-group col-md-6 mb-2' : 'form-group col-md-12 mb-2'?>">
												<label class="h6">Author</label>
												<?php	if(!$article['article_author']){
												$article['article_author'] = $this->session->userdata('full_name');

												}					
													$data_article_author = array(
														'name' => "article[$lang][article_author]",
														'id' => "article_author",
														'value' => set_value("article[$lang][article_author]", $article['article_author'], $html_escape=FALSE),
														'placeholder' => 'Please enter author name ex : Jane Doe',
														'class' => 'form-control',
														'required' => 'required',
														'data-msg-required'=>"Please enter author name"
													);
													echo form_input($data_article_author);
													echo form_error("article[$lang][article_author]");
												?>
											</div>
											<!--<div class="form-group col-md-6 mb-2">
												</div>-->
											</div>
										<?php //} ?>
										<!-------------Article Hidden Setting End ---------------->

									</div>
								</div>
							</div>
						</div>

						<?php } ?>
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
<div class="modal fade" id="articleValidatorModal" tabindex="-1" aria-labelledby="articleValidatorModalLabel">
	<div class="modal-dialog modal-lg modal-center-viewport">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body p-2">
				<div class="critical-error" style="display:none">
					<h5 class="modal-title">SEO Critical Problems</h5>
					<h6 class="small text-muted">You must correct these issue before submitting your article.</h6>
					<hr class="mb-0">
					<ul class="list-group list-group-flush mb-2 critical-list-group">
						<!-- <li class="list-group-item border-0 px-0 pb-0">
							<i class="fa fa-exclamation-triangle text-danger"></i>
							There are less than 2 crosslinks pointing to articles on our other websites
						</li> -->
					</ul>
				</div>
				<div class="warning-error" style="display:none">
					<h5 class="modal-title">SEO Warning</h5>
					<h6 class="small text-muted">To optimize your article for SEO, It’s recommended that you select Cancel, go back, and make the recommended SEO changes.</h6>
					<hr class="mb-0">
					<ul class="list-group list-group-flush mb-0 warning-list-group">
						<!-- <li class="list-group-item border-0 px-0 pb-0">
							<i class="fa fa-exclamation-triangle text-warning"></i>
							One or more sentences contain more than 20 words.
						</li> -->
					</ul>
				</div>
			</div>
			<div class="modal-footer pt-0 px-2 pb-2 justify-content-start">
				<button type="button" class="btn btn-success btn-icon submit-with-warning" style="display:none">
				<span class="spinner-border spinner-border-sm text-white" role="status" aria-hidden="true"></span><i class="fas fa-check"></i> Submit
				</button>
				<button type="button" class="btn btn-danger btn-icon" data-dismiss="modal">
					<i class="fas fa-times"></i> Cancel
				</button>
			</div>
		</div>
	</div>
</div>