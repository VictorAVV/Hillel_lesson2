<?php
//6) array_diff — Вычислить расхождение массивов

$array1 = array(null, "a" => "green", "red", "blue", "red", false, [1, 2]);
//$array1 = array();
//$array1 = "";

$array2 = array("b" => "green", "yellow", "red", []);
//$array2 = array('blue');
//$array2 = array(1, [1, 2], 'red', 0);

var_dump(array_diff($array1, $array2));

function myArrayDiff($arr1, $arr2) {
    
    if (!is_array($arr1)) {
        return null;
    }
    if (empty($arr1)) {
        return [];
    }
    
    $valueArr1InArray = false;
    $arrayDiff = [];
    
    foreach ($arr1 as $valueArr1) {
        
        foreach ($arr2 as $valueArr2) {
            if (@(string)$valueArr1 === @(string)$valueArr2) {
                $valueArr1InArray = true;
                break;
            }
        }
        
        if (!$valueArr1InArray) {
            $arrayDiff[] = $valueArr1;
        }
        $valueArr1InArray = false;
        
    }
    return $arrayDiff;
}

echo 'myArraydiff :'.PHP_EOL;
var_dump(myArrayDiff($array1, $array2));


