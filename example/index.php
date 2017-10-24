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
// Not Defined Random String
echo Str::random(null,'nothing')."\n";
