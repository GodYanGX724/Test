<?php
    include('bradapis.php');

    $sql = 'select * from gift where name like :key';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'key' =>'%禮盒%'
    ]);

    $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($gifts as $row) {
        echo "{$row['name']}<br>";
        // foreach ($row as $key => $value) {
        //     echo $key .':'. $value . '<br>';
        // }
    }

?>
