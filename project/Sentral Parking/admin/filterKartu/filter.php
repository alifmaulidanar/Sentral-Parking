<?php
    include '../../config/koneksi2.php';

    $semua = $_POST['semua'];
    $visitor_mobil = $_POST['visitor_mobil'];
    $visitor_motor = $_POST['visitor_motor'];
    $member_mobil = $_POST['member_mobil'];
    $member_motor = $_POST['member_motor'];
    $guest = $_POST['guest'];
    $vip = $_POST['vip'];

    // update 'deleted' di tabel data_petugas
    $query = mysqli_query($con, "SELECT kartu_daftar.id, kartu_daftar.id_kode_kartu, kartu_kartu.id_kode_kartu, kartu_kartu.kode_kartu, kartu_status.id_status, kartu_status.status, kartu_jenis.id_jenis, kartu_jenis.jenis FROM kartu_daftar, kartu_kartu, kartu_status, kartu_jenis WHERE kartu_daftar.id_kode_kartu IS NOT NULL AND kartu_daftar.id_kode_kartu = kartu_kartu.id_kode_kartu AND kartu_daftar.id_status = kartu_status.id_status AND kartu_daftar.id_jenis = kartu_jenis.id_jenis");

    // update 'deleted' di tabel data_aktivitas
    $query = mysqli_query($con, "UPDATE data_aktivitas SET deleted = '1' WHERE id_petugas = '$_GET[id_petugas]'");

    header('Location: petugas-kelola.php');

