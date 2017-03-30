<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	/* 
		Functions list functions.
		--------------- 
		filter();
		loggedIn();
		userIp();
	*/
	// Filter data
	function filter($data) 
	{
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	}
	function filterInpute($data) 
	{
		$filter = new Filter();
		$allowed_protocols = array('', '', 'mailto');
		$allowed_tags = array('a', 'i', 'b', 'em', 'span', 'strong', 'ul', 'ol', 'li', 'table', 'tr', 'td', 'thead', 'th', 'tbody');
		$filter->addAllowedProtocols($allowed_protocols);
		$filter->addAllowedTags($allowed_tags);
		$filtered_string = $filter->xss($data);
	}
	// Check version of BrainCMS
	function checkVersion()
	{
		$script = file_get_contents("http://brain.retroripper.com/version.txt");
		$update = file_get_contents("http://brain.retroripper.com/update.txt");
		$version = '1.7.2';
		if($version == $script) {
			echo'<div style = "width: 100%;
			background-color: green;
			border-radius: 5px;
			padding: 10px;
			color: white;
			margin-bottom: 10px;
			font-size: 17px;">Deze versie van brainCMS is up to date! V '.$script.'</div>';
			} else {
			echo'<div style = "width: 100%;
			background-color: red;
			border-radius: 5px;
			padding: 10px;
			color: white;
			margin-bottom: 10px;
			font-size: 17px;">Er is een nieuwe versie beschiktbaar! V '.$script.'</div>
			<div style = "width: 100%;
			background-color: green;
			border-radius: 5px;
			padding: 10px;
			color: white;
			margin-bottom: 10px;
			font-size: 17px;">'.$update.'</div>';
		}	
	}
	// Check if user is logged in
	function loggedIn()
	{
		if (isset($_SESSION['id']))
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	// Check user real IP
	function userIp()
	{
		$ipaddress = '';
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		return $_SERVER['REMOTE_ADDR'];
	}
?>