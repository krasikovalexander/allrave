<?php
function nxs_webmethod_addcomment() 
{	
	extract($_REQUEST);
	
	$allowable_tags = "<p><a><i><u><b><em><br><cite><strong><strike><s><pre><code><q>";
	$allowable_atts = array('href');
	$origcomment = $comment;
	
	$comment = str_replace("\'", "'", $comment);
	$comment = nxs_get_advanced_strippedtags($comment, $allowable_tags, $allowable_atts);
	$comment = str_replace("<a ", "<a target='_blank' rel='nofollow' ", $comment);
	
	if ($comment == "")
	{
		nxs_webmethod_return_nack("comment niet gevuld");
	}
	if ($containerpostid == "")
	{
		nxs_webmethod_return_nack("containerpostid niet gevuld");
	}
	if ($postid == "")
	{
		nxs_webmethod_return_nack("postid niet gevuld");
	}
	
	// $containerpostid
	// $placeholderid
	
	$placeholdermetadata = nxs_getwidgetmetadata($postid, $placeholderid);
	if ($placeholdermetadata["initialcommentstate"] == "hold")
	{
		$initialapprovalstate = 0;	// 1 = auto approve, 0 = on hold
	}
	else if ($placeholdermetadata["initialcommentstate"] == "approved")
	{
		$initialapprovalstate = 1;	// 1 = auto approve, 0 = on hold
	}
	else
	{
		$initialapprovalstate = 0;	// 1 = auto approve, 0 = on hold
	}
	
	$time = current_time('mysql');

	$data = array
	(
    'comment_post_ID' => $containerpostid,
    'comment_author' => $name,
    'comment_author_email' => $email,
    'comment_author_url' => $website,
    'comment_content' => $comment,
    'comment_type' => '',
    'comment_parent' => intval($parentcommentid),
    'user_id' => get_current_user_id(),		
    'comment_author_IP' => nxs_get_ip_address(),
    'comment_agent' => $_SERVER['HTTP_USER_AGENT'],
    'comment_date' => $time,
    'comment_approved' => $initialapprovalstate,
	);
	
	$result = wp_insert_comment($data);	
	
	if ($result == 0)
	{
		nxs_webmethod_return_nack("unable to create comment;");
	}
	
	//
	// create response
	//
	$responseargs = array();
	$responseargs["commentid"] = $result;
	$responseargs["parentcommentid"] = $parentcommentid;
	$responseargs["containerpageid"] = $containerpostid;
	$responseargs["placeholderid"] = $placeholderid;
	$responseargs["initialcommentstate"] = $initialapprovalstate;
	
	$responseargs["postid"] = $postid;
	$responseargs["userid"] = get_current_user_id();
	$responseargs["useragent"] = $_SERVER['HTTP_USER_AGENT'];
	$responseargs["comment"] = $comment;
	
	nxs_webmethod_return_ok($responseargs);
}
?>