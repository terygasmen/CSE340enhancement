<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="co-authored by Ailen Mansilla, Tery Gasmen, Prince Chukwu">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/small.css" media="screen">
    <link rel="stylesheet" href="css/large.css" media="screen">
    <title>PHP Motors</title>
</head>
<body>
    <header>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php';
        echo $navList; ?>
    </nav>
    <main>
        <h1>Content Title Here</h1>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>