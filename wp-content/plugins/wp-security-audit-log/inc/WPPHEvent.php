<?php
/**
 * WPPHEvent
 */
class WPPHEvent
{
    /**
     * Retrieve the list of events
     * @return array
     */
    static function listEvents()
    {
        return array(
// 1xxx - Login/Logout events
            array( 'id' => 1000, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Successfully logged in.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 1001, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Successfully logged out.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 1002, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Failed login detected using <strong>%s</strong> as username.',WPPH_PLUGIN_TEXT_DOMAIN)),

// 2xxx - User activity events
            //  Created a new blog post called %Post Title%. Blog post ID is %ID%
            array( 'id' => 2000, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Created a new draft blog post called <strong>%s</strong>. Blog post ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Published a blog post called %Post_Title%. Blog post URL is %Post_URL%
            array( 'id' => 2001, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Published a blog post called <strong>%s</strong>. Blog post URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Modified the published blog post %post_title%. Blog post URL is %post_URL%
            array( 'id' => 2002, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the published blog post <strong>%s</strong>. Blog post URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Modified the draft blog post %post_title%. Blog post ID is %ID%
            array( 'id' => 2003, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the draft blog post <strong>%s</strong>. Blog post ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

            // Created a new page called %page_title%. Page ID is %ID%
            array( 'id' => 2004, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Created a new draft page called <strong>%s</strong>. Page ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Published a page called %page_title%. Page URL is %URL%
            array( 'id' => 2005, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Published a page called <strong>%s</strong>. Page URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Modified the published page %page_title%. Page URL is %URL%
            array( 'id' => 2006, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the published page <strong>%s</strong>. Page URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Modified the draft page %page_title%. Page ID is %ID%
            array( 'id' => 2007, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the draft page <strong>%s</strong>. Page ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Deleted the post %Title%. Blog post ID is %ID%
            array( 'id' => 2008, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deleted the post <strong>%s</strong>. Blog post ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Deleted the page %Title%. Page ID is %ID%
            array( 'id' => 2009, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deleted the page <strong>%s</strong>. Page ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

            // Uploaded the file %file name$ in %file location%
            array( 'id' => 2010, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Uploaded the file <strong>%s</strong> in <strong>%s</strong>/.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Deleted file %file name$ from %file_location%
            array( 'id' => 2011, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deleted the file <strong>%s</strong> from <strong>%s</strong>/.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2012 - trashed draft post
            array( 'id' => 2012, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Moved the post <strong>%s</strong> to trash.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2013 - trashed published post
            array( 'id' => 2013, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Moved the page <strong>%s</strong> to trash.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2014 - untrashed post
            array( 'id' => 2014, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Post <strong>%s</strong> has been restored from trash.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2015 - untrashed page
            array( 'id' => 2015, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Page <strong>%s</strong> has been restored from trash.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2016 - Post category changed
            array( 'id' => 2016, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the category(ies) of the post <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2017 - Changed the URL of the post %post_name% from %old_url% to %new_url%
            array( 'id' => 2017, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the URL of the post <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2018 - Changed the URL of the page %page_name% from %old_url% to %new_url%
            array( 'id' => 2018, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the URL of the page <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2019 - Changed the author of %post_name% post from %old_author% to %new_author%
            array( 'id' => 2019, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the author of <strong>%s</strong> post from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2020 - Changed the author of %page_name% page from %old_author% to %new_author%
            array( 'id' => 2020, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the author of <strong>%s</strong> page from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2021 - %postName% from %oldStatus% to %newStatus%
            array( 'id' => 2021, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the status of <strong>%s</strong> post from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2022 - page from published to draft
            array( 'id' => 2022, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the status of <strong>%s</strong> page from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2023 - added new category
            array( 'id' => 2023, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Created a new category called <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2024 - deleted category
            array( 'id' => 2024, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Deleted the <strong>%s</strong> category.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2025 - Changed the visibility of %post_name% blog post  from %old_visibility% to %new_visibility%
            array( 'id' => 2025, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Changed the visibility of <strong>%s</strong> blog post from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2026 - Changed the visibility of %page_name% page  from %old_visibility% to %new_visibility%
            array( 'id' => 2026, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Changed the visibility of <strong>%s</strong> page from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2027 - Changed the date of %post_name% blog post from %old_date% to %new_date%
            array( 'id' => 2027, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the date of <strong>%s</strong> blog post from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2028 - Changed the date of %post_name% page from %old_date% to %new_date%
            array( 'id' => 2028, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the date of <strong>%s</strong> page from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

//[[ Custom Post Types
            // 2029 Created a new custom post called %Post Title%. Post ID is %ID%
            array( 'id' => 2029, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Created a new draft custom post <strong>%s</strong> of type <strong>%s</strong>. Post ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2030 Published a custom post called %Post_Title%. Post URL is %Post_URL%
            array( 'id' => 2030, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Published a custom post <strong>%s</strong> of type <strong>%s</strong>. Post URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2031 Modified the published custom post %post_title%. Post URL is %post_URL%
            array( 'id' => 2031, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the custom post <strong>%s</strong> of type <strong>%s</strong>. Post URL is <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2032 Modified the draft custom post %post_title%. Post ID is %ID%
            array( 'id' => 2032, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Modified the draft custom post <strong>%s</strong> of type <strong>%s</strong>. Post ID is <strong>%d</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2033 Deleted the custom post %Title%. Post ID is %ID%
            array( 'id' => 2033, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Deleted custom post <strong>%s</strong> of type <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2034 - trashed draft custom post
            array( 'id' => 2034, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Moved the custom post <strong>%s</strong> to trash. Post type is <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2035 - untrashed custom post
            array( 'id' => 2035, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Custom post <strong>%s</strong> of type <strong>%s</strong> has been restored from trash.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2036 - Custom post category changed
            array( 'id' => 2036, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the category(ies) of custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2037 - Changed the URL of the custom post %post_name% from %old_url% to %new_url%
            array( 'id' => 2037, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the URL of the custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2038 - Changed the author of %post_name% custom post from %old_author% to %new_author%
            array( 'id' => 2038, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the author of custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2039 - Changed the status of %postName% custom post from %oldStatus% to %newStatus%
            array( 'id' => 2039, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the status of custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2040 - Changed the visibility of %post_name% custom post  from %old_visibility% to %new_visibility%
            array( 'id' => 2040, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Changed the visibility of custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2041 - Changed the date of %post_name% custom post from %old_date% to %new_date%
            array( 'id' => 2041, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the date of custom post <strong>%s</strong> of type <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

// WIDGETS
            // 2042 - Added a new %type% widget in %section%
            array( 'id' => 2042, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Added a new <strong>%s</strong> widget in <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2043 - Modified the %type% widget in %section%
            array( 'id' => 2043, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Modified the <strong>%s</strong> widget in <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2044 - Deleted the %type% widget from %section%
            array( 'id' => 2044, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deleted the <strong>%s</strong> widget from <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // 2045 - Moved the %type% widget from %old_location% to %new_location%
            array( 'id' => 2045, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Moved the <strong>%s</strong> widget from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

// 3xxx - Themes management
            // Activated the theme %themeName%
            array( 'id' => 3000, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Activated the theme <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

// 4xxx - User profile events
            array( 'id' => 4000, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('A new user with the username <strong>%s</strong> has registered with the role of <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 4001, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('<strong>%s</strong> created a new user <strong>%s</strong> with the role of <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 4002, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('The role of user <strong>%s</strong> was changed from <strong>%s</strong> to <strong>%s</strong> by <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 4003, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Changed the account password.',WPPH_PLUGIN_TEXT_DOMAIN)),
            array( 'id' => 4004, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('<strong>%s</strong> changed the password for user <strong>%s</strong> with the role of <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Changed the email address from %old_email% to %new_email%
            array( 'id' => 4005, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Changed the email address from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // %user_making_change% changed the email address of user %user% from %old_email% to %new_email%
            array( 'id' => 4006, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('<strong>%s</strong> changed the email address of user <strong>%s</strong> from <strong>%s</strong> to <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // User %user% with the role of %role% was deleted by %user_deleting%
            array( 'id' => 4007, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('User <strong>%s</strong> with the role of <strong>%s</strong> was deleted by <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

// 5xxx - Plugin management
            // # 5000 Installed the plugin %name%.
            array( 'id' => 5000, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Installed the plugin <strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Activated the plugin %plugin_name% installed in %plugin_directory%
            array( 'id' => 5001, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Activated the plugin <strong>%s</strong> installed in /<strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // Deactivated the plugin %plugin_name% installed in %plugin_directory%
            array( 'id' => 5002, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deactivated the plugin <strong>%s</strong> installed in /<strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // # 5003 Uninstalled the plugin %plugin_name% which was installed in %path%
            array( 'id' => 5003, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Uninstalled the plugin <strong>%s</strong> which was installed in /<strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // # 5004 Upgraded the plugin %name% installed in %path%
            array( 'id' => 5004, 'category' => WPPH_E_WARNING_TEXT, 'text' => __('Upgraded the plugin <strong>%s</strong> installed in /<strong>%s</strong>.',WPPH_PLUGIN_TEXT_DOMAIN)),

// 6xxx - System events
            // #6000 Events automatically deleted by system.
            array( 'id' => 6000, 'category' => WPPH_E_NOTICE_TEXT, 'text' => __('Alerts automatically deleted by system.',WPPH_PLUGIN_TEXT_DOMAIN)),
            // #6001 - <strong>%s</strong> the option Anyone can register
            array( 'id' => 6001, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('<strong>%s</strong> the option Anyone can register',WPPH_PLUGIN_TEXT_DOMAIN)),
            // #6002 - Changed the New User Default Role from <strong>%s</strong> to <strong>%s</strong>
            array( 'id' => 6002, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Changed the New User Default Role from <strong>%s</strong> to <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
            // #6003 - Changed the WordPress administrator notifications email address from %old_email% to %new_mail%
            array( 'id' => 6003, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Changed the WordPress administrator notifications email address from <strong>%s</strong> to <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),


// xxxx - MultiSite Events

// #4008 - Granted Super Admin privileges from <strong>%user%</strong>
            array( 'id' => 4008, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Granted Super Admin privileges to <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #4009 - Revoked Super Admin privileges from <strong>%user%</strong>
            array( 'id' => 4009, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Revoked Super Admin privileges from <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #4010 - Added existing user %user% with %role% role to site %site%
            array( 'id' => 4010, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Added existing user <strong>%s</strong> with role <strong>%s</strong> to site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #4011 - Removed user %user% with role %role% from %site% site
            array( 'id' => 4011, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Removed user <strong>%s</strong> with role <strong>%s</strong> from site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #4012 - Created a new network user %user%
            array( 'id' => 4012, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Created a new network user <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7000 - Added <strong>%site%</strong> to the network
            array( 'id' => 7000, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Added site <strong>%s</strong> to the network',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7001 - Archived site <strong>%site%</strong>
            array( 'id' => 7001, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Archived site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7002 - Unarchived site <strong>%site%</strong>
            array( 'id' => 7002, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Unarchived site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7003 - Activated site <strong>%site%</strong>
            array( 'id' => 7003, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Activated site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7004 - Deactivated site <strong>%site%</strong>
            array( 'id' => 7004, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deactivated site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
// #7005 - Deleted site <strong>%site%</strong>
            array( 'id' => 7005, 'category' => WPPH_E_HIGH_TEXT, 'text' => __('Deleted site <strong>%s</strong>',WPPH_PLUGIN_TEXT_DOMAIN)),
        );
    }


// 1xxx - Login/Logout events

    // 1000
    static function hookLoginEvent()   { add_action('wp_login', array('WPPHEventWatcher', 'watchEventLogin'), 10, 2); }
    // 1001
    static function hookLogoutEvent()  { add_action('wp_logout', array('WPPHEventWatcher', 'watchEventLogout')); }
    // 1002
    static function hookLoginFailure() { add_action('wp_login_failed', array('WPPHEventWatcher', 'watchLoginFailure')); }


// 2xxx - User activity events

    // 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2021, 2022
    static function hookWatchBlogActivity() { add_action('transition_post_status', array('WPPHEventWatcher', 'watchBlogActivity'), 10, 3); }
    // 2008, 2009
    static function hookFileDeletion() { add_action('delete_post', array('WPPHEventWatcher', 'watchTrash'), 10, 1); }
    // 2010
    static function hookFileUploaded() { add_action('add_attachment', array('WPPHEventWatcher', 'watchFileUploaded')); }
    // 2011
    static function hookFileUploadedDeleted() { add_action('delete_attachment', array('WPPHEventWatcher', 'watchFileUploadedDeleted')); }
    // 2012
    static function hookTrashPost() {
        if(defined('EMPTY_TRASH_DAYS') && (EMPTY_TRASH_DAYS == 0)){
            add_action('delete_post', array('WPPHEventWatcher', 'watchTrash'), 10, 1);
        }
        else { add_action('wp_trash_post', array('WPPHEventWatcher', 'watchFileDeletion')); }
    }
    // 2013
    static function hookTrashPage() {
        if(defined('EMPTY_TRASH_DAYS') && (EMPTY_TRASH_DAYS == 0)){
            add_action('delete_post', array('WPPHEventWatcher', 'watchTrash'), 10, 1);
        }
        else { add_action('wp_trash_page', array('WPPHEventWatcher', 'watchFileDeletion')); }
    }
    //2014
    static function hookUntrashedPosts() { add_action('untrash_post', array('WPPHEventWatcher', 'watchTrashUndo')); }
    // 2015
    static function hookUntrashedPages() { add_action('untrash_page', array('WPPHEventWatcher', 'watchTrashUndo')); }
    // 2016, 2017
    static function hookWatchPostStateBefore()
    {
        if(! isset($_POST)){ wpphLog(__METHOD__.' not $_POST method'); return; }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { wpphLog(__METHOD__.' doing autosave'); return; }
        if(isset($_POST['action']) && $_POST['action'] == 'autosave') { wpphLog(__METHOD__.' $_POST action == autosave'); return; }

        if(isset($GLOBALS['WPPH_DEFAULT_EDITOR_ENABLED']) || isset($GLOBALS['WPPH_SCREEN_EDITOR_ENABLED']))
        {
            wpphLog(__METHOD__.'() triggered by hook.');

            global $wpdb;
            $pid = $_POST['post_ID'];

            $postType = (empty($_POST['post_type']) ? '' : $_POST['post_type']);
            if(! WPPHPost::validatePostType($postType)){
                wpphLog('Invalid post type.', array('post-type'=>$postType));
                return;
            }

            $_postType = $postType;
            if($_postType != 'post' && $_postType != 'page'){
                $_postType = 'custom';
            }
            do_action('wpph_set_post_type',$_postType);

            /*
             * CHECK IF POST/PAGE AUTHOR UPDATED; 2019
             * ## step 1: this is where we check if author has been changed
             * ## step 2: @see WPPHPost::managePostAuthorUpdateQuickEditForm()
             */
            if(! empty($_POST['post_author']))
            {
                $GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'] = intval($_POST['post_author']);
                if(isset($GLOBALS['WPPH_SCREEN_EDITOR_ENABLED'])){
                    // trigger hook manually
                    add_filter('wp_insert_post_data', array('WPPHPost','managePostAuthorUpdateQuickEditForm'), 1, 2);
                }
            }

            // check if post exists & get aggregated data
            $query = "SELECT ID, post_title, post_name, post_password, post_date FROM ".$wpdb->posts." WHERE ID = ".$pid;
            $result = $wpdb->get_row($query);
            $postExists = (empty($result->ID) ? false : true);
            $GLOBALS['WPPH_POST_EXISTS'] = $postExists;
            $GLOBALS['WPPH_POST_PWD_PROTECTED'] = (empty($result->post_password) ? false : true);

            // if blog post
            if($postType == 'post' || $_postType == 'custom')
            {
                // before further checks, we have to make sure this post isn't new
                if(! $postExists){
                    wpphLog("POST DOES NOT EXISTS.");
                    return;
                }

                // retrieve the old post pwd to help us detect the posts' visibility transition state
                $GLOBALS['WPPH_OLD_POST_PASSWORD'] = $result->post_password;
                // check if post date has been changed
                $GLOBALS['WPPH_POST_OLD_DATE'] = $result->post_date;
                // Get the post name so we'll know if URL was updated
                $GLOBALS['WPPH_POST_OLD_NAME'] = (empty($result->post_name) ? $result->post_title : $result->post_name);
                // CHECK IF POST CATEGORY UPDATED; 2016
                $GLOBALS['WPPH_POST_OLD_CATEGORIES'] = wp_get_post_categories($pid);
                /*
                 * CHECK IF POST URL UPDATED; 2017
                 * ## step 1: this is where we retrieve the new URL
                 * ## step 2: @see WPPHEventWatcher::watchBlogActivity()
                 */
                $GLOBALS['WPPH_POST_NEW_URL'] = get_permalink($pid);
            }
            // if page
            elseif($postType == 'page')
            {
                if($postExists)
                {
                    // get the page's password if any (to trigger the 2026 event)
                    // retrieve the old post pwd to help us detect the posts' visibility transition state
                    $GLOBALS['WPPH_OLD_POST_PASSWORD'] = $result->post_password;
                    // check if post date has been changed
                    $GLOBALS['WPPH_POST_OLD_DATE'] = $result->post_date;
                    // Get the post name so we'll know if URL was updated
                    $GLOBALS['WPPH_POST_OLD_NAME'] = (empty($result->post_name) ? $result->post_title : $result->post_name);
                }

                /*
                * CHECK IF PAGE URL UPDATED; 2018
                * ## step 1: this is where we retrieve the new URL
                * ## step 2: @see WPPHEventWatcher::watchBlogActivity()
                */
                $GLOBALS['WPPH_POST_NEW_URL'] = get_permalink($pid);
            }
            wpphLog('GLOBAL VARIABLES', array(
                'WPPH_POST_AUTHOR_UPDATED_ID' => $GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'],
                'WPPH_POST_EXISTS' => $GLOBALS['WPPH_POST_EXISTS'],
                'WPPH_POST_PWD_PROTECTED' => $GLOBALS['WPPH_POST_PWD_PROTECTED'],
                'WPPH_OLD_POST_PASSWORD' => $GLOBALS['WPPH_OLD_POST_PASSWORD'],
                'WPPH_POST_OLD_DATE' => $GLOBALS['WPPH_POST_OLD_DATE'],
                'WPPH_POST_OLD_NAME' => $GLOBALS['WPPH_POST_OLD_NAME'],
                'WPPH_POST_OLD_CATEGORIES' => isset($GLOBALS['WPPH_POST_OLD_CATEGORIES']) ? $GLOBALS['WPPH_POST_OLD_CATEGORIES'] : '',
                'WPPH_POST_NEW_URL' => $GLOBALS['WPPH_POST_NEW_URL'],
                'post_type' => $postType,
                'WPPH_DEFAULT_EDITOR_ENABLED' => isset($GLOBALS['WPPH_DEFAULT_EDITOR_ENABLED']) ? 'true' : 'false',
                'WPPH_SCREEN_EDITOR_ENABLED' => isset($GLOBALS['WPPH_SCREEN_EDITOR_ENABLED']) ? 'true' : 'false',
                )
            );
        }
    }

    // 2023
    static function hookWatchCategoryAdd() { WPPHEventWatcher::watchCategoryAdd($_POST); }
    // 2024
    static function hookWatchCategoryDelete() { WPPHEventWatcher::watchCategoryDelete($_POST); }

// 3xxx - Themes management

    // 3000
    static function hookThemeChange() { add_action('switch_theme', array('WPPHEventWatcher', 'watchThemeChange'));}


// 4xxx - User profile events

    // 4000, 4001, 4012
    static function hookUserRegisterEvent()
    {
        if(WPPH::isMultisite()){
            // 4012
            add_action('user_register', array('WPPHEventWatcher', 'watchWpmuUserRegister'));
        }
        // 4000 & 4001
        else { add_action('user_register', array('WPPHEventWatcher', 'watchEventUserRegister')); }
    }
    // 4002
    static function hookUserRoleUpdated() {
        add_action('edit_user_profile_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
        add_action('personal_options_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
    }
    // 4003, 4004
    static function hookUserPasswordUpdated() {
        add_action('edit_user_profile_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
        add_action('personal_options_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
    }
    // 4005, 4006
    static function hookUserEmailUpdated() {
        add_action('edit_user_profile_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
        add_action('personal_options_update', array('WPPHEventWatcher', 'watchUserInfoUpdated'));
    }
    // 4008
    static function hookUserAdminPriv() {
        add_action('edit_user_profile_update', array('WPPHEventWatcher', 'watchUserAdminPrivUpdated'));
        add_action('personal_options_update', array('WPPHEventWatcher', 'watchUserAdminPrivUpdated'));
    }

    // 4007
    static function hookUserDeletion() { add_action( 'delete_user', array('WPPHEventWatcher', 'watchUserDeletion') ); }


// 5xxx - Plugin management

    // 5000, 5001, 5002, 5003, 5004
    static function hookWatchPluginActivity() {
        @include_once(ABSPATH.'wp-admin/includes/plugin.php');
        WPPHEventWatcher::watchPluginInstall();  // 5000
        WPPHEventWatcher::watchPluginActivate(); // 5001
        WPPHEventWatcher::watchPluginDeactivate(); // 5002
        WPPHEventWatcher::watchPluginUninstall();  // 5003
        WPPHEventWatcher::watchPluginUpgrade(); // 5004
    }


// 6xxx - System events


    // Events: 6001, 6002 are not available in MultiSite.
    // 6001, 6002, 6003
    static function hookCheckWpGeneralSettings(){
        if(WPPH::isMultisite())
        {
            if(isset($_POST))
            {
                if(isset($_POST['_wp_http_referer']) && !empty($_POST['_wp_http_referer'])){
                   $wp_referrer = $_POST['_wp_http_referer'];
                    if(false === ($pos = stripos($wp_referrer,'settings.php'))){
                        return;
                    }
                    // 6003
                    if(! empty($_POST['admin_email'])){
                        $from = get_option('admin_email');
                        $to = trim($_POST['admin_email']);
                        if(strcasecmp($from,$to)!=0){
                            wpphLog('Admin email changed',array(
                                'from' => $from,
                                'to' => $to
                            ));
                            self::_addLogEvent(6003, wp_get_current_user()->ID, WPPHUtil::getIP(), array($from, $to));
                        }
                    }
                }
            }
            return;
        }
        if(isset($_POST))
        {
            $wpphOptData = get_option(WPPH_USERS_CAN_REGISTER_OPT_NAME);

            // 6001
            if(!empty($_POST['option_page']) && $_POST['option_page'] == 'general')
            {
                if(isset($_POST['users_can_register'])){
                    // on
                    if(false === $wpphOptData || 0 == $wpphOptData){
                        self::_addLogEvent(6001, wp_get_current_user()->ID, WPPHUtil::getIP(), array(__('Enabled')));
                        update_option(WPPH_USERS_CAN_REGISTER_OPT_NAME,1);
                    }
                }
                else {
                    // off
                    if(false === $wpphOptData || 1 == $wpphOptData){
                        self::_addLogEvent(6001, wp_get_current_user()->ID, WPPHUtil::getIP(), array(__('Disabled')));
                        update_option('wpph_users_can_register',0);
                    }
                }

                // 6002
                if(! empty($_POST['default_role'])){
                    $from = get_option('default_role');
                    $to = trim($_POST['default_role']);
                    if(strcasecmp($from,$to)!=0){
                        wpphLog('Default user role changed',array(
                            'from' => $from,
                            'to' => $to
                        ));
                        self::_addLogEvent(6002, wp_get_current_user()->ID, WPPHUtil::getIP(), array($from, $to));
                    }
                }

                // 6003
                if(! empty($_POST['admin_email'])){
                    $from = get_option('admin_email');
                    $to = trim($_POST['admin_email']);
                    if(strcasecmp($from,$to)!=0){
                        wpphLog('Admin email changed',array(
                            'from' => $from,
                            'to' => $to
                        ));
                        self::_addLogEvent(6003, wp_get_current_user()->ID, WPPHUtil::getIP(), array($from, $to));
                    }
                }
            }
        }
    }



    /**
     * Add log event. Internal function. Do not use outside class scope.
     * @internal
     * @static
     * @param int $eventID
     * @param int $userID . A value of 0 means user "System". This is the ID of the user triggering the alert.
     * @param string $userIP
     * @param array $eventData Optional. If provided should be as an array.
     * @param string $failedLoginUserName The name of the user used for the failed login
     * @param int $blogID The blog id for which the event is triggered. If omitted, the global $blog_id variable will be used.
     * @return bool
     */
    static function _addLogEvent($eventID = 1000, $userID = 0, $userIP = '', $eventData = array(), $failedLoginUserName='', $blogID = null)
    {
        $params = func_get_args();
            wpphLog(__METHOD__.'() called with params:', $params);
        wpphLog(__METHOD__.'() triggered.');
        if(empty($blogID)){
            wpphLog('The blog ID was not provided. Trying to use the global $blog_id');
            global $blog_id; // try to get the current blog id if none provided
            if(empty($blog_id)){
                wpphLog('The blog ID could not be determined. Ignoring request for adding the log event.');
                return true;
            }
        }
        else { $blog_id = $blogID; }

        if(! wpph_isEventEnabled($eventID)){
            wpphLog('Event '.$eventID.' is not enabled. Ignoring request.');
            return true;
        }

        if(empty($userIP)){ $userIP = WPPHUtil::getIP(); }
        $tableName = WPPHDB::getFullTableName('MAIN');
        $eventData = base64_encode(serialize($eventData));
        $query = sprintf("INSERT INTO $tableName (EventID, UserID, UserIP, EventData, UserName, BlogId) VALUES(%d, %d, '%s', '%s', '%s', %d)",$eventID, $userID, $userIP, $eventData, $failedLoginUserName,$blog_id);

        global $wpdb;
        if($eventID == 1002){ // 1002 == failed login

            // check if there is already an event there
            $eventNumber = $wpdb->get_var("SELECT EventNumber FROM $tableName WHERE EventID = $eventID AND UserIP = '$userIP' AND UserName ='$failedLoginUserName'");
            if(! empty($eventNumber))
            {
                // update
                $query = "UPDATE $tableName
                            SET
                                EventDate = CURRENT_TIMESTAMP(),
                                EventCount = (EventCount + 1)
                                WHERE EventNumber = ".$eventNumber;
            }
        }
        return ((false === $wpdb->query($query)) ? false : true);
    }


/*
 * PUBLIC METHODS
 * ============================================
 */

    static function getEventDetailsData($eventID)
    {
        global $wpdb;
        $table = WPPHDatabase::getFullTableName('events');
        return $wpdb->get_row("SELECT EventType, EventDescription FROM $table WHERE EventID = $eventID");
    }

    /**
     * Retrieve the events from db.
     * @param string $orderBy. Must be a valid column name. Defaults to EventNumber
     * @param string $sort  ASC or DESC
     * @param array $limit
     * @param integer $blogId
     * @return mixed
     */
    static function getEvents($orderBy='EventNumber', $sort = 'DESC', $limit = array(0,0), $blogId = 1)
    {
        $validArgsSort = array('ASC', 'DESC');
        $validCnTableLogDetails = array('EventID', 'EventType');
        $validCnTableLog = array('EventNumber', 'EventDate', 'UserID', 'UserIP');

        $l0 = 0;
        $l1 = 1;
        if(isset($limit[0]) && ($limit[0] >= 0)){ $l0 = intval($limit[0]); }
        if(isset($limit[1]) && ($limit[1] >= 1)){ $l1 = intval($limit[1]); }
        $limit = "$l0,$l1";

        $sort = strtoupper($sort);
        if(empty($sort) || !in_array($sort, $validArgsSort)) { $sort = $validArgsSort[1]; }

        if(! empty($orderBy)){
            if(in_array($orderBy, $validCnTableLog)){
                $orderBy = 'le.'.$orderBy;
            }
            elseif(in_array($orderBy, $validCnTableLogDetails)){
                $orderBy = 'led.'.$orderBy;
            }
        }
        else { $orderBy = 'le.EventNumber'; }

        $t1 = WPPHDatabase::getFullTableName('main');
        $t2 = WPPHDatabase::getFullTableName('events');
        global $wpdb;
        $query = "SELECT le.EventNumber, le.EventID, le.EventDate, le.UserID, le.UserIP, le.EventData, le.EventCount, le.UserName, le.BlogId,
                      led.EventType, led.EventDescription
                    FROM `$t1` as le
                      INNER JOIN `$t2` as led
                        ON le.EventID = led.EventID
                      WHERE ($blogId = 0) OR (le.BlogId = $blogId)
                      ORDER BY $orderBy
                          $sort
                      LIMIT $limit;";
        return $wpdb->get_results($query, ARRAY_A);
    }

}

/**
 * Class WPPHEventWatcher
 * This class provides callable methods that are called inside the hooks registered
 * in the WPPHEvent class. All methods are internal and should not be used outside
 * scope.
 * @static
 * @internal
 */
class WPPHEventWatcher extends WPPHEvent
{
    /**
     * @internal
     * Hooks to the login event
     * @param $user_login
     * @param WP_User $user
     */
    static function watchEventLogin($user_login, $user)
    {
        wpphLog(__METHOD__.'() triggered by hook.');
        self::_addLogEvent(1000, $user->ID);
    }
    /**
     * @internal
     * Hooks to the logout event
     */
    static function watchEventLogout()
    {
        wpphLog(__METHOD__.'() triggered by hook.');
        self::_addLogEvent(1001, wp_get_current_user()->ID);
    }


    /**
     * @internal
     * Hooks to the user register event
     */
    static function watchEventUserRegister($user_id)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        global $current_user;
        get_currentuserinfo();

        $un = (empty($current_user->user_login) ? 'System' : $current_user->user_login);
        $uInfo = WPPHDB::getUserInfo($user_id);
        $nu = $uInfo['userName'];
        $nur = ucfirst($uInfo['userRole']);

        wpphLog(__METHOD__.'() -> USER INFO', array('user_id'=>$user_id, 'current_user'=>$current_user, 'user_info'=>$uInfo));

        if($un == 'System')
        {
            // A new user with the username %username% has registered with the role of %user_role%
            $eventData = array($nu, $nur);
            self::_addLogEvent(4000, 0, WPPHUtil::getIP(), $eventData);
        }
        else {
            // %s created new user %s with role %s
            $eventData = array($un, $nu, $nur);
            self::_addLogEvent(4001, $current_user->ID, WPPHUtil::getIP(), $eventData);
        }
    }

    /**
     *  6000
     * @internal
     * Hooks to the events deletion event
     */
    static function __deleteEvents()
    {
        wpphLog(__METHOD__.'() triggered.');

        // check settings and delete the events (if any)
        $settings = WPPH::getPluginSettings();

        $runCleanup  = ((time() - $settings->lastCleanup) < WPPH_CLEANUP_WAIT_TIME);
        if(! $runCleanup){
            wpphLog(__METHOD__.'() Ignored. Not enough time elapsed between deletion requests.');
            return;
        }

        // check to see how we should do the cleanup (by days or by number)
        $cleanupType = 1; // by number by default

        if(!empty($settings->daysToKeep)){
            $cleanupType = 0;
        }

        // by days
        if($cleanupType == 0)
        {
            if(self::_deleteEventsOlderThan($settings->daysToKeep)){
                $settings->cleanupRan = 1;
                $settings->lastCleanup = time();
                self::_addLogEvent(6000, 0);
                wpphLog(__METHOD__.'() Cleanup complete.');
            }
        }
        // by number
        else
        {
            if(self::_deleteEventsGreaterThan($settings->eventsToKeep)){
                $settings->cleanupRan = 1;
                $settings->lastCleanup = time();
                self::_addLogEvent(6000, 0);
                wpphLog(__METHOD__.'() Cleanup complete.');
            }
        }
        WPPH::updatePluginSettings($settings);
    }

    //@internal
    // delete by days
    private static function _deleteEventsOlderThan($days = 1)
    {
        global $wpdb;

        // run for each blog
        if(WPPH::isMultisite())
        {
            $old_blog = $wpdb->blogid;
            $blogIds = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
            foreach ($blogIds as $blog_id)
            {
                switch_to_blog($blog_id);
                $query = sprintf("DELETE FROM ".WPPHDatabase::getFullTableName('main')." WHERE BlogID=%d EventDate < (NOW() - INTERVAL %d DAY)",$blog_id, $days);
                $result = $wpdb->query($query);
                if($result === false){ $status = 'Error executing query'; }
                else { $status = 'Query executed'; }
                wpphLog(__METHOD__.'('.$days.') called for blog: '.$blog_id.'.', array('query'=>$query, 'status'=>$status, 'rowsDeleted'=> (int)$result));
            }
            switch_to_blog($old_blog);
            return true;
        }
        else {
            $query = sprintf("DELETE FROM ".WPPHDatabase::getFullTableName('main')." WHERE EventDate < (NOW() - INTERVAL %d DAY)", $days);
            $result = $wpdb->query($query);
            if($result === false){ $status = 'Error executing query'; }
            else { $status = 'Query executed'; }
            wpphLog(__METHOD__.'('.$days.') called.', array('query'=>$query, 'status'=>$status, 'rowsDeleted'=> (int)$result));
            return ($result !== false);
        }

    }
    //@internal
    // delete by number
    private static function _deleteEventsGreaterThan($number = WPPH_KEEP_MAX_EVENTS)
    {
        global $wpdb;
        if($number > WPPH_KEEP_MAX_EVENTS){ $number = WPPH_KEEP_MAX_EVENTS; }
        $tableName = WPPHDatabase::getFullTableName('main');

        // run for each blog
        if(WPPH::isMultisite())
        {
            $old_blog = $wpdb->blogid;
            $blogIds = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
            foreach ($blogIds as $blog_id)
            {
                switch_to_blog($blog_id);
                $count = $wpdb->get_var(sprintf("SELECT COUNT(0) FROM $tableName WHERE BlogID=%d",$blog_id));
                if(empty($count)){
                    wpphLog(__METHOD__.'('.$number.') called for blog id: '.$blog_id.'. Ignored, there are no events for this blog id in the database.');
                    continue;
                }
                $keep = $number;
                if($count > $keep)
                {
                    $limit = $count - $keep;
                    $query = sprintf("DELETE FROM $tableName WHERE BlogID=%d ORDER BY EventDate LIMIT %d", $blog_id, $limit);
                    $result = $wpdb->query($query);
                    if($result === false){ $status = 'Error executing query'; }
                    else { $status = 'Query executed'; }
                    wpphLog(__METHOD__.'('.$number.') called for blog id: '.$blog_id.'.', array('query'=>$query, 'status'=>$status, 'rowsAffected'=> (int)$result));
                    return ($result !== false);
                }
                else {
                    wpphLog(__METHOD__.'('.$number.') called for blog id: '.$blog_id.'.  Ignored, there are not enough events to perform this action.');
                    continue;
                }
            }
            switch_to_blog($old_blog);
            return true;
        }
        else {
            $count = $wpdb->get_var("SELECT COUNT(0) FROM $tableName");
            if(empty($count)){
                wpphLog(__METHOD__.'('.$number.') called.  Ignored, there are no events in the database');
                return true;
            }
            $keep = $number;
            if($count > $keep)
            {
                $limit = $count - $keep;
                $query = "DELETE FROM $tableName ORDER BY EventDate LIMIT $limit";
                $result = $wpdb->query($query);
                if($result === false){ $status = 'Error executing query'; }
                else { $status = 'Query executed'; }
                wpphLog(__METHOD__.'('.$number.') called.', array('query'=>$query, 'status'=>$status, 'rowsAffected'=> (int)$result));
                return ($result !== false);
            }
            else {
                wpphLog(__METHOD__.'('.$number.') called.  Ignored, there are not enough events to trigger this action.');
                return true;
            }
        }
    }

    /**
     * @internal
     * Fired on login failure
     */
    static function watchLoginFailure($username='')
    {
        wpphLog(__METHOD__.'() triggered by hook.', array('username'=>$username));
        self::_addLogEvent(1002,0,WPPHUtil::getIP(),array($username), base64_encode($username));
    }

    static function watchUserInfoUpdated($userID)
    {
        wpphLog(__METHOD__.'() triggered by hook.', array('POST DATA'=>$_POST));

        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        $cid = $current_user->ID;
        $cName = $current_user->user_login;

        // get info for the currently updated user
        $editedUserInfo = WPPHDB::getUserInfo($userID);
        $editedUserName = $editedUserInfo['userName'];
        $initialUserRole = $editedUserInfo['userRole'];

        // check and see *what* has been updated...

        // If a user's role has been updated
        if(!empty($_POST['role'])){
            $updatedRole = trim($_POST['role']);
            if(self::_userRoleUpdated($cid, $initialUserRole, $updatedRole, $editedUserName, $cName)){
                //return;
            }
        }

        // If a user's password has been updated
        if(!empty($_POST['pass1'])){
            if(self::_userPasswordUpdated($userID, $cid, $cName, $editedUserName, $initialUserRole)){
               // return;
            }
        }

        // if a user's email was updated
        if(! empty($_POST['email'])){
            global $wpdb;
            // get current user's email
            $oldEmail = $wpdb->get_var("SELECT user_email FROM ".$wpdb->users." WHERE ID = $userID");
            // new email
            $newEmailSafe = mysql_real_escape_string($_POST['email']);
            self::_userEmailUpdated($userID, $cid, $cName, $oldEmail, $newEmailSafe);
        }
    }

    /**
     * @internal
     * Triggered when a user's role is updated
     * @param $currentUserID
     * @param $initialUserRole
     * @param $updatedRole
     * @param $editedUserName
     * @param $currentUserName
     * @return bool
     */
    private static function _userRoleUpdated($currentUserID, $initialUserRole, $updatedRole, $editedUserName, $currentUserName)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        if(strcasecmp($initialUserRole, $updatedRole)==0){
            wpphLog(__METHOD__.'() Ignored. Role did not change.');
            return false;
        }

        // The role of user <strong>%s</strong> was changed from <strong>%s</strong> to <strong>%s</strong> by <strong>%s</strong>
        $eData = array($editedUserName, ucfirst($initialUserRole), ucfirst($updatedRole), $currentUserName);

        self::_addLogEvent(4002, $currentUserID, WPPHUtil::getIP(), $eData);
        return true;
    }

    /**
     * @internal
     * Triggered when a user's role is updated
     * @param $userID
     * @param $currentUserID
     * @param $currentUserName
     * @param $editedUserName
     * @param $editedUserRole
     * @return bool
     */
    private static function _userPasswordUpdated($userID, $currentUserID, $currentUserName, $editedUserName, $editedUserRole)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        // check to see who's who here
        if($userID == $currentUserID)
        {
            self::_addLogEvent(4003, $currentUserID);
            return true;
        }

        $eData = array($currentUserName, $editedUserName, ucfirst($editedUserRole));
        self::_addLogEvent(4004, $currentUserID, WPPHUtil::getIP(), $eData);
        return true;
    }

    /**
     * @internal
     * Triggered when a user's email is updated
     * @param $userID The user ID triggering this hook
     * @param $currentUserID The ID of the current logged in user
     * @param $currentUserName
     * @param $oldEmail
     * @param $newEmail
     * @return bool
     */
    private static function _userEmailUpdated($userID, $currentUserID, $currentUserName, $oldEmail, $newEmail)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        // check if email updated
        if($newEmail == $oldEmail){
            wpphLog(__METHOD__.'() Ignored. Email did not change.');
            return false;
        }

        // check to see who's who here
        if($userID == $currentUserID)
        {
            self::_addLogEvent(4005, $currentUserID, WPPHUtil::getIP(), array($oldEmail, $newEmail));
            return true;
        }

        // get info for the currently updated user
        $editedUserInfo = WPPHDB::getUserInfo($userID);
        $editedUserName = $editedUserInfo['userName'];

        // %user_making_change% changed the email address of user account %user% from %old_email% to %new_email%
        $eData = array($currentUserName, $editedUserName, $oldEmail, $newEmail);

        self::_addLogEvent(4006, $currentUserID, WPPHUtil::getIP(), $eData);
        return true;
    }

    /**
     * @internal
     * @param $userID the id of the user being deleted
     * Triggered when a user is deleted
     */
    static function watchUserDeletion($userID)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        global $current_user;
        get_currentuserinfo();

        $un = (empty($current_user->user_login) ? 'System' : $current_user->user_login);
        if($un == 'System'){
            $currentUserID = 0;
        }
        else { $currentUserID = $current_user->ID; }

        // get info for the currently deleted user
        $_userInfo = WPPHDB::getUserInfo($userID);
        $_userName = $_userInfo['userName'];
        $_userRole = ucfirst($_userInfo['userRole']);

        self::_addLogEvent(4007, $currentUserID, WPPHUtil::getIP(), array($_userName, $_userRole, $un));
    }

    // # 5001
    static function watchPluginActivate()
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        $userID = wp_get_current_user()->ID;
        $userIP = WPPHUtil::getIP();

        // activate one by link
        if(isset($_GET['action']) && ($_GET['action']=='activate') || isset($_GET['action2']) && ($_GET['action2']=='activate'))
        {
            wpphLog('------------------------------- 1 ------------------------------');
            $pluginFile = isset($_GET['plugin']) ? $_GET['plugin'] : null;
            if(empty($pluginFile)){
                wpphLog("EMPTY plugin param in GET");
                return;
            }
            $fp = WP_PLUGIN_DIR.'/'.$pluginFile;
            if(! is_file($fp)){
                wpphLog("Plugin not found", array('filePath'=>$fp));
                return;
            }
            $pluginData = get_plugin_data($fp,false,false);
            self::_addLogEvent(5001, $userID, $userIP, array($pluginData['Name'],$pluginFile));
            wpphLog('Plugin activated.', array('plugin file'=>$pluginFile));
            return;
        }
        // one by bulk
        elseif(isset($_POST['action']) && ($_POST['action'] == 'activate-selected') || (isset($_POST['action2']) && ($_POST['action2'] == 'activate-selected')))
        {
            wpphLog('------------------------------- 2 ------------------------------');
            if(! empty($_POST['checked']))
            {
                foreach($_POST['checked'] as $k=>$pluginFile)
                {
                    if(empty($pluginFile)){
                        wpphLog("EMPTY plugin param in POST");
                        return;
                    }
                    $fp = WP_PLUGIN_DIR.'/'.$pluginFile;
                    if(! is_file($fp)){
                        wpphLog("Plugin not found", array('filePath'=>$fp));
                        return;
                    }
                    $pluginData = get_plugin_data($fp,false,false);
                    self::_addLogEvent(5001, $userID, $userIP, array($pluginData['Name'],$pluginFile));
                    wpphLog('Plugin activated.', array('plugin file'=>$pluginFile));
                }
            }
        }
        // more by bulk
        elseif(isset($_POST['activate-multi']) && ($_POST['action']=='activate-selected' || (isset($_POST['action2']) && $_POST['action2']=='activate-selected')))
        {
            wpphLog('------------------------------- 3 ------------------------------');
            if(! empty($_POST['checked']))
            {
                foreach($_POST['checked'] as $k=>$pluginFile)
                {
                    if(empty($pluginFile)){
                        wpphLog("EMPTY plugin param in POST");
                        return;
                    }
                    $fp = WP_PLUGIN_DIR.'/'.$pluginFile;
                    if(! is_file($fp)){
                        wpphLog("Plugin not found", array('filePath'=>$fp));
                        return;
                    }
                    $pluginData = get_plugin_data($fp,false,false);
                    self::_addLogEvent(5001, $userID, $userIP, array($pluginData['Name'],$pluginFile));
                    wpphLog('Plugin activated.', array('plugin file'=>$pluginFile));
                }
            }
        }
    }
    // # 5002
    static function watchPluginDeactivate()
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        // get info for the currently logged in user
        $userID = wp_get_current_user()->ID;
        $userIP = WPPHUtil::getIP();

        // activate one by link
        if((isset($_GET['action']) && $_GET['action']=='deactivate') || isset($_GET['action2']) && ($_GET['action2']=='deactivate'))
        {
            wpphLog('------------------------------- 1 ------------------------------');
            $pluginFile = $_GET['plugin'];
            $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
            $pluginName = $pluginData['Name'];
            self::_addLogEvent(5002, $userID, $userIP, array($pluginName,$pluginFile));
            wpphLog('Plugin deactivated.', array('plugin file'=>$pluginFile));
        }
        // one by bulk
        elseif((isset($_POST['action']) && $_POST['action'] == 'deactivate-selected') || isset($_POST['action2']) && ($_POST['action2'] == 'deactivate-selected'))
        {
            if(! empty($_POST['checked']))
            {
                wpphLog('------------------------------- 2 ------------------------------');
                foreach($_POST['checked'] as $k=>$pluginFile){
                    $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
                    $pluginName = $pluginData['Name'];
                    self::_addLogEvent(5002, $userID, $userIP, array($pluginName,$pluginFile));
                    wpphLog('Plugin deactivated.', array('plugin file'=>$pluginFile));
                }
            }
        }
        // more by bulk
        elseif(isset($_GET['deactivate-multi']) && (isset($_POST['action']) && $_POST['action']=='deactivate-selected' || (isset($_POST['action2']) && $_POST['action2']=='deactivate-selected')))
        {
            if(! empty($_POST['checked']))
            {
                wpphLog('------------------------------- 3 ------------------------------');
                foreach($_POST['checked'] as $k=>$pluginFile){
                    $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
                    $pluginName = $pluginData['Name'];
                    self::_addLogEvent(5002, $userID, $userIP, array($pluginName,$pluginFile));
                    wpphLog('Plugin deactivated.', array('plugin file'=>$pluginFile));
                }
            }
        }
    }

    // # 5000
    static function watchPluginInstall()
    {
        if(defined('WPPH_PLUGIN_INSTALLED_OK')){ return; }
        if(empty($_GET)) { return; }

        if(isset($_GET['action']) && $_GET['action']=='install-plugin'){
            wpphLog(__METHOD__.'() triggered by hook.');
            wpph_installPlugin($_GET['plugin'], wp_get_current_user()->ID, WPPHUtil::getIP());
        }
        elseif(isset($_GET['action2']) && $_GET['action2']=='install-plugin'){
            wpphLog(__METHOD__.'() triggered by hook.');
            wpph_installPlugin($_GET['plugin'], wp_get_current_user()->ID, WPPHUtil::getIP());
        }
    }
    // # 5003
    static function watchPluginUninstall()
    {
        if(empty($_POST)) { return; }
        if(! isset($_POST['verify-delete'])) { return; }
        if(empty($_POST['checked'])){ return; }

        $action = '';
        if(! empty($_POST['action'])){ $action = $_POST['action'];}
        elseif(! empty($_POST['action2'])){ $action = $_POST['action2'];}
        if(empty($action) || $action != 'delete-selected') {
            return;
        }

        wpphLog(__METHOD__.'() triggered by hook.');
        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        foreach($_POST['checked'] as $pluginFile){
            $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
            $pluginName = $pluginData['Name'];
            self::_addLogEvent(5003,$current_user->ID, WPPHUtil::getIP(), array($pluginName,$pluginFile));
            wpphLog('Plugin uninstalled.', array('plugin file'=>$pluginFile));
        }
    }
    // # 5004
    static function watchPluginUpgrade()
    {
        wpphLog(__METHOD__.'() triggered.');

        $current_user = wp_get_current_user();
        $userID = $current_user->ID;
        $ip = WPPHUtil::getIP();

        // One by link
        if(!empty($_GET))
        {
            if(isset($_GET['action']) && !empty($_GET['action']))
            {
                $action = $_GET['action'];
                if(! in_array($action, array('upgrade-plugin', 'update-selected'))){
                    return;
                }
                if(! empty($_GET['plugin'])){ $pluginFile = $_GET['plugin']; }
                if(empty($pluginFile)){
                    return;
                }
                $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
                $pluginName = $pluginData['Name'];
                // Upgraded the plugin <strong>%s</strong> installed in /<strong>%s</strong>
                self::_addLogEvent(5004,$current_user->ID, WPPHUtil::getIP(), array($pluginName,$pluginFile));
                wpphLog('Plugin upgraded.', array('plugin file'=>$pluginFile));
                return;
            }
        }
        elseif(isset($_POST))
        {
            $action = '';
            if(isset($_POST['action']) && !empty($_POST['action'])){
                $action = $_POST['action'];
                if(! in_array($action, array('upgrade-plugin', 'update-selected'))){
                    $action = '';
                    if(isset($_POST['action2']) && !empty($_POST['action2'])){
                        $action = $_POST['action2'];
                        if(! in_array($action, array('upgrade-plugin', 'update-selected'))){
                            return;
                        }
                    }
                }
            }
            if(empty($action)) { return; }

            if(! isset($_POST['checked']) || empty($_POST['checked'])){
                return;
            }
            foreach($_POST['checked'] as $i=>$pluginFile){
                $pluginData = get_plugin_data(WP_PLUGIN_DIR.'/'.$pluginFile,false,false);
                $pluginName = $pluginData['Name'];
                self::_addLogEvent(5004,$userID, $ip, array($pluginName,$pluginFile));
                wpphLog('Plugin upgraded.', array('plugin file'=>$pluginFile));
            }
        }
    }


    static function watchBlogActivity($newStatus, $oldStatus, $post)
    {
        wpphLog(__METHOD__.'() triggered.');

        wpphLog(__METHOD__.'. POST STATUS DATA', array(
            '$oldStatus' => $oldStatus,
            '$newStatus' => $newStatus,
            '$postStatus' => $post->post_status,
            '$post' => $post
        ));

        // IGNORE STATES - so we skip generating multiple events
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { wpphLog('Doing autosave'); return; }
        if(empty($post->post_type)){ wpphLog('Empty post->post_type'); return; }
        if($post->post_type == 'revision') { wpphLog('Post type == revision.'); return; }
        if($newStatus == 'auto-draft' || ($oldStatus == 'new' && $newStatus=='auto-draft')) { wpphLog('Doing draft autosave'); return; }

        $types = WPPHPost::getPostTypes();
        if(! in_array($post->post_type, $types)){
            wpphLog('Invalid post type.', array('post-type'=>$post->post_type));
            return;
        }
        do_action('wpph_set_post_type','custom');

        $postID = $post->ID;
        $postTitle = $post->post_title;
        $postUrl = get_permalink($postID);
        $postStatus = $post->post_status;
        $currentUserID  = wp_get_current_user()->ID;
        $userID = $postAuthorID = (int)$post->post_author;
        if($currentUserID != $postAuthorID){
            // someone else is doing this
            $userID = $currentUserID;
        }

        // CHECK TO SEE IF THIS UPDATE IS FROM THE QUICK EDIT FORM or the default wp post editor
        if(isset($_POST['original_post_status']))
        {
            $originalPostStatus = $_POST['original_post_status'];
        }
        else{
            // quick edit form
            $originalPostStatus = (isset($_POST['_status']) ? $_POST['_status'] : null);
        }

        if(empty($originalPostStatus)){
//            wpphLog(__METHOD__.' $_POST["_status"] not found. $originalPostStatus is EMPTY - nothing to do here.');
//            wpphLog(__METHOD__.' POST DATA',$_POST);
            return;
        }

        $postTypePost = $postTypePage = $customPostType = false;

        if($post->post_type == 'post'){ $postTypePost = true;}
        elseif($post->post_type == 'page'){ $postTypePage = true;}
        else { $customPostType = true; }

        if(!$postTypePost && !$postTypePage && !$customPostType){
            wpphLog('Ignored. Invalid post type', array('postType'=>$post->post_type));
            return;
        }

        WPPHPost::$currentPostType = $post->post_type;

        global $wpdb;

        //## 2025 & 2026 & 2040
        if($customPostType){ self::watchPostVisibilityChange($oldStatus, $newStatus, $userID, $postTitle, $post, 2040); }
        else { self::watchPostVisibilityChange($oldStatus, $newStatus, $userID, $postTitle, $post, ($postTypePost) ? 2025 : 2026); }

        //## 2027 & 2028 & 2041
        if(! in_array($oldStatus, array('new', 'auto-draft'))){
            if($customPostType){ self::watchPostDateChange($userID, $postTitle, $post->post_date, 2041);}
            else { self::watchPostDateChange($userID, $postTitle, $post->post_date, ($postTypePost) ? 2027 : 2028); }
        }

        //## 2016 & 2036
        if($postTypePost){ self::watchPostCategoriesChange($post, $wpdb, $postTitle, 2016); }
        elseif($customPostType){ self::watchPostCategoriesChange($post, $wpdb, $postTitle, 2036); }

        //## 2019 & 2020 & 2038
        $authorChanged = false;
        if(isset($GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID']))
        {
            $quickFormEnabled = isset($GLOBALS['WPPH_SCREEN_EDITOR_ENABLED']) ? true : false;
            if($customPostType){
                if(WPPHPost::postAuthorChanged((int)$GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'], $postID, $userID, $postTitle, 2038, $quickFormEnabled)){
                    $GLOBALS['WPPH_POST_AUTHOR_UPDATED'] = true;
                    $authorChanged = true;
                }
            }
            else {
                if(WPPHPost::postAuthorChanged((int)$GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'], $postID, $userID, $postTitle, ($postTypePost) ? 2019 : 2020, $quickFormEnabled)){
                    $GLOBALS['WPPH_POST_AUTHOR_UPDATED'] = true;
                    $authorChanged = true;
                }
            }
            unset($GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID']);
        }

        // 2000 & 2004 & 2029
        if($newStatus != 'publish'){
            if($originalPostStatus == 'auto-draft' || ($oldStatus=='new' && $newStatus=='inherit' && $postStatus=='inherit'))
            {
                if($customPostType){ WPPHPost::newPostAsDraft($userID, $postID, $postTitle, 2029); }
                else { WPPHPost::newPostAsDraft($userID, $postID, $postTitle, ($postTypePost) ? 2000 : 2004); }
            }
        }

        // check if post/page modified
        $postModified = self::watchPostChanged($wpdb, $postID);
        wpphLog('POST MODIFIED',array('modified'=> $postModified ? 'true' : 'false'));

        //## 2000 & 2003 & 2004 & 2007 & 2032
        if(($oldStatus == 'draft') && ($newStatus == 'draft' && $postStatus == 'draft'))
        {
            if($originalPostStatus == 'draft')
            {
                //## 2003 - draft post updated
                if($postTypePost || $customPostType){
                    // only if 2016 || 2017 || 2019 were not triggered
                    if(isset($GLOBALS['WPPH_POST_CATEGORIES_UPDATED']) || isset($GLOBALS['WPPH_POST_URL_UPDATED']) || isset($GLOBALS['WPPH_POST_AUTHOR_UPDATED'])){}
                    else {
                        $event = ($customPostType ? 2032 : 2003);
                        WPPHPost::draftPostUpdated($userID, $postID, $postTitle, $event);
                        $postModified = false;
                    }
                }
                //## 2007 - draft page updated
                else {
                    // only if 2018 || 2020 were not triggered
                    if(isset($GLOBALS['WPPH_PAGE_URL_UPDATED']) || isset($GLOBALS['WPPH_PAGE_AUTHOR_UPDATED'])){}
                    else {
                        WPPHPost::draftPostUpdated($userID, $postID, $postTitle, 2007);
                        $postModified = false;
                    }
                }
            }
        }

        //## 2001 & 2005 & 2030 - new post/page published
        elseif(in_array($oldStatus, array('draft','auto-draft','pending')) && $newStatus == 'publish' && $postStatus == 'publish')
        {
            $event = 0;
            if($customPostType) { $event = 2030;}
            elseif($postTypePost) { $event = 2001; }
            elseif($postTypePage) { $event = 2005; }
            if(! empty($event)){
                WPPHPost::newPostPublished($userID, $postTitle, $postUrl, $event);
                return; // no need to process further
            }
        }

        //## 2021 & 2022 & 2039 : published -> pending
        elseif($oldStatus == 'publish' && $newStatus == 'pending' && $postStatus == 'pending')
        {
            $event = 0;
            if($customPostType) { $event = 2039;}
            elseif($postTypePost) { $event = 2021; }
            elseif($postTypePage) { $event = 2022; }
            if(! empty($event)){
                WPPHPost::postStatusChanged($postTitle, __('Published'), __('Pending Review'), $userID, $event);
            }
        }

        //## 2021 & 2022 & 2039   : pending -> draft
        elseif($oldStatus == 'pending' && $newStatus == 'draft' && $postStatus == 'draft')
        {
            $event = 0;
            if($customPostType) { $event = 2039;}
            elseif($postTypePost) { $event = 2021; }
            elseif($postTypePage) { $event = 2022; }
            if(! empty($event)){
                WPPHPost::postStatusChanged($postTitle, __('Pending Review'), __('Draft'), $userID, $event);
            }
        }

        //## 2021 & 2022 & 2039  : draft -> pending
        elseif($oldStatus == 'draft' && $newStatus == 'pending' && $postStatus == 'pending')
        {
            $event = 0;
            if($customPostType) { $event = 2039;}
            elseif($postTypePost) { $event = 2021; }
            elseif($postTypePage) { $event = 2022; }
            if(! empty($event)){
                WPPHPost::postStatusChanged($postTitle, __('Draft'), __('Pending Review'), $userID, $event);
            }
        }

        //## 2021 & 2022 & 2039  :  published -> draft
        elseif($oldStatus == 'publish' && $newStatus == 'draft' && $postStatus == 'draft')
        {
            $event = 0;
            if($customPostType) { $event = 2039;}
            elseif($postTypePost) { $event = 2021; }
            elseif($postTypePage) { $event = 2022; }
            if(! empty($event)){
                WPPHPost::postStatusChanged($postTitle, __('Published'), __('Draft'), $userID, $event);
            }
        }

        //## 2002 & 2006 & 2017 & 2018 & 2031 & 2037 : published post/page updated
        elseif($oldStatus == 'publish' && $newStatus == 'publish' && $postStatus == 'publish')
        {
            // trigger: 2017 & 2018 & 2037 - Changed the URL of the post %post_name% from %old_url% to %new_url%
            if(isset($GLOBALS['WPPH_POST_NEW_URL']) || $postModified)
            {
                $event = 0;
                if($customPostType) { $event = 2037;}
                elseif($postTypePost) { $event = 2017; }
                elseif($postTypePage) { $event = 2018; }
                if(! empty($event)){
                    if(WPPHPost::postUrlUpdated($GLOBALS['WPPH_POST_NEW_URL'], get_permalink($postID), $userID, $postTitle, $event))
                    {
                        unset($GLOBALS['WPPH_POST_NEW_URL']);
                        $GLOBALS['WPPH_POST_URL_UPDATED'] = $postTypePost;
                        $GLOBALS['WPPH_PAGE_URL_UPDATED'] = $postTypePage;
                    }
                }
            }
            // 2002 & 2031
            if($postTypePost || $customPostType)
            {
                if(isset($GLOBALS['WPPH_POST_CATEGORIES_UPDATED']) || isset($GLOBALS['WPPH_POST_URL_UPDATED'])
                    || isset($GLOBALS['WPPH_POST_AUTHOR_UPDATED']) || isset($GLOBALS['WPPH_POST_PROTECTED_TRANSITION'])
                    || isset($GLOBALS['WPPH_POST_DATE_CHANGED']) || isset($GLOBALS['WPPH_PREVENT_BUBBLE'])){}
                // Modified the published blog post %post_title%. Blog post URL is %post_URL%
                else {
                    if(! $authorChanged){
                        WPPHPost::publishedPostUpdated($userID, $postTitle, $postUrl, ($postTypePost) ? 2002 : 2031);
                    }
                }
            }
            else
            {
                if(isset($GLOBALS['WPPH_PAGE_URL_UPDATED']) || isset($GLOBALS['WPPH_PAGE_AUTHOR_UPDATED'])
                    || isset($GLOBALS['WPPH_PAGE_PROTECTED_TRANSITION']) || isset($GLOBALS['WPPH_POST_DATE_CHANGED'])
                    || isset($GLOBALS['WPPH_PREVENT_BUBBLE'])){}
                // Modified the published page %page_title%. Page URL is %URL%
                else {
                    if(! $authorChanged){
                        WPPHPost::publishedPostUpdated($userID, $postTitle, $postUrl, 2006);
                    }
                }
            }
            // no need to process further
            return;
        }

        // if post name changed - we probably have a URL change here
        // 2003 & 2007 & 2032
        if($postModified){
            if( isset($GLOBALS['WPPH_PAGE_AUTHOR_UPDATED']) || isset($GLOBALS['WPPH_PAGE_AUTHOR_UPDATED'])
                || isset($GLOBALS['WPPH_POST_CATEGORIES_UPDATED'])|| isset($GLOBALS['WPPH_POST_DATE_CHANGED'])){}
            else {
                $event = 0;
                if($customPostType) { $event = 2032;}
                elseif($postTypePost) { $event = 2003; }
                elseif($postTypePage) { $event = 2007; }
                if(! empty($event)){
                    WPPHPost::draftPostUpdated($userID, $postID, $postTitle, $event);
                }
            }
        }
    }

    static function watchTrash($postID)
    {
        wpphLog(__METHOD__.'() triggered by hook.');
        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        global $wpdb;
        $postInfo = $wpdb->get_row("SELECT post_title, post_type FROM ".$wpdb->posts." WHERE ID = ".$postID);
        $postTitle = $postInfo->post_title;
        $postType = $postInfo->post_type;
        $customPostType = false;
        $postTypePost = (($postType == 'post') ? true : false);
        $postTypePage = (($postType == 'page') ? true : false);
        if(!$postTypePost && !$postTypePage){
            if(WPPHPost::validatePostType($postType)){
                $customPostType = true;
            }
        }
        $event = 0;
        if($customPostType) { $event = 2033;}
        elseif($postTypePost) { $event = 2008; }
        elseif($postTypePage) { $event = 2009; }
        if(! empty($event)){
            if($event == 2033){
                self::_addLogEvent($event, $current_user->ID, WPPHUtil::getIP(), array($postTitle, ucfirst($postType), $postID));
            }
            else { self::_addLogEvent($event, $current_user->ID, WPPHUtil::getIP(), array($postTitle,$postID)); }

            wpphLog('Post/Page deleted.', array('title'=>$postTitle, 'id'=>$postID));
        }
    }

    // 2010
    static function watchFileUploaded($attachmentID)
    {
        global $wpdb;
        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        $rowData = $wpdb->get_row("SELECT guid FROM ".$wpdb->posts." WHERE ID = ".$attachmentID);
        $fileName = basename($rowData->guid);
        $dirName = dirname($rowData->guid);
        // Uploaded the file %file name$ in %file location%
        self::_addLogEvent(2010, $current_user->ID, WPPHUtil::getIP(), array($fileName, $dirName));
        wpphLog('File uploaded.', array('title'=>$fileName, 'url'=>$dirName));
        $GLOBALS['WPPH_PLUGIN_FILE_UPLOADED_IGNORE_DELETE'] = true;
    }
    // 2011
    static function watchFileUploadedDeleted($attachmentID)
    {
        if(isset($GLOBALS['WPPH_PLUGIN_FILE_UPLOADED_IGNORE_DELETE'])){
            // return, because if this variable is set this means this action is
            // triggered inside WP after uploading a plugin and there's no reason to log this event.
            return;
        }
        global $wpdb;
        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        $rowData = $wpdb->get_row("SELECT post_title, guid FROM ".$wpdb->posts." WHERE ID = ".$attachmentID);
        // Deleted file %file name$ from %file_location%
        self::_addLogEvent(2011, $current_user->ID, WPPHUtil::getIP(), array($rowData->post_title,dirname($rowData->guid)));
        wpphLog('File deleted.', array('title'=>$rowData->post_title, 'url'=>dirname($rowData->guid)));
    }

    // 2012, 2013, 2034
    static function watchFileDeletion($postID)
    {
        global $wpdb;
        $userID = wp_get_current_user()->ID;
        $postInfo = $wpdb->get_row("SELECT post_title, post_type FROM ".$wpdb->posts." WHERE ID = ".$postID);
        $postTitle = $postInfo->post_title;
        $postType = $postInfo->post_type;
        $customPostType = false;
        $postTypePost = (($postType == 'post') ? true : false);
        $postTypePage = (($postType == 'page') ? true : false);
        if(!$postTypePost && !$postTypePage){
            if(WPPHPost::validatePostType($postType)){
                $customPostType = true;
            }
        }
        $event = 0;
        if($customPostType) { $event = 2034;}
        elseif($postTypePost) { $event = 2012; }
        elseif($postTypePage) { $event = 2013; }
        if(! empty($event)){
            if($event == 2034){
                self::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst($postType)));
            }
            else { self::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle)); }
            wpphLog('Post/Page trashed.', array('name'=>$postTitle));
        }
    }

    // 2014, 2015, 2035
    static function watchTrashUndo($postID)
    {
        global $wpdb;
        $userID = wp_get_current_user()->ID;
        $postInfo = $wpdb->get_row("SELECT post_title, post_type FROM ".$wpdb->posts." WHERE ID = ".$postID);
        $postTitle = $postInfo->post_title;
        $postType = $postInfo->post_type;
        $customPostType = false;
        $postTypePost = (($postType == 'post') ? true : false);
        $postTypePage = (($postType == 'page') ? true : false);
        if(!$postTypePost && !$postTypePage){
            if(WPPHPost::validatePostType($postType)){
                $customPostType = true;
            }
        }
        $event = 0;
        if($customPostType) { $event = 2035;}
        elseif($postTypePost) { $event = 2014; }
        elseif($postTypePage) { $event = 2015; }
        if(! empty($event)){
            if($event == 2035){
                self::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst($postType)));
            }
            else { self::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle)); }
            wpphLog('Post/Page restored from trash.', array('name'=>$postTitle));
        }
    }

    static function watchWidgetActivity()
    {
        if ('POST' != strtoupper($_SERVER['REQUEST_METHOD']))
        {
            return;
        }
        if(!isset($_POST['widget-id']) || empty($_POST['widget-id'])){
            return;
        }

        $postData = $_POST;

        wpphLog(__METHOD__.'() triggered by hook.');
        //wpphLog('POST DATA', $postData);

        global $wp_registered_sidebars;
        $canCheckSidebar = (empty($wp_registered_sidebars) ? false : true);
        $userID = wp_get_current_user()->ID;

        // if widget added
        if(isset($postData['add_new']) && $postData['add_new'] == 'multi')
        {
            $widgetType = $postData['id_base'];
            $sidebar = $postData['sidebar'];
            if($canCheckSidebar && preg_match("/^sidebar-/",$sidebar)){
                $sidebar = $wp_registered_sidebars[$sidebar]['name'];
            }
            self::_addLogEvent(2042, $userID, WPPHUtil::getIP(), array($widgetType, $sidebar));
            wpphLog('User added a widget.', array('type'=>$widgetType, 'sidebar'=>$sidebar));
        }
        // if widget deleted
        elseif(isset($postData['delete_widget']) && intval($postData['delete_widget']) == 1)
        {
            $widgetType = $postData['id_base'];
            $sidebar = $postData['sidebar'];
            if($canCheckSidebar && preg_match("/^sidebar-/",$sidebar)){
                $sidebar = $wp_registered_sidebars[$sidebar]['name'];
            }
            self::_addLogEvent(2044, $userID, WPPHUtil::getIP(), array($widgetType, $sidebar));
            wpphLog('User deleted a widget.', array('type'=>$widgetType, 'sidebar'=>$sidebar));
        }
        // if widget modified
        elseif(isset($postData['id_base']) && !empty($postData['id_base']))
        {
            wpphLog('CHECKING IF WIDGET MODIFIED....');
            // get info from $_POST
            $wId = 0;
            if(! empty($postData['multi_number'])){
                $wId = intval($postData['multi_number']);
            }
            else {
                if(! empty($postData['widget_number'])){
                    $wId = intval($postData['widget_number']);
                }
            }
            if(empty($wId)){
                wpphLog('EMPTY $wId');
                return;
            }
            $wName = $postData['id_base'];
            $sidebar = $postData['sidebar'];
            $wData = isset($postData["widget-".$wName][$wId]) ? $postData["widget-".$wName][$wId] : null;

            if(empty($wData)){
                wpphLog('EMPTY $wData');
                return;
            }
            // get info from db
            $wdbData = get_option("widget_".$wName);
            if(empty($wdbData[$wId])){
                wpphLog('EMPTY $wbData[$wId]');
                return;
            }
            // transform 'on' -> 1
            foreach($wData as $k=>&$v){
                if($v == 'on'){ $v = 1; }
            }
            // compare - checks for any changes inside widgets
            $diff = array_diff_assoc($wData, $wdbData[$wId]);
            $count = count($diff);
            if($count > 0){
                if($canCheckSidebar && preg_match("/^sidebar-/",$sidebar)){
                    $sidebar = $wp_registered_sidebars[$sidebar]['name'];
                }
                //wpphLog('DIFF EXISTS.', array('wdata'=>$wData, 'wdbdata'=>$wdbData[$wId], 'diff'=>$diff));
                self::_addLogEvent(2043, $userID, WPPHUtil::getIP(), array($wName, $sidebar));
                wpphLog('User modified a widget.', array('type'=>$wName, 'sidebar'=>$sidebar));
            }
            else {wpphLog('No change.');}
        }
    }
    //@ 2045
    static function watchWidgetMove()
    {
        if(isset($_POST) && !empty($_POST['sidebars']))
        {
            wpphLog('Checking for moved widgets');
            $crtSidebars = $_POST['sidebars'];
            $sidebars = array();
            //-- WP
            foreach ( $crtSidebars as $key => $val ) {
                $sb = array();
                if ( !empty($val) ) {
                    $val = explode(',', $val);
                    foreach ( $val as $k => $v ) {
                        if ( strpos($v, 'widget-') === false ){ continue; }
                        $sb[$k] = substr($v, strpos($v, '_') + 1);
                    }
                }
                $sidebars[$key] = $sb;
            }
            //-- WP
            $crtSidebars = $sidebars;
            $dbSidebars = get_option('sidebars_widgets');
            $wName = $fromSidebar = $toSidebar = '';
            foreach($crtSidebars as $sidebarName => $values)
            {
                if(is_array($values) && ! empty($values))
                {
                    if(isset($dbSidebars[$sidebarName]))
                    {
                        foreach($values as $i => $widgetName)
                        {
                            if(! in_array($widgetName, $dbSidebars[$sidebarName])){
                                $toSidebar = $sidebarName;
                                $wName = $widgetName;
                                foreach($dbSidebars as $name => $v){
                                    if(is_array($v) && !empty($v)){
                                        if(in_array($widgetName, $v)){
                                            $fromSidebar = $name;
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if(empty($wName) || empty($fromSidebar) || empty($toSidebar)){
                wpphLog('No change.');
                return;
            }

            $userID = wp_get_current_user()->ID;
            $ip = WPPHUtil::getIP();

            if(preg_match("/^sidebar-/", $fromSidebar) || preg_match("/^sidebar-/",$toSidebar)){
                // This option will hold the data needed to trigger the event 2045
                // as at this moment the $wp_registered_sidebars variable is not yet populated
                // so we cannot retrieve the name for sidebar-1 || sidebar-2
                // we will then check for this variable in the triggerWidgetMoveEvent() function
                $GLOBALS['WPPH_WIDGET_MOVE'] = array('widget'=>$wName, 'from'=>$fromSidebar, 'to'=>$toSidebar, 'user'=>$userID, 'ip', 'ip'=>$ip);
                wpphLog('Widget moved. Data saved to variable: WPPH_WIDGET_MOVE');
                return;
            }
            self::_addLogEvent(2045, $userID, $ip, array($wName, $fromSidebar, $toSidebar));
        }
    }

    static  function triggerWidgetMoveEvent()
    {
        wpphLog(__METHOD__.'() triggered.');
        $data = (isset($GLOBALS['WPPH_WIDGET_MOVE']) ? $GLOBALS['WPPH_WIDGET_MOVE'] : null);
        if(empty($data)){
            wpphLog("Global var: WPPH_WIDGET_MOVE not available yet. Nothing to do here.");
            return;
        }
        $from = $data['from'];
        $to = $data['to'];
        global $wp_registered_sidebars;
        if(preg_match("/^sidebar-/", $from)){ $from = (isset($wp_registered_sidebars[$from]) ? $wp_registered_sidebars[$from]['name'] : $from); }
        if(preg_match("/^sidebar-/", $to)){ $to = (isset($wp_registered_sidebars[$to]) ? $wp_registered_sidebars[$to]['name'] : $to); }
        self::_addLogEvent(2045, $data['user'], $data['ip'], array($data['widget'], $from, $to));
    }


    // 3000 - Theme activated
    static function watchThemeChange($themeName)
    {
        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        // // Activated the theme %themeName%
        self::_addLogEvent(3000, $current_user->ID, WPPHUtil::getIP(), array($themeName));
        wpphLog('Theme activated.', array('name'=>$themeName));
    }

    // 2023 - category created
    static function watchCategoryAdd(array $postData)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        if(!empty($_POST['screen']) && !empty($_POST['tag-name']) &&
            $_POST['screen'] == 'edit-category' &&
            $_POST['taxonomy'] == 'category' &&
            $_POST['action'] == 'add-tag')
        {
            $categoryName = sanitize_text_field($_POST['tag-name']);

            // get info for the currently logged in user
            $current_user = wp_get_current_user();
            // Created a new category called %categoryName%
            self::_addLogEvent(2023, $current_user->ID, WPPHUtil::getIP(), array($categoryName));
            wpphLog('Category added.', array('name'=>$categoryName));
        }
        // adding the new category when writing a blog post
        elseif(! empty($_POST['newcategory']) && $_POST['action'] == 'add-category')
        {
            $categoryName = sanitize_text_field($_POST['newcategory']);

            // get info for the currently logged in user
            $current_user = wp_get_current_user();
            // Created a new category called %categoryName%
            self::_addLogEvent(2023, $current_user->ID, WPPHUtil::getIP(), array($categoryName));
            wpphLog('Category added.', array('name'=>$categoryName));
        }
    }

    // 2024 - category deleted
    static function watchCategoryDelete(array $postData)
    {
        wpphLog(__METHOD__.'() triggered by hook.');

        if(empty($postData)){ return; }

        // get info for the currently logged in user
        $current_user = wp_get_current_user();
        $userID = $current_user->ID;
        $userIP = WPPHUtil::getIP();

        //@internal
        function __alertDeletedCategory($userID, $userIP, $categoryID){
            $category = get_category($categoryID);
            $categoryName = $category->cat_name;
            WPPHEvent::_addLogEvent(2024, $userID, $userIP, array($categoryName));
            wpphLog('Category deleted.', array('name'=>$categoryName));
        }

        $action = '';
        if(! empty($postData['action'])){ $action = $postData['action'];}
        elseif(! empty($postData['action2'])){ $action = $postData['action2'];}
        if(empty($action)) {
            return;
        }

        // delete one
        if($action == 'delete-tag' && $postData['taxonomy'] == 'category' && !empty($postData['tag_ID'])){
            __alertDeletedCategory($userID, $userIP, $postData['tag_ID']);
        }

        // bulk delete
        elseif($action == 'delete' && $postData['taxonomy'] == 'category' && !empty($postData['delete_tags'])){
            foreach($postData['delete_tags'] as $categoryID){
                __alertDeletedCategory($userID, $userIP, $categoryID);
            }
        }
    }

    //  2025, 2026
    static function watchPostVisibilityChange($oldStatus, $newStatus, $userID, $postTitle, $post, $event)
    {
        $args = func_get_args();
        wpphLog(__METHOD__.'() triggered.', array('params'=>$args));

        global $wpdb;

        $crtPostPassword = $wpdb->get_var("SELECT post_password FROM ".$wpdb->posts." WHERE ID = ".$post->ID);
        $oldPostPassword = (isset($GLOBALS['WPPH_OLD_POST_PASSWORD']) ? $GLOBALS['WPPH_OLD_POST_PASSWORD'] : null);

        $from = $to = '';

        // public -> pwd protected
        // pwd protected -> public
        if($oldStatus == 'publish' && $newStatus == 'publish')
        {
            if(! WPPH::isMultisite()){
                // if post is already pwd protected and there is no change, it will still be issued an event: public to pwd protected
                if(isset($GLOBALS['WPPH_POST_PWD_PROTECTED']) && $GLOBALS['WPPH_POST_PWD_PROTECTED']){
                    $GLOBALS['WPPH_PREVENT_BUBBLE'] = true;
                    wpphLog(__METHOD__.'() No change.');
                    return;
                }
            }

            // pwd protected -> public
            if(empty($crtPostPassword) && !empty($oldPostPassword)){
                $from = __('Password Protected');
                $to = __('Public');
            }
            // public -> pwd protected
            else {
                if(! empty($crtPostPassword)){
                    $from = __('Public');
                    $to = __('Password Protected');
                }
            }
        }
        // public -> private
        // pwd protected -> private
        elseif($oldStatus == 'publish' && $newStatus == 'private')
        {
            // public -> private
            if(empty($crtPostPassword) && empty($oldPostPassword)){
                $from = __('Public');
                $to = __('Private');
            }
            // pwd protected -> private
            else {
                if(!empty($oldPostPassword)){
                    $from = __('Password Protected');
                    $to = __('Private');
                }
            }
        }
        // private -> public
        // private -> pwd protected
        elseif($oldStatus == 'private' && $newStatus == 'publish')
        {
            // private -> public
            if(empty($oldPostPassword) && empty($crtPostPassword)){
                $from = __('Private');
                $to = __('Public');
            }
            // private -> pwd protected
            else {
                if(empty($oldPostPassword) && !empty($crtPostPassword)){
                    $from = __('Private');
                    $to = __('Password Protected');
                }
            }
        }
        wpphLog("Changing post visibility:",array('from'=>$from, 'to'=>$to));
        if(empty($from) || empty($to)){
            return;
        }

        $GLOBALS['WPPH_PREVENT_BUBBLE'] = true;
        WPPHPost::postVisibilityChanged($userID, $postTitle, $from, $to, $event);
    }

    // 2027 & 2028
    static function watchPostDateChange($userID, $postTitle, $postCurrentDate, $event)
    {
        wpphLog(__METHOD__.'() triggered.');

        if($GLOBALS['WPPH_POST_IS_NEW']){
            wpphLog('Nothing to do. The post is brand new.');
            return;
        }
        if(empty($GLOBALS['WPPH_POST_OLD_DATE'])){
            wpphLog('Empty global WPPH_POST_OLD_DATE, nothing to do.');
            return;
        }

        $t1 = strtotime($GLOBALS['WPPH_POST_OLD_DATE']);
        $t2 = strtotime($postCurrentDate);

        if($t1 == $t2){
            wpphLog('No change.');
            return;
        }
        if(empty($t1) || empty($postCurrentDate)){
            wpphLog('Empty $t1 or $postCurrentDate. Nothing to do.');
            return;
        }

        $format = get_option('date_format');
        $from = date($format, $t1);
        $to = date($format, $t2);
        if($from == $to){
            wpphLog('No date change.');
            return;
        }
        wpphLog('POST DATE CHANGED',array(
            'from' => $from . '('.$t1.')',
            'to' => $to . '('.$t2.')'
        ));
        WPPHPost::postDateChanged($userID, $postTitle, $from, $to, $event);
    }

    static function watchPostCategoriesChange($post, $wpdb, $postTitle, $event)
    {
        wpphLog(__METHOD__.'() triggered.');

        if(! wpph_isEventEnabled($event)){
            wpphLog('Event '.$event.' is not enabled. Ignoring request.');
            return true;
        }

        if(isset($GLOBALS['WPPH_POST_OLD_CATEGORIES']))
        {
            $originalCats = $GLOBALS['WPPH_POST_OLD_CATEGORIES'];
            $categories_1 = array();
            foreach($originalCats as $catID){
                $cat = get_category($catID);
                array_push($categories_1, $cat->name);
            }
            $categories_2 = array();
            $newCats = $post->post_category;
            if(empty($newCats)){
                wpphLog('No categories found for this post.');
                return true;
            }
            wpphLog('$newCats', $newCats);
            foreach($newCats as $catID){
                if(empty($catID)){
                    wpphLog('Category is empty: '.$catID);
                    continue;
                }
                $cat = get_category($catID);
                array_push($categories_2, $cat->name);
            }

            sort($categories_1);
            sort($categories_2);

            // categories updated
            if($categories_1 <> $categories_2)
            {
                if(empty($categories_1)){
                    // get the name of the default category
                    $optID = get_option('default_category');
                    $query = $wpdb->prepare("SELECT wpt.name FROM ".$wpdb->terms." AS wpt
                                                 INNER JOIN ".$wpdb->options." AS wpo
                                                  WHERE wpo.option_id = %d
                                                    AND wpt.term_id = %d;", $optID, $optID);
                    $defaultCategoryName = $wpdb->get_var($query);

                    // if categories-2 contains only the name of the default category...
                    if(count($categories_2) == 1){
                        if(strcasecmp($categories_2[0], $defaultCategoryName) == 0){
                            // nothing to do here...
                            $GLOBALS['WPPH_POST_CATEGORIES_UPDATED'] = true;
                        }
                    }
                    else {
                        $c1 = implode(', ', $categories_1);
                        $c2 = implode(', ', $categories_2);
                        WPPHPost::postCategoriesUpdated(wp_get_current_user()->ID, $postTitle, $c1, $c2, $event);
                        $GLOBALS['WPPH_POST_CATEGORIES_UPDATED'] = true;
                    }
                }
                else {
                    $c1 = implode(', ', $categories_1);
                    $c2 = implode(', ', $categories_2);
                    WPPHPost::postCategoriesUpdated(wp_get_current_user()->ID, $postTitle, $c1, $c2, $event);
                    $GLOBALS['WPPH_POST_CATEGORIES_UPDATED'] = true;
                }
            }
        }
    }

    // 2017 & 2018 - Post/page modified
    // convenience method to trigger a post/page modified event
    static function watchPostChanged($wpdb, $postID)
    {
        wpphLog(__METHOD__.'() triggered.');

        if(isset($GLOBALS['WPPH_POST_OLD_NAME'])){
            // get the current post name and compare
            $result = $wpdb->get_row("SELECT post_title, post_name, post_password, post_date FROM ".$wpdb->posts." WHERE ID = $postID");
            if(empty($result)){ return false; }
            $postName = (empty($result->post_name) ? $result->post_title : $result->post_name);
            return($GLOBALS['WPPH_POST_OLD_NAME'] != $postName);
        }
        return false;
    }


    // 7000 new site added to network
    static function watchBlogAdded($blog_id, $user_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7000, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog added: '.$blogName.'; user ID = '.$user_id);
    }

    // 7001 - blog archived
    static function watchBlogArchived($blog_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7001, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog archived: '.$blogName);
    }

    // 7002 - blog unarchived
    static function watchBlogUnarchived($blog_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7002, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog unarchived: '.$blogName);
    }

    // 7003 - blog activated
    static function watchBlogActivated($blog_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7003, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog activated: '.$blogName);
    }

    // 7004 - blog deactivated
    static function watchBlogDeactivated($blog_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7004, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog deactivated: '.$blogName);
    }

    // 7005 - blog deleted
    static function watchBlogDeleted($blog_id)
    {
        if(empty($blog_id)) { return; }
        $blogName = WPPHNetwork::getBlogName($blog_id);
        if(empty($blogName)) { return; }
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        WPPHEvent::_addLogEvent(7005, wp_get_current_user()->ID, WPPHUtil::getIP(), array($blogName), null, $currentBlogID);
        wpphLog(__METHOD__.'() triggered by hook. Blog deleted: ', array('id'=>$blog_id, 'name'=>$blogName));
    }

    // 4008 && 4009
    static function watchUserAdminPrivUpdated($userID)
    {
        wpphLog(__METHOD__.'() triggered by hook.');
        wpphLog('POST DATA', $_POST);

        // 4008
        if(isset($_POST['super_admin']) && !empty($_POST['super_admin']))
        {
            $bid = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
            $userName = trim($_POST['display_name']);
            WPPHEvent::_addLogEvent(4008, wp_get_current_user()->ID, WPPHUtil::getIP(), array($userName), null, $bid);
        }
        // 4009
        else {
            $bid = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
            $superAdmins = get_super_admins();
            $u = new WP_User($userID);
            $userName = $u->get('user_login');
            if(! empty($superAdmins)){
                foreach($superAdmins as $admin){
                    if($admin == $userName){
                        WPPHEvent::_addLogEvent(4009, wp_get_current_user()->ID, WPPHUtil::getIP(), array($userName), null, $bid);
                        return;
                    }
                }
            }
        }
    }

    // 4010
    static function watchUserAddedToBlog($user_id, $role, $blog_id)
    {
        wpphLog(__METHOD__.'() triggered with params: ', array(
                '$user_id' => $user_id,
                '$role' => $role,
                '$blog_id' => $blog_id
            ));

        // current blog id
        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);

        // get current user info
        $userInfo = WPPHDB::getUserInfo($user_id);
        $userName = $userInfo['userName'];
        $siteName = WPPHNetwork::getBlogName($blog_id);

        WPPHEvent::_addLogEvent(4010, wp_get_current_user()->ID, WPPHUtil::getIP(), array($userName, $role, $siteName), null, $currentBlogID);
        wpphLog('User added to site.');
    }

    // 4011
    static function watchUserRemovedFromBlog($user_id)
    {
        $blog_id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : 0);
        wpphLog(__METHOD__.'() triggered with params: ', array(
                '$user_id' => $user_id,
                '$blog_id' => $blog_id
            ));

        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);

        // get current user info
        $userInfo = WPPHDB::getUserInfo($user_id);
        $userName = $userInfo['userName'];
        $userRole = $userInfo['userRole'];
        $siteName = WPPHNetwork::getBlogName($blog_id);

        if(empty($currentBlogID) || empty($userName) || empty($userRole) || empty($siteName)){
            wpphLog('Cannot trigger the event 4011. One or more required variables are empty.', array(
                '$currentBlogID' => $currentBlogID,
                '$userName' => $userName,
                '$userRole' => $userRole,
                '$siteName' => $siteName,
            ));
            return;
        }

        WPPHEvent::_addLogEvent(4011, wp_get_current_user()->ID, WPPHUtil::getIP(), array($userName, $userRole, $siteName), null, $currentBlogID);
        wpphLog('User removed from site.');
    }

    // 4012
    static function watchWpmuUserRegister($user_id)
    {
        wpphLog(__METHOD__.'() triggered with params: ', array('$user_id' => $user_id));

        $currentBlogID = WPPHNetwork::getGlobalOption(WPPH_MAIN_SITE_ID_OPTION_NAME, false, true);
        $userInfo = WPPHDB::getUserInfo($user_id);
        $userName = $userInfo['userName'];

        WPPHEvent::_addLogEvent(4012, wp_get_current_user()->ID, WPPHUtil::getIP(), array($userName), null, $currentBlogID);
        wpphLog('Created new network user.');
    }



}
