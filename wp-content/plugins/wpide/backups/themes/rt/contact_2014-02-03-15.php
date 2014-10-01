<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097fb5eb2e536a"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/contact.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/contact_2014-02-03-15.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php /*
Template Name: Contact
*/ ?>
<?php get_header(); ?>

		<div id="singlefeatured">
			
			<div class="leftheading">
			<?php if (have_posts()) : ?>
	
				<?php while (have_posts()) : the_post(); ?>
		
					<?php $tagline = get_post_meta($post->ID, 'tagline', true); ?>
					
					<h1 class="agenda"><?php the_title() ?></h1>
					<p class="agenda" style="font-size:18px;"><?php echo $tagline; ?></p>
			
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
	
			<div class="left">
			
                <div id="leftcontent">
               
					<?php

					if (array_key_exists('_submit_check', $_POST)) {
					  
						// send to this email address
						$to = "info@readythemes.com";
							
						// this goes in the subject of the email  <br />
						$re = "Ready Themes contact form"; 
						
						// Success message
						$successmessage = "Your message has been submitted.  Please allow up to 24-48 hours for a response.";
						
						// Captcha
						$answer = 9;
			
						##demension variables from form
						$yourname = $_REQUEST['yourname'] ;
						$email = $_REQUEST['email'] ;
						$comment = $_REQUEST['comment'] ;
						$_name = "/^[-!#$%&\'*+\\.\/0-9=?A-Z^_`{|}~]+";
						$_host = "([-0-9A-Z]+\.)+";
						$_tlds = "([0-9A-Z]){2,4}$/i";
						$formanswer = $_REQUEST['formanswer'] ;
						$errors = '';
					  
						// if name is empty, give an error
						if ($yourname == '') {
						$errors = $errors . 'You must enter your name<br />';
						} 
						
						// if email is empty, give an error
						if ($email == '') {
						
							$errors = $errors . 'You must enter a valid email address<br />';
							
						} elseif ($email <> '') {
						
							// if email is not in the proper format, give an error
							if( !preg_match( $_name."@".$_host .$_tlds,$email ) ) { 
								$errors = $errors . 'You must enter a valid email address<br />';
							}
						}
						
						// if captcha is wrong
						if ($answer != $formanswer) {
						$errors = $errors . 'Oops, check your math.<br />';
						} 
						
						// if comment is empty, give an error
						if ($comment == '') {
						$errors = $errors . 'You must enter your comments<br />';
						} 
						
						if ($errors <> '') {
							echo ( "<div class='errors'>$errors</div>" );
						} else {
		
							// message   
							$msg = "<p><strong>Name:</strong> $name </p> <p><strong>Email:</strong> $email</p> <p><strong>Message:</strong> $comment </p>";
							
							// html headers (these lines tell the email to be in html format)
							$headers = "MIME-Version: 1.0\r\n";
							$headers .= "Content-type: text/html;";
							$headers .= " charset=iso-8859-1\r\n";
							
							// from (this will show up in the from area of the email)
							$headers .= "From: $email \r\n";
							
							// sends mail with the variables in parenthesis (headers must be the fourth argument)
							mail( $to, $re, $msg, $headers );
							
							// Success message
							echo ( "<div class='emailsuccess'>$successmessage</div>" );
							
						}
					 
					} ?>
		
					<div id="contactform">
					
                    	<p>
                        If you have a support request with one of our themes or plugins, please submit a <a href="/support/">support ticket here</a>.
                        </p>
                        
						<p>
                        If you have questions that aren't related to theme or plugin support, you can contact us by using the form below.  
                        If you require a response, please give us 24 - 48 hours to get back with you.  
                        Thanks for your patience.
                        </p>
																
						<form method="post" action="http://www.readythemes.com/contact/">
						
						<p><span class="commentslabel">Your Name</span> <br /><input type="text" name="yourname" id="name" value="<?php echo $yourname; ?>" size="50" class="textfield" />  </p>
					
						<p><span class="commentslabel">Your Email Address</span> <br /><input type="text" name="email" id="email" value="<?php echo $email; ?>" size="50" class="textfield" />  </p>
							
						<p><span class="commentslabel">Your Message</span> <br /><textarea name="comment" id="message" rows="12" tabindex="4" class="textfield" style="width:500px;" ><?php echo $comment; ?></textarea>  </p>
						
						<p><span class="commentslabel">What is 5 + 4?</span> <br /><input type="text" name="formanswer" id="formanswer" value="" size="20" class="textfield" />  </p>

                        <p>
						<input type="hidden" name="_submit_check" />
						<input type="submit" name="submit" id="submit" value="Send It &raquo;" class="button"/>
						</p>
						
						</form>
					
					</div>
                
                </div>
			
			</div>
			
			<div class="right">
			
				<?php get_sidebar(); ?>
			
			</div>
			
			<div id="clear"></div>
			
		</div>
		<!-- end maincontent -->

<?php get_footer(); ?>