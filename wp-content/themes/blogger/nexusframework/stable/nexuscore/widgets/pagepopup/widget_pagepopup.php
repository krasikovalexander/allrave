<?php

function nxs_widgets_pagepopup_geticonid() {
	return "nxs-icon-image";
}

function nxs_widgets_pagepopup_gettitle() {
	return nxs_l18n__("pagepopup[nxs:widgettitle]", "nxs_td");
}

function nxs_widgets_pagepopup_registerhooksforpagewidget($args)
{	
	$pagedecoratorid = $args["pagedecoratorid"];
	$pagedecoratorwidgetplaceholderid = $args["pagedecoratorwidgetplaceholderid"];
		
	global $nxs_pagepopup_pagedecoratorid;
	$nxs_pagepopup_pagedecoratorid = $pagedecoratorid;
	global $nxs_pageslider_pagedecoratorwidgetplaceholderid;
	$nxs_pageslider_pagedecoratorwidgetplaceholderid = $pagedecoratorwidgetplaceholderid;
	
	add_action('nxs_beforeend_head', 'nxs_widgets_pagepopup_beforeend_head');
}

// kudos to http://css-tricks.com/perfect-full-page-background-image/
function nxs_widgets_pagepopup_beforeend_head()
{
	global $nxs_pagepopup_pagedecoratorid;
	global $nxs_pageslider_pagedecoratorwidgetplaceholderid;
	
	$metadata = nxs_getwidgetmetadata($nxs_pagepopup_pagedecoratorid, $nxs_pageslider_pagedecoratorwidgetplaceholderid);
	extract($metadata);
	
	// Linked title
	if ($destination_articleid != "") 
	{
		$destination_url = nxs_geturl_for_postid($destination_articleid);
	}
	else
	{
		$destination_url = "http://www.nexusthemes.com";
	}
	
	// prevent administrators from seeing annoying edit features
	$destination_url = nxs_addqueryparametertourl_v2($destination_url, "nxs_impersonate", "anonymous", false, true);
	
	if ($delaypopup_seconds != "")
	{
		$delaypopup_milliseconds = $delaypopup_seconds * 1000;
	}
	else
	{
		$delaypopup_milliseconds = 1;
	}
	
	?>
	<script type='text/javascript'>

		<?php
		$url = $destination_url;
		$maxheight = 500;
		// $width = 340;		// 1 column
		$width = 738;		// 2 columns
		?>

		jQuery(window).load
		(
			function()
			{
				var shouldshow = true;	// todo: filter based on device?
				
				if ((jQuery(window).width() * 0.9) < <?php echo $width; ?>)
				{
					// if the width of the popup would fill up more than 90% of the available space,
					// ignore the popup
					//nxs_js_log("popup would be too wide; ignoring popup;");
					//nxs_js_alert("window:" + jQuery(window).width() * 0.9);
					//nxs_js_alert("popup width: <?php echo $width; ?>");
					shouldshow = false;
				}
				
				if (shouldshow)
				{
					// don't show it when the height of the screen is insufficient
					setTimeout(function() { nxs_js_pagepopup_activate() }, <?php echo $delaypopup_milliseconds; ?>);
				}
				else
				{
					nxs_js_log('insufficient space to render the popup');
				}
			}
		);
		
		
		
		function nxs_js_pagepopup_activate()
		{
			nxs_js_log('activating popup');
			
			// first check (server side) whether the popup should show
			var ajaxurl = nxs_js_get_adminurladminajax();
			jQuery.ajax
			(
				{
					type: 'POST',
					data: 
					{
						"action": "nxs_ajax_webmethods",
						"webmethod": "shouldshowpagepopup",
						"clientpopupsessioncontext": nxs_js_getescaped_popupsession_context(),
						"clientpopupsessiondata": nxs_js_getescaped_popupsession_data(),
						"clientshortscopedata": nxs_js_popup_getescapedshortscopedata(),
						"clientqueryparameters": nxs_js_escaped_getqueryparametervalues(),
						"pagedecoratorid": "<?php echo $nxs_pagepopup_pagedecoratorid; ?>",
						"placeholderid": "<?php echo $nxs_pageslider_pagedecoratorwidgetplaceholderid; ?>"
					},
					cache: false,
					dataType: 'JSON',
					url: ajaxurl, 
					success: function(response) 
					{
						nxs_js_log(response);
						if (response.result == "OK")
						{
							// step 1; if specified, set a cookie to indicate the popup was shown before
							if (response.setcookie != null && !nxs_js_stringisblank(response.setcookie))
							{
								// set cookie
								nxs_js_setcookie(response.setcookie, 'set');
							}
							
							// step 2; show the popup, if it should
							if ("yes" == response.shouldshow)
							{
								var width = <?php echo $width; ?>;
													
								// 
								nxs_js_popupsession_startnewcontext();
								
								nxs_js_popup_setsessioncontext("popup_current_dimensions", "gallerybox");
								
								nxs_js_popup_setsessioncontext("contextprocessor", "site");
								nxs_js_popup_setsessiondata("nxs_customhtml_popupheadertitle", "<?php echo $popuptitle; ?>");
								// nxs_js_popup_setsessiondata("minwidth", minwidth);

								var fillbackgroundcolor = 'white'; // 'yellow';
								
								var html = "";
								html += "<div style=\"margin: 0 auto; display: table;\">";	// horizontal alignment
								// note; the height of the iframe is 5 pixels too big; therefore we set the backgroundcolor of
								// the wrapping div to the same backgound color
								
								var semiborder = "padding-top: 5px; -moz-border-radius: 15px; border-radius: 15px; border: 10px solid rgb(127, 127, 127); border: 10px solid rgba(127, 127, 127, .5); -webkit-background-clip: padding-box; /* for Safari */ background-clip: padding-box; /* for IE9+, Firefox 4+, Opera, Chrome */";

								html += "<div style=\"padding-top: 10px;\">";	// padding 
								
								html += "<div style=\"position:relative;\"><a href=\"#\" onclick=\"nxs_js_closepopup_unconditionally(); return false;\"><span style=\"color: white; position: absolute; right: 0px; top: -10px;\" class=\"nxs-icon-remove-sign\"></span></a></div>";
								html += "<div style=\"" + semiborder + ";background-color: " + fillbackgroundcolor + "\">";	// surrounding shade
								html += "<iframe id=\"pagepopupiframe\" width=\"" + width + "px\" frameborder=\"0\" onload=\"nxs_js_iframeloadedpagepopup();\" style=\"-webkit-transform: translate3d(0px, 0px, 0px); border: none; background-color: " + fillbackgroundcolor + ";\" src=\"<?php echo $url; ?>\"></iframe>";
								html += "</div>";	// end surrounding shade
								html += "</div>";	// end horizontal alignment

								html += "</div>";	// end padding

								//nxs_js_htmldialogmessageok_v2("test", html, "none")
								
								nxs_js_popup_setsessiondata("nxs_customhtml_scaffoldingtype", "nothing");
								nxs_js_popup_setsessiondata("nxs_customhtml_customhtmlcanvascontent", html);
								nxs_js_popup_navigateto_v2("customhtml", false);
							}
							else
							{
								//
								nxs_js_log("server told us not to show the popup");
							}
						}
					}
				}
			);
		}
		
		function nxs_js_iframeloadedpagepopup()
		{
			var element = jQuery("#pagepopupiframe");
			var height = $(element).contents().height();	// this only works if the iframe's page is of the same domain
			if (height > <?php echo $maxheight; ?>)
			{
				height = <?php echo $maxheight; ?>;
			}
			$(element).height(height); 
			nxs_js_reset_popup_dimensions();	// required to vertical align the lightbox
			$(element).niceScroll();
		}
		
	</script>
	<?php
}

/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_pagepopup_home_getoptions($args) 
{
	$options = array
	(
		"sheettitle" => nxs_widgets_pagepopup_gettitle(),
		"sheeticonid" => nxs_widgets_pagepopup_geticonid(),
	
		"fields" => array
		(
			// SLIDES			
			
			array( 
				"id" 				=> "wrapper_input_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Display", "nxs_td"),
			),
			array(
				"id" 				=> "destination_articleid",
				"type" 				=> "article_link",
				"label" 			=> nxs_l18n__("Article link", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("Link the button to an article within your site.", "nxs_td"),
			),
			array(
				"id"     			=> "delaypopup_seconds",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Delay popup", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("delaypopup_seconds"),
				"unistylablefield"	=> true
			),
			array(
				"id"     			=> "repeatpopup_scope",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Repeat scope", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("repeatpopup_scope"),
				"unistylablefield"	=> true
			),
			
			/*
			array(
				"id" 				=> "destination_url",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("External link", "nxs_td"),
				"placeholder"		=> nxs_l18n__("http://www.nexusthemes.com", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("Link the button to an external source using the full url.", "nxs_td"),
				"localizablefield"	=> true
			),
			*/
			array( 
				"id" 				=> "wrapper_input_end",
				"type" 				=> "wrapperend"
			),
		)
	);
	
	return $options;
}


/* ADMIN PAGE HTML
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

function nxs_widgets_pagepopup_render_webpart_render_htmlvisualization($args) 
{
	// Importing variables
	extract($args);
	
	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = array_merge($temp_array, $args);
	
	// Output the result array and setting the "result" position to "OK"
	$result = array();
	$result["result"] = "OK";
	
	// Widget specific variables
	extract($mixedattributes);
	
	// popup menu
	
	$hovermenuargs = array();
	$hovermenuargs["postid"] = $postid;
	$hovermenuargs["placeholderid"] = $placeholderid;
	$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
	$hovermenuargs["enable_decoratewidget"] = false;
	$hovermenuargs["enable_deletewidget"] = false;
	$hovermenuargs["enable_deleterow"] = true;
	$hovermenuargs["metadata"] = $mixedattributes;	
	nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);
	
	// Turn on output buffering
	ob_start();
	
	// Setting the widget name variable to the folder name
	$widget_name = basename(dirname(__FILE__));
		
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
	/*
	if (
		somealternativeflow
	) {
		$shouldrenderalternative = true;
		$alternativehint = nxs_l18n__("Minimal: image, title, text or button", "nxs_td");
	}
	*/
	
		
	/* OUTPUT
	---------------------------------------------------------------------------------------------------- */

	if ($shouldrenderalternative) 
	{
		if ($alternativehint == "")
		{
			$alternativehint = nxs_l18n__("Missing input", "nxs_td");
		}
		nxs_renderplaceholderwarning($alternativehint); 
	} 
	else 
	{
		/* ADMIN OUTPUT
		---------------------------------------------------------------------------------------------------- */
		
		echo '
		<div ' . $class . '>
		<div class="content2">
		 <div class="box">
		        <div class="box-title">
		   <h4>Page popup</h4>
		  </div>
		  <div class="box-content"></div>
		 </div>
		 <div class="nxs-clear"></div>
		</div>
		</div>';
		
		/* ------------------------------------------------------------------------------------------------- */
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

function nxs_widgets_pagepopup_initplaceholderdata($args)
{
	extract($args);

	/*
	$args['property'] = "value";
	*/
		
	nxs_mergewidgetmetadata_internal($postid, $placeholderid, $args);
	
	$result = array();
	$result["result"] = "OK";
	
	return $result;
}

?>
