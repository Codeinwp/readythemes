<?php get_header(); ?>

<?php 
$category = get_the_category();
$parent = $category[0]->category_parent;
?>

	<div id="singlefeatured">
			
		<h1 class="agenda">Archives for <?php the_time('F, Y'); ?></h1>

	</div>
		
	<!-- maincontent -->
	<div id="maincontent">

		<div class="left">
		
			<?php if (have_posts()) : ?>
	
				<?php while (have_posts()) : the_post(); ?>
			
					<?php if ( in_category(THEMES) || $parent == THEMES) { ?> <!-- if in themes category, do this -->
			
					<div id="themes"> <!-- themes -->
						
						<h1><?php the_title() ?></h1>
						<div class="infoimages"><img src="<?php bloginfo('template_directory'); ?>/images/wp.png" title="Designed for WordPress"/> &nbsp; <img src="<?php bloginfo('template_directory'); ?>/images/html.png" title="Designed for HTML" /></div>
						<div id="clear"></div>
						
						<?php $image = get_post_meta($post->ID, 'image', true); ?>
								
						<?php if ($image <> "") : ?>
						
						<div class="largethemebg">
							<img src="<?php bloginfo('template_directory'); ?>/custom/timthumb.php?src=<?php echo $image; ?>&w=562&h=332&zc=1" align="left" border="0" />
						</div>
						
						<div class="themecontent">
							<?php the_content(); ?>
						</div>
						
						<div class="themefeatures">
							<?php
							$features = get_post_meta($post->ID, 'features', true);
							$options = $features;
							$options = explode(',', $options);
							?>
							<ul>
							<?php

							foreach ($options AS $option)
							{
								?>
									<li><?php echo $option; ?></li>
								<?php
							}
							?>
							<div id="clear"></div>
							</ul>
						</div>
						
						<div id="themepricing">
							<div class="themepricingleft">
								<?php $price = get_post_meta($post->ID, 'price', true); ?>
								<?php if ($price == 0) { ?>
                                	Free
                                <?php } else { ?>
                                	$<?php echo $price; ?>
                                <?php } ?>
							</div>
							<div class="themepricingright">
                            	<?php if ($price == 0) { ?>
                                	<?php $freefile = get_post_meta($post->ID, 'freefile', true); ?>
                                	<a href="<?php echo $freefile; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/freedownload.jpg" border="0" /></a>
                                <?php } else { ?>
                                	<img src="<?php bloginfo('template_directory'); ?>/images/buy.jpg" />
                                <?php } ?>
							</div>
							<div id="clear"></div>
						</div>
						
					</div> <!-- end themes -->
						
						<?php endif; ?>	
					
					<?php } elseif ( in_category(BLOG) || $parent == BLOG) { ?> <!-- if in blog category, do this -->
						
						<!--- POST --->
						<div class="post">
						
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<div class="filedunder">
							<?php the_time('F jS, Y'); ?> - Filed Under <?php the_category(', '); ?> - Comments <?php comments_number('0','1','%'); ?>
							</div>
							
							<p>
							
							<?php $image = get_post_meta($post->ID, 'image', true); ?>
							
							<?php if ($image <> "") : ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/custom/timthumb.php?src=<?php echo $image; ?>&w=125&zc=1" align="left" style="border:1px solid #cccccc; padding:2px; margin:5px 10px 10px 0px;" /></a>
							<?php endif; ?>
							
							<?php the_excerpt(); ?>
							
							</p>
																				
						</div>
						<!--- POST --->	
					
					<?php } ?>
					
					<div id="commentsection">
						<?php comments_template(); // Get wp-comments.php template ?>
					</div>
			
				<?php endwhile; ?>
			
			<?php endif; ?>	
		
		</div>
		
		<div class="right">
		
			<?php get_sidebar(); ?>
		
		</div>
		
		<div id="clear"></div>
		
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>