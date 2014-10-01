<?php
/*
Template Name: themes
*/
?>
<?php get_header(); ?>

	<!-- main body -->   
    <div id="mainbodytop"></div>
    <div id="mainbody">
    	
    	<!-- main body left --> 
        <div id="mainleft">
        
        	<h1><?php wp_title(' ', true, '');?></h1> 
            
            <?php 
			$cat = 3;
			$showposts = -1; // -1 shows all posts
			$do_not_show_stickies = 1; // 0 to show stickies
			$args=array(
			   'category__in' => $cat,
			   'showposts' => $showposts,
			   'caller_get_posts' => $do_not_show_stickies
			   );
			$my_query = new WP_Query($args); 
			?>           
        
			<?php if( $my_query->have_posts() ) : ?>
            
				<div style="margin:20px 0px 30px 0px;">
				Welcome to our theme page - here you'll find a wide variety of professionally designed WordPress themes. 
				</div>

				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
	
						<?php $counter++; ?>
					
						<!--- POST --->
						<div style="float:left; width:280px; <?php if ( $counter != 2 ) { ?>margin-left:3px; margin-right:42px;<?php } ?>">
													
							<p>
							
							<?php $image = get_post_meta($post->ID, 'image', true); ?>
							
							<a href="<?php the_permalink(); ?>" style="font-weight:bold; text-decoration:none; color:#222222;"><?php the_title();  ?></a>
							<?php if ($image <> "") : ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/custom/timthumb.php?src=<?php echo $image; ?>&w=280&zc=1" align="left" style="border:1px solid #a5a5a5; padding:1px; margin-top:5px; margin-bottom:5px;" /></a>
							<?php endif; ?>
							<br />
							<?php the_excerpt(); ?>
							
							</p>
													
						</div>
						<!--- POST --->	
						
						<?php if ( $counter == 2 ) { ?>
							
							<div style="clear:left; height:30px;"></div>
							<?php $counter = 0; ?>
						
						<?php } ?>
				
				<?php endwhile; ?>
				
				<div style="clear:left; margin-top:10px; padding:10px 0px; background-color:#ffffff; border-top:0px solid #CFCFCF; border-bottom:0px solid #CFCFCF; text-align:center;">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
				</div>
				
			<?php else : ?>	
			
				No Posts Found
			
			<?php endif; ?>       
				
    	</div>
        <!-- end main body left --> 
        
        <!-- main body right --> 
        <div id="mainright">
            
            <!-- sidebar -->
			<?php get_sidebar(); ?>
            <!-- end sidebar -->
            
        </div>
        <!-- end main body right --> 
        
        <div id="clear"></div>
    	
    </div>
    <div id="mainbodybottom"></div>
    <!-- end main body --> 

<?php get_footer(); ?>