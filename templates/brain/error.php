<head>
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">
   <link rel="stylesheet" href="/templates/brain/style/css/main2.css?v=<?= $config['hash'] ?>" type="text/css">
   <link rel="stylesheet" href="/templates/brain/style/css/home.css?v=<?= $config['hash'] ?>" type="text/css">
</head>
<style>
   input[type="submitred"], input:-webkit-autofill, .submitred {
   -webkit-appearance: none;
   border-radius: 3px;
   height: 35px;
   width: 100%;
   background: #c70c0c;
   border-bottom: 2px solid #3c0606;
   color: rgba(255,255,255,1);
   cursor: pointer;
   text-align: center;
   display: block;
   text-decoration: none;
   border: 0px;
   }
</style>
<title><?= $config['hotelName'] ?>: Error!</title>
<div class="center">
   <div style="width: 100%;"class="columleft">
      <div class="box">
         <div class="title red">
            <center>CLIENT ERROR!</center>
         </div>
         <center>
            <font color="red">
               <h1>CLIENT ERROR!</h1>
            </font>
            <b>Er is helaas een fout opgetreden waardoor jij bent uitgelogd.</b>
            <br>
            <br>
            <i> Over 10 seconden ga je automatisch terug het hotel in!</i>
            <br>
            <br>
            <img src="http://cdn4.wpbeginner.com/wp-content/uploads/2013/12/error.jpg">
            <a href="/game">	<input type="submit" class="submit" value="Ga opnieuw het hotel in!" href="/game" style="margin-top: 10px;"> </a>
            <a href="/logout">	<input type="submitred" class="submitred" value="Uitloggen, tot ziens!" href="/logout" style="margin-top: 10px;"> </a>
         </center>
         <head>
            <meta http-equiv="refresh" content="10;url=/game">
         </head>
      </div>
   </div>
</div>
</div>
</body>
</html>