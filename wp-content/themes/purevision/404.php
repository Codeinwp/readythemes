<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */

get_header();
?>

<div id="content-container" class="container_24">
    <div id="main-content" class="grid_24">
	<div class="main-content-padding">

		<br />
		<h2 class="center warning"><div class="msg-box-icon pngfix"><?php esc_html_e('Oops..., I cannot find that page you are looking for, sorry... (Error 404)', 'purevision'); ?></div></h2>

		<div class="grid_18 prefix_2 suffix_2">
		<h3><?php esc_html_e('Let me help you find it:', 'purevision'); ?></h3>
		    <ol>
			<li>
			    <?php _e('<strong>Search</strong> for it:', 'purevision'); ?>
			    <?php get_search_form(); ?>
			</li>
			<li>
			    <?php _e('<strong>If you typed in a URL...</strong> check the spelling and try reloading the page.', 'purevision' ); ?>
			</li>
			<li>
			<?php printf( __('<strong>Start over again</strong> with the %1$sHomepage%2$s.', 'purevision'), '<a href="'.get_bloginfo('url').'">', '</a>' ); ?>
			    
			</li>
		    </ol>
		    <br />
		</div>

	</div><!-- end main-content-padding -->
    </div><!-- end main-content -->
</div><!-- end content-container -->

<div class="clear"></div>

<?php

get_footer();


