<?php 
/*
Theme Name: pureVISION
Theme URI: http://themeforest.net/item/purevision-wordpress-theme/156538
Description: CSS for the 'pureVISION Theme'.
Version: 1.9.0
Author: Andon
Author URI: http://themeforest.net/user/internq7/portfolio
*/

$root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))));
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}

global $style;
// get the current color scheme subdirectory
$style = ( $purevision_options['color_scheme'] ) ? "style{$purevision_options['color_scheme']}": "style1";
$logo_img_url = ( $purevision_options['custom_logo_img'] ) ? $purevision_options['custom_logo_img'] : get_bloginfo('template_url').'/styles/'.$style.'/images/logo.png';

$font_family = preg_replace('/:.*/','', $purevision_options['font_family']);
$title_headings_font_family = preg_replace('/:.*/','', $purevision_options['title_headings_font_family']);
$top_nav_font_family = preg_replace('/:.*/','', $purevision_options['top_nav_font_family']);


header("Content-type: text/css");

/* Styles Other Than "Custom Colors" section
------------------------------------------------------------------------------*/ ?>
/* Custom Styles */
body { font-family:'<?php echo $font_family; ?>'; }
body { font-size:<?php echo $purevision_options['font_size']; ?>px; }
h1, h2, h3, h4, h5, h6, #slogan, .single-post-categories { font-family:'<?php echo $title_headings_font_family; ?>'; }
#top { height:<?php echo $purevision_options['top_area_height']; ?>px; }
#logo h1 a, #logo .site-name a { background:transparent url( <?php echo esc_url($logo_img_url); ?> ) no-repeat 0 100%; width:<?php echo $purevision_options['logo_width']; ?>px; height:<?php echo $purevision_options['logo_height']; ?>px; }
#slogan { top:<?php echo $purevision_options['slogan_distance_from_the_top']; ?>px; left:<?php echo $purevision_options['slogan_distance_from_the_left']; ?>px; }
#slogan { font-size:<?php echo $purevision_options['slogan_font_size']; ?>px; }
.js_on .cufon-on #slogan { font-size:<?php echo ($purevision_options['slogan_font_size']+2); ?>px; }
#navigation-menu { font-family:'<?php echo $top_nav_font_family; ?>'; }
#navigation-menu { font-size:<?php echo $purevision_options['top_nav_font_size']; ?>px; }
<?php if ($purevision_options['remove_border_under_menu'] == 'yes') : ?>
    #main-menu { background:none; }
<?php endif; ?>
<?php $heading_font_size_coefficient = $purevision_options['heading_font_size_coefficient']; ?>
h1 {font-size:<?php echo (1.883 * $heading_font_size_coefficient); ?>em !important; }
h2 {font-size:<?php echo (1.667 * $heading_font_size_coefficient); ?>em !important; }
h3 {font-size:<?php echo (1.5 * $heading_font_size_coefficient); ?>em !important; }
h4 {font-size:<?php echo (1.333 * $heading_font_size_coefficient); ?>em !important; }
h5 {font-size:<?php echo (1.25 * $heading_font_size_coefficient); ?>em !important; }
h6 {font-size:<?php echo (1.083 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h1 {font-size:<?php echo (2.3 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h2 {font-size:<?php echo (2.18 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h3 {font-size:<?php echo (1.883 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h4 {font-size:<?php echo (1.667 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h5 {font-size:<?php echo (1.5 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h6 {font-size:<?php echo (1.333 * $heading_font_size_coefficient); ?>em !important; }

#page-content-title #page-title h1,
#page-content-title #page-title h2,
#page-content-title #page-title h3,
#page-content-title #page-title .single-post-categories {font-size:<?php echo (1.883 * $heading_font_size_coefficient); ?>em !important; }

.js_on .cufon-on #page-content-title #page-title h1,
.js_on .cufon-on #page-content-title #page-title h2,
.js_on .cufon-on #page-content-title #page-title h3,
.js_on .cufon-on #page-content-title #page-title .single-post-categories {font-size:<?php echo (2.3 * $heading_font_size_coefficient); ?>em !important; }

.post-top h1, .post-top h2, .post-top h3 {font-size:<?php echo (1.5 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on .post-top h1, .js_on .cufon-on .post-top h2, .post-top h3 {font-size:<?php echo (1.883 * $heading_font_size_coefficient); ?>em !important; }

.portfolio-items-wrapper h2 {font-size:<?php echo (1.333 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on .portfolio-items-wrapper h2 {font-size:<?php echo (1.667 * $heading_font_size_coefficient); ?>em !important; }
h2.portfolio-single-column {font-size:<?php echo (1.667 * $heading_font_size_coefficient); ?>em !important; }
.js_on .cufon-on h2.portfolio-single-column {font-size:<?php echo (2.18 * $heading_font_size_coefficient); ?>em !important; }

h3.bottom-col-title {font-size:<?php echo (1.5 * ($heading_font_size_coefficient - 0.1)); ?>em !important; }
.js_on .cufon-on h3.bottom-col-title {font-size:<?php echo (1.883 * ($heading_font_size_coefficient - 0.1)); ?>em !important; }

#gs-header #header-content { width:<?php echo $purevision_options['gs_image_width']; ?>px; }
<?php if ($purevision_options['c1_remove_image_frame'] == 'yes') : ?>
    #c1-slider { background-image:none; }
    .c1-slide-img-wrapper { padding:10px;}
    #c1-shadow { margin:-309px auto 0; }
<?php endif; ?>
#c2-slider .slide-desc h2, #c2-slider .slide-desc { color:#<?php echo $purevision_options['c2_text_color']; ?>; }
#c2-slider .slide-desc h2 { font-size:<?php echo ($purevision_options['c2_slider_text_size']+0.6); ?>em !important; font-family:'<?php echo $font_family; ?>'; line-height:<?php echo $purevision_options['c2_slider_text_line_height']; ?>; }
#c2-slider .slide-desc p, #c2-slider .slide-desc ul { font-size:<?php echo $purevision_options['c2_slider_text_size']; ?>em; line-height:<?php echo $purevision_options['c2_slider_text_line_height']; ?>; }

<?php if ( $purevision_options['feedback_position_fixed'] == 'yes' ) : ?>
    #feedback a.feedback { position: fixed; }
<?php endif; ?>

<?php if ($purevision_options['percent_based_column_width'] == 'yes') : ?>
    .one_fourth, .one_third, .one_half, .two_third, .three_fourth { margin-right:4%; }
    .one_fourth { width:22%; }
    .one_third { width:30%; }
    .one_half { width:48%; }
    .two_third { width:65%; }
    .three_fourth { width:74%; }
    .full_width { width:100%; }
<?php endif; ?>

<?php
/* Styles from "Custom Colors" section
------------------------------------------------------------------------------*/
if ( $purevision_options['custom_colors_switch'] == 'enable' ) { ?>

body, .posts-counter { color:#<?php echo $purevision_options['body_text_color']; ?>; }
a { color:#<?php echo $purevision_options['main_link_color']; ?>; }
a:hover { color:#<?php echo $purevision_options['main_link_color_hover']; ?>; }
.custom-formatting li.current_page_item > a, .custom-formatting li.current-menu-item > a, .custom-formatting li.current-cat > a, .custom-formatting li.current > a { color: #<?php echo $purevision_options['main_link_color_hover']; ?>; }
.custom-formatting li.current_page_item > a:hover, .custom-formatting li.current-menu-item > a:hover,.custom-formatting li.current-cat > a:hover, .custom-formatting li.current > a:hover { color: #<?php echo $purevision_options['main_link_color']; ?>; }
h1,h2,h3,h4,h5,h6 { color:#<?php echo $purevision_options['main_headings_color']; ?>; }
<?php if ($purevision_options['top_bg_img'] != '') : ?>
    #wrapper-1 { background: url("<?php echo $purevision_options['top_bg_img']; ?>") <?php echo $purevision_options['top_bg_img_repeat']; ?> scroll <?php echo $purevision_options['top_bg_img_position_horizontal']; ?> <?php echo $purevision_options['top_bg_img_position_vertical']; ?> #<?php echo $purevision_options['top_bg_color']; ?>; }
<?php else : ?>
    #wrapper-1 { background-color:#<?php echo $purevision_options['top_bg_color']; ?>; }
<?php endif; ?>
#slogan, #top .phone-number, #search input.blur { color:#<?php echo $purevision_options['top_text_color']; ?>; }
#slogan{ color:#<?php echo $purevision_options['top_text_color']; ?>; }
<?php if ($purevision_options['header_bg_img'] != '') : ?>
    #gs-header, #piecemaker-header, #c1-header, #c2-header { background: url("<?php echo $purevision_options['header_bg_img']; ?>") <?php echo $purevision_options['header_bg_img_repeat']; ?> scroll <?php echo $purevision_options['header_bg_img_position_horizontal']; ?> <?php echo $purevision_options['header_bg_img_position_vertical']; ?> #<?php echo $purevision_options['header_bg_color']; ?>; }
<?php else : ?>
    #gs-header, #piecemaker-header, #c1-header, #c2-header { background-color:#<?php echo $purevision_options['header_bg_color']; ?>; }
<?php endif; ?>
#navigation-menu ul.sf-menu > li > a > span { color:#<?php echo $purevision_options['top_nav_link_color']; ?>; }
#navigation-menu ul.sf-menu > li.current-menu-item > a > span, #navigation-menu ul.sf-menu > li.current_page_item > a > span { color:#<?php echo $purevision_options['top_nav_active_link_color']; ?>; }
#navigation-menu ul.sf-menu > li.current-menu-item > a > span:hover, #navigation-menu ul.sf-menu > li.current_page_item > a > span:hover { color:#<?php echo $purevision_options['top_nav_hover_link_color']; ?>; }
#navigation-menu ul.sf-menu > li > a:hover span { color:#<?php echo $purevision_options['top_nav_hover_link_color']; ?>; }
#page-content-title #page-title h1, .js_on .cufon-on #page-content-title #page-title h1,
#page-content-title #page-title h2, .js_on .cufon-on #page-content-title #page-title h2,
#page-content-title #page-title h3, .js_on .cufon-on #page-content-title #page-title h3,
#page-content-title #page-title .single-post-categories, .js_on .cufon-on #page-content-title #page-title .single-post-categories { color:#<?php echo $purevision_options['page_title_color']; ?>; }
<?php if ($purevision_options['page_title_bg_img'] != '') : ?>
    #page-content-title { background: url("<?php echo $purevision_options['page_title_bg_img']; ?>") <?php echo $purevision_options['page_title_bg_img_repeat']; ?> scroll <?php echo $purevision_options['page_title_bg_img_position_horizontal']; ?> <?php echo $purevision_options['page_title_bg_img_position_vertical']; ?> #<?php echo $purevision_options['page_title_bg_color']; ?>; }
<?php else : ?>
    #page-content-title { background-color:#<?php echo $purevision_options['page_title_bg_color']; ?>; }
<?php endif; ?>
<?php if ($purevision_options['main_content_bg_img'] != '') : ?>
    #home-page-content, #page-content { background: url("<?php echo $purevision_options['main_content_bg_img']; ?>") <?php echo $purevision_options['main_content_bg_img_repeat']; ?> scroll <?php echo $purevision_options['main_content_bg_img_position_horizontal']; ?> <?php echo $purevision_options['main_content_bg_img_position_vertical']; ?> #<?php echo $purevision_options['main_content_bg']; ?>; }
<?php else : ?>
    #home-page-content, #page-content { background-color:#<?php echo $purevision_options['main_content_bg']; ?>; }
<?php endif; ?>
h3.before_cont_title { color:#<?php echo $purevision_options['widget_title_color']; ?>; }
#before-content { color:#<?php echo $purevision_options['widget_text_color']; ?>; }
<?php if ($purevision_options['home_page_before_content_bg_img'] != '') : ?>
    #before-content { background: url("<?php echo $purevision_options['home_page_before_content_bg_img']; ?>") <?php echo $purevision_options['home_page_before_content_bg_img_repeat']; ?> scroll <?php echo $purevision_options['home_page_before_content_bg_img_position_horizontal']; ?> <?php echo $purevision_options['home_page_before_content_bg_img_position_vertical']; ?> #<?php echo $purevision_options['widget_bg_color']; ?>; }
<?php else : ?>
    #before-content { background-color:#<?php echo $purevision_options['widget_bg_color']; ?>; }
<?php endif; ?>
<?php if ($purevision_options['enable_bottom_custom_colors'] == 'yes') : ?>
        <?php if ($purevision_options['bottom_bg_img'] != '') : ?>
                #bottom-bg { background: url("<?php echo $purevision_options['bottom_bg_img']; ?>") <?php echo $purevision_options['bottom_bg_img_repeat']; ?> scroll <?php echo $purevision_options['bottom_bg_img_position_horizontal']; ?> <?php echo $purevision_options['bottom_bg_img_position_vertical']; ?> #<?php echo $purevision_options['bottom_bg_color']; ?>; }
        <?php else : ?>
                #bottom-bg { background: none repeat scroll 0 0 #<?php echo $purevision_options['bottom_bg_color']; ?>; }
        <?php endif; ?>
        h3.bottom-col-title { color: #<?php echo $purevision_options['bottom_title_color']; ?>; }
        #bottom, #bottom .textwidget, #bottom #wp-calendar, .posts-counter { color: #<?php echo $purevision_options['bottom_text_color']; ?>; }
        #bottom a { color: #<?php echo $purevision_options['bottom_link_color']; ?>; }
        #bottom a:hover { color: #<?php echo $purevision_options['bottom_hover_link_color']; ?>; }
        #bottom .custom-frame, #bottom .small-custom-frame { border: 1px solid #EAEAEA; }
        h3.bottom-col-title, #bottom ul.small-thumb li, #bottom .widget_recent_entries li a, #bottom .widget_categories li a, #bottom .widget_pages li a, #bottom .widget_subpages li a, #bottom .widget_archive li a, #bottom .widget_links li a, #bottom .widget_rss li a, #bottom .widget_meta li a, #bottom .loginform li a, #bottom .widget_nav_menu li a {
            background: url("../style1/images/heading_underline.png") repeat-x scroll 0 100% transparent;
        }
        #bottom .widget_recent_comments li { background: url("../style1/images/heading_underline.png") repeat-x scroll 0 100% transparent; }
<?php endif; ?>
<?php if ($purevision_options['enable_footer_custom_colors'] == 'yes') : ?>
        <?php if ($purevision_options['footer_bg_img'] != '') : ?>
                #footer-bg { background: url("<?php echo $purevision_options['footer_bg_img']; ?>") <?php echo $purevision_options['footer_bg_img_repeat']; ?> scroll <?php echo $purevision_options['footer_bg_img_position_horizontal']; ?> <?php echo $purevision_options['footer_bg_img_position_vertical']; ?> #<?php echo $purevision_options['footer_bg_color']; ?>; }
        <?php else : ?>
                #footer-bg { background: url("../common-images/home-page-content-top.png") repeat-x scroll 50% 0 #<?php echo $purevision_options['footer_bg_color']; ?>; }
        <?php endif; ?>
        body { background-color: #<?php echo $purevision_options['footer_bg_color']; ?>; }
        #footer, #footer_text { color: #<?php echo $purevision_options['footer_text_color']; ?>; }
        #footer a, #footer_text a { color: #<?php echo $purevision_options['footer_link_color']; ?>; }
        #footer a:hover, #footer_text a:hover { color: #<?php echo $purevision_options['footer_hover_link_color']; ?>; }
<?php endif; ?>

<?php if ($purevision_options['one_continuous_bg_img'] != '') : 
    $one_continuous_bg_img_fixed = ($purevision_options['one_continuous_bg_img_fixed'] == 'yes') ? 'fixed' : 'scroll';
    $one_continuous_bg_img_with_other_bg_imgs = ($purevision_options['one_continuous_bg_img_with_other_bg_imgs'] == 'yes') ? 'background-color:transparent;' : 'background:none;'; ?>
    body { background: url("<?php echo $purevision_options['one_continuous_bg_img']; ?>") <?php echo $purevision_options['one_continuous_bg_img_repeat']; ?> <?php echo $one_continuous_bg_img_fixed; ?>  <?php echo $purevision_options['one_continuous_bg_img_position_horizontal']; ?> <?php echo $purevision_options['one_continuous_bg_img_position_vertical']; ?> #<?php echo $purevision_options['top_bg_color']; ?>; }
    #wrapper-1, #top-wrapper, #gs-header, #piecemaker-header, #c1-header, #c2-header,
    #page-content-title, #home-page-content, #page-content, #before-content, #bottom-bg, #footer-bg { <?php echo $one_continuous_bg_img_with_other_bg_imgs; ?> }
<?php endif; ?>

<?php
}
