<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1ee8d8c18fb33c50796e77fe1d62401d926a055b47"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/page_2013-08-16-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>
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
					<p class="agenda" style="font-size:18px;">Ready themes</p>
			
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