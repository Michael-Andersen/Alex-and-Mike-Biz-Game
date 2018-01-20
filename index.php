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
    <title>ALEX &amp; MIKE'S BIZ GAME</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Styles/bootstrap.css">
    <link rel="stylesheet" href="Styles/mathgame.css">
</head>

<body>
    <?php if(isset($_POST['chpselect'])) {
    switch($_POST['chapter']) {
        case 'ch1': 
        $_SESSION['file'] = 'ch1.txt';
        $_SESSION['c1'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
    break;
    
        case 'ch2': 
        $_SESSION['file'] = 'ch2.txt';
        $_SESSION['c2'] = 'selected ="selected"';
        $_SESSION['c3'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
    
        case 'ch3':
        $_SESSION['file'] = 'ch3.txt';
        $_SESSION['c3'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch4':
        $_SESSION['file'] = 'ch4.txt';
        $_SESSION['c4'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch5':
        $_SESSION['file'] = 'ch5.txt';
        $_SESSION['c5'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch6':
        $_SESSION['file'] = 'ch6.txt';
        $_SESSION['c6'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch7':
        $_SESSION['file'] = 'ch7.txt';
        $_SESSION['c7'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch8':
        $_SESSION['file'] = 'ch8.txt';
        $_SESSION['c8'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';   
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch9':
        $_SESSION['file'] = 'ch9.txt';
        $_SESSION['c9'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch10':
        $_SESSION['file'] = 'ch10.txt';
        $_SESSION['c10'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch11':
        $_SESSION['file'] = 'ch11.txt';
        $_SESSION['c11'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch12':
        $_SESSION['file'] = 'ch12.txt';
        $_SESSION['c12'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch13':
        $_SESSION['file'] = 'ch13.txt';
        $_SESSION['c13'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
        case 'ch14':
        $_SESSION['file'] = 'ch14.txt';
        $_SESSION['c14'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
        case 'ch15':
        $_SESSION['file'] = 'ch15.txt';
        $_SESSION['c15'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch16':
        $_SESSION['file'] = 'ch16.txt';
        $_SESSION['c16'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c12'] = '';
        $_SESSION['c17'] = '';
            break;
            case 'ch17':
        $_SESSION['file'] = 'ch17.txt';
        $_SESSION['c17'] = 'selected ="selected"';
        $_SESSION['c2'] = '';
        $_SESSION['c1'] = '';
        $_SESSION['c3'] = '';
        $_SESSION['c4'] = '';
        $_SESSION['c5'] = '';
        $_SESSION['c6'] = '';
        $_SESSION['c7'] = '';
        $_SESSION['c8'] = '';
        $_SESSION['c9'] = '';
        $_SESSION['c10'] = '';
        $_SESSION['c11'] = '';
        $_SESSION['c13'] = '';
        $_SESSION['c14'] = '';
        $_SESSION['c15'] = '';
        $_SESSION['c16'] = '';
        $_SESSION['c12'] = '';
            break;
    
    }
}?>
    <div class="container">
        <div class="row">
            <img class="center-block img-responsive" src="images/logoadjust.png">
            <br />
            <div class="col-sm-6 col-sm-offset-3">
                <form action="index.php" method="post">
                    <select name="chapter"><?php
                        echo
  '<option value="ch1"'.$_SESSION['c1'].'>Chapter 1</option>
  <option value="ch2"'.$_SESSION['c2'].'>Chapter 2</option>
  <option value="ch3"'.$_SESSION['c3'].'>Chapter 3</option>
  <option value="ch4"'.$_SESSION['c4'].'>Chapter 4</option>
  <option value="ch5"'.$_SESSION['c5'].'>Chapter 5</option>
  <option value="ch6"'.$_SESSION['c6'].'>Chapter 6</option>
  <option value="ch7"'.$_SESSION['c7'].'>Chapter 7</option>
  <option value="ch8"'.$_SESSION['c8'].'>Chapter 8</option>
  <option value="ch9"'.$_SESSION['c9'].'>Chapter 9</option>
  <option value="ch10"'.$_SESSION['c10'].'>Chapter 10</option>
  <option value="ch11"'.$_SESSION['c11'].'>Chapter 11</option>
  <option value="ch12"'.$_SESSION['c12'].'>Chapter 12</option>
  <option value="ch13"'.$_SESSION['c13'].'>Chapter 13</option>
  <option value="ch14"'.$_SESSION['c14'].'>Chapter 14</option>
  <option value="ch15"'.$_SESSION['c15'].'>Chapter 15</option>
  <option value="ch16"'.$_SESSION['c16'].'>Chapter 16</option>
  <option value="ch17"'.$_SESSION['c17'].'>Chapter 17</option>
  </select>'
                            ;?>
                    <button class="btn btn-info btn-xs" name="chpselect" type="submit">Select Chapter</button>
                </form>
                <h4>
                    <?php 
                
                                               if(isset($_POST['submit'])){
                                    $o = strtolower(trim($_POST['guess']));
                                    if ($o==strtolower($_POST['answer'])){
                                                echo '<span class="victory">Correct! </span>';
                                                $_SESSION['count']++;
                                                $_SESSION['score']++;
                                        }else {
                                              echo'<span class="warning">Incorrect The answer is  '.$_POST['answer'].'. </span>';
                                              $_SESSION['count']++;
                                        }
            
                                   }
                          echo 'Score:'.$_SESSION['score'].' / '.$_SESSION['count'].'         High Score: '.$_SESSION['highscore'];
                
                ?></h4>

                <br />
            </div>
        </div>
        

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?php 
              if(isset($_SESSION['file'])) {

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
                        $p = rand(0, sizeof($question) - 1);
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
                                    <button class="btn btn-info btn-group-justified" name="submit" type="submit">Submit</button><br/>
                                    <input type="hidden" name="answer" value="'.$currentans.'">
                                    </form>'; }
                                    echo '<form method="Post" action="logout.php">
                                    <br />
                                    <button class="btn btn-warning btn-group-justified" name="logout" type="submit">Logout</button></form></div>';
                ?>
            </div>
        </div>
    </div>
</body>

</html>
