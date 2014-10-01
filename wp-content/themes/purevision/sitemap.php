<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */
/**
 * Template Name: Sitemap page
 */

get_header();

$content_position = ( $purevision_options['sitemap_sidebar'] == 'left' ) ? 'grid_16 push_8' : 'grid_16';
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="<?php echo $content_position; ?>">
	<div class="main-content-padding">
<?php		if (have_posts()) : while (have_posts()) : the_post();
		    the_content();
		endwhile; endif; ?>
		
		<div class="one_third">
			<h3><?php esc_html_e('Site Feeds', 'purevision'); ?></h3>
			<ul class="list-10">
				<li><a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e('Main RSS Feed', 'purevision'); ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e('Comments RSS Feed', 'purevision'); ?></a></li>
			</ul>

			<h3><?php esc_html_e('Pages', 'purevision'); ?></h3>
			<ul class="list-10">
				<li><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home', 'purevision'); ?></a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>

			<h3><?php esc_html_e('Categories', 'purevision'); ?></h3>
			<ul class="list-10">
				<?php wp_list_categories('title_li='); ?>
			</ul>

			<h3><?php esc_html_e('Monthly Archives', 'purevision'); ?></h3>
			<ul class="list-10">
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
<?php			if ( function_exists('wp_tag_cloud') ) : ?>
			    <h3><?php esc_html_e('Tags', 'purevision'); ?></h3>
<?php			    echo preg_replace('/class=\"(.*?)\"|class=\'(.*?)\'/', 'class="list-10"', wp_tag_cloud('smallest=9&largest=9&format=list&echo=0'));
			endif; ?>
		</div>

		<div class="one_third last_column">
			<h3><?php esc_html_e('All Articles', 'purevision'); ?></h3>
			<ol class="list-2">
<?php			    query_posts('showposts=-1');
			    if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li style="margin-bottom:10px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><br /><?php the_time('j-M-y') ?> &bull; <?php the_author_posts_link(); ?> &bull; <?php comments_popup_link( __( '0 Comment', 'purevision' ), __( '1 Comment', 'purevision' ), __( '% Comments', 'purevision' ) ); ?></li>
<?php			    endwhile; endif; ?>
			</ol>

		</div>
	    <div class="clear"></div>
            
<?php	    //Reset Query
	    wp_reset_query(); ?>
            
<?php	    edit_post_link(esc_html__('Edit this entry.', 'purevision'), '<p class="editLink">', '</p>'); ?>
	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->

<?php if( sidebar_exist('SitemapSidebar') ) { get_sidebar('SitemapSidebar'); } ?>
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();



