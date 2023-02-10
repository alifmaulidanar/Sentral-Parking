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
    <link rel="stylesheet" href="css/aktivitas.css">
    <link rel="icon" href="../assets/logo/logo32x32.ico">
    <title>Aktivitas</title>
</head>
<body>
    <?php
        include '../config/koneksi2.php';
        $username = $_GET['username'];

        session_start();
        if (!isset($_SESSION['username_admin']) || $_SESSION['username_admin'] == NULL || $username == NULL || $username != $_SESSION['username_admin'] || $_SESSION['role_admin'] == $username || $_SESSION['role_admin'] == NULL) {
            unset($_SESSION['username_admin']);
            unset($_SESSION['password_admin']);
            unset($_SESSION['id_admin']);
            unset($_SESSION['role_admin']);
            header("Location: ../admin/");
        }

        // echo $_SESSION['id_admin'];
        // echo "Login Success";

        date_default_timezone_set("Asia/Jakarta");
        $tanggal_hari_ini = date('Y-m-d');
        $waktu = date('H:i:s');
        $tanggal = date('D, d M Y');
        $tanggal_masuk = date('d-m-Y');
        $waktu_masuk = date('Y-m-d H:i:s');

        // $show_tanggal = "(Tanggal tidak valid.)";
        
        if (isset($_POST['go'])) {
            $bln = $_POST['datepicker'];
            $bln_terpilih = new DateTime($bln);
            $bulan_terpilih = $bln_terpilih->format('d-m-Y');
            $bulan_datepicker = $bln_terpilih->format('m-Y');
            $_SESSION['bulan_terpilih'] = $bulan_terpilih;

            $bln_dtpckr = new DateTime($bln);
            $bln_filter = $bln_dtpckr->format('n');
            $tampil_bulan = $bln_dtpckr->format('F');
            $tampil_tahun = $bln_dtpckr->format('Y');
            
            // $bln_dtpckr = new DateTime($bulan_terpilih);
            // $bulan_datepicker_excel = $bln_dtpckr->format('m/Y');

            // $show_tanggal = "(" . $tanggal_terpilih . ")";

            // if ($tanggal_masuk < $tanggal_terpilih) {
            //     $show_tanggal = "(Tanggal tidak valid.)";
            // } else {
            //     $show_tanggal = "(" . $tanggal_terpilih . ")";
            // }
        } else {
            unset($_SESSION['bulan_terpilih']);
            
            $bulan_def = new DateTime($tanggal_masuk);
            $tampil_bulan = $bulan_def->format('F');
            $tampil_tahun = $bulan_def->format('Y');
            // echo $_SESSION['tanggal_terpilih'];
            // $show_tanggal = "(" . $tanggal_masuk . ")";
        }

        if (isset($_GET['logout'])){
            // session_destroy();
            unset($_SESSION['username_admin']);
            unset($_SESSION['password_admin']);
            unset($_SESSION['id_admin']);
            unset($_SESSION['role_admin']);
            header("Location: ../admin/");
        }
    ?>
    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-flex gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="aktivitas.php?username=<?= $username ?>">
                <img src="../assets/logo/logo32x32.png" width="28" height="28" class="d-inline-block align-middle" alt="">
                Sentral Parking
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav w-50 mx-auto d-flex align-items-center justify-content-center">
                <li class="nav-item w-100">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav justify-content-around menu-lists">
                            <a class="nav-item nav-link menu active" href="aktivitas.php?username=<?= $username ?>">Aktivitas</a>
                            <a class="nav-item nav-link menu" href="data-kartu.php?username=<?= $username ?>">Data Kartu</a>
                            <a class="nav-item nav-link menu" href="petugas-kelola.php?username=<?= $username ?>">Kelola Petugas</a>
                            <a class="nav-item nav-link menu" href="mitra-kelola.php?username=<?= $username ?>">Kelola Mitra</a>
                            <a class="nav-item nav-link menu" href="rekap-data.php?username=<?= $username ?>">Rekap Data</a>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav profile d-flex align-items-center justify-content-end">
                <li class="nav-item dropdown active text-right">
                    <a class="nav-link dropdown-toggle tombol-profile d-flex align-items-center justify-content-end" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></a>
                        <!-- Alif Maulidanar -->
                        <!-- <img src="assets/logo/profile.png" width="28" height="28" alt=""> -->
                    <div class="dropdown-menu logout dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            <!-- Aktivitas Petugas -->
            <div class="row w-100 marpad-1 justify-content-start mx-auto">
                <div class="col-lg-4">
                    <!-- Date Picker -->
                    <div class="row justify-content-start pilih-tanggal">
                        <form method="post" class="form-inline">
                            <input id="datepicker" name="datepicker" width="276" />
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
                                // echo $_SESSION['bulan_terpilih'];
                                // echo $bulan_datepicker_excel;
                            ?>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12 marpad-2">
                    <div class="area-dk mx-auto">
                        <div class="card daftar">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Aktivitas Petugas (<?php echo $tampil_bulan . " " . $tampil_tahun; ?>)</li>
                                </ul>
                            </div>

                            <!-- tabel -->
                            <table class="table table-responsive-lg table-hover tabel-kendaraan">
                                <thead>
                                <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Jam Login</th>
                                        <th scope="col">Tanggal Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../config/koneksi2.php';

                                        if (isset($_SESSION['bulan_terpilih'])) {
                                            // $bulan_terpilih = $_POST['datepicker'];
                                            // $bln_plh = new DateTime($bulan_terpilih);
                                            // $bln_filter = $bln_plh->format('Y-m-d');
                                            
                                            $query1 = mysqli_query($con, "SELECT data_petugas.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_petugas, data_aktivitas WHERE data_aktivitas.id_petugas IS NOT NULL AND data_aktivitas.id_petugas = data_petugas.id_petugas AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_filter ORDER BY data_aktivitas.waktu_login ASC");
                                            $row1 = mysqli_fetch_array($query1);
                                            
                                            $wkt_klr_filter = $row1['waktu_login'];
                                            $wkt_k_filter = new DateTime($wkt_klr_filter);
                                            $tampil_bulan_keluar_filter = $wkt_k_filter->format('m-Y');
                                            
                                            // echo $bulan_datepicker . " || ";
                                            // echo $bln_filter . " || ";
                                            // echo $tampil_bulan_keluar_filter;
                                            
                                            if ($bulan_datepicker == $tampil_bulan_keluar_filter) {
                                                
                                                $query = mysqli_query($con, "SELECT data_petugas.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_petugas, data_aktivitas WHERE data_aktivitas.id_petugas IS NOT NULL AND data_aktivitas.id_petugas = data_petugas.id_petugas AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_filter ORDER BY data_aktivitas.waktu_login ASC");

                                                if($query->num_rows > 0){
                                                    // echo $_SESSION['bulan_terpilih'];
                                                    while($row = $query-> fetch_assoc()){
                                                        $id_petugas = $row['id_petugas'];
        
                                                        $wkt_login = $row['waktu_login'];
                                                        $wktl = new DateTime($wkt_login);
                                                        $tampil_tanggal_login = $wktl->format('d/m/Y');
                                                        $tampil_waktu_login = $wktl->format('H:i:s');
        
                                                        echo "<tr>
                                                            <td>$row[username]</td>
                                                            <td>$tampil_waktu_login</td>
                                                            <td>$tampil_tanggal_login</td>
                                                        </tr>";
                                                    }
                                                } else {
                                                    // echo "TEST 1";
                                                    echo "<h5>Data kartu tidak ditemukan.</h5>";
                                                }
                                            } else {
                                                // echo "TEST 2";
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                                            }
                                        } elseif (!isset($_SESSION['bulan_terpilih'])) {
                                            date_default_timezone_set("Asia/Jakarta");
                                            $bln_ini = date('m');
                                            // echo $tanggal_hari_ini;
                                            $waktu = date('H:i:s');
                                            $tanggal = date('D, d M Y');
                                            $tanggal_masuk = date('d-m-Y');
                                            $waktu_masuk = date('Y-m-d H:i:s');

                                            $query = mysqli_query($con, "SELECT data_petugas.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_petugas, data_aktivitas WHERE data_aktivitas.id_petugas IS NOT NULL AND data_aktivitas.id_petugas = data_petugas.id_petugas AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_ini ORDER BY data_aktivitas.waktu_login ASC");

                                            if($query->num_rows > 0){
                                                while($row = $query-> fetch_assoc()){
                                                    $id_petugas = $row['id_petugas'];
    
                                                    $wkt_login = $row['waktu_login'];
                                                    $wktl = new DateTime($wkt_login);
                                                    $tampil_tanggal_login = $wktl->format('d/m/Y');
                                                    $tampil_waktu_login = $wktl->format('H:i:s');
    
                                                    echo "<tr>
                                                        <td>$row[username]</td>
                                                        <td>$tampil_waktu_login</td>
                                                        <td>$tampil_tanggal_login</td>
                                                    </tr>";
                                                }
                                            } else {
                                                // echo "TEST 3";
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                                            }
                                        } else {
                                            // echo "TEST 4";
                                            echo "<h5>Data kartu tidak ditemukan.</h5>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row justify-content-end">
                                <!-- <button type="submit" class="btn btn-danger tombol-hapus">Clear</button> -->
                                <a href="download/download_petugas.php?username=<?= $username ?>&bulan=<?= $_SESSION['bulan_terpilih'] ?>"><button type="submit" class="btn btn-primary tombol-download">Download</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-12">
                    <div class="area-dk mx-auto mb-5">
                        <div class="card daftar">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Aktivitas Mitra (<?php echo $tampil_bulan . " " . $tampil_tahun; ?>)</li>
                                </ul>
                            </div>

                            <!-- tabel -->
                            <table class="table table-responsive-lg table-hover tabel-kendaraan">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Jam Login</th>
                                        <th scope="col">Tanggal Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        include '../config/koneksi2.php';

                                        if (isset($_SESSION['bulan_terpilih'])) {
                                            // $bulan_terpilih = $_POST['datepicker'];
                                            // $bln_plh = new DateTime($bulan_terpilih);
                                            // $bln_filter = $bln_plh->format('Y-m-d');
                                            
                                            $query1 = mysqli_query($con, "SELECT data_mitra.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_mitra, data_aktivitas WHERE data_aktivitas.id_mitra IS NOT NULL AND data_aktivitas.id_mitra = data_mitra.id_mitra AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_filter ORDER BY data_aktivitas.waktu_login ASC");
                                            $row1 = mysqli_fetch_array($query1);
                                            
                                            $wkt_klr_filter = $row1['waktu_login'];
                                            $wkt_k_filter = new DateTime($wkt_klr_filter);
                                            $tampil_bulan_keluar_filter = $wkt_k_filter->format('m-Y');
                                            
                                            // echo $bulan_datepicker . " || ";
                                            // echo $bln_filter . " || ";
                                            // echo $tampil_bulan_keluar_filter;
                                            
                                            if ($bulan_datepicker == $tampil_bulan_keluar_filter) {
                                                $query = mysqli_query($con, "SELECT data_mitra.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_mitra, data_aktivitas WHERE data_aktivitas.id_mitra IS NOT NULL AND data_aktivitas.id_mitra = data_mitra.id_mitra AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_filter ORDER BY data_aktivitas.waktu_login ASC");

                                                if($query->num_rows > 0){
                                                    while($row = $query-> fetch_assoc()){
                                                        $id_mitra = $row['id_mitra'];
        
                                                        $wkt_login = $row['waktu_login'];
                                                        $wktl = new DateTime($wkt_login);
                                                        $tampil_tanggal_login = $wktl->format('d/m/Y');
                                                        $tampil_waktu_login = $wktl->format('H:i:s');
        
                                                        echo "<tr>
                                                            <td>$row[username]</td>
                                                            <td>$tampil_waktu_login</td>
                                                            <td>$tampil_tanggal_login</td>
                                                        </tr>";
                                                    }
                                                } else {
                                                    // echo "TEST 1";
                                                    echo "<h5>Data kartu tidak ditemukan.</h5>";
                                                }
                                            } else {
                                                // echo "TEST 2";
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                                            }
                                        } elseif (!isset($_SESSION['bulan_terpilih'])) {
                                            date_default_timezone_set("Asia/Jakarta");
                                            $bln_ini = date('m');
                                            // echo $tanggal_hari_ini;
                                            $waktu = date('H:i:s');
                                            $tanggal = date('D, d M Y');
                                            $tanggal_masuk = date('d-m-Y');
                                            $waktu_masuk = date('Y-m-d H:i:s');

                                            $query = mysqli_query($con, "SELECT data_mitra.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_mitra, data_aktivitas WHERE data_aktivitas.id_mitra IS NOT NULL AND data_aktivitas.id_mitra = data_mitra.id_mitra AND data_aktivitas.deleted = '0' AND MONTH(data_aktivitas.waktu_login) = $bln_ini ORDER BY data_aktivitas.waktu_login ASC");

                                            if($query->num_rows > 0){
                                                while($row = $query-> fetch_assoc()){
                                                    $id_mitra = $row['id_mitra'];
    
                                                    $wkt_login = $row['waktu_login'];
                                                    $wktl = new DateTime($wkt_login);
                                                    $tampil_tanggal_login = $wktl->format('d/m/Y');
                                                    $tampil_waktu_login = $wktl->format('H:i:s');
    
                                                    echo "<tr>
                                                        <td>$row[username]</td>
                                                        <td>$tampil_waktu_login</td>
                                                        <td>$tampil_tanggal_login</td>
                                                    </tr>";
                                                }
                                            } else {
                                                // echo "TEST 1";
                                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                                            }
                                        } else {
                                            // echo "TEST 4";
                                            echo "<h5>Data kartu tidak ditemukan.</h5>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row justify-content-end">
                                <!-- <button type="submit" class="btn btn-danger tombol-hapus">Clear</button> -->
                                <a href="download/download_mitra.php?username=<?= $username ?>&bulan=<?= $_SESSION['bulan_terpilih'] ?>"><button type="submit" class="btn btn-primary tombol-download">Download</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid -->
    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 masuk">
                <div class="area-mk"></div>
            </div>
            <div class="col-lg-6">
                <div class="area-mk"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>