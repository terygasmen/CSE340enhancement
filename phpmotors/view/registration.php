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
    <title>PHP Motors | Registration</title>
</head>
<body >
    <header>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
        <?php //include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php';
        echo $navList; ?>
    </nav>
    <main class="registration_page">
        <?php 
            if(isset($message)) {
            echo $message;
            }
        ?>
    <form action="/phpmotors/accounts/index.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="clientFirstname">
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="clientLastname">
        <br>
        <label for="email">Email address:</label>
        <input type="email" id="email" name="clientEmail">
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="clientPassword">
        <br>
        <input type="submit" name="submit" id="regbtn" value="Register">
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="register">
    </form>

    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>