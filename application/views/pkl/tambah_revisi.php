<script language="javascript">
    function tambahNama() {
        var idf = document.getElementById("idf").value;
        var stre;
        stre = "<div class='col-lg-2' class='form-group has-success'><p id='srow" + idf + "'><select class='form-control input-sm select2' tabindex='2' name='no_scan[]' required><option value='' disabled selected></option><?php $this->db->order_by('nama', 'ASC'); $this->db->where('dept',  $dpkl->dept); $this->db->where('status_aktif', '1'); $queryShift = $this->db->get('tbl_makar')->result_array(); ?> <?php foreach ($queryShift as $dk) : ?> <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>><?= $dk['no_scan'].' - '.$dk['nama'].' / '.$dk['dept']; ?></option><?php endforeach ?></select><a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p></div>";
        $("#divSite").append(stre);
        idf = (idf - 1) + 2;
        document.getElementById("idf").value = idf;
        $('.select2').select2()

    }
    
    function hapusElemen(idf) {
        $(idf).remove();
    }
</script>

<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pkl'); ?>"> Time Attendance </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('pkl'); ?>"> Form Lembur </a><i class="fa fa-angle-right"></i> Edit Form Lembur</h4>
    <?= $this->session->flashdata('message'); ?>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('pkl/tambah_proses_revisi/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kode Lembur</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $dpkl->kode_lembur; ?>" name="kode_lembur" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Shift</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $dpkl->shift; ?>" name="shift" type="text" readonly>
                                    <input class="form-control input-sm" value="<?= $dpkl->status_tipe_lembur; ?>" name="status_tipe_lembur2" type="hidden" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tipe Lembur</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm select2" name="status_tipe_lembur" >
                                        <option value="" disabled selected>Lembur Biasa / Hari Libur</option>
                                        <?php
                                            $queryShift = $this->db->query('SELECT * FROM jenis_lembur')->result_array();
                                        ?>
                                            <?php foreach ($queryShift as $ds) : ?>
                                            <option value="<?= $ds['desc'] ?>" <?php if ($ds['desc'] == $dpkl->status_tipe_lembur) {
                                                echo "SELECTED";
                                            } ?>><?= $ds['ket'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Department</label>
                                <div class="col-lg-10">
                                    <!-- <input class="form-control input-sm" value="<?= $user['dept']; ?>" name="dept" type="text" readonly> -->
                                    <select class="form-control input-sm select2" name="dept">
                                        <option value="" disabled selected>Pilih Dept</option>
                                        <?php
                                            $queryShift = $this->db->query('SELECT * FROM tbl_makar')->result_array();
                                        ?>
                                            <?php foreach ($queryShift as $ds) : ?>
                                            <option value="<?= $ds['dept'] ?>" <?php if ($ds['dept'] == $dpkl->dept) {
                                                echo "SELECTED";
                                            } ?>><?= $ds['dept'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tambahNama(); return false;">
                                        Tambah Nama <?= $user['name']; ?>
                                    </button>
                                </label>
                                <div class="col-lg-10" id="divSite" class="form-group has-success">
                                    <input id="idf" value="1" type="hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2" style="font-weight: bold;  ">Daftar Lembur</label>
                                <div class="col-lg-10" id="divSite" class="form-group has-success">
                                <?php
                                    $query = "SELECT a.no_scan, b.nama, a.tipe_lembur
                                                FROM permohonan_kerja_lembur a
                                                LEFT JOIN ( SELECT b.no_scan, b.nama FROM tbl_makar b )b ON b.no_scan = a.no_scan
                                                WHERE a.kode_lembur = '$dpkl->kode_lembur'";
                                    $data = $this->db->query($query)->result_array();
                                    $no = 1;
                                ?>
                                <?php foreach ($data as $d) : ?>
                                    <div class='col-lg-2' class='form-group has-success'>
                                        <input type="text" value="<?= $d['no_scan']; ?> - <?= $d['nama']; ?>" class="input-sm" readonly>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-lg-2">Tujuan Lembur</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $dpkl->tujuan_lembur; ?>" name="tujuan_lembur" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Target Lembur</label>
                                <div class="col-lg-2">
                                    <input class="form-control input-sm" value="<?= $dpkl->target_lembur; ?>" name="target_lembur" type="text" readonly>
                                </div>
                                <label class="control-label col-lg-1">Tipe Lembur</label>
                                <div class="col-lg-2">
                                    <select class="form-control input-sm" name="tipe_lembur" readonly>
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
                                    <input class="form-control input-sm" value="<?= $dpkl->jam; ?>" name="jam" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Penyebab Lembur</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $dpkl->penyebab_lembur; ?>" name="penyebab_lembur" type="text" readonly>
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
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dibuat_oleh_nama; ?>" name="dibuat_oleh_nama" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->diperiksa_oleh_nama; ?>" name="diperiksa_oleh_nama" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->ddpl_diketahui_nama; ?>" name="diketahui_oleh_nama" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dt_disetujui_nama; ?>" name="disetujui_oleh_nama" type="text" readonly></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Jabatan</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dibuat_oleh_jabatan; ?>" name="dibuat_oleh_jabatan" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->diperiksa_oleh_jabatan; ?>" name="diperiksa_oleh_jabatan" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->ddpl_diketahui_jabatan; ?>" name="diketahui_oleh_jabatan" type="text" readonly></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->dt_disetujui_jabatan; ?>" name="disetujui_oleh_jabatan" type="text" readonly></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal</label>
                                <label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2" value="<?= $dpkl->tanggal; ?>" name="tanggal" type="date" readonly></label>
                                <?= form_error('tanggal', '<small class="text-danger pl-2" style="font-size: 14px; colot:red; font-weight: bold;">', '</small>'); ?>
                            </div> -->
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('pkl/index_all'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>