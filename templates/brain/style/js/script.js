function DataCall(vars,callback){$.ajax({type:"POST",url:"/Data/DataController",data:vars,success:function(data)
{callback(data);}});}
$('.LoginForm').submit(function(){var data=$(this).serializeArray();data.push({name:'action',value:'Login'},{name:'controller',value:'Auth'});DataCall(data,function(data)
{console.log(data);if(data=='success')
{window.location.replace("./me");}
else
{$("html, body").animate({scrollTop:0},"slow");$('.error').show();$('.error').empty();$('.error').html(data);}});return false;});$("#view_pass").on("click",function(){var e=$('input[name="password"]');var a=e.attr("type");"password"==a?(e.attr("type","text"),$(this).removeClass("fa-eye").addClass("fa-eye-slash")):"text"==a&&(e.attr("type","password"),$(this).removeClass("fa-eye-slash").addClass("fa-eye"))});