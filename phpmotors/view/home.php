<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ailen Mansilla">
    <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/small.css" media="screen">
    <link rel="stylesheet" href="css/large.css" media="screen">
    <title>Home - PHP Motors</title>
</head>
<body class="main_page">
    <header>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/header.php'; ?>
    </header>
    <nav>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/nav.php'; ?>
    </nav>
    <main>
        <h1>Welcome to PHP Motors!</h1>
        <div id="car-info">
            <h2>DMC Delorean</h2>
            <p>3 Cup holders<br>Superman doors<br>Fuzzy dice!</p>
            <a href="#" class="own-button">Own Today</a>
            <img src="images/delorean.jpg" class="car-picture" alt="dmc delorean car picture">
        </div>
        <div id="car-upgrades">
            <h3>Delorean Upgrades</h3>
            <div id='flux-capacitor'>
                <img src="images/upgrades/flux-cap.png" alt="Flux capacitor">
                <a href="#">Flux Capacitor</a>
            </div>
            <div id='flame-decals'>
                <img src="images/upgrades/flame.jpg" alt="flame declas">
                <a href="#">Flame Decals</a>
            </div>
            <div id='bumper-stickers'>
                <img src="images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                <a href="#">Bumper Sticker</a>
            </div>
            <div id='hub-caps'>
                <img src="images/upgrades/hub-cap.jpg" alt="Hub caps">
                <a href="#">Hub Caps</a>
            </div>
        </div>
        <div id="car-reviews">
            <h3>DMC Delorean Reviews</h3>
            <ul>
                <li>"So fast its almost like traveling in time." (4/5)</li>
                <li>"Coolest ride on the road." (4/5)</li>
                <li>"I'm feeling Marty McFly!" (5/5)</li>
                <li>"The most futuristic ride of our day." (4.5/5)</li>
                <li>"80's livin and I love it!" (5/5)</li>
            </ul>
        </div>
        
    </main>
    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>
</html>