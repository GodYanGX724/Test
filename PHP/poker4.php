<?php
$poker = range(0, 51);

shuffle($poker);

// foreach ($poker as $card) {
//     echo "{$card}<br> ";
// }
?>

<hr>
&spades;
&hearts;
&diams;
&clubs;
<?php
$player = [[], [], [], []];
foreach ($poker as $i => $card) {
    $player[$i % 4][(int) $i / 4] = $card;

}
?>
<table width='100%' border='1' cellpadding='5' cellspacing='0'>
    <?php
    $flowers = ['&spades;','<font color = "red">&hearts;</font>','<font color = "red">&diams;</font>','&clubs;'];
    $values = ['A',2,3,4,5,6,7,8,9,10,'J','Q','K'];
    foreach ($player as $p) {
        sort($p);
        echo "<tr>";
        foreach ($p as $v) {
            echo "<td>{$flowers[(int)$v/13]} {$values[$v%13]}</td>";
        }
        echo "</tr>";
    }
    // for ($i = 0; $i < 4; $i++) {
//     echo "<tr>";
//     foreach ($player[$i] as $v) {
//         echo "<td>{$v}</td>";
//     }
//     echo "</tr>";
// }
    
    ?>
</table>