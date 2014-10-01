<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "3637886923acbfbbd6d3719f2eb3156394a9e33e03"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/single.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/single_2013-09-07-10.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>
<?php $image2 = get_template_directory_uri().'/images/bigtheme.jpg'; ?>	
<?php 
$category = get_the_category();
$parent = $category[0]->category_parent;
?>
	
	<?php if(!in_category(array( 4, 14 ))){ // For blog category, excludes themes and plugins categories ?>
	<div id="singlefeatured">
	
	<div class="leftheading">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<?php if ( in_category('4')) { ?>
			
				<h1><?php the_title() ?></h1>
				<p><?php the_excerpt(); ?></p>
			
			<?php } else { ?>
				
				<h1>Our Blog</h1>
				<p>News, Information & Strategies To Help Increase Your Results!</p>
			
			<?php } ?>
	
		<?php endwhile; ?>

	<?php endif; ?>	
	</div>
	
	<div class="rightheading">
		<?php require_once dirname( __FILE__ ) . '/custom/social.php'; ?>
	</div>
	<div class="clear"></div>

	</div>
	<?php } else { ?>
	
	<?php /*?><?php if(is_single('526') || is_single('409') || is_single('671') || is_single('700')){ // New setup  top part?><?php */?>
	<div id="singlefeatured">
	
	<div class="leftheading">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>

			<?php if ( in_category(array( 4, 14 ))) { ?>
			
				<h1><?php the_title() ?></h1>
				<p><?php the_excerpt(); ?></p>
			
			<?php } else { ?>
				
				<h1>Our Blog</h1>
				<p>News, Information & Strategies To Help Increase Your Results!</p>
			
			<?php } ?>
	
		<?php endwhile; ?>

	<?php endif; ?>	
	</div>
	
	<div class="rightheading">
		<?php require_once dirname( __FILE__ ) . '/custom/social.php'; ?>
	</div>
	<div class="clear"></div>

	</div>
	<?php } ?>
		
	<!-- maincontent -->
	<div id="maincontent">
		
		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>
				
			<?php /*?><?php if(in_category( array( 4, ) )){ // If in themes category ?>
				<?php if(!is_single( array( 526, 409 ) ) ){ // If it's not one of the new setup themes...this should be excluded ?>
				<?php include("custom/theme.php"); ?>
				<?php } ?>
			<?php } ?><?php */?>
		
			<div class="fullcontent">
		
				<?php if ( in_category('4')) { ?>
                		
					<?php if ( is_single('409')) { // Ready Review FREE Theme ?>
					
					<!-- content -->
                    <div class="themecontent">
						<?php $themedisplay_image = get_post_meta($post->ID, 'themedisplay-image', true); ?>
						<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
                        <?php $features = get_post_meta($post->ID, 'features', true); ?>
                        <?php $whybuy = get_post_meta($post->ID, 'whybuy', true); ?>
                        <?php $price = get_post_meta($post->ID, 'price', true); ?>
                        <?php $rightside = get_post_meta($post->ID, 'rightside', true); ?>
                        <?php $buybutton = get_post_meta($post->ID, 'buybutton', true); ?>
						<?php $featuresbig = get_post_meta($post->ID, 'features-big', true); ?>
						<?php $featuressmall = get_post_meta($post->ID, 'features-small', true); ?>
						
						<div style="text-align:center; margin:30px 0;">
							<h2>Free Review Theme for Product Reviews</h2>
						</div>
						
						<div class="themeleft" style="width:640px; float:left; line-height:24px; position:relative;">
							<div style="position:absolute; top:115px; left:182px;">
								<a href="<?php echo $demo; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/demo.png" border="0" /></a>
							</div>
                            <a href="<?php echo $demo; ?>" target="_blank"><img src="<?php echo $themedisplay_image; ?>" width="640" border="0"></a>
                        </div>
                        
                        <div class="themeright" style="float:right; width:300px; padding-top:20px;">
                            <?php if ($price){ ?>
                            <div style="padding-bottom:10px; margin-bottom:10px;">
                                
                                
                                <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
                                    <input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/testgrey.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>


								<br>
                                <img src="http://www.readythemes.com/wp-content/uploads/2012/07/divider.gif">
                            </div>
                            <div align="center" style="margin-bottom:30px;">
                            <?php echo $buybutton; ?>
                            </div>
                            
                            <?php } else { ?>
								<div style="border:1px solid #d5d5d5; background-color:#fff; padding:2px; width:300px; margin-bottom:40px;">
									<div style="background:url(<?php bloginfo('template_directory'); ?>/images/box_bg.gif) repeat-x #E5E5E5; padding:20px;">
									
										<div>
										<span style="font-size:16px; font-weight:bold;">FREE! Create a Ready Themes account below and download our FREE affiliate review theme</span>
										<p>Ready Review is a full functional, premium theme designed to make it easy for you to set up product review sites.</p>
										</div>
		
										<div>
										<form name="dap_direct_signup" method="post" action="http://www.readythemes.com/dap/signup_submit.php">
										
										<div style="margin-bottom:10px;">
										<strong>First Name:</strong>
										<input type="text" name="first_name" style="width:240px; padding:8px; border:1px solid #C9C5C5;">
										</div>
										
										<div style="margin-bottom:20px;">
										<strong>Email Address:</strong>
										<input type="text" name="email"  style="width:240px; padding:8px; border:1px solid #C9C5C5;">
										</div>	
										
										<div style="text-align:center;">
											<input type="image" onClick="_gaq.push(['_trackEvent', 'button_click', 'click_download', 'Ready_Review_free']);" src="http://www.readythemes.com/wp-content/uploads/2012/11/download-free-theme.png" name="Submit" value="Sign Up">
										</div>
										
                                        <input type="hidden" name="refferer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
                                        <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
										<input type="hidden" name="productId" value="22">
										<input type="hidden" name="redirect" value="/login/?msg=SUCCESS_CREATION">
										</form>
										</div>
		
									</div>
								</div>
                                <?php echo $rightside; ?>
                            <?php } ?>
                        </div>
                        
                        <div class="clear"></div>
						
						<?php the_content(); ?>
						
						<?php if ($featuresbig){ ?>
                            <?php echo $featuresbig; ?>
                        <?php } ?>
						
						<?php if ($featuressmall){ ?>
                            <?php echo $featuressmall; ?>
                        <?php } ?>
						<!-- FEATURES -->
						
					</div>
					<!-- end content -->
					
					<?php } else if ( is_single('526')) { ?>

    				<!-- content -->
                    <div class="themecontent">
						<?php $themedisplay_image = get_post_meta($post->ID, 'themedisplay-image', true); ?>
						<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
                        <?php $features = get_post_meta($post->ID, 'features', true); ?>
                        <?php $whybuy = get_post_meta($post->ID, 'whybuy', true); ?>
                        <?php $price = get_post_meta($post->ID, 'price', true); ?>
                        <?php $rightside = get_post_meta($post->ID, 'rightside', true); ?>
                        <?php $buybutton = get_post_meta($post->ID, 'buybutton', true); ?>
						<?php $featuresbig = get_post_meta($post->ID, 'features-big', true); ?>
						<?php $featuressmall = get_post_meta($post->ID, 'features-small', true); ?>
						<?php $newdesign = get_post_meta($post->ID, 'newdesign', true); ?>
						<?php $imgfoldername = get_post_meta($post->ID, 'imgfoldername', true); ?>
						
						<div style="text-align:center; margin:30px 0;">
							<h2><?php echo $postexcerpt; ?></h2>
						</div>
						<?php if ($price&&$_GET['coupon']!=='giveaway'){ ?>
						<!--/newdesign-->
						<div id="rproductlightbox">
					
						
							<div class="bigpreview">
								<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/1.png" alt=""/></div>
								<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/2.png" alt=""/></div>
								<div class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/3.png" alt=""/></div>
							
							</div>
							
							<div class="thumbnails">
								<div class="thumb"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/11.png" alt="" /></div>
								<div class="thumb"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/22.png" alt="" /></div>
								<div class="thumb"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $imgfoldername;?>/New%20folder/33.png" alt="" /></div>
							</div>
							<div class="rdthpreviewbutton"><a href="<?php echo $demo; ?>">Live Preview</a></div>
							<div class="clearfix"></div>

                        </div><!--/rproductlightbox-->
                        <div id="rsingleright">
                        <form name="PaymentForm" id="submitsus" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
                                    <input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                    <input type="hidden" name="item_name" value="<?php echo $buybutton;?>" />
                                    <div class="buynowbutton" ><a href="#" onclick="document.forms['submitsus'].submit();return false;">Buy now for <?php if ($_GET['coupon']=="war15") echo "<del>47</del> $32"; else {?>$47<?php } ?></a></div>
                        	
                                </form>

                        	<div class="features">
                        	
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn2.iconfinder.com/data/icons/free-mobile-icon-kit/16/Dating.png" alt="" /></div>
                        			<span>User rating:</span>
                        			<div class="rating">
                        				<a href=""><img src="https://cdn0.iconfinder.com/data/icons/16x16-free-toolbar-icons/16/25.png" alt="" /></a>
                        				<a href=""><img src="https://cdn0.iconfinder.com/data/icons/16x16-free-toolbar-icons/16/25.png" alt="" /></a>
                        				<a href=""><img src="https://cdn0.iconfinder.com/data/icons/16x16-free-toolbar-icons/16/25.png" alt="" /></a>
                        				<a href=""><img src="https://cdn0.iconfinder.com/data/icons/16x16-free-toolbar-icons/16/25.png" alt="" /></a>
                        				<a href=""><img src="https://cdn0.iconfinder.com/data/icons/16x16-free-toolbar-icons/16/25.png" alt="" /></a>
                        			</div><!--/rating-->
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn0.iconfinder.com/data/icons/glyph_set/16/check_yes.png" alt="" /></div>
                        			<span>Version:</span>
                        			1.0.2
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn4.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png" alt="" /></div>
                        			<span>Latest Updated:</span>
                        			2013 - May - 29
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/settings-16.png" alt="" /></div>
                        			<span>Requirements:</span>
                        			WordPress 2.5.2<br />
                        			Server online<br />
                        			Domain name
                    
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn1.iconfinder.com/data/icons/Momentum_GlossyEntireSet/16/text-columns.png" alt="" /></div>
                        			<span>Columns:</span>
                        			3
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn3.iconfinder.com/data/icons/eightyshades/512/43_Grid-16.png" alt="" /></div>
                        			<span>Layout:</span>
                        			Fixed
                        		</div><!--/feat-->
                        		<div class="feat">
                        			<div class="icon"><img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/globe-16.png" alt="" /></div>
                        			<span>Browsers:</span>
                        			<div class="browsers">
                        				<div class="bro"><img src="https://cdn1.iconfinder.com/data/icons/Keyamoon-IcoMoon--limited/16/ie.png" alt="" /></div>
                        				<div class="bro"><img src="https://cdn1.iconfinder.com/data/icons/Keyamoon-IcoMoon--limited/16/firefox.png" alt="" /></div>
                        				<div class="bro"><img src="https://cdn1.iconfinder.com/data/icons/Keyamoon-IcoMoon--limited/16/chrome.png" alt="" /></div>
                        				<div class="bro"><img src="https://cdn1.iconfinder.com/data/icons/Keyamoon-IcoMoon--limited/16/safari.png" alt="" /></div>
                        				<div class="bro"><img src="https://cdn1.iconfinder.com/data/icons/Keyamoon-IcoMoon--limited/16/opera.png" alt="" /></div>
                        			</div><!--/browsers-->
                        		</div><!--/feat-->
                        	</div><!--/features-->
                        </div><!--/rsingleright-->
						<!--/newdesign-->
						<?php }  if ($_GET['coupon']==='giveaway'){ ?>
						<div class="themeleft" style="width:640px; float:left; line-height:24px; position:relative;">
							<div style="position:absolute; top:115px; left:182px;">
								<a href="<?php echo $demo; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/demo.png" border="0" /></a>
							</div>
                            <a href="<?php echo $demo; ?>" target="_blank"><img src="<?php echo $themedisplay_image; ?>" width="640" border="0"></a>
                        </div>
                        
                        <div class="themeright" style="float:right; width:300px; padding-top:20px;">
                        
                                <?php echo $rightside; ?>
                            <?php } ?>
                        </div>
                        
                        <div class="clear"></div>
						
						<?php if ($featuresbig){ ?>
                            <?php echo $featuresbig; ?>
                        <?php } ?>
						
						<?php if ($featuressmall){ ?>
                            <?php echo $featuressmall; ?>
                        <?php } ?>
						<!-- FEATURES -->
						
						<?php if ($whybuy){ ?>
						<div class="whybuy">			
							<h3>Why Buy This Theme?</h3>
							<?php echo $whybuy; ?>
						</div>
                        <?php } ?>
						
						<?php if ($price){ ?>
                        <div style="margin-top:40px; margin-bottom:40px; text-align:center;">
                            <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
<input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
                                  <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/> 
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="item_name" value="<?php echo $buybutton;?>" />
<div style="margin-left:20px"><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/test.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
                        </div>
                        <?php } ?>
						
					</div>
					<!-- end content -->
						                
                    <?php } else { // All themes setup ?>
					
					<!-- content -->
                    <div class="themecontent">
						<?php $themedisplay_image = get_post_meta($post->ID, 'themedisplay-image', true); ?>
						<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
                        <?php $features = get_post_meta($post->ID, 'features', true); ?>
                        <?php $whybuy = get_post_meta($post->ID, 'whybuy', true); ?>
                        <?php $price = get_post_meta($post->ID, 'price', true); ?>
                        <?php $rightside = get_post_meta($post->ID, 'rightside', true); ?>
                        <?php $buybutton = get_post_meta($post->ID, 'buybutton', true); ?>
						<?php $featuresbig = get_post_meta($post->ID, 'features-big', true); ?>
						<?php $featuressmall = get_post_meta($post->ID, 'features-small', true); ?>
						<?php $postexcerpt = get_post_meta($post->ID, 'postexcerpt', true); ?>
						
						<div style="text-align:center; margin:30px 0;">
							<h2><?php echo $postexcerpt; ?></h2>
						</div>
						
						<div class="themeleft" style="width:640px; float:left; line-height:24px; position:relative;">
							<div style="position:absolute; top:158px; left:243px;">
								<a href="<?php echo $demo; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/demo.png" border="0" /></a>
							</div>
                            <a href="<?php echo $demo; ?>" target="_blank"><img src="<?php echo $themedisplay_image; ?>" width="640" border="0"></a>
                        </div>
                        
                        <div class="themeright" style="float:right; width:300px; padding-top:20px;">
                            <?php if ($price&&$_GET['coupon']!=='giveaway'){ ?>
                            <div style="padding-bottom:10px; margin-bottom:10px;padding-left:20px">
                                <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
                                    <input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
                                    <input type="hidden" name="currency_code" value="USD" />
                                   
                                   <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                   <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/testgrey.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
                                <br>
                                <img src="http://www.readythemes.com/wp-content/uploads/2012/07/divider.gif">
                            </div>
                            <div align="center" style="margin-bottom:30px;">
                            <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
<input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
    <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>                               
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="item_name" value="<?php echo $buybutton;?>" />
<div style="margin-left:20px"><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/<?php if ($_GET['coupon']=='war15') echo '15button.jpg';if ($_GET['coupon']=='loyal') echo '23button.jpg'; if ($_GET['coupon']!='war15'&$_GET['coupon']!='loyal') echo 'test.png';?>" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
                            </div>
                            
                            <?php }  if ($_GET['coupon']==='giveaway'){ ?>
                                <?php echo $rightside; ?>
                            <?php } ?>
                        </div>
                        
                        <div class="clear"></div>
						
						<?php the_content(); ?>
						
						<?php if ($featuresbig){ ?>
                            <?php echo $featuresbig; ?>
                        <?php } ?>
						
						<?php if ($featuressmall){ ?>
                            <?php echo $featuressmall; ?>
                        <?php } ?>
						<!-- FEATURES -->
						
						<?php if ($whybuy){ ?>
						<div class="whybuy">			
							<h3>Why Buy This Theme?</h3>
							<?php echo $whybuy; ?>
						</div>
                        <?php } ?>
						
						<?php if ($price){ ?>
                        <div style="margin-top:40px; margin-bottom:40px; text-align:center;">
                            <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
<input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
      <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>                             
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="item_name" value="<?php echo $buybutton;?>" />
<div style="margin-left:20px"><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/test.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
                        </div>
                        <?php } ?>
						
					</div>
					<!-- end content -->
            
                    <?php } ?>
					
				<div class="hr"></div>
		
				<?php $otherthemes = new WP_Query('cat=4'); ?>
				
				<div id="mycarousel" class="jcarousel-skin-tango">
				<div class="carouselheader"><img src="http://www.readythemes.com/wp-content/uploads/2012/12/more-themes.gif" /></div>
				<ul>
				<?php while ($otherthemes->have_posts()) : $otherthemes->the_post(); ?>
				<?php $themeimage = get_post_meta($post->ID, 'cat-image', true); ?>
					<li><a href="<?php the_permalink(); ?>"><img src="<?php echo $themeimage; ?>" alt="" class="prodimage" border="0" /></a><div class="prodheading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></li>
				<?php endwhile;?>
				</ul>
				</div>
					
				<?php } elseif(in_category('14')) { //PLUGINS ?>
								
					<!-- content -->
                    <div class="themecontent">
						<?php $themedisplay_image = get_post_meta($post->ID, 'themedisplay-image', true); ?>
						<?php $demo = get_post_meta($post->ID, 'demo', true); ?>
                        <?php $features = get_post_meta($post->ID, 'features', true); ?>
                        <?php $whybuy = get_post_meta($post->ID, 'whybuy', true); ?>
                        <?php $price = get_post_meta($post->ID, 'price', true); ?>
                        <?php $rightside = get_post_meta($post->ID, 'rightside', true); ?>
                        <?php $buybutton = get_post_meta($post->ID, 'buybutton', true); ?>
						<?php $featuresbig = get_post_meta($post->ID, 'features-big', true); ?>
						<?php $featuressmall = get_post_meta($post->ID, 'features-small', true); ?>
						<?php $headline = get_post_meta($post->ID, 'headline', true); ?>
						
						<div style="text-align:center; margin:30px 0;">
							<h2><?php echo $headline; ?></h2>
						</div>
						
						<div class="themeleft" style="width:640px; float:left; line-height:24px; position:relative;">
							<?php /*?><div style="position:absolute; top:115px; left:182px;">
								<a href="<?php echo $demo; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/demo.png" border="0" /></a>
							</div><?php */?>
                            <img src="<?php echo $themedisplay_image; ?>" width="640" border="0">
                        </div>
                        
                        <div class="themeright" style="float:right; width:300px; padding-top:20px;">
                            <?php if ($price){ ?>
                            <div style="padding-bottom:10px; margin-bottom:10px;">
                                <form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php" target="_blank">
                                    <input type="hidden" name="cmd" value="_xclick"/><?php if(isset($_GET['coupon'])) { ?> <input type="hidden" name="coupon_code" value="<?php echo $_GET['coupon'];?>" /><?php } ?>
                                    <input type="hidden" name="currency_code" value="USD" />
                                   <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><input type="image" src="http://www.readythemes.com/wp-content/themes/rt/images/testgrey.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
                                </form>
                                <br>
                                <img src="http://www.readythemes.com/wp-content/uploads/2012/07/divider.gif">
                            </div>
                            <div align="center" style="margin-bottom:30px;">
                            <?php echo $buybutton; ?>
                            </div>
                            <?php } ?>
                        </div>
                        
                        <div class="clear"></div>
						
						<?php the_content(); ?>
						
						<?php if ($featuresbig){ ?>
                            <?php echo $featuresbig; ?>
                        <?php } ?>
						
						<?php if ($featuressmall){ ?>
                            <?php echo $featuressmall; ?>
                        <?php } ?>
						<!-- FEATURES -->
						
						<?php if ($price){ ?>
                        <div style="margin-top:40px; margin-bottom:40px; text-align:center;">
                            <?php echo $buybutton; ?>
                        </div>
                        <?php } ?>
						
					</div>
					<!-- end content -->
	                        
				<?php } else { ?>
                    <div class="left">
					<!-- content -->
					<div class="blogcontent">
						
						<h1><?php the_title(); ?></h1>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <?php if($image){ ?>
                        <img src="<?php echo $image[0]; ?>" align="left" style="margin:0 20px 20px 0;">
                        <?php } ?>
						<?php the_content(); ?>
                        <div class="clear"></div>
					</div>
					<!-- end content -->
					<?php comments_template(); // Get wp-comments.php template ?>
					</div>
					<div class="right">
						<?php get_sidebar(); ?>
					</div>
					<div class="clear"></div>
				
				<?php } ?>
			
			</div>
			
			<?php endwhile; ?>
        
        <?php endif; ?>
		
		<div id="clear"></div>
			
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>