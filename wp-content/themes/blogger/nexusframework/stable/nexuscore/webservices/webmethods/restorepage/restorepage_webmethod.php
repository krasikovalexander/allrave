<?php
function nxs_webmethod_restorepage() 
{	
	extract($_REQUEST);

	if ($postid == "")
	{
		nxs_webmethod_return_nack("postid not specified /nxs_webmethod_removerow/");
	}
	
	global $nxs_global_current_postid_being_rendered;
	$nxs_global_current_postid_being_rendered = $postid;
	global $nxs_global_current_postmeta_being_rendered;
	$nxs_global_current_postmeta_being_rendered = nxs_get_postmeta($postid);

	wp_untrash_post($postid);
	
	//
	// create response
	//
	$responseargs = array();
	nxs_webmethod_return_ok($responseargs);
}
?>