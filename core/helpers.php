<?php

// this function generates a valid link from different types of values.
function linkify($link){

	// local file links are going to start with "&" to remove confusion, strip out "&" from the string to create a valid link.
	if(strpos($link, "&") === 0){
		return substr($link, 1);
	}
	// if the url is empty or null, return empty string
	if(empty($link) || is_null($link)){
		return "";
	}

	// if the url does not start with "http", append "http://" infront of it.
	if(!(strpos($link,"http") !== false)){
		$link = "http://".$link;
	}
	return $link;
}

// validates link if they are not empty or not blank.
function is_good_link($url){
	return !empty($url) || !($url == "");
}
?>