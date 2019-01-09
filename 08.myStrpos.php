<?php
//8) Написать свою реализацию strpos

$baseString = 'You can test your PHP code here on many php versions.';
//$baseString = 'ca';
//$baseString = 0;

$needleString = 'php';
//$needleString = 25;
//$needleString = '';

$offset = -12;

echo json_encode(strpos($baseString, $needleString, $offset)).PHP_EOL;

function myStrlen($string) {
    $position = 0;
    while (isset($string[$position])) {
        $position++;
    }
    return $position;
}

function myStrpos($haystack, $needle, $offset = 0) {
    
    if (!is_string($haystack) || !is_string($needle) || empty($haystack) || empty($needle) || !is_integer((int)$offset)) {
        return false;
    }
   
    $lengthHaystack = myStrlen($haystack);
    //echo ' $lengthHaystack = '.$lengthHaystack.PHP_EOL;
    $lengthNeedle = myStrlen($needle);
    
    if ($offset < 0) {
        if (abs($offset) > $lengthHaystack) {
            return false;
        }
        $offset = $offset + $lengthHaystack;
    }
    
    if ($lengthNeedle > $lengthHaystack) {
        return false;
    }
    
    for ($i = $offset; $i <= $lengthHaystack - $lengthNeedle; $i++) {
        $equalChar = false;
        if ($haystack[$i] == $needle[0]) {
            $equalChar = true;
            for ($j = 1; $j < $lengthNeedle; $j++) {
                if ($haystack[$i+$j] != $needle[$j]) {
                    $equalChar = false;
                    break;
                }
            }
            if ($equalChar == true) {
                return $i;
            }
        }
    }
    return false;
}

echo PHP_EOL.'my strpos :'.PHP_EOL;
var_dump(myStrpos($baseString, $needleString, $offset));
