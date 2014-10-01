<?php
define('WPPH_PLUGIN_VERSION_OPTION_NAME','WPPH_PLUGIN_VERSION');
define('WPPH_PLUGIN_ERROR_OPTION_NAME','WPPH_PLUGIN_ERROR');
define('WPPH_PLUGIN_SETTING_NAME', 'wpph_plugin_settings');

define('WPPH_PLUGIN_DB_UPDATED', 'WPPH_PLUGIN_DB_UPDATED');
define('WPPH_PLUGIN_DEL_EVENTS_CRON_TASK_NAME', 'wpph_plugin_delete_events_cron');
/** @since v0.3 */
define('WPPH_USERS_CAN_REGISTER_OPT_NAME', 'wpph_users_can_register');
/**
 * @since v0.3
 * @see WPPH::onPluginActivate()
 */
$GLOBALS['WPPH_CAN_RUN'] = true;
/**@since 0.4*/
define('WPPH_PLUGIN_TEXT_DOMAIN', 'wp-security-audit-log');
/**@since 0.4*/
define('WPPH_E_NOTICE_TEXT', __('NOTICE',WPPH_PLUGIN_TEXT_DOMAIN));
/**@since 0.4*/
define('WPPH_E_HIGH_TEXT', __('HIGH',WPPH_PLUGIN_TEXT_DOMAIN));
/**@since 0.4*/
define('WPPH_E_WARNING_TEXT', __('WARNING',WPPH_PLUGIN_TEXT_DOMAIN));

/**@since 0.4*/
define('WPPH_KEEP_MAX_EVENTS', 5000);

//since v0.5
define('WPPH_PLUGIN_ALLOW_ACCESS_OPTION_NAME','WPPH_PLUGIN_ALLOW_ACCESS');
define('WPPH_PLUGIN_ALLOW_CHANGE_OPTION_NAME','WPPH_PLUGIN_ALLOW_CHANGE');
define('WPPH_PLUGIN_EVENTS_LIST_OPTION_NAME', 'WPPH_PLUGIN_EVENTS_LIST');

//since v0.6
define('WPPH_NETWORK_ID_OPTION_NAME','WPPH_NETWORK_ID');
define('WPPH_MAIN_SITE_ID_OPTION_NAME','WPPH_MAIN_SITE_ID');
