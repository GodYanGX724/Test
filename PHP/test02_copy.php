<?php
$x = '';
$y = '';
$z = '';
$r = '';
if (isset($_GET['x'])) {

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
            $r1 = (int)($x / $y);
            $r2 = $x % $y;
            $r = "{$r1}.....{$r2}";
            break;
    }
}


// echo $x . $z . $y . '=' . $r;

?>

<h1>GodYan</h1>
<hr>
<form action="test02_copy.php" method="get">
    <input name="x" value="<?php echo $x ?>">
    <select name="z" id="">
        <option value="+" <?php echo $z == '+' ? 'selected' : '' ?> >+</option>
        <option value="-" <?php echo $z == '-' ? 'selected' : '' ?> >-</option>
        <option value="*" <?php echo $z == '*' ? 'selected' : '' ?> >*</option>
        <option value="/" <?php echo $z == '/' ? 'selected' : '' ?> >/</option>
    </select>
    <input name="y" value="<?php echo $y ?>">
    <input type="submit" value="=">
    <span><?php echo $r; ?></span>
</form>