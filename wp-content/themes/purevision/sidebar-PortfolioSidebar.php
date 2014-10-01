<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */
?>

<?php
	global $purevision_options;
	$portfolio_categories = $purevision_options['portfolio_categories']; // Get the portfolio category specified by the user in the 'pureVISION Options' page
	$sidebar_position = ( $purevision_options['portfolio_sidebar'] == 'left' ) ? 'grid_8 pull_16 sidebar-box' : 'grid_8';
?>

	<div id="sidebar" class="<?php echo $sidebar_position; ?>">
	    <div id="sidebarSubnav">

<?php		// Widgetized sidebar
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PortfolioSidebar') ) : 
		    // Check if a category has been assigned as Portfolio section
		    if( $portfolio_categories ) : ?>
		    	<div class="custom-formatting">
			    <h3><?php esc_html_e('About This Sidebar', 'purevision'); ?></h3>
			    <ul>
				<?php _e("To edit this sidebar, go to admin backend's <strong><em>Appearance -> Widgets</em></strong> and place widgets into the <strong><em>PortfolioSidebar</em></strong> Widget Area", 'purevision'); ?>
			    </ul>
			</div>
<?php		    endif;
		endif; ?>
	    </div>
	</div><!-- end sidebar -->









