<?php
	$idProduct = $_GET['id'];
	if(isset($_COOKIE['cart'])){
		$data = json_decode($_COOKIE['cart'], true);
		array_push($data, $idProduct);
	}
	else{
		$data = array();
		array_push($data, $idProduct);
	}

	setcookie('cart', json_encode($data), time()+3600);

	header('Location: index.php');
?>