<?php
header('Access-Control-Allow-Methods: GET');
include("functions.php");

if(isset($_GET['id'])) {
	echo deleteRoom(intval($_GET['id']));
}

?>