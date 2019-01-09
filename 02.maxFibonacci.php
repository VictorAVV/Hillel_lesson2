<?php
//2) Вывести определенное количество элементов последовательности Фибоначчи.

$maxAmount = 15;

function fibonacci($max) {
    
    if (!is_int($max) || $max <= 0) {
        return null;
    }
    
    if ($max == 1) {
        return [0];
    }
    if ($max == 2) {
        return [0, 1];
    }
    
    $arrayFibonacci = [0, 1];
    
    for ($i = 3; $i <= $max; $i++){
       //var_dump($i);
        $arrayFibonacci[] = $arrayFibonacci[($i-2)] + $arrayFibonacci[($i-3)];
    }
    
    return $arrayFibonacci;
}

echo 'Fibonacci numbers: '.json_encode(fibonacci($maxAmount)).PHP_EOL ;
//echo json_encode(fibonacci($maxAmount));

?>