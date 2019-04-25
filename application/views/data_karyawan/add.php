<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee data </a><i class="fa fa-angle-right"></i> Form Employee</h4>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('data_karyawan/add/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('no_ktp'); ?>" id="no_ktp" name="no_ktp" type="number" autofocus>
                                    <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor SCAN (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('no_scan'); ?>" id="no_scan" name="no_scan" type="number">
                                    <?= form_error('no_scan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nama Sesuai KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input onkeyup="this.value = this.value.toUpperCase();" class="form-control input-sm" value="<?= set_value('nama'); ?>" id="nama" name="nama" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tempat Lahir (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('tempat_lahir'); ?>" id="tempat_lahir" name="tempat_lahir" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Lahir (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('tgl_lahir'); ?>" id="tgl_lahir" name="tgl_lahir" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Alamat KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('alamat_ktp'); ?>" id="alamat_ktp" name="alamat_ktp" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Alamat Domisili (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('alamat_domisili'); ?>" id="alamat_domisili" name="alamat_domisili" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kab/Kot Domisili (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="kabupaten_domisili">
                                        <option value="" disabled selected>Select kab/Kot (domisili)</option>
                                        <?php
                                            $queryReligion = $this->db->query('SELECT * FROM `kec_kab_pro` WHERE provinsi="Banten" OR provinsi="Jawa Barat"')->result_array();
                                        ?>
                                        <?php foreach ($queryReligion as $dr) : ?>
                                            <option value="<?= $dr['kabupaten'] ?>" <?php if ($dr['kabupaten'] == set_value('kabupaten_domisili')) {
                                                echo "SELECTED";
                                            } ?>><?= $dr['kabupaten'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kabupaten_domisili', '<h5 class="text-danger pl-3">', '</h5>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kecamatan Domisili (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="kecamatan_domisili">
                                        <option value="" disabled selected>Select kecamatan (domisili)</option>
                                        <?php
                                            $queryReligion = $this->db->query('SELECT * FROM `kec_kab_pro` WHERE provinsi="Banten" OR provinsi="Jawa Barat"')->result_array();
                                        ?>
                                        <?php foreach ($queryReligion as $dr) : ?>
                                            <option value="<?= $dr['kecamatan'] ?>" <?php if ($dr['kecamatan'] == set_value('kecamatan_domisili')) {
                                                echo "SELECTED";
                                            } ?>><?= $dr['kecamatan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?= form_error('kecamatan_domisili', '<h5 class="text-danger pl-3">', '</h5>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Agama (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="agama" required>
                                        <option value="" disabled selected>Select Religion</option>
                                        <?php
                                            $queryReligion = $this->db->get('religion')->result_array();
                                        ?>
                                        <?php foreach ($queryReligion as $dr) : ?>
                                            <option value="<?= $dr['religion'] ?>" <?php if ($dr['religion'] == set_value('agama')) {
                                                echo "SELECTED";
                                            } ?>><?= $dr['religion'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Jenis Kelamin (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="jenis_kelamin" required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <?php
                                            $queryJenisKelamin = $this->db->get('jenis_kelamin')->result_array();
                                        ?>
                                        <?php foreach ($queryJenisKelamin as $djk) : ?>
                                            <option value="<?= $djk['id'] ?>" <?php if ($djk['id'] == set_value('jenis_kelamin')) {
                                                echo "SELECTED";
                                            } ?>><?= $djk['jenis_kelamin'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Status Keluarga</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="status_kel" required>
                                        <option value="" disabled selected>Select status keluarga</option>
                                        <?php
                                            $queryReligion = $this->db->get('status_kel')->result_array();
                                        ?>
                                        <?php foreach ($queryReligion as $dr) : ?>
                                            <option value="<?= $dr['status_kel'] ?>" <?php if ($dr['status_kel'] == set_value('status_kel')) {
                                                echo "SELECTED";
                                            } ?>><?= $dr['status_kel'] ?></option>
                                        <?php endforeach ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Pendidikan Terakhir (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="pendidikan" required>
                                        <option value="" disabled selected>Select Pendidikan</option>
                                        <?php
                                            $queryPendidikan = $this->db->get('pendidikan')->result_array();
                                        ?>
                                        <?php foreach ($queryPendidikan as $dp) : ?>
                                            <option value="<?= $dp['pendidikan'] ?>" <?php if ($dp['pendidikan'] == set_value('pendidikan')) {
                                                echo "SELECTED";
                                            } ?>><?= $dp['pendidikan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Jurusan</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('jurusan'); ?>" id="jurusan" name="jurusan" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">IPK</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('ipk'); ?>" id="ipk" name="ipk" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Gol Darah</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="gol_darah" required>
                                        <option value="" disabled selected>Select golongan darah</option>
                                        <?php
                                            $queryGoldar = $this->db->get('gol_darah')->result_array();
                                        ?>
                                        <?php foreach ($queryGoldar as $dg) : ?>
                                            <option value="<?= $dg['gol_darah'] ?>" <?php if ($dg['gol_darah'] == set_value('gol_darah')) {
                                                echo "SELECTED";
                                            } ?>><?= $dg['gol_darah'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Email Pribadi</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('email_pribadi'); ?>" name="email_pribadi" type="text">
                                    <?= form_error('email_pribadi', '<h5 class="text-danger pl-3">', '</h5>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor Handphone (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= set_value('no_hp'); ?>" id="no_hp" name="no_hp" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Pengalaman Kerja</label>
                                <div class="col-lg-10">
                                    <textarea name="pengalaman_kerja" class="form-control input-sm"><?= set_value('pengalaman_kerja'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Keterampilan Khusus</label>
                                <div class="col-lg-10">
                                    <textarea name="keterampilan_khusus" class="form-control input-sm"><?= set_value('keterampilan_khusus'); ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                <?= form_error('kabupaten_domisili', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
                                <?= form_error('kecamatan_domisili', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
                                <?= form_error('email_pribadi', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
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