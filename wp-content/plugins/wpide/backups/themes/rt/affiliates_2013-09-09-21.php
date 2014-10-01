<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "b95bfa8f177a9461f3eff70659660a128b8aa4f535"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/affiliates.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/affiliates_2013-09-09-21.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php /*
Template Name: Affiliates Page
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

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>
				
				<div class="affiliatewrap">
				
				<h3 align="center">Earn 50% commission per sale from our popular money making theme package.</h3>
				
				<p><img src="http://www.readythemes.com/images/50percent.jpg" align="left" />Ready Themes is working hard to build premium WordPress themes that are designed to get results for various types of money making strategies.</p>
				
				<p>All of our products are put to the test by us and used on our own network of sites and tweaked to perform well and look great!</p>
				
				<p>We have a lot of happy customers and <span class="highlight">almost a 0% refund rate</span>.  When people buy and use our products, they love them!</p>
				
				<p>Beyond our great products, we also offer unlimited support and will help resolve any issues caused by our themes or plugins.</p>  
				
				<p><strong>So what does this mean for you as an affiliate?</strong></p>
				
				<p>You can rest assured that you will be offering your customers a <strong>top notch product</strong> that will give them great results!</p>
				
				<p>Simply direct customers to our website using your affiliate code and when they buy, you'll get 50% of the price paid.</p> 
				 
				<p>Our theme package currently sales for <span class="highlight">$55</span> and will increase as we add more and more products to our growing library.</p>
				
				<p>Our affiliate program is ran through our own system and in order to get the details you need to create an account </p>
				
				<p>You are free to promote our products in the best way you see fit for your customers.  Below, you will find a few banners we have designed for you to use.  Simply, insert your affiliate link in the code and paste it into your site.</p>
				
				<p>If you have any questions, feel free to <a href="/contact/">contact us here</a>.</p>
				
				
				<h3 align="center">Banners</h3>
				
				<div class="bannerbox">
					468 x 60 banner<br />
					<img src="http://www.readythemes.com/images/Banner_1_468x6_v81.jpg" />
					<div>
					<textarea readonly="readonly"><a href="YOUR AFFILIATE LINK HERE"><img src="http://www.readythemes.com/images/Banner_1_468x6_v81.jpg" border="0" /></a></textarea>
					</div>
				</div>
				
				<div class="bannerbox">
					300 x 250 banner<br />
					<img src="http://www.readythemes.com/images/Banner_1_300x250_v81.jpg" />
					<textarea readonly="readonly"><a href="YOUR AFFILIATE LINK HERE"><img src="http://www.readythemes.com/images/Banner_1_300x250_v81.jpg" border="0" /></a></textarea>
				</div>
				
				<div class="bannerbox">
					125 x 125 banner<br />
					<img src="http://www.readythemes.com/images/Banner_1_125x125_v81.jpg" />
					<textarea readonly="readonly"><a href="YOUR AFFILIATE LINK HERE"><img src="http://www.readythemes.com/images/Banner_1_125x125_v81.jpg" border="0" /></a></textarea>
				</div>
				
				</div>
				
				<?php comments_template(); // Get wp-comments.php template ?>
		
			<?php endwhile; ?>
	
		<?php endif; ?>	
		
		<div id="clear"></div>
		
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>