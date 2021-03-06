jQuery(document).ready(function () {
	var $newkeyword_modal = jQuery('#articleKeywordModal');
	jQuery(document).on('click', '.article-keyword-add', function (e) {
		$newkeyword_modal.modal('show');
	});

	var $showbrief_modal = jQuery('#showBriefModal');
	jQuery(document).on('click', '.show-library-cta', function (e) {
		var cta_seq = $(this).data('cta');
		$showbrief_modal.find('.library-cta').data('cta-seq', cta_seq);
		$showbrief_modal.modal('show');
	});

	var serp_url = $('.document-search-results').data('json-serp-url');
	var paa_ques_display = 1; //Variable to check the people also ask question section to be shown in first request only
	if(serp_url)
	{
		getpagescrap(serp_url,paa_ques_display);
	}
	else
	{
		/*Ajax Request for Keyword Analysis */
		var keyword = $('#keyword').val();
		var keyword_id = $('.primary-keyword-id').val();
		if(keyword_id)
		{
			jQuery.ajax({
				type: "POST",
				cache: false,
				data: {'keyword': keyword,'keyword_id': keyword_id},
				url: base_url + "secure/keyword/keywordanalysisdata",
				datatype: 'json',
				beforeSend: function (xhr) {
					jQuery(".show-loading").addClass('data-loading');
				},
				success: function (result) {
					if(result['status'] == 1)
					{	
						$('#keyword-result-container').html(result['html']);
						$('.document-search-results').attr('data-json-serp-url',result['serp_url']);
						$('.document-search-results').attr('data-keyword',result['keyword']);
						$('.topic-score').html(result['topic_section']);
						getpagescrap(result['serp_url'],1);
					}	
					else
					{
						setFlashes(result['flashes']['type'], result['flashes']['message']);
					}
				}
			}).done(function () {
				jQuery(".show-loading").removeClass('data-loading');
			});
		}
	}
	function getpagescrap(serp_url,p_q_d)
	{
		paa_ques_display = p_q_d + 1;
		var keyword = $('.document-search-results').data('keyword');
		jQuery.ajax({
			type: "POST",
			cache: false,
			data: {'keyword': keyword,'serp_url': serp_url},
			url: base_url + "secure/contentarticlesbrief/getScrapData",
			datatype: 'json',
			beforeSend: function (xhr) {
				jQuery(".show-loading").addClass('data-loading');
			},
			success: function (data) {
				result = JSON.parse(data);
				if(result['serp'].length > 0)
				{	
					getpagescrap(result['serp']);
					$('.document-search-results').attr('data-json-serp-url',result['serp']);
					$('.document-search-results').append(result['overview_data']);
					$('.links-search-result').append(result['links_data']);
					$('.stats-search-result').append(result['stats_data']);
					$('.serp-results').append(result['serp_data']);
					if(p_q_d == 1)
					$('.people-also-ask-results').append(result['paa_data']);
					// $('.quora-results').append(result['quora_data']);
					// $('.reddit-results').append(result['reddit_data']);
				}	
			}
		}).done(function () {
			jQuery(".show-loading").removeClass('data-loading');
		});
	}
	var targetElem;
	jQuery(document).on('focus','.form-control ',function (event)
	{
		targetElem = this;
	});

	jQuery(document).on('click', '.paste-heading', function(event){
		var title = $(this).data('title');
		if(targetElem)
		{
			$(targetElem).val(title);
		}
	});

	jQuery(document).on('click', '.paste-full-overview', function(event){
		var title = $(this).data('title');
		var desc = $(this).data('description');
		if(targetElem)
		{
			$(targetElem).val(title+' '+desc);
		}
	});
	
	jQuery(document).on('click', '.links-copy', function(event){
		var anchor = $(this).data('anchor');
		var href = $(this).data('href');
		if(targetElem)
		{
			//$(targetElem).val('<a href="'+href+'">'+anchor+'</a>');
			$(targetElem).val(anchor);
		}
	});

	jQuery(document).on('click', '.stats-copy', function(event){
		var anchor = $(this).data('title');
		if(targetElem)
		{
			$(targetElem).val(anchor);
		}
	});

	jQuery(document).on('click', '.serp-questions-copy', function(event){
		var title = $(this).data('title');
		if(targetElem)
		{
			$(targetElem).val(title);
		}
	});
	jQuery(document).on('click','.paste-serp-questions', function(event){
		var title = $(this).data('title');
		var descrip = $(this).data('description');
		if(targetElem)
		{
			$(targetElem).val(title+" "+descrip);
		}
	});
	jQuery(document).on('click','.show-all-overviews',function(event)
	{
		var rand = $(this).data('random');
		$('.show-overview-'+rand).removeClass('hide');
		$(this).hide();
	});

	jQuery(document).on('click', '.paa-questions-copy', function(event){
		var title = $(this).data('title');
		console.log(targetElem);
		if(targetElem)
		{
			$(targetElem).val(title);
		}
	});

	jQuery(document).on('click', '.show-brief-cta', function (e) {
		var cta_seq = $(this).data('cta');
		var brief_cta_id = $(this).data('brief-cta-id');
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/getCtaBriefPreviewData",
			data: {
				'cta_seq': cta_seq,
				'brief_cta_id': brief_cta_id
			},
			beforeSend: function (xhr) {
				//jQuery(".article-brief-cta").addClass('data-loading').prop('disabled', true);
			},
			success: function (data) {
				$(".cta-list-item").empty();
				$('.cta-list-item').html(data);
				$showbrief_modal.find('.article-brief-cta').data('cta-seq', cta_seq);
				$showbrief_modal.modal('show');
			}
		}).done(function () {
			//jQuery(".article-brief-cta").removeClass('data-loading').removeAttr('disabled');
		});

	});
	$showbrief_modal.on('shown.bs.modal', function (e) {
		jQuery(this).find('[data-youtube]').youtube_background();
	})

	var $newarticlebrief_modal = jQuery('#articleBriefModal');
	jQuery(document).on('click', '.article-master-brief-add', function (e) {
		// $("#masterformType").val("articlemaster-form");
		$newarticlebrief_modal.modal('show');
	});

	var $newbriefcta = jQuery('#articleBriefCtaModal');
	jQuery(document).on('click', '.library-cta', function (e) {
		var cta_seq = $(this).data('cta-seq');
		// $('#cta_headline').val($('#cta_form_'+cta_seq+' input.cta-headline').val());
		// $('#cta_sub_headline').val($('#cta_form_'+cta_seq+' input.cta-sub-headline').val());
		// $('#cta_button_text').val($('#cta_form_'+cta_seq+' input.cta-button-text').val());
		// $('#cta_button_color').val($('#cta_form_'+cta_seq+' input.cta-button-color').val());
		// $('#cta_seq').val(cta_seq);
		var cta_id = $(this).data('cta-id');
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/getCtaLookUpData",
			//data: {'cta_id' : cta_id,'brief_cta_id': brief_cta_id,'cta_seq':cta_seq},
			data: {
				'cta_id': cta_id,
				'cta_seq': cta_seq
			},
			beforeSend: function (xhr) {
				//jQuery(".article-brief-cta").addClass('data-loading').prop('disabled', true);
			},
			success: function (data) {
				//$('#cta_form_' + cta_seq).html(data);
				$newbriefcta.find('.modal-body').html(data)
				$showbrief_modal.modal('hide');
				$newbriefcta.modal('show');
			}
		}).done(function () {
			//jQuery(".article-brief-cta").removeClass('data-loading').removeAttr('disabled');
		});
	});
	jQuery(document).on('click', '.article-brief-cta', function (e) {
		var cta_id = $(this).data('cta-id');
		var cta_seq = $(this).data('cta-seq');
		//alert(cta_seq);
		// $('#cta_headline').val($('#cta_form_'+cta_seq+' input.cta-headline').val());
		// $('#cta_sub_headline').val($('#cta_form_'+cta_seq+' input.cta-sub-headline').val());
		// $('#cta_button_text').val($('#cta_form_'+cta_seq+' input.cta-button-text').val());
		// $('#cta_button_color').val($('#cta_form_'+cta_seq+' input.cta-button-color').val());
		// $('#cta_seq').val(cta_seq);
		
		var brief_cta_id = $(this).data('brief-cta-id');
		
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/getCtaBriefData",
			//data: {'cta_id' : cta_id,'brief_cta_id': brief_cta_id,'cta_seq':cta_seq},
			data: {
				'cta_id': cta_id,
				'cta_seq': cta_seq,
				'brief_cta_id': brief_cta_id
			},
			beforeSend: function (xhr) {
				//jQuery(".article-brief-cta").addClass('data-loading').prop('disabled', true);
			},
			success: function (data) {
				//$('#cta_form_' + cta_seq).html(data);
				$newbriefcta.find('.save-cta-config').addClass("save-brief-cta-config").removeClass("save-cta-config");
				$newbriefcta.find('.modal-body').html(data)
				$showbrief_modal.modal('hide');
				$newbriefcta.modal('show');
			}
		}).done(function () {
			//jQuery(".article-brief-cta").removeClass('data-loading').removeAttr('disabled');
		});
	});
	var $newAssignWriter_modal = jQuery('#assignWriterModal');
	jQuery(document).on('click', '.assign-to-writer', function (e) {
		$newAssignWriter_modal.modal('show');
	});

	jQuery(document).on('click', '.save-assign-writer', function (e) {
		$newAssignWriter_modal.modal('hide');
	});

	jQuery(document).on('click', '.save-cta-config', function (e) {
		var cta_seq = $('#cta_seq_no').val();
		console.log({
			cta_seq
		});
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/loadeditedPreview",
			data: $('#articlebrief-cta-form').serialize(),
			success: function (result) {
				$('.cta-preview-' + cta_seq).html('');
				$('.cta-preview-' + cta_seq).html(result);
				$newbriefcta.modal('hide');
				jQuery('[data-youtube]').youtube_background();
			}
		});
	});

	jQuery(document).on('click', '.save-brief-cta-config', function (e) {
		var cta_seq = $('#cta_seq_no').val();
		console.log({
			cta_seq
		});
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/loadeBriefCtaEditPreview",
			data: $('#articlebrief-cta-form').serialize(),
			success: function (result) {
				console.log('result'+result);
				$('.cta-preview-' + cta_seq).html('');
				$('.cta-preview-' + cta_seq).html(result);
				$newbriefcta.modal('hide');
				jQuery('[data-youtube]').youtube_background();
			}
		});
	});

	jQuery(document).on('change', '.call-to-action', function (e) {
		var cta_seq = $(this).data('call-to-action');
		var brief_cta_id = $(this).data('brief-cta-id');
		var cta_id = $(this).val();
		jQuery.ajax({
			type: "POST",
			cache: false,
			url: base_url + "secure/contentarticlesbrief/getCtaLookUpData",
			data: {
				'cta_id': cta_id,
				'brief_cta_id': brief_cta_id
			},
			beforeSend: function (xhr) {
				jQuery(".article-brief-cta").addClass('data-loading').prop('disabled', true);
			},
			success: function (data) {
				$('#cta_form_' + cta_seq).html(data);
			}
		}).done(function () {
			jQuery(".article-brief-cta").removeClass('data-loading').removeAttr('disabled');
		});
	});

	$(document).ready(function () {
		$('.add-another-paragraph').click(function () {
			var newel = $('.add-form-group:last').clone();
			var para_id = $(newel).find('input[type=text]').data('para-id');
			para_id = parseInt(para_id) + 1;
			$(newel).find('input[type=text]').val('');
			$(newel).find('input[type=text]').attr('name', "paragraph_title[" + para_id + "]");
			$(newel).find('input[type=text]').attr('data-para-id', para_id);
			$(newel).insertAfter(".add-form-group:last");
		});

		$('#articlebrief-form input[type="radio"]').click(function () {
			//alert('hi');
			var jsonCategory = $(this).data("json-category");
			var selectedCategory = $(this).data("selected-category");
			//alert(selectedCategory);
			//console.log(jsonCategory);
			if (jsonCategory) {
				$("#brief_article_category").empty();
				$.each(jsonCategory,
					function (key, value) {
						$option = $("<option value='" + key + "'>" + value + "</option>");
						if (key == selectedCategory) {
							$option.attr('selected', 'selected');
						}
						$("#brief_article_category").append($option);
					});
			}

			var showClassArray = [];
			$('.blog-show-brief, .cluster-show-brief, .pillar-show-brief, .supporting-show-brief').hide();
			$('#articlebrief-form input[type="radio"]:checked').each(function () {
				if ($(this).parents('.article-brief-article-type').css('display') == 'block') {
					var showClass = $(this).data("show-class");
					//console.log({showClass});
					showClassArray.push(showClass);
					$(showClass).show();
				}

			});
			//console.log({showClassArray});
		});
		$('#articlebrief-form input[type="radio"]:checked').trigger('click');
	});

	jQuery('#articlekeyword-form').validate({
		rules: {
			website: {
				required: true
			},
			keyword: {
				required: true
			}
		},
		ignore: ":hidden, [contenteditable='true']:not([name])",
		messages: {
			website: "Please select the website.",
			keyword: "Please enter the keyword phrase.",

		},
		submitHandler: function (form) {

			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "secure/keyword/savePrimaryKeyword",
				data: jQuery(form).serialize(),
				datatype: 'json',
				beforeSend: function (xhr) {
					jQuery(".add-keyword-phrase").addClass('data-loading').prop('disabled', true);
				},
				success: function (data) {
					if (data['is_redirect'] == 'no') {
						$newkeyword_modal.modal('hide');
						jQuery('#signupModal').modal('show');
					} else if (data['is_redirect'] == 'yes') {
						window.location = data.redirect;
					}
				}
			}).done(function () {
				jQuery(".add-keyword-phrase").removeClass('data-loading').removeAttr('disabled');
			});

		}
	});
	jQuery.validator.addMethod("primary_keyword", function (value, element) {
		var keyword = jQuery('input[name="keyword"]').val();
		console.log(element);
		var isError = true;
		var res = value.search(new RegExp(keyword, "i"));
		//alert(res);
		if (res < 0) {
			jQuery(element).parents('.input-group').find(".tooltip-hide").show();
			isError = false;
		} else {
			jQuery(element).parents('.input-group').find(".tooltip-hide").hide();


		}
		console.log({
			isError
		});
		return isError;
	}, "Primary keyword does not appear in this field.");
	jQuery('#articlebrief-form').validate({
		rules: {
			brief_article_icon: {
				required: true
			},
			brief_assigned_to: {
				required: true
			},
			brief_word_length: {
				required: true
			},
			brief_headline: {
				required: true,
				primary_keyword: true
			},
			brief_introduction: {
				required: true,
				primary_keyword: true
			},
			brief_body_outline: {
				required: true
			},
			cta_id: {
				required: true
			}
		},
		ignore: ":hidden:not(.do-not-ignore), [contenteditable='true']:not([name])",
		messages: {
			brief_article_icon: "Please select the article icon.",
			brief_word_length: "Please enter the word length."
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element.parents('.input-group'));
		},
		/*submitHandler: function (form) {

			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "secure/contentarticlesbrief/saveArticlesBrief ",
				data: jQuery(form).serialize(),
				datatype: 'json',
				beforeSend: function( xhr ) {
					jQuery(".add-master-article").addClass('data-loading').prop('disabled', true);
				},
				success: function (data) {
				if(data['is_redirect']=='no'){
					$newkeyword_modal.modal('hide');
					jQuery('#signupModal').modal('show');
				}else if(data['is_redirect']=='yes'){
					window.location = data.redirect;
				}
				}
			}).done(function(){
				//jQuery(".add-keyword-phrase").removeClass('data-loading').removeAttr('disabled');
			});

		}*/
	});


	jQuery('#article-brief-form').validate({
		rules: {
			article_brief: {
				required: true
			}
		},
		ignore: ":hidden, [contenteditable='true']:not([name])",
		messages: {
			article_brief: "Please selecte the article.",

		},
		submitHandler: function (form) {

			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "secure/contentarticlesbrief/saveMasterArticle",
				data: jQuery(form).serialize(),
				datatype: 'json',
				beforeSend: function (xhr) {
					jQuery(".add-article-brief").addClass('data-loading').prop('disabled', true);
				},
				success: function (data) {
					if (data['is_redirect'] == 'no') {
						$newarticle_modal.modal('hide');
						jQuery('#signupModal').modal('show');
					} else if (data['is_redirect'] == 'yes') {
						window.location = data.redirect;
					}
				}
			}).done(function () {
				//jQuery(".add-article-brief").removeClass('data-loading').removeAttr('disabled');
			});

		}
	});

	jQuery(document).on('blur', '.brief-score', function (event) {
		var page_content = '';
		var optimize_string = $('#highlight_keywords').val();
		jQuery('.brief-score').each(function (k, v) {
			page_content += jQuery(this).val()+ ' ';
		});
		page_content = page_content.replace(/<br>/gi, ' ');
		page_content = page_content.replace(/&nbsp;/g, ' ');
		page_content = page_content.replace(/(<p[^>]+?>|<p>|<\/p>)/img, ' ');
		page_content = page_content.replace( /(<([^>]+)>)/ig, ' ');
		page_content = page_content.replace( /[\s\n\r]+/g, ' ').trim();
		if(page_content)
		{
			var curr_request = jQuery.ajax({
				cache: true,
				url: base_url + "secure/keyword/checktopicsection",
				type: "POST",
				datatype: 'json',
				data: {
					"page_content": page_content,
					'optimize_string': optimize_string
				},
				beforeSend: function( xhr ) {
					//jQuery('.show-loading').addClass('data-loading').prop('disabled', true);
					if(curr_request != null) {
						curr_request.abort();
					}
				},			
				success: function (data) {
					jQuery('.topic-score').html(data.topic_section);
				}
			}).done(function(){
				//jQuery('.show-loading').removeClass('data-loading').removeAttr('disabled');
			});
		}
	});

	/*$(document).ready(function(){
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
				if(words.length > 4){
					$('#keyword_words_count').html("<span style='color: red;'>Max 4 words you can be use as keyword.</span>").show();
					jQuery('.add-master-article').attr('disabled', 'disabled');
				}else{
					$('#keyword_words_count').html("");
					jQuery('.add-master-article').removeAttr('disabled');
				}
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
	}*/
});