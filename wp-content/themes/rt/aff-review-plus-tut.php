<?php /*
Template Name: Affiliate Review PLUS Tutorial
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

		<h1 class="center">Affiliate Review PLUS WordPress Theme</h1>

		<div class="borderTop">	

			<div class="span-12 last">

				<p class="prepend-top append-0">Thank you for purchasing the Affiliate Review PLUS theme. I hope you enjoy it and are able to build a successful affiliate marketing business utilizing the included features. </p>

			</div>

		</div><!-- end div .borderTop -->

		<h2>Table of Contents</h2>

		<ol class="alpha">

			<li><a href="#1">Basic Installation</a></li>
			<li><a href="#2">Options Panel</a></li>
			<li><a href="#3">Affiliate Settings</a></li>
			<li><a href="#4">General Settings</a></li>
			<li><a href="#5">Setting Up Header</a></li>
			<li><a href="#6">Setting Up Home Page</a></li>
			<li><a href="#7">Setting Up Posts</a></li>
			<li><a href="#8">Setting up Sidebar Products</a></li>
			<li><a href="#9">Footer</a></li>
			<li><a href="#10">Creating the Navigation Menu</a></li>
			<li><a href="#11">Creating Posts</a></li>
			<li><a href="#12">Adding Amazon Products to a Post</a></li>
			<li><a href="#13">Adding Amazon Products to Home Page</a></li>
			<li><a href="#14">Creating Sitemap</a></li>
		</ol>

		<hr>

		<h3 id="1"><strong>Basic Installation </strong> - <a href="#top">top</a></h3>

		<div class="section">

			<div class="leftbox">

				<img src="http://www.readythemes.com/wp-content/uploads/2012/05/upload.gif">

			</div>

			

			<div class="rightbox">

				<p>
				After downloading the theme, you will have a file called AffiliateReviewPLUS.zip.  

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

			<p align="center">

			<iframe width="640" height="390" src="http://www.youtube.com/embed/GbVQO45cv4k" frameborder="0" allowfullscreen></iframe>

			</p>

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

		<h3 id="3"><strong>Affiliate Settings </strong> - <a href="#top">top</a></h3>
        	
			<p>This is where you'll enter the details for the Amazon API and also some global settings for the Amazon search and display functionality. </p>

            <p><strong>1. Amazon Associate Tag</strong> - You Associate Tag is your tracking ID and can be found by logging into the <a href="https://affiliate-program.amazon.com/">Amazon Affiliate dashboard</a></p>

            <p><strong>2. Amazon Access Key ID</strong> - This Key ID allows you to connect to the Amazon API and allows you to search the Amazon marketplace inventory.</p>

            <p><strong>3. Amazon Secret Access Key</strong> - The Secret Access Key is a sort of password and is needed along with the Access Key ID in order to access the Amazon Marketplace inventory.</p>

            <p><strong>4. Store Locale</strong> - Choose the country for the Amazon store you wish to use.  All affiliate links will be built for this store locale.</p>

            <p><strong>5. Sort Products</strong> -  You may either sort products by price or title and this applies to both searching and displaying.</p>

            <p><strong>6. Sort Order</strong> - Choose whether you want the order ascending or descending.</p>

            <p><strong>7. Open Links in New Windows</strong> -  If selected, links will open in a new window.</p>

            <p><strong>8. Display Products As</strong> - There are two different ways to display products.  The grid view will show 3 products per row but will not include a description.  List view will show 1 product per row and include an editable description.</p>

		<hr>
        

        <h3 id="4"><strong>General Settings </strong> - <a href="#top">top</a></h3>

        	<p>The general settings are pretty simple to configure and should be self-explanitory.  There are currently only 3 options that can be configured.</p>

            <p><strong>1. Site Layout</strong> - You can choose whether you want the sidebar on the right (default) or on the left.  You can simply click on the image of the configuration you choose and then click on the Save button.</p>

            <p><strong>2. Background Color</strong> - For the background color of the site, you can simply select the color you want.  The default color is #cccccc and has been shown to be very effective since it is not destracting and is very pleasing to the eye.</p>

            <p><strong>3. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>

        	<p align="center">

				<iframe width="640" height="390" src="http://www.youtube.com/embed/-T_LoAL-uZw" frameborder="0" allowfullscreen></iframe>

			</p>

			<hr>

            

        <h3 id="5"><strong>Setting Up Header </strong> - <a href="#top">top</a></h3>

          <p><strong>1. Logo</strong> - There are a few options for displaying your logo or title of your site.  If none of the options are chosen, the title of your site will show up here.

          	<ul>

            	<li><strong>Upload Logo</strong> - Use the browse button to select an image from your hard drive to upload.</li>

                <li><strong>Logo Text</strong> - Enter custom text here to be displayed as your logo.</li>

            </ul>

          </p>

          <p><strong>2. Header Background Color</strong> - You can choose a solid color here for the top part of your website above the navigation bar. </p>

          <p><strong>3. Header Background Image</strong> - An image can also be used for this.  If you want to use a customized full size image, be sure to size it at 1000px wide by 117px high.</p>

          <p><strong>4. Header Background Image Repeat</strong> - If you are using a smaller background image that needs to repeat accross the entire section, these radio buttons will allow you to set it up according to your needs.</p>

          <p><strong>5. Top Right Banner</strong> - This is an ad space designed for a 468 x 60 ad.  Simply enter the ad code into the box.</p>

          <p align="center">

		  	<iframe width="640" height="390" src="http://www.youtube.com/embed/hMCS_KYU8p8" frameborder="0" allowfullscreen></iframe>

		  </p>

		  <hr>

            

        <h3 id="6"><strong>Setting Up Home Page </strong> - <a href="#top">top</a></h3>

			<p>It's important to set your home page up with search engine optimization in mind.  

				However, remember that your main objective with a review site is to interest the visitor enough to read the reviews throughout your site.

				The intro of the home page is a very important space for achieving both of these tasks.  Be sure and fill it with valuable information that both users and the search engines will love.

			</p>
			
			<p><strong>1. Show Featured Slider</strong> - The featured slider will allow you to show posts from whichever category you choose.
				<ul>
					<li><strong>Featured Slider Category</strong> - Select the category you want the featured slider to pull products from.</li>
					<li><strong>How many posts in featured slider?</strong> - Select the number of posts you want to show up in the slider.</li>
				</ul>
			</p>
			
			<p><strong>2. Show Home Page Intro</strong> - The home page intro is a great place to give your readers a summary of what your site is about.  It is also great for doing a bit of SEO work to help your site rank better for your main keyword or keyword phrase.
				<ul>
					<li><strong>Home Page Heading</strong> - This is an H1 tag that should be your main headline.  If your site is targeting the keyword "3D TV Reviews", you would want this heading to contain that keyword.</li>
					<li><strong>Home Page Intro Text</strong> - This should be a few paragraphs summarizing your site and what you intend to help people with.  This should not be stuffed with keywords but should be helpful to the reader and make them want to stay on your site to learn more.</li>
					<li><strong>Home Page Image</strong> - This will be the first image on the site and should be a clear image that shows people what the site is all about.  The diminsions for this image is 300px by 300px.  It will be automatically resized to this dimension when uploaded.</li>
					<li><strong>Home Image Affiliate URL</strong> - This URL should be an affiliate link.  I like to link this to the general category page on Amazon if I am doing an Amazon site.  For example, search "3D TV" on Amazon and then get the URL for this search result.  That URL will go here.</li>
					<li><strong>Home Image Alt Tag</strong> - This alt tag is for people who do not display images and also for search engine optimization.  Be sure and throw your keywords into it.</li>
				</ul>
			</p>
			
			<p><strong>3. Show Amazon Products On Home Page?</strong> - Check this box if you wish to show a listing of Amazon products on the home page.  These products will link directly to the Amazon product with your affiliate link.
				<ul>
					<li><strong>Heading for Amazon Products</strong> - Add a heading to the Amazon products or leave it blank if you do not want a heading.</li>
					<li><strong>Page For Amazon Products</strong> - In order to show products on the home page, you'll need to create a page that lists the products you wish to show.  After this page has been created and published, you can select it from this select box. <a href="#13">Click here to see how to create an Amazon product page</a>.</li>
				</ul>
			</p>
			
			<p><strong>4. Show Posts On Home Page?</strong> - If you want to show posts after the entry post, you can make sure this checkbox is checked.
				<ul>
					<li><strong>Category For Home Posts</strong> - Select the category for your home page posts.</li>
					<li><strong>Show Excerpt?</strong> - If you check this box, only the short excerpt will be shown for each post.  Otherwise, the entire post will be shown.</li>
					<li><strong>Number Of Posts On Home Page</strong> - Select how many posts you want on the home page after the entry post.</li>
				</ul>
			</p>


        	<p align="center">

				<iframe width="640" height="390" src="http://www.youtube.com/embed/-HwEPfNYc8s" frameborder="0" allowfullscreen></iframe>

			</p>

			<hr>

			

		<h3 id="7"><strong>Setting up Posts </strong> - <a href="#top">top</a></h3>

        	<p>The only options available here is whether or not you want to show the meta data for each post.  This data includes the date, the category or categories and the number of comments on the post.</p>

        	<p><strong>1. Show Meta Data on Category Page, Search Results Page, Tags Page & Home Page </strong>- Check this box to show the meta data on the pages with multiple posts.</p>

			<p><strong>2. Show Meta Data on Single Post Page?</strong> - Check this box to show the meta data on a sinlge post.</p>

			<hr>

        

        <h3 id="8"><strong>Setting up Sidebar Products </strong> - <a href="#top">top</a></h3>

        	<p>This is where the magic is with this theme.  The sidebar can display whichever products you choose to display as the "Top Products."  Showing products like this is a magnet for people to click on them.  Throughout my testing, these get a high amount of clicks so be sure and include them.</p>

        	<p><strong>1. Show Top Products in Sidebar? </strong>- Check this box in order to show products in the sidebar.  I strongly suggest you do this.</p>

			<p><strong>2. Sidebar Top Products Heading</strong> - Place an eye catching headling here such as "Top Products", "Best Selling Products", etc.</p>

			<p><strong>3. Category to use</strong> - Select the category you wish to pull products from.  This will likely be the category you used to create product review posts.</p>

			<p><strong>4. Number Of Top Products To Show</strong> - Select how many products you want to show.  10 is the max.</p>

			<p><strong>5. Order By</strong> - This is how you will order the products.  Post rank will allow you to assign them a number at the time you create a post.  This makes the most sense if you wish to arrange them in a particular order.  Otherwise, you can choose from the other self-explanitory options.</p>

			<p><strong>6. Order Type</strong> - Choose whether you want them ascending (low to high) or descending (high to low).</p>

			<p><strong>7. Buy Button Text </strong>- Choose what you want the buy now button to say or leave as default.</p>

			<p><strong>8. Buy Button Color</strong> - Choose the buy button color or leave as default.</p>

			<p><strong>9. Read Review Button Text</strong> - Choose what you want the review button to say or leave as default.</p>

			<p><strong>10. Read Review Button Color</strong> - Choose the review button color or leave as default.</p>

			<p align="center">

				<iframe width="640" height="390" src="http://www.youtube.com/embed/MNLWPrYe1Ys" frameborder="0" allowfullscreen></iframe>

			</p>

			<hr>

        

        <h3 id="9"><strong>Footer </strong> - <a href="#top">top</a></h3>

        	<p><strong>1. Footer Left Text </strong>- Choose the text you want to show up on the left side of the footer.  If you leave this blank, it will display a link to Ready Themes.  Although this is not required, it is much appreciated since the theme is given out for free :)</p>

			<p><strong>2. Footer Right Text</strong> - Choose the text you want to show up on the right side of the footer.</p>

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

        

        <h3 id="11"><strong>Creating Posts </strong> - <a href="#top">top</a></h3>

		<div class="section">

			<div class="leftbox">

				<img src="http://www.readythemes.com/wp-content/uploads/2012/09/aff-review-plus-post1.gif">

			</div>

			

			<div class="rightbox">

			<p>All posts are created the same way with this theme.  However, if it is a product review post, there are some extra fields that you can fill out.</p>

			<p>You can upload a featured image for each post by using the Featured Image box.  Simply click on "Set featured image" link and choose or upload your image.</p>

			<p>Under Affiliate Settings, there are a few options.

				<ul>

					<li><strong>Affiliate URL</strong> - This should be the URL you want the product to link to.</li>

					<li><strong>Star Rating</strong> - You can set a star rating between 1 and 5 and it will show on the review page.</li>

					<li><strong>Rank</strong> - This is used for ordering products within the sidebar.</li>
					
					<li><strong>Amazon Products Layout</strong> - If you have added Amazon products to your post, you can override the global layout setting by selecting a layout option here.</li>

				</ul>

			</p>


			</div>

			<div class="clear"></div>

		</div>  

        <hr>
		
		<h3 id="12"><strong>Adding Amazon Products to a Post</strong> - <a href="#top">top</a></h3>
		
		<p>
		Find products by searching in the search box provided in the Affiliate Products section.  Enter your search term and click Search Products.  Once products have been found, check the ones you would like to add to your post.<br />
		<div><img src="http://www.readythemes.com/wp-content/uploads/2012/09/amz_prod_add1.gif" /></div>
		<br /><br />
		Once you have checked the posts you want, you will need to add the shortcode to your post where you wish for the products to appear.<br /><br />
		<div><img src="http://www.readythemes.com/wp-content/uploads/2012/09/amz_prod_add2.gif" /></div>
		<br /><br />
		Once the shortcode has been added and your post has been published or updated, your products should show within your post.<br /><br />
		<div style="text-align:center;"><img src="http://www.readythemes.com/wp-content/uploads/2012/09/amz_prod_add3.gif" style="border:2px solid #ccc;" /></div>
		</p>
		
		<hr />
		
		<h3 id="13"><strong>Adding Amazon Products to Home Page</strong> - <a href="#top">top</a></h3>
		
		<p>
		In order to add Amazon products to the home page, you'll need to create a page with products added to it.  You will simply create a page like you normally would but you'll only need to add the [amazon-products] short tag in the post body as shown in the image below.<br />
		<div><img src="http://www.readythemes.com/wp-content/uploads/2012/09/amz_page_add1.gif" /></div>
		<br /><br />
		Once you have added this, you will need to select this page in the select box located in the options panel under Home Page.
		</p>
		
		<hr />
		

		<h3 id="14"><strong>Creating Sitemap </strong> - <a href="#top">top</a></h3>

		<p>To create a basic sitemap for your site, creat a page named "Sitemap" and then assign it the Sitemap template.  That's it.  Your sitemap will be created and you can add a link to it in the navigation bar or in the footer.</p>  

        <hr>

       

		

		<p>

		Once again, thank you for purchasing this theme. 

		I welcome your suggestions for any improvements that you may have.

		I aim to please so if you have any way to make the theme perform better, let me know and I'll see what I can do to include the update on the next release.

		</p>

		

		<p>

		Most of all, <u><strong>have fun with this theme and with building an affiliate marketing business</strong></u>.  

		Affiliate marketing is the ultimate in home based businesses simply because it offers the type of lifestyle that many people dream of.

		Of course, you'll have to put in the hard work, but this theme will give you what you need for creating top quality review sites that the search engines love.

		</p>

		

		<p class="append-bottom alt large"><strong>All the best,</strong></p>

		<p>Dan Collins</p>

		<p><a href="#top">Go To Table of Contents</a></p>

		

		<hr class="space">

		

		<div id="clear"></div>

		

	</div>

	<!-- end maincontent -->



<?php get_footer(); ?>