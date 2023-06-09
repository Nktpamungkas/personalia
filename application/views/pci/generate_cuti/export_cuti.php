<?php
    $now = date("d M Y");
    // header("content-type:application/vnd-ms-excel");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("content-disposition:attachment;filename=Data cuti karyawan $now.xls");
?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Dept</th>
            <th>Tgl Masuk</th>
            <th>Masa berlaku cuti (thn <?= date("Y"); ?>/<?= date("Y")+1; ?>)</th>
            <th>Sisa Cuti</th>
            <th>Keterangan (note: Keterangan untuk menampilkan histori bahwa sisa cuti telah dibayarkan)</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $data = $this->db->query("SELECT *, MONTHNAME( tgl_tetap ) AS awal, MONTHNAME( ( tgl_tetap + INTERVAL '6' MONTH ) ) AS akhir FROM tbl_makar WHERE status_karyawan = 'Tetap' AND status_aktif = 1 AND MONTHNAME( tgl_tetap ) = '$periode' ORDER BY ( tgl_tetap + INTERVAL '6' MONTH ) DESC")->result_array(); 
            $no = 1;
        ?>
        <?php foreach($data AS $result): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $result['no_scan']; ?></td>
            <td><?= $result['nama']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><?= $result['tgl_tetap']; ?></td>
            <td><?= $result['awal'].'<b> s/d </b>'.$result['akhir']; ?></td>
            <td><?= $result['sisa_cuti']; ?></td>
            <td>Sisa cuti <?= $result['sisa_cuti']; ?> telah dibayarkan.</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>