<?php
session_start();

if(isset($_SESSION['id'])) {
	header("Location: index.php");
}

include_once 'connect.php';

$error = false;

//provera da li je forma popunjena
if (isset($_POST['signup'])) {
	$ime = mysqli_real_escape_string($con, $_POST['ime']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//ime može samo da sadrži alfa numeričke znakove i razmak
	if (!preg_match("/^[a-zA-Z ]+$/", $ime)) {
		$error = true;
		$name_error = "Ime mora da sadrži samo slova i razmak";
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Unesite ispravan Email ID";
	}

	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Lozinka mora da bude minimum 6 karaktera";
	}

	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Lozinka i potvrdna lozinka se ne slažu";
	}

	if (!$error) {
		if(mysqli_query($con, "INSERT INTO korisnik (ime, email, password) VALUES ('" . $ime . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "Uspešno ste se registrovali! <a href='login.php'>Kliknite ovde da se ulogujete</a>";
		} else {
			$errormsg = "Greška prilikom registrovanja...Molimo Vas pokušajte ponovo kasnije!";
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registracija | MetHotels</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stilovi.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="wrap">
		<!-- Navigacioni meni -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">MetHotels</a>
				</div>
				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Početna</a></li>
						<li><a href="rezervacija.php">Rezervacija</a></li>
						<li><a href="onama.php">O nama</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php">Uloguj se</a></li>
						<li class="active"><a href="register.php">Registruj se</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Glavni sadrzaj -->
		<div class="container">
			<div class="page-header">
				<h1>Registracija</h1>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 well">
					<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
						<fieldset>
							<legend>Registruj se</legend>

							<div class="form-group">
								<label for="ime">Ime</label>
								<input type="text" name="ime" placeholder="Unesite ime" required value="<?php if($error) echo $ime; ?>" class="form-control" />
								<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
							</div>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" placeholder="Unesite email" required value="<?php if($error) echo $email; ?>" class="form-control" />
								<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
							</div>

							<div class="form-group">
								<label for="password">Lozinka</label>
								<input type="password" name="password" placeholder="Unesite lozinku" required class="form-control" />
								<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
							</div>

							<div class="form-group">
								<label for="cpassword">Potvrdite lozinku</label>
								<input type="password" name="cpassword" placeholder="Unesite potvrdnu lozinku" required class="form-control" />
								<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
							</div>

							<div class="form-group">
								<input type="submit" name="signup" value="Registruj se" class="btn btn-primary" />
							</div>
						</fieldset>
					</form>
					<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 text-center">	
				Već ste registrovani? <a href="login.php">Uloguj se ovde</a>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Footer -->
	<div id="footer">
		<div class="container-fluid text-center">
			<p>Kontakt: stefanaritonovic@gmail.com</p>
		</div>
	</div>
</body>
</html>