<?php 
$index = $cta_data['cta_seq_no'] - 1;
$cta_id = array(
    'name' => 'cta_id['.$index.']',
    'value' => set_value('cta_id['.$index.']', $cta_data['cta_id']),
    'type' => 'hidden',
    'class' => 'do-not-ignore'
);
echo form_input($cta_id);
echo form_error('cta_id['.$index.']');
$cta_headline = array(
    'type' => 'hidden',
    'name' => 'brief_cta_headline['.$index.']',
    'value' => set_value('brief_cta_headline['.$index.']', $cta_data['cta_headline']),
    'placeholder' => 'CTA Headline'
);
echo form_input($cta_headline);
$cta_sub_headline = array(
    'type' => 'hidden',
    'name' => 'brief_cta_sub_headline['.$index.']',
    'value' => set_value('brief_cta_sub_headline['.$index.']', $cta_data['cta_sub_headline']),
    'placeholder' => 'CTA Subheadline'
);
echo form_input($cta_sub_headline);
        
$cta_button_text = array(
    'type' => 'hidden',
    'name' => 'brief_cta_button_text['.$index.']',
    'value' => set_value('brief_cta_button_text['.$index.']', $cta_data['cta_button_text']),
);
echo form_input($cta_button_text);
$cta_button_text = array(
    'name' => 'brief_cta_button_color['.$index.']',
    'value' => set_value('brief_cta_button_color['.$index.']', $cta_data['cta_button_color']),
    'type' => 'hidden'
);
echo form_input($cta_button_text);
$brief_cta_background_type = array(
    'name'  => 'brief_cta_background_type['.$index.']',
    'value' => set_value('brief_cta_background_type['.$index.']', $cta_data['cta_background_type']),
    'type'  => 'hidden',
);
echo form_input($brief_cta_background_type);
$data_cta_website = array(
    'name'  => 'brief_cta_website['.$index.']',
    'value' => set_value('brief_cta_website['.$index.']', $cta_data['cta_website']),
    'type'  => 'hidden'
);
echo form_input($data_cta_website);
$brief_cta_language_id = array(
    'name'  => 'brief_cta_language_id['.$index.']',
    'value' => set_value('brief_cta_language_id['.$index.']', $cta_data['cta_language_id']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_language_id);
$brief_cta_type = array(
    'name'  => 'brief_cta_type['.$index.']',
    'value' => set_value('brief_cta_type['.$index.']', $cta_data['cta_type']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_type);
$brief_cta_background = array(
    'name'  => 'brief_cta_background['.$index.']',
    'value' => set_value('brief_cta_background['.$index.']', $cta_data['cta_background']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background);
$brief_cta_background_image = array(
    'name'  => 'brief_cta_background_image['.$index.']',
    'value' => set_value('brief_cta_background_image['.$index.']', $cta_data['cta_background_image']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_image);
$brief_cta_background_color = array(
    'name'  => 'brief_cta_background_color['.$index.']',
    'value' => set_value('brief_cta_background_color['.$index.']', $cta_data['cta_background_color']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_color);
$brief_cta_background_video = array(
    'name'  => 'brief_cta_background_video['.$index.']',
    'value' => set_value('brief_cta_background_video['.$index.']', $cta_data['cta_background_video']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_background_video);
$brief_cta_form_id = array(
    'name'  => 'brief_cta_form_id['.$index.']',
    'value' => set_value('brief_cta_form_id['.$index.']', $cta_data['cta_form_id']),
    'type'  => 'hidden'
);
echo form_input($brief_cta_form_id);
?>