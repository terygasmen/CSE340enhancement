<?php

// This is the main controller

// Create or access a Session
session_start();

// Get the database connection file
require_once 'library/connections.php';
// Get the main model for use as needed
require_once 'model/main-model.php';
// Get the functions library
require_once 'library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = navbar($classifications);

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

switch ($action){
    case 'template':
        include 'view/template.php';
        break;
    default:
        include 'view/home.php';
        break;
}
?>