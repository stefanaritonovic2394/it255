<?php
session_start();

if(isset($_SESSION['id'])) {
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['ime']);
	header("Location: index.php");
} else {
	header("Location: index.php");
}
?>