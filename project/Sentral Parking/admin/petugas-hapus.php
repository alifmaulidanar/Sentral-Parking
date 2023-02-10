<?php
    include '../config/koneksi2.php';
    $username = $_GET['username'];
    $id_petugas = $_GET['id_petugas'];

    session_start();
    if (!isset($_SESSION['username_admin']) || $_SESSION['username_admin'] == NULL || $username == NULL || $username != $_SESSION['username_admin'] || $_SESSION['role_admin'] == $username || $_SESSION['role_admin'] == NULL || $id_petugas == NULL) {
        unset($_SESSION['username_admin']);
        unset($_SESSION['password_admin']);
        unset($_SESSION['id_admin']);
        unset($_SESSION['role_admin']);
        unset($_SESSION['id_petugas']);
        header("Location: index.php");
    }

    // echo $_SESSION['id_admin'];
    // echo "Login Success";

    $id_petugas = $_POST['id_petugas'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // $query = mysqli_query($con, "DELETE FROM data_petugas WHERE username = '$_GET[username]'");

    // update 'deleted' di tabel data_petugas
    $query = mysqli_query($con, "UPDATE data_petugas SET deleted = '1' WHERE id_petugas = '$_GET[id_petugas]'");

    // update 'deleted' di tabel data_aktivitas
    $query = mysqli_query($con, "UPDATE data_aktivitas SET deleted = '1' WHERE id_petugas = '$_GET[id_petugas]'");

    header('Location: petugas-kelola.php?username='.$username);

