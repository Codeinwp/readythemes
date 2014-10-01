<!-- featured -->
<div id="featured" style="padding-top:38px; height:278px; margin-bottom:20px;">
                        
	<?php $image = get_post_meta($post->ID, 'main-image', true); ?>
	<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
            
	<div style="background:url(<?php echo $image; ?>) no-repeat; width:940px; height:278px; margin-left:10px; position:relative;">
		<div style="position:absolute; top:115px; left:395px;">
			<a href="<?php echo $demo; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/demo.png" border="0" /></a>
		</div>
	</div>

</div>
<!-- end featured -->