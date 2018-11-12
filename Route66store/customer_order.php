<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
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
	<style>
		table tr td {padding:10px;}
	</style>
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
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"></div>
					<div class="panel-body" style="color:white; background-color:black;">
						<h1>Dettagli ordini effettuati</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.user_id='$user_id' AND o.product_id=p.product_id";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:left;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6" style="color:white;">
												<table>
													<tr><td>Nome prodotto:</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													<tr><td>Prezzo prodotto:</td><td><b><?php echo "€ ".$row["product_price"]; ?></b></td></tr>
													<tr><td>Quantità:</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Transazione ID:</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
												</table>
											</div>
										</div>
									<?php
								}
							}
						?>

					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>
