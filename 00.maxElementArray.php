<?php
//найти максимальный элемент массива  
  
//$myArray = [2, 3, 7, 12, 20, 4, 1, 0, 21, 20];
//$myArray = [0, 3, '1000dsf1', '12ss12', 'first' => '1sasd100'];
$myArray = [0, 3, 1000, 'aa1df2', 'first' => '10'];
//$myArray = [0, 3, 1, '12ss12', 'firsr' => 100, [101, 102], [101, 102, 103]];
//$myArray = ['s-2', 2];
//$myArray = ['first' => 0];

echo 'max($myArray) =';
var_dump(max($myArray));

function countArray($arr) {
    
    if (!is_array($arr)) {
        return null;
    }
    if (empty($arr)) {
        return 0;
    }
    
    $count = 0;
    foreach ($arr as $value) {
        $count++;
    }
    return $count;
}

function maxElementInArray($arr){
    
    $count = countArray($arr);

    if ($count === null || $count === 0) {
        return null;
    }
    if ($count === 1) {
        return array_shift($arr);
    }

    //$max = $arr[0]; //если ассоциативный массив с одним элементом, то ошибка 
    //unset($arr[0]);
    
    $max = array_shift($arr);
   
    /*
    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    //для ассоциативных массивов for не подходит
    */
    foreach ($arr as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    
    return $max;
}

echo 'Number of elements in array = '.countArray($myArray).PHP_EOL ;
//var_dump(countArray($myArray));

echo 'Max element in array = '.json_encode(maxElementInArray($myArray)).PHP_EOL ;
//var_dump(maxElementInArray($myArray));

?>