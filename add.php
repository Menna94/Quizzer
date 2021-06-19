<?php
require "db.php";

if(isset($_POST['submit'])){
    //Get Post Variables
    $question_num = $_POST['qNumber'];
    $question_txt = $_POST['qText'];
    $correct_choice = $_POST['correct'];

    //Choices Array
    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];

    /*
        Insert Question
    */
    $query = "INSERT INTO `questions` (question_num, question_txt) VALUES ($question_num, '$question_txt')";
    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

    //Validation
    if($insert_row){
        foreach($choices as $choice=> $val){
            if($val != ''){
                if($correct_choice == $choice){
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }

                /*
                    Choices Query
                */
                $sql =  "INSERT INTO `choices` (question_num, is_correct, choice_text) VALUES ($question_num, $is_correct,'$val')";
                $res = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                //Validation
                if($res){
                    continue;
                } else {
                    die(
                        'ERROR:('. $mysqli->errno .')' 
                        . $mysqli->error
                    );
                }
            }
        }
        $msg = 'Question has been added.';
    }

}

/*
        Get Total Questions
    */
    $sql = "SELECT * from `questions`";
    $result = $mysqli->query($sql) or die($mysqli_error.__LINE__);
    //Get total
    $total = $result->num_rows;
    $next = $total+1;
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
       <h2>Add A Question</h2>
       <?php
            if(isset($msg)){
                echo '<p>'.$msg.'</p>';
            }
       ?>
       <form action="add.php" method="post">
        <p>
            <label for="">Question Number</label>
            <input type="number" name="qNumber" value="<?php echo $next; ?>">
        </p>
        <p>
            <label for="">Question Text</label>
            <input type="text" name="qText">
        </p>
        <p>
            <label for="">Choice #1 :</label>
            <input type="text" name="choice1">
        </p>
        <p>
            <label for="">Choice #2 :</label>
            <input type="text" name="choice2">
        </p>
        <p>
            <label for="">Choice #3 :</label>
            <input type="text" name="choice3">
        </p>
        <p>
            <label for="">Choice #4 :</label>
            <input type="text" name="choice4">
        </p>
        <p>
            <label for="">Choice #5 :</label>
            <input type="text" name="choice5">
        </p>

        <p>
            <label for="">Correct Choice Number: </label>
            <input type="number" name="correct">
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
        </p>
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