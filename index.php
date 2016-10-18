<?php
	include('php/bd.php');
	include('php/libs/Smarty.class.php');

	// create object
	$smarty = new Smarty;
	$qValue = $_GET['search'];

	$query = "SELECT * FROM products;";
	if(isset($qValue))
		$query = 'SELECT * FROM products WHERE name LIKE "%'.$qValue.'%";';

	if (!$mysqli->query($query)) 
		printf("Error: %s\n", $mysqli->error);

	$result = $mysqli->query($query);
	if(mysqli_num_rows($result)==0)
		echo "Não existem produtos com o critério especificado.";
	
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$smarty->assign('products', $products);

	// display it
	$smarty->display('templates/index.tpl');


?>
