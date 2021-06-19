<?php require "db.php"; ?>
<?php
    // Get Total Questions
    $query = "SELECT * FROM `questions`";
    // Get results
    $res = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $res->num_rows;
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
            <h2> Test Your PHP Knowledge</h2>
            <p>This is MCQ to test your knowledge of PHP</p>
            <ul>
                <li> <strong>Number of Questions: </strong> <?php echo $total; ?></li>
                <li> <strong>Type : </strong> MCQ </li>
                <li> <strong>Estimated Time:  </strong> <?php echo $total* .5; ?> Minutes </li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>

    <footer>
        <div class="container">
            Copyright MPS&copy;
        </div>
    </footer>
</body>
</html>