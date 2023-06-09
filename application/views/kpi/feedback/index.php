<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="#" class="btn btn-success" data-target="#modal-tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> <span>Tambah data..</span></a>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="modal-tambah" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form role="form" action="<?= base_url(); ?>kpi_karyawan/tambah_feedback/" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data BSC</h4>
                            </div>
                            <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                <center><label><b><i><u>Lengkapi form dibawah ini</u></i></b></label></center><br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg">
                                            <div class="input-group">
                                                <label>*Dari</label>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <!-- <input type="text" name="no_scan" class="form-control input-sm" placeholder="No Scan.."> -->
                                                <select name="no_scan" style='width: 100%; background-color: #EED9D2;' class="form-control input-sm select2" required>
                                                    <option value="" disabled selected>No scan</option>
                                                    <?php
                                                        $dept = $user['dept'];
                                                        $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1 AND dept ='$dept'")->result_array();
                                                    ?>
                                                    <?php foreach ($makar as $dMakar) : ?>
                                                        <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == set_value('no_scan')) {
                                                            echo "SELECTED";
                                                        } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <label>*Kepada</label>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <!-- <input type="text" name="no_scan2" class="form-control input-sm" placeholder="No Scan.."> -->
                                                <select name="no_scan2" style='width: 100%; background-color: #EED9D2;' class="form-control input-sm select2" required>
                                                    <option value="" disabled selected>No scan</option>
                                                    <?php
                                                        // $dept = $user['dept'];
                                                        $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                                    ?>
                                                    <?php foreach ($makar as $dMakar) : ?>
                                                        <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == set_value('no_scan')) {
                                                            echo "SELECTED";
                                                        } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <input type="text" name="feedback" class="form-control input-sm" placeholder="Uraian keluhan atau Feedback..">
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <input type="text" name="lokasi_feedback" class="form-control input-sm" placeholder="Alamat URL feedback">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> Feedback</h4>
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><i class="fa fa-gear"></i></th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Dept</th>
                                    <th>Kepada</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Dept</th>
                                    <th>Uraian Keluhan atau Feedback</th>
                                    <th>Tanggapan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $dept = $user['name'];
                                    $data = $this->db->query("SELECT * FROM viewfeedback ORDER BY id DESC")->result_array(); 
                                ?>
                                <?php foreach($data AS $result): ?>
                                    <tr>
                                        <td>
                                            <li class="dropdown" style="list-style-type:none;">
                                                <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" style="color: black; font-size:13px;" data-target="#modal-delete<?= $result['id']; ?>" data-toggle="modal"><b>Hapus</b></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#tanggapan<?= $result['id']; ?>">Tanggapan Atas Feedback</a></li>
                                                </ul>
                                            </li>
                                        </td>
                                        <td><?= $result['no_scan']; ?></td>
                                        <td><?= $result['nama']; ?></td>
                                        <td><?= $result['dept']; ?></td>
                                        <td><?= $result['no_scan2']; ?></td>
                                        <td><?= $result['nama2']; ?></td>
                                        <td><?= $result['dept2']; ?></td>
                                        <td><?= $result['feedback']; ?></td>
                                        <td><?= $result['lokasi_feedback']; ?></td>
                                        <td><?= $result['tanggapan']; ?></td>
                                        <td><?= $result['status']; ?></td>
                                    </tr>
                                    <!-- Modal tanggapan-->
                                    <div class="modal fade" id="tanggapan<?= $result['id']; ?>"  role="dialog" aria-labelledby="modalTanggapan" aria-hidden="true">
                                        <form role="form" action="<?= base_url('Kpi_karyawan/tanggapan/') . $result['id'];  ?>" method="POST">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-sign-out"></i>Tanggapan Atas Feedback</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <label class="control-label col-lg-12">Tanggapan Atas Feedback</label>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <textarea name="tanggapan" class="control-label col-lg-12"><?= $result['tanggapan']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal fade" id="modal-delete<?= $result['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" action="<?= base_url(); ?>kpi_karyawan/hapus_feedback/<?= $result['id']; ?>" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus data ini ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>  
                            </tbody>
                        </table>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
</section>