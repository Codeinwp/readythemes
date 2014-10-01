<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	
	<title><?php
    if(is_home()) {
        echo bloginfo('name').' - Home';
    } elseif(is_category()) {
        echo 'Browsing the Category ';
        wp_title(' ', true, '');
    } elseif(is_archive()){
        echo 'Browsing Archives of';
        wp_title(' ', true, '');
    } elseif(is_search()) {
        echo 'Search Results for "'.$s.'"';
    } elseif(is_404()) {
        echo '404 - Page got lost!';
    } else {
        bloginfo('name'); wp_title('-', true, '');
    }
    ?></title>
    
    <!-- #CSS# -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
    <!-- wp head -->
	<?php wp_head(); ?>
    
    <?php if ( get_option('rt_google_analytics') <> "" ) { ?>
    	<?php echo stripslashes(get_option('rt_google_analytics')); ?>
    <?php } ?>

</head>

<body>

<div id="wrapper-100">
	<div id="wrapper">
    
		<!--- HEADER --->	    
        <div id="header">
        	
            <div class="logo">
            	<?php if ( get_option('rt_logoimage') <> "" ) { ?>
                    <a href="/"><img src="<?php echo get_option('rt_logoimage'); ?>" border="0" /></a>
                <?php } elseif ( get_option('rt_logotext') <> "" ) { ?>
                    <div><a href="/"><?php echo stripslashes(get_option('rt_logotext')); ?></a></div>
                <?php } else { ?>
                    <div><a href="/"><?php echo bloginfo('name'); ?></a></div>
                <?php } ?>
            </div>
            
            <div class="headerright">
            	<?php if ( get_option('rt_textright') <> "" ) { ?>
                    <?php echo stripslashes(get_option('rt_textright')); ?>
                <?php } ?>
            </div>
            
            <div class="clear"></div>
            
        </div>
    	
        <!--- NAV --->
        <div id="nav">
        	<ul>
            	<li><a href="" class="home"><img src="<?php bloginfo('template_directory'); ?>/images/home_icon.png" border="0" /></a></li>
            	<?php wp_nav_menu(array('menu' => 'custom_menu')); ?>
            </ul>
            <div class="clear"></div>
        </div>