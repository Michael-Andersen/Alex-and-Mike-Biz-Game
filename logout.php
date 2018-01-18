<?php session_start();
    $serverName = "mathgame.database.windows.net";
          $connectionOptions = array(
        "Database" => "MathGame",
        "Uid" => "system",
        "PWD" => "2Isitclear2"
          );
if($_SESSION['score'] > $_SESSION['highscore']) {
    

    $conn = sqlsrv_connect($serverName, $connectionOptions);
if( $conn ) {
     ;
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
$sql = "UPDATE Ppl SET highScore = ? WHERE username = ?";
$params = array($_SESSION['score'], $_SESSION['username']);
$stmt = sqlsrv_query($conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
          sqlsrv_close( $conn );
        }
      session_unset();
      session_destroy();
      header("Location:login.php");die();
?>