<?php
    require('bradapis.php');

    $sql = 'select * from gift ';
    $stmt = $pdo->query($sql);
    // $stmt = $pdo->prepare($sql);    
    $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($gifts);
    foreach ($gifts as $row) {
        echo "{$row['name']}<br>";
        // foreach ($row as $key => $value) {
        //     echo $key .':'. $value . '<br>';
        // }
    }

?>