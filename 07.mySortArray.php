<?php
//7) sort — Сортирует массив (пузырьковый метод)

//$array1 = array(2, 34, 54, 12, 0, -1, 3, 3, 4);
//$array1 = array(null, "a" => "green", "red", "blue", "red", false, [1, 2]);
//$array1 = array();
//$array1 = "";

//$array1 = array("b" => "green", "yellow", "red", [], [1, 2, 3, 4], [1, 2]);
//$array1 = array("green10", "green1", "b" => "green", "yellow", "red", [], [1, 2, 3, 4], [1, 2], null);
//$array1 = array('b' => 'blue');
//$array1 = array(1, [1, 2], 'red', 0);
//$array1 = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
$array1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$array2 = $array1;

echo json_encode($array1).PHP_EOL;
var_dump(sort($array1));
echo json_encode($array1);

function countArray($arr) {
    $count = 0;
    foreach ($arr as $value) {
        $count++;
    }
    return $count;
}

function mySortArray(&$arr) {
    
    if (!is_array($arr)) {
        return false;
    }
    
    if (empty($arr)) {
        return true;
    }
    
    foreach ($arr as $value) {
        $tempArray[] = $value;
    }
    echo '$tempArray = '.json_encode($tempArray).PHP_EOL;
    $arr = $tempArray;
    $tempArray = null;
    
    $maxIndex = countArray($arr);
    if ($maxIndex == 1) {
        return true;
    }

    while ($maxIndex > 1)  {
        $elementsChanged = false;
        echo '  $maxIndex= '.$maxIndex."\n";
        for ($indexArray = 0; $indexArray <= $maxIndex-2; $indexArray ++) {
            echo ' $indexArray= '.$indexArray."\n";
            if ($arr[$indexArray] > $arr[$indexArray+1]) {
                $tempValue = $arr[$indexArray];
                $arr[$indexArray] = $arr[$indexArray+1];
                $arr[$indexArray+1] = $tempValue;
                $elementsChanged = true;
            }
        }
        $maxIndex--;
        if ($elementsChanged == false) {
            echo '--- $changeElements == false ---'."\n";
            break;
        }
    } 
    
    return true;
}

echo PHP_EOL.'my sort :'.PHP_EOL;
var_dump(mySortArray($array2));
echo json_encode($array2);

