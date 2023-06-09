<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Recruitment - Seleksi.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table>
    <thead>
        <tr>
            <th>NO. FPTK</th>
            <th>NAMA</th>
            <th>TGL PANGGIL</th>
            <th>TGL LAHIR</th>	
            <th>PENDIDIKAN</th>
            <th>JURUSAN</th>
            <th>DEPARTEMENT</th>
            <th>SUMBER</th>
            <th>NO HP</th>
            <th>LEVEL</th>
            <th>JABATAN DILAMAR</th>	
            <th>INT_HRD</th>
            <th>HINT_HRD</th>
            <th>PSIKOTES</th>
            <th>HPSIKOTES</th>
            <th>TES_LAP</th>
            <th>HTES_LAP</th>
            <th>INT_USER</th>
            <th>HINT_USER</th>
            <th>OFFERING</th>
            <th>HOFFERING</th>
            <th>TGL_JOIN</th>
            <th>TGL_EVALUASI</th>	
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $data = $this->db->query("SELECT * FROM recruitment_seleksi")->result_array(); 
        ?>
        <?php foreach($data AS $result): ?>
        <tr>
            <td><?= $result['no']; ?></td>
            <td><?= $result['nama']; ?></td>
            <td><?= $result['tgl_panggil']; ?></td>
            <td><?= $result['tgl_lahir']; ?></td>
            <td><?= $result['pendidikan']; ?></td>
            <td><?= $result['jurusan']; ?></td>
            <td><?= $result['dept']; ?></td>
            <td><?= $result['sumber']; ?></td>
            <td><?= $result['no_hp']; ?></td>
            <td><?= $result['level']; ?></td>
            <td><?= $result['jabatan_dilamar']; ?></td>
            <td><?= $result['int_hrd']; ?></td>
            <td><?= $result['hint_hrd']; ?></td>
            <td><?= $result['psikotes']; ?></td>
            <td><?= $result['hpsikotes']; ?></td>
            <td><?= $result['tes_lap']; ?></td>
            <td><?= $result['htes_lap']; ?></td>
            <td><?= $result['int_user']; ?></td>
            <td><?= $result['hint_user']; ?></td>
            <td><?= $result['offering']; ?></td>
            <td><?= $result['hoffering']; ?></td>
            <td><?= $result['tgl_join']; ?></td>
            <td><?= $result['tgl_evaluasi']; ?></td>
            <td><?= $result['ket']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>