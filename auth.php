<?php
	include 'vimeo.php';
	$customer_key = 'b03792c6fc5efdfe36720f17053f0937';
	$customer_secret = '8c0a9e76925503f';
	$v = new phpVimeo($customer_key,$customer_secret);
	
	//$token = $v->getAccessToken();
	//$v->setToken($token->oauth_token, $token->oauth_token_secret);
	
	$params = array('channel_id' => 'wikileefilms','format'=>'xml');
	$info = $v->call('vimeo.channels.getVideos',$params);
	
	var_dump ($info);
?>