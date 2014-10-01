<?php session_start();

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
<meta name="verifyownership" content="9d3db268a44a9912180029ddef550334" />
<meta name="verifyownership" content="83dfcae65197dced381262b58cbe0933" />
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

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32259175-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '704894032915584']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=704894032915584&amp;ev=PixelInitialized" /></noscript>
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