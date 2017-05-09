<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('BRAIN_CMS', 1);	
include_once $_SERVER['DOCUMENT_ROOT'].'/global.php';
echo'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
echo'<link rel="shortcut icon" href="'.$config['favicon'].'"/>';
Html::page();	
?>

