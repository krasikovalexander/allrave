<?php
function nxs_webmethod_addcategory() 
{	
	extract($_REQUEST);
	
	if ($name == "")
	{
		nxs_webmethod_return_nack("name niet gevuld");
	}
	
	$newcatid = wp_create_category($name);
	
	if ($newcatid == 0)
	{
		nxs_webmethod_return_nack("unable to create category; " . $name);
	}
	
	//
	// create response
	//

	$responseargs = array();
	$responseargs["catid"] = $newcatid;
	nxs_webmethod_return_ok($responseargs);
}
?>