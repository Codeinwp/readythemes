<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */

global $purevision_options;

// construct an array of portfolio categories
$portfolio_categories_array = explode( ',', $purevision_options['portfolio_categories'] );

if ( $portfolio_categories_array != "" && post_is_in_category_or_descendants( $portfolio_categories_array ) ) :
    // Test if this Post is assigned to the Portfolio category or any descendant and switch the single's template accordingly
    include 'single-Portfolio.php';
else : // Continue with normal Loop (Blog category)

    get_header();

    $content_position = ( $purevision_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
    if ( $purevision_options['remove_single_sidebar'] == 'yes' ) $content_position = 'grid_24';
?>
    <div id="content-container" class="container_24">
	<div id="main-content" class="<?php echo $content_position; ?>">
	    <div class="main-content-padding">
<?php		if (have_posts()) :
		    while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                            <div class="post-top">
                                <div class="post-date">
                                    <span class="day"><?php the_time('d') ?></span>
                                    <span class="month"><?php the_time('M') ?></span>
                                    <span class="year"><?php the_time('Y') ?></span>
                                </div>
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="postmetadata">
<?php                           the_tags(__('Tags: ', 'purevision'), ', ', '<br />');
                                if( $purevision_options['show_postmetadata_author'] == 'yes' ) : ?>
                                    <?php esc_html_e('Written by', 'purevision'); ?> <em><?php the_author_posts_link(); ?></em>,
<?php                           endif; ?>
                                <?php esc_html_e('Posted in ', 'purevision'); ?><?php the_category(', '); ?> | <?php edit_post_link(__('Edit', 'purevision'), '', ' | '); ?>  <?php comments_popup_link( __( 'Leave a comment', 'purevision' ), __( '1 Comment', 'purevision' ), __( '% Comments', 'purevision' ) ); ?>
                            </div>
			    <div class="entry">
<?php                           // Post Image
                                if( $purevision_options['display_post_image_in_single_post'] == 'yes' ) display_post_image_fn( $post->ID, false );
				the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'purevision'));
				wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			    </div>
			</div>
<?php			comments_template();
		    endwhile; else: ?>
			<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'purevision'); ?></p>
<?php		endif; ?>
	    </div><!-- end main-content-padding -->
	</div><!-- end main-content -->
<?php
	if( ( !$purevision_options['remove_single_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); }
?>
    </div><!-- end content-container -->
<?php
endif; // end normal Loop ?>

<div class="clear"></div>

<?php

get_footer(); 


