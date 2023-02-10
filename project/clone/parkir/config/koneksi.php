<?php
	error_reporting(0);

	$host = "localhost:3307";
	$user = "root";
	$pass = "Maulidanar0406";
	$db = "db_parkir";

	$con = mysqli_connect($host, $user, $pass, $db) or DIE("<script>alert('Gagal Koneksi Ke Database !!')</script>");
?>