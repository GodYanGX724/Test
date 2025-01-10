<?php
    $poker =[];
    for ($i = 0; $i <52; $i++ ){
        $poker[] = $i;
    }
    for ($i = 51; $i >= 0; $i-- ){
        $temp = rand(0,$i);
        $container = $poker[$temp];
        $poker[$temp] = $poker[$i];
        $poker[$i] = $container;
    }

    foreach ($poker as $card) {
        echo "{$card}<br> ";
    }

?>
