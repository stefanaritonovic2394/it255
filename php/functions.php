<?php
include("connect.php");

function checkIfLoggedIn() {
	global $conn;
	if(isset($_SERVER['HTTP_TOKEN'])) {
		$token = $_SERVER['HTTP_TOKEN'];
		$result = $conn->prepare("SELECT * FROM korisnici WHERE token=?");
		$result->bind_param("s", $token);
		$result->execute();
		$result->store_result();
		$num_rows = $result->num_rows;
		if($num_rows > 0) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function login($username, $password) {
	global $conn;
	$rarray = array();
	if(checkLogin($username, $password)) {
		$id = sha1(uniqid());
		$result2 = $conn->prepare("UPDATE korisnici SET token=? WHERE username=?");
		$result2->bind_param("ss", $id, $username);
		$result2->execute();
		$rarray['token'] = $id;
	} else {
		header('HTTP/1.1 401 Unauthorized');
		$rarray['error'] = "Pogresno korisnicko ime/lozinka";
	}
	return json_encode($rarray);
}

function checkLogin($username, $password) {
	global $conn;
	$password = md5($password);
	$result = $conn->prepare("SELECT * FROM korisnici WHERE username=? AND password=?");
	$result->bind_param("ss", $username, $password);
	$result->execute();
	$result->store_result();
	$num_rows = $result->num_rows;
	if($num_rows > 0) {
		return true;
	} else {
		return false;
	}
}

function register($username, $password, $ime, $prezime) {
	global $conn;
	$rarray = array();
	$errors = "";
	if(checkIfUserExists($username)) {
		$errors .= "Korisnicko ime vec postoji\r\n";
	}
	if(strlen($username) < 5) {
		$errors .= "Korisnicko ime mora da ima najmanje 5 karaktera\r\n";
	}
	if(strlen($password) < 5) {
		$errors .= "Lozinka mora da ima najmanje 5 karaktera\r\n";
	}
	if(strlen($ime) < 3) {
		$errors .= "Ime mora da ima najmanje 3 karaktera\r\n";
	}
	if(strlen($prezime) < 3) {
		$errors .= "Prezime mora da ima najmanje 3 karaktera\r\n";
	}
	if($errors == "") {
		$stmt = $conn->prepare("INSERT INTO korisnici (ime, prezime, username, password) VALUES (?, ?, ?, ?)");
		$pass = md5($password);
		$stmt->bind_param("ssss", $ime, $prezime, $username, $pass);
		if($stmt->execute()) {
			$id = sha1(uniqid());
			$result2 = $conn->prepare("UPDATE korisnici SET token=? WHERE username=?");
			$result2->bind_param("ss", $id, $username);
			$result2->execute();
			$rarray['token'] = $id;
		} else {
			header('HTTP/1.1 400 Bad request');
			$rarray['error'] = "Greska prilikom konekcije sa bazom podataka";
		}
	} else {
		header('HTTP/1.1 400 Bad request');
		$rarray['error'] = json_encode($errors);
	}
	return json_encode($rarray);
}

function checkIfUserExists($username) {
	global $conn;
	$result = $conn->prepare("SELECT * FROM korisnici WHERE username=?");
	$result->bind_param("s", $username);
	$result->execute();
	$result->store_result();
	$num_rows = $result->num_rows;
	if($num_rows > 0) {
		return true;
	} else {
		return false;
	}
}

function addRoom($imeSobe, $imaTV, $kreveti) {
	global $conn;
	$rarray = array();
	$stmt = $conn->prepare("INSERT INTO sobe (imesobe, tv, kreveti) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $imeSobe, $imaTV, $kreveti);
	if($stmt->execute()) {
		$rarray['sucess'] = "ok";
	} else {
		$rarray['error'] = "Greska prilikom konekcije sa bazom podataka";
	}
	return json_encode($rarray);
}

function updateRoom($imeSobe, $imaTV, $kreveti, $id) {
	global $conn;
	$rarray = array();
	if(checkIfLoggedIn()){
		$stmt = $conn->prepare("UPDATE sobe SET imesobe=?, tv=?, kreveti=? WHERE id=?");
		$stmt->bind_param("sssi", $imeSobe, $imaTV, $kreveti, $id);
		if($stmt->execute()) {
			$rarray['success'] = "Azurirana";
		} else {
			$rarray['error'] = "Greska prilikom konekcije sa bazom podataka";
		}
	} else {
		$rarray['error'] = "Molimo Vas ulogujte se";
		header('HTTP/1.1 401 Unauthorized');
	}
	return json_encode($rarray);
}

function getRoomWithId($id) {
	global $conn;
	$rarray = array();
	if(checkIfLoggedIn()){
		$id = $conn->real_escape_string($id);
		$result = $conn->query("SELECT * FROM sobe WHERE id=".$id);
		$num_rows = $result->num_rows;
		$rooms = array();
		if($num_rows > 0) {
			$result2 = $conn->query("SELECT * FROM sobe WHERE id=".$id);
			while($row = $result2->fetch_assoc()) {
				$rooms = $row;
			}
		}
		$rarray = $rooms;
		return json_encode($rarray);
	} else {
		$rarray['error'] = "Molimo Vas ulogujte se";
		header('HTTP/1.1 401 Unauthorized');
		return json_encode($rarray);
	}
}

function deleteRoom($id) {
	global $conn;
	$rarray = array();
	if(checkIfLoggedIn()){
		$result = $conn->prepare("DELETE FROM sobe WHERE id=?");
		$result->bind_param("i", $id);
		$result->execute();
		$rarray['success'] = "Uspesno obrisana";
	} else {
		$rarray['error'] = "Molimo Vas ulogujte se";
		header('HTTP/1.1 401 Unauthorized');
	}
	return json_encode($rarray);
}

function getRooms() {
	global $conn;
	$rarray = array();
	if(checkIfLoggedIn()) {
		$result = $conn->query("SELECT * FROM sobe");
		$num_rows = $result->num_rows;
		$rooms = array();
		if($num_rows > 0) {
			$result2 = $conn->query("SELECT * FROM sobe");
			while($row = $result2->fetch_assoc()) {
				$one_room = array();
				$one_room['id'] = $row['id'];
				$one_room['imesobe'] = $row['imesobe'];
				$one_room['tv'] = $row['tv'];
				$one_room['kreveti'] = $row['kreveti'];
				array_push($rooms, $one_room);
			}
		}
		$rarray['rooms'] = $rooms;
		return json_encode($rarray);
	} else {
		$rarray['error'] = "Molimo Vas ulogujte se";
		header('HTTP/1.1 401 Unauthorized');
		return json_encode($rarray);
	}
}

?>