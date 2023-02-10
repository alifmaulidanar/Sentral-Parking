<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/data_kartu.css">
    <title>Data Kartu</title>
</head>
<body>
    <div class="container-fluid w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-flex gradien fixed-top w-100 align-middle">
            <a class="navbar-brand" href="aktivitas.php">
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
                            <a class="nav-item nav-link menu" href="aktivitas.php">Aktivitas<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link menu active" href="data-kartu.php">Data Kartu</a>
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
            <div class="row w-100 marpad-1 justify-content-between mx-auto">
                <!-- Card Jumlah Mobil -->
                <div class="col-lg-4">
                    <div class="row justify-content-start dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle tombol-daftar" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftarkan Kartu</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <h6 class="dropdown-header">Pilih Status Kartu</h6>
                            <a class="dropdown-item" href="daftar/visitor-mobil.php">Visitor – Mobil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/visitor-motor.php">Visitor – Motor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/member-mobil.php">Member – Mobil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/member-motor.php">Member – Motor</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/guest.php">Guest</a>
                            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/guest-motor.php">Guest – Motor</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/vip.php">VIP</a>
                            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="daftar/vip-motor.php">VIP – Motor</a> -->
                        </div>
                    </div>
                </div>

                <!-- Card Jumlah Motor -->
                <div class="col-lg-4">
                    <div class="row justify-content-end">
                        <button type="button" class="btn btn-primary tombol-submit">Download</button>
                    </div>
                </div>
            </div>

            <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-">
                    <div class="row justify-content-start dropdown filter">
                        <table class="table tabel-filter borderless">
                            <tbody>
                                <?php
                                    include '../config/koneksi2.php';

                                    $query_status = mysqli_query($con, "SELECT * FROM kartu_status");
                                    $semua = mysqli_fetch_array($query_semua);
                                    
                                    $query_visitor = mysqli_query($con, "SELECT status FROM kartu_status WHERE status = 'Visitor'");
                                    $visitor = mysqli_fetch_array($query_visitor);

                                    $query_member = mysqli_query($con, "SELECT status FROM kartu_status WHERE status = 'Member'");
                                    $member = mysqli_fetch_array($query_member);

                                    $query_guest = mysqli_query($con, "SELECT status FROM kartu_status WHERE status = 'Guest'");
                                    $guest = mysqli_fetch_array($query_guest);

                                    $query_vip = mysqli_query($con, "SELECT status FROM kartu_status WHERE status = 'VIP'");
                                    $vip = mysqli_fetch_array($query_vip);

                                    echo "<tr>
                                            <td class='filter-status'>Status</td>
                                            <td class='filter-status'>:</td>
                                            <td>
                                                <button type='button' class='btn btn-light dropdown-toggle tombol-filter d-flex align-items-center justify-content-center' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Filter</button>
                                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                                    <!-- <h6 class='dropdown-header'>Pilih Status Kartu</h6> -->
                                                    <a class='dropdown-item active' href='data-kartu-copy.php?status=$semua'>Semua</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='data-kartu-copy.php?status=$visitor'>$visitor</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='data-kartu-copy.php?status=$member'>$member</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='data-kartu-copy.php?status=$guest'>$guest</a>
                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='data-kartu-copy.php?status=$vip'>$vip</a>
                                                </div>
                                            </td>
                                        </tr>";

                                            


                                ?>
                                <tr>
                                    <td class="filter-status">Jenis</td>
                                    <td class="filter-status">:</td>
                                    <td>
                                        <button type="button" class="btn btn-light dropdown-toggle tombol-filter d-flex align-items-center justify-content-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <!-- <h6 class="dropdown-header">Pilih Status Kartu</h6> -->
                                            <a class="dropdown-item active" href="#">Semua</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Mobil</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Motor</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-">
                    <div class="row justify-content-start dropdown filter">
            </div> -->

            <!-- Riwayat Parkir -->
            <div class="row w-100 marpad-2 justify-content-start mx-auto">
                <div class="col-lg-12">
                    <div class="rp mx-auto">
                        <div class="card riwayat">
                            <div class="card-header">
                                <ul class="list-inline w-100 h-100 d-flex justify-content-between baris-judul-keluar">
                                    <li class="list-inline-item judul d-flex align-items-center">Data Kartu</li>
                                    <li class="list-inline-item kosong d-flex align-items-center">
                                        Total Kartu:
                                        <?php
                                            include '../config/koneksi2.php';
                                            $query = mysqli_query($con, "SELECT COUNT(*) FROM kartu_daftar");
                                            $array = mysqli_fetch_array($query);
                                            $count = $array['COUNT(*)'];

                                            echo $count;
                                        ?>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tabel Data Kendaraan -->
                            <table class="table table-responsive-lg table-hover tabel-riwayat">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Kode Kartu</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../config/koneksi2.php';

                                        $query = mysqli_query($con, "SELECT kartu_daftar.id, kartu_daftar.id_kode_kartu, kartu_kartu.id_kode_kartu, kartu_kartu.kode_kartu, kartu_status.id_status, kartu_status.status, kartu_jenis.id_jenis, kartu_jenis.jenis FROM kartu_daftar, kartu_kartu, kartu_status, kartu_jenis WHERE kartu_daftar.id_kode_kartu IS NOT NULL AND kartu_daftar.id_kode_kartu = kartu_kartu.id_kode_kartu AND kartu_daftar.id_status = kartu_status.id_status AND kartu_daftar.id_jenis = kartu_jenis.id_jenis");

                                        // $sqldata = "SELECT * FROM data_petugas";
                                        // $filtersqldata = "SELECT * FROM data_petugas;";
                                        // $result = $koneksi-> query($filtersqldata);
                                        if($query->num_rows > 0){
                                            while($row = $query-> fetch_assoc()){
                                                // $id_petugas = $row['id_petugas'];
                                                echo "<tr>
                                                    <td>$row[id]</td>
                                                    <td>$row[kode_kartu]</td>
                                                    <td>$row[status]</td>
                                                    <td>$row[jenis]</td>
                                                </tr>";
                                            }
                                        } else {
                                            echo "<h5>Data kartu tidak ditemukan.</h5>";
                                        }
                                    ?>
                                    <!-- <tr>
                                        <td>1</td>
                                        <td>20200801095</td>
                                        <td>Visitor</td>
                                        <td>Mobil</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>20200801096</td>
                                        <td>Member</td>
                                        <td>Motor</td>
                                    </tr> -->
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