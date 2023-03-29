<?php
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] <= 1){
    header('location: /phpmotors/');
}

// Build a car classification drop down list for the form
$classifList = "<select id='classificationId' name='classificationId'>";
foreach($classifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
    if(isset($classificationId)){
        if ($classification['classificationId'] == $classificationId){   // doble ==
            $classifList .= ' selected ';
        } 
    } 
    elseif(isset($invInfo['classificationId'])){
        if($classification['classificationId'] === $invInfo['classificationId']){
         $classifList .= ' selected ';
        }
       }
       $classifList .= ">$classification[classificationName]</option>";
       }
       $classifList .= '</select>';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <input type="text" name="make" id="make" required <?php if(isset($make)){ echo "value='$make'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>>
            <br>
            <br><label for="model">Model</label><br>
            <input type="text" name="model" id="model" required <?php if(isset($model)){ echo "value='$model'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>>
            <br>
            <br><label for="description">Description</label><br>
            <textarea name="description" id="description" required> <?php if(isset($description)){ echo $description; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
            <br>
            <br><label for="image">Image Path</label><br>
            <input type="text" name="image" id="image" required <?php if(isset($image)){ echo "value='$image'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>>
            <br>
            <br><label for="thumb">Thumbnail Path</label><br>
            <input type="text" name="thumb" id="thumb" required <?php if(isset($thumb)){ echo "value='$thumb'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>>
            <br>
            <br><label for="price">Price</label><br>
            <input type="number" name="price" id="price" required <?php if(isset($price)){ echo "value='$price'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>>
            <br>
            <br><label for="stock"># In Stock</label><br>
            <input type="number" name="stock" id="stock" required <?php if(isset($image)){ echo "value='$stock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>>
            <br>
            <br><label for="color">Color</label><br>
            <input type="text" name="color" id="color" required <?php if(isset($color)){ echo "value='$color'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>>
            <br>

            <input type="submit" name="submit" value="Update Vehicle">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">
        </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>