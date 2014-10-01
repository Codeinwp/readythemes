<?php //if(! WPPHUtil::canViewPage()){ return; } ?>
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
$opt = WPPH::getPluginSettings();
$daysInput = 0;
$eventsNumber = 0;
$validationMessage = array();
$hasErrors = false;
$showDW = (empty($opt->showDW) ? false : true);
// active delete option for events
if(!empty($opt->daysToKeep)){ $daysInput = $opt->daysToKeep; $activeOption = 1; }
if(! empty($opt->eventsToKeep)){ $eventsNumber = $opt->eventsToKeep; $activeOption = 2; }
$allowedAccess = WPPHNetwork::getGlobalOption(WPPH_PLUGIN_ALLOW_ACCESS_OPTION_NAME, true, true, array());
$allowedChange = WPPHNetwork::getGlobalOption(WPPH_PLUGIN_ALLOW_CHANGE_OPTION_NAME, true, true, array());
if(! isset($activeOption)){ $activeOption = 2; }
// end defaults

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

    // method to use
    if(! isset($_POST['deleteEventsBy'])){ wp_die('Invalid request'); }
    // value to use
    if(! isset($_POST['deleteEventsValue'])){ wp_die('Invalid request'); }
    $deleteEventsBy = intval($_POST['deleteEventsBy']);
    $deleteEventsValue = intval($_POST['deleteEventsValue']);

    $pac = (isset($_POST['accessListInput']) ? trim($_POST['accessListInput']) : null);
    $pcc = (isset($_POST['changeListInput']) ? trim($_POST['changeListInput']) : null);

    // pre-validate access rules if any
    if(! empty($pac) && strlen($pac)>4){
        $pac = str_replace('\\','', $pac);
        $allowedAccess = json_decode($pac);
        if(is_null($allowedAccess)){
            wpphLog('Error decoding json input $pac.', array('pac'=>$pac));
            $validationMessage['error'] = __('UAL: Error decoding json input', WPPH_PLUGIN_TEXT_DOMAIN);
            $hasErrors = true;
        }
        else {
            wpphLog('accessListInput is not empty.', array('pac'=>$pac,'data'=>$allowedAccess));
            WPPHUtil::saveAllowAccessUserList($allowedAccess);
        }
    }
    else {
        wpphLog('accessListInput is empty. Resetting the user access list.');
        WPPHUtil::saveAllowAccessUserList(array());
    }

    // pre-validate change rules if any
    if(! empty($pcc) && strlen($pcc)>4){
        $pcc = str_replace('\\','', $pcc);
        $allowedChange = json_decode($pcc);
        if(is_null($allowedChange)){
            wpphLog('Error decoding json input $pcc.', array('pcc'=>$pcc));
            $validationMessage['error'] = __('UCL: Error decoding json input: '.$pcc.' '.var_export($allowedChange,true), WPPH_PLUGIN_TEXT_DOMAIN);
            $hasErrors = true;
        }
        else {
            wpphLog('changeListInput is not empty.', array('pcc'=>$pcc,'data'=>$allowedChange));
            WPPHUtil::saveAllowedChangeUserList($allowedChange);
        }
    }
    else {
        wpphLog('changeListInput is empty. Resetting the user access list.');
        WPPHUtil::saveAllowedChangeUserList(array());
    }

    // if Delete events older than ... days
    if($deleteEventsBy == 1)
    {
        $activeOption = 1;
        $daysInput = $deleteEventsValue;

        // Validate
        if(!preg_match('/^\d+$/',$deleteEventsValue)){
            $validationMessage['error'] = __('Incorrect number of days. Please specify a value between 1 and 365.',WPPH_PLUGIN_TEXT_DOMAIN);
            $hasErrors = true;
        }
        elseif($deleteEventsValue < 1 || $deleteEventsValue > 365){
            $validationMessage['error'] = __('Incorrect number of days. Please specify a value between 1 and 365.',WPPH_PLUGIN_TEXT_DOMAIN);
            $hasErrors = true;
        }
        else {
            if(! $hasErrors){
                // reset events number
                if(isset($opt->eventsToKeep)){
                    $opt->eventsToKeep = 0;
                }
                $opt->daysToKeep = $deleteEventsValue;
            }
        }
    }
    elseif($deleteEventsBy == 2)
    {
        $activeOption = 2;
        $eventsNumber = $deleteEventsValue;

        // Validate
        if(!preg_match('/^\d+$/',$deleteEventsValue)){
            $validationMessage['error'] = sprintf(__('Incorrect number of security alerts. Please specify a value between 1 and %d.',WPPH_PLUGIN_TEXT_DOMAIN), WPPH_KEEP_MAX_EVENTS);
            $hasErrors = true;
        }
        elseif($deleteEventsValue < 1 || $deleteEventsValue > WPPH_KEEP_MAX_EVENTS){
            $validationMessage['error'] = sprintf(__('Incorrect number of security alerts. Please specify a value between 1 and %d.',WPPH_PLUGIN_TEXT_DOMAIN), WPPH_KEEP_MAX_EVENTS);
            $hasErrors = true;
        }
        else {
            // reset days
            if(isset($opt->daysToKeep)){
                $opt->daysToKeep = 0;
            }
            $opt->eventsToKeep = $deleteEventsValue;
        }
    }

    // dashboard widget
    if(isset($_POST['optionDW'])){
        $showDW = intval($_POST['optionDW']);
    }

    // save options
    if(!$hasErrors)
    {
        $opt->showDW = (empty($showDW) ? 0 : 1);
        $opt->cleanupRan = 0;
        WPPH::updatePluginSettings($opt,null,null,true);
        $validationMessage['success'] = __('Your settings have been saved.',WPPH_PLUGIN_TEXT_DOMAIN);
    }
}
// end $post
?>
<style type="text/css">
    .widefat td p { margin: 13px 0 0.8em !important; }
    .message {
        background-color: #FFFFE0 !important;
        border-radius: 3px 3px 3px 3px;
        border-style: solid;
        border-width: 1px;
        border-color: #E6DB55;
        margin: 5px 0 15px !important;
        padding: 0 0.6em !important;
    }
    .message p { margin: 0 0; padding: 7px 0; font-style: italic; }
    p.description span { text-decoration: underline;}
    .the-list th, .the-list tr td {padding: 7px 0 0 0 !important;}
    .the-list th p, .the-list tr td p {padding: 0 0 !important; margin: 0 0 !important;}
    .the-list td.column-username p,
    .the-list td.column-name p,
    .the-list td.column-role p { padding-left: 7px !important;}
    .form-table td { vertical-align: top !important; }
    .section-left label { margin-top: 3px !important; display: block;}
</style>
<div id="wpph-pageWrapper" class="wrap">
    <h2 class="pageTitle pageTitle-settings"><?php echo __('WP Security Audit Log Settings',WPPH_PLUGIN_TEXT_DOMAIN);?></h2>

    <?php if(! empty($validationMessage)) : ?>
        <?php
            if(!empty($validationMessage['error'])){ wpph_adminNotice($validationMessage['error']); }
            else { wpph_adminUpdate($validationMessage['success']); }
        ?>
    <?php else : ?>
        <div id="errMessage" style="display: none;"></div>
    <?php endif;?>
    <div style="margin: 20px 0;">
        <form id="updateSettingsForm" method="post">
            <?php wp_nonce_field('wpph_update_settings','wpph_update_settings_field_nonce'); ?>
            <div id="eventsDeletion">
                <div id="section-holder">

                    <table cellspacing="0" cellpadding="0" class="form-table">
                        <tbody>
                            <tr valign="top">
                                <td rowspan="3" class="section-left">
                                    <label style="display:block;margin: 0 0;" for="eventsNumberInput"><?php echo __('Security Alerts Pruning',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="section-right">
                                    <p>
                                        <input type="radio" id="option1" class="radioInput" style="margin-top: 2px;"/>
                                        <label for="option1"><?php echo __('Delete alerts older than',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                        <input type="text" id="daysInput" maxlength="3"
                                               placeholder="<?php echo __('(1 to 365)',WPPH_PLUGIN_TEXT_DOMAIN);?>"
                                               value="<?php if(! empty($daysInput)) { echo $daysInput; } ;?>"/>
                                        <span> <?php echo __('(1 to 365 days)',WPPH_PLUGIN_TEXT_DOMAIN);?></span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="section-right">
                                    <p>
                                        <?php $wpph_t1 = sprintf(__('(1 to %d alerts)',WPPH_PLUGIN_TEXT_DOMAIN),WPPH_KEEP_MAX_EVENTS); ?>
                                        <input type="radio" id="option2" class="radioInput" style="margin-top: 2px;"/>
                                        <label for="option2"><?php echo __('Keep up to',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                        <input type="text" id="eventsNumberInput" maxlength="6"
                                               placeholder="<?php echo $wpph_t1;?>"
                                               value="<?php if(! empty($eventsNumber)) { echo $eventsNumber; } ;?>"/>
                                        <span><?php echo $wpph_t1;?></span>
                                    </p>
                                    <p class="description" style="margin-top: 5px !important;"><?php echo sprintf(__('By default %s will keep up to %d WordPress Security Events.',WPPH_PLUGIN_TEXT_DOMAIN),WPPH_PLUGIN_NAME, WPPH_KEEP_MAX_EVENTS);?></p>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="section-left" style=""><label style="display:block;margin: 0 0;" for="optionDW_on"><?php echo __('Alerts Dashboard Widget',WPPH_PLUGIN_TEXT_DOMAIN);?></label></td>
                            </tr>
                            <tr>
                                <td class="section-right">
                                    <input type="radio" id="optionDW_on" class="radioInput" style="margin-top: 2px;"/><label for="optionDW_on" style="padding-top: 5px; padding-left: 3px;"><?php echo __('On',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                    <br/>
                                    <input type="radio" id="optionDW_off" class="radioInput" style="margin-top: 2px;"/><label for="optionDW_off" style="padding-top: 5px; padding-left: 3px;"><?php echo __('Off',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                    <br/>
                                    <p class="description" style="margin-top: 5px !important;"><?php echo sprintf(__('Display a dashboard widget with the latest 5 security alerts',WPPH_PLUGIN_TEXT_DOMAIN),WPPH_PLUGIN_NAME, WPPH_KEEP_MAX_EVENTS);?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <style type="text/css">
                        .divTarget { padding: 10px 0;}
                        .tagElement { padding: 2px 4px; margin: 2px 0 0 2px; border: solid 1px #E6DB55; background: #FFFFE0; }
                        .tagElement .tagDelete { cursor: pointer; font-weight: 900; }
                        .tagElement .tagDelete:hover { color: #d00000; }
                        #section-holder #c-list p.description { margin-top: 0 !important; margin-bottom: 0 !important; }
                    </style>
                    <table cellspacing="0" cellpadding="0" class="form-table">
                        <tbody>
                            <tr valign="top">
                                <td valign="top" class="section-left">
                                    <label style="display:block;margin: 0 0;" for="inputUser1"><?php echo __('Can view Security Alerts',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                </td>
                                <td class="section-right">
                                    <div id="a-list">
                                        <input type="text" id="inputUser1" style="float: left; display: block; width: 250px;"/>
                                        <input type="button" id="inputAdd1" style="float: left; display: block;" class="button-primary" value="<?php echo __('Add',WPPH_PLUGIN_TEXT_DOMAIN);?>"/>
                                        <p class="description" style="clear:both; padding-top: 3px;"><?php echo __('Users and Roles in this list can view the security alerts via the Audit Log Viewer (Read Only)',WPPH_PLUGIN_TEXT_DOMAIN);?></p>
                                        <div id="accessListTarget" class="divTarget" style="float: none; clear: both;"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr valign="top" style="margin-top: 30px;">
                                <td valign="top" class="section-left">
                                    <label style="display:block;margin: 0 0;" for="inputUser2"><?php echo __('Can Manage Plugin ',WPPH_PLUGIN_TEXT_DOMAIN);?></label>
                                </td>
                                <td class="section-right">
                                    <div id="c-list">
                                        <input type="text" id="inputUser2" style="float: left; display: block; width: 250px;"/>
                                        <input type="button" id="inputAdd2" style="float: left; display: block;" class="button-primary" value="<?php echo __('Add',WPPH_PLUGIN_TEXT_DOMAIN);?>"/>
                                        <p class="description" style="clear:both; padding-top: 3px;"><?php echo __('Users and Roles in this list can manage the plugin settings.',WPPH_PLUGIN_TEXT_DOMAIN);?></p>
                                        <div id="changeListTarget" class="divTarget" style="float: none; clear: both;"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        jQuery(document).ready(function($)
                        {
                            var mainContainer1 = $('#a-list'),
                                inputUser1 = $('#inputUser1'),
                                inputAdd1 = $('#inputAdd1'),
                                divTarget1 = $('#accessListTarget'),
                                tagElement1 = $('.tagElement', mainContainer1),
                                mainContainer2 = $('#c-list'),
                                inputUser2 = $('#inputUser2'),
                                inputAdd2 = $('#inputAdd2'),
                                divTarget2 = $('#changeListTarget'),
                                tagElement2 = $('.tagElement', mainContainer2)
                                ;

                            function showDefaultEntries(data, divTarget){
                                if(data.length > 0){
                                    $.each(data, function(i,v){
                                        createTag($, v, divTarget);
                                    });
                                }
                            }

                            // Display the default list
                            <?php
                                if(!empty($allowedAccess)){ echo 'showDefaultEntries(["'.implode('","',$allowedAccess).'"],divTarget1);'; }
                                if(!empty($allowedChange)){ echo 'showDefaultEntries(["'.implode('","',$allowedChange).'"],divTarget2);'; }
                            ?>

                            function _ajax(string)
                            {
                                if(string.length > 0){
                                    var data = {
                                        'action': 'wpph_check_user_role',
                                        'check_input' : string
                                    };
                                }
                                else {
                                    alert('Please add a user name or role.');
                                    return false;
                                }
                                var result;
                                $.ajax({
                                    url: ajaxurl,
                                    cache: false,
                                    type: 'POST',
                                    data: data,
                                    async : false,
                                    success: function(response) {
                                        result = response;
                                    },
                                    error: function() {
                                        result = 'An error occurred. Please try again in a few moments.';
                                    }
                                });
                                return result;
                            }
                            function createTag($, value, parentElement){ parentElement.append($('<span class="tagElement"><span class="tagName">'+value+'</span> <span class="tagDelete" title="Delete">x</span></span>')); }
                            function isValidEntry($, value, targetDiv){
                                var elements = $('.tagName', targetDiv);
                                var result = true;
                                if(elements.length > 0){
                                    $.each(elements,function(i,v){
                                        var val = $.trim($(this).text());
                                        if($.trim(value) == val){
                                            result = false;
                                            return false;
                                        }
                                    });
                                }
                                return result;
                            }
                            $('.tagDelete', tagElement1).live('click', function(){ $(this).parent().remove(); });
                            $('.tagDelete', tagElement2).live('click', function(){ $(this).parent().remove(); });
                            inputAdd1.on('click', function(){
                                var val = $.trim(inputUser1.val());
                                if(val.length == 0){
                                    alert('Please add a user name or role.');
                                    return false;
                                }
                                if( false == isValidEntry($, val, divTarget1)){
                                    alert('The user or role has been already added.');
                                    return false;
                                }
                                else {
                                    var result = _ajax(val);
                                    if(result.length > 5){
                                        alert('Error: '+result);
                                        return false;
                                    }
                                    else if (parseInt(result) == 0){
                                        alert('user or role '+val+' was not found');
                                        return false;
                                    }
                                    createTag($, val, divTarget1);
                                    inputUser1.val('');
                                    return true;
                                }
                            });
                            inputUser1.keypress(function(event){
                                if (event.keyCode == 10 || event.keyCode == 13) {
                                    event.preventDefault();
                                    inputAdd1.click();
                                }
                            });
                            inputAdd2.on('click', function(){
                                var val = $.trim(inputUser2.val());
                                if(val.length == 0){
                                    alert('Please add a user name or role.');
                                    return false;
                                }
                                if( false == isValidEntry($, val, divTarget2)){
                                    alert('The user or role has been already added.');
                                    return false;
                                }
                                else {
                                    var result = _ajax(val);
                                    if(result.length > 5){
                                        alert('Error: '+result);
                                        return false;
                                    }
                                    else if (parseInt(result) == 0){
                                        alert('user or role '+val+' was not found');
                                        return false;
                                    }
                                    createTag($, val, divTarget2);
                                    inputUser2.val('');
                                    return true;
                                }
                            });
                            inputUser2.keypress(function(event){
                                if (event.keyCode == 10 || event.keyCode == 13) {
                                    event.preventDefault();
                                    inputAdd2.click();
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <p style="margin-top: 40px;">
                <input type="submit" id="submitButton" class="button button-primary" value="<?php echo __('Save settings',WPPH_PLUGIN_TEXT_DOMAIN);?>"/>
            </p>
            <input type="hidden" id="deleteEventsBy" name="deleteEventsBy" value=""/>
            <input type="hidden" id="deleteEventsValue" name="deleteEventsValue" value=""/>
            <input type="hidden" id="optionDW" name="optionDW" value=""/>
            <input type="hidden" id="accessListInput" name="accessListInput" value=""/>
            <input type="hidden" id="changeListInput" name="changeListInput" value=""/>
        </form>
    </div>
</div>
<br class="clear"/>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var showErrorMessage = function(msg){
            $('#errMessage').removeClass('updated').addClass('error').html("<p>Error: "+msg+"</p>").show();
        };
        var setFocusOn = function($e){
            $e.focus();
            $e.select();
        };
        var validateDeleteOptions = function(section, $daysInput, $eventsNumberInput)
        {
            if(section == 0){
                showErrorMessage("<?php echo __('Invalid form. Please reload the page and try again.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                setFocusOn($daysInput);
                return false;
            }
            // validate fields
            if(section == 1)
            {
                var daysInputVal = $daysInput.val();

                if(daysInputVal.length == 0){
                    showErrorMessage("<?php echo __('Please input the number of days.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($daysInput);
                    return false;
                }
                if(daysInputVal == 0){
                    showErrorMessage("<?php echo __('Please input a number greater than 0.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($daysInput);
                    return false;
                }
                if(!/^\d+$/.test(daysInputVal)){
                    showErrorMessage("<?php echo __('Only numbers greater than 0 allowed.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($daysInput);
                    return false;
                }
                if(daysInputVal > 365){
                    showErrorMessage("<?php echo __('Incorrect number of days. Please specify a value between 1 and 365.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($daysInput);
                    return false;
                }
            }
            else if(section == 2)
            {
                var eniVal = $eventsNumberInput.val();

                if(eniVal.length == 0){
                    showErrorMessage("<?php echo __('Please input the number of alerts.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($eventsNumberInput);
                    return false;
                }
                if(eniVal == 0){
                    showErrorMessage("<?php echo __('Please input a number greater than 0.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($eventsNumberInput);
                    return false;
                }
                if(!/^\d+$/.test(eniVal)){
                    showErrorMessage("<?php echo __('Only numbers greater than 0 allowed.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                    setFocusOn($eventsNumberInput);
                    return false;
                }
                if(eniVal > <?php echo WPPH_KEEP_MAX_EVENTS;?>){
                    showErrorMessage("<?php echo sprintf(__('Incorrect number of security alerts. Please specify a value between 1 and %d.',WPPH_PLUGIN_TEXT_DOMAIN),WPPH_KEEP_MAX_EVENTS);?>");
                    setFocusOn($eventsNumberInput);
                    return false;
                }
            }
            return true;
        };

        var  deb = $('#deleteEventsBy')
            ,debv = $('#deleteEventsValue')
            ,option1 = $('#option1')
            ,option2 = $('#option2')
            ,daysInput = $('#daysInput')
            ,eventsNumber = $('#eventsNumberInput')
            ,showDW = $('#optionDW_on')
            ,hideDW = $('#optionDW_off')
            ,accessListInput = $('#accessListInput')
            ,changeListInput = $('#changeListInput');
        option1.on('click', function(){ option2.removeAttr('checked'); $(this).attr('checked','checked'); setFocusOn(daysInput); });
        option2.on('click', function(){ option1.removeAttr('checked'); $(this).attr('checked','checked'); setFocusOn(eventsNumber); });
        daysInput.on('click', function(){ option2.removeAttr('checked'); option1.attr('checked','checked'); });
        eventsNumber.on('click', function(){ option1.removeAttr('checked'); option2.attr('checked','checked'); });
        showDW.on('click', function(){ hideDW.removeAttr('checked'); $(this).attr('checked','checked'); setFocusOn($(this)); });
        hideDW.on('click', function(){ showDW.removeAttr('checked'); $(this).attr('checked','checked'); setFocusOn($(this)); });

        // select delete option
        <?php if($activeOption == 1):?>
        option1.attr('checked','checked');
        eventsNumber.val("");
        <?php else :?>
        option2.attr('checked','checked');
        daysInput.val("");
        <?php endif; ?>

        //select DW
        <?php if($showDW):?>
            showDW.attr('checked','checked');
        <?php else :?>
            hideDW.attr('checked','checked');
        <?php endif;?>

        // form submit
        $('#submitButton').on('click',function()
        {
            var section = 0;
            if ($('#option1').prop('checked')){section = 1;}
            else { section = 2; }

            if(section < 1){
                alert("<?php echo __('Invalid form. Please refresh the page and try again.',WPPH_PLUGIN_TEXT_DOMAIN);?>");
                return false;
            }
            if(! validateDeleteOptions(section, daysInput, eventsNumber)){
                return false;
            }
            // alerts pruning
            if(section == 1){
                deb.val(1);
                debv.val(daysInput.val());
            }
            else if(section ==2){
                deb.val(2);
                debv.val(eventsNumber.val());
            }
            // dashboard widget
            if(showDW.prop('checked')){
                $('#optionDW').val('1');
            }
            else { $('#optionDW').val('0') }

            //#! build the access list
            var a = [];
            $('.tagName', $('#a-list')).each(function(){a.push($(this).text());});
            accessListInput.val(JSON.stringify(a));

            // build the change list
            var b = [];
            $('.tagName', $('#c-list')).each(function(){b.push($(this).text());});
            changeListInput.val(JSON.stringify(b));

            return true;
        });
    });
</script>