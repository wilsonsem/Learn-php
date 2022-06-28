<?php
// generate a random number for user to guess

session_start();
$number = rand(1,5);
$counter=$_SESSION["counter"];

if(isset($_SESSION["counter"])){
    $_SESSION["counter"] = $_SESSION["counter"];
    
}else{
    $_SESSION["counter"]=0;
}

if (isset($_POST["submit"])){
    $userguess = $_POST["userguess"];
    $number = $_POST["guess"];
    $scores = [];
    
    if ($userguess < $number){ 
        echo "Guess Higher";
        $_SESSION["counter"]++;
    }
    else if($userguess > $number){
        echo "Guess Lower";
        $_SESSION["counter"]++;
    }
    else { 
        $score = 100 - ($counter * 20);
        if($counter == 0){
            echo "<br/>Random Number:".$number."<br/>Wow you got it at the first attempt</br>Your score is".$score;
        }else if($counter == 1){
            echo "<br/>Random Number:".$number."<br/>You got it after: ".$counter." attempt</br>Your score is ".$score;
        }else{
            echo "<br/>Random Number:".$number."<br/>You got it after: ".$counter." attempts</br>Your score is ".$score."</br>";
        }
        $number = rand(1,5);
        $_SESSION["counter"]=0;
        
        // for($i=1, $i<= ){
        //     array_push($scores, $score);
        // }
        // print_r($scores);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="checkguess.php" method="post" >
        <label for="guess">Guess A Number:</label><br/ >
        <input type="text" name="userguess" />
        <input name="guess" type="text" value="<?= $number ?>" />
        <button name="submit" type="submit">PLAY </button>
    </form>
</body>
</html>
