<html lang="en"> 
<head> 
    <title>Math Game - Confirmation</title> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mathgame.css">
</head> 
<body>
   <?php 
    $serverName = "mathgame.database.windows.net";
$connectionOptions = array(
    "Database" => "MathGame",
    "Uid" => "system",
    "PWD" => "2Isitclear2"
);
    $conn = sqlsrv_connect($serverName, $connectionOptions);
if( $conn ) {
     ;
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
$sql = "INSERT INTO Ppl (username, password) VALUES (?, ?)";
$params = array($_POST['username'], $_POST['password']);

$stmt = sqlsrv_query($conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
} ?>
   <div class= "container">
        <div class="row">
            <div class="col-xs-4 offset-xs-4">  
                <H1 class="text-center">Thanks for Signing Up</H1>
                <div class= "form-group">
                    <form action="login.php" method="post">
                        <button type="submit" class="btn btn-info"name="back">Back to Login</button>
                    </form>
                </div>
            </div>                     
        </div>
    </div>
</body> 
</html>