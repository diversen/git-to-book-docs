i<?php

// parse commandline options with php 
// command line options usaually start with - and --
$str = " -v   --chapters    -V  = test  -V   test2   --some-other-options -f -x";

function parseOpt ($str) {
    $str = trim($str);
    echo $str = preg_replace('/\s+/', ' ', $str);
    $opts = preg_split("/[ -]+/", $str);
    	
    $ary = array ();
    foreach ($opts as $opt) {
        $opt = trim($opt);

        $ary[] = preg_split("/[=|\s] /", $opt);        
    }
    return $ary;
}

$ary = parseOpt($str);
print_r($ary);
