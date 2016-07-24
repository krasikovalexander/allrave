<?php

function nxs_widgets_undefined_geticonid()
{
	$widget_name = basename(dirname(__FILE__));
	return "nxs-icon-" . $widget_name;
}

function nxs_widgets_undefined_gettitle()
{
	return nxs_l18n__("Empty[nxs:widgettitle]", "nxs_td");
}

// rendert de placeholder zoals deze uiteindelijk door een gebruiker zichtbaar is,
// hierbij worden afhankelijk van de rechten ook knoppen gerenderd waarmee de gebruiker
// het bewerken van de placeholder kan opstarten
function nxs_widgets_undefined_render_webpart_render_htmlvisualization($args)
{
	//
	extract($args);
		
	$result = array();
	$result["result"] = "OK";
	
	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);
	
	$mixedattributes = array_merge($temp_array, $args);
	
	$hovermenuargs = array();
	$hovermenuargs["postid"] = $postid;
	$hovermenuargs["placeholderid"] = $placeholderid;
	$hovermenuargs["placeholdertemplate"] = $placeholdertemplate;
	$hovermenuargs["enable_deletewidget"] = false;
	$hovermenuargs["enable_deleterow"] = false;
	$hovermenuargs["metadata"] = $mixedattributes;
	nxs_widgets_setgenericwidgethovermenu_v2($hovermenuargs);
	
	//
	// render actual control / html
	//
	
	ob_start();

	$nxs_global_placeholder_render_statebag["widgetclass"] = "nxs-undefined";

	?>

	<?php
	if (nxs_has_adminpermissions())
	{
		// we zetten de hoogte default op x pixels, alhoewel de programmatuur de hoogte opnieuw zal bepalen,
		// de hoogte die we hier hard zetten bepaalt de minimale hoogte die een undefined placeholder inneemt
		// dit gebeurt ook in de frontendediting.php; die bepaalt de hoogte in ieder geval,
		// het is nog niet helemaal duidelijk of de hoogte die hier wordt gezet noodzakelijk is, c.q. toegevoegde
		// waarde
		?>
	 
		<!-- -->
		<div class="empty nxs-runtime-autocellsize">
			<div class="nxs-border-dash nxs-runtime-autocellsize absolute border-radius autosize-smaller" style="left: 0; right: 0; top: 0; bottom: 0;">
			</div>
		</div>			
		
		<?php
	} 
	else 
	{
	?>
		<!-- empty -->
	<?php
	}
	?>
	
	<?php 
	
	$html = ob_get_contents();
	ob_end_clean();

	$result["html"] = $html;	
	$result["replacedomid"] = 'nxs-widget-' . $placeholderid;
	
	return $result;
}

//
// het eerste /hoofd/ scherm dat wordt getoond in de popup als de gebruiker
// het editen van een placeholder initieert
//
function nxs_widgets_undefined_home_rendersheet($args)
{
	$clientpopupsessiondata = array();	// could be overriden in $args
	$clientshortscopedata = array();	// could be overriden in $args
	
	//
	extract($args);

	$temp_array = nxs_getwidgetmetadata($postid, $placeholderid);

	$type = $temp_array['type'];

	// clientpopupsessiondata bevat key values van de client side, deze overschrijven reeds bestaande variabelen
	extract($clientpopupsessiondata);
	extract($clientshortscopedata);
	
	//
	//
	//
	if ($type == "")
	{
		$istypeset = false;
	}
	else
	{
		$istypeset = true;
	}	
			
	$result = array();
	$result["result"] = "OK";
	
	ob_start();
	
	//
	$pagedata = get_page($postid);
	$nxsposttype = nxs_getnxsposttype_by_wpposttype($pagedata->post_type);
	
	$posttype = $pagedata->post_type;
	$postmeta = nxs_get_postmeta($postid);
	$pagetemplate = nxs_getpagetemplateforpostid($postid);
	
	$phtargs = array();
	$phtargs["invoker"] = "nxsextundefined";
	$phtargs["wpposttype"] = $posttype;
	$phtargs["nxsposttype"] = nxs_getnxsposttype_by_wpposttype($posttype);
	$phtargs["pagetemplate"] = $pagetemplate;
	$widgets = nxs_getwidgets_v2($phtargs, true);
	
	// filter out obsolete widgets
	
	?>
	
	<div class="nxs-admin-wrap">
		<div class="block">	

     	<?php nxs_render_popup_header(nxs_l18n__("Select a widget[nxs:tooltip]", "nxs_td")); ?>

			<div class="nxs-popup-content-canvas-cropper" style="width: 900px;"> <!-- explicit max width -->
				<div class="nxs-popup-content-canvas">
		
		      <div class="content2">
		        <div class="box nxs-linkcolorvar-base2-m">
		          <ul class="placeholder3 nxs-applylinkvarcolor">
								<?php
									// for each placeholder -->
									foreach ($widgets as $currentwidget)
									{
										$title = $currentwidget["title"];
										$abbreviatedtitle = $title;
										
										$breakuplength = 12;
										if (strlen($abbreviatedtitle) > $breakuplength)
										{
											if (!nxs_stringcontains($abbreviatedtitle, " "))
											{
												// te lang...
												$abbreviatedtitle = substr($abbreviatedtitle, 0, $breakuplength - 1) . "-" . substr($abbreviatedtitle, $breakuplength - 1);
											}
										}
										
										$maxlength = 14;
										if (strlen($abbreviatedtitle) > $maxlength)
										{
											// chop!
											$abbreviatedtitle = substr($abbreviatedtitle, 0, $maxlength - 1) . "..";
										}
										
										$widgetid = $currentwidget["widgetid"];
										$iconid = nxs_getwidgeticonid($widgetid);
										?>
										<a href="#" onclick="selectplaceholdertype(this, '<?php echo $widgetid; ?>'); return false;">
											<li>
												<?php
												if (isset($iconid) && $iconid != "")
												{
													?>
													<span class='nxs-widget-icon <?php echo $iconid; ?>'></span>
													<p title='<?php echo $title; ?>'><?php echo $abbreviatedtitle; ?></p>
													<?php
												}
												else
												{
													$iconid = nxs_getplaceholdericonid($widgetid);
													?>
													<span id='placeholdertemplate_<?php echo $widgetid; ?>' class='<?php echo $iconid; ?>'></span>
													<p title='<?php echo $title; ?>'><?php echo $abbreviatedtitle; ?></p>
													<?php
												}
												?>
											</li>
										</a>
										<?php
									}
								?>
		        	</ul>
		        </div>
		        <div class="nxs-clear"></div>
		      </div>
		      
		      <?php
		      	$defaultmessagedata = array();
						$defaultmessagedata["html"] = "<div class='content2'>Message 10987098273</div>";
						$additionalparameters = array();
						
						$postmeta = nxs_get_postmeta($postid);
						$pagetemplate = nxs_getpagetemplateforpostid($postid);
						
						// posttype en pagetemplate ook meesturen
						$additionalparameters["pagetemplate"] = $pagetemplate;
						$additionalparameters["wpposttype"] = $pagedata->post_type;
						
						$messagedata = nxs_gettransientnexusservervalue("widgets", "undefined", $additionalparameters);
						echo $messagedata["html"];
		      ?>
		      
		    </div>
		  </div>
      
      <div class="content2">
         <div class="box">
            <a id='nxs_popup_genericsavebutton' href='#' class="nxsbutton nxs-float-right" onclick='nxs_js_savegenericpopup(); return false;'><?php nxs_l18n_e("Save[nxs:button]", "nxs_td"); ?></a>
            <a id='nxs_popup_genericokbutton' href='#' class="nxsbutton nxs-float-right" onclick='nxs_js_closepopup_unconditionally_if_not_dirty(); return false;'><?php nxs_l18n_e("OK[nxs:button]", "nxs_td"); ?></a>
            <a id='nxs_popup_genericcancelbutton' href='#' class="nxsbutton2 nxs-float-right" onclick='nxs_js_closepopup_unconditionally_if_not_dirty(); return false;'><?php nxs_l18n_e("Cancel[nxs:button]", "nxs_td"); ?></a>
         </div>
         <div class="nxs-clear"></div>
      </div> <!--END content-->
    	
    </div>
  </div>
	
	<script type='text/javascript'>
		
		function selectplaceholdertype(obj, placeholdertype)
		{
			jQuery('.placeholder-selected').css('background-color', ''); 
			jQuery('.placeholder-selected').removeClass('placeholder-selected');
			jQuery(obj).find('li').css('background-color', '#E9F1F9'); 
			jQuery(obj).find('li').addClass('placeholder-selected');
			
			nxs_js_popup_setsessiondata("type", placeholdertype);
			// nxs_js_popup_sessiondata_make_dirty();
			// auto save
			nxs_js_savegenericpopup();
		}
		
		function nxs_js_savegenericpopup()
		{
			var waitgrowltoken = nxs_js_alert_wait_start("<?php nxs_l18n_e("Storing widget[nxs:growl]","nxs_td"); ?>");
			
			var ajaxurl = nxs_js_get_adminurladminajax();
			jQuery.ajax
			(
				{
					type: 'POST',
					data: 
					{
						"action": "nxs_ajax_webmethods",
						"webmethod": "initplaceholderdata",
						"clientpopupsessioncontext": nxs_js_getescaped_popupsession_context(),
						"placeholderid": "<?php echo $placeholderid;?>",
						"postid": "<?php echo $postid;?>",
						"containerpostid": nxs_js_getcontainerpostid(),
						"placeholdertemplate": nxs_js_popup_getsessiondata("type"),
						"type": nxs_js_popup_getsessiondata("type")
					},
					dataType: 'JSON',
					url: ajaxurl, 
					success: function(response) 
					{
						nxs_js_alert_wait_finish(waitgrowltoken);
						nxs_js_log(response);
						if (response.result == "OK")
						{
							// TODO: make function for the following logic... its used multiple times...
							// update the DOM
							var rowindex = response.rowindex;
							var rowhtml = response.rowhtml;
							var pagecontainer = jQuery(".nxs-layout-editable.nxs-post-<?php echo $postid;?>");
							var pagerowscontainer = jQuery(pagecontainer).find(".nxs-postrows")[0];
							var element = jQuery(pagerowscontainer).children()[rowindex];
							jQuery(element).replaceWith(rowhtml);
							
							// update the GUI step 1
							// invoke execute_after_clientrefresh_XYZ for each widget in the affected first row, if present
							var container = jQuery(pagerowscontainer).children()[rowindex];
							nxs_js_notify_widgets_after_ajaxrefresh(container);
							// update the GUI step 2
							nxs_js_reenable_all_window_events();
							
							// growl!
							nxs_js_alert(response.growl);
							
							// ----------------
							nxs_js_popupsession_data_clear();
							
							// open new popup
							nxs_js_popup_placeholder_neweditsession("<?php echo $postid; ?>", "<?php echo $placeholderid; ?>", "<?php echo $rowindex; ?>", "home"); 
						}
						else
						{
							nxs_js_popup_notifyservererror();
							nxs_js_log(response);
						}
					},
					error: function(response)
					{
						nxs_js_alert_wait_finish(waitgrowltoken);
						nxs_js_popup_notifyservererror();
						nxs_js_log(response);
					}										
				}
			);
		}
	</script>
	
	<?php
	
	$html = ob_get_contents();
	ob_end_clean();

	$result["html"] = $html;
	
	return $result;
}

function nxs_widgets_undefined_initplaceholderdata($args)
{
	nxs_widgets_undefined_updateplaceholderdata($args);

	$result = array();
	$result["result"] = "OK";
	
	return $result;
}

//
// wordt aangeroepen bij het opslaan van data van deze placeholder
//
function nxs_widgets_undefined_updateplaceholderdata($args)
{
	extract($args);
	
	$temp_array = array();
	
	$temp_array['type'] = "undefined";
	
	nxs_mergewidgetmetadata_internal($postid, $placeholderid, $temp_array);

	$result = array();
	$result["result"] = "OK";
	
	return $result;
}

?>