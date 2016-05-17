<?php
//povezivanje sa mysql bazom podataka
$con = mysqli_connect("localhost", "root", "stefan", "baza") or die("Greška " . mysqli_error($con));
?>