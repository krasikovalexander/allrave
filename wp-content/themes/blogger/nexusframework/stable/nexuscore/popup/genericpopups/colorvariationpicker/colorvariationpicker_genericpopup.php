<?php
function nxs_popup_genericpopup_colorvariationpicker_getactiveclass($a, $b)
{
	if ($a == $b)
	{
		$result = "active";
	}
	else
	{
		$result = "none";
	}
	
	return $result;
}

function nxs_popup_genericpopup_colorvariationpicker_getpopup($args)
{
	// initial values, can/will be overridden by the extracts below
	$nxs_colorvariationpicker_sampletext = nxs_l18n__("Sample", "nxs_td");
	$nxs_colorvariationpicker_scope = "link";

	extract($args);
	
	// clientpopupsessiondata bevat key values van de client side
	// deze overschrijft met opzet (tijdelijk) mogelijk waarden die via $args
	// zijn meegegeven; hierdoor kan namelijk een 'gevoel' worden gecreeerd
	// van een 'state' die client side leeft, die helpt om meerdere (popup) 
	// pagina's state te laten delen. De inhoud van clientpopupsessiondata is een
	// array die wordt gevoed door de clientside variabele "popupsessiondata",
	// die gedefinieerd is in de file 'frontendediting.php'
	extract($clientpopupsessiondata);	
	extract($clientshortscopedata);

	
	$result = array();
	$result["result"] = "OK";
	
	ob_start();
	
	$padding = "";
	
	?>
	
	<div class="nxs-admin-wrap">
		<div class="block">
			<?php nxs_render_popup_header(nxs_l18n__("Color variation picker", "nxs_td")); ?>
			<div class="nxs-popup-content-canvas-cropper">
				<div class="nxs-popup-content-canvas">
					
					<div class="content2">
						<div class="box">
							<div class="box-title">
								<h4>Available colors</h4>
							</div>
							<div class="box-content">
								<ul>
									<?php
									$variations = array("dd", "d", "m", "l", "ll");
									foreach($variations as $currentvariation)
									{
										?>
										<li class="nxs-clear"></li>
										<?php
										
										$currentsubtype = "2";
										$colortypes = nxs_getcolorsinpalette();
										foreach($colortypes as $currentcolortype)
										{
											/*
											if ($currentcolortype == "base")
											{
												// skip!
												continue;
											}
											*/
											$identification = $currentcolortype . $currentsubtype . "-" . $currentvariation;
											$activeclass = nxs_popup_genericpopup_colorvariationpicker_getactiveclass($nxs_colorvariationpicker_currentvalue, $identification);
											
											?>
											<li onclick='nxs_js_selectcolorvariationitem("<?php echo $identification;?>"); return false;' class='nxs-float-left'>
												<?php
												if ($nxs_colorvariationpicker_scope == "link")
												{
													?>
													<div class="nxs-linkcolorvar-<?php echo $identification; ?> <?php echo $padding;?> border-radius-small color-sample <?php echo $activeclass; ?>">
														<p class="nxs-applylinkvarcolor"><a href='#'><?php echo $nxs_colorvariationpicker_sampletext; ?></a></p>
													</div>
													<?php
												}
												else if ($nxs_colorvariationpicker_scope == "background")
												{
													?>
													<div class="nxs-linkcolorvar-<?php echo $identification; ?> <?php echo $padding;?> border-radius-small color-sample <?php echo $activeclass; ?>">
														<p class="nxs-applylinkvarcolor">
															<a href='#'>
																<span style='font-size: 50px;'>&#9608;</span> 
															</a>
														</p>
													</div>
													<?php
												}
												else
												{
													?>
													<div><p>unsupported</p></div>
													<?php
												}
												?>
											</li>
											<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
						<div class="nxs-clear"></div>
					</div> <!-- END content -->
					
				</div> <!-- END nxs-popup-content-canvas -->
			</div> <!-- END nxs-popup-content-canvas-cropper -->
	
			<div class="content2">
				<div class="box">
					<a id='nxs_popup_genericcancelbutton' href='#' class="nxsbutton nxs-float-right" onclick='nxs_js_popup_navigateto("<?php echo $nxs_colorvariationpicker_invoker; ?>"); return false;'><?php nxs_l18n_e("Back", "nxs_td"); ?></a>
					<?php 
					if ($nxs_colorvariationpicker_currentvalue != "") 
					{
						?>
						<a id='nxs_popup_genericcancelbutton' href='#' class="nxsbutton1 nxs-float-right" onclick='nxs_js_selectcolorvariationitem(""); return false;'><?php nxs_l18n_e("No color", "nxs_td"); ?></a>
						<?php
					}
					?>
				</div>
				<div class="nxs-clear"></div>
			</div> <!-- END content -->
		</div> <!-- END block -->
	</div> <!-- END nxs-admin-wrap -->
	
	<script type='text/javascript'>
	
		function nxs_js_selectcolorvariationitem(item) 
		{
			nxs_js_popup_setsessiondata("<?php echo $nxs_colorvariationpicker_targetvariable; ?>", item);
			nxs_js_popup_sessiondata_make_dirty();
			// toon eerste scherm in de popup
			nxs_js_popup_navigateto("<?php echo $nxs_colorvariationpicker_invoker; ?>");
		}
	
	</script>
	<?php

	// Setting the contents of the output buffer into a variable and cleaning up te buffer
  $html = ob_get_contents();
  ob_end_clean();
    
  // Setting the contents of the variable to the appropriate array position
  // The framework uses this array with its accompanying values to render the page
  $result["html"] = $html;
  return $result;
}
?>