/**
  * Register JavaScript special for BrainCMS >1.7.3
  * @author Tim M. <info@retroripper.com>
  */
$(document).ready(function() {
	$('#registerSubmit').click(function() {

		var username = $('#username').val();
		var email = $("#email").val();
		var password = $("#password").val();
		var password_repeat = $("#password_repeat").val();
		var avatar = $("#avatar").val();
		var motto = $("#motto").val();
		var referrer = $("#referrer").val();
		
		$.post('../../system/app/ajaxrequests/register.php', { register: "", referrer: referrer, motto: motto, avatar: avatar, username: username, email: email, password: password, password_repeat: password_repeat}, function(result) 
		{
			if (result == 'succes' || result == 'ref_errorsucces')
			{
				window.location.href = "/me";
			}
			else
			{
				window.location.href = "#top";
				$(".error").fadeIn("18000").css('display', 'block');
				if (language == 'nl') {
					if (result == "empty_username")
					{
						$(".error").text("Je hebt geen gebruikersnaam ingevoerd.");
					}
					else if (result == "register_disable")
					{
						$(".error").text("Registreren is op dit moment niet mogelijk!");
					}
					else if (result == "empty_password")
					{
						$(".error").text("Je hebt geen wachtwoord ingevoerd.");
					}
					else if (result == "empty_password_repeat")
					{
						$(".error").text("Je hebt je wachtwoord niet bevestigd.");
					}
					else if (result == "empty_email")
					{
						$(".error").text("Je hebt geen email ingevoerd.");
					}
					else if (result == "valid_email")
					{
						$(".error").text("Je email is geen geldig email adres.");
					}
					else if (result == "used_username")
					{
						$(".error").text("Deze gebruikersnaam bestaat jammer genoeg al.");
					}
					else if (result == "used_email")
					{
						$(".error").text("Dit email adres staat al in onze database.");
					}
					else if (result == "short_password")
					{
						$(".error").text("Je wachtwoord moet uit minimaal 6 karakters bestaan.");
					}
					else if (result == "password_repeat_error")
					{
						$(".error").text("Je wachtwoorden komen niet met elkaar overeen.");
					}
					else if (result == "to_many_ip")
					{
						$(".error").text("Je mag maar maximaal 3 accounts op dit IP registreren.");
					}
					else if (result == "robot")
					{
						$(".error").text("Ik ben geen robot.");
					}
					else if (result == 'ref_error')
					{
						$(".error").text('Er is een fout opgetreden met jouw referrer. De referrer mag niet afkomstig zijn van jouw IP.');
					}
					else
					{
						$(".error").text("Er is een fout opgetreden! Neem a.u.b. contact op met de Website Beheerder.").css('display', 'block');
					}
				} else if (language == 'es') {
					if (result == "empty_username")
					{
						$(".error").text("You forget enter a username.");
					}
					else if (result == "register_disable")
					{
						$(".error").text("Registration is not enabled by the administrator.");
					}
					else if (result == "empty_password")
					{
						$(".error").text("You forget enter a password.");
					}
					else if (result == "empty_password_repeat")
					{
						$(".error").text("You forget enter the conformation password.");
					}
					else if (result == "empty_email")
					{
						$(".error").text("You forget enter a email adres.");
					}
					else if (result == "valid_email")
					{
						$(".error").text("You email adres isn't valid.");
					}
					else if (result == "used_username")
					{
						$(".error").text("This username is already in use.");
					}
					else if (result == "used_email")
					{
						$(".error").text("This email adres is already in use.");
					}
					else if (result == "short_password")
					{
						$(".error").text("Your password must be at least 6 characters.");
					}
					else if (result == "password_repeat_error")
					{
						$(".error").text("The passwords don't match.");
					}
					else if (result == "to_many_ip")
					{
						$(".error").text("You can only register up to three accounts on this IP.");
					}
					else if (result == "robot")
					{
						$(".error").text("I'm not a robot.");
					}
					else if (result == 'ref_error')
					{
						$(".error").text('Er is een fout opgetreden met jouw referrer. De referrer mag niet afkomstig zijn van jouw IP.');
					}
					else
					{
						$(".error").text("An error has occurred. Please contact the CMS administrator.").css('display', 'block');
					}
				} else {
					if (result == "empty_username")
					{
						$(".error").text("You forget enter a username.");
					}
					else if (result == "register_disable")
					{
						$(".error").text("Registration is not enabled by the administrator.");
					}
					else if (result == "empty_password")
					{
						$(".error").text("You forget enter a password.");
					}
					else if (result == "empty_password_repeat")
					{
						$(".error").text("You forget enter the conformation password.");
					}
					else if (result == "empty_email")
					{
						$(".error").text("You forget enter a email adres.");
					}
					else if (result == "valid_email")
					{
						$(".error").text("You email adres isn't valid.");
					}
					else if (result == "used_username")
					{
						$(".error").text("This username is already in use.");
					}
					else if (result == "used_email")
					{
						$(".error").text("This email adres is already in use.");
					}
					else if (result == "short_password")
					{
						$(".error").text("Your password must be at least 6 characters.");
					}
					else if (result == "password_repeat_error")
					{
						$(".error").text("The passwords don't match.");
					}
					else if (result == "to_many_ip")
					{
						$(".error").text("You can only register up to three accounts on this IP.");
					}
					else if (result == "robot")
					{
						$(".error").text("I'm not a robot.");
					}
					else if (result == 'ref_error')
					{
						$(".error").text('Referrer user is not a good match!');
					}
					else
					{
						$(".error").text("An error has occurred. Please contact the CMS administrator.").css('display', 'block');
						console.log(result);
					}
				}
			}
		});
	});
});

function checkUsernameOrEmail(str, methode) 
{
	if (str.length == 0) { 
	    return;
	} 
	else 
	{
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            if (methode == "username")
			    {
			    	$("#username").css("color", xmlhttp.responseText);
			    }
			    else if (methode == "email")
			    {
			    	$("#email").css("color", xmlhttp.responseText);
			    }
			    else if (methode == "referrer")
			    {
			    	$("#referrer").css("color", xmlhttp.responseText);
			    }
			    else
			    {
			    	alert("Please contact the CMS administrator!");
			    }
	        }
	    };
	    if (methode == "username")
	    {
	    	xmlhttp.open("GET", "../../../system/app/ajaxrequests/checker.php?username=true&q=" + str, true);
	    	xmlhttp.send();
	    }
	    else if (methode == "email")
	    {
	    	xmlhttp.open("GET", "../../../system/app/ajaxrequests/checker.php?email=true&q=" + str, true);
	    	xmlhttp.send();
	    }
	    else if (methode == "referrer")
	    {
	    	xmlhttp.open("GET", "../../../system/app/ajaxrequests/checker.php?referrer=true&q=" + str, true);
	    	xmlhttp.send();
	    }
	    else
	    {
			alert("Please contact the CMS administrator!");
	    }
	}
}
function checkPasswords(str, id)
{
	if (str.length > 6)
	{
		$("#"+id).css("color", "#2EAF33");
	}
	else
	{
		$("#"+id).css("color", "#BF0A0A");
	}
}