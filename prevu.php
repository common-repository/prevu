<?php
/*
Plugin Name: preVU
Plugin URI: https://paularterburn.com
Description: Adds a shortcode for Pages/Posts to pull in content from other pages. Shortcode usage (change poweredby to FALSE to remove attribution): [preVU url="http://dabble.me/" poweredby=TRUE]
Version: 2.0.5
Author: Paul Arterburn
Author URI: https://paularterburn.com
License: GPLv2
*/


function show_file_func_prevu( $atts ) {

  extract( shortcode_atts( array(
    'url' => '',
	'poweredby' => 'FALSE'
  ), $atts ) );
 
	//correct for http at beginning
	if (substr($url, 0, 4) != 'http') {
		//prepend http:// to beginning
		$url = "http://".$url;
	}

  if ($url!='') {

	//we're dumping pre.vu for the full, more reliable domain
	$url = str_replace("pre.vu/", "paularterburn.com/com.prevu/", $url);
	$url = str_replace("www.pre.vu/", "paularterburn.com/com.prevu/", $url);
  $url = str_replace("www.jtpconsulting.com/com.prevu/", "paularterburn.com/com.prevu/", $url);
  $url = str_replace("dealert.me", "paularterburn.com/com.prevu/", $url);

	if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );

	$request = new WP_Http;
	$result = $request->request( htmlspecialchars_decode($url) );

	if (isset($result->errors)) {
		// display error message of some sort
		$output = "Deals are refreshing - please check back later!";
		$output .= "<!-- preVU 2.0.4 URL: '".htmlspecialchars_decode($url)."'' DEBUG: ".print_r($result->errors)." -->";
	} else {

		$output = $result['body'];
		$output = str_replace("pre.vu","paularterburn.com/com.prevu",$output);
		$output = str_replace("www.jtpconsulting.com/com.prevu/x","paularterburn.com/com.prevu/x",$output);

		if(stristr($output, "This Account Has Been Suspended")!=FALSE || stristr($output, "404 Not Found")!=FALSE) {
			//server is down; dont' show $output
			$output = "<!-- DEBUG: accout suspended / no data -->";
		}

		$output .= "<!-- preVU 2.0.2 URL: ".htmlspecialchars_decode($url)." -->";
	}

   }
	
	if(strtoupper($poweredby)==="TRUE") {	
		//add a "Powered by preVU at the end"
		$output .= '<div style="margin:20px 0px 10px 0px !important;" id="poweredby"><a href="https://paularterburn.com" style="text-decoration:none;"><span style="font-size:10pt;text-decoration:none;">Powered by <span style="font-size:120%;font-family: Rockwell, Helvetica;">preVU</span></span></span></span></a></div>';
	}

	return $output;
	
}

add_shortcode( 'preVU', 'show_file_func_prevu' );
add_shortcode( 'prevu', 'show_file_func_prevu' );

?>