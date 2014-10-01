<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */

    get_header();

    $content_position = ( $purevision_options['portfolio_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
    if ( $purevision_options['remove_single_portfolio_sidebar'] == 'yes' ) $content_position = 'grid_24';
?>
    <div id="content-container" class="container_24">
	<div id="main-content" class="<?php echo $content_position; ?>">
	    <div class="main-content-padding">
<?php	    if (have_posts()) :
		while (have_posts()) : the_post(); ?>
		    <div <?php post_class() ?> id="post-<?php the_ID();?>">
                        <div class="post-top">
<?php			    if( $purevision_options['show_portfolio_post_date'] == 'yes' ) : ?>
                                <div class="post-date">
                                    <span class="day"><?php the_time('d') ?></span>
                                    <span class="month"><?php the_time('M') ?></span>
                                    <span class="year"><?php the_time('Y') ?></span>
                                </div>
<?php			    endif; ?>
                            <h1><?php the_title(); ?></h1>
                        </div>
<?php                   if( $purevision_options['show_portfolio_postmetadata'] == 'yes' ) : ?>
                            <div class="postmetadata">
<?php                           the_tags(__('Tags: ', 'purevision'), ', ', '<br />');
                                if( $purevision_options['show_portfolio_postmetadata_author'] == 'yes' ) : ?>
                                    <?php esc_html_e('Written by', 'purevision'); ?> <em><?php the_author_posts_link(); ?></em>,
<?php                           endif; ?>
                                <?php esc_html_e('Posted in ', 'purevision'); ?><?php the_category(', '); ?> | <?php edit_post_link(__('Edit', 'purevision'), '', ' | '); ?>  <?php comments_popup_link( __( 'Leave a comment', 'purevision' ), __( '1 Comment', 'purevision' ), __( '% Comments', 'purevision' ) ); ?>
                            </div>
<?php			endif; ?>
			<div class="entry">
<?php			    the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>', 'purevision'));
			    wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		    </div>

<?php		    if( $purevision_options['show_portfolio_comments'] == 'yes' ) {
			comments_template();
		    }
		    
		endwhile; else: ?>
		    <p><?php esc_html_e("Sorry, no posts matched your criteria.", 'purevision'); ?></p>
<?php	    endif; ?>

	    </div><!-- end main-content-padding -->
	</div><!-- end main-content -->
<?php
	if( ( !$purevision_options['remove_single_portfolio_sidebar'] == 'yes' ) && sidebar_exist('PortfolioSidebar') ) { get_sidebar('PortfolioSidebar'); }
?>
    </div><!-- end content-container -->



