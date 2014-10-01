<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/

/*-------------------------------------------------------------
 Purpose:   Facilitate outgoing affiliate links
 Receive:   $_GET
 Return:	-None-
 Since:		3.9.2
-------------------------------------------------------------*/
if(isset($_POST['track']) OR isset($_GET['track'])) {

	require('../../../../wp-load.php');
	global $wpdb, $adrotate_crawlers, $adrotate_config, $adrotate_debug, $adrotate_geo;

	if(isset($_POST['track'])) {
		$meta = $_POST['track'];
	} else {
		$meta = $_GET['track'];
	}

	if($adrotate_debug['track'] != true) {
		$meta = base64_decode($meta);
	}
	
	$meta = esc_attr($meta);
	list($ad, $group, $block, $remote, $blog_id) = explode(",", $meta, 5);

	if(is_numeric($ad) AND is_numeric($group) AND is_numeric($block) AND is_numeric($remote)) {
		$useragent 	= trim($_SERVER['HTTP_USER_AGENT'], ' \t\r\n\0\x0B');
		$prefix 	= $wpdb->get_blog_prefix($blog_id);
		$remote_ip 	= adrotate_get_remote_ip();
		$now 		= adrotate_now();
	
		if($adrotate_debug['timers'] == true) {
			$ip = 0;
		} else {
			$ip = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM `".$prefix."adrotate_tracker` WHERE `ipaddress` = '%s' AND `stat` = 'c' AND `timer` < $now + 86400 AND `bannerid` = %d LIMIT 1;", $remote_ip, $ad));
		}

		if(($adrotate_config['enable_loggedin_clicks'] == 'Y' AND is_user_logged_in()) OR !is_user_logged_in()) {
			if(is_array($adrotate_crawlers)) {
				$crawlers = $adrotate_crawlers;
			} else {
				$crawlers = array();
			}
		
			$nocrawler = array(0);
			foreach ($crawlers as $crawler) {
				if(preg_match("/$crawler/i", $useragent)) $nocrawler[] = 1;
			}
	
			if($ip < 1 AND !in_array(1, $nocrawler) AND !empty($useragent)) {
				$today = adrotate_date_start('day');
	
				$stats = $wpdb->get_var($wpdb->prepare("SELECT `id` FROM `".$prefix."adrotate_stats` WHERE `ad` = %d AND `group` = %d AND `thetime` = $today;", $ad, $group));
				if($stats > 0) {
					$wpdb->query("UPDATE `".$prefix."adrotate_stats` SET `clicks` = `clicks` + 1 WHERE `id` = $stats;");
				} else {
					$wpdb->insert($prefix.'adrotate_stats', array('ad' => $ad, 'group' => $group, 'block' => 0, 'thetime' => $today, 'clicks' => 1, 'impressions' => 1));
				}
	
				if($remote_ip != "unknown" AND !empty($remote_ip)) {
					$wpdb->insert($prefix.'adrotate_tracker', array('ipaddress' => $remote_ip, 'timer' => $now, 'bannerid' => $ad, 'stat' => 'c', 'useragent' => $useragent, 'country' => '', 'city' => ''));
				}
			}
		}
	
		if($remote == 1) {
			$bannerurl = $wpdb->get_var("SELECT `link` FROM `".$prefix."adrotate` WHERE `id` = $ad;");
			wp_redirect(htmlspecialchars_decode($bannerurl), 302);		
		}
		unset($nocrawler, $crawlers, $ip, $remote_ip, $useragent, $track, $meta, $ad, $group, $block, $remote, $bannerurl);
	}
}
exit();
?>