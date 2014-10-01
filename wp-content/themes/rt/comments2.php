<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	echo 'This post is password protected. Enter the password to view comments.';
	return;
}
?>

<?php $altcomment = 'alt'; ?>

<?php if ($comments) : ?>
	
	<h3 id="comments">Comments</h3>

	<ul class="commentlist">
		<?php foreach ($comments as $comment) : ?>

			<li class="<?php echo $altcomment; ?>" id="comment-<?php comment_ID(); ?>">
				<h4><?php comment_author_link(); ?></h4>
				<small><a href="#comment-<?php comment_ID(); ?>">
					<?php comment_date('M jS, Y'); ?>
				</a></small>
                
				<div class="the_comment">
					<?php comment_text(); ?>
				</div>
                <?php if (function_exists('get_avatar')) {
					  echo get_avatar(get_comment_author_email(),'40');
				  	} ?>
			</li>
			
			<?php
				if ($altcomment == 'alt') {
					$altcomment = '';
				} else {
					$altcomment = 'alt';
				}
			?>
		<?php endforeach; ?>
	</ul>
<?php else : ?>

	<?php /*?><?php if ($post->comment_status == 'open') : ?>
		<p id="comments-p">There are no comments yet, add one below.</p>
	<? else : ?>
		<p id="comments-p">Comments are closed.</p>
	<?php endif; ?><?php */?>
    
<?php endif; ?>





<?php if ('open' == $post->comment_status) : ?>


	<div class="separator"></div>

	<h2 id="comments-h2">Leave a Comment</h2>
	<br />
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php bloginfo('url'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( $user_ID ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
			<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a></p>
		<?php else : ?>

			<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="input" />
			<span id="label">Name <?php if ($req) echo "(required)"; ?></span></p>

			<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="50" class="input" />
			<span id="label">Mail (will not be published) <?php if ($req) echo "(required)"; ?></span></p>

			<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="50"  class="input"/>
			<span id="label">Website</span></p>
		<?php endif; ?>
		
		<p><textarea name="comment" id="data" cols="60" rows="7" tabindex="4"></textarea></p>

		<p><input name="submit" type="image" src="<?php bloginfo('template_directory'); ?>/images/submit-comments.gif" id="submit" tabindex="5" value="Submit Comment" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>

		<?php do_action('comment_form', $post->ID); ?>

	</form>
<?php endif; ?>
<?php endif; ?>