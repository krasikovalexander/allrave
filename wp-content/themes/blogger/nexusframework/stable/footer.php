<?php
	global $post;
	$postid = $post->ID;
	$meta = nxs_get_postmeta($postid);
	
	$iswidescreen = nxs_iswidescreen("footer");
	if ($iswidescreen)
	{
		$widescreenclass = "nxs-widescreen";
	}
	else
	{
		$widescreenclass = "";
	}
?>
			<div id="nxs-footer" class="nxs-containsimmediatehovermenu nxs-sitewide-element <?php echo $widescreenclass; ?>">
			  <div id="nxs-footer-container" class="nxs-sitewide-container">
					<?php 
						if (nxs_hastemplateproperties())
						{
							// derive the layout
							$templateproperties = nxs_gettemplateproperties();
							if ($templateproperties["result"] == "OK")
							{
								$existingfooterid = $templateproperties["footer_postid"];
							}
							else
							{
								$existingfooterid = 0;
							}
						}
						else
						{
							$existingfooterid = $meta["footer_postid"];
						}
						
						if ($existingfooterid != "")
						{
							echo nxs_getrenderedhtmlincontainer($postid, $existingfooterid, "anonymous");
						}
					?>
			  </div>
			</div> <!-- end #nxs-footer -->	
		</div> <!-- end #nxs-container -->	
		<?php get_template_part('includes/scripts'); ?>
		<?php wp_footer(); ?>
	</body>
</html>