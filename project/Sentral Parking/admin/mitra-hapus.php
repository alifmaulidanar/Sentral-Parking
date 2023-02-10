<?php
    include '../config/koneksi2.php';
    $username = $_GET['username'];
    $id_mitra = $_GET['id_mitra'];

    session_start();
    if (!isset($_SESSION['username_admin']) || $_SESSION['username_admin'] == NULL || $username == NULL || $username != $_SESSION['username_admin'] || $_SESSION['role_admin'] == $username || $_SESSION['role_admin'] == NULL || $id_mitra == NULL) {
        unset($_SESSION['username_admin']);
        unset($_SESSION['password_admin']);
        unset($_SESSION['id_admin']);
        unset($_SESSION['role_admin']);
        unset($_SESSION['id_mitra']);
        header("Location: index.php");
    }

    // echo $_SESSION['id_admin'];
    // echo "Login Success";

    $id_mitra = $_POST['id_mitra'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // $query = mysqli_query($con, "DELETE FROM data_mitra WHERE id_mitra = '$_GET[id_mitra]'");

    // update 'deleted' di tabel data_mitra
    $query = mysqli_query($con, "UPDATE data_mitra SET deleted = '1' WHERE id_mitra = '$_GET[id_mitra]'");

    // update 'deleted' di tabel data_aktivitas
    $query = mysqli_query($con, "UPDATE data_aktivitas SET deleted = '1' WHERE id_mitra = '$_GET[id_mitra]'");

    header('Location: mitra-kelola.php?username='.$username);

