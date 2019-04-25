<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('training_report'); ?>"> Training Report </a><i class="fa fa-angle-right"></i> Form Training</h4>
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('training_report/edit/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">No Scan & Nama Peserta</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="no_scan" required>
                                        <option value="" disabled selected>Select No Scan & Nama Peserta</option>
                                        <?php
                                        $queryNoScan = $this->db->get('tbl_makar')->result_array();
                                        ?>
                                        <?php foreach ($queryNoScan as $dnc) : ?>
                                        <option value="<?= $dnc['no_scan'] ?>" <?php if ($dnc['no_scan'] == $training->no_scan) {
                                                                                    echo "SELECTED";
                                                                                } ?>><?= $dnc['no_scan'] . ' - ' . $dnc['nama'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <input value="<?= $training->id; ?>" name="id" type="hidden">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Materi Training</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="kode_training" required>
                                        <option value="" disabled selected>Select Materi Training</option>
                                        <?php
                                        $queryNoScan = $this->db->get('materi_training')->result_array();
                                        ?>
                                        <?php foreach ($queryNoScan as $dnc) : ?>
                                        <option value="<?= $dnc['kode'] ?>" <?php if ($dnc['materi_training'] == $training->materi_training) {
                                                                                            echo "SELECTED";
                                                                                        } ?>><?= $dnc['materi_training']. ' - (Jenis Training) ' . $dnc['jenis_training']. ', (Penyelenggara) ' . $dnc['penyelenggara']. ', (Tempat) ' . $dnc['tempat']. ', (Sertifikat)' . $dnc['sertifikat']   ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group ">
                                <label class="control-label col-lg-2">Penyelenggara</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="penyelenggara" required>
                                        <option value="" disabled selected>Select Penyelenggara</option>
                                        <?php
                                        $queryDept = $this->db->get('dept')->result_array();
                                        ?>
                                        <?php foreach ($queryDept as $dd) : ?>
                                        <option value="<?= $dd['code'] ?>" <?php if ($dd['code'] == $training->penyelenggara) {
                                                                                echo "SELECTED";
                                                                            } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Training</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $training->tgl_training; ?>" name="tgl_training" type="date">
                                </div>
                            </div>
                            <!-- <div class="form-group ">
                                <label class="control-label col-lg-2">Tempat</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $training->tempat;  ?>" name="tempat" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Sertifikat</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="sertifikat" required>
                                        <option value="" disabled selected>Select Sertifikat</option>
                                        <?php
                                        $querySertifikat = $this->db->get('sertifikat')->result_array();
                                        ?>
                                        <?php foreach ($querySertifikat as $ds) : ?>
                                        <option value="<?= $ds['sertifikat'] ?>" <?php if ($ds['sertifikat'] == $training->sertifikat) {
                                                                                        echo "SELECTED";
                                                                                    } ?>><?= $ds['sertifikat'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-theme" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('training_report'); ?>" class="btn btn-theme04">Cancel</a>
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