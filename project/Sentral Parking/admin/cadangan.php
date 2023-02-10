<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="home_admin.css">
    <title>Home - Admin</title>
</head>
<body>
    <!-- NAVBAR BELUM SELESAI -->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark gradien fixed-top w-100 justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="assets/logo/logo32x32.png" width="30" height="30" class="d-inline-block align-middle" alt="">
            Sentral Parking
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between spasi" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link menu" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu" href="#">Data Kendaraan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link tombol-profile" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Alif Maulidanar
                    <img src="assets/logo/profile.png">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav> -->

    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-flex gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="home-admin.php">
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
                            <a class="nav-item nav-link menu active" href="home-admin.php">Home<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link menu" href="petugas-kelola.php">Kelola Petugas</a>
                            <a class="nav-item nav-link menu" href="mitra-kelola.php">Kelola Mitra</a>
                            <a class="nav-item nav-link menu" href="rekap-data-admin.php">Rekap Data</a>
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
                        <a class="dropdown-item" href="admin.php">Log Out</a>
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
                <div class="col-lg-12">
                    <div class="area-dk mx-auto">
                        <div class="card daftar">
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
                                        <th scope="col">Jam Login</th>
                                        <th scope="col">Tanggal Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Alif Maulidanar</td>
                                        <td>07:03:40</td>
                                        <td>Senin, 01 / 08 / 2022</td>
                                    </tr>
                                    <tr>
                                        <td>Maulidanar Alif</td>
                                        <td>10:24:19</td>
                                        <td>Senin, 01 / 08 / 2022</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-danger tombol-hapus">Clear</button>
                                <button type="submit" class="btn btn-primary tombol-download">Download</button>
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