<?php
//4) Написать свою реализацию следующих функции php: array_sum

$myArray = [2, 3, 7, 12, 20, 4, 1, 0, 21, 20];
$myArray = [0, 3, '1000dsf1', '12ss12', 'first' => '1sasd100'];
$myArray = [0, 3, 1000, 'aa1df2', 'first' => '10'];
$myArray = [0, 3, 1, '12ss12', 'firsr' => 100, [101, 102], [101, 102, 103]];
//$myArray = ['s-2', 2];
//$myArray = ['first' => 0];

var_dump(array_sum($myArray));

function myArraySum($arr) {
    
    if (empty($arr) || !is_array($arr)) {
        return 0;
    }
    
    $sum = 0;
    
    foreach($arr as $value) {
        //floatval(array) = 1
        if (!is_array($value)) { 
            $sum += floatval($value);  
        }
    }
    
    return $sum;
    
}

echo 'Array sum = '.json_encode(myArraySum($myArray)).PHP_EOL ;

?>