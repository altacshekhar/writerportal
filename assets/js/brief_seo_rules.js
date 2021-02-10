jQuery(document).ready(function(){ 
    //var warning_count = jQuery('#warning_count').val(); 
    //var stop_count = jQuery('#stop_count').val(); 
    
    var keyword = jQuery('input[name="keyword"]').val();
    
   // alert(keyword);
    //alert(keyword);
    jQuery(".brief-primary-keyword-phrase").keyup(function(){ 
        var brief_warning_count = 0; 
        var brief_stop_count = 0; 
        //alert('hi');
       /* $(".primary-keyword-phrase").each(function(){
            
        });*/

        var currentelement 	= jQuery(this);
            //alert(currentelement);
            var str = currentelement.val();
            //alert(str);
            var res = str.search(new RegExp(keyword, "i"));
            alert(res);
            if(res < 0){
                currentelement.parents('.input-group').find(".tooltip-hide").show();
                brief_stop_count++;
            }else{
                currentelement.parents('.input-group').find(".tooltip-hide").hide(); 
                
                
            }
        
    });
    jQuery(".brief-primary-keyword-phrase").keyup(); 
    
    
    //jQuery('#brief_warning_count').val(brief_warning_count);
    //alert(brief_stop_count);
    //jQuery('#brief_stop_count').val(brief_stop_count);
    
   
    var $briefSeoRulesModal = jQuery('#briefSeoRulesModal');
    jQuery(document).on('click', '#articlebrief-form button[type="submit"]', function (event) {
        //alert('hi');
        var brief_inputval = $(this).val();
        alert(brief_inputval);
        alert(brief_stop_count);
        if(brief_inputval=='savedraft'){
            alert(brief_stop_count);

            if(brief_stop_count > 0 || brief_warning_count > 0){
                if(brief_stop_count){
                    //jQuery( ".seo-rules" ).hide();
                }
                $briefSeoRulesModal.modal('show');
                return false;
            }else{
                jQuery( "#articlebrief-form" ).submit(); 
            }
           
        }
		
		//jQuery('#form_action').val(brief_inputval);
    });
    jQuery(document).on('click', '.brief-seo-rules', function (event) {
		jQuery( "#articlebrief-form" ).submit();
	});
    
});




