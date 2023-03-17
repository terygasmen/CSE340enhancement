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
        <?php echo $navList; ?>
    </nav>
    <main class='login_page'>
        <?php
            if (isset($message)) {
                echo $message;
            }
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
        ?>
        <form action="/phpmotors/accounts/" method="post">
        <label>Email</label>
                <br>
                <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                <br>
                <br>
                <label>Password</label>
                <br>
                <span id = "pass-label">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                <br>
                <input type="submit" name="submit" id="regbtn" value="Login">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="Login">
        </form>
       <div><p>No Account?</p><a href="../accounts/index.php?action=registration">Sign up</a></div>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>