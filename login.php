<?php session_start(); ?>
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
            <h2>Please login to enjoy our math game.</h2>
        </div>
        <div class="text-center">
            <span class="error"><?php 
                extract($_GET); 
                if($error) {
                    echo "Please enter a correct email address and password.<br/><br/>";
                }
                ?></span>
        </div>
        <form class="form-horizontal login" action="index.php" method="post">
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-2">Email:</label>
                <div class="col-xs-6 col-xs-offset-right-2 col-sm-4 col-sm-offset-right-4">
                <input type="text" name="email" class="form-control" placeholder="Email"/></div>
            </div>
            <br/>
            <div class="form-group">
                <label class="control-label col-xs-2 col-xs-offset-2">Password:</label>
                <div class="col-xs-6 col-xs-offset-right-2 col-sm-4 col-sm-offset-right-4">
                <input type="text" name="password" class="form-control" placeholder="Password"/></div>
            </div>
            <br/>
                <div class="form-group text-center">
                    <div class="col-lg-1 col-lg-offset-5">
                        <button class="btn btn-primary btn-lg" type="submit">Login</button>
                    </div>
                </div>
        </form>
        <?php 
        $_SESSION['numberRight'] = 0; 
        $_SESSION['numberAnswered'] = 0;
        $endSession == 'false';
        ?>
    </body> 
</html>