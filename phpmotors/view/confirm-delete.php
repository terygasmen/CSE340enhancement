<?php 
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Electrolize&family=Share+Tech&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/phpmotors/css/small.css" media="screen">
        <link rel="stylesheet" href="/phpmotors/css/large.css" media="screen">
        <title>Delete Review | PHP Motors, Inc.</title>
</head>
<body>
    <div class = "page">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Confirm Delete</h1>
            <p>
                Do you want to delete this post?
            </p>
            <?php
            if (isset($message)) {
                echo $message;
            } ?>
            <form action="/phpmotors/reviews/index.php" method="POST" <?php if (!$_SESSION['loggedin']){echo "hidden";} ?>>
                <label>Name as it appears</label>
                <br>
                <input name="clientname" id="clientname" type="text" <?php echo 'value="'.substr($review['clientFirstname'], 0, 1).". ".$review['clientLastname'].'"'; ?> readonly>
                <br>
                <br>
                <label>Review posted on</label>
                <br>
                <input name="date" id="date" type="text" <?php echo 'value="'.$review['reviewDate'].'"'; ?> readonly>
                <br>
                <br>
                <label>Review</label>
                <br>
                <textarea id="review" name="newReview" rows="4" cols="50" readonly><?php echo $review['reviewText'];  ?></textarea>
                <br>
                <input type="submit" name="submit" id="regbtn" value="Delete Review">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="deleteReview">
                <input type="hidden" name="review" <?php echo 'value="'.$reviewId.'"' ?>>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>
</html>
<?php unset($_SESSION['message']); ?>