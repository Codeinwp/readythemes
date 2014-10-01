<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097f6ec3ee731e"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/blog.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/blog_2013-11-08-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php get_header(); ?>

<?php echo do_shortcode('[DAP isPaidUser="Y" hasAccessTo="1" errMsgTemplate="SHORT"]'); ?>

<!-- Mainbody -->
    <div id="mainbody">
    
		<!-- Left -->
        <div class="left">
        
        	<?php $blog_query = new WP_Query('category_name=Blog'); ?>
		
			<?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            
            	<!--- POST --->
				<div class="post">
				
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="postedby">Posted by <?php the_author() ?> on <?php the_time('F jS, Y'); ?></div>
					
					<p><?php the_excerpt(); ?></p>
					
					<div class="filedunder">Filed Under <?php the_category(', '); ?></div>
				
				</div>
				<!--- POST --->	
            
            <?php endwhile;?>
			
		</div>
        <!-- End Left -->
		
        <!-- Right -->
		<div class="right">
		
			<!-- sidebar -->
			<?php get_sidebar('blog'); ?>
            <!-- end sidebar -->
		
		</div>
        <!-- End Right -->
        
		<div id="clear"></div>
        
	</div>
    <!-- End Mainbody -->

</div>
<!-- End Wrapper -->

<?php get_footer(); ?>