<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2c88b8ab12d80cd45cde7c55cd47ff4c60c8d3c0c9"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/functions_2014-04-24-13.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
$v = strpos( $_SESSION["origURL"],'warriorforum'); if ($v!==false) { $t='We have a special offer for WarriorForum members <del>67</del> <strong style="color:red;">$55</strong>';}
	else $t='Download Our Entire Theme and Plugin Collection For Only <strong style="color:red;">$55</strong>';
	//	else $t='<strong>Christmas Deal!</strong> Download All Our Themes For <del>55</del> <strong style="color:red;">$19</strong>';
define('buyall', $t);
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
function cwp_scripts() {	
	wp_enqueue_script( 'jquery');	
	wp_enqueue_script( 'cwp_tabs', get_template_directory_uri() . '/js/tabs.js', array("jquery"), '20120206', true );
	wp_enqueue_script( 'cwp_customscript', get_template_directory_uri() . '/js/customscript.js', array("jquery",'cwp_tabs'), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'cwp_scripts' );
?>