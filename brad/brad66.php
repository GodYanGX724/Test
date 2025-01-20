<?php
    include('bradapis.php');

    $sql = 'select * from gift where name like :key';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':key' =>'%系列%'
    ]);

    $gifts = $stmt->fetchAll(PDO::FETCH_OBJ);
    // var_dump($gifts);

    foreach ($gifts as $gift) {
        echo "{$gift->name}<br>";
    }



?>
