<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Recruitment - Permohonan.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table>
    <thead>
        <tr>
            <th>NO. FPTK</th>
            <th>TGL FPTK</th>
            <th>ALASAN</th>
            <th>DEPARTEMEN</th>	
            <th>LEVEL(GOL)</th>
            <th>JABATAN</th>
            <th>TOTAL NEED</th>
            <th>TOTAL FULFIL</th>
            <th>STATUS</th>
            <th>KODE GOL</th>
            <th>LT TARGET</th>
            <th>TGL_TARGET</th>
            <th>TGL_ACTUAL</th>
            <th>TGL JOIN</th>
            <th>NAMA PELAMAR YANG MASUK</th>	
            <th>KETERANGAN</th>
            <th>LULUS OJT</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $data = $this->db->query("SELECT * FROM recruitment_permohonan")->result_array(); 
        ?>
        <?php foreach($data AS $result): ?>
        <tr>
            <td><?= $result['no']; ?></td>
            <td><?= $result['tgl_fptk']; ?></td>
            <td><?= $result['alasan']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><?= $result['level']; ?></td>
            <td><?= $result['jabatan']; ?></td>
            <td><?= $result['total_need']; ?></td>
            <td><?= $result['total_fulfil']; ?></td>
            <td><?php echo strtoupper($result['status']); ?></td>
            <td><?= $result['kode_gol']; ?></td>
            <td><?= $result['lt_target']; ?></td>
            <td><?= $result['tgl_target']; ?></td>
            <td><?= $result['tgl_aktual']; ?></td>
            <td><?= $result['tgl_join']; ?></td>
            <td><?= $result['nama_pelamar']; ?></td>
            <td><?= $result['ket']; ?></td>
            <td><?= $result['lulus_ojt']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>