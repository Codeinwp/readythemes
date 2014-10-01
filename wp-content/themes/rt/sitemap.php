<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>

		<div id="singlefeatured">
			
			<h1>Sitemap</h1>
			<p></p>
		
		</div>
		
		<!-- maincontent -->
		<div id="maincontent">
	
			<div class="left">
			
				<div id="sitemapbox">
				
					<h2>Pages</h2>
		
					<ul>
						<?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>		
					</ul>
				
				</div>
				
				<div id="sitemapbox">
				
					<h2>Categories</h2>
		
					<ul>
						<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
					</ul>
				
				</div>
				
				<?php
		
				$cats = get_categories();
				foreach ($cats as $cat) {
		
				query_posts('cat='.$cat->cat_ID);
	
				?>
				
				<div id="sitemapbox">
					
					<h2><?php echo $cat->cat_name; ?></h2>
			
					<ul>	
							<?php while (have_posts()) : the_post(); ?>
							<li style="font-weight:normal !important;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - Comments (<?php echo $post->comment_count ?>)</li>
							<?php endwhile;  ?>
					</ul>
					
				</div>
				
				<?php } ?>	
			
			</div>
			
			<div class="right">
			
				<?php get_sidebar(); ?>
			
			</div>
			
			<div id="clear"></div>
			
		</div>
		<!-- end maincontent -->

<?php get_footer(); ?>