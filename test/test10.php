<?php
    $ary[2]= 123;
    $ary[21]= 'GodYan';
    var_dump($ary);
    echo'<hr>';
    $ary[100][1] = 22;
    $ary[100][7] = true;
    $ary[101][8] = 2.2;
    $ary[101][11] = 'lol';

    var_dump($ary);
?>