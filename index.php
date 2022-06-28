<?php
    session_start();
      
    $message = "";
    
    if((isset($_SESSION["random_number"])) && (isset($_SESSION["number_of_guesses"]))){
        $_SESSION["random_number"]= $_SESSION["random_number"];
        $_SESSION["number_of_guesses"] = $_SESSION["number_of_guesses"];
        
    }
    else{
        $_SESSION["random_number"]= rand(1,20);
        $_SESSION["number_of_guesses"]=0;
        
    }

        $random_number = $_SESSION["random_number"];
        $number_of_guesses= $_SESSION["number_of_guesses"];
    
    // checking and comparing user guess
    if(isset($_POST["submit"])){
        $user_num =$_POST["user_guess"];
        
        if(($user_num<1)||($user_num>30)){
            $message = "Invalid input";
        }
        else if ($user_num != $random_number){
            $message = 'Sorry try again </br>';
            $_SESSION["number_of_guesses"]++; 
        }
        else{
            $message = '
                You got it  after : '.$number_of_guesses.' attempts</br> 
                ';
            $_SESSION["number_of_guesses"]=0;
            $_SESSION["random_number"]= rand(1,20);
        }
    }    
    // echo $random_number; 
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/style.css">
    <script src="main.js"></script>
</head>
<body id="formbody">
    <div class="main" id="form-main">
        <div class="rules">
            <div class="rule-content">
                <h2>REMEMBER:</h2><br>
                <p>You loose 4 points at each failed attempt.</p><br>
                <h3>Goodluck!!</h>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>Highest Score: </h2>
                <h2></h2>                
            </div>
        </div>
        <div class="hero" id="hero-form">
            <form action="index.php" method="post">
                <h1 >Hello</h1><br>
                <h2>I have a secret number between 1 and 20&#128519;</br> can you guess it?</h2>
                <br>
                <input type="text" name="user_guess" id=""><br><br>
                <button type="submit" name="submit" class="btn-guess">Guess</button>
                <!-- <button type="submit" name="submit" class="btn-guess">Exit game</button> -->
            </form>
            <div class="modal-wrap" id="modal-w">
                <div class="modal-case" id="modal-c">
                <!-- <a class="close" id="X" >&times;</a> -->
                <p>
                    <?php
                        echo $message;
                    ?>
                </p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div id="copyright">
            <p><i>bysem&#10084;</i>@RocketSoftwareLtd</p>
        </div>
    </footer>

</body>
</html>
