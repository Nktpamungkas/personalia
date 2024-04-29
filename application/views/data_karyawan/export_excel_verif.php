<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Karyawan Baru Terverifikasi.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Jabatan</th>
            <th>Tanggal Masuk</th>
            <th>Status Verifikasi HRD</th>
            <th>Tanggal Verifikasi HRD</th>
       </tr>
    </thead>
    <tbody>
        <?php
            $data = $this->db->query("SELECT no_scan,
                                             nama,
                                             dept,
                                             bagian,
                                             jabatan,
                                             DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                             status_verifikasi,
                                             DATE_FORMAT(tgl_verif, '%d-%m-%Y') AS tgl_verif
                                        FROM
                                            tbl_makar_temp
                                            WHERE   status_verifikasi = 'VERIFIED'
                                            ORDER BY tgl_masuk DESC")->result_array();
            $no = 1;
        ?>
        <?php foreach ($data as $dd) : ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $dd['no_scan']; ?></td>
            <td><?= $dd['nama']; ?></td>
            <td align="center"><?= $dd['dept']; ?></td>
            <td><?= $dd['bagian']; ?></td>
            <td><?= $dd['jabatan']; ?></td>
            <td align="center"><?= $dd['tgl_masuk']; ?></td>
            <td align="center"><?= $dd['status_verifikasi']; ?></td>
            <td><?= $dd['tgl_verif']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>