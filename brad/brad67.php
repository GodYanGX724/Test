<?php
    include('bradapis.php');

    try {
        $pdo->beginTransaction();
        
        $pdo->exec('insert into cust (account,passwd,realname) values ("brad","123456","Brad")');
        $pdo->exec('insert into cust (account,passwd,realname) values ("brad3","123456","Brad")');

        $pdo->commit();
        echo'OK';
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo $e->getMessage();
    }
?>