<?php
    ob_start();
    session_start();

    if(isset($_SESSION["random_number"])){
        $_SESSION["random_number"]= $_SESSION["random_number"];
    }else{
        $_SESSION["random_number"]= rand(1,3);
    }

    if(isset($_SESSION["number_of_guesses"])){
        $_SESSION["number_of_guesses"] = $_SESSION["number_of_guesses"];
    }else{
        $_SESSION["number_of_guesses"]=0;
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
    <form action="madam.php" method="post">
        <h1>Choose a number between 1 and 20</h1>
        <input type="text" name="user_guess" id="">
        <button type="submit" name="guess_submitted">PLAY</button>
    </form>
</body>
</html>
<?php 
    echo "<pre>", print_r($_SESSION),"</pre>";
?>