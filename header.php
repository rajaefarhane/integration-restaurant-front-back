<?php
	session_start();
	@$login=$_POST["login"];
	@$pass=$_POST["pass"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		include("model/connexion.php");
		$res=$pdo->prepare("select * from admin where email=? and pass=? limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($login,md5($pass)));
		$tab=$res->fetchAll();
		if(count($tab)==0)
			$message="<li>Mauvais login ou mot de passe!</li>";
		else{
      //variable de session
			$_SESSION["autoriser"]="oui";
			$_SESSION["nomPrenom"]="rajae farhane";
			header("location:index.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="fr" >
  <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Victorya-restaurant</title>

     <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
$(document).ready(function(){
  $('#icone').click(function(){
    $('ul').toggleClass('show')
  });
});
</script>
<script>
function openForm() {
       document.getElementById("popupForm").style.display="block";
     }

     function closeForm() {
       document.getElementById("popupForm").style.display="none";
     }
</script>
  </head>
  <div class="container-f banner">
    <nav>
      <label class="logo">
        Victorya
      </label>
      <ul>
        <li><a href="#" class="active">Menu</a></li>
        <li><a href="#">Package</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
      <button <img src="img/admin.png" class="open-button" onclick="openForm()"> <img src="img/admin.png" class="open"> </img></button>
      <?php

if (isset($_SESSION['autoriser']))
{
?>
<li id="dec"><a href="#"> <?=$_SESSION["nomPrenom"]?></a></li>
<li id="dec1"><a href="model/deconnexion.php">Deconnexion</a></li>

<?php
}

?>
      <label id="icone">
        <i class="fas fa-bars"></i>
      </label>
    </nav>
  <h5 class="texte1">Good food choices are <br>
  good invesstments.</h5>
  <p class="text2">There is a powerful need for symbolism, and that means the architecture must <br>have something that appeals to the human heart.</p>
  <button class="btn"><a>Order Now</a></button><p class="watch">Watch our story</p>
  <button class="play"><a>play</a></button>
  </div>
  <div class="login-popup">
   <div class="form-popup" id="popupForm">
     <form action=""name="fo" method="post" class="form-container">
       <h2>Veuillez vous connecter(admin)</h2>
       <label for="email">
       <strong>E-mail</strong>
       </label>
       <input type="text" id="email" placeholder="Votre Email" name="login" required>
       <label for="psw">
       <strong>Mot de passe</strong>
       </label>
       <input type="password" id="psw" placeholder="Votre Mot de passe" name="pass" required>
       <?php   include("messageerreur.php"); ?>
       <button type="submit" class="btn" name="valider">Connecter</button>
       <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
     </form>
   </div>
 </div>
  <body >
