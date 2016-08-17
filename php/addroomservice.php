<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
include("functions.php");

if(isset($_POST['imeSobe']) && isset($_POST['imaTV']) && isset($_POST['kreveti'])) {
	$imeSobe = $_POST['imeSobe'];
	$imaTV = intval($_POST['imaTV']);
	$kreveti = intval($_POST['kreveti']);
	addRoom($imeSobe, $imaTV, $kreveti);
}

?>