<?php

function test1($a){
    echo "test1 is working <br>";
    return $a + 1;
}
function test10($a){
    echo "test10 is working <br>";
    return $a + 10;
}

$s = "test1";
$return = $s(100);
echo "result:" . $return ."<br>";