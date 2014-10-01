<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */
/**
 * Template Name: Blog page
 */


get_header();

global $more; $more = 0; // Enable 'more tag' for this page
global $post;
// get the page id outside the loop (check if WPML plugin is installed and use the WPML way of getting the page ID in the current language)
$page_id = ( function_exists('icl_object_id') && function_exists('icl_get_default_language') ) ? icl_object_id($post->ID, 'page', true, icl_get_default_language()) : $post->ID;
$content_position = ( $purevision_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $purevision_options['remove_blog_sidebar'] == 'yes' ) $content_position = 'grid_24';

$exclude_portfolio_from_blog = $purevision_options['exclude_portfolio_from_blog'];

//adhere to paging rules
if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
    $paged = get_query_var('page');
} else {
    $paged = 1;
}

if ( $exclude_portfolio_from_blog == 'yes' ) {
    // get the portfolio categories to be excluded from the Blog section
    $portfolio_categories = $purevision_options['portfolio_categories'];
    $portfolio_cats_array = explode(',', $portfolio_categories);
    function add_minus_prefix( $var ) {
	return( '-' . $var);
    }
    $portfolio_cats_array_with_minus = array_map( "add_minus_prefix", $portfolio_cats_array );
    $portfolio_cats_with_minus = implode(',', $portfolio_cats_array_with_minus);
    $query_string = "cat=$portfolio_cats_with_minus&paged=$paged";
} else {
    $query_string = "paged=$paged";
}

query_posts( $query_string );

?>
<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php   // Begin: Display Blog page Content if there is any
            $blog_page_query = new WP_Query( 'page_id='.$page_id );
	    if ($blog_page_query->have_posts()) : while ($blog_page_query->have_posts()) : $blog_page_query->the_post();
            if( get_the_content() ) : ?>
                    <div class="post" id="post-<?php the_ID(); ?>">
                        <div class="entry">
<?php                       the_content(); ?>
                        </div>
                    </div>
<?php           endif;
            endwhile; endif;
	    //Reset Query
	    wp_reset_postdata(); ?>
	    <div class="clear"></div>
<?php   // End: Display Blog page Content if there is any ?>
            
<?php	    if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                        <div class="post-top">
                            <div class="post-date">
                                <span class="day"><?php the_time('d') ?></span>
                                <span class="month"><?php the_time('M') ?></span>
                                <span class="year"><?php the_time('Y') ?></span>
                            </div>
                            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <div class="postmetadata">
<?php                       the_tags(__('Tags: ', 'purevision'), ', ', '<br />');
                            if( $purevision_options['show_postmetadata_author'] == 'yes' ) : ?>
                                <?php esc_html_e('Written by', 'purevision'); ?> <em><?php the_author_posts_link(); ?></em>,
<?php                       endif; ?>
                            <?php esc_html_e('Posted in ', 'purevision'); ?><?php the_category(', '); ?> | <?php edit_post_link(__('Edit', 'purevision'), '', ' | '); ?>  <?php comments_popup_link( __( 'Leave a comment', 'purevision' ), __( '1 Comment', 'purevision' ), __( '% Comments', 'purevision' ) ); ?>
                        </div>
			<div class="entry">
<?php                       // Post Image
                            display_post_image_fn( $post->ID, true );
                            
			    if ( $purevision_options['show_excerpt'] == 'yes' ) {
				the_excerpt(); //display the excerpt
			    } else {
				the_content('Read the rest of this entry &raquo;');  //display the default content
			    }
			    if ( $purevision_options['blog_button_text'] ) : ?>
				<a class="pngfix small-dark-button align-btn-left" href="<?php the_permalink(); ?>" title="<?php echo $purevision_options['blog_button_text']; ?>"><span class="pngfix"><?php echo $purevision_options['blog_button_text']; ?></span></a>
				<div class="clear"></div>
<?php			    endif; ?>
			</div>
		    </div>
<?php		endwhile; ?>

		<div class="clear"></div>

<?php		// Pagination
		if(function_exists('wp_pagenavi')) :
		    wp_pagenavi();
		else : ?>
		    <div class="navigation">
			    <div class="alignleft"><?php previous_posts_link() ?></div>
			    <div class="alignright"><?php next_posts_link() ?></div>
		    </div>
<?php		endif; ?>

<?php	    else : ?>
		<h2 class="center"><?php esc_html_e('Not Found', 'purevision'); ?></h2>
		<p class="center"><?php esc_html_e("Sorry, but you are looking for something that isn't here.", 'purevision'); ?></p>
<?php		get_search_form();
	    endif;
	    //Reset Query
	    wp_reset_query();
                
            edit_post_link(__('Edit this page', 'purevision'), '<div style="float:right;margin:0 10px;">', '</div>'); ?>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( ( !$purevision_options['remove_blog_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


