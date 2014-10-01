<?php 
/**
 * @package WordPress
 * @subpackage pureVISION
 */

global $purevision_options, $style, $current_slider;
// get the current color scheme subdirectory
$style = ( $purevision_options['color_scheme'] ) ? "style{$purevision_options['color_scheme']}": "style1";
$current_slider = $purevision_options['current_slider'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="show-menu-auto-arrows" content="<?php echo ($purevision_options['show_menu_auto_arrows']) ? 1 : 0; ?>" />
<meta name="show-menu-drop-shadows" content="<?php echo ($purevision_options['show_menu_drop_shadows']) ? 1 : 0; ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if IE 6]>
    <script  type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/DD_belatedPNG_0.0.8a-min.js"></script>
    <script  type="text/javascript">
    // <![CDATA[
	DD_belatedPNG.fix('.pngfix, img, #home-page-content li, #page-content li, #bottom li, #footer li, #recentcomments li span');
    // ]]>
    </script>
<![endif]-->

<?php wp_head(); ?>

<!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie-all.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6-7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/common-css/ie6.css" media="screen" type="text/css" />
    <style type="text/css">
	body{ behavior: url("<?php bloginfo('template_directory'); ?>/scripts/csshover3.htc"); }
    </style>
<![endif]-->
<?php echo $purevision_options['google_analytics']; ?>

</head>
<body <?php body_class( $purevision_options['enable_cufon'] ); ?>>
<?php 
    if ($purevision_options['enable_feedback']) : ?>
	<div id="feedback"><a href="<?php echo $purevision_options['feedback_url']; ?>" title="<?php esc_attr_e('Feedback', 'purevision'); ?>" class="feedback"></a></div>
<?php 
    endif;
    if ($purevision_options['enable_page_peel']) : ?>
	<div id="page-peel">
		<a href="<?php echo $purevision_options['page_peel_url']; ?>" title="<?php esc_attr_e('Subscribe', 'purevision'); ?>"><img src="<?php bloginfo('template_directory'); ?>/styles/style1/images/page_peel.png" alt="subscribe" /></a>
		<div class="msg_block"></div>
	</div>
<?php
    endif; ?>
    <div id="wrapper-1" class="pngfix">
	<div id="top-container">
	    <div id="top" class="container_24">
		<div id="logo" class="grid_14">
<?php		    if( is_front_page() ) : ?>
			<h1><a title="<?php bloginfo('name'); ?>" class="pngfix" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<?php		    else : ?>
			<div class="site-name"><a title="<?php bloginfo('name'); ?>" class="pngfix" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
<?php		    endif; ?>
		</div>
		<div id="slogan" class="grid_17"><?php bloginfo('description'); ?></div>
		<!-- end logo slogan -->
		<div class="phone-number grid_7 prefix_11">
<?php		    echo $purevision_options['top_page_phone_number']; ?>
		</div>
		<!-- end phone-number -->
<?php		if ($purevision_options['enable_search']) : ?>
		    <div id="search" class="grid_5">
			<form action="<?php bloginfo('url'); ?>/" method="get">
			    <div class="search_box">
				<input id="search_field" name="s" type="text" class="inputbox_focus blur pngfix" value="<?php esc_attr_e('Search...', 'purevision'); ?>" />
				<input type="submit"  value="" class="search-btn pngfix" />
			    </div>
			</form>
		    </div><!-- end search -->
<?php		endif; ?>
		</div>
	    <!-- end top -->
	</div>
	<!-- end top-container -->

	<div class="clear"></div>

	<div id="main-menu" class="pngfix">
	    <div id="dropdown-holder" class="container_24">
<?php               preload_menu_images(); // self explanatory
		    purevision_nav(); // this function calls the main menu ?>
	    </div>
	    <!-- end dropdown-holder -->
	</div>
	<!-- end main-menu -->

	<div class="clear"></div>

<?php	if( is_front_page() ) : ?>

<?php
	    if( $current_slider == '1' ) :
		include( 'sliders/flashmo/grid_slider/grid_slider_display.php' );
	    elseif( $current_slider == '2' ) :
		include( 'sliders/piecemaker/piecemaker_display.php' );
	    elseif( $current_slider == '3' ) :
		include( 'sliders/piecemaker_2/piecemaker_display.php' );
	    elseif ( $current_slider == '4' ) :
		include( 'sliders/cycle/cycle1/cycle1_display.php' );
	    elseif ( $current_slider == '5' ) :
		include( 'sliders/cycle/cycle2/cycle2_display.php' );
	    elseif ( $current_slider == '6' ) : // no slider ?>
		<div id="page-content-title">
		    <div id="page-content-header" class="container_24">
			<div id="page-title">
<?php                       if ( $purevision_options['no_slider_text'] ) echo '<h2>' . $purevision_options['no_slider_text'] . '</h2>'; ?>
			</div>
		    </div>
		    <!-- end page-content-header -->
		</div>
		<!-- end page-content-title -->
<?php	    endif; ?>

	    <div class="clear"></div>
<?php
            // home-page-before-content Widget Area
            $before_cont_1_is_active = sidebar_exist_and_active('home-page-before-content');
            if ( $before_cont_1_is_active  ) : // hide this area if no widgets are active...
?>
                <div id="before-content">
                    <div id="before-content-column" class="container_24">
                        <div class="home-page-divider pngfix"></div>
<?php
                        if ( $before_cont_1_is_active ) {
                            echo get_dynamic_column( 'before-cont-box-1', 'column_3_of_3 home-cont-box', 'home-page-before-content' );
                        } ?>
                        <div class="home-page-divider pngfix"></div>
                    </div>
                    <!-- end before-content-column -->
                </div>
                <!-- end before-content -->

		<div class="clear"></div>

<?php	    endif; ?>

	    <div id="home-page-content">

<?php	else : // NOT front page ?>

	    <div id="page-content-title">
		<div id="page-content-header" class="container_24">
		    <div id="page-title">
<?php 			$post = $posts[0]; // Hack. Set $post so that the_date() works.
			if (is_page()) : ?>
			    <h1><?php the_title(); ?></h1>
<?php			elseif ( is_single() ) :
			    if ( get_post_type( $post ) == 'post' ) : 
				// the next few lines will generate a comma separated list of categories' names that the current single post has been assigned to
				$categories_names_array = array();
				foreach((get_the_category()) as $category) {
				    array_push( $categories_names_array, $category->cat_name );
				} ?>
				<div class="single-post-categories"><?php echo implode(", ", $categories_names_array); ?></div>
<?php			    else : // custom type ?>
				<div class="single-post-categories"><?php echo ucwords( get_post_type( $post ) ); ?></div>
<?php			    endif; ?>
<?php			elseif (is_tax()) : /* If this is a taxonomy archive */
			    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>
			    <h1 class="pagetitle"><?php echo ucwords( $term->taxonomy ) . ': ' . $term->name; ?></h1>
<?php			elseif (is_category()) : /* If this is a category archive */ ?>
<?php                       if ($purevision_options['show_archive_for_string'] == 'yes') : ?>
                                <h1 class="pagetitle"><?php single_cat_title("", true); ?></h1>
<?php                       else : ?>
                                <h1 class="pagetitle"><?php printf( __('Archive for the &#8216;%s&#8217; Category', 'purevision' ), single_cat_title("", false) ); ?></h1>
<?php                       endif; ?>
<?php			elseif (is_search()) : /* If this is a search results page */ ?>
			    <h1 class="pagetitle"><?php printf( __('Search Results for &#8216;<em>%s</em>&#8217;', 'purevision' ), get_search_query() ); ?></h1>
<?php			elseif (is_404()) : /* If this is a 404 page */ ?>
			    <h1 class="pagetitle"><?php esc_html_e('Page Not Found (Error 404)', 'purevision'); ?></h1>
<?php			elseif( is_tag() ) : /* If this is a tag archive */ ?>
			    <h1 class="pagetitle"><?php printf( __('Posts Tagged &#8216;%s&#8217;', 'purevision' ), single_tag_title("", false) ); ?></h1>
<?php			elseif (is_day()) : /* If this is a daily archive */ ?>
			    <h1 class="pagetitle"><?php printf( __('Archive for %s', 'purevision' ), get_the_time('F jS, Y') ); ?></h1>
<?php			elseif (is_month()) : /* If this is a monthly archive */ ?>
			    <h1 class="pagetitle"><?php printf( __('Archive for %s', 'purevision' ), get_the_time('F Y') ); ?></h1>
<?php			elseif (is_year()) : /* If this is a yearly archive */ ?>
			    <h1 class="pagetitle"><?php printf( __('Archive for %s', 'purevision' ), get_the_time('Y') ); ?></h1>
<?php			elseif (is_author()) : /* If this is an author archive */ ?>
			    <h1 class="pagetitle"><?php esc_html_e('Author Archive', 'purevision'); ?></h1>
<?php			elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : /* If this is a paged archive */ ?>
			    <h1 class="pagetitle"><?php esc_html_e('Blog Archives', 'purevision'); ?></h1>
<?php			else : // the case when a Title is NOT present the height should be maintained ?>
			    <div class="no-title-present"></div>
<?php			endif; ?>
		    </div>
		    <!-- end page-title -->
		</div>
		<!-- end page-content-header -->
	    </div>
	    <!-- end page-content-title -->

	    <div class="clear"></div>

	    <div id="page-content">
<?php		    // Breadcrumbs
		    if ( ($purevision_options['show_breadcrumbs'] == 'yes') && class_exists('simple_breadcrumb') ) : ?>
			<div class="container_24">
<?php			    $breadcrumbs_go = new simple_breadcrumb; ?>
			</div>
<?php		    else : ?>
			<div class="no-breadcrumbs-padding"></div>
<?php		    endif; ?>



<?php	endif;




