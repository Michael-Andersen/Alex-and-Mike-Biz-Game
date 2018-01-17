<?php session_start();
      //$credentials = file_get_contents("credentials.config");
      //$info= explode("\n", $credentials);
      if(!isset($_SESSION['username'])){
          $_SESSION['username']='guest';
          if(!isset($_POST['email'])){
              session_unset();
              session_destroy();
              header("Location: login.php"); die();
          }
        $valid=false;
      //  foreach($info as $each){
            //$separate = explode(", ", $each);
          //  if($_POST['email'] == trim($separate[0]) and $_POST['password'] == trim($separate[1])){
            //    $valid = true;
            //    break; 
         //   } 
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
$sql = "SELECT password FROM Ppl WHERE email LIKE '%' + ? + '%'";
$params = array($_POST['email']);  
$stmt = sqlsrv_query($conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
        while( $obj = sqlsrv_fetch_object($stmt)){
         //   $valid = true;
            $p = $obj->password;
             
      }
          sqlsrv_close( $conn );
          if(trim($p) == trim($_POST['password']) ) {
                 $valid = true;
             }
        
        if (!$valid){
            session_unset();
            session_destroy();
            header("Location: login.php?error=Invalid Login Credentials"); die();
         }
      }
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Math Game</title> 
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mathgame.css">
</head> 
<body>
    <div class= "container">
        <div class="row">
            <div class="col-xs-4 offset-xs-4">  
                <H1 class="text-center">Math Game</H1>
                    <?php $first = rand(0,50);
                          $second = rand(0,50);
                          $operatorselector = rand(0,1);
                          if($operatorselector == 0){
                            $operator = '+';
                            $answer = $first + $second;
                           } else {
                                    $operator = '-';
                                    $answer = $first - $second;
                                  }
                          echo $first.$operator.$second;

                          echo'<div class="form-group"><form action="index.php" method="post">
                                    <input  class="form-control" name="guess"><br/>
                                    <button class="btn btn-info" name="submit" type="submit">Submit</button><br/><br/>
                                    <input type="hidden" name="answer" value="'.$answer.'">
                                    <input type="hidden" name="first" value="'.$first.'">
                                    <input type="hidden" name="operator" value="'.$operator.'">
                                    <input type="hidden" name="second" value="'.$second.'">
                                    </form>
                                    <form method="Post" action="logout.php">
                                    <button class="btn btn-info" name="logout" type="submit">Logout</button></form></div>';
                                if(isset($_POST['submit'])){
                                    if(!is_numeric($_POST['guess']))
                                        {echo '<span class="warning">You must enter a number for your answer.</span>';
                                        } else if ($_POST['guess']==$_POST['answer']){
                                                echo '<span class="victory">Correct</span>';
                                                $_SESSION['count']++;
                                                $_SESSION['score']++;
                                        }else {
                                              echo'<span class="warning">Incorrect '.$_POST['first'].$_POST['operator'].$_POST['second'].'='.$_POST['answer'].'</span>';
                                              $_SESSION['count']++;
                                        }
            
                                   }
                          echo '<br/>Score:'.$_SESSION['score'].'/'.$_SESSION['count'];?>
                </div>
        </div>
   </div>
</body> 
</html>