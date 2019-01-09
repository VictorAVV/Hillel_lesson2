<?php
//9) Написать свою реализацию substr

$baseString = 'You can test your PHP code here on many php versions.';
//$baseString = true;
//$baseString = 5565;
//$baseString = [1, 2];

$myStart = -20;
$myLength = -2;

var_dump(substr($baseString, $myStart, $myLength)).PHP_EOL;
var_dump(substr($baseString, $myStart)).PHP_EOL;

function myStrlen($string) {
    $position = 0;
    while (isset($string[$position])) {
        $position++;
    }
    return $position;
}

function mySubstr($string, $start, $length = 'default') {
    
    if (is_string($string) || is_numeric($string) || is_bool($string)) {
        $string = (string)$string;
    } else {
        return false;
    }
    if (!is_numeric($start) || (!is_numeric($length) && $length != 'default')) {
        return false;
    }
    //echo PHP_EOL.' $length :'.$length.PHP_EOL;

    if ($string === '' || ($length == 0 && $length !== 'default') || $string === null) {
        return '';
    }

    $lengthString = myStrlen($string);

    if ($start > $lengthString) {
        //echo '$start > $lengthString'.PHP_EOL;
        return false;
    }
    
    if ($start < 0) {
        if ($start <= -$lengthString) {
            $start = 0;
        } else {
            $start = $lengthString + $start;
        }
        //echo PHP_EOL.'new $start = '.$start.PHP_EOL;
    }
    
    if ($length == 'default' || $length > $lengthString - $start) {
        $length = $lengthString - $start;
        //echo 'new $length = '.$length.PHP_EOL;
    }
    if ($length < 0) {
        if (abs($length) == $lengthString - $start) {
            $length = 0;
        } elseif (abs($length) > abs($lengthString - $start)) {
            return false;
        } else {
            $length = $lengthString - $start + $length;
        }
        //echo 'new $length = '.$length.PHP_EOL;
    }

    $substr = '';
    for ($i = $start; $i < $start + $length; $i++) {
        $substr .= $string[$i];
    }
    
    return $substr;
}

echo PHP_EOL.'my substr :'.PHP_EOL;
var_dump(mySubstr($baseString, $myStart, $myLength));
var_dump(mySubstr($baseString, $myStart));
