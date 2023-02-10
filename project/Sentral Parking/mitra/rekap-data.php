<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/rekap_data_mitra.css">
    <link rel="icon" href="../assets/logo/logo32x32.ico">
    <title>Rekap Data</title>
</head>
<body>
    <?php
        include '../config/koneksi2.php';
        $username = $_GET['username'];

        session_start();
        if (!isset($_SESSION['username_mitra']) || $_SESSION['username_mitra'] == NULL || $username == NULL || $username != $_SESSION['username_mitra'] || $_SESSION['role_mitra'] == $username || $_SESSION['role_mitra'] == NULL) {
            unset($_SESSION['username_mitra']);
            unset($_SESSION['password_mitra']);
            unset($_SESSION['id_mitra']);
            unset($_SESSION['role_mitra']);
            header("Location: ../mitra/");
        }

        // echo $_SESSION['id_mitra'];
        // echo "Login Success";

        date_default_timezone_set("Asia/Jakarta");
        $tanggal_hari_ini = date('Y-m-d');
        $waktu = date('H:i:s');
        $tanggal = date('D, d M Y');
        $tanggal_masuk = date('d-m-Y');
        $waktu_masuk = date('Y-m-d H:i:s');

        $show_tanggal = "(Tanggal tidak valid.)";
        
        if (isset($_POST['go'])) {
            $tanggal_terpilih = $_POST['datepicker'];
            $_SESSION['tanggal_terpilih'] = $tanggal_terpilih;
            // echo $tanggal_masuk;
            // echo $tanggal_terpilih;
            // echo $_SESSION['tanggal_terpilih'];
            $show_tanggal = "(" . $tanggal_terpilih . ")";

            // if ($tanggal_masuk < $tanggal_terpilih) {
            //     $show_tanggal = "(Tanggal tidak valid.)";
            // } else {
            //     $show_tanggal = "(" . $tanggal_terpilih . ")";
            // }
        } else {
            unset($_SESSION['tanggal_terpilih']);
            // echo $_SESSION['tanggal_terpilih'];
            $show_tanggal = "(" . $tanggal_masuk . ")";
        }

        if (isset($_GET['logout'])){
            // session_destroy();
            unset($_SESSION['username_mitra']);
            unset($_SESSION['password_mitra']);
            unset($_SESSION['id_mitra']);
            unset($_SESSION['role_mitra']);
            header("Location: ../mitra/");
        }
    ?>
    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-flex gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="data-petugas.php?username=<?= $username ?>">
                <img src="../assets/logo/logo32x32.png" class="d-inline-block align-middle logo-sentral">
                Sentral Parking
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav w-50 mx-auto d-flex align-items-center justify-content-center">
                <li class="nav-item w-100">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav justify-content-around menu-lists">
                            <p class="nav-item nav-link menu"> </p>
                            <a class="nav-item nav-link menu" href="data-petugas.php?username=<?= $username ?>">Data Petugas</a>
                            <a class="nav-item nav-link menu" href="aktivitas-parkir.php?username=<?= $username ?>">Aktivitas Parkir</a>
                            <a class="nav-item nav-link menu active" href="rekap-data.php?username=<?= $username ?>">Rekap Data</a>
                            <p class="nav-item nav-link menu"> </p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav profile d-flex align-items-center justify-content-end">
                <li class="nav-item dropdown active text-right">
                    <a class="nav-link dropdown-toggle tombol-profile d-flex align-items-center justify-content-end" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></a>
                        <!-- Alif Maulidanar -->
                        <!-- <img src="assets/logo/profile.png" width="28" height="28" alt=""> -->
                    <div class="dropdown-menu dropdown-menu-right logout" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" onclick="return confirm('Apakah yakin ingin Log Out?');" href="?username=<?= $username ?>&logout">Log Out</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Body -->
        <div class="container-fluid">
            <div class="row w-100 marpad-1 justify-content-between mx-auto">
                <!-- Card Jumlah Mobil -->
                <div class="col-lg-4">
                    <!-- Date Picker -->
                    <div class="row justify-content-start pilih-tanggal">
                        <form method="post" class="form-inline datepicker">
                            <input id="datepicker" name="datepicker" width="276" autocomplete="off" />
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    iconsLibrary: 'materialicons',
                                    format: 'dd-mm-yyyy',
                                    header: false,
                                    modal: false,
                                    footer: false,
                                    showOtherMonths: true,
                                    selectOtherMonths: false
                                });
                            </script>
                            <button type="submit" class="btn btn-secondary ml-3" name="go">Go</button>
                            <?php
                                // echo $_SESSION['tanggal_terpilih'];
                            ?>
                        </form>
                    </div>
                </div>

                <!-- Card Jumlah Motor -->
                <div class="col-lg-4">
                    <div class="row justify-content-end">
                        <a href="download/download.php?username=<?= $username ?>&tanggal=<?= $_SESSION['tanggal_terpilih'] ?>"><button type="submit" class="btn btn-primary tombol-submit">Download</button></a>
                    </div>
                </div>
            </div>

            <!-- Riwayat Parkir -->
            <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-12">
                    <div class="rp mx-auto">
                        <div class="card riwayat mb-lg-5">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start">
                                    <li class="list-inline-item judul d-flex align-items-center">Riwayat Parkir <?php echo $show_tanggal; ?></li>
                                </ul>
                            </div>

                            <!-- tabel -->
                            <table class="table table-responsive-lg table-hover tabel-riwayat">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jenis</th>
                                        <!-- <th scope="col">Tanggal</th> -->
                                        <th scope="col">Waktu Masuk</th>
                                        <th scope="col">Waktu Keluar</th>
                                        <th scope="col">Durasi</th>
                                        <th scope="col">Tarif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // include 'rekap-query.php';
                                        include 'config/koneksi2.php';

                                        if (isset($_SESSION['tanggal_terpilih'])) {
                                            $tanggal_terpilih = $_POST['datepicker'];
                                            $tgl_plh = new DateTime($tanggal_terpilih);
                                            $tgl_filter = $tgl_plh->format('Y-m-d');

                                            $query1 = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tgl_filter' ORDER BY parkir_daftar.waktu_keluar ASC");
                                            $row1 = mysqli_fetch_array($query1);
                                            
                                            $wkt_msk_filter = $row1['waktu_masuk'];
                                            $wkt_m_filter = new DateTime($wkt_msk_filter);
                                            $tampil_tanggal_masuk_filter = $wkt_m_filter->format('d-m-Y');
                                            // $tampil_waktu_masuk_filter = $wkt_m_filter->format('H:i:s');
                                            // $tanggal_jam_masuk_filter = $wkt_m_filter->format('H:i:s   –  d/m/Y');

                                            $wkt_klr_filter = $row1['waktu_keluar'];
                                            $wkt_k_filter = new DateTime($wkt_klr_filter);
                                            $tampil_tanggal_keluar_filter = $wkt_k_filter->format('d-m-Y');
                                            // $tampil_waktu_keluar_filter = $wkt_k_filter->format('H:i:s');
                                            // $tanggal_jam_keluar_filter = $wkt_k_filter->format('H:i:s   –  d/m/Y');
                                            // echo $tanggal_jam_keluar_filter;

                                            // echo $tanggal_terpilih . " || " . $tampil_tanggal_keluar_filter;
                                            
                                            if ($tanggal_terpilih == $tampil_tanggal_keluar_filter) {
                                                date_default_timezone_set("Asia/Jakarta");
                                                $tanggal_hari_ini = date('Y-m-d');
                                                // echo $tanggal_hari_ini;
                                                // $waktu = date('H:i:s');
                                                // $tanggal = date('D, d M Y');
                                                // $tanggal_masuk = date('d-m-Y');
                                                // $waktu_masuk = date('Y-m-d H:i:s');

                                                $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tgl_filter' ORDER BY parkir_daftar.waktu_keluar ASC");

                                                $query_total = mysqli_query($con, "SELECT sum(tarif_parkir) FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.id_status = 1 AND parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tgl_filter'");
                                                $total = mysqli_fetch_array($query_total);
                                                $total_pendapatan = $total[0];
                                                // var_dump($total);

                                                if($query->num_rows > 0){
                                                    while($row = $query-> fetch_assoc()){
                                                        $id_kode_kartu = $row['id_kode_kartu'];
                        
                                                        $wkt_msk = $row['waktu_masuk'];
                                                        // echo $wkt_msk;
                                                        $wkt_m = new DateTime($wkt_msk);
                                                        $tampil_tanggal_masuk = $wkt_m->format('d-m-Y');
                                                        $tampil_waktu_masuk = $wkt_m->format('H:i:s');
                                                        $tanggal_jam_masuk = $wkt_m->format('H:i:s   –  d/m/Y');
                                                        
                                                        $wkt_klr = $row['waktu_keluar'];
                                                        $wkt_k = new DateTime($wkt_klr);
                                                        $tampil_tanggal_keluar = $wkt_k->format('d-m-Y');
                                                        $tampil_waktu_keluar = $wkt_k->format('H:i:s');
                                                        $tanggal_jam_keluar = $wkt_k->format('H:i:s   –  d/m/Y');
                                                        // echo $tanggal_jam_keluar;
                                                        
                                                        echo "<tr>
                                                        <td>$row[kode_kartu]</td>
                                                        <td>$row[status]</td>
                                                        <td>$row[jenis]</td>
                                                        <td>$tanggal_jam_masuk</td>
                                                        <td>$tanggal_jam_keluar</td>
                                                        <td>$row[durasi]</td>
                                                        <td>$row[tarif_parkir]</td>
                                                        </tr>";
                                                    }

                                                    if ($total[0] == NULL || $total[0] == 0) {
                                                        echo "<tr class='font-weight-bold table-info'>
                                                        <td colspan='6'>Total</td>
                                                        <td> – </td>
                                                    </tr>";
                                                    } else {
                                                        echo "<tr class='font-weight-bold table-info'>
                                                            <td colspan='6'>Total</td>
                                                            <td>$total_pendapatan</td>
                                                        </tr>";
                                                    }
                                                    
                                                    // echo $_SESSION['tanggal_terpilih'];
                                                } else {
                                                    echo "<h5>Data kartu tidak ditemukan.</h5>";
                                                }
                                            } else {
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                                            }
                                        } elseif (!isset($_SESSION['tanggal_terpilih']) || !isset($_POST['go'])) {
                                            date_default_timezone_set("Asia/Jakarta");
                                            $tgl_hr_ini = date('Y-m-d');
                                            // echo $tanggal_hari_ini;
                                            $waktu = date('H:i:s');
                                            $tanggal = date('D, d M Y');
                                            $tanggal_masuk = date('d-m-Y');
                                            $waktu_masuk = date('Y-m-d H:i:s');
                                            
                                            $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tgl_hr_ini' ORDER BY parkir_daftar.waktu_keluar ASC");

                                            $query_total = mysqli_query($con, "SELECT sum(tarif_parkir) FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.id_status = 1 AND parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tgl_hr_ini'");
                                            $total = mysqli_fetch_array($query_total);
                                            $total_pendapatan = $total[0];
                                            // var_dump($total);

                                            if($query->num_rows > 0){
                                                while($row = $query-> fetch_assoc()){
                                                    $id_kode_kartu = $row['id_kode_kartu'];
                    
                                                    $wkt_msk = $row['waktu_masuk'];
                                                    // echo $wkt_msk;
                                                    $wkt_m = new DateTime($wkt_msk);
                                                    $tampil_tanggal_masuk = $wkt_m->format('d-m-Y');
                                                    $tampil_waktu_masuk = $wkt_m->format('H:i:s');
                                                    $tanggal_jam_masuk = $wkt_m->format('H:i:s   –  d/m/Y');
                                                    
                                                    $wkt_klr = $row['waktu_keluar'];
                                                    $wkt_k = new DateTime($wkt_klr);
                                                    $tampil_tanggal_keluar = $wkt_k->format('d-m-Y');
                                                    $tampil_waktu_keluar = $wkt_k->format('H:i:s');
                                                    $tanggal_jam_keluar = $wkt_k->format('H:i:s   –  d/m/Y');
                                                    // echo $tanggal_jam_keluar;
                    
                                                    echo "<tr>
                                                        <td>$row[kode_kartu]</td>
                                                        <td>$row[status]</td>
                                                        <td>$row[jenis]</td>
                                                        <td>$tanggal_jam_masuk</td>
                                                        <td>$tanggal_jam_keluar</td>
                                                        <td>$row[durasi]</td>
                                                        <td>$row[tarif_parkir]</td>
                                                    </tr>";
                                                }

                                                if ($total[0] == NULL || $total[0] == 0) {
                                                    echo "<tr class='font-weight-bold table-info'>
                                                    <td colspan='6'>Total</td>
                                                    <td> – </td>
                                                </tr>";
                                                } else {
                                                    echo "<tr class='font-weight-bold table-info'>
                                                        <td colspan='6'>Total</td>
                                                        <td>$total_pendapatan</td>
                                                    </tr>";
                                                }

                                            } else {
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>