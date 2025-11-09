<?php
require 'db.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
$cars = [];

while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}

header('Content-Type: application/json');
echo json_encode($cars);
?>
