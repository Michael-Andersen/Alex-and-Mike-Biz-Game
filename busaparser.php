<?php 
$ch1 = file_get_contents("ch1.txt");
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
        case 0: array_push($question, $info2[$i]);
                            break;
        case 1: array_push($a, $info2[$i]);
                            break;
        case 2: array_push($b, $info2[$i]);
                            break;
        case 3: array_push($c, $info2[$i]);
                            break;
        case 4: array_push($d, $info2[$i]);
                            break;break;
        case 5: array_push($ans, $info2[$i]);
                            break;
    
    }
    
}
$p = rand(0, sizeof($question));
echo $question[$p] . "\n";
echo $a[$p] . "\n";
echo $b[$p] . "\n";
echo $c[$p] . "\n";
echo $d[$p] . "\n";
?>