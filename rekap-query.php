<?php
    include 'config/koneksi2.php';

    if (isset($_POST['go'])) {
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
            } else {
                echo "<h5>Data kartu tidak ditemukan.</h5>";
            }
        }
    } else {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal_hari_ini = date('Y-m-d');
        // echo $tanggal_hari_ini;
        $waktu = date('H:i:s');
        $tanggal = date('D, d M Y');
        $tanggal_masuk = date('d-m-Y');
        $waktu_masuk = date('Y-m-d H:i:s');

        $query = mysqli_query($con, "SELECT parkir_daftar.id, parkir_daftar.id_kode_kartu, parkir_daftar.id_status, parkir_daftar.id_jenis, parkir_daftar.waktu_masuk, parkir_daftar.waktu_keluar, parkir_daftar.durasi, parkir_daftar.id_tarif, parkir_daftar.tarif_parkir, parkir_daftar.deleted, parkir_kartu.id_kode_kartu, parkir_kartu.kode_kartu, parkir_status.id_status, parkir_status.status, parkir_jenis.id_jenis, parkir_jenis.jenis, parkir_tarif.id_tarif, parkir_tarif.tarif FROM parkir_daftar, parkir_kartu, parkir_status, parkir_jenis, parkir_tarif WHERE parkir_daftar.deleted IS NOT NULL AND parkir_daftar.id_kode_kartu = parkir_kartu.id_kode_kartu AND parkir_daftar.id_status = parkir_status.id_status AND parkir_daftar.id_jenis = parkir_jenis.id_jenis AND parkir_daftar.id_tarif = parkir_tarif.id_tarif AND DATE(parkir_daftar.waktu_keluar) = '$tanggal_hari_ini' ORDER BY parkir_daftar.waktu_keluar ASC");

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
        } else {
            echo "<h5>Data kartu tidak ditemukan.</h5>";
        }
    }
?>