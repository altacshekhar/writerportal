var $newContributorarticle_modal = jQuery('#articleContributorModal');
jQuery(document).on('click', '.article-contributor-add', function (e) {
    $("#contributorformType").val("articlecontributor-form");
    $newContributorarticle_modal.modal('show');
});

jQuery('#articlecontributor-form').validate({
    rules: {
        keyword: {
            required: true
        },
        tags: {
            required: true
        }
    },
    ignore: ":hidden, [contenteditable='true']:not([name])",
    messages: {
        keyword: "Please enter the unique keyword for the selected website."
    },
    submitHandler: function (form) {

        jQuery.ajax({
            type: "POST",
            cache: false,
            url: base_url + "articlemaster/saveContributorArticle",
            data: jQuery(form).serialize(),
            datatype: 'json',
            beforeSend: function( xhr ) {
                jQuery(".add-contributor-article").addClass('data-loading').prop('disabled', true);
			},
            success: function (data) {
               if(data['is_redirect']=='no'){
                $newContributorarticle_modal.modal('hide');
                jQuery('#signupModal').modal('show');
               }else if(data['is_redirect']=='yes'){
                window.location = data.redirect;	
               }            
            }
        }).done(function(){
            //jQuery(".add-contributor-article").removeClass('data-loading').removeAttr('disabled');
		});

    }
});

$(document).ready(function(){
    $('select[name^="cwebsite"] option:selected').attr("selected",null);
    $('select[name^="cwebsite"] option[value="hubworks.com"]').attr("selected","selected");

    jQuery(document).on('keyup', '#article-contributor-keyword', function (e) {
        var words = $.trim($(this).val()).split(" ");
        $('#keyword_words_count_contributor').html("");
        /*if(words.length > 4){
            $('#keyword_words_count_contributor').html("<span style='color: red;'>Max 4 words you can be use as keyword.</span>").show();
            jQuery('.add-contributor-article').attr('disabled', 'disabled');
        }else{
             $('#keyword_words_count_contributor').html("");
             jQuery('.add-contributor-article').removeAttr('disabled');
         }*/
    });
});
