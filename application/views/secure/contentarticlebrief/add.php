<?php defined('BASEPATH') OR exit('No direct script access allowed');
$brief_id = array_key_exists('brief_id',$articlesbrief) ? $articlesbrief['brief_id'] : 0;
//pre($articlebrief_cta);
?>
<div class="custom-nav-tab-container">
	<div class="container">
		<ul class="nav nav-tabs custom-nav-tabs" id="customTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="content-brief-structure-tab" data-toggle="tab" href="#structure" role="tab" aria-controls="structure" aria-selected="true">Structure</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="persona-tab" data-toggle="tab" href="#persona" role="tab" aria-controls="persona" aria-selected="false">Persona</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="analysis-tab" data-toggle="tab" href="#analysis" role="tab" aria-controls="analysis" aria-selected="false">Analysis</a>
			</li>
		</ul>
	</div>
</div>
<?php
//pre($articlesbrief);
$attributes = array('class' => 'form-horizontal form-bordered form-validate articlebrief-form', 'id' => 'articlebrief-form');
echo form_open('', $attributes);
$categories= '';
$disabled='';
if(isset($articlesbrief['brief_status'])){
   $disabled='disabled';
}
?>
<?php $this->load->view('secure/contentarticlebrief/assign-writer');?>
<div class="tab-content" id="briefTabContent">
	<!-- Content Brief Structure Tab -->
	<div class="tab-pane fade show active" id="structure" role="tabpanel" aria-labelledby="content-brief-structure-tab">
		<div class="container">
			<div class="form-actions inline-spacing mt-1">
				<button type="submit" name="submitForm" value="savedraft" class="btn btn-success btn-icon article-button-click" <?php echo $disabled;?>>
					<i class="fas fa-save"></i> <?php echo ($user_type) ? 'Save' : 'Save'?>
				</button>
				<?php

				if(isset($articlesbrief['brief_id'])){
				?>
					<a type="button" href="<?php echo site_url('/secure/contentarticlesbrief/export_article_brief/'.$articlesbrief['brief_id']) ?>" class="btn btn-secondary btn-icon export-article-brief" target="_parent" >
						<i class="fas fa-key"></i>
						Export Article Brief
					</a>

				<?php
				}
				?>
				<button type="button" class="btn btn-secondary btn-icon assign-to-writer">
					<i class="fas fa-user"></i>
					Assign to Writer
				</button>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-7">
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Article Headline
							</label>
						</div>
						<div class="col-md-8 col-sm-6">
							<div class="input-group">
							<?php
							$data_keyword_hide = array(
								'type' => 'hidden',
								'name' => 'keyword',
								'id' => 'keyword',
								'value' => $articlesbrief['brief_primary_keyword'],
								'class' => 'keyword'
							);
							echo form_input($data_keyword_hide);
							$data_brief_headline = array(
								'name' => "brief_headline",
								'value' => set_value("brief_headline", $articlesbrief['brief_headline'], $html_escape=FALSE),
								'placeholder' => 'Headline',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'data-msg-required'=>"Headline field is required.",
								'class' => 'form-control calc-length'
							);
							echo form_input($data_brief_headline);
							?>

								<div class="input-group-append align-items-center input-text">
									<span class="input-group-text font-weight-bold text-success char-remain" id="">70</span>
									<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the article headline.</small>" class="fas fa-exclamation-triangle"></i></span>
								</div>
							</div>
							<small id="emailHelp" class="form-text text-muted"><?php echo form_error("brief_headline");?></small>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">
								Article Introduction
							</label>
						</div>
						<div class="col-md-8 col-sm-6">
						 <div class="input-group">

							<?php
							$data_brief_introduction = array(
								'name' => "brief_introduction",
								'rows' => 4,
								'cols' => 2,
								'value' => set_value("brief_introduction", $articlesbrief['brief_introduction'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => 'Introduction text here...',
								'rangelength' => '[10, 200]',
								'required' => 'required',
								'data-msg-required'=>"Introduction is required.",
								'class' => 'form-control calc-length brief-primary-keyword-phrase'
							);
							echo form_textarea($data_brief_introduction);
							echo form_error("brief_introduction");
							?>
							<div class="input-group-append align-items-center input-textarea">
								<span class="input-group-text text-success font-weight-bold char-remain" id="">200</span>
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the article introduction.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>

						 </div>
							<small class="form-text text-muted"> Enter Max to 200 characters in Article Introduction</small>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_1 = '';
							$para_heading_1 = '';
							if($articlebrief_paragraph)
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[0]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_1 = $articlebrief_paragraph[0]->paragraph_title;
								$para_heading_1 = $articlebrief_paragraph[0]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[0]",
								'value' => set_value("paragraph_title[0]", $para_title_1, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[0]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_1, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_2 = '';
							$para_heading_2 = '';
							if(array_key_exists(1,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[1]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_2 = $articlebrief_paragraph[1]->paragraph_title;
								$para_heading_2 = $articlebrief_paragraph[1]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[1]",
								'value' => set_value("paragraph_title[1]", $para_title_2, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[1]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
						  </div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								//$headings = ['H1' => 'H1','H2' => 'H2','H3' => 'H3','H4' => 'H4','H5' => 'H5','H6' => 'H6'];
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_2, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Call To Action</label>
						</div>
						<div class="col-md-8 col-sm-6">
							<div class="cta-preview-1">
							<?php
							if(array_key_exists(0,$articlebrief_cta))
							{
								//pre_exit($cta_data);
								$cta_id=$articlebrief_cta[0]->cta_id;
								$brief_cta_id = array(
								'name' => 'brief_cta_id[0]',
								'value' => set_value('brief_cta_id[0]', $articlebrief_cta[0]->brief_cta_id),
								'type' => 'hidden'
								);
								echo form_input($brief_cta_id);
								echo '<button type="button" class="btn btn-sm mb-1 btn-secondary show-brief-cta" data-cta-id="'.$cta_id.'" data-cta="1">Edit CTA</button>';
								$brief_cta_data = ['cta_id' => $cta_id,'cta_headline' => $articlebrief_cta[0]->brief_cta_headline,'cta_sub_headline'=>$articlebrief_cta[0]->brief_cta_sub_headline,
								'cta_button_text' => $articlebrief_cta[0]->brief_cta_button_text,'cta_button_color' => $articlebrief_cta[0]->brief_cta_button_color,
								'cta_background_type' => $articlebrief_cta[0]->brief_cta_background_type,'cta_website' => $articlebrief_cta[0]->brief_cta_website
								,'cta_language_id' => $articlebrief_cta[0]->brief_cta_language_id,'cta_type' => $articlebrief_cta[0]->brief_cta_type
								,'cta_background' => $articlebrief_cta[0]->brief_cta_background,'cta_background_image' => $articlebrief_cta[0]->brief_cta_background_image
								,'cta_background_color' => $articlebrief_cta[0]->brief_cta_background_color,'cta_background_video'=>$articlebrief_cta[0]->brief_cta_background_video,
								'cta_form_id' => $articlebrief_cta[0]->brief_cta_form_id,'cta_seq_no' => 1];
								//pre($brief_cta_data);
								$this->load->view('component/cta_preview',$brief_cta_data);
								$brief_cta_data = ['cta_data' => $brief_cta_data];
								$this->load->view('secure/contentarticlebrief/add-cta-form',$brief_cta_data);
							}
							else
							{?>
							<div class="input-group">
								<div class="card m-0 bg-light show-brief-cta w-100" style="cursor:pointer" data-cta="1" data-brief-id="<?php echo array_key_exists('brief_id',$articlesbrief) ? $articlesbrief['brief_id']: '0'; ?>">
									<div class="p-1 text-white text-center">
										<i class="fas fa-plus mr-1"></i>
										Click to add CTA
									</div>
									<?php
									$data_cta_id_0 = array(
										'name' => "cta_id[0]",
										'value' => set_value("cta_id[0]", ''),
										'required' => 'required',
										'data-msg-required'=>"Please select the CTA",
										'type' => 'hidden',
										'class' => 'do-not-ignore'
									);
									echo form_input($data_cta_id_0);
									?>
								</div>
							</div>
							<?php
							}
							?>
							</div>
							<?php
								$this->load->view('secure/contentarticlebrief/show_brief_modal',['cta_data' => $cta_data]);
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_3 = '';
							$para_heading_3 = '';
							if(array_key_exists(2,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[2]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_3 = $articlebrief_paragraph[2]->paragraph_title;
								$para_heading_3 = $articlebrief_paragraph[2]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[2]",
								'value' => set_value("paragraph_title[2]", $para_title_3, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[2]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_3, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_4 = '';
							$para_heading_4 = '';
							if(array_key_exists(3,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[3]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_4 = $articlebrief_paragraph[3]->paragraph_title;
								$para_heading_4 = $articlebrief_paragraph[3]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[3]",
								'value' => set_value("paragraph_title[3]", $para_title_4, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[3]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_4, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_5 = '';
							$para_heading_5 = '';
							if(array_key_exists(4,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[4]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_5 = $articlebrief_paragraph[4]->paragraph_title;
								$para_heading_5 = $articlebrief_paragraph[4]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[4]",
								'value' => set_value("paragraph_title[4]", $para_title_5, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[4]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_5, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Call To Action</label>
						</div>
						<div class="col-md-8 col-sm-6">
							<div class="cta-preview-2">
							<?php
							if(array_key_exists(1,$articlebrief_cta))
							{
								$cta_id=$articlebrief_cta[1]->cta_id;
								$brief_cta_id = array(
								'name' => 'brief_cta_id[1]',
								'value' => set_value('brief_cta_id[1]', $articlebrief_cta[1]->brief_cta_id),
								'type' => 'hidden'
								);
								echo form_input($brief_cta_id);
								echo '<button type="button" class="btn btn-sm mb-1 btn-secondary show-brief-cta" data-cta-id="'.$cta_id.'" data-cta="2">Edit CTA</button>';
								$brief_cta_data = ['cta_id' => $cta_id,'cta_headline' => $articlebrief_cta[1]->brief_cta_headline,'cta_sub_headline'=>$articlebrief_cta[1]->brief_cta_sub_headline,
								'cta_button_text' => $articlebrief_cta[1]->brief_cta_button_text,'cta_button_color' => $articlebrief_cta[1]->brief_cta_button_color,
								'cta_background_type' => $articlebrief_cta[1]->brief_cta_background_type,'cta_website' => $articlebrief_cta[1]->brief_cta_website
								,'cta_language_id' => $articlebrief_cta[1]->brief_cta_language_id,'cta_type' => $articlebrief_cta[1]->brief_cta_type
								,'cta_background' => $articlebrief_cta[1]->brief_cta_background,'cta_background_image' => $articlebrief_cta[1]->brief_cta_background_image
								,'cta_background_color' => $articlebrief_cta[1]->brief_cta_background_color,'cta_background_video'=>$articlebrief_cta[1]->brief_cta_background_video,
								'cta_form_id' => $articlebrief_cta[1]->brief_cta_form_id,'cta_seq_no' => 2];
								$this->load->view('component/cta_preview',$brief_cta_data);
								$brief_cta_data = ['cta_data' => $brief_cta_data];
								$this->load->view('secure/contentarticlebrief/add-cta-form',$brief_cta_data);
							}
							else
							{?>
							<div class="input-group" >
								<div class="card m-0 bg-light show-brief-cta w-100"style="cursor:pointer" data-cta="2" data-brief-id="<?php echo array_key_exists('brief_id',$articlesbrief) ? $articlesbrief['brief_id']: '0'; ?>">
									<div class="p-1 text-white text-center">
										<i class="fas fa-plus mr-1"></i>
										Click to add CTA
									</div>
									<?php
									$data_cta_id_1 = array(
										'name' => "cta_id[1]",
										'value' => set_value("cta_id[1]", ''),
										'required' => 'required',
										'data-msg-required'=>"Please select the CTA",
										'type' => 'hidden',
										'class' => 'do-not-ignore'
									);
									echo form_input($data_cta_id_1);
									?>
								</div>
							</div>
							<?php
							}
							?>
							</div>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_6 = '';
							$para_heading_6 = '';
							if(array_key_exists(5,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[5]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_6 = $articlebrief_paragraph[5]->paragraph_title;
								$para_heading_6 = $articlebrief_paragraph[5]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[5]",
								'value' => set_value("paragraph_title[5]", $para_title_6, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control'
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[5]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_6, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>
					<div class="row form-row form-group add-form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Paragraph Title</label>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="input-group">
							<?php
							$para_title_7 = '';
							$para_heading_7 = '';
							if(array_key_exists(6,$articlebrief_paragraph))
							{
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$articlebrief_paragraph[6]->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title_7 = $articlebrief_paragraph[6]->paragraph_title;
								$para_heading_7 = $articlebrief_paragraph[6]->heading;
							}
							$data_paragraph_title = array(
								'name' => "paragraph_title[6]",
								'value' => set_value("paragraph_title[6]", $para_title_7, $html_escape=FALSE),
								'placeholder' => '',
								'maxlength' => 70,
								'rangelength' => '[10, 70]',
								'required' => 'required',
								'primary_keyword' => 'true',
								'data-msg-required'=>"Paragraph title field is required.",
								'class' => 'form-control',
								'data-para-id' => 6
							);
							echo form_input($data_paragraph_title);
							echo form_error("paragraph_title[6]");
							?>
							<div class="input-group-append align-items-center input-text">
								<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
							</div>
							</div>
						</div>

						<div class="col-md-2 col-sm-2">
							<?php
								$headings = ['h2' => 'H2','h3' => 'H3'];
								echo form_dropdown("headings[]", $headings, $para_heading_7, 'class="custom-select" data-msg-required="Please select "' );
								echo form_error("headings[]");
							?>
						</div>
					</div>

					<?php
						$index = 6;
						if(count($articlebrief_paragraph) > 7)
						{

							$article_paragraphs = array_slice($articlebrief_paragraph,7);
							foreach($article_paragraphs as $key => $paragraphs)
							{
								$index++;
								$para_title = '';
								$para_heading = '';
								$data_paragraph_id = array(
									'name' => 'brief_para_id[]',
									'type' => 'hidden',
									'value' => set_value("brief_para_id[]",$paragraphs->brief_para_id)
								);
								echo form_input($data_paragraph_id);
								$para_title = $paragraphs->paragraph_title;
								$para_heading = $paragraphs->heading;
								?>
								<div class="row form-row form-group add-form-group">
								<div class="col-md-4 col-sm-6">
									<label class="col-form-label" for="article_title">Paragraph Title</label>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="input-group">
									<?php
									$data_paragraph_title = array(
										'name' => "paragraph_title[$index]",
										'value' => set_value("paragraph_title[$index]", $para_title, $html_escape=FALSE),
										'placeholder' => '',
										'maxlength' => 70,
										'rangelength' => '[10, 70]',
										'required' => 'required',
										'primary_keyword' => 'true',
										'data-msg-required'=>"Paragraph Title field is required.",
										'class' => 'form-control',
										'data-para-id' => $index
									);
									echo form_input($data_paragraph_title);
									echo form_error("paragraph_title[$index]");
									?>
									<div class="input-group-append align-items-center input-text">
										<span class="input-group-text text-danger font-weight-bold tooltip-hide"><i data-toggle="tooltip" data-html="true" data-placement="top" title="<small>The primary keyword does not appear in the paragraph title.</small>" class="fas fa-exclamation-triangle"></i></span>
									</div>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
								<?php
									$headings = ['h2' => 'H2','h3' => 'H3'];
									echo form_dropdown("headings[]", $headings, $para_heading, 'class="custom-select" data-msg-required="Please select "' );
									echo form_error("headings[]");
								?>
								</div>
								</div>
							<?php }
						}
						?>

					<div class="row form-row form-group mb-3">
						<div class="col-md-6 offset-4">
							<a class="add-more-link-muted add-another-paragraph" href="javascript:;" data-repeater-create="">
								<i class="fas fa-plus"></i>
								Add Another Paragraph
							</a>
						</div>
					</div>
					<div class="row form-row form-group">
						<div class="col-md-4 col-sm-6">
							<label class="col-form-label" for="article_title">Call To Action</label>
						</div>
						<div class="col-md-8 col-sm-6">
							<div class="cta-preview-3">
							<?php
							if(array_key_exists(2,$articlebrief_cta))
							{
								$cta_id=$articlebrief_cta[2]->cta_id;
								$brief_cta_id = array(
								'name' => 'brief_cta_id[2]',
								'value' => set_value('brief_cta_id[2]', $articlebrief_cta[2]->brief_cta_id),
								'type' => 'hidden',
								'class' => 'do-not-ignore'
								);
								echo form_input($brief_cta_id);
								echo '<button type="button" class="btn btn-sm mb-1 btn-secondary show-brief-cta" data-cta-id="'.$cta_id.'" data-cta="3">Edit CTA</button>';
								$brief_cta_data = ['cta_id' => $cta_id,'cta_headline' => $articlebrief_cta[2]->brief_cta_headline,'cta_sub_headline'=>$articlebrief_cta[2]->brief_cta_sub_headline,
								'cta_button_text' => $articlebrief_cta[2]->brief_cta_button_text,'cta_button_color' => $articlebrief_cta[2]->brief_cta_button_color,
								'cta_background_type' => $articlebrief_cta[2]->brief_cta_background_type,'cta_website' => $articlebrief_cta[2]->brief_cta_website
								,'cta_language_id' => $articlebrief_cta[2]->brief_cta_language_id,'cta_type' => $articlebrief_cta[2]->brief_cta_type
								,'cta_background' => $articlebrief_cta[2]->brief_cta_background,'cta_background_image' => $articlebrief_cta[2]->brief_cta_background_image
								,'cta_background_color' => $articlebrief_cta[2]->brief_cta_background_color,'cta_background_video'=>$articlebrief_cta[2]->brief_cta_background_video,
								'cta_form_id' => $articlebrief_cta[2]->brief_cta_form_id,'cta_seq_no' => 3];
								$this->load->view('component/cta_preview',$brief_cta_data);
								$brief_cta_data = ['cta_data' => $brief_cta_data];
								$this->load->view('secure/contentarticlebrief/add-cta-form',$brief_cta_data);
							}
							else
							{?>
							<div class="input-group">
								<div class="card m-0 bg-light show-brief-cta w-100" style="cursor:pointer" data-cta="3" data-brief-id="<?php echo array_key_exists('brief_id',$articlesbrief) ? $articlesbrief['brief_id']: '0'; ?>">
									<div class="p-1 text-white text-center">
										<i class="fas fa-plus mr-1"></i>
										Click to add CTA
									</div>
									<?php
									$data_cta_id_2 = array(
										'name' => "cta_id[2]",
										'required' => 'required',
										'data-msg-required'=>"Please select the CTA",
										'type' => 'hidden',
										'class' => 'do-not-ignore'
									);
									echo form_input($data_cta_id_2);
									?>
								</div>
							</div>
							<?php
							}?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<?php //$this->load->view('secure/contentarticlebrief/right-section');?>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Content Brief Structure Tab -->
	<!-- Content Brief Persona Tab -->
	<div class="tab-pane fade" id="persona" role="tabpanel" aria-labelledby="persona-tab">
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-6">
					<div class="form-group">
						<label for="brief_demographics">Demographics (Gender, Age, Organization Level, Department)</label>
						<?php
							$data_brief_demographics = array(
								'name' => "brief_demographics",
								'rows' => 2,
								'cols' => 2,
								'value' => set_value("brief_demographics", $articlesbrief['brief_demographics'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => 'Demographics text here...',
								'class' => 'form-control'
							);
							echo form_textarea($data_brief_demographics);
							echo form_error("brief_demographics");
						?>
					</div>
					<div class="form-group">
						<label for="brief_think_now">What do they think now ?</label>
						<?php
							$data_brief_think_now = array(
								'name' => "brief_think_now",
								'rows' => 2,
								'cols' => 2,
								'value' => set_value("brief_think_now", $articlesbrief['brief_think_now'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => '',
								'class' => 'form-control'
							);
							echo form_textarea($data_brief_think_now);
							echo form_error("brief_think_now");
						?>
					</div>
					<div class="form-group">
						<label for="brief_want_them">What do we want them to think ?</label>
						<?php
							$data_brief_want_them = array(
								'name' => "brief_want_them",
								'rows' => 2,
								'cols' => 2,
								'value' => set_value("brief_want_them", $articlesbrief['brief_want_them'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => '',
								'class' => 'form-control'
							);
							echo form_textarea($data_brief_want_them);
							echo form_error("brief_want_them");
						?>
					</div>
					<div class="form-group">
						<label for="brief_strength">What is our greatest strength ?</label>
						<?php
							$data_brief_strength = array(
								'name' => "brief_strength",
								'rows' => 2,
								'cols' => 2,
								'value' => set_value("brief_strength", $articlesbrief['brief_strength'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => '',
								'class' => 'form-control'
							);
							echo form_textarea($data_brief_strength);
							echo form_error("brief_strength");
						?>
					</div>
					<div class="form-group">
						<label for="brief_get_across">What is the one point we want to get across ?</label>
						<?php
							$data_brief_get_across = array(
								'name' => "brief_get_across",
								'rows' => 2,
								'cols' => 2,
								'value' => set_value("brief_get_across", $articlesbrief['brief_get_across'], $html_escape=FALSE),
								'maxlength' => 200,
								'placeholder' => '',
								'class' => 'form-control'
							);
							echo form_textarea($data_brief_get_across);
							echo form_error("brief_get_across");
						?>
					</div>
				</div>
				<div class="col-md-6">
					<h5>Psychographics</h5>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="brief_psycho_fears">Fears</label>
								<?php
									$data_brief_psycho_fears = array(
										'name' => "brief_psycho_fears",
										'rows' => 10,
										'cols' => 2,
										'value' => set_value("brief_psycho_fears", $articlesbrief['brief_psycho_fears'], $html_escape=FALSE),
										'maxlength' => 200,
										'placeholder' => '',
										'class' => 'form-control'
									);
									echo form_textarea($data_brief_psycho_fears);
									echo form_error("brief_psycho_fears");
								?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="brief_psycho_pain_points">Pain Points</label>
								<?php
									$data_brief_psycho_pain_points = array(
										'name' => "brief_psycho_pain_points",
										'rows' => 10,
										'cols' => 2,
										'value' => set_value("brief_psycho_pain_points", $articlesbrief['brief_psycho_pain_points'], $html_escape=FALSE),
										'maxlength' => 200,
										'placeholder' => '',
										'class' => 'form-control'
									);
									echo form_textarea($data_brief_psycho_pain_points);
									echo form_error("brief_psycho_pain_points");
								?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="brief_psycho_wants">Wants</label>
								<?php
									$data_brief_psycho_wants = array(
										'name' => "brief_psycho_wants",
										'rows' => 9,
										'cols' => 2,
										'value' => set_value("brief_psycho_wants", $articlesbrief['brief_psycho_wants'], $html_escape=FALSE),
										'maxlength' => 200,
										'placeholder' => '',
										'class' => 'form-control'
									);
									echo form_textarea($data_brief_psycho_wants);
									echo form_error("brief_psycho_wants");
								?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="brief_psycho_goals">Values / Goals</label>
								<?php
									$data_brief_psycho_goals = array(
										'name' => "brief_psycho_goals",
										'rows' => 9,
										'cols' => 2,
										'value' => set_value("brief_psycho_goals", $articlesbrief['brief_psycho_goals'], $html_escape=FALSE),
										'maxlength' => 200,
										'placeholder' => '',
										'class' => 'form-control'
									);
									echo form_textarea($data_brief_psycho_goals);
									echo form_error("brief_psycho_goals");
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Content Brief Persona Tab -->
	<!-- Content Brief Analysis Tab -->
	<div class="tab-pane fade" id="analysis" role="tabpanel" aria-labelledby="analysis-tab">
		<div class="container">
			<div class="row mt-5">
				<div id="optimizecontent-result-container">
					<?php
						$this->load->view('secure/keywordanalysis/details');
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Content Brief Analysis Tab -->
</div>
<?php  echo form_close(); ?>
