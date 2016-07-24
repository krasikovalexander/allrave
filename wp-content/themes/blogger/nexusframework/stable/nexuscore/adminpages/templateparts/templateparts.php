<?php

	require_once(NXS_FRAMEWORKPATH . '/nexuscore/includes/nxsfunctions.php');
	require_once(NXS_FRAMEWORKPATH . '/nexuscore/includes/frontendediting.php');
	
	extract($_GET);
?>

	<script type='text/javascript'>
		function handleMultiAction(actionValue)
		{
			if (actionValue == "-1")
			{
				nxs_js_alert("<?php nxs_l18n_e("First select an action to perform[nxs:button]", "nxs_td"); ?>");
				return;
			}
			var checkedRijen = jQuery('.multiselector.page:checked');
			var count = checkedRijen.length;
			if (count == 0)
			{
				nxs_js_alert("<?php nxs_l18n_e("First select one or more rows[nxs:button]", "nxs_td"); ?>");
			}
			else
			{
				if (actionValue == 'trash')
				{
					// geen expliciete bevestiging aangezien het item nog gestored kan worden.
					jQuery(checkedRijen).each(function(i)
					{
						var postid = this.id.split("_")[1];
						nxs_js_trash_article(postid);
					});
					// alle items zijn getrashed, refresh screen...
					nxs_js_refreshcurrentpage();
				}
				else if (actionValue == 'restore')
				{
					jQuery(checkedRijen).each(function(i)
					{
						var postid = this.id.split("_")[1];
						nxs_js_restore_article(postid);
					});
					// alle items zijn getrashed, refresh screen...
					nxs_js_refreshcurrentpage();
				}
				else if (actionValue == 'delete')
				{
					var answer = confirm("<?php nxs_l18n_e("Are you sure you want to delete all selected items?[nxs:confirm]", "nxs_td"); ?>");
					if (answer)
					{
						jQuery(checkedRijen).each(function(i)
						{
							var postid = this.id.split("_")[1];
							nxs_js_delete_article(postid);
						});
						// alle items zijn verwijderd, refresh screen...
						nxs_js_refreshcurrentpage();
					}
					else
					{
						// toch niet
					}
				}
				else
				{
					alert("deze actie is nog niet ondersteund;" + actionValue);
				}
			}
			
		}
	</script>

<?php	
	if ($post_status == "")
	{
		$post_status = "publish";
	}
	if ($order_by == "")
	{
		$order_by = "post_date";
	}
	if ($order == "")
	{
		$order = "DESC";
	}

	$posttypes = array();
	if ($filter_types == "" || $filter_types == "header")
	{ 
		$posttypes[] = "nxs_header";
	}
	if ($filter_types == "" || $filter_types == "subheader")
	{ 
		$posttypes[] = "nxs_subheader";
	}
	if ($filter_types == "" || $filter_types == "sidebar")
	{ 
		$posttypes[] = "nxs_sidebar";
	}
	if ($filter_types == "" || $filter_types == "subfooter")
	{ 
		$posttypes[] = "nxs_subfooter";
	}
	if ($filter_types == "" || $filter_types == "footer")
	{ 
		$posttypes[] = "nxs_footer";
	}
	if ($filter_types == "" || $filter_types == "content")
	{ 
		$posttypes[] = "nxs_templatepart";
	}

	// published pages
	$publishedargs = array();
	// excluding: "auto-draft", 
	$publishedargs["post_status"] = array("inherit", "private", "pending", "draft", "publish", "future");
	$publishedargs["post_type"] = $posttypes;
	$publishedargs["orderby"] = "post_date";//$order_by;
	$publishedargs["order"] = "DESC"; //$order;
	$publishedargs["numberposts"] = -1;	// allemaal!
	
	// published combined
	$publishedpages = get_posts($publishedargs);
  $publishedpagescount = count($publishedpages);
  
  //
  //
  //
  
  $posttypes = array();
	$posttypes[] = "nxs_header";
	$posttypes[] = "nxs_subheader";
	$posttypes[] = "nxs_sidebar";
	$posttypes[] = "nxs_subfooter";
	$posttypes[] = "nxs_footer";
	$posttypes[] = "nxs_templatepart";
	
	// trashed posts
	$publishedargs = array();
	$publishedargs["post_status"] = "trash";
	$publishedargs["post_type"] = $posttypes;
	$publishedargs["orderby"] = "post_date";//$order_by;
	$publishedargs["order"] = "DESC"; //$order;
	$publishedargs["numberposts"] = -1;	// allemaal!

	// trashed combined
	$trashedpages = get_posts($publishedargs);
  $trashedpagescount = count($trashedpages);

	if ($post_status == "publish")
	{
		$showpages = $publishedpages;
	}
	else if ($post_status == "trash")
	{
		$showpages = $trashedpages;
	}
	else
	{
		$showpages = $publishedpages;
	}
	
	if ($pagingrowsperpage == "")
	{
		$pagingrowsperpage = 999;
	}
	if ($pagingcurrentpage == "")
	{
		$pagingcurrentpage = 1;
	}
		
	// apply any additional filters
	
// apply paging logic
	$totalrows = count($showpages);
	$pagingtotalpages = ceil($totalrows / $pagingrowsperpage);

	if ($pagingcurrentpage > $pagingtotalpages)
	{
		$pagingcurrentpage = 1;
	}
	
	$pagingrowstart = (($pagingcurrentpage - 1) * $pagingrowsperpage) + 1;	// bijv. 1
	$pagingrowend = $pagingcurrentpage * $pagingrowsperpage;								// bijv. 10

	?>
	<form id='theform' method="get">
		<div id="wrap-header">
            <h2><span class="nxs-icon-article-overview"></span><?php nxs_l18n_e("Template parts", "nxs_td"); ?></h2>
            <div class="nxs-clear padding"></div>
            <ul class="nxs-float-left meta">
                <li><a href="#" onclick="jQuery('#post_status').val('publish'); jQuery('#theform').submit(); return false;"><span><?php nxs_l18n_e("Published[nxs:adminpage,linkbutton]", "nxs_td"); ?>&nbsp;(<?php echo $publishedpagescount; ?>)</span></a>|</li> 
                <li><a href="#" onclick="jQuery('#post_status').val('trash'); jQuery('#theform').submit(); return false;"><span><?php nxs_l18n_e("Recycled[nxs:adminpage,linkbutton]", "nxs_td"); ?>&nbsp;(<?php echo $trashedpagescount; ?>)</span></a></li>           	
            </ul>
            <div class="nxs-clear padding"></div>
            
						<div class="nxs-float-left actions">
			    		<select id='filter_types_picker' name="filter_types_picker">
			    			<option value="" <?php if ($filter_types == "") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("All", "nxs_td"); ?></option>
			    			<option value="header" <?php if ($filter_types == "header") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Headers only", "nxs_td"); ?></option>
			    			<option value="subheader" <?php if ($filter_types == "subheader") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Subheaders only", "nxs_td"); ?></option>
			    			<option value="sidebar" <?php if ($filter_types == "sidebar") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Sidebars only", "nxs_td"); ?></option>
			    			<option value="subfooter" <?php if ($filter_types == "subfooter") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Subfooters only", "nxs_td"); ?></option>
			    			<option value="footer" <?php if ($filter_types == "footer") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Footers only", "nxs_td"); ?></option>
			    			<option value="content" <?php if ($filter_types == "content") { echo 'selected="selected"'; } ?>><?php nxs_l18n_e("Contents only", "nxs_td"); ?></option>
						 	</select>
						</div>
						<a href='#' class="nxs-float-left nxsbutton1" onclick="jQuery('#filter_types').val(jQuery('#filter_types_picker').val()); jQuery('#theform').submit(); return false;">Go</a>
						
            <ul class="nxs-float-left meta">
                <li>
                	<div class="nxs-float-left actions">
                    	<select id='multiaction' name="multiaction">
                            <option value="-1" selected="selected"><?php nxs_l18n_e("Bulk actions[nxs:adminpage,ddl]", "nxs_td"); ?></option>
                            <?php if ($post_status == "publish") { ?>
                            <option value="trash"><?php nxs_l18n_e("To the recycle bin[nxs:adminpage,ddl]", "nxs_td"); ?></option>
                            <?php } else if ($post_status == "trash") { ?>
                            <option value="restore"><?php nxs_l18n_e("Restore[nxs:adminpage,ddl]", "nxs_td"); ?></option>
                            <option value="delete"><?php nxs_l18n_e("Delete permanently[nxs:adminpage,ddl]", "nxs_td"); ?></option>
                            <?php } else if ($post_status == "trash") { ?>
                            <option value="none"><?php nxs_l18n_e("None[nxs:adminpage,ddl]", "nxs_td"); ?></option>
                            <?php } ?>
                    	</select>
                      <a class="nxsbutton1" href="#" onclick="var selectedValue = jQuery('#multiaction option:selected').val(); handleMultiAction(selectedValue); return false;"><?php nxs_l18n_e("Apply[nxs:adminpage,button]", "nxs_td"); ?></a>
                    </div>
                </li>
                </ul>
                
                <div class="nxs-float-left actions">
					    		<select id='create_types_picker' name="create_types_picker">
					    			<option value=""><?php nxs_l18n_e("Create new...", "nxs_td"); ?></option>
					    			<option value="nieuwheaderhome"><?php nxs_l18n_e("Header", "nxs_td"); ?></option>
					    			<option value="nieuwsubheaderhome"><?php nxs_l18n_e("Subheader", "nxs_td"); ?></option>
					    			<option value="nieuwsidebarhome"><?php nxs_l18n_e("Sidebar", "nxs_td"); ?></option>
					    			<option value="nieuwsubfooterhome"><?php nxs_l18n_e("Subfooter", "nxs_td"); ?></option>
					    			<option value="nieuwfooterhome"><?php nxs_l18n_e("Footer", "nxs_td"); ?></option>
					    			<option value="newcontentparthome"><?php nxs_l18n_e("Content", "nxs_td"); ?></option>
								 	</select>
								</div>
								<a href='#' class="nxs-float-left nxsbutton1" onclick="nxs_js_createnewtype(jQuery('#create_types_picker').val()); return false;"><?php nxs_l18n_e("Create", "nxs_td"); ?></a>
								<script type='text/javascript'>
									function nxs_js_createnewtype(typetocreate)
									{
										if (typetocreate == "")
										{
											nxs_js_alert('<?php nxs_l18n_e("Select a type first", "nxs_td"); ?>');
										}
										else
										{
											nxs_js_popup_site_neweditsession(typetocreate); return false;
										}
									}
								</script>
                
                <?php
                if ($pagingtotalpages > 1)
                {
                ?>
                
                <div class="nxs-pagination nxs-float-right">
                        <!--
                <span class="total">Totaal <?php echo $totalrows; ?> rijen (<?php echo $pagingtotalpages; ?> pages), we zien hier rij <?php echo $pagingrowstart; ?> t/m <?php echo $pagingrowend; ?>. Huidige paging page: <?php echo $pagingcurrentpage; ?></span>
                -->
                
                <span class="">
                    <?php if ($pagingcurrentpage > 1) { ?>
                <a class="current" href="#" onclick="jQuery('#pagingcurrentpage').val('1'); jQuery('#theform').submit(); return false;">&lt;&lt;</a>
                <?php } ?>
                <?php if ($pagingcurrentpage > 1) { ?>
                <a class="current" href="#" onclick="jQuery('#pagingcurrentpage').val('<?php echo $pagingcurrentpage - 1; ?>'); jQuery('#theform').submit(); return false;">&lt;</a>
                <?php } ?>
                <span class="">
                        <input type="text" name="manualpagingnr" id="manualpagingnr" value="<?php echo $pagingcurrentpage; ?>" size="2" onkeydown="if (event.keyCode == 13) { jQuery('#pagingcurrentpage').val(jQuery('#manualpagingnr').text()); jQuery('#theform').submit(); }" class="small2"> van <?php echo $pagingtotalpages;?>
                    </span>
                    <?php if ($pagingcurrentpage < $pagingtotalpages) { ?>
                <a class="current" href="#" onclick="jQuery('#pagingcurrentpage').val('<?php echo $pagingcurrentpage + 1; ?>'); jQuery('#theform').submit(); return false;">&gt;</a>
                <?php } ?>
                    <?php if ($pagingcurrentpage < $pagingtotalpages) { ?>
                    <a class="current" href="#" onclick="jQuery('#pagingcurrentpage').val('<?php echo $pagingtotalpages;?>'); jQuery('#theform').submit(); return false;">&gt;&gt;</a>
                  <?php } ?>
                </span>
                
            </div>
            
                <?php
                }
                ?>
                
            <div class="nxs-clear"></div>
          </div>
          <div class="nxs-admin-wrap">
                <table>
                <thead>
                <tr>
                  <th scope="col" class="check">
                      <input type="checkbox" onchange="jQuery('input[type=\'checkbox\']').attr('checked', this.checked);">
                  </th>
                  <th scope="col" class="nxs-title">
                      <span><?php nxs_l18n_e("Title[nxs:adminpage,columnhead]", "nxs_td"); ?></span>&nbsp;
                      <!--
                      <a href="#" onclick="jQuery('#order_by').val('title'); jQuery('#order').val('ASC'); jQuery('#theform').submit(); return false;">
                      <span>&darr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      &nbsp;
                      <a href="#" onclick="jQuery('#order_by').val('title'); jQuery('#order').val('DESC'); jQuery('#theform').submit(); return false;">
                      <span>&uarr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      -->
                  </th>
                  <th scope="col">
                     <span><?php nxs_l18n_e("Author[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                  </th>
                  <th scope="col">
                      <span><?php nxs_l18n_e("Categories[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                  </th>
                  <th scope="col">
                      <span><?php nxs_l18n_e("Date[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                      <!--
                      <a href="#" onclick="jQuery('#order_by').val('post_date'); jQuery('#order').val('DESC'); jQuery('#theform').submit(); return false;">
                      <span>&darr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      &nbsp;
                      <a href="#" onclick="jQuery('#order_by').val('post_date'); jQuery('#order').val('ASC'); jQuery('#theform').submit(); return false;">
                      <span>&uarr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      -->
                  </th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th scope="col" class="check">
                      <input type="checkbox" onchange="jQuery('input[type=\'checkbox\']').attr('checked', this.checked);">
                  </th>
                  <th scope="col" class="nxs-title">
                      <span><?php nxs_l18n_e("Title[nxs:adminpage,columnhead]", "nxs_td"); ?></span>&nbsp;
                      <!--
                      <a href="#" onclick="jQuery('#order_by').val('title'); jQuery('#order').val('ASC'); jQuery('#theform').submit(); return false;">
                      <span>&darr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      &nbsp;
                      <a href="#" onclick="jQuery('#order_by').val('title'); jQuery('#order').val('DESC'); jQuery('#theform').submit(); return false;">
                      <span>&uarr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      -->
                  </th>
                  <th scope="col">
                     <span><?php nxs_l18n_e("Author[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                  </th>
                  <th scope="col">
                      <span><?php nxs_l18n_e("Categories[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                  </th>
                  <th scope="col">
                      <span><?php nxs_l18n_e("Date[nxs:adminpage,columnhead]", "nxs_td"); ?></span>
                      <!--
                      <a href="#" onclick="jQuery('#order_by').val('post_date'); jQuery('#order').val('DESC'); jQuery('#theform').submit(); return false;">
                      <span>&darr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      &nbsp;
                      <a href="#" onclick="jQuery('#order_by').val('post_date'); jQuery('#order').val('ASC'); jQuery('#theform').submit(); return false;">
                      <span>&uarr;</span>
                      <span class="sorting-indicator"></span>
                      </a>
                      -->
                  </th>
                </tr>
                </tfoot>
                <tbody>
                    
                        <?php
                        
                        $authorslookup = array();
                        $currentrow = 0;
                        
                        // loop over available pages
                        foreach ($showpages as $currentpost)
                        {
                            $currentrow = $currentrow + 1;
                            if ($currentrow < $pagingrowstart || $currentrow > $pagingrowend)
                            {
                                // skip rows that are outside the current paging scope
                            }
                            else
                            {
                                $postid = $currentpost->ID;
                                $url = nxs_geturl_for_postid($postid);
                                $postname = $currentpost->post_name;
                                $posttitle = $currentpost->post_title;
                                if ($posttitle == "")
                                {
                                	$posttitle = "(id:" . $postid . ")";
                                }
                                
                                if (nxs_ishomepage($postid))
                                {
                                	$posttitle = nxs_l18n__("Homepage", "nxs_td") . " (" . $posttitle . ")";
                                }
                                else if (nxs_is404page($postid))
                                {
                                	$posttitle = nxs_l18n__("Page to show when unknown page is requested", "nxs_td") . " (" . $posttitle . ")";
                                }
                                
                                $pagemeta = nxs_get_postmeta($postid);
                                
                                $postdatetime = $currentpost->post_date;
                                $postdatetimepieces = explode(" ", $postdatetime);
                                $postdate = $postdatetimepieces[0];
                                
                                $authorname = "";
                                $authorid = $currentpost->post_author;
                                if (!array_key_exists($authorid, $authorslookup))
                                { 
                                    $authorname = get_userdata($authorid)->display_name;
                                    $authorslookup[$authorid] = $authorname;
                                }
                                else
                                {
                                    $authorname = $authorslookup[$authorid];
                                }
                                
																// add custom filters	
															  $categoriesfilters = array();
															  $categoriesfilters["uncategorized"] = "skip";
                                
                                $categories = get_the_category($postid);
                                nxs_getfilteredcategories($categories, $categoriesfilters);
                                
                                if ($currentrow % 2 == 0)
                                {
                                    $rowalt = "class='alt'";
                                }
                                else
                                {
                                    $rowalt = "";
                                }
                                
                                ?>
                        
                            	<tr <?php echo $rowalt;?>>
                                <td class="check">
			                                <input type="checkbox" class="multiselector page" id="page_<?php echo $postid;?>">
			                            </td>
			                            <td>                                    
			                                <?php if ($post_status == "publish") { ?>
			                                	<span>
			                                		<a href="#" title="<?php nxs_l18n_e("Put in recycle bin[nxs:adminpage,heading]", "nxs_td"); ?>" class='nxs-float-right nxs-margin-right10' onclick='nxs_js_trash_article("<?php echo $postid; ?>"); nxs_js_refreshcurrentpage(); return false;'>
			                                			<span class='nxsiconbutton nxs-icon-trash'></span>
			                                		</a>
			                                	</span>
			                                <?php } else if ($post_status == "trash") { ?> 
			                                                               
			                                <span>
			                                	<a href="#" title="Permanent verwijderen" class='nxs-float-right nxs-margin-right10' onclick='nxs_js_delete_article("<?php echo $postid; ?>"); nxs_js_refreshcurrentpage(); return false;'>
			                                		<span class='nxsiconbutton nxs-icon-lightning'></span>
			                                		
			                                	</a>
			                                </span>
			                                <span>
			                                	<a href="#" title="Terugzetten" class='nxs-float-right nxs-margin-right10' onclick='nxs_js_restore_article("<?php echo $postid; ?>"); nxs_js_refreshcurrentpage(); return false;'>
			                                		<span class='nxsiconbutton nxs-icon-checkmark'></span>
			                                	</a>
			                                </span>
			                                                        
			                                <?php } ?>	
			                                
			                                <strong><a href="<?php echo $url; ?>"><?php echo $posttitle;?></a></strong>
			                               
			                            </td>
			                            <td>
			                                <?php echo $authorname;?>
			                            </td>
			                            <td>
			                                <?php 
			                                // loop over the categories
			                                $aantalcategories = count($categories);
			                                $categoryindex = 1;
			                                foreach ($categories as $currentcategorie)
			                                {
			                                    $categorienaam = $currentcategorie->name;
			                                    $categorieslug = $currentcategorie->slug;
			                                    ?>
			                                    <?php echo $categorienaam; ?>
			                                    <?php if ($categoryindex < $aantalcategories) { ?>
			                                    ,
			                                    <?php } ?>
			                                    <?php
			                                    $categoryindex = $categoryindex + 1;
			                                }
			                                
			                                ?>
			                            </td>
			                            <td>
			                                <span><?php echo $postdatetime;?></span>
			                            </td>
                                </tr>
            
                                <?php
                                }
                            }
                            ?>
        
                </tbody>
                </table>  	
            
            <?php
             
            ?>
		</div>
		
		<div class='padding'></div>
		
		<div style="background-color: white;">
	  	<div class='nxs-aligncenter960 nxs-admin-wrap' style='position:static;'>
			  <div>
			  	<a href='<?php echo nxs_geturl_home(); ?>' class='nxsbutton nxs-float-right'>OK</a>
				</div>
			</div>
			<div class='padding'></div>
		</div>
				
		<input type="hidden" name="filter_types" id="filter_types" value="<?php echo $filter_types; ?>" />
		<input type="hidden" name="post_status" id="post_status" value="<?php echo $post_status; ?>" />
		<input type="hidden" name="order" id="order" value="<?php echo $order; ?>" />
		<input type="hidden" name="order_by" id="order_by" value="<?php echo $order_by; ?>" />
		<input type="hidden" name="pagingrowsperpage" id="pagingrowsperpage" value="<?php echo $pagingrowsperpage; ?>" />
		<input type="hidden" name="pagingcurrentpage" id="pagingcurrentpage" value="<?php echo $pagingcurrentpage; ?>" />
		
		<!-- page is nodig voor admin deel (anders komen we niet in de theme admin pagina uit -->
		<input type="hidden" name="page" id="page" value="<?php echo $page; ?>" />
		<input type="hidden" name="backendpagetype" value="<?php echo $backendpagetype; ?>" />
		<input type="hidden" name="nxs_admin" value="<?php echo $nxs_admin; ?>" />
		
	</form>
	<?php
?>