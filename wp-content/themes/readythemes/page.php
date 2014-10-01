<?php get_header(); ?>

<!--- BODY --->
<div id="bodytop"></div>
<div id="body">
    
    <!--- CONTENTLEFT --->
    <div class="contentleft">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' ); ?>
            
                <!-- post -->
                <div class="post">
                	
                    <?php the_content(); ?>
                    	                                    
                </div>
                <!-- end post -->
		
		<?php endwhile; endif; ?>
        
    </div>
    
    <!--- CONTENTRIGHT --->
    <div class="contentright">
        
        <!--- SIDEBAR --->
        <div class="sidebar">
        	<?php get_sidebar(); ?>
        </div>
        
    </div>
    
    <div class="clear"></div>

</div>
<div id="bodybottom"></div>

<?php get_footer(); ?>