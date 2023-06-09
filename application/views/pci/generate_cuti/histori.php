<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Laporan Sisa Cuti </h4>
        <div class="col-md-6">
            <p>
                <a href="<?= base_url('pci/generate_cuti'); ?>" class="btn btn-default btn-sm"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-cuti">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Scan</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Lama Izin</th>
                                <th>Saldo Cuti</th>
                                <th>Tgl Cuti</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $data = $this->db->query("SELECT
                                                                a.nip, a.dept, a.lama_izin, a.saldo_cuti,
                                                                DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                                                DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                                                b.nama, a.ket, a.alasan
                                                            FROM
                                                                permohonan_izin_cuti a
                                                                LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.nip
                                                            WHERE
                                                                a.nip = '$no_scan'")->result_array(); 
                                $no = 1;
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $result['nip']; ?></td>
                                <td><?= $result['nama']; ?></td>
                                <td><?= $result['dept']; ?></td>
                                <td align="center"><?= $result['lama_izin']; ?></td>
                                <td align="center"><?= $result['saldo_cuti']; ?></td>
                                <td><?= $result['tgl_mulai'].'<b> s/d </b>'.$result['tgl_selesai']; ?></td>
                                <td><?= $result['ket']; ?>, <?= $result['alasan']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
