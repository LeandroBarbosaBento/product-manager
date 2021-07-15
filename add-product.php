<?php

    require_once "vendor/autoload.php";

    use Controller\Main;
    

    if(isset($_POST['submit'])){
        $insert = new Main();
        $insert->insert($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>

    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div class="container">  
    <header class="header">
        <h1>Product Add</h1>
        <nav>
            <input value="Save" form="product_form" name="submit" type="submit" class="add-btn">
            <a href="index.php" class="delete-btn" id="delete-product-btn">Cancel</a>
        </nav>
    </header>

    <form id="product_form" method="POST">
        <div class="form-group row">
            <label for="sku" class="col-sm-2 col-form-label">SKU</label>
            <div class="col-sm-5">
                <input type="text" name="sku" class="form-control" id="sku" placeholder="SKU" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-5">
                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="type" class="col-sm-2 col-form-label">Type Switcher</label>
            <div class="col-sm-5">
                <select name="type" class="custom-select mr-sm-2" id="productType"  onchange = "myFunction()">
                    <option value="DVD" id="DVD">DVD</option>
                    <option value="Furniture" id="Furniture">Furniture</option>
                    <option value="Book" id="Book">Book</option>
                </select>
            </div>
        </div>

        <div id="dvdAux" style="display: block">
            <div class="form-group row">
                <label for="size" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-5">
                    <input type="number" name="size" class="form-control" id="size" placeholder="size" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-5 offset-sm-2">
                    <p>Please, provide size</p>
                </div>
            </div>
        </div>

        <div id="furnitureAux" style="display: none">
            <div class="form-group row">
                <label for="height" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-5">
                    <input type="number" name="height" class="form-control" id="height" placeholder="height" >
                </div>
            </div>

            <div class="form-group row">
                <label for="width" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-5">
                    <input type="number" name="width" class="form-control" id="width" placeholder="width" >
                </div>
            </div>

            <div class="form-group row">
                <label for="length" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-5">
                    <input type="number" name="length" class="form-control" id="length" placeholder="length" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-5 offset-sm-2">
                    <p>Please, provide dimensions</p>
                </div>
            </div>
        </div>

        <div id="bookAux" style="display: none">
            <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-5">
                    <input type="number" name="weight" class="form-control" id="weight" placeholder="weight" >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-5 offset-sm-2">
                    <p>Please, provide weight</p>
                </div>
            </div>
        </div>
    </form>

</div>

<script>
    function myFunction() {
        var mylist = document.getElementById("productType");  
        var aux = mylist.options[mylist.selectedIndex].value;
        if(aux == "DVD"){
            document.getElementById("dvdAux").style.display = "block";
            document.getElementById("furnitureAux").style.display = "none";
            document.getElementById("bookAux").style.display = "none";
        }
        else {
            if(aux == "Furniture"){
                document.getElementById("dvdAux").style.display = "none";
                document.getElementById("furnitureAux").style.display = "block";
                document.getElementById("bookAux").style.display = "none";
            } else{
                if(aux == "Book"){
                    document.getElementById("dvdAux").style.display = "none";
                    document.getElementById("furnitureAux").style.display = "none";
                    document.getElementById("bookAux").style.display = "block";
                }                
            }
        }
    }
</script>

</body>
</html>