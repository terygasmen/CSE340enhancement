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
            <form action="/vehicles/index.php" method="POST">
                <label>Classification Name</label>
                <br>
                <input type="text" name="newClassification" id="newClassification" required>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="addClass">
            </form>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>