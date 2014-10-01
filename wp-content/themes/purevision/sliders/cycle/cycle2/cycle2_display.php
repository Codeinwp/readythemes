<?php

	    $c2_slides_array = explode( ',', $purevision_options['c2_slides_order_str'] );
	    $hide_controls = ( count($c2_slides_array) < 2 ) ? 'visibility:hidden;': '';
?>

	    <div id="c2-header" class="pngfix">
		<div id="header-content" class="container_24">
		    <div class="c2-slideshow">
			    <div class="c2-slide-img-frame pngfix"></div>
			    <div class="c2-slide-img-frame-bg"></div>
			    <ul id="c2-slider">
<?php				foreach( $c2_slides_array as $slide_row_number ) :
				    $c2_slide_link_url = $purevision_options['c2_slide_link_url_'.$slide_row_number];
				    $c2_slide_link_target = $purevision_options['c2_slide_link_target_'.$slide_row_number];
				    $c2_slide_default_info_txt = $purevision_options['c2_slide_default_info_txt_'.$slide_row_number];
				    $c2_slide_button_txt = $purevision_options['c2_slide_button_txt_'.$slide_row_number];
				    $c2_slide_button_style = $purevision_options['c2_slide_button_style_'.$slide_row_number]; ?>
				    <li>
					<div class="c2-slide-img-wrapper">
<?php					    echo ($c2_slide_link_url) ? "<a href='{$c2_slide_link_url}' target='_{$c2_slide_link_target}'>" : '' ; ?>
						<img src="<?php echo $purevision_options['c2_slide_img_url_'.$slide_row_number]; ?>" alt="<?php echo $purevision_options['c2_slide_image_alt_tag_'.$slide_row_number]; ?>" class="slide-img" />
<?php					    echo ($c2_slide_link_url) ? "</a>" : '' ; ?>
					</div>
					<div class="slide-desc">
<?php					    echo do_shortcode(  $c2_slide_default_info_txt );
					    if ( $c2_slide_link_url ) : ?>
						<a class="<?php echo $c2_slide_button_style; ?>-button align-btn-left" style="margin-top:10px;" href="<?php echo $c2_slide_link_url; ?>" target="_<?php echo $c2_slide_link_target; ?>"><span><?php echo $c2_slide_button_txt; ?></span></a>
<?php					    endif; ?>
					</div>
				    </li>
<?php				endforeach; ?>
			    </ul>
			    <input type="hidden" class="base-url" value="<?php echo site_url(); ?>" />
		    </div>
		    <!-- end c2-slideshow -->
		    <div class="c2-slider-controls">
			<span id="c2-pauseButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Pause', 'purevision'); ?>"  class="pngfix"><?php esc_html_e('Pause', 'purevision'); ?></a></span>
			<span id="c2-resumeButton" style="<?php echo $hide_controls; ?>"><a href="" title="<?php esc_attr_e('Play', 'purevision'); ?>"  class="pngfix"><?php esc_html_e('Play', 'purevision'); ?></a></span>
			<div id="c2-nav" style="<?php echo $hide_controls; ?>"></div>
		    </div>
		    
		</div>
		<!-- end header-content -->
	    </div>
	    <!-- end c2-header -->








