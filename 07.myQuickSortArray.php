<?php
//7) sort Ч —ортирует массив (метод быстрой сортировки)

//$array1 = array(2, 34, 54, 12, 0, -1, 3, 3, 4);
//$array1 = array(null, "a" => "green", "red", "blue", "red", false, [1, 2]);
//$array1 = array();
//$array1 = "";

//$array1 = array("b" => "green", "yellow", "red", [], [1, 2, 3, 4], [1, 2]);
$array1 = array("green10", "green1", "b" => "green", "yellow", "red", [], [1, 2, 3, 4], [1, 2], null, 25);
//$array1 = array('b' => 'blue');
//$array1 = array(1, [1, 2], 'red', 0);
//$array1 = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
//$array1 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, null);
//$array1 = array(10, 9, 8, 7);
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

function myQuickSortArray(&$arr) {
        
    if (!is_array($arr)) {
        return false;
    }
    
    if (empty($arr)) {
        return true;
    }
    
    foreach ($arr as $value) {
        $tempArray[] = $value;
    }
    //echo '$tempArray = '.json_encode($tempArray).PHP_EOL;
    $arr = $tempArray;
    $tempArray = null;
    
    $maxIndex = countArray($arr);
    if ($maxIndex == 1) {
        return true;
    }
    
    function quickSort(&$arrQ, $left, $right) {

        $low = $left;
        $hi = $right;
        $pivot = $arrQ[intdiv(($left+$right), 2)];
        echo '$pivot = '.json_encode($pivot);
        //$testCount = 0;

        do {
            while ($arrQ[$low] < $pivot) {
                $low++;
            }
            while ($pivot < $arrQ[$hi]) {
                $hi--;
            }
            if ($low <= $hi) {
                $temp = $arrQ[$low];
                $arrQ[$low] = $arrQ[$hi];
                $arrQ[$hi] = $temp;
                $low++;
                $hi--;
            }
            
            //echo ' $testCount do $low/$hi = '.$testCount.' : '.$low.'/'.$hi.PHP_EOL;
            /*$testCount++;
            if ($testCount > 20) {
                break;
            }*/
        } while ($low <= $hi);
        
        if ($left < $hi) {
            quickSort($arrQ, $left, $hi);
        }
        
        if ($low < $right) {
            quickSort($arrQ, $low, $right);
        }
    }
    
    quickSort($arr, 0, $maxIndex-1);
    return true;
}

echo PHP_EOL.'my sort :'.PHP_EOL;
var_dump(myQuickSortArray($array2));
echo json_encode($array2);
