<?php
session_start();
$userName = "Guest";
if (isset($_SESSION["userName"])) {
    $userName = $_SESSION["userName"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello! <?= $userName ?></h1>
</body>
</html>