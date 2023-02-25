<?php
// Build a car classification drop down list for the form
$classifList = "<select id='classificationId' name='classificationId'>";
foreach($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if ($classification['classificationId'] === $classificationId){
            $classifList .= ' selected ';
        }
    }
    $classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';
?>

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
            <form method="POST" action="/phpmotors/vehicles/index.php" class="add-form">
                <label id="carClassifications">Classification</label><br>
                <?php echo $classifList; ?>
                <br>
                <br>
                <label for="make">Make</label><br><input type="text" name="make" id="make" <?php if(isset($make)){echo "value='$make'";}  ?> required>
                <br>
                <br><label for="model">Model</label><br><input type="text" name="model" id="model" <?php if(isset($model)){echo "value='$model'";}  ?>required>
                <br>
                <br><label for="description">Description</label><br><textarea name="description" id="description" required rows="10" cols="30"><?php if(isset($description)){echo "$description";}  ?></textarea>
                <br>
                <br><label for="image">Image Path</label><br><input type="text" name="image" id="image" required placeholder="/phpmotors/images/no-image.png" <?php if(isset($image)){echo "value='$image'";}  ?>>
                <br>
                <br><label for="thumb">Thumbnail Path</label><br><input type="text" name="thumb" id="thumb" required placeholder="/phpmotors/images/no-image.png" <?php if(isset($thumb)){echo "value='$thumb'";}  ?>>
                <br>
                <br><label for="price">Price</label><br><input type="number" name="price" id="price" required <?php if(isset($price)){echo "value='$price'";}  ?>>
                <br>
                <br><label for="stock"># In Stock</label><br><input type="number" name="stock" id="stock" required <?php if(isset($stock)){echo "value='$stock'";}  ?>>
                <br>
                <br><label for="color">Color</label><br><input type="text" name="color" id="color" required <?php if(isset($color)){echo "value='$color'";}  ?>>
                <br>
                <input type="submit" class="submit" name="submit" id="regbtn" value="Add Vehicle">
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