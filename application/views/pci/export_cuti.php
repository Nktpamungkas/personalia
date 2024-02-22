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
            $data = $this->db->query("SELECT *, DATE_FORMAT( tgl_tetap, '%d %M' ) AS awal,
                                            YEAR(CURDATE()) as thn_awal,
                                            DATE_FORMAT( ( tgl_tetap + INTERVAL '12' MONTH - INTERVAL '1' DAY), '%d %M' ) AS akhir, 
                                            YEAR(CURDATE()+interval '1'year) as thn_akhir
                                            FROM tbl_makar 
                                            WHERE tgl_generate_cuti BETWEEN '$tgl_mulai' 
                                            AND '$tgl_selesai' and status_karyawan = 'Tetap' AND status_aktif = 1 
                                            and not year(tgl_tetap) = YEAR(CURDATE())
                                            ORDER BY  MONTH(tgl_tetap)ASC")->result_array(); 
            $no = 1;
        ?>
        <?php foreach($data AS $result): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $result['no_scan']; ?></td>
            <td><?= $result['nama']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><center><?= $result['tgl_tetap']; ?></center></td>
            <td><?= $result['awal'].' '.$result['thn_awal'].'<b> s/d </b>'.$result['akhir'].' '.$result['thn_akhir']; ?></td>
            <td><center><?= $result['sisa_cuti']; ?></center></td>
            <?php if ($result['sisa_cuti_th_sebelumnya'] == 0) : ?>
            <td>Tidak ada sisa cuti yang dibayarkan.</td>
            <?php else : ?>
            <td>Sisa cuti <?= $result['sisa_cuti_th_sebelumnya']; ?> telah dibayarkan.</td>
            <?php endif ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>