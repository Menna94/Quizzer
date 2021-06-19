<?php require "db.php"; ?>
<?php session_start();?>
<?php 
    $num = (int) $_GET['n'];
    /*
        Get the Question
    */
    $sql_query = "SELECT * from `questions` WHERE question_num = $num";
    // Get result
    $res = $mysqli->query($sql_query) or die($mysqli->error.__LINE__);
    $question = $res->fetch_assoc();

    /*
        Get the Choices
    */
    $query = "SELECT * from `choices` WHERE question_num = $num";
    // Get result
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

    /*
        Get Total Questions
    */
    $sql = "SELECT * from `questions`";
    $result = $mysqli->query($sql) or die($mysqli_error.__LINE__);
    //Get total
    $total = $result->num_rows;
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
        <div class="current"> Question <span> <?php echo $question['question_num']; ?> </span> of <strong> <?php echo $total; ?> </strong> </div>
        <p class="question"><?php $question['question_txt'];  ?></p>
        <form action="process.php" method="post">
            <ul class="choices">
                <?php while($row = $choices->fetch_assoc()): ?>
                    <li> <input type="radio" name="choice" value="<?php echo $row['id']; ?>" ><?php echo $row['text']; ?> </li>
                <?php endwhile; ?>
            </ul>
            <input type="submit" value="Submit">
            <input type="hidden" name="number" value="<?php echo $num; ?>">
        </form>
    </div>
        
    </main>

    <footer>
        <div class="container">
            Copyright MPS&copy;
        </div>
    </footer>
</body>
</html>