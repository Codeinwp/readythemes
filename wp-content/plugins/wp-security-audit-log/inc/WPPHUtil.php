<?php
class WPPHUtil
{
    static function loadPluggable(){ @include_once(ABSPATH.'wp-includes/pluggable.php'); }

    static function getIP() { return(!empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0'); }

    /**
     * Check to see whether or not the current user is an administrator
     * @param int $userId
     * @return bool
     */
    static function isAdministrator($userId=0){ if(empty($userId)){$userId = wp_get_current_user();} return user_can($userId,'administrator'); }

    /**
     * Will respond to the ajax requests getting the events
     */
    static function get_events_html()
    {
        // VALIDATE REQUEST
        $rm = strtoupper($_SERVER['REQUEST_METHOD']);
        if($rm != 'POST'){ exit('<tr><td colspan="7"><span>'.__('Error: Invalid request',WPPH_PLUGIN_TEXT_DOMAIN).'</span></td></tr>'); }

        // set defaults
        $orderBy = 'EventNumber';
        $sort = 'desc';
        $limit = array(0, 50);

        if(!empty($_POST['orderBy'])) { $orderBy = $_POST['orderBy']; }
        if(!empty($_POST['sort'])) {
            if(0 == strcasecmp($_POST['sort'],'asc')){ $sort = 'asc'; }
        }
        if(isset($_POST['offset'])) { $limit[0] = intval($_POST['offset']); }
        if(isset($_POST['count'])) { $limit[1] = intval($_POST['count']); }

        global $current_user, $blog_id;

        $out = array();
        $out['events'] = array();
        $globalBlogID = $blog_id;
        $is_wpmu = WPPH::isMultisite();
        $isMainSite = WPPHUtil::isMainSite();
        $isSA = false;
        $allSites = false;

        $blogList = ($isMainSite && $is_wpmu) ? self::get_blogs() : array();
        function _getBlogName($id, $blogList) {
            for ($i = 0; $i < count($blogList); $i++) {
                if ($blogList[$i]['blog_id'] == $id) {
                    return $blogList[$i]['blogname'];
                }
            }
        }

        if(!isset($_POST['blogID']) || empty($_POST['blogID'])){
            if($isMainSite){
                $postedBlogID = 0; // get the events for all sites by default
                $allSites = true;
            }
            else {
                $postedBlogID = $globalBlogID;
                $allSites = false;
            }
        }
        else { $postedBlogID = intval($_POST['blogID']); }

        if($is_wpmu){ $isSA = is_super_admin($current_user->ID); }
        else {
            if(empty($postedBlogID)){
                $postedBlogID = 1;
            }
        }

        if($is_wpmu && !$isSA)
        {
            // Only Super Admin can view other blogs' alerts
            if($globalBlogID <> $postedBlogID){
                $out['blogs'] = $blogList;
                exit( wpph_formatJsonOutput($out,__('There are no security alerts to display.',WPPH_PLUGIN_TEXT_DOMAIN)) );
            }
        }

        if(! $isMainSite){ $postedBlogID = $globalBlogID; }

        // get events
        if($allSites){
            $eventsCount = WPPHDB::getEventsCount(0);
            $events = WPPHEvent::getEvents($orderBy, $sort, $limit, 0);
        }
        else {
            $eventsCount = WPPHDB::getEventsCount($postedBlogID);
            $events = WPPHEvent::getEvents($orderBy, $sort, $limit, $postedBlogID);
        }
        $eventsNum = count($events);

        wpphLog("GETTING EVENTS FOR ".(empty($postedBlogID) ? 'ALL BLOGS' : 'BLOG: '.$postedBlogID).". Num events: $eventsNum");

        if($eventsNum == 0){
            if($is_wpmu){
                $out['blogs'] = $blogList;
                exit( wpph_formatJsonOutput($out,__('There are no security alerts to display.',WPPH_PLUGIN_TEXT_DOMAIN)) );
            }
            exit( wpph_formatJsonOutput(array(),__('There are no security alerts to display.',WPPH_PLUGIN_TEXT_DOMAIN)) );
        }

        // prepare output
        foreach($events as $entry)
        {
            $entry = (object)$entry;
            $eventNumber = $entry->EventNumber;
            $EventID = $entry->EventID;
            $EventDate = $entry->EventDate;
            $userIP = $entry->UserIP;
            $UserID = $entry->UserID;
            $blogId = $entry->BlogId;
            $eventData = ((!empty($entry->EventData)) ? unserialize(base64_decode($entry->EventData)) : ''); //<< values to use for event description

            $eventCount = intval($entry->EventCount);
            // get User Info
            if($UserID == 0){ $username = 'System'; }
            else {
                $user_info = get_userdata($UserID);
                $username = $user_info->user_login;
                $first_name = $user_info->user_firstname;
                $last_name = $user_info->user_lastname;
                $username = "$username ($first_name $last_name)";
            }

            // get event details
            $eventDetails = WPPHEvent::getEventDetailsData($EventID);

            // format event description message
            if($eventCount >=2 && $EventID == 1002){
                $evm = sprintf(__('<strong>%d</strong> failed login attempts from <strong>%s</strong> using <strong>%s</strong> as username.',WPPH_PLUGIN_TEXT_DOMAIN)
                    , $eventCount, $userIP, base64_decode($entry->UserName));
            }
            else {
                if(empty($eventData)) { $evm = $eventDetails->EventDescription; }
                else { $evm = vsprintf($eventDetails->EventDescription, $eventData); }
            }

            $e = array(
                'eventNumber' => $eventNumber,
                'eventId' => $EventID,
                'EventType' => $eventDetails->EventType,
                'eventDate' => $EventDate,
                'ip' => $userIP,
                'user' => $username,
                'siteName' => $allSites ? _getBlogName($blogId, $blogList) : '',
                'description' => stripslashes($evm)
            );
            array_push($out['events'], $e);
        }
        $out['eventsCount'] = $eventsCount;
        $out['blogID'] = $postedBlogID;
        $out['blogs'] = $blogList;
        exit(wpph_formatJsonOutput($out));
    }

    // @since v0.6
    static function get_blogs()
    {
        if(wp_is_large_network()){
            return get_blog_details(get_option(WPPH_MAIN_SITE_ID_OPTION_NAME),true);
        }
        $blogs = wp_get_sites();
        $out = array();
        foreach($blogs as $blog){
            $entry = get_blog_details($blog['blog_id']);
            array_push($out, array(
                'blog_id' => $entry->blog_id,
                'blogname' => $entry->blogname
            ));
        }
        array_unshift($out, array('blog_id' => 0, 'blogname' => 'All sites'));
        return $out;
    }

    static function addDashboardWidget()
    {
        if(! empty(WPPH::getPluginSettings()->showDW))
        {
            $currentUser = wp_get_current_user();
            if(WPPHUtil::isAdministrator($currentUser->ID)|| WPPHUtil::isAllowedAccess($currentUser->ID) || WPPHUtil::isAllowedChange($currentUser->ID)){
                wp_add_dashboard_widget('wpphPluginDashboardWidget', __('Latest WordPress Security Alerts').' | WP Security Audit Log', array(get_class(),'createDashboardWidget'));
            }
        }
    }
    static function createDashboardWidget()
    {
        // get and display data
        $results = WPPHEvent::getEvents('EventNumber', 'DESC', array(0,5));
        echo '<div>';
        if(empty($results))
        {
            echo '<p>'.__('No alerts found.',WPPH_PLUGIN_TEXT_DOMAIN).'</p>';
        }
        else {
            echo '<table class="wp-list-table widefat" cellspacing="0" cellpadding="0">';
                echo '<thead>';
                    echo '<th class="manage-column" style="width: 15%;" scope="col">'.__('User',WPPH_PLUGIN_TEXT_DOMAIN).'</th>';
                    echo '<th class="manage-column" style="width: 85%;" scope="col">'.__('Description',WPPH_PLUGIN_TEXT_DOMAIN).'</th>';
                echo '</thead>';
                echo '<tbody>';
                foreach($results as $entry)
                {
                    $entry = (object)$entry;
                    $eventID = $entry->EventID;
                    $userID = $entry->UserID;
                    $eventData = ((!empty($entry->EventData)) ? unserialize(base64_decode($entry->EventData)) : ''); //<< values to use for event description
                    $eventCount = intval($entry->EventCount);
                    $userIP = $entry->UserIP;
                    // get User Info
                    if($userID == 0){ $username = 'System'; }
                    else {
                        $user_info = get_userdata($userID);
                        $username = $user_info->user_login;
                    }
                    // format event description message
                    if($eventCount >=2 && $eventID == 1002){
                        $evm = sprintf(__('<strong>%d</strong> failed login attempts from <strong>%s</strong> using <strong>%s</strong> as username.',WPPH_PLUGIN_TEXT_DOMAIN)
                            , $eventCount, $userIP, base64_decode($entry->UserName));
                    }
                    else {
                        $eventDetails = WPPHEvent::getEventDetailsData($eventID);
                        if(empty($eventData)) { $evm = $eventDetails->EventDescription; }
                        else { $evm = vsprintf($eventDetails->EventDescription, $eventData); }
                    }

                    echo '<tr>';
                        echo '<td>'.$username.'</td>';
                        echo '<td><a href="admin.php?page='.WPPH_PLUGIN_PREFIX.'">'.$evm.'</a></td>';
                    echo '</tr>';
                }
            echo '</tbody>';
            echo '</table>';
        }
        echo '</div>';
    }


    /**
     * Check to see whether or not a user has access to view any of the plugin's pages
     * @since v0.5
     * @return bool
     */
    static function canViewPage()
    {
        $currentUser = wp_get_current_user();
        if(WPPHUtil::isAdministrator($currentUser->ID)|| WPPHUtil::isAllowedAccess($currentUser->ID) || WPPHUtil::isAllowedChange($currentUser->ID)){
            return true;
        }
        return false;
    }

    /**
     * Check to see whether or not the current user is allowed to VIEW the plugin
     * @since v0.5
     * @return bool
     */
    static function isAllowedAccess()
    {
        $data = WPPHNetwork::getGlobalOption(WPPH_PLUGIN_ALLOW_ACCESS_OPTION_NAME, true, true, array());
        if(empty($data)){return false;}
        $userID = wp_get_current_user()->ID;
        $userInfo = WPPHDB::getUserInfo($userID);
        return (in_array($userInfo['userName'], $data) || in_array($userInfo['userRole'], $data));
    }
    /**
     * Check to see whether or not the current user allowed to CHANGE the plugin's settings
     * @since v0.5
     * @return bool
     */
    static function isAllowedChange()
    {
        $data = WPPHNetwork::getGlobalOption(WPPH_PLUGIN_ALLOW_CHANGE_OPTION_NAME, true, true, array());
        if(empty($data)){return false;}
        $userID = wp_get_current_user()->ID;
        $userInfo = WPPHDB::getUserInfo($userID);
        return (in_array($userInfo['userName'], $data) || in_array($userInfo['userRole'], $data));
    }
    /**
     * @param array $data
     * @since v0.5
     * @return bool False if value was not updated and true if value was updated.
     */
    static function saveAllowAccessUserList(array $data)
    {
        $result = WPPHNetwork::updateGlobalOption(WPPH_PLUGIN_ALLOW_ACCESS_OPTION_NAME, $data, true, true);
        wpphLog(__METHOD__.'() result:', array('data'=> $data, 'result'=>$result));
        return $result;
    }
    /**
     * @param array $data
     * @since v0.5
     * @return bool False if value was not updated and true if value was updated.
     */
    static function saveAllowedChangeUserList(array $data)
    {
        $result = WPPHNetwork::updateGlobalOption(WPPH_PLUGIN_ALLOW_CHANGE_OPTION_NAME, $data, true, true);
        wpphLog(__METHOD__.'() result:', array('data'=> $data, 'result'=>$result));
        return $result;
    }


    /**
     * Saves the default list of users with access to plugin
     * @since v0.5
     * @return bool
     */
    static function saveInitialAccessChangeList()
    {
        if(self::isMainSite()){
            WPPHNetwork::addGlobalOption(WPPH_PLUGIN_ALLOW_ACCESS_OPTION_NAME, array(), true, true);
            WPPHNetwork::addGlobalOption(WPPH_PLUGIN_ALLOW_CHANGE_OPTION_NAME, array(), true, true);
        }
    }

    // ajax
    static function check_user_role()
    {
        // VALIDATE REQUEST
        $rm = strtoupper($_SERVER['REQUEST_METHOD']);
        if($rm != 'POST'){ exit(__('Error: Invalid request',WPPH_PLUGIN_TEXT_DOMAIN)); }

        $value = $_POST['check_input'];

        if(empty($value)){
            exit(__('Error: Invalid request',WPPH_PLUGIN_TEXT_DOMAIN));
        }

        $value = strtolower($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = esc_sql($value);

        // check user
        $result = self::_userExists($value);
        if ($result){
            exit('1');
        }
        // check role
        $result = self::_roleExists($value);
        if ($result){
            exit('1');
        }
        exit('0');
    }

    static function _userExists($username){
        global $wpdb;
        $result = $wpdb->get_var($wpdb->prepare("SELECT `ID` FROM {$wpdb->users} WHERE user_login = '%s' OR display_name = '%s'", $username, $username));
        if ($result !== false && $result > 0){
            return true;
        }
        return false;
    }

    static function _roleExists($role){
        global $wp_roles;
        return (isset($wp_roles->roles[$role]) ? true : false);
    }

    static function isMainSite(){
        if (WPPH::isMultisite()) {
            global $current_site, $blog_id;
            return ($current_site->id == $blog_id);
        }
        return true;
    }
}
