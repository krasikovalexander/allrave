<?php
function nxs_webmethod_addnewarticle() 
{
	$combinedargs = array();

	// 
	//
	//
	$args = $_REQUEST;
	
	/*
	// tijdelijk ..
	echo "[testing123]";
	var_dump($args);
	die();
	*/
	
	foreach ($args as $k => $v) 
	{
		if ($k != "args")
		{
	  	$combinedargs[$k] = $v;
	  }
	}
	
	$args = $_REQUEST["args"];
	
	//
	// add additional args
	//		
	foreach ($args as $k => $v) 
	{
  	$combinedargs[$k] = $args[$k];
	}
	
	extract($combinedargs);
	if ($titel == "")
	{
		nxs_webmethod_return_nack("title not set");
	}
	
	$response = nxs_addnewarticle($combinedargs);
	nxs_webmethod_return($response);
}
?>