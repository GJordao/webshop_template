<?php
    include('php/bd.php');
    if(isset($_COOKIE['cart']))
        $data = json_decode($_COOKIE['cart'], true);
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Carrinho de Compras</title>
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
                        </ul>
                    </div>
            </nav>
        </div>

        <div class="col-md-9 col-md-push-3">
            <?php
                foreach ($data as $key => $value)
                {
                    $id = $key;
                    $query = "SELECT * FROM products WHERE id=\"".$id."\";";
                    $result = $mysqli->query($query);
                    $product = mysqli_fetch_array($result);
                     echo '<div class="menuItem"><a href="remFromCart.php?id='.$product['id'].'"><img src="'.$product['url'].'" alt="'.$product['name'].'" style="height: 100%; width=100%;"/></a> '.$product['name'].' - Preço: '.$product['price']*$value.'€ - Quant: '.$value.'</div>';
                }
            ?>               
        </div>
    </body>
</html>