<?php
require_once('../src/Str.php');
//
// Example Random
//

// Default Usage
echo Str::random(18)."\n";
// Alphanumeric
echo Str::random(18,'alnum')."\n";
// Alphabet
echo Str::random(18,'alpha')."\n";
// Numeric
echo Str::random(18,'numeric')."\n";
// MD5
echo Str::random(null,'md5')."\n";
// Byte
echo Str::random(18,'binary')."\n";
// Not Defined Random String
echo Str::random(null,'nothing')."\n";

//
// Example Strip Quotes
//
$string = 'Hello" ';
$arr_str = [
  0=> 'Hello "',
  1=> 'Hey "'
];
// String
echo Str::strip_quotes($string)."\n";
// Array
var_dump(Str::strip_quotes($arr_str))."\n";

//Example Strip Slashes
$string = "Hello \"";
$arr_str = [
  0=> 'Hello \'',
  1=> 'Hey \''
];
echo Str::strip_slashes($string)."\n";
// Array
var_dump(Str::strip_slashes($arr_str))."\n";
