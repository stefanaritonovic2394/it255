<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');

include("connect.php");

if(isset($_POST['imeSobe']) && isset($_POST['imaTV']) && isset($_POST['kreveti'])) {
	$imeSobe = $_POST['imeSobe'];
	$imaTV = intval($_POST['imaTV']);
	$kreveti = intval($_POST['kreveti']);

	$stmt = $conn->prepare("INSERT INTO sobe (imesobe, tv, kreveti) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $imeSobe, $imaTV, $kreveti);
	$stmt->execute();
	echo "ok";
}
?>