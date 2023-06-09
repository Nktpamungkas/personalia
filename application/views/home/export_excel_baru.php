<?php
    header("content-type:application/vnd-ms-excel");
    header("content-disposition:attachment;filename=Karyawan Baru periode $tgl_mulai - $tgl_selesai.xls");
?>
<style> .str{ mso-number-format:\@; } </style>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
    <thead>
        <tr>
            <td>No Scan</td>
            <td>NIK</td>
            <td>Nama Pegawai</td>
            <td>Inisial</td>
            <td>Tempat Lahir</td>
            <td>Tgl Lahir</td>
            <td>NPWP</td>
            <td>Tgl NPWP Terdaftar</td>
            <td>Tgl Hitung Mulai Punya NPWP</td>
            <td>Alamat Tinggal</td>
            <td>Alamat Pajak</td>
            <td>Kode Negara Untuk WNA</td>
            <td>No Telepon</td>
            <td>Email</td>
            <td>No KTP</td>
            <td>Pendidikan Terakhir</td>
            <td>Agama</td>
            <td>Jabatan Pajak</td>
            <td>Jabatan</td>
            <td>Cabang</td>
            <td>Departemen</td>
            <td>Section</td>
            <td>Golongan</td>
            <td>Grade</td>
            <td>Cabang Bank</td>
            <td>No Rekening</td>
            <td>Atas Nama</td>
            <td>Tgl Masuk</td>
            <td>Tgl Berhenti</td>
            <td>Masa Penghasilan Awal</td>  
            <td>Masa Penghasilan Akhir</td>
            <td>Metode</td>
            <td>Jenis Pegawai</td>
            <td>Jenis Kelamin</td>
            <td>Kebangsaan</td>
            <td>Status Kawin</td>
            <td>Tanggungan</td>
            <td>Jenis Pegawai HRD</td>
            <td>Status Kawin HRD</td>
            <td>Tanggungan HRD</td>
        </tr>
    </thead>
    <tbody>
    <?php
        $data = $this->db->query("SELECT *,
                                        IF(jenis_kelamin = 'Laki', 'L', 'P') AS fjenis_kelamin,
                                        IF(status_kel = 'TK', 'TK', 'K' ) AS fstatus_kel,
                                        DATE_FORMAT( tgl_resign, '%d/%m/%Y' ) AS ftgl_resign,
                                        IF(status_kel = 'TK', 0, SUBSTR(status_kel, 2,1)) AS tanggungan,
                                        MONTH(tgl_masuk) AS ftgl_masuk,
                                        tgl_masuk,
                                        DATE_FORMAT( tgl_masuk, '%d/%m/%Y' ) AS ftgl_masuk,
                                        DATE_FORMAT( tgl_lahir, '%d/%m/%Y' ) AS ftgl_lahir
                                    FROM
                                        tbl_makar
                                    WHERE 
                                        tgl_masuk BETWEEN '$tgl_mulai' AND '$tgl_selesai'
                                    ORDER BY
                                        tgl_masuk DESC")->result_array();
        $no = 1;
    ?>
    <?php foreach ($data as $dd) : ?>
    <tr>
        <td><?= $dd['no_scan']; ?></td>
        <td><?= $dd['nik_krishand']; ?></td>
        <td><?= $dd['nama']; ?></td>
        <td></td>
        <td><?= $dd['tempat_lahir']; ?></td>
        <td><?= $dd['ftgl_lahir']; ?></td>
        <td class="str"><?= $dd['npwp']; ?></td>
        <td></td>
        <td></td>
        <td><?= $dd['alamat_domisili']; ?></td>
        <td><?= $dd['alamat_ktp']; ?></td>
        <td></td>
        <td class="str">
            <?php 
                if(substr($dd['no_hp'],0,1) != 0 ){ 
                    echo "0".$dd['no_hp']; 
                } else { 
                    echo $dd['no_hp']; 
                }
            ?>
        </td>
        <td><?= $dd['email_pribadi']; ?></td>
        <td class="str"><?= $dd['no_ktp']; ?></td>
        <td><?= $dd['pendidikan']; ?></td>
        <td><?= $dd['agama']; ?></td>
        <td><?= $dd['jabatan']; ?></td>
        <td></td>
        <td></td>
        <td><?= $dd['dept']; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?= $dd['tgl_masuk']; ?></td>
        <td><?= $dd['ftgl_resign']; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?= $dd['fjenis_kelamin']; ?></td>
        <td></td>
        <td><?= $dd['fstatus_kel']; ?></td>
        <td><?= $dd['tanggungan']; ?></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>