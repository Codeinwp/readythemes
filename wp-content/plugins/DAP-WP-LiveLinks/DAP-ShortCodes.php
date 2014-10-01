<?php 

add_filter('widget_text', 'do_shortcode');
add_shortcode('DAP', 'dap_shortcode');

function dap_shortcode($atts, $content=null){ 
	extract(shortcode_atts(array(
		'isloggedin' => 'Y',
		'ispaiduser' => 'N',
		'hasaccessto' => 'ANY',
		'hasnoaccessto' => 'NONE',
		'errmsgtemplate' => 'SHORT',
		'userid' => 'ANY',
		'day' => '-1',
		'startday' => '',
		'endday' => '',
		'startdate' => '2008-10-10',
		'enddate' => '9999-12-31',
		'publicuntil' => '',
		'publicafter' => ''
	), $atts));
	
	$content = do_shortcode(dap_clean_shortcode_content($content));	
	
	
	//First check - check publicUntil and publicAfter
	//logToFile("publicuntil: $publicuntil"); 
	$now = strtotime(date("Y-m-d"));
	if($publicuntil != "") {
		$pubUntil = strtotime($publicuntil);
		$timeRemaining = intval($pubUntil) - intval($now);
		
		//logToFile("now: $now, pubUntil: $pubUntil, timeRemaining: $timeRemaining");
		if($timeRemaining >= 0) {
			//logToFile("There's still time for this to be public, so no protection. Return content as is"); 
			//There's still time for this to be public, so no protection. Return content as is.
			return $content;
		}
	}
	
	if($publicafter != "") {
		$pubAfter = strtotime($publicafter);
		$timeRemaining = intval($pubAfter) - intval($now);
		
		//logToFile("now: $now, pubAfter: $pubAfter, timeRemaining: $timeRemaining");
		if($timeRemaining <= 0) {
			//logToFile("This has turned public going forward, so no protection. Return content as is."); 
			//This has turned public going forward, so no protection. Return content as is.
			return $content;
		}
	}
	
	//Then check startdate and enddate
	if( ($startdate != "2008-10-10") || ($enddate != "9999-12-31") ) {
		//logToFile("now: $now , startdate: $startdate , strtotime(startdate): " . strtotime($startdate)); 
		//logToFile("now: $now , strtotime(enddate)" . strtotime($enddate)); 
		if( 
		   	( intval($now) >= intval(strtotime($startdate)) ) && 
			( intval($now) <= intval(strtotime($enddate)) )
		) {
			return $content;
		} else {
			return getErrorMessage($errmsgtemplate);
		}
	}
	
	$session = Dap_Session::getSession();
	$user = $session->getUser();
	
	if( ($isloggedin == "N") && (Dap_Session::isLoggedIn() || isset($user)) ) {
		//logToFile("Shortcode says this is be shown only to those NOT logged in - BUT this person IS logged in, so get out");
		return getErrorMessage($errmsgtemplate);
	} else if( ($isloggedin == "N") && !Dap_Session::isLoggedIn() && !isset($user) ) {
		//logToFile("Shortcode says this is be shown only to those NOT logged in - and this person is NOT logged in, so return content and stop");
		return $content;
	}
	
	//Arriving here means isloggedin=Y
	if( !Dap_Session::isLoggedIn() || !isset($user) ) {
		//logToFile("Not logged in, returning errmsgtemplate");
		return getErrorMessage($errmsgtemplate);
	}
	
	//Arriving here means user is logged in
	//logToFile("User is valid and logged in. Userid: " . $user->getId());
	
	if( ($userid != "ANY") && ($userid != $user->getId()) ) {
		return getErrorMessage($errmsgtemplate);
	}
	
	if( ($day != "-1") && ($hasaccessto != "ANY") && !$user->isDripEligible($hasaccessto, $day) ) {
		//logToFile("Not Eligible");
		return getErrorMessage($errmsgtemplate);
	} 
	
	if( (($startday != "") || ($endday != "")) && ($hasaccessto != "ANY") ) {
		$isDripEligible = false;
		if( (intval($startday) >= 1) && (intval($endday) >= 1) ) {
			logToFile("Positive"); 
			$isDripEligible = $user->isDripEligible($hasaccessto, $startday, $endday);
		} else if( (intval($startday) < 0) && (intval($endday) < 1) ) {
			logToFile("Negative"); 
			logToFile("startday: " . $startday . ", endday: " . $endday); 
			$isDripEligible = $user->isDripEligibleReverse($hasaccessto, $startday, $endday);
		}
		
		if(!$isDripEligible) {
			//logToFile("Not Eligible");
			return getErrorMessage($errmsgtemplate);
		}
	} 
	
	if ($hasnoaccessto != "NONE") {
		//User should NOT have access to the products listed
		if( $user->hasAccessToProducts($hasnoaccessto) ) { 
			//true means user DOES have access, which is not what we want
			return getErrorMessage($errmsgtemplate);
		}
	}
	
	if($ispaiduser == "Y") {
		//logToFile("Must be Paid User"); 
		if(!$user->isPaidUser()) {
			//logToFile("No, not a paid user"); 
			return getErrorMessage($errmsgtemplate);
		}
		
		//Arriving here means user ispaiduser
		if($hasaccessto == "ANY") {
			//Product doesn't matter, so simply return content
			return $content;
		} else {
			//Specific products only
			if($user->hasPaidAccessToProducts($hasaccessto)) {
				return $content;
			} else {
				return getErrorMessage($errmsgtemplate);
			}
		}
	} else { //ispaiduser == "N"
		//logToFile("Doesn't have to be Paid User"); 
	
		if($hasaccessto == "ANY") {
			//Product doesn't matter, so simply return content
			//logToFile("Product doesn't matter - simply returning content"); 
			return $content;
		} else {
			//Specific products only
			if($user->hasAccessToProducts($hasaccessto)) {
				return $content;
			} else {
				return getErrorMessage($errmsgtemplate);
			}
		}
	}
	
	return $content;
}



function getErrorMessage($errmsgtemplate) {
	//logToFile("errmsgtemplate: " . $errmsgtemplate); 
	if($errmsgtemplate == "") {
		return "";
	} else {
		$errMsg = Dap_Templates::getContentByName($errmsgtemplate);
		if($errMsg != "") {//there is such a template in the db
			return $errMsg;
		} else {
			//Check if file name
			if( strpos($errmsgtemplate,"file:") !== false ) {//it's a file name
				//get contents of file and return it
				$fileName = substr($errmsgtemplate,5);
				$errMsg = file_get_contents($fileName);
				return $errMsg;
			} else {
				//It's custom error text - simply return it
				return html_entity_decode($errmsgtemplate);
			}
		}
	}
	return "Sorry, you don't have access to this content";
}

function dap_clean_shortcode_content( $content ) {

    /* Parse nested shortcodes and add formatting. */
    $content = trim( wpautop( do_shortcode( $content ) ) );

    /* Remove '</p>' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '</p>' )
        $content = substr( $content, 4 );

    /* Remove '<p>' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '<p>' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of '<p></p>'. */
    $content = str_replace( array( '<p></p>' ), '', $content );

    return $content;
}

?>