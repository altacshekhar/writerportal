<script src="<?php echo site_url('assets/vendor/youtube-background/jquery.youtube-background.js'); ?>" type="text/javascript"></script>
<?php
 if($cta_type == 'signup'){
?>

<div id="call-to-action-wrap" class="hero cta-video" style="<?php if ($cta_background_type == 'color') { echo "background-color:". $cta_background_color.";"; } ?><?php if($cta_background_type == 'image') { echo "background-image: url('". site_url($cta_background_image) . "'); background-repeat: no-repeat; background-size: contain;"; } ?>">
    <?php if ($cta_background_type == 'video') { ?>
     <div id="ytbg" data-ytbg-fade-in="true" data-youtube="<?php echo $cta_background_video; ?>"></div>
    <?php } ?>
  <div class="padding-wrap-xl-both tint text-center">
    <div class="container text-center">
			<p class="lead"><?php echo $cta_headline; ?><br><strong><?php echo $cta_sub_headline; ?></strong></p> 
			<button type="button" class="btn btn-success" style="background-color: <?php echo $cta_button_color; ?>; border-color: <?php echo $cta_button_color; ?>"> <?php echo $cta_button_text; ?></button>
    </div> 
  </div>
</div>
<?php
  }
?>

<?php
 if($cta_type == 'leadcapture'){
?>

<div id="call-to-action-wrap" style="background-color:#ccc ;">
  <div class="hero inline-form">
  <?php if ($cta_background_type == 'video') { ?>
    <div class="overlay"></div>
      <div id="ytbg" data-ytbg-fade-in="true" data-youtube="<?php echo $cta_background_video; ?>"></div>
      <?php } ?>
    <div style="<?php if ($cta_background_type == 'color') { echo "background-color:". $cta_background_color.";"; } ?><?php if($cta_background_type == 'image') { echo "background-image: url('". site_url($cta_background_image) . "'); background-repeat: no-repeat; background-size: contain; background-position: center center;"; } ?>"> 
      
      <div class="row">
      <?php if ($cta_background_type == 'video') { ?>
      <div class="col-sm-12 text-center padding-wrap-xl-both">
        <p class="lead"> <?php echo $cta_headline; ?> <br><strong><?php echo $cta_sub_headline; ?></strong></p>
    </div>
    <?php } else { ?>
      <div class="col-sm-8 text-center col-md-offset-2 padding-wrap-xl-both">
        <p class="lead"> <?php echo $cta_headline; ?> <br><strong><?php echo $cta_sub_headline; ?></strong></p>
      </div>
    <?php } ?>
    </div>
  </div>
  </div>
  <div class="dwnloadform">
    <div id="mauticform_wrapper_cta27" class="mauticform_wrapper">
      <form autocomplete="false" role="form" method="post" action="#"
        id="mauticform_cta27" data-mautic-form="cta27">
        <div class="mauticform-error" id="mauticform_cta27_error"></div>
        <div class="mauticform-message" id="mauticform_cta27_message"></div>
        <div class="mauticform-innerform">
          <div class="mauticform-page-wrapper mauticform-page-1" data-mautic-form-page="1">
            <div id="mauticform_cta27_f_name" data-validate="f_name" data-validation-type="text"
              class="mauticform-row mauticform-text mauticform-field-1 mauticform-required"> <input id="mauticform_input_cta27_f_name"
                name="mauticform[f_name]" value="" class="mauticform-input" type="text" placeholder="Full Name"> <span
                class="mauticform-errormsg" style="display: none;">Please enter your name</span> </div>
            <div id="mauticform_cta27_email" data-validate="email" data-validation-type="email"
              class="mauticform-row mauticform-email mauticform-field-2 mauticform-required"><input id="mauticform_input_cta27_email" name="mauticform[email]"
                value="" class="mauticform-input" type="email" placeholder="Email"> <span class="mauticform-errormsg"
                style="display: none;">Please enter your email address</span> </div>
            <div id="mauticform_cta27_submit" class="mauticform-row mauticform-button-wrapper mauticform-field-3">
              <button type="submit" name="mauticform[submit]"  style="background-color: <?php echo $cta_button_color; ?>; border-color: <?php echo $cta_button_color; ?>" id="mauticform_input_cta27_submit"
                class="mauticform-button btn btn-success" value="1"><?php echo $cta_button_text; ?></button> </div>
          </div>
        </div> <input type="hidden" name="mauticform[formId]" id="mauticform_cta27_id" value="27"> <input type="hidden"
          name="mauticform[return]" id="mauticform_cta27_return" value=""> <input type="hidden"
          name="mauticform[formName]" id="mauticform_cta27_name" value="cta27">
      </form>
    </div>
  </div>
</div>

<?php
  }
?>

<?php
 if($cta_type == 'salesdemo'){
?>

<?php
  }
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
  jQuery('[data-youtube]').youtube_background();
    });
</script>