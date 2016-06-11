<?php
header('Access-Control-Allow-Methods: GET, POST');  
include("functions.php");

if(isset($_POST['imeSobe']) && isset($_POST['imaTV']) && isset($_POST['kreveti']) && isset($_POST['id'])) {
	$imeSobe = $_POST['imeSobe'];
	$imaTV = intval($_POST['hasTV']);
	$kreveti = intval($_POST['kreveti']);
	$id = intval($_POST['id']);

	echo updateRoom($imeSobe, $imaTV, $kreveti, $id);
}

?>