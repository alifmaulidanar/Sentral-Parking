<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/data_petugas_mitra.css">
    <link rel="icon" href="../assets/logo/logo32x32.ico">
    <title>Data Petugas</title>
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
                            <a class="nav-item nav-link menu active" href="data-petugas.php?username=<?= $username ?>">Data Petugas<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link menu" href="aktivitas-parkir.php?username=<?= $username ?>">Aktivitas Parkir</a>
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
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Body -->
        <div class="container-fluid">
            <div class="row w-100 marpad-1 d-flex justify-content-around mx-auto">
                <div class="col-lg-6 d-flex justify-content-center">
                    <!-- Card Masuk Parkir -->
                    <div class="area-kp mx-auto">
                        <div class="card keluar">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Daftar Petugas</li>
                                </ul>
                            </div>
                            <div class="container form-kendaraan">
                                <div class="row w-100 d-flex justify-content-center baris-tabel-petugas">
                                    <div class="col-lg-12">
                                        <table class="table table-responsive-lg table-hover tabel-petugas">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Username</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include '../config/koneksi2.php';

                                                    $query = mysqli_query($con, "SELECT * FROM data_petugas WHERE deleted = '0'");

                                                    // $sqldata = "SELECT * FROM data_petugas";
                                                    // $filtersqldata = "SELECT * FROM data_petugas;";
                                                    // $result = $koneksi-> query($filtersqldata);
                                                    if($query->num_rows > 0){
                                                        while($row = $query-> fetch_assoc()){
                                                            $id_petugas = $row['id_petugas'];
                                                            echo "<tr>
                                                                <td>$row[username]</td>
                                                            </tr>";
                                                        }
                                                    } else {
                                                        echo "<h5>Data petugas tidak ditemukan.</h5>";
                                                    }
                                                ?>
                                                <!-- <tr>
                                                    <td>Alif Maulidanar</td>
                                                    <td>1234</td>
                                                </tr>
                                                <tr>
                                                    <td>alif</td>
                                                    <td>7890</td>
                                                </tr> -->
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-12">
                    <div class="area-dk mx-auto">
                        <div class="card daftar mb-lg-5">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Aktivitas Petugas</li>
                                </ul>
                            </div>

                            <!-- tabel -->
                            <table class="table table-responsive-lg table-hover tabel-kendaraan">
                                <thead>
                                    <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Tanggal Login</th>
                                        <th scope="col">Jam Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../config/koneksi2.php';

                                        $query = mysqli_query($con, "SELECT data_petugas.username, data_aktivitas.waktu_login, data_aktivitas.deleted FROM data_petugas, data_aktivitas WHERE data_aktivitas.id_petugas IS NOT NULL AND data_aktivitas.id_petugas = data_petugas.id_petugas AND data_aktivitas.deleted = '0' ORDER BY waktu_login ASC");

                                        if($query->num_rows > 0){
                                            while($row = $query-> fetch_assoc()){
                                                $id_petugas = $row['id_petugas'];

                                                $wkt_login = $row['waktu_login'];
                                                $wktl = new DateTime($wkt_login);
                                                $tampil_tanggal_login = $wktl->format('d-m-Y');
                                                $tampil_waktu_login = $wktl->format('H:i:s');

                                                echo "<tr>
                                                    <td>$row[username]</td>
                                                    <td>$tampil_tanggal_login</td>
                                                    <td>$tampil_waktu_login</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<h5>Data aktivitas petugas tidak ditemukan.</h5>";
                                        }
                                    ?>
                                    <!-- <tr>
                                        <td>Alif Maulidanar</td>
                                        <td>07:03:40</td>
                                        <td>Senin, 01 / 08 / 2022</td>
                                    </tr>
                                    <tr>
                                        <td>Maulidanar Alif</td>
                                        <td>10:24:19</td>
                                        <td>Senin, 01 / 08 / 2022</td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <!-- <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary tombol-download">Download</button>
                            </div> -->
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