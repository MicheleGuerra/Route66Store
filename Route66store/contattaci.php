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
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>

	<div class="container-fluid">

		<div class="col-md-5 col-s-5" style="color:white;">
			<h1>Chi siamo?</h1>
			Siamo Route66 uno dei più grandi store affidabili online per la qualità, efficienza, ed eccellenza! Dal 1980 che garantiamo le migliori Moto per i nostri clienti e lo facciamo con passione e con serietà. La nostra azienda nasce in Molise ma il nostro mercato è ormai apprezzato da tutti gli appassionati di Moto e non solo. Siamo contenti di fare questo lavoro il quale ci permette ogni giorno di assistere alle bellezze emanate dalle Moto le quali accurate e precise in ogni minimo dettaglio. Siamo disposti ad ogni richiesta da parte dei nostri clienti per cercare di acquisire la fiducia da parte loro, partiamo dall offrire prove gratuite di tutte le moto in store e anche tanto, questo solo per voi! Per qualsiasi informazione o richiesta non esitare nel contattarci, di seguito alla pagina compila il form che ti si presenta e ci contatterai.
			<p><br/></p>
			<p><br/></p>
			<div class="panel panel-primary">
				<div class="panel-heading">Contattaci</div>
				<div class="panel-body">
					<div class="row">
						<form action="invio_email.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<div class="row">
								<div class="col-md-6">
									<label for="f_name">Nome</label>
									<input type="text" id="nome" name="nome" class="form-control">
								</div>
								<div class="col-md-6">
									<label for="f_name">Cognome</label>
									<input type="text" id="cognome" name="cognome"class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" name="email" class="form-control">
								</div>
								<div class="col-md-12">
									<label for="email">Testo</label>
									<textarea class="form-control" rows="5" id="testo" name="testo"></textarea>
								</div>
							</div>
									<p><br/></p>

							<div class="row">
								<div class="col-md-12">
									<input style="width:100%;" value="Contattaci" type="submit" name="invia" id="invia" class="btn btn-success btn-lg">
								</div>
							</div>
						</div>
						</form>
				</div>
				<div class="panel-footer"></div>
			</div>

	</div>
	<div class="col-md-1 col-s-1"></div>
			<div class="col-md-5" style="color:white;">
				<img src="immagini/logo.png" width="330" height="320">
				<h3>Terminologia</h3>
			La Route 66 o United States Route 66 è una highway (strada a carattere nazionale) statunitense. È una delle prime highway federali; fu aperta l'11 novembre 1926, anche se fino all'anno seguente non furono installati tutti i cartelli indicatori. Originariamente collegava Chicago alla spiaggia di Santa Monica attraverso gli stati Illinois, Missouri, Kansas, Oklahoma, Texas, Nuovo Messico, Arizona e California. La distanza complessiva era di 3 755 km.
			La Route 66 fu una strada usata per la migrazione verso ovest, specialmente durante il dust bowl, e supportò l'economia delle comunità attraverso le quali passava.
			<p><br/></p>

				<h1 style="color:white;">Dove siamo?</h1>
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d95522.74431699692!2d14.68734605933836!3d41.56738848795873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sit!2sit!4v1515858055072" width="352" height="338" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>
	</div>

</body>
</html>
