<?php /*
Template Name: Simple Sense Tutorial
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

		<h1 class="center">Simple Sense WordPress Theme</h1>
		
		<div class="borderTop">	
	
			<div class="span-12 last">
				<p class="prepend-top append-0">Thank you for purchasing Simple Sense!</p>
			</div>
		</div><!-- end div .borderTop -->
		
		<hr>
		
		<h2 id="top" class="alt">Table of Contents</h2>
		<ol class="alpha">
			<li><a href="#1">Basic Installation</a></li>
			<li><a href="#2">Options Panel</a></li>
			<li><a href="#3">General Settings</a></li>
			<li><a href="#4">Setting Up Header</a></li>
			<li><a href="#5">Setting Up Home Page</a></li>
			<li><a href="#6">Setting Up Posts</a></li>
			<li><a href="#8">Setting Up Footer</a></li>
            <li><a href="#9">Colorization</a></li>
			<li><a href="#10">Creating the Navigation Menu</a></li>
			<li><a href="#11">Creating Posts</a></li>
			<li><a href="#12">Creating Sitemap</a></li>
		</ol>
        
		<hr>
        
		<h3 id="1"><strong>Basic Installation </strong> - <a href="#top">top</a></h3>
		<div class="section">
			<div class="leftbox">
				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/upload.gif">
			</div>
			
			<div class="rightbox">
				<p>
				After downloading the theme, you will have a file called AffiliateTheme.zip.  
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
        	<p>The general settings are pretty simple to configure and should be self-explanitory.</p>
            <p><strong>1. Site Layout</strong> - You can choose you want a 2 or 3 column site with the sidebars either on the right or left.  You can simply click on the image of the configuration you choose and then click on the Save button.</p>
            <p><strong>2. Background Color</strong> - For the background color of the site, you can simply select the color you want.  The default color is #cccccc and has been shown to be very effective since it is not destracting and is very pleasing to the eye.</p>
            <p><strong>3. Background Image</strong> - Ad a repeating background image to make your site stand out even more.</p>
            <p><strong>4. Home Meta Title</strong> - Ad a custom SEO Title to your home page for better results.</p>
			<p><strong>5. Home Meta Description</strong> - Ad an SEO description to your home page.</p>
			<p><strong>6. Home Meta Keywords</strong> - Ad keywords to your home page.</p>
            <p><strong>7. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>
        	<hr>
            
        <h3 id="4"><strong>Setting Up Header </strong> - <a href="#top">top</a></h3>
          <p><strong>1. Logo</strong> - There are a few options for displaying your logo or title of your site.  If none of the options are chosen, the title of your site will show up here.
          	<ul>
            	<li><strong>Upload Logo</strong> - Use the browse button to select an image from your hard drive to upload.</li>
                <li><strong>Logo Text</strong> - Enter custom text here to be displayed as your logo.</li>
            </ul>
          </p>
          <p><strong>2. Header Background Color</strong> - You can choose a solid color here for the top part of your website above the navigation bar. </p>
          <p><strong>3. Header Background Image</strong> - An image can also be used for this.  If you want to use a customized full size image, be sure to size it at 1000px wide by 117px high.</p>
          <p><strong>4. Header Background Image Repeat</strong> - If you are using a smaller background image that needs to repeat accross the entire section, these radio buttons will allow you to set it up according to your needs.</p>
          <p><strong>5. Navigatio Bar Background Color</strong> - Select a color for your navigation bar or leave blank for the default color.</p>
          <hr>
            
        <h3 id="5"><strong>Setting Up Home Page </strong> - <a href="#top">top</a></h3>
			<p>
				The following options will allow you to customize your home page.
			</p>
        	<p><strong>1. Home Page Heading</strong> - This is an H1 tag that should be your main headline.  If your site is targeting the keyword "3D TV Reviews", you would want this heading to contain that keyword.</p>
            <p><strong>2. Home Page Intro</strong> - This should be a few paragraphs summarizing your site and what you intend to help people with.  This should not be stuffed with keywords but should be helpful to the reader and make them want to stay on your site to learn more.</p>
            <p><strong>3. Home Page Image</strong> - This will be the first image on the site and should be a clear image that shows people what the site is all about.  The diminsions for this image is 300px by 300px.  It will be automatically resized to this dimension when uploaded.</p>
			<p><strong>4. Home Image Alt Tag</strong> - This alt tag is for people who do not display images and also for search engine optimization.  Be sure and throw your keywords into it.</p>
            <p><strong>5. Show Posts On Home Page?</strong> - If you want to show posts after the entry post, you can make sure this checkbox is checked.</p>
            <p><strong>6. Category For Home Posts</strong> - Select the category for your home page posts.</p>
            <p><strong>7. Show Excerpt?</strong> - If you check this box, only the short excerpt will be shown for each post.  Otherwise, the entire post will be shown.</p>
            <p><strong>8. Number Of Posts On Home Page</strong> - Select how many posts you want on the home page after the entry post.</p>
        	<hr>
			
		<h3 id="6"><strong>Setting up Posts </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Show Similar Posts?</strong> - Check this box to show similar posts at the bottom of the post page.
            <ul>
            	<li><strong>How Many Posts</strong> - Select the number of posts you wish to show.</li>
                <li><strong>Heading for similar posts</strong> - Enter a custom heading or leave blank for the default "Similar Posts."</li>
            </ul>
            </p>
        	<p><strong>2. Show Meta Data on Category Page, Search Results Page, Tags Page & Home Page </strong>- Check this box to show the meta data on the pages with multiple posts.</p>
			<p><strong>3. Show Meta Data on Single Post Page?</strong> - Check this box to show the meta data on a sinlge post.</p>
			<hr>
        
        <h3 id="8"><strong>Footer </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Footer Background Color</strong> - Choose a background color for your footer.</p>
        	<p><strong>2. Footer Left Text </strong>- Choose the text you want to show up on the left side of the footer.  If you leave this blank, it will display a link to Ready Themes.  Although this is not required, it is much appreciated since the theme is given out for free :)</p>
			<p><strong>3. Footer Right Text</strong> - Choose the text you want to show up on the right side of the footer.</p>
        	<hr>
            
        <h3 id="9"><strong>Colorization </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Hyperlink Color</strong> - Choose a custom color for hyperlinks throughout your site.</p>
        	<p><strong>2. Heading Color (H1) </strong>- Choose a custom color for the headings throughout your site.</p>
        	<hr>
            
        <h3 id="10"><strong>Creating the Navigation Menu </strong> - <a href="#top">top</a></h3>
        	<p>This theme supports one custom navigation menu.  You will simply need to activate it within the Wordpress admin.</p>
			<p>Go to Appearance &raquo; Menus</p>
			<p>Once here, you will need to create a menu by naming it and adding links to it.  Once it is been created, you can assign it to the theme at the top left where it says "Theme Locations."
        	<p><img src="http://www.readythemes.com/wp-content/uploads/2012/05/menu.gif"></p>
			<hr>
        
        <h3 id="11"><strong>Creating Posts </strong> - <a href="#top">top</a></h3>
			<p>When you create a post using Simple Sense, you'll be presented with the option to hide ads.  This comes in handy if you just want to pubilsh a certain post that doesn't contain any ads.</p>
			<p>Under Ad Settings, there are a few options.
				<ul>
					<li><strong>Hide All Ads</strong> - This will hide all the ads within the post area.</li>
					<li><strong>Hide Ads 2,3,5,6,7,8</strong> - You can choose specific ads you want to hide for each specific post.  Click on the 2 column or 3 column ad map in this section to see exactly where each ad is located.</li>
				</ul>
			</p>
			<p>
			<img src="http://www.readythemes.com/wp-content/uploads/2012/07/post.gif">
			</p>
        <hr>
		
		<h3 id="12"><strong>Creating Sitemap </strong> - <a href="#top">top</a></h3>
		<p>To create a basic sitemap for your site, creat a page named "Sitemap" and then assign it the Sitemap template.  That's it.  Your sitemap will be created and you can add a link to it in the navigation bar or in the footer.</p>  
        <hr>
		
		<p>
		Once again, thank you for purchasing this theme. 
		I welcome your suggestions for any improvements that you may have.
		I aim to please so if you have any way to make the theme perform better, let me know and I'll see what I can do to include the update on the next release.
		</p>
		
		<p class="append-bottom alt large"><strong>All the best,</strong></p>
		<p>Dan Collins</p>
		<p><a href="#top">Go To Table of Contents</a></p>
		
		<hr class="space">
		
		<div id="clear"></div>
		
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>