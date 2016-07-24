<?php
	if (!defined('NXS_FRAMEWORKPATH'))
	{
		// outside context of index.php
		echo "Index.php (nexus theme raw)";
		return;
	}
	
	// delegate request to framework
	require_once(NXS_FRAMEWORKPATH . '/index.php');
?>