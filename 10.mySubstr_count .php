<?php
//10) Написать свою реализацию substr_count 

$baseString = 'You can test your PHP code here on many php versions.';
$baseString = 'This is a test 1. This is a test 2. This is a test 3';
//$baseString = 'isisisisis ';
//$baseString = true;
//$baseString = 556510;
//$baseString = [1, 2];

$needleString = 'is';
//$needleString = true;
//$needleString = '';

$myoffset = -15;

$myLength = -2;

var_dump(substr_count($baseString, $needleString, $myoffset)).PHP_EOL;
var_dump(substr_count($baseString, $needleString, $myoffset, $myLength)).PHP_EOL;

function myStrlen($string) {
    $position = 0;
    while (isset($string[$position])) {
        $position++;
    }
    return $position;
}

function mySubstr_count($haystack, $needle, $offset = 0, $length = 'default') {

    if (is_string($haystack) || is_numeric($haystack) || is_bool($haystack)) {
        $haystack = (string)$haystack;
    } else {
        return false;
    }
    if (is_string($needle) || is_numeric($needle) || is_bool($needle)) {
        $needle = (string)$needle;
    } else {
        return false;
    }
    if (!is_string($needle) || empty($needle) || !is_integer((int)$offset) || (!is_numeric($length) && $length != 'default')) {
        return false;
    }
    if ($haystack === '' || ($length == 0 && $length !== 'default') || $haystack === null) {
        return '';
    }
    
    $lengthHaystack = myStrlen($haystack);
    $lengthNeedle = myStrlen($needle);

    if ($offset < 0) {
        $offset = $offset + $lengthHaystack;
    }
    if ($offset > $lengthHaystack || abs($offset) > $lengthHaystack) {
        return false;
    }

    if ($length == 'default') {
        $length = $lengthHaystack - $offset;
    }
    if ($length > $lengthHaystack - $offset) {
        return false;
    }
    if ($length < 0) {
        if (abs($length) > abs($lengthHaystack - $offset)) {
            return false;
        } else {
            $length = $lengthHaystack - $offset + $length;
        }
    }

    $countSubstr = 0;
    $currentPosition = $offset;

    while (($position = myStrpos($haystack, $needle, $currentPosition)) !== false) {
        if ($position + $lengthNeedle > $offset + $length) {
            break;
        }
        $countSubstr++;
        $currentPosition = $position + $lengthNeedle;
    }

    return $countSubstr;
}

echo PHP_EOL.'my substr :'.PHP_EOL;
var_dump(mySubstr_count($baseString, $needleString, $myoffset));
var_dump(mySubstr_count($baseString, $needleString, $myoffset, $myLength));

function myStrpos($haystack, $needle, $offset = 0) {
    
    if (!is_string($haystack) || !is_string($needle) || empty($haystack) || empty($needle) || !is_integer((int)$offset)) {
        return false;
    }

    $lengthHaystack = myStrlen($haystack);
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
            $tempStr = '';
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