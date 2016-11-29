<!DOCTYPE html>
<html lang="en">

<head>
    <title>Math Login</title>
    <link rel="stylesheet" href="style/bootstrap.css" type="text/css" />
    <meta charset="utf-8" />
</head>

<?php  
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $valid = true;
    if ($_POST['email'] != "a@a.a") {
        $emailErr = "Wrong Email!";
            $valid = false;
    }
    
    if ($_POST['password'] != "aaa") {
        $passwordErr = "Wrong Password!";
            $valid = false;
    }
     if ($valid) {
         session_start();
        header('Location: index.php');
        die();
    }
}
    
    ?>


    <body>
        <div class="col-sm-12 col-sm-offset-2">
            <h1>Please Login to Play Math Game</h1>
            <br />
        </div>

        <form class="form-horizontal" role="form" method="post" name="login" id="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email:</label>
                <div class="col-sm-7">
                    <input type='text' class="form-control" name='email' id='email' maxlength="50" placeholder="Email" />
                    <span class="error text-danger"><?php echo $emailErr;?>
    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-7">
                    <input type='password' name='password' class="form-control" id='password' maxlength="50" placeholder="Password" />
                    <span class="error text-danger"><?php echo $passwordErr;?></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <input type='submit' name='Submit' class="btn btn-primary" value='Submit' />
                </div>
            </div>
        </form>
    </body>

</html>
