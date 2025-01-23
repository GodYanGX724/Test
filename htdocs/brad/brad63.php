<?php
    require('bradapis.php');

    $sql = 'delete from cust where id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => '6'
    ]);

    echo $stmt->rowCount();
?>