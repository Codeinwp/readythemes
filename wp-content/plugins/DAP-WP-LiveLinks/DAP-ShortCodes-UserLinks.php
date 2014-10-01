<?php 

add_shortcode('DAPUserLinks', 'dap_userlinks');

function addDAPCSS() {
	wp_register_style('dap-css', getCssFullURL());
	wp_enqueue_style('dap-css');
}

function dap_userlinks($atts, $content=null){ 
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
		'dateformat' => 'MM-DD-YYYY'
	), $atts));
	
	add_action( 'wp_enqueue_scripts', 'addDAPCSS' );
	$content = do_shortcode(dap_clean_shortcode_content($content));	
	
	$session = Dap_Session::getSession();
	$user = $session->getUser();
	$userProducts = null;
	//$content = $content . "<br/><br/>";
	
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
		$content .= '<div class="dashboardcontent">';
			
			if(strtolower($showdescription) == "y") {
				$content .= '<div class="dashimg"><img src="'.$product->getDescription().'" width="180" /></div>';
			}
			
			if(strtolower($showlinks) == "y") {
				$orderBy = "asc";
				//$howmanylinks = intval($howmanylinks) + 1;
				if(strtolower($orderoflinks) == "newestfirst") {
					$orderBy = "desc";
				}
				$content .= '<div class="dashlinks">';
				if(strtolower($showproductname) == "y") {
					$content .= '<div class="dap_product_heading">'.$product->getName().'</div>';
				}
				$content .= $userProduct->getActiveResources($product->getSelf_service_allowed(),$orderBy,$howmanylinks).'</div>';;
			}
		
		$content .= '<div class="clear"></div></div><!-- dashboardcontent -->';
		$content .= '</div><!-- dap_product_links_table -->';

	} //end foreach

	return $content;
}


?>