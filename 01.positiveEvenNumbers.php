<?php
//1) Написать функцию которая выводит все положительные четные числа которые меньше заданного.
  
$myNumber = 2.1;

function positiveEvenNumbers($number) {
    
    if ($number <= 0 || !is_numeric($number)) {
        return null;
    }
    if ($number < 2) {
        return [0];
    }
    
    $arrayPositiveEvenNumbers = [0];
    
    for ($i = 2; $i < $number; $i++) {
        if ($i % 2 == 0) {
            $arrayPositiveEvenNumbers[] = $i;
        }
    }
    
    return $arrayPositiveEvenNumbers;
    
}

echo(json_encode(positiveEvenNumbers($myNumber)));
//var_dump(positiveEvenNumbers($myNumber));

?>