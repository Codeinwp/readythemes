<?php /*

Template Name: Ready Review Tutorial

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

		<h1 class="center">Ready Review  WordPress Theme</h1>

		<div class="borderTop">	

			<div class="span-12 last">
				<p class="prepend-top append-0">Thank you for downloading this theme!  Ready Review was designed to help you get your review site up and running as quickly as possible. </p>
				<div style="color: rgb(255, 0, 0); padding: 10px; background: none repeat scroll 0% 0% rgb(255, 232, 233); border: 1px solid rgb(255, 0, 0);">
					<p><span class="prepend-top append-0"><strong>PLEASE NOTE:</strong> Since this theme is provided for free, I do not offer any type of support. This page will go over the setup of the theme and answer a few popular questions. However, if there are major issues with the theme that is causing problems for lots of users, I'll be happy to fix it or update it. This theme is very simple to use and get results with so hopefully you'll be okay. </span></p>
		   		</div>
			</div>

		</div><!-- end div .borderTop -->

		<h2>Table of Contents</h2>

		<ol class="alpha">
			<li><a href="#1">Basic Installation</a></li>
			<li><a href="#2">Options Panel</a></li>
			<li><a href="#3">General Settings</a></li>
			<li><a href="#4">Setting Up Header</a></li>
			<li><a href="#5">Setting Up Home Page</a></li>
			<li><a href="#6">Setting Up Posts</a></li>
			<li><a href="#7">Setting up Sidebar Products</a></li>
			<li><a href="#8">Footer</a></li>
			<li><a href="#9">Creating the Navigation Menu</a></li>
			<li><a href="#10">Creating Posts</a></li>
			<li><a href="#10">Creating Sitemap</a></li>
		</ol>

		<hr>

		<h3 id="1"><strong>Basic Installation </strong> - <a href="#top">top</a></h3>

		<div class="section">

			<div class="leftbox">

				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/upload.gif">

			</div>

			

			<div class="rightbox">

				<p>

				After downloading the theme, you will have a file called ReadyReview.zip.  

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

        	<p>The general settings are pretty simple to configure and should be self-explanitory.  There are currently only 2 options that can be configured.</p>

            <p><strong>1. Background Color</strong> - For the background color of the site, you can simply select the color you want.  The default color is #cccccc and has been shown to be very effective since it is not destracting and is very pleasing to the eye.</p>

            <p><strong>2. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>

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

			<p>This theme was designed for affiliate marketers and to perform well in the search engines.  It's important to set your home page up for success since it is likely the first page your visitors will see. 

				You should set up your home page in a way that grabs the visitors attention and lets them know that you have what they are looking for.
				A great way to do this is to utilize the intro section provided in this theme (and most of our other themes) along with images, titles and other elements.
				Be sure and fill it with valuable information that both users and the search engines will love.

			</p>

        	<p><strong>1. Home Page Heading</strong> - This is an H1 tag that should be your main headline.  If your site is targeting the keyword "3D TV Reviews", you would want this heading to contain that keyword.</p>

            <p><strong>2. Home Page Intro</strong> - This should be a few paragraphs summarizing your site and what you intend to help people with.  This should not be stuffed with keywords but should be helpful to the reader and make them want to stay on your site to learn more.</p>

            <p><strong>3. Home Page Image</strong> - This will be the first image on the site and should be a clear image that shows people what the site is all about.  The diminsions for this image is 300px by 300px.  It will be automatically resized to this dimension when uploaded.</p>

            <p><strong>4. Home Image Affilate URL</strong> - This URL should be an affiliate link.  I like to link this to the general category page on Amazon if I am doing an Amazon site.  For example, search "3D TV" on Amazon and then get the URL for this search result.  That URL will go here.</p>

			<p><strong>5. Home Image Alt Tag</strong> - This alt tag is for people who do not display images and also for search engine optimization.  Be sure and throw your keywords into it.</p>

            <p><strong>6. Show Posts On Home Page?</strong> - If you want to show posts after the entry post, you can make sure this checkbox is checked.</p>

            <p><strong>7. Category For Home Posts</strong> - Select the category for your home page posts.</p>

            <p><strong>8. Show Excerpt?</strong> - If you check this box, only the short excerpt will be shown for each post.  Otherwise, the entire post will be shown.</p>

            <p><strong>9. Number Of Posts On Home Page</strong> - Select how many posts you want on the home page after the entry post.</p>


			<hr>

			

		<h3 id="6"><strong>Setting up Posts </strong> - <a href="#top">top</a></h3>

        	<p>The only options available here is whether or not you want to show the meta data for each post.  This data includes the date, the category or categories and the number of comments on the post.</p>

        	<p><strong>1. Show Meta Data on Category Page, Search Results Page, Tags Page & Home Page </strong>- Check this box to show the meta data on the pages with multiple posts.</p>

			<p><strong>2. Show Meta Data on Single Post Page?</strong> - Check this box to show the meta data on a sinlge post.</p>
			
			<p><strong>3. Show Similar Posts?</strong> - Select this if you want to show similar posts by category.</p>
			
			<p><strong>4. Similar Posts Heading?</strong> - Choose a heading for your similar posts section.  If left blank, it will display "Similar Posts."</p>

			<hr>

        

        <h3 id="7"><strong>Setting up Sidebar Products </strong> - <a href="#top">top</a></h3>

        	<p>
			Showing "best selling" products in your sidebar is a great way to encourage visitors to read your reviews and will likely result in more clickthroughs.
			Of course, it's your job to provide great reviews that make visitors want to purchase whatever it is you are reviewing. 
			With this feature, you will be able to show products and arrange them in pretty much any order automatically with a star rating and "read more" link.
			</p>

        	<p><strong>1. Show Top Products in Sidebar? </strong>- Check this box in order to show products in the sidebar.  I strongly suggest you do this.</p>

			<p><strong>2. Sidebar Top Products Heading</strong> - Place an eye catching headling here such as "Top Products", "Best Selling Products", etc.</p>

			<p><strong>3. Category to use</strong> - Select the category you wish to pull products from.  This will likely be the category you used to create product review posts.</p>

			<p><strong>4. Number Of Top Products To Show</strong> - Select how many products you want to show.  10 is the max.</p>

			<p><strong>5. Order By</strong> - This is how you will order the products.  Post rank will allow you to assign them a number at the time you create a post.  This makes the most sense if you wish to arrange them in a particular order.  Otherwise, you can choose from the other self-explanitory options.</p>

			<p><strong>6. Order Type</strong> - Choose whether you want them ascending (low to high) or descending (high to low).</p>

			<p><strong>7. Read Review Link Text</strong> - Enter the text you wish for your link to be.  If left blank, it will read "read review."</p>

			<hr>

        

        <h3 id="8"><strong>Footer </strong> - <a href="#top">top</a></h3>

        	<p><strong>1. Footer Left Text </strong>- Choose the text you want to show up on the left side of the footer.  If you leave this blank, it will display a link to Ready Themes.  Although this is not required, it is much appreciated since the theme is given out for free :)</p>

        	<hr>

            

        <h3 id="9"><strong>Creating the Navigation Menu </strong> - <a href="#top">top</a></h3>

        	<p>This theme supports one custom navigation menu.  You will simply need to activate it within the Wordpress admin.</p>

			<p>Go to Appearance &raquo; Menus</p>

			<p>Once here, you will need to create a menu by naming it and adding links to it.  Once it is been created, you can assign it to the theme at the top left where it says "Theme Locations."

        	<p><img src="http://www.readythemes.com/wp-content/uploads/2012/05/menu.gif"></p>


			<hr>

        

        <h3 id="10"><strong>Creating Posts </strong> - <a href="#top">top</a></h3>

		<div class="section">

			<div class="leftbox">

				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/post.gif">

			</div>

			

			<div class="rightbox">

			<p>All posts are created the same way with this theme.  However, if it is a product review post, there are some extra fields that you can fill out.</p>

			<p>You can upload a featured image for each post by using the Featured Image box.  Simply click on "Set featured image" link and choose or upload your image.</p>

			<p>Under Affiliate Settings, there are a few options.

				<ul>

					<li><strong>Affiliate URL</strong> - This should be the URL you want the product to link to.</li>

					<li><strong>Star Rating</strong> - You can set a star rating between 1 and 5 and it will show on the review page.</li>

					<li><strong>Rank</strong> - This is used for ordering products within the sidebar.</li>

				</ul>

			</p>

			</div>

			<div class="clear"></div>


		</div>  

        <hr>
		

		<h3 id="11"><strong>Creating Sitemap </strong> - <a href="#top">top</a></h3>

		<p>To create a basic sitemap for your site, creat a page named "Sitemap" and then assign it the Sitemap template.  That's it.  Your sitemap will be created and you can add a link to it in the navigation bar or in the footer.</p>  

        <hr>

		<p>

		Once again, thank you for downloading this theme. 

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