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
                                <option value="kode3kpc">Kode 3 KPC (KPI Company)</option>
                                <option value="kode4stn">Kode 4 STN (Strategic Initiative)</option>
                                <option value="kode5kpd" selected>Kode 5 KPD (KPI Departemen)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit" name="submit">Proses</button>
                            <a href="#" class="btn btn-info" data-target="#modal-tambah" data-toggle="modal">Buat KPD baru</a>
                            <a href="<?= base_url('kpi_karyawan/export_kpd'); ?>" class="btn btn-success">Export to excel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> Setting KPD</h4>
                        <table class="display table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th style="width: 5px;"><i class="fa fa-gear"></i></th>
                                    <th>Kode</th>
                                    <th>KPI Dept</th>
                                    <th>Target</th>
                                    <th>Departement</th>
                                    <th>Keterangan KPD</th>
                                    <th>STN</th>
                                    <th>KPC</th>
                                    <th>STO</th>
                                    <th>BSC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data = $this->db->query("SELECT id, kode5, kpi_dept, `target`, dept, ket_kpd, kode4stn, kode3kpc, kode2sto, kode1bsc FROM kode5kpd ORDER BY id ASC")->result_array(); 
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
                                        <td><?= $result['kode5']; ?></td>
                                        <td><?= $result['kpi_dept']; ?></td>
                                        <td><?= $result['target']; ?></td>
                                        <td><?= $result['dept']; ?></td>
                                        <td><?= $result['ket_kpd']; ?></td>
                                        <td><?= $result['kode4stn']; ?></td>
                                        <td><?= $result['kode3kpc']; ?></td>
                                        <td><?= $result['kode2sto']; ?></td>
                                        <td><?= $result['kode1bsc']; ?></td>
                                    </tr>
                                    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
</section>
            