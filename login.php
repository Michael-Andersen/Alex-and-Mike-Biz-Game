<?php session_start();
    if(isset($_SESSION['username'])){
        header("location:index.php");die;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ALEX &amp; MIKE'S BIZ GAME</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mathgame.css">
</head>

<body>
    <div class="container">
        <div class="row">
           <img class="center-block img-responsive" src="images/logoadjust.png">
                <br />
            <div class="col-sm-6 col-sm-offset-3">
                
                <div class="form-group">
                    <form action="index.php" method="post">
                        <label for="username">Username:</label><input class="form-control" name="username"><br />
                        <label for="password">Password:</label><input class="form-control" type="password" name="password"><br /><br />
                        <button type="submit" class="btn btn-info btn-group-justified" name="login">Login</button><br/>
                    </form>
                    <form action="signup.php" method="post"><button type="submit" class="btn btn-info btn-group-justified" name="signup">Sign Up</button>
                    </form>
                    <br/>
                    <form method="Post" action="topscores.php">
                        <button class="btn btn-success btn-group-justified" name="topscores" type="submit">Top Scores</button></form>
                </div>
                <?php echo '<span class="warning">'.$_GET['error'].'</span>';?>

                <br /><small><b>Disclaimer:</b><br />Alex and Mike's Biz Game uses questions sourced from the Contemporary Business textbook purely for educational purposes only. We do not own this content and if there are any issues regarding the use of the material please contact us and we will remove it promptly.</small>

            </div>
        </div>
    </div>
</body>

</html>
