<?php
/**
 * @package WordPress
 * @subpackage pureVISION
 */
?>

<?php
	global $purevision_options;
	$sidebar_position = ( $purevision_options['pages_sidebar_2'] == 'left' ) ? 'grid_8 pull_16 sidebar-box' : 'grid_8';
?>
	<div id="sidebar" class="<?php echo $sidebar_position; ?>">
	    <div id="sidebarSubnav">

<?php		    // Widgetized sidebar
		    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PagesSidebar2') ) : ?>

			<div class="custom-formatting">
			    <h3><?php esc_html_e('About This Sidebar', 'purevision'); ?></h3>
			    <ul>
				<?php _e("To edit this sidebar, go to admin backend's <strong><em>Appearance -> Widgets</em></strong> and place widgets into the <strong><em>Pages Sidebar 2</em></strong> Widget Area", 'purevision'); ?>
			    </ul>
			</div>

<?php		    endif; ?>
	    </div>
	    <!-- end sidebarSubnav -->
	</div>
	<!-- end sidebar -->


