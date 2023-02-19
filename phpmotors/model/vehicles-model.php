<?php
// Contain a function for inserting a new classification to the carclassifications table.

function newClassification($classifcationName){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO carclassification (classificationName)
            VALUES (:classificationName)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classifcationName, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// Contain a function for inserting a new vehicle to the inventory table.

function newVehicle($make, $model, $description, $image, $thumb, $price, $stock, $color, $classificationId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO inventory (make, model, description, image, thumb, price, stock, color, classificationId)
            VALUES (:make, :model, :description, :image, :thumb, :price, :stock, :color, :classificationId)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':make', $make, PDO::PARAM_STR);
    $stmt->bindValue(':model', $model, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':image', $image, PDO::PARAM_STR);
    $stmt->bindValue(':thumb', $thumb, PDO::PARAM_STR);
    $stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $stmt->bindValue(':stock', $stock, PDO::PARAM_STR);
    $stmt->bindValue(':color', $color, PDO::PARAM_STR);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
?>