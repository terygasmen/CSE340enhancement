<?php
// Vehicles controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
// Get the functions library
// require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
    $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// $navList = createNavigationBar($classifications);

// Build a car classification drop down list for the form
// $carClassifications = "<select name='carClassifications'>";
// foreach($classifications as $classification) {
//     $tag = '<option value=""';
//     if(isset($classificationId)){
//         if ($classification['classificationId'] === $classificationId){
//             $tag .= ' selected ';
//         }
//     }
//     $tag .= '>'.$classification['classificationName'].'</option>';
//     $tag = substr_replace($tag, $classification['classificationId'], 15, 0);
//     $carClassifications .= $tag;
// }
// $carClassifications .= '</select>';


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

    case 'addVehicle':
            // Filter the input
            $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $make = trim(filter_input(INPUT_POST, 'make', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $model = trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $image = trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $thumb = trim(filter_input(INPUT_POST, 'thumb', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
            $stock = trim(filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $color = trim(filter_input(INPUT_POST, 'color', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            // Check for missing data
            if(empty($classificationId) || empty($make) || empty($model) || empty($description) || empty($image) || empty($thumb) || empty($price) || empty($stock) || empty($color)){
                $message = '<p>Please provide information for all empty form fields.</p>';
                include '../view/add-vehicle.php';
                exit; 
            }
            // Add Data to database
            $AddVehicleReport = newVehicle($make, $model, $description, $image, $thumb, $price, $stock, $color, $classificationId);
            // Check and report the result
            if($AddVehicleReport === 1){
                $message = "<p>Vehicle registration was a success.</p>";
                include '../view/vehicle-management.php';
                exit;
            } else {
                $message = "<p>Sorry, but the registration failed. Please try again.</p>";
                include '../view/add-vehicle.php';
                exit;
            }
            // break;

    case 'addClass':
        // Filter the input
        $newClass = trim(filter_input(INPUT_POST, 'newClassification', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
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
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
        // break;

        case 'vehicleManagement':
            include "../view/vehicle-management.php";
            break;
    
        default:
            include "../view/vehicle-management.php";
            break;
        }
?>