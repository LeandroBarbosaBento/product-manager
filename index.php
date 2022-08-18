<?php
    require_once "vendor/autoload.php";

    use Controller\Main;

    $controller = new Main();
    $products = $controller->getData();

    if(isset($_POST['submit'])){
        $controller->delete(array_keys($_POST));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div class="container">  
    <header class="header">
        <h1>Product List</h1>
        <nav>
            <a href="add-product.php" class="btn add-btn">ADD</a>
            <input value="MASS DELETE" form="product-list" name="submit" type="submit" class="delete-btn" id="delete-product-btn">
        </nav>
    </header>

    <form class="product-list" id="product-list" method="POST">

        <?php if(!$products){ ?>

            <p>There are no products to be displayed</p>

        <?php } else { ?>
            <?php foreach($products as $product) { ?>

                <div class="product">
                    <input type="checkbox" class="delete-checkbox" name="<?= $product["sku"]; ?>" id="<?= $product["sku"]; ?>">
                    <div>
                        <p><?= $product["sku"]; ?></p>
                        <p><?= $product["name"];?></p>
                        <p><?= $product["price"];?>$</p>
                        <p><?= $product["characteristic"] . ": " . $product["value"];?></p>
                    </div>
                </div>

            <?php } ?>
        <?php }?>
    </form>

</div>

</body>
</html>