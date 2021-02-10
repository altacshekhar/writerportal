
<div class="form-group row">
    <label class="col-md-4 col-sm-6 h6 col-form-label" for="cta_headline">
        Headline
    </label>
    <?php
    $cta_id = array(
        'id' => 'cta_id',
        'name' => 'cta_id',
        'value' => set_value('cta_id', $cta_data->cta_lookup_id),
        'type' => 'hidden'
    );
    echo form_input($cta_id);
    ?>
    <?php echo form_error('cta_id');?>
    <div class="col-sm-6">
    <?php
    $cta_headline = array(
        'id' => 'cta_headline',
        'name' => 'cta_headline',
        'value' => set_value('cta_headline', $cta_data->cta_headline),
        'placeholder' => 'CTA Headline',
        'class' => 'form-control'
    );
    echo form_input($cta_headline);
    ?>
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
            'value' => set_value('cta_sub_headline', $cta_data->cta_sub_headline),
            'placeholder' => 'CTA Subheadline',
            'class' => 'form-control'
        );
        echo form_input($cta_sub_headline);
        ?>
        <!-- <small class="form-text text-muted">
        Enter the cta subheadline for cta
        </small> -->
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
            'value' => set_value('cta_button_text', $cta_data->cta_button_text),
            'placeholder' => 'CTA Button Text',
            'class' => 'form-control'
        );
        echo form_input($cta_button_text);
        
        ?>
        <!-- <small class="form-text text-muted">
        Enter the cta button text for cta
        </small> -->
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
            'value' => set_value('cta_button_color', $cta_data->cta_button_color),
            'placeholder' => 'CTA Button Color',
            'class' => 'form-control'
        );
        echo form_input($cta_button_text);
        $brief_cta_seq = array(
            'value' => $cta_data->cta_seq,
            'type'  => 'hidden',
            'id' => 'cta_seq_no',
            'name' => 'cta_seq_no'
        );
        echo form_input($brief_cta_seq);
        ?>
        <!-- <small class="form-text text-muted">
            Enter the cta button color
        </small> -->
        <?php echo form_error('cta_button_color'); ?>
    </div>
</div>
<?php
$brief_cta_background_type = array(
    'name'  => 'cta_background_type',
    'value' => set_value('cta_background_type', $cta_data->cta_background_type),
    'type'  => 'hidden',
    'class' => 'cta-button-type'
);
echo form_input($brief_cta_background_type);
$data_cta_website = array(
    'name'  => 'cta_website',
    'value' => set_value('cta_website', $cta_data->cta_website),
    'type'  => 'hidden'
);
echo form_input($data_cta_website);
$brief_cta_language_id = array(
    'name'  => 'cta_language_id',
    'value' => set_value('cta_language_id', $cta_data->cta_language_id),
    'type'  => 'hidden'
);
echo form_input($brief_cta_language_id);
$brief_cta_type = array(
    'name'  => 'cta_type',
    'value' => set_value('cta_type', $cta_data->cta_type),
    'type'  => 'hidden'
);
echo form_input($brief_cta_type);
$brief_cta_background = array(
    'name'  => 'cta_background',
    'value' => set_value('cta_background', $cta_data->cta_background),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background);
$brief_cta_background_image = array(
    'name'  => 'cta_background_image',
    'value' => set_value('cta_background_image', $cta_data->cta_background_image),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_image);
$brief_cta_background_color = array(
    'name'  => 'cta_background_color',
    'value' => set_value('cta_background_color', $cta_data->cta_background_color),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_color);
$brief_cta_background_video = array(
    'name'  => 'cta_background_video',
    'value' => set_value('cta_background_video', $cta_data->cta_background_video),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_video);
$brief_cta_form_id = array(
    'name'  => 'cta_form_id',
    'value' => set_value('cta_form_id', $cta_data->cta_form_id),
    'type'  => 'hidden'
);
echo form_input($brief_cta_form_id);
?>