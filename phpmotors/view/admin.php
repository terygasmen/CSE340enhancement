<?php
    if (!$_SESSION['loggedin']){
        header('Location: /index.php/');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
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
        <h1><?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname']; ?></h1>
            <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
            ?>
            <p>You are logged in.</p>
        <ul>
            <li><?php echo "First Name: ".$_SESSION['clientData']['clientFirstname']; ?></li>
            <li><?php echo "Last Name: ".$_SESSION['clientData']['clientLastname'] ?></li>
            <li><?php echo "Email: ".$_SESSION['clientData']['clientEmail']; ?></li>
        </ul>

        <h2>Account Management</h2>
        <p>Use this link to update account information</p>
        <p><a href = "/phpmotors/accounts/index.php/?action=updateInfo">Update Account Information</a></p>
        <?php
            if (intval($_SESSION['clientData']['clientLevel']) > 1){
                echo "<h2>Inventory Management</h2>";
                echo "<p>Use this link to manage the inventory</p>";
                echo "<a href = '/phpmotors/vehicles/'>Vehicle Management</a>";
            }
        ?>
        <h3>Your Reviews</h3>
        <?php // Put the reviews on the page.
        if (isset($reviewHTML)){
            echo $reviewHTML;
        } ?>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>
<?php unset($_SESSION['message']); ?>