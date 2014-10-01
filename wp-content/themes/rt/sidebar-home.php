<div class="sidebar">

<?php /*?><div id="widget">
	<div class="optincopy" style="border-bottom:1px solid #ccc; padding-bottom:20px;">
	<p style="font-size:16px; line-height:22px; margin-bottom:20px;"><strong><span style="color:#BC0C0C; font-size:26px;">FREE!</span> Download the Wordpress theme that has allowed me to create a full time affiliate marketing business.</strong> &nbsp; <span style="color:#222; font-size:14px;">(<a href="/affiliate-review-theme/" style="color:#222;">Learn More &raquo;</a>)</span></p>
	<p>
	<div align="center" style="margin-bottom:10px; padding:10px 20px 0px 20px;">
		<form name="dap_direct_signup" method="post" action="http://www.readythemes.com/dap/signup_submit.php">

		<div class="af-textWrap" style="margin-bottom:10px;">
		<input type="text" name="first_name" class="text" onBlur="if (this.value==''){this.value='First Name'};" onFocus="if(this.value=='First Name'){this.value=''};" value="First Name"  tabindex="500" style="width:210px; padding:8px; border:1px solid #C9C5C5;" />
		</div>
	
		<div class="af-textWrap">
		<input class="text" type="text" name="email" onBlur="if (this.value==''){this.value='Email Address'};" onFocus="if(this.value=='Email Address'){this.value=''};" value="Email Address" tabindex="501" style="width:210px; padding:8px; border:1px solid #C9C5C5;"  />
		</div>
		
		<div class="af-element buttonContainer">
		<input name="submit" id="af-submit-image-758679296" type="image" class="image" style="background: none; width:205px; height:58px; border:none; margin-top:10px;" alt="Submit Form" src="http://www.readythemes.com/wp-content/uploads/2012/05/download-button.png" tabindex="502" />
		<input type="hidden" name="productId" value="3"><input type="hidden" name="redirect" value="/login/?msg=SUCCESS_CREATION">
		</div>

		</form>
	</div>
	</p>
	</div>
</div><?php */?>

<div style="border-bottom:1px solid #ccc; padding-bottom:20px; margin-bottom:20px;">
	<form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="item_name" value="Ready Themes All Access" />
    <div><input type="image" src="http://www.readythemes.com/wp-content/uploads/2012/07/download-all-themes.png" border="0" name="submit" alt="Make payments with PayPal - its fast, free and secure!" /></div>
    </form>
    <br>
    <img src="http://www.readythemes.com/wp-content/uploads/2012/07/divider.gif">
    <br>
    <a href="/category/themes/"><img src="http://www.readythemes.com/wp-content/uploads/2012/07/single-theme.png" border="0"></a>
</div>

<div id="widgetheading">From The Blog</div>
<div id="widget">

	<ul>
		<?php $recenblog_query = new WP_Query('cat=-4&showposts=3'); ?>
	
		<?php while ($recenblog_query->have_posts()) : $recenblog_query->the_post(); ?>
		<?php $smimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'sidebar-thumb' ); ?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
			<p>
			<?php if($smimage){ ?><a href="<?php the_permalink(); ?>"><img src="<?php echo $smimage[0]; ?>" align="left" style="border:1px solid #e3e3e3; margin:0 10px 10px 0;"></a><?php } ?>
			<?php content('25')?>
            </p>
		</li>
		
		<?php endwhile;?>
	</ul>

</div>

<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>
<?php endif; ?>
<!-- END BLOG SIDEBAR -->

</div>
<div class="right_bottom" style="background:url(http://www.readythemes.com/wp-content/uploads/2012/05/sidebar_bottom_bg.png) left no-repeat; height:40px; width:330px; margin-bottom:20px;"></div>