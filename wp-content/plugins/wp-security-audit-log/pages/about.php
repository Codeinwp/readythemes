<?php if(! WPPHUtil::canViewPage()){ return; } ?>
<?php
    if(! WPPH::ready())
    {
        $errors = WPPH::getPluginErrors();
        foreach($errors as $error) {
            wpph_adminNotice(base64_decode($error));
        }
        echo '<div id="wpph-pageWrapper" class="wrap">';
        echo '<p>'.__('We have encountered some errors during the installation of the plugin which you can find above.',WPPH_PLUGIN_TEXT_DOMAIN).'</p>';
        echo '<p>'.__('Please try to correct them and then reactivate the plugin.',WPPH_PLUGIN_TEXT_DOMAIN).'</p>';
        echo '</div>';
        return;
    }
?>
<div id="wpph-pageWrapper" class="wrap">
    <h2 class="pageTitle pageTitle-about"><?php echo __('About us',WPPH_PLUGIN_TEXT_DOMAIN);?></h2>
    <div>
        <p><?php echo sprintf(__('WP Security Audit Log is a WordPress security plugin developed by %s.',WPPH_PLUGIN_TEXT_DOMAIN), '<a href="http://www.wpwhitesecurity.com">WP White Security</a>');?></p>
    </div>
</div>
