<section id="main-content">
    <section class="wrapper">
    <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="<?= base_url('career_adm/transision'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> <span>Kembali..</span></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="modal-content">
                    <?php
                        $noscan    = $no_scan;
                        $data   = $this->db->query("SELECT * FROM career_transition WHERE no_scan = '$noscan'")->row();
                    ?>
                    <form role="form" action="<?= base_url(); ?>Career_adm/proses_EditCareerTransition" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Career Transition </h4>
                            <input value="<?= $data->id; ?>" name="id" hidden type="text">
                        </div>
                        <div class="modal-body" style="border-radius: 5px; background-color: #F5FFFA; padding: 20px;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                No Scan
                                            </span>
                                            <select name="no_scan" style='width: 1000px;' class="form-control input-sm select2" required>
                                                <option value="" disabled selected>No scan</option>
                                                <?php
                                                    error_reporting(0);
                                                    $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                                ?>
                                                <?php foreach ($makar as $dMakar) : ?>
                                                    <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == $data->no_scan) {
                                                        echo "SELECTED";
                                                    } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Proses
                                            </span>
                                            <select name="proses" style='width: 1000px;' class="form-control input-sm select2" required>
                                                <option value="" disabled selected>Proses</option>
                                                <option value="mutasi" <?php if ("mutasi" == $data->proses) { echo "SELECTED";} ?>>Mutasi</option>
                                                <option value="rotasi" <?php if ("rotasi" == $data->proses) { echo "SELECTED";} ?>>Rotasi</option>
                                                <option value="promosi" <?php if ("promosi" == $data->proses) { echo "SELECTED";} ?>>Promosi</option>
                                                <option value="demosi" <?php if ("demosi" == $data->proses) { echo "SELECTED";} ?>>Demosi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Tanggal Efektif
                                            </span>
                                            <input style='width: 1000px;' class="form-control input-sm" value="<?= $data->tgl_efektif; ?>" name="tgl_efektif" placeholder="" type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Departemen Lama
                                            </span>
                                            <select style='width: 1000px;' class="form-control input-sm select2" data-placeholder="Pilih Satu Depatemen" name="dept_lama" required>
                                                <?php error_reporting(0); $queryDept = $this->db->get('dept')->result_array();?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryDept as $dd) : ?>
                                                    <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == $data->dept_lama) { echo "SELECTED"; } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Departemen Baru
                                            </span>
                                            <select style='width: 1000px;' class="form-control input-sm select2" data-placeholder="Pilih Satu Depatemen" name="dept_baru" required>
                                                <?php error_reporting(0); $queryDept = $this->db->get('dept')->result_array();?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryDept as $dd) : ?>
                                                    <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == $data->dept_baru) { echo "SELECTED"; } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Bagian Lama
                                            </span>
                                            <?php error_reporting(0); ?>
                                            <input type="text" style='width: 1000px;' class="form-control input-sm" placeholder="Bagian Lama" value="<?= $data->bagian_lama; ?>" name="bagian_lama" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Bagian Baru
                                            </span>
                                            <input type="text" style='width: 1000px;' class="form-control input-sm" placeholder="Bagian Baru" value="<?= $data->bagian_baru; ?>" name="bagian_baru" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Golongan Lama
                                            </span>
                                            <select class="form-control input-sm select2" style='width: 1000px;' data-placeholder="Pilih Satu Golongan" name="golongan_lama" required>
                                                <?php error_reporting(0); $queryGolongan = $this->db->get('golongan')->result_array(); ?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryGolongan as $dg) : ?>
                                                    <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == $data->golongan_lama) { echo "SELECTED"; } ?>><?= $dg['golongan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Golongan Baru
                                            </span>
                                            <select class="form-control input-sm select2" style='width: 1000px;' data-placeholder="Pilih Satu Golongan" name="golongan_baru" required>
                                                <?php error_reporting(0); $queryGolongan = $this->db->get('golongan')->result_array(); ?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryGolongan as $dg) : ?>
                                                    <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == $data->golongan_baru) { echo "SELECTED"; } ?>><?= $dg['golongan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Jabatan Lama
                                            </span>
                                            <select class="form-control input-sm select2" style='width: 1000px;' data-placeholder="Pilih Satu Jabatan" name="jabatan_lama" required>
                                                <?php error_reporting(0); $queryGolongan = $this->db->get('jabatan')->result_array(); ?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryGolongan as $dg) : ?>
                                                    <option value="<?= $dg['jabatan']; ?>" <?php if ($dg['jabatan'] == $data->jabatan_lama) { echo "SELECTED"; } ?>><?= $dg['jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg" style="margin-top: 5px;">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="sepreated" style='width: 200px;'>
                                                Jabatan Baru
                                            </span>
                                            <select class="form-control input-sm select2" style='width: 1000px;' data-placeholder="Pilih Satu Jabatan" name="jabatan_baru" required>
                                                <?php error_reporting(0); $queryGolongan = $this->db->get('jabatan')->result_array(); ?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryGolongan as $dg) : ?>
                                                    <option value="<?= $dg['jabatan']; ?>" <?php if ($dg['jabatan'] == $data->jabatan_baru) { echo "SELECTED"; } ?>><?= $dg['jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="title" style="color: red">Informasi</h4>
                            <ol>
                                <!-- <li>-<span style="color: red;">-</span>.</li> -->
                                <li>Dengan mengisi form career transition, data karyawan yang bersangkutan otomatis akan otomatis berubah di menu Employee Information.</li>
                                <li>Pastikan seluruh data sudah terisi dengan benar.</li>
                            </ol=>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>