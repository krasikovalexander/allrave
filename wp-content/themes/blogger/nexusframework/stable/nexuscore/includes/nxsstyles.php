<?php

function nxs_getmaxservercsschunks()
{
	// todo: eventually make configurable
	return 4;
}

function nxs_showloadcover()
{
	// todo: eventually make configurable
	return false;
}

function nxs_getcoloralphas()
{
	$result = array();
	$result[] = 1;
	$result[] = 0.8;
	$result[] = 0.7;
	$result[] = 0.6;
	$result[] = 0.5;
	$result[] = 0.0;
	
	// enable themes to overrule the alphas
	$args = array();
	$result = apply_filters("nxs_getcoloralphas", $result, $args);
	
	return $result;
}

function nxs_getcolorsinpalette()
{
	$result = array();
	$result[] = "base";
	$result[] = "c1";
	
	// enable themes to overrule the colors
	$args = array();
	$result = apply_filters("nxs_getcolorsinpalette", $result, $args);
	
	return $result;
}


function nxs_getcssclassesforlookup($prefix, $value)
{
	$result = "";
	if (!isset($value) || $value == "" || $value == "inherit")
	{
		// suppress css class (will be inherited)
	}
	else
	{
		$derived = "";
		if (nxs_stringstartswith($prefix, "nxs-colorzen-"))
		{
			$derived = "nxs-colorzen";
		}
		else if (nxs_stringstartswith($prefix, "nxs-linkcolorvar-"))
		{
			$derived = "nxs-linkcolorvar";
		}
		
		$result = nxs_concatenateargswithspaces($result, $derived, $prefix . $value);
	}
	
	return $result;
}

function nxs_getstyletypeoptions()
{
	// TODO: add translations, and cache result in mem (global var) instead of having
	// to reload it everytime its used
	$options = array
	(
		"button_scale" => array
		(
			"subtype" 				=> "multiplier",
			"values" 			=> array(0.8, 1, 1.2, 1.4, 1.5, 1.6, 1.8, 2.0, 2.2, 2.5, 2.6, 3.0),
		),
		"icon_scale" => array
		(
			"subtype" 				=> "multiplier",
			"values" 			=> array("",0.5, 1.0, 1.5, 2.0, 2.5, 3.0),	// steps of 32 pixels
		),
		"title_heading" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("1"=>"H1", "2"=>"H2", "3"=>"H3", "4"=>"H4", "5"=>"H5", "6"=>"H6")
		),
		"image_halignment" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("left"=>nxs_l18n__("left", "nxs_td"), "right"=>nxs_l18n__("right", "nxs_td"))
		),
		"button_halignment" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("left"=>nxs_l18n__("left", "nxs_td"), "center"=>nxs_l18n__("center", "nxs_td"), "right"=>nxs_l18n__("right", "nxs_td"))
		),
		"title_halignment" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("left"=>nxs_l18n__("left", "nxs_td"), "center"=>nxs_l18n__("center", "nxs_td"), "right"=>nxs_l18n__("right", "nxs_td"))
		),
		"text_halignment" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("left"=>nxs_l18n__("left", "nxs_td"), "center"=>nxs_l18n__("center", "nxs_td"), "right"=>nxs_l18n__("right", "nxs_td"))
		),
		"delaypopup_seconds" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("0"=>nxs_l18n__("No delay", "nxs_td"), "5"=>nxs_l18n__("5 seconds", "nxs_td"), "20"=>nxs_l18n__("20 seconds", "nxs_td"))
		),
		"repeatpopup_scope" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array
			(
				"eachrequest"=>nxs_l18n__("1x per request", "nxs_td"), 
				"eachnewsession"=>nxs_l18n__("1x per session", "nxs_td"), 
				"onlyonce"=>nxs_l18n__("1x per cookie", "nxs_td"),
			)
		),
		"border_width" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 0, 1, 2, 3, 4, 5, 6, 8, 10),
		),
		"maxheight" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 10,20,30,40,50,60,70,80,90,100),
		),
		"maxwidth" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 10,20,30,40,50,60,70,80,90,100),
		),
		"fontsize" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 0.8, 1.0, 1.2, 1.4, 1.6, 1.8, 2.0, 2.2, 2.4, 2.6, 2.8, 3.0, 4.0, 5.0, 6.0),
		),
		"halign" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array("left"=>nxs_l18n__("left", "nxs_td"), "center"=>nxs_l18n__("center", "nxs_td"), "right"=>nxs_l18n__("right", "nxs_td"))
		),
		"orientation" => array
		(
			"subtype" 				=> "textlookup",
			"values" => array("horizontal"=>nxs_l18n__("horizontal", "nxs_td"),"vertical"=>nxs_l18n__("vertical", "nxs_td")),
		),
		"valign" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array(""=>nxs_l18n__("top", "nxs_td"),"nxs-valign-middle"=>nxs_l18n__("center", "nxs_td"),"nxs-valign-bottom"=>nxs_l18n__("bottom", "nxs_td"))
		),
		"image_size" => array
		(
			"subtype" 		=> "encodedmultiplier",
			"values" 			=> array
				(
					"-"=>nxs_l18n__("none", "nxs_td"),
				 	"c@1-0"=>nxs_l18n__("cropped icon 1x", "nxs_td"),
				 	"c@1-5"=>nxs_l18n__("cropped icon 1.5x", "nxs_td"),
				 	"c@2-0"=>nxs_l18n__("cropped icon 2x", "nxs_td"),
					"auto-fit"=>nxs_l18n__("auto-fit", "nxs_td"),
				),
		),
		"backgroundimage_repeat" => array
		(
			"subtype" 				=> "textlookup",
			"values" 			=> array
				(
					"-"=>nxs_l18n__("none", "nxs_td"),
					"repeatx"=>nxs_l18n__("repeatx", "nxs_td"), 
					"repeaty"=>nxs_l18n__("repeaty", "nxs_td"), 
					"repeatxy"=>nxs_l18n__("repeatxy", "nxs_td"), 
				)
		),
		"backgroundimage_size" => array
		(
			"subtype" 		=> "textlookup",
			"values" 			=> array
				(
					"-"=>nxs_l18n__("none", "nxs_td"),
					"cover"=>nxs_l18n__("cover", "nxs_td"), 
					"contain"=>nxs_l18n__("contain", "nxs_td"), 
				)
		),
		"margin" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 0, 0.3, 0.5, 1, 1.5, 2, 2.5, 3, 3.5),
		),
		"padding" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 0, 0.1, 0.2, 0.3, 0.5, 1, 1.5, 2, 2.5, 3, 3.5),
		),
		"border_radius" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 0, 1, 2, 3, 4, 5, 10, 15),
		),
		"minheight" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("", 40, 80, 120, 160, 200, 240, 280, 320, 360, 400, 440, 480),
		),
		"maxheight" => array
		(
			"subtype" 		=> "multiplier",
			"values" 			=> array("",  0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0, 1.2, 1.4, 1.6, 1.8, 2.0, 3.0),
		),
	);
	return $options;
}


function nxs_getfonts() 
{
	/*
	$result = array
	(
		"Arial, Arial, Helvetica, sans-serif" => "Arial, Arial, Helvetica, sans-serif",
		"Arial Black, Arial Black, Gadget, sans-serif" => "Arial Black, Arial Black, Gadget, sans-serif",
		"Courier New, Courier New, monospace" => "Courier New, Courier New, monospace",
		"'Droid Serif', serif" => "'Droid Serif', serif",
		"'Droid Sans', sans-serif" => "'Droid Sans', sans-serif",
		"'Georgia', serif" => "'Georgia', serif",
		"Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
		"Times New Roman, Times New Roman, Times, serif" => "Times New Roman, Times New Roman, Times, serif",
		"Verdana, Verdana, Geneva, sans-serif" => "Verdana, Verdana, Geneva, sans-serif",
		"Helvetica Neue,Helvetica,sans-serif" => "Helvetica Neue,Helvetica,sans-serif",
	);
	*/
	
	$result = array(
		"Arial, Arial, Helvetica, sans-serif" 					=> array("text" => "Arial, Arial, Helvetica, sans-serif"),
		"Arial Black, Arial Black, Gadget, sans-serif" 			=> array("text"  => "Arial Black, Arial Black, Gadget, sans-serif"),
		"Courier New, Courier New, monospace" 					=> array("text"  => "Courier New, Courier New, monospace"),
		"'Georgia', serif" 										=> array("text"  => "'Georgia', serif"),
		"Tahoma, Geneva, sans-serif" 							=> array("text"  => "Tahoma, Geneva, sans-serif"),
		"Times New Roman, Times New Roman, Times, serif" 		=> array("text"  => "Times New Roman, Times New Roman, Times, serif"),
		"Verdana, Verdana, Geneva, sans-serif" 					=> array("text"  => "Verdana, Verdana, Geneva, sans-serif"),
		"'Droid Serif', serif" 									=> array("text"  => "'Droid Serif	', serif"),
		"'Droid Sans', sans-serif" 								=> array("text"  => "'Droid Sans', sans-serif"),
		"'Crafty Girls', cursive" 								=> array("text"  => "'Crafty Girls', cursive"),		
		"'Trade Winds', cursive" 								=> array("text"  => "'Trade Winds', cursive"),
		"'Cherry Cream Soda', cursive" 							=> array("text"  => "'Cherry Cream Soda', cursive"),
		"'Federo', sans-serif" 									=> array("text"  => "'Federo', sans-serif"),		
		"'Smokum', cursive" 									=> array("text"  => "'Smokum', cursive"),
		"'Lobster', cursive" 									=> array("text"  => "'Lobster', cursive"),
		"'Rock Salt', cursive" 									=> array("text"  => "'Rock Salt', cursive"),
		"'Kranky', cursive" 									=> array("text"  => "'Kranky', cursive"),
		"'Sancreek', cursive" 									=> array("text"  => "'Sancreek', cursive"),
		"'Righteous', cursive" 									=> array("text"  => "'Righteous', cursive"),
		"'UnifrakturMaguntia', cursive" 						=> array("text"  => "'UnifrakturMaguntia', cursive"),
		"'Raleway', cursive" 									=> array("text"  => "'Raleway', cursive"),
		"'Helvetica Neue',Helvetica,sans-serif" 				=> array("text"  => "'Helvetica Neue',Helvetica,sans-serif"),
		"'Vidaloka', serif" 									=> array("text"  => "'Vidaloka',serif",),
		"'Great Vibes', serif" 									=> array("text"  => "'Great Vibes',serif",),
		"'Oswald', sans-serif" 									=> array("text"  => "'Oswald', sans-serif",),
		"'Open Sans', sans-serif" 								=> array("text"  => "'Open Sans', sans-serif",),
	);
	
	//
	// todo: enable filter such that framework/plugins/themes can extend the list of fonts
	return apply_filters("nxs_getfonts", $result, $args);
}

?>
