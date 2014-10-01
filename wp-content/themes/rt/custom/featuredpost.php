<?php $featured_query = new WP_Query('category_name=Themes&showposts=1'); ?>

<?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
	
    <?php $featured_ID = $post->ID; ?>

    <!-- featured --> 
    <div id="featured">
        
        <div id="cornerribbon"></div>
        
        <?php $image = get_post_meta($post->ID, 'image', true); ?>
        
        <img src="<?php echo $image; ?>" />
    
    </div>
    <!-- end featured --> 

<?php endwhile;?>