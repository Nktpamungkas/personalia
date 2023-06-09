<script language="javascript">
    function tambahNama() {
        var idf  = document.getElementById("idf").value;
        var stre = "<div class='col-lg-2' class='form-group'><p id='srow" + idf + "'><select class='form-control input-sm select2' tabindex='2' name='no_scan[]' required><option value='' disabled selected></option><?php  $dept = $user['dept']; $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_karyawan = 'perubahan_status' AND NOT status_aktif = 0 ORDER BY nama ASC")->result_array(); ?> <?php foreach ($queryShift as $dk) : ?> <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option><?php endforeach ?></select><a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p></div>";
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
    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pkl'); ?>"> Time Attendance </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('pkl'); ?>"> Form Lembur</a><i class="fa fa-angle-right"></i> Add Form Lembur</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('pkl/add/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kode Cuti</label>
                                <div class="col-lg-10">
                                    <label class="control-label col-lg-2"><b>FL-YYYYMMDD-XXXXXXX</b></label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Shift</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm select2" name="shift" required>
                                        <option value="" disabled selected>Pilih Shift</option>
                                        <?php
                                            $queryShift = $this->db->query("SELECT * FROM shift")->result_array();
                                        ?>
                                        <?php foreach ($queryShift as $ds) : ?>
                                            <option value="<?= $ds['desc'] ?>" <?php if ($ds['desc'] == set_value('shift')) {
                                                echo "SELECTED";
                                            } ?>><?= $ds['ket'] ?></option>
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
                                <label class="control-label col-lg-2">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tambahNama(); return false;">
                                        Tambah Nama <?= $user['name']; ?>
                                    </button>
                                </label>
                                <div class="col-lg-10" id="divSite" class="form-group">
                                    <input id="idf" value="1" type="hidden">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="control-label col-lg-2">Tujuan Lembur</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control input-sm" name="tujuan_lembur" required><?= set_value('tujuan_lembur'); ?></textarea>

                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-lg-2">Target Lembur</label>
                                <div class="col-lg-2">
                                    <input class="form-control input-sm" value="<?= set_value('target_lembur'); ?>" name="target_lembur" type="date" required>
                                </div>
                                <label class="control-label col-lg-1">Tipe Lembur</label>
                                <div class="col-lg-2">
                                    <select class="form-control input-sm" name="tipe_lembur" required>
                                        <option value="" selected disabled>-Pilih Tipe Lembur-</option>
                                        <option value="B">Hari Biasa</option>
                                        <option value="L">Hari Libur</option>
                                    </select>
                                </div>
                                <label class="control-label col-lg-2">Jam</label>
                                <div class="col-lg-3">
                                    <textarea class="form-control input-sm" name="jam" required><?= set_value('jam'); ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Penyebab Lembur</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control input-sm" name="penyebab_lembur" required><?= set_value('penyebab_lembur'); ?></textarea>

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
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('dibuat_oleh_nama'); ?>" name="dibuat_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('diperiksa_oleh_nama'); ?>" name="diperiksa_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('diketahui_oleh_nama'); ?>" name="diketahui_oleh_nama" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('disetujui_oleh_nama'); ?>" name="disetujui_oleh_nama" type="text" required></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Jabatan</label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('dibuat_oleh_jabatan'); ?>" name="dibuat_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('diperiksa_oleh_jabatan'); ?>" name="diperiksa_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('diketahui_oleh_jabatan'); ?>" name="diketahui_oleh_jabatan" type="text" required></label>
                                <label class="control-label col-lg-2"><input class="form-control input-sm col-lg-2" value="<?= set_value('disetujui_oleh_jabatan'); ?>" name="disetujui_oleh_jabatan" type="text" required></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal</label>
                                <label class="control-label col-lg-6"><input class="form-control input-sm col-lg-2" value="<?= set_value('tanggal'); ?>" name="tanggal" type="date" required></label>
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