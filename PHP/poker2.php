<?php
//洗牌
$poker = [];
for ($i = 0; $i < 52; $i++) {
    do {
        $temp = rand(0, 51);
        $isrepeat = false;
        for ($j = 0; $j < $i; $j++) {
            if ($poker[$j] == $temp) {
                $isrepeat = true;
                break;
            }
        }

    } while ($isrepeat);



    $poker[] = $temp;

}

foreach ($poker as $card) {
    echo "{$card}<br> ";
}
//發牌
?>