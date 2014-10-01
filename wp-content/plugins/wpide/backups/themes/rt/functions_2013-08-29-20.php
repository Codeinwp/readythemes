<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "5bd5295a2d4d672cc65b6b764ecc36c99c960bf889"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/functions_2013-08-29-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
define('buyall', 'Download Our Entire Theme & Plugin Collection Only <strong>$67</strong>');
/////////////// ADD FEATURED THUMBNAIL SUPPORT ///////////////	
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

add_image_size('med-thumb', 270, 180, true );	
add_image_size('sidebar-thumb', 75, 75, true);
add_image_size('cat-thumb', 150, 150, true );
//add_image_size('single-thumb', 594, false );

/////////////// EXCERPT LIMIT ///////////////
function excerpt($num) {  
	$limit = $num+1;  
	$excerpt = explode(' ', get_the_excerpt(), $limit);  
		array_pop($excerpt);  
		$excerpt = implode(" ",$excerpt)."...";  
	echo $excerpt;  
}  
   
function content($num) {  
	$theContent = get_the_content();  
	$output = preg_replace('/<img[^>]+./','', $theContent);  
	$limit = $num+1;  
	$content = explode(' ', $output, $limit);  
		array_pop($content);  
		$content = implode(" ",$content)."...";  
	echo $content;  
}  
?>
<?php

if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'home',
	'before_widget' => '',
	'after_widget' => '</div>',
	'before_title' => '<div id="widgetheadingdyn">',
	'after_title' => '</div><div id="widgetdyn">',
));
register_sidebar(array('name'=>'blog',
	'before_widget' => '',
	'after_widget' => '</div>',
	'before_title' => '<div id="widgetheadingdyn">',
	'after_title' => '</div><div id="widgetdyn">',
));
register_sidebar(array('name'=>'themes',
	'before_widget' => '',
	'after_widget' => '</div>',
	'before_title' => '<div id="widgetheadingdyn">',
	'after_title' => '</div><div id="widgetdyn">',
));
	
?>