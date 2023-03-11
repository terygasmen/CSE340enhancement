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

        <div id='main-registration'>
        <h1>Register here</h1>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form method="post" action="/phpmotors/accounts/index.php">
            <label for="fName">First Name:</label> <br><input type="text" id="firstName" name="clientFirstname" required <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> >
            <br><label for="lName">Last Name:</label><br><input type="text" id="lastName" name="clientLastname" required <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>>
            <br><label for="email">Email address:</label><br><input type="email" id="email" name="clientEmail" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>>
            <br><label for="password">Password:</label> <br> 
            <span class="password-specifications">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <br><input type="submit" id="regbtn" class="submit" name ="submit" value="Register">
            <!-- Action name - value pair -->
            <input type="hidden" name="action" value="register">
        </form>
        </div>
    </main>
    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>