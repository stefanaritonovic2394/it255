<?php
session_start();
include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rezervacija | MetHotels</title>
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
						<li class="active"><a href="rezervacija.php">Rezervacija</a></li>
						<li><a href="onama.php">O nama</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['id'])) { ?>
						<li><p class="navbar-text">Prijavljen kao <?php echo $_SESSION['ime']; ?></p></li>
						<li><a href="logout.php">Izloguj se</a></li>
						<?php } else { ?>
						<li><a href="login.php">Uloguj se</a></li>
						<li><a href="register.php">Registruj se</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Glavni sadrzaj -->
		<div class="container">
			<div class="page-header">
				<h1>Rezervacija</h1>
			</div>
			<div class="container">
  				<h2>Forma</h2>
  				<form role="form">
  					<div class="form-group">
      					<label for="ime">Ime</label>
      					<input type="text" class="form-control" id="ime" placeholder="Unesite ime">
    				</div>
    				<div class="form-group">
      					<label for="prezime">Prezime</label>
      					<input type="text" class="form-control" id="prezime" placeholder="Unesite prezime">
    				</div>
    				<div class="form-group">
      					<label for="email">Email</label>
      					<input type="email" class="form-control" id="email" placeholder="Unesite email">
    				</div>
    				<div class="form-group">
      					<label for="date">Datum prijave</label>
      					<input type="date" class="form-control" id="datum_prijave" placeholder="Unesite datum prijave">
    				</div>
    				<div class="form-group">
      					<label for="date">Datum odjave</label>
      					<input type="date" class="form-control" id="datum_odjave" placeholder="Unesite datum odjave">
    				</div>
    				<button type="submit" class="btn btn-success">Rezerviši</button>
  				</form>
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