<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/aktivitas_parkir_mitra.css">
    <link rel="icon" href="../assets/logo/logo32x32.ico">
    <title>Aktivitas Parkir</title>
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

        // echo $_SESSION['id_petugas'];
        // echo "Login Success";

        $total = 200;
        
        $query = mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE deleted IS NULL");
        $array = mysqli_fetch_array($query);
        $count = $array['COUNT(*)'];

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
        <nav class="navbar navbar-expand-lg navbar-dark gradien fixed-top w-100 align-middle">
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
                            <a class="nav-item nav-link menu active" href="aktivitas-parkir.php?username=<?= $username ?>">Aktivitas Parkir</a>
                            <a class="nav-item nav-link menu" href="rekap-data.php?username=<?= $username ?>">Rekap Data</a>
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
        
        <?php
            include 'config/koneksi2.php';

            // $query = mysqli_query($con, "SELECT id_jenis FROM parkir_daftar WHERE deleted IS NULL");
            // $row = mysqli_fetch_array($query);

            $query_jenis = mysqli_query($con, "SELECT * FROM parkir_jenis");
            $jenis = mysqli_fetch_array($query_jenis);

            $jum_mobil =  mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE id_jenis = 1 AND deleted IS NULL");
            $array_mobil = mysqli_fetch_array($jum_mobil);
            $hitung_mobil = $array_mobil['COUNT(*)'];

            $jum_motor =  mysqli_query($con, "SELECT COUNT(*) FROM parkir_daftar WHERE id_jenis = 2 AND deleted IS NULL");
            $array_motor = mysqli_fetch_array($jum_motor);
            $hitung_motor = $array_motor['COUNT(*)'];
        ?>

        <!-- Body -->
        <div class="container-fluid">
            <div class="row w-100 marpad-1 d-flex justify-content-center mx-auto">
                <!-- Card Jumlah Mobil -->
                <div class="col-lg-4">
                    <div class="jumlah-kendaraan mx-auto">
                        <div class="card kendaraan">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-center">
                                    <li class="list-inline-item judul d-flex align-items-center">Mobil</li>
                                </ul>
                            </div>
                            <div class="container">
                                <h1 class="angka text-center align-middle"><?php echo $hitung_mobil; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jumlah Motor -->
                <div class="col-lg-4">
                    <div class="jumlah-kendaraan mx-auto">
                        <div class="card kendaraan">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-center">
                                    <li class="list-inline-item judul d-flex align-items-center">Motor</li>
                                </ul>
                            </div>
                            <div class="container">
                                <h1 class="angka text-center align-middle"><?php echo $hitung_motor; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Kendaraan -->
            <div class="row w-100 marpad-2 justify-content-start mx-auto m-3">
                <div class="col-lg-12">
                    <div class="area-dk mx-auto">
                        <div class="card daftar mb-lg-5">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-between baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Daftar Kendaraan</li>
                                    <li class="list-inline-item kosong d-flex align-items-center">Tersedia: <?php echo $total - $count; ?> | Terisi: <?php echo $count; ?></li>
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