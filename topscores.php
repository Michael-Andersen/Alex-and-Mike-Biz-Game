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
                <H1 class="text-center">TOP SCORES</H1>
                </div>                     
        </div>
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
$sql = "SELECT TOP 5 username, highScore FROM Ppl ORDER BY highScore DESC";
                //$s = 2;
                //$params = array($s); 
$stmt = sqlsrv_query($conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
        while( $obj = sqlsrv_fetch_object($stmt)){
            echo '<div class="row">
            <div class="col-xs-4 offset-xs-4">  '.$obj->username . '</div><div class="col-xs-4">'. $obj->highScore . '</div></div>';
        }
          sqlsrv_close( $conn );
   
    ?>
       <br/><br/><div class="row"><div class="col-xs-4 offset-xs-4"><div class= "form-group">
                                    <form method="Post" action="login.php">
                                        <button class="btn btn-info" name="login" type="submit">Back to Login</button></form></div><div></div>
            
    </div>
</body> 
</html>




