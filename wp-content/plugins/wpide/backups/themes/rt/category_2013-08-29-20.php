<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "5bd5295a2d4d672cc65b6b764ecc36c99c960bf889"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/category.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/category_2013-08-29-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>
<style>
/* HOME PAGE */
.homecontent {padding:20px 0;}
.homecontent h2 {font-family:Myriad Pro,Arial; font-size:28px; font-weight:normal;}
.topblurb {width:910px; border:1px solid #DFDEDE; padding:10px 20px 10px 30px; background-color:#F0F0F0;}
.topblurb .blurbleft {float:left; width:730px; margin-top:8px;}
.topblurb .blurbleft span {font-size:28px; font-weight:normal;}
.topblurb .blurbright {float:right; width:160px;}
.homefeatures {margin:40px 0;}
.homefeatures .homefeature {float:left; width:215px; line-height:22px; color:#444; margin-right:30px;}
.homefeatures .homefeatureend {float:left; width:220px; line-height:22px; color:#444;}
.homefeatures .homefeature img {margin:0 10px 0 0;}
.homefeatures .homefeatureend img {margin:0 10px 0 0;}
.homeleft {float:left; width:465px;}
.homeleft .newtheme {border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:12px;}
.homeleft .newtheme .themeleft {float:left; width:200px;}
.homeleft .newtheme .themeleft .themeoutline {width:200px; height:140px; padding:15px 0 0 9px; background:url(http://www.readythemes.com/previews/rttest/wp-content/themes/rt/images/thumb-holder-4-col.png) no-repeat;}
.homeleft .newtheme .themeleft .themeoutline .themeborder {width:180px; height:120px; border:1px solid #fff;}
.homeleft .newtheme .themeright {float:right; width:240px;}
.homeleft .newtheme .themeright p {color:#333; line-height:24px;}
.homeleft .newtheme .themeright h3 {font-size:18px; font-weight:normal; margin:10px 0 10px 0;}
.homeright {float:right; width:465px;}
.homeright .homepost {margin-top:30px;}
.homeright .homepost  h3 a {color:#43788F;}
.homeright .homepost p {line-height:22px; color:#444;}
.homesubscribe {line-height:22px; color:#444;}
.homesubscribe img {margin:0 10px 0 0;}
.commentblock a {color:#555; text-decoration:none;}
</style>
<?php 
$category = get_the_category();
$parent = $category[0]->category_parent;
?>

	<div id="singlefeatured">
		<div class="leftheading">
		<?php if ( is_category('4')) { ?>
			<h1>Themes Gallery</h1>
			<p>Money Making Wordpress Themes</p>
        <?php } elseif ( is_category('14')) { ?>
			<h1>Plugins Gallery</h1>
			<p>Money Making Wordpress Plugins</p>
		<?php } else { ?>
			<h1>Our Blog</h1>
			<p>Latest news from Ready Themes</p>
		<?php } ?>
		</div>
		
		<div class="rightheading">
			<?php require_once dirname( __FILE__ ) . '/custom/social.php'; ?>
		</div>
		<div class="clear"></div>

	</div>
		
	<!-- maincontent -->
	<div id="maincontent" style="padding-top:15px;">
		
		<?php if (have_posts()) : ?>
			
			<?php if ( is_category('4')) { ?>
			
				<div class="homecontent" style="margin-top:20px;">
		
					<div class="topblurb">
						<div class="blurbleft">
							<span><?php echo buyall; ?></span> 
						</div>
							
						<div class="blurbright">
					<form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
                                    <input type="hidden" name="cmd" value="_xclick"/>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
						</div>
						<div class="clear"></div>
					</div>
					
				</div>
				
				<?php /*?><div class="themecattoptext">
				Our selection of Wordpress themes are designed for internet marketers who want to earn a serious income online. 
				We release new themes each month and all have been researched and tested for maximum earnings through affiliate marketing
				and other popular money making strategies.
				</div><?php */?>
			
				<?php $i=0; while (have_posts()) : the_post(); // THEMES ?>	
				
					<!--- POST --->
					<div class="themepost" style="width:960px; margin:30px 0 0 0; padding-bottom:30px;">
					
						<div style="float:left; padding:28px 0 0 14px; background:url(http://www.readythemes.com/wp-content/themes/rt/images/thumb-holder-2-col.png) no-repeat; width:440px; height:252px;">

							<?php $image = get_post_meta($post->ID, 'cat-image', true); ?>
							<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
							<?php if ($image <> "") : ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" width="409" height="221" style="border:1px solid #fff;" /></a>
							<?php endif; ?>								
													
						</div>
						
						<div class="themepostright" style="width:490px; padding-top:22px;">
							
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="themepostexcerpt" style="color:#444; line-height:24px; margin:20px 0; font-size:14px;"><?php content('70'); ?></div>
							<a class="small-dark-button" style="margin-right:10px" href="<?php the_permalink(); ?>" title="Read More"><img src="http://www.readythemes.com/wp-content/themes/rt/images/moredetails.png"></a>
							<a class="small-dark-button" target="_blank" href="<?php echo $demo; ?>" title="Read More"><img src="http://www.readythemes.com/wp-content/themes/rt/images/livepreview1.png"></a>
						</div>
						

		
                                
							
					
					
				
					
				<?php if ($i%2==1) echo adrotate_group(1); ?> 
				<?php $i++;?>
				
						<div id="clear"></div>
					
					</div>
					<!--- POST --->	
				
				<?php endwhile; ?>
				
				<div class="homecontent" style="margin-top:20px; margin-bottom:20px;">
		
					<div class="topblurb">
						<div class="blurbleft">
							<span><?php echo buyall; ?></span> 
						</div>
							
						<div class="blurbright">
						<form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
                                    <input type="hidden" name="cmd" value="_xclick"/>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form></div>
						<div class="clear"></div>
					</div>
					
				</div>
                
            <?php } elseif ( is_category('14')) { ?>
			
				<div class="homecontent" style="margin-top:20px;">
		
					<div class="topblurb">
						<div class="blurbleft">
							<span><?php echo buyall; ?></span> 
						</div>
							
						<div class="blurbright">
						<?php /*?><form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
						<input type="hidden" name="cmd" value="_xclick"/>
						<input type="hidden" name="currency_code" value="USD" />
						<input type="hidden" name="item_name" value="Ready Themes All Access" />
						<input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" />
						</form><?php */?>
						<img src="http://i.jvzoo.com/0/10699/14" alt="Ready Themes All Access" width="1" height="1" border="0" />
						<a href="https://www.jvzoo.com/b/0/10699/14"><img src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" alt="Ready Themes All Access" border="0" /></a>
						</div>
						<div class="clear"></div>
					</div>
					
				</div>
			
				<?php while (have_posts()) : the_post(); // PLUGINS ?>	
				
					<!--- POST --->
					<div class="themepost" style="width:960px; margin:30px 0 0 0; padding-bottom:30px;">
					
						<div style="float:left; padding:28px 0 0 14px; background:url(http://www.readythemes.com/wp-content/themes/rt/images/thumb-holder-2-col.png) no-repeat; width:440px; height:252px;">

							<?php $image = get_post_meta($post->ID, 'cat-image', true); ?>
							
							<?php if ($image <> "") : ?>
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>" width="409" height="221" style="border:1px solid #fff;" /></a>
							<?php endif; ?>								
													
						</div>
						
						<div class="themepostright" style="width:490px; padding-top:22px;">
							
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="themepostexcerpt" style="color:#444; line-height:24px; margin:20px 0; font-size:14px;"><?php content('70'); ?></div>
							<a class="small-dark-button" href="<?php the_permalink(); ?>" title="Read More"><span>Read More</span></a>
							
						</div>
						
						<div id="clear"></div>
					
					</div>
					<!--- POST --->	
				
				<?php endwhile; ?>
				
				<div class="homecontent" style="margin-top:20px; margin-bottom:20px;">
		
					<div class="topblurb">
						<div class="blurbleft">
							<span><?php echo buyall; ?></span> 
						</div>
							
						<div class="blurbright">
						<?php /*?><form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
						<input type="hidden" name="cmd" value="_xclick"/>
						<input type="hidden" name="currency_code" value="USD" />
						<input type="hidden" name="item_name" value="Ready Themes All Access" />
						<input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" />
						</form><?php */?>
						<img src="http://i.jvzoo.com/0/10699/14" alt="Ready Themes All Access" width="1" height="1" border="0" />
						<a href="https://www.jvzoo.com/b/0/10699/14"><img src="http://www.readythemes.com/wp-content/themes/rt/images/buy-now-black.png" alt="Ready Themes All Access" border="0" /></a>
						</div>
						<div class="clear"></div>
					</div>
					
				</div>
						
			<?php } else { ?>
				
				<div class="left">
			
				<?php while (have_posts()) : the_post(); // BLOG ?>	
				
					<!--- POST --->
					<div class="post">
						
						<?php $catimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'cat-thumb' ); ?>
						
						<?php if($catimage){ ?>
							
							<div style="float:left; width:42px; padding:0 15px 0 0; margin:0 10px 0 0; border-right:1px dotted #BDBDBD; font-weight:bold; color:#555555;">
								<div style="font-size:14px; text-transform:uppercase; text-align:right; margin:0 0 3px 0;"><?php the_time('M'); ?> </div>
								<div style="font-size:32px; font-weight:bold; text-transform:uppercase; text-align:right; margin:0 0 3px 0;"><?php the_time('j'); ?> </div>
								<div style="font-size:14px; text-transform:uppercase; text-align:right;"><?php the_time('Y'); ?> </div>
								<div class="commentblock" style="margin:0 0 0 10px; height:35px; width:33px; line-height:28px; font-size:16px; font-weight:bold; text-align:center; background:url(<?php bloginfo('template_directory'); ?>/images/comments.png) no-repeat;">
									<?php comments_popup_link('0', '1', '%'); ?>
								</div>
							</div>
							<div style="float:left; width:120px;">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $catimage[0]; ?>" width="100" style="border:1px solid #D8D8D8; padding:2px; background-color:#fff;"></a>
							</div>
							<div style="float:left; width:410px;">
								<h1 style="font-size:16px; color:#104863; font-weight:bold;"><a href="<?php the_permalink(); ?>" style="color:#104863; font-size:16px; font-weight:bold;"><?php the_title(); ?></a></h1>
								<div>
								<?php excerpt('60'); ?>
								</div>
							</div>
							<div class="clear"></div>
						
						
						<?php } else { ?>
							
							<div style="float:left; width:42px; padding:0 15px 0 0; margin:0 10px 0 0; border-right:1px dotted #BDBDBD; font-weight:bold; color:#555555;">
								<div style="font-size:14px; text-transform:uppercase; text-align:right; margin:0 0 3px 0;"><?php the_time('M'); ?> </div>
								<div style="font-size:32px; font-weight:bold; text-transform:uppercase; text-align:right; margin:0 0 3px 0;"><?php the_time('j'); ?> </div>
								<div style="font-size:14px; text-transform:uppercase; text-align:right;"><?php the_time('Y'); ?> </div>
								<div class="commentblock" style="margin:0 0 0 10px; height:35px; width:33px; line-height:28px; font-size:16px; font-weight:bold; text-align:center; background:url(<?php bloginfo('template_directory'); ?>/images/comments.png) no-repeat;">
									<?php comments_popup_link('0', '1', '%'); ?>
								</div>
							</div>
							<div style="float:right; width:530px;">
								<h1 style="font-size:16px; color:#104863; font-weight:bold;"><a href="<?php the_permalink(); ?>" style="color:#104863; font-size:16px; font-weight:bold;"><?php the_title(); ?></a></h1>
								<div>
								<?php excerpt('60'); ?>
								</div>
							</div>
							<div class="clear"></div>
						<?php } ?>
																			
					</div>
					<!--- POST --->	
				
				<?php endwhile; ?>
				
				</div> <!-- End LEFT -->
				
				<div class="right">
					
					<?php if ( is_category('4')) { ?>
						<?php get_sidebar(); ?>
					<?php } else { ?>
						<?php get_sidebar(); ?>
					<?php } ?>
				
				</div>
				
				<div id="clear"></div>
			
			<?php } ?>
		
		<?php else : ?>	
			
			<div class="left">
				No Posts Found
			</div>
			
			<div class="right">
					
				<?php if ( is_category('4')) { ?>
					<?php get_sidebar(); ?>
				<?php } else { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
			
			</div>
			
			<div id="clear"></div>
		
		<?php endif; ?>
			
		<div id="paginator">
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  
		</div>
			
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>