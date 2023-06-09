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
                                <option value="kode1bsc">Kode 1 BSC (Balanced Scorecard)</option>
                                <option value="kode2sto">Kode 2 STO (Strategic Objective)</option>
                                <option value="kode3kpc" selected>Kode 3 KPC (KPI Company)</option>
                                <option value="kode4stn">Kode 4 STN (Strategic Initiative)</option>
                                <option value="kode5kpd">Kode 5 KPD (KPI Departemen)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Proses</button>
                            <a href="#" class="btn btn-info" data-target="#modal-tambah" data-toggle="modal">Buat KPC baru</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> Setting KPC</h4>
                        <table class="display table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><i class="fa fa-gear"></i></th>
                                    <th>Kode</th>
                                    <th>KPI Company - KPC</th>
                                    <th>Keterangan KPC</th>
                                    <th>STO</th>
                                    <th>BSC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data = $this->db->query("SELECT * FROM kode3kpc ORDER BY id ASC")->result_array(); 
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
                                        <td><?= $result['kode3']; ?></td>
                                        <td><?= $result['kpi_company_kpc']; ?></td>
                                        <td><?= $result['ket_kpc']; ?></td>
                                        <td><?= $result['kode2sto']; ?></td>
                                        <td><?= $result['kode1bsc']; ?></td>
                                    </tr>
                                    <div class="modal fade" id="modal-tambah" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="<?= base_url(); ?>kpi_karyawan/tambah_kode3kpc" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Tambah Data KPC</h4>
                                                    </div>
                                                    <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                                        <label><b><i><u>Lengkapi form dibawah ini</u></i></b></label><br>
                                                        <label>Kode KPC</label>
                                                        <input type="text" name="kode3" placeholder="Kode.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>KPI Company - KPC</label>
                                                        <input type="text" name="kpi_company_kpc" placeholder="KPI Company - KPC.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                        
                                                        <label>Keterangan KPC</label>
                                                        <input type="text" name="ket_kpc" placeholder="Keterangan kpc.." style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>STO</label>
                                                        <select name="kode2sto" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="" disabled selected>Pilih kode2sto</option>
                                                            <?php
                                                                $Qkode2sto = $this->db->query("SELECT * FROM kode2sto")->result_array();
                                                            ?>
                                                            <?php foreach ($Qkode2sto as $ds1) : ?>
                                                                <option value="<?= $ds1['kode2'] ?>" <?php if ($ds1['kode2'] == set_value('kode2')) {
                                                                    echo "SELECTED";
                                                                } ?>><?= $ds1['kode2']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        
                                                        <label>BSC</label>
                                                        <select name="kode1bsc" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="" disabled selected>Pilih kode1bsc</option>
                                                            <?php
                                                                $Qkode1bsc = $this->db->query("SELECT * FROM kode1bsc")->result_array();
                                                            ?>
                                                            <?php foreach ($Qkode1bsc as $dk1) : ?>
                                                                <option value="<?= $dk1['kode1'] ?>" <?php if ($dk1['kode1'] == set_value('kode1')) {
                                                                    echo "SELECTED";
                                                                } ?>><?= $dk1['kode1']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-ubah<?= $result['id']; ?>" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" action="<?= base_url(); ?>kpi_karyawan/ubah_kode3kpc/<?= $result['id']; ?>" method="POST">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Perubahan Data <?= $result['kode3']; ?></h4>
                                                    </div>
                                                    <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                                        <label><b><i><u>Lengkapi form dibawah ini</u></i></b></label><br>
                                                        <label>Kode KPC</label>
                                                        <input type="text" name="kode3" placeholder="Kode.." value="<?= $result['kode3']; ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>KPI Company - KPC</label>
                                                        <input type="text" name="kpi_company_kpc" placeholder="KPI Company - KPC.." value="<?= $result['kpi_company_kpc']; ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                        
                                                        <label>Keterangan KPC</label>
                                                        <input type="text" name="ket_kpc" placeholder="Keterangan kpc.." value="<?= $result['kpi_company_kpc']; ?>" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">

                                                        <label>STO</label>
                                                        <select name="kode2sto" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="" disabled selected>Pilih kode2sto</option>
                                                            <?php
                                                                $Qkode2sto = $this->db->query("SELECT * FROM kode2sto")->result_array();
                                                            ?>
                                                            <?php foreach ($Qkode2sto as $ds1) : ?>
                                                                <option value="<?= $ds1['kode2'] ?>" <?php if ($ds1['kode2'] == $result['kode2sto']) {
                                                                    echo "SELECTED";
                                                                } ?>><?= $ds1['kode2']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        
                                                        <label>BSC</label>
                                                        <select name="kode1bsc" class="select2" style="width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                                                            <option value="" disabled selected>Pilih kode1bsc</option>
                                                            <?php
                                                                $Qkode1bsc = $this->db->query("SELECT * FROM kode1bsc")->result_array();
                                                            ?>
                                                            <?php foreach ($Qkode1bsc as $dk1) : ?>
                                                                <option value="<?= $dk1['kode1'] ?>" <?php if ($dk1['kode1'] == $result['kode1bsc']) {
                                                                    echo "SELECTED";
                                                                } ?>><?= $dk1['kode1']; ?></option>
                                                            <?php endforeach ?>
                                                        </select>
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
                                                <form class="form-horizontal" action="<?= base_url(); ?>kpi_karyawan/hapus_kode3kpc/<?= $result['id']; ?>" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus <?= $result['kode3']; ?> ?</h4>
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
            