<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

if (isset($_GET["st"])) {
	  $trx_id = $_GET["tx"];
		$p_st = $_GET["st"];
		$amt = $_GET["amt"];
		$cc = $_GET["cc"];
		$cm_user_id = $_GET["cm"];
	if ($p_st == "Completed") {

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id = '$cm_user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			while ($row=mysqli_fetch_array($query)) {
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) {
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
			if (mysqli_query($con,$sql)) {
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
						</head>
						<body background="immagini/sfondo.jpg">
							<!--Navbar-->
							<div class="navbar navbar-inverse navbar-fixed-top" style="background: url(immagini/b.jpg)">
								<div class="container-fluid">
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
											<span class="sr-only"> navigation toggle</span>
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
									<ul class="nav navbar-nav navbar-right">
										<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Ciao, ".$_SESSION["name"]; ?></a>
											<ul class="dropdown-menu" style="background-color:black; border-color:white;">
												<li><a href="carrello.php" style="text-decoration:none; color:white;"><span class="glyphicon glyphicon-shopping-cart">Carrello</a></li>
												<li class="divider"></li>
												<li><a href="customer_order.php" style="text-decoration:none; color:white;">Ordini</a></li>
												<li class="divider"></li>
												<li><a href="logout.php" style="text-decoration:none; color:white;">Esci</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							</div>
							<p><br/></p>
							<p><br/></p>
							<p><br/></p><body background="immagini/sfondo.jpg">
								<!--Navbar-->
								<div class="navbar navbar-inverse navbar-fixed-top" style="background: url(immagini/b.jpg)">
									<div class="container-fluid">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
												<span class="sr-only"> navigation toggle</span>
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
										<ul class="nav navbar-nav navbar-right">
											<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Ciao, ".$_SESSION["name"]; ?></a>
												<ul class="dropdown-menu" style="background-color:black; border-color:white;">
													<li><a href="carrello.php" style="text-decoration:none; color:white;"><span class="glyphicon glyphicon-shopping-cart">Carrello</a></li>
													<li class="divider"></li>
													<li><a href="customer_order.php" style="text-decoration:none; color:white;">Ordini</a></li>
													<li class="divider"></li>
													<li><a href="logout.php" style="text-decoration:none; color:white;">Esci</a></li>
												</ul>
											</li>
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
											<div class="row">
												<h1>Grazie </h1>
												<hr/>
												<p>Caro <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Il tuo pagamento è avvenuto con successo
												e la tua transazione ID è  <b><?php echo $trx_id; ?></b><br/>
												Puoi continuare a fare Shopping. <br/></p>
												<a href="profile.php" class="btn btn-success btn-lg">Continua Shopping</a>
											</div>
											</div>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>
				<?php
			}
		}else{
			header("location:index.php");
		}

	}
}

?>
