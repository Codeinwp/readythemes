<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/

/*-------------------------------------------------------------
 Name:      adrotate_insert_input

 Purpose:   Prepare input form on saving new or updated banners
 Receive:   -None-
 Return:	-None-
 Since:		0.1 
-------------------------------------------------------------*/
function adrotate_insert_input() {
	global $wpdb, $adrotate_config;

	if(wp_verify_nonce($_POST['adrotate_nonce'], 'adrotate_save_ad')) {
		// Mandatory
		$id = $author = $title = $bannercode = $active = $sortorder = '';
		if(isset($_POST['adrotate_id'])) $id = $_POST['adrotate_id'];
		if(isset($_POST['adrotate_username'])) $author = $_POST['adrotate_username'];
		if(isset($_POST['adrotate_title'])) $title = strip_tags(htmlspecialchars(trim($_POST['adrotate_title'], "\t\n "), ENT_QUOTES));
		if(isset($_POST['adrotate_bannercode'])) $bannercode = htmlspecialchars(trim($_POST['adrotate_bannercode'], "\t\n "), ENT_QUOTES);
		$thetime = adrotate_now();
		if(isset($_POST['adrotate_active'])) $active = strip_tags(htmlspecialchars(trim($_POST['adrotate_active'], "\t\n "), ENT_QUOTES));
		if(isset($_POST['adrotate_sortorder'])) $sortorder = strip_tags(htmlspecialchars(trim($_POST['adrotate_sortorder'], "\t\n "), ENT_QUOTES));

		// Schedule and timeframe variables
		$sday = $smonth = $syear = $shour = $sminute = '';
		if(isset($_POST['adrotate_sday'])) $sday = strip_tags(trim($_POST['adrotate_sday'], "\t\n "));
		if(isset($_POST['adrotate_smonth'])) $smonth = strip_tags(trim($_POST['adrotate_smonth'], "\t\n "));
		if(isset($_POST['adrotate_syear'])) $syear = strip_tags(trim($_POST['adrotate_syear'], "\t\n "));
		if(isset($_POST['adrotate_shour'])) $shour = strip_tags(trim($_POST['adrotate_shour'], "\t\n "));
		if(isset($_POST['adrotate_sminute'])) $sminute = strip_tags(trim($_POST['adrotate_sminute'], "\t\n "));

		$eday = $emonth = $eyear = $ehour = $eminute = '';
		if(isset($_POST['adrotate_eday'])) $eday = strip_tags(trim($_POST['adrotate_eday'], "\t\n "));
		if(isset($_POST['adrotate_emonth'])) $emonth = strip_tags(trim($_POST['adrotate_emonth'], "\t\n "));
		if(isset($_POST['adrotate_eyear'])) $eyear = strip_tags(trim($_POST['adrotate_eyear'], "\t\n "));
		if(isset($_POST['adrotate_ehour'])) $ehour = strip_tags(trim($_POST['adrotate_ehour'], "\t\n "));
		if(isset($_POST['adrotate_eminute'])) $eminute = strip_tags(trim($_POST['adrotate_eminute'], "\t\n "));
	
		$maxclicks = $maxshown = '';
		if(isset($_POST['adrotate_maxclicks'])) $maxclicks = strip_tags(trim($_POST['adrotate_maxclicks'], "\t\n "));
		if(isset($_POST['adrotate_maxshown'])) $maxshown = strip_tags(trim($_POST['adrotate_maxshown'], "\t\n "));

		// Advanced options
		$advertiser = $image_field = $image_dropdown = $link = $tracker = '';
		if(isset($_POST['adrotate_advertiser'])) $advertiser = 0;
		if(isset($_POST['adrotate_image'])) $image_field = strip_tags(trim($_POST['adrotate_image'], "\t\n "));
		if(isset($_POST['adrotate_image_dropdown'])) $image_dropdown = strip_tags(trim($_POST['adrotate_image_dropdown'], "\t\n "));
		if(isset($_POST['adrotate_link'])) $link = strip_tags(trim($_POST['adrotate_link'], "\t\n "));
		if(isset($_POST['adrotate_tracker'])) $tracker = strip_tags(trim($_POST['adrotate_tracker'], "\t\n "));
		
		// Misc variabled
		$groups = $type = $group_array = '';
		if(isset($_POST['groupselect'])) $groups = $_POST['groupselect'];
		if(isset($_POST['adrotate_type'])) $type = strip_tags(trim($_POST['adrotate_type'], "\t\n "));
	
	
		if(current_user_can('adrotate_ad_manage')) {
			if(strlen($title) < 1) {
				$title = 'Ad '.$id;
			}
	
			// Sort out start dates
			if(strlen($smonth) > 0 AND !is_numeric($smonth)) 	$smonth 	= date_i18n('m');
			if(strlen($sday) > 0 AND !is_numeric($sday)) 		$sday 		= date_i18n('d');
			if(strlen($syear) > 0 AND !is_numeric($syear)) 		$syear 		= date_i18n('Y');
			if(strlen($shour) > 0 AND !is_numeric($shour)) 		$shour 		= date_i18n('H');
			if(strlen($sminute) > 0 AND !is_numeric($sminute))	$sminute	= date_i18n('i');
			if(($smonth > 0 AND $sday > 0 AND $syear > 0) AND strlen($shour) == 0) $shour = '00';
			if(($smonth > 0 AND $sday > 0 AND $syear > 0) AND strlen($sminute) == 0) $sminute = '00';
	
			if($smonth > 0 AND $sday > 0 AND $syear > 0) {
				$startdate = mktime($shour, $sminute, 0, $smonth, $sday, $syear);
			} else {
				$startdate = 0;
			}
			
			// Sort out end dates
			if(strlen($emonth) > 0 AND !is_numeric($emonth)) 	$emonth 	= $smonth;
			if(strlen($eday) > 0 AND !is_numeric($eday)) 		$eday 		= $sday;
			if(strlen($eyear) > 0 AND !is_numeric($eyear)) 		$eyear 		= $syear+1;
			if(strlen($ehour) > 0 AND !is_numeric($ehour)) 		$ehour 		= $shour;
			if(strlen($eminute) > 0 AND !is_numeric($eminute)) 	$eminute	= $sminute;
			if(($emonth > 0 AND $eday > 0 AND $eyear > 0) AND strlen($ehour) == 0) $ehour = '00';
			if(($emonth > 0 AND $eday > 0 AND $eyear > 0) AND strlen($eminute) == 0) $eminute = '00';
	
			if($emonth > 0 AND $eday > 0 AND $eyear > 0) {
				$enddate = mktime($ehour, $eminute, 0, $emonth, $eday, $eyear);
			} else {
				$enddate = 0;
			}
			
			// Enddate is too early, reset to default
			if($enddate <= $startdate) $enddate = $startdate + 7257600; // 84 days (12 weeks)
		
			// Validate sort order
			if(strlen($sortorder) < 1 OR !is_numeric($sortorder) AND ($sortorder < 1 OR $sortorder > 99999)) $sortorder = 0;
	
			// Sort out click and impressions restrictions
			if(strlen($maxclicks) < 1 OR !is_numeric($maxclicks))	$maxclicks	= 0;
			if(strlen($maxshown) < 1 OR !is_numeric($maxshown))		$maxshown	= 0;
		
			// Set tracker value
			if(isset($tracker) AND strlen($tracker) != 0) $tracker = 'Y';
				else $tracker = 'N';
	
			// Format the URL (assume http://)
			if((strlen($link) > 0 OR $link != "") AND stristr($link, "http://") === false AND stristr($link, "https://") === false) $link = "http://".$link;
			
			// Determine image settings ($image_field has priority!)
			if(strlen($image_field) > 1) {
				$imagetype = "field";
				$image = $image_field;
			} else if(strlen($image_dropdown) > 1) {
				$imagetype = "dropdown";
				$image = home_url()."/wp-content/banners/".$image_dropdown;
			} else {
				$imagetype = "";
				$image = "";
			}
	
			// Save schedule for new ads or update the existing one
			$schedule_id = $wpdb->get_var("SELECT `schedule` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = ".$id." AND `group` = 0 AND `block` = 0 AND `user` = 0 ORDER BY `id` DESC LIMIT 1;"); 
			$wpdb->update($wpdb->prefix.'adrotate_schedule', array('starttime' => $startdate, 'stoptime' => $enddate, 'maxclicks' => $maxclicks, 'maximpressions' => $maxshown), array('id' => $schedule_id));

			// Save the ad to the DB
			$wpdb->update($wpdb->prefix.'adrotate', array('title' => $title, 'bannercode' => $bannercode, 'updated' => $thetime, 'author' => $author, 'imagetype' => $imagetype, 'image' => $image, 'link' => $link, 'tracker' => $tracker, 'sortorder' => $sortorder), array('id' => $id));

			if($active == "active") {
				// Determine status of ad 
				$adstate = adrotate_evaluate_ad($id);
				if($adstate == 'error') {
					$action = 'field_error';
					$active = 'error';
				} else if($adstate == 'expired') {
					$action = 'field_error';
					$active = 'expired';
				} else if($adstate == 'expiring') {
					$action = 'field_error';
					$active = 'expiring';
				} else {
					if($type == "empty") $action = 'new';
						else $action = 'update';
				}
			} else {
				if($type == "empty") $action = 'new';
					else $action = 'update';
			} 
		    $wpdb->update($wpdb->prefix."adrotate", array('type' => $active), array('id' => $id));
	
			// Fetch group records for the ad
			$groupmeta = $wpdb->get_results($wpdb->prepare("SELECT `group` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = %d AND `block` = 0 AND `user` = 0 AND `schedule` = 0;", $id));
			$group_array = array();
			foreach($groupmeta as $meta) {
				$group_array[] = $meta->group;
			}
			
			
			// Add new groups to this ad
			if(!is_array($groups)) $groups = array();
			$insert = array_diff($groups, $group_array);
			foreach($insert as &$value) {
				$wpdb->insert($wpdb->prefix.'adrotate_linkmeta', array('ad' => $id, 'group' => $value, 'block' => 0, 'user' => 0, 'schedule' => 0));
			}
			unset($value);
			
			// Remove groups from this ad
			$delete = array_diff($group_array, $groups);
			foreach($delete as &$value) {
				$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = %d AND `group` = %d AND `block` = 0 AND `user` = 0 AND `schedule` = 0;", $id, $value)); 
			}
			unset($value);
	
			adrotate_return($action, array($id));
			exit;
		} else {
			adrotate_return('no_access');
		}
	} else {
		adrotate_nonce_error();
		exit;
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_insert_group

 Purpose:   Save provided data for groups, update linkmeta where required
 Receive:   -None-
 Return:	-None-
 Since:		0.4
-------------------------------------------------------------*/
function adrotate_insert_group() {
	global $wpdb, $adrotate_config;

	if(wp_verify_nonce($_POST['adrotate_nonce'], 'adrotate_save_group')) {	
		$action = $id = $name = $modus = '';
		if(isset($_POST['adrotate_action'])) $action = $_POST['adrotate_action'];
		if(isset($_POST['adrotate_id'])) $id = $_POST['adrotate_id'];
		if(isset($_POST['adrotate_groupname'])) $name = strip_tags(trim($_POST['adrotate_groupname'], "\t\n "));
		if(isset($_POST['adrotate_modus'])) $modus = strip_tags(trim($_POST['adrotate_modus'], "\t\n "));

		$rows = $columns = $adwidth = $adheight = $admargin = $adspeed = '';
		if(isset($_POST['adrotate_gridrows'])) $rows = strip_tags(trim($_POST['adrotate_gridrows'], "\t\n "));
		if(isset($_POST['adrotate_gridcolumns'])) $columns = strip_tags(trim($_POST['adrotate_gridcolumns'], "\t\n "));
		if(isset($_POST['adrotate_adwidth'])) $adwidth = strip_tags(trim($_POST['adrotate_adwidth'], "\t\n "));
		if(isset($_POST['adrotate_adheight'])) $adheight = strip_tags(trim($_POST['adrotate_adheight'], "\t\n "));
		if(isset($_POST['adrotate_admargin'])) $admargin = strip_tags(trim($_POST['adrotate_admargin'], "\t\n "));
		if(isset($_POST['adrotate_adspeed'])) $adspeed = strip_tags(trim($_POST['adrotate_adspeed'], "\t\n "));

		$ads = $sortorder = '';
		if(isset($_POST['adselect'])) $ads = $_POST['adselect'];
		if(isset($_POST['adrotate_sortorder'])) $sortorder = strip_tags(htmlspecialchars(trim($_POST['adrotate_sortorder'], "\t\n "), ENT_QUOTES));

		$categories = $category_loc = $pages = $page_loc = '';
		if(isset($_POST['adrotate_categories'])) $categories = $_POST['adrotate_categories'];
		if(isset($_POST['adrotate_cat_location'])) $category_loc = $_POST['adrotate_cat_location'];
		if(isset($_POST['adrotate_pages'])) $pages = $_POST['adrotate_pages'];
		if(isset($_POST['adrotate_page_location'])) $page_loc = $_POST['adrotate_page_location'];

		$wrapper_before = $wrapper_after = '';
		if(isset($_POST['adrotate_wrapper_before'])) $wrapper_before = trim($_POST['adrotate_wrapper_before'], "\t\n ");
		if(isset($_POST['adrotate_wrapper_after'])) $wrapper_after = trim($_POST['adrotate_wrapper_after'], "\t\n ");
	
		if(current_user_can('adrotate_group_manage')) {
			if(strlen($name) < 1) $name = 'Group '.$id;
	
			if($modus < 0 OR $modus > 2) $modus = 0;
			if($adspeed < 0 OR $adspeed > 99999) $adspeed = 6000;
			
			// Sort out block shape
			if($rows < 1 OR $rows == '' OR !is_numeric($rows)) $rows = 2;
			if($columns < 1 OR $columns == '' OR !is_numeric($columns)) $columns = 2;
			if((is_numeric($adwidth) AND $adwidth < 1 OR $adwidth > 9999) OR $adwidth == '' OR (!is_numeric($adwidth) AND $adwidth != 'auto')) $adheight = '125';
			if((is_numeric($adheight) AND $adheight < 1 OR $adheight > 9999) OR $adheight == '' OR (!is_numeric($adheight) AND $adheight != 'auto')) $adheight = '125';
			if($admargin < 0 OR $admargin > 99 OR $admargin == '' OR !is_numeric($admargin)) $admargin = 0;
	
			// Validate sort order
			if(strlen($sortorder) < 1 OR !is_numeric($sortorder) AND ($sortorder < 1 OR $sortorder > 99999)) $sortorder = $id;
	
			// Categories
			if(!is_array($categories)) $categories = array();
			$category = '';
			foreach($categories as $key => $value) {
				$category = $category.','.$value;
			}
			$category = trim($category, ',');
			if(strlen($category) < 1) $category = '';
			if($category_loc < 0 OR $category_loc > 3) $category_loc = 0;
	
			// Pages
			if(!is_array($pages)) $pages = array();
			$page = '';
			foreach($pages as $key => $value) {
				$page = $page.','.$value;
			}
			$page = trim($page, ',');
			if(strlen($page) < 1) $page = '';
			if($page_loc < 0 OR $page_loc > 3) $page_loc = 0;
	
			if(empty($meta_array)) $meta_array = array();
			if(empty($ads)) $ads = array();

			// Fetch records for the group
			$linkmeta = $wpdb->get_results($wpdb->prepare("SELECT `ad` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = %d AND `block` = 0 AND `user` = 0;", $id));
			foreach($linkmeta as $meta) {
				$meta_array[] = $meta->ad;
			}
			
			// Add new ads to this group
			$insert = array_diff($ads,$meta_array);
			foreach($insert as &$value) {
				$wpdb->insert($wpdb->prefix.'adrotate_linkmeta', array('ad' => $value, 'group' => $id, 'block' => 0, 'user' => 0));
			}
			unset($value);
			
			// Remove ads from this group
			$delete = array_diff($meta_array,$ads);
			foreach($delete as &$value) {
				$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = %d AND `group` = %d AND `block` = 0 AND `user` = 0;", $value, $id)); 
			}
			unset($value);
	
			// Update the group itself
			$wpdb->update($wpdb->prefix.'adrotate_groups', array('name' => $name, 'modus' => $modus, 'fallback' => $fallback, 'sortorder' => $sortorder, 'cat' => $category, 'cat_loc' => $category_loc, 'page' => $page, 'page_loc' => $page_loc, 'wrapper_before' => $wrapper_before, 'wrapper_after' => $wrapper_after, 'gridrows' => $rows, 'gridcolumns' => $columns, 'admargin' => $admargin, 'adwidth' => $adwidth, 'adheight' => $adheight, 'adspeed' => $adspeed), array('id' => $id));
			adrotate_return($action, array($id));
			exit;
		} else {
			adrotate_return('no_access');
		}
	} else {
		adrotate_nonce_error();
		exit;
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_request_action

 Purpose:   Prepare action for banner or group from database
 Receive:   -none-
 Return:    -none-
 Since:		2.2
-------------------------------------------------------------*/
function adrotate_request_action() {
	global $wpdb, $adrotate_config;

	if(wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_ads_active') OR wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_ads_disable') 
	OR wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_ads_error') OR wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_ads_queue') OR 
	wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_blocks') OR wp_verify_nonce($_POST['adrotate_nonce'],'adrotate_bulk_groups')) {
		if(isset($_POST['bannercheck'])) $banner_ids = $_POST['bannercheck'];
		if(isset($_POST['disabledbannercheck'])) $banner_ids = $_POST['disabledbannercheck'];
		if(isset($_POST['errorbannercheck'])) $banner_ids = $_POST['errorbannercheck'];
		if(isset($_POST['groupcheck'])) $group_ids = $_POST['groupcheck'];
		if(isset($_POST['blockcheck'])) $block_ids = $_POST['blockcheck'];
		if(isset($_POST['adrotate_id'])) $banner_ids = array($_POST['adrotate_id']);
		
		// Determine which kind of action to use
		if(isset($_POST['adrotate_action'])) {
			// Default action call
			$actions = $_POST['adrotate_action'];
		} else if(isset($_POST['adrotate_disabled_action'])) {
			// Disabled ads listing call
			$actions = $_POST['adrotate_disabled_action'];
		} else if(isset($_POST['adrotate_error_action'])) {
			// Erroneous ads listing call
			$actions = $_POST['adrotate_error_action'];
		} else {
			// If neither, protect user with invalid ID
			$banner_ids = $group_ids = $block_ids = '';
		}
		list($action, $specific) = explode("-", $actions);	
	
		if($banner_ids != '') {
			foreach($banner_ids as $banner_id) {
				if($action == 'deactivate') {
					if(current_user_can('adrotate_ad_manage')) {
						adrotate_active($banner_id, 'deactivate');
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'activate') {
					if(current_user_can('adrotate_ad_manage')) {
						adrotate_active($banner_id, 'activate');
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'delete') {
					if(current_user_can('adrotate_ad_delete')) {
						adrotate_delete($banner_id, 'banner');
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'reset') {
					if(current_user_can('adrotate_ad_delete')) {
						adrotate_reset($banner_id);
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'renew') {
					if(current_user_can('adrotate_ad_manage')) {
						adrotate_renew($banner_id, $specific);
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'weight') {
					if(current_user_can('adrotate_ad_manage')) {
						adrotate_weight($banner_id, $specific);
						$result_id = $banner_id;
					} else {
						adrotate_return('no_access');
					}
				}
			}
			adrotate_prepare_evaluate_ads(false);
		}
		
		if($group_ids != '') {
			foreach($group_ids as $group_id) {
				if($action == 'group_delete') {
					if(current_user_can('adrotate_group_delete')) {
						adrotate_delete($group_id, 'group');
						$result_id = $group_id;
					} else {
						adrotate_return('no_access');
					}
				}
				if($action == 'group_delete_banners') {
					if(current_user_can('adrotate_group_delete')) {
						adrotate_delete($group_id, 'bannergroup');
						$result_id = $group_id;
					} else {
						adrotate_return('no_access');
					}
				}
			}
		 }
	
		if($block_ids != '') {
			foreach($block_ids as $block_id) {
				if($action == 'block_delete') {
					if(current_user_can('adrotate_block_delete')) {
						adrotate_delete($block_id, 'block');
						$result_id = $block_id;
					} else {
						adrotate_return('no_access');
					}
				}
			}
		 }
		
		adrotate_return($action, array($result_id));
	} else {
		adrotate_nonce_error();
		exit;
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_delete

 Purpose:   Remove banner or group from database
 Receive:   $id, $what
 Return:    -none-
 Since:		0.1
-------------------------------------------------------------*/
function adrotate_delete($id, $what) {
	global $wpdb;

	if($id > 0) {
		if($what == 'banner') {
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate` WHERE `id` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_stats` WHERE `ad` = %d;", $id));
			adrotate_prepare_evaluate_ads(false);
		} else if ($what == 'group') {
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_groups` WHERE `id` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = %d;", $id));
			adrotate_prepare_evaluate_ads(false);
		} else if ($what == 'block') {
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_blocks` WHERE `id` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `block` = %d;", $id));
			adrotate_prepare_evaluate_ads(false);
		} else if ($what == 'bannergroup') {
			$linkmeta = $wpdb->get_results($wpdb->prepare("SELECT `ad` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = %d AND `block` = '0';", $id));
			foreach($linkmeta as $meta) {
				$wpdb->query("DELETE FROM `".$wpdb->prefix."adrotate` WHERE `id` = ".$meta->ad.";");
				$wpdb->query("DELETE FROM `".$wpdb->prefix."adrotate_stats` WHERE `ad` = ".$meta->ad.";");
				$wpdb->query("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = ".$meta->ad.";");
			}
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_groups` WHERE `id` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = %d;", $id));
			$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_stats` WHERE `group` = %d;", $id)); // Perhaps unnessesary
			adrotate_prepare_evaluate_ads(false);
		} else {
			adrotate_return('error');
			exit;
		}
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_active

 Purpose:   Activate or Deactivate a banner
 Receive:   $id, $what
 Return:    -none-
 Since:		0.1
-------------------------------------------------------------*/
function adrotate_active($id, $what) {
	global $wpdb;

	if($id > 0) {
		if($what == 'deactivate') {
			$wpdb->update($wpdb->prefix.'adrotate', array('type' => 'disabled'), array('id' => $id));
		}
		if ($what == 'activate') {
			// Determine status of ad 
			$adstate = adrotate_evaluate_ad($id);
			if($adstate == 'error' OR $adstate == 'expired') $adtype = 'error';
				else $adtype = 'active';
			$wpdb->update($wpdb->prefix.'adrotate', array('type' => $adtype), array('id' => $id));
		}
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_reset

 Purpose:   Reset statistics for a banner
 Receive:   $id
 Return:    -none-
 Since:		2.2
-------------------------------------------------------------*/
function adrotate_reset($id) {
	global $wpdb;

	if($id > 0) {
		$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_stats` WHERE `ad` = %d", $id));
		$wpdb->query($wpdb->prepare("DELETE FROM `".$wpdb->prefix."adrotate_tracker` WHERE `bannerid` = %d", $id));
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_renew

 Purpose:   Renew the end date of a banner with a new schedule starting where the last ended
 Receive:   $id, $howlong
 Return:    -none-
 Since:		2.2
-------------------------------------------------------------*/
function adrotate_renew($id, $howlong = 2592000) {
	global $wpdb;

	if($id > 0) {
		$schedule_id = $wpdb->get_var($wpdb->prepare("SELECT `schedule` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = %d AND `group` = 0 AND `block` = 0 AND `user` = 0 ORDER BY `id` DESC LIMIT 1;", $id)); 
		if($schedule_id > 0) {
			$wpdb->query("UPDATE `".$wpdb->prefix."adrotate_schedule` SET `stoptime` = `stoptime` + $howlong WHERE `id` = $schedule_id;");
		} else {
			$now = adrotate_now();
			$stoptime = $now + $howlong;
			$wpdb->insert($wpdb->prefix.'adrotate_schedule', array('name' => 'Schedule for ad '.$id, 'starttime' => $now, 'stoptime' => $stoptime, 'maxclicks' => 0, 'maximpressions' => 0));
			$wpdb->insert($wpdb->prefix.'adrotate_linkmeta', array('ad' => $id, 'group' => 0, 'block' => 0, 'user' => 0, 'schedule' => $wpdb->insert_id));
		}
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_options_submit

 Purpose:   Save options from dashboard
 Receive:   $_POST
 Return:    -none-
 Since:		0.1
-------------------------------------------------------------*/
function adrotate_options_submit() {

	if(wp_verify_nonce($_POST['adrotate_nonce_settings'],'adrotate_settings')) {
		// Set and save user roles
		adrotate_set_capability($_POST['adrotate_ad_manage'], "adrotate_ad_manage");
		adrotate_set_capability($_POST['adrotate_ad_delete'], "adrotate_ad_delete");
		adrotate_set_capability($_POST['adrotate_group_manage'], "adrotate_group_manage");
		adrotate_set_capability($_POST['adrotate_group_delete'], "adrotate_group_delete");
		adrotate_set_capability($_POST['adrotate_block_manage'], "adrotate_block_manage");
		adrotate_set_capability($_POST['adrotate_block_delete'], "adrotate_block_delete");
		$config['ad_manage'] 			= $_POST['adrotate_ad_manage'];
		$config['ad_delete'] 			= $_POST['adrotate_ad_delete'];
		$config['group_manage'] 		= $_POST['adrotate_group_manage'];
		$config['group_delete'] 		= $_POST['adrotate_group_delete'];
		$config['block_manage'] 		= $_POST['adrotate_block_manage'];
		$config['block_delete'] 		= $_POST['adrotate_block_delete'];

		//Advertisers
		if(isset($_POST['adrotate_enable_stats'])) $config['enable_stats'] = 'Y';
			else $config['enable_stats'] = 'N';

		// Set the banner folder, reset if empty
		$config['banner_folder'] = "/wp-content/banners/";

		// Turn option off.
		$config['notification_email_switch'] = 'N';
		$config['notification_email'] = array();
		$config['advertiser_email'] = array();
	
		// Set up impression tracker timer
		$impression_timer = trim($_POST['adrotate_impression_timer']);
		if(strlen($impression_timer) > 0 AND (is_numeric($impression_timer) AND $impression_timer >= 0 AND $impression_timer <= 3600)) {
			$config['impression_timer'] = $impression_timer;
		} else {
			$config['impression_timer'] = 10;
		}
	
		// Miscellaneous Options
		if(isset($_POST['adrotate_widgetalign'])) 			$config['widgetalign'] 		= 'Y';
			else 											$config['widgetalign'] 		= 'N';
		if(isset($_POST['adrotate_widgetpadding'])) 		$config['widgetpadding']	= 'Y';
			else 											$config['widgetpadding']	= 'N';
		if(isset($_POST['adrotate_w3caching'])) 			$config['w3caching'] 		= 'Y';
			else 											$config['w3caching'] 		= 'N';
		if(isset($_POST['adrotate_supercache'])) 			$config['supercache'] 		= 'Y';
			else 											$config['supercache'] 		= 'N';
		if(isset($_POST['adrotate_jquery'])) 				$config['jquery'] 			= 'Y';
			else 											$config['jquery'] 			= 'N';
		if(isset($_POST['adrotate_jshowoff'])) 				$config['jshowoff'] 		= 'Y';
			else 											$config['jshowoff'] 		= 'N';
		if(isset($_POST['adrotate_clicktracking']))			$config['clicktracking'] 	= 'Y';
			else											$config['clicktracking'] 	= 'N';
		if(isset($_POST['adrotate_jsfooter'])) 				$config['jsfooter'] 		= 'Y';
			else 											$config['jsfooter'] 		= 'N';

		update_option('adrotate_config', $config);
	
		// Sort out crawlers
		$crawlers = explode(',', trim($_POST['adrotate_crawlers']));
		$clean_crawler = array();
		foreach($crawlers as $crawler) {
			$crawler = preg_replace('/[^a-zA-Z0-9\[\]\-_:; ]/i', '', trim($crawler));
			if(strlen($crawler) > 0) $clean_crawler[] = $crawler;
		}
		update_option('adrotate_crawlers', $clean_crawler);
	
		// Debug option
		if(isset($_POST['adrotate_debug'])) 				$debug['general'] 		= true;
			else 											$debug['general']		= false;
		if(isset($_POST['adrotate_debug_dashboard'])) 		$debug['dashboard'] 	= true;
			else 											$debug['dashboard']		= false;
		if(isset($_POST['adrotate_debug_userroles'])) 		$debug['userroles'] 	= true;
			else 											$debug['userroles']		= false;
		if(isset($_POST['adrotate_debug_userstats'])) 		$debug['userstats'] 	= true;
			else 											$debug['userstats']		= false;
		if(isset($_POST['adrotate_debug_stats'])) 			$debug['stats'] 		= true;
			else 											$debug['stats']			= false;
		if(isset($_POST['adrotate_debug_timers'])) 			$debug['timers'] 		= true;
			else 											$debug['timers']		= false;
		if(isset($_POST['adrotate_debug_track'])) 			$debug['track'] 		= true;
			else 											$debug['track']			= false;
		update_option('adrotate_debug', $debug);
	
		// Return to dashboard
		adrotate_return('settings_saved');
	} else {
		adrotate_nonce_error();
		exit;
	}
}

/*-------------------------------------------------------------
 Name:      adrotate_prepare_roles

 Purpose:   Prepare user roles for WordPress
 Receive:   -None-
 Return:    $action
 Since:		3.0
-------------------------------------------------------------*/
function adrotate_prepare_roles() {
	
	if(isset($_POST['adrotate_role_add_submit'])) {
		$action = "role_add";
		adrotate_add_roles();		
		update_option('adrotate_roles', '1');
	} 
	if(isset($_POST['adrotate_role_remove_submit'])) {
		$action = "role_remove";
		adrotate_remove_roles();
		update_option('adrotate_roles', '0');
	} 

	adrotate_return($action);
}

/*-------------------------------------------------------------
 Name:      adrotate_add_roles

 Purpose:   Add User roles and capabilities
 Receive:   -None-
 Return:    -None-
 Since:		3.0
-------------------------------------------------------------*/
function adrotate_add_roles() {
	add_role('adrotate_advertiser', 'AdRotate Advertiser', array('read' => 1));
}

/*-------------------------------------------------------------
 Name:      adrotate_remove_roles

 Purpose:   Remove User roles and capabilities
 Receive:   -None-
 Return:    -None-
 Since:		3.0
-------------------------------------------------------------*/
function adrotate_remove_roles() {
	remove_role('adrotate_advertiser');
}
?>