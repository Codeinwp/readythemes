<?php
/**
 * Base class
 */
class WPPH
{
    /**
     * The required user capability to display the menu
     * @since v0.5
     * @var string
     */
    static $requiredCapMenu = 'read';
    /**
     * @since v0.5
     * @var string
     */
    static $baseMenuSlug = WPPH_PLUGIN_PREFIX;

    static function loadTextDomain()
    {
        load_plugin_textdomain(WPPH_PLUGIN_TEXT_DOMAIN, false, WPPH_PLUGIN_DIR.'languages/');
    }

    /**
     * @since v0.5
     * Retrieve the list of all events to display in the enable/disable alerts page
     * @return array
     */
    static function getDefaultEvents()
    {
        return array(
            'Other_User_Activity' => array(
                1000 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User logs in',WPPH_PLUGIN_TEXT_DOMAIN)),
                1001 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User Logs out',WPPH_PLUGIN_TEXT_DOMAIN)),
                1002 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('Failed login detected',WPPH_PLUGIN_TEXT_DOMAIN)),
                2010 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User uploaded a file to the uploads directory',WPPH_PLUGIN_TEXT_DOMAIN)),
                2011 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User deleted a file from the uploads directory',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Pages' => array(
                2004 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User created a new WordPress page and saved it as draft',WPPH_PLUGIN_TEXT_DOMAIN)),
                2005 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User published a WorPress page',WPPH_PLUGIN_TEXT_DOMAIN)),
                2006 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a published WordPress page',WPPH_PLUGIN_TEXT_DOMAIN)),
                2007 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a draft WordPress page',WPPH_PLUGIN_TEXT_DOMAIN)),
                2009 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User permanently deleted a page from the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2013 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User moved WordPress page to the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2015 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User restored a WordPress page from trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2018 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed page URL',WPPH_PLUGIN_TEXT_DOMAIN)),
                2020 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed page author',WPPH_PLUGIN_TEXT_DOMAIN)),
                2022 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed page status',WPPH_PLUGIN_TEXT_DOMAIN)),
                2026 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User changed the visibility of a page',WPPH_PLUGIN_TEXT_DOMAIN)),
                2028 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed the date of a page post',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Blog_Posts' => array(
                2000 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User created a new blog post and saved it as draft',WPPH_PLUGIN_TEXT_DOMAIN)),
                2001 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User published a blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2002 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a published blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2003 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a draft blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2008 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User permanently deleted a blog post from the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2012 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User moved a blog post to the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2014 => array('type' => WPPH_E_HIGH_TEXT,   'text' => __('User restored a blog post from trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2016 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed blog post category',WPPH_PLUGIN_TEXT_DOMAIN)),
                2017 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed blog post URL',WPPH_PLUGIN_TEXT_DOMAIN)),
                2019 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed blog post author',WPPH_PLUGIN_TEXT_DOMAIN)),
                2021 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed blog post status',WPPH_PLUGIN_TEXT_DOMAIN)),
                2023 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User created new category',WPPH_PLUGIN_TEXT_DOMAIN)),
                2024 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User deleted a category',WPPH_PLUGIN_TEXT_DOMAIN)),
                2025 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User changed the visibility of a blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2027 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed the date of a blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Custom_Posts' => array(
                2029 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User created a new custom blog post and saved it as draft',WPPH_PLUGIN_TEXT_DOMAIN)),
                2030 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User published a custom blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2031 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a published custom blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2032 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User modified a draft custom blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2033 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User permanently deleted a custom blog post from the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2034 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User moved a custom blog post to the trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2035 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User restored a custom blog post from trash',WPPH_PLUGIN_TEXT_DOMAIN)),
                2036 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed custom blog post category',WPPH_PLUGIN_TEXT_DOMAIN)),
                2037 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed custom blog post URL',WPPH_PLUGIN_TEXT_DOMAIN)),
                2038 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed custom blog post author',WPPH_PLUGIN_TEXT_DOMAIN)),
                2039 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed custom blog post status',WPPH_PLUGIN_TEXT_DOMAIN)),
                2040 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User changed the visibility of a custom blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
                2041 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User changed the date of a custom blog post',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Users_Profiles' => array(
                4000 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('A new user was created on WordPress',WPPH_PLUGIN_TEXT_DOMAIN)),
                4001 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('A user created another WordPress user',WPPH_PLUGIN_TEXT_DOMAIN)),
                4002 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('The role of a user was changed by another WordPress user',WPPH_PLUGIN_TEXT_DOMAIN)),
                4003 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User has changed his or her password',WPPH_PLUGIN_TEXT_DOMAIN)),
                4004 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('A user changed another user\'s password',WPPH_PLUGIN_TEXT_DOMAIN)),
                4005 => array('type' => WPPH_E_NOTICE_TEXT,'text' => __('User changed his or her email address',WPPH_PLUGIN_TEXT_DOMAIN)),
                4006 => array('type' => WPPH_E_NOTICE_TEXT,'text' => __('A user changed another user\'s email address',WPPH_PLUGIN_TEXT_DOMAIN)),
                4007 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('A user was deleted by another user',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Widgets' => array(
                2042 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User added a new widget',WPPH_PLUGIN_TEXT_DOMAIN)),
                2043 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User modified a widget',WPPH_PLUGIN_TEXT_DOMAIN)),
                2044 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User deleted a widget',WPPH_PLUGIN_TEXT_DOMAIN)),
                2045 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User moved a widget',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Themes' => array(
                3000 => array('type' => WPPH_E_NOTICE_TEXT, 'text' => __('User activated a theme.',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Plugins' => array(
                5000 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User installed a plugin',WPPH_PLUGIN_TEXT_DOMAIN)),
                5001 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User activated a WordPress plugin',WPPH_PLUGIN_TEXT_DOMAIN)),
                5002 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User deactivated a WordPress plugin',WPPH_PLUGIN_TEXT_DOMAIN)),
                5003 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User uninstalled a plugin',WPPH_PLUGIN_TEXT_DOMAIN)),
                5004 => array('type' => WPPH_E_WARNING_TEXT, 'text' => __('User upgraded a plugin',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
            'Settings_And_System_Activity' => array(
                6000 => array('type' => WPPH_E_NOTICE_TEXT,'text' => __('Security alerts automatically pruned by system',WPPH_PLUGIN_TEXT_DOMAIN)),
                6001 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Option Anyone Can Register in WordPress settings changed',WPPH_PLUGIN_TEXT_DOMAIN)),
                6002 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('New User Default Role changed',WPPH_PLUGIN_TEXT_DOMAIN)),
                6003 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('WordPress Administrator Notification email changed',WPPH_PLUGIN_TEXT_DOMAIN))
            ),
            'MultiSite' => array(
                4008 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Granted Super Admin privileges to user',WPPH_PLUGIN_TEXT_DOMAIN)),
                4009 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Revoked Super Admin privileges from user',WPPH_PLUGIN_TEXT_DOMAIN)),
                4010 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Existent user added to site',WPPH_PLUGIN_TEXT_DOMAIN)),
                4011 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('User removed from site',WPPH_PLUGIN_TEXT_DOMAIN)),
                4012 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('New network user created',WPPH_PLUGIN_TEXT_DOMAIN)),
                7000 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site added to network',WPPH_PLUGIN_TEXT_DOMAIN)),
                7001 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site archived',WPPH_PLUGIN_TEXT_DOMAIN)),
                7002 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site unarchived',WPPH_PLUGIN_TEXT_DOMAIN)),
                7003 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site activated',WPPH_PLUGIN_TEXT_DOMAIN)),
                7004 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site deactivated',WPPH_PLUGIN_TEXT_DOMAIN)),
                7005 => array('type' => WPPH_E_HIGH_TEXT, 'text' => __('Site deleted',WPPH_PLUGIN_TEXT_DOMAIN)),
            ),
        );
    }


    /**
     * @return bool
     * Convenient method to check whether or not the plugin's resources can be loaded
     */
    public static function canLoad() { return ((false === ($pos = stripos($_SERVER['REQUEST_URI'], WPPH_PLUGIN_PREFIX))) ? false : true); }

    public static function loadBaseResources()
    {
        if(self::canLoad())
        {
            wp_enqueue_style('wpph_styles_base', WPPH_PLUGIN_URL . 'res/css/styles.base.css');
            wp_enqueue_script('wpph-alvm-js', WPPH_PLUGIN_URL . 'res/js/audit-view-model.js', array('wpph-jcookie-js', 'wpph-ko-js'));
            wp_enqueue_script('wpph-ko-js', WPPH_PLUGIN_URL . 'res/js/knockout.js', array('jquery'));
            wp_enqueue_script('wpph-jcookie-js', WPPH_PLUGIN_URL . 'res/js/jquery-ck.js', array('jquery'));
        }
    }

    public static function createPluginWpSidebar()
    {
        $reqCap = self::$requiredCapMenu;

        if (!function_exists('add_menu_page'))
        {
            wpphLog('The required function "add_menu_page" to create the menu is not available on this installation.');
            return;
        }

        if(WPPHUtil::isAdministrator(wp_get_current_user()->ID)){
            self::_createMenu($reqCap, true, true, true);
        }
        elseif (WPPHUtil::isAllowedChange()){
            self::_createMenu($reqCap, true, true);
        }
        elseif(WPPHUtil::isAllowedAccess()){
            self::_createMenu($reqCap, true);
        }
    }

    private static function _createMenu($reqCap, $allowedAccess = false, $allowedChange = false, $isAdministrator = false)
    {
        if($isAdministrator || $allowedChange){
            add_menu_page('WP Security Audit Log', 'WP Security Audit Log', $reqCap, self::$baseMenuSlug, 'WPPH::pageMain', WPPH_PLUGIN_URL.'res/img/logo-main-menu.png');
            add_submenu_page(self::$baseMenuSlug, 'Audit Log Viewer', 'Audit Log Viewer', $reqCap, self::$baseMenuSlug, 'WPPH::pageMain');
            if(WPPHUtil::isMainSite()){
                add_submenu_page(self::$baseMenuSlug, __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'settings', 'WPPH::pageSettings');
                add_submenu_page(self::$baseMenuSlug, __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'alerts', 'WPPH::pageAlerts');
            }
            else {
                if(WPPHUtil::isAllowedChange()){
                    add_submenu_page(self::$baseMenuSlug, __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'settings', 'WPPH::pageSettings');
                    add_submenu_page(self::$baseMenuSlug, __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'alerts', 'WPPH::pageAlerts');
                }
            }
            add_submenu_page(self::$baseMenuSlug, __('About',WPPH_PLUGIN_TEXT_DOMAIN), __('About',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'about', 'WPPH::pageAbout');
            add_submenu_page(self::$baseMenuSlug, __('Support',WPPH_PLUGIN_TEXT_DOMAIN), __('Support',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'support', 'WPPH::pageSupport');
        }
        elseif($allowedAccess){
            add_menu_page('WP Security Audit Log', 'WP Security Audit Log', $reqCap, self::$baseMenuSlug, 'WPPH::pageMain', WPPH_PLUGIN_URL.'res/img/logo-main-menu.png');
            add_submenu_page(self::$baseMenuSlug, 'Audit Log Viewer', 'Audit Log Viewer', $reqCap, self::$baseMenuSlug, 'WPPH::pageMain');
            if(WPPHUtil::isAllowedChange()){
                add_submenu_page(self::$baseMenuSlug, __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), __('Settings',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'settings', 'WPPH::pageSettings');
                add_submenu_page(self::$baseMenuSlug, __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'alerts', 'WPPH::pageAlerts');
            }
            add_submenu_page(self::$baseMenuSlug, __('About',WPPH_PLUGIN_TEXT_DOMAIN), __('About',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'about', 'WPPH::pageAbout');
            add_submenu_page(self::$baseMenuSlug, __('Support',WPPH_PLUGIN_TEXT_DOMAIN), __('Support',WPPH_PLUGIN_TEXT_DOMAIN), $reqCap, self::$baseMenuSlug.'support', 'WPPH::pageSupport');
        }
    }

    public static function pageMain() { include(WPPH_PLUGIN_DIR.'pages/dashboard.php'); }
    public static function pageSettings() { include(WPPH_PLUGIN_DIR.'pages/settings.php'); }
    public static function pageAlerts() {
        wp_enqueue_style('jquery-smoothness-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        include(WPPH_PLUGIN_DIR.'pages/alerts.php');
    }
    public static function pageAbout() { include(WPPH_PLUGIN_DIR.'pages/about.php'); }
    public static function pageSupport() { include(WPPH_PLUGIN_DIR.'pages/support.php'); }

    /**
     * @since v0.5
     * Create, save and retrieve the default list of events
     * @return array
     */
    public static function createDefaultEventsList()
    {
        $alerts = array();
        $events = self::getDefaultEvents();
        if(!empty($events)){
            foreach($events as $section => $values){
                $alerts[$section] = array();
                $_events = array_keys($values);
                if(! empty($_events)){
                    foreach($_events as $k){
                        $alerts[$section][$k] = 1;
                    }
                }
            }
        }
        wpph_updatePluginEventsList($alerts);
        return $alerts;
    }

    /**
     * @since v0.5
     * Retrieve the list of all events from database
     * @return array
     */
    static function getEvents(){
        $events = wpph_getPluginEventsList();
        if(false === $events){
            $events = self::createDefaultEventsList();
        }
        return $events;
    }

    public static function createPluginDefaultSettings()
    {
        $settings = new stdClass();
            $settings->daysToKeep = 0;
            $settings->eventsToKeep = WPPH_KEEP_MAX_EVENTS; // default delete option
            $settings->showEventsViewList = 50; // how many items to show in the event viewer by default
            $settings->lastCleanup = time();
            $settings->cleanupRan = 0;
            $settings->showDW = 1; // whether or not to show the dashboard widget. @since v0.4

        update_option(WPPH_PLUGIN_SETTING_NAME, $settings);
        self::createDefaultEventsList();
        wpphLog('Settings added.');
        return $settings;
    }
    public static function getPluginSettings()
    {
        $settings = get_option(WPPH_PLUGIN_SETTING_NAME);
        if(false == $settings){
            $settings = self::createPluginDefaultSettings();
        }
        return $settings;
    }

    /**
     * @param object $settings If this param is null, $settingName & $settingValue(this cannot be null) must be set
     * @param string $settingName Optional. Required if $settings is null
     * @param string $settingValue Optional. Required if $settings is null
     * @param bool $overrideCleanupRan Whether or not to override the cleanupRan option. Defaults to false
     */
    public static function updatePluginSettings($settings = null, $settingName = null, $settingValue=null, $overrideCleanupRan = false)
    {
        if(! is_null($settings)){
            if($overrideCleanupRan){
                $settings->lastCleanup = 0;
                $settings->cleanupRan = 0;
            }
            update_option(WPPH_PLUGIN_SETTING_NAME, $settings);
            return;
        }

        // name and value must be set!
        if(is_null($settingName) || is_null($settingValue)){
            return;
        }

        $settings = self::getPluginSettings();
        $settings->$settingName = $settingValue;
        if($overrideCleanupRan){
            $settings->lastCleanup = 0;
            $settings->cleanupRan = 0;
        }
        update_option(WPPH_PLUGIN_SETTING_NAME, $settings);
        wpphLog('Settings saved.', $settings);
    }

    public static function onPluginActivate($blogId=1)
    {
        if($blogId > 1){
            return true;
        }

        wpphLog(__METHOD__.'() triggered.');

        $canContinue = true;

// Check: MySQL, PHP - without these there's not much left for this plugin to do
        if(! self::checkMySQL()){
            self::__addPluginError(__("Plugin could not be properly installed. The MySQL version installed on this server is less than 5.",WPPH_PLUGIN_TEXT_DOMAIN));
            $canContinue = false;
        }
        if(! self::checkPHP()){
            self::__addPluginError(__("Plugin could not be properly installed. The PHP version installed on this server is less than 5.",WPPH_PLUGIN_TEXT_DOMAIN));
            $canContinue = false;
        }
// no need for further checks, the plugin cannot run on this server...
        if(! $canContinue){
            $GLOBALS['WPPH_CAN_RUN'] = false;
            self::__addPluginError(__("Plugin could not be properly installed because the server does not meet our requirements: MySQL and PHP version >= 5.",WPPH_PLUGIN_TEXT_DOMAIN));
            return false;
        }

        // check to see whether or not an upgrade is necessary
        global $wpdb;
        $dbUpdated = get_option(WPPH_PLUGIN_DB_UPDATED);
        $tablesExist = false;
        $triggerInstallEvent = false; // whether or not the plugin is installed
        $pluginDbVersion = get_option(WPPH_PLUGIN_VERSION_OPTION_NAME);

        delete_option(WPPH_PLUGIN_ERROR_OPTION_NAME);

        // first install?
        if($pluginDbVersion === false){
            // Check tables
            if(WPPHDatabase::tableExists($wpdb, WPPHDatabase::getFullTableName('MAIN')) || WPPHDatabase::tableExists($wpdb, WPPHDatabase::getFullTableName('EVENTS'))){
                $tablesExist = true;
            }
            else { $triggerInstallEvent = true; }
        }

        // if we need to install
        if($triggerInstallEvent)
        {
            if($dbUpdated){ delete_option(WPPH_PLUGIN_DB_UPDATED); }
            if(WPPHDatabase::handleDatabase()){
                self::__handlePluginActivation(true);
                return true;
            }
            else {
                self::__addPluginError(__("Plugin could not be properly installed because we have encountered errors during the database update.",WPPH_PLUGIN_TEXT_DOMAIN));
                return false;
            }
        }
        // plugin already installed
        else
        {
            // if tables exist - do update database
            if($tablesExist)
            {
                // check plugin version
                if(empty($pluginDbVersion))
                {
                    if($dbUpdated){ delete_option(WPPH_PLUGIN_DB_UPDATED); }
                    // maybe version 0.1 ? empty tables
                    if(! WPPHDatabase::v2Cleanup()){
                        self::__addPluginError(__("Plugin could not be properly installed because we have encountered errors during the database update.",WPPH_PLUGIN_TEXT_DOMAIN));
                        return false;
                    }
                    // update database
                    if(WPPHDatabase::handleDatabase()){
                        self::__handlePluginActivation();
                        return true;
                    }
                    else {
                        self::__addPluginError(__("Plugin could not be properly installed because we have encountered errors during the database update.",WPPH_PLUGIN_TEXT_DOMAIN));
                        return false;
                    }
                }
                else {
                    $pluginDbVersion = (float)$pluginDbVersion;
                    $currentVersion = (float)WPPH_PLUGIN_VERSION;
                    // no need for upgrade
                    if(version_compare($pluginDbVersion, $currentVersion, '==')){
                        self::__handlePluginActivation();
                        return true;
                    }
                }
            }
            // tables not found
            else {
                if($dbUpdated){ delete_option(WPPH_PLUGIN_DB_UPDATED); }
                // create them
                if(WPPHDatabase::handleDatabase()){
                    self::__handlePluginActivation();
                    return true;
                }
                else {
                    self::__addPluginError(__("Plugin could not be properly installed because we have encountered errors during the database update.",WPPH_PLUGIN_TEXT_DOMAIN));
                    return false;
                }
            }
        }
        return false;
    }

    /**
     * Triggered when the plugin is deactivated
     * @param int $blogId
     * @return bool true
     */
    public static function onPluginDeactivate($blogId=1)
    {
        wpphLog(__FUNCTION__.'() triggered.');
        wp_clear_scheduled_hook(WPPH_PLUGIN_DEL_EVENTS_CRON_TASK_NAME);
        delete_option(WPPH_PLUGIN_ERROR_OPTION_NAME);
        update_option('WPPH_PLUGIN_ACTIVATED',0);
        return true;
    }

    public static function __addPluginError($error)
    {
        $data = get_option(WPPH_PLUGIN_ERROR_OPTION_NAME);
        if(empty($data)){
            $data = array();
        }
        $data[] = base64_encode($error);
        update_option(WPPH_PLUGIN_ERROR_OPTION_NAME, $data);
        return true;
    }

    private static function __handlePluginActivation($triggerInstallEvent = false)
    {
        self::getPluginSettings();

        $GLOBALS['WPPH_CAN_RUN'] = true;
        update_option(WPPH_PLUGIN_DB_UPDATED,1);
        delete_option(WPPH_PLUGIN_ERROR_OPTION_NAME);
        update_option(WPPH_PLUGIN_VERSION_OPTION_NAME, WPPH_PLUGIN_VERSION);
        WPPHUtil::saveInitialAccessChangeList();
        if($triggerInstallEvent)
        {
            if(! defined('WPPH_PLUGIN_INSTALLED_OK')) {
                //@see: WPPHEventWatcher::watchPluginInstall()
                define('WPPH_PLUGIN_INSTALLED_OK',true);
            }
            // log plugin installation
            wpph_installPlugin(WPPH_PLUGIN_NAME, wp_get_current_user()->ID, WPPHUtil::getIP());
        }
        // log plugin activation
        WPPHEvent::hookWatchPluginActivity();

        // register cron job for events deletion
        if(defined('DISABLE_WP_CRON') && DISABLE_WP_CRON){ return true; }
        else
        {
            if ( ! wp_next_scheduled(WPPH_PLUGIN_DEL_EVENTS_CRON_TASK_NAME)) {
                $interval = (defined('WPPH_CLEANUP_INTERVAL') ? WPPH_CLEANUP_INTERVAL : 'hourly');
                wp_schedule_event( time(), $interval, WPPH_PLUGIN_DEL_EVENTS_CRON_TASK_NAME );
                wpphLog(__METHOD__.'() '.WPPH_PLUGIN_DEL_EVENTS_CRON_TASK_NAME.' task scheduled by wp-cron. Time Interval set to: '.$interval);
            }
        }
    }
    /**
     * @internal
     * @static
     * @var array Holds the list or errors generated during install
     */
    private static $_errors = array();

    // must only be called in pages
    public static function ready()
    {
        if(empty(self::$_errors)){
            self::$_errors = self::getPluginErrors();
            if(empty(self::$_errors)){
                return true;
            }
        }
        return false;
    }

    public static function getPluginErrors() { return get_option(WPPH_PLUGIN_ERROR_OPTION_NAME); }

    public static function checkMySQL(){
        global $wpdb;
        $v = $wpdb->get_var("SELECT VERSION();");
        if(empty($v)){ return false; }
        $v = trim($v);
        if(intval($v[0]) < 5){ return false; }
        return true;
    }
    public static function checkPHP(){ return (version_compare(phpversion(), '5.0.0', '>=')); }


    /**
     * Check to see whether or not this is a multisite instance
     * @since v0.6
     * @return bool
     */
    static function isMultisite(){ return ((function_exists('is_multisite') && is_multisite()) ? true : false); }

}


