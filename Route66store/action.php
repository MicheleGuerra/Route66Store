<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

//Preleva dal database i titoli delle categorie
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categorie</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}

//Preleva dal database i titoli dei brand
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brand</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

//Imposta i bottoni per scorrere tra i prodotti, vede il numero di pagine che servono facendo il totale dei prodotti diviso 9 prodotti per pagina e vede quante pagine servono
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

//Preleva dal database i prodotti
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title	</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style=' min-height: 200px; width: 100%; max-height: 100% '/>
								</div>
								<div class='panel-heading'>€ $pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Aggiungi al carrello</button>
								</div>
							</div>
				</div>
			";
		}
	}
}

//Quando clicco su categoria, o su brand, o su cerca
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}

	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style=' min-height: 250px; width: 100%; max-height: 100%'/>
								</div>
								<div class='panel-heading'>€ $pro_price
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Aggiungi al carrello</button>
								</div>
							</div>
						</div>
			";
		}
	}

//Gestione aggionta prodotti al carrello
	if(isset($_POST["addToCart"])){
		$p_id = $_POST["proId"];
		//Per l'utente registrato
		if(isset($_SESSION["uid"])){
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Il prodotto è già stato aggiunto al carrello!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Prodotto aggiunto.</b>
					</div>
				";
			}
		}
		}else{
			//Per l'utente NON registrato
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Il prodotto è già stato aggiunto al carrello!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Prodotto aggiunto.</b>
					</div>
				";
				exit();
			}
		}
	}

//Conta gli oggetti del carrello dell'utente
if (isset($_POST["count_item"])) {
	//Quando l'utente ha effettuato l'accesso, conteremo il numero di elementi nel carrello utilizzando l'id di sessione dell'utente
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
	//Quando l'utente NON ha effettuato l'accesso, conteremo il numero di elementi nel carrello utilizzando l'indirizzo IP univoco degli utenti
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}


// Ottieni gli elementi per il carrello dal database
if (isset($_POST["Common"])) {
	if (isset($_SESSION["uid"])) {
		// Quando l'utente è loggato, questa query verrà eseguita
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		// Quando l'utente non è loggato, questa query verrà eseguita
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	//Ottiene gli elementi per il carrello del dropdown menu
	if (isset($_POST["getCartItem"])) {
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3 col-s-3 col-xs-3">'.$n.'</div>
						<div class="col-md-3 col-s-3 col-xs-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3 col-s-3 col-xs-3">'.$product_title.'</div>
						<div class="col-md-3 col-s-3 col-xs-3">'.$product_price.' €</div>
					</div>';

			}
			?>
				<a style="float:right;" href="carrello.php" class="btn btn-warning">Modifica <span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	//Ottiene gli elementi per il carrello del carrello.php
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			// mostra gli elementi del carrello utente con il pulsante "Prosegui per acquistare" o "Paypal"
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo
						'<div class="row">
								<div class="col-md-2 col-s-2 col-xs-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2 col-s-2 col-xs-2"><img class="img-responsive" src="product_images/'.$product_image.'"></div>
								<div class="col-md-2 col-s-2 col-xs-2">'.$product_title.'</div>
								<div class="col-md-2 col-s-2 col-xs-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2 col-s-2 col-xs-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2 col-s-2 col-xs-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}

				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					//se non è loggato
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Prosegui per acquistare" >
							</form>';

				}else if(isset($_SESSION["uid"])){
					///se è loggato
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="programmazionewebvenditore2@gmail.com">
							<input type="hidden" name="upload" value="1">';

							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}

							echo
							'<input type="hidden" name="return" value="http://localhost/route66store/payment_success.php"/>
												<input type="hidden" name="notify_url" value="http://localhost/route66store/payment_success.php">
								<input type="hidden" name="cancel_return" value="http://localhost/route66store/profile.php"/>
									<input type="hidden" name="currency_code" value="EUR"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
			}
		}
	}
}

// Rimuovi elemento dal carrello
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Prodotto rimosso dal carrello</b>
				</div>";
		exit();
	}
}


//Aggiorna elementi del carrello
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Prodotti aggiornati</b>
				</div>";
		exit();
	}
}

?>
