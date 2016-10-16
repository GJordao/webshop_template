<?php
	$idProduct = $_GET['id'];

	if(isset($_COOKIE['cart']))
	{
		$data = json_decode($_COOKIE['cart'], true);
		if(array_key_exists($idProduct, $data))
			$data[$idProduct] = $data[$idProduct] +1;
		else
			$data[$idProduct] = 1;
	}
	else{
		$data = array($idProduct => 1);
	}
	
	setcookie('cart', json_encode($data), time()+3600);

	header('Location: index.php');
?>
