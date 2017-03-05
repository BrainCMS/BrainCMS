<?php
	if(!defined('BRAIN_CMS')) 
	{ 
		die('Sorry but you cannot access this file!'); 
	}
	function buyvip()
	{
		global $dbh,$config,$lang;
		if (isset($_POST['getvip']))
		{
			if (User::userData('vip_points') >= $config['vipCost'])
			{
				if (User::userData('online') == 1)
				{
					return Html::error($lang["Vonline"]);
				}
				else
				{
					if (User::userData('rank_vip') == $config['vipRankToGet'])
					{
						return Html::error($lang["Valreadyvip"]);
					}
					else
					{
						$removeDiamonds = $dbh->prepare("
						UPDATE users SET 
						vip_points=vip_points - :cost
						WHERE 
						id=:id
						");
						$removeDiamonds->bindParam(':id', $_SESSION['id']);
						$removeDiamonds->bindParam(':cost', $config['vipCost']);
						$removeDiamonds->execute();
						$giveVipRank = $dbh->prepare("
						UPDATE users SET 
						rank_vip = :viprank
						WHERE 
						id=:id
						");
						$giveVipRank->bindParam(':id', $_SESSION['id']);
						$giveVipRank->bindParam(':viprank', $config['vipRankToGet']);
						$giveVipRank->execute();
						$giveVipBadge = $dbh->prepare("
						INSERT INTO
						user_badges
						(user_id, badge_id, badge_slot)
						VALUES
						(
						:id, 
						:badgeid, 
						0
						)");
						$giveVipBadge->bindParam(':id', $_SESSION['id']);
						$giveVipBadge->bindParam(':badgeid', $config['vipBadge']);
						$giveVipBadge->execute();
						return Html::errorSucces($lang["VbuySucces"]);
					}
				}
			}
			else
			{
				return Html::error($lang["VnoDimonds"]);
			}
		}
	}
?>