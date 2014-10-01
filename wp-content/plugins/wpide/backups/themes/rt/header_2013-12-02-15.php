<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097f10372a320c"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/header_2013-12-02-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php session_start();

if ( !isset( $_SESSION["origURL"] ) )
    $_SESSION["origURL"] ="";
    
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
<!-- start Mixpanel --><script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src=("https:"===e.location.protocol?"https:":"http:")+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==
typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");for(g=0;g<i.length;g++)f(c,i[g]);
b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
mixpanel.init("64c234fdac6cf960437cbfe87081d1f8");</script><!-- end Mixpanel -->
</head>

<body>

<!-- Wrapper -->
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
<!-- top black bar -->