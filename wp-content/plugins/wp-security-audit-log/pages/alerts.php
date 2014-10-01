<?php if(! WPPHUtil::canViewPage()){ return; } ?>
<?php
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
<?php
// defaults
$defaultEvents = WPPH::getDefaultEvents();
$logEvents = WPPH::getEvents();
$validationMessage = array();
$sectionNames = (empty($logEvents)) ? array(): array_keys($logEvents);
$activeTab = 0;
$rm = strtoupper($_SERVER['REQUEST_METHOD']);
if('POST' == $rm)
{
    // Check nonce
    if(isset($_POST['wpph_update_settings_field_nonce'])){
        if(!wp_verify_nonce($_POST['wpph_update_settings_field_nonce'],'wpph_update_settings')){
            wp_die('Invalid request');
        }
    }
    else {wp_die('Invalid request');}

    $hasErrors = false;
    $activeTab = intval($_POST['activeTab']);
    $inputEvents = $_POST['inputEvents'];
    $inputEvents = str_replace("\\", "",$inputEvents);
    $inputEvents = json_decode($inputEvents, true);
    if(is_null($inputEvents)){
        $validationMessage['error'] = __('JSON Decode Error: ',WPPH_PLUGIN_TEXT_DOMAIN).json_last_error();
        $hasErrors = true;
    }

    // save options
    if(!$hasErrors)
    {
        $logEvents = array();
        $wpphEvents = WPPH::getEvents();
        foreach($wpphEvents as $category=>$entries){
            $logEvents[$category] = array();
            foreach($entries as $event=>$entry){
                $logEvents[$category][$event] = 1;
            }
        }
        foreach($inputEvents as $category=>$entries){
            foreach($entries as $entry){
                $event = (int)$entry['e'];
                // validate event before insert
                if(isset($wpphEvents[$category][$event])){
                    $logEvents[$category][$event] = 0;
                }
            }
        }
        wpph_updatePluginEventsList($logEvents);
        $validationMessage['success'] = __('Your settings have been saved.',WPPH_PLUGIN_TEXT_DOMAIN);
    }
}
// end $post
?>
<div id="wpph-pageWrapper" class="wrap">
    <h2 class="pageTitle pageTitle-settings"><?php echo __('Enable/Disable Alerts',WPPH_PLUGIN_TEXT_DOMAIN);?></h2>

    <div id="optionsDescription">
        <p id="description" style="background: none repeat scroll 0 0 #EEEEEE;border: 1px solid #AAAAAA;border-radius: 4px 4px 4px 4px;box-shadow: 2px 2px 3px #DDDDDD;">
            <?php
            echo __('From this page you can enable or disable WordPress security alerts. If a security alert is disabled, an alert will not be generated in the Audit Log Viewer once such action happens.',WPPH_PLUGIN_TEXT_DOMAIN);
            echo '<br/>'.__('To disable a security alert, select the category tab and untick the alert. Click Save Settings when ready.',WPPH_PLUGIN_TEXT_DOMAIN);
            ?>
        </p>
    </div>

    <?php if(! empty($validationMessage)) : ?>
        <?php
            if(!empty($validationMessage['error'])){ wpph_adminNotice($validationMessage['error']); }
            else { wpph_adminUpdate($validationMessage['success']); }
        ?>
    <?php endif;?>

<?php if(!empty($sectionNames)) : ?>
    <div id="logEventsTabControl" style="margin: 20px 0; opacity: 0;">
        <form id="updateSettingsForm" method="post">
            <?php wp_nonce_field('wpph_update_settings','wpph_update_settings_field_nonce'); ?>
            <?php
                echo '<ul id="tabControlNavBar">';
                foreach($sectionNames as $item){
                    echo '<li data-id="'.$item.'"><a href="#'.$item.'"/>'.str_replace('_',' ', $item).'</a></li>';
                }
                echo '</ul>';

                foreach($logEvents as $sectionName => $items){
                    echo '<div id="'.$sectionName.'">';
                    echo '<table class="wp-list-table widefat" cellspacing="0" cellpadding="0">';
                    echo '<thead>';
                        echo '<th class="manage-column column-cb check-column item-cb item-cb_h" scope="col"><input type="checkbox" class="js-select-all"/></th>';
                        echo '<th class="manage-column item-event" scope="col">'.__('Event',WPPH_PLUGIN_TEXT_DOMAIN).'</th>';
                        echo '<th class="manage-column item-type" scope="col">'.__('Type',WPPH_PLUGIN_TEXT_DOMAIN).'</th>';
                        echo '<th class="manage-column item-description" scope="col">'.__('Description',WPPH_PLUGIN_TEXT_DOMAIN).'</th>';
                    echo '</thead>';
                    echo '<tbody>';
                    $disabledEvents = array(6001,6002);
                    foreach($items as $item => $enabled){
                        if(in_array((int)$item, $disabledEvents)){
                            $t = sprintf(__('Event %s is not available in MultiSite.',WPPH_PLUGIN_TEXT_DOMAIN), $item);
                            echo '<tr class="row" title="'.$t.'">';
                            echo '<th class="manage-column column-cb check-column item-cb_h" scope="row"><input class="item_cb" type="checkbox" disabled="disabled"/></th>';
                            echo '<td class="wpph-text-disabled">'.$item.'</td>';
                            echo '<td class="wpph-text-disabled">'.(isset($defaultEvents[$sectionName][$item]['type']) ? $defaultEvents[$sectionName][$item]['type'] : '').'</td>';
                            echo '<td class="wpph-text-disabled">'.(isset($defaultEvents[$sectionName][$item]['text']) ? $defaultEvents[$sectionName][$item]['text'] : '').'</td>';
                            echo '</tr>';
                        }
                        else {
                            echo '<tr class="row">';
                            echo '<th class="manage-column column-cb check-column item-cb_h" scope="row"><input class="item_cb" type="checkbox" '.($enabled ? 'checked="checked"' : '').' value="'.$item.'"/></th>';
                            echo '<td>'.$item.'</td>';
                            echo '<td>'.(isset($defaultEvents[$sectionName][$item]['type']) ? $defaultEvents[$sectionName][$item]['type'] : '').'</td>';
                            echo '<td>'.(isset($defaultEvents[$sectionName][$item]['text']) ? $defaultEvents[$sectionName][$item]['text'] : '').'</td>';
                            echo '</tr>';

                        }
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                }
            ?>
            <input type="submit" id="submitButton" class="button button-primary" style="margin: 0 0 12px 19px;" value="<?php echo __('Save settings',WPPH_PLUGIN_TEXT_DOMAIN);?>"/>
            <input type="hidden" id="inputEvents" name="inputEvents" value=""/>
            <input type="hidden" id="activeTab" name="activeTab" value=""/>
        </form>
    </div>
    <?php else : ?>
        <div class="error"><p><?php echo __('Error retrieving the list of events from database. Please inform the plugin author about this.',WPPH_PLUGIN_TEXT_DOMAIN);?></p></div>
    <?php endif; ?>
</div>
<br class="clear"/>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var tabControl = $('#logEventsTabControl');
        var activeTab = $('#activeTab');
        tabControl.tabs();
        tabControl.tabs("option", "active", <?php echo $activeTab;?>);
        tabControl.css('opacity',1);
        // update select all checkbox
        $('#tabControlNavBar li').each(function(){
            var sectionName = $(this).data('id');
            if(sectionName.length > 0){
                $('#'+sectionName+' input:checkbox.item_cb').each(function() {
                    var self = $(this);
                    if (self.prop('checked')) {
                        $('#'+sectionName+' input:checkbox.js-select-all').attr('checked','checked');
                    }
                });
            }
        });
        //
        // form submit
        $('#submitButton').on('click',function()
        {
            activeTab.val(tabControl.tabs("option","active"));
            // build options
            var e = $('#inputEvents')
                ,catList = $('#tabControlNavBar li')
                ,outData = {};
            catList.each(function(){
                var sectionName = $(this).data('id');
                if(sectionName.length > 0){
                    outData[sectionName] = [];
                    $('#'+sectionName+' input:checkbox.item_cb').each(function() {
                        var self = $(this);
                        if (!self.prop('checked')) {
                            outData[sectionName].push({"e": self.val()});
                        }
                    });
                }
            });
            e.val(JSON.stringify(outData));
        });
    });
</script>