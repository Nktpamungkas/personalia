<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pkl'); ?>"> Time Attendance </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('pkl'); ?>"> Form Lembur </a><i class="fa fa-angle-right"></i> Edit Form Lembur</h4>
    
    <?= $this->session->flashdata('message'); ?>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('pkl/edit/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kode Lembur</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $dpkl->kode_lembur; ?>" name="kode_lembur" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Shift</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm select2" name="shift" required>
                                        <option value="" disabled selected>Pilih Shift</option>
                                        <?php
                                            $queryShift = $this->db->query('SELECT * FROM shift')->result_array();
                                        ?>
                                        <?php foreach ($queryShift as $ds) : ?>
                                            <option value="<?= $ds['desc'] ?>" <?php if ($ds['desc'] == $dpkl->shift) {
                                                echo "SELECTED";
                                            } ?>><?= $ds['desc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Department</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $user['dept']; ?>" name="dept" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" style="font-weight: bold;  ">Daftar Lembur</label>
                                <div class="col-lg-10" id="divSite" class="form-group has-success">
                                <?php
                                    $dept = $user['dept'];
                                    $this->db->where('kode_lembur', $dpkl->kode_lembur);
                                    $data = $this->db->get('permohonan_kerja_lembur')->result_array();
                                    $no = 1;
                                ?>
                                <?php foreach ($data as $d) : ?>
                                    <div class='col-lg-2' class='form-group has-success'>
                                        <input type='hidden' value="<?= $d['id'] ?>" name="id[]" required>
                                        <!-- <input type='text' class='form-control input-sm' value="<?= $d['nama'] ?>" name="nama_edit[]" required> -->

                                        <select class="form-control input-sm select2" data-placeholder="Pilih NIP Karyawan..." tabindex="2" name="no_scan[]" required>
                                            <option value="" disabled selected></option>
                                            <?php
                                                $this->db->order_by('nama', 'ASC');
                                                $this->db->where('dept', $user['dept']);  
                                                $queryShift = $this->db->get('tbl_makar')->result_array(); 
                                            ?>
                                            <?php foreach ($queryShift as $dk) : ?>
                                                <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == $d['no_scan']) {
                                                    echo "SELECTED";
                                                } ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-lg-2">Tujuan Lembur</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control input-sm" name="tujuan_lembur" required><?= nl2br($dpkl->tujuan_lembur); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Target Lembur</label>
                                <div class="col-lg-2">
                                    <textarea class="form-control input-sm" name="target_lembur" required><?= nl2br($dpkl->target_lembur); ?></textarea>
                                </div>
                                <label class="control-label col-lg-1">Tipe Lembur</label>
                                <div class="col-lg-2">
                                    <select class="form-control input-sm" name="tipe_lembur" required>
                                        <option value="" selected disabled>-Pilih Tipe Lembur-</option>
                                        <option value="B" <?php if ("B"== $d['tipe_lembur']) {
                                                    echo "SELECTED";
                                                } ?>>Hari Biasa</option>
                                        <option value="L" <?php if ("L"== $d['tipe_lembur']) {
                                                    echo "SELECTED";
                                                } ?>>Hari Libur</option>
                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Jam</label>
                                <div class="col-lg-3">
                                    <textarea class="form-control input-sm" name="jam" required><?= nl2br($dpkl->jam); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Penyebab Lembur</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control input-sm" name="penyebab_lembur" required><?= nl2br($dpkl->penyebab_lembur); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2"></label>
                                <label class="control-label col-lg-2"><center>Dibuat Oleh : </center></label>
                                <label class="control-label col-lg-2"><center>Diperiksa Oleh :</center></label>
                                <label class="control-label col-lg-2"><center>Dir. Dept. Penyebab Lembur <br>  Diketahui Oleh :</center></label>
                                <label class="control-label col-lg-2"><center>Dir. Terkait <br> Disetujui Oleh :</center></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Nama</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dibuat_oleh_nama; ?>" name="dibuat_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->diperiksa_oleh_nama; ?>" name="diperiksa_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->ddpl_diketahui_nama; ?>" name="diketahui_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dt_disetujui_nama; ?>" name="disetujui_oleh_nama" type="text" required></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Jabatan</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dibuat_oleh_jabatan; ?>" name="dibuat_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->diperiksa_oleh_jabatan; ?>" name="diperiksa_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->ddpl_diketahui_jabatan; ?>" name="diketahui_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dt_disetujui_jabatan; ?>" name="disetujui_oleh_jabatan" type="text" required></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal</label>
                                <label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->tanggal; ?>" name="tanggal" type="date" required></label>
                                <?= form_error('tanggal', '<small class="text-danger pl-2" style="font-size: 14px; colot:red; font-weight: bold;">', '</small>'); ?>
                            </div> -->
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('pkl'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>