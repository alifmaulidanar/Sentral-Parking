<?php
    include '../../config/koneksi2.php';
    $username = $_GET['username'];
    $id_kode_kartu = $_GET['id_kode_kartu'];

    session_start();
    if (!isset($_SESSION['username_admin']) || $_SESSION['username_admin'] == NULL || $username == NULL || $username != $_SESSION['username_admin'] || $_SESSION['role_admin'] == $username || $_SESSION['role_admin'] == NULL || $id_kode_kartu == NULL) {
        unset($_SESSION['username_admin']);
        unset($_SESSION['password_admin']);
        unset($_SESSION['id_admin']);
        unset($_SESSION['role_admin']);
        header("Location: ../");
    }

    // echo $_SESSION['id_admin'];
    // echo "Login Success";

    $id_kode_kartu = $_POST['id_kode_kartu'];

    $query = mysqli_query($con, "DELETE FROM kartu_daftar WHERE id_kode_kartu = '$_GET[id_kode_kartu]'");

    $query = mysqli_query($con, "DELETE FROM kartu_kartu WHERE id_kode_kartu = '$_GET[id_kode_kartu]'");

    $query = mysqli_query($con, "UPDATE parkir_kartu SET deleted = 1 WHERE id_kode_kartu = '$_GET[id_kode_kartu]' AND deleted = 0");

    header('Location: ' . $_SERVER["HTTP_REFERER"]);
    exit;
