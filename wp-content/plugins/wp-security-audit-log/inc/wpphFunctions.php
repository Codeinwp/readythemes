<?php if(! defined('WPPH_PLUGIN_NAME')) return;

/**
 * @param string $error  The error to display in the admin notice
 * This function can be used to generate an admin notice error
 */
function wpph_adminNotice($error) { echo '<div id="errMessage" class="error"><p><strong>'.WPPH_PLUGIN_NAME.' '.__('Error',WPPH_PLUGIN_TEXT_DOMAIN).':</strong> '.$error.'</p></div>'; }
function wpph_adminUpdate($message) { echo '<div id="errMessage" class="updated"><p><strong>'.$message.'</strong></p></div>'; }

add_action('wpph_set_post_type', 'wpph_setPostType', 1, 1);
function wpph_setPostType($postType){
    WPPHPost::$currentPostType = $postType;
    wpphLog(__FUNCTION__.' triggered', array('postType'=>$postType));
}


/**
 * Retrieve the custom post type from the given base post type
 * @since v0.4
 * @param string $baseType The post's base type from which to extract the custom type
 * @return string The custom post type
 */
function wpph_extractCustomPostType($baseType) { return substr($baseType, strpos($baseType,'-')+1); }

/**
 * Check to see whether or not the provided event is enabled
 * @since v0.4
 * @param integer $event the event to search for
 * @param array $events Optional. The list of events where to search for $event to see if it's enabled or not
 * @return bool
 */
function wpph_isEventEnabled($event, array $events = array())
{
    if(empty($event)){ return false; }
    if(empty($events)){
        $events = wpph_getPluginEventsList();
        if(empty($events)){
            wpphLog("Error retrieving the list of events from database. option: ".WPPH_PLUGIN_EVENTS_LIST_OPTION_NAME." was either not found or empty.");
            return false;
        }
    }
    $event = (int)$event;
    foreach($events as $sections){
        foreach($sections as $_event => $enabled){
            if(($event == (int)$_event) && (bool)$enabled){
                return true;
            }
        }
    }
    return false;
}

// Add custom links on plugins page
function wpphCustomLinks($links) { return array_merge(array('<a href="admin.php?page=wpph_">Audit Log Viewer </a>', '<a href="admin.php?page=wpph_settings">'.__('Settings',WPPH_PLUGIN_TEXT_DOMAIN).'</a>'), $links); }
// Load text domain
function wpphLoadTextDomain() { load_plugin_textdomain(WPPH_PLUGIN_TEXT_DOMAIN, false, 'wp-security-audit-log/languages/'); }


/**
 * @internal
 * @param string $pluginName
 * @param int $userID
 * @param string $userIP
 */
function wpph_installPlugin($pluginName, $userID, $userIP)
{
    if(! empty($_GET['plugin']))
    {
        WPPHEvent::_addLogEvent(5000,$userID, $userIP, array($pluginName));
        wpphLog('Plugin installed.', array('plugin'=>$pluginName));
    }
}

function wpph_updatePluginEventsList($data)
{
    if(WPPH::isMultisite()){
        update_blog_option((int)get_option(WPPH_MAIN_SITE_ID_OPTION_NAME), WPPH_PLUGIN_EVENTS_LIST_OPTION_NAME, $data);
    }
    else { update_option(WPPH_PLUGIN_EVENTS_LIST_OPTION_NAME, $data); }
}

function wpph_getPluginEventsList()
{
    return WPPHNetwork::getGlobalOption(WPPH_PLUGIN_EVENTS_LIST_OPTION_NAME, true, true);
}

function wpph_formatJsonOutput(array $sourceData=array(), $error=''){
    return json_encode(array(
        'dataSource' => $sourceData,
        'error' => $error
    ));
};