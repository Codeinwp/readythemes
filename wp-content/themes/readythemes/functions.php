<?php /////////////// ADD TO HEAD TAG ///////////////
function mytheme_admin_head() { ?>
<style>
.headingoption {padding:8px; background-color:#666666; margin-top:5px; width:700px;}
.headingoption a {color:#ffffff; font-weight:bold; text-decoration:none;}
.headingdetails {display:none; padding:20px 20px; width:674px; background-color:#fafafa; border:1px solid #DFDFDF; border-top:none;}
.spacer {height:25px;}
.optiondesc {font-size:11px; font-style:italic; margin-bottom:10px;}
.clear {clear:both;}
.updated, .error {width:700px;}
.detailleft {float:left; width:500px;}
.detailright {float:right; width:128px;}
</style>

<script type="text/javascript">
$(document).ready(function()
{
  $(".headingoption").click(function()
  {
	$(this).next(".headingdetails").slideToggle(500);
  });
});
</script>
<?php } ?>
<?php 
/////////////// ADD CUSTOM MENU SUPPORT ///////////////
add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
register_nav_menu('custom_menu', __('Main'));
}

/////////////// ADD FEATURED THUMBNAIL SUPPORT ///////////////	
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

add_image_size('med-thumb', 150, 150, true );	
add_image_size('small-thumb', 100, 100, true );
add_image_size('single-thumb', 300, false );
add_image_size('single-thumb', 200, false );

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

/////////////// REGISTER SIDEBAR ///////////////
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
?>
<?php /////////////// META BOXES ///////////////
/*
Plugin Name: Meta Box Example
Plugin URI: http://wp.tutsplus.com/
Description: Adds an example meta box to wordpress.
Version: None
Author: Christopher Davis
Author URI: http://wp.tutsplus.com/
License: Public Domain
*/

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	add_meta_box( 'my-meta-box-id', 'Affiliate Settings', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
	$values = get_post_custom( $post->ID );
	$url = isset( $values['affiliate_url'] ) ? esc_attr( $values['affiliate_url'][0] ) : '';
	$rating = isset( $values['affiliate_rating'] ) ? esc_attr( $values['affiliate_rating'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<p>
		<label for="affiliate_url"><strong>Affiliate URL</strong></label><br>
		<textarea type="text" name="affiliate_url" id="affiliate_url" cols="125"><?php echo $url; ?></textarea>
	</p>
	
	<p>
		<label for="affiliate_rating"><strong>Star Rating</strong></label><br>
		<select name="affiliate_rating" id="affiliate_rating" style="width:200px;">
        	<option value="" <?php selected( $rating, '' ); ?>> -- Select -- </option>
			<option value="1" <?php selected( $rating, '1' ); ?>>1</option>
            <option value="1.5" <?php selected( $rating, '1.5' ); ?>>1.5</option>
			<option value="2" <?php selected( $rating, '2' ); ?>>2</option>
            <option value="2.5" <?php selected( $rating, '2.5' ); ?>>2.5</option>
            <option value="3" <?php selected( $rating, '3' ); ?>>3</option>
            <option value="3" <?php selected( $rating, '3.5' ); ?>>3.5</option>
            <option value="4" <?php selected( $rating, '4' ); ?>>4</option>
            <option value="4.5" <?php selected( $rating, '4.5' ); ?>>4.5</option>
            <option value="5" <?php selected( $rating, '5' ); ?>>5</option>
		</select>
	</p>
	<?php	
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	// Probably a good idea to make sure your data is set
	if( isset( $_POST['affiliate_url'] ) )
		update_post_meta( $post_id, 'affiliate_url', wp_kses( $_POST['affiliate_url'], $allowed ) );
		
	if( isset( $_POST['affiliate_rating'] ) )
		update_post_meta( $post_id, 'affiliate_rating', esc_attr( $_POST['affiliate_rating'] ) );
		
	// This is purely my personal preference for saving checkboxes
	$chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'my_meta_box_check', $chk );
}
?>
<?php /////////////// CUSTOM ADMIN PANEL OPTIONS ///////////////
$themename = "Ready Themes";
$shortname = "rt";

$yesno = array("Yes","No");
$theorder = array("ASC","DESC");
$theordername = array("title","date","ID","rand","comment_count");
$numbers = array(" ","1","2","3","4","5","6","7","8","9","10");
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->slug;
}
array_unshift($wp_cats, "Choose a category");

$options = array (

	//////////////// GENERAL SECTION (1) ////////////////
	array(    "name" => "General Settings",
			"type" => "title"),
	
	array(    "type" => "open"),
			
	// Logo Iage
	array(  "name" => "Logo Image",
			"desc" => "To use your own logo image, enter the URL here.",
			"id" => $shortname."_logoimage",
			"type" => "text",
			"groupid" => "1"),
			
	// Top Left Banner
	array(  "name" => "Top Left Text",
			"desc" => "Insert text here",
			"id" => $shortname."_textright",
			"type" => "textarea",
			"groupid" => "1"),
			
	// Google Analytics	
	array(	"name" => "Google Analytics",
			"desc" => "Please paste your Google Analytics (or other) tracking code here.",
			"id" => $shortname."_google_analytics",
			"std" => "",
			"type" => "textarea",
			"groupid" => "1"),
			
	//////////////// HOME PAGE SECTION (1) ////////////////
			
	// Home Page Heading
	array(	"name" => "Home Page Heading",
			"desc" => "This will be the first H1 heading on the home page.",
			"id" => $shortname."_homeheading",
			"std" => "",
			"type" => "textarea",
			"groupid" => "1"),
			
	// Home Page Intro
	array(	"name" => "Home Page Intro",
			"desc" => "This is the intro text underneath the H1 on the home page.",
			"id" => $shortname."_homeintro",
			"type" => "textarea",
			"groupid" => "1"),
	
	// Home Page Image
	array(	"name" => "Home Page Image URL",
			"desc" => "This is the intro image.",
			"id" => $shortname."_homeimage",
			"type" => "text",
			"groupid" => "1"),
			
	// Home Page Image URL
	array(	"name" => "Home Image Affiliate URL",
			"desc" => "Link that the home image is linked to.",
			"id" => $shortname."_homeimagelink",
			"type" => "text",
			"groupid" => "1"),
			
	// Home Page Image Alt Tag
	array(	"name" => "Home Image Alt Tag",
			"desc" => "alt tag for the home page image",
			"id" => $shortname."_homeimagealt",
			"type" => "text",
			"groupid" => "1"),
			
	// Home Page Loop Category
	array(	"name" => "Category for home posts",
			"desc" => "Enter cat ID for categories to include or exclude on home page posts.  Leave blank to include all.",
			"id" => $shortname."_homeposts",
			"type" => "text",
			"groupid" => "1"),
	
	// Home Page Excerpt
	array(	"name" => "Show Exerpt?",
			"desc" => "Show the excerpt on home page. If NO is selected, the full post will be displayed.",
			"id" => $shortname."_excerpt",
			"type" => "select",
			"options" => $yesno,
			"groupid" => "1"),
			
	// Home Page Number of Posts
	array(	"name" => "Number of Posts on Home Page?",
			"desc" => "How many posts after the main intro do you want to show on the home page?",
			"id" => $shortname."_homepostnumber",
			"type" => "text",
			"groupid" => "1"),
			
	//////////////// FOOTER SECTION (4) ////////////////
			
	// Footer Left	
	array(	"name" => "Footer Left Text",
			"desc" => "enter the text for left side footer.  copyright, keywords, etc.",
			"id" => $shortname."_footerleft",
			"std" => "",
			"type" => "textarea",
			"groupid" => "1"),
			
	// Footer Right	
	array(	"name" => "Footer Right Text",
			"desc" => "enter the text for right side footer.  copyright, keywords, etc.",
			"id" => $shortname."_footerright",
			"std" => "",
			"type" => "textarea",
			"groupid" => "1"),
			
	array(    "type" => "close")
	
	);
	
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_menu_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<?php require_once (TEMPLATEPATH . '/custom/admin-form.php'); ?>

<?php
}
add_action('admin_menu', 'mytheme_add_admin');
add_action('admin_head', 'mytheme_admin_head'); ?>