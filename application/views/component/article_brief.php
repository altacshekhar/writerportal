<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container mt-2">
	<div class="row  mb-2">
		<div class="col-md-12">
			<h3 class="mb-0">Article Brief Info</h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="brief_headline">Headline</label>
				<?php
					$data_brief_headline = array(
						'name' => "brief_headline",
						'value' => set_value("brief_headline", $articlesbrief['brief_headline'], $html_escape=FALSE),
						'placeholder' => 'Headline',
						'maxlength' => 70,
						'rangelength' => '[10, 70]',
						'readonly' => 'readonly',
						'class' => 'form-control'
					);
					echo form_input($data_brief_headline);
					echo form_error("brief_headline");
				?>
				<small id="emailHelp" class="form-text text-muted"></small>
			</div>
			<div class="form-group">
				<label for="brief_introduction">Introduction</label>
				<?php
					$data_brief_introduction = array(
						'name' => "brief_introduction",
						'rows' => 4,
						'cols' => 2,
						'value' => set_value("brief_introduction", $articlesbrief['brief_introduction'], $html_escape=FALSE),
						'maxlength' => 200,
						'placeholder' => 'Introduction text here...',
						'rangelength' => '[10, 250]',
						'readonly' => 'readonly',
						'class' => 'form-control'
					);
					echo form_textarea($data_brief_introduction);
					echo form_error("brief_introduction");
					?>
			</div>
			<!-- <div class="form-group">
				<label for="brief_body_outline">Body Outline</label>
				<?php
					$data_brief_body_outline = array(
						'name' => "brief_body_outline",
						'rows' => 8,
						'cols' => 2,
						'value' => set_value("brief_body_outline", $articlesbrief['brief_body_outline'], $html_escape=FALSE),
						'maxlength' => 200,
						'placeholder' => 'Body outline text here...',
						'rangelength' => '[10, 250]',
						'readonly' => 'readonly',
						'class' => 'form-control'
					);
					echo form_textarea($data_brief_body_outline);
					echo form_error("brief_body_outline");
				?>
			</div> -->
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="brief_primary_keyword" class="col-sm-5 col-form-label">Primary Keyword</label>
				<?php

						$data_brief_primary_keyword = array(
							'name' => "brief_primary_keyword",
							'value' => set_value("brief_primary_keyword", $articlesbrief['brief_primary_keyword'], $html_escape=FALSE),
							'class' => 'form-control',
							'readonly' => 'readonly'
						);
						echo form_input($data_brief_primary_keyword);
						//echo form_error("brief_primary_keyword");
					?>
			</div>
			<div class="form-group">
				<label for="brief_assigned_to" class="col-sm-4 col-form-label">Assigned To</label>
					<?php
						$js = 'id="brief_assigned_to"  class="select-2 form-control-sm" disabled';
						echo form_dropdown("brief_assigned_to", $writers, $articlesbrief['brief_assigned_to'], $js);
						echo form_error("brief_assigned_to");
					?>
			</div>
			<div class="form-group">
				<label for="brief_word_length" class="col-sm-4 col-form-label">Word Length</label>
					<?php

						$data_brief_word_length = array(
							'name' => "brief_word_length",
							'value' => set_value("brief_word_length", $articlesbrief['brief_word_length'], $html_escape=FALSE),
							'placeholder' => 'Word Length',
							'class' => 'form-control',
							'readonly' => 'readonly',
							'autocomplete' => 'off',
						);
						echo form_input($data_brief_word_length);
						echo form_error("brief_word_length");
					?>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
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
						'readonly' => 'readonly',
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
						'readonly' => 'readonly',
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
						'readonly' => 'readonly',
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
						'readonly' => 'readonly',
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
						'readonly' => 'readonly',
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
								'readonly' => 'readonly',
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
								'readonly' => 'readonly',
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
								'readonly' => 'readonly',
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
								'readonly' => 'readonly',
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

