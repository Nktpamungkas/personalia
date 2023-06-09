<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Status ID dan Seragam Karyawan Baru.xls");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
    <thead>
        <tr>
            <th>No</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Tanggal Masuk</th>
            <th>Tgl Terima ID Card/Seragam</th>
            <th>Setatus Terima ID Card</th>
            <th>Setatus Terima Seragam</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        DATE_FORMAT( tgl_masuk, '%d %M %Y' ) AS ftgl_masuk,
                                        DATE_FORMAT((DATE_ADD(tgl_masuk, INTERVAL 6 month )), '%d %M %Y') as tgl_seragam,
                                        status_seragam,
                                        status_idcard
                                    FROM
                                        tbl_makar
                                    WHERE 
                                        tgl_masuk BETWEEN '$tgl_mulai' AND '$tgl_selesai'
                                        AND NOT status_karyawan ='Resigned'
                                        AND NOT status_karyawan ='perubahan_status'
                                        and not status_karyawan ='Tetap'
                                    ORDER BY
                                    tgl_masuk asc")->result_array();
        $no = 1;
    ?>
    <?php foreach ($data as $dd) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $dd['no_scan']; ?></td>
        <td><?= $dd['nama']; ?></td>
        <td><?= $dd['dept']; ?></td>
        <td><center><?= $dd['ftgl_masuk']; ?></center></td>
        <td><center><?= $dd['tgl_seragam']; ?></center></td>
        <td><center><?= $dd['status_idcard']; ?></center></td>
        <td><center><?= $dd['status_seragam']; ?></center></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>