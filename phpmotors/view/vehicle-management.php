<!-- // This view must contain two links:
// One to the controller that will trigger the delivery of the add classification view.
// One to the controller that will trigger the delivery of the add vehicle view. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ailen Mansilla">
    <link rel="stylesheet" href="../css/small.css" media="screen">
    <link rel="stylesheet" href="../css/large.css" media="screen">
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
            <p><a href = "/phpmotors/vehicles/index.php/?action=classification">Add a car classification.</a></p>
            <p><a href = "/phpmotors/vehicles/index.php/?action=vehicle">Add a vehicle to inventory.</a></p>
            <?php
            if (isset($classificationList)) { 
                echo '<h2>Vehicles By Classification</h2>'; 
                echo '<p>Choose a classification to see those vehicles</p>'; 
                echo $classificationList; 
            }
            ?>
            
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>