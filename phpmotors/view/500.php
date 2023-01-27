<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ailen Mansilla">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/small.css" media="screen">
    <link rel="stylesheet" href="../css/large.css" media="screen">
    <title>Error 505 - PHP Motors</title>
</head>
<body>
    <header>
        <img src="../images/site/logo.png" alt='PHP Motors Logo' id='logo'>
        <a href="" id="access">My Account</a>
    </header>
    <nav>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/nav.php'; ?>
    </nav>
    <main>
        <div id='error-505'>
            <h1>Server Error</h1>
            <p id='server-error-description'>Sorry, our server seems to be experiencing some technical difficulties</p>
        </div>
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>
