<?php
    $data_cta_website = array(
        'name'  => 'brief_cta_website[]',
        'value' => set_value('brief_cta_website[]', $cta_data->cta_website),
        'type'  => 'hidden'
    );
    echo form_input($data_cta_website);
    $brief_cta_language_id = array(
        'name'  => 'brief_cta_language_id[]',
        'value' => set_value('brief_cta_language_id[]', $cta_data->cta_language_id),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_language_id);
    $brief_cta_headline = array(
        'name'  => 'brief_cta_headline[]',
        'value' => set_value('brief_cta_headline[]', $cta_data->cta_headline),
        'type'  => 'hidden',
        'class' => 'cta-headline'
    );
    echo form_input($brief_cta_headline);
    $brief_cta_subheadline = array(
        'name'  => 'brief_cta_sub_headline[]',
        'value' => set_value('brief_cta_sub_headline[]', $cta_data->cta_sub_headline),
        'type'  => 'hidden',
        'class' => 'cta-sub-headline'
    );
    echo form_input($brief_cta_subheadline);
    $brief_cta_type = array(
        'name'  => 'brief_cta_type[]',
        'value' => set_value('brief_cta_type[]', $cta_data->cta_type),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_type);
    $brief_cta_button_text = array(
        'name'  => 'brief_cta_button_text[]',
        'value' => set_value('brief_cta_button_text[]', $cta_data->cta_button_text),
        'type'  => 'hidden',
        'class' => 'cta-button-text'
    );
    echo form_input($brief_cta_button_text);
    $brief_cta_button_color = array(
        'name'  => 'brief_cta_button_color[]',
        'value' => set_value('brief_cta_button_color[]', $cta_data->cta_button_color),
        'type'  => 'hidden',
        'class' => 'cta-button-color'
    );
    echo form_input($brief_cta_button_color);
    $brief_cta_background_type = array(
        'name'  => 'brief_cta_background_type[]',
        'value' => set_value('brief_cta_background_type[]', $cta_data->cta_background_type),
        'type'  => 'hidden',
        'class' => 'cta-button-type'
    );
    echo form_input($brief_cta_background_type);
    $brief_cta_background = array(
        'name'  => 'brief_cta_background[]',
        'value' => set_value('brief_cta_background[]', $cta_data->cta_background),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_background);
    $brief_cta_background_image = array(
        'name'  => 'brief_cta_background_image[]',
        'value' => set_value('brief_cta_background_image[]', $cta_data->cta_background_image),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_background_image);
    $brief_cta_background_color = array(
        'name'  => 'brief_cta_background_color[]',
        'value' => set_value('brief_cta_background_color[]', $cta_data->cta_background_color),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_background_color);
    $brief_cta_background_video = array(
        'name'  => 'brief_cta_background_video[]',
        'value' => set_value('brief_cta_background_video[]', $cta_data->cta_background_video),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_background_video);
    $brief_cta_form_id = array(
        'name'  => 'brief_cta_form_id[]',
        'value' => set_value('brief_cta_form_id[]', $cta_data->cta_form_id),
        'type'  => 'hidden'
    );
    echo form_input($brief_cta_form_id);
   
?>