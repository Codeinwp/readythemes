<?php 
/*
 * Template Name: Christmas
 */
?>
<?php session_start();

if ( !isset( $_SESSION["origURL"] ) )
    $_SESSION["origURL"] ="";t
    
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>
	<?php if ( is_home() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
    <?php if ( is_search() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
    <?php if ( is_author() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
    <?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<? bloginfo('name'); ?><?php } ?>
    <?php if ( is_page() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>
    <?php if ( is_category() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
    <?php if ( is_month() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php the_time('F'); ?><?php } ?>
    <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><? bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style-lp.css" />
<?php if ( is_home() ) { ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style.css" />
<?php } else if (is_single()) { ?>
	<?php if (in_category('4')){ ?>
		<?php if(is_single('526') || is_single('409')){ ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style_single.css" />
		<?php } else { ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style_single.css" />
		<?php } ?>
	<?php } else { ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style_single.css" />
	<?php } ?>
<?php } else { ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/style_single.css" />
<?php } ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/_960.css" />
<?php if(is_single()) { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/skin.css" />
<?php } ?>

<!--[if LTE IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie.css" media="screen">
<![endif]-->
<link REL="SHORTCUT ICON" HREF="http://www.readythemes.com/wp-content/themes/rt/favicon.ico">
<!-- SCRIPTS-->
<?php wp_enqueue_script("jquery");  // JQUERY including by wordpress ?> 
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php if(is_single()) { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>
<script src="//cdn.optimizely.com/js/342062650.js"></script>
<script type="text/javascript">

	//<![CDATA[
	jQuery(document).ready(function(jQuery) {
	
	jQuery("#topnav li").first().hide();
	if (!jQuery.cookie('refferer')) jQuery.cookie('refferer', document.referrer, { expires: 7, path: '/' });
	
	if (jQuery.cookie('refferer').indexOf("warriorforum")>0) {
	
	jQuery(".themecontent h2").html('Welcome fellow <span style="color:red">Warrior</span>, get this premium theme for FREE');
	jQuery(".themecontent h2.ptheme").html('This is a special offer for <span style="color:red">WarriorForum</span> members.');
	jQuery(".blurbleft >span").html('We have a special offer for WarriorForum members <del>67</del> <strong style="color:red;">$55</strong>');
	}
	
	//console.log(jQuery.cookie('refferer'));
		jQuery(".scroll").click(function(event){		
			event.preventDefault();
			jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
		});
	});
	<?php if(is_single()) { ?>
	jQuery(document).ready(function() {
		jQuery('#mycarousel').jcarousel();
	});
	<?php } ?>
	//]]>
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32259175-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<link href='http://fonts.googleapis.com/css?family=PT+Sans|PT+Sans+Narrow' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="wrapper">

<!-- top black bar -->
<div id="top">

	<div id="logo">
    	<a href="/"><img src="http://www.readythemes.com/wp-content/uploads/2012/04/readythemes1.png" border="0" alt="Ready Themes" /></a>
	</div>

	<div id="topnav">
	
		<ul>
            <li <?php if ( is_home() ) { ?>class="activelink"<?php } ?>><a href="/">Home</a></li>
			<li <?php if ( is_page('9') ) { ?>class="activelink"<?php } ?>><a href="/about/" rel="nofollow">About</a></li>
			<li <?php if ( is_page('751') ) { ?>class="activelink"<?php } ?>><a href="/affiliates/" rel="nofollow">Affiliates</a></li>
            <li <?php if ( is_category() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'themes' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?> <?php if ( is_single() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'themes' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?>><a href="/category/themes/">Themes</a></li>
			<li <?php if ( is_category() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'plugins' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?> <?php if ( is_single() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'plugins' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?>><a href="/category/plugins/">Plugins</a></li>
			<?php /*?><li <?php if ( is_page('18') ) { ?>class="activelink"<?php } ?>><a href="/features/">Features</a></li><?php */?>
			<li <?php if ( is_category() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'blog' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?> <?php if ( is_single() ) { ?><?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?><?php if ( in_category( 'blog' )) { ?>class="activelink"<?php } ?><?php endwhile; ?><?php endif; ?><?php } ?>><a href="/category/blog/">Blog</a></li>
			<li <?php if ( is_page('13') ) { ?>class="activelink"<?php } ?>><a href="/contact/" rel="nofollow">Contact</a></li>
			<?php if(Dap_Session::isLoggedIn()) { ?>
			<li><a href="/dap/logout.php">LOGOUT</a></li>
			<?php } else { ?>
			<li <?php if ( is_page('207') ) { ?>class="activelink"<?php } ?>><a href="/login/" rel="nofollow">LOGIN</a></li>
			<?php } ?>
            <?php /*?><li class="end <?php if ( is_page('175') ) { ?>activelink<?php } ?>"><a href="/affiliates/">AFFILIATES</a></li><?php */?>
        </ul>
	
	</div>
	
	<div id="clear"></div>

</div>
<div class="landing_wrap">
			<h1 class="bigheading">ultimate  affiliate themes collection</h1>
			<div class="squirly_offer1">
				<div class="title">Special Christmas offer for ReadyThemes users! </div>
				<div class="offer">8 WordPress Themes for <span>$19</span></div>
				<div class="use">Use On Websites You Own<span></span>	Use On Unlimited Sites<span></span>  Non Transferable</div>
			</div><!--/squirly_offer-->

			<h2 class="bigheadingred">main features</h2>

			<div class="main_feat left">
				<div class="text">
					<div class="title amazon"><span>Integrated with</span> AMAZON</div>
					Access products directly from the Amazon marketplace to be shown within your post or as a seperate 
					page with live pricing, updated daily (if needed).  Simply enter in your Amazon API credentials and you’ll 
					have access to thousands of products.
				</div><!--/text-->
				<div class="arr"></div>
				<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/intamazon.png" alt=""></div>
			</div><!--/main_feat-->

			<div class="main_feat right">
				<div class="text">
					<div class="title amazon"><span>Ready made for</span> affiliate marketing</div>
					How many times have you bought a review theme only to realize you have to purchase additional plugins in order to benefit from it?  Our WordPress themes are ready made for affiliate marketing.
				</div><!--/text-->
				<div class="arr"></div>
				<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/affmarket.png" alt=""></div>
			</div><!--/main_feat-->

			<div class="main_feat left">
				<div class="text">
					<div class="title amazon"><span>Ready for</span> mobile</div>
					All of our affiliate WordPress themes are compatible with mobile devices. Expertly coded in CSS to ensure a great user experience.
				</div><!--/text-->
				<div class="arr"></div>
				<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/readymobile.png" alt=""></div>
			</div><!--/main_feat-->

			<div class="small_features"></div>

		 	<h2 class="left_arr_heading">
		 		<span>PREMIUM AFFILIATE</span> WORDPRESS THEMES
		 		<div class="buy">buy for $19</div>
		 	</h2>

		 	<div class="theme left">
		 		<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/affrev.png" alt=""></div>
		 		<div class="text">
		 			<div class="title">Affiliate Review Plus</div>
		 			How many times have you bought a review theme only to realize you have to purchase additional plugins in order to benefit from it? Affiliate Review PLUS combines a clean, professionally coded theme with a powerful Amazon integration feature that allows you to pull products from the Amazon Marketplace right out of the box. All you need is a FREE Amazon affiliate account and you are on your way!
		 		</div><!--/text-->
		 	</div><!--/theme-->

		 	<div class="theme right">
		 		<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/simplereviews.png" alt=""></div>
		 		<div class="text">
		 			<div class="title">Simple Reviews</div>
		 			If you are looking to earn money from affiliate programs, there is no better way than to build a product review site. An organized review site makes it easy to earn affiliate commissions since most of your visitors will be looking to buy. They are simply looking to ensure that they are making the best buying decision. Simple Reviews allows you to build an authority site that search engines will love! 
		 		</div><!--/text-->
		 	</div><!--/theme-->

		 	<div class="theme left">
		 		<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/simplesense.png" alt=""></div>
		 		<div class="text">
		 			<div class="title">Simple Sense</div>
		 			Simple Sense is built for Adsense and is ready made for creating money making sites using this lucrative business model. It’s easy to ad your ads. Simply use the included widgets to effortlessly show your ads in any or all of the effective ad positions.
		 		</div><!--/text-->
		 	</div><!--/theme-->

		 	<div class="theme right">
		 		<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/creativemag.png" alt=""></div>
		 		<div class="text">
		 			<div class="title">Creative Mag</div>
		 			CreativeMag is a colorful WordPress Theme made for people who want to add some color to their blog. Along with the elegant design the theme is easily customizable with numerous theme options, for example you will be able to easily edit logo, menus and social profiles links.
		 		</div><!--/text-->
		 	</div><!--/theme-->
<form name="PaymentForm" method="post" id="submitsus" action="http://www.readythemes.com/dap/paypalCoupon.php">
                                    <input type="hidden" name="cmd" value="_xclick"/>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <!--<input type="hidden" name="coupon_code" value="allthemes">-->
                                      <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><a target="_blank" class="bigbuynow" href="#" onclick="document.forms['submitsus'].submit();return false;">
		 		Buy Now 8 WordPress Themes for just $19
		 	</a><!--/bigbuynow--></div>
                                </form>
		 	

		 	<h2 class="bigarrheading">More WordPress Themes</h2>

		 	<div class="morethemes">
		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rw_rr.png" alt=""></div>
		 			<div class="details">
		 				<h2>Ready Review</h2>
		 				- Amazon Integration<br />
						- Star Ratings<br />
						- Optional Featured Slider
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_art.png" alt=""></div>
		 			<div class="details">
		 				<h2>Affiliate Review Themes </h2>
		 				- Amazon Integration<br />
						- Star Ratings<br />
						- Top Products
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_cm.png" alt=""></div>
		 			<div class="details">
		 				<h2>Creative Mag</h2>
		 				- Custom author widget<br />
						- Awesome design<br />
						- Integrated banners
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_ss2.png" alt=""></div>
		 			<div class="details">
		 				<h2>Simple Reviews</h2>
		 				- Amazon Integration<br />
						- Automatic Product Slider<br />
						- Top Products
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_ss.png" alt=""></div>
		 			<div class="details">
		 				<h2>Simple Sense</h2>
		 				- 12 Effective Ad Positions<br />
						- Per Post Ad Options<br />
						- Built For Google Adsense
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_sc.png" alt=""></div>
		 			<div class="details">
		 				<h2>Simply Clean</h2>
		 				- Amazon Integration<br />
						- Optional Featured Slider<br />
						- Custom Menus
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_arp.png" alt=""></div>
		 			<div class="details">
		 				<h2>Affiliate Review Plus</h2>
		 				- Amazon Integration<br />
						- Optional Featured Slider<br />
						- Top Products
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div class="item">
		 			<div class="img"><img src="<?php bloginfo('template_directory'); ?>/images/rr_st.png" alt=""></div>
		 			<div class="details">
		 				<h2>Sniper Theme</h2>
		 				- 20 Built-In Personas<br />
						- Custom Options<br />
						- Custom Menus
		 			</div><!--/details-->
		 		</div><!--/item-->

		 		<div style="clear:both;"></div>
<form name="PaymentForm" method="post" id="submitsus1" action="http://www.readythemes.com/dap/paypalCoupon.php">
                                    <input type="hidden" name="cmd" value="_xclick"/>
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <!--<input type="hidden" name="coupon_code" value="allthemes">-->
                                      <input type="hidden" name="redirect" value="http://www.readythemes.com/thank-you/"/>
                                    <input type="hidden" name="item_name" value="Ready Themes All Access" />
                                    <div><a target="_blank" class="buynowsmall" href="#" onclick="document.forms['submitsus1'].submit();return false;">
		 		Buy Now for $19
		 	</a><!--/bigbuynow--></div>
                                </form>
		 	

		 		<div class="moneyback">
		 			<b>30 days</b><br />
		 			<span>money back guarantee</span><br />
		 			if you are not satisfied with our products
		 		</div><!--/moneyback-->
		 	</div><!--/morethemes-->
		 		<div style="clear:both;"></div>

		 	<div class="badges"></div>

		 	<div class="testimonial">
		 		<div class="title">What Customer Says:</div>
		 		<p>
		 			Isn’t’ my website beautiful. I received many compliments from my friends and family mentioning that my website is so beautiful. This is due to the contribution made by Ready Themes. The theme for my website was sponsored by them for free. Before I approached Ready Themes, I have installed many free WP themes and to my disappointment the author of those themes supports only paid version. I was in a situation of giving up and that is when I came across ready theme website. To my shocking they have live chat. I chat with them immediately and told them my intention of this website. And to my shocking again the representative said she will give me paid version theme as free of charge as long if I can feedback to them of any issue.<br /><br />

					Wow, I couldn’t believe  myself at that time  until they gave me the theme file to be installed. I have no problem with their theme till now. It is very self-explanatory theme. Frankly speaking, talking about the feedback that I suppose to give them was “NONE”. The only feedback I gave them so far was the theme is really awesome. <br /><br />

					And another thing that I really need to say is their customer service is “thumbs up”.  Any email that I sent to them for any inquiry they reply within 24 hrs. As  a return for their kindness I am taking this opportunity to thank and dedicate this credit to them.
		 		</p>
		 		<div class="client">JN Product Review</div>
		 	</div><!--/testimonial-->
		</div><!--/landing_wrap-->

<?php get_footer(); ?>