<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/member-mobil.css">
    <title>Pendaftaran Kartu</title>
</head>
<body>
    <?php
        include '../../config/koneksi2.php';

        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();

            echo "<script>document.location.href='mitra.php'</script>";
        }

        // if (isset($_POST['btn_delete'])) {
        //     $query = mysqli_query($con, "TRUNCATE TABLE tb_akses_admin");
        // }
    ?>

    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-flex gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="../data-petugas-mitra.php">
                <img src="../../assets/logo/logo32x32.png" width="28" height="28" class="d-inline-block align-middle" alt="">
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
                            <a class="nav-item nav-link menu" href="../data-petugas-mitra.php">Data Petugas</a>
                            <a class="nav-item nav-link menu active" href="../data-kartu-mitra.php">Data Kartu</a>
                            <a class="nav-item nav-link menu" href="../aktivitas-parkir-mitra.php">Aktivitas Parkir</a>
                            <a class="nav-item nav-link menu" href="../rekap-data-mitra.php">Rekap Data</a>
                            <p class="nav-item nav-link menu"> </p>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav profile d-flex align-items-center justify-content-end">
                <li class="nav-item dropdown active text-right">
                    <a class="nav-link dropdown-toggle tombol-profile d-flex align-items-center justify-content-end" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Alif Maulidanar
                        <!-- <img class="ml-1" src="assets/logo/profile.svg" width="28" height="28" alt=""> -->
                    </a>
                    <div class="dropdown-menu logout" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="mitra.php">Log Out</a>
                        <!-- <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Body -->
        <div class="container-fluid">
            <div class="row w-100 marpad-1 justify-content-around mx-auto">
                <div class="col-lg-6">
                    <div class="area-mp mx-auto">
                        <div class="card masuk">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-masuk">
                                    <li class="list-inline-item judul d-flex align-items-center">Pendaftaran Kartu (Member – Mobil)</li>
                                </ul>
                            </div>
                            <div class="container form-kendaraan">
                                <!-- form masuk parkir -->
                                <form action="" method="post">
                                    <div class="row w-100 justify-content-center kendaraan">
                                        <!-- identitas kendaraan -->
                                        <div class="col-lg-11 w-100 identitas">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <input type="text" class="form-control plat text-center" name="kode_kartu" id="kode_kartu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- tombol submit -->
                                    <div class="row justify-content-start">
                                        <span class="success-message">
                                            <?php
                                                include '../../config/koneksi2.php';

                                                function teksDef() {
                                                    echo 'Tap kartu pada RFID Reader untuk mendaftarkan kartu.';
                                                }

                                                ob_start();
                                                $def = teksDef();
                                                echo $def;

                                                if (isset($_POST['submit_button'])) {
                                                    $kode = $_POST['kode_kartu'];
                                        
                                                    $query = mysqli_query($con, "SELECT * FROM kartu_kartu WHERE kode_kartu = '$kode'");
                                                    $row = mysqli_fetch_array($query);

                                                    function teksDec($a) {
                                                        echo 'Kartu dengan kode \'' . $a . '\' sudah pernah didaftarkan!';
                                                    }
                                        
                                                    function teksAcc($a) {
                                                        echo 'Pendaftaran kartu dengan kode \'' . $a . '\' berhasil!';
                                                    }

                                                    if ($row['kode_kartu'] == $kode) {
                                                        ob_end_clean();
                                                        teksDec($kode);
                                                    } else {
                                                        $query = mysqli_query($con, "INSERT INTO kartu_kartu (kode_kartu) VALUES ('$kode')");
                                        
                                                        $query = mysqli_query($con, "SELECT * FROM kartu_kartu WHERE kode_kartu = '$kode'");
                                                        $kartu = mysqli_fetch_array($query);
                                                        $id_kode_kartu = $kartu['id_kode_kartu'];
                                            
                                                        if ($kartu['kode_kartu'] == $kode && $kartu['id_kode_kartu'] == $id_kode_kartu) {
                                                            $query = mysqli_query($con, "INSERT INTO kartu_daftar (id_kode_kartu, id_status, id_jenis) VALUES ('$id_kode_kartu', '2', '1')");
                                                        }

                                                        ob_end_clean();
                                                        teksAcc($kode);
                                                    }
                                                }
                                            ?>
                                        </span>
                                        <!-- <span class="success-message">Kartu Visitor (Mobil) baru berhasil ditambahkan!</span> -->
                                        <button type="submit" name="submit_button" class="btn btn-primary tombol-submit invisible">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="area-kp mx-auto">
                        <div class="card keluar">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-start baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Kartu (Member – Mobil) Terdaftar</li>
                                </ul>
                            </div>
                            <div class="container form-kendaraan">
                                <div class="row w-100 d-flex justify-content-center baris-tabel-petugas">
                                    <div class="col-lg-12">
                                        <table class="table table-responsive-lg table-hover tabel-kendaraan">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Kode Kartu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include '../../config/koneksi2.php';

                                                    $query = mysqli_query($con, "SELECT kartu_daftar.id_kode_kartu, kartu_daftar.id_jenis, kartu_daftar.id_status, kartu_kartu.id_kode_kartu, kartu_kartu.kode_kartu FROM kartu_daftar, kartu_kartu WHERE kartu_daftar.id_status = '2' AND kartu_daftar.id_jenis = '1' AND kartu_daftar.id_kode_kartu = kartu_kartu.id_kode_kartu");

                                                    if($query->num_rows > 0){
                                                        while($row = $query-> fetch_assoc()){
                                                            // $id_petugas = $row['id_petugas'];
                                                            echo "<tr>
                                                                <td>$row[id_kode_kartu]</td>
                                                                <td>$row[kode_kartu]</td>
                                                            </tr>";
                                                        }
                                                    } else {
                                                        echo "<h5>Data kartu tidak ditemukan.</h5>";
                                                    }
                                                ?>
                                                <!-- <tr>
                                                    <td>Alif Maulidanar</td>
                                                    <td>1234</td>
                                                    <td class="kelola"><a href="edit-petugas.php">Edit</a> | <a href="#">Hapus</a></td>
                                                </tr>
                                                <tr>
                                                    <td>alif</td>
                                                    <td>7890</td>
                                                    <td class="kelola"><a href="#">Edit</a> | <a href="#">Hapus</a></td>
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
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="petugas-hapus.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>