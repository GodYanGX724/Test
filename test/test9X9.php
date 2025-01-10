<?php
$rows = 2;
$start = 2;
$cols = 4;
if (isset($_GET["start"])) {
    $rows = $_GET["rows"];
    $start = $_GET["start"];
    $cols = $_GET["cols"];
}
define("ROWS" , $rows);
define("START" , $start);
define("COLS" , $cols);

?>

<h1>GodYan</h1>
<hr />
<form action="test9X9.php">
    Start: <input type="number" name="start" value="<?php echo $start?>">
    Rows: <input type="number" name="rows" value="<?php echo $rows?>">
    Cols: <input type="number" name="cols" value="<?php echo $cols?>">
    <input type="submit" value="change">
</form>
<table width='100%' border="1">
    <?php
    for ($k = 0; $k < ROWS; $k++) {

        echo "<tr>";
        for ($j = START; $j <= (START + COLS - 1); $j++) {
            $newj = $j + $k * COLS;
            echo "<td>";
            for ($i = 1; $i <= 10; $i++) {
                $r = $newj * $i;
                echo "{$newj} X {$i} = {$r} <br>";
            }
            echo "</td>";
        }

        echo "</tr>";
    }
    ?>
    <!-- 
<tr>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
    </tr>
    <tr>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
        <td>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
            2 X 1 = 2 <br>
        </td>
    </tr> -->

</table>