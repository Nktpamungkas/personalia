<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Exit Interview.xls");
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
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Pertanyaan</th>
            <th>Penjelasan</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = $this->db->query("SELECT
                                            a.no_scan,
                                            d.nama,
                                            d.dept,
                                            d.jabatan,
                                            d.jenis_kelamin,
                                            d.tgl_masuk,
                                            d.tgl_resign,
                                            b.question,
                                            a.explanation,
                                            c.value_pilihan 
                                        FROM
                                            vpot_table_answer a
                                            LEFT JOIN ( SELECT * FROM tbl_question b ) b ON b.id_question = a.id_question
                                            LEFT JOIN ( SELECT * FROM tbl_pilihan_answer c ) c ON c.id_pilihan = a.id_answer
                                            LEFT JOIN ( SELECT * FROM tbl_makar d ) d ON d.no_scan = a.no_scan 
                                        WHERE
                                            d.tgl_resign BETWEEN '$tgl_mulai' 
                                            AND '$tgl_selesai' 
                                        ORDER BY
                                            a.no_scan,
                                            a.id_question ASC")->result_array();
            $no = 1;
        ?>
        <?php foreach ($data as $li) :  ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $li['no_scan']; ?></td>
            <td><?= $li['nama']; ?></td>
            <td><?= $li['dept']; ?></td>
            <td><?= $li['jabatan']; ?></td>
            <td><?= $li['jenis_kelamin']; ?></td>
            <td><?= $li['tgl_masuk']; ?></td>
            <td><?= $li['tgl_resign']; ?></td>
            <td><?= $li['question']; ?></td>
            <td><?= $li['explanation']; ?></td>
            <td><?= $li['value_pilihan']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>