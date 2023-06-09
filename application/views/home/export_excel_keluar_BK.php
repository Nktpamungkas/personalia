<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Karyawan Baru.xls");
?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
    <thead>
        <tr>
            <th>No</th>
            <th>No Scan</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Jabatan</th>
            <th>Tgl Keluar</th>
            <th>Tanggal Lahir</th>
            <th>Nomor NPWP</th>
            <th>Alamat NPWP</th>
            <th>Alamat Domisili</th>
            <th>Nomor Handphone</th>
            <th>Nomor KTP</th>
            <th>Jenis Kelamin</th>
            <th>Status Karyawan</th>
            <th>Status Keluarga</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $data = $this->db->query("SELECT no_scan,
                                        nama,
                                        dept,
                                        DATE_FORMAT( tgl_resign, '%d %M %Y' ) AS ftgl_resign,
                                        jabatan,
                                        DATE_FORMAT( tgl_lahir, '%d %M %Y' ) AS ftgl_lahir,
                                        npwp,
                                        alamat_npwp,
                                        alamat_domisili,
                                        no_hp,
                                        no_ktp,
                                        jenis_kelamin,
                                        status_karyawan,
                                        status_kel
                                    FROM
                                        tbl_makar
                                    WHERE 
                                        tgl_resign BETWEEN '$tgl_mulai' AND '$tgl_selesai'
                                    ORDER BY
                                    tgl_resign DESC")->result_array();
        $no = 1;
    ?>
    <?php foreach ($data as $dd) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $dd['no_scan']; ?></td>
        <td><?= $dd['nama']; ?></td>
        <td><?= $dd['dept']; ?></td>
        <td><?= $dd['jabatan']; ?></td>
        <td><?= $dd['ftgl_resign']; ?></td>
        <td><?= $dd['ftgl_lahir']; ?></td>
        <td><?= $dd['npwp']; ?></td>
        <td><?= $dd['alamat_npwp']; ?></td>
        <td><?= $dd['alamat_domisili']; ?></td>
        <td><?= $dd['no_hp']; ?></td>
        <td><?= $dd['no_ktp']; ?></td>
        <td><?= $dd['jenis_kelamin']; ?></td>
        <td><?= $dd['status_karyawan']; ?></td>
        <td><?= $dd['status_kel']; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>