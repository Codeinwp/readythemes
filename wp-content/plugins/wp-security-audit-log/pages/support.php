<?php if(! WPPHUtil::canViewPage()){ return; } ?><?php
if(! WPPH::ready())
{
    $errors = WPPH::getPluginErrors();
    foreach($errors as $error) {
        wpph_adminNotice($error);
    }
    echo '<div id="wpph-pageWrapper" class="wrap">';
    echo '<p>'.__('We have encountered some errors during the installation of the plugin which you can find above.',WPPH_PLUGIN_TEXT_DOMAIN).'</p>';
    echo '<p>'.__('Please try to correct them and then reactivate the plugin.',WPPH_PLUGIN_TEXT_DOMAIN).'</p>';
    echo '</div>';
    return;
}
?>
<div id="wpph-pageWrapper" class="wrap">
    <h2 class="pageTitle pageTitle-support"><?php echo __('Support',WPPH_PLUGIN_TEXT_DOMAIN);?></h2>
    <div>
        <p><?php echo
            sprintf(__('Thank you for showing interest and using our plugin. If you encounter any issues running this plugin, or have suggestions or queries, please get in touch with us on %s.',WPPH_PLUGIN_TEXT_DOMAIN),
            '<a href="mailto:plugins@wpwhitesecurity.com">plugins@wpwhitesecurity.com</a>');?></p>
    </div>
</div>
