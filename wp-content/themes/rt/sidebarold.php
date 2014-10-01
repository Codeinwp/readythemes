<!-- if it's in category 3 (themes) -->
<?php if ( in_category( 3 )) { ?>
	
	<!-- if it's the home page -->
	<?php if ( is_home()) { ?>
		
		<div id="widget">

			<p>
			<img src="<?php bloginfo('template_directory'); ?>/images/wpfull.png" align="left" style="padding:0px 10px 10px 0px;" />
			Utilizing the power of WordPress to design and build powerful websites. 
			<a href="/themes/">Click here to view our professional themes</a>
			</p>
			
		</div>
		
		<div id="widgetheading">From The Blog</div>
		<div id="widget">
		
			<ul>
				<?php $recenblog_query = new WP_Query('category_name=Blog&showposts=3'); ?>
			
				<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
				
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
					<p><?php content('25')?></p>
				</li>
				
				<?php endwhile;?>
			</ul>
		
		</div>
		
		<div id="widgetheading">Become A Ready Themes Affiliate</div>
		<div id="widget">
		
			<p>
			Ready to earn some great money?  We pay our affiliates <strong>50% of all sales</strong> generated.  We are part of the e-junkie network.  <a href="">Click here</a> to get started.
			</p>
		
		</div>
	
	<!-- if it's not home page but in themes -->
	<?php } else { ?>
	
		<div id="widgetheading">Ready Themes Prices</div>
		<div id="widget">
		
			<p>Purchase any of our professionally designed themes for only</p>
			<p style="font-size:24px; font-weight:bold;">$30</p>
			<p><a href="/pricing/">Click here for more info on our pricing</a></p>
			
		</div>
		
		<div id="widgetheading">Theme Categories</div>
		<div id="widget">
		
			<ul>
				<li><a href="/themes/blog-themes/">Blog Themes</a></li>
				<li><a href="/themes/portfolio/">Portfolio</a></li>
				<li><a href="/themes/news/">News</a></li>
			</ul>
			
		</div>
		
		<div id="widgetheading">Become A Ready Themes Affiliate</div>
		<div id="widget">
		
			<p>
			Ready to earn some great money?  We pay our affiliates <strong>50% of all sales</strong> generated.  We are part of the e-junkie network.  <a href="">Click here</a> to get started.
			</p>
		
		</div>
	
	<?php } ?>
	<!-- end if it's in home page or not -->

<!-- else if it's in category 1 (blog) -->
<?php } elseif ( in_category( 1 )) { ?>
	
	<!-- if it's a page in blog category -->
	<?php if ( is_page()) { ?>
	
		<div id="widget">

			<p>
			<img src="<?php bloginfo('template_directory'); ?>/images/wpfull.png" align="left" style="padding:0px 10px 10px 0px;" />
			Utilizing the power of WordPress to design and build powerful websites. 
			<a href="/themes/">Click here to view our professional themes</a>
			</p>
			
		</div>
		
		<div id="widgetheading">From The Blog</div>
		<div id="widget">
		
			<ul>
				<?php $recenblog_query = new WP_Query('category_name=Blog&showposts=3'); ?>
			
				<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
				
				<li>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
					<p><?php content('25')?></p>
				</li>
				
				<?php endwhile;?>
			</ul>
		
		</div>
		
		<div id="widgetheading">Become A Ready Themes Affiliate</div>
		<div id="widget">
		
			<p>
			Ready to earn some great money?  We pay our affiliates <strong>50% of all sales</strong> generated.  We are part of the e-junkie network.  <a href="">Click here</a> to get started.
			</p>
		
		</div>
	
	<!-- else if it's not a page but in blog category -->	
	<?php } else { ?>
		
		<!-- BLOG SIDEBAR -->
	
		<div id="widgetheading">Categories</div>
		<div id="widget">
		
			<ul>
				<li><a href="/blog/latest-news/">Latest News</a></li>
				<!--<li><a href="/blog/theme-fixes/">Theme Fixes</a></li>
				<li><a href="/blog/upcoming-themes/">Upcoming Themes</a></li>-->
			</ul>
			
		</div>
		
		<div id="widgetheading">Archives</div>
		<div id="widget">
		
			<ul>
				<?php wp_get_archives('type=monthly&title_li='); ?>
			</ul>
			
		</div>
		
		<!-- widget RECENTLY ADDED THEMES -->
		<div id="widgetheading">Recently Added Themes</div>
		<div id="widget">
		
		<?php $recenttheme_query = new WP_Query('category_name=Themes&showposts=3'); ?>
			
			<!-- recent theme -->
			<ul>
			<?php while ($recenttheme_query->have_posts()) : $recenttheme_query->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile;?>
			</ul>
			<!-- end recent theme -->
			
		</div>
		<!-- end widget RECENTLY ADDED THEMES -->
		
		<!-- END BLOG SIDEBAR -->
	
	<?php } ?>
	<!-- end if it's in blog category -->

<!-- if it's any where else -->	
<?php } else { ?>

	<div id="widget">

		<p>
		<img src="<?php bloginfo('template_directory'); ?>/images/wpfull.png" align="left" style="padding:0px 10px 10px 0px;" />
		Utilizing the power of WordPress to design and build powerful websites. 
		<a href="/themes/">Click here to view our professional themes</a>
		</p>
		
	</div>
	
	<div id="widgetheading">From The Blog</div>
	<div id="widget">
	
		<ul>
			<?php $recenblog_query = new WP_Query('category_name=Blog&showposts=3'); ?>
		
			<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
			
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
				<p><?php content('25')?></p>
			</li>
			
			<?php endwhile;?>
		</ul>
	
	</div>
	
	<div id="widgetheading">Become A Ready Themes Affiliate</div>
	<div id="widget">
	
		<p>
		Ready to earn some great money?  We pay our affiliates <strong>50% of all sales</strong> generated.  We are part of the e-junkie network.  <a href="">Click here</a> to get started.
		</p>
	
	</div>
	
	
<?php } ?>
<!-- end if it's any where else -->	