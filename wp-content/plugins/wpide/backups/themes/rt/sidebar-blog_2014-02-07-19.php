<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097ff1bf050f29"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/sidebar-blog.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/sidebar-blog_2014-02-07-19.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><div class="sidebar">

<?php if(is_page('90')){ ?>
<?php } elseif(is_single('81')){ ?>
<?php } else { ?>
<!-- HOMEPAGE SIDEBAR -->
<div id="widget">
	<p align="center"><img src="http://www.readythemes.com/wp-content/uploads/2012/05/affiliate-theme-sidebar.png" /></p>
	<div class="optincopy" style="border-bottom:1px solid #ccc; padding-bottom:20px;">
	<p style="font-size:16px; line-height:22px; margin-bottom:20px;"><strong><span style="color:#BC0C0C; font-size:26px;">FREE!</span> Download the Wordpress theme that has allowed me to create a full time affiliate marketing business.</strong> &nbsp; <span style="color:#222; font-size:14px;">(<a href="/affiliate-review-theme/" style="color:#222;">Learn More &raquo;</a>)</span></p>
	<p>
	<!-- AWeber Web Form Generator 3.0 -->

	<form method="post" class="af-form-wrapper" action="http://www.aweber.com/scripts/addlead.pl"  >
	<div style="display: none;">
	<input type="hidden" name="meta_web_form_id" value="1852586390" />
	<input type="hidden" name="meta_split_id" value="" />
	<input type="hidden" name="listname" value="readythemes" />
	<input type="hidden" name="redirect" value="http://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_095cc75df6cbcc5fad757ad1da34c57c" />
	
	<input type="hidden" name="meta_adtracking" value="Free_Theme" />
	<input type="hidden" name="meta_message" value="1" />
	<input type="hidden" name="meta_required" value="name,email" />

	
	<input type="hidden" name="meta_tooltip" value="" />
	</div>
	<div id="af-form-758679296" class="af-form" style="text-align:center;"><div id="af-body-758679296" class="af-body af-standards">
	<div class="af-element">
	<div class="af-textWrap">
	<input id="awf_field-34706001" type="text" name="name" class="text" onBlur="if (this.value==''){this.value='First Name'};" onFocus="if(this.value=='First Name'){this.value=''};" value="First Name"  tabindex="500" style="width:210px; padding:8px; border:1px solid #C9C5C5;" />
	</div>
	<div class="af-clear"></div></div><br />
	<div class="af-element">

	<div class="af-textWrap"><input class="text" id="awf_field-34706002" type="text" name="email" onBlur="if (this.value==''){this.value='Email Address'};" onFocus="if(this.value=='Email Address'){this.value=''};" value="Email Address" tabindex="501" style="width:210px; padding:8px; border:1px solid #C9C5C5;"  />
	</div><div class="af-clear"></div>
	</div>
	<div class="af-element buttonContainer">
	<input name="submit" id="af-submit-image-758679296" type="image" class="image" style="background: none; width:205px; height:58px; border:none; margin-top:10px;" alt="Submit Form" src="http://www.readythemes.com/wp-content/uploads/2012/05/download-button.png" tabindex="502" />
	<div class="af-clear"></div>
	</div>
	<div class="af-element privacyPolicy" style="text-align: center"><p><a title="Privacy Policy" href="http://www.aweber.com/permission.htm" target="_blank">I respect your email privacy</a></p>

	<div class="af-clear"></div>
	</div>
	</div>
	</div>
	<div style="display: none;"><img src="http://forms.aweber.com/form/displays.htm?id=7KwcbOycTJxs" alt="" /></div>
	</form>
	<!-- /AWeber Web Form Generator 3.0 -->
	</p>
	</div>
</div>
<?php } ?>

<div id="widgetheading">From The Blog</div>
<div id="widget">

	<ul>
		<?php $recenblog_query = new WP_Query('cat=-4,-3&showposts=10'); ?>
	
		<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
		
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
			<p><?php content('25')?></p>
		</li>
		
		<?php endwhile;?>
	</ul>

</div>

<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar('blog') ) : ?>
<?php endif; ?>
<!-- END BLOG SIDEBAR -->

</div>
<div class="right_bottom" style="background:url(http://www.readythemes.com/wp-content/uploads/2012/05/sidebar_bottom_bg.png) left no-repeat; height:40px; width:330px;"></div>