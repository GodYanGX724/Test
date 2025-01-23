<?php
    require('bradapis.php');

    $sql = 'update cust set realname = :realname where id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':realname' => '艾米',
        ':id' => 6
    ]);

    echo $stmt->rowCount();
?>