(function ($) {
    'use strict';

   // My plugin default options
    var defaultOptions = {
        article_id: null,
        article_type: 'article',
        article_lang: 'en',
        'json': {}
    };


    // If my plugin is a button
    function buildButtonDef(trumbowyg) {
        return {
            fn: function () {
				if(hyperLinkLimitExceeded()){
					return false;
				}
                trumbowyg.saveRange();
                var skyscraperList =  defaultOptions.json;
                
                var modal_html = '<div class="table-responsive text-left" style="max-height:300px">';
                    modal_html += '<table class="table table-hover table-sm table-bordered">';
                    modal_html += '<thead>';
                    modal_html += '<tr>';
                    modal_html += '<th class="border-left-0">Site</th>';
                    modal_html += '<th class="border-left-0">Type</th>';
                    modal_html += '<th class="">Article Title</th>';
                    modal_html += '<th class="border-right-0"></th>';
                    modal_html += '</tr>';
                    modal_html += '</thead>';
                    modal_html += '<tbody>';

                    $.each(skyscraperList, function( index, value ) {
                        modal_html += '<tr>';
                        modal_html += '<td class="border-left-0">'+value.site+'</td>';
                        modal_html += '<td class="border-left-0">'+value.type+'</td>';
                        modal_html += '<td>'+value.title+'</td>';
                        modal_html += '<td class="border-right-0"><a href="#newconsdfds" data-skyscraper="'+value.title+'" data-link="'+value.url+'" class="selected">Select</a></td>';
                        modal_html += '</tr>';
                        modal_html += '<tr>';
                    });
                    
                    modal_html += '</tbody>';
                    modal_html += '</table>';
                    modal_html += '</div>';
                    var modal_title = 'Skyscraper Articles';
                    if(trumbowyg.o.plugins.skyscraper.article_type == 'pillar' || trumbowyg.o.plugins.skyscraper.article_type == 'supporting'){
                        modal_title= 'Link To Topic cluster Articles';
                    }
                var $modal = trumbowyg.openModal(modal_title, [modal_html,].join('\n'));
                $modal.find('.trumbowyg-modal-submit').remove();
                $modal.addClass('trumbowyg-modal-skyscraper-box');
                // Listen clicks on modal box buttons
                $modal.on('click','.selected', function (event) {
                    event.preventDefault();
                    var data_link  = $(this).attr('data-link');
                    var data_title = $(this).attr('data-skyscraper');
                    //alert(trumbowyg.getRangeText());
                    var node = $('<a  href="' + data_link + '" data-skyscraper="'+data_title+'">' + trumbowyg.getRangeText() + '</a>')[0];
                    trumbowyg.range.deleteContents();
                    trumbowyg.range.insertNode(node);
                    trumbowyg.syncCode();
                    trumbowyg.$c.trigger('tbwchange');
                    trumbowyg.closeModal();
                    
                });
                $modal.on('tbwconfirm', function () {                     
                    trumbowyg.closeModal();
                });

                $modal.on('tbwcancel', function () {
                    trumbowyg.closeModal();
                });
            }
        };
    }

    $.extend(true, $.trumbowyg, {
        // Add some translations
        langs: {
            en: {
                skyscraper: 'Add Skyscraper Article'
            }
        },
        // Add our plugin to Trumbowyg registred plugins
        plugins: {
            skyscraper: {
                init: function (trumbowyg) {
                    
                    // Fill current Trumbowyg instance with my plugin default options
                    trumbowyg.o.plugins.skyscraper = $.extend(true, {},
                        defaultOptions,
                        trumbowyg.o.plugins.skyscraper || {}
                    );
                    if(trumbowyg.o.plugins.skyscraper.article_type){

                        var arti_type = trumbowyg.o.plugins.skyscraper.article_type;
                        if(arti_type == 'news'){
                            arti_type = 'pressrelease';
                        }

                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: base_url + arti_type +"/getAllSkyscraperArticles",
                            data: { articleid: trumbowyg.o.plugins.skyscraper.article_id, articletype: trumbowyg.o.plugins.skyscraper.article_type, articlelang: trumbowyg.o.plugins.skyscraper.article_lang },
                            datatype: 'json',
                            success: function (data) {
                                defaultOptions.json = jQuery.parseJSON(data)              
                            }
                        });

                    }else{
                        $.ajax({
                            type: "POST",
                            cache: true,
                            url: base_url + "article/getAllSkyscraperArticles",
                            data: { articleid: null, articletype: 'article', articlelang: 'en' },
                            datatype: 'json',
                            success: function (data) {
                                defaultOptions.json = jQuery.parseJSON(data)              
                            }
                        });

                    }
                    
                    // If my plugin is a button
                    trumbowyg.addBtnDef('skyscraper', buildButtonDef(trumbowyg));
                }
            }
        }
    });
})(jQuery);
