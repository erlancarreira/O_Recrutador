<?php 
include_once("config.php");
/**
 * 
 */
class Helps 
{ 
	public static $request;

	public static function getRequest($request) {
	    if (isset($request) && !empty($request)) {
	        return $request;
		}

		return null;
	}
	

}