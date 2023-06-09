<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="showback">
                    <h4><i class="fa fa-angle-right"></i> Setting</h4>
                    <p>Silahkan pilih opsi dibawah ini.</p>
                    <form class="form-style-4" action="<?= base_url('kpi_karyawan/pilihan'); ?>" method="post">
                        <div class="form-group">
                            <select class="form-control input-sm select2" name="kode">
                                <option value="kode1bsc" selected>Kode 1 BSC (Balanced Scorecard)</option>
                                <option value="kode2sto">Kode 2 STO (Strategic Objective)</option>
                                <option value="kode3kpc">Kode 3 KPC (KPI Company)</option>
                                <option value="kode4stn">Kode 4 STN (Strategic Initiative)</option>
                                <option value="kode5kpd">Kode 5 KPD (KPI Departemen)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Proses</button>
                            <a href="#" class="btn btn-info" data-target="#modal-tambah" data-toggle="modal">Buat BSC baru</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> Setting BSC</h4>
                        <table class="display table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><i class="fa fa-gear"></i></th>
                                    <th>Kode</th>
                                    <th>Perspective BSC</th>
                                    <th>Keterangan BSC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data = $this->db->query("SELECT * FROM kode1bsc ORDER BY id ASC")->result_array(); 
                                ?>
                                <?php foreach($data AS $result): ?>
                                    <tr>
                                        <td>
                                            <li class="dropdown" style="list-style-type:none;">
                                                <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" style="color: black; font-size:13px;" data-target="#modal-ubah<?= $result['id']; ?>" data-toggle="modal"><b>Ubah</b></a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#" style="color: black; font-size:13px;" data-target="#modal-delete<?= $result['id']; ?>" data-toggle="modal"><b>Hapus</b></a></li>
                                                </ul>
                                            </li>
                                        </td>
                                        
                                        <td><a href="#" style="color: black; font-size:13px;" data-target="#modal-ubah<?= $result['id']; ?>" data-toggle="modal"><b><?= $result['kode1']; ?></b></a></td>
                                        <td><?= $result['perspective_bsc']; ?></td>
                                        <td><?= $result['ket_bsc']; ?></td>
                                    </tr>
                                    <div class="modal fade" id="modal-tambah">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="<?= base_url(); ?>kpi_karyawan/tambah_kode1bsc/" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Tambah Data BSC</h4>
                                                    </div>
                                                    <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                                        <label><b><i><u>Lengkapi form dibawah ini</u></i></b></label><br>
                                                        <label>Kode BSC</label>
                                                        <input type="text" name="kode1" placeholder="Kode.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>Perspective BSC</label>
                                                        <input type="text" name="perspective_bsc" placeholder="Perspective bsc.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                        
                                                        <label>Keterangan BSC</label>
                                                        <input type="text" name="ket_bsc" placeholder="Keterangan bsc.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <!-- <label for="country">Country</label>
                                                        <select id="country" name="country" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="australia">Australia</option>
                                                            <option value="canada">Canada</option>
                                                            <option value="usa">USA</option>
                                                        </select> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-ubah<?= $result['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="<?= base_url(); ?>kpi_karyawan/ubah_kode1bsc/<?= $result['id']; ?>" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Perubahan Data <?= $result['kode1']; ?></h4>
                                                    </div>
                                                    <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                                        <label>Kode BSC</label>
                                                        <input type="text" name="kode1" placeholder="Kode.." value="<?= $result['kode1'] ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>Perspective BSC</label>
                                                        <input type="text" name="perspective_bsc" placeholder="Perspective bsc.." value="<?= $result['perspective_bsc'] ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                        
                                                        <label>Keterangan BSC</label>
                                                        <input type="text" name="ket_bsc" placeholder="Keterangan bsc.." value="<?= $result['ket_bsc'] ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <!-- <label for="country">Country</label>
                                                        <select id="country" name="country" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="australia">Australia</option>
                                                            <option value="canada">Canada</option>
                                                            <option value="usa">USA</option>
                                                        </select> -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-delete<?= $result['id']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" action="<?= base_url(); ?>kpi_karyawan/hapus_kode1bsc/<?= $result['id']; ?>" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus <?= $result['kode1']; ?> ?</h4>
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
            