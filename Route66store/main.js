$(document).ready(function(){
	cat();
	brand();
	product();

	//Preleva il record di categoria dal database ogni volta che viene caricata una pagina
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
			}
		})
	}
	//Preleva il record del brand dal database ogni volta che viene caricata una pagina
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
   //Preleva il record del prodotto dal database ogni volta che viene caricata una pagina
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}

	//Quando l'utente fa clic sulla categoria otterremo l'id della categoria e secondo l'id mostreremo i prodotti
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Caricamento...</h3>");

		var cid = $(this).attr('cid');

			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})

	})

	//Quando l'utente fa clic sul brand otterremo l'id del brand e secondo l'id mostreremo i prodotti
	$("body").delegate(".selectBrand","click",function(event){
		$("#get_product").html("<h3>Caricamento...</h3>");
		var bid = $(this).attr('bid');
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})

	})

	//Quando l'utente inserisce il nome del prodotto da ricercare, con una query sql confrontiamo la stringa data alla colonna delle keyword del database
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Caricamento...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	}else{
		$("#get_product").html("<h3>Hai inserito una stringa vuota, inserisci qualcosa.</h3>");
	}
	})

	//Imposta i bottoni per scorrere tra i prodotti, in base al numero di elementi del database
	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	//quando clicco su un bottone per scorrere tra i prodotti ci mostra dei prodotti, in base al bottone
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})

	//Aggiungi il prodotto al carrello
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
			}
		})
	})

	//Conta gli elementi del carrello
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}

	//Ottiene l'elemento del carrello dal database nel Dropdown
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	}

	//Rimozione all'interno del carrello
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeItemFromCart:1,rid:remove_id},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})

	//Aggiornamento all'interno del carrello
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})

	checkOutDetails();
	net_total();
	//Ottiene l'elemento del carrello dal database nel carrello.php
	function checkOutDetails(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}

	//	net_total è una funzione per calcolare l'ammontare totale del carrello
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Totale : € " +net_total);
	}

	/*
		Qui #login è l'id login del form nella pagina index.php da qui i dati di input vengono inviati alla pagina login.php
		se ottieni la stringa login_success dalla pagina login.php significa che l'utente ha effettuato l'accesso correttamente e window.location lo è
		utilizzato per reindirizzare l'utente dalla pagina iniziale alla pagina profile.php
	*/
	$("#login").on("submit",function(event){

		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	: $("#login").serialize(),
			success	:function(data){
				if(data == "cart_login"){
					window.location.href = "carrello.php";
				}else{
					$("#e_msg").html(data);
				}
			}
		})
	})

// Registrazione utente prima del pagamento
	$("#signup_form").on("submit",function(event){

		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				if (data == "register_success") {
					window.location.href = "carrello.php";
				}else{
					$("#signup_msg").html(data);
				}

			}
		})
	})

	/* Cambio di quantità
	Ogni volta che l'utente cambia quantità aggiorneremo immediatamente il suo importo totale usando la funzione keyup ma ogni volta che l'utente mette qualcosa (come? '' "" ",. () '' etc) diverso dal numero, faremo qty = 1
	se l'utente inserisce qty 0 o meno di 0, lo renderemo nuovamente 1 qty = 1
	('.total').each() questo è una funzione di ripetizione  per la classe .total e in ogni ripetizione eseguiremo un'operazione di somma di classe .totale valore
	e quindi mostra il risultato nella classe .net_total
	*/
	$("body").delegate(".qty","keyup",function(event){

		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Totale : € " +net_total);

	})
})
