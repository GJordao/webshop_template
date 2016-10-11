<?php
    include('php/bd.php');
    $qValue = $_GET['search'];
?>
<html>
	<head>
		<title>Web Shop</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-inverse">
    			<div class="container-fluid">
        			<div class="navbar-header">
                        <a class="navbar-brand" href="#">WebSiteName</a>
        			</div>
                        <ul class="nav navbar-nav" style="float:none;">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="check_cart.php">CARRINHO</a></li>
                            <li><a href="#">Page 2</a></li> 
                            <li><a href="#">Page 3</a></li>
                            <li style="float: right;">
                                <form method="get" action="index.php">
                                    <input type="text" name="search" placeholder="Search in here"/>
                                    <input type="submit" name="go">
                                </form>                            
                            </li> 
                        </ul>
                    </div>
            </nav>
		</div>

        <div class="row">
            <div class="col-md-2">
                <ul class="nav sidebar-nav navbar-inverse">
                    <li><a href="#">Cool Side Menu Option 1</a></li>
                    <li><a href="#">Cool Side Menu Option 2</a></li>
                    <li><a href="#">Cool Side Menu Option 3</a></li>
                    <li><a href="#">Cool Side Menu Option 4</a></li>
                    <li><a href="#">Cool Side Menu Option n</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <?php
                    $query = "SELECT * FROM products;";
                    if(isset($qValue))
                        $query = 'SELECT * FROM products WHERE name LIKE "%'.$qValue.'%";';

                    if (!$mysqli->query($query)) 
                        printf("Error: %s\n", $mysqli->error);

                    $result = $mysqli->query($query);
                    if(mysqli_num_rows($result)==0)
                        echo "Não existem produtos com o critério especificado.";
                    while ($product = mysqli_fetch_array($result)) 
                    {
                        echo '<div class="menuItem"><a href="addToCart.php?id='.$product['id'].'" onClick="alert(\'Adicionado\');"><img src="'.$product['url'].'" alt="'.$product['name'].'" style="height: 100%; width=100%;"/>'.$product['name'].' - Preço: '.$product['price'].'€  - Clique para adicionar ao carrinho</a></div>';
                    }
                ?>               
            </div>
        </div>
	</body>
</html>