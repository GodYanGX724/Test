<?
    $mysqli = new mysqli('localhost','root','', 'brad');
    $mysqli->set_charset('utf8');
    $sql = 'SELECT o.OrderDate,c.CompanyName,e.LastName,o.RequiredDate,o.ShippedDate 
            FROM orders o 
            JOIN employees e on (e.EmployeeID = o.EmployeeID) 
            JOIN customers c on (c.CustomerID = o.CustomerID) 
            WHERE o.RequiredDate < o.ShippedDate 
            ORDER BY (o.ShippedDate - o.RequiredDate) DESC';
    $stmt = $mysqli->prepare($sql);

?>

<table></table>