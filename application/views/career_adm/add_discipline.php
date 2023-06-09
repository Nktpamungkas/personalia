<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('career_adm/discipline'); ?>"> Career Administration </a><i class="fa fa-angle-right"></i> Discipline</h4><br>
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('career_adm/c_career_adm/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal Surat Peringatan</label>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control input-sm" name="tgl_sp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">No Scan</label>
                                <div class="col-lg-2">
                                    <select class="form-control input-sm select2" style="width: 600px" tabindex="2" data-placeholder="Pilih NIP Karyawan..."  name="no_scan" required>
                                        <option value="" disabled selected></option>
                                        <?php
                                            $dept = $user['dept'];
                                            if ($dept == "HRD") {
                                                $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama")->result_array();
                                            }else{
                                                $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' AND dept = '$dept' ORDER BY nama")->result_array();
                                            }
                                            
                                        ?>
                                        <?php foreach ($queryShift as $dk) : ?>
                                            <option value="<?= $dk['no_scan'] ?>" <?php if ($dk['no_scan'] == set_value('no_scan')) {
                                                echo "SELECTED";
                                            } ?>><?= $dk['no_scan'].' - '.$dk['nama']. ' ('.$dk['dept'].')'; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Surat Peringatan ke-</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control input-sm" name="sp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Alasan</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="alasan"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('career_adm/discipline'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>