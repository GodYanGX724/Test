<?php
    if (!isset($_REQUEST['account'])) header('Location: brad50.html');
    
    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');

    $account = $_REQUEST['account'];
    $passwd = password_hash($_REQUEST['passwd'], PASSWORD_DEFAULT);
    $realname = $_REQUEST['realname'];
    $icon = $_FILES['icon'];
    if ($icon['error'] == 0){
        $iconData = file_get_contents($icon['tmp_name']);
        $iconType = $icon['type'];
        $sql = 'INSERT INTO cust (account,passwd,realname,icon,icontype)' . 
                ' VALUES (?,?,?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssss', $account, $passwd, $realname, $iconData, $iconType);
    }else{
        $sql = 'INSERT INTO cust (account,passwd,realname) VALUES (?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sss', $account, $passwd, $realname);
    }
    
    if ($stmt->execute()){
        header('Location: brad52.php');
    }else{
        echo "ERROR: {$mysqli->error}";
    }



?>