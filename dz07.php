<?php
if(isset($_POST['a'])) {
	header("Content-type: application/json");
	$a = trim($_POST['a']);
	$niz = array(
		'stranica' => 'a',
		'povrsina kocke' => 6*$a*$a,
	);
	echo json_encode($niz);
}

if(isset($_GET['a'])) {
	header("Content-type: application/json");
	$a = trim($_GET['a']);
	$niz = array(
		'stranica' => 'a',
		'zapremina kocke' => $a*$a*$a,
	);
	echo json_encode($niz);
}
?>