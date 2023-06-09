<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Laporan Absensi Karyawan periode '$tgl1' sampai dengan '$tgl2'.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jumlah</th>
            <th></th>
            <th>Keterangan</th></tr>
    </thead>
    <tbody>
        <?php
            if ($noscan == "All") {
                $query = $this->db->query("SELECT a.nip,
                                                b.nama,
                                                a.dept,
                                                a.tgl_mulai,
                                                a.tgl_selesai,
                                                SUM( a.lama_izin ) AS Jumlah_izin,
                                                a.days_or_month,
                                                a.ket
                                            FROM
                                                `permohonan_izin_cuti` a
                                                LEFT JOIN ( SELECT b.no_scan, b.nama, b.status_karyawan FROM tbl_makar b ) b ON b.no_scan = a.nip 
                                            WHERE
                                                a.tgl_mulai BETWEEN '$tgl1'
                                                AND '$tgl2' 
                                                AND a.dept = '$dept'
                                            GROUP BY
                                                a.nip, a.ket,
                                                a.days_or_month")->result_array();
            }else{
                $query = $this->db->query("SELECT a.nip,
                                                b.nama,
                                                a.dept,
                                                a.tgl_mulai,
                                                a.tgl_selesai,
                                                SUM( a.lama_izin ) AS Jumlah_izin,
                                                a.days_or_month,
                                                a.ket
                                            FROM
                                                `permohonan_izin_cuti` a
                                                LEFT JOIN ( SELECT b.no_scan, b.nama, b.status_karyawan FROM tbl_makar b ) b ON b.no_scan = a.nip 
                                            WHERE
                                                a.tgl_mulai BETWEEN '$tgl1'
                                                AND '$tgl2' 
                                                AND a.dept = '$dept'
                                                AND a.nip = '$noscan'
                                            GROUP BY
                                                a.nip, a.ket,
                                                a.days_or_month")->result_array();
            }
        ?>
        <?php foreach($query AS $data): ?>
            <tr>
                <td><?= $data['nama'].' ('.$data['nip'].')'; ?></td>
                <td align="center"><?= $data['tgl_mulai']; ?></td>
                <td align="center"><?= $data['tgl_selesai']; ?></td>
                <td align="center"><?= $data['Jumlah_izin']; ?></td>
                <td align="center"><?= $data['days_or_month']; ?></td>
                <td align="center">
                    <?php
                        $kodecuti   = $data['ket'];
                        $qCuti = $this->db->query("SELECT * FROM cuti WHERE kode_cuti = '$kodecuti'")->row();
                        echo $qCuti->cuti;                                        
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
