<?php

	    $c1_slides_array = explode( ',', $purevision_options['c1_slides_order_str'] );
	    $hide_controls = ( count($c1_slides_array) < 2 ) ? 'visibility:hidden': '';
	    $c1_no_3d_shadow = $purevision_options['c1_remove_3d_shadow'];
	    if ( $purevision_options['c1_remove_image_frame'] == "yes" ) {
		$c1_image_width = 940;
		$c1_image_height = 400;
	    } else {
		$c1_image_width = 914;
		$c1_image_height = 374;
	    }
?>

	    <div id="c1-header">
		<div id="header-content" class="container_24">
		    <div class="c1-slideshow">
			    <ul id="c1-slider">
<?php				foreach( $c1_slides_array as $slide_row_number ) :
				    $c1_slide_link_url = $purevision_options['c1_slide_link_url_'.$slide_row_number];
				    $c1_slide_link_target = $purevision_options['c1_slide_link_target_'.$slide_row_number]; ?>
				    <li>
					<div class="c1-slide-img-wrapper">
<?php					    echo ($c1_slide_link_url) ? "<a href='{$c1_slide_link_url}' target='_{$c1_slide_link_target}'>" : '' ; ?>
						<img src="<?php echo $purevision_options['c1_slide_img_url_'.$slide_row_number]; ?>" alt="<?php echo $purevision_options['c1_slide_image_alt_tag_'.$slide_row_number]; ?>" class="slide-img"  width="<?php echo $c1_image_width; ?>" height="<?php echo $c1_image_height; ?>" />
<?php					    echo ($c1_slide_link_url) ? "</a>" : '' ; ?>
					</div>
				    </li>
<?php				endforeach; ?>
			    </ul>
			    <input type="hidden" class="base-url" value="<?php echo site_url(); ?>" />
		    </div>
		    <!-- end c1-slideshow -->
		    <span id="c1-resumeButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Play', 'purevision'); ?>" class="pngfix"><?php esc_html_e('Play', 'purevision'); ?></a></span>
		    <span id="c1-pauseButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Pause', 'purevision'); ?>" class="pngfix"><?php esc_html_e('Pause', 'purevision'); ?></a></span>
		    <div id="c1-nav" style="<?php echo $hide_controls; ?>"></div>
		    
		</div>
		<!-- end header-content -->
<?php		if ( !$c1_no_3d_shadow == 'yes' ) : ?>
		    <div class="clear"></div>
		    <div id="c1-shadow" class="container_24 pngfix"> </div>
<?php		endif; ?>
	    </div>
	    <!-- end c1-header -->