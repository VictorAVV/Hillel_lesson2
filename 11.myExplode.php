<?php
//11) Написать свою реализацию explode 

$baseString = 'You can test your PHP code here on many php versions.';
$baseString = '. This is a test 1. This is a test 2. This is a test 3 fff';
//$baseString = 'isisisisis ';
//$baseString = true;
//$baseString = 556510;
//$baseString = [1, 2];

$myDelimiter = '. ';
//$myDelimiter = true;
//$myDelimiter = 5;
//$myDelimiter = 'is';
//$myDelimiter = '';

$myLimit = 3;

var_dump(explode($myDelimiter, $baseString)).PHP_EOL;
var_dump(explode($myDelimiter, $baseString, $myLimit)).PHP_EOL;

function myStrlen($string) {
    $position = 0;
    while (isset($string[$position])) {
        $position++;
    }
    return $position;
}

function myExplode($delimiter, $string, $limit = PHP_INT_MAX) {

    if (is_string($string) || is_numeric($string) || is_bool($string)) {
        $string = (string)$string;
    } else {
        return false;
    }
    if (is_string($delimiter) || is_numeric($delimiter) || is_bool($delimiter)) {
        $delimiter = (string)$delimiter;
    } else {
        return false;
    }    
    if ($delimiter === '' || !is_integer((int)$limit)) {
        return false;
    }

    $lengthString = myStrlen($string);
    $lengthDelimiter = myStrlen($delimiter);
    $newArray = [];
        
    if ($lengthDelimiter > $lengthString) {
        if ($limit<0) {
            return [];
        } else {
            return [$string];
        }
    }
    
    $tempStr = '';
    $currentElement = 1;
    $limitIsReach = false;
    if ($lengthDelimiter == 1) {
        $lengthString -= 1;
    }
    
    for ($i = 0; $i <= $lengthString - $lengthDelimiter + 1; $i++) {
        //echo ' $i = '.$i.' / ';
        $equalChar = false;
        if ($currentElement >= $limit) {
            $limitIsReach = true;
        }
        if (!$limitIsReach && $string[$i] == $delimiter[0]) {
            $equalChar = true;
            if ($lengthDelimiter == 1) {
                
            }
            for ($j = 1; $j < $lengthDelimiter; $j++) {
                if ($string[$i+$j] != $delimiter[$j]) {
                    $equalChar = false;
                    break;
                }
            }
            if ($equalChar == true) {
                $i += $lengthDelimiter-1;
                $newArray[] = $tempStr;
                $currentElement++;
                $tempStr = '';
            }
        }
        if ($equalChar != true) {
            $tempStr .= $string[$i];
        }
    }
    $newArray[] = $tempStr;

    return $newArray;
}

echo PHP_EOL.'my explode :'.PHP_EOL;
var_dump(myExplode($myDelimiter, $baseString));
var_dump(myExplode($myDelimiter, $baseString, $myLimit));
