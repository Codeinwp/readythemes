<?php

if(!empty($_GET['facebookusername'])){
	try{
		$url = "http://graph.facebook.com/".$_GET['facebookusername'];
		$result = getPage($url);
		$result = json_decode($result['EXE'],true);
		
		if(is_array($result) && empty($result['error']))
			echo $result['id'];
		else
			echo "Error: Cannot find Facebook ID!";
	}
	catch (Exception $e) {
		echo "Error: Cannot find Facebook ID!";
	}
}

function getPage($url, $referer='', $agent='', $header='', $timeout=10) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
 
    $result['EXE'] = curl_exec($ch);
    $result['INF'] = curl_getinfo($ch);
    $result['ERR'] = curl_error($ch);
    curl_close($ch);
    return $result;
}
?>