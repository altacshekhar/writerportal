<!-- Article Brief  Model for Edit Values in Content Brief -->
<div class="modal fade" id="articleBriefCtaModal" tabindex="-1" role="dialog" aria-labelledby="articleBriefCtaModal"
	    aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Article Brief CTA</h5>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="cta_headline">
						Headline
					</label>
					<div class="col-sm-6">
					<?php
					$cta_headline = array(
							'id' => 'cta_headline',
							'name' => 'cta_headline',
							'value' => set_value('cta_headline', ''),
							'placeholder' => 'CTA Headline',
							'class' => 'form-control'
						);
						echo form_input($cta_headline);
						?>
						<small class="form-text text-muted">
							Enter the cta headline for cta
						</small>
						<?php echo form_error('cta_headline');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label" for="cta_description">
					Subheadline
					</label>
					<div class="col-sm-6">
					<?php
					$cta_sub_headline = array(
							'id' => 'cta_sub_headline',
							'name' => 'cta_sub_headline',
							'value' => set_value('cta_sub_headline', ''),
							'placeholder' => 'CTA Subheadline',
							'class' => 'form-control'
						);
						echo form_input($cta_sub_headline);
						?>
						
						<small class="form-text text-muted">
						Enter the cta subheadline for cta
						</small>
						<?php echo form_error('cta_sub_headline');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label">
					CTA Button Text
					</label>
					<div class="col-sm-6">
						<?php
						$cta_button_text = array(
							'id' => 'cta_button_text',
							'name' => 'cta_button_text',
							'value' => set_value('cta_button_text', ''),
							'placeholder' => 'CTA Button Text',
							'class' => 'form-control'
						);
						echo form_input($cta_button_text);
						
						?>
						<small class="form-text text-muted">
						Enter the cta button text for cta
						</small>
						<?php echo form_error('cta_button_text'); ?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-4 col-sm-6 h6 col-form-label">
					CTA Button Color
					</label>
					<div class="col-sm-6">
						<?php
						$cta_button_text = array(
							'id' => 'cta_button_color',
							'name' => 'cta_button_color',
							'value' => set_value('cta_button_color', ''),
							'placeholder' => 'CTA Button Color',
							'class' => 'form-control'
						);
						echo form_input($cta_button_text);
						$brief_cta_seq = array(
							'value' => '0',
							'type'  => 'hidden',
							'id' => 'cta_seq'
						);
						echo form_input($brief_cta_seq);
						?>
						<small class="form-text text-muted">
							Enter the cta button color
						</small>
						<?php echo form_error('cta_button_color'); ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
				<button type="button" name="submitForm" value="" class="btn btn-primary btn-sm save-cta-config" data-disable-with="Loading..." autocomplete="off">
					<i class="fas fa-save"></i>
					Save Brief CTA
				</button>
			</div>
		</div>
	</div>
</div>