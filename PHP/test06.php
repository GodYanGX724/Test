<?php
    $i = 0;
    for (printGodYan(); $i < 10;printLine() ) {
        echo "{$i} <br/>";
        $i++;
    }

    function printGodYan(){
        echo 'GodYan<br/>';
    }
    function printLine(){
        echo '<hr/>';
    }

?>