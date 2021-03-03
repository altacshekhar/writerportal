jQuery(document).ready(function(){  
    var keyword = jQuery('input[name="keyword"]').val();
    jQuery(".primary-keyword-phrase").keydown(function(){ 
        var currentelement 	= jQuery(this);
        var str = currentelement.val();
        var res = str.search(new RegExp(keyword, "i"));
        if(res < 0){
            currentelement.parents('.input-group').find(".tooltip-hide").show();
        }else{
            currentelement.parents('.input-group').find(".tooltip-hide").hide(); 
        }
    });
    jQuery(".primary-keyword-phrase").keydown(); 
    
    jQuery(".paragraph-warning .calc-length-editor").keydown(function(){ 
        var currentparagraph 	= jQuery(this);
        var stringFromTextArea = currentparagraph.html();
        paragraph_content = stringFromTextArea.replace(/<br>/gi, ' ');
		paragraph_content = paragraph_content.replace(/&nbsp;/g, ' ');
		paragraph_content = paragraph_content.replace(/(<p[^>]+?>|<p>|<\/p>)/img, ' ');
		paragraph_content = paragraph_content.replace( /(<([^>]+)>)/ig, ' ');
		paragraph_content = paragraph_content.replace( /[\s\n\r]+/g, ' ').trim();
        var sentences = paragraph_content.split(/[.|!|?]+/g);
        //console.log(sentences);
        var sentences_length = sentences.length-1;
        currentparagraph.parents('.input-group').find(".tooltip-hide").hide();
        var tooltip_title = '';
        if(sentences_length < 3 ){
            tooltip_title += '<small class="d-block">The paragraph is less than 3 sentences long.</small>';
            
        }
        if(sentences_length > 6 ){
            tooltip_title += '<small class="d-block">The paragraph is more than 6 sentences long.</small>';
           
        }
        var words = [];
        sentences.forEach(function(sentence) {
            words.push(sentence.split(' '));
        });

        var words_length_array = [];
        words.forEach(function(word) {
            words_length_array.push(parseInt(word.length-1));
        });
        var words_length = max(words_length_array);
        if(words_length > 20 ){
            tooltip_title += '<small class="d-block">One or more sentences contain more than 20 words.</small>';
           
        }
        var passive_voice = paragraph_content.match(/\b((be(en)?)|(w(as|ere))|(is)|(a(er|m)))(.+(en|ed))([\s]|\.)/g);
        //console.log({passive_voice});
        if(passive_voice !== null){
            if(passive_voice.length > 0){
                tooltip_title += '<small class="d-block">One or more sentences use a passive voice.</small>';
               
            }
        }
        hyperlinks_array = [];
        currentparagraph.find('a').each(function(){
            hyperlinks_array.push($(this).attr('href'));
           
        });
        //console.log(hyperlinks_array);
        if (hyperlinks_array.length > 2) {
            tooltip_title += '<small class="d-block">The paragraph has more than 2 hyperlinks.</small>';
            
        }
        var website_host = jQuery("#article_website_id").val();

        external_links_array = [];
        jQuery.each(hyperlinks_array,function(index, value){
           var domain_name = getDomain(value);
            if(domain_name !== website_host){
                external_links_array.push(domain_name);
            }
        });
        //console.log(external_links_array);
        if (external_links_array.length > 0 ) {
            tooltip_title += '<small class="d-block">One or more hyperlinks is pointing to external websites.</small>';
            
        }

        if(tooltip_title){
            currentparagraph.parents('.input-group').find(".para_sentences").attr('title', tooltip_title);
            currentparagraph.parents('.input-group').find(".tooltip-hide").show();
        }
       
    });
    jQuery(".paragraph-warning .calc-length-editor").keydown(); 
});

function max(input) {
    if (toString.call(input) !== "[object Array]")  
      return false;
 return Math.max.apply(null, input);
}




