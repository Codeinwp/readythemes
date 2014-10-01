<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097f6ec3ee731e"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/dashboard.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/dashboard_2013-11-08-16.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/*
Template Name: Test Dashboard
*/
?>
<?php get_header(); ?>	

<?php 

$session = Dap_Session::getSession();
    $user = $session->getUser();
    $user = Dap_User::loadUserById($user->getId());
    
     print_r($user);
   // echo date("Y-m-d");
   $acum = mktime();
    
    $data = strtotime($user->signup_date);
    
    $signup = date("U",$data);
    
    //if (($signup>$data-43200)&&($signup<$data+43200)) {
        
        
    ?>



<script type="text/javascript">
_gaq.push(['_trackEvent', 'log-in', 'User', 'dash']);
var fb_param = {};
fb_param.pixel_id = '6012510209288';
fb_param.value = '0.00';
fb_param.currency = 'USD';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6012510209288&amp;value=0&amp;currency=USD" /></noscript>
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
            	
                <?php if( Dap_Session::isLoggedIn() ) { ?>
                
					<?php
					$session = DAP_Session::getSession();
					$user = $session->getUser();
					$firstname = $user->getFirst_name();
					$userid = $user->getid();
					$signupdate = $user->getSignup_date();
					$userProducts = Dap_UsersProducts::loadProducts($user->getId());
					$allprods = '';
					
					//loop over each product from the list
					foreach ($userProducts as $userProduct) { 
						
						$prods = $userProduct->getProduct_id();
						$allprods = $allprods.','.$prods;
					
					}
					?>
					
					<?php if (strpos($allprods,'10') == true) { //if they have purchased all access ?>

						<h1>Ready Themes Member Dashboard</h1>
						<p>Welcome to Ready Themes member dashboard.  Here, you will be able to download any theme or plugin files that you have purchased, or any that are free.  If you have support issues and need help with anything, let us know by submitting a <a href="/support/">support ticket</a>.</p>
						<br>
						<h2 style="font-size: 20px; font-weight: normal; padding-bottom: 10px; margin-bottom: 30px; border-bottom: 1px solid #e3e3e3;">Wordpress Theme Downloads</h2>
						
						<?php
						// Make a MySQL Connection
						mysql_connect("localhost", "readythe_1", "aB123456") or die(mysql_error());
						mysql_select_db("readythe_1") or die(mysql_error());
						
						// Themes
						$themeresult = mysql_query("SELECT * FROM Themes where type = 't' ORDER BY dateAdded DESC")
						or die(mysql_error());  
						
						// Plugins
						$pluginresult = mysql_query("SELECT * FROM Themes where type = 'p' ORDER BY dateAdded DESC")
						or die(mysql_error());  
						
						?>
						
						<?php 
						while($row = mysql_fetch_assoc($themeresult)){
						?>
						
							<div class="dap_product_links_table">
								<div class="dashboardcontent">
									<div class="dashimg">
										<img src="<?php echo $row['themeThumb']; ?>" width="180">
									</div>
									<div class="dashlinks">
										<div class="dap_product_heading"><?php echo $row['themeName']; ?></div>
										<ul class="dap_product_links_list">
											<li><a href="<?php echo $row['themeDownload']; ?>">Theme Files</a></li>
											<?php if($row['themePSD'] != ''){ ?>
											<li><a href="<?php echo $row['themePSD']; ?>">PSD Files</a></li>
											<?php } ?>
											<li><a href="<?php echo $row['themeReadme']; ?>">Documentation</a></li>
                                            <?php if($row['changelog'] != ''){ ?>
											<li><a href="" onclick="window.open('<?php bloginfo('template_directory'); ?>/changelog.php?tid=<?php echo $row['themeID']; ?>', 'Changelog', 'width=500,height=300,status=no,resizable=yes,scrollbars=yes'); return false;">Change Log</a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clear"></div>
								</div><!-- dashboardcontent -->
							</div><!-- dap_product_links_table -->
							
						<?php
						} 
						?>
						
						<h2 style="font-size: 20px; font-weight: normal; padding-bottom: 10px; margin-top:40px; margin-bottom: 30px; border-bottom: 1px solid #e3e3e3;">Plugin Downloads</h2>
						<?php 
						while($row_p = mysql_fetch_assoc($pluginresult)){
						?>
						
							<div class="dap_product_links_table">
								<div class="dashboardcontent">
									<div class="dashimg">
										<img src="<?php echo $row_p['themeThumb']; ?>" width="180">
									</div>
									<div class="dashlinks">
										<div class="dap_product_heading"><?php echo $row_p['themeName']; ?></div>
										<ul class="dap_product_links_list">
											<li><a href="<?php echo $row_p['themeDownload']; ?>">Plugin Files</a></li>
											<?php if($row_p['themePSD'] != ''){ ?>
											<li><a href="<?php echo $row_p['themePSD']; ?>">PSD Files</a></li>
											<?php } ?>
											<li><a href="<?php echo $row_p['themeReadme']; ?>">Documentation</a></li>
                                            <?php if($row_p['changelog'] != ''){ ?>
											<li><a href="" onclick="window.open('<?php bloginfo('template_directory'); ?>/changelog.php?tid=<?php echo $row_p['themeID']; ?>', 'Changelog', 'width=500,height=300,status=no,resizable=yes,scrollbars=yes'); return false;">Change Log</a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clear"></div>
								</div><!-- dashboardcontent -->
							</div><!-- dap_product_links_table -->
							
						<?php
						} 
						?>
						
					<?php } elseif (strpos($allprods,'27') == true) { //if they have purchased all access special ?>
						
						<h1>Ready Themes Member Dashboard</h1>
						<p>Welcome to Ready Themes member dashboard.  Here, you will be able to download any theme or plugin files that you have purchased, or any that are free.  If you have support issues and need help with anything, let us know by submitting a <a href="/support/">support ticket</a>.</p>
						<br>
						<h2 style="font-size: 20px; font-weight: normal; padding-bottom: 10px; margin-bottom: 30px; border-bottom: 1px solid #e3e3e3;">Wordpress Theme Downloads</h2>
						
						<?php
						// Make a MySQL Connection
						mysql_connect("localhost", "readythe_1", "aB123456") or die(mysql_error());
						mysql_select_db("readythe_1") or die(mysql_error());
						
						// Themes
						$themeresult = mysql_query("SELECT * FROM Themes where type = 't' ORDER BY dateAdded DESC")
						or die(mysql_error());  
						
						// Plugins
						$pluginresult = mysql_query("SELECT * FROM Themes where type = 'p' ORDER BY dateAdded DESC")
						or die(mysql_error());  
						
						?>
						
						<?php 
						while($row = mysql_fetch_assoc($themeresult)){
						?>
						
							<div class="dap_product_links_table">
								<div class="dashboardcontent">
									<div class="dashimg">
										<img src="<?php echo $row['themeThumb']; ?>" width="180">
									</div>
									<div class="dashlinks">
										<div class="dap_product_heading"><?php echo $row['themeName']; ?></div>
										<ul class="dap_product_links_list">
											<li><a href="<?php echo $row['themeDownload']; ?>">Theme Files</a></li>
											<?php if($row['themePSD'] != ''){ ?>
											<li><a href="<?php echo $row['themePSD']; ?>">PSD Files</a></li>
											<?php } ?>
											<li><a href="<?php echo $row['themeReadme']; ?>">Documentation</a></li>
                                            <?php if($row['changelog'] != ''){ ?>
											<li><a href="" onclick="window.open('<?php bloginfo('template_directory'); ?>/changelog.php?tid=<?php echo $row['themeID']; ?>', 'Changelog', 'width=500,height=300,status=no,resizable=yes,scrollbars=yes'); return false;">Change Log</a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clear"></div>
								</div><!-- dashboardcontent -->
							</div><!-- dap_product_links_table -->
							
						<?php
						} 
						?>
						
						<h2 style="font-size: 20px; font-weight: normal; padding-bottom: 10px; margin-top:40px; margin-bottom: 30px; border-bottom: 1px solid #e3e3e3;">Plugin Downloads</h2>
						<?php 
						while($row_p = mysql_fetch_assoc($pluginresult)){
						?>
						
							<div class="dap_product_links_table">
								<div class="dashboardcontent">
									<div class="dashimg">
										<img src="<?php echo $row_p['themeThumb']; ?>" width="180">
									</div>
									<div class="dashlinks">
										<div class="dap_product_heading"><?php echo $row_p['themeName']; ?></div>
										<ul class="dap_product_links_list">
											<li><a href="<?php echo $row_p['themeDownload']; ?>">Plugin Files</a></li>
											<?php if($row_p['themePSD'] != ''){ ?>
											<li><a href="<?php echo $row_p['themePSD']; ?>">PSD Files</a></li>
											<?php } ?>
											<li><a href="<?php echo $row_p['themeReadme']; ?>">Documentation</a></li>
                                            <?php if($row_p['changelog'] != ''){ ?>
											<li><a href="" onclick="window.open('<?php bloginfo('template_directory'); ?>/changelog.php?tid=<?php echo $row_p['themeID']; ?>', 'Changelog', 'width=500,height=300,status=no,resizable=yes,scrollbars=yes'); return false;">Change Log</a></li>
											<?php } ?>
										</ul>
									</div>
									<div class="clear"></div>
								</div><!-- dashboardcontent -->
							</div><!-- dap_product_links_table -->
							
						<?php
						} 
						?>
												
					<?php } else { // They have bought a single theme or they have the free one so show it ?>
						
						<?php if (strpos($allprods,'22') == true  ) { //Free Theme signed up within the last 24 hours ?>
						
							<?php
							function ListCount($list, $delimiter="")
								{
									if($delimiter == "")
								{
									$delimiter = ",";
								}
								$a = explode($delimiter,$list);
								return count($a);
								}
							
							$userprods = ListCount($allprods) - 1;
							if ($userprods < 2){ //Only show special offer if the free theme is the only product they have
							?>
									
							<?php
							$ts1 = strtotime($signupdate) + 111316;//111316
							$ts2 = strtotime(date("Y-m-d H:i:s"));
							?>
							
							<?php 
							if ($ts2 < $ts1){ 
							$timeleft = floor(($ts1 - $ts2) / 3600);
							?>
							
							<div style="margin-bottom:40px; padding-bottom:40px; border-bottom:2px solid #ccc;">
							
								<form name="PaymentForm" method="post" action="http://www.readythemes.com/dap/paypalCoupon.php">
								<input type="hidden" name="cmd" value="_xclick"/>
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="item_name" value="Ready Themes All Access Special" />
								<div><input type="image" src="http://www.readythemes.com/wp-content/uploads/2013/05/buy-now-special.png" border="0" name="submit" /></div>
								</form>
								
								<div style="margin-left:160px; text-align:center; font-size:14px; font-weight:bold; font-style:italic;">Hurry, offer expires in <?php echo $timeleft; ?> hours</div>
							
							</div>
							
						<?php }} ?>
						
						<?php } ?>
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; endif; ?>
					<?php } ?>
                
                <?php } else { // They don't have access so redirect them to the login page ?>
				
                	<?php header( 'Location: /login/' ) ; ?>
                    
                <?php } ?>
			
			
			</div>				
			
			<div class="right">
			
				<?php get_sidebar(); ?>
			
			</div>
			
			<div id="clear"></div>
			
		</div>
		<!-- end maincontent -->

<?php get_footer(); ?>