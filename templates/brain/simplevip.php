<?php
	include_once 'includes/header.php';
?>
<title><?= $config['hotelName'] ?>: VIP Kopen</title>
<div class="center">
<?php
		include_once 'includes/alerts.php';
	?>
	<div class="columleft">
				<div class="box">
				<div class="title blue">
					Waarom (Super)VIP?
				</div>
				<div class="mainBox">
					<div class="boxHeader"></div>
					<p> Als (super)VIP heb jij velen voordelen die normale <?= $config['hotelName'] ?> gebruikers niet hebben. Hieronder volgt een lijst met al deze voordelen!</p>
<div class="box" style="text-align: center;">
<b>Speciaal</b><br>
- Je ontvangt <b>50.000.000 tot 100.000.000 credits</b>.<br>
- Je ontvangt ieder uur <b>600 Credits</b>.<br>
- Je ontvangt ieder uur <b>500 Duckets</b>.</p>
<b>Exclusief</b><br>
- Je kunt meubels uit de <b>VIP Shop</b> kopen (met Credits).<br>
&nbsp;&nbsp;<i>Rares, Ultra Rares, Nieuwste Meubi, en nog veel meer</i>.<br>
- Je kunt je eigen <b>Lido</b> en <b>Ontvangstruimte</b> maken.<br>
- Je kunt <b>volle kamers</b> in.</p>
<b>Meer</b><br>
- Je kan <b>75 kamers</b> maken.<br>
- Er kunnen <b>200 <?= $config['hotelName'] ?>'s</b> in je kamer.</p>
<b>Speciale spraakcommando's</b><br>
- <b>:pet</b> = Je kan een huisdier worden. Keuze uit alle huisdieren.</b><br>
- <b>:fastwalk</b> = Loop snel. Sneller dan de rest!</b><br>
- <b>:lay</b> = Hierdoor ga je liggen.<br>
- <b>:setmax <i>1 t/m 200</i></b> = Maximale bezoekers in je kamer.<br>
- <b>:faceless</b> = Laat je gezicht verdwijnen.<br>
- <b>:enable <i>1 t/m 181</i> & <i>500 t/m 539</i></b> = Tover speciaal effect.<br>
- <b>:drink <i>nummer</i></b> = Tover een drankje.<br>
- <b>:setspeed <i>nummer</i></b> = Snelheid van je rollers.<br>
- <b>:moonwalk</b> = Hiermee kun je achteruit lopen.<br>
- <b>:mimic <i><?= $config['hotelName'] ?>naam</i></b> = Kopieer een <?= $config['hotelName'] ?> zijn uiterlijk.<br>
- <b>:pickall</b> = Pak alles in &eacute;&eacute;n keer op in je kamer.<br>
- <b>:cleanhand</b> = Leeg je inventaris in een handomdraai.</p>
</div>
			</div>
			</div>
	</div>
		<div class="columright">
			
			<div class="box">
					<div class="lblue title">
						<?= $config['hotelName'] ?> VIP kopen
					</div>
					<div class="mainBox" style="text-align: center;">
						<h1>Welk VIP pakket wil je?</h1>
						<?php editVIP(); ?>
						<div class="box">
						<form method="post">
						<div class="vipkopen1">
							<h2>VIP + 50.000.000 credits</h2>
							<input type="submit" name="vip1" value="Koop VIP voor 160 Diamanten">
						</div>
						<div class="vipkopen2"">
							<h2>superVIP + 100.000.000 credits + <b>Elk uur 2 diamanten.</b></h2>
							<input type="submit" name="vip2" value="Koop Super VIP voor 200 Diamanten">
						</div>
						<p><i>Disclaimer: Wanneer u niet tevreden bent met het upgraden van uw account op <?= $config['hotelName'] ?>Hotel geldt er geen herroepingsrecht.
						Aankopen op <?= $config['hotelName'] ?>hotel.nl / <?= $config['hotelName'] ?>hotel.be zijn altijd op eigen risico.</i></p>
						</form>
						</div>
				</div>
		</div>
			<div class="box">
				<div class="mainBox">
					<div class="boxHeader"></div>
	<div class="boxuser">
Jouw diamanten:
			<div style="margin-bottom: 0px;" class="userstatsbox"">
				<div style="color: #6caff4; background-image: url(/system/theme/brain/style/images/icons/diaicon.png);" class="userstats">
					<?= User::userData('vip_points') ?> <?= $lang["Mdiamond"] ?>
				</div>
					</div>
		</div>
	
			</div>
			</div>
			
		</div>
		<?php
			include_once 'includes/footer.php';
		?>
	</div>
</div>
</body>
</html>			