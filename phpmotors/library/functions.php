<?php
// Custom Functions library

    // validates email address
    function checkEmail($clientEmail){
        $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
        return $valEmail;
    }

    // Check the password for a minimum of 8 characters,
    // at least one 1 capital letter, at least 1 number and
    // at least 1 special character
    function checkPassword($clientPassword){
        $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
        return preg_match($pattern, $clientPassword);
    }

    // The function builds the nav bar.
    function createNavigationBar($classifications){
        // Build a navigation bar using the $classifications array
        $navList = '<ul>';
        $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
        foreach ($classifications as $classification) {
            $navList .= "<li><a href='/vehicles/index.php?action=classification&classificationName=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
        }
        $navList .= '</ul>';

        // Return the navbar.
        return $navList;
    }

    // Build the classifications select list 
    function buildClassificationList($classifications){ 
        $classificationList = '<select name="classificationId" id="classificationList">'; 
        $classificationList .= "<option>Choose a Classification</option>"; 
        foreach ($classifications as $classification) { 
            $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
        } 
        $classificationList .= '</select>'; 
        return $classificationList; 
    }

    // The function will build a display of vehicles within an unordered list.
    function buildVehiclesDisplay($vehicles){
        $dv = '<ul id="inv-display">';
        foreach ($vehicles as $vehicle) {
            $dv .= '<li>';
            $dv .= "<a href = '/vehicles/index.php?action=vehicleView&Vehicle=$vehicle[invId]'>";
            $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
            $dv .= '<hr>';
            $dv .= "<h2>$vehicle[invMake] $vehicle[invModel]</h2>";
            $dv .= "<span>$vehicle[invPrice]</span>";
            $dv .= '</a>';
            $dv .= '</li>';
        }
        $dv .= '</ul>';
        return $dv;
    }

?>