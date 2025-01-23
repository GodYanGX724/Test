<?php
    $start = '1996-01-01';
    $end = '2000-12-31';
    if (isset($_REQUEST['start']) && $_REQUEST['end']){
        $start = $_REQUEST['start'];
        $end = $_REQUEST['end'];
    }

    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');
    $sql = 'SELECT e.EmployeeID id, e.LastName lastname ,sum(od.UnitPrice * od.Quantity) total
        FROM orders o
        JOIN orderdetails od ON (o.OrderID = od.OrderID)
        JOIN employees e ON (e.EmployeeID = o.EmployeeID)
        WHERE o.OrderDate BETWEEN ? AND ?
        GROUP BY e.EmployeeID
        ORDER by total desc';
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ss', $start, $end);
    if ($stmt->execute()){
        $stmt->store_result();
        $stmt->bind_result($id,$lastname, $total);
    }

?>
<form action="brad57.php">
    Start: <input type="date" name="start" value="<?= $start ?>">~
    End: <input type="date" name="end" value="<?= $end ?>">
    <input type="submit" name="" id="">
</form>

<table width = '100%' border = '1'>
    <tr>
        <th>#</th>
        <th>EmployeeID</th>
        <th>LastName</th>
        <th>total</th>
        
    </tr>
    <?php
    $rank = 1;
    while ($stmt->fetch()){
        echo"<tr>";
        echo"<td>{$rank}</td>";
        echo"<td>{$id}</td>";
        echo"<td>{$lastname}</td>";
        echo"<td>{$total}</td>";
        echo"</tr>";
        $rank++;
    }

    ?>
</table>




<?php
// 每個員工的單數
// SELECT COUNT(OrderID),EmployeeID FROM orders GROUP BY EmployeeID

// SELECT e.EmployeeID,sum(od.UnitPrice * od.Quantity) total
// FROM orders o
// JOIN orderdetails od ON (o.OrderID = od.OrderID)
// JOIN employees e ON (e.EmployeeID = o.EmployeeID)
// GROUP BY e.EmployeeID
// ORDER by total desc

?>