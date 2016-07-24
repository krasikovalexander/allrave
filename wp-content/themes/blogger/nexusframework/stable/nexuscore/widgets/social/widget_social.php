<?php

function nxs_widgets_social_geticonid() {
	$widget_name = basename(dirname(__FILE__));
	return "nxs-icon-" . $widget_name;
}

// Setting the widget title
function nxs_widgets_social_gettitle() {
	return nxs_l18n__("Social[nxs:widgettitle]", "nxs_td");
}

// Unistyle
function nxs_widgets_social_getunifiedstylinggroup() {
	return "socialwidget";
}

// Unicontent
function nxs_widgets_social_getunifiedcontentgroup() {
	return "logowidget";
}

/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_social_home_getoptions($args) 
{
	// CORE WIDGET OPTIONS

	$options = array
	(
		"sheettitle" 		=> nxs_widgets_social_gettitle(),
		"sheeticonid" 		=> nxs_widgets_social_geticonid(),
		"sheethelp" 		=> nxs_l18n__("http://nexusthemes.com/social-widget/"),
		"unifiedstyling" 	=> array("group" => nxs_widgets_social_getunifiedstylinggroup(),),	
		"unifiedcontent" 	=> array ("group" => nxs_widgets_social_getunifiedcontentgroup(),),
		"fields" 			=> array(
			// TITLE
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Title", "nxs_td"),
				"initial_toggle_state" 	=> "closed",
			),
		
			array
			( 
				"id" 				=> "title",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Title", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Title goes here", "nxs_td"),
				"unicontentablefield" => true,
				"localizablefield"	=> true
			),	
			array(
				"id" 				=> "title_heading",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Title importance", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("title_heading"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "title_alignment",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Title alignment", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("title_halignment"),
				"unistylablefield"	=> true
			),
						
			array(
				"id" 				=> "title_fontsize",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Override title fontsize", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("fontsize"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "title_heightiq",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Row align titles", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("When checked, the widget's title will participate in the title alignment of other partipating widgets in this row", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
				
			),
			
			// ACCOUNT URL'S
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Account URL's", "nxs_td"),
			),
			
			array(
				"id" 				=> "rss_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("RSS link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the RSS feed, place it here. Use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "twitter_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Twitter link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the Twitter account, place it here. Use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "facebook_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Facebook link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the Facebook account, place it here. Use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "linkedin_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("LinkedIn link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the LinkedIn account, place it here. Use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "googleplus_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Google+ link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the Google+ account, place it here. Don't use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			array(
				"id" 				=> "youtube_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Youtube link", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Use full url or leave blank to skip this item", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("If you want to place a link to the Youtube account, place it here. Don't use the full url!", "nxs_td"),
				"unicontentablefield" => true,
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
				
			),
			
			// ACCOUNT ICONS

			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Account icons", "nxs_td"),
				"initial_toggle_state" 	=> "closed",
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "use_icon",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Use simple icons", "nxs_td"),
				"unistylablefield"	=> true
			),			
			array( 
				"id" 				=> "rss_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom RSS icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the RSS icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "twitter_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom Twitter icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the Twitter icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "facebook_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom Facebook icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the Facebook icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "linkedin_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom LinkedIn icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the LinkedIn icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "googleplus_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom Google+ icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the Google+ icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "youtube_imageid",
				"type" 				=> "image",
				"label" 			=> nxs_l18n__("Custom Youtube icon", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("With this option you can upload a custom image for the Youtube icon.", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
				"unistylablefield"	=> true
			),
			
			// MISCELLANEOUS
			
			array(  
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Miscellaneous", "nxs_td"),
				"initial_toggle_state" 	=> "closed",
				"unistylablefield"	=> true
			),
			
			array(
				"id" 				=> "halign",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Alignment", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("halign"),
				"tooltip" 			=> nxs_l18n__("Align your accounts to the left, center or right from the placeholder.", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
				"unistylablefield"	=> true
			),
		)
	);
	
	nxs_extend_widgetoptionfields($options, array("backgroundstyle"));
	
	return $options;
}


/* WIDGET HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_social_render_webpart_render_htmlvisualization($args) 
{	
	// Importing variables
	extract($args);

	// Setting the widget name variable to the folder name
	$widget_name = basename(dirname(__FILE__));

	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// Blend unistyle properties
	$unistyle = $temp_array["unistyle"];
	if (isset($unistyle) && $unistyle != "") {
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_social_getunifiedstylinggroup(), $unistyle);
		$temp_array = array_merge($temp_array, $unistyleproperties);
	}
	
	// Blend unicontent properties
	$unicontent = $temp_array["unicontent"];
	if (isset($unicontent) && $unicontent != "") {
		// blend unistyle properties
		$unicontentproperties = nxs_unicontent_getunicontentproperties(nxs_widgets_social_getunifiedcontentgroup(), $unicontent);
		$temp_array = array_merge($temp_array, $unicontentproperties);
	}
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = $temp_array;
	
	// Localize atts
	$mixedattributes = nxs_localization_localize($mixedattributes);
	
	// Output the result array and setting the "result" position to "OK"
	$result = array();
	$result["result"] = "OK";
	
	// Widget specific variables
	extract($mixedattributes);
	
	$hovermenuargs = array();
	$hovermenuargs["postid"] = $postid;
	$hovermenuargs["placeholderid"] = $placeholderid;
	$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
	$hovermenuargs["metadata"] = $mixedattributes;
	nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);
	
	// Turn on output buffering
	ob_start();
		
	global $nxs_global_placeholder_render_statebag;
	if ($shouldrenderalternative == true) {
		$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-" . $widget_name . "-warning ";
	} else {
		// Appending custom widget class
		$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-" . $widget_name . " ";
	}
	
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */
	// Check if specific variables are empty
	// If so > $shouldrenderalternative = true, which triggers the error message
	$shouldrenderalternative = false;
	if (
	$title == "" &&
	$text == "" &&
	$rss_url == "" &&
	$twitter_url == "" &&
	$facebook_url == "" &&
	$linkedin_url == "" &&
	$googleplus_url == "" &&
	$youtube_url == "" &&
	nxs_has_adminpermissions()) {
		$shouldrenderalternative = true;
	}
	
	// ICON FONT
	if ($use_icon != "") {
		if ($rss_url != "") 		{ $rss_url = 			'<li><a target="_blank" href="' . $rss_url . '">		<span class="nxs-icon-rss"></span></a></li>'; }
		if ($twitter_url != "") 	{ $twitter_url = 		'<li><a target="_blank" href="' . $twitter_url . '">	<span class="nxs-icon-twitter-2"></span></a></li>'; }
		if ($facebook_url != "") 	{ $facebook_url = 		'<li><a target="_blank" href="' . $facebook_url . '">	<span class="nxs-icon-facebook"></span></a></li>'; }
		if ($linkedin_url != "") 	{ $linkedin_url = 		'<li><a target="_blank" href="' . $linkedin_url . '">	<span class="nxs-icon-linkedin"></span></a></li>'; }
		if ($googleplus_url != "") 	{ $googleplus_url = 	'<li><a target="_blank" href="' . $googleplus_url . '">	<span class="nxs-icon-google-plus"></span></a></li>'; }
		if ($youtube_url != "") 	{ $youtube_url = 		'<li><a target="_blank" href="' . $youtube_url . '">	<span class="nxs-icon-youtube"></span></a></li>'; }
		
		if 		($halign == 'left') 	{ $alignment = ''; } 
		else if ($halign == 'center') 	{ $alignment = 'nxs-center'; } 
		else if ($halign == 'right') 	{ $alignment = 'nxs-float-right'; }

		$icon_font_list ='
			<div class="nxs-applylinkvarcolor ' . $alignment . '">	
				<ul class="icon-font-list">'
					. $rss_url  
					. $twitter_url
					. $facebook_url
					. $linkedin_url
					. $googleplus_url
					. $youtube_url
					. '
				</ul>
			</div>
		';
	}
	
	// RSS
	// If the accountname is set and there's no custom icon
	if ($rss_url != "" && $rss_imageid == "") {
		
		$rss_url = '<a href="' . $rss_url . '" target="_new" class="nxs-social-rss" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($rss_url != "" && $rss_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($rss_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$rss_imageurl 		= $imagemetadata[0];
		$rss_imagewidth 	= $imagemetadata[1] . "px";
		$rss_imageheight 	= $imagemetadata[2] . "px";
	
		$rss_url = '
			<a href="' . $rss_url . '" target="_new" style="width: ' . $rss_imagewidth . '; height: ' . $rss_imageheight . ';">
				<li style="background: url(' . $rss_imageurl . ') no-repeat; width: ' . $rss_imagewidth . '; height: ' . $rss_imageheight . ';"></li>
			</a>';	
	}
	
	// TWITTER
	// If the accountname is set and there's no custom icon
	if ($twitter_url != "" && $twitter_imageid == "") {
		
		$twitter_url = '<a href="' . $twitter_url . '" target="_new" class="nxs-social-twitter" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($twitter_url != "" && $twitter_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($twitter_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$twitter_imageurl 		= $imagemetadata[0];
		$twitter_imagewidth 	= $imagemetadata[1] . "px";
		$twitter_imageheight 	= $imagemetadata[2] . "px";
	
		$twitter_url = '
			<a href="' . $twitter_url . '" target="_new" style="width: ' . $twitter_imagewidth . '; height: ' . $twitter_imageheight . ';">
				<li style="background: url(' . $twitter_imageurl . ') no-repeat; width: ' . $twitter_imagewidth . '; height: ' . $twitter_imageheight . ';"></li>
			</a>';	
	}
	
	// FACEBOOK
	// If the accountname is set and there's no custom icon
	if ($facebook_url != "" && $facebook_imageid == "") {
		
		$facebook_url = '<a href="' . $facebook_url . '" target="_new" class="nxs-social-facebook" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($facebook_url != "" && $facebook_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($facebook_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$facebook_imageurl 		= $imagemetadata[0];
		$facebook_imagewidth 	= $imagemetadata[1] . "px";
		$facebook_imageheight 	= $imagemetadata[2] . "px";	
	
		$facebook_url = '
			<a href="' . $facebook_url . '" target="_new" style="width: ' . $facebook_imagewidth . '; height: ' . $facebook_imageheight . ';">
				<li style="background: url(' . $facebook_imageurl . ') no-repeat; width: ' . $facebook_imagewidth . '; height: ' . $facebook_imageheight . ';"></li>
			</a>';	
	}
	
	// LINKEDIN
	// If the accountname is set and there's no custom icon
	if ($linkedin_url != "" && $linkedin_imageid == "") {
		
		$linkedin_url = '<a href="' . $linkedin_url . '" target="_new" class="nxs-social-linkedin" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($linkedin_url != "" && $linkedin_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($linkedin_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$linkedin_imageurl 		= $imagemetadata[0];
		$linkedin_imagewidth 	= $imagemetadata[1] . "px";
		$linkedin_imageheight 	= $imagemetadata[2] . "px";	
	
		$linkedin_url = '
			<a href="' . $linkedin_url . '" target="_new" style="width: ' . $linkedin_imagewidth . '; height: ' . $linkedin_imageheight . ';">
				<li style="background: url(' . $linkedin_imageurl . ') no-repeat; width: ' . $linkedin_imagewidth . '; height: ' . $linkedin_imageheight . ';"></li>
			</a>';	
	}
	
	// GOOGLE+
	// If the accountname is set and there's no custom icon
	if ($googleplus_url != "" && $googleplus_imageid == "") {
		
		$googleplus_url = '<a href="' . $googleplus_url . '" target="_new" class="nxs-social-google" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($googleplus_url != "" && $googleplus_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($googleplus_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$google_imageurl 		= $imagemetadata[0];
		$google_imagewidth 		= $imagemetadata[1] . "px";
		$google_imageheight 	= $imagemetadata[2] . "px";	
	
		$googleplus_url = '
			<a href="' . $googleplus_url . '" target="_new" style="width: ' . $google_imagewidth . '; height: ' . $google_imageheight . ';">
				<li style="background: url(' . $google_imageurl . ') no-repeat; width: ' . $google_imagewidth . '; height: ' . $google_imageheight . ';"></li>
			</a>';	
	}
	
	// YOUTUBE
	// If the accountname is set and there's no custom icon
	if ($youtube_url != "" && $youtube_imageid == "") {
		
		$youtube_url = '<a href="' . $youtube_url . '" target="_new" class="nxs-social-youtube" ><li></li></a>';
	
	// If both the accountname and a custom icon is set
	} else if ($youtube_url != "" && $youtube_imageid != "") {
	
		$imagemetadata= wp_get_attachment_image_src($youtube_imageid, 'full', true);
		
		// Returns an array with $imagemetadata: [0] => url, [1] => width, [2] => height
		$youtube_imageurl 		= $imagemetadata[0];
		$youtube_imagewidth 		= $imagemetadata[1] . "px";
		$youtube_imageheight 	= $imagemetadata[2] . "px";	
	
		$youtube_url = '
			<a href="' . $youtube_url . '" target="_new" style="width: ' . $youtube_imagewidth . '; height: ' . $youtube_imageheight . ';">
				<li style="background: url(' . $youtube_imageurl . ') no-repeat; width: ' . $youtube_imagewidth . '; height: ' . $youtube_imageheight . ';"></li>
			</a>';	
	}
	
	// Alignment
	if 		($halign == 'left') {
		$text_alignment = 'text-align: left;';
	} else if ($halign == 'center') {
		$alignment = 'margin: 0 auto;' . ' width: ' . $social_wrapper . 'px; padding-left: 5px;';
		$text_alignment = 'text-align: center;';
	} else if ($halign == 'right') {
		$alignment = 'float: right;';
		$text_alignment = 'text-align: right;';
	}
	
	$htmltitle = nxs_gethtmlfortitle($title, $title_heading, $title_alignment, $title_fontsize, $title_heightiq, "", "");
	
	if 		($halign == 'center') {$halign = 'nxs-center'; }
	else if ($halign == 'right') {$halign = 'nxs-float-right'; }
	
	// Social list
	if ($rss_url == "" && $twitter_url == "" && $facebook_url == "" && $linkedin_url == "" && $googleplus_url == "" && $youtube_url == "") {
		// do nothing
	} else {
		$social_list = '
			<div class="' . $halign . '">
				<ul class="nxs-social-list">
					' . $rss_url . $twitter_url . $facebook_url . $linkedin_url . $googleplus_url . $youtube_url . '
				</ul>
			</div>
		';
	}	
	
	/* OUTPUT
	---------------------------------------------------------------------------------------------------- */

	if ($shouldrenderalternative) {
		nxs_renderplaceholderwarning(nxs_l18n__("Missing input", "nxs_td"));
	} else {	
	
		echo $htmltitle;
		echo '<div class="nxs-clear"></div>';
		
		if ($use_icon != "") {
			echo $icon_font_list;
		} else {
			echo $social_list;	
		}
		echo '<div class="nxs-clear"></div>';    
	} 
	
	/* ------------------------------------------------------------------------------------------------- */
	 
	// Setting the contents of the output buffer into a variable and cleaning up te buffer
	$html = ob_get_contents();
	ob_end_clean();
	
	// Setting the contents of the variable to the appropriate array position
	// The framework uses this array with its accompanying values to render the page
	$result["html"] = $html;	
	$result["replacedomid"] = 'nxs-widget-' . $placeholderid;
	return $result;
}

function nxs_widgets_social_initplaceholderdata($args)
{
	extract($args);

	$args['title_heading'] = "2";
	
	// current values as defined by unistyle prefail over the above "default" props
	$unistylegroup = nxs_widgets_social_getunifiedstylinggroup();
	$args = nxs_unistyle_blendinitialunistyleproperties($args, $unistylegroup);
		
	nxs_mergewidgetmetadata_internal($postid, $placeholderid, $args);
	
	$result = array();
	$result["result"] = "OK";
	
	return $result;
}


?>
