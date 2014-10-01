<?php get_header(); ?>
<?php if(is_page('326')){ ?>
	<?php if(Dap_Session::isLoggedIn()) { ?>
		<?php 
			header("Location: http://www.readythemes.com/dashboard/"); 
			exit;
		?>
	<?php } ?>
<?php } ?>

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
			
				<?php if (have_posts()) : ?>
	
					<?php while (have_posts()) : the_post(); ?>
			
						<div id="leftcontent">
						<?php the_content() ?>
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