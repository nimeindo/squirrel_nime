<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HelpersController {

    
        public static function DataLimitRange(){
                return $DataLimitRange = [50,150,100,200,300];
        }
	
        public static function __normalizeString($text){
                // Strip HTML Tags
                $clear = strip_tags($text);

                $clear = str_replace(["“","”","–"], ["","","-"], $clear);
                // Clean all special characters
                $clear = htmlentities($clear);
                // Clean up things like &amp;
                $clear = html_entity_decode($clear);
                // Strip out any url-encoded stuff
                $clear = urldecode($clear);
                // Replace Multiple spaces with single space
                $clear = preg_replace('/ +/', ' ', $clear);
                // Trim the string of leading/trailing space
                $clear = trim($clear);
                $clear = self::__normalizeUrl($clear);
                $clear = self::__clearUtf($clear);

                return $clear;
	}
	
	public static function __normalizeUrl($input) {
		$pattern = '@(http(s)?://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
		return $output = preg_replace($pattern, '<a href="http$2://$3">Klik Disini</a>', $input);
	}
  
	public static function __clearUtf($text){
		return $string = iconv('UTF-8', 'UTF-8//IGNORE', $text); // or
	}
}