<?php

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$testo = $_POST['testo'];

$destinatario ="dtfabio96@gmail.com";
$oggetto="Email inviata dal mio sito web Route66 Store";
$messaggio="Nome: $nome\n";
$messaggio .="Cognome: $cognome\n"; //.= significa quello sopra più questo, fa un append
$messaggio .="Email: $email\n\n";
$messaggio .="Testo:  $testo";

$da=$email;
$intestazioni="From: $da";

mail($destinatario,$oggetto,$messaggio,$intestazioni);
?>

<!--DOPO LO SCRIPT PHP, VIENE ESEGUITO HTML-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="shotcut icon" href="immagini/logo.png"/>
		<title>Route66 Store</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
<body background="immagini/sfondo.jpg">

	<div class="navbar navbar-inverse navbar-fixed-top" style="background: url(immagini/b.jpg)">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="immagini/logo.png" width="60" height="60">
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="contattaci.php"><span class="glyphicon glyphicon-envelope"></span>Contattaci</a></li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-primary">
        <div class="panel-heading">Carrello</div>
        <div class="panel-body">
          <div class="row">
            <p style="color:white;">Grazie per averci scritto! </p>
            <p style="color:white;">A breve un collaboratore la risponderà in merito al vostro messaggio. Nel frattempo  <a href="index.php" style="color:blue;">continua a navigare.</a></p>
          </div>
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
</body>
</html>
