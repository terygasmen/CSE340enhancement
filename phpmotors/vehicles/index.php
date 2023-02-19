<?php
// Vehicles controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Test if we are getting something from database
// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// Build a car classification drop down list for the form
$carClassifications = "<select name='carClassifications'>";
foreach($classifications as $classification) {
    $tag = '<option value=""';
    // $tag = '<option value="' . $classification['classificationId'] . '"';
    if(isset($classificationId)){
        if ($classification['classificationId'] === $classificationId){
            $tag .= ' selected ';
        }
    }
    $tag .= '>'.$classification['classificationName'].'</option>';
    $tag = substr_replace($tag, $classification['classificationId'], 15, 0);
    $carClassifications .= $tag;
}
$carClassifications .= '</select>';


$action = filter_input(INPUT_POST, 'action');
  if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'classification':
        include "../view/add-classification.php";
        break;
    
    case 'vehicle':
        include "../view/add-vehicle.php";
        break;

    case 'addClass':
        // Filter the input
        $newClass = filter_input(INPUT_POST, 'newClassification');
        // Check for missing data
        if(empty($newClass)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit; 
        }
        // Add Data to database
        $AddClassReport = newClassification($newClass);
        // Check and report the result
        if($AddClassReport === 1){
            $message = "<p>Car Classification registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
        // break;

    case 'addVehicle':
        // test output of variables
        // var_dump($classType);
        // Filter the input
        $classificationId = filter_input(INPUT_POST, 'classificationId');
        $make = filter_input(INPUT_POST, 'make');
        $model = filter_input(INPUT_POST, 'model');
        $description = filter_input(INPUT_POST, 'description');
        $image = filter_input(INPUT_POST, 'image');
        $thumb = filter_input(INPUT_POST, 'thumb');
        $price = filter_input(INPUT_POST, 'price');
        $stock = filter_input(INPUT_POST, 'stock');
        $color = filter_input(INPUT_POST, 'color');
        // Check for missing data
        if(empty($classificationId) || empty($make) || empty($model) || empty($description) || empty($image) || empty($thumb) || empty($price) || empty($stock) || empty($color)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
        }
        // Add Data to database
        $AddVehicleReport = newVehicle($classificationId, $make, $model, $description, $image, $thumb, $price, $stock, $color);
        // Check and report the result
        if($AddVehicleReport === 1){
            $message = "<p>Vehical registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        // break;

    case 'vehicleManagement':
        include "../view/vehicle-management.php";
        break;
    
        default:
        // $classificationList = buildClassificationList($classifications);
        include "../view/vehicle-management.php";
        break;
    }
?>