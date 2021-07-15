<?php

    require_once "vendor/autoload.php";

    use Controller\Main;
    

    $data = new Main();
    $all = $data->getData();

    if(isset($_POST['submit'])){
        $data->delete(array_keys($_POST));
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
        <?php if($all->num_rows == 0){ ?>
            <p>There are no products to be displayed</p>
        <?php } else { ?>
            <?php while ($row = $all->fetch_assoc()) { ?>
                <div class="product">
                    <input type="checkbox" class="delete-checkbox" name="<?= $row["sku"]; ?>" id="<?= $row["sku"]; ?>">
                    <div>
                        <p><?= $row["sku"]; ?></p>
                        <p><?= $row["name"];?></p>
                        <p><?= $row["price"];?>$</p>
                        <p>

                        <?php 
                            switch ($row['type']) {
                                    case 'dvd':
                                        echo 'Size: '.$row['Size'];
                                        break;
                                    case 'furniture':
                                        echo 'Dimensions: '.$row['Dimensions'];
                                        break;
                                    case 'book':
                                        echo 'Weight: '.$row['Weight'];
                                        break;
                                }
                        ?>

                        </p>
                    </div>
                </div>
            <?php } ?>
        <?php }?>
    </form>

</div>

</body>
</html>