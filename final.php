<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer&copy; </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>

    <main>
    <div class="container">
        <h2>You're Done!</h2>
        <p>Congrats! You've Completed The Test...</p>
        <p>Final Score: <strong> <?php echo $_SESSION['score']; ?> </strong>  </p>
        <a href="question.php?n=1" class="start"> Take Again </a>
    </div>
        
    </main>

    <footer>
        <div class="container">
            Copyright MPS&copy;
        </div>
    </footer>
</body>
</html>