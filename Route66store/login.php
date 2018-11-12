<?php
error_reporting(E_PARSE | E_ERROR);
include "db.php";

session_start();


if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	// se il record utente è disponibile nel database, count sarà uguale a 1
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];
		$ip_add = getenv("REMOTE_ADDR");
		// abbiamo creato un cookie nella pagina login_form.php quindi se quel cookie è disponibile significa che l'utente non è loggato
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				// Qui stiamo decodificando i cookie della lista dei prodotti json memorizzati nella matrice normale
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) {
					// Dopo aver ottenuto l'ID utente dal database, qui stiamo controllando la voce del carrello dell'utente se c'è già un prodotto elencato o meno
					$verify_cart = "SELECT id FROM cart WHERE user_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						// se l'utente aggiunge il prodotto per la prima volta al carrello, aggiorneremo user_id nella tabella del database con un ID valido
						$update_cart = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND user_id = -1";
						mysqli_query($con,$update_cart);
					}else{
						// se già quel prodotto è disponibile nella tabella del database, cancelleremo quel record
						$delete_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_product);
					}
				}
				// qui stiamo distruggendo il cookie dell'utente
				setcookie("product_list","",strtotime("-1 day"),"/");
				// se l'utente sta effettuando il login dalla pagina del carrello, invieremo cart_login
				echo "cart_login";
				exit();
			}
			exit();
		}else{
			echo "<span style='color:red;'>Per favore registrati prima di fare login!</span>";
			exit();
		}

}

?>
