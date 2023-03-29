<?php 
if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2){
    header('Location: /index.php/');
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/css/small.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/large.css" media="screen">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <title>Vehicle Management - PHP Motors</title>
</head>
<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php echo $navList; ?>
    </nav>
    <main>
    <h1>Vehicle Management</h1>
            <?php
                if (isset($message)) {
                    echo $message;
                }
            ?>
            <div id="links-add-vehicle-and-classification">
                <ul>
                    <li><a href = "/phpmotors/vehicles/?action=classification">Add a car classification.</a></li>
                    <li><a href = "/phpmotors/vehicles/?action=vehicle">Add a vehicle to inventory.</a></li>
                </ul>
            </div>
            <?php
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
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>