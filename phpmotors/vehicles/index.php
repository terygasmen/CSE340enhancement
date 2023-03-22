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
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();
// Build a navigation bar using the $classifications array
$navList = createNavigationBar($classifications);

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

    /* * ********************************** 
    * Get vehicles by classificationId 
    * Used for starting Update & Delete process 
    * ********************************** */ 
    case 'getInventoryItems': 
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray); 
        break;

    case 'mod':
            $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
            $invInfo = getInvItemInfo($invId);
            if(count($invInfo)<1){
             $message = 'Sorry, no vehicle information could be found.';
            }
            include '../view/vehicle-update.php';
            exit;
           break;
    
    default:
        $classificationList = buildClassificationList($classifications);
        include "../view/vehicle-management.php";
        break;
        }
?>