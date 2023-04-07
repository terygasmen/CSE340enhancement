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

            <h3>Customer Review</h3>
            <?php 
                if (!$_SESSION['loggedin']){
                    echo '<p>You can <a href = "/phpmotors/accounts/index.php?action=login">login</a> to create a review.</p>';
                }
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <form action="/phpmotors/reviews/" method="POST" <?php if (!$_SESSION['loggedin']){echo "hidden";} ?>>
                <label>Add your own review</label>
                <br>
                <textarea id="review" name="newReview" rows="4" cols="50" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required></textarea>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Add Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addReview">
                <input type="hidden" name="userId" <?php echo 'value="'.$_SESSION['clientData']['clientId'].'"' ?>>
                <input type="hidden" name="carId" <?php echo 'value="'.$vehicleId.'"' ?>>
            </form>
            <?php 
                // Put the reviews on the page.
                if (isset($reviewHTML)){
                    echo $reviewHTML;
                }
            ?>

        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
</body>
</html>