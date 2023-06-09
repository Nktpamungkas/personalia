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
            </tr>
    </thead>
    <tbody>
        <?php
            $data = $this->db->query("SELECT b.no_scan,
                                            a.nama,
                                            a.dept,
                                            DATE_FORMAT(b.kontrak_awal, '%d %M %Y') as kontrak_awal,
                                            DATE_FORMAT(b.kontrak_akhir, '%d %M %Y') as kontrak_akhir,
                                            b.durasi,
                                            b.keterangan 
                                        FROM
                                            tbl_makar a
                                            INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                            WHERE
                                            b.kontrak_akhir BETWEEN NOW()
                                            AND DATE_ADD( NOW(), INTERVAL '2' MONTH )
                                            AND b.`status` = ''
                                        ORDER BY  b.kontrak_akhir asc, a.nama ASC")->result_array();
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
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>