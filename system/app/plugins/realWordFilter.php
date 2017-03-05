<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function wordFilter($message)
	{
		global $dbh,$config;
		if ($config['newsCommandFilter'] == true)
		{
			$getCharacterFilter = $dbh->prepare("SELECT * FROM wordfilter_characters");
			$getCharacterFilter->execute();
			while($filtergetCharacter = $getCharacterFilter->fetch())
			{
				$message = str_ireplace($filtergetCharacter['character'], $filtergetCharacter['replacement'], $message);
				$getwordFilter = $dbh->prepare("SELECT * FROM wordfilter");
				$getwordFilter->execute();
				while($getFilter = $getwordFilter->fetch())
				{
					$message = str_ireplace($getFilter['word'], $getFilter['replacement'], $message);
				}
			}
			return $message;
		}
		else
		{
			return $message;
		}
	}
?>