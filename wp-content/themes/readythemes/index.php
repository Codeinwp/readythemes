<?php get_header(); ?>

<!--- BODY --->
<div id="bodytop"></div>
<div id="body">
    
	<?php if(is_home()){ ?>
    <!--- INTRO --->
    <div class="intro">
    
    	<?php if ( get_option('rt_homeheading') <> "" ) { ?> 
        <h1><?php echo get_option('rt_homeheading'); ?></h1>
        <?php } ?>


        <div class="introimage"><?php if ( get_option('rt_homeimage') <> "" ) { ?><?php if ( get_option('rt_homeimagelink') <> "" ) { ?><a href="<?php echo get_option('rt_homeimagelink'); ?>" rel="nofollow" target="_blank"><?php } ?><img src="<?php echo get_option('rt_homeimage'); ?>" alt="<?php if(get_option('rt_homeimagealt')){ ?><?php echo get_option('rt_homeimagealt'); ?><?php } else { ?><?php bloginfo('name'); ?><?php } ?>"><?php if ( get_option('rt_homeimagelink') <> "" ) { ?></a><?php } ?><?php } ?></div>
		<?php if ( get_option('rt_homeintro') <> "" ) { ?>
        <div class="introtext"><?php echo stripslashes(get_option('rt_homeintro')); ?></div>
		<?php } ?>

    </div>
	<div class="download">
		<div class="text">Download My FREE Affiliate Theme</div>
        <form>
        <div class="optinform-home">
            <input type="text" name="name" style="width:120px; padding:5px; border:1px solid #ccc; font-style:italic;" value="First Name">&nbsp;&nbsp;&nbsp;
            <input type="text" name="name" style="width:200px; padding:5px; border:1px solid #ccc; font-style:italic;" value="Email Address">
        </div>
        <div class="optinform-submit">
        	<input type="image" src="http://www.readythemes.com/wp-content/uploads/2012/04/download1.jpg">
        </div>
        </form>
	</div>
	<?php } ?>
    
	<?php if(is_home()){ ?>
		<div class="homecontent">
            <div class="contentleft-home">
                <h2>About Our Themes</h2>
                <p>
                If you are interested in earning money online, you are in the right place.  Ready Themes was founded with one goal in mind and that is to help people create a lucrative business on the internet.
                Our themes are built for those who monetization methods of affiliate marketing and Google Adsense.
                As an internet marketer who earns six figures on the internet, all of our themes are created and tested to ensure highest click through rate and some of the best features you'll find in any theme.
                </p>
                <p>
                Some of our features include...
                </p>
                <ul>
                    <li>Designed for anyone to set up and create a money earning website in minutes</li>
                    <li>Unique and fresh designs to help your business stand out from the crowd</li>
                </ul>
            </div>
            <div class="contentright-home">
                <h2>Latest Blog Posts</h2>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' ); ?>
                <div class="blogpost">
                    <div class="left">
                        <?php if ($image): ?>
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150" border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php excerpt('30'); ?></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="clear"></div>
		</div>
        <div class="latestthemes">
        	<h2>Latest Themes</h2>
        	<div class="latest-single">
            	<img src="http://www.readythemes.com/wp-content/uploads/2012/04/sample.jpg">
            </div>
            <div class="latest-single">
            	<img src="http://www.readythemes.com/wp-content/uploads/2012/04/sample.jpg">
            </div>
            <div class="latest-single">
            	<img src="http://www.readythemes.com/wp-content/uploads/2012/04/sample.jpg">
            </div>
            <div class="latest-single" style="margin-right:0;">
            	<img src="http://www.readythemes.com/wp-content/uploads/2012/04/sample.jpg">
            </div>
            <div class="clear"></div>
        </div>
        <div class="downloadall" style="padding:20px;">
        	<h2>Download All Of Our Themes</h2>
            <p>For only $37 (per year), you can download all of our themes and gain access to all future themes.</p>
        </div>
	<?php } else { ?>
    <!--- CONTENTLEFT --->
    <div class="contentleft">
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'med-thumb' ); ?>
            <?php if ($image): ?>
            
                <!-- post -->
                <div class="post">
                	
                    <?php if ( get_option('rt_excerpt') == "Yes" ) { ?>
                		
                        <div class="postleft">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150" border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
                        </div>
                        
                        <div class="postright">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php excerpt('200'); ?> <a href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
                        </div>
                        
                        <div class="clear"></div>
                    
                    <?php } else { ?>
                    	
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        
                    	<p><a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" width="150" height="150" border="0" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" align="left" class="fullconentimg" /></a><?php the_content(); ?></p>
                        
                        <div class="clear"></div>
                    
                    <?php } ?>
                    	                                    
                </div>
                <!-- end post -->
            
            <?php else: ?>
                
                <!-- post -->
                <div class="post">
                    
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php if ( get_option('rt_excerpt') == "Yes" ) { ?>
					<p><?php excerpt('300'); ?> <a href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
					<?php } else { ?>
					<p><?php the_content(); ?></p>
					<?php } ?>
                
                </div>
                <!-- end post -->
                
            <?php endif; ?>
		
		<?php endwhile; endif; ?>
        
    </div>
    
    <!--- CONTENTRIGHT --->
    <div class="contentright">
        
        <!--- SIDEBAR --->
        <div class="sidebar">
        	<?php get_sidebar(); ?>
        </div>
        
    </div>
    <?php } ?>

    <div class="clear"></div>

</div>
<div id="bodybottom"></div>

<?php get_footer(); ?>