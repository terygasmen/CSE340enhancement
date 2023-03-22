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

<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ailen Mansilla">
    <link rel="stylesheet" href="/phpmotors/css/small.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/large.css" media="screen">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
elseif(isset($invMake) && isset($invModel)) { 
        echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main>
        <?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?>
<noscript>
    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>
    <table id="inventoryDisplay"></table>
    <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?></h1>
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
                <label for="make">Make</label><br>
                <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
                <br>
                <br><label for="model">Model</label><br>
                <input type="text" name="model" id="model" required <?php if(isset($model)){ echo "value='$model'"; } elseif(isset($invInfo['model'])) {echo "value='$invInfo[model]'"; }?>>
                <br>
                <br><label for="description">Description</label><br>
                <textarea name="description" id="description" required>
<?php if(isset($description)){ echo $description; } elseif(isset($invInfo['description'])) {echo $invInfo['description']; }?></textarea>
                <br>
                <br><label for="image">Image Path</label><br>
                <input type="text" name="image" id="image" required <?php if(isset($image)){ echo "value='$image'"; } elseif(isset($invInfo['image'])) {echo "value='$invInfo[image]'"; }?>>
                <br>
                <br><label for="thumb">Thumbnail Path</label><br>
                <input type="text" name="thumb" id="thumb" required <?php if(isset($thumb)){ echo "value='$thumb'"; } elseif(isset($invInfo['thumb'])) {echo "value='$invInfo[thumb]'"; }?>>
                <br>
                <br><label for="price">Price</label><br>
                <input type="number" name="price" id="price" required <?php if(isset($price)){ echo "value='$price'"; } elseif(isset($invInfo['price'])) {echo "value='$invInfo[price]'"; }?>>
                <br>
                <br><label for="stock"># In Stock</label><br>
                <input type="number" name="stock" id="stock" required <?php if(isset($image)){ echo "value='$stock'"; } elseif(isset($invInfo['stock'])) {echo "value='$invInfo[stock]'"; }?>>
                <br>
                <br><label for="color">Color</label><br>
                <input type="text" name="color" id="color" required <?php if(isset($color)){ echo "value='$color'"; } elseif(isset($invInfo['color'])) {echo "value='$invInfo[color]'"; }?>>
                <br>
                <input type="submit" name="submit" value="Update Vehicle">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="updateVehicle">
            </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
<script src="../js/inventory.js"></script>
</html>
<?php
?>