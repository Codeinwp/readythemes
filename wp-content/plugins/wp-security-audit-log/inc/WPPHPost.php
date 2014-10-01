<?php

class WPPHPost
{
    public static $currentPostType = '';

    static function getPostTypes()
    {
        $args = array('public'   => true,'_builtin' => false);
        $output = 'names'; // names or objects, note names is the default
        $operator = 'and'; // 'and' or 'or'

        $result = get_post_types( $args, $output, $operator );
        if(! isset($result['post'])){ $result['post'] = 'post'; }
        if(! isset($result['page'])){ $result['page'] = 'page'; }
        return $result;
    }

    static function validatePostType($postType)
    {
        if(empty($postType)){
            return false;
        }
        $types = self::getPostTypes();
        wpphLog('POST TYPES',$types);
        return (in_array($postType, $types) ? true : false);
    }

    // 2019 & 2020 & 2038
    static function managePostAuthorUpdateQuickEditForm($data, $postArray)
    {
        if($data['post_type'] == 'post'){
            if(self::postAuthorChanged($GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'], $postArray['ID'], wp_get_current_user()->ID, $data['post_title'], 2019, true)){
                $GLOBALS['WPPH_POST_AUTHOR_UPDATED'] = true;
            }
        }
        elseif($data['post_type'] == 'page'){
            if(self::postAuthorChanged($GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'], $postArray['ID'], wp_get_current_user()->ID, $data['post_title'], 2020, true)){
                $GLOBALS['WPPH_PAGE_AUTHOR_UPDATED'] = true;
            }
        }
        // custom post type
        else {
            self::$currentPostType = $data['post_type'];
            wpphLog('CURRENT POST TYPE: '.self::$currentPostType);
            if(self::postAuthorChanged($GLOBALS['WPPH_POST_AUTHOR_UPDATED_ID'], $postArray['ID'], wp_get_current_user()->ID, $data['post_title'], 2038, true)){
                $GLOBALS['WPPH_POST_AUTHOR_UPDATED'] = true;
            }
        }
        return $data;
    }

    // 2019 & 2020 & 2038
    static function postAuthorChanged($newAuthorID, $postID, $userID, $postTitle, $event, $quickFormEnabled = false)
    {
        $args = func_get_args();
        wpphLog(__METHOD__.'() triggered.',array('params'=> $args));
        if(empty($postID)){
            wpphLog('Error: $postID is empty. Invalid function call.');
            return false;
        }
        if(empty($newAuthorID)){
            wpphLog('Error: $newAuthorID is empty. Invalid function call.');
            return false;
        }

        global $wpdb;
        $oldAuthorID = $wpdb->get_var("SELECT post_author FROM ".$wpdb->posts." WHERE ID = ".$postID);

        wpphLog(__METHOD__.'() ',array(
            'oldAuthorID' => $oldAuthorID,
            'newAuthorID' => $newAuthorID
        ));

        if($newAuthorID <> $oldAuthorID)
        {
            $n = $wpdb->get_var("SELECT user_login FROM ".$wpdb->users." WHERE ID = ".$newAuthorID);
            $o = $wpdb->get_var("SELECT user_login FROM ".$wpdb->users." WHERE ID = ".$oldAuthorID);

            if($quickFormEnabled){
                // in quick edit form the authors get switched whereas in the default post editor they don't :/
                $t = $n;
                $n = $o;
                $o = $t;
            }
            $userID = (int)$userID;
            if(self::isCustomPost()){
                WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,ucfirst(self::$currentPostType),$n,$o));
            }
            else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$n,$o)); }
            wpphLog(__METHOD__.' : Author updated.', array('from'=>$o, 'to'=>$n));
            return true;
        }
        return false;
    }

    // 2001 & 2005 & 2030
    static function newPostPublished($userID, $postTitle, $postUrl, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $postUrl));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$postUrl)); }
        wpphLog(__METHOD__.'() : Post/Page published.', array('title'=>$postTitle));
    }

    // 2003 & 2007 & 2032
    static function draftPostUpdated($userID, $postID, $postTitle, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $postID));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$postID)); }
        wpphLog(__METHOD__.'() : Draft post/page updated.', array('title'=>$postTitle));
    }

    // 2000 & 2004 & 2029
    static function newPostAsDraft($userID, $postID, $postTitle, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $postID));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, $postID)); }
        wpphLog(__METHOD__.'() : New post/page saved as draft.', array('title'=>$postTitle));
    }

    // 2017 & 2018
    static function postUrlUpdated($oldUrl, $newUrl, $userID, $postTitle, $event)
    {
        if($oldUrl == $newUrl) { return false; }
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $oldUrl, $newUrl));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, $oldUrl, $newUrl)); }
        wpphLog(__METHOD__.'() : Post/Page URL updated.', array('from' => $oldUrl,'to' => $newUrl));
        return true;
    }

    // 2002 & 2006 & 2031
    static function publishedPostUpdated($userID, $postTitle, $postUrl, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $postUrl));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$postUrl)); }
        wpphLog(__METHOD__.'() : Published post/page updated.', array('title'=>$postTitle));
    }

    static function postVisibilityChanged($userID, $postTitle, $fromVisibility, $toVisibility, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,ucfirst(self::$currentPostType),$fromVisibility,$toVisibility));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$fromVisibility,$toVisibility)); }
        wpphLog('Post visibility changed.', array('from' => $fromVisibility, 'to' => $toVisibility));
    }

    static function postDateChanged($userID, $postTitle, $fromDate, $toDate, $event)
    {
        $GLOBALS['WPPH_POST_DATE_CHANGED'] = true; // so we won't trigger the "modified post/page" event alongside the current event
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,ucfirst(self::$currentPostType),$fromDate,$toDate));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle,$fromDate,$toDate)); }
        wpphLog('Post date changed.', array('from' => $fromDate . ' ('.strtotime($fromDate).')', 'to' => $toDate . ' ('.strtotime($toDate).')'));
    }

    static function postStatusChanged($postTitle, $fromStatus, $toStatus, $userID, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $fromStatus, $toStatus));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, $fromStatus, $toStatus)); }
        wpphLog(__METHOD__.'() : Post status updated.', array('title'=>$postTitle, 'from' => $fromStatus, 'to' => $toStatus));
    }

    // 2016
    static function postCategoriesUpdated($userID, $postTitle, $fromCategories, $toCategories, $event)
    {
        if(self::isCustomPost()){
            WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, ucfirst(self::$currentPostType), $fromCategories, $toCategories));
        }
        else { WPPHEvent::_addLogEvent($event, $userID, WPPHUtil::getIP(), array($postTitle, $fromCategories, $toCategories)); }
        wpphLog(__METHOD__.' : Post categories updated.', array('from'=>$fromCategories, 'to'=>$toCategories));
    }

    static function isCustomPost(){
        if(in_array(self::$currentPostType, array('post','page'))){ return false; }
        return self::validatePostType(self::$currentPostType);
    }
}