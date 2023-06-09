<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=PKWT.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Dept</th>
            <th>Kontrak Awal</th>
            <th>Kontrak Akhir</th>
            <th>Durasi</th>
            <th>Keterangan</th>
            <th>Gaji</th>
            <th>Status</th>
            <th>Verifikasi</th>
            <th>Libur</th>
            <th>Status Aktif (*1 Aktif/ 0 Tdk aktif)</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = $this->db->query("SELECT a.no_scan,
                                            b.nama,
                                            b.dept,
                                            a.kontrak_awal,
                                            a.kontrak_akhir,
                                            a.durasi,
                                            a.keterangan,
                                            a.gaji,
                                            a.`status`,
                                            a.verifikasi,
                                            a.libur,
	                                        b.status_aktif
                                        FROM
                                            `tbl_kontrak` a
                                            LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                            ORDER BY b.nama ASC")->result_array();
            $no = 1;
        ?>
        <?php foreach ($data as $dd) : ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $dd['no_scan']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td><?= $dd['dept']; ?></td>
            <td><?= $dd['kontrak_awal']; ?></td>
            <td><?= $dd['kontrak_akhir']; ?></td>
            <td><?= $dd['durasi']; ?></td>
            <td><?= $dd['keterangan']; ?></td>
            <td><?= $dd['gaji']; ?></td>
            <td><?= $dd['status']; ?></td>
            <td><?php if($dd['verifikasi'] == 1) { echo "Terverifikasi Oleh HRD."; } else { echo "On Proses."; } ?></td>
            <td><?= $dd['libur']; ?></td>
            <td><?= $dd['status_aktif']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>