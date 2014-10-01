<?php /*
Template Name: Features
*/ ?>
<?php get_header(); ?>

		<div id="singlefeatured">
			
			<div class="leftheading">
			<?php if (have_posts()) : ?>
	
				<?php while (have_posts()) : the_post(); ?>
		
					<?php $tagline = get_post_meta($post->ID, 'tagline', true); ?>
					
					<h1 class="agenda"><?php the_title() ?></h1>
					<p class="agenda" style="font-size:18px;"><?php echo $tagline; ?></p>
			
				<?php endwhile; ?>
		
			<?php endif; ?>	
			</div>
			
			<div class="rightheading">
				<?php require_once dirname( __FILE__ ) . '/custom/social.php'; ?>
			</div>
			<div class="clear"></div>
			
		</div>
		
		<!-- maincontent -->
		<div id="maincontent">
	
			<div class="left">
			
                <div id="leftcontent">
               
			   		<?php the_content(); ?>
				
					<!-- features -->
					<div class="singlefeatures">
						<h2>Standard Features</h2>
						<?php
						$features = get_post_meta($post->ID, 'features', true);
						$options = $features;
						$options = explode('|', $options);
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
							
						</ul>
						
					</div>
                
                </div>
			
			</div>
			
			<div class="right">
			
				<?php get_sidebar(); ?>
			
			</div>
			
			<div id="clear"></div>
			
		</div>
		<!-- end maincontent -->

<?php get_footer(); ?>