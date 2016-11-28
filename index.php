<!DOCTYPE html>
<html lang="en">

<head>
    <title>Math Login</title>
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
    <meta charset="utf-8" />
</head>

<?php
session_start(); 
$answerErr = "";
$answer = 0;
$counter = 0;
$score = 0;
    
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    if (!isset($_SESSION['counter'])){
        $_SESSION['counter'] = 0;
    }
    if ($_SESSION['sign'] == "+") {
        $answer = $_SESSION['first'] + $_SESSION['second'];
    } else {
        $answer = $_SESSION['first'] - $_SESSION['second'];
    }
    $valid = true;
    if ($_POST['answer'] != $answer) {
        $answerErr = "Wrong Answer!!";
            $valid = false;
            
    }
    if ($_POST['answer'] == $answer){
         $answerErr = "Good Answer!!";
            
        $score = $_SESSION['score'];
        $score++;
        $_SESSION['score'] = $score;
    }
    
    $counter = $_SESSION['counter'];
    $counter++;
    $_SESSION['counter'] = $counter;
}
    ?>


    <body>
        <div class="col-sm-6 col-sm-offset-4">
            <h1>Math Game</h1>
            <br />
        </div>
        <form class="form-horizontal" role="form" method="get" name="logout" id="logout" action="login.php">
            <div class="form-group">
                <div class="col-sm-2">
                    <input type='submit' name='Submit' class="btn btn-secondary" value='Log out' />
                </div>
            </div>
        </form>
        <form class="form-horizontal" role="form" method="post" name="test" id="test" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group" name="first">
                <div class="col-sm-3 col-sm-offset-2">
                    <?php  $first = rand(0,20);
                        $_SESSION['first'] = $first;
                        echo($first); ?>
                </div>
                <div class="col-sm-3">
                    <?php $int = rand(0,1);
                        $sign = "+-";
                        $rand_sign = $sign[$int];
                        $_SESSION['sign'] = $rand_sign;
                        echo $rand_sign; ?>
                </div>
                <div class="col-sm-3" name="second">
                    <?php $second = rand(0,20);
                        $_SESSION['second'] = $second;
                        echo($second); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="answer" class="col-sm-2 control-label">Enter Answer:</label>
                <div class="col-sm-8">
                    <input type='text' name='answer' class="form-control" id='answer' maxlength="50" placeholder="Enter Answer" />
                    <span class="error text-danger"><?php echo $answerErr;?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                    <input type='submit' name='Submit' class="btn btn-primary" value='Submit' />
                </div>
            </div>
            <hr />
            <div class="form-group">
                <div class="col-sm-2">
                    <h4>Score <?php if (isset($_SESSION['score'])) { 
                                        echo $_SESSION['score']; 
                                    } else { 
                                        echo 0; 
                                    } ?> / 
                                <?php if (isset($_SESSION['counter'])) { 
                                        echo $_SESSION['counter']; 
                                    } else { 
                                        echo 0;
                                    } ?> </h4>
                </div>
            </div>
        </form>
    </body>

</html>
