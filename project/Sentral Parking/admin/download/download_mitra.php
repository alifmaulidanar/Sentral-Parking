<?php
    include '../../config/koneksi2.php';
    $username = $_GET['username'];
    $bulan_datepicker = $_GET['bulan'];
    // echo "<script>alert('$bulan_datepicker')</script>";

    $bln_dtpckr = new DateTime($bulan_datepicker);
    $bln_filter = $bln_dtpckr->format('n');
    $bulan_datepicker_judul = $bln_dtpckr->format('M-Y');
    $bulan_datepicker_excel = $bln_dtpckr->format('F Y');

    date_default_timezone_set("Asia/Jakarta");
    $tanggal_hari_ini = date('d-M-Y');
    $tanggal_hari_ini_excel = date('d/M/Y');
    $bulan_ini = date('m-Y');
    $bulan_ini_excel = date('m/Y');
    $waktu_download = date('H-i-s');
    $waktu_download_excel = date('H:i:s');

    session_start();
    if (!isset($_SESSION['bulan_terpilih'])) {
        $bulan_datepicker = $bulan_ini;
    } else {
        $bln_judul = $bulan_datepicker;
        $bln_bln_judul = new DateTime($bln_judul);
        $bulan_datepicker = $bln_bln_judul->format('m-Y');
    }

    header("Content-type: application/vnd-ms-excel");

    header("Content-Disposition: attachment; filename=Aktivitas_Mitra_" . $bulan_datepicker_judul . "_(" . $waktu_download . "_" . $tanggal_hari_ini . ").xls");

    echo "<div class='row w-100 marpad-2 justify-content-start mx-auto'>
        <div class='col-lg-12'>
            <div class='rp mx-auto'>
                <div class='card riwayat mb-lg-5'>
                    <div class='card-header'>
                        <ul class='list-inline w-100 h-100 d-flex justify-content-start'>
                            <li class='list-inline-item judul d-flex align-items-center'>Aktivitas Log In Mitra (" . $bulan_datepicker_excel . ") || (Waktu Download: " . $waktu_download_excel . " - " . $tanggal_hari_ini_excel . ")</li>
                        </ul>
                    </div>

                    <!-- tabel -->
                    <table class='table table-responsive-lg table-hover tabel-riwayat'>
                        <thead>
                            <tr>
                                <th scope='col'>Username</th>
                                <th scope='col'>Jam Login</th>
                                <th scope='col'>Tanggal Login</th>
                            </tr>
                        </thead>
                        <tbody>";
                        // echo "TEST";
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
                                    // echo "TEST 3";
                                    echo "<h5>Data kartu tidak ditemukan.</h5>";
                                }
                            } else {
                                // echo "TEST 4";
                                echo "<h5>Data kartu tidak ditemukan.</h5>";
                            }
                        "</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>";
?>