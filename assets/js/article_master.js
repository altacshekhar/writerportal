var $newarticle_modal = jQuery('#articleMasterModal');
jQuery(document).on('click', '.article-master-add', function (e) {
    $("#masterformType").val("articlemaster-form");
    $newarticle_modal.modal('show');
});

jQuery('#articlemaster-form').validate({
    rules: {
        keyword: {
            required: true
        },
        tags: {
            required: true
        },
        permalink: {
            required: true,
        },
        article_master_pillar: {
            required: true
        }
    },
    ignore: ":hidden, [contenteditable='true']:not([name])",
    messages: {
        article_master_pillar: "Please first add pillar article for the selected website.",
        keyword: "Please enter the unique keyword for the selected website.",
        permalink:"Please enter the unique permalink for the selected website.",
    },
    submitHandler: function (form) {

        jQuery.ajax({
            type: "POST",
            cache: false,
            url: base_url + "articlemaster/saveMasterArticle",
            data: jQuery(form).serialize(),
            datatype: 'json',
            beforeSend: function( xhr ) {
                jQuery(".add-master-article").addClass('data-loading').prop('disabled', true);
			},
            success: function (data) {
               if(data['is_redirect']=='no'){
                $newarticle_modal.modal('hide');
                jQuery('#signupModal').modal('show');
               }else if(data['is_redirect']=='yes'){
                window.location = data.redirect;	
               }            
            }
        }).done(function(){
            //jQuery(".add-master-article").removeClass('data-loading').removeAttr('disabled');
		});

    }
});

$(document).ready(function(){
    $('select[name^="website"] option:selected').attr("selected",null);
    $('select[name^="website"] option[value="hubworks.com"]').attr("selected","selected");
    $('#articleMasterModal input[type="radio"]').click(function(){
       var jsonCategory = $(this).data("json-category");
        if(jsonCategory){
            $("#article-master-category").empty();
            $.each(jsonCategory,
                function (key, value) {
                    $("#article-master-category").append("<option value='" + key + "'>" + value + "</option>");
            });
        }
      
        var showClassArray = [];
        $('.blog-show, .cluster-show, .pillar-show, .supporting-show').hide();
        $('#articleMasterModal input[type="radio"]:checked').each(function() {
            if($(this).parents('.article-modal-article-type').css('display')=='block'){
                var showClass = $(this).data("show-class");
                //console.log({showClass});
                showClassArray.push(showClass);
                $(showClass).show(); 
            }
            
          });       
          //console.log({showClassArray});
    });
    $('#articleMasterModal input[type="radio"]:checked').trigger('click');

    $( "#article-master-keyword" ).focusout(function() {
        var keyword = $(this).val();
        var words = $.trim($(this).val()).split(" ");
        var site_structure = $("input[name=siteStructure]:checked").val();
        var type = '';
        var website = $("#article-master-website option:selected").val();
        if(site_structure=='cluster'){
            type = $("input[name=articleClusterType]:checked").val();
        }
        var permalink = string_to_slug(keyword);
        $( "#article-master-permalink" ).val(permalink);
        $( "#article-master-keyword-permalink" ).val(permalink);
        
         permalink = string_to_slug($("#article-master-permalink" ).val());
         if(permalink){
           jQuery.ajax({
                type: "GET",
                cache: true,
                url: base_url + "articlemaster/get_permalink/"+ website + '/' + permalink + '/' + type ,
                datatype: 'json',
                success: function (data) {
                   if(data.success == true){
                        $('#permalink_response').html("<span style='color: red;'>This permalink was already used for the selected website.</span>").show();
                        $('#keyword_response').html("<span style='color: red;'>Use another keyword if permalink already used for the selected website.</span>").show();
                        jQuery('.add-master-article').attr('disabled', 'disabled');
                   }else{
                        $('#permalink_response').html("");
                        $('#keyword_response').html("");
                        if(words > 4){
                            
                            jQuery('.add-master-article').removeAttr('disabled');
                        }
                       
                    }
                  
                }
            });

         }
    });

    $("#article-master-website" ).change(function() {
        $('#permalink_response').html("");
        $('#keyword_response').html("");
        $( "#article-master-keyword" ).trigger( "focusout" );
        var website = $(this).val();
        $("#article-master-pillar").empty();
        
            jQuery.ajax({
                type: "GET",
                cache: true,
                url: base_url + "articlemaster/get_pillar_article/"+ website,
                datatype: 'json',
                success: function (data) {
                    console.log(data);
                    if(data){
                        $.each(data,
                            function (i, option) {
                                console.log(option.keywords);
                                console.log({option});
                                $("#article-master-pillar").append("<option value='" + option.article_permalink + "/" +  option.article_pillar_id +"'>" + option.keywords + "</option>");
                        });
                    }else {
                        console.log("No data")
                    }
                
                }
            });
        });

        jQuery(document).on('keyup', '#article-master-keyword', function (e) {
            var words = $.trim($(this).val()).split(" ");
            $('#keyword_words_count').html("");
            /*if(words.length > 4){
                $('#keyword_words_count').html("<span style='color: red;'>Max 4 words you can be use as keyword.</span>").show();
                 jQuery('.add-master-article').attr('disabled', 'disabled');
            }else{
                 $('#keyword_words_count').html("");
                 jQuery('.add-master-article').removeAttr('disabled');
             }*/
        });
    });

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
    
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
  
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, '-') // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes
  
    return str;
  }