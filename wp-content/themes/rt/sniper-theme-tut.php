<?php /*
Template Name: Sniper Theme Tutorial
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

		<h1 class="center">Sniper WordPress Theme</h1>

		<div class="borderTop">	

			<div class="span-12 last">

				<p class="prepend-top append-0">Thank you for purchasing Sniper theme! </p>
				
				<p>If you've ever read through any of the review site products such as <a href="http://gsniper2.com/?hop=dtmcollins">Google Sniper by George Brown</a>, then you'll know that personal review sites can earn a SERIOUS amount of cash each and every month.</p>
				
				<p>Sniper theme provides a great platform for you to promote a product or products for earning great affiliate commissions.</p>

			</div>

		</div><!-- end div .borderTop -->

		<h2>Table of Contents</h2>

		<ol class="alpha">

			<li><a href="#1">Basic Installation</a></li>
			<li><a href="#2">Options Panel</a></li>
			<li><a href="#3">General Settings</a></li>
			<li><a href="#5">Setting Up Header</a></li>
			<li><a href="#6">Setting Up Home Page</a></li>
			<li><a href="#7">Setting Up Posts</a></li>
			<li><a href="#8">Setting up Sidebar</a></li>
			<li><a href="#9">Footer</a></li>
			<li><a href="#15">Colorization</a></li>
			<li><a href="#10">Creating the Navigation Menu</a></li>
		</ol>

		<hr>

		<h3 id="1"><strong>Basic Installation </strong> - <a href="#top">top</a></h3>

		<div class="section">

			<div class="leftbox">

				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/upload.gif">

			</div>

			

			<div class="rightbox">

				<p>
				After downloading the theme, you will have a file called SniperTheme.zip.  

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
        	
            <p><strong>1. Background Color</strong> - Select or enter the color you wish to use for the background color of your site.  Leave it blank for the default color. </p>

            <p><strong>2. Background Image</strong> - If you would like to use a background image, upload or select it here.</p>

            <p><strong>3. Background Image Repeat</strong> - Select the repeat options for your background image here.</p>

            <p><strong>4. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>

            <p><strong>5. Custom CSS</strong> - You may change any css styles throughout the site by using this custom CSS field.  You DO NOT need to enter the <style></style> tags because these will be added automatically.  Alternatively, you can edit the style.css file for any additional styles you wish to use. </p>

		<hr>

        <h3 id="5"><strong>Header Settings </strong> - <a href="#top">top</a></h3>

          <p><strong>1. Logo</strong> - There are a few options for displaying your logo or title of your site.  If none of the options are chosen, the title of your site will show up here.

          	<ul>

            	<li><strong>Upload Logo</strong> - Use the browse button to select an image from your hard drive to upload.</li>

                <li><strong>Logo Text</strong> - Enter custom text here to be displayed as your logo.</li>

            </ul>

          </p>

		  <hr>

            

        <h3 id="6"><strong>Home Page Settings</strong> - <a href="#top">top</a></h3>
			
			<p><strong>Posts On Home Page?</strong> - If you want to show posts after the entry post, you can make sure this checkbox is checked.
				<ul>
					<li><strong>Show Excerpt?</strong> - If you check this box, only the short excerpt will be shown for each post.  Otherwise, the entire post will be shown.</li>
				</ul>
			</p>

			<hr>

			

		<h3 id="7"><strong>Post Settings</strong> - <a href="#top">top</a></h3>

        	<p><strong>1. Show Meta Data on Category Page, Search Results Page, Tags Page & Home Page </strong>- Check this box to show the meta data on the pages with multiple posts.</p>

			<p><strong>2. Show Meta Data on Single Post Page?</strong> - Check this box to show the meta data on a sinlge post.</p>
			
			<p><strong>3. Show Featured Images?</strong> - You can choose to show featured images by checking this box.  Images uploaded using the "set featured image" option will be used for this.</p>

			<hr>

        

        <h3 id="8"><strong>Sidebar Settings </strong> - <a href="#top">top</a></h3>

        	<p><strong>1. Show About Image? </strong>- If you are using the built-in About widget, you can choose to show an about image by checking this box.</p>

			<p><strong>2. About Image</strong> - Simply click on an image that you would like to use for your about image.</p>

			<p><strong>3. Upload About Image</strong> - You can upload your own image if you would like.  All images uploaded here will be resized to fit the about widget dimensions (95px x 95px).</p>

			<hr>

        

        <h3 id="9"><strong>Footer Settings </strong> - <a href="#top">top</a></h3>

        	<p><strong>1. Footer Text </strong>- Enter the text you would like to use for the footer.  If none is entered, your site name and copyright statement will be displayed.</p>

        	<hr>
			
		<h3 id="15"><strong>Colorization </strong> - <a href="#top">top</a></h3>

		<p><strong>1. Heading Background Color</strong> - This heading is located in the sidebar and is the background color for the heading of each widget.</p>
		
		<p><strong>2. Heading Bottom Color</strong> - This is the bottom 5px line of the sidebar widget title.</p>
		
		<p><strong>3. Logo Color</strong> - Color of the text of the logo.</p>
		
		<p><strong>4. Nav Link Color</strong> - Color of the navigation links.</p>
		
		<p><strong>5. Nav Hover Color</strong> - Color of the hover status of the navigation links.</p>
		
		<p><strong>6. Nav Top Line Color</strong> - Color of the 5px line located in the header of the site, just above the navigation area and just below the logo area. </p>
		
		<p><strong>7. Body Bottom Color</strong> - Color of the 5px line on the bottom of the main body area.</p>
		
		<p><strong>8. Footer Text Color</strong> - Color of the text in the footer.</p>
		
		<p><strong>9. Search Button Color</strong> - Color of the search button.</p>
		
		<p><strong>10. Search Button Text Color</strong> - Color of the text for the search button.</p>
		
		<p><strong>11. Comment Button Color</strong> - Color of the comment button.</p>
		
		<p><strong>12. Comment Button Text</strong> - Color of the text for the comment button.</p>

        <hr>

            

        <h3 id="10"><strong>Creating the Navigation Menu </strong> - <a href="#top">top</a></h3>

        	<p>This theme supports one custom navigation menu.  You will simply need to activate it within the Wordpress admin.</p>

			<p>Go to Appearance &raquo; Menus</p>

			<p>Once here, you will need to create a menu by naming it and adding links to it.  Once it is been created, you can assign it to the theme at the top left where it says "Theme Locations."

        	<p><img src="http://www.readythemes.com/wp-content/uploads/2012/05/menu.gif"></p>

			<p align="center">

				<iframe width="640" height="390" src="http://www.youtube.com/embed/yXGUYp0-mKY" frameborder="0" allowfullscreen></iframe>

			</p>	

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