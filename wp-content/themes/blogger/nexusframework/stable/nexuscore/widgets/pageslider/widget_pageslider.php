<?php

function nxs_widgets_pageslider_geticonid() {
	return "nxs-icon-sliderbox";
}

// Setting the widget title
function nxs_widgets_pageslider_gettitle() {
	return nxs_l18n__("Pageslider[nxs:widgettitle]", "nxs_td");
}

// Unistyle
function nxs_widgets_pageslider_getunifiedstylinggroup() {
	return "pagesliderwidget";
}

function nxs_widgets_pageslider_registerhooksforpagewidget($args)
{
	$pagedecoratorid = $args["pagedecoratorid"]; 
	$pagedecoratorwidgetplaceholderid = $args["pagedecoratorwidgetplaceholderid"];
	
	$widget_metadata = nxs_getwidgetmetadata($pagedecoratorid, $pagedecoratorwidgetplaceholderid);

	$pagesliderid = $widget_metadata['items_genericlistid'];
	
	if (isset($pagesliderid))
	{
		// for now we use a global variable to store the pagesliderid, this is not the best solution,
		// but works for now
		
		global $nxs_pageslider_pagedecoratorid;
		$nxs_pageslider_pagedecoratorid = $pagedecoratorid;
		global $nxs_pageslider_pagedecoratorwidgetplaceholderid;
		$nxs_pageslider_pagedecoratorwidgetplaceholderid = $pagedecoratorwidgetplaceholderid;
		
		global $nxs_pageslider_pagesliderid;
		$nxs_pageslider_pagesliderid = $pagesliderid;
		
		add_action('nxs_beforeend_head', 'nxs_widgets_pageslider_beforeend_head');
		add_action('nxs_ext_betweenheadandcontent', 'nxs_widgets_pageslider_betweenheadandcontent');
		add_action('nxs_menu_afterpagesettings', 'nxs_widgets_pageslider_addmenuitem');	
	}
}


/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_pageslider_home_getoptions($args) 
{
	$options = array
	(
		"sheettitle" 		=> nxs_widgets_pageslider_gettitle(),
		"sheeticonid" 		=> nxs_widgets_pageslider_geticonid(),
		"sheethelp" 		=> nxs_l18n__("http://nexusthemes.com/pageslider-widget/"),
		"unifiedstyling" 	=> array("group" => nxs_widgets_pageslider_getunifiedstylinggroup(),),
		"fields" => array
		(
			// SLIDES			
			
			array( 
				"id" 				=> "wrapper_slides_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Slides", "nxs_td"),
			),
			
			array(
				"id" 				=> "items_genericlistid",
				"type" 				=> "staticgenericlist_link",
				"label" 			=> nxs_l18n__("Edit slides", "nxs_td"),
			),
			array(
				"id" 				=> "item_durationvisibility",	
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Visibility duration", "nxs_td"),
				"dropdown" 			=> nxs_convertindexarraytoassociativearray(array("3000","4000","5000","6000","9000","12000")),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "caption_container_height",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Caption container height", "nxs_td"),
				"dropdown" 			=> array
				(
					"@@@nxsempty@@@" => nxs_l18n__("None", "nxs_td"),
					"300px" => nxs_l18n__("300px", "nxs_td"),
					"400px" => nxs_l18n__("400px", "nxs_td"),
					"500px" => nxs_l18n__("500px", "nxs_td"),
					"600px" => nxs_l18n__("600px", "nxs_td"),
					"screenheight" => nxs_l18n__("Height of screen", "nxs_td"),
				),
				"tooltip" 			=> nxs_l18n__("This option set's the height of the caption container between the header and the rest of the content", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "hide_for_touchdevices",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Hide for handheld devices", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "remove_thumbnail_navigation",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Remove thumbnail navigation", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "ken_burns",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Ken Burns effect", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_slides_end",
				"type" 				=> "wrapperend"
			),
			
			// CAPTIONS			
			
			array( 
				"id" 				=> "wrapper_captions_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Captions", "nxs_td"),
				"initial_toggle_state"	=> "closed",
				"unistylablefield"	=> true
			),
			
			
			array(
				"id" 				=> "show_metadata",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Captions", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("When checked this option will show a title, description and link if available", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "no_blink",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Disable caption blink", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("When checked this option will disable the blinking of caption in unison with slide transitions.", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "caption_width",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Caption width", "nxs_td"),
				"dropdown" 			=> array("50"=>"50%","40"=>"40%","30"=>"30%","20"=>"20%"),
				"unistylablefield"	=> true
			),
			array(
				"id"     			=> "text_padding",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Text padding", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("padding"),
				"unistylablefield"	=> true
			),
			array(
				"id"     			=> "text_margin",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Text margin", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("margin"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "title_fontsize",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Title fontsize", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("fontsize"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "description_fontsize",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Description fontsize", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("fontsize"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "halign",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Caption alignment", "nxs_td"),
				"dropdown" 			=> 
				array(
					"left"			=>"left",
					"center"		=>"center",
					"right"			=>"right",
					"top left"		=>"top left",
					"top center"	=>"top center",
					"top right"		=>"top right",
				),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "bgcolor",
				"type" 				=> "colorzen",
				"label" 			=> nxs_l18n__("Wrapper background", "nxs_td"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_captions_end",
				"type" 				=> "wrapperend",
				"unistylablefield"	=> true
			),
			
			// BUTTON
			
			array( 
				"id" 				=> "wrapper_button_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Button", "nxs_td"),
				"initial_toggle_state"	=> "closed",
			),

			array(
				"id" 				=> "button_text",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Button title", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Button text goes here", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("Put a text on the call-to-action button.", "nxs_td")
			),	
			array(
				"id" 				=> "button_scale",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Button scale", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("button_scale"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "button_color",
				"type" 				=> "colorzen",
				"label" 			=> nxs_l18n__("Button color", "nxs_td"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "wrapper_button_end",
				"type" 				=> "wrapperend"
			),
		)
	);

	nxs_extend_widgetoptionfields($options, array("unistyle"));	
	
	return $options;
}


/* ADMIN PAGE HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_pageslider_render_webpart_render_htmlvisualization($args) 
{
	// Importing variables
	extract($args);
	
	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// Unistyle
	$unistyle = $temp_array["unistyle"];
	if (isset($unistyle) && $unistyle != "") {
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_pageslider_getunifiedstylinggroup(), $unistyle);
		$temp_array = array_merge($temp_array, $unistyleproperties);
	}
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = array_merge($temp_array, $args);
	
	// Output the result array and setting the "result" position to "OK"
	$result = array();
	$result["result"] = "OK";
	
	
	global $nxs_global_row_render_statebag;
	
	$items_genericlistid = $mixedattributes['items_genericlistid'];

	/* ADMIN PAGE HOVER MENU HTML
	---------------------------------------------------------------------------------------------------- */
	
	$hovermenuargs = array();
	$hovermenuargs["postid"] = $postid;
	$hovermenuargs["placeholderid"] = $placeholderid;
	$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
	$hovermenuargs["enable_decoratewidget"] = false;
	$hovermenuargs["enable_deletewidget"] = false;
	$hovermenuargs["enable_deleterow"] = true;
	$hovermenuargs["metadata"] = $mixedattributes;
	nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);
	
	/* ADMIN EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */
	
	ob_start();
	
	$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-custom-html nxs-applylinkvarcolor";
		
	$shouldrenderalternative = false;
	$trimmedhtmlcustom = $htmlcustom;
	$trimmedhtmlcustom = preg_replace('/<!--(.*)-->/Uis', '', $trimmedhtmlcustom);
	$trimmedhtmlcustom = trim($trimmedhtmlcustom);
	if ($trimmedhtmlcustom == "" && nxs_has_adminpermissions())
	{
		$shouldrenderalternative = true;
	}
	
	/* ADMIN OUTPUT
	---------------------------------------------------------------------------------------------------- */
	
	echo '
	<div '.$class.'>
		<div class="content2">
			<div class="box">
	        	<div class="box-title">
					<h4>Background slider</h4>
				</div>
				<div class="box-content"></div>
			</div>
			<div class="nxs-clear"></div>
		</div>
	</div>';
	
	/* ------------------------------------------------------------------------------------------------- */
	
	// Setting the contents of the output buffer into a variable and cleaning up te buffer
	$html = ob_get_contents();
	ob_end_clean();

	// Setting the contents of the variable to the appropriate array position
	// The framework uses this array with its accompanying values to render the page
	$result["html"] = $html;	
	$result["replacedomid"] = 'nxs-widget-'.$placeholderid;

	// outbound statebag
	return $result;
}

/* INITIATING WIDGET DATA
----------------------------------------------------------------------------------------------------*/
function nxs_widgets_pageslider_initplaceholderdata($args)
{
	// delegate to generic implementation
	$widgetname = basename(dirname(__FILE__));
	
	// create a new generic list with subtype gallery
	// assign the newly create list to the list property
	
	$subargs = array();
	$subargs["nxsposttype"] = "genericlist";
	$subargs["nxssubposttype"] = "pageslider";	// NOTE!
	$subargs["poststatus"] = "publish";
	$subargs["titel"] = nxs_l18n__("Slider items[title]", "nxs_td");
	$subargs["slug"] = nxs_l18n__("Slider items[slug]", "nxs_td");
	$subargs["postwizard"] = "defaultgenericlist";
	
	$response = nxs_addnewarticle($subargs);
	if ($response["result"] == "OK")
	{
		$args["items_genericlistid"] = $response["postid"];
		$args["items_genericlistid_globalid"] = nxs_get_globalid($response["postid"], true);
	}
	else
	{
		var_dump($response);
		die();
	}
	
	$args["item_durationvisibility"] = "5000";
	$args["item_transitionduration"] = "300";
	$args['ph_margin_bottom'] = "0-0";
	$args['caption_container_height'] = "500px";
	$args['show_metadata'] = 'checked';

	// current values as defined by unistyle prefail over the above "default" props
	$unistylegroup = nxs_widgets_pageslider_getunifiedstylinggroup();
	$args = nxs_unistyle_blendinitialunistyleproperties($args, $unistylegroup);
	
	$result = nxs_widgets_initplaceholderdatageneric($args, $widgetname);
	return $result;
}

/* UPDATING WIDGET DATA
----------------------------------------------------------------------------------------------------*/
function nxs_widgets_pageslider_updateplaceholderdata($args) 
{
	// delegate to generic implementation
	$widgetname = basename(dirname(__FILE__));
	$result = nxs_widgets_updateplaceholderdatageneric($args, $widgetname);
	return $result;
}

function nxs_widgets_pageslider_addmenuitem()
{
	// the global $nxs_pageslider_pagesliderid is set in nxs_widgets_pageslider_registerhooksforpagewidget($args)
	global $nxs_pageslider_pagesliderid;
	global $post;
	$postid = $post->ID;
	
	$refurl = nxs_geturl_for_postid($nxs_pageslider_pagesliderid);
	$nxsrefurlspecial = urlencode(base64_encode(nxs_geturl_for_postid($postid)));
	$refurl = nxs_addqueryparametertourl($refurl, "nxsrefurlspecial", $nxsrefurlspecial);
	?>
	<li class="nxs-hidewheneditorinactive nxs-sub-menu">
		<!-- edit slides -->
		<a href='#' class='site' title='<?php nxs_l18n_e("Edit[nxs:tooltip]", "nxs_td"); ?>' onclick="var url='<?php echo $refurl; ?>'; nxs_js_redirect(url); return false;">
			<span class='<?php echo nxs_widgets_pageslider_geticonid();?>'></span>
		</a>
		<ul>
			<!-- config slider -->
			<!--
			<li title='<?php nxs_l18n_e("Edit[nxs:tooltip]", "nxs_td"); ?>'>
				<a href='#' class='site' title='<?php nxs_l18n_e("Edit[nxs:tooltip]", "nxs_td"); ?>' onclick="nxs_js_edit_offscreen_widget(this); return false;">
					<span class='nxs-icon-plug'></span>
				</a>
			</li>
			-->
		</ul>
	</li>
	<?php
}

/* PAGE SLIDER HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_pageslider_beforeend_head()
{
	// the global $nxs_pageslider_pagesliderid is set in nxs_widgets_pageslider_registerhooksforpagewidget($args)
	global $nxs_pageslider_pagesliderid;
	
	$structure = nxs_parsepoststructure($nxs_pageslider_pagesliderid);
	$aantalslides = count($structure);
	
	// get meta of the slider itself (such as transition time, etc.)
	global $nxs_pageslider_pagedecoratorid;
	global $nxs_pageslider_pagedecoratorwidgetplaceholderid;	
	$pageslider_metadata = nxs_getwidgetmetadata($nxs_pageslider_pagedecoratorid, $nxs_pageslider_pagedecoratorwidgetplaceholderid);
	
		// Unistyle
	$unistyle = $pageslider_metadata["unistyle"];
	if (isset($unistyle) && $unistyle != "") 
	{
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_pageslider_getunifiedstylinggroup(), $unistyle);
		$pageslider_metadata = array_merge($pageslider_metadata, $unistyleproperties);
	}
	
	extract($pageslider_metadata);
	
	/* EXPRESSIONS
	----------------------------------------------------------------------------------------------------*/
	
	$button_scale_cssclass = nxs_getcssclassesforlookup("nxs-button-scale-", $button_scale);
	$button_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $button_alignment);
	$button_color_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $button_color);
	
	// Text padding and margin
	$text_padding_cssclass = nxs_getcssclassesforlookup("nxs-padding-", $pageslider_metadata["text_padding"]);
	$text_margin_cssclass = nxs_getcssclassesforlookup("nxs-margin-", $text_margin);
	
	// Title and description fontsizes
	$title_fontsize_cssclass = nxs_getcssclassesforlookup("nxs-head-fontsize-", $title_fontsize);
	$description_fontsize_cssclass = nxs_getcssclassesforlookup("nxs-text-fontsize-", $description_fontsize);
	
	// Caption alignment
	if ($halign == 'left') 			{ $text_align = 'nxs-align-left'; } else 
	if ($halign == 'center') 		{ $text_align = 'nxs-align-center'; } else 
	if ($halign == 'right') 		{ $text_align = 'nxs-align-right'; } else
	if ($halign == 'top left') 		{ $text_align = 'nxs-align-left'; } else
	if ($halign == 'top center') 	{ $text_align = 'nxs-align-center'; } else
	if ($halign == 'top right') 	{ $text_align = 'nxs-align-right'; }
	
	// Background Color
	if ($bgcolor == "") { $bgcolor = 'base2-a0-6'; }
	$bgcolor_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $bgcolor);
	
	// Metadata transition (blink feature)
	if 		($item_durationvisibility == "3000") { $metadata_transition = "blink3-3"; }
	else if ($item_durationvisibility == "4000") { $metadata_transition = "blink4-3"; }
	else if ($item_durationvisibility == "4000") { $metadata_transition = "blink5-3"; }
	else if ($item_durationvisibility == "6000") { $metadata_transition = "blink6-3"; }
	
	if ($no_blink != "") { $metadata_transition = "no-blink"; }
	
	// Transition duration
	$item_transitionduration = '300';
	
	if ($aantalslides > 0)
	{
		?>
		<link rel="stylesheet" href="<?php echo nxs_getframeworkurl(); ?>/js/supersized/slideshow/css/supersized.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo nxs_getframeworkurl(); ?>/js/supersized/slideshow/js/altsupersized.js"></script>
		<script type="text/javascript" src="<?php echo nxs_getframeworkurl(); ?>/js/supersized/slideshow/theme/nxssupersizedshutter.js"></script>
		
		<script type="text/javascript">
				
				jQuery(document).ready
				(
					function() 
					{
						var shouldrenderslider = true;
						
						<?php if ($hide_for_touchdevices != "") { ?>
						shouldrenderslider = !nxs_js_deviceistouchdevice();
						<?php } ?>
						
						if(shouldrenderslider)
						{
										
							jQuery(function($){
							
							$.supersized({
							
								// Functionality
								slideshow               :   1,												// Slideshow on/off
								autoplay				:	1,												// Slideshow starts playing automatically
								start_slide             :   1,												// Start slide (0 is random)
								image_path				:	'http://demo4.horecamasters.nl/wordpress/wp-content/themes/rsw/images/supersized/',
								stop_loop				:	0,												// Pauses slideshow on last slide
								random					: 	0,												// Randomize slide order (Ignores start slide)
								slide_interval          :   <?php echo $item_durationvisibility; ?>,		// Length between transitions
								transition              :   1, 												// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
								transition_speed		:	<?php echo $item_transitionduration; ?>,		// Speed of transition
								new_window				:	0,												// Image links open in new window/tab
								pause_hover             :   0,												// Pause slideshow on hover
								keyboard_nav            :   1,												// Keyboard navigation on/off
								performance				:	2,												// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
								image_protect			:	0,												// Disables image dragging and right click with Javascript
																		   
								// Size & Position						   
								min_width		        :   0,												// Min width allowed (in pixels)
								min_height		        :   0,												// Min height allowed (in pixels)
								vertical_center         :   1,												// Vertically center background
								horizontal_center       :   1,												// Horizontally center background
								fit_always				:	0,												// Image will never exceed browser width or height (Ignores min. dimensions)
								fit_portrait         	:   1,												// Portrait images will not exceed browser height
								fit_landscape			:   0,												// Landscape images will not exceed browser width
																		   
								// Components							
								slide_links				:	'blank',										// Individual links for each slide (Options: false, 'number', 'name', 'blank')
								thumb_links				:	1,												// Individual thumb links for each slide
								thumbnail_navigation    :   0,												// Thumbnail navigation
								
								progress_bar			:	1,												// Timer for each slide							
								mouse_scrub				:	1,
								
								slides 					:  	[												// Slideshow Images
								<?php
									$isfirst = true;
									
									foreach ($structure as $pagerow) {
										$content = $pagerow["content"];
										$slideplaceholderid = nxs_parsepagerow($content);
										$placeholdermetadata = nxs_getwidgetmetadata($nxs_pageslider_pagesliderid, $slideplaceholderid);
										$placeholdertype = $placeholdermetadata["type"];					
										
										if ($placeholdertype == "" || $placeholdertype == "undefined" || !isset($placeholdertype)) {
											// fix Wendy
										} else if ($placeholdertype == "slide") {
											$koptekst = $placeholdermetadata['title'];
											
											$bodytekst = $placeholdermetadata['text'];
											
											$imageid = $placeholdermetadata['image_imageid'];
											$targetpageid = $placeholdermetadata['destination_articleid'];
											
											if ($targetpageid != 0) {
												$destinationurl = nxs_geturl_for_postid($targetpageid);
											} else {
												$destinationurl = "";
											}
											
											if ($destinationurl != "") {
												$link = '<div class="nxs-clear nxs-margin-top20"><a class="nxs-button '.$button_color_cssclass.' '.$button_scale_cssclass.' '.$metadata_transition.'" href="'.$destinationurl.'">'.$button_text.'</a></div>';
											} else {
												$link = '';
											}
											
											$lookup = wp_get_attachment_image_src($imageid, 'full', true);
											$imageurl = $lookup[0];
											
											if ($isfirst) {
												$isfirst = false;
											} else {
												echo ",";
											}
											
											if ($show_metadata != "")
											{
												$kophtml = "";
												if ($koptekst != "")
												{
													$kophtml = "<h2 class='nxs-title $title_fontsize_cssclass $metadata_transition'>" . nxs_render_html_escape_singlequote($koptekst) . "</h2>";
												}
												$bodyhtml = "<div class='nxs-placeholder $description_fontsize_cssclass'><div class='nxs-default-p nxs-padding-bottom0 $metadata_transition'><p>" . nxs_render_html_escape_singlequote($bodytekst) . "</p></div></div>";
												
												$titlevalue = "<div class='slidecaption-container $text_padding_cssclass $bgcolor_cssclass $text_align $text_margin_cssclass'>{$kophtml}{$bodyhtml}{$link}</div>";
												$titlevalue = str_replace("'", "\"", $titlevalue);
												$titlevalue = str_replace("\n", "", $titlevalue);
											}
											else
											{
												$titlevalue = "";
											}
											
											?>									
											{
												image : '<?php echo $imageurl; ?>',
												title : '<?php echo $titlevalue; ?>', 
												thumb : '<?php echo $imageurl; ?>',
												url : '<?php echo $destinationurl; ?>'
											}
											<?php
										}
										else
										{
											echo "Placeholdertype is not (yet?) supported;a[" . $placeholdertype . "]";
										}
									}
								?>
								]
							});
					    });
					  }
					  else
				  	{
				  		jQuery('#nxs-supersized').remove();
				  		jQuery('#supersized-loader').remove();
				  		
				  	}
					}
				);
		</script>
		<?php
	}
	else
	{
		// no slides
		// echo "no slides";
	}
}

/* OUTPUT
----------------------------------------------------------------------------------------------------*/
	
function nxs_widgets_pageslider_betweenheadandcontent()
{
	// the global $nxs_pageslider_pagesliderid is set in nxs_widgets_pageslider_registerhooksforpagewidget($args)
	global $nxs_pageslider_pagesliderid;
	

	$structure = nxs_parsepoststructure($nxs_pageslider_pagesliderid);
	$aantalslides = count($structure);
	
	// get meta of the slider itself (such as transition time, etc.)
	global $nxs_pageslider_pagedecoratorid;
	global $nxs_pageslider_pagedecoratorwidgetplaceholderid;	
	$pageslider_metadata = nxs_getwidgetmetadata($nxs_pageslider_pagedecoratorid, $nxs_pageslider_pagedecoratorwidgetplaceholderid);
	
	// Unistyle
	$unistyle = $pageslider_metadata["unistyle"];
	if (isset($unistyle) && $unistyle != "") {
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_pageslider_getunifiedstylinggroup(), $unistyle);
		$pageslider_metadata = array_merge($pageslider_metadata, $unistyleproperties);
	}
	
	extract($pageslider_metadata);
	
	/* EXPRESSIONS
	----------------------------------------------------------------------------------------------------*/
	
	// CAPTION WIDTH
	$caption_width = 'nxs-width'.$caption_width;
	
	// CONTAINER HEIGHT
	if ($caption_container_height != "")
	{
		if ($caption_container_height == "screenheight") 
		{
			// height will be determined in the runtime (javascript) 
			$supersized_style = "";
		}
		else if ($caption_container_height == "@@@nxsempty@@@") 
		{
			// no height
			$supersized_style = "";
		}
		else
		{
			$supersized_style = 'height: '.$caption_container_height.';'; 	
		}
	}
	
	// Text padding and margin
	$text_padding_cssclass = nxs_getcssclassesforlookup("nxs-padding-", $pageslider_metadata["text_padding"]);
	$text_margin_cssclass = nxs_getcssclassesforlookup("nxs-margin-", $text_margin);
	
	// Caption alignment
	if ($halign == 'left') 			{  } else
	if ($halign == 'center') 		{ $halign = "nxs-center"; } else
	if ($halign == 'right') 		{ $halign = "nxs-absolute nxs-right"; } else
	if ($halign == 'top left') 		{ $top = "top: 0px;"; $inline = "nxs-inline"; } else
	if ($halign == 'top center') 	{ $top = "top: 0px;"; $inline = "nxs-inline"; $halign = "nxs-center"; } else
	if ($halign == 'top right') 	{ $top = "top: 0px;"; $inline = "nxs-inline"; $halign = "nxs-absolute nxs-right"; }
	
	// Thumbnail navigation
	if ($remove_thumbnail_navigation != "") { $remove_thumbnail_navigation = "remove-thumbnail-navigation"; }
	
	// 
	if ($caption_container_height == "") {$height = "no-height"; } else
	if ($caption_container_height != "") {$height = "has-height"; } 
	
	// Ken Burns effect
	if ($ken_burns != "") { 
		$script = "
		<script type='text/javascript'>
			jQuery(window).ready(
				function() {
					// jQuery('html').addClass('nxs-pageslider kenburns');
					// kenburns is disabled for the time being ...
					jQuery('html').addClass('nxs-pageslider');
				}
			);
		</script>
		";
	} else {
		$script = "
		<script type='text/javascript'>
			jQuery(window).ready(
				function() {
					jQuery('html').addClass('nxs-pageslider');
				}
			);
		</script>
		";
	}
	
	/* OUTPUT
	----------------------------------------------------------------------------------------------------*/
	
	echo $script;
    
	echo '
	<div id="nxs-supersized" class="nxs-sitewide-element nxs-containshovermenu1 '.$csswidescreenclass.' '.$remove_thumbnail_navigation.' '.$height.'" style="'.$supersized_style.'">';
        
        // SLIDE CAPTIONS
		if ($show_metadata != "") {
			echo '
		  <div class="caption-aligner '.$caption_width.' '.$halign.'" style="'.$supersized_style.' '.$top.'">			
			  <div id="slidecaption" class="nxs-placeholder '.$inline.'">
				
				  
				
			  </div>
		  </div>';
		}
		?>
		
		<?php
		if ($caption_container_height == "screenheight") 
		{
			// reset the height of the caption aligner initially the page is loaded,
			// and reset if after the screen size is adjusted
			?>
			<script type='text/javascript'>
				
				function nxs_js_resetpagesliderheight_to_screenheight()
				{
					var windowheight = jQuery(window).height();
					var headerheight = jQuery("#nxs-header").height();
					var updatedheight = windowheight - headerheight;
					nxs_js_log("windowheight:" + windowheight);
					nxs_js_log("headerheight:" + headerheight);
					nxs_js_log("new height:" + updatedheight);
					jQuery('#nxs-supersized').height(updatedheight);
					jQuery('#nxs-supersized .caption-aligner').height(updatedheight);
				}
				
				jQuery(window).ready
				(
					function()
					{
						nxs_js_log('first time');
						nxs_js_resetpagesliderheight_to_screenheight();
					}
				);
				
				jQuery(window).bind
				(
					'nxs_event_resizeend', 
					function() 
					{
						nxs_js_log('resize time');
						nxs_js_resetpagesliderheight_to_screenheight();
					}
				);
			</script>
			<?php
		}
		?>
        
		<!-- Progress bar causes exorbitant usage of browser / computer cpu, thus is a dangerous option 
        PROGRESS BAR -->
        <div id="progress-back" class="load-item">
            <div id="progress-bar"></div>
        </div>
        
        <!-- THUMB TRAY -->
            <div id="thumb-tray" class="load-item">
                <div id="thumb-back" class="general-nav">
                	<span class="general-ui-styling nxs-icon-arrow-left">
                </div>
                <div id="thumb-forward" class="general-nav">
                	<span class="general-ui-styling nxs-icon-arrow-right">
                </div>
            </div> 
                    
        <!-- CONTROLS WRAPPER 
        --------------------------------------------------------------------------------> 
        <div id="controls-wrapper" class="load-item" style="display: block;">
            <div id="controls">
                
                <!-- PLAY/PAUSE TOGGLE -->
                <div class="pagesliderplaypausetoggle">
                    <a href="#" onclick="api.playToggle(); jQuery('.pagesliderplaypausetoggle').toggle(); return false;">
                        <span class="nxs-toggle general-ui-styling nxs-icon-pause"></span>
                    </a>
                </div>
                
                <!-- initial state is play, thus we hide the wrap -->
                <div class="pagesliderplaypausetoggle" style="display: none;">
                    <a href="#" onclick="api.playToggle(); jQuery('.pagesliderplaypausetoggle').toggle(); return false;">
                        <span class=" nxs-toggle general-ui-styling nxs-icon-play"></span>
                    </a>
                </div>
            
                <!-- SLIDE COUNTER -->
                <div id="slidecounter">
                    <span class="slidenumber"></span> / <span class="totalslides"></span>
                </div>
                
                
                <!-- THUMB TRAY TOGGLE -->                   
                <div class="">
                    <a id="tray-button" href="#" onclick="return false;">
                        <span class="pagesliderthumbtrayshowhide nxs-toggle general-ui-styling nxs-icon-arrow-up"></span>
                    </a>
                </div>
                
                <!-- SLIDE CAPTIONS -->
                <div id="slidecaption"></div>
                
                <script type='text/javascript'>
                    jQuery(window).load
                    (
                        function()
                        {
                            if (!api.options.autoplay)
                            {
                                jQuery(".pagesliderplaypausetoggle").toggle();
                            }
                        }
                    );
                </script>
                
                
                <!--Navigation-->
                <ul id="slide-list"></ul>
                
            </div> <!-- END controls -->
        </div> <!-- END controls-wrapper -->
        
   
</div>		
	<?php
}

?>
