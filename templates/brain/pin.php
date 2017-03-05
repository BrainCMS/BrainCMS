<body style="background: #3498db;">
	<html>
		<head>
			<link rel="stylesheet" href="/templates/brain/style/css/pin.css?v=<?= $config['hash'] ?>" type="text/css">
		</head>
		<body >
			<div class="error" style="display: block;"><?php staffPin(); ?></div>

			
			<div id="PINcode"></div>
			<script src="/templates/brain/style/js/jquery.min.js" type="text/javascript"></script>
			
			<form name='PINform' id='PINform' method="post">
				<input action="post" method="post" id='PINbox' type='password' value='' name='PINbox' />
				<br/>
				<input type='button' class='PINbutton' name='1' value='1' id='1' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='2' value='2' id='2' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='3' value='3' id='3' onClick=addNumber(this); />
				<br>
				<input type='button' class='PINbutton' name='4' value='4' id='4' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='5' value='5' id='5' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='6' value='6' id='6' onClick=addNumber(this); />
				<br>
				<input type='button' class='PINbutton' name='7' value='7' id='7' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='8' value='8' id='8' onClick=addNumber(this); />
				<input type='button' class='PINbutton' name='9' value='9' id='9' onClick=addNumber(this); />
				<br>
				<input type='button' class='PINbutton clear' name='-' value='clear' id='-' onClick=clearForm(this); />
				<input type='button' class='PINbutton' name='0' value='0' id='0' onClick=addNumber(this); />
				
				<input class='PINbutton' type="submit" name="loginPin" value="Enter">
			</form>
			<script>
				function addNumber(e){
					//document.getElementById('PINbox').value = document.getElementById('PINbox').value+element.value;
					var v = $( "#PINbox" ).val();
					$( "#PINbox" ).val( v + e.value );
				}
				function clearForm(e){
					//document.getElementById('PINbox').value = "";
					$( "#PINbox" ).val( "" );
				}
			</script>
		</body>
	</html>			