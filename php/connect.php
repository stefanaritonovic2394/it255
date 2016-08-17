<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization, Token, token, TOKEN');
if($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
	exit();
}
$servername = "localhost";
$username = "root";
$password = "stefan";
$dbname = "dz14";

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Proveri konekciju
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

// Postavljamo set karaktera na UTF-8
if (!$conn->set_charset("utf8")) {
	printf("Greska pri ucitavanju karaktera utf8: %s\n", $mysqli->error);
	exit();
}
?>