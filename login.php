<?php
session_start();

if(isset($_SESSION['id'])!="") {
	header("Location: index.php");
}

include_once 'connect.php';

//provera da li je forma popunjena
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM korisnik WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['ime'] = $row['ime'];
		header("Location: index.php");
	} else {
		$errormsg = "Netačan email ili lozinka!!!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logovanje | MetHotels</title>
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
						<li class="active"><a href="login.php">Uloguj se</a></li>
						<li><a href="register.php">Registruj se</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Glavni sadrzaj -->
		<div class="container">
			<div class="page-header">
				<h1>Logovanje</h1>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 well">
					<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
						<fieldset>
							<legend>Uloguj se</legend>
							
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" placeholder="Unesite email" required class="form-control" />
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" placeholder="Unesite lozinku" required class="form-control" />
							</div>

							<div class="form-group">
								<input type="submit" name="login" value="Uloguj se" class="btn btn-primary" />
							</div>
						</fieldset>
					</form>
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 text-center">	
				Novi Korisnik? <a href="register.php">Registruj se ovde</a>
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