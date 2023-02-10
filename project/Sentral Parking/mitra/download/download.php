<?php
    include '../../config/koneksi2.php';
    $username = $_GET['username'];
    $tanggal_datepicker = $_GET['tanggal'];

    $tgl_dtpckr = new DateTime($tanggal_datepicker);
    $tanggal_datepicker_excel = $tgl_dtpckr->format('d/m/Y');

    date_default_timezone_set("Asia/Jakarta");
    $tanggal_hari_ini = date('d-m-Y');
    $tanggal_hari_ini_excel = date('d/m/Y');
    $waktu_download = date('H-i-s');
    $waktu_download_excel = date('H:i:s');

    session_start();
    if (!isset($_SESSION['tanggal_terpilih'])) {
        $tgl_judul = $tanggal_hari_ini;
        $tgl_tgl_judul = new DateTime($tgl_judul);
        $tanggal_datepicker = $tgl_tgl_judul->format('d-m-Y');
    }

    header("Content-type: application/vnd-ms-excel");

    header("Content-Disposition: attachment; filename=Rekap_Data_Harian_" . $tanggal_datepicker . "_(" . $waktu_download . "_" . $tanggal_hari_ini . ").xls");

    echo "<div class='row w-100 marpad-2 justify-content-start mx-auto'>
        <div class='col-lg-12'>
            <div class='rp mx-auto'>
                <div class='card riwayat mb-lg-5'>
                    <div class='card-header'>
                        <ul class='list-inline w-100 h-100 d-flex justify-content-start'>
                            <li class='list-inline-item judul d-flex align-items-center'>Riwayat Parkir Harian (" . $tanggal_datepicker_excel . ") || (Waktu Download: " . $waktu_download_excel . " - " . $tanggal_hari_ini_excel . ")</li>
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
                            if (isset($_SESSION['tanggal_terpilih'])) {
                                $tanggal_terpilih = $tanggal_datepicker;
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
                            } elseif (!isset($_SESSION['tanggal_terpilih'])) {
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