<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */
get_header();

$content_position = ( $purevision_options['blog_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
if ( $purevision_options['remove_archive_sidebar'] == 'yes' ) $content_position = 'grid_24';

?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">

	    <?php if (have_posts()) : ?>

		  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php while (have_posts()) : the_post(); ?>
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
<?php                               the_tags(__('Tags: ', 'purevision'), ', ', '<br />');
                                    if( $purevision_options['show_postmetadata_author'] == 'yes' ) : ?>
                                        <?php esc_html_e('Written by', 'purevision'); ?> <em><?php the_author_posts_link(); ?></em>,
<?php                               endif; ?>
                                    <?php esc_html_e('Posted in ', 'purevision'); ?><?php the_category(', '); ?> | <?php edit_post_link(__('Edit', 'purevision'), '', ' | '); ?>  <?php comments_popup_link( __( 'Leave a comment', 'purevision' ), __( '1 Comment', 'purevision' ), __( '% Comments', 'purevision' ) ); ?>
                                </div>
                                <div class="entry">
<?php                               // Post Image
                                    display_post_image_fn( $post->ID, true );

				    if ( $purevision_options['show_excerpt'] == 'yes' ) {
					the_excerpt(); //display the excerpt
				    } else {
					the_content('Read the rest of this entry &raquo;');  //display the default content
				    }
				    if ( $purevision_options['blog_button_text'] ) : ?>
					<a class="pngfix small-dark-button align-btn-left" href="<?php the_permalink(); ?>" title=""><span class="pngfix"><?php echo $purevision_options['blog_button_text']; ?></span></a>
					<div class="clear"></div>
<?php				    endif; ?>
				</div>
			    </div>
			<?php endwhile; ?>

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

	    <?php else :
		if ( is_category() ) { // If this is a category archive
			printf(__("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", 'purevision'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e("<h2>Sorry, but there aren't any posts with this date.</h2>", 'purevision');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", 'purevision'), $userdata->display_name);
		} else {
			_e("<h2 class='center'>No posts found.</h2>", 'purevision');
		}
		get_search_form();
	    endif;
?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php	if( ( !$purevision_options['remove_archive_sidebar'] == 'yes' ) && sidebar_exist('BlogSidebar') ) { get_sidebar('BlogSidebar'); } ?>

</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



