<?php session_start();
      if(!isset($_SESSION['username'])){
          $_SESSION['username']='guest';
          if(!isset($_POST['username'])){
              session_unset();
              session_destroy();
              header("Location: login.php"); die();
          }
        $valid=false;
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
$sql = "SELECT password, highScore FROM Ppl WHERE username = ?";
$params = array($_POST['username']);  
$stmt = sqlsrv_query($conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
        while( $obj = sqlsrv_fetch_object($stmt)){
            $p = $obj->password;
            $_SESSION['highscore'] = $obj->highScore;
      }
          
          sqlsrv_close( $conn );
          if(trim($p) == trim($_POST['password']) ) {
                 $valid = true;
             }
         $_SESSION['username']  = $_POST['username'];
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
                <form action="index.php" method="post">
                <select name="chapter">
  <option value="ch1">Chapter 1</option>
  <option value="ch2">Chapter 2</option>
  <option value="ch3">Chapter 3</option></select>
                    <button class="btn btn-success btn-group-justified" name="chpselect" type="submit">Select Chapter</button>
                    </form></div></div>
        <?php if(isset($_POST['chpselect'])) {
    if($_POST['chapter'] == 'ch1') {
        $_SESSION['file'] = 'ch1.txt';
    }
    if($_POST['chapter'] == "ch2") {
        $_SESSION['file'] = "ch2.txt";
    }
    if($_POST['chapter'] == "ch3") {
        $_SESSION['file'] = "ch3.txt";
    }
    
}?>
                <div class="row">
            <div class="col-xs-4 offset-xs-4"> 
                    <?php 
              
                $ch1 = file_get_contents($_SESSION['file']);

$info = preg_split('/\R+/', trim($ch1));

$info2 = array();
$x=0;
for($j =0; $j < sizeof($info); $j++) {
    if(trim($info[$j]) != '') { 
        $info2[$x] = $info[$j];
        $x++;
    }
}
$question = array();
$a = array();
$b = array();
$c = array();
$d = array();
$ans = array();

for($i =0; $i < sizeof($info2); $i++) {
   
    switch($i % 6) {
        case 0: array_push($question, $info2[$i]);
                            break;
        case 1: array_push($a, $info2[$i]);
                            break;
        case 2: array_push($b, $info2[$i]);
                            break;
        case 3:array_push($c, $info2[$i]);
                            break;
        case 4: array_push($d, $info2[$i]);
                            break;break;
        case 5: array_push($ans, $info2[$i]);
                            break;
    
    }
    
}
                        $p = rand(0, sizeof($question));
                        $currentquest = $question[$p];
                        $currenta = $a[$p];
                        $currentb = $b[$p];
                        $currentc = $c[$p];
                        $currentd = $d[$p];
                        $currentans = $ans[$p][0];
                        echo $currentquest.'<br /><br />';
                        echo "a. ".$currenta.'<br />';
                        echo "b. ".$currentb.'<br />';
                        echo "c. ".$currentc.'<br />';
                        echo "d. ".$currentd.'<br /><br />';
                        

                          echo'<div class="form-group"><form action="index.php" method="post">
                                    <input  class="form-control" name="guess"><br/>
                                    <button class="btn btn-info" name="submit" type="submit">Submit</button><br/><br/>
                                    <input type="hidden" name="answer" value="'.$currentans.'">
                                    </form>
                                    <form method="Post" action="logout.php">
                                    <button class="btn btn-info" name="logout" type="submit">Logout</button></form></div>';
                                if(isset($_POST['submit'])){
                                    $o = strtolower(trim($_POST['guess']));
                                    if ($o==$_POST['answer']){
                                                echo '<span class="victory">Correct</span>';
                                                $_SESSION['count']++;
                                                $_SESSION['score']++;
                                        }else {
                                              echo'<span class="warning">Incorrect The answer is  '.$_POST['answer'].'</span>';
                                              $_SESSION['count']++;
                                        }
            
                                   }
                          echo '<br/>Score:'.$_SESSION['score'].'/'.$_SESSION['count'].'         High Score: '.$_SESSION['highscore'];?>
                </div>
        </div>
   </div>
</body> 
</html>