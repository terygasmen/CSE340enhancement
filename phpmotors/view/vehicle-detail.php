<!DOCTYPE html>
<html lang="en-US">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/phpmotors/css/small.css" media="screen">
        <link rel="stylesheet" href="/phpmotors/css/large.css" media="screen">
        <title><?php echo $classificationName; ?> Vehicle Details | PHP Motors, Inc.</title>
</head>
<body>
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main class="vehicle-detail_page">
            <h1><?php echo "$vehiclesDetail[invMake] $vehiclesDetail[invModel]"; ?></h1>
            <?php 
                if(isset($message)){
                    echo $message; }
            ?>
            <?php 
                if(isset($thumbnailsList)){
                    echo $thumbnailsList;
                }
            ?>
            <?php 
            if(isset($vehicleHTML)){
                    echo $vehicleHTML; } 
            ?>

        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
</body>
</html>