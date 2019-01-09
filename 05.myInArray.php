<?php
//4) Написать свою реализацию следующих функции php: in_array


$myArray = [2, 3, 7, 12, 20, 4, 1, 3, 21, 20];
$myArray = [1, 3, '1000dsf1', '12ss12', 'first' => '1sasd100'];
//$myArray = [0, 3, 1000, 'aa1df2', 'first' => '10'];
$myArray = [0, 3, 1, '12ss12', '12ss', 'ss12', 'firsr' => 100, [101, 102], [101, 102, 103]];
//$myArray = ['s-2', 2];
//$myArray = ['first' => 0];

$myNeedle = 12;

var_dump(in_array($myNeedle, $myArray, true));

function myInArray($needle, $arr, bool $strict = FALSE) {
    
    if (empty($arr) || !is_array($arr)) {
        return FALSE;
    }
    
    foreach($arr as $value) {
        if ($strict) {
            if ($needle === $value) {
                return TRUE;
            }
        } else {
            if ($needle == $value) {
                return TRUE;
            }
        }
    }

    return FALSE;
}

echo 'In array: '.json_encode(myInArray($myNeedle, $myArray, true)).PHP_EOL ;

?>