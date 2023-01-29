<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="co-authored by Ailen Mansilla, Tery Gasmen, Prince Chukwu">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/small.css" media="screen">
    <link rel="stylesheet" href="../css/large.css" media="screen">
    <title>PHP Motors | Login</title>
</head>
<body>
    <header>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php';
        echo $navList; ?>
    </nav>
    <main class='login_page'>
        <form action="/accounts/" method="POST">
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" name="submit" id="regbtn" value="Login">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="Login">
        </form>
       <span><p>No Account?</p><a href="../accounts/index.php?action=registration">Sign up</a></span>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>