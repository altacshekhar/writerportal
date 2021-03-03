
jQuery(document).on('click', '.excel-upload', function (e) {
    $("#masterformType").val("articlemaster-form");
    jQuery('#upload-publisher-modal').modal('show');
});

jQuery(document).on('click','.view-publishers', function (e){
	var publishers = jQuery(this).data('input');
	$('#report-publishers-modal').find('.modal-body').html(publishers);
	jQuery('#report-publishers-modal').modal('show');
});

jQuery(document).on('click','.view-livelinks', function (e){
	var result = jQuery(this).data('input');
	$('#report-livelink-modal').find('.modal-body').html(result);
	jQuery('#report-livelink-modal').modal('show');
});

jQuery(document).on('click','.view-campaigns-created-by', function (e){
	var campaigns = jQuery(this).data('input');
	$('#report-campaigns-modal').find('.modal-body').html(campaigns);
	jQuery('#report-campaigns-modal').modal('show');
});


jQuery(document).on('click','.view-link-articles', function (e){
	var result = jQuery(this).data('input');
	$('#report-articlebrief-modal').find('.modal-body').html(result);
	jQuery('#report-articlebrief-modal').modal('show');
});

jQuery.extend(true, jQuery.fn.DataTable.defaults, {
	"pageLength": 10,
	"processing": true,
	"language": {
		processing: '<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="align-middle" style="height:30px" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/> <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z"> <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/> </path></svg> Loading...</span>'
	},
	"order": [],
	"serverSide": true,
	"bLengthChange": false,
	//"bFilter": false,
	"bInfo": true,
	"bAutoWidth": false,
});

jQuery(document).ready(function () {
	jQuery('[data-toggle="popover"]').popover();
	jQuery('body').popover({
		html: true,
		trigger: "hover",
		content: function () {
			var id = jQuery(this).attr('id');
			return $.ajax({
				url: base_url + 'secure/user/user_article/' + id,
				dataType: 'html',
				async: false
			}).responseText;
		},
		selector: '.show-user-article-popover'
	});

	jQuery('[data-toggle="tooltip"]').tooltip();
	jQuery('#site_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/github/ajax_list',
			"type": "POST"
		},
	});
	jQuery('#category_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/category/ajax_list',
			"type": "POST"
		},
	});
	jQuery('#niche_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/niche/ajax_list',
			"type": "POST"
		},
	});
	
	jQuery('#linktype_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/linktype/ajax_list',
			"type": "POST"
		},
	});

	var user_data_table = 	jQuery('#user_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/user/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [1, 2, 3, 4]
		}, {
			"orderable": false,
			"targets": [5]
		}]
	});
	
	jQuery(document).on('keyup change', "#datatableUserSearch", function () {
		user_data_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-user-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		user_data_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery('#metatags_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/metatags/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [4, 5]
		}, {
			"orderable": false,
			"targets": [17]
		}]
	});
	var cta_data_table = jQuery('#cta_list_table').DataTable({
		"columns": [
			{ "title": "Website","data":"cta_website", "className": "column-cta-website" },
			{ "title": "Type","data":"cta_type", "className": "column-cta-type" },
			{ "title": "Headline", "data":"cta_headline","className": "column-cta-headline"},
			{ "title": "Background Type", "data":"cta_background_type","className": "column-cta-background-type"},
			{ "title": "","data":"cta_action", "className": "column-action" }
		],
		"ajax": {
			"url": base_url + 'secure/cta/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"orderable": false,
			"targets": [4]
		}],
		"drawCallback": function(settings) {
			var api = new $.fn.dataTable.Api(settings);
			var json = api.ajax.json();
			if(json.show_action == false){
				api.columns([4]).visible(false);
			}else{
				api.columns([4]).visible(true);
			}
		}
	});

	jQuery(document).on('keyup change', "#datatableCtaSearch", function () {
		cta_data_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.cta-search-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		cta_data_table.column(i).search(
			jQuery(this).val()
		).draw();
	});
	var $ctaPreviewModal = jQuery('#ctaPreviewModal');
	jQuery(document).on('click', '.cta_preview', function (e) {
		var ctaId = $(this).data("cta-id");
		if(ctaId){
			jQuery.ajax({
				url: base_url + 'secure/cta/show/' + ctaId,
				type: "POST",
				success: function (data) {
					var data = data;
					$ctaPreviewModal.find(".preview").html(data);
					$ctaPreviewModal.modal('show');
				}
			});
		}
	});
	jQuery('[data-youtube]').youtube_background();
	$ctaPreviewModal.on('shown.bs.modal', function (e) {
		jQuery(this).find('[data-youtube]').youtube_background();
	});

	jQuery('#websites_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/websites/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [2, 3]
		}, {
			"orderable": false,
			"targets": [4]
		}]
	});

	jQuery('#channelui_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/channelsui/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [4, 5]
		}, {
			"orderable": false,
			"targets": [9]
		}]
	});

	jQuery('#channel_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/channels/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [4, 5]
		}, {
			"orderable": false,
			"targets": [7]
		}]
	});

	jQuery('#hootsuite_channel_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/hootsuitechannels/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [4, 5]
		}, {
			"orderable": false,
			"targets": [6]
		}]
	});

	var data_table = jQuery('#article_list_table').DataTable({
		"columns": [
			{ "title": "Website","data":"article_website", "className": "column-location" },
			{ "title": "Writer","data":"full_name", "className": "column-author" },
			{ "title": "Headline", "data":"article_title","className": ""},
			{ "title": "Content","data":"article_content_score", "className": "column-content-score" },
			{ "title": "Backlinks","data":"article_backlinks_count", "className": "column-content-backlinks" },
			{ "title": "Status / Date","data":"article_status", "className": "column-date" },
			{ "title": "","data":"article_action", "className": "column-action" }
		],
		"ajax": {
			"url": base_url + 'secure/articleslist/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"orderable": false,
			"targets": [6]
		}],
		"drawCallback": function(settings) {
			var api = new $.fn.dataTable.Api(settings);
			var json = api.ajax.json();
			if(json.show_action == false){
				api.columns([6]).visible(false);
			}else{
				api.columns([6]).visible(true);
			}
		}
	});

	jQuery(document).on('keyup change', "#datatableSearch", function () {
		data_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		data_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	var keyword_data_table = jQuery('#keyword_list_table').DataTable({
		"columns": [
			{ "title": "Website","data":"website", "className": "column-website" },
			{ "title": "keyword","data":"keyword", "className": "column-keyword" },
			{ "title": "Monthly Searches", "data":"monthly_search","className": "column-monthly-search"},
			{ "title": "Content Score","data":"content_score", "className": "column-content-score" },
			{ "title": "Link Building","data":"link_building", "className": "column-link-building" },
			{ "title": "Focus Keywords","data":"focus_keyword", "className": "column-focus-keyword" },
			{ "title": "Status & Next Step","data":"status", "className": "column-status" },
			{ "title": "","data":"keyword_action", "className": "column-action" }
		],
		"ajax": {
			"url": base_url + 'secure/keyword/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"orderable": false,
			"targets": [7]
		}],
		"drawCallback": function(settings) {
			var api = new $.fn.dataTable.Api(settings);
			var json = api.ajax.json();
			if(json.show_action == false){
				api.columns([7]).visible(false);
			}else{
				api.columns([7]).visible(true);
			}
		}
	});

	jQuery(document).on('keyup change', "#datatableKeywordSearch", function () {
		keyword_data_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.keyword-search-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		keyword_data_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery(document).on('click', '.right-sidebar-toggler', function (e) {
		jQuery('#right-sidebar-content').toggleClass('open-right-sidebar')
	});

	function isPasswordPresent() {
		return jQuery('#user_password').val().length > 0;
	}
	jQuery('#add-user-form').validate({
		rules: {
			user_full_name: {
				required: true,
				minlength: 3
			},
			user_email: {
				required: true,
				email: true,
				remote: base_url + "user/isUniqueEmail",
			},
			user_phone: {
				digits: true,
				required: true,
				minlength: 10,
				maxlength: 10
			},
			user_password: {
				minlength: {
					depends: isPasswordPresent,
					param: 6
				}
			},
			password_confirm: {
				required: isPasswordPresent,
				minlength: {
					depends: isPasswordPresent,
					param: 6
				},
				equalTo: {
					depends: isPasswordPresent,
					param: "#user_password"
				}
			}
		},
		errorPlacement: function (error, element) {
			var $this = jQuery(element);
			error.appendTo(element.parent('div'));
		},
		submitHandler: function (form) {
			form.submit();
		}
	});

	jQuery(document).on('change', 'input[name=user_image]', function () {
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				jQuery('.upload-image-preview img').attr('src', e.target.result);
			};
			reader.readAsDataURL(this.files[0]);
		}
	});
	var $publish_modal = jQuery('#article-publish-modal');

	jQuery(document).on('click', '.article-publish', function (event) {
		var $article_form = jQuery('#article-form');
		var valid = $article_form.valid();
		if (hyperLinkLimitExceeded()) {
			valid = false;
		}
		if(valid){
			var inputpubval=$(this).val();
			$article_form.find('#form_action').val(inputpubval);
			$publish_modal.modal('show');
		}else{
		//	setFlashes('error', 'Please correct the form errors and try again');
		}
	});

	
	jQuery('#publish-article-form').validate({
		rules: {
			article_published_website: {
				required: true
			},
		},
		submitHandler: function (form) {
			var $form_control = jQuery(form).find('.form-control');
			var $article_form = jQuery('#article-form');
			var $publish_article_error = jQuery('#publish-article-error');
			$publish_article_error.slideUp().html('');


			if($articleValidator = $article_form.valid()){
				var $website = jQuery(form).find('[name="article_published_website"]').val();
				var $message = jQuery(form).find('[name="article_commit_message"]').val();
				jQuery('#article_published_website').val($website);
				jQuery('#article_commit_message').val($message);
				var $button = jQuery(form).find('button');
				$button.prop("disabled", true);
				$form_control.prop("disabled", true);
				$publish_modal.find('.modal-content').addClass('be-loading-active');
				$article_form.submit();
			}else{
				var error_str  = '<div class="alert alert-danger mb-0">';
					error_str += 'Please correct the form errors and try again';
					error_str += '</div>';
				$publish_article_error.html(error_str).slideDown();
			}
			/*
			jQuery.ajax({
				url: base_url + "article/publishArticle",
				data: $post_form_data,
				type: "POST",
				success: function (data) {
					var data = data;
					$publish_article_error.html(data.message).slideDown();
					$form_control.removeAttr("disabled");
					$button.removeAttr("disabled");
					$publish_modal.find('.modal-content').removeClass('be-loading-active');
					if(data.error!=true){
						window.location = base_url + 'secure/articleslist';
					}
				}
			});*/
		}
	});

	jQuery('.has-clear input[type="text"]').on('input propertychange', function() {
		var $this = $(this);
		var visible = Boolean($this.val());
		$this.siblings('.form-control-clear').toggleClass('d-none', !visible);
	  }).trigger('propertychange');

	  jQuery('.form-control-clear').click(function() {
		jQuery(this).siblings('input[type="text"]').val('')
		  .trigger('propertychange').focus().trigger('keyup');
	  });

	jQuery(document).on('click', '[data-toggle="confirmation"]', function (event) {
		event.preventDefault();
		return showConfirmation(this);
	});

	jQuery(".toggle-loading").on("click", function () {
		var element = jQuery(this).parents(".widget, .card");
		element.length && (element.addClass("be-loading-active"), setTimeout(function () {
			element.removeClass("be-loading-active")
		}, 3e3));
	});
	var campaign_list_table = 	jQuery('#campaign_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/campaigns/ajax_list',
			"type": "POST"
		},
		"order": [[ 0, "asc" ]],
		"columnDefs": [{
			"className": "text-center",
		}, {
			"orderable": false,
			"targets": [4,5,8]
		}],
	});
	
	jQuery(document).on('keyup change', "#datatableCampaignSearch", function () {
		campaign_list_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-campaign-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		campaign_list_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery(document).on('change', '.search-link-articles-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		link_article_report.column(i).search(
			jQuery(this).val()
		).draw();
	});

	var link_article_report = jQuery('#link_articles_report').DataTable({
		"ajax": {
			"url": base_url + 'secure/articlesbrief/ajax_report_articlebrief',
			"type": "POST"
		},
		"order": [[ 0, "asc" ]],
		"columnDefs": [
		{
			"orderable": false,
			"targets": [5]
		}]
	});
	
	var livelink_report = jQuery('#livelinks_report').DataTable({
		"ajax": {
			"url": base_url + 'secure/livelinks/ajax_report_livelinks',
			"type": "POST"
		},
		"order": [[ 0, "asc" ]],
		"columnDefs": [
			{
				"orderable": false,
				"targets": [3]
			}]
	});

	jQuery(document).on('change', '.search-livelink-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		livelink_report.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery(document).on('keyup change', ".livelinks_from_date", function () {
		var i = jQuery(this).attr('data-column');
		livelink_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('keyup change', ".livelinks_to_date", function () {
		var i = jQuery(this).attr('data-column');
		livelink_report.column(i).search(this.value).draw();
	});

	var campaign_report = jQuery('#campaign_report').DataTable({
		"ajax": {
			"url": base_url + 'secure/campaigns/ajax_report_campaigns',
			"type": "POST"
		},
		"order": [[ 0, "asc" ]],
		"columnDefs": [
			{
				"orderable": false,
				"targets": [3]
			}]
	});

	var publisher_report = jQuery('#publisher_report').DataTable({
		"ajax": {
			"url": base_url + 'secure/publishers/ajax_report_publishers',
			"type": "POST"
		},
		"order": [[ 0, "asc" ]],
		"columnDefs": [
			{
				"orderable": false,
				"targets": [2]
			}]
	});

	jQuery(document).on('change', '.report-publisher-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		publisher_report.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery(document).on('keyup change', "#from_date", function () {
		var i = jQuery(this).attr('data-column');
		publisher_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('keyup change', "#to_date", function () {
		var i = jQuery(this).attr('data-column');
		publisher_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('change', '.report-campaigns-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		campaign_report.column(i).search(
			jQuery(this).val()
		).draw();
	});
	
	jQuery(document).on('keyup change', ".campaign_from_date", function () {
		var i = jQuery(this).attr('data-column');
		campaign_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('keyup change', ".campaign_to_date", function () {
		var i = jQuery(this).attr('data-column');
		campaign_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('keyup change', ".link_article_from_date", function () {
		var i = jQuery(this).attr('data-column');
		link_article_report.column(i).search(this.value).draw();
	});

	jQuery(document).on('keyup change', ".link_article_to_date", function () {
		var i = jQuery(this).attr('data-column');
		link_article_report.column(i).search(this.value).draw();
	});

	var publisher_list_table = 	jQuery('#publisher_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/publishers/ajax_list',
			"type": "POST"
		},
		"columnDefs": [
		{
			"orderable": false,
			"targets": [8]
		}],
		"order": [[ 0, "asc" ]],
	});
	
	jQuery(document).on('keyup change', "#datatablePublisherSearch", function () {
		publisher_list_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-publisher-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		publisher_list_table.column(i).search(
			jQuery(this).val()
		).draw();
	});


	var livelink_list_table = 	jQuery('#livelink_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/livelinks/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [1, 2, 3, 4]
		}, {
			"orderable": false,
			"targets": [6]
		}]
	});
	
	jQuery(document).on('click','.live-link-validation',function()
	{
		$(this).closest('tr').find('td').each(function(index)
		{
			if(index == 5)
			{
				$(this).text('in progress');
			}
		});
	});
	jQuery(document).on('keyup change', "#datatableLivelinkSearch", function () {
		livelink_list_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-livelink-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		livelink_list_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	var articlebrief_list_table = 	jQuery('#articlebrief_list_table').DataTable({
		"ajax": {
			"url": base_url + 'secure/articlesbrief/ajax_list',
			"type": "POST"
		},
		"columnDefs": [{
			"className": "text-center",
			"targets": [1, 3, 4]
		}, {
			"orderable": false,
			"targets": [1,6]
		}],
		"order": [[0,"asc"]]
	});
	
	jQuery(document).on('click', ".export-zip", function()
	{
		var brief_id = jQuery(this).data('brief_id');
		var lang = jQuery(this).data('lang');
		var id = jQuery(this).data('article');
		var url = jQuery(this).data('url');
		window.location.href = url+`/`+lang+`/`+brief_id+`/`+id;
	});

	jQuery(document).on('keyup change', "#datatableArticlebriefSearch", function () {
		articlebrief_list_table.search(this.value).draw();
	});

	jQuery(document).on('change', '.search-articlebrief-filters .select-2', function () {
		var i = jQuery(this).attr('data-column');
		articlebrief_list_table.column(i).search(
			jQuery(this).val()
		).draw();
	});

	jQuery('#publisher-form').validate({
		rules: {
			publisher_url: {
				required: true,
				url: true
			},
			publisher_status: {
				required: true,
			},
			// publisher_first_name: {
			// 	required: true,
			// 	minlength: 3
			// },
			// publisher_last_name: {
			// 	required: true,
			// 	minlength: 3
			// },
			// publisher_email: {
			// 	//required: true,
			// 	//email: true,
			// },
			publisher_websites: {
				required: true,
			},
			publisher_type: {
				required: true,
			},
			// publisher_url_traffic: {
			// 	required: true,
			// },
			// publisher_url_domainauthority: {
			// 	required: true,
			// },
			// publisher_url_referringdomains: {
			// 	required: true,
			// },
			// publisher_estimated_cost: {
			// 	required: true,
			// }
		},
		errorPlacement: function (error, element) {
			var $this = jQuery(element);
			error.appendTo(element.parent('div'));
		},
		submitHandler: function (form) {
			form.submit();
		}
	});

	jQuery('#campaign-form').validate({
		rules: {
			campaign_name: {
				required: true,
				minlength: 3
			},
			campaign_status: {
				required: true,
			},
			campaign_startdate: {
				required: true,
			},
			campaign_enddate: {
				required: true,
			},
			campaign_budget: {
				required: true,
			},
			campaign_quantity: {
				required: true,
				
			},
			campaign_websites: {
				required: true,
			},
			// campaign_niche: {
			// 	required: true,
			// },
			campaign_type: {
				required: true,
			},
			campaign_content_coordinator: {
				required: true,
			},
			campaign_outreach_coordinator: {
				required: true,
			}
		},
		errorPlacement: function (error, element) {
			var $this = jQuery(element);
			error.appendTo(element.parent('div'));
		},
		submitHandler: function (form) {
			form.submit();
		}
	});
	
	var $BuildBacklinks_modal = jQuery('#articleBuildBacklinksModal');
	jQuery(document).on('change','.filter-websites',function(event)
	{
		event.preventDefault();
		var opt_filter_site = $(this).val();
		$BuildBacklinks_modal.find('tbody tr').each(function()
		{
			
			str = $(this).data('site-id');
			if(opt_filter_site == "")
			{
				$(this).removeClass('hide');
			}
			else if(str != opt_filter_site)
			{
				$(this).addClass('hide');
			}
			else
			{
				$(this).removeClass('hide');
			}
		});		
	});

	jQuery(document).on('click', '.articles-build-backlinks', function (event) {
		event.preventDefault();
		var campaign_websites = jQuery("#campaign_websites"). val();
		var selected_backlink=[];
		$(".backlink-articles-id").each(function() {
			selected_backlink.push($(this).val());
		});
		if(campaign_websites){
			$('#add-loading-image').show();
			jQuery.ajax({
				url: base_url + "secure/campaigns/articles_build_backlinks_list",
				type: "POST",
				data: {
					"websites": campaign_websites,
					"selected_backlink": selected_backlink,
				},
				success: function (response) {
					$BuildBacklinks_modal.find('.modal-body').html(response); 
					$BuildBacklinks_modal.modal('show');
					$('#add-loading-image').hide();
					/*$BuildBacklinks_modal.find('tbody').html(response); 
					$BuildBacklinks_modal.modal('show');
					var backlinks_articles = new Array();
					$('.backlink-articles-id').each(function()
					{
						backlinks_articles.push(parseInt($(this).val()));
					});
					$('.selected-build-backlink').each(function()
					{
						var backlink = $(this).data('article-id');
						if(jQuery.inArray(backlink,backlinks_articles) !== -1)
						{
							$(this).text('Selected');
							$(this).removeClass('selected-build-backlink');
						}
					});
					cbnames = [];
					$('.filter-websites').empty();
					$('.filter-websites').append('<option value="">--Select All Websites --</option>');
					$BuildBacklinks_modal.find('tbody tr').each(function()
					{
						str = $(this).data('site-id');
						if (!~$.inArray(str, cbnames))
						{
							cbnames.push(str);
							$('.filter-websites').append('<option value="'+$(this).data('site-id')+'">'+$(this).data('site-id')+'</option>');
						}
					});*/
				}
			});
		}else{	

		}
		return true;
		var res = addArticles();
		if(!res)
		{
			return false;
		}
		//var niche_type = $('#campaign_niche').val();
		var links = $('#campaign_type').val();
		if(niche_type == "" || links == "")
		{
			alert('Niche Type and Links should be selected to add backlinks.');
			return false;
		}
		
		if(campaign_websites){
			jQuery.ajax({
				url: base_url + "secure/campaigns/articles_build_backlinks_list",
				type: "POST",
				data: {
					"websites": campaign_websites,
				},
				success: function (response) {
					$BuildBacklinks_modal.find('tbody').html(response); 
					$BuildBacklinks_modal.modal('show');
					var backlinks_articles = new Array();
					$('.backlink-articles-id').each(function()
					{
						backlinks_articles.push(parseInt($(this).val()));
					});
					$('.selected-build-backlink').each(function()
					{
						var backlink = $(this).data('article-id');
						if(jQuery.inArray(backlink,backlinks_articles) !== -1)
						{
							$(this).text('Selected');
							$(this).removeClass('selected-build-backlink');
						}
					});
					cbnames = [];
					$('.filter-websites').empty();
					$('.filter-websites').append('<option value="">--Select All Websites --</option>');
					$BuildBacklinks_modal.find('tbody tr').each(function()
					{
						str = $(this).data('site-id');
						if (!~$.inArray(str, cbnames))
						{
							cbnames.push(str);
							$('.filter-websites').append('<option value="'+$(this).data('site-id')+'">'+$(this).data('site-id')+'</option>');
						}
					});
				}
			});
		}else{	

		}
		jQuery.ajax({
			url: base_url + "secure/campaigns/writer_list",
			type: "POST",
			data: {
				"type": links
			},
			success: function (response) {
				$('#publisher_writer').empty();
				$('#publisher_writer').text(response);
			}
		});
	});

	var $PublishersBacklink_modal = jQuery('#publishersBacklinkOutreachModal');
	jQuery(document).on('click', '.publishers-backlink-outreach', function (e) {
		e.preventDefault();
		//var campaign_niche = jQuery("#campaign_niche"). val();
		var campaign_websites = jQuery("#campaign_websites"). val();
		var campaign_type = jQuery("#campaign_type"). val();
		var campaign_id = jQuery('#campaign_id').val();
		if(campaign_websites != "" && campaign_type != "" ){
			jQuery.ajax({
				url: base_url + "secure/campaigns/publishers_list",
				type: "POST",
				data: {
					"websites": campaign_websites,
					"type": campaign_type,
					"campaign_id": campaign_id,
				},
				success: function (response) {
					//jQuery('.backlink-publishers').find('tbody').html(response); 
					$PublishersBacklink_modal.find('tbody').html(response); 
					$PublishersBacklink_modal.modal('show');
					var pub_data_id = new Array();
					jQuery('.publishers-row').each(function()
					{
						pub_data_id.push($(this).data('id'));
					});
					jQuery('.selected-outreach-publisher').each(function()
					{
						var pub_id = $(this).data('id');
						if(jQuery.inArray(pub_id, pub_data_id) !== -1)
						{
							$(this).text('Selected');
							$(this).removeClass('selected-outreach-publisher');
						}
					});				
				}
			});
		}
		else{
			alert('Please select the websites and type first.'); 
		}
	});

	function addArticles()
	{
		var campaign_quantity = jQuery("#campaign_quantity"). val();
		if(campaign_quantity == "" || campaign_quantity <= 0)
		{
			alert('Backlink Article Qty should be filled.');
			return false;
		}
		else
		{
		var html_str = ``;
		var del_row_check = 0;
		for(i=1; i<= campaign_quantity; i++  ){
			var mt = "";
			if( i == 1)
			{
				mt = "mt-2";
			}
			if($(".build-backlinks").find('.form-row-'+i).length == 0)
		    {
			    html_str +=`<div class="form-row-`+i+` backlink-row d-flex">
			    <div class="col-md-2 `+mt+`">
			    <label for="">Article `+i+`</label>
			    </div>
			    <div class="col-md-2 ` +mt+`"><label for="">Anchor Text </label></div>
				</div>`;
			}
			else
			{
				del_row_check++;
			}
		}
		if(del_row_check == 0)
		{
			html_str += `<div class="delete-row d-flex">
			<div class="col-md-2">
			<label for="">&nbsp; </label>
			</div>
			<div class="col-md-2 "><label for="">&nbsp; </label></div>
			</div>`;
		}
		if(jQuery(".build-backlinks .delete-row").length > 0)
		{
			jQuery(".delete-row").before(html_str);
		}
		else
		{
			jQuery(".build-backlinks").append(html_str);
		}
		return true;
	    }
	}
	// /* on blur of campaign quantity */
	// jQuery(document).on('blur', '#campaign_quantity', function(e) {
		
	// });

	jQuery(document).on('click','.selected-outreach-publisher',function (e) {
		var url = jQuery(this).data("publisher-url");
		var email = jQuery(this).data("publisher-email");
		var traffic = jQuery(this).data("traffic");
		var da = jQuery(this).data("da");
		var cost = jQuery(this).data("cost");
		var pub_id = jQuery(this).data("id");
		var response = "";
		var row = jQuery('.backlink-publishers').find('tr').length; 
		row = row - 1;
		response += '<tr class="publishers-row" data-id="'+pub_id+'" data-name="'+url+'"><td>'+url+'</td><td>'+traffic+'</td><td>'+da+'</td><td>'+cost+'</td><td><a target="_blank" href="https://zimbra.altametrics.com/mail?view=compose&to='+email+'&subject=&body=" class="publisher-email" data-publisher-email="'+email+'"><i class="fas fa-envelope"></i></a></td><td><button type="button" class="btn btn-link text-danger delete-publisher-row p-0"><i class="fas fa-times"></i></button></td></tr>';
		response += '<input type="hidden" name="campaign_publishers['+row+'][publisher_id]" value="'+pub_id+'" />';
		jQuery('.backlink-publishers').find('tbody').append(response); 
		
		
		if(jQuery('select[name*="publisher[]"]').length > 0)
		{
			var i = 0;
			jQuery('select[name*="publisher[]"]').each(function()
		    {
			    $(`#publisher_`+i).empty();
			    var str_pub = '<option value="">---Select---</option>';
			    $(".publishers-row").each(function()
		        {
				    str_pub += '<option value="'+$(this).data(`id`)+'">'+$(this).data(`name`)+'</option>';
		        });
			    $(`#publisher_`+i).append(str_pub);
			    i++;
		    });
		}
		$(this).text('Selected');
		$(this).removeClass('selected-outreach-publisher');
	});

	jQuery(document).on('click','.add-more-articles',function(event){
		event.stopImmediatePropagation();
		var current_obj=$(this);
		var data_json = JSON.stringify(current_obj.data('json'));
		var campaign_id = jQuery('#campaign_id').val();
		var article_list = [];
		var template = '';
		var selected_backlink = [];
		$(".backlink-articles-id").each(function() {
			selected_backlink.push($(this).val());
		});
		var campaign_websites = jQuery("#campaign_websites"). val();
		console.log(selected_backlink);
		if(campaign_websites){
			$('#loading-image').show();
			jQuery.ajax({
				url: base_url + "secure/campaigns/articles_build_backlinks_list",
				type: "POST",
				data: {
					"websites": campaign_websites,
					"selected_backlink": selected_backlink,
				},
				success: function (response) {
					$BuildBacklinks_modal.find('.modal-body').html(response); 
					$("input:checkbox[class=check_article_backlink]:checked").each(function () {
						article_list.push($(this).val());
						console.log($(this).val());
					});
					var article_json = [];
					var niche_type = $('#campaign_niche').val();
					var links = $('#campaign_type').val();
					if(niche_type == "" || links == "")
					{
						alert('Niche Type and Links should be selected to add backlinks.');
						return false;
					}
					var campaign_quantity = jQuery("#campaign_quantity"). val();
					campaign_quantity = parseInt(campaign_quantity) + 1;
					jQuery("#campaign_quantity"). val(campaign_quantity);
					if(article_list.length>1){
						article_json.push(data_json);
						template="col";
					}else{
						article_json = article_list;
					}
					article_json = article_list;
					jQuery.ajax({
						url: base_url + "secure/campaigns/get_all_backlink",
						type: "POST",
						data: {
							"article_list": article_json,
							"campaign_quantity": campaign_quantity,
							"niches": niche_type,
							"type": links,
							"template": template,
							"campaign_id" :campaign_id
						},
						success: function (response) {
							$('#backlink-list').html(response);
						}
					});
				},
				complete: function(){
					$('#loading-image').hide();
				}
			});
		}
		
		
	});
	
	jQuery(document).on('click', '.selected-build-backlink', function (event) {
		event.stopImmediatePropagation();
		var current_obj=$(this);
		var data_json = JSON.stringify(current_obj.data('json'));
		var campaign_id = jQuery('#campaign_id').val();
		console.log({data_json});
		var article_json =[];
		var template = '';
		setTimeout(function(){
			
			var niche_type = $('#campaign_niche').val();
		var links = $('#campaign_type').val();
		if(niche_type == "" || links == "")
		{
			alert('Niche Type and Links should be selected to add backlinks.');
			return false;
		}
		var article_list = [];

		$("input:checkbox[class=check_article_backlink]:checked").each(function () {
			article_list.push($(this).val());

		});
		console.log({article_list});
		var campaign_quantity = jQuery("#campaign_quantity"). val();
		if(article_list.length>1){
			article_json.push(data_json);
			template="col";
		}else{
			article_json = article_list;
		}
		article_json = article_list;
		console.log({article_json});
		jQuery.ajax({
			url: base_url + "secure/campaigns/get_all_backlink",
			type: "POST",
			data: {
				"article_list": article_json,
				"campaign_quantity": campaign_quantity,
				"niches": niche_type,
				"type": links,
				"template": template,
				"campaign_id" :campaign_id
			},
			success: function (response) {
				$('<span class="text-success font-weight-bold">Selected</span>').insertAfter(current_obj);
				// if(template=="col") {
				// 	$('#backlink-list .backlink-list-mid-col').append(response);
				// }else{
				// 	$('#backlink-list').html(response);
				// }
				$('#backlink-list').html(response);
				current_obj.remove();	
			}
		});
		
		  }, 500);
		//event.preventDefault();
		
		
		/*var url = jQuery(this).data("article-url");
		var article_id = jQuery(this).data("article-id");
		var keyword_str = jQuery(this).data("keyword-list");
		//var keyword_str = '';
		console.log(keyword);
		alert(keyword);
		var campaign_quantity = jQuery("#campaign_quantity"). val();
		var keyword=[];
		if(keyword_str){
			 keyword = keyword_str.split(',');	
		}else{
			for(i=1; i<= campaign_quantity; i++  ){
				keyword.push('');
			}
		}
		console.log('keyword',keyword);
		$('label').tooltip();
		//var html_temp = ``;
		var html_str1 = ``; // for publisher, writer, cost, notes information
		var writer = $('#publisher_writer').text();
		var publisher = '';
		$(".publishers-row").each(function()
		{
            publisher += '<option value="'+$(this).data(`id`)+'">'+$(this).data(`name`)+'</option>';
		});
		var k=0;
		for(i=1; i<= campaign_quantity; i++  ){
			
			if((k+1)== keyword.length){

			 k=0;

			}
			console.log({campaign_quantity, k, key:keyword[k]});
			var temp_num = jQuery(".form-row-"+i+" .col-md-3").length;
			//alert(temp_num);
			var pub_lbl = "";
			var wr_lbl = "";
			var len_lbl = "";
			var cost_lbl = "";
			var note_lbl = "";
			var html_str =`<div class="col-md-3 del-row-`+temp_num+` mb-1">`;
			if(i == 1)
			{
				pub_lbl = "<label>Publisher</label>";
				wr_lbl = "<label>Writer</label>";
				len_lbl = "<label>Length</label>";
				cost_lbl = "<label>Cost</label>";
				note_lbl = "<label>Notes</label>";
				html_str += `<label title="`+url+`">`+url.substring(0,14)+`..</label>`;
			}
			// if(temp_num == 0)
			// {
			
			// var writer = '';
			// if(writer_publisher_str)
			// {
			// 	var wp_ar = writer_publisher_str.split('##');
			// 	publisher = wp_ar[0];
			// 	writer = wp_ar[1];
			// }
			var cnt_writer = $('.build-writer-info > .form-row').length;
			if(cnt_writer < i)
			{
				var html_str1 = `<div class="form-row d-flex backlink-row">`;
				html_str1 += `<div class="col-md-3 mb-1">`+pub_lbl+`<select class="form-control select-2" name="publisher[]" id="publisher_`+i+`"><option value="">---Select---</option>`+publisher+`</select></div>`;
				html_str1 += `<div class="col-md-3 mb-1">`+wr_lbl+`<select class="form-control select-2" name="campaign_writer[]" id="campaign_writer_`+i+`"><option value="">---Select---</option>`+writer+`</select></div>`;
				html_str1 += `<div class="col-md-2 mb-1">`+len_lbl+`<input type="text" placeholder="Length" class="form-control col-md-12" name="length[]" id="length_`+i+`"></div>`;
				html_str1 += `<div class="col-md-2 mb-1">`+cost_lbl+`<input type="text" placeholder="Cost" class="form-control col-md-12" name="cost[]" id="cost_`+i+`"></div>`;
				html_str1 += `<div class="col-md-2 mb-1">`+note_lbl+`<input type="text" placeholder="Notes" class="form-control col-md-12" name="notes[]" id="notes_`+i+`"></div>`;
				html_str1 += `</div>`;
				jQuery(".build-writer-info").append(html_str1);
			}
			// }
			html_str += `<input type="hidden" class="form-control" id="backlinks-url-`+i+`-`+temp_num+`" name="backlinks[${i-1}][article_wp_url][]" placeholder="URL" value ="${url}" required>
			<input type="hidden" class="form-control backlink-articles-id" id="backlinks-wp-id-`+i+`-`+temp_num+`" name="backlinks[${i-1}][article_wp_id][]"  value ="${article_id}">`;
			html_str += `<input type="text" class="form-control" id="backlinks-anchor-text-`+i+`-`+temp_num+`" name="backlinks[${i-1}][article_anchortext][]" placeholder="Anchor text ${i}"  value ="${keyword[k]}" required>
			</div>`;
			jQuery(".form-row-"+i).append(html_str);
			var form_len_1 = $(".form-row-1 .col-md-3").length;
			var form_len_curr = $(".form-row-"+i+" .col-md-3").length;
			//console.log(form_len_curr);
			if(form_len_curr < form_len_1)
			{
				var new_add_col = "";
				$(`#backlinks-wp-id-`+i+`-0`).val($(`#backlinks-wp-id-1-0`).val());
				$(`#backlinks-url-`+i+`-0`).val($(`#backlinks-url-1-0`).val());
				for($jj=form_len_curr;$jj<form_len_1;$jj++)
				{	
					var article_id_get = $(`#backlinks-wp-id-1-`+$jj).val();
					var url_get = $(`#backlinks-url-1-`+$jj).val();
					new_add_col += `<div class="col-md-3 del-row-`+$jj+`"><input type="hidden" class="form-control" id="backlinks-url-`+i+`-`+$jj+`" name="backlinks[${i-1}][article_wp_url][]" placeholder="URL" value ="${url_get}" required>
					<input type="hidden" class="form-control" id="backlinks-wp-id-`+i+`-`+$jj+`" name="backlinks[${i-1}][article_wp_id][]"  value ="${article_id_get}">`;
					new_add_col += `<input type="text" class="form-control" id="backlinks-anchor-text-`+i+`-`+$jj+`" name="backlinks[${i-1}][article_anchortext][]" placeholder="Anchor text ${i}" value ="${keyword[k]}" required>
					</div>`;
				}
				jQuery(".form-row-"+i).append(new_add_col);
			}
			k++;
		}
		var del_btn_html = ``;
		if(html_str != ``)
		{
			var del_num = jQuery(".delete-row .col-md-3").length;
			del_btn_html += `<div class="col-md-3 del-row-`+del_num+` text-center">
			  	<label for=""></label>
			  	<a class="deleteBacklink" href="#" >
			  	<i class="fas fa-times text-danger fa-lg"></i>
		  		</a>
				</div>`;
			jQuery(".delete-row").append(del_btn_html);
		}
		// 	html_str +=`<div class="col pt-2 mt-1">
		// 	  <label for=""></label>
		// 	  <a class="deleteBacklink" href="#" >
		// 	  <i class="fas fa-times text-danger fa-lg"></i>
		//   </a>
		// 	</div>
		// </div>`;
		$(this).text('Selected');
		$(this).removeClass('selected-build-backlink');*/
	});

	jQuery(document).on('click', '.delete-backlink', function (e) {
		e.preventDefault();
		var backlink_id = jQuery(this).data("backlink-id");
		var column_id ="#backlink_column_"+backlink_id;
		jQuery(column_id).remove();
		var wp_articles_id = new Array();
		$('.backlink-wp-articles-id').each(function() {
			wp_articles_id.push($(this).val());
		});
		var col = jQuery(this).data('col');
		if(wp_articles_id){
			jQuery.ajax({
				url: base_url + "/secure/campaigns/delete_backlink",
				type: "POST",
				data: {
					"backlink_id": wp_articles_id,
					"col_index": col
				},
				success: function (response) {
					var c = 0;
					jQuery('.delete-backlink').each(function()
					{
						jQuery(this).attr('data-col',c);
						c++;
					});
					setFlashes(response.flashes.type, response.flashes.message);
				}
			});
		}
	});

	jQuery(document).on('click', '.deleteBacklink', function (e) {
		e.preventDefault();
		var backlink_row = jQuery(this).parents().attr('class').split(' ');
		//console.log(backlink_row[1]);
		var backlink_id = jQuery(this).data("backlink-id");
		//console.log(backlink_id);
		var col_id = jQuery(this).data("col-id");
		if(backlink_id){
			jQuery.ajax({
				url: base_url + "/secure/campaigns/delete_backlink",
				type: "POST",
				data: {
					"backlink_id": backlink_id,
					"col_index": col_id
				},
				success: function (response) {
					if(response.success ==1){
						//backlink_row.slideUp().remove();
						$('.'+backlink_row[1]).slideUp().remove();
					}
					setFlashes(response.flashes.type, response.flashes.message);
				}
			});
		}else{
			$('.'+backlink_row[1]).slideUp().remove();
		}
	});

	
	jQuery(document).on('click', '.send-to-all-publishers', function (e) {
			e.preventDefault();
			var emails = [];
			var count_mail = 0;
			jQuery('.publisher-email').each(function() {
				var email = jQuery(this).data( "publisher-email" );
				emails.push(email);

				count_mail++;
			  });
			  var publisher_email = $.map(emails, function(val,index) {
				var str = val;
				return str;
			 }).join(",");
		 if(publisher_email){
			var email = publisher_email;
			var subject = 'Test Mail For publishers';
			var emailBody = 'This is a test mail';
			window.open('https://zimbra.altametrics.com/mail?view=compose&to=&bcc=' +   email +'&subject=&body=','_blank');
		 }else{
            alert('Please first add the publishers.');
		 }
	});
	 
	jQuery(document).on('click', '.delete-publisher-row', function (e) {
		var i = 1;
		var delete_id = $(this).closest('tr').data('campaign_publsiher_id');
		if(delete_id)
		{
			jQuery.ajax({
				url: base_url + "/secure/campaigns/delete_campaign_publishers",
				type: "POST",
				data: {
					"delete_id": delete_id
				},
				success: function (response) {
					if(response.success ==1){
						$(`#row_`+delete_id).slideUp().remove();
					}
					setFlashes(response.flashes.type, response.flashes.message);
				}
			});
		}
		else
		{
			$(this).closest('tr').remove();
		}
		
		$('select[name*="publisher[]"]').each(function()
		{
			$(`#publisher_`+i).empty();
			var str_pub = '<option value="">---Select---</option>';
			$(".publishers-row").each(function()
		    {
				str_pub += '<option value="'+$(this).data(`id`)+'">'+$(this).data(`name`)+'</option>';
		    });
			$(`#publisher_`+i).append(str_pub);
			i++;
		});
	});

	jQuery(document).on('click', '.sidebar-toggle', function (e) {
		jQuery(".left-side-menu").toggle();
	  });

	  var $article_assign_modal = jQuery('#article-assign-modal');
	  jQuery(document).on('click', '.article-assign', function (e) {
		var writer = jQuery(this).data('writer');
		var brief_publisher_id = jQuery(this).data('publisher-id');
		var brief_campaign_id = jQuery(this).data('campaign-id');
		if(writer){
			$('#brief_article_writer option[value=""]').attr("selected", false);
			$('#brief_article_writer option[value="'+writer+'"]').attr("selected", true);
			//$("#brief_article_writer").prop('disabled', true);
		}
		$('#brief_publisher_id').val(brief_publisher_id);
		$('#brief_campaign_id').val(brief_campaign_id);
		  $article_assign_modal.modal('show');
	  });

	jQuery('#assign_article_form').validate({
		rules: {
			brief_article_writer: {
				required: true
			},
			brief_article_length: {
				required: true,
				digits: true
			},
			brief_article_cost: {
				required: true,
				digits: true
			}
		},
		submitHandler: function (form) {
			console.log(new FormData(form));
			var $post_form_data = new FormData(form);
			//console.log(new FormData($(form)));
			jQuery.ajax({
				url: base_url + "secure/articlesbrief/assignArticle",
				data: $(form).serialize(),
				type: "POST",
				success: function (data) {
					var data = data;
					$article_assign_modal.modal('hide');
					//$publish_article_error.html(data.message).slideDown();
					//$form_control.removeAttr("disabled");
					//$button.removeAttr("disabled");
					//$publish_modal.find('.modal-content').removeClass('be-loading-active');
					
				}
			});
		}
	});
	jQuery(document).on('click', '.delete-unassigned-article-row', function (e) {
		$(this).closest('tr').remove();
	});

	jQuery(document).on('click', '.delete-assigned-article-row', function (e) {
		e.preventDefault();
		var brief_id = jQuery(this).data("brief-id");
		var $target = $(this);
		
		if(brief_id){
			jQuery.ajax({
				url: base_url + "/secure/articlesbrief/delete_assigned_article",
				type: "POST",
				data: {
					"brief_id": brief_id,
				},
				success: function (response) {
					console.log(response);
					if(response.success ==1){
						$target.closest('tr').remove();
					}
					setFlashes(response.flashes.type, response.flashes.message);
				}
			});
		}else{
			
		}
		
	});


	/*jQuery( "#article_meta_lookup_id" )
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
	.change();*/

	jQuery('#keywordanalysis-form').validate({
		
		submitHandler: function (form) {
			console.log(new FormData(form));
			var $post_form_data = new FormData(form);
			//console.log(new FormData($(form)));
			jQuery.ajax({
				url: base_url + "secure/keywordanalysis/add",
				data: $(form).serialize(),
				type: "POST",
				success: function (response) {

					setFlashes(response.flashes.type, response.flashes.message);
					if(response.flashes.redirect){
						window.location = response.flashes.redirect;
					}
					
				}
			});
		}
	});
	jQuery('#cta_background_type').change(function(){
		var background_type = jQuery(this).val();
		if(background_type =='image'){

			jQuery(".background-show-image").show();
			jQuery(".background-show-video").hide();
			jQuery(".background-show-color").hide();

		}
		if(background_type =='video'){

			jQuery(".background-show-image").hide();
			jQuery(".background-show-video").show();
			jQuery(".background-show-color").hide();

		}
		if(background_type =='color'){

			jQuery(".background-show-image").hide();
			jQuery(".background-show-video").hide();
			jQuery(".background-show-color").show();

		}
	});
});

var showConfirmation = function (el) {

	var modal_icon_type = {
		'success': '<div class="f-modal-icon f-modal-success"><span class="f-modal-line f-modal-tip animateSuccessTip"></span><span class="f-modal-line f-modal-long animateSuccessLong"></span><div class="f-modal-placeholder"></div><div class="f-modal-fix"></div></div>',
		'warning': '<div class="f-modal-icon f-modal-warning scaleWarning"><span class="f-modal-body pulseWarningIns"></span><span class="f-modal-dot pulseWarningIns"></span></div>',
		'error': '<div class="f-modal-icon f-modal-error"><span class="f-modal-x-mark"><span class="f-modal-line f-modal-left animateXLeft"></span><span class="f-modal-line f-modal-right animateXRight"></span></span><div class="f-modal-placeholder"></div><div class="f-modal-fix"></div></div>',
	};
	var icon_type = jQuery(el).data('icon-type');
	var title = jQuery(el).data('title');
	var message = jQuery(el).data('message');
	var message = jQuery(el).data('message');
	var confirmText = jQuery(el).data('confirm-text');
	var confirmClass = jQuery(el).data('confirm-class');
	var confirmAction = jQuery(el).attr('href');
	var confirmCallback = jQuery(el).data('confirm-callback');
	var cancelText = jQuery(el).data('cancel-text');
	var cancelCallback = jQuery(el).data('cancel-callback');
	var cancelClass = jQuery(el).data('cancel-class');
	var datatableName = jQuery(el).data('datatable-name');
	var confirmContainer = jQuery("<div />").attr({
		"class": "modal fade confirmation-modal"
	});
	var confirmDialogDiv = jQuery("<div />").attr({
		"class": "modal-dialog modal-confirm"
	});
	var confirmContentDiv = jQuery("<div />").attr({
		"class": "modal-content be-loading"
	});
	var confirmBodyDiv = jQuery("<div />").attr({
		"class": "modal-body d-flex justify-content-center"
	});
	var confirmFooterDiv = jQuery("<div />").attr({
		"class": "modal-footer modal-footer-borderless justify-content-center"
	});
	var confirmHeaderDiv = ""; //jQuery("<div />").attr({"class": "modal-header"});
	var confirmBodyDivContent = jQuery("<div>").attr({
		"class": "mt-2 w-75"
	});

	if (typeof icon_type !== 'undefined') {
		confirmBodyDivContent.append('<div class="f-modal-alert">' + modal_icon_type[icon_type] + '</div>');
	}

	confirmBodyDivContent.append(jQuery('<h3 />').attr({
		"class": "h1 mt-1 mb-2 text-center"
	}).html(title));

	confirmBodyDivContent.append(jQuery('<p />').attr({
		"class": "text-center text-muted"
	}).html(message));

	confirmBodyDiv.append(confirmBodyDivContent);

	var confirmButton = jQuery('<button type="button" />')
		.addClass("btn " + confirmClass + " ml-1 mt-1 mb-2")
		.click(function () {
			confirmContentDiv.addClass('be-loading-active');
			jQuery.ajax({
				url: confirmAction,
				type: "POST",
				dataType: "json",
				success: function (response) {
					window[confirmCallback].apply('window', [jQuery(el), response]);
					confirmContentDiv.removeClass('be-loading-active');
				}
			});
		})
		.html(confirmText);
	if (cancelText) {
		var cancelButton = jQuery('<button type="button" />')
			.addClass("btn " + cancelClass + " mt-1 mb-2")
			.click(function () {
				window[cancelCallback].apply('window', []);
			})
			.html(cancelText);
	}

	if (typeof cancelButton != 'undefined') {
		confirmFooterDiv.append(cancelButton);
	}

	confirmFooterDiv.append(confirmButton);
	confirmContentDiv.append(confirmHeaderDiv);
	confirmContentDiv.append(confirmBodyDiv);
	confirmContentDiv.append(confirmFooterDiv);
	confirmContentDiv.append('<div class="be-spinner"><svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://-www.w3.org/2000/svg"><circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');

	confirmContainer.append(confirmDialogDiv.append(confirmContentDiv));
	jQuery('body').append(confirmContainer);

	jQuery('.confirmation-modal').on('hidden.bs.modal', function () {
		jQuery(this).remove();
	});

	jQuery('.confirmation-modal').modal('show');
};
var repeaterReload = function (object, response) {
	if(response.success ==1){
		var target = jQuery(object).data('target');
		jQuery(target).fadeTo(700, 0).slideUp(500, function () {
			jQuery(this).remove();
		});
	}
	setFlashes(response.flashes.type, response.flashes.message);
	dismissConfirmation();
};
var executeAction = function (object, response) {
	var target = jQuery(object).data('target');
	dismissConfirmation();
	window.location = target;
};
var datatableReload = function (object, response) {
	var tableName = jQuery(object).data('target');
	if ($.fn.dataTable.isDataTable(tableName)) {
		jQuery(tableName).DataTable().draw(false);
	};
	setFlashes(response.flashes.type, response.flashes.message);
	dismissConfirmation();
};

var dismissConfirmation = function () {
	if (jQuery('.confirmation-modal').length) {
		jQuery('.confirmation-modal').modal('hide');
	}
};
jQuery(document).on('click','.copy-clipboard', function(){
	var a_class = $(this).data('text');
	const link = document.querySelector('.copy-clipboard > a.hide-'+a_class);
	const range = document.createRange();
	range.selectNode(link);
	const selection = window.getSelection();
	selection.removeAllRanges();
	selection.addRange(range);
	const successful = document.execCommand('copy');
	return false;
});

/* on document ready state change and set the content works while creating or editing the article to set the current use of content*/
jQuery(document).ready(function(e)
{
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
	var r_score = 0.00
	if(read_score.automatedReadabilityIndex > 0)
		r_score = read_score.automatedReadabilityIndex
	$('.backlinks-used-count').text($('.backlinks-used').length);
	$('.word-on-page').text(page_content.split(" ").length - 1);
	$('.read-score').text(r_score);
});

/* check the backlinks in the used or not used on change of heading or paragraphs*/
jQuery('.seo-content-keywords').on('blur', function(event)
{
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
	var r_score = 0.00
	if(read_score.automatedReadabilityIndex > 0)
		r_score = read_score.automatedReadabilityIndex
	$('.backlinks-used-count').text($('.backlinks-used').length);
	$('.word-on-page').text(page_content.split(" ").length - 1);
	$('.read-score').text(r_score);
});
jQuery(document).on('click', "button[name=submitForm]",function (e){
	var form_action = $(this).val();
	if(form_action == "publish")
	{
		var brief_live_url = $("input[name=brief_live_url]").val();
		if(brief_live_url == "" || brief_live_url == null || brief_live_url.length == 0)
		{
			alert("Live URL is missing.");
			return false;
		}
		else
		{
			var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/g;
			if(!regex.test(brief_live_url))
			{
				alert('Invalid URL found in live url');
				return false;
			}
			else
			{
				return true;
			}
		}
	}
	return true;
});
jQuery(document).on('blur', "#publisher_url",function (e){
	var url = $('#publisher_url').val();
	jQuery.ajax({
		url: base_url + "secure/publishers/semrush_api",
		type: "POST",
		data: {
			"url": url
		},
		dataType: "json",
		success: function (response) {
			$('#publisher_url_domainauthority').val(response['da']);
			$('#publisher_url_referringdomains').val(response['rd']);
			$('#publisher_url_domainauthority').attr('readonly',true);
			$('#publisher_url_referringdomains').attr('readonly',true);
			if(response['da'] > 0 && response['rd'] > 0)
				$('#publisher_status').val('Active').trigger('change');
			else
				$('#publisher_status').val('Fetching SEO Metrics').trigger('change');
		}
	});
});
