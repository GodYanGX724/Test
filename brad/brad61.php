<?php
    include("bradapis.php");

    $sql = 'insert into cust(account,passwd,realname) values (:account,:passwd,:realname)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':account' => 'amy',
        ':passwd' => password_hash('123456',PASSWORD_DEFAULT),
        ':realname' => 'Amy'

    ]);

    echo $pdo->lastInsertId();

?>