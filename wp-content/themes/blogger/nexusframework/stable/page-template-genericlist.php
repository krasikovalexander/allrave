<?php	
	global $post;
	$postid = $post->ID;

	// process meta data
	$meta = nxs_get_postmeta($postid);
	$nxssubposttype = nxs_get_nxssubposttype($postid);
	//
	//
	//
	nxs_getheader("genericlist");
	
	$page_title = get_the_title();
	
	?>
	
  <div id="wrap-header">
    <h2><span class="nxs-icon-genericlist-<?php echo $nxssubposttype; ?>"></span><?php 
    	if ($page_title == "")
    	{
    		nxs_l18n_e("Generic list[nxs:heading]", "nxs_td");
    	}
    	else
    	{
    		echo $page_title;
    	}
    	?></h2>
  </div>
  <div>
    <a class='nxsbutton1 nxs-float-left' title="<?php nxs_l18n_e("Edit title[nxs:post,tooltip]", "nxs_td"); ?>" href="#" onclick="nxs_js_popup_page_neweditsession('<?php echo $postid;?>', 'edittitle'); return false;"><?php nxs_l18n_e("Edit title[nxs:newrow,button]", "nxs_td"); ?></li></a>
  	<div class='nxs-clear'></div>
  </div>
  <div class="nxs-clear">&nbsp;</div>

	<!-- note, the widescreen setting of the genericlist page is not configurable (its an admin page) -->
	<div id="nxs-content" class="nxs-containsimmediatehovermenu nxs-sitewide-element">
    <div class="block">
    	<!--
      <div class="nxs-admin-header">
          <h3 class="nxs-width20 nxs-float-left"><?php nxs_l18n_e("Image[nxs:heading]", "nxs_td"); ?></h3>
	        <h3 class="nxs-width30 nxs-float-left"><?php nxs_l18n_e("Title[nxs:heading]", "nxs_td"); ?></h3>
	        <h3 class="nxs-width50 nxs-float-left"><?php nxs_l18n_e("Text[nxs:heading]", "nxs_td"); ?></h3>
	        <div class="nxs-clear"></div>
      </div>      
      <div class="nxs-clear"></div>
      -->
	
			<div class='nxs-genericlist-container nxs-elements-container nxs-layout-editable nxs-widgets-editable nxs-post-<?php echo $postid; ?>'>
				<?php 
	        // render the actual page contents (page rows)
	        echo nxs_getrenderedhtml($postid, "default");
				?>
        <div class="nxs-clear"></div>
			</div>			
		
	    <div class="content2">
	    	<div class="box">
					<?php nxs_render_backbutton(); ?>
					<a class="nxsbutton1 nxs-float-left clear" href="#" onclick="nxs_js_popup_page_neweditsession('<?php echo $postid;?>', 'dialogappendgenericlistitem'); return false;"><?php nxs_l18n_e("Add[nxs:heading]", "nxs_td"); ?></a>
				</div>
				<div class="nxs-clear margin"></div>
			</div>
			
		</div>
	</div>
	
	<?php
				
	nxs_getfooter("admin"); 
?>