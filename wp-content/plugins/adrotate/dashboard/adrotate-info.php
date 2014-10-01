<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>
<style type="text/css" media="screen">
.postbox-adrotate {
	margin-bottom: 20px;
	padding: 0;
	position: relative;
	min-width: 255px;
	border: #dfdfdf 1px solid;
	background-color: #fff;
	-moz-box-shadow: inset 0 1px 0 #fff;
	-webkit-box-shadow: inset 0 1px 0 #fff;
	box-shadow: inset 0 1px 0 #fff;
	line-height: 1.5;
}

.postbox-adrotate h3 {
	margin: 0;
	padding: 7px 10px 7px 10px;
	box-shadow: #ddd 0px 1px 0px 0px;
	-moz-box-shadow: inset 0 1px 0 #ddd;
	-webkit-box-shadow: #ddd 0px 1px 0px 0px;
	display: block;
	line-height: 15px;
}

.postbox-adrotate .inside {
	margin: 10px 0px 0px 10px;
	padding: 0px 10px 10px 0px;
	min-height: 40px;
	position: relative;
	display: block;
	line-height: 16px;
}

.inside {
	padding: 6px 10px 12px;
	clear: both;
}
</style>

<?php
$banners = $groups = $blocks = $queued = $data['expiressoon'] = $data['error'] = 0;
$banners = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` WHERE `type` != 'empty' AND `type` != 'a_empty';");
$groups = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate_groups` WHERE `name` != '';");
$blocks = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate_blocks` WHERE `name` != '';");
$queued = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` WHERE `type` = 'queue';");

if(!is_array($adrotate_advert_status)) {
	$data = unserialize($adrotate_advert_status);
} else {
	$data = $adrotate_advert_status;
}
?>

<div id="dashboard-widgets-wrap">
	<div id="dashboard-widgets" class="metabox-holder">

		<div id="postbox-container-1" class="postbox-container" style="width:50%;">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				
				<h3><?php _e('Currently', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<table width="100%">
							<thead>
							<tr class="first">
								<td width="50%"><strong><?php _e('Your setup', 'adrotate'); ?></strong></td>
								<td width="50%"><strong><?php _e('Adverts that need you', 'adrotate'); ?></strong></td>
							</tr>
							</thead>
							
							<tbody>
							<tr class="first">
								<td class="first b"><a href="admin.php?page=adrotate-ads"><?php echo $banners; ?> <?php _e('Adverts', 'adrotate'); ?></a></td>
								<td class="b"><a href="admin.php?page=adrotate-ads"><?php echo $data['expiressoon']; ?> <?php _e('(Almost) Expired', 'adrotate'); ?></a></td>
							</tr>
							<tr>
								<td class="first b"><a href="admin.php?page=adrotate-groups"><?php echo $groups; ?> <?php _e('Groups', 'adrotate'); ?></a></td>
								<td class="b"><a href="admin.php?page=adrotate-ads"><?php echo $data['error']; ?> <?php _e('Have errors', 'adrotate'); ?></a></td>
							</tr>
							<tr>
								<td class="first b"><a href="admin.php?page=adrotate-blocks"><?php echo $blocks; ?> <?php _e('Blocks', 'adrotate'); ?></a></td>
								<td class="b"><a href="admin.php?page=adrotate-moderate"><?php echo $queued; ?> <?php _e('Queued', 'adrotate'); ?></a></td>
							</tr>
							</tbody>

							<thead>
							<tr class="first">
								<td colspan="2"><strong><?php _e('The last few days', 'adrotate'); ?></strong></td>
							</tr>
							</thead>

							<tbody>
							<tr class="first">
								<td colspan="2">
						        	<?php
						        	$adstats = $wpdb->get_results("SELECT `thetime`, SUM(`clicks`) as `clicks`, SUM(`impressions`) as `impressions` FROM `".$wpdb->prefix."adrotate_stats` GROUP BY `thetime` DESC LIMIT 5;");
						
									if($adstats) {
										$adstats = array_reverse($adstats);
										$dates = $clicks = $impressions = 0;
						
										foreach($adstats as $result) {
											if($result->clicks == null) $result->clicks = '0';
											if($result->impressions == null) $result->impressions = '0';
											
											$dates .= ',"'.date_i18n("d M", $result->thetime).'"';
											$clicks .= ','.$result->clicks;
											$impressions .= ','.$result->impressions;
										}
						
										$dates = trim($dates, ",");
										$clicks = trim($clicks, ",");
										$impressions = trim($impressions, ",");
										
										echo '<div id="chart-1" style="height:150px; width:100%;"></div>';
										adrotate_draw_graph(1, $dates, $clicks, $impressions);
									} else {
										_e('No data to show!', 'adrotate');
									} 
									?>
								</td>
							</tr>
							</tbody>
						</table>

						<div class="versions">
							<span id="adrotate-version-message"><?php _e('You are using', 'adrotate'); ?> <strong>AdRotate <?php echo ADROTATE_DISPLAY; ?></strong>.</span>
							<br class="clear">
						</div>
					</div>
				</div>
				
				<h3><?php _e('AdRotate News and Developer Blog', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<?php wp_widget_rss_output(array(
							'url' => array('http://feeds.feedburner.com/AdrotatePluginForWordpress', 'http://meandmymac.net/feed/', 'http://www.ajdg.net/news/rss/'), 
							'title' => 'AdRotate Development News', 
							'items' => 4, 
							'show_summary' => 1, 
							'show_author' => 0, 
							'show_date' => 1)
							); ?>
					</div>
				</div>

			</div>
		</div>

		<div id="postbox-container-3" class="postbox-container" style="width:50%;">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">
						
				<h3><?php _e('AdRotate Store', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<p><h4><?php _e('AdRotate Pro', 'adrotate'); ?></h4> <?php _e('Get more features! Get AdRotate Pro.', 'adrotate'); ?> <a href="http://www.adrotateplugin.com/adrotate-pro/"><?php _e('More info', 'adrotate'); ?> &raquo;</a></p>
						<p><h4><?php _e('Installations', 'adrotate'); ?></h4> <?php _e('Not sure how to set up AdRotate? Get me to do it!', 'adrotate'); ?> <a href="http://www.adrotateplugin.com/installations/"><?php _e('More info', 'adrotate'); ?> &raquo;</a></p>
						<p><h4><?php _e('Premium Support', 'adrotate'); ?></h4> <?php _e("Stuck with AdRotate? I'll help!", 'adrotate'); ?> <a href="http://www.adrotateplugin.com/shop/category/premium-support/"><?php _e('More info', 'adrotate'); ?> &raquo;</a></p>
						<p><h4><?php _e('Periodic Maintenance', 'adrotate'); ?></h4> <?php _e("No time to get things done? Let's make a schedule!", 'adrotate'); ?> <a href="http://www.adrotateplugin.com/shop/category/service-and-maintenance/"><?php _e('More info', 'adrotate'); ?> &raquo;</a></p>
						<p><a href="http://www.adrotateplugin.com/shop/"><?php _e('Visit store to see all services and products', 'adrotate'); ?> &raquo;</a></p>
					</div>
				</div>

				<h3><?php _e('AdRotate Promotions', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<?php wp_widget_rss_output(array(
							'url' => array('http://www.ajdg.net/other/adrotate-news.xml'), 
							'title' => 'AdRotate News and Promotions', 
							'items' => 4, 
							'show_summary' => 0, 
							'show_author' => 0, 
							'show_date' => 1)
							); ?>
					</div>
				</div>

				<h3><?php _e('Support AdRotate', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<p><center><?php _e('Your gift will ensure the continued development of AdRotate!', 'adrotate'); ?></center></p>
						<p><center><a href="http://www.adrotateplugin.com/donate/" target="_blank"><img src="http://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" /></a></center></p>
					</div>
				</div>

				<h3><?php _e('AdRotate is brought to you by', 'adrotate'); ?></h3>
				<div class="postbox-adrotate">
					<div class="inside">
						<p><a href="http://www.ajdg.net" title="AJdG Solutions"><img src="<?php echo WP_CONTENT_URL; ?>/plugins/adrotate/images/ajdg-logo-100x60.png" alt="ajdg-logo-100x60" width="100" height="60" align="left" style="padding: 0 10px 10px 0;" /></a>
						<a href="http://www.ajdg.net" title="AJdG Solutions">AJdG Solutions</a> - <?php _e('Your one stop for Webdevelopment, consultancy and anything WordPress! If you need a custom plugin. Theme customizations or have your site moved/migrated entirely. Visit my website for details!', 'adrotate'); ?> <a href="http://www.ajdg.net" title="AJdG Solutions"><?php _e('Find out more', 'adrotate'); ?></a>!</p>

						<p><center><a href="https://twitter.com/AJdGSolutions" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Follow @AJdGSolutions</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></center></p>
					</div>
				</div>

			</div>	
		</div>

	</div>
	
	<div class="clear"></div>
</div>