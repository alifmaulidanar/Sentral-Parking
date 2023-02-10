<?php
	error_reporting(0);

	$host = "localhost:3307";
	$user = "root";
	$pass = "Maulidanar0406";
	$db = "database_sentral_parking";

	$con = mysqli_connect($host, $user, $pass, $db) or DIE("<script>alert('Koneksi Database Gagal!')</script>");
?>