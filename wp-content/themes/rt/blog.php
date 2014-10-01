<?php get_header(); ?>



<!-- Mainbody -->
    <div id="mainbody">
    
		<!-- Left -->
        <div class="left">
        
        	<?php $blog_query = new WP_Query('category_name=Blog'); ?>
		
			<?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            
            	<!--- POST --->
				<div class="post">
				
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="postedby">Posted by <?php the_author() ?> on <?php the_time('F jS, Y'); ?></div>
					
					<p><?php the_excerpt(); ?></p>
					
					<div class="filedunder">Filed Under <?php the_category(', '); ?></div>
				
				</div>
				<!--- POST --->	
            
            <?php endwhile;?>
			
		</div>
        <!-- End Left -->
		
        <!-- Right -->
		<div class="right">
		
			<!-- sidebar -->
			<?php get_sidebar('blog'); ?>
            <!-- end sidebar -->
		
		</div>
        <!-- End Right -->
        
		<div id="clear"></div>
        
	</div>
    <!-- End Mainbody -->

</div>
<!-- End Wrapper -->

<?php get_footer(); ?>