
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ailen Mansilla">
    <link rel="stylesheet" href="/phpmotors/css/small.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/large.css" media="screen">
    <title>PHP Motors</title>
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main>
    <h1>Add Vehicle</h1>
            <p>*Note all Fields are Required</p>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="POST">
                <label>Classification</label>
                <br>
                <?php echo $carClassifications; ?>
                <br>
                <br>
                <label>Make</label>
                <br>
                <input type="text" name="make" id="make" <?php if(isset($make)) {echo "value='$make'";}  ?> required>
                <br>
                <br>
                <label>Model</label>
                <br>
                <input type="text" name="model" id="model" <?php if(isset($model)){echo "value='$model'";}  ?> required>
                <br>
                <br>
                <label>Description</label>
                <br>
                <textarea name="description" rows="10" cols="30" required><?php if(isset($description)){echo $description;};  ?></textarea>
                <br>
                <br>
                <label>Image Path</label>
                <br>
                <input type="text" name="image" id="image" <?php if(isset($image)){echo "value='$image'";}  ?> required>
                <br>
                <br>
                <label>Thumbnail Path</label>
                <br>
                <input type="text" name="thumb" id="thumb" <?php if(isset($thumb)){echo "value='$thumb'";}  ?> required>
                <br>
                <br>
                <label>Price</label>
                <br>
                <input type="number" name="price" id="price" <?php if(isset($price)){echo "value='$price'";}  ?> required>
                <br>
                <br>
                <label># In Stock</label>
                <br>
                <input type="number" name="stock" id="stock" <?php if(isset($stock)){echo "value='$stock'";}  ?> required> 
                <br>
                <br>
                <label>Color</label>
                <br>
                <input type="text" name="color" id="color" <?php if(isset($color)){echo "value='$color'";} ?> required>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addVehicle">
            </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>
<?php
?>