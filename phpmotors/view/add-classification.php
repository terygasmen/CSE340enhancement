<?php 
if (!($_SESSION['loggedin'] && intval($_SESSION['clientData']['clientLevel']) > 1)) {
    header('location: /phpmotors/');
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h1>Add Car Classification</h1>
        <?php
            if (isset($message)) { 
            echo $message; 
            } 
        ?>
        <form method="POST" action="/phpmotors/vehicles/index.php"  class="add-form">
            <label for="newClassification">Classification Name</label><br>
            <span class="password-specifications">The classification name can not be longer than 30 characters</span><br>
            <input type="text" maxlength="30" name="newClassification" id="newClassification" required><br>
            
            <input type="submit" class="submit" name="submit" id="regbtn" value="Register">
            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="addClass">
        </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
<script src="../js/inventory.js"></script>
</html>