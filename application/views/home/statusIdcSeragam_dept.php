<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
        <div class="col-lg-25">
            <div class="showback">
                <div class="row">
                    <div class="col-md-500 mb">
                        <center><h5><b>DATA STATUS SERAGAM DAN ID CARD KARYAWAN</b></h5></center>
                        <?php if($user['dept'] == "DIT" OR $user['dept'] == "HRD") : ?>
                            <div class="row">
                                <div class="col-md-4 mb">
                                   <label>
                                        <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                                        <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form action="<?= base_url('home/export_excel_Status_seragam') ?>" method="POST">
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
                                                                        <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                                        <label>
                                                                            Dari tanggal
                                                                            <input type="date" name="start" class="form-control input-sm" required>
                                                                        </label>
                                                                        <label> s/d </label>
                                                                        <label>
                                                                            tanggal
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
                                    </label>
                                </div>
                           </div> 
                        <?php endif; ?>  
        <div class="row mb col-sm-12">
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-indexAll-pci">
                        <thead>
                            <tr>
                                <th width="80"><center>No Scan</center></th>
                                <th width="300"><center>Nama</center></th>
                                <th width="80"><center>Departemen</center></th>
                                <th width="250"><center>Jabatan</center></th>
                                <th width="200"><center>Tanggal Masuk</center></th>
                                <th width="150"><center>Masa Kerja (Bulan)</center></th>
                                <th width="170"><center>Status ID Card</center></th>
                                <th width="170"><center>Status Seragam</center></th>
                                <th width="200"><center>Tanggal Menerima Seragam</center></th>
                                <!-- <th>Option</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             $query = $this->db->query("SELECT no_scan,
                                                                        nama,
                                                                        dept,
                                                                        jabatan,
                                                                        DATE_FORMAT(tgl_masuk, '%d-%m-%Y') AS tgl_masuk,
                                                                        TIMESTAMPDIFF( MONTH , tgl_masuk, NOW() ) AS masa_kerja,
                                                                        status_seragam,
                                                                        status_idcard,
                                                                        DATE_FORMAT((DATE_ADD(tgl_masuk, INTERVAL 6 month )), '%d-%m-%Y') as tgl_seragam                                   
                                                                        FROM
                                                                        tbl_makar 
                                                                        WHERE
                                                                        dept = '$user[dept]'
                                                                        and status_karyawan IN ('Kontrak2','Kontrak1')
                                                                        AND masa_kerja <12
                                                                        AND NOT status_karyawan ='Resigned'
                                                                        AND NOT status_karyawan ='Proses Resign'
                                                                        AND NOT status_karyawan ='Tetap'
                                                                        ORDER BY
                                                                        masa_kerja desc")->result_array();
                            ?>
                            <?php foreach($query AS $data): ?>
                                <tr>
                                    <td><?= $data['no_scan']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['dept']; ?></td>
                                    <td><?= $data['jabatan']; ?></td>
                                    <td><?= $data['tgl_masuk']; ?></td>
                                    <td><?= $data['masa_kerja']; ?></td>
                                    <td><?= $data['status_idcard']; ?></td>
                                    <td><?= $data['status_seragam']; ?></td>
                                    <td><?= $data['tgl_seragam']; ?></td>
                                    <!-- <td>
                                    <?php if($data['status_idcard'] == "Sudah" and $data['status_seragam'] == "Sudah") : ?>    
                                        <a href="#" style="pointer-events:none;" data-toggle="modal" data-target="#modal-edit<?= $data['no_scan']; ?>" class="btn btn-info btn-xs"><span class="fa fa-edit" title="Ubah Data"> </span></a>
                                        <?php else: ?>
                                        <a href="#" data-toggle="modal" data-target="#modal-edit<?= $data['no_scan']; ?>" class="btn btn-info btn-xs"><span class="fa fa-edit" title="Ubah Data"></span></a>    
                                        <?php endif; ?> 
                                        <div class="modal fade" id="modal-edit<?= $data['no_scan']; ?>">
                                            <div class="modal-dialog ">
                                                <form class="form-horizontal" action="<?= base_url(); ?>home/edit_status_seragam_dept/<?= $data['no_scan']; ?>" method="post">
                                                    <div class="modal-content">
                                                       <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title"><i class="fa fa-sign-out"></i>Edit Status Id Card Seragam</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                            <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">No Scan </label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                    <input class="form-control input-sm" value="<?= $data['no_scan']; ?>" name="no_scan" readonly>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Nama</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                    <input class="form-control input-sm" value="<?= $data['nama']; ?>" name="nama" readonly>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Status IdCard</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                    <input value="<?= $data['no_scan']; ?>" name="no_scan" type="hidden">
                                                                                    <select name="status_idcard" class="select2" data-placeholder="Pilih Status ID Card" required>
                                                                                        <option value="" disabled selected>---------------------------------------------------</option>
                                                                                        <?php $queryidcard = $this->db->get('status_idcseragam')->result_array(); ?>
                                                                                        <?php foreach ($queryidcard as $dsi) : ?>
                                                                                            <option value="<?= $dsi['status_idcard']; ?>" <?php if($dsi['status_idcard'] == $data['status_idcard'] ) { echo "selected"; } ?>><?= $dsi['status_idcard']; ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Status Seragam</label>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                <select name="status_seragam" class="select2" data-placeholder="Pilih status seragam" required>
                                                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                                                    <?php $queryseragam= $this->db->get('status_idcseragam')->result_array(); ?>
                                                                                    <?php foreach ($queryseragam as $dsg) : ?>
                                                                                    <option value="<?= $dsg['status_seragam'] ?>" <?php if ($dsg['status_seragam'] == $data['status_seragam']) { echo "SELECTED"; } ?>><?= $dsg['status_seragam'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                                </div>
                                                                           </div>
                                                                        </div>                                                    
                                                                <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info" name="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>                                 
                                    </td> -->
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