<?php
    session_start();
    include 'config/koneksi2.php';
    $username = $_GET['username'];
    $bulan_datepicker = $_GET['bulan'];
    // echo "<script>alert('$bulan_datepicker')</script>";

    $bln_dtpckr = new DateTime($bulan_datepicker);
    $bln_filter = $bln_dtpckr->format('n');
    $bulan_datepicker_excel = $bln_dtpckr->format('m/Y');

    date_default_timezone_set("Asia/Jakarta");
    $tanggal_hari_ini = date('d-m-Y');
    $tanggal_hari_ini_excel = date('d/m/Y');
    $bulan_ini = date('m-Y');
    $bulan_ini_excel = date('m/Y');
    $waktu_download = date('H-i-s');
    $waktu_download_excel = date('H:i:s');

    if (!isset($_SESSION['bulan_terpilih'])) {
        $bulan_datepicker = $bulan_ini;
    } else {
        $bln_judul = $bulan_datepicker;
        $bln_bln_judul = new DateTime($bln_judul);
        $bulan_datepicker = $bln_bln_judul->format('m-Y');
    }

    header("Content-type: application/vnd-ms-excel");

    header("Content-Disposition: attachment; filename=Rekap_Data_Bulanan_" . $bulan_datepicker . "_(" . $waktu_download . "_" . $tanggal_hari_ini . ").xls");

    echo "<div class='row w-100 marpad-2 justify-content-start mx-auto'>
        <div class='col-lg-12'>
            <div class='rp mx-auto'>
                <div class='card riwayat mb-lg-5'>
                    <div class='card-header'>
                        <ul class='list-inline w-100 h-100 d-flex justify-content-start'>
                            <li class='list-inline-item judul d-flex align-items-center'>Riwayat Parkir Bulanan (" . $bulan_datepicker_excel . ") || (Waktu Download: " . $waktu_download_excel . " - " . $tanggal_hari_ini_excel . ")</li>
                        </ul>
                    </div>

                    <!-- tabel -->
                    <table class='table table-responsive-lg table-hover tabel-riwayat'>
                        <thead>
                            <tr>
                                <th scope='col'>Kode</th>
                                <th scope='col'>Status</th>
                                <th scope='col'>Jenis</th>
                                <!-- <th scope='col'>Tanggal</th> -->
                                <th scope='col'>Waktu Masuk</th>
                                <th scope='col'>Waktu Keluar</th>
                                <th scope='col'>Durasi</th>
                                <th scope='col'>Tarif</th>
                            </tr>
                        </thead>
                        <tbody>";
                        // echo "TEST";
                            if (isset($_SESSION['bulan_terpilih'])) {
                                // $bulan_terpilih = strtotime($bulan_datepicker);
                                // $bln_plh = new DateTime($bulan_terpilih);
                                // $bln_filter = $bln_plh->format('m');
                                // echo $bulan_datepicker;
                                // echo $bln_filter;

                                $query1 = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND MONTH(parkir_daftar.waktu_keluar) = '$bln_filter' ORDER BY parkir_daftar.waktu_keluar ASC");
                                $row1 = mysqli_fetch_array($query1);
                                
                                $wkt_msk_filter = $row1['waktu_masuk'];
                                $wkt_m_filter = new DateTime($wkt_msk_filter);
                                $tampil_tanggal_masuk_filter = $wkt_m_filter->format('d-m-Y');
                                // $tampil_waktu_masuk_filter = $wkt_m_filter->format('H:i:s');
                                // $tanggal_jam_masuk_filter = $wkt_m_filter->format('H:i:s   –  d/m/Y');

                                $wkt_klr_filter = $row1['waktu_keluar'];
                                $wkt_k_filter = new DateTime($wkt_klr_filter);
                                $tampil_bulan_keluar_filter = $wkt_k_filter->format('m-Y');
                                // echo $tampil_bulan_keluar_filter;
                                // $tampil_waktu_keluar_filter = $wkt_k_filter->format('H:i:s');
                                // $tanggal_jam_keluar_filter = $wkt_k_filter->format('H:i:s   –  d/m/Y');
                                // echo $tanggal_jam_keluar_filter;

                                // echo $tanggal_terpilih . " || " . $tampil_tanggal_keluar_filter;
                                
                                if ($bulan_datepicker == $tampil_bulan_keluar_filter) {
                                    date_default_timezone_set("Asia/Jakarta");
                                    $tanggal_hari_ini = date('Y-m-d');
                                    // echo $tanggal_hari_ini;
                                    // $waktu = date('H:i:s');
                                    // $tanggal = date('D, d M Y');
                                    // $tanggal_masuk = date('d-m-Y');
                                    // $waktu_masuk = date('Y-m-d H:i:s');

                                    $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND MONTH(parkir_daftar.waktu_keluar) = '$bln_filter' ORDER BY parkir_daftar.waktu_keluar ASC");

                                    $query_total = mysqli_query($con, "SELECT sum(tarif_parkir) FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND MONTH(parkir_daftar.waktu_keluar) = '$bln_filter'");
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
                                            <td>&nbsp;$row[kode_kartu]</td>
                                            <td>$row[status]</td>
                                            <td>$row[jenis]</td>
                                            <td>$tanggal_jam_masuk</td>
                                            <td>$tanggal_jam_keluar</td>
                                            <td>$row[durasi]</td>
                                            <td>$row[tarif_parkir]</td>
                                            </tr>";
                                        }
                                    } else {
                                        echo "<h5>Data kartu tidak ditemukan.</h5>";
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
                            } elseif (!isset($_SESSION['bulan_terpilih'])) {
                                date_default_timezone_set("Asia/Jakarta");
                                $bln_ini = date('m');
                                // echo $tanggal_hari_ini;
                                $waktu = date('H:i:s');
                                $tanggal = date('D, d M Y');
                                $tanggal_masuk = date('d-m-Y');
                                $waktu_masuk = date('Y-m-d H:i:s');
                                
                                $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND MONTH(parkir_daftar.waktu_keluar) = '$bln_ini' ORDER BY parkir_daftar.waktu_keluar ASC");

                                $query_total = mysqli_query($con, "SELECT sum(tarif_parkir) FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND MONTH(parkir_daftar.waktu_keluar) = '$bln_ini'");
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
                                            <td>&nbsp;$row[kode_kartu]</td>
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
                        "</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>";
?>