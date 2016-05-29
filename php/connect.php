<?php
$servername = "localhost";
$username = "root";
$password = "stefan";
$dbname = "dz10";

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Proveri konekciju
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}
?>