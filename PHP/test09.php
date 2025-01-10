<?php
    $p0 = 0; $p= array(1 => 0,0,0,0,0,0);
    for ($i = 0; $i < 100; $i++) {
        $point = rand(1,9);
       if($point >= 1 && $point <=9){
        $p[$point>6 ? $point-3 : $point]++;
       }else{
        $p0++;
       }
    }

    if ($p0 == 0) {
        foreach($p as $key => $value) {
            echo "{$key}出現{$value}次<br>";

        }
        // for ($i = 1; $i < 7; $i++) {
        // echo "{$i}出現{$p[$i]}次<br>";
        // }

    }else{
        echo"ERROR: {$p0}";
    }

?>