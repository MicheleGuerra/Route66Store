<?php


?>
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg"></div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Carrello</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Azione</b></div>
							<div class="col-md-2 col-xs-2"><b>Immagine prodotto</b></div>
							<div class="col-md-2 col-xs-2"><b>Nome prodotto</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantità</b></div>
							<div class="col-md-2 col-xs-2"><b>Prezzo prodotto</b></div>
							<div class="col-md-2 col-xs-2"><b>Prezzo in €</b></div>
						</div>
						<div id="cart_checkout" style="color:white;"></div>

						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>

		</div>
</body>
</html>
