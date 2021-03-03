<?php
$style_string = '';
if ($cta_background_type == 'color') {
	$style_string = "background-color:" . $cta_background_color . " !important;";
}

$columnClass = 'col-sm-12';
if ($cta_type == 'leadcapture') {
	$columnClass = 'col-sm-8 col-md-offset-2';
}
?>
<div class="card border-0 text-white bg-light overflow-hidden m-0" style="<?php echo $style_string; ?>">
	<div class="card-body py-3 position-relative">
		<?php if ($cta_background_type == 'video') { ?>
			<div id="ytbg" class="bg-video" data-ytbg-fade-in="true" data-youtube="<?php echo $cta_background_video; ?>"></div>
		<?php } ?>

		<?php if ($cta_background_type == 'image') { ?>
			<img src="<?php echo site_url($cta_background_image) ?>" class="bg-image">
		<?php } ?>

		<div class="position-relative text-center">
			<div class="row">
				<div class="<?php echo $columnClass?>">
					<p class="lead mb-1">
						<?php echo $cta_headline; ?>
					</p>
					<p class="lead font-weight-bold m-0">
						<?php echo $cta_sub_headline; ?>
					</p>
					<?php
					if ($cta_type == 'signup') {
					?>
						<div class="mt-2">
							<button type="button" class="btn btn-success" style="background-color: <?php echo $cta_button_color; ?>; border-color: <?php echo $cta_button_color; ?>">
								<?php echo $cta_button_text; ?>
							</button>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php
	if ($cta_type == 'leadcapture') {
	?>
	<div class="card-footer bg-transparent py-1 position-relative">
		<div class="d-flex justify-content-center">
			<div class="mr-1">
				<input class="form-control" type="text" placeholder="Full Name">
			</div>
			<div class="mr-1">
				<input class="form-control" type="email" placeholder="Email">
			</div>
			<div>
				<button type="button" style="background-color: <?php echo $cta_button_color; ?>; border-color: <?php echo $cta_button_color; ?>" id="mauticform_input_cta27_submit" class="btn btn-success" value="1">
					<?php echo $cta_button_text; ?>
				</button>
			</div>
		</div>
	</div>
	<?php
	}
	?>
</div>

<?php
if ($cta_type == 'salesdemo') {
    ?>

<?php
}
?>
