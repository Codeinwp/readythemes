<?php /*
Template Name: Simple Reviews Tutorial
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
	
		<h1 class="center">Simple Reviews WordPress Theme</h1>
		
		<div class="borderTop">	
	
			<div class="span-12 last">
				<p class="prepend-top append-0">Thank you for purchasing Simple Reviews. If you need support related to installing or using this theme, please open a ticket at <a href="http://www.readythemes.com/support/">http://www.readythemes.com/support/</a>. </p>
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
			<li><a href="#6">Setting Up Posts</a></li>
			<li><a href="#7">Setting up Sidebar</a></li>
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
				After downloading the theme, you will have a file called SimpleReviews.zip.  
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
            <p><strong>1. Color Scheme</strong> - Simply click on the color you'd like to use on your site and then click save options.</p>
            <p><strong>2. Home Meta Title</strong> - Enter the meta title for your home page.  This should be search engine friendly and include the keywords you are targeting without overdoing it.</p>
            <p><strong>3. Home Meta Description</strong> - Enter the meta description here.  Again, this should include a keyword or two but should be especially useful for potential visitors will see this info in the search results.</p>
            <p><strong>4. Home Meta Keywords</strong> - Keywords are not very relevant any longer but can be entered here.</p>
            <p><strong>5. Google Analytics</strong> - If you use Google Analytics, you can post your tracking code here.  You can also use this box for other tracking code you may use along with any other Javascript or Styles you may wish to add to the head.</p>
        	<hr>
            
        <h3 id="4"><strong>Setting Up Header </strong> - <a href="#top">top</a></h3>
          <p><strong>1. Logo</strong> - There are a few options for displaying your logo or title of your site.  If none of the options are chosen, the title of your site will show up here.
          	<ul>
            	<li><strong>Upload Logo</strong> - Use the browse button to select an image from your hard drive to upload.</li>
                <li><strong>Logo Text</strong> - Enter custom text here to be displayed as your logo.</li>
            </ul>
          </p>
          <p><strong>2. Top Right Banner</strong> - This is an ad space designed for a 468 x 60 ad.  Simply enter the ad code into the box.</p>
          <p><strong>3. Show Search Box</strong> - If this box is checked, a search box will show in right side of the header.</p>
          <hr>
            
        <h3 id="5"><strong>Setting Up Home Page </strong> - <a href="#top">top</a></h3>
			<p>It's important to set your home page up with search engine optimization in mind.  
				However, remember that your main objective with a review site is to interest the visitor enough to read the reviews throughout your site.
				The intro of the home page is a very important space for achieving both of these tasks.  Be sure and fill it with valuable information that both users and the search engines will love.
			</p>
        	<p><strong>1. Show Featured Area?</strong> - 
            	<ul>
                	<li><strong>Featured Image - Full Size</strong> - This featured image will extend all the way accross the template page which is 960 pixels.  This should be a visual representation of what you site has to offer and link to reviews, deals, information, etc.</li>
                    <li><strong>Featured Image URL</strong> - This url is where people will be redirected to when they click on your featured image.</li>
                    <li><strong>Featured Area - Custom HTML</strong> - If you would like to use your own custom html, you can do so here.  This will go into the featured area which is 920 pixels wide by 304 pixels high.</li>
                    <li><strong>Featured Heading</strong> - This featured heading will be displayed directly under the featured image and show up on a black ribbon.</li>
                </ul>
            </p>
            <p><strong>2. Show Intro?</strong> - This should be a few paragraphs summarizing your site and what you intend to help people with.  This should not be stuffed with keywords but should be helpful to the reader and make them want to stay on your site to learn more.
            	<ul>
                	<li><strong>Intro Heading</strong> - This is an H1 tag that should be your main headline.  If your site is targeting the keyword "3D TV Reviews", you would want this heading to contain that keyword.</li>
                    <li><strong>Intro Text or HTML</strong> - This should be a few paragraphs summarizing your site and what you intend to help people with.  This should not be stuffed with keywords but should be helpful to the reader and make them want to stay on your site to learn more.</li>
                    <li><strong>Intro Image</strong> - This will be the first image on the site and should be a clear image that shows people what the site is all about.  The diminsions for this image is 300px by 300px.  It will be automatically resized to this dimension when uploaded.</li>
                    <li><strong>Intro Image Affiliate URL</strong> - This URL should be an affiliate link.  I like to link this to the general category page on Amazon if I am doing an Amazon site.  For example, search "3D TV" on Amazon and then get the URL for this search result.  That URL will go here.</li>
                    <li><strong>Intro Image Alt Tag</strong> - This alt tag is for people who do not display images and also for search engine optimization.  Be sure and throw your keywords into it.</li>
                </ul>
            </p>
            <p><strong>3. Show Product Slider?</strong> - The product slider will allow you to show your visitors some of the products you have reviewed or recommended.  It's great for providing a visual reference for those who love to click on images.  
            	<ul>
                	<li><strong>Category For Product Slider</strong> - Simple select the category that you would like to pull posts from.</li>
                    <li><strong>Number Of Posts To Show in Product Slider</strong> - Select how many posts/products you would like to show in the slider.</li>
                    <li><strong>Product Slider Heading</strong> - Give your slider a heading title.  If none is chosed, it will default to "Best Sellers."</li>
                </ul>
            </p>
            <p><strong>4. Show Posts On Home Page?</strong> - If you want to show posts after the entry post, you can make sure this checkbox is checked.
            	<ul>
                	<li><strong>Category For Home Posts</strong> - Select the category for your home page posts.</li>
                    <li><strong>Show Excerpt?</strong> - If you check this box, only the short excerpt will be shown for each post.  Otherwise, the entire post will be shown.</li>
                    <li><strong>Number Of Posts On Home Page</strong> - Select how many posts you want on the home page after the entry post.</li>
                </ul>
            </p>
        	<hr>
			
		<h3 id="6"><strong>Setting up Posts </strong> - <a href="#top">top</a></h3>
        	<p>The only options available here is whether or not you want to show the meta data for each post.  This data includes the date, the category or categories and the number of comments on the post.</p>
			<p><strong>1. Show Meta Data on Single Post Page?</strong> - Check this box to show the meta data on a sinlge post.</p>
            <p><strong>2. Show Similar Posts?</strong> - If this is checked, a similar posts box will be displayed underneath each single post.  Similar posts will be determined by category.</p>
			<hr>
        
        <h3 id="7"><strong>Setting up Sidebar </strong> - <a href="#top">top</a></h3>
        	<p>The sidebar can display whichever products you choose to display as the "Top Products."  Showing products like this is a magnet for people to click on them.  Throughout my testing, these get a high amount of clicks so be sure and include them.</p>
        	<p><strong>1. Show Top Products in Sidebar? </strong>- Check this box in order to show products in the sidebar.  I strongly suggest you do this.</p>
			<p><strong>2. Sidebar Top Products Heading</strong> - Place an eye catching headling here such as "Top Products", "Best Selling Products", etc.</p>
			<p><strong>3. Category to use</strong> - Select the category you wish to pull products from.  This will likely be the category you used to create product review posts.</p>
			<p><strong>4. Number Of Top Products To Show</strong> - Select how many products you want to show.  10 is the max.</p>
			<p><strong>5. Order By</strong> - This is how you will order the products.  Post rank will allow you to assign them a number at the time you create a post.  This makes the most sense if you wish to arrange them in a particular order.  Otherwise, you can choose from the other self-explanitory options.</p>
			<p><strong>6. Order Type</strong> - Choose whether you want them ascending (low to high) or descending (high to low).</p>
			<p><strong>7. Show Recent Posts in Sidebar (with images)? </strong>- If you would like to show recent posts of any category such as blog, you can do that here.  The featured image for each post and a small excerpt will also be displayed.
            	<ul>
                	<li><strong>Sidebar Recent Posts Heading</strong> - A heading can be placed here such as "Recent Blog Posts."</li>
                    <li><strong>Category to use</strong> - Select the category you wish to pull products from.</li>
                    <li><strong>Number Of Recent Posts To Show</strong>- Select how many products you want to show.</li>
                    <li><strong>Recent Posts Order By</strong>- This is how you will order the products.</li>
                    <li><strong>Recent Posts Order Type</strong> - Choose whether you want them ascending (low to high) or descending (high to low).</li>
                </ul>
            </p>
			<hr>
        
        <h3 id="8"><strong>Footer </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Footer Left Text </strong>- Choose the text you want to show up on the left side of the footer.  If you leave this blank, it will display a link to Ready Themes.  Although this is not required, it is much appreciated since the theme is given out for free :)</p>
			<p><strong>2. Facebook Profile ID</strong> - Enter your Facebook profile ID here.  NOTE: whatever you place here will be appended to http://www.facebook.com/.</p>
            <p><strong>3. Twitter Name</strong> - Enter your Twitter name here.</p>
            <p><strong>4. Google Plus URL</strong> - Enter your Google + public profile URL here.</p>
            <p><strong>5. Show RSS icon with link to your feed?</strong> - If you would like to show an RSS icon for your sites feed, be sure this is checked.</p>
        	<hr>
            
        <h3 id="9"><strong>Colorization </strong> - <a href="#top">top</a></h3>
        	<p><strong>1. Hyperlink color </strong>- This setting will override all hyperlinks throughout the site.</p>
			<p><strong>2. Heading Color (h1)</strong> - This setting will override H1 colors.</p>
            <p><strong>3. Post Heading (single page)</strong> - This setting will override the H1 color on the single post page.</p>
            <p><strong>4. Heading Color (h2)</strong> - This setting will override H1 colors.</p>
            <p><strong>5. Post Heading Color</strong> - This setting will override the colors of the headings of posts on the category pages, home page, search page and other pages where multiple posts are listed.</p>
            <p><strong>6. Navigation Links Color</strong> - This will change the colors of all links in the top navigation bar.</p>
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