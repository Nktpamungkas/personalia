<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Data Seragam.xls");
    header('Cache-Control: max-age=0');
?>
<style> .str{ mso-number-format:\@; } </style>
<table id="mydata">
<thead>
    <tr>
        <th>No</th>
        <th>No Scan</th>
        <th>Nama Karyawan</th>
        <th>Jenis Kelamin</th>
        <th>Department</th>
        <th>Bagian</th>
        <th>Jabatan</th>
        <th>Ukuran Baju Polo</th>
        <th>Ukuran Baju T-Shirt</th>
    </tr>
</thead>
<tbody>
    <?php 
        $data = $this->db->query('SELECT * FROM tbl_makar WHERE NOT status_karyawan = "Resigned" AND NOT status_karyawan = "perubahan_status" ORDER BY nama ASC')->result_array(); 
        $no = 1;
    ?>
    <?php foreach($data AS $result): ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $result['no_scan']; ?></td>
        <td><?= $result['nama']; ?></td>
        <td><?= $result['jenis_kelamin']; ?></td>
        <td><?= $result['dept']; ?></td>
        <td><?= $result['bagian']; ?></td>
        <td><?= $result['jabatan']; ?></td>
        <td><?= $result['ukuran_baju_polo']; ?></td>
        <td><?= $result['ukuran_baju_shirt']; ?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
