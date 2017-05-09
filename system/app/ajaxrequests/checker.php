<?php
define('BRAIN_CMS', 1);	
include_once $_SERVER['DOCUMENT_ROOT'].'/global.php';
if (isset($_GET['q']) && isset($_GET['email']))
{
	$query = $dbh->prepare('SELECT email FROM users WHERE email = :email');
	$query->execute([':email' => $_GET['q']]);
	if ($query->rowCount() == 0 && filter_var($_GET['q'], FILTER_VALIDATE_EMAIL))
	{
		echo "#2EAF33";
	}
	else
	{
		echo "#BF0A0A";
	}
}
if (isset($_GET['q']) && isset($_GET['username']))
{
	$query = $dbh->prepare('SELECT username FROM users WHERE username = :username');
	$query->execute([':username' => $_GET['q']]);
	if ($query->rowCount() == 0)
	{
		echo "#2EAF33";
	}
	else
	{
		echo "#BF0A0A";
	}
}
if (isset($_GET['q']) && isset($_GET['referrer']))
{
	$query = $dbh->prepare('SELECT username FROM users WHERE username = :username');
	$query->execute([':username' => $_GET['q']]);
	if ($query->rowCount() == 1)
	{
		echo "#2EAF33";
	}
	else
	{
		echo "#BF0A0A";
	}
}