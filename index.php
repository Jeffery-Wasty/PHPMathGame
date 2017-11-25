<?php session_start(); ?>
<?php
    extract($_POST);
    $_SESSION["okay"];
        $textFile = file_get_contents("./credentials.config");
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $textFile) as $token){
            if ($token == ($email . ', ' . $password)) {
                $_SESSION["okay"] = 'true';
                }
            }
        if ($_SESSION["okay"] != 'true') {
            header("Location: login.php?error=true");
        }
    $email = $_SESSION["email"];
    $email = $_SESSION["password"];
    $randomNumber1 = rand(0,50);
    $randomNumber2 = rand(0,50);
    $randomOperatorChooser = rand(1,2);
    $randomOperator;
    $actualAnswer;
    $answerChecker;
    $resultDisplay;
    if (isset($userAnswer) && is_numeric($userAnswer)) {
        if ($userAnswer == $_SESSION['previousAnswer']) {
            $_SESSION['numberRight'] +=1;
            $_SESSION['numberAnswered'] +=1;
            $resultDisplay = 'Correct';
        } else {
            $_SESSION['numberAnswered'] +=1;
            $resultDisplay = 'Incorrect';
        }
    }
    if (isset($userAnswer) && !is_numeric($userAnswer)) {
        $resultDisplay = 'Please enter a number.';
    }   
    if ($randomOperatorChooser == 1) {
        $randomOperator = '+';
        $actualAnswer = $randomNumber1 + $randomNumber2;
        $_SESSION['previousAnswer'] = $actualAnswer;
    } else {
        $randomOperator = '-';
        $actualAnswer = $randomNumber1 - $randomNumber2;
        $_SESSION['previousAnswer'] = $actualAnswer;
    }
    
    
?>
<!DOCTYPE html>
<html lang="en"> 
<head> 
    <title>Math Game</title> 
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style/stylesheet.css" rel="stylesheet">
</head> 
<body>
    <div class="jumbotron text-center">
        <h2>Math Game</h2>
    </div>
    <div class="jumbotron">
    <form action="index.php" method="post">
        <div class="form-group text-center" id="math_stuff">
            <div class="col-xs-2 col-xs-offset-5"><?php echo $randomNumber1 . "&nbsp;&nbsp;" . $randomOperator . "&nbsp;&nbsp;" . $randomNumber2?></div>
        </div>
        <br/>
        <br/>
        <div class="form-group text-center col-xs-4 col-xs-offset-4">
            <input type="text" name="userAnswer" placeholder="Please enter a number." class="form-control input-lg"/>
        </div>
    <br/>
    <br/>
        <div class="form-group text-center col-xs-2 col-xs-offset-5">
            <button class="btn btn-primary btn-lg" type="submit" name="submit">Submit</button>
        </div>
        <br/>
    </form>
        <div class="form-group text-center col-xs-2 col-xs-offset-5">
            <a href="authenticate.php"><button type="submit" class="btn btn-warning btn-lg" name="logout">Logout</button></a>
        </div>
    <br/>
    <br/>
    <div class="form-group text-center">
        <h4><?php 
            if ($resultDisplay == 'Correct') {
                echo '<h4 id="good_message">' . $resultDisplay . '</h4>';
            } else if ($resultDisplay == 'Incorrect'){
                echo '<h4 class="bad_message">' . $resultDisplay . ': ' . $_SESSION['previousNumber1'] . ' ' . $_SESSION['previousOperator'] . ' ' . $_SESSION['previousNumber2'] . ' is ' . $_SESSION['previousCorrectAnswer'] . '.</h4>';
            } else {
                echo '<h4 class="bad_message">' . $resultDisplay . '</h4>';
            }
?></h4>
    </div>
    <h4 class="text-center" id="score"><?php echo "Score: " . $_SESSION['numberRight'] . "/" . $_SESSION['numberAnswered']?></h4>
        </div>
    <?php $_SESSION['previousNumber1'] = $randomNumber1;
        $_SESSION['previousNumber2'] = $randomNumber2;
        $_SESSION['previousOperator'] = $randomOperator;
        $_SESSION['previousCorrectAnswer'] = $actualAnswer;?>
</body> 
</html>