<?php 
require "db.php"; 

session_start();

//Check if the score is set
if(!isset($_SESSION['score'])){
    $_SESSION['score']= 0;
}
if($_POST){
    $num = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $num+1;

    /*
        Get Total Questions
    */
    $sql = "SELECT * from `questions`";
    $result = $mysqli->query($sql) or die($mysqli_error.__LINE__);
    //Get total
    $total = $result->num_rows;

    /*
        Get Correct Choice
    */ 
    $query = "SELECT * FROM `choices` WHERE question_num=$num AND is_correct=1";
    $res = $mysqli->query($query) or die($mysqli->error.__LINE__);
    //Get Row
    $row = $res-> fetch_assoc();

    //Set Correct Choice
    $correct_choice = $row['id'];

    //Compare
    if($correct_choice == $selected_choice){
        //Answer is Correct
        $_SESSION['score']++ ;
    }

    //Redirect
    if($num == $total){
        header("Location: final.php");
        exit();
    }else{
        header("Location: question.php?n=".$next);
    }
}
?>