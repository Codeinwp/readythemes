
jQuery.noConflict();

// fixes the firefox radio button bug on refresh (http://www.ryancramer.com/journal/entries/radio_buttons_firefox/)
//jQuery(document).ready(function($) {
//    if($.browser.mozilla)
//         $("#purevision-metaboxes-general form").attr("autocomplete", "off");
//});

jQuery(document).ready(function($) {
        // Logo Image Upload
	$('#upload_logo_button').click(function() {
	    formfield = $('#custom_logo_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Top Background Image
	$('#upload_top_bg_img_button').click(function() {
	    formfield = $('#top_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Header Background Image
	$('#upload_header_bg_img_button').click(function() {
	    formfield = $('#header_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Main Content Area Background Image
	$('#upload_home_page_before_content_bg_img_button').click(function() {
	    formfield = $('#home_page_before_content_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Header Background Image
	$('#upload_page_title_bg_img_button').click(function() {
	    formfield = $('#page_title_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Main Content Area Background Image
	$('#upload_main_bg_img_button').click(function() {
	    formfield = $('#main_content_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Main Content Area Background Image
	$('#upload_bottom_bg_img_button').click(function() {
	    formfield = $('#bottom_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // Main Content Area Background Image
	$('#upload_footer_bg_img_button').click(function() {
	    formfield = $('#footer_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // One Continuous Area Background Image
	$('#upload_one_continuous_bg_img_button').click(function() {
	    formfield = $('#one_continuous_bg_img').attr('id');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	});
        // used for all of the above to insert the uploaded image url into the proper text field
	window.send_to_editor = function(html) {
	    imgurl = $('img',html).attr('src');
	    $('#'+ formfield).val(imgurl);
	    tb_remove();
	}
});

// color picker script
jQuery(document).ready(function($) {
    if ( $('#bodyTextColor').length == 1 ) { // if element found
	addUploader('#body_text_color', '#bodyTextColor', rgb2hex( $('#bodyTextColor div').css('background-color') ));
    }
    if ( $('#mainLinkColor').length == 1 ) { // if element found
	addUploader('#main_link_color', '#mainLinkColor', rgb2hex( $('#mainLinkColor div').css('background-color') ));
    }
    if ( $('#mainLinkColorHover').length == 1 ) { // if element found
	addUploader('#main_link_color_hover', '#mainLinkColorHover', rgb2hex( $('#mainLinkColorHover div').css('background-color') ));
    }
    if ( $('#mainHeadingsColor').length == 1 ) { // if element found
	addUploader('#main_headings_color', '#mainHeadingsColor', rgb2hex( $('#mainHeadingsColor div').css('background-color') ));
    }
    if ( $('#topBGcolorSelector').length == 1 ) { // if element found
	addUploader('#top_bg_color', '#topBGcolorSelector', rgb2hex( $('#topBGcolorSelector div').css('background-color') ));
    }
    if ( $('#topTextcolorSelector').length == 1 ) { // if element found
	addUploader('#top_text_color', '#topTextcolorSelector', rgb2hex( $('#topTextcolorSelector div').css('background-color') ));
    }
    if ( $('#topNavLinkColor').length == 1 ) { // if element found
	addUploader('#top_nav_link_color', '#topNavLinkColor', rgb2hex( $('#topNavLinkColor div').css('background-color') ));
    }
    if ( $('#topNavActiveLinkColor').length == 1 ) { // if element found
	addUploader('#top_nav_active_link_color', '#topNavActiveLinkColor', rgb2hex( $('#topNavActiveLinkColor div').css('background-color') ));
    }
    if ( $('#topNavHoverLinkColor').length == 1 ) { // if element found
	addUploader('#top_nav_hover_link_color', '#topNavHoverLinkColor', rgb2hex( $('#topNavHoverLinkColor div').css('background-color') ));
    }
    if ( $('#pageTitleColor').length == 1 ) { // if element found
	addUploader('#page_title_color', '#pageTitleColor', rgb2hex( $('#pageTitleColor div').css('background-color') ));
    }
    if ( $('#pageTitleBGcolorSelector').length == 1 ) { // if element found
	addUploader('#page_title_bg_color', '#pageTitleBGcolorSelector', rgb2hex( $('#pageTitleBGcolorSelector div').css('background-color') ));
    }
    if ( $('#headerBGcolorSelector').length == 1 ) { // if element found
	addUploader('#header_bg_color', '#headerBGcolorSelector', rgb2hex( $('#headerBGcolorSelector div').css('background-color') ));
    }
    if ( $('#mainContentBG').length == 1 ) { // if element found
	addUploader('#main_content_bg', '#mainContentBG', rgb2hex( $('#mainContentBG div').css('background-color') ));
    }
    if ( $('#widgetTitleColor').length == 1 ) { // if element found
	addUploader('#widget_title_color', '#widgetTitleColor', rgb2hex( $('#widgetTitleColor div').css('background-color') ));
    }
    if ( $('#widgetTextColor').length == 1 ) { // if element found
	addUploader('#widget_text_color', '#widgetTextColor', rgb2hex( $('#widgetTextColor div').css('background-color') ));
    }
    if ( $('#widgetBGColor').length == 1 ) { // if element found
	addUploader('#widget_bg_color', '#widgetBGColor', rgb2hex( $('#widgetBGColor div').css('background-color') ));
    }
    if ( $('#bottomBGColor').length == 1 ) { // if element found
	addUploader('#bottom_bg_color', '#bottomBGColor', rgb2hex( $('#bottomBGColor div').css('background-color') ));
    }
    if ( $('#bottomTitleColor').length == 1 ) { // if element found
	addUploader('#bottom_title_color', '#bottomTitleColor', rgb2hex( $('#bottomTitleColor div').css('background-color') ));
    }
    if ( $('#bottomTextColor').length == 1 ) { // if element found
	addUploader('#bottom_text_color', '#bottomTextColor', rgb2hex( $('#bottomTextColor div').css('background-color') ));
    }
    if ( $('#bottomLinkColor').length == 1 ) { // if element found
	addUploader('#bottom_link_color', '#bottomLinkColor', rgb2hex( $('#bottomLinkColor div').css('background-color') ));
    }
    if ( $('#bottomHoverLinkColor').length == 1 ) { // if element found
	addUploader('#bottom_hover_link_color', '#bottomHoverLinkColor', rgb2hex( $('#bottomHoverLinkColor div').css('background-color') ));
    }
    if ( $('#footerBGColor').length == 1 ) { // if element found
	addUploader('#footer_bg_color', '#footerBGColor', rgb2hex( $('#footerBGColor div').css('background-color') ));
    }
    if ( $('#footerTextColor').length == 1 ) { // if element found
	addUploader('#footer_text_color', '#footerTextColor', rgb2hex( $('#footerTextColor div').css('background-color') ));
    }
    if ( $('#footerLinkColor').length == 1 ) { // if element found
	addUploader('#footer_link_color', '#footerLinkColor', rgb2hex( $('#footerLinkColor div').css('background-color') ));
    }
    if ( $('#footerHoverLinkColor').length == 1 ) { // if element found
	addUploader('#footer_hover_link_color', '#footerHoverLinkColor', rgb2hex( $('#footerHoverLinkColor div').css('background-color') ));
    }
    if ( $('#colorSelector1').length == 1 ) { // if element found
	addUploader('#pm_text_background', '#colorSelector1', rgb2hex( $('#colorSelector1 div').css('background-color') ));
    }
    if ( $('#colorSelector2').length == 1 ) { // if element found
	addUploader('#pm_inner_color', '#colorSelector2', rgb2hex( $('#colorSelector2 div').css('background-color') ));
    }
    if ( $('#pm2LoaderColor').length == 1 ) { // if element found
	addUploader('#pm2_loader_color', '#pm2LoaderColor', rgb2hex( $('#pm2LoaderColor div').css('background-color') ));
    }
    if ( $('#pm2InnerSideColor').length == 1 ) { // if element found
	addUploader('#pm2_inner_side_color', '#pm2InnerSideColor', rgb2hex( $('#pm2InnerSideColor div').css('background-color') ));
    }
    if ( $('#pm2MenuColor1').length == 1 ) { // if element found
	addUploader('#pm2_menu_color_1', '#pm2MenuColor1', rgb2hex( $('#pm2MenuColor1 div').css('background-color') ));
    }
    if ( $('#pm2MenuColor2').length == 1 ) { // if element found
	addUploader('#pm2_menu_color_2', '#pm2MenuColor2', rgb2hex( $('#pm2MenuColor2 div').css('background-color') ));
    }
    if ( $('#pm2MenuColor3').length == 1 ) { // if element found
	addUploader('#pm2_menu_color_3', '#pm2MenuColor3', rgb2hex( $('#pm2MenuColor3 div').css('background-color') ));
    }
    if ( $('#pm2ControlColor1').length == 1 ) { // if element found
	addUploader('#pm2_control_color_1', '#pm2ControlColor1', rgb2hex( $('#pm2ControlColor1 div').css('background-color') ));
    }
    if ( $('#pm2ControlColor2').length == 1 ) { // if element found
	addUploader('#pm2_control_color_2', '#pm2ControlColor2', rgb2hex( $('#pm2ControlColor2 div').css('background-color') ));
    }
    if ( $('#pm2TooltipColor').length == 1 ) { // if element found
	addUploader('#pm2_tooltip_color', '#pm2TooltipColor', rgb2hex( $('#pm2TooltipColor div').css('background-color') ));
    }
    if ( $('#pm2TooltipTextColor').length == 1 ) { // if element found
	addUploader('#pm2_tooltip_text_color', '#pm2TooltipTextColor', rgb2hex( $('#pm2TooltipTextColor div').css('background-color') ));
    }
    if ( $('#pm2InfoBackground').length == 1 ) { // if element found
	addUploader('#pm2_info_background', '#pm2InfoBackground', rgb2hex( $('#pm2InfoBackground div').css('background-color') ));
    }
    if ( $('#c2-colorSelector1').length == 1 ) { // if element found
	addUploader('#c2_text_color', '#c2-colorSelector1', rgb2hex( $('#c2-colorSelector1 div').css('background-color') ));
    }
    function addUploader(inputField, colorSelector, defaultColor) {
	$(colorSelector).ColorPicker({
		color: '#'+defaultColor,
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$(colorSelector+' div').css('backgroundColor', '#' + hex);
			$('input'+inputField).attr("value", hex);
		},
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		}
	});
    }
    // convert rgb to hex color string
    function rgb2hex(rgb) {
	if (  rgb.search("rgb") == -1 ) {
	    return rgb;
	} else {
	    rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);
	    function hex(x) {
		return ("0" + parseInt(x).toString(16)).slice(-2);
	    }
	    return hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
    }
});



// Flashmo Grid Slider jQuery functionality to drag-n-drop, delete and upload images
jQuery(document).ready(function($) {

	// Initialise the table
	$('#gs-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#gs_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#gs-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#gs-table-slides', curID)
	});

	// Delete a slide
	$('#gs-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#gs-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#gs-clone-table tr').clone().appendTo($('#gs-table-slides'));
		$('#gs-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#gs-table-slides tr:last td div.gs_slide_img_url label').attr("for",'gs_slide_img_url_'+highestID);
		$('#gs-table-slides tr:last td div.gs_slide_img_url input.gs_slide_img_url_field').attr("name","purevision_options[gs_slide_img_url_"+highestID+"]").attr("id","gs_slide_img_url_"+highestID).attr("value","");
		$('#gs-table-slides tr:last td div.gs_slide_img_url input.gs_slide_img_url_btn').attr("id","gs_slide_upload_button_"+highestID);
		// Update Transition Flow, Direction and Rotation
		$('#gs-table-slides tr:last td div.transition-flow select').attr("value","").attr("id","gs_slide_transition_flow_"+highestID).attr("name","purevision_options[gs_slide_transition_flow_"+highestID+"]");
		$('#gs-table-slides tr:last td div.transition-direction select').attr("value","").attr("id","gs_slide_transition_direction_"+highestID).attr("name","purevision_options[gs_slide_transition_direction_"+highestID+"]");
		$('#gs-table-slides tr:last td div.transition-rotation select').attr("value","").attr("id","gs_slide_transition_rotation_"+highestID).attr("name","purevision_options[gs_slide_transition_rotation_"+highestID+"]");
		// Update slide's info text
		$('#gs-table-slides tr:last td div.slide-info-text textarea').attr("name",'purevision_options[gs_slide_default_info_txt_'+highestID+']').attr("id",'gs_slide_default_info_txt_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#gs-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#gs-table-slides tr').each(function(index) {
		    $("#gs-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#gs-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#gs-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#gs_slides_order_str
		$('input#gs_slides_order_str').val(slidesOrder);
		$("#gs-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#gs-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#gs-table-slides tr').each(function(index) {
			$("#gs-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#gs-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#gs_slides_order_str
		    $('input#gs_slides_order_str').val(slidesOrder);
		    $("#gs-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            $('#gs_slide_upload_button_'+rowID).click(function() {
                formfield = $('#gs_slide_img_url_'+rowID).attr('id');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
	}

});



// Piecemaker Slider jQuery functionality to drag-n-drop, delete and upload images
jQuery(document).ready(function($) {
	// Initialise the table
	$('#pm-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#pm_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#pm-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#pm-table-slides', curID);
	});

	// Delete a slide
	$('#pm-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#pm-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#pm-clone-table tr').clone().appendTo($('#pm-table-slides'));
		$('#pm-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#pm-table-slides tr:last td div.pm_slide_img_url label').attr("for",'pm_slide_img_url_'+highestID);
		$('#pm-table-slides tr:last td div.pm_slide_img_url input.pm_slide_img_url_field').attr("name","purevision_options[pm_slide_img_url_"+highestID+"]").attr("id","pm_slide_img_url_"+highestID).attr("value","");
		$('#pm-table-slides tr:last td div.pm_slide_img_url input.pm_slide_img_url_btn').attr("id","pm_slide_upload_button_"+highestID);
		// Update slide's info text
		$('#pm-table-slides tr:last td.slide-info-text textarea').attr("name",'purevision_options[pm_slider_default_info_txt_'+highestID+']').attr("id",'pm_slider_default_info_txt_'+highestID);
		// Add the image upload module to the newly added row
		addUploader('#pm-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#pm-table-slides tr').each(function(index) {
		    $("#pm-table-slides tr td.position").eq(index).html(index+1);
		});


		// Add click event to the remove button on the newly added row
		$('#pm-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#pm-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#pm_slides_order_str
		$('input#pm_slides_order_str').val(slidesOrder);
		$("#pm-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#pm-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#pm-table-slides tr').each(function(index) {
			$("#pm-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#pm-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#pm_slides_order_str
		    $('input#pm_slides_order_str').val(slidesOrder);
		    $("#pm-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            $('#pm_slide_upload_button_'+rowID).click(function() {
                formfield = $('#pm_slide_img_url_'+rowID).attr('id');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
	}

});



// Piecemaker 2 Slider jQuery functionality to drag-n-drop, delete and upload images
jQuery(document).ready(function($) {

	// Initialise the table
	$('#pm2-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#pm2_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#pm2-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#pm2-table-slides', curID);
	});

	// Delete a slide
	$('#pm2-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new Image slide
	$('.add-image-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#pm2-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#pm2-image-clone-table tr').clone().appendTo($('#pm2-table-slides'));
		$('#pm2-table-slides tr:last').attr("id",++highestID);
		// Update Slide's Type hidden field
		$('#pm2-table-slides tr:last td .pm2_slide_type').attr("id","pm2_slide_type_"+highestID).attr("name","purevision_options[pm2_slide_type_"+highestID+"]");
		// Update Image Upload Section
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url label').attr("for",'pm2_slide_img_url_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_field').attr("name","purevision_options[pm2_slide_img_url_"+highestID+"]").attr("id","pm2_slide_img_url_"+highestID).attr("value","");
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_btn').attr("id","pm2_slide_upload_button_"+highestID);
		// Update Slide Title
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title label').attr("for",'pm2_slide_img_title_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title input').attr("name",'purevision_options[pm2_slide_img_title_'+highestID+']').attr("id",'pm2_slide_img_title_'+highestID);
		// Update Slide Link
		$('#pm2-table-slides tr:last td div.slide-link').attr("id",'pm2_slide_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.slide-link label.link-url').attr("for",'pm2_slide_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.slide-link input').attr("name",'purevision_options[pm2_slide_link_url_'+highestID+']').attr("id",'pm2_slide_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.slide-link label.link-target').attr("for",'pm2_slide_link_target_'+highestID);
		$('#pm2-table-slides tr:last td div.slide-link label.link-target select').attr("name",'purevision_options[pm2_slide_link_target_'+highestID+']').attr("id",'pm2_slide_link_target_'+highestID);
		// Update slide's info text
		$('#pm2-table-slides tr:last td div.slide-info-text textarea').attr("name",'purevision_options[pm2_slide_default_info_txt_'+highestID+']').attr("id",'pm2_slide_default_info_txt_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#pm2-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#pm2-table-slides tr').each(function(index) {
		    $("#pm2-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#pm2-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#pm2-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#pm2_slides_order_str
		$('input#pm2_slides_order_str').val(slidesOrder);
		$("#pm2-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	// Add a new Piecemaker 2 Flash slide
	$('.add-flash-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#pm2-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#pm2-flash-clone-table tr').clone().appendTo($('#pm2-table-slides'));
		$('#pm2-table-slides tr:last').attr("id",++highestID);
		// Update Slide's Type hidden field
		$('#pm2-table-slides tr:last td .pm2_slide_type').attr("id","pm2_slide_type_"+highestID).attr("name","purevision_options[pm2_slide_type_"+highestID+"]");
		// Update Image Upload Section
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url label').attr("for",'pm2_slide_img_url_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_field').attr("name","purevision_options[pm2_slide_img_url_"+highestID+"]").attr("id","pm2_slide_img_url_"+highestID).attr("value","");
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_btn').attr("id","pm2_slide_upload_button_"+highestID);
		// Update Slide Title
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title label').attr("for",'pm2_slide_img_title_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title input').attr("name",'purevision_options[pm2_slide_img_title_'+highestID+']').attr("id",'pm2_slide_img_title_'+highestID);
		// Update Flash Link
		$('#pm2-table-slides tr:last td div.flash-link').attr("id",'pm2_flash_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.flash-link label.flash-url').attr("for",'pm2_flash_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.flash-link input').attr("name",'purevision_options[pm2_flash_link_url_'+highestID+']').attr("id",'pm2_flash_link_url_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#pm2-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#pm2-table-slides tr').each(function(index) {
		    $("#pm2-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#pm2-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#pm2-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#pm2_slides_order_str
		$('input#pm2_slides_order_str').val(slidesOrder);
		$("#pm2-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	// Add a new Piecemaker 2 Video slide
	$('.add-video-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#pm2-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#pm2-video-clone-table tr').clone().appendTo($('#pm2-table-slides'));
		$('#pm2-table-slides tr:last').attr("id",++highestID);
		// Update Slide's Type hidden field
		$('#pm2-table-slides tr:last td .pm2_slide_type').attr("id","pm2_slide_type_"+highestID).attr("name","purevision_options[pm2_slide_type_"+highestID+"]");
		// Update Image Upload Section
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url label').attr("for",'pm2_slide_img_url_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_field').attr("name","purevision_options[pm2_slide_img_url_"+highestID+"]").attr("id","pm2_slide_img_url_"+highestID).attr("value","");
		$('#pm2-table-slides tr:last td div.pm2_slide_img_url input.pm2_slide_img_url_btn').attr("id","pm2_slide_upload_button_"+highestID);
		// Update Slide Title
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title label').attr("for",'pm2_slide_img_title_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_slide_img_title input').attr("name",'purevision_options[pm2_slide_img_title_'+highestID+']').attr("id",'pm2_slide_img_title_'+highestID);
		// Update Video Link
		$('#pm2-table-slides tr:last td div.video-link').attr("id",'pm2_video_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.video-link label.video-url').attr("for",'pm2_video_link_url_'+highestID);
		$('#pm2-table-slides tr:last td div.video-link input').attr("name",'purevision_options[pm2_video_link_url_'+highestID+']').attr("id",'pm2_video_link_url_'+highestID);
		// Update Video Width
		$('#pm2-table-slides tr:last td div.pm2_video_width label').attr("for",'pm2_video_width_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_video_width input').attr("name",'purevision_options[pm2_video_width_'+highestID+']').attr("id",'pm2_video_width_'+highestID);
		// Update Video Height
		$('#pm2-table-slides tr:last td div.pm2_video_height label').attr("for",'pm2_video_height_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_video_height input').attr("name",'purevision_options[pm2_video_height_'+highestID+']').attr("id",'pm2_video_height_'+highestID);
		// Update Video Autoplay
		$('#pm2-table-slides tr:last td div.pm2_video_autoplay label').attr("for",'pm2_video_autoplay_'+highestID);
		$('#pm2-table-slides tr:last td div.pm2_video_autoplay select').attr("value","").attr("id","pm2_video_autoplay_"+highestID).attr("name","purevision_options[pm2_video_autoplay_"+highestID+"]");

		// Add the image upload module to the newly added row
		addUploader('#pm2-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#pm2-table-slides tr').each(function(index) {
		    $("#pm2-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#pm2-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#pm2-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#pm2_slides_order_str
		$('input#pm2_slides_order_str').val(slidesOrder);
		$("#pm2-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#pm2-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#pm2-table-slides tr').each(function(index) {
			$("#pm2-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#pm2-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#pm2_slides_order_str
		    $('input#pm2_slides_order_str').val(slidesOrder);
		    $("#pm2-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            $('#pm2_slide_upload_button_'+rowID).click(function() {
                formfield = $('#pm2_slide_img_url_'+rowID).attr('id');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
	}

});



// Piecemaker 2 (Transitions) jQuery functionality to drag-n-drop, delete and upload Transition
jQuery(document).ready(function($) {

	// Initialise the table
	$('#pm2-table-transitions').tableDnD({
		onDragClass: "myDragClassTransitions",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var transitionsOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			transitionsOrder += ","+rows[i].id;
		    }
		    $('input#pm2_transitions_order_str').val(transitionsOrder);
		},
		dragHandle: "transitionDragHandle"
	});


	// Delete a transition
	$('#pm2-table-transitions tr td.deleteTransition').bind("mousedown", ( deleteTransition ));

	// Add a new transition
	$('.add-transition-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#pm2-table-transitions tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#pm2-transition-clone-table tr').clone().appendTo($('#pm2-table-transitions'));
		$('#pm2-table-transitions tr:last').attr("id",++highestID);
		// Update Pieces
		$('#pm2-table-transitions tr:last td div.pm2_transition_pieces label').attr("for",'pm2_transition_pieces_'+highestID);
		$('#pm2-table-transitions tr:last td div.pm2_transition_pieces input').attr("name",'purevision_options[pm2_transition_pieces_'+highestID+']').attr("id",'pm2_transition_pieces_'+highestID);
		// Update Transition Time
		$('#pm2-table-transitions tr:last td div.pm2_transition_time label').attr("for",'pm2_transition_time_'+highestID);
		$('#pm2-table-transitions tr:last td div.pm2_transition_time input').attr("name",'purevision_options[pm2_transition_time_'+highestID+']').attr("id",'pm2_transition_time_'+highestID);
		// Update Transition Type
		$('#pm2-table-transitions tr:last td div.transition-type label').attr("for",'pm2_transition_type_'+highestID);
		$('#pm2-table-transitions tr:last td div.transition-type select').attr("value","").attr("id","pm2_transition_type_"+highestID).attr("name","purevision_options[pm2_transition_type_"+highestID+"]");
		// Update Transition Delay
		$('#pm2-table-transitions tr:last td div.pm2_transition_delay label').attr("for",'pm2_transition_delay_'+highestID);
		$('#pm2-table-transitions tr:last td div.pm2_transition_delay input').attr("name",'purevision_options[pm2_transition_delay_'+highestID+']').attr("id",'pm2_transition_delay_'+highestID);
		// Update Depth Offset
		$('#pm2-table-transitions tr:last td div.pm2_depth_offset label').attr("for",'pm2_depth_offset_'+highestID);
		$('#pm2-table-transitions tr:last td div.pm2_depth_offset input').attr("name",'purevision_options[pm2_depth_offset_'+highestID+']').attr("id",'pm2_depth_offset_'+highestID);
		// Update Cube Distance
		$('#pm2-table-transitions tr:last td div.pm2_cube_distance label').attr("for",'pm2_cube_distance_'+highestID);
		$('#pm2-table-transitions tr:last td div.pm2_cube_distance input').attr("name",'purevision_options[pm2_cube_distance_'+highestID+']').attr("id",'pm2_cube_distance_'+highestID);

		// sort displayed row numbers
		$('#pm2-table-transitions tr').each(function(index) {
		    $("#pm2-table-transitions tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#pm2-table-transitions tr:last td.deleteTransition').bind("mousedown", ( deleteTransition ));

		// update the transitions' list
		var transitionsOrder = '';
		$('#pm2-table-transitions tr').each(function(index) {
		    if (index == 0){
			transitionsOrder += $(this).attr('id');
		    } else {
			transitionsOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#pm2_transitions_order_str
		$('input#pm2_transitions_order_str').val(transitionsOrder);
		$("#pm2-table-transitions").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteTransition() {
		// remove delete transition button if only one transition is left
		if ($('#pm2-table-transitions tr').size() == 1) {
		    alert("Deletion is not allowed! At least one transition must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Transition?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#pm2-table-transitions tr').each(function(index) {
			$("#pm2-table-transitions tr td.position").eq(index).html(index+1);
		    });

		    // update the transitions order
		    var transitionsOrder = '';
		    $('#pm2-table-transitions tr').each(function(index) {
			if (index == 0){
			    transitionsOrder += $(this).attr('id');
			}else {
			    transitionsOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#pm2_transitions_order_str
		    $('input#pm2_transitions_order_str').val(transitionsOrder);
		    $("#pm2-table-transitions").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}

});



// Cycle 1 Slider jQuery functionality to drag-n-drop, delete and upload images
jQuery(document).ready(function($) {

	// Initialise the table
	$('#c1-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#c1_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#c1-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#c1-table-slides', curID);
	});

	// Delete a slide
	$('#c1-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#c1-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#c1-clone-table tr').clone().appendTo($('#c1-table-slides'));
		$('#c1-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#c1-table-slides tr:last td div.c1_slide_upload_section label').attr("for",'c1_slide_img_url_'+highestID);
		$('#c1-table-slides tr:last td div.c1_slide_upload_section input.c1_slide_img_url_field').attr("name","purevision_options[c1_slide_img_url_"+highestID+"]").attr("id","c1_slide_img_url_"+highestID).attr("value","");
		$('#c1-table-slides tr:last td div.c1_slide_upload_section input.c1_slide_img_url_btn').attr("id","c1_slide_upload_button_"+highestID);
		// Update Transition Type
		$('#c1-table-slides tr:last td div.transition-type select').attr("value","").attr("id","c1_transition_type_"+highestID).attr("name","purevision_options[c1_transition_type_"+highestID+"]");
		// Update Slide Link ID's
		$('#c1-table-slides tr:last td div.slide-link').attr("id",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-url').attr("for",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link input').attr("name",'purevision_options[c1_slide_link_url_'+highestID+']').attr("id",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-target').attr("for",'c1_slide_link_target_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-target select').attr("name",'purevision_options[c1_slide_link_target_'+highestID+']').attr("id",'c1_slide_link_target_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.slide-alt-tag').attr("for",'c1_slide_image_alt_tag_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link input').attr("name",'purevision_options[c1_slide_image_alt_tag_'+highestID+']').attr("id",'c1_slide_image_alt_tag_'+highestID);
		// Add the image upload module to the newly added row
		addUploader('#c1-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#c1-table-slides tr').each(function(index) {
		    $("#c1-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#c1-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#c1-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#c1_slides_order_str
		$('input#c1_slides_order_str').val(slidesOrder);
		$("#c1-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#c1-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#c1-table-slides tr').each(function(index) {
			$("#c1-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#c1-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#c1_slides_order_str
		    $('input#c1_slides_order_str').val(slidesOrder);
		    $("#c1-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            $('#c1_slide_upload_button_'+rowID).click(function() {
                formfield = $('#c1_slide_img_url_'+rowID).attr('id');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
	}

});



// Cycle 2 Slider jQuery functionality to drag-n-drop, delete and upload images
jQuery(document).ready(function($) {

	// Initialise the table
	$('#c2-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#c2_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#c2-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#c2-table-slides', curID);
	});

	// Delete a slide
	$('#c2-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#c2-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#c2-clone-table tr').clone().appendTo($('#c2-table-slides'));
		$('#c2-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#c2-table-slides tr:last td div.c2_slide_img_url label').attr("for",'c2_slide_img_url_'+highestID);
		$('#c2-table-slides tr:last td div.c2_slide_img_url input.c2_slide_img_url_field').attr("name","purevision_options[c2_slide_img_url_"+highestID+"]").attr("id","c2_slide_img_url_"+highestID).attr("value","");
		$('#c2-table-slides tr:last td div.c2_slide_img_url input.c2_slide_img_url_btn').attr("id","c2_slide_upload_button_"+highestID);
		// Update Transition Type
		$('#c2-table-slides tr:last td div.transition-type select').attr("value","").attr("id","c2_transition_type_"+highestID).attr("name","purevision_options[c2_transition_type_"+highestID+"]");
		// Update Slide Link
		$('#c2-table-slides tr:last td div.slide-link').attr("id",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-url').attr("for",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link input').attr("name",'purevision_options[c2_slide_link_url_'+highestID+']').attr("id",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-target').attr("for",'c2_slide_link_target_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-target select').attr("name",'purevision_options[c2_slide_link_target_'+highestID+']').attr("id",'c2_slide_link_target_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.slide-alt-tag').attr("for",'c2_slide_image_alt_tag_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link input').attr("name",'purevision_options[c2_slide_image_alt_tag_'+highestID+']').attr("id",'c2_slide_image_alt_tag_'+highestID);
		// Update slide's info text
		$('#c2-table-slides tr:last td div.slide-info-text textarea').attr("name",'purevision_options[c2_slide_default_info_txt_'+highestID+']').attr("id",'c2_slide_default_info_txt_'+highestID);
		// Update Slide Button Text & Style
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-text').attr("for",'c2_slide_button_txt_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button input').attr("name",'purevision_options[c2_slide_button_txt_'+highestID+']').attr("id",'c2_slide_button_txt_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-style').attr("for",'c2_slide_button_style_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-style select').attr("name",'purevision_options[c2_slide_button_style_'+highestID+']').attr("id",'c2_slide_button_style_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#c2-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#c2-table-slides tr').each(function(index) {
		    $("#c2-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#c2-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#c2-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#c2_slides_order_str
		$('input#c2_slides_order_str').val(slidesOrder);
		$("#c2-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#c2-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#c2-table-slides tr').each(function(index) {
			$("#c2-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#c2-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#c2_slides_order_str
		    $('input#c2_slides_order_str').val(slidesOrder);
		    $("#c2-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            $('#c2_slide_upload_button_'+rowID).click(function() {
                formfield = $('#c2_slide_img_url_'+rowID).attr('id');
                tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
                return false;
            });
	}

});






