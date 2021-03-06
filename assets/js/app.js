var lang = 'en',
	safesearch = 'true',
	per_page = 15,
	inputChanged = false,
	hits, q, image_type, orientation, related_target;

	window.onbeforeunload = function (e) {
		if(inputChanged) {
			var message = "Are you sure you want leave asds?";
			e.returnValue = message;
			return false;
		}
		return;
	};
function initializeSelect2(selectElementObj) {
	selectElementObj.select2({
		width: "100%",
		minimumResultsForSearch: 'Infinity'
	}).on("change", function (e) {
		if (jQuery(this).parents('form').hasClass('form-validate')) {
			jQuery(this).valid();
		}
	});
}
function urlencode (str) {
	str = (str + '')
	return encodeURIComponent(str)
		.replace(/!/g, '%21')
		.replace(/'/g, '%27')
		.replace(/\(/g, '%28')
		.replace(/\)/g, '%29')
		.replace(/\*/g, '%2A')
		.replace(/%20/g, '+')
}
function call_px_api(q, p) {

	var sendInfo = {
		key: '10371522-23c80998167b104ec6e5393a6',
		safesearch: safesearch,
		image_type: image_type,
		orientation: orientation,
		per_page: per_page,
		page: p,
		search_term: urlencode(q)
	};
	jQuery.ajax({
		type: "GET",
		cache: true,
		url: "https://pixabay.com/api/",
		data: sendInfo,
		datatype: 'json',
		success: function (data) {
			if (data.totalHits < 1) {
				jQuery('#load_animation').remove();
				jQuery('#pixabay_results').html('<div class="mt-5 mb-5 text-center text-light h1">—— No matches were found ——</div>');
				return false;
			}
			render_px_results(q, p, data);
		}
	});
	return false;
}

function render_px_results(q, p, data) {
	hits = data['hits']; // store for upload click
	pages = Math.ceil(data.totalHits / per_page);
	var s = '';
	jQuery.each(data.hits, function (k, v) {
		s += '<div class="item upload" data-url="' + v.largeImageURL + '" data-user="' + v.user + '" data-license="' + v.pageURL + '" data-w="' + v.webformatWidth + '" data-h="' + v.webformatHeight + '">';
		s += '<img src="' + v.previewURL.replace('_150', v.previewURL.indexOf('cdn.') > -1 ? '__340' : '_340') + '">';
		s += '<div class="download">';
		s += '<img src="' + base_url + 'assets/images/download.svg">';
		s += '<div>'
		s += (v.webformatWidth * 2) + '×' + (v.webformatHeight * 2);
		s += '<br><a href="https://pixabay.com/users/' + v.user + '/" target="_blank"">' + v.user + '</a> @';
		s += '<a href="' + v.pageURL + '" target="_blank">Pixabay</a>';
		s += '</div>';
		s += '</div>';
		s += '</div>';
	});
	jQuery('#pixabay_results').html(jQuery('#pixabay_results').html() + s);
	jQuery('#load_animation').remove();
	if (p < pages) {
		jQuery('#pixabay_results').after('<div id="load_animation"><img style="width:60px" src="' + base_url + 'assets/images/loading.svg"></div>');
		$pixabayModal.on('scroll', function () {
			if (jQuery(this).scrollTop() + jQuery(this).innerHeight() >= jQuery(this)[0].scrollHeight) {
				jQuery(this).off('scroll');
				call_px_api(q, p + 1);
			}
		});
	}
	jQuery('.pixabay_results_help').show();
	jQuery('.flex-images').flexImages({
		rowHeight: 200
	});
}
function youtubeDurationToSeconds(duration) {
	var hours   = 0;
	var minutes = 0;
	var seconds = 0;

	// Remove PT from string ref: https://developers.google.com/youtube/v3/docs/videos#contentDetails.duration
	duration = duration.replace('PT','');

	// If the string contains hours parse it and remove it from our duration string
	if (duration.indexOf('H') > -1) {
		hours_split = duration.split('H');
		hours       = parseInt(hours_split[0]);
		duration    = hours_split[1];
	}

	// If the string contains minutes parse it and remove it from our duration string
	if (duration.indexOf('M') > -1) {
		minutes_split = duration.split('M');
		minutes       = parseInt(minutes_split[0]);
		duration      = minutes_split[1];
	}

	// If the string contains seconds parse it and remove it from our duration string
	if (duration.indexOf('S') > -1) {
		seconds_split = duration.split('S');
		seconds       = parseInt(seconds_split[0]);
	}

	return {
		minutes: hours * 60 + minutes,
		seconds: seconds
	}
}

jQuery.extend(jQuery.validator.messages, {
	remote: "This email was already used for signing up.",
});

jQuery.validator.setDefaults({
	errorElement: 'div',
	errorClass: 'invalid-feedback',
	rules: {},
	ignore: [],
	onkeyup: function (element) {
		//console.log({element})
		if(jQuery(element).parents('form .article-form').length > 0){
			inputChanged = true;
		}
		jQuery(element).valid();
	},
	errorPlacement: function (error, element) {
		var $this = jQuery(element),
			errorMsgClasses = $this.data('msg-classes');
		error.addClass(errorMsgClasses);
		error.appendTo(element.parents('.form-group'));
	},

	highlight: function (element) {
		var $this = jQuery(element),
			errorClass = $this.data('error-class'),
			successClass = $this.data('success-class');
		errorClass = typeof errorClass === 'undefined' ? 'is-invalid' : errorClass;
		successClass = typeof successClass === 'undefined' ? 'is-invalid' : successClass;
		$this.removeClass(successClass).addClass(errorClass);
		if ($this.hasClass('select-2')) {
			$this.next('.select2').removeClass(successClass).addClass(errorClass);
		}
	},

	unhighlight: function (element) {
		var $this = jQuery(element),
			errorClass = $this.data('error-class'),
			successClass = $this.data('success-class');
		errorClass = errorClass ? errorClass : 'is-invalid';
		successClass = successClass ? successClass : '';
		$this.removeClass(errorClass).addClass(successClass);
		if ($this.hasClass('select-2')) {
			$this.next('.select2').removeClass(errorClass).addClass(successClass);
		}

	}
});

function croppieCreate(post_image_data){
	var tabName = 'pixabay-crop-tab';
		var tab_container = '#pixabayModalTabContent';
		var navTabs = "#pixabayModalTab";
		var tabsObj = jQuery(navTabs).tabs();

		jQuery(navTabs).find("li:eq(2)").remove();
		jQuery(tab_container).find(".tab-pane:eq(2)").remove();

		var navItem = jQuery("<li />").attr({
			"class": "nav-item"
		});
		var navLink = jQuery("<a />").attr({
			"class": "nav-link",
			"href": "#" + tabName,
			"data-toggle": "tab",
			"role": "tab",
			"aria-controls": tabName,
			"aria-selected": "false"
		}).append(jQuery('<h4 />').attr({
			"class": "modal-title"
		}).html('Crop Image'));

		var image_croppie = jQuery('<div />').attr({
			"id" : "image_croppie_demo"
		}).croppie({
			enableExif: true,
			viewport: {
				width: 580,
				height: 385
			},
			boundary: {
				width: '100%',
				height: 400
			}
		});

		navItem.html(navLink).appendTo(navTabs);

		var tabPane = jQuery("<div />").attr({
			"class": "tab-pane fade",
			"id": tabName,
			"role": "tabpanel",
			"aria-labelledby": tabName,
		}).html(image_croppie);

		if(post_image_data.pixabay_upload == 0){
			var form_str = '';
			form_str += '<div class="row"> <div class="col-md-6">';
			form_str += '<input name="image_attribution" type="text" class="image_attribution form-control" required placeholder="Enter image attribution"></div>';
			form_str += '<div class="col-md-6"><input name="image_license" type="text" class="image_license form-control" required placeholder="Enter image license"></div>';
			form_str += '</div>';
			form_str += '<div class="form-group mt-1"><div class="custom-control custom-checkbox align-items-center">';
			form_str += '<input class="custom-control-input" name="agree_image_rights" type="checkbox" id="agree_image_rights" required>';
			form_str += '<label class="custom-control-label text-body" for="agree_image_rights">';
			form_str += 'By uploading your ("Image"), you warrant and represent that you own all of the rights to your image and you grant all such rights to R Media, LLC subject to the Creative Commons CC0 license';
			form_str += '</label>';
			form_str += '</div></div>';
			var corp_form = jQuery("<form />").html(form_str);
			corp_form.validate({
				errorPlacement: function (error, element) {
					error.appendTo(element.parents('.custom-control'));
				},
				image_attribution: "required",
				image_license: "required",
				agree_image_rights: "required",
				messages: {
					agree_image_rights: "You must agree before uploading your Image.",
				}
			});
			corp_form.appendTo(tabPane);
		}

		var cropImageButton = jQuery('<button type="button" />')
			.addClass("btn btn-primary")
			.click(function () {
				if(post_image_data.pixabay_upload == 0){
					var formvalid  = corp_form.valid();
					if(formvalid){
						post_image_data.image_attribution = jQuery(corp_form).find('.image_attribution').val();
					//	alert(post_image_data.image_attribution);
					}
					if(formvalid){
						post_image_data.image_license = jQuery(corp_form).find('.image_license').val();
					//	alert(post_image_data.image_license);
					}
					//alert(formvalid);
					if(!formvalid){
						return false;
					}
				}
				image_croppie.croppie('result', {
					type: 'canvas',
					size: {
						width: 1280,
						height: 854
					}
				}).then(function (response) {
					jQuery(related_target).addClass('embed-responsive-16by9');
					jQuery(related_target).find('.section_video').val('');
					jQuery(related_target).find('.youtubevideo').text('');
					jQuery(related_target).css("background-image", "url(" + response + ")");
					jQuery(related_target).find('.holder-icon').removeClass('uploading');
					jQuery(related_target).find('.upload_image_base64').val(response);
					jQuery(related_target).find('.hero_image').val(1);
					jQuery('#hero_image-error').remove();
					jQuery(related_target).find('.image_attribution').val(post_image_data.image_attribution);
					jQuery(related_target).find('.image_license').val(post_image_data.image_license);
					jQuery(related_target).next('.delete_image').fadeIn();
					jQuery(related_target).next('.delete-image-container').find('.delete_image').fadeIn();
					jQuery(related_target).parents('.form-group').nextAll('.section-video-found').hide();
					jQuery(related_target).parents('.form-group').nextAll('.section-image-found').show();
					jQuery(related_target).parents('.form-group').nextAll('.section-image-found').find('.article_image_alt').removeAttr("disabled");
					jQuery(related_target).parents('.form-group').nextAll('.form-group').find('.article_image_alt').removeAttr("disabled");
					$pixabayModal.modal('hide');
				})
			}).html('Crop & Use Image');

		var cropImageButtonContainer = jQuery("<div />").attr({
			"class": "text-center mt-1"
		}).html(cropImageButton);

		cropImageButtonContainer.appendTo(tabPane);
		tabPane.appendTo(tab_container);
		tabsObj.tabs("refresh");
		jQuery(navTabs + ' a[href="#' + tabName + '"]').tab('show');

		setTimeout(function(){
			image_croppie.croppie('bind', {
				url: post_image_data.image_url
			}).then(function () {
				jQuery('#pixabay_results .item.upload').removeClass('uploading').find('.download img').replaceWith('<img src="' + base_url + 'assets/images/download.svg">');
			});
		}, post_image_data.time_out);
}

jQuery(document).ready(function () {
	jQuery(document).on('click', '#article-form button[type="submit"]', function (event) {
		var inputval = $(this).val();
		jQuery('#form_action').val(inputval)
	});

	jQuery("#navbar-sticky").sticky({
		topSpacing: 0
	});

	jQuery("body").tooltip({
		selector: '[data-toggle="tooltip"]'
	});
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	jQuery('#publishdate').datepicker({
		startDate: "2015-01-01",
		endDate: end,
		autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
	});

	jQuery('#campaign_startdate').datepicker({
		startDate: "2015-01-01",
		autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
		orientation: 'bottom',
		numberOfMonths: 1,
        onSelect: function(selected) {
          $("#campaign_enddate").datepicker("option","minDate", selected)
        }
	});
	jQuery('#campaign_startdate').change(function() {
		var date2 = $('#campaign_startdate').datepicker('getDate', '+1d'); 
		date2.setDate(date2.getDate()+14); 
		$('#campaign_enddate').datepicker('setDate', date2);
	  });
	jQuery('#from_date').datepicker({
		startDate: "2015-01-01",
		autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
		orientation: 'bottom',
		numberOfMonths: 1,
	});
	jQuery('#to_date').datepicker({
		startDate: "2015-01-01",
		autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
		orientation: 'bottom',
		numberOfMonths: 1,
	});

	jQuery('#campaign_enddate').datepicker({
		startDate: "2015-01-01",
		autoclose: true,
		todayHighlight: true,
		allowInputToggle: true,
		orientation: 'bottom',
		onSelect: function(selected) {
			$("#campaign_startdate").datepicker("option","maxDate", selected)
		}
	});

	var editor_selector = ".init-editor",
		trumbowyg = false,
		trumbowygObj = {};
	if (jQuery(editor_selector).length > 0) {
		trumbowyg = true;
		trumbowygObj = {
			autogrow: true,
			minimalLinks: true,
			btns: [
				['viewHTML'],
				['checkspelling'],
				['undo', 'redo'], // Only supported in Blink browsers
			//	['h1', 'h2', 'h3', 'h4'],
				['strong', 'em'],
				['link'],
				['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
				['unorderedList', 'orderedList'],
				['removeformat'],
				['fullscreen'],
				['skyscraper'],
				['table']
			],
			plugins: {
				table: {
					styler : 'table table-bordered'
				},
				skyscraper: {
					article_id: jQuery("#article_id").val(),
					article_type: jQuery("#articletype").val(),
					article_lang: jQuery("#language_id").val()

				},
				allowTagsFromPaste: {
					allowedTags: ['a']
				}
			}
		}
	}

	var link_editor_selector = ".init-link-editor",
		link_trumbowyg = false,
		link_trumbowygObj = {};
	if (jQuery(link_editor_selector).length > 0) {
		link_trumbowyg = true;
		link_trumbowygObj = {
			autogrow: true,
			minimalLinks: true,
			btns: [
				['viewHTML'],
				['checkspelling'],
				['undo', 'redo'], // Only supported in Blink browsers
			//	['h1', 'h2', 'h3', 'h4'],
				['strong', 'em'],
				['link'],
				['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
				['unorderedList', 'orderedList'],
				['removeformat'],
				['fullscreen'],
				['skyscraper'],
				['table']
			],
			plugins: {
				table: {
					styler : 'table table-bordered'
				},
				skyscraper: {
					article_id: jQuery("#article_id").val(),
					article_type: jQuery("#articletype").val(),
					article_lang: jQuery("#language_id").val()

				},
				allowTagsFromPaste: {
					allowedTags: ['a']
				}
			}
		}
	}

	if (jQuery('.repeater').length < 1 && jQuery('.select-2').length > 0) {
		jQuery(".select-2").each(function () {
			initializeSelect2(jQuery(this));
		});
	}

	var $sortableConfig = {
		handle: ".drag-handle",
		placeholder: "ui-state-highlight",
		forceHelperSize: true,
		scroll: false,
		cursor: "move",
		tolerance: 'pointer',
		start: function (e, ui) {
			ui.placeholder.height(ui.item.height());
		}
	};
	jQuery(".sortable").sortable($sortableConfig);

	jQuery('.repeater').repeater({
		repeaters: [{
			selector: '.inner-repeater',
			show: function () {
				//alert('inner');
				var $r_container = jQuery(this);
				var delete_c = '<a href="javascript:void(0);" data-repeater-delete class="deleteCallout"><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Callout"></i></a>';
				$r_container.find('.delete-callout-container').html(delete_c);
				
				jQuery(this).slideDown();
				jQuery(this).find('textarea.autoExpand').autoResize({
					extraSpace: 30,
				});
			},
			hide: function (remove) {
				/*if (confirm('Are you sure you want to remove this item?')) {
					jQuery(this).slideUp(remove);
				}*/
			}
		}],
		show: function () {
			//alert('outer');
			var $container = jQuery(this);
			$container.find(".section_title").attr("check_keyword_paragraph","true");
			$container.find(".section_image_alt").attr("check_keyword_paragraph","true");
			$container.find("textarea").attr("check_seo_rules","true");
			$container.find('.select2').remove();
			$container.find('.holder-style').removeClass('embed-responsive-16by9').addClass('holder-active').css('background-image', '');
			
			$container.find('.holder-icon').addClass('uploading');
			$container.find('.youtubevideo').html('');
			$container.find('.delete_image').hide();
			$container.find('.inner-repeater').removeClass('show');
			$container.find('.social-media-callouts-collapse-0').removeClass('show');
			$container.find('.image-video-collapse').removeClass('show');
			var delete_p = '<a href="javascript:void(0);" data-repeater-delete class="deleteParagraph" ><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Paragraph"></i></a>';
			$container.find('.delete-paragraph-container').html(delete_p);
			var delete_i_v = '<a href="javascript:void(0);"  class= "fas fa-trash-alt holder-style-edit delete_image text-danger" data-toggle="tooltip" data-placement="top" title="Remove Multimedia" ></a>';
			$container.find('.delete-image-container').html(delete_i_v);
			var delete_c_o = '<a href="javascript:void(0);" data-repeater-delete  class="deleteCallout"><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Callout"></i></a>';
			$container.find('.delete-callout-container').html(delete_c_o);

			var delete_sm_c_o = '<a href="javascript:void(0);" class="deleteSocialMediaCallout delete-social-media-callout"><i class="fas fa-trash-alt text-danger" data-toggle="tooltip" data-placement="top" data-original-title="Remove Callout"></i></a>';
			$container.find('.delete-social-media-callout-container').html(delete_sm_c_o);
		
			
			$container.slideDown(function () {
				$container.find(".select-2").each(function () {
					initializeSelect2(jQuery(this));
					//alert('select-2');
					jQuery(this).val("h2").trigger("change"); 
				});
				if (trumbowyg) {
					$container.find(editor_selector).trumbowyg(trumbowygObj).on('tbwchange', function(){
						console.log('change!');
					}).on('tbwfocus', function(){ /*console.log('Focus!');*/ }).on('tbwblur', function(){ /*console.log('Blur!');*/ }).on('tbwinit', function(){
						jQuery(".trumbowyg-editor").each(function(n, element){
							jQuery(element).attr("id", "trumbowyg-editor-" + n);
							jQuery(element).addClass("calc-length-editor");
						});
					});
				}
				if(link_trumbowyg)
				{
					$container.find(link_editor_selector).trumbowyg(link_trumbowygObj).on('tbwchange', function(){
						console.log('change!');
					}).on('tbwfocus', function(){ /*console.log('Focus!');*/ }).on('tbwblur', function(){ /*console.log('Blur!');*/ }).on('tbwinit', function(){
						jQuery(".trumbowyg-editor").each(function(n, element){
							jQuery(element).attr("id", "trumbowyg-editor-" + n);
							jQuery(element).addClass("calc-length-editor");
						});
					});
				}
			});
			//initializeSelect2($container.find('.select-2'));

		},
		hide: function (deleteElement) {
			if(confirm('Are you sure you want to delete this element?')) {
				$(this).slideUp(deleteElement);
			}
		},
		ready: function () {
			if (trumbowyg) {
				jQuery(editor_selector).trumbowyg(trumbowygObj).on('tbwchange', function(){
					
				}).on('tbwfocus', function(){ /*console.log('Focus!');*/ }).on('tbwblur', function(){ 
					var keywords_str = jQuery("#highlight_keywords").val();
					keywords_str = JSON.parse(keywords_str);
					var already_use = keywords_str.already_use;
					var more_often = keywords_str.more_often;
					var should_use = keywords_str.should_use;
					var stuffing = keywords_str.stuffing;
					var questions = keywords_str.questions;
					//console.log({should_use});
					var keywords_already_use =[];
					jQuery('.trumbowyg-editor').unmark({
						"element": "span"
						});
					jQuery.each(already_use, function( index, value ) {
						keywords_already_use.push(value.keyword);
					});
					//console.log({keywords_already_use});
					
					jQuery(".trumbowyg-editor").mark(keywords_already_use, {
					"separateWordSearch": false,
					"accuracy": "exactly",
					"element": "span",
					"className": "mark already"
					}); 
					var keywords_should_use =[];
					jQuery.each(should_use, function( index, value ) {
						keywords_should_use.push(value.keyword);
					});
					//console.log({keywords_should_use});
					jQuery(".trumbowyg-editor").mark(keywords_should_use, {
					"separateWordSearch": false,
					"accuracy": "exactly",
					"element": "span",
					"className": "mark should"
					});
					var keywords_more_often =[];
					jQuery.each(more_often, function( index, value ) {
						keywords_more_often.push(value.keyword);
					});
					//console.log({keywords_more_often});
					jQuery(".trumbowyg-editor").mark(keywords_more_often, {
					"separateWordSearch": false,
					"accuracy": "exactly",
					"element": "span",
					"className": "mark often"
					});

					var keywords_stuffing =[];
					jQuery.each(stuffing, function( index, value ) {
						keywords_stuffing.push(value.keyword);
					});
					//console.log({keywords_stuffing});
					jQuery(".trumbowyg-editor").mark(keywords_stuffing, {
					"separateWordSearch": false,
					"accuracy": "exactly",
					"element": "span",
					"className": "mark stuffing"
					});
					
					/*console.log('Blur!');*/ }).on('tbwinit', function(){
					jQuery(".trumbowyg-editor").each(function(n, element){
						jQuery(element).attr("id", "trumbowyg-editor-" + n);
					});
				});
			}
			if (link_trumbowyg) {
				jQuery(link_editor_selector).trumbowyg(link_trumbowygObj).on('tbwchange', function(){
					
				}).on('tbwfocus', function(){ /*console.log('Focus!');*/ }).on('tbwblur', function(){ 
					var page_content = '';
					jQuery('.seo-content-keywords').each(function (k, v) {
						page_content += jQuery(this).val()+ ' ';
					});
					jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
						page_content += jQuery(this).html();
					});
					page_content = page_content.replace(/<br>/gi, ' ');
					page_content = page_content.replace(/&nbsp;/g, ' ');
					page_content = page_content.replace(/(<p[^>]+?>|<p>|<\/p>)/img, ' ');
					page_content = page_content.replace( /(<([^>]+)>)/ig, ' ');
					page_content = page_content.replace( /[\s\n\r]+/g, ' ').trim();
					jQuery(".backlinks-not-used span").each(function (k, v) {
						var anchor = jQuery(this).data('anchor');
						var text = jQuery(this).data('text');
						var url = jQuery(this).data('url');
						if(page_content.search(anchor) >= 0)
						{
							var used = jQuery(this).html();
							var u_used_div = '<div class="kw-group-item  align-items-center backlinks-used"><span class="copy-clipboard" data-anchor="'+anchor+'" data-text="'+text+'" data-url="'+url+'">';
							u_used_div += used + '</span></div>';
							$('.used-items').append(u_used_div);
							$(this).closest('.backlinks-not-used').remove();
						}
					});
					jQuery(".backlinks-used span").each(function (k, v) {
						var anchor_s = jQuery(this).data('anchor');
						var text_s = jQuery(this).data('text');
						var url_s = jQuery(this).data('url');
						if(page_content.search(anchor_s) == -1)
						{
							var not_used = jQuery(this).html();
							var n_used_div = '<div class="kw-group-item  align-items-center backlinks-not-used"><span class="copy-clipboard" data-anchor="'+anchor_s+'" data-text="'+text_s+'" data-url="'+url_s+'">';
							n_used_div += not_used + '</span></div>';
							$('.not-used-items').append(n_used_div);
							$(this).closest('.backlinks-used').remove();
						}
					});
					var read_score = readability_score(page_content);
					$('.backlinks-used-count').text($('.backlinks-used').length);
					$('.word-on-page').text(page_content.split(" ").length);
					$('.read-score').text(read_score.automatedReadabilityIndex);
					
				});
			}
			jQuery(".select-2").each(function () {
				initializeSelect2(jQuery(this));
			});
		}
	});

	/*jQuery('.repeater-social-media-section').each(function () { 
		var $container = jQuery(this);
		jQuery(this).repeater({
			defaultValues: {
				'channel': function (){
					return $container.find('.social_channel').val();
				},
				'message_id': function (){
					var msg_id_array = [];
					$container.find('.social-media-repeater-item').each(function () {
						var msg_number  = jQuery(this).find('.message_id').val();
						msg_id_array.push(msg_number);
					});
					console.log({msg_id_array});
					var max_msg_number = Math.max.apply(null, msg_id_array)
					console.log({max_msg_number});				
					return max_msg_number + 1;
				}
			},
			show: function () {
				var $container = jQuery(this);
				$container.find('.holder-style').addClass('holder-active').css('background-image', '');
				$container.find('.holder-icon').addClass('uploading');
				$container.find('.youtubevideo').html('');
				$container.find('.delete_image').hide();
				$container.find('.deleteSocialmedia').hide();
				$container.slideDown();
			}
		});
	});	*/

	jQuery('.repeater-social-media-section').each(function () { 
		var $container = jQuery(this);
		console.log($container);
		$container.repeater({
			defaultValues: {
				'msg_channel': function (){
					return $container.find('.msg_channel').val();
				},
				'msg_sequence': function (){
					var msg_id_array = [];
					$container.find('.social-media-repeater-item').each(function () {
						var msg_number  = jQuery(this).find('.msg_sequence').val();
						msg_id_array.push(msg_number);
					});
					console.log({msg_id_array});
					var max_msg_number = Math.max.apply(null, msg_id_array)
					console.log({max_msg_number});				
					return max_msg_number + 1;
				}
			},
			show: function () {
				var $container = jQuery(this);
				$container.find('.holder-style').addClass('holder-active').css('background-image', '');
				$container.find('.holder-icon').addClass('uploading');
				$container.find('.youtubevideo').html('');
				$container.find('.delete_image').hide();
				$container.find('.deleteSocialmedia').hide();
				$container.slideDown();
			}
		});
	});	
		

	jQuery("textarea.autoExpand").each(function () {
		jQuery(this).autoResize({
			extraSpace: 30,
		});
		jQuery(this).keyup();
	});

	$pixabayModal = jQuery('#pixabayModal');
	$pixabayModal.on('show.bs.modal', function (event) {
		related_target = event.relatedTarget;
		var $videotab = jQuery(this).find('.youtube-video-tab');
		if (jQuery(related_target).hasClass('remove-youtube-tab')) {
			$pixabayModal.find('.nav-tabs a:first').tab('show');
			$videotab.hide('fast');
		} else {
			$videotab.show('fast');
			$pixabayModal.find('.nav-tabs a:first').tab('show');
		}
	});

	var pixabay_form = jQuery('#pixabay_images_form');

	pixabay_form.submit(function (e) {
		e.preventDefault();
		q = jQuery('#pixabay_query', pixabay_form).val();
		if (jQuery('#filter_photos', pixabay_form).is(':checked') && !jQuery('#filter_cliparts', pixabay_form).is(':checked'))
			image_type = 'photo';
		else if (!jQuery('#filter_photos', pixabay_form).is(':checked') && jQuery('#filter_cliparts', pixabay_form).is(':checked'))
			image_type = 'clipart';
		else
			image_type = 'all';

		if (jQuery('#filter_horizontal', pixabay_form).is(':checked') && !jQuery('#filter_vertical', pixabay_form).is(':checked'))
			orientation = 'horizontal';
		else if (!jQuery('#filter_horizontal', pixabay_form).is(':checked') && jQuery('#filter_vertical', pixabay_form).is(':checked'))
			orientation = 'vertical';
		else
			orientation = 'all';
		jQuery('.pixabay_results_help').hide();
		jQuery('#pixabay_results').html('');
		call_px_api(q, 1);
	});
	jQuery('#customFileUpload').on('change', function (event) {
		event.preventDefault();
		var input = this;
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
			setFlashes("error", "This is not an allowed file type.<br>Only jpeg, jpg, png formats are allowed.");
			return false;
		}
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (event) {
				post_image_data = {
					pixabay_upload: 0,
					time_out: 700,
					image_url: event.target.result,
					image_license: 'Creative Commons Zero'
				};
				croppieCreate(post_image_data);
			}
			reader.onerror = function(event) {
				setFlashes("error", event.target.error.code);
			};
			reader.readAsDataURL(input.files[0]);
			jQuery(input).val('');
		}
		else {
			setFlashes("error", "Sorry - you're browser doesn't support the FileReader API");
		}

	});
	jQuery(document).on('click', '#pixabay_results .upload', function (e) {
		if (jQuery(e.target).is('a')) return;

		jQuery(document).off('click', '.upload');
		var upload_obj = jQuery(this);
		var timestamp = new Date().getTime().toString().substring(0, 10);
		post_image_data = {
			pixabay_upload: 1,
			time_out: 1,
			image_url: upload_obj.data('url') + '?t=' + timestamp,
			image_attribution: upload_obj.data('license'),
			image_license: 'Creative Commons Zero'
		};
		upload_obj.addClass('uploading').find('.download img').replaceWith('<img src="' + base_url + 'assets/images/loading.svg">');
		croppieCreate(post_image_data);
		return false;
	});

	jQuery('#video_url_form').validate({
		rules: {
			video_url: {
				required: true,
				minlength: 3,
			},
		},
		submitHandler: function (form) {
			var url = jQuery(form).find('input[name="video_url"]').val(),
				embed_path;
			var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
			var match = url.match(regExp);
			if (match && match[2].length == 11) {
				embed_path = match[2];
			} else {
				embed_path = url;
				
			}
			//alert(embed_path);
				var url = 'https://www.googleapis.com/youtube/v3/videos?key=AIzaSyAcVyt5DxKC53Wp0NhMLnz0O7my1xMJ64I&part=snippet,contentDetails,statistics,status,player&id='+ embed_path;
				//alert(url);
				$.getJSON(url,
				function(response){
					console.log({response});
					if(response.items.length > 0){
						var video_containor = jQuery(related_target).parents('.form-group').nextAll('.section-video-found');
						video_containor.find('.article_meta_video_name').val(response.items[0].snippet.title);
						video_containor.find('.article_meta_video_description').val( response.items[0].snippet.description);
						video_containor.find('.article_meta_video_url').val("https://youtu.be/"+ embed_path);
						video_containor.find('.article_meta_video_thumbnail_1x1').val(response.items[0].snippet.thumbnails.default.url);
						video_containor.find('.article_meta_video_thumbnail_4x3').val(response.items[0].snippet.thumbnails.medium.url);
						video_containor.find('.article_meta_video_thumbnail_16x9').val(response.items[0].snippet.thumbnails.standard.url);
						var publishedAtDate = 	response.items[0].snippet.publishedAt;
						var MyDate = new Date(Date.parse(	publishedAtDate.replace(/ *\(.*\)/,"")));
						var date_Str = MyDate.getMonth() +  1  + "-" + MyDate.getDate() + "-" +  MyDate.getFullYear();
							video_containor.find('.article_meta_video_uploaddate').val(date_Str);
						var duration = youtubeDurationToSeconds(response.items[0].contentDetails.duration);
						video_containor.find('.article_meta_video_minutes').val(duration.minutes);
						video_containor.find('.article_meta_video_seconds').val(duration.seconds);
						video_containor.find('.article_meta_video_interaction_count').val(response.items[0].statistics.viewCount);
						//video_containor.find('.article_meta_video_expires').val(response.items[0].snippet.title);
						jQuery(related_target).addClass('embed-responsive-16by9');
						jQuery(related_target).css("background-image", "");
						jQuery(related_target).find('.holder-icon').removeClass('uploading');
						jQuery(related_target).find('.upload_image_base64').val('');
						jQuery(related_target).find('.hero_image').val('');
						jQuery(related_target).find('.image_attribution').val('');
						jQuery(related_target).find('.section_video').val(embed_path);
						jQuery(related_target).next('.delete_image').fadeIn();
						jQuery(related_target).next('.delete-image-container').find('.delete_image').fadeIn();
						//jQuery(related_target).parents('.form-group').nextAll('.section-video-found').slideDown();
						jQuery(related_target).parents('.form-group').nextAll('.section-image-found').slideUp();
						$pixabayModal.modal('hide');
						//video_containor.slideDown();
						jQuery(related_target).find('.youtubevideo').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + embed_path + '" frameborder="0" allowfullscreen></iframe>');
					}else{
						setFlashes('error', 'Video unavailable. Please enter valid Youtube Video Id or URL');
					}
				});
			
			
		}
	});
	

	jQuery(document).on('click', ".delete_image", function (event) {
		event.preventDefault();
		var $container = jQuery(this).parents('.p-container');
		var image_path = $container.find('.upload_image_base64').val();
		$(this).removeClass("article_image");
		var action = jQuery(this).data('action');
		if(action){
			jQuery.ajax({
				url: base_url + "upload/delete",
				type: "POST",
				data: {
					"action": action,
					'image': image_path
				},
				success: function (response) {
					p_delete_image($container);
					setFlashes(response.flashes.type, response.flashes.message);	
				}
			});
		}else{

			p_delete_image($container);
		}

		jQuery(this).fadeOut();
		if(jQuery(this).hasClass('is_article_image')){

			$('.hero_image').val();
			/*jQuery('.delete_image.article_image').each(function(){
				$(this).trigger('click');
				
			});*/
			
		}
	});

	jQuery(document).on('keyup', '.calc-length', function () {
		var length = jQuery(this).val().length;
			maxLength = jQuery(this).attr("maxlength");
		var length = maxLength - length;
		var obj = jQuery(this).parents('.form-group').find('.char-remain');
		if (length > 0)
			obj.html('<span class="text-success">' + length + '</span>');
		else
			obj.html('<span class="text-danger">' + length + '</span>');
	});
	jQuery('.calc-length').each(function () {
		jQuery(this).trigger('keyup');
	});
	jQuery(".trumbowyg-editor").addClass("calc-length-editor");
	jQuery(document).on('keyup', '.calc-length-editor', function () {
		jQuery(".inner-repeater").find('.trumbowyg-editor').removeClass("calc-length-editor");
		var length = jQuery(this).text().length;
		var clength = length;
			maxLength = 3000;
		var length = maxLength - length;
		var obj = jQuery(this).parents('.form-group').find('.char-remain');
		
		if (length > 0){
			obj.html('<span class="text-success">' + length + '</span>');
		}else{
			obj.html('<span class="text-danger">' + length + '</span>');
			
		}
		
		if(clength >10){
			jQuery(this).parents('.repeat-paragraph').find('.add-callout').removeClass("initial-callout-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-social-media-callout').removeClass("initial-callout-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-image-video').removeClass("initial-image-video-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-ingredient').removeClass("initial-ingredient-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-steps').removeClass("initial-steps-hide");
		}else{
			jQuery(this).parents('.repeat-paragraph').find('.add-callout').addClass("initial-callout-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-social-media-callout').addClass("initial-callout-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-image-video').addClass("initial-image-video-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-ingredient').addClass("initial-ingredient-hide");
			jQuery(this).parents('.repeat-paragraph').find('.add-steps').addClass("initial-steps-hide");	
		}
	});
	jQuery('.calc-length-editor').each(function () {
		jQuery(this).trigger('keyup');
	});

	var $loginModal = jQuery('#loginModal'),
		$forgotModal = jQuery('#forgotPassword'),
		$signupModal = jQuery('#signupModal');

	$signupModal.on('show.bs.modal', function () {
		$loginModal.modal('hide');
		$forgotModal.modal('hide');
	});

	$loginModal.on('show.bs.modal', function () {
		$signupModal.modal('hide');
		$forgotModal.modal('hide');
	});

	$forgotModal.on('show.bs.modal', function () {
		$signupModal.modal('hide');
		$loginModal.modal('hide');
	});

	jQuery('.login-form').validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: {
				required: true
			},
			messages: {
				email: "Please enter a valid email address"
			}
		},
		submitHandler: function (form) {
			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "user/login",
				data: jQuery(form).serialize(),
				datatype: 'json',
				success: function (data) {
					var dataObj = jQuery.parseJSON(data)
					if (dataObj.status == true) {
						if (($loginModal.data('bs.modal') || {})._isShown) {
							jQuery('#article-form').submit();
						} else {
							window.location = dataObj.redirect;
						}
					} else {
						jQuery('.alert-login-error').fadeIn();
					}
				}
			});
		}
	});
	/*jQuery('#signup-form').validate({
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true,
				//remote: base_url + "user/isUniqueEmail",
			},
			messages: {
				email: {
					required: "This field is required",
					email: "Please enter a valid email address",
					//	remote: "This email was already used for signing up."
				}
			}
		},
		submitHandler: function (form) {
			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "user/register",
				data: jQuery(form).serialize(),
				datatype: 'json',
				success: function (data) {
					var dataObj = data
					console.log(dataObj);
					if (dataObj.status == true) {
						//alert(dataObj.status);
						$signupModal.modal('hide');
						jQuery('#article-form').submit();
						jQuery('#article-form').find("button[type='submit']").attr('disabled', 'disabled');
					} else {

					}
				}
			});
		}
	});*/

	jQuery('#signup-form').validate({
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true,
				//remote: base_url + "user/isUniqueEmail",
			},
			messages: {
				email: {
					required: "This field is required",
					email: "Please enter a valid email address",
					//	remote: "This email was already used for signing up."
				}
			}
		},
		submitHandler: function (form) {
			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "articlemaster/register",
				data: jQuery('#signup-form, #articlemaster-form, #articlecontributor-form').serialize(),
				datatype: 'json',
				success: function (data) {
					var dataObj = data
					console.log(dataObj);
					if (dataObj.status == true) {
						console.log(dataObj);
						window.location = dataObj.redirect;	
					} 
				}
			});
		}
	});

	jQuery('#forgot-form').validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			messages: {
				email: "Please enter a valid email address"
			}
		},
		submitHandler: function (form) {
			jQuery('#forget_form_error').html();
			jQuery.ajax({
				type: "POST",
				cache: false,
				url: base_url + "user/forgot",
				data: jQuery(form).serialize(),
				datatype: 'json',
				success: function (data) {
					var dataObj = data
					console.log(dataObj);
					jQuery('#forget_form_error').html(dataObj.message)
					if (dataObj.status == true) {
						//window.location = dataObj.redirect;
					} else {

					}
				}
			});
		}
	});
	function findWords(string, words) {
		var isValid = false;
		string = string.toLowerCase().trim();
		for (let index = 0; index < words.length; index++) {
			const keyword = (words[index]).toLowerCase().trim();
			if ((string.split(keyword).length - 1) > 0) {
				isValid = true;
				console.log({
					found_keyword: keyword
				});
				break;
			}
		}
		return isValid;
	}
	
	jQuery.validator.addMethod("check_keyword", function (value, element, param) {
		var paramobj=JSON.parse(param);
		console.log(paramobj);
		console.log({element});
		var tooltipTitle;
		var errorTitle;
		var keyword = jQuery('input[name="keyword"]').val();
		var currEleObject = jQuery(element);
		var inputGroupObj = $(element).parents('.input-group')
		var isValid = true;
		var res = value.search(new RegExp(keyword, "i"));
		inputGroupObj.find(".tooltip-hide").hide();
		
		var ruleObj = paramobj.rule;
		if(typeof ruleObj != 'undefined'){
			console.log('ruleObj.indexOf("primary_keyword")='+ruleObj.indexOf("primary"));
			if(ruleObj.indexOf("primary") > -1){

				if (res < 0) {
					errorTitle = 'Primary keyword does not appear in this field.';
					tooltipTitle = '<small class="d-block">' + errorTitle + '</small>';
					inputGroupObj.find(".tooltip-hide.text-danger i").attr('data-original-title', tooltipTitle).tooltip('update');
					inputGroupObj.find(".tooltip-hide.text-danger").show();
					isValid = false;
					
				}
				

			}
		}else{
			var keywords = [];
			jQuery(".content-o-sidebar .border-success .kw-group-item, .content-o-sidebar .border-primary .kw-group-item").each(function () {
				keyword = $(this).text().toLowerCase().trim();
				keywords.push(keyword);
			});
			console.log({
				keywords
			});
			var isKeywordsFound = findWords(value, keywords);

			console.log({
				isKeywordsFound
			});
			if (!isKeywordsFound) {
				errorTitle = 'A keyword does not appear in this field.';
				tooltipTitle = '<small class="d-block">' + errorTitle + '</small>';
				inputGroupObj.find(".tooltip-hide.text-danger i").attr('data-original-title', tooltipTitle).tooltip('update');
				inputGroupObj.find(".tooltip-hide.text-danger").show();
				isValid = false;
			}
		}
		
		currEleObject.parent('.trumbowyg-box').removeClass("form-control-invalid");
		if (!isValid) {
			currEleObject.parent('.trumbowyg-box').addClass("form-control-invalid");
		}
		$.validator.messages["check_keyword"] = errorTitle;
		return isValid;
	}, "Primary keyword does not appear in this field.");

	jQuery.validator.addMethod("check_keyword_paragraph", function (value, element, param) {
		var para_paramobj=JSON.parse(param);
		console.log(para_paramobj);
		console.log({element});
		var tooltipTitle;
		var errorTitle;
		var keyword = jQuery('input[name="keyword"]').val();
		var currEleObject = jQuery(element);
		var inputGroupObj = $(element).parents('.input-group')
		var heading_type = $(element).parents('.form-group').find('.section_heading_type').val();
		console.log({heading_type});
		var isValid = true;
		var res = value.search(new RegExp(keyword, "i"));
		inputGroupObj.find(".tooltip-hide").hide();
		var pkeyword = keyword;
		
		var para_ruleObj = para_paramobj.rule;
		if(heading_type=='h2'){
			if(typeof para_ruleObj != 'undefined'){
				console.log('para_ruleObj.indexOf("primary_keyword")='+para_ruleObj.indexOf("primary"));
				if(para_ruleObj.indexOf("primary") > -1){
	
					if (res < 0) {
						errorTitle = 'Primary keyword does not appear in this field.';
						tooltipTitle = '<small class="d-block">' + errorTitle + '</small>';
						inputGroupObj.find(".tooltip-hide.text-danger i").attr('data-original-title', tooltipTitle).tooltip('update');
						inputGroupObj.find(".tooltip-hide.text-danger").show();
						isValid = false;
						
					}
					
	
				}
			}else{
				var keywords = [];
				jQuery(".content-o-sidebar .border-success .kw-group-item, .content-o-sidebar .border-primary .kw-group-item").each(function () {
					keyword = $(this).text().toLowerCase().trim();
					keywords.push(keyword);
				});
				keywords.push(pkeyword);
				console.log({
					pkeyword
				});
				console.log({
					keywords
				});
				var isKeywordsFound = findWords(value, keywords);
	
				console.log({
					isKeywordsFound
				});
				if (!isKeywordsFound) {
					errorTitle = 'A keyword does not appear in this field.';
					tooltipTitle = '<small class="d-block">' + errorTitle + '</small>';
					inputGroupObj.find(".tooltip-hide.text-danger i").attr('data-original-title', tooltipTitle).tooltip('update');
					inputGroupObj.find(".tooltip-hide.text-danger").show();
					isValid = false;
				}
			}
		}
		
		
		currEleObject.parent('.trumbowyg-box').removeClass("form-control-invalid");
		if (!isValid) {
			currEleObject.parent('.trumbowyg-box').addClass("form-control-invalid");
		}
		$.validator.messages["check_keyword_paragraph"] = errorTitle;
		return isValid;
	}, "Primary keyword does not appear in this field.");


	var warningArray = [],
		fatalArray = [];
	jQuery.validator.addMethod("check_seo_rules", function (value, element, param) {
		var paramobj=JSON.parse(param);
		console.log(paramobj);
		var hostWebsite = jQuery("#article_website_id").val(),
			warningErrorMsg = '',
			fatalErrorMsg = '',
			currEleObject = jQuery(element),
			inputGroupObj = $(element).parents('.input-group'),
			trumbObj = inputGroupObj.find('.trumbowyg-editor'),
			trumbContent = trumbObj.html(),
			trumbowygId = trumbObj.attr('id'),
			isValid = true,
			tooltipWarnTitle = [],
			tooltipStopTitle = [],
			i = 0;

		if (typeof trumbowygId == 'undefined') {
			return isValid;
		}
		trumbowygId = trumbowygId.replaceAll('trumbowyg-editor-', '');
		trumbowygId = parseInt(trumbowygId);

		warningArray[trumbowygId] = [];
		fatalArray[trumbowygId] = [];
		
		var ruleObj = paramobj.rule;
		
		if(typeof ruleObj != 'undefined'){
			if(ruleObj.indexOf("keywords")){
				var keyword = jQuery('input[name="keyword"]').val();
				let pkeyword=keyword;
				/*var res = value.search(new RegExp(keyword, "i"));
				if (res < 0) {
					fatalErrorMsg = 'Primary keyword does not appear in this field.';
					tooltipStopTitle[i++] = '<small class="d-block text-left">' + fatalErrorMsg + '</small>';
					fatalArray[trumbowygId].push(fatalErrorMsg);
					isValid = false;
				}*/
				var keywords = [];
				jQuery(".content-o-sidebar .border-success .kw-group-item, .content-o-sidebar .border-primary .kw-group-item").each(function () {
					keyword = $(this).text().toLowerCase().trim();
					keywords.push(keyword);
				});
				keywords.push(pkeyword);
				console.log({
					pkeyword
				});
				console.log({
					keywords
				});
				var isKeywordsFound = findWords(value, keywords);
	
				console.log({
					isKeywordsFound
				});
				if (!isKeywordsFound) {
					fatalErrorMsg = 'A keyword does not appear in this field.';
					tooltipStopTitle[i++] = '<small class="d-block text-left">' + fatalErrorMsg + '</small>';
					fatalArray[trumbowygId].push(fatalErrorMsg);
					isValid = false;
				}
			}
			
		 }
		 console.log({isValid});
		var sentences = trumbContent.replace(/<(.|\n)*?>/g, ' ').trim().split(/[.|!|?]+/g);

		var sentences_length = sentences.length - 1;

		if (sentences_length < 3) {
			warningErrorMsg = 'The paragraph is less than 3 sentences long.';
			tooltipWarnTitle[i++] = '<small class="d-block text-left">' + warningErrorMsg + '</small>';
			warningArray[trumbowygId].push(warningErrorMsg);
		}
		if (sentences_length > 6) {
			warningErrorMsg = 'The paragraph is more than 6 sentences long.';
			tooltipWarnTitle[i++] = '<small class="d-block text-left">' + warningErrorMsg + '</small>';
			warningArray[trumbowygId].push(warningErrorMsg);
		}

		var words = [];
		sentences.forEach(function (sentence) {
			words.push(sentence.split(' '));
		});

		var words_length_array = [];
		words.forEach(function (word) {
			words_length_array.push(parseInt(word.length - 1));
		});
		var words_length = maxArrayLength(words_length_array);

		if (words_length > 20) {
			warningErrorMsg = 'One or more sentences contain more than 20 words.';
			tooltipWarnTitle[i++] = '<small class="d-block text-left">' + warningErrorMsg + '</small>';
			warningArray[trumbowygId].push(warningErrorMsg);
		}

		var passive_voice = trumbContent.match(/\b((be(en)?)|(w(as|ere))|(is)|(a(er|m)))(.+(en|ed))([\s]|\.)/g);
		if (passive_voice !== null) {
			if (passive_voice.length > 0) {
				warningErrorMsg = 'One or more sentences use a passive voice.';
				tooltipWarnTitle[i++] = '<small class="d-block text-left">' + warningErrorMsg + '</small>';
				warningArray[trumbowygId].push(warningErrorMsg);
			}
		}
		var websiteArray = ['altametrics.com', 'anyconnector.com', 'hubworks.com', 'plumdigitalsignage.com', 'plummail.com', 'plumpos.com', 'rmagazine.com', 'smarterkitchen.com', 'wpstesting"', 'zipchecklist.com', 'zipclock.com', 'zipforecasting.com', 'ziphaccp.com', 'zipinventory.com', 'zipordering.com', 'zipposdashboard.com', 'zipreporting.com', 'zipschedules.com', 'zipshiftbook.com', 'zipsupplychain.com', 'ziptemperature.com', 'ziptraining.com', 'ziptraininglms.com'];
		var externalLinkArray = [];
		trumbObj.find('a').each(function () {
			var currHref = $(this).attr('href');
			var domainName = getDomain(currHref);
			if (domainName !== hostWebsite && externalLinkArray.indexOf(domainName === -1) && externalLinkArray.indexOf(websiteArray) != -1) {
				externalLinkArray.push(domainName);
			}
		});

		if (externalLinkArray.length > 0) {
			warningErrorMsg = 'One or more hyperlinks is pointing to external websites.';
			tooltipWarnTitle[i++] = '<small class="d-block text-left">' + warningErrorMsg + '</small>';
			warningArray[trumbowygId].push(warningErrorMsg);
			//isValid = false;
		}
		$.validator.messages["check_seo_rules"] = fatalErrorMsg;

		inputGroupObj.find(".tooltip-hide").hide();

		if (fatalArray[trumbowygId].length > 0) {
			// set stop tooltip title here
			var title = tooltipStopTitle.join("");
			inputGroupObj.find(".para_sentences").attr('data-original-title', title).tooltip('update');
			inputGroupObj.find(".tooltip-hide.text-danger").show();
		}
        console.log(warningArray[trumbowygId]);
		if (warningArray[trumbowygId].length > 0) {
			// set warning tooltip title here
			var title = tooltipWarnTitle.join("");
			inputGroupObj.find(".para_sentences").attr('data-original-title', title).tooltip('update');
			inputGroupObj.find(".tooltip-hide.text-warning").show();
		}

		currEleObject.parent('.trumbowyg-box').removeClass("form-control-invalid");
		if (!isValid) {
			currEleObject.parent('.trumbowyg-box').addClass("form-control-invalid");
		}

		return isValid;

	}, '');

	function maxArrayLength(input) {
		if (toString.call(input) !== "[object Array]")
			return false;
		return Math.max.apply(null, input);
	}

	var articleValidator = jQuery('#article-form').validate({
		invalidHandler: function (form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1 ?
					'You missed 1 field. It has been highlighted' :
					'You missed ' + errors + ' fields. They have been highlighted';
				setFlashes('error', message);
			}
		},
		onkeyup: function (element, event) {
			var currElement = element;
			if (jQuery(element).hasClass('calc-length-editor') && element.tagName === "DIV") {
				currElement = jQuery(element).parents('.input-group').find('textarea');
			}
			this.element(currElement);
		},

		submitHandler: function (form) {

			var globalFatalArray = [];
			var globalWarningArray = [];

			var articleContant = '';
			var paragraphContant = '';
			paragraphContant += jQuery('#trumbowyg-editor-0').html();
			paragraphContant += jQuery('#trumbowyg-editor-2').html();
			paragraphContant += jQuery('#trumbowyg-editor-4').html();
			
			jQuery('.article-body:input').each(function (k, v) {
				articleContant += jQuery(this).val();
			});

			jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
				articleContant += jQuery(this).html();
			});

			if (articleContant.length < 800) {
				warningErrorMsg = 'The article is less than 800 words.';
				globalWarningArray.push(warningErrorMsg);
			}
			var calloutTitle = '';
			jQuery('#article-form .callout_title').each(function (k, v) {

				 calloutTitle += jQuery(this).val();


			});
			if (calloutTitle.length < 1) {
				warningErrorMsg = 'Add a callout to the article to make it more engaging.';
				globalWarningArray.push(warningErrorMsg);
			}
			var statisticRegEx = /%|percent|percentage|billion|billions/gi;
			console.log({articleContant})
			var statisticRes = articleContant.match(statisticRegEx); 
			if (statisticRes == null) {
				warningErrorMsg = 'Add a statistic to the article to make it more engaging.';
				globalWarningArray.push(warningErrorMsg);
			}
			var websiteArray = ['altametrics.com', 'anyconnector.com', 'hubworks.com', 'plumdigitalsignage.com', 'plummail.com', 'plumpos.com', 'rmagazine.com', 'smarterkitchen.com', 'wpstesting"', 'zipchecklist.com', 'zipclock.com', 'zipforecasting.com', 'ziphaccp.com', 'zipinventory.com', 'zipordering.com', 'zipposdashboard.com', 'zipreporting.com', 'zipschedules.com', 'zipshiftbook.com', 'zipsupplychain.com', 'ziptemperature.com', 'ziptraining.com', 'ziptraininglms.com'];
			var hostWebsite = jQuery("#article_website_id").val();
			var articleType = jQuery("#articletype").val();
			var articleContantHtml = $('<div></div>').html(articleContant);

			var externalLinkArray = [],
				internalLinkArray = [],
				crossLinkArray = [],
				hyperLinkArray = [],
				backlinkLinkArray = [];
				articleContantHtml.find('a').each(function () {
					var currHref = $(this).attr('href');
					var domainName = getDomain(currHref);
					if (hyperLinkArray.indexOf(domainName) === -1) {
						hyperLinkArray.push(domainName);
					}
					if (domainName != hostWebsite && externalLinkArray.indexOf(domainName) === -1 && websiteArray.indexOf(domainName) == -1) {
						externalLinkArray.push(domainName);
					}
					if (domainName == hostWebsite && internalLinkArray.indexOf(domainName) === -1) {
						internalLinkArray.push(domainName);
					}
					if (domainName != hostWebsite && websiteArray.indexOf(domainName) != -1) {
						crossLinkArray.push(domainName);
					}
				});
				var paragraphContantHtml = $('<div></div>').html(paragraphContant);
				paragraphContantHtml.find('a').each(function () {
					var currHref = $(this).attr('href');
					var domainName = getDomain(currHref);
					if (domainName != hostWebsite && backlinkLinkArray.indexOf(domainName) === -1 && websiteArray.indexOf(domainName) == -1) {
						backlinkLinkArray.push(domainName);
					}

				});

			console.log({
				hyperLinkArray,
				externalLinkArray,
				internalLinkArray,
				crossLinkArray,
				backlinkLinkArray
			});

			if (externalLinkArray.length > 4) {
				fatalErrorMsg = 'There are more than 4 hyperlinks pointing to external sites.';
				globalFatalArray.push(fatalErrorMsg);
			}

			if (internalLinkArray.length < 1) {
				warningErrorMsg = 'There are no hyperlinks pointing to other articles on this site.';
				globalWarningArray.push(warningErrorMsg);
			}

			if (crossLinkArray.length < 2) {
				if(articleType == 'article' || articleType == 'news'){
					warningErrorMsg = 'There are less than 2 crosslinks pointing to articles on our other websites.';
					globalWarningArray.push(warningErrorMsg);
				}
				
			}

			if (hyperLinkArray.length > 10) {
				fatalErrorMsg = 'A maximum of 10 links are allowed per article. Please review and try again.';
				globalFatalArray.push(fatalErrorMsg);
			}
			if (backlinkLinkArray.length > 0) {
				fatalErrorMsg = 'The article cannot contain a backlink in the top ½ of the page.';
				globalFatalArray.push(fatalErrorMsg);
			}

			fatalArray = fatalArray.concat(globalFatalArray);
			warningArray = warningArray.concat(globalWarningArray);

			console.log({
				fatalArray,
				warningArray
			});

			warningArray = [].concat.apply([], warningArray).filter(function (value, index, array) {
				return array.indexOf(value) == index && value != undefined;
			}).sort();

			fatalArray = [].concat.apply([], fatalArray).filter(function (value, index, array) {
				return array.indexOf(value) == index && value != undefined;
			}).sort();

			console.log({
				warningArray_length: warningArray.length,
				fatalArray_length: fatalArray.length,
				fatalArray,
				warningArray
			});

			var $modal = jQuery("#articleValidatorModal");
			$modal.find(".warning-error, .critical-error, .submit-with-warning").hide();
			if (warningArray.length > 0) {
				var warningItemList = [];
				for (let index = 0; index < warningArray.length; index++) {
					const element = warningArray[index];
					warningItemList[index] = '<li class="list-group-item border-0 px-0 pb-0"><i class="fa fa-exclamation-triangle text-warning"></i> ' + element + '</li>';
				}
				$modal.find('.warning-error').show().find(".warning-list-group").html(warningItemList.join(" "));
			}
			if (fatalArray.length > 0) {
				var errorItemList = [];
				for (let index = 0; index < fatalArray.length; index++) {
					const element = fatalArray[index];
					errorItemList[index] = '<li class="list-group-item border-0 px-0 pb-0"><i class="fa fa-exclamation-triangle text-danger"></i> ' + element + '</li>';
				}
				$modal.find('.critical-error').show().find(".critical-list-group").html(errorItemList.join(" "));
			}

			if (fatalArray.length == 0) {
				$modal.find('.submit-with-warning').show();
			}

			$modal.modal('show');
		}
	});

	jQuery('#articleValidatorModal').on('click', '.submit-with-warning', function (e) {
		e.preventDefault();
		//alert('success');
		//return false;

		jQuery('#article-form').find("button[type='submit']").attr('disabled', 'disabled');
		jQuery.ajax({
			url: base_url + "user/loggedin",
			type: "POST",
			beforeSend: function( xhr ) {
                	jQuery(".submit-with-warning").addClass('data-loading').prop('disabled', true);
			},
			success: function (data) {
				if (!data) {
					jQuery('#signupModal').modal('show');
					jQuery('#article-form').find("button[type='submit']").removeAttr('disabled');
				} else {
					inputChanged = false;
					//console.log({inputChanged});
					jQuery('#article-form')[0].submit();
				}
			}
		});
	});

	if ($("#article-form").length > 0) {
		$("#article-form").validate().form();
	}

	jQuery('#article-publish-modal').on('click', '.publish-article-github', function (event) {
		jQuery('#article-form')[0].submit();
	});

	jQuery(".section_heading_type" ).change(function() {
		jQuery(this).parents('.form-group').find('.section_title').valid(); 
	});

		var $language_modal = jQuery('#language-modal');

		jQuery(document).on('click', '.article-add-language', function (e) {

				$language_modal.modal('show');  

		});


			jQuery('#article-content').on('change keyup keydown', 'input, textarea, select', function (e) {
				
				inputChanged = true;
			});


		jQuery(document).on('click', '.change-lang-tab', function (e) {
		
			jQuery(this).attr('href', $(this).attr('data-bind'));    
		
		});


	jQuery(document).on('scroll', function () {
		if (jQuery(window).scrollTop() > 100) {
			jQuery('.scroll-top-wrapper').addClass('show');
		} else {
			jQuery('.scroll-top-wrapper').removeClass('show');
		}
	});
	jQuery(document).on('click', '.go-to', function (event) {
		event.preventDefault();
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
		if (target.length) {
			$('html,body').animate({
				scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	});
	clearFlashes();



	jQuery(document).on('click', '.check_spelling', function (event) {
		jQuery(".trumbowyg-editor").each(function(n, element){
			checkSpelling("trumbowyg-editor-" + n);
		});
	});
	jQuery(document).on('click', '.check_spelling_1', function (event) {
		checkSpelling_new();
	});

	jQuery(document).on('click', '.verify_copyscape', function (event) {
		var trumbowyg_html = '';
		var article_id =jQuery(this).attr('data-article');
		var lang_id = jQuery(this).attr('data-lang');
		jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
			trumbowyg_html += jQuery(this).html();
		});
		jQuery('#copyscape-result-container').html('<div class="text-center"><img style="width:60px" src="' + base_url + 'assets/images/loading.svg"></div>');
		jQuery('#copyscape-result').modal('show');
		jQuery('#copyscape-result').on('hide.bs.modal', function (e) {
			jQuery.ajax({
				cache: true,
				url: base_url + "copyscapeapi/copyscape_verify",
				type: "POST",
				data: {
					"article_id": article_id,
					'lang_id': lang_id
				},
				success: function (data) {
					jQuery('#verify_copyscape').html('<i class="fas fa-check-square" aria-hidden="true" style="color:#5ed84f"></i>');
					jQuery('.article-publish').removeAttr("disabled");
				}
			});
		});
		jQuery.ajax({
			cache: true,
			url: base_url + "copyscapeapi",
			type: "POST",
			data: {
				"html": trumbowyg_html
			},
			datatype: 'json',
			success: function (data) {
				console.log('copyscape data==');
				console.log(data);
				jQuery('#copyscape-result-container').html(data)
			}
		});
	});
	jQuery(document).on('click', '.add-callout', function (event) {
		
		var curr_callout_obj 	= jQuery(this);
		var callout_id 	= curr_callout_obj.data('callout');
		//alert(callout_id);
		$(callout_id).collapse('show');
		
		
	});	

	jQuery(document).on('click', '.add-social-media-callout', function (event) {
		
		var curr_sm_callout_obj 	= jQuery(this);
		var social_media_callout_id 	= curr_sm_callout_obj.data('social-media-callout');
		//alert(callout_id);
		$(social_media_callout_id).collapse('show');
		
		
	});	

	jQuery(document).on('click', '.delete-social-media-callout', function (event) {
		
		var curr_sm_callout_obj 	= jQuery(this);
		var delete_social_media_callout_id 	= curr_sm_callout_obj.data('delete-social-media-callout');
		//alert(callout_id);
		$(delete_social_media_callout_id).collapse('hide');
		$(delete_social_media_callout_id).find(".social_media_callout_title").val(''); 
		
		
	});

	jQuery(document).on('click', '.add-image-video', function (event) {

		var $container = jQuery(this).parents('.p-container');
		$container.find(".image-video-collapse").slideDown();
	});	
	//$('.collapse').collapse('hide');
	//optimize_content();
	jQuery(document).on('click', '.check-score', function (event) {
		var curr_obj 	= jQuery(this);
		var article_id 	= curr_obj.data('article');
		var brief_id 	= curr_obj.data('brief');
		var lang_id 	= curr_obj.data('lang');
		var keyword 	= curr_obj.data('keyword');
		var page_content = '';
		jQuery('.seo-content-keywords').each(function (k, v) {
			page_content += jQuery(this).val()+ ' ';
		});
		jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
			page_content += jQuery(this).html();
		});
		page_content = page_content.replace(/<br>/gi, ' ');
		page_content = page_content.replace(/&nbsp;/g, ' ');
		page_content = page_content.replace(/(<p[^>]+?>|<p>|<\/p>)/img, ' ');
		page_content = page_content.replace( /(<([^>]+)>)/ig, ' ');
		page_content = page_content.replace( /[\s\n\r]+/g, ' ').trim();
		//console.log(page_content);
		//jQuery('#optimizecontent-result-container').html('<div class="text-center"><img style="width:60px" src="' + base_url + 'assets/images/loading.svg"></div>');
	    console.log('brief_id: '+ brief_id);
		jQuery.ajax({
			cache: true,
			url: base_url + "optimizecontent/getOptimizeContent",
			type: "POST",
			datatype: 'json',
			data: {
				"article_id": article_id,
				"brief_id": brief_id,
				'lang_id': lang_id,
				'keyword': keyword,
				'content': page_content
			},
			 beforeSend: function( xhr ) {
				curr_obj.addClass('data-loading').prop('disabled', true);
			},			
			success: function (data) {
				//console.log('tf-idf data==');
				//console.log(data);
				if(data.success){
					jQuery("#article_content_performance").val(JSON.stringify(data.json_data));
					jQuery("#article_content_score").val(data.json_data.result.content_performance.performance_rank_score);
					jQuery("#article_target_score").val(data.json_data.result.content_performance.target);
					jQuery('#optimizecontent-result-container').html(data.newContent);
					jQuery('.trumbowyg-editor').unmark({
						"element": "mark"
						});
				}
			}
		}).done(function(){
			curr_obj.removeClass('data-loading').removeAttr('disabled');
		});
	});


	jQuery(document).on('click', '.link-building-check-score', function (event) {
		var curr_obj 	= jQuery(this);
		var article_id 	= curr_obj.data('article');
		var breif_id = curr_obj.data('brief');
		var lang_id 	= curr_obj.data('lang');
		var keyword 	= curr_obj.data('keyword');
		var page_content = '';
		jQuery('.seo-content-keywords').each(function (k, v) {
			page_content += jQuery(this).val()+ ' ';
		});
		jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
			page_content += jQuery(this).html();
		});
		page_content = page_content.replace(/<br>/gi, ' ');
		page_content = page_content.replace(/&nbsp;/g, ' ');
		page_content = page_content.replace(/(<p[^>]+?>|<p>|<\/p>)/img, ' ');
		page_content = page_content.replace( /(<([^>]+)>)/ig, ' ');
		page_content = page_content.replace( /[\s\n\r]+/g, ' ').trim();
		
		jQuery.ajax({
			cache: true,
			url: base_url + "secure/linkbuildingarticle/getLinkBuildingOptimizeContent",
			type: "POST",
			datatype: 'json',
			data: {
				"article_id": breif_id,
				'lang_id': lang_id,
				'keyword': keyword,
				'content': page_content
			},
			 beforeSend: function( xhr ) {
				curr_obj.addClass('data-loading').prop('disabled', true);
			},			
			success: function (data) {
				if(data.success){
					jQuery("#article_content_performance").val(JSON.stringify(data.json_data));
					jQuery("#article_content_score").val(data.json_data.result.content_performance.performance_rank_score);
					jQuery("#article_target_score").val(data.json_data.result.content_performance.target);
					jQuery('#link-optimizecontent-result-container').html(data.newContent);
					jQuery('.trumbowyg-editor').unmark({
						"element": "mark"
					});
				}
			}
		}).done(function(){
			curr_obj.removeClass('data-loading').removeAttr('disabled');
		});
	});

	/*jQuery(document).on('click', '.export-keywords', function (event) {
		var article_id = jQuery(this).data('article');
		var lang_id = jQuery(this).data('lang');
		var keyword = jQuery(this).data('keyword');
	
		jQuery.ajax({
			cache: true,
			url: base_url + "optimizecontent/export_optimize_content_keywords",
			type: "POST",
			datatype: 'json',
			data: {
				"article_id": article_id,
				'lang_id': lang_id,
				'keyword': keyword
			},
			success: function (data) {
				if(data.success){
				//jQuery('#optimizecontent-result-container').html(data.newContent);
				}
			}
		});
	});*/

	/*jQuery('#article_language').on('change', function (event) {
		var language = jQuery(this).val();
		var target = jQuery(this).data('target');
		window.location = (target + language); 
	});*/

	jQuery( "#article_meta_lookup_id" )
		.change(function () {
			var str = "";
			var optionValue =jQuery(this).val();
			var author =jQuery('#article_author').val();
			var language_id =jQuery('#language_id').val();
			//alert(author);
			//alert(language_id);
			str += optionValue;
			//alert(str);
			if(optionValue){
			jQuery.ajax({
				url: base_url + 'secure/metatags/getMetatagInfo/' + optionValue + '/' + language_id  +'/' + author,
				type: "POST",
				success: function (data) {
					var data = data;
					console.log(data);
					jQuery('#article_meta_product').val(data['meta_product']);
					jQuery('#article_meta_category').val(data['meta_category']);
					jQuery('#article_meta_product_name').val(data['meta_product_name']);
					jQuery('#article_meta_product_desc').val(data['meta_product_description']);
					jQuery('#article_meta_product_image').val(data['meta_product_image']);
					jQuery('#article_meta_product_icon').val(data['meta_product_icon']);
					jQuery('#article_meta_product_id').val(data['meta_product_id']);
					jQuery('#article_meta_part_id').val(data['meta_product_part_id']);
					jQuery('#article_meta_product_brand').val(data['meta_product_brand']);
					jQuery('#article_meta_product_reviewcount').val(data['meta_product_review_count']);
					jQuery('#article_meta_product_price').val(data['meta_product_price']);
					jQuery('#article_meta_product_price_currency').val(data['meta_product_price_currency']);
					jQuery('#article_meta_product_ratingvalue').val(data['meta_product_rating_value']);
					jQuery("#article_product_cta").val(data['product_cta']).trigger('change');
					jQuery("#article_content_cta").val(data['content_cta']).trigger('change');
					//jQuery('#article_product_cta').val(data['product_cta']);
					//jQuery('#article_content_cta').val(data['content_cta']);
					//jQuery('#article_meta_author_url').val(data['meta_product_language_id']);
					//jQuery('#article_author').val(data['meta_product_language_id']);	
					//jQuery('#article_meta_author_desc').val(data['meta_product_language_id']);
					//jQuery('#article_meta_author_facebook').val(data['meta_product_language_id']);
					//jQuery('#article_meta_author_twitter').val(data['meta_product_language_id']);
					
					//jQuery('#article_meta_keyword').val(data['meta_product_language_id']);
					//jQuery('#article_meta_abstract').val(data['meta_product_language_id']);
					//jQuery('#meta_product_language_id').val(data['meta_product_language_id']);
					//jQuery('#article_type').val(data['meta_product_language_id']);
					//jQuery('#publishdate').val(data['meta_product_language_id']);
					//jQuery('#datemodified').val(data['meta_product_language_id']);	
					
								
				}
			});
			}
		})
		.change();
      
		jQuery(document).on('click', '.add-spinner', function (event) {
			jQuery('<div class="spinner-border append-to-body text-light" role="status"><span class="sr-only">Loading...</span></div>').prependTo(document.body); 
		 });
});

function optimize_content() {
	var article_id = jQuery('input[name="article_id"]').val();
	var lang_id = jQuery('input[name="language_id"]').val();
	var keyword = jQuery('input[name="keyword"]').val();
	//alert(keyword);
	jQuery('#tf-idf-result-container').html('<div class="text-center"><img style="width:60px" src="' + base_url + 'assets/images/loading.svg"></div>');
	
	jQuery.ajax({
		cache: true,
		url: base_url + "optimizecontent",
		type: "POST",
		datatype: 'json',
		data: {
			"article_id": article_id,
			'lang_id': lang_id,
			'keyword': keyword
		},
		success: function (data) {
			console.log('tf-idf data==');
			console.log(data);
			if(data.success){
				jQuery('#tf-idf-result-container').html(data.newContent);
			}
			
		}
	});

}

function setFlashes(flashType, message) {
	var alertClasses = {
		'success': 'alert-primary',
		'notice': 'alert-success',
		'warning': 'alert-warning',
		'error': 'alert-danger',
		'info': 'alert-info',
		'default': 'alert-inverse'
	};
	var flashes = '<div class="alert ' + alertClasses[flashType] + ' alert-dismissible alert-new">' +
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
		message +
		'</div>';
	var error = false;
	jQuery('#flashes .alert-new').each(function () {
		var text = (jQuery(this).text()).replace('&times;', '');
		var target_text = (jQuery(flashes).text()).replace('&times;', '');
		if (text == target_text) {
			error = true;
		}
	});
	if (!error) {
		jQuery('#flashes').append(flashes);
	}
	clearFlashes();
}

var clearFlashes = function (el) {
	jQuery('#flashes .alert-new').each(function () {
		var me = this;
		window.setTimeout(function () {
			jQuery(me).fadeTo(700, 0).slideUp(700, function () {
				jQuery(this).remove();
			});
		}, 7000);
	});
}

var hyperLinkLimitExceeded = function () {
	var trumbowyg_html = '';
	jQuery('.trumbowyg .trumbowyg-editor').each(function (k, v) {
		trumbowyg_html += jQuery(this).html();
	});
	var href_array = trumbowyg_html.split('<a');
	var href_length = (href_array.length - 1);
	if (href_length > 10) {
		//setFlashes('error', 'A maximum of 10 links are allowed per article.');
		alert('A maximum of 10 links are allowed per article. Please review and try again.');
		return true;
	}
	return false;
}


function parse_url (str, component) { // eslint-disable-line camelcase
  //       discuss at: http://locutus.io/php/parse_url/
  //      original by: Steven Levithan (http://blog.stevenlevithan.com)
  // reimplemented by: Brett Zamir (http://brett-zamir.me)
  //         input by: Lorenzo Pisani
  //         input by: Tony
  //      improved by: Brett Zamir (http://brett-zamir.me)
  //           note 1: original by http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
  //           note 1: blog post at http://blog.stevenlevithan.com/archives/parseuri
  //           note 1: demo at http://stevenlevithan.com/demo/parseuri/js/assets/parseuri.js
  //           note 1: Does not replace invalid characters with '_' as in PHP,
  //           note 1: nor does it return false with
  //           note 1: a seriously malformed URL.
  //           note 1: Besides function name, is essentially the same as parseUri as
  //           note 1: well as our allowing
  //           note 1: an extra slash after the scheme/protocol (to allow file:/// as in PHP)
  //        example 1: parse_url('http://user:pass@host/path?a=v#a')
  //        returns 1: {scheme: 'http', host: 'host', user: 'user', pass: 'pass', path: '/path', query: 'a=v', fragment: 'a'}
  //        example 2: parse_url('http://en.wikipedia.org/wiki/%22@%22_%28album%29')
  //        returns 2: {scheme: 'http', host: 'en.wikipedia.org', path: '/wiki/%22@%22_%28album%29'}
  //        example 3: parse_url('https://host.domain.tld/a@b.c/folder')
  //        returns 3: {scheme: 'https', host: 'host.domain.tld', path: '/a@b.c/folder'}
  //        example 4: parse_url('https://gooduser:secretpassword@www.example.com/a@b.c/folder?foo=bar')
  //        returns 4: { scheme: 'https', host: 'www.example.com', path: '/a@b.c/folder', query: 'foo=bar', user: 'gooduser', pass: 'secretpassword' }

  var query

  var mode = (typeof require !== 'undefined' ? require('../info/ini_get')('locutus.parse_url.mode') : undefined) || 'php'

  var key = [
    'source',
    'scheme',
    'authority',
    'userInfo',
    'user',
    'pass',
    'host',
    'port',
    'relative',
    'path',
    'directory',
    'file',
    'query',
    'fragment'
  ]

  // For loose we added one optional slash to post-scheme to catch file:/// (should restrict this)
  var parser = {
    php: new RegExp([
      '(?:([^:\\/?#]+):)?',
      '(?:\\/\\/()(?:(?:()(?:([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?))?',
      '()',
      '(?:(()(?:(?:[^?#\\/]*\\/)*)()(?:[^?#]*))(?:\\?([^#]*))?(?:#(.*))?)'
    ].join('')),
    strict: new RegExp([
      '(?:([^:\\/?#]+):)?',
      '(?:\\/\\/((?:(([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?))?',
      '((((?:[^?#\\/]*\\/)*)([^?#]*))(?:\\?([^#]*))?(?:#(.*))?)'
    ].join('')),
    loose: new RegExp([
      '(?:(?![^:@]+:[^:@\\/]*@)([^:\\/?#.]+):)?',
      '(?:\\/\\/\\/?)?',
      '((?:(([^:@\\/]*):?([^:@\\/]*))?@)?([^:\\/?#]*)(?::(\\d*))?)',
      '(((\\/(?:[^?#](?![^?#\\/]*\\.[^?#\\/.]+(?:[?#]|$)))*\\/?)?([^?#\\/]*))',
      '(?:\\?([^#]*))?(?:#(.*))?)'
    ].join(''))
  }

  var m = parser[mode].exec(str)
  var uri = {}
  var i = 14

  while (i--) {
    if (m[i]) {
      uri[key[i]] = m[i]
    }
  }

  if (component) {
    return uri[component.replace('PHP_URL_', '').toLowerCase()]
  }

  if (mode !== 'php') {
    var name = (typeof require !== 'undefined' ? require('../info/ini_get')('locutus.parse_url.queryKey') : undefined) || 'queryKey'
    parser = /(?:^|&)([^&=]*)=?([^&]*)/g
    uri[name] = {}
    query = uri[key[12]] || ''
    query.replace(parser, function ($0, $1, $2) {
      if ($1) {
        uri[name][$1] = $2
      }
    })
  }

  delete uri.source
  return uri
}
function getHostName(url) {
    var match = url.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/i);
    if (match != null && match.length > 2 && typeof match[2] === 'string' && match[2].length > 0) {
    return match[2];
    }
    else {
        return null;
    }
}
function getDomain(url) {
		var parseUrl = parse_url(url);
		var hostName = parseUrl.host;
    var domain = hostName;

    if (hostName != null) {
        var parts = hostName.split('.').reverse();

        if (parts != null && parts.length > 1) {
            domain = parts[1] + '.' + parts[0];

            if (hostName.toLowerCase().indexOf('.co.uk') != -1 && parts.length > 2) {
              domain = parts[2] + '.' + domain;
            }
        }
    }

    return domain;
}
function addhttp(url) {
	if (!/^(f|ht)tps?:\/\//i.test(url)) {
	   url = "http://" + url;
	}
	return url;
 }

function checkSpelling_new(temp_num = 0, editor_length=0){

	if(temp_num == 0){
		var editor_length = (jQuery(".trumbowyg-editor").length);
	}
	if(temp_num >= editor_length){
		return false;
	}


	AtD.checkCrossAJAX("trumbowyg-editor-" + temp_num,
	{
		success : function(errorCount)
		{
	//		checkSpelling_new(temp_num++, editor_length)
			if (errorCount == 0)
			{
				//alert("aaaaaaaNo writing errors were found");
			}
		},
		error : function(reason)
		{
			alert(reason);
		}
	});
	temp_num++;
	//checkSpelling_new(temp_num, editor_length)
}

function checkSpelling(element_id){
	AtD.checkCrossAJAX(element_id,
	{
		success : function(errorCount)
		{
			if (errorCount == 0)
			{
				alert("No writing errors were found");
			}
		},
		error : function(reason)
		{
			alert(reason);
		}
	});
}

function p_delete_image($container){
	$container.find('.holder-style').removeClass('embed-responsive-16by9');
	$container.find('.holder-style').addClass('holder-active').css('background-image', '');
	$container.find('.holder-icon').addClass('uploading');
	$container.find('.holder-style :input, .section-video-found :input, .section-image-found  :input').val('');
	$container.find('.youtubevideo').text('');
	$container.find('.image-video-collapse').slideUp();
	$container.find('.section-video-found').slideUp();
	$container.find('.section-image-found').slideDown().find('.article_image_alt').val('').attr("disabled", 'disabled');
			
				
}

//Fontawesome Iconpicker
$(function() {
	$('.article-iconpicker').iconpicker();
});


//basic template to create new plugin
(function($) {
	'use strict';
	$.extend(true, $.trumbowyg, {
	  plugins: {
		checkspelling: {
		  init: function(trumbowyg) {
			const checkspellingDef = {
			  fn: function(cmd) {
				var element_id  = trumbowyg.$ed.attr('id');
				checkSpelling(element_id);
			  },
			  text: 'Check Grammar and Spelling',
			};
			//adding buttons in editor
			trumbowyg.addBtnDef('checkspelling', checkspellingDef);
		  }
		}
	  }
	});
  })(jQuery);
