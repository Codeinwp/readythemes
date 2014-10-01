<?php /*

Template Name: Seopedia

*/ ?>

<?php get_header(); ?>

<?php 

$session = Dap_Session::getSession();
    $user = $session->getUser();
    $user = Dap_User::loadUserById($user->getId());
    
    print_r($user->signup_date);
    
    ?>

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

	

			<div class="homecontent" style="margin-top:20px;">

		

                <div class="topblurb">

                    <div>

                        <span>Download Our Entire Theme Collection Now For Only <strong><strike>$67</strike> &nbsp; $43</strong></span> 

                    </div>

                    <div class="clear"></div>

                </div>

                

                <div class="blurb">

				<?php the_content() ?>

                </div>

                                

            </div>

            

            <?php $recenthemes_query = new WP_Query('cat=4'); ?>

        

            <?php while ($recenthemes_query->have_posts()) : $recenthemes_query->the_post(); ?>	

            

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

			

		</div>

		<!-- end maincontent -->



<?php get_footer(); ?>