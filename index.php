<?php session_start();
      if(!isset($_SESSION['username'])){
          $_SESSION['username']='guest';
          if(!isset($_POST['username']) OR empty($_POST['username'])){
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
   <script type="text/javascript">
							var score = 0;
							var counter = 0;
							var url = "";
							
							$(function() {
								$("#submission").submit(function(e){
        e.preventDefault();
    });
	
	$( "#chpsl" ).change(function() {
        url = $(this).val();
		$(".victory").empty();
		$(".warning").empty();
		$(".empty").empty();
		$("#chpsl option[value='']").remove();
		response();
      });
								var response = function() {
									 
							$.getJSON( url, function( data ) {
								var rand = Math.floor(Math.random()*(data.length));
  var question = data[rand].question;
  var a  = data[rand].a;
  var b  = data[rand].b;
  var c = data[rand].c;
  var d = data[rand].d;
  var answer = data[rand].ans;
  $(".question").empty().append( question );
    $(".a").empty().append( "a. " + a);
	$(".b").empty().append( "b. " + b);
	    $(".c").empty().append("c. " + c);
		  $(".d").empty().append("d. " + d);
		  $("#solution").val(answer);
							});}
								
								 $("#submit").on("click", function(){
									 if($("#box").val() != "" && $( "#chpsl" ).val() != ""){
									 if($("#solution").val() == $('#box').val()){
										 score++;
										 $("#userscore").val(score);
										 $(".victory").empty().append("Correct! ");
										 $(".warning").empty();
									 } else {
										 $(".victory").empty();
										 $(".warning").empty().append("Incorrect the answer is " + $("#solution").val());
									 }
									 counter++;
									 $("#scoredisplay").empty().append("Score: " + score + "/" + counter);
									 
									 response()}});
								 $("#box").on("keypress", function(e)
								 {if(e.which == 13) {
									 if($("#box").val() != "" && $( "#chpsl" ).val() != ""){
									 if($("#solution").val() == $('#box').val()){
										 score++;
										 $("#userscore").val(score);
										 $(".victory").empty().append("Correct! ");
										 $(".warning").empty();
									 } else {
										 $(".victory").empty();
										 $(".warning").empty().append("Incorrect the answer is " + $("#solution").val());
									 }
									 counter++;
									 $("#scoredisplay").empty().append("Score: " + score + "/" + counter);
									 
								 response()}};});});</script>
								  <div class="container">
        <div class="row">
            <img class="center-block img-responsive" src="images/logoadjust.png">
            <br />
            <div class="col-sm-6 col-sm-offset-3">
                    <select name="chapter" id="chpsl">
  <span id= "empty"><option selected value=""></option></span>
  <option value="chapter1.json">1 - Business in a Global Environment</option>
  <option value="chapter2.json">2 - Business Ethics and Social Responsibility</option>
  <option value="chapter3.json">3 - Economic Challenges Facing Contemporary Business</option>
  <option value="chapter4.json">4 - Competing in World Markets</option>
  <option value="chapter5.json">5 -Forms of Business Ownership and Organization</option>
  <option value="chapter6.json">6 - Starting Your Own Business: The Entrepreneurship Alternative</option>
  <option value="chapter7.json">7 - Management, Leaders, and Internal Organization</option>
  <option value="chapter8.json">8 - Human Resource Management: From Recruitment to Labour Relations</option>
  <option value="chapter9.json">9 - Top Performance through Empowerment, Teamwork, and Communication</option>
  <option value="chapter10.json">10 - Production and Operations Management</option>
  <option value="chapter11.json">11 - Customer-Driven Marketing</option>
  <option value="chapter12.json">12 - Product and Distribution Strategies</option>
  <option value="chapter13.json">13 - Promotion and Pricing Strategies</option>
  <option value="chapter14.json">14 - Using Technology to Manage Information</option>
  <option value="chapter15.json">15 - Understanding Accounting and Financial Statements</option>
  <option value="chapter16.json">16 - The Financial System</option>
  <option value="chapter17.json">17 - Financial Management</option>
  </select>
                            
                
                <h4>
				<span class="victory"></span>
				<span class="warning"></span>
				<span id="scoredisplay"></span><?php 
                          echo'         High Score: '.$_SESSION['highscore'];?>
                    </h4>

                <br />
            </div>
        </div>
        

        <div class="row"> <div class="col-sm-6 col-sm-offset-3"><div class="question"></div></div> </div>
		<div class="row"> <div class="col-sm-6 col-sm-offset-3"><div class="a"></div></div> </div>
		<div class="row"> <div class="col-sm-6 col-sm-offset-3"><div class="b"></div></div> </div>
		<div class="row"> <div class="col-sm-6 col-sm-offset-3"><div class="c"></div></div> </div>
		<div class="row"> <div class="col-sm-6 col-sm-offset-3"><div class="d"></div></div> </div>
		<div class= "row"><div class="col-sm-6 col-sm-offset-3"><div class="form-group"><form name="game" id="submission">
                                    <input  class="form-control" id="box" name="guess"><br/>
                                    <button class="btn btn-info btn-group-justified" id= "submit" name="submit" type="button">Submit</button><br/>
                                    <input type="hidden" id="solution" name="answer" value="">
                                    </form> 
                                    <form method="Post" action="logout.php">
                                    <br />
                                    <button class="btn btn-warning btn-group-justified" name="logout" type="submit">Logout</button>
									<input type="hidden" id="userscore" name="score" value=""></form></div></div>
									</div>
	</div>
</body>

</html>
