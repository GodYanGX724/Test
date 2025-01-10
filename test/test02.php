<?php
    $x = $_GET['x'];
    $y = $_GET['y'];
    $z = $_GET['z'];
    switch ($z) {
        case '+':
            $r = $x + $y;
            break;
        case '-':
            $r = $x - $y;
            break;
        case '*':
            $r = $x * $y;
            break;
        case '/':
            $r = $x / $y;
            break;
    }

    
    echo $x . $z . $y .'='. $r;
    // echo "{$x} {$z} {$y} = {$r}";

?>