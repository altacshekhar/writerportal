jQuery('#seophraseModal').modal('show'); 
jQuery('#seophrase-form').validate({
    rules: {
        keyword_search: {
            required: true
        }
    },
    submitHandler: function (form) {
        var keyword_search = jQuery(form).find('.keyword_search').val();
        console.log(keyword_search);
        jQuery('#article_meta_keyword').val(keyword_search);
        jQuery('#seophraseModal').modal('hide'); 
        return false;
    }
});