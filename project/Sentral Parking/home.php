<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <!-- <link rel="stylesheet" media="print" href="css/print.css" /> -->
    <link rel="icon" href="assets/logo/logo32x32.ico">
    <title>Home</title>
</head>
<body>
    <?php
        session_start();
        include 'config/koneksi2.php';
        $username = $_GET['username'];

        date_default_timezone_set("Asia/Jakarta");
        // $tanggal_hari_ini = date('d-m-Y');

        if (!isset($_SESSION['username_petugas']) || $_SESSION['username_petugas'] == NULL || $username == NULL || $username != $_SESSION['username_petugas'] || $_SESSION['role_petugas'] == $username || $_SESSION['role_petugas'] == NULL) {
            unset($_SESSION['username_petugas']);
            unset($_SESSION['password_petugas']);
            unset($_SESSION['id_petugas']);
            unset($_SESSION['role_petugas']);
            header("Location: ../Sentral Parking/");
        }

        // echo $_SESSION['id_petugas'];
        // echo "Login Success";

        $total = 200;
        $query = mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE deleted IS NULL");
        $array = mysqli_fetch_array($query);
        $count = $array['COUNT(*)'];

        // $_SESSION['tanggal_hari_ini'] = $tanggal_hari_ini;

        if (isset($_GET['logout'])){
            // session_destroy();
            unset($_SESSION['username_petugas']);
            unset($_SESSION['password_petugas']);
            unset($_SESSION['id_petugas']);
            unset($_SESSION['role_petugas']);
            header("Location: ../Sentral Parking/");
        }
    ?>
    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="home.php?username=<?= $username ?>">
                <img src="assets/logo/logo32x32.png" class="d-inline-block align-middle logo-sentral">
                Sentral Parking
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav w-100 mx-auto d-flex align-items-center justify-content-center">
                <li class="nav-item w-50">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav justify-content-around">
                            <a class="nav-item nav-link menu active" href="home.php?username=<?= $username ?>">Home<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link menu" href="aktivitas-parkir.php?username=<?= $username ?>">Aktivitas Parkir</a>
                            <a class="nav-item nav-link menu" href="rekap-data.php?username=<?= $username ?>">Rekap Data</a>
                            <!-- <a class="nav-item nav-link menu" href="rekap-data.php?username=<?= $username ?>&tanggal=<?= $tanggal_hari_ini ?>">Rekap Data</a> -->
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav profile ml-auto d-flex align-items-center justify-content-end">
                <li class="nav-item dropdown active text-right">
                    <a class="nav-link dropdown-toggle tombol-profile d-flex align-items-center justify-content-end" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></a>
                        <!-- Alif Maulidanar -->
                        <!-- <img src="assets/logo/profile.png" width="28" height="28" alt=""> -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" onclick="return confirm('Apakah yakin ingin Log Out?');" href="?username=<?= $kode ?>&logout">Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Body -->
        <div class="container-fluid">
            <div class="row w-100 marpad-1 d-flex justify-content-around mx-auto">
                <div class="col-lg-6 d-flex justify-content-center">
                    <!-- Card Masuk Parkir -->
                    <div class="area-mp mx-auto">
                        <div class="card masuk">
                            <div class="card-header">
                                <?php
                                    include 'config/koneksi2.php';

                                    date_default_timezone_set("Asia/Jakarta");
                                    $waktu = date('H:i:s');
                                    $tanggal = date('D, d M Y');
                                    $tanggal_masuk = date('d-m-Y');
                                    $waktu_masuk = date('Y-m-d H:i:s');
                                    $waktu_tanggal_print = date('H:i:s / d-m-Y');

                                    // $query = mysqli_query($con, "SELECT * FROM kartu_daftar, kartu_kartu, kartu_status, kartu_jenis");
                                    // $inisiasi = mysqli_fetch_array($query);

                                    if (isset($_POST['submit-button'])) {
                                        $kode = $_POST['kode_kartu'];

                                        $query = mysqli_query($con, "SELECT * FROM parkir_kartu WHERE kode_kartu = '$kode' AND deleted = 0");
                                        $ada = mysqli_fetch_array($query);
                                        // echo $ada['id_kode_kartu'];
                                                
                                        $query_cek = mysqli_query($con, "SELECT id_kode_kartu FROM parkir_daftar WHERE id_kode_kartu = '$ada[id_kode_kartu]' AND deleted IS NULL");
                                        $cek = mysqli_fetch_array($query_cek);
                                        
                                        if ($cek['id_kode_kartu'] == $ada['id_kode_kartu'] && $ada['kode_kartu'] == $kode) {
                                            $gagal = "Gagal masuk parkir! Kartu '$kode' sudah ada di Daftar Kendaraan!";
                                        } else {
                                            if ($kode == $ada['kode_kartu']) {
                                                $query_kode = mysqli_query($con, "SELECT * FROM kartu_daftar WHERE id_kode_kartu = '$ada[id_kode_kartu]'");
                                                $kartu_masuk = mysqli_fetch_array($query_kode);

                                                $id_kode_kartu_parkir = $kartu_masuk['id_kode_kartu'];
                                                $id_status_parkir = $kartu_masuk['id_status'];
                                                $id_jenis_parkir = $kartu_masuk['id_jenis'];

                                                if ($id_status_parkir == 1) {
                                                    if ($id_jenis_parkir == 1) {
                                                        $id_utk_tarif = 1;
                                                    } elseif ($id_jenis_parkir == 2) {
                                                        $id_utk_tarif = 2;
                                                    }
                                                } elseif ($id_status_parkir == 2) {
                                                    $id_utk_tarif = 3;
                                                } elseif ($id_status_parkir == 3 || $id_status_parkir == 4) {
                                                    $id_utk_tarif = 3;
                                                }
                                                // echo $_POST['kode_kartu'];

                                                $query_insert = mysqli_query($con, "INSERT INTO parkir_daftar (id_kode_kartu, id_status, id_jenis, id_tarif, waktu_masuk) VALUES ('$id_kode_kartu_parkir', '$id_status_parkir', '$id_jenis_parkir', '$id_utk_tarif', '$waktu_masuk')");

                                                // $query_input = mysqli_query($con, "INSERT INTO parkir_daftar (id_kode_kartu, id_status, id_jenis, id_tarif, waktu_masuk) VALUES ('$kode', '$id_status_parkir', '$id_jenis_parkir', '$id_utk_tarif', '$waktu_masuk')");

                                                $query_status = mysqli_query($con, "SELECT * FROM kartu_status WHERE id_status = '$id_status_parkir'");
                                                $stat = mysqli_fetch_array($query_status);
                                                $status = $stat['status'];

                                                $query_jenis = mysqli_query($con, "SELECT * FROM kartu_jenis WHERE id_jenis = '$id_jenis_parkir'");
                                                $jen = mysqli_fetch_array($query_jenis);
                                                $jenis = $jen['jenis'];

                                                // $total = 200;
                                                // $query = mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE deleted IS NULL");
                                                // $array = mysqli_fetch_array($query);
                                                // $count = $array['COUNT(*)'];

                                                // $query_status = mysqli_query($con, "SELECT id_status FROM kartu_status WHERE kode_kartu = '$kode'");
                                                // $id_status_masuk = mysqli_fetch_array($query_status);
                                            } else {
                                                $gagal = "Kartu '$kode' belum terdaftar!";
                                            }
                                        }
                                    }

                                    if (isset($_POST['tombol-rahasia'])) {
                                        $kode = $_POST['kartu_keluar'];

                                        $query = mysqli_query($con, "SELECT * FROM parkir_kartu WHERE kode_kartu = '$kode'");
                                        $ada_kartu = mysqli_fetch_array($query);

                                        $query_del = mysqli_query($con, "SELECT * FROM parkir_daftar WHERE deleted IS NULL");
                                        $notDeleted = mysqli_fetch_array($query_del);
                                        $del_0 = $notDeleted['deleted'];
                                        // echo $del_0;

                                        if ($kode == $ada_kartu['kode_kartu'] && $del_0 != 1) {
                                            $query_ambil = mysqli_query($con, "SELECT parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.durasi, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis WHERE parkir_kartu.kode_kartu = '$kode' AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.deleted IS NULL");
                                            $data_kartu_parkir = mysqli_fetch_array($query_ambil);

                                            $kode_keluar = $data_kartu_parkir['kode_kartu'];
                                            $id_status_keluar = $data_kartu_parkir['id_status'];
                                            $status_keluar = $data_kartu_parkir['status'];
                                            $id_jenis_keluar = $data_kartu_parkir['id_jenis'];
                                            $jenis_keluar = $data_kartu_parkir['jenis'];
                                            $jam_masuk = $data_kartu_parkir['waktu_masuk'];

                                            // echo $tampil_jam_masuk;
                                            // echo $tampil_jam_keluar;
                                            
                                            if ($kode == $kode_keluar && $del_0 != 1) {
                                                $jam_msk = new DateTime($jam_masuk);
                                                $tampil_jam_masuk = $jam_msk->format('d-m-Y H:i:s');
                                                $tampil_wkt_msk = $jam_msk->format('H:i:s / d-m-Y');
                                                
                                                $waktu_keluar = date('Y-m-d H:i:s');
                                                $jam_keluar = $waktu_keluar;
                                                $jam_klr = new DateTime($jam_keluar);
                                                $tampil_jam_keluar = $jam_klr->format('d-m-Y H:i:s');
                                                
                                                $durasi_keluar_jam = (strtotime($tampil_jam_keluar) - strtotime($tampil_jam_masuk)) / 3600;
                                                $tampil_durasi_jam = floor($durasi_keluar_jam);
                                                
                                                $durasi_full_menit = (strtotime($tampil_jam_keluar) - strtotime($tampil_jam_masuk)) / 60;
                                                // echo floor($durasi_full_menit);
                                                $durasi_jam_menit = $tampil_durasi_jam * 60;
                                                $durasi_keluar_menit = $durasi_full_menit - $durasi_jam_menit;
                                                $tampil_durasi_menit = floor($durasi_keluar_menit);

                                                $jam = " jam";
                                                $menit = " menit";
                                                // echo $durasi_keluar;
                                                
                                                if ($durasi_full_menit != 0) {
                                                    
                                                    // tarif
                                                    $query_tarif = mysqli_query($con, "SELECT parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.id_tarif, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_jenis.id_jenis = '$id_jenis_keluar' AND parkir_tarif.id_tarif = '$id_jenis_keluar' AND parkir_daftar.id_status = $id_status_keluar");
                                                    $ambil_tarif = mysqli_fetch_array($query_tarif);
                                                    // echo $id_status_keluar;
                                                    
                                                    // // echo $ambil_tarif['id_jenis'];
                                                    
                                                    $gratis = (strtotime('10:10:00') - strtotime('10:00:00')) / 60;
                                                    $satu_jam_pertama = (strtotime('10:00:00') - strtotime('09:00:00')) / 60;
                                                    
                                                    if ($id_jenis_keluar == $ambil_tarif['id_tarif'] && $id_jenis_keluar == $ambil_tarif['id_jenis'] && $ambil_tarif['id_tarif'] == $ambil_tarif['id_jenis']) {
                                                        switch ($id_status_keluar) {
                                                            // Visitor
                                                            case 1:
                                                                switch ($ambil_tarif['id_jenis']) {
                                                                    // mobil
                                                                    case 1:
                                                                        $mobil = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '4000'");
                                                                        $tarif_mobil = mysqli_fetch_array($mobil);
    
                                                                        // 0
                                                                        if ($durasi_full_menit <= $gratis){
                                                                            $total_tarif = "Gratis";
                                                                        // 4.000
                                                                        } elseif ($gratis < $durasi_full_menit && $durasi_full_menit <= $satu_jam_pertama) {
                                                                            $total_tarif = $tarif_mobil['tarif'];
                                                                        // 6.000
                                                                        } elseif ($satu_jam_pertama < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 2)) {
                                                                            $total_tarif = $tarif_mobil['tarif'] * 1.5;
                                                                        // 8.000
                                                                        } elseif (($satu_jam_pertama * 2) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 3)) {
                                                                            $total_tarif = $tarif_mobil['tarif'] * 2;
                                                                        // 10.000
                                                                        } elseif (($satu_jam_pertama * 3) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 4)) {
                                                                            $total_tarif = $tarif_mobil['tarif'] * 2.5;
                                                                        // 10.000
                                                                        } elseif (($satu_jam_pertama * 4) < $durasi_full_menit) {
                                                                            $total_tarif = $tarif_mobil['tarif'] * 2.5;
                                                                        }
                                                                        break;
                                                                    
                                                                    // motor
                                                                    case 2:
                                                                        $motor = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '2000'");
                                                                        $tarif_motor = mysqli_fetch_array($motor);
    
                                                                        // 0
                                                                        if ($durasi_full_menit <= $gratis){
                                                                            $total_tarif = "Gratis";
                                                                        // 2.000
                                                                        } elseif ($gratis < $durasi_full_menit && $durasi_full_menit <= $satu_jam_pertama) {
                                                                            $total_tarif = $tarif_motor['tarif'];
                                                                        // 3.000
                                                                        } elseif ($satu_jam_pertama < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 2)) {
                                                                            $total_tarif = $tarif_motor['tarif'] * 1.5;
                                                                        // 4.000
                                                                        } elseif (($satu_jam_pertama * 2) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 3)) {
                                                                            $total_tarif = $tarif_motor['tarif'] * 2;
                                                                        // 5.000
                                                                        } elseif (($satu_jam_pertama * 3) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 4)) {
                                                                            $total_tarif = $tarif_motor['tarif'] * 2.5;
                                                                        // 5.000
                                                                        } elseif (($satu_jam_pertama * 4) < $durasi_full_menit) {
                                                                            $total_tarif = $tarif_motor['tarif'] * 2.5;
                                                                        }
                                                                        break;
                                                                    
                                                                    // -
                                                                    default:
                                                                        $guest_vip = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '-'");
                                                                        $tarif_guest_vip = mysqli_fetch_array($guest_vip);
                                                                        $total_tarif = "Gratis";
                                                                }
                                                                break;
    
                                                            // Member
                                                            case 2:
                                                                $total_tarif = "Gratis";
                                                                break;
    
                                                            // Guest & VIP
                                                            case 3 || 4:
                                                                $total_tarif = "Gratis";
                                                                break;
                                                            
                                                            // Failed
                                                            default:
                                                                echo "Data kartu tidak ditemukan.";
                                                        }
                                                    }
                                                }


                                            } else {
                                                $unregistered = "Kartu tersebut belum terdaftar!";
                                            }

                                            // $durasi_keluar = date('G', $durasi);

                                            // $durasi_keluar = $data_kartu_parkir['durasi'];

                                            $tarif_keluar = $data_kartu_parkir['tarif'];

                                        } else {
                                            $unregistered = "Kartu tersebut belum terdaftar atau";
                                        }

                                    }
                                    
                                    if (isset($_POST['tombol-done'])) {
                                        $kode = $_POST['kartu_keluar'];

                                        $query = mysqli_query($con, "SELECT * FROM parkir_kartu WHERE kode_kartu = '$kode'");
                                        $ada_kartu = mysqli_fetch_array($query);

                                        $query_del = mysqli_query($con, "SELECT * FROM parkir_daftar WHERE deleted IS NULL");
                                        $notDeleted = mysqli_fetch_array($query_del);
                                        $del_0 = $notDeleted['deleted'];
                                        // echo $del_0;

                                        if ($kode == $ada_kartu['kode_kartu'] && $del_0 != 1) {
                                            $query_ambil = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.durasi, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis WHERE parkir_kartu.kode_kartu = '$kode' AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.deleted IS NULL");
                                            $data_kartu_parkir = mysqli_fetch_array($query_ambil);

                                            $id_k = $data_kartu_parkir['id'];
                                            $kode_k = $data_kartu_parkir['kode_kartu'];
                                            $id_status_keluar = $data_kartu_parkir['id_status'];
                                            $status_k = $data_kartu_parkir['status'];
                                            $id_jenis_keluar = $data_kartu_parkir['id_jenis'];
                                            $jenis_k = $data_kartu_parkir['jenis'];
                                            $jam_masuk = $data_kartu_parkir['waktu_masuk'];

                                            // echo $tampil_jam_masuk;
                                            // echo $tampil_jam_keluar;
                                            
                                            if ($kode == $kode_k && $del_0 != 1) {
                                                $jam_msk = new DateTime($jam_masuk);
                                                $tampil_jam_masuk = $jam_msk->format('d-m-Y H:i:s');
                                                $tampil_wkt_m = $jam_msk->format('H:i:s / d-m-Y');

                                                $waktu_k = date('Y-m-d H:i:s');
                                                $jam_keluar = $waktu_k;
                                                $jam_klr = new DateTime($jam_keluar);
                                                $tampil_jam_keluar = $jam_klr->format('d-m-Y H:i:s');

                                                $durasi_keluar_jam = (strtotime($tampil_jam_keluar) - strtotime($tampil_jam_masuk)) / 3600;
                                                $tampilkan_durasi_jam = floor($durasi_keluar_jam);
                                                
                                                $durasi_full_menit = (strtotime($tampil_jam_keluar) - strtotime($tampil_jam_masuk)) / 60;
                                                // echo floor($durasi_full_menit);
                                                $durasi_jam_menit = $tampilkan_durasi_jam * 60;
                                                $durasi_keluar_menit = $durasi_full_menit - $durasi_jam_menit;
                                                $tampilkan_durasi_menit = floor($durasi_keluar_menit);

                                                $tampilkan_durasi = $tampilkan_durasi_jam . " jam " . $tampilkan_durasi_menit . " menit";

                                                // tarif
                                                if ($durasi_full_menit != 0) {
                                                    
                                                    // tarif
                                                    $query_tarif = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.id_tarif, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_jenis.id_jenis = '$id_jenis_keluar' AND parkir_tarif.id_tarif = '$id_jenis_keluar' AND parkir_daftar.id_status = '$id_status_keluar' AND parkir_daftar.id = '$id_k'");
                                                    $ambil_tarif = mysqli_fetch_array($query_tarif);
                                                    // echo $id_status_keluar;
                                                    
                                                    // // echo $ambil_tarif['id_jenis'];
                                                    
                                                    $gratis = (strtotime('10:10:00') - strtotime('10:00:00')) / 60;
                                                    $satu_jam_pertama = (strtotime('10:00:00') - strtotime('09:00:00')) / 60;
                                                    
                                                    if ($id_jenis_keluar == $ambil_tarif['id_tarif'] && $id_jenis_keluar == $ambil_tarif['id_jenis'] && $ambil_tarif['id_tarif'] == $ambil_tarif['id_jenis'] && $ambil_tarif['id'] == $id_k) {
                                                        switch ($id_status_keluar) {
                                                            // Visitor
                                                            case 1:
                                                                switch ($ambil_tarif['id_jenis']) {
                                                                    // mobil
                                                                    case 1:
                                                                        $mobil = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '4000'");
                                                                        $tarif_mobil = mysqli_fetch_array($mobil);
    
                                                                        // 0
                                                                        if ($durasi_full_menit <= $gratis){
                                                                            $tarif_parkir = "Gratis";
                                                                        // 4.000
                                                                        } elseif ($gratis < $durasi_full_menit && $durasi_full_menit <= $satu_jam_pertama) {
                                                                            $tarif_parkir = $tarif_mobil['tarif'];
                                                                        // 6.000
                                                                        } elseif ($satu_jam_pertama < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 2)) {
                                                                            $tarif_parkir = $tarif_mobil['tarif'] * 1.5;
                                                                        // 8.000
                                                                        } elseif (($satu_jam_pertama * 2) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 3)) {
                                                                            $tarif_parkir = $tarif_mobil['tarif'] * 2;
                                                                        // 10.000
                                                                        } elseif (($satu_jam_pertama * 3) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 4)) {
                                                                            $tarif_parkir = $tarif_mobil['tarif'] * 2.5;
                                                                        // 10.000
                                                                        } elseif (($satu_jam_pertama * 4) < $durasi_full_menit) {
                                                                            $tarif_parkir = $tarif_mobil['tarif'] * 2.5;
                                                                        }
                                                                        break;
                                                                    
                                                                    // motor
                                                                    case 2:
                                                                        $motor = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '2000'");
                                                                        $tarif_motor = mysqli_fetch_array($motor);
    
                                                                        // 0
                                                                        if ($durasi_full_menit <= $gratis){
                                                                            $tarif_parkir = "Gratis";
                                                                        // 2.000
                                                                        } elseif ($gratis < $durasi_full_menit && $durasi_full_menit <= $satu_jam_pertama) {
                                                                            $tarif_parkir = $tarif_motor['tarif'];
                                                                        // 3.000
                                                                        } elseif ($satu_jam_pertama < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 2)) {
                                                                            $tarif_parkir = $tarif_motor['tarif'] * 1.5;
                                                                        // 4.000
                                                                        } elseif (($satu_jam_pertama * 2) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 3)) {
                                                                            $tarif_parkir = $tarif_motor['tarif'] * 2;
                                                                        // 5.000
                                                                        } elseif (($satu_jam_pertama * 3) < $durasi_full_menit && $durasi_full_menit <= ($satu_jam_pertama * 4)) {
                                                                            $tarif_parkir = $tarif_motor['tarif'] * 2.5;
                                                                        // 5.000
                                                                        } elseif (($satu_jam_pertama * 4) < $durasi_full_menit) {
                                                                            $tarif_parkir = $tarif_motor['tarif'] * 2.5;
                                                                        }
                                                                        break;
                                                                    
                                                                    // -
                                                                    default:
                                                                        $guest_vip = mysqli_query($con, "SELECT * FROM parkir_tarif WHERE tarif = '-'");
                                                                        $tarif_guest_vip = mysqli_fetch_array($guest_vip);
                                                                        $tarif_parkir = "Gratis";
                                                                }
                                                                break;
    
                                                            // Member
                                                            case 2:
                                                                $tarif_parkir = "Gratis";
                                                                break;
    
                                                            // Guest & VIP
                                                            case 3 || 4:
                                                                $tarif_parkir = "Gratis";
                                                                break;
                                                            
                                                            // Failed
                                                            default:
                                                                echo "Data kartu tidak ditemukan.";
                                                        }
                                                    }
                                                }

                                                // SELECT CONCAT('Rp', FORMAT(tarif, 0, 'de_DE')) tarif FROM parkir_tarif;
                                            }
                                        }
                                        // batas

                                        $query_tampil = mysqli_query($con, "SELECT * FROM parkir_daftar, parkir_kartu, parkir_jenis, parkir_tarif WHERE parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_kartu.kode_kartu = '$kode' AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.deleted IS NULL");
                                        $tampilkan = mysqli_fetch_array($query_tampil);

                                        $id_id = $tampilkan['id'];
                                        $id_keluar = $tampilkan['id_kode_kartu'];
                                        $kode_klr = $tampilkan['kode_kartu'];
                                        $id_status_rekap = $tampilkan['id_status'];
                                        $id_jenis_rekap = $tampilkan['id_jenis'];
                                        $id_tarif_rekap = $tampilkan['id_tarif'];

                                        // echo "id: " . $id_keluar;
                                        // echo " | status: " . $id_status_rekap;
                                        // echo " | jenis: " . $id_jenis_rekap;
                                        // echo " | tarif: " . $id_tarif_rekap;

                                        $query = mysqli_query($con, "UPDATE parkir_daftar SET waktu_keluar = '$waktu_k', durasi = '$tampilkan_durasi', deleted = '1' WHERE id_kode_kartu = '$id_keluar' AND deleted IS NULL");

                                        if ($id_status_rekap ==  1 && $id_jenis_rekap == 1) {
                                            $query = mysqli_query($con, "UPDATE parkir_daftar SET id_tarif = 1, tarif_parkir = '$tarif_parkir' WHERE id_status = '$id_status_rekap' AND id_kode_kartu = '$id_keluar' AND deleted IS NOT NULL");
                                        } elseif ($id_status_rekap ==  1 && $id_jenis_rekap == 2) {
                                            // echo $tarif_parkir;
                                            $query = mysqli_query($con, "UPDATE parkir_daftar SET id_tarif = 2, tarif_parkir = '$tarif_parkir' WHERE id_kode_kartu = '$id_keluar' AND id = '$id_id' AND deleted IS NOT NULL");
                                        } elseif (($id_status_rekap ==  2 && $id_jenis_rekap == 1) || ($id_status_rekap ==  2 && $id_jenis_rekap == 2)) {
                                            // echo "id: " . $id_keluar;
                                            $query = mysqli_query($con, "UPDATE parkir_daftar SET id_tarif = 3, tarif_parkir = '$tarif_parkir' WHERE id_kode_kartu = '$id_keluar' AND deleted IS NOT NULL");
                                        } elseif ($id_status_rekap ==  3) {
                                            $query = mysqli_query($con, "UPDATE parkir_daftar SET id_tarif = 3, tarif_parkir = '$tarif_parkir' WHERE id_kode_kartu = '$id_keluar' AND deleted IS NOT NULL");
                                        } elseif ($id_status_rekap ==  4) {
                                            $query = mysqli_query($con, "UPDATE parkir_daftar SET id_tarif = 3, tarif_parkir = '$tarif_parkir' WHERE id_kode_kartu = '$id_keluar' AND deleted IS NOT NULL");
                                        }

                                        // Print

                                    }
                                    // echo $id_tarif_rekap;

                                    $total = 200;
                                    $query = mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE deleted IS NULL");
                                    $array = mysqli_fetch_array($query);
                                    $count = $array['COUNT(*)'];
                                ?>
                                <ul class="list-inline w-100 h-100 d-flex justify-content-between baris-judul-masuk">
                                    <li class="list-inline-item judul d-flex align-items-center">Masuk Parkir</li>
                                    <li class="list-inline-item kosong d-flex align-items-center">Tersedia: <?php echo $total - $count; ?> </li>
                                </ul>
                            </div>
                            <div class="container form-kendaraan">
                                <!-- Form Masuk Parkir -->
                                <form method="post">
                                    <div class="row w-100 justify-content-center kendaraan">
                                        <!-- identitas kendaraan -->
                                        <div class="col-lg-11 w-100 identitas">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <input type="text" class="form-control plat text-center" name="kode_kartu" id="kode_kartu" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100 justify-content-center mp">
                                        <!-- Status -->
                                        <?php
                                            echo "<div class='col-lg-4 status'>
                                                <div class='row'>
                                                    <div class='col-lg-8'>
                                                        <p class='status-pengunjung'>Status:</p>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-8'>
                                                        <p class='statusnya'>$status</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Jenis Kendaraan -->
                                            <div class='col-lg-4 jenis'>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <p class='jenis-kendaraan'>Jenis Kendaraan:</p>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <p class='jenisnya'>$jenis</p>
                                                    </div>
                                                </div>
                                            </div>"
                                        ?>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="row justify-content-start">
                                        <p class="unregistered"><?php echo $gagal; ?></p>
                                        <button type="submit" class="btn invisible btn-primary tombol-submit" name="submit-button">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Keluar Parkir -->
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="area-kp mx-auto">
                        <div class="card keluar">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Keluar Parkir</li>
                                </ul>
                            </div>
                            <div class="container form-kendaraan">
                                <!-- Data Kendaraan -->
                                <div class="row w-100 justify-content-around kendaraan">
                                    <!-- Tombol Done -->
                                    <div class="col-lg-4 h-100">
                                        <div class="row">
                                            <form method="post">
                                                <input type="text" class="form-control plat text-center done" name="kartu_keluar" id="kartu_keluar" value="<?php if (isset($_POST['tombol-rahasia'])) { echo $_POST['kartu_keluar']; } ?>" autocomplete="off">
                                                <button id="secret" type="submit" class="btn btn-primary tombol-rahasia invisible" name="tombol-rahasia">Done</button>
                                                <button id="show" type="submit" class="btn btn-primary tombol-done" name="tombol-done" onClick="printContent('printTable')">Done</button>
                                                <script type="text/javascript">
                                                    function printContent(id){
                                                        str=document.getElementById(id).innerHTML
                                                        newwin=window.open('','printwin','left=30,top=100,width=1000,height=1000')
                                                        newwin.document.write('<HTML>\n<HEAD>\n')
                                                        newwin.document.write('<TITLE>Sentral Parking <?php echo "(" . $_POST['kartu_keluar'] . ", " . $waktu_tanggal_print . ")"; ?></TITLE>\n')
                                                        newwin.document.write('<HTML><HEAD> <link rel=\"stylesheet\" type=\"text/css\" href=\"css/home.css\"/>')
                                                        newwin.document.write('<script>\n')
                                                        newwin.document.write('function chkstate(){\n')
                                                        newwin.document.write('if(document.readyState=="complete"){\n')
                                                        newwin.document.write('window.close()\n')
                                                        newwin.document.write('}\n')
                                                        newwin.document.write('else{\n')
                                                        newwin.document.write('setTimeout("chkstate()",2000)\n')
                                                        newwin.document.write('}\n')
                                                        newwin.document.write('}\n')
                                                        newwin.document.write('function print_win(){\n')
                                                        newwin.document.write('window.print();\n')
                                                        newwin.document.write('chkstate();\n')
                                                        newwin.document.write('}\n')
                                                        newwin.document.write('<\/script>\n')
                                                        newwin.document.write('</HEAD>\n')
                                                        newwin.document.write('<BODY onload="print_win()">\n')
                                                        newwin.document.write(str)
                                                        newwin.document.write('</BODY>\n')
                                                        newwin.document.write('</HTML>\n')
                                                        newwin.document.close()
                                                    }
                                                </script>
                                            </form>
                                            <p class="unregistered2"><?php echo $unregistered; ?></p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 data-keluar" id="printTable">
                                        <table class="table table-sm borderless">
                                            <tbody class="data-print">
                                                <?php
                                                    echo "<tr>
                                                        <th class='kode' scope='row'>Kode</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$kode_keluar</td>
                                                    </tr>
                                                    <tr>
                                                        <th class='status' scope='row'>Status</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$status_keluar</td>
                                                    </tr>
                                                    <tr>
                                                        <th class='jenis' scope='row'>Jenis</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$jenis_keluar</td>
                                                    </tr>
                                                    <tr>
                                                        <th class='waktu-masuk' scope='row'>Waktu Masuk</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$tampil_wkt_msk</td>
                                                    </tr>
                                                    <tr>
                                                        <th class='durasi' scope='row'>Durasi</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$tampil_durasi_jam $jam $tampil_durasi_menit $menit</td>
                                                    </tr>
                                                    <tr>
                                                        <th class='tarif' scope='row'>Tarif</th>
                                                        <td class='titik-dua'>:</td>
                                                        <td class='isi'>$total_tarif</td>
                                                    </tr>"
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Kendaraan -->
            <div class="row w-100 marpad-2 justify-content-start mx-auto mt-4">
                <div class="col-lg-12">
                    <div class="area-dk mx-auto">
                        <div class="card daftar mb-lg-5">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-between baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Daftar Kendaraan</li>
                                    <li class="list-inline-item kosong d-flex align-items-center">Terisi: <?php echo $count; ?></li>
                                </ul>
                            </div>

                            <!-- Tabel Data Kendaraan -->
                            <table class="table table-responsive-lg table-hover tabel-kendaraan">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Jam Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'config/koneksi2.php';

                                        $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis WHERE parkir_daftar.deleted IS NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis ORDER BY waktu_masuk ASC");


                                        if($query->num_rows > 0){
                                            while($row = $query-> fetch_assoc()){
                                                $id_kode_kartu = $row['id_kode_kartu'];

                                                $wkt_msk = $row['waktu_masuk'];
                                                $wkt = new DateTime($wkt_msk);
                                                $tampil_tanggal_masuk = $wkt->format('d-m-Y');
                                                $tampil_waktu_masuk = $wkt->format('H:i:s');

                                                echo "<tr>
                                                    <td>$row[kode_kartu]</td>
                                                    <td>$row[status]</td>
                                                    <td>$row[jenis]</td>
                                                    <td>$tampil_tanggal_masuk</td>
                                                    <td>$tampil_waktu_masuk</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<h5>Data kartu tidak ditemukan.</h5>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        function enableButton() {
            document.getElementById("show").disabled = false;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>