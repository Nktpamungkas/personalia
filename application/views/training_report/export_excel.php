    <?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Daftar Training.xls");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered">
    <thead>
        <tr>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Jabatan</th>
            <th>Kode Training</th>
            <th>Nama Training</th>
            <th>Trainer</th>
            <th>Tanggal Training</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $data = $this->db->query("SELECT
                                        a.no_scan,
                                        b.nama,
                                        b.dept,
                                        b.jabatan,
                                        a.kode_training,
                                        c.nama_training,
                                        a.tgl_training
                                    FROM
                                        tbl_training a
                                        JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan
                                        JOIN ( SELECT * FROM training c ) c ON c.id = a.kode_training
                                        -- JOIN ( SELECT * FROM tbl_makar d ) d ON d.no_scan = a.trainer
                                        WHERE a.tgl_training BETWEEN '$tgl_mulai' AND '$tgl_selesai'
                                        order by a.kode_training asc, a.no_scan ASC, b.nama asc, b.dept asc, a.tgl_training asc")->result_array();
    ?>
    <?php foreach ($data as $dd) : ?>
    <tr>
        <td><?= $dd['no_scan']; ?></td>
        <td><?= $dd['nama']; ?></td>
        <td><?= $dd['dept']; ?></td>
        <td><?= $dd['jabatan']; ?></td>
        <td>TRN<?php echo sprintf("%04d", $dd['kode_training']); ?></td>
        <td><?= $dd['nama_training']; ?></td>
        <td></td>
        <td><?= $dd['tgl_training']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
