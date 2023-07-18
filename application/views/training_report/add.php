<script language="javascript">
    function tambahNama() {
        var idf = document.getElementById("idf").value;
        var stre;
        stre = "<div class='col-lg-2' class='form-group'><p id='srow" + idf + "'><select class='form-control input-sm select2' name='no_scan[]' required><option value='' disabled selected></option><?php $queryShift = $this->db->query('SELECT * FROM tbl_makar ORDER BY nama')->result_array(); ?> <?php foreach ($queryShift as $dk) : ?> <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>><?= $dk['no_scan'].' - '.$dk['nama'].' ('.$dk['dept'].')'; ?></option><?php endforeach; ?></select><a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p></div>";
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
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('training_report'); ?>"> Training Report </a><i class="fa fa-angle-right"></i> Form Training</h4><br>
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('training_report/add/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Materi Training</label>
                                <div class="col-lg-10">
                                    <select class="form-control select2" tabindex="2" name="kode_training" required>
                                        <option value="" disabled selected>Pilih materi training</option>
                                        <?php
                                            $queryNoScan = $this->db->get('training')->result_array();
                                        ?>
                                        <?php foreach ($queryNoScan as $dnc) : ?>
                                            <option value="<?= $dnc['id'] ?>"><?= $dnc['nama_training']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal Training</label>
                                <div class="col-lg-2">
                                    <input class="form-control input-sm" value="<?= set_value('tgl_training'); ?>" name="tgl_training" type="date" required>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="control-label col-lg-2">Trainer</label>
                                <div class="col-lg-2">
                                    <select class="form-control input-sm select2" style="width: 600px" tabindex="2" data-placeholder="Pilih NIP Karyawan..."  name="trainer" required>
                                        <option value="" disabled selected></option>
                                        <?php
                                            $dept = $user['dept'];
                                            if ($dept == "HRD") {
                                                $queryShift = $this->db->query("SELECT * FROM tbl_makar where not status_karyawan = 'perubahan_status' ORDER BY nama")->result_array();
                                            }else{
                                                $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' AND dept = '$dept' ORDER BY nama")->result_array();
                                            }
                                            
                                        ?>
                                        <?php foreach ($queryShift as $dk) : ?>
                                            <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('no_scan')) {
                                                echo "SELECTED";
                                            } ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tambahNama(); return false;">
                                        Tambah Nama Peserta
                                    </button>
                                </label>
                                <div class="col-lg-10" id="divSite" class="form-group">
                                    <input id="idf" value="1" type="hidden">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="submit">Save</button>
                                    <!-- <a href="<?= base_url('training_report'); ?>" class="btn btn-theme04">Cancel</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>