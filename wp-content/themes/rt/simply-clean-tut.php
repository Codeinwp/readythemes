<?php /*
Template Name: Simply Clean Tutorial
*/ ?>
<style type="text/css" media="screen">
body {font-family:Arial, Helvetica, sans-serif; font-size:.9em;}
p, table, hr, .box { margin-bottom:25px; line-height:22px; }
.box p { margin-bottom:10px; }
.container {width:960px; margin:0 auto;}
.leftbox {float:left; width:480px;}
.rightbox {float:right; width:480px;}
.clear {clear:both;}
.section {margin-bottom:20px;}
ul {line-height:22px;}
</style>
<?php get_header(); ?>

	<div id="singlefeatured">
	
	<div class="leftheading">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<p><?php the_excerpt(); ?></p>
	
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
	
		<h1 class="center">Simply Clean WordPress Theme</h1>
		
		<div class="borderTop">	
	
			<div class="span-12 last">
				<p class="prepend-top append-0">Thank you for purchasing Simply Clean. If you need support related to installing or using this theme, please open a ticket at <a href="http://www.readythemes.com/support/">http://www.readythemes.com/support/</a>. </p>
			</div>
		</div><!-- end div .borderTop -->
		
		<hr>
		
		<h2>Table of Contents</h2>
		<ol>
			<li><a href="#1">Basic Installation</a></li>
			<li><a href="#2">Options Panel</a></li>
			<li><a href="#3">General Settings</a></li>
			<li><a href="#4">Setting Up Header</a></li>
			<li><a href="#5">Setting Up Home Page</a></li>
			<li><a href="#6">Sidebar</a></li>
			<li><a href="#7">Posts</a></li>
			<li><a href="#8">Footer</a></li>
			<li><a href="#9">Colorization</a></li>
			<li><a href="#10">Contact Form</a></li>
			<li><a href="#11">Creating the Navigation Menu</a></li>
            <li><a href="#12">Creating Posts</a></li>
            <li><a href="#13">Creating Sitemap</a></li>
		</ol>
        
		<hr>
        
		<h3 id="1"><strong>Basic Installation </strong> - <a href="#top">top</a></h3>
		<div class="section">
			<div class="leftbox">
				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/upload.gif">
			</div>
			
			<div class="rightbox">
				<p>
				After downloading the theme, you will have a file called SimplyClean.zip.  
				This can simply be uploaded to Wordpress by going to your admin panel and uploading.
				</p>
				<p>
				For uploading themes go to <strong>Appearance &raquo; Themes &raquo; Install Themes &raquo; Upload</strong>.
				</p>
				<p>
				It should look like the image to the left.  Simply browse to your zip file and click upload.
				</p>
			</div>
			<div class="clear"></div>
		</div>       
		<hr>
			
		<h3 id="2"><strong>Options Panel </strong> - <a href="#top">top</a></h3>
		<div class="section">
			<div class="leftbox">
				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/options.gif">
			</div>
			
			<div class="rightbox">
				<p>
				In order to get to the theme options, click on <strong>Appearance &raquo; Theme Options</strong>.
				</p>
				<p>
				This panel will allow you to customize your theme in order to suit your needs.
				</p>
			</div>
			<div class="clear"></div>
		</div>
		<hr>
        
        <h3 id="3"><strong>General Settings </strong> - <a href="#top">top</a></h3>
            <p><strong>1. Background Color</strong> - Select a color from the color picker to display a custom color for your site's background</p>
            <p><strong>2. Background Image</strong> - You may also upload your own background image that will be repeated throughout the entire background.</p>
            <p><strong>3. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>
        	<hr>
            
        <h3 id="4"><strong>Setting Up Header </strong> - <a href="#top">top</a></h3>
          <p><strong>1. Logo</strong> - There are a few options for displaying your logo or title of your site.  If none of the options are chosen, the title of your site will show up here.
          	<ul>
            	<li><strong>Upload Logo</strong> - Use the browse button to select an image from your hard drive to upload.</li>
                <li><strong>Logo Text</strong> - Enter custom text here to be displayed as your logo.</li>
            </ul>
          </p>
          <p><strong>2. Top Right Banner</strong> - This is an ad space designed for a 468 x 60 ad.  Simply enter the ad code into the box.</p>
          <hr>
            
        <h3 id="5"><strong>Setting Up Home Page </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Show Featured Slider?</strong> - If this checkbox is enabled, the featured automatic slider will show.
            	<ul>
                	<li><strong>Tag For Featured Slider</strong> -  If you would like to include only posts with specific tags, enter the tags here.</li>
                    <li><strong>Category For Featured Slider</strong> - If you would rather use categories, select the category you wish to use.</li>
                    <li><strong>Number of Posts in Featured Slider</strong> - Select the number of posts you want to show in the slider.</li>
                </ul>
            </p>
            <p><strong>2. Show Content Block 1</strong> - This content block is designed to display the posts from a single category.  Most likely, it will be your most popular category or the one that you want to put in front of your visitors the most.
            	<ul>
                	<li><strong>Category For Content Block 1</strong> -  Select the category you wish to use in this content block.</li>
                    <li><strong>Title for Content Block 1</strong> - Enter a title for the section here.  If no title is entered, it will use the name of the category.</li>
                </ul>
            </p>
            <p><strong>3. Show Content Block 2</strong> - This content block is designed to display the posts from a two categories and will be shown in 2 columns.  
            	<ul>
                	<li><strong>Category For Content Block 2 Left Column</strong> - Select the category that you would like to pull posts from for the left column.</li>
                    <li><strong>Category For Content Block 2 Right Column</strong> - Select the category that you would like to pull posts from for the right column.</li>
                    <li><strong>Title for Content Block 2 - Left</strong> - Enter a title for the left column.  If none is entered, it will use the category name.</li>
                    <li><strong>Title for Content Block 2 - Right</strong> - Enter a title for the right column.  If none is entered, it will use the category name.</li>
                </ul>
            </p>
            <p><strong>4. Show Standard Posts</strong> - Standard posts will be shown one after the other with the title and excerpt.
            	<ul>
                	<li><strong>Category For Standard Posts</strong> - Select the category for this section.</li>
                    <li><strong>How Many Posts?</strong> - Select the number of posts you'd like to show.</li>
                    <li><strong>NTitle For Standard Posts</strong> - Enter a title for the section.  If none is entered, it will use the category name.</li>
                </ul>
            </p>
        	<hr>
			
		<h3 id="6"><strong>Show 125 x 125 Ads In Sidebar</strong> - <a href="#top">top</a></h3>
        	<p>Enable this if you want to show 125 x 125 ads in the sidebar.</p>
			<p><strong>1. Title For 125 x 125 Ads</strong> - Add a title if you want one or leave it blank.</p>
            <p><strong>2. 125 x 125 Ad Space 1 - 4</strong> - Enter your ad code in the provided text boxes for each ad position.</p>
			<hr>
        
        <h3 id="7"><strong>Posts </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Show Similar Posts? </strong>- You can show similar posts on the post page.  These similar posts will be based on categories.</p>
			<p><strong>2. How Many Posts?</strong> - Select the number you wish to show.</p>
			<p><strong>3. Heading for Similar Posts</strong> - Enter a heading.  If no heading is entered, it will say "Similar Posts."</p>
			<hr>
        
        <h3 id="8"><strong>Footer </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Footer Left Text </strong>- Choose the text you want to show up on the left side of the footer. </p>
			<p><strong>2. Footer Right Text</strong> - Choose the text you want to show up on the right side of the footer.</p>
        	<hr>
            
        <h3 id="9"><strong>Colorization </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Hyperlink color </strong>- This setting will override all hyperlinks throughout the site.</p>
			<p><strong>2. Post Titles</strong> - This setting will override post title colors on the home page.</p>
            <p><strong>3. Post Titles (single page)</strong> - This setting will override the post title color on the single post page.</p>
            <p><strong>4. Post Titles (category, search, tag, etc.)</strong> - This setting will override post title colors on the category, search, tag, etc.</p>
            <p><strong>5. Page Titles</strong> - This setting will override the colors of the headings on pages.</p>
        	<p><strong>6. Sidebar Heading Background Color</strong> - Color of the background for the headings in the sidebar.</p>
            <p><strong>7. Sidebar Heading Text</strong> - Text color for the sidebar headings.</p>
            <p><strong>8. Top Navigation Links</strong> - Color of the links in the top navigation bar.</p>
            <hr>
            
        <h3 id="11"><strong>Creating the Navigation Menu </strong> - <a href="#top">top</a></h3>
        	<p>This theme supports one custom navigation menu.  You will simply need to activate it within the Wordpress admin.</p>
			<p>Go to Appearance &raquo; Menus</p>
			<p>Once here, you will need to create a menu by naming it and adding links to it.  Once it is been created, you can assign it to the theme at the top left where it says "Theme Locations."
        	<p><img src="http://www.readythemes.com/wp-content/uploads/2012/05/menu.gif"></p>
			<hr>
        
        <h3 id="12"><strong>Creating Posts </strong> - <a href="#top">top</a></h3>
		<div class="section">
			<div class="leftbox">
				<img src="http://www.readythemes.com/wp-content/uploads/2012/08/post-settings-simplyclean.gif">
			</div>
			
			<div class="rightbox">
			<p>All posts are created the same way with this theme but there are different options that allow you to customize each post.</p>
			<p>You can upload a featured image for each post by using the Featured Image box.  Simply click on "Set featured image" link and choose or upload your image.</p>
			<p>Under Post Settings, there are a few options.
				<ul>
					<li><strong>Featured Image</strong> - If you have uploaded an image that is smaller than 592 pixels wide, you can select small image here and it will show a smaller, left aligned image.  Otherwise, it will display the featured image as a full size image.</li>
					<li><strong>Affiliate URL</strong> - If this is an affiliate product, you can enter the affiliate url here.</li>
					<li><strong>Button Text</strong> - Enter what you want the buy button to say at the end of the post.</li>
                    <li><strong>Star Rating</strong> - You can assign a star rating and it will be displayed in the post.</li>
				</ul>
			</p>
			</div>
			<div class="clear"></div>
		</div>  
        <hr>
		
		<h3 id="13"><strong>Creating Sitemap </strong> - <a href="#top">top</a></h3>
		<p>To create a basic sitemap for your site, create a page named "Sitemap" and then assign it the Site Map template.  That's it.  Your sitemap will be created and you can add a link to it in the navigation bar or in the footer.</p>  
        <hr>
		
		<p>
		Once again, thank you for purchasing this theme. 
		I welcome your suggestions for any improvements that you may have.
		Any suggestions made will be considered for future updates.
		</p>
		
		<p class="append-bottom alt large"><strong>All the best,</strong></p>
		<p>Dan Collins</p>
		<p><a href="#top">Go To Table of Contents</a></p>
		
		<hr class="space">
		
		<div id="clear"></div>
		
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>