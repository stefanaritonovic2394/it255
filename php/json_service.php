<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/json');

include('connect.php');

$sql = "SELECT * FROM sobe";
$result = $conn->query($sql);

$sobe_array = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sobe_array[] = $row;
    }
}

echo json_encode($sobe_array);

$conn->close();
?>