<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee data </a><i class="fa fa-angle-right"></i> Form Employed</h4>
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('data_karyawan/addEmployed'); ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Masuk (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('tgl_masuk'); ?>" id="tgl_masuk" name="tgl_masuk" type="date" required>
                                    <input class="form-control input-sm" value="<?= $makar->no_scan; ?>" id="no_scan" name="no_scan" type="hidden">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Status Karyawan (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="status_karyawan" required>
                                        <option value="" disabled selected>Status Employee</option>
                                        <option value="Kontrak">Kontrak</option>
                                        <option value="Tetap">Tetap</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Tetap (Wajib bila tetap)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('tgl_tetap'); ?>" id="tgl_tetap" name="tgl_tetap" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Kontrak Awal (Wajib bila kontrak)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('kontrak_awal'); ?>" id="kontrak_awal" name="kontrak_awal" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Kontrak Akhir (Wajib bila kontrak)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('kontrak_akhir'); ?>" id="kontrak_akhir" name="kontrak_akhir" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Jabatan (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="jabatan" required>
                                        <?php 
                                        $queryJabatan = "SELECT * FROM jabatan ORDER BY id ASC";
                                        $dataJabatan = $this->db->query($queryJabatan)->result_array();
                                        ?>
                                        <option value="" disabled selected>Jabatan</option>
                                        <?php foreach ($dataJabatan as $dj) : ?>
                                        <option value="<?= $dj['jabatan']; ?>"><?= $dj['jabatan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Department (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="dept" required>
                                        <?php 
                                        $queryDept = "SELECT * FROM departments ORDER BY CODE ASC";
                                        $dataDept = $this->db->query($queryDept)->result_array();
                                        ?>
                                        <option value="" disabled selected>Departments</option>
                                        <?php foreach ($dataDept as $dd) : ?>
                                        <option value="<?= $dd['code']; ?>"><?= $dd['dept_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Bagian (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('bagian'); ?>" id="bagian" name="bagian" type="text" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Unit (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('unit'); ?>" id="unit" name="unit" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Atasan 1</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= set_value('atasan1'); ?>" id="atasan1" name="atasan1" type="text" placeholder="<<optional>>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="control-label col-lg-12">Atasan 2</label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= set_value('atasan2'); ?>" id="atasan2" name="atasan2" type="text" placeholder="<<optional>>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor BPJS Tenaga Kerja</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('no_bpjs_tk'); ?>" id="no_bpjs_tk" name="no_bpjs_tk" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor BPJS Kesehatan</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('no_bpjs_kes'); ?>" id="no_bpjs_kes" name="no_bpjs_kes" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Status Aktif</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="status_aktif" required>
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('data_karyawan'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
    </section>
</section> 