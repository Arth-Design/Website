(function($){
	"use strict";
	
	$(document).ready(function() {
		//plugins init goes here
		edgtfInitSelectChange();
		edgtfInitSwitch();
		edgtfInitTooltips();
		edgtfInitColorpicker();
		edgtfInitMediaUploader();
		edgtfInitGalleryUploader();
		if ($('.edgtf-page-form').length > 0) {
			edgtfInitAjaxForm();
			edgtfAnchorSelectOnLoad();
			edgtfScrollToAnchorSelect();
			initTopAnchorHolderSize();
			edgtCheckVisibilityOfAnchorButtons();
			edgtfCheckVisibilityOfAnchorOptions();
			edgtCheckAnchorsOnDependencyChange();
			edgtfCheckOptionAnchorsOnDependencyChange();
			edgtChangedInput();
			edgtFixHeaderAndTitle();
			totop_button();
			backButtonShowHide();
			backToTop();
            edgtfInitSelectPicker();
		}
		edgtfInitPortfolioImagesVideosBox();
		edgtInitPortfolioMediaAcc();
		edgtfInitPortfolioItemsBox();
		edgtInitPortfolioItemAcc();
        edgtInitSlideElementItemAcc();
        edgtfInitSlideElementItemsBox();
		edgtfInitDatePicker();
		edgtfShowHidePostFormats();
		edgtfPageTemplatesMetaBoxDependency();
		edgtfRepeater();
		edgtfInitImportContent();
    });
	
	$(window).on('load', function () {
		edgtfShowHidePostFormatsGutenberg();
	});

	function edgtFixHeaderAndTitle () {
		var pageHeader 				= $('.edgtf-page-header');
		var pageHeaderHeight		= pageHeader.height();
		var adminBarHeight			= $('#wpadminbar').height();
		var pageHeaderTopPosition 	= pageHeader.offset().top - parseInt(adminBarHeight);
		var pageTitle				= $('.edgtf-page-title');
		var pageTitleTopPosition	= pageHeaderHeight + adminBarHeight - parseInt(pageTitle.css('marginTop'));
		var tabsNavWrapper			= $('.edgtf-tabs-navigation-wrapper');
		var tabsNavWrapperTop		= pageHeaderHeight;
		var tabsContentWrapper	    = $('.edgtf-tab-content');
		var tabsContentWrapperTop	= pageHeaderHeight + pageTitle.outerHeight();

		$(window).on('scroll load', function() {
			if($(window).scrollTop() >= pageHeaderTopPosition) {
				pageHeader.addClass('edgt-header-fixed').css('top', parseInt(adminBarHeight));
				pageTitle.addClass('edgt-page-title-fixed').css('top', pageTitleTopPosition);
				tabsNavWrapper.css('marginTop', tabsNavWrapperTop);
				tabsContentWrapper.css('marginTop', tabsContentWrapperTop);
			} else {
				pageHeader.removeClass('edgt-header-fixed').css('top', 0);
				pageTitle.removeClass('edgt-page-title-fixed').css('top', 0);
				tabsNavWrapper.css('marginTop', 0);
				tabsContentWrapper.css('marginTop', 0);
			}
		});
	}

	function initTopAnchorHolderSize() {
		function initTopSize() {
			var optionsPageHolder = $('.edgtf-options-page');
			var anchorAndSaveHolder = $('.edgtf-top-section-holder');
			var pageTitle = $('.edgtf-page-title');
			var tabsContentWrapper = $('.edgtf-tabs-content');

			anchorAndSaveHolder.css('width', optionsPageHolder.width() - parseInt(anchorAndSaveHolder.css('margin-left')));
			pageTitle.css('width', tabsContentWrapper.outerWidth());
		}

		initTopSize();

		$(window).on('resize', function() {
			initTopSize();
		});
	}

	function edgtfScrollToAnchorSelect() {
		var selectAnchor = $('#edgtf-select-anchor');
		selectAnchor.on('change', function() {
			var selectAnchor = $('option:selected', selectAnchor);
			if(typeof selectAnchor.data('anchor') !== 'undefined') {
				edgtfScrollToPanel(selectAnchor.data('anchor'));
			}
		});
	}

	function edgtfAnchorSelectOnLoad() {
		var currentPanel = window.location.hash;
		if(currentPanel) {
			var selectAnchor = $('#edgtf-select-anchor');
			var currentOption = selectAnchor.find('option[data-anchor="'+currentPanel+'"]').first();

			if(currentOption) {
				currentOption.attr('selected', 'selected');
			}
		}

	}

	function edgtfScrollToPanel(panel) {
		var pageHeader 				= $('.edgtf-page-header');
		var pageHeaderHeight		= pageHeader.height();
		var adminBarHeight			= $('#wpadminbar').height();
		var pageTitle				= $('.edgtf-page-title');
		var pageTitleHeight			= pageTitle.outerHeight();

		var panelTopPosition = $(panel).offset().top - adminBarHeight - pageHeaderHeight - pageTitleHeight;

		$('html, body').animate({
			scrollTop: panelTopPosition
		}, 1000);

		return false;
	}

	function totop_button(a) {
		var b = $("#back_to_top");
		b.removeClass("off on");
		if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }
	}

	function backButtonShowHide(){
		$(window).scroll(function () {
			var b = $(this).scrollTop();
			var c = $(this).height();
			var d;
			if (b > 0) { d = b + c / 2; } else { d = 1; }
			if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }
		});
	}

	function backToTop(){
		$(document).on('click','#back_to_top',function(){
			$('html, body').animate({
				scrollTop: $('html').offset().top}, 1000);
			return false;
		});
	}


	function edgtChangedInput () {
		$('.edgtf-tabs-content').on('change keyup keydown', 'input:not([type="submit"]), textarea, select', function (e) {
			$('.edgtf-input-change').addClass('yes');
		});
		$('.field.switch label:not(.selected)').on('click', function() {
			$('.edgtf-input-change').addClass('yes');
		});
		$(window).on('beforeunload', function () {
			if ($('.edgtf-input-change.yes').length) {
				return 'You haven\'t saved your changes.';
			}
		});
		$('#anchornav input').on('click',function() {
			if ($('.edgtf-input-change.yes').length) {
				$('.edgtf-input-change.yes').removeClass('yes');
			}
			$('.edgtf-changes-saved').addClass('yes');
			setTimeout(function(){$('.edgtf-changes-saved').removeClass('yes');}, 3000);
		});
	}

	function edgtCheckVisibilityOfAnchorButtons () {

		$('.edgtf-page-form > div:hidden').each( function() {
			var $panelID =  $(this).attr('id');
			$('#anchornav a').each ( function() {
				if ($(this).attr('href') === '#'+$panelID) {
					$(this).parent().hide();//hide <li>s
				}
			});
		});
	}

	function edgtfCheckVisibilityOfAnchorOptions() {
		$('.edgtf-page-form > div:hidden').each( function() {
			var $panelID =  $(this).attr('id');
			$('#edgtf-select-anchor option').each ( function() {
				if ($(this).data('anchor') === '#'+$panelID) {
					$(this).hide();//hide <li>s
				}
			});
		});
	}

	function edgtfGetArrayOfHiddenElements(changedElement) {
		var hidden_elements_string = changedElement.data('hide');
		var hidden_elements_array = new Array(hidden_elements_string);
		if(typeof hidden_elements_string !== 'undefined' && hidden_elements_string.indexOf(",") >= 0) {
			hidden_elements_array = hidden_elements_string.split(',');
		}

		return hidden_elements_array;
	}

	function edgtfGetArrayOfShownElements(changedElement) {
		//check for links to show
		var shown_elements_string = changedElement.data('show');
		var shown_elements_array = new Array(shown_elements_string);
		if(typeof shown_elements_string !== 'undefined' && shown_elements_string.indexOf(",") >= 0) {
			shown_elements_array = shown_elements_string.split(',');
		}

		return shown_elements_array;
	}
	
	function edgtfGetArrayOfHiddenElementsSelectBox(changedElement,changedElementValue) {
        var hidden_elements_string = changedElement.data('hide-'+changedElementValue);
		var hidden_elements_array = new Array(hidden_elements_string);
        if(typeof hidden_elements_string !== 'undefined' && hidden_elements_string.indexOf(",") >= 0) {
            hidden_elements_array = hidden_elements_string.split(',');
        }

        return hidden_elements_array;
    }

    function edgtfGetArrayOfShownElementsSelectBox(changedElement,changedElementValue) {
        //check for links to show
        var shown_elements_string = changedElement.data('show-'+changedElementValue);
	    var shown_elements_array = new Array(shown_elements_string);
        if(typeof shown_elements_string !== 'undefined' && shown_elements_string.indexOf(",") >= 0) {
            shown_elements_array = shown_elements_string.split(',');
        }

        return shown_elements_array;
    }

	function edgtCheckAnchorsOnDependencyChange(){
		$(document).on('click','.cb-enable.dependence, .cb-disable.dependence',function(){
			var hidden_elements_array = edgtfGetArrayOfHiddenElements($(this));
			var shown_elements_array  = edgtfGetArrayOfShownElements($(this));

			//show all buttons, but hide unnecessary ones
			$.each(hidden_elements_array, function(index, value){
				$('#anchornav a').each ( function() {

					if ($(this).attr('href') === value) {
						$(this).parent().hide();//hide <li>s
					}
				});
			});
			$.each(shown_elements_array, function(index, value){
				$('#anchornav a').each ( function() {
					if ($(this).attr('href') === value) {
						$(this).parent().show();//show <li>s
					}
				});
			});
		});
		
		$(document).on('change','.edgtf-form-element.dependence',function(){
            var hidden_elements_array = edgtfGetArrayOfHiddenElementsSelectBox($(this),$(this).val());
            var shown_elements_array  = edgtfGetArrayOfShownElementsSelectBox($(this),$(this).val());

            //show all buttons, but hide unnecessary ones
            $.each(hidden_elements_array, function(index, value){
                $('#anchornav a').each ( function() {

                    if ($(this).attr('href') === value) {
                        $(this).parent().hide();//hide <li>s
                    }
                });
            });
            $.each(shown_elements_array, function(index, value){
                $('#anchornav a').each ( function() {
                    if ($(this).attr('href') === value) {
                        $(this).parent().show();//show <li>s
                    }
                });
            });
        });
	}

	function edgtfCheckOptionAnchorsOnDependencyChange() {
		$(document).on('click','.cb-enable.dependence, .cb-disable.dependence',function(){
			var hidden_elements_array = edgtfGetArrayOfHiddenElements($(this));
			var shown_elements_array  = edgtfGetArrayOfShownElements($(this));

			//show all buttons, but hide unnecessary ones
			$.each(hidden_elements_array, function(index, value){
				$('#edgtf-select-anchor option').each ( function() {

					if ($(this).data('anchor') === value) {
						$(this).hide();//hide option
					}
				});
			});
			$.each(shown_elements_array, function(index, value){
				$('#edgtf-select-anchor option').each ( function() {
					if ($(this).data('anchor') === value) {
						$(this).show();//show option
					}
				});
			});

			$('#edgtf-select-anchor').selectpicker('refresh');
		});
		
		$(document).on('change','.edgtf-form-element.dependence',function(){
            var hidden_elements_array = edgtfGetArrayOfHiddenElementsSelectBox($(this),$(this).val());
            var shown_elements_array  = edgtfGetArrayOfShownElementsSelectBox($(this),$(this).val());

            //show all buttons, but hide unnecessary ones
            $.each(hidden_elements_array, function(index, value){
                $('#edgtf-select-anchor option').each ( function() {

                    if ($(this).data('anchor') === value) {
                        $(this).hide();//hide option
                    }
                });
            });
            $.each(shown_elements_array, function(index, value){
                $('#edgtf-select-anchor option').each ( function() {
                    if ($(this).data('anchor') === value) {
                        $(this).show();//show option
                    }
                });
            });

            $('#edgtf-select-anchor').selectpicker('refresh');
        });
	}

	function edgtfInitSelectChange() {
		$('select.dependence').on('change', function () {
			var valueSelected = this.value.replace(/ /g, '');
			$($(this).data('hide-'+valueSelected)).fadeOut();
			$($(this).data('show-'+valueSelected)).fadeIn();
		});
	}

	function edgtfInitSwitch() {
		$(".cb-enable").on('click',function(){
			var parent = $(this).parents('.switch');
			$('.cb-disable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('checked', true);
			$('.checkboxhidden_yesno',parent).val("yes");
			$('.checkboxhidden_onoff',parent).val("on");
			$('.checkboxhidden_portfoliofollow',parent).val("portfolio_single_follow");
			$('.checkboxhidden_zeroone',parent).val("1");
			$('.checkboxhidden_imagevideo',parent).val("image");
			$('.checkboxhidden_yesempty',parent).val("yes");
			$('.checkboxhidden_flagpost',parent).val("post");
			$('.checkboxhidden_flagpage',parent).val("page");
			$('.checkboxhidden_flagmedia',parent).val("attachment");
			$('.checkboxhidden_flagportfolio',parent).val("portfolio_page");
			$('.checkboxhidden_flagproduct',parent).val("product");
		});
		$(".cb-disable").on('click',function(){
			var parent = $(this).parents('.switch');
			$('.cb-enable',parent).removeClass('selected');
			$(this).addClass('selected');
			$('.checkbox',parent).attr('checked', false);
			$('.checkboxhidden_yesno',parent).val("no");
			$('.checkboxhidden_onoff',parent).val("off");
			$('.checkboxhidden_portfoliofollow',parent).val("portfolio_single_no_follow");
			$('.checkboxhidden_zeroone',parent).val("0");
			$('.checkboxhidden_imagevideo',parent).val("video");
			$('.checkboxhidden_yesempty',parent).val("");
			$('.checkboxhidden_flagpost',parent).val("");
			$('.checkboxhidden_flagpage',parent).val("");
			$('.checkboxhidden_flagmedia',parent).val("");
			$('.checkboxhidden_flagportfolio',parent).val("");
			$('.checkboxhidden_flagproduct',parent).val("");
		});
		$(".cb-enable.dependence").on('click',function(){
			$($(this).data('hide')).fadeOut();
			$($(this).data('show')).fadeIn();
		});
		$(".cb-disable.dependence").on('click',function(){
			$($(this).data('hide')).fadeOut();
			$($(this).data('show')).fadeIn();
		});
	}

	function edgtfInitTooltips() {
		$('.edgtf-tooltip').tooltip();
	}

	function edgtfInitColorpicker() {
		$('.edgtf-page .my-color-field').wpColorPicker({
			change:    function() {
				$('.edgtf-input-change').addClass('yes');
			}
		});
	}

	function edgtfInitMediaUploader() {
		if($('.edgtf-media-uploader').length) {
			$('.edgtf-media-uploader').each(function() {
				var fileFrame;
				var uploadUrl;
				var uploadHeight;
				var uploadWidth;
				var uploadImageHolder;
				var attachment;
				var removeButton;

				//set variables values
				uploadUrl           = $(this).find('.edgtf-media-upload-url');
				uploadHeight        = $(this).find('.edgtf-media-upload-height');
				uploadWidth        = $(this).find('.edgtf-media-upload-width');
				uploadImageHolder   = $(this).find('.edgtf-media-image-holder');
				removeButton        = $(this).find('.edgtf-media-remove-btn');

				if (uploadImageHolder.find('img').attr('src') !== "") {
					removeButton.show();
					edgtfInitMediaRemoveBtn(removeButton);
				}

				$(this).on('click', '.edgtf-media-upload-btn', function() {
					//if the media frame already exists, reopen it.
					if (fileFrame) {
						fileFrame.open();
						return;
					}

					//create the media frame
					fileFrame = wp.media.frames.fileFrame = wp.media({
						title: $(this).data('frame-title'),
						button: {
							text: $(this).data('frame-button-text')
						},
						multiple: false
					});

					//when an image is selected, run a callback
					fileFrame.on( 'select', function() {
						attachment = fileFrame.state().get('selection').first().toJSON();
						removeButton.show();
						edgtfInitMediaRemoveBtn(removeButton);
						//write to url field and img tag
						if(attachment.hasOwnProperty('url') && attachment.hasOwnProperty('sizes')) {
							uploadUrl.val(attachment.url);
							if (attachment.sizes.thumbnail) {
								uploadImageHolder.find('img').attr('src', attachment.sizes.thumbnail.url);
							} else {
								uploadImageHolder.find('img').attr('src', attachment.url);
							}
							
							uploadImageHolder.show();
						} else if (attachment.hasOwnProperty('url')) {
							uploadUrl.val(attachment.url);
							uploadImageHolder.find('img').attr('src', attachment.url);
							uploadImageHolder.show();
						}

						//write to hidden meta fields
						if(attachment.hasOwnProperty('height')) {
							uploadHeight.val(attachment.height);
						}

						if(attachment.hasOwnProperty('width')) {
							uploadWidth.val(attachment.width);
						}
						$('.edgtf-input-change').addClass('yes');
					});

					//open media frame
					fileFrame.open();
				});
			});
		}

		function edgtfInitMediaRemoveBtn(btn) {
			btn.on('click', function() {
				//remove image src and hide it's holder
				btn.siblings('.edgtf-media-image-holder').hide();
				btn.siblings('.edgtf-media-image-holder').find('img').attr('src', '');

				//reset meta fields
				btn.siblings('.edgtf-media-meta-fields').find('input[type="hidden"]').each(function() {
					$(this).val('');
				});

				btn.hide();
			});
		}
	}

	function edgtfInitGalleryUploader() {
		var $edgtf_upload_button = jQuery('.edgtf-gallery-upload-btn');
		var $edgtf_clear_button = jQuery('.edgtf-gallery-clear-btn');
		var $thumbs_wrap;
		var $input_gallery_items;
		
		wp.media.customlibEditGallery1 = {

			frame: function() {

				if ( this._frame ) {
					return this._frame;
				}

				var selection = this.select();

				this._frame = wp.media({
					id: 'edgt_portfolio-image-gallery',
					frame: 'post',
					state: 'gallery-edit',
					title: wp.media.view.l10n.editGalleryTitle,
					editing: true,
					multiple: true,
					selection: selection
				});

				this._frame.on('update', function() {

					var controller = wp.media.customlibEditGallery1._frame.states.get('gallery-edit');
					var library = controller.get('library');
					// Need to get all the attachment ids for gallery
					var ids = library.pluck('id');

					$input_gallery_items.val(ids);
					
					var data = {
						action: 'ratio_edge_gallery_upload_get_images',
						ids: ids,
						post_name: $input_gallery_items.attr('name'),
						gallery_upload_get_images: $('#edgtf_gallery_upload_get_images_' + $input_gallery_items.attr('name')).val()
					};
					
					jQuery.ajax({
						type: "post",
						url: ajaxurl,
						data: data,
						success: function(data) {

							$thumbs_wrap.empty().html(data);

						}
					});

				});

				return this._frame;
			},

			init: function() {

				$edgtf_upload_button.on('click',function(event) {

					$thumbs_wrap = $(this).parent().prev().prev();
					$input_gallery_items = $thumbs_wrap.next();

					event.preventDefault();
					wp.media.customlibEditGallery1.frame().open();

				});

				$edgtf_clear_button.on('click',function(event) {

					$thumbs_wrap = $edgtf_upload_button.parent().prev().prev();
					$input_gallery_items = $thumbs_wrap.next();

					event.preventDefault();
					$thumbs_wrap.empty();
					$input_gallery_items.val("");
				});
			},

			// Gets initial gallery-edit images. Function modified from wp.media.gallery.edit
			// in wp-includes/js/media-editor.js.source.html
			select: function() {

				var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'),
					defaultPostId = wp.media.gallery.defaults.id,
					attachments, selection;

				// Bail if we didn't match the shortcode or all of the content.
				if (!shortcode) {
					return;
				}

				// Ignore the rest of the match object.
				shortcode = shortcode.shortcode;

				if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId)) {
					shortcode.set('id', defaultPostId);
				}

				attachments = wp.media.gallery.attachments(shortcode);
				selection = new wp.media.model.Selection(attachments.models, {
					props: attachments.props.toJSON(),
					multiple: true
				});

				selection.gallery = attachments.gallery;

				// Fetch the query's attachments, and then break ties from the
				// query to allow for sorting.
				selection.more().done(function() {
					// Break ties with the query.
					selection.props.set({
						query: false
					});
					selection.unmirror();
					selection.props.unset('orderby');
				});

				return selection;

			}

		};
		$(wp.media.customlibEditGallery1.init);
	}

	function edgtInitPortfolioItemAcc() {
		//remove portfolio item
		$(document).on('click', '.remove-portfolio-item', function(event) {
			event.preventDefault();
			var $toggleHolder = $(this).parent().parent().parent();
			$toggleHolder.fadeOut(300,function() {
				$(this).remove();

				//after removing portfolio image, set new rel numbers and set new ids/names
				$('.edgtf-portfolio-additional-item').each(function(i){
					$(this).attr('rel',i+1);
					$(this).find('.number').text($(this).attr('rel'));
					edgtfSetIdOnRemoveItem($(this),i+1);
				});
				//hide expand all button if all items are removed
				noPortfolioItemShown();
			});
			return false;
		});

		//hide expand all button if there is no items
		noPortfolioItemShown();
		function noPortfolioItemShown()  {
			if($('.edgtf-portfolio-additional-item').length === 0){
				$('.edgtf-toggle-all-item').hide();
			}
		}

		//expand all additional sidebar items on click on 'expand all' button
		$(document).on('click', '.edgtf-toggle-all-item', function(event) {
			event.preventDefault();
			$('.edgtf-portfolio-additional-item').each(function(i){

				var $toggleContent = $(this).find('.edgtf-portfolio-toggle-content');
				var $this = $(this).find('.toggle-portfolio-item');
				if (!$toggleContent.is(':visible')) {
					$toggleContent.slideToggle();
					$this.html('<i class="fa fa-caret-down"></i>');
				}
			});
			return false;
		});
		//toggle for portfolio additional sidebar items
		$(document).on('click', '.edgtf-portfolio-additional-item .edgtf-portfolio-toggle-holder', function(event) {
			event.preventDefault();

			var $this = $(this);
			var $caret_holder = $this.find('.toggle-portfolio-item');
			$caret_holder.html('<i class="fa fa-caret-up"></i>');
			var $toggleContent = $this.next();
			$toggleContent.slideToggle(function() {
				if ($toggleContent.is(':visible')) {
					$caret_holder.html('<i class="fa fa-caret-up"></i>');
				}
				else {
					$caret_holder.html('<i class="fa fa-caret-down"></i>');
				}
				//hide expand all button function in case of all boxes revealed
				checkExpandAllBtn();
			});
			return false;
		});
		//hide expand all button when it's clicked
		$(document).on('click','.edgtf-toggle-all-item', function(event) {
			event.preventDefault();
			$(this).hide();
		});

		function checkExpandAllBtn() {
			if($('.edgtf-portfolio-additional-item .edgtf-portfolio-toggle-content:hidden').length === 0){
				$('.edgtf-toggle-all-item').hide();
			}else{
				$('.edgtf-toggle-all-item').show();
			}
		}

	}

    function edgtfInitPortfolioItemsBox() {
        var edgt_portfolio_additional_item = $('.edgtf-portfolio-additional-item-holder').clone().html();
        var $portfolio_item = '<div class="edgtf-portfolio-additional-item" rel="">'+ edgt_portfolio_additional_item +'</div>';

        $('.edgtf-portfolio-add a.edgtf-add-item').on('click',function (event) {
            event.preventDefault();
            $(this).parent().before($($portfolio_item).hide().fadeIn(500));
            var portfolio_num = $(this).parent().siblings('.edgtf-portfolio-additional-item').length;
            $(this).parent().siblings('.edgtf-portfolio-additional-item:last').attr('rel',portfolio_num);
            edgtfSetIdOnAddItem($(this).parent(),portfolio_num);
            $(this).parent().prev().find('.number').text(portfolio_num);
        });
    }

	function edgtfSetIdOnAddItem(addButton,portfolio_num){

		addButton.siblings('.edgtf-portfolio-additional-item:last').find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
			var name = $(this).attr('name');
			var new_name= name.replace("_x", "[]");
			var new_id = name.replace("_x", "_"+portfolio_num);
			$(this).attr('name',new_name);
			$(this).attr('id',new_id);

		});
	}

	function edgtfSetIdOnRemoveItem(portfolio,portfolio_number){
		
		var portfolio_num = portfolio_number;
		if(portfolio_num === undefined){
			portfolio_num = portfolio.attr('rel');
		}

		portfolio.find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
			var name = $(this).attr('name').split('[')[0];
			var new_name = name+"[]";
			var new_id = name+"_"+portfolio_num;
			$(this).attr('name',new_name);
			$(this).attr('id',new_id);
		});
	}

	function edgtInitPortfolioMediaAcc() {
		//remove portfolio media
		$(document).on('click', '.remove-portfolio-media', function(event) {
			event.preventDefault();
			var $toggleHolder = $(this).parent().parent().parent();
			$toggleHolder.fadeOut(300,function() {
				$(this).remove();

				//after removing portfolio image, set new rel numbers and set new ids/names
				$('.edgtf-portfolio-media').each(function(i){
					$(this).attr('rel',i+1);
					$(this).find('.number').text($(this).attr('rel'));
					edgtfSetIdOnRemoveMedia($(this),i+1);
				});
				//hide expand all button if all medias are removed
				noPortfolioMedia();
			});  return false;
		});

		//hide 'expand all' button if there is no media
		noPortfolioMedia();
		function noPortfolioMedia() {
			if($('.edgtf-portfolio-media').length === 0){
				$('.edgtf-toggle-all-media').hide();
			}
		}

		//expand all portfolio medias (video and images) onClick on 'expand all' button
		$(document).on('click','.edgtf-toggle-all-media', function(event) {
			event.preventDefault();
			$('.edgtf-portfolio-media').each(function(i){

				var $toggleContent = $(this).find('.edgtf-portfolio-toggle-content');
				var $this = $(this).find('.toggle-portfolio-media');
				if ($toggleContent.is(':visible')) {
					$toggleContent.slideToggle();
					$this.html('<i class="fa fa-caret-down"></i>');
				}

			});        return false;
		});
		//toggle for portfolio media (images or videos)
		$(document).on('click', '.edgtf-portfolio-media .edgtf-portfolio-toggle-holder', function(event) {
			event.preventDefault();
			var $this = $(this);
			var $caret_holder = $this.find('.toggle-portfolio-media');
			$caret_holder.html('<i class="fa fa-caret-up"></i>');
			var $toggleContent = $(this).next();
			$toggleContent.slideToggle(function() {
				if ($toggleContent.is(':visible')) {
					$caret_holder.html('<i class="fa fa-caret-up"></i>');
				}
				else {
					$caret_holder.html('<i class="fa fa-caret-down"></i>');
				}
				//hide expand all button function in case of all boxes revealed
				checkExpandAllMediaBtn();
			});
			return false;
		});
		//hide expand all button when it's clicked
		$(document).on('click','.edgtf-toggle-all-media', function(event) {
			event.preventDefault();
			$(this).hide();
		});
		function checkExpandAllMediaBtn() {
			if($('.edgtf-portfolio-media .edgtf-portfolio-toggle-content:hidden').length === 0){
				$('.edgtf-toggle-all-media').hide();
			}else{
				$('.edgtf-toggle-all-media').show();
			}
		}
	}



	function edgtfInitPortfolioImagesVideosBox() {
		var edgtf_portfolio_images = $('.edgtf-hidden-portfolio-images').clone().html();
		var $portfolio_image = '<div class="edgtf-portfolio-images edgtf-portfolio-media" rel="">'+ edgtf_portfolio_images +'</div>';
		var edgtf_portfolio_videos = $('.edgtf-hidden-portfolio-videos').clone().html();

		var $portfolio_videos = '<div class="edgtf-portfolio-videos edgtf-portfolio-media" rel="">'+ edgtf_portfolio_videos +'</div>';
		$('a.edgtf-add-image').on('click',function (e) {
			e.preventDefault();
			$(this).parent().before($($portfolio_image).hide().fadeIn(500));
			var portfolio_num = $(this).parent().siblings('.edgtf-portfolio-media').length;
			$(this).parent().siblings('.edgtf-portfolio-media:last').attr('rel',portfolio_num);
			edgtfInitMediaUploaderAdded($(this).parent());
			edgtfSetIdOnAddMedia($(this).parent(),portfolio_num);
			$(this).parent().prev().find('.number').text(portfolio_num);
		});

		$('a.edgtf-add-video').on('click',function (e) {
			e.preventDefault();
			$(this).parent().before($($portfolio_videos).hide().fadeIn(500));
			var portfolio_num = $(this).parent().siblings('.edgtf-portfolio-media').length;
			$(this).parent().siblings('.edgtf-portfolio-media:last').attr('rel',portfolio_num);
			edgtfInitMediaUploaderAdded($(this).parent());
			edgtfSetIdOnAddMedia($(this).parent(),portfolio_num);
			$(this).parent().prev().find('.number').text(portfolio_num);
		});

		$(document).on('click', '.edgtf-remove-last-row-media', function(event) {
			event.preventDefault();
			$(this).parent().prev().fadeOut(300,function() {
				$(this).remove();

				//after removing portfolio image, set new rel numbers and set new ids/names
				$('.edgtf-portfolio-media').each(function(i){
					$(this).attr('rel',i+1);
					edgtfSetIdOnRemoveMedia($(this),i+1);
				});
			});

		});
		edgtfShowHidePorfolioImageVideoType();
		$(document).on('change', 'select.edgtf-portfoliovideotype', function() {
			edgtfShowHidePorfolioImageVideoType();
		});
	}

	function edgtfSetIdOnAddMedia(addButton,portfolio_num){

		addButton.siblings('.edgtf-portfolio-media:last').find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
			var name = $(this).attr('name');
			var new_name= name.replace("_x", "[]");
			var new_id = name.replace("_x", "_"+portfolio_num);
			$(this).attr('name',new_name);
			$(this).attr('id',new_id);

		});

		edgtfShowHidePorfolioImageVideoType();
	}

	function edgtfSetIdOnRemoveMedia(portfolio,portfolio_number){
		
		var portfolio_num = portfolio_number;
		if(portfolio_num === undefined){
			portfolio_num = portfolio.attr('rel');
		}

		portfolio.find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
			var name = $(this).attr('name').split('[')[0];
			var new_name = name+"[]";
			var new_id = name+"_"+portfolio_num;
			$(this).attr('name',new_name);
			$(this).attr('id',new_id);
		});
	}

	function edgtfShowHidePorfolioImageVideoType(){
		$('.edgtf-portfoliovideotype').each(function(){
			var $selected = $(this).val();

			if($selected === "self"){
				$(this).parent().parent().parent().find('.edgtf-video-id-holder').hide();
				$(this).parent().parent().parent().parent().find('.edgtf-media-uploader').show();
				$(this).parent().parent().parent().find('.edgtf-video-self-hosted-path-holder').show();
			}else{
				$(this).parent().parent().parent().find('.edgtf-video-id-holder').show();
				$(this).parent().parent().parent().parent().find('.edgtf-media-uploader').hide();
				$(this).parent().parent().parent().find('.edgtf-video-self-hosted-path-holder').hide();
			}
		});
	}

	function edgtfInitMediaUploaderAdded(addButton) {

		addButton.siblings('.edgtf-portfolio-media:last, .edgtf-slide-element-additional-item:last').find('.edgtf-media-uploader').each(function(){
			var fileFrame;
			var uploadUrl;
			var uploadHeight;
			var uploadWidth;
			var uploadImageHolder;
			var attachment;
			var removeButton;

			//set variables values
			uploadUrl           = $(this).find('.edgtf-media-upload-url');
			uploadHeight        = $(this).find('.edgtf-media-upload-height');
			uploadWidth        = $(this).find('.edgtf-media-upload-width');
			uploadImageHolder   = $(this).find('.edgtf-media-image-holder');
			removeButton        = $(this).find('.edgtf-media-remove-btn');

			if (uploadImageHolder.find('img').attr('src') !== "") {
				removeButton.show();
				edgtfInitMediaRemoveBtn(removeButton);
			}

			$(this).on('click', '.edgtf-media-upload-btn', function() {
				//if the media frame already exists, reopen it.
				if (fileFrame) {
					fileFrame.open();
					return;
				}

				//create the media frame
				fileFrame = wp.media.frames.fileFrame = wp.media({
					title: $(this).data('frame-title'),
					button: {
						text: $(this).data('frame-button-text')
					},
					multiple: false
				});

				//when an image is selected, run a callback
				fileFrame.on( 'select', function() {
					attachment = fileFrame.state().get('selection').first().toJSON();
					removeButton.show();
					edgtfInitMediaRemoveBtn(removeButton);
					//write to url field and img tag
					if(attachment.hasOwnProperty('url') && attachment.hasOwnProperty('sizes')) {
						uploadUrl.val(attachment.url);
						if (attachment.sizes.thumbnail) {
							uploadImageHolder.find('img').attr('src', attachment.sizes.thumbnail.url);
						} else {
							uploadImageHolder.find('img').attr('src', attachment.url);
						}
						
						uploadImageHolder.show();
					} else if (attachment.hasOwnProperty('url')) {
						uploadUrl.val(attachment.url);
						uploadImageHolder.find('img').attr('src', attachment.url);
						uploadImageHolder.show();
					}

					//write to hidden meta fields
					if(attachment.hasOwnProperty('height')) {
						uploadHeight.val(attachment.height);
					}

					if(attachment.hasOwnProperty('width')) {
						uploadWidth.val(attachment.width);
					}
					$('.edgtf-input-change').addClass('yes');
				});

				//open media frame
				fileFrame.open();
			});
		});

		function edgtfInitMediaRemoveBtn(btn) {
			btn.on('click', function() {
				//remove image src and hide it's holder
				btn.siblings('.edgtf-media-image-holder').hide();
				btn.siblings('.edgtf-media-image-holder').find('img').attr('src', '');

				//reset meta fields
				btn.siblings('.edgtf-media-meta-fields').find('input[type="hidden"]').each(function(e) {
					$(this).val('');
				});

				btn.hide();
			});
		}
	}

    /**
        Slide elements script - start
    */

    function edgtInitSlideElementItemAcc() {
        //remove slide-element item
        $(document).on('click', '.remove-slide-element-item', function(event) {
            event.preventDefault();
            var $toggleHolder = $(this).parent().parent().parent();
            $toggleHolder.fadeOut(300,function() {
                $(this).remove();

                //after removing slide-element image, set new rel numbers and set new ids/names
                $('.edgtf-slide-element-additional-item').each(function(i){
                    $(this).attr('rel',i+1);
                    $(this).find('.number').text($(this).attr('rel'));
                    edgtfSetIdOnRemoveElement($(this),i+1);
                });
                //hide expand all button if all items are removed
                noSlideElementItemShown();
            });
            return false;
        });

        //hide expand all button if there is no items
        noSlideElementItemShown();
        function noSlideElementItemShown()  {
            if($('.edgtf-slide-element-additional-item').length === 0){
                $('.edgtf-toggle-all-item').hide();
            }
        }

        //expand all additional items on click on 'expand all' button
        $(document).on('click', '.edgtf-toggle-all-item', function(event) {
            event.preventDefault();
            $('.edgtf-slide-element-additional-item').each(function(){

                var $toggleContent = $(this).find('.edgtf-slide-element-toggle-content');
                var $this = $(this).find('.toggle-slide-element-item');
                if (!$toggleContent.is(':visible')) {
                     $toggleContent.slideToggle();
                    $this.html('<i class="fa fa-caret-down"></i>');
                }
            });
            return false;
        });
        //toggle for slide-element item
        $(document).on('click', '.edgtf-slide-element-additional-item .edgtf-slide-element-toggle-holder', function(event) {
            event.preventDefault();

            var $this = $(this);
            var $caret_holder = $this.find('.toggle-slide-element-item');
            $caret_holder.html('<i class="fa fa-caret-up"></i>');
            var $toggleContent = $this.next();
            $toggleContent.slideToggle(function() {
                if ($toggleContent.is(':visible')) {
                    $caret_holder.html('<i class="fa fa-caret-up"></i>');
                }
                else {
                    $caret_holder.html('<i class="fa fa-caret-down"></i>');
                }
                //hide expand all button function in case of all boxes revealed
                checkExpandAllBtn();
            });
            return false;
        });
        //hide expand all button when it's clicked
        $(document).on('click','.edgtf-toggle-all-item', function(event) {
            event.preventDefault();
            $(this).hide();
        });

        //reveal only the fields for custom positioning of elements
        $(document).on('change', '#edgtf_edgtf_slide_holder_elements_alignment select', function() {
            var meta_box = $(this).parents('#edgtf-meta-box-edgtf_slides_elements');
            if ($(this).find('option:selected').attr('value') === 'custom') {
                meta_box.find('.edgtf-slide-element-custom-only').slideDown(300);
                meta_box.find('.edgtf-slide-element-all-but-custom').slideUp(300);
            }
            else {
                meta_box.find('.edgtf-slide-element-all-but-custom').slideDown(300);
                meta_box.find('.edgtf-slide-element-custom-only').slideUp(300);
            }
        });

        //reveal only the fields for certain type of the element
        $(document).on('change', '.edgtf-slide-element-type-selector', function() {
            var type_fields_holders = $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-element-type-fields');
            type_fields_holders.not('.edgtf-setf-'+$(this).find('option:selected').attr('value')).slideUp(300);
            type_fields_holders.filter('.edgtf-setf-'+$(this).find('option:selected').attr('value')).slideDown(300);
        });

        // reveal advanced text options
        $(document).on('change', '.edgtf-slide-element-options-selector-text', function() {
            if ($(this).find('option:selected').attr('value') === 'advanced') {
                $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-elements-advanced-text-options').slideDown(300);
                $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-elements-simple-text-options').slideUp(300);
            }
            else {
                $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-elements-advanced-text-options').slideUp(300);
                $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-elements-simple-text-options').slideDown(300);
            }
        });

        // reveal responsive text options
        $(document).on('change', '.edgtf-slide-element-responsive-selector', function() {
            if ($(this).find('option:selected').attr('value') === 'yes') {
                $(this).parents('.edgtf-slide-element-type-fields').find('.edgtf-slide-element-scale-factors').slideDown(300);
            }
            else {
                $(this).parents('.edgtf-slide-element-type-fields').find('.edgtf-slide-element-scale-factors').slideUp(300);
            }
        });

        // reveal responsive element options
        $(document).on('change', '.edgtf-slide-element-responsiveness-selector', function() {
            if ($(this).find('option:selected').attr('value') === 'stages') {
                $(this).closest('.row').siblings('.edgtf-slide-responsive-scale-factors').slideDown(300);
            }
            else {
                $(this).closest('.row').siblings('.edgtf-slide-responsive-scale-factors').slideUp(300);
            }
        });

        //update the default screen width in elements
        $(document).on('change keyup', "input[name='edgtf_slide_elements_default_width']", function() {
            $(this).parents('#edgtf-meta-box-edgtf_slides_elements').find('.edgtf-slide-dynamic-def-width').html($(this).attr('value'));
        });

        // reveal proper icon picker
        $(document).on('change', '.edgtf-slide-element-button-icon-pack', function() {
            var icon_pack = $(this).find('option:selected').attr('value');
            if (icon_pack === 'no_icon') {
                $(this).parents('.edgtf-slide-element-additional-item').find('.edgtf-slide-element-button-icon-collection').slideUp(300);
            }
            else {
                $(this)
                .parents('.edgtf-slide-element-additional-item')
                .find('.edgtf-slide-element-button-icon-collection.'+icon_pack).slideDown(300)
                .siblings('.edgtf-slide-element-button-icon-collection').slideUp(300);
            }
        });

        function checkExpandAllBtn() {
            if($('.edgtf-slide-element-additional-item .edgtf-slide-element-toggle-content:hidden').length === 0){
                $('.edgtf-toggle-all-item').hide();
            }else{
                $('.edgtf-toggle-all-item').show();
            }
        }
    }

    function edgtfInitSlideElementItemsBox() {
        $('.edgtf-slide-element-add a.edgtf-add-item').on('click',function (event) {
            var edgtf_slide_element = $('.edgtf-slide-element-additional-item-holder').clone().html();
            var $slide_element = '<div class="edgtf-slide-element-additional-item" rel="">'+ edgtf_slide_element +'</div>';
            event.preventDefault();
            $(this).parent().before($($slide_element).hide().fadeIn(500));
            edgtfInitMediaUploaderAdded($(this).parent());
            var elem_num = $(this).parent().siblings('.edgtf-slide-element-additional-item').length;
            var item = $(this).parent().siblings('.edgtf-slide-element-additional-item:last');
            item.attr('rel',elem_num);
            item.find('.wp-picker-container').each(function() {
                var picker = $(this);
                var input = picker.find('input[type="text"]');
                picker.before('<input type="text" id="'+ input.attr('id') +'" name="'+ input.attr('name') +'" value="" class="my-color-field"/>').remove();
            });
            item.find('.my-color-field').wpColorPicker();
            edgtfSetIdOnAddElement($(this).parent(),elem_num);
            $(this).parent().prev().find('.number').text(elem_num);
        });
    }

    function edgtfSetIdOnAddElement(addButton,elem_num){

        addButton.siblings('.edgtf-slide-element-additional-item:last').find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $(this).attr('name');
            var new_name= name.replace("_x", "[]");
            var new_id = name.replace("_x", "_"+elem_num);
            $(this).attr('name',new_name);
            $(this).attr('id',new_id);

        });
    }

    function edgtfSetIdOnRemoveElement(element,elem_num){
	
	    var elem_num = elem_num;
        if(elem_num === undefined){
            elem_num = element.attr('rel');
        }

        element.find('input[type="text"], input[type="hidden"], select, textarea').each(function(){
            var name = $(this).attr('name').split('[')[0];
            var new_name = name+"[]";
            var new_id = name+"_"+elem_num;
            $(this).attr('name',new_name);
            $(this).attr('id',new_id);

        });

    }

    /**
        Slide elements script - end
    */

	function edgtfInitAjaxForm() {
		$('#edgt_top_save_button').on('click', function() {
			$('.edgt_ajax_form').submit();
			if ($('.edgtf-input-change.yes').length) {
				$('.edgtf-input-change.yes').removeClass('yes');
			}
			$('.edgtf-changes-saved').addClass('yes');
			setTimeout(function(){$('.edgtf-changes-saved').removeClass('yes');}, 3000);
			return false;
		});
		$(document).delegate(".edgt_ajax_form", "submit", function (a) {
			var b = $(this);
			var c = {
				action: "ratio_edge_save_options"
			};
			jQuery.ajax({
				url: ajaxurl,
				cache: !1,
				type: "POST",
				data: jQuery.param(c, !0) + "&" + b.serialize()
			}), a.preventDefault(), a.stopPropagation();
		});
	}

	function edgtfInitDatePicker() {
		$( ".edgtf-input.datepicker" ).datepicker( { dateFormat: "MM dd, yy" });
	}
    function edgtfInitSelectPicker() {
        $(".edgtf-selectpicker").selectpicker({
            style: 'btn-info',
            size: 10
        });
    }
	
	function edgtfShowHidePostFormats() {
		$('input[name="post_format"]').each(function () {
			var id = $(this).attr('id');
			
			if (id !== '' && id !== undefined) {
				var metaboxName = id.replace(/-/g, '_');
				
				$('#edgtf-meta-box-' + metaboxName + '_meta').hide();
			}
		});
		
		var selectedId = $("input[name='post_format']:checked").attr("id");
		
		if (selectedId !== '' && selectedId !== undefined) {
			var selected = selectedId.replace(/-/g, '_');
			$('#edgtf-meta-box-' + selected + '_meta').fadeIn();
		}
		
		$("input[name='post_format']").change(function () {
			edgtfShowHidePostFormats();
		});
	}
	
	function edgtfShowHidePostFormatsGutenberg() {
		var gutenbergEditor = $('.block-editor__container');
		
		if(gutenbergEditor.length) {
			var gPostFormatField = gutenbergEditor.find('.editor-post-format');
			
			gPostFormatField.find('select option').each(function () {
				$('#edgtf-meta-box-post_format_' + $(this).val() + '_meta').hide();
			});
			
			if (gPostFormatField.find('select option:selected')) {
				$('#edgtf-meta-box-post_format_' + gPostFormatField.find('select option:selected').val() + '_meta').fadeIn();
			}
			
			gPostFormatField.find('select').change(function(){
				edgtfShowHidePostFormatsGutenberg();
			});
		}
	}

	function edgtfPageTemplatesMetaBoxDependency(){
		if($('#page_template').length) {
			var selected = $('#page_template').val();
			var template_name_parts = selected.split("-");

			if (template_name_parts[0] !== 'blog') {
				$('#edgtf-meta-box-blog-meta').hide();
			} else {
				$('#edgtf-meta-box-blog-meta').show();
			}
			$('select[name="page_template"]').change(function () {
				edgtfPageTemplatesMetaBoxDependency();
			});
		}
	}

	function edgtfRepeater(){
		var addNew = $('.edgtf-repeater-add .edgtf-clone'); // add new button
		var removeBtn = $('.edgtf-clone-remove');
		if (addNew.length) {
			$('.edgtf-repeater-fields-holder').each(function(){
				var thisHolderRows = $(this).find('.edgtf-repeater-fields-row');
				if(thisHolderRows.length === 1 && thisHolderRows.find(':input').val() === ''){
					thisHolderRows.hide();
				}
			});
			addNew.on('click', function (e) {
				e.preventDefault();
				var thisAddNew = $(this);
				var append = true; // flag for showing or appending new row
				var fieldsHolder = thisAddNew.parent().siblings('.edgtf-repeater-fields-holder'); // container of all rows - parent to append new row
				var rows = fieldsHolder.find('.edgtf-repeater-fields-row');
				if (rows.length === 1 && rows.css('display') === 'none') {
					rows.show();
					append = false;
				}
				if (append) {
					var rowIndex = thisAddNew.data('count'); // number of rows for changing id stored as data of add new button
					var firstChild = rows.eq(0).clone(); // clone first row
					var colorPicker = false; // flag for initializing color picker - calling wpColorPicker
					var mediaUploader = false; // flag for initializing media uploader - calling wpColorPicker

					firstChild.find('.edgtf-repeater-field').each(function () {
							var thisField = $(this);
							var id = thisField.attr('id');
							if (typeof id !== 'undefined') {
								thisField.attr('id', id.slice(0, -1) + rowIndex); // change id - first row will have 0 as the last char
							}
							thisField.find(':input').each(function () {
								var thisInput = $(this);
								if (thisInput.hasClass('my-color-field')) { // if input type is color picker
									thisInput.parents('.wp-picker-container').html(thisInput); // overwrite added html with field html- wpColorPicker adds it on initialization
									colorPicker = true;
								}
								else if (thisInput.hasClass('edgtf-media-upload-url')) {// if input type is media uploader
									mediaUploader = true;
									var btn = thisInput.parent().siblings('.edgtf-media-remove-btn');
									edgtfInitMediaRemoveBtn(btn); // get and init new remove btn
									btn.trigger('click'); // trigger click to reset values
								}
								thisInput.val('').removeAttr('checked').removeAttr('selected'); //empty fields values
								if(thisInput.is(':radio')){
									thisInput.val(fieldsHolder.find(':radio').length);
								}
							});
						}
					);

					thisAddNew.data('count', rowIndex + 1); //increase number of rows
					firstChild.appendTo(fieldsHolder); // append html
					removeRow($('.edgtf-clone-remove'));
					if (colorPicker) { // reinit colorpickers
						$('.edgtf-page .my-color-field').wpColorPicker();
					}
					if (mediaUploader) {
						// deregister click on all media buttons (multiple frames will be opened otherwise)
						$('.edgtf-media-uploader').off('click', '.edgtf-media-upload-btn');
						edgtfInitMediaUploader();
					}

				}
			});
		}
		if (removeBtn.length) {
			removeRow(removeBtn);
		}

		function removeRow(removeBtn){
			removeBtn.on('click', function (e) {
				e.preventDefault();
				var thisRemoveBtn = $(this);
				var parentRow = thisRemoveBtn.parents('.edgtf-repeater-fields-row');
				if (parentRow.is(':first-child') && thisRemoveBtn.parents('.edgtf-repeater-fields-holder').find('.edgtf-repeater-fields-row').length === 1) {
					parentRow.find(':input').val('').removeAttr('checked').removeAttr('selected');
					parentRow.hide();
				} else if(!parentRow.is(':first-child')) {
					parentRow.remove();
				}
			});
		}
	}
	
	function edgtfInitImportContent() {
		var edgtfImportHolder = $('.edgtf-import-page-holder');
		
		if (edgtfImportHolder.length) {
			var edgtfImportBtn = $('#import_demo_data'),
				confirmMessage = edgtfImportHolder.data('confirm-message'),
				index = 1;
			
			var edgtfInitContentImport = function(import_expl, progress_bar, progress_value, import_only_content) {
				var xml_file_name = index < 10 ? 'ratio_content_0' + index + '.xml' : 'ratio_content_' + index + '.xml',
					import_attachments = $("#import_attachments").is(':checked') ? 1 : 0;
				
				jQuery.ajax({
					type: 'POST',
					url: ajaxurl,
					data: {
						action: 'edgt_dataImport',
						xml: xml_file_name,
						example: import_expl,
						import_attachments: import_attachments
					},
					success: function (data, textStatus, XMLHttpRequest) {
						edgtfSetProgressValue(progress_value, progress_bar, index * 10);
						
						if (index < 10) {
							index++;
							edgtfInitContentImport(import_expl, progress_bar, progress_value, import_only_content);
						} else {
							
							if (import_only_content === true) {
								edgtfSetCompletedMessage(progress_value, progress_bar);
							} else {
								jQuery.ajax({
									type: 'POST',
									url: ajaxurl,
									data: {
										action: 'edgt_otherImport',
										example: import_expl
									},
									success: function (data, textStatus, XMLHttpRequest) {
										edgtfSetCompletedMessage(progress_value, progress_bar);
									},
									error: function (data, textStatus, XMLHttpRequest) {
										console.log('Error during import other data elements.');
									}
								});
							}
						}
					},
					error: function (data, textStatus, XMLHttpRequest) {
						console.log('Error during import attachments.');
						
						if (confirm('Some error was happened during the import. Click OK to run it again!')) {
							edgtfImportBtn.trigger('click');
						}
					}
				});
			};
			
			var edgtfSetProgressValue = function(progress_value, progress_bar, progress) {
				progress_value.html((progress) + '%');
				progress_bar.val(progress);
			};
			
			var edgtfSetCompletedMessage = function(progress_value, progress_bar) {
				edgtfSetProgressValue(progress_value, progress_bar, 100);
				
				$('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
			};
			
			edgtfImportBtn.on('click', function (e) {
				e.preventDefault();
				
				if (confirm(confirmMessage)) {
					$('.edgtf-import-load').css('display', 'block');
					
					var progress_bar = $('#progressbar'),
						progress_value = $('.progress-value'),
						import_opt = $('#import_option').val(),
						import_expl = $('#import_example').val();
					
					if (import_opt === 'content') {
						edgtfInitContentImport(import_expl, progress_bar, progress_value, true);
					} else if (import_opt === 'widgets') {
						jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							data: {
								action: 'edgt_widgetsImport',
								example: import_expl
							},
							success: function (data, textStatus, XMLHttpRequest) {
								edgtfSetCompletedMessage(progress_value, progress_bar);
							}
						});
					} else if (import_opt === 'options') {
						jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							data: {
								action: 'edgt_optionsImport',
								example: import_expl
							},
							success: function (data, textStatus, XMLHttpRequest) {
								edgtfSetCompletedMessage(progress_value, progress_bar);
							}
						});
					} else if (import_opt === 'complete_content') {
						edgtfInitContentImport(import_expl, progress_bar, progress_value);
					}
				}
				return false;
			});
		}
	}
	
})(jQuery);