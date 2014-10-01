<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2c88b8ab12d80cd45cde7c55cd47ff4ca693e5cead"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/index.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/index_2014-06-30-21.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>

    <!-- maincontent -->
    <div id="maincontent">
    
        <?php if(is_home()) { ?>
			<?php require_once dirname( __FILE__ ) . '/custom/featured.php'; ?>
        <?php } else { ?>
            
        <?php } ?>
        
		<div class="homecontent">
		
		<div class="topblurb">
			<div class="blurbleft">
				<span><?php echo buyall; ?></span> 
			</div>
				
			<div class="blurbright"><a class="dark-button" href="/category/themes/" title="Read More"><span>Learn More</span></a></div>
			<div class="clear"></div>
		</div>
        
        <div class="homefeatures">
        	<div class="homefeature">
            	<img src="http://readythemes.com/wp-content/themes/rt/images/money.gif" align="left">We focus solely on building highly effective Wordpress themes that are designed for affiliate marketing, Adsense marketing and other effective online income strategies.
            </div>
            <div class="homefeature">
            	<img src="http://readythemes.com/wp-content/themes/rt/images/browsers.gif" align="left">All of our themes are compatible with all major browsers including Firefox, Safari, Opera, Chrome and Internet Explorer 7+.  Expertly coded in CSS to ensure a great user experience.
            </div>
            <div class="homefeature">
            	<img src="http://readythemes.com/wp-content/themes/rt/images/options.gif" align="left">Our built in theme options allow you to customize your site to your specifications.  Set the site up the way you want it without having to touch any code or pay an expert.  
            </div>
            <div class="homefeatureend">
            	<img src="http://readythemes.com/wp-content/themes/rt/images/support.gif" align="left">We offer 24/7 Support for anything related to setting up our Wordpress themes.  If you find a bug, run into a problem or get lost in the process, just let us know. We'll gladly help you out.
            </div>
            <div class="clear"></div>
        </div>
		
		<div class="homeleft">
		
			<h2>Most Popular Themes</h2>
			
			<?php 
			//$recenthemes_query = new WP_Query('cat=4&showposts=3'); 
			$recenthemes_query = new WP_Query( array( 'orderby ' => 'date', 'order ' => 'ASC', 'post_type' => 'post', 'post__in' => array( 178, 81, 255 ) ) );
			?>
			
			<?php while ($recenthemes_query->have_posts()) : $recenthemes_query->the_post(); ?>
			<?php $image = get_post_meta($post->ID, 'home-image', true); ?>
			<?php $posttitle = get_post_meta($post->ID, 'posttitle', true); ?>
			<?php $postexcerpt = get_post_meta($post->ID, 'postexcerpt', true); ?>
			<div class="newtheme">
			
				<div class="themeleft">
				<div class="themeoutline">
					<div class="themeborder">
						<img src="<?php echo $image; ?>" width="180" height="120" />
					</div>
				</div>
				</div>
				<div class="themeright">
					<h3><?php echo $posttitle; ?></h3>
					<p><?php echo $postexcerpt; ?></p>
					<p><a class="small-dark-button" href="<?php the_permalink(); ?>" title="Learn More"><span>Learn More</span></a></p>
				</div>
				<div class="clear"></div>
			
			</div>
			<?php endwhile;?>
					
		</div>
			
		<div class="homeright">
			
            <h2>Latest Blog Posts</h2>
			
			<div class="homepost">
			
			<?php $recenblog_query = new WP_Query('cat=5&showposts=3'); ?>
			
			<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
			<div>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php content('25')?></p>
			</div>
			<?php endwhile;?>
			
			</div>
			
			<h2>Subscribe</h2>
			
			<div class="homesubscribe">
				<img src="http://readythemes.com/wp-content/themes/rt/images/email.gif" align="left">
				We promise not to spam you with sales emails, we only send emails about new theme releases, blog posts, updates and bug fixes.
			</div>
			<div style="margin:20px 0;">
				<!-- AWeber Web Form Generator 3.0 -->
				<form method="post" class="af-form-wrapper" action="http://www.aweber.com/scripts/addlead.pl"  >
				<div style="display: none;">
				<input type="hidden" name="meta_web_form_id" value="569774437" />
				<input type="hidden" name="meta_split_id" value="" />
				<input type="hidden" name="listname" value="readythemes" />
				<input type="hidden" name="redirect" value="http://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_1665176802d03081949287b53d9464e9" />
				<input type="hidden" name="meta_adtracking" value="Basic_Form" />
				<input type="hidden" name="meta_message" value="1" />
				<input type="hidden" name="meta_required" value="name,email" />
				<input type="hidden" name="meta_tooltip" value="" />
				</div>
				<div style="float:left; width:170px;"><input id="awf_field-38756225" type="text" name="name" class="text" onBlur="if (this.value==''){this.value='First Name'};" onFocus="if(this.value=='First Name'){this.value=''};" value="First Name"  tabindex="500" style="width:140px; border:1px solid #ccc; padding:8px;" /></div>
				<div style="float:left; width:170px;"><input class="text" id="awf_field-38756226" type="text" name="email" onBlur="if (this.value==''){this.value='Email Address'};" onFocus="if(this.value=='Email Address'){this.value=''};" value="Email Address" tabindex="501" style="width:140px; border:1px solid #ccc; padding:8px;" /></div>
				<div style="float:left; width:70px;">
				<input name="submit" type="image" src="http://readythemes.com/wp-content/themes/rt/images/subscribe.png" tabindex="502" />
				<img src="http://forms.aweber.com/form/displays.htm?id=rGyc7OwsLMzs" alt="" />
				</div>
				</form>
				<div class="clear"></div>
				<!-- /AWeber Web Form Generator 3.0 -->
			</div>
			
            
		</div>
			
		<div class="clear"></div>
		
		</div>
		    
    </div>              
    <!-- end maincontent -->

<?php get_footer(); ?>