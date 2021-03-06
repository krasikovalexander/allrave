<?php

function nxs_widgets_formbox_geticonid() {
	//$widget_name = basename(dirname(__FILE__));
	return "nxs-icon-contact";
}

// Setting the widget title
function nxs_widgets_formbox_gettitle() {
	return nxs_l18n__("Form", "nxs_td");
}

// Unistyle
function nxs_widgets_formbox_getunifiedstylinggroup() {
	return "formboxwidget";
}

// Used by the individual formitem widgets to determine an automated unique ID
function nxs_widgets_formbox_getclientsideprefix($postid, $placeholderid) {
	$result = "nxs_cf_" . $postid . "_" . $placeholderid . "_";
	return $result;
}

function nxs_widgets_renderinformbox($widget, $args) 
{
	// we invoke the method of the contactbox, same as formbox
	$functionnametoinvoke = 'nxs_widgets_' . $widget . '_renderincontactbox';
	// invokefunction
	if (function_exists($functionnametoinvoke)) {
		$result = call_user_func($functionnametoinvoke, $args);
	} else {
		nxs_webmethod_return_nack("function not found; " . $functionnametoinvoke);	
	}
	return $result;
}

function nxs_widgets_formbox_getstoragefileextension($metadata)
{
	// the file will be stored in a .php file extension,
	// which will help to ensure the file is not downloadable
	return "php";
}

function nxs_widgets_formbox_getstorageabsfolder($metadata)
{
	$upload_dir_meta = wp_upload_dir();
	$upload_dir = $upload_dir_meta["basedir"];
	$storagerelfolder = "nxsforms";
	$storageabsfolder = $upload_dir . "/" . $storagerelfolder;
	
	if(!is_dir($storageabsfolder)) 
	{
		// if the folder doesn't yet exist, create it!
		mkdir($storageabsfolder, 0750, true);
	}

	return $storageabsfolder;
}

function nxs_widgets_formbox_getidentifier($metadata)
{
	extract($metadata);
	// remove any strange characters
	$formidentifier = nxs_stripspecialchars($formidentifier);
	if ($formidentifier == "")
	{
		$formidentifier = "default";
	}
	return $formidentifier;
}

function nxs_widgets_formbox_getpath($metadata)
{
	extract($metadata);
	// store submitted form on the filesystem or in the DB
	$shouldstoreonfs = true;
	if ($shouldstoreonfs)
	{		
		$storageabsfolder = nxs_widgets_formbox_getstorageabsfolder($metadata);

		// remove any strange characters
		$formidentifier = nxs_widgets_formbox_getidentifier($metadata);
		$fileextension = nxs_widgets_formbox_getstoragefileextension($metadata);
		$storagefilename = "{$formidentifier}.{$fileextension}";
		
		$storageabspath = $storageabsfolder . "/" . $storagefilename;
		if (!is_file($storageabspath))
		{
			// append header
			
			file_put_contents($storageabspath, "<?php header('HTTP/1.1 403 Unauthorized'); echo '403 Unauthorized'; exit; ?>This file is auto generated by Nexus Themes. It contains submitted form data.\r\n", FILE_APPEND | LOCK_EX);
			// set permissions to limited
			chmod($storageabspath, 0750);
		}
		
		$result = $storageabspath;
	}
	else
	{
		$result = "";
	}
	
	return $result;
}

function nxs_widgets_formbox_submittedforms($optionvalues, $args, $runtimeblendeddata) 
{
	ob_start();
	
	extract($optionvalues);

	$storageabspath = nxs_widgets_formbox_getpath($runtimeblendeddata);
	
	if ($storageabspath != "")
	{
		?>
		<div>
			Data of submitted forms are stored in the following file:<br />
			<pre><?php echo $storageabspath; ?></pre>
		</div>
		<?php
	}

	$fileextension = nxs_widgets_formbox_getstoragefileextension($runtimeblendeddata);
	$formidentifier = nxs_widgets_formbox_getidentifier($runtimeblendeddata);
 	$itemdetailurl = home_url('/') . "?nxs_admin=admin&backendpagetype=formdetail&formname=" . $formidentifier . "." . $fileextension;

	?>
    <div class="nxs-float-left" style="width: 100%;">
    	<a href='<?php echo $itemdetailurl;?>'>Open submitted forms</a>
    </div>		
    <div class="nxs-clear"></div>
  	<?php
	$result = ob_get_contents();
	ob_end_clean();
	return $result;
}

/* WIDGET STRUCTURE
----------------------------------------------------------------------------------------------------
----------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------- */

// Define the properties of this widget
function nxs_widgets_formbox_home_getoptions($args) 
{
	$options = array
	(
		"sheettitle" 		=> nxs_widgets_formbox_gettitle(),
		"sheeticonid" 		=> nxs_widgets_formbox_geticonid(),
		"sheethelp" 		=> nxs_l18n__("http://nexusthemes.com/form-box-widget/"),
		"unifiedstyling" 	=> array("group" => nxs_widgets_formbox_getunifiedstylinggroup(),),		
		"fields" 			=> array
		(
						
			// TITLE	
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> "Title",
				"initial_toggle_state"	=> "closed",
			),
			
			array(
				"id" 				=> "title",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Title", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Title goes here", "nxs_td"),
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
				"id" 				=> "top_info_color",
				"type" 				=> "colorzen",
				"label" 			=> nxs_l18n__("Top info color", "nxs_td"),
				"unistylablefield"	=> true
			),
			array(
				"id"     			=> "top_info_padding",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Top info padding", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("padding"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "icon",
				"type" 				=> "icon",
				"label" 			=> nxs_l18n__("Icon", "nxs_td"),
			),
			array(
				"id"     			=> "icon_scale",
				"type"     			=> "select",
				"label"    			=> nxs_l18n__("Icon scale", "nxs_td"),
				"dropdown"   		=> nxs_style_getdropdownitems("icon_scale"),
				"unistylablefield"	=> true
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),		
			
			// FORM CONFIGURATION
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Form configuration", "nxs_td"),
			),
			
			array(
				"id" 				=> "items_genericlistid",
				"type" 				=> "staticgenericlist_link",
				"tooltip" 			=> nxs_l18n__("Each form can have a custom set of input fields (text fields, dates, selections). Press the Edit button to the right to modify the fields used on this form.", "nxs_td"),
				"label" 			=> nxs_l18n__("Form fields", "nxs_td")
			),
			array(
				"id" 				=> "formidentifier",
				"type" 				=> "input",
				"label" 			=> "Identifier",
				"placeholder" 		=> "Title goes here",
				"tooltip" 			=> nxs_l18n__("Semantic and identifying name of this form. This identifies the container used to store submitted forms.", "nxs_td"),
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "internal_email",
				"type" 				=> "input",
				"label" 			=> "Email address to notify",
				"placeholder" 		=> "Internal email",
				"tooltip" 			=> nxs_l18n__("Enter here a valid existing e-mail address (most likely: your e-mail address) that should be notified when this form is submitted, for example yourname@yourdomain.com", "nxs_td"),
			),
			array(
				"id" 				=> "subject_email",
				"type" 				=> "input",
				"label" 			=> "Subject email",
				"placeholder" 		=> "Subject email",
				"tooltip" 			=> nxs_l18n__("Is there a particular subject you want to use for the notification e-mail? If so, enter it here (for example: information request from website)", "nxs_td"),
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "sender_email",
				"type" 				=> "input",
				"label" 			=> "Sender email",
				"placeholder" 		=> "Internal email",
				"tooltip" 			=> nxs_l18n__("Enter a valid e-mail address here to use as the sender of the notification mails (for example: site@yourname.com).", "nxs_td"),
			),
			array(
				"id" 				=> "sender_name",
				"type" 				=> "input",
				"label" 			=> "Sender name",
				"placeholder" 		=> "Name of email sender",
				"tooltip" 			=> nxs_l18n__("What should be the name of the sender of the notifications? (for example: Your Name)", "nxs_td"),
			),
			array(
				"id" 				=> "mail_body_includesourceurl",
				"type" 				=> "checkbox",
				"label" 			=> nxs_l18n__("Include form source URL", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("When checked, the source URL from where this form was posted will be included in the email send", "nxs_td"),
			),
			array(
				"id" 				=> "destination_articleid",
				"type" 				=> "article_link",
				"label" 			=> nxs_l18n__("Thank you page", "nxs_td"),
				"tooltip" 			=> nxs_l18n__("Use this to thank the visitor for taking the time to send an email by redirecting them to this page.", "nxs_td"),
			),
			array( 
				"id" 				=> "submittedforms",
				"type" 					=> "custom",
				"customcontenthandler"	=> "nxs_widgets_formbox_submittedforms",
				"label" 			=> nxs_l18n__("Forms", "nxs_td"),
			),
			
			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend"
			),		
			
			// BUTTON		
			
			array( 
				"id" 				=> "wrapper_begin",
				"type" 				=> "wrapperbegin",
				"label" 			=> nxs_l18n__("Button", "nxs_td"),
				"initial_toggle_state"	=> "closed",
			),

			array(
				"id" 				=> "button_text",
				"type" 				=> "input",
				"label" 			=> nxs_l18n__("Button text", "nxs_td"),
				"placeholder" 		=> nxs_l18n__("Read more", "nxs_td"),
				"localizablefield"	=> true
			),
			array(
				"id" 				=> "button_scale",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Button size", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("button_scale"),
				"unistylablefield"	=> true
			),
			array(
				"id" 				=> "button_alignment",
				"type" 				=> "select",
				"label" 			=> nxs_l18n__("Button alignment", "nxs_td"),
				"dropdown" 			=> nxs_style_getdropdownitems("button_halignment"),
				"unistylablefield"	=> true
			),
			array( 
				"id" 				=> "button_color",
				"type" 				=> "colorzen", // "select",
				"label" 			=> nxs_l18n__("Button color", "nxs_td"),
				"unistylablefield"	=> true
			),

			array( 
				"id" 				=> "wrapper_end",
				"type" 				=> "wrapperend",
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

function nxs_widgets_formbox_render_webpart_render_htmlvisualization($args) 
{	
	// Importing variables
	extract($args);
	
	// Every widget needs it's own unique id for all sorts of purposes
	// The $postid and $placeholderid are used when building the HTML later on
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	// Set options with unistyled params
	$unistyle = $temp_array["unistyle"];
	if (isset($unistyle) && $unistyle != "") {
		// blend unistyle properties
		$unistyleproperties = nxs_unistyle_getunistyleproperties(nxs_widgets_formbox_getunifiedstylinggroup(), $unistyle);
		$temp_array = array_merge($temp_array, $unistyleproperties);	
	}
	
	// The $mixedattributes is an array which will be used to set various widget specific variables (and non-specific).
	$mixedattributes = array_merge($temp_array, $args);
	
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
	
	// Setting the widget name variable to the folder name
	$widget_name = basename(dirname(__FILE__));

	global $nxs_global_row_render_statebag;
	global $nxs_global_placeholder_render_statebag;
		
	// Appending custom widget class
	$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-form ";
	
	
	
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */

	$structure = nxs_parsepoststructure($items_genericlistid);
	
	if ($button_text == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: no button text", "nxs_td");
	}
	
	if (!(isset($destination_articleid) && $destination_articleid != "" && $destination_articleid != 0)) 
	{
		$alternativemessage = nxs_l18n__("Minimal: destination article", "nxs_td");
	} 
	
	if ($internal_email == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: internal email is not set", "nxs_td");
	}
	else
	{
		// ensure its valid
		if (!nxs_isvalidemailaddress($internal_email))
		{
			$alternativemessage = nxs_l18n__("Warning: internal email is not filled with a valid email address", "nxs_td");
		}	
	}
	
	if ($sender_email == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: sender email is not set", "nxs_td");
	}
	else
	{
		// ensure its valid
		if (!nxs_isvalidemailaddress($sender_email))
		{
			$alternativemessage = nxs_l18n__("Warning: sender email is not filled with a valid email address", "nxs_td");
		}	
	}
	
	if ($sender_name == "") 
	{
		$alternativemessage = nxs_l18n__("Warning: sender name is not set", "nxs_td");
	}
	
	if (count($structure) == 0) {
		$alternativemessage = nxs_l18n__("Warning:no items found", "nxs_td");
	}
		
	$button_scale_cssclass = nxs_getcssclassesforlookup("nxs-button-scale-", $button_scale);
	$button_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $button_alignment);
	$button_color_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $button_color);
	
	$invoke = "nxs_js_lazyexecute('/nexuscore/widgets/formbox/js/formbox.js', true, 'nxs_js_formbox_send(" .  $postid . ", &quot;" . $placeholderid . "&quot;);');";

	// Button
	$htmlbutton = '
	<p class="' . $button_alignment_cssclass . '">
		<a id="' . $placeholderid . '_button" 
			class="nxs-button ' . $button_color_cssclass . ' ' . $button_scale_cssclass . '" 
			href="#" 
			onclick="' . $invoke . '; return false;">' 
			. $button_text . ' 
		</a>
	</p>';
	
	/* EXPRESSIONS
	---------------------------------------------------------------------------------------------------- */

	$shouldrenderalternative = false;
	
	/*
	if ($someinvalidcondition)
	{
		$shouldrenderalternative = true;
		$alternativehint = nxs_l18n__("Some error message", "nxs_td");
	}
	*/
	
	/* TITLE
	---------------------------------------------------------------------------------------------------- */
	
	// Title heading
	if ($title_heading != "") {
		$title_heading = "h" . $title_heading;	
	} else {
		$title_heading = "h1";
	}

	// Title alignment
	$title_alignment_cssclass = nxs_getcssclassesforlookup("nxs-align-", $title_alignment);
	
	if ($title_alignment == "center") { $top_info_title_alignment = "margin: 0 auto;"; } else
	if ($title_alignment == "right")  { $top_info_title_alignment = "margin-left: auto;"; } 
	
	// Title fontsize
	$title_fontsize_cssclass = nxs_getcssclassesforlookup("nxs-head-fontsize-", $title_fontsize);

	// Title height (across titles in the same row)
	// This function does not fare well with CSS3 transitions targeting "all"
	$heightiqprio = "p1";
	$title_heightiqgroup = "title";
  	$titlecssclasses = $title_fontsize_cssclass;
	$titlecssclasses = nxs_concatenateargswithspaces($titlecssclasses, "nxs-heightiq", "nxs-heightiq-{$heightiqprio}-{$title_heightiqgroup}");
	
	// Top info padding and color
	$top_info_color_cssclass = nxs_getcssclassesforlookup("nxs-colorzen-", $top_info_color);
	$top_info_padding_cssclass = nxs_getcssclassesforlookup("nxs-padding-", $top_info_padding);
	
	// Icon scale
	$icon_scale_cssclass = nxs_getcssclassesforlookup("nxs-icon-scale-", $icon_scale);
		
	// Icon
	if ($icon != "") {$icon = '<span class="'.$icon.' '.$icon_scale_cssclass.'"></span>';}
	
	// Title
	$titlehtml = '<'.$title_heading.' class="nxs-title '.$title_alignment_cssclass.' '.$title_fontsize_cssclass.' '.$titlecssclasses.'">'.$title.'</'.$title_heading.'>';	
	
	// Filler
	$htmlfiller = nxs_gethtmlforfiller();
	

	/* OUTPUT
	---------------------------------------------------------------------------------------------------- */
	
	if ($alternativemessage != "" && $alternativemessage != null)
	{
		nxs_renderplaceholderwarning($alternativemessage);
	} 
	else 
	{
		?>
		<script type='text/javascript'>
			// opens a form thumbnail in a lightbox
			function nxs_js_openformitemlightbox(element)
			{
				if (nxs_js_popup_anyobjectionsforopeningnewpopup())
				{
					// opening a new popup is not allowed; likely some other popup is already opened
					return;
				}
				
				var formitem = jQuery(element).closest(".nxs-formitem")[0];
				//nxs_js_log("formitem:");
				//nxs_js_log(formitem);
				var formitemid = formitem.id;	// bijv. nxs-formitem-{formid}-{index}-{imageid}
				var formid = formitemid.split("-")[2];
				var index = formitemid.split("-")[3];
				var imageid = formitemid.split("-")[4];
				
				// initiate a new popupsession data as this is a new session
				nxs_js_popupsession_startnewcontext();
				
				// move formbox sheet implementation to seperate file, not in site.php
				nxs_js_popup_setsessioncontext("popup_current_dimensions", "formbox");
				nxs_js_popup_setsessioncontext("contextprocessor", "formbox");
				nxs_js_popup_setsessioncontext("formid", formid);
				nxs_js_popup_setsessioncontext("imageid", imageid);
				nxs_js_popup_setsessioncontext("index", '' + index + '');
			
				// show the popup
				nxs_js_popup_navigateto("detail");
			}
		</script>
		
		<?php
		
		if ($icon == "" && $title == "")
		{
			// nothing to show
		}		
		else if (($top_info_padding_cssclass != "") || ($icon != "") || ($top_info_color_cssclass != "")) {
			 
			// Icon title
			echo '
			<div class="top-wrapper nxs-border-width-1-0 '.$top_info_color_cssclass.' '.$top_info_padding_cssclass.'">
				<div class="nxs-table" style="'.$top_info_title_alignment.'">';
				
					// Icon
					echo $icon;
					
					// Title
					if ($title != "")
					{
						echo $titlehtml;
					}
					echo '
				</div>
			</div>';
		
		} else {
		
			// Default title
			if ($title != "")
			{
				echo $titlehtml;
			}
		
		}
		
		if ($title != "" || $icon != "") { 
			echo $htmlfiller; 
		}
		
		echo "<div class='nxs-form'>";
		
		$index = -1;
		foreach ($structure as $pagerow)
		{
			$index = $index + 1;
			$rowcontent = $pagerow["content"];
			$currentplaceholderid = nxs_parsepagerow($rowcontent);
			$currentplaceholdermetadata = nxs_getwidgetmetadata($items_genericlistid, $currentplaceholderid);
			$widget = $currentplaceholdermetadata["type"];
			
			if ($widget != "" && $widget != "undefined")
			{
				$requirewidgetresult = nxs_requirewidget($widget);
			 	if ($requirewidgetresult["result"] == "OK")
			 	{
			 		// now that the widget is loaded, instruct the widget to register the needed hooks
			 		// if it has some
			 		$hookargs = array();
			 		$hookargs["postid"] = $postid;
			 		$hookargs["placeholderid"] = $placeholderid;
			 		$hookargs["metadata"] = $currentplaceholdermetadata;
			 		
			 		$subresult = nxs_widgets_renderinformbox($widget, $hookargs);
			 		if ($subresult["result"] == "OK")
			 		{
			 			// append subresult to the overall result
			 			echo $subresult["html"];
			 		}
			 		else
			 		{
			 			echo "[warning, widget found, but returned an error?]";
			 			var_dump($subresult);
			 		}
			 	}
			 	else
			 	{
			 		// 
			 		echo "[warning, widget not found?]";
			 	}
			}
			else
			{
				// empty widget is ignored
			}
		}
		
		echo $htmlfiller;
		echo $htmlbutton;
		
		echo "</div>";	// end of nxs-form
		
		echo "<div class='nxs-clear'></div>";
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

/* INITIATING WIDGET DATA
----------------------------------------------------------------------------------------------------*/
function nxs_widgets_formbox_initplaceholderdata($args)
{
	// delegate to generic implementation
	$widgetname = basename(dirname(__FILE__));
	
	// create a new generic list with subtype form
	// assign the newly create list to the list property
	
	$subargs = array();
	$subargs["nxsposttype"] = "genericlist";
	$subargs["nxssubposttype"] = "form";	// NOTE!
	$subargs["poststatus"] = "publish";
	$subargs["titel"] = nxs_l18n__("form items", "nxs_td");
	$subargs["slug"] = $subargs["titel"];
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
	
	global $current_user;
	get_currentuserinfo();
	
	// Title
	$args["title_heading"] = "2";			
	
	// Form
	$args["internal_email"] = "dummy@dummyaddress.com"; // $current_user->user_email;
	$args["sender_email"] = "dummy@dummyaddress.com";
	$args["sender_name"] = "Website name";
	$args['mail_body_includesourceurl'] = "true";
	$args["subject_email"] = nxs_l18n__("form submit", "nxs_td");
		
	// Button
	$args["button_text"] = nxs_l18n__("Send", "nxs_td");
	$args["button_color"] = "base2";
	$args["button_scale"] = "1-4";
	$args["button_alignment"] = "left";
	
	$args["formidentifier"] = "default";
	
	// current values as defined by unistyle prefail over the above "default" props
	$unistylegroup = nxs_widgets_formbox_getunifiedstylinggroup();
	$args = nxs_unistyle_blendinitialunistyleproperties($args, $unistylegroup);
	
	$result = nxs_widgets_initplaceholderdatageneric($args, $widgetname);
	return $result;
}

?>
