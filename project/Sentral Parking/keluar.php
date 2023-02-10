<?php
    include 'config/koneksi2.php';

    // if (isset($_POST['tombol-done'])) {
        $kode = $_POST['kartu_keluar'];

        $query = mysqli_query($con, "SELECT * FROM parkir_daftar WHERE deleted IS NULL AND id_kode_kartu = '$_GET[kartu_keluar]'");
        $data_kartu_parkir = mysqli_fetch_array($query);

        $kode_keluar = $data_kartu_parkir['id_kode_kartu'];
        $status_keluar = $data_kartu_parkir['id_status'];
        $jenis_keluar = $data_kartu_parkir['id_jenis'];
        $jam_masuk_keluar = $data_kartu_parkir['jam_masuk'];
        $durasi_keluar = $data_kartu_parkir['durasi'];
        $tarif_keluar = $data_kartu_parkir['tarif'];

        $query = mysqli_query($con, "UPDATE parkir_daftar SET deleted = '1' WHERE id_kode_kartu = '$_GET[kartu_keluar]'");

        header('Location: ' . $_SERVER["HTTP_REFERER"]);
        exit();
    // }