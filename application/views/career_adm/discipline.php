<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                    <h3>DISCIPLINE</h3>
                </div>
                <p>
                    <a href="<?= base_url('career_adm/add_new_discipline') ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Input data SP</a>
                    <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                    <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                        <form action="<?= base_url('career_adm/export_excel') ?>" method="POST">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-calendar"></i> Range Tanggal Export </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <b>Range tanggal :</b>
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
                    <?= $this->session->flashdata('message'); ?>
                </p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-index-discipline">
                                    <thead>
                                        <tr>
                                            <th width="100"><i class="fa fa-gear"></i>Setting</th>
                                            <th>Kode SP</th>
                                            <th width="175">Tanggal SP</th>
                                            <th>No Scan</th>
                                            <th width="175">Nama</th>
                                            <th>Dept</th>
                                            <th>Jabatan</th>
                                            <th>SP ke-</th>
                                            <th>Alasan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $query = $this->db->query("SELECT a.id,
                                                                        DATE_FORMAT( a.tgl_sp, '%d %M %Y' ) AS tgl_sp,
                                                                        a.no_scan,
                                                                        b.nama,
                                                                        b.dept,
                                                                        b.jabatan,
                                                                        a.sp,
                                                                        a.alasan	
                                                                    FROM
                                                                        dicipline a
                                                                        LEFT JOIN ( SELECT * FROM tbl_makar b) b ON b.no_scan = a.no_scan")->result_array(); 
                                            
                                        ?>
                                        <?php foreach($query AS $result) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url('career_adm/edit_new_discipline/').$result['id'] ?>"><i class=" fa fa-pencil"></i>&nbsp;&nbsp;Edit</a> <br>
                                                
                                                <a href="#" data-toggle="modal" data-target="#modalDelete<?= $result['id'] ?>"><i class=" fa fa-trash"></i>&nbsp;&nbsp;Hapus</a>
                                                <div class="modal fade" id="modalDelete<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                                <form action="<?= base_url('career_adm/delete_new_discipline/') ?><?= $result['id'] ?>" method="POST">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title"><i class="fa fa-trash"></i> Anda ingin menghapus data ini ? </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center>
                                                                    SP<?php echo sprintf("%04d", $result['id']); ?>
                                                                    <br>
                                                                    <b><?= $result['nama']; ?></b>
                                                                    <br>
                                                                    <?= $result['alasan']; ?>
                                                                </center>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            </td>
                                            <td>
                                                SP<?php echo sprintf("%04d", $result['id']); ?>
                                            </td>
                                            <td><?= $result['tgl_sp']; ?></td>
                                            <td><?= $result['no_scan']; ?></td>
                                            <td><?= $result['nama']; ?></td>
                                            <td><?= $result['dept']; ?></td>
                                            <td><?= $result['jabatan']; ?></td>
                                            <td><?= $result['sp']; ?></td>
                                            <td><?= $result['alasan']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb">
                        
                    </div>
                    <div class="col-md-4 mb">
                        
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    
                </div>
                <!-- /col-md-4 -->
                </div>
            </div>
        </div>
    </section>
</section>