<?php /*
Template Name: Thank you Page
*/ ?>
<?php get_header(); ?>
<!-- Google Code for cumparatema Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 989355025;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "Jz2ZCNf99ggQkbjh1wM";
var google_conversion_value = 44;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/989355025/?value=0&amp;label=Jz2ZCNf99ggQkbjh1wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

	<div id="singlefeatured">
	
	<div class="leftheading">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			
			<h1><?php the_title() ?></h1>
			<p>Ready themes</p>
	
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

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>
				
				<?php comments_template(); // Get wp-comments.php template ?>
		
			<?php endwhile; ?>
	
		<?php endif; ?>	
		
		<div id="clear"></div>
		
	</div>
	<!-- end maincontent -->

<?php get_footer(); ?>