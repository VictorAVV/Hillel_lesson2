<?php
//3) ¬ массиве заменить все элементы, большие данного числа Z, этим числом. ѕодсчитать количество замен.

$myArray = [2, 3, 7, 12, 20, 4, 1, 0, 21, 20];
//$myArray = [0, 3, '1000dsf1', '12ss12', 'first' => '1sasd100'];
//$myArray = [0, 3, 1000, 'aa1df2', 'first' => '10'];
//$myArray = [0, 3, 10, '12ss', 'first' => 100, [101, 102], [101, 102, 103]];
//$myArray = ['s-2', 2];
//$myArray = ['first' => 0];

$maxNumber = 5;

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

function ReplaceElementsInArray(&$arr, $max){
    
    $count = countArray($arr);

    if ($count === null || $count === 0) {
        return null;
    }

    $replacements = 0;

    foreach ($arr as &$value) {
        //добавл¤ем && is_numeric($value), если нужно замен¤ть только числа
        if ($value > $max && is_numeric($value)) {
            $value = $max;
            $replacements++;
        }
    }
    
    return $replacements;
}

echo 'Number of elements in array = '.countArray($myArray).PHP_EOL ;

echo json_encode($myArray);
echo PHP_EOL;
echo 'Number of replacements in array = '.ReplaceElementsInArray($myArray, $maxNumber).PHP_EOL ;
echo json_encode($myArray);

?>