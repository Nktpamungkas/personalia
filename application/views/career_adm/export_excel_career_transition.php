<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Career Transition.xls");
  header("Pragma: no-cache");
  header("Expires: 0");
?>

<meta charset="utf-8">
<table>
   <thead>
   <tr>
            <th>ID</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Proses</th>
            <th>Tanggal Efektif</th>
            <th>Departemen Lama</th>
            <th>Departemen Baru</th>
            <th>Bagian Lama</th>
            <th>Bagian Baru</th>
            <th>Golongan Lama</th>
            <th>Golongan Baru</th>
            <th>Jabatan Lama</th>
            <th>Jabatan Baru</th>
        </tr>            
    </thead>
    <tbody>
    <?php 
            $query = $this->db->query("SELECT   a.id,
                                                a.no_scan,
                                                b.nama,
                                                a.proses,
                                                DATE_FORMAT( a.tgl_efektif, '%d %M %Y' ) AS tgl_efektif,
                                                a.dept_lama,
                                                a.dept_baru,
                                                a.bagian_lama,
                                                a.bagian_baru,
                                                a.golongan_lama,
                                                a.golongan_baru,
                                                a.jabatan_lama,
                                                a.jabatan_baru
                                        FROM
                                            career_transition a
                                        LEFT JOIN ( SELECT * FROM tbl_makar b) b ON b.no_scan = a.no_scan
                                        where not a.no_scan = '4780' ")->result_array(); 
        ?>
        <?php foreach($query AS $result) : ?>
        <tr>
            <td><?= $result['id']; ?></td>
            <td><?= $result['no_scan']; ?></td>
            <td><?= $result['nama']; ?></td>
            <td><?= $result['proses']; ?></td>
            <td><?= $result['tgl_efektif']; ?></td>
            <td><?= $result['dept_lama']; ?></td>
            <td><?= $result['dept_baru']; ?></td>
            <td><?= $result['bagian_lama']; ?></td>
            <td><?= $result['bagian_baru']; ?></td>
            <td><?= $result['golongan_lama']; ?></td>
            <td><?= $result['golongan_baru']; ?></td>
            <td><?= $result['jabatan_lama']; ?></td>
            <td><?= $result['jabatan_baru']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
