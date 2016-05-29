<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');

include("connect.php");

if(isset($_POST['imeHotela']) && isset($_POST['grad']) && isset($_POST['zvezdica'])) {
	$imeHotela = $_POST['imeHotela'];
	$grad = $_POST['grad'];
	$zvezdica = $_POST['zvezdica'];

	$stmt = $conn->prepare("INSERT INTO hoteli (imehotela, grad, zvezdica) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $imeHotela, $grad, $zvezdica);
	$stmt->execute();
	echo "ok";
}
?>