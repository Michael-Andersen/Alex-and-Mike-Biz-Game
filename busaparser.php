<?php 
$ch1 = file_get_contents("ch17.txt");
//$info = preg_split ("/\\r\\n+|\\r+|\\n+/", trim($ch1));
$info = preg_split('/\R+/', trim($ch1));
//$info = explode(PHP_EOL+, $ch1);
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
        case 0: array_push($question, trim($info2[$i]));
                            break;
        case 1: array_push($a, trim($info2[$i]));
                            break;
        case 2: array_push($b, trim($info2[$i]));
                            break;
        case 3: array_push($c, trim($info2[$i]));
                            break;
        case 4: array_push($d, trim($info2[$i]));
                            break;break;
        case 5: array_push($ans, trim($info2[$i]));
                            break;
    
    }
    
}

 
/*for($i = 0; i < sizeof($question); $i++) {
	$temp = '{"question" : "' . $question[i] . '", "number" : ' . i . ', "a" : "' . $a[i] . '", "b" : "' . $b[i] . 
	'", "c" : "' . $c[i] . '", "d" : "' . $d[i] . '", "ans" : "' . $ans[i][0] . '" }';
	file_put_contents("questions.json", $temp, FILE_APPEND);
}*/
$handle = fopen("chapter17.json", "ab");
fwrite($handle, '[');
for($i = 0; $i < sizeof($question) - 1; $i++) {
	$temp = '{"question" : "' . $question[$i] . '", "number" : ' . $i . ', "a" : "' . $a[$i] . '", "b" : "' . $b[$i] . 
	'", "c" : "' . $c[$i] . '", "d" : "' . $d[$i] . '", "ans" : "' . $ans[$i][0] . '" }, ';
	fwrite($handle, $temp);
}
$x = sizeof($question) - 1;
$temp = '{"question" : "' . $question[$x] . '", "number" : ' . $x . ', "a" : "' . $a[$x] . '", "b" : "' . $b[$x] . 
	'", "c" : "' . $c[$x] . '", "d" : "' . $d[$x] . '", "ans" : "' . $ans[$x][0] . '" }]';
	fwrite($handle, $temp);
fclose($handle);
/*
$p = rand(0, sizeof($question));
echo $question[$p] . "\n";
echo $a[$p] . "\n";
echo $b[$p] . "\n";
echo $c[$p] . "\n";
echo $d[$p] . "\n";*/
?>