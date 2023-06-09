
<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Izin Cuti </h4>
        <div class="col-md-6">
            <p>
                <a href="<?= base_url('pci'); ?>" class="btn btn-warning"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-info">Export to Excel</a>
                <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                    <form action="<?= base_url('pci/export_excel') ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-calendar"></i> Range Tanggal Export : </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <b>Range tanggal berdasarkan Tanggal Surat</b>
                                                <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                <label>
                                                    Tanggal Mulai
                                                    <input type="date" name="start" class="form-control input-sm" required>
                                                </label>
                                                <label> s/d </label>
                                                <label>
                                                    Tanggal Akhir
                                                    <input type="date" name="stop" class="form-control input-sm" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Export Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <h4>*DATA YANG BELUM DI VERIFIKASI</h4>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-indexAll-pci">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Mulai</th>
                                <th>Lama Izin</th>
                                <th>Selesai</th>
                                <th>Alasan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = $this->db->query("SELECT a.id,
                                                                DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
                                                                a.nip,
                                                                b.nama,
                                                                b.dept,
                                                                DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                                                a.lama_izin,
                                                                DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                                                a.alasan 
                                                            FROM
                                                                permohonan_izin_cuti a
                                                                LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.nip = b.no_scan 
                                                            WHERE
                                                                `status` = 'Printed' 
                                                            ORDER BY
                                                                a.tgl_mulai DESC")->result_array(); 
                            ?>
                            <?php foreach($query AS $data): ?>
                                <tr>
                                    <td><?= $data['tgl_surat_pemohon']; ?></td>
                                    <td><?= $data['nip']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['dept']; ?></td>
                                    <td><?= $data['tgl_mulai']; ?></td>
                                    <td><?= $data['lama_izin']; ?></td>
                                    <td><?= $data['tgl_selesai']; ?></td>
                                    <td><?= $data['alasan']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>pci/edit_Request/<?= $data['id']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-check" title="verifikasi"></span></a>
                                        <a href="#" data-toggle="modal" data-target="#modal-delete<?= $data['id']; ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash" title="Hapus"></span></a>
                                        <div class="modal fade" id="modal-delete<?= $data['id']; ?>">
                                            <div class="modal-dialog ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel"><span class="fa fa-info-circle"> Apakah anda yakin ingin mengahapus data ini?</span></h4>
                                                    </div>
                                                    <form class="form-horizontal" action="<?= base_url(); ?>pci/delete/<?= $data['id']; ?>" method="post">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mb col-sm-12">
        <hr>
        <h4>*DATA YANG SUDAH DI VERIFIKASI</h4>
            <form action="<?= base_url('pci/index_all'); ?>" method="POST">
                <label>Tampilkan bulan : </label>
                <input type="date" name="tgl">
                <input type="submit" name="submit" value="Search"><?= $bln; ?>
            </form>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-indexAll-pci-ver">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Dept</th>
                                <th>Mulai</th>
                                <th>Lama Izin</th>
                                <th>Selesai</th>
                                <th>Alasan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                if ($bln){
                                    $_bln = "'".$bln."'";
                                }else{
                                    $_bln = 'CURRENT_DATE()';
                                }
                                $query = $this->db->query("SELECT a.id,
                                                                DATE_FORMAT( a.tgl_surat_pemohon, '%d %M %Y' ) AS tgl_surat_pemohon,
                                                                a.nip,
                                                                b.nama,
                                                                b.dept,
                                                                DATE_FORMAT( a.tgl_mulai, '%d %M %Y' ) AS tgl_mulai,
                                                                a.lama_izin,
                                                                DATE_FORMAT( a.tgl_selesai, '%d %M %Y' ) AS tgl_selesai,
                                                                a.alasan 
                                                            FROM
                                                                permohonan_izin_cuti a
                                                                LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.nip = b.no_scan 
                                                            WHERE
                                                                `status` = 'Verifikasi' 
                                                                AND NOT `status` = '' 
                                                                AND MONTH ( tgl_surat_pemohon ) = MONTH ( $_bln ) 
                                                                AND YEAR ( tgl_surat_pemohon ) = YEAR ( $_bln ) 
                                                            ORDER BY
                                                                a.tgl_mulai ASC")->result_array(); 
                            ?>
                            <?php foreach($query AS $data): ?>
                                <tr>
                                    <td><?= $data['tgl_surat_pemohon']; ?></td>
                                    <td><?= $data['nip']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['dept']; ?></td>
                                    <td><?= $data['tgl_mulai']; ?></td>
                                    <td><?= $data['lama_izin']; ?></td>
                                    <td><?= $data['tgl_selesai']; ?></td>
                                    <td><?= $data['alasan']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>pci/edit_Request/<?= $data['id']; ?>" class="btn btn-info btn-xs"><span class="fa fa-edit" title="Terverifikasi"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>