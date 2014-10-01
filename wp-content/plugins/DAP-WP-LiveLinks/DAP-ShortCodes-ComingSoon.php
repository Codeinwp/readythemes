<?php 

add_shortcode('DAPComingSoon', 'dap_comingsoon');

function dap_comingsoon($atts, $content=null){ 
	extract(shortcode_atts(array(
		'showproductname' => 'Y',
		'showaccessstartdate' => 'Y',
		'showaccessenddate' => 'Y',
		'showdescription' => 'Y',
		'showlinks' => 'Y',
		'orderoflinks' => 'OLDESTFIRST',
		'howmanylinks' => '10000',		
		'errmsgtemplate' => 'SHORT',
		'productid' => 'ALL',
		'dateformat' => 'MM-DD-YYYY',
		'makelinksclickable' => 'Y'
	), $atts));
	
	$content = do_shortcode(dap_clean_shortcode_content($content));	
	
	$session = Dap_Session::getSession();
	$user = $session->getUser();
	$userProducts = null;
	$content = $content . "<br/><br/>";
	
	if( !Dap_Session::isLoggedIn() || !isset($user) ) {
		//logToFile("Not logged in, returning errmsgtemplate");
		return getErrorMessage($errmsgtemplate);
	}
	
	if( Dap_Session::isLoggedIn() && isset($user) ) { 
		//get userid
		$userProducts = Dap_UsersProducts::loadProducts($user->getId());
	}

	//loop over each product from the list
	foreach ($userProducts as $userProduct) { 
	
		if($productid != "ALL") {
			if( $userProduct->getProduct_id() != $productid ) {
				continue;
			}
		}
		
		$product = Dap_Product::loadProduct($userProduct->getProduct_id());
		$content .= '<div class="dap_product_links_table">';
		
		if(strtolower($showproductname) == "y") {
			$content .= '<div class="dap_product_heading">aasdfasdf'.$product->getName().'</div>';
		}
		
		if(strtolower($showaccessstartdate) == "y") {
			$oldDate = $userProduct->getAccess_start_date();
			//$middle = strtotime($oldDate);
			$middle = new DateTime($oldDate);
			$stringFormat = "";
			if($dateformat == "MM-DD-YYYY") {
				$stringFormat = "m-d-Y";
			} else if($dateformat == "DD-MM-YYYY") {
				$stringFormat = "d-m-Y";
			}  else if($dateformat == "YYYY-MM-DD") {
				$stringFormat = "Y-m-d";
			}
			//$newDate = date($stringFormat, $middle);
			$newDate = $middle->format($stringFormat);

			$content .= '<div><strong>'.USER_LINKS_ACCESS_START_DATE_TEXT.'</strong>: '.$newDate.'</div>';
		}
		
		if(strtolower($showaccessenddate) == "y") {
			$oldDate = $userProduct->getAccess_end_date();
			//$middle = strtotime($oldDate);
			$middle = new DateTime($oldDate);
			$stringFormat = "";
			if($dateformat == "MM-DD-YYYY") {
				$stringFormat = "m-d-Y";
			} else if($dateformat == "DD-MM-YYYY") {
				$stringFormat = "d-m-Y";
			}  else if($dateformat == "YYYY-MM-DD") {
				$stringFormat = "Y-m-d";
			}
			//$newDate = date($stringFormat, $middle);
			$newDate = $middle->format($stringFormat);
			
			$content .= '<div><strong>'.USER_LINKS_ACCESS_END_DATE_TEXT.'</strong>: '.$newDate.'</div>';
		}

		if(strtolower($showdescription) == "y") {
			$content .= '<div><strong>'.USER_LINKS_DESCRIPTION_TEXT.'</strong>: '.$product->getDescription().'</div>';
		}
		
		if(strtolower($showlinks) == "y") {
			$orderBy = "desc";
			//$howmanylinks = intval($howmanylinks) + 1;
			if(strtolower($orderoflinks) == "newestfirst") {
				$orderBy = "asc";
			}
			//logToFile("makeLinksClickable: $makelinksclickable"); 
			if ($product->getSelf_service_allowed() == "N") {
				$content .= '<div><strong>'.USER_LINKS_COMINGSOON_TEXT.'</strong> '.$userProduct->getFutureResources("N",$orderBy,$howmanylinks,$makelinksclickable).'</div>';
			} 
			else if (($product->getSelf_service_allowed() == "Y")) {
        		$content .= '<div><strong>'.USER_LINKS_COMINGSOON_TEXT.'</strong> '.$userProduct->getFutureResources("Y",$orderBy,$howmanylinks,$makelinksclickable).'</div>';
			}
		}
      	
		$content .= '</div>';
		$content .= '<br/><br/>';
	} //end foreach

	return $content;
}


?>