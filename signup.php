<html lang="en"> 
<head> 
    <title>Math Game - Sign Up</title> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mathgame.css">
</head> 
<body>
   <div class= "container">
        <div class="row">
            <div class="col-xs-4 offset-xs-4">  
                <H1 class="text-center">Please provide a username and password</H1>
                <div class= "form-group">
                    <form action="confirm.php" method="post">
                        <label for="username">Username:</label><input class="form-control" type="username" name="username">
                        <label for="password">Password:</label><input class="form-control" type="password" name="password"><br/>
                        <button type="submit" class="btn btn-info"name="submit">Submit</button>
                    </form>
                </div>
            </div>                     
        </div>
    </div>
</body> 
</html>