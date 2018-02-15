<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	session_start();
	ob_start();
	define('Z', $_SERVER['DOCUMENT_ROOT'].'/');
	define('A', Z . 'system/');
	define('B', 'app/');
	define('C', 'classes/');
	define('E', 'languages/');
	define('G', 'content/');
	define('H', 'templates/');
	define('I', 'maintenance/');
	define('J', Z . 'adminpan/');
	define('K', 'plugins/');
	require_once A . '/brain-config.php';
	require_once A . E . '/'.$config['lang'].'.php';
	require_once A . B . C . '/functions.php';
	require_once A . B . C . '/class.game.php';
	require_once A . B . C . '/class.user.php';
	require_once A . B . C . '/class.html.php';
	require_once A . B . C . '/class.admin.php';
	require_once A . B . C . '/class.db.php';
	define('S', $config['skin']);
	Html::loadPlugins();