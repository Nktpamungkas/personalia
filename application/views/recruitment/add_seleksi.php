<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Tambah Permohonan</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                    <form class="form-horizontal style-form" method="POST" action="<?= base_url('recruitment/proses_seleksi'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">No. FPTK</label>
                            <div class="col-sm-10">
                                <select class='form-control input-sm select2' tabindex='2' name='no_fptk' required>
                                    <option value='' disabled selected></option>
                                    <?php  
                                        $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT *, RIGHT ( NO, 2 ) AS thn FROM recruitment_permohonan ORDER BY thn DESC, `no` DESC")->result_array(); 
                                    ?>
                                    <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['no'] ?>' <?php if ($dk['no'] == set_value('no')) { echo 'SELECTED';} ?>>
                                            <?= $dk['no']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Panggil</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_panggil" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tgl Lahir </label>
                            <div class="col-sm-4">
                                <input type="date" name="tgl_lahir" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Pendidikan </label>
                            <div class="col-sm-4">
                                <select class='form-control input-sm' tabindex='2' name='pendidikan' required>
                                    <option value='' disabled selected></option>
                                    <?php  
                                        $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT * FROM pendidikan")->result_array(); 
                                    ?>
                                    <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['pendidikan'] ?>' <?php if ($dk['pendidikan'] == set_value('pendidikan')) { echo 'SELECTED';} ?>>
                                            <?= $dk['pendidikan']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jurusan </label>
                            <div class="col-sm-4">
                                <input type="text" name="jurusan" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Departemen</label>
                            <div class="col-sm-4">
                                <select class='form-control input-sm' tabindex='2' name='dept' required>
                                    <option value='' disabled selected></option>
                                    <?php  
                                        $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT * FROM dept")->result_array(); 
                                    ?>
                                    <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['code'] ?>' <?php if ($dk['code'] == set_value('code')) { echo 'SELECTED';} ?>>
                                            <?= $dk['code'].' - '.$dk['dept_name']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Sumber </label>
                            <div class="col-sm-4">
                                <input type="text" name="sumber" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">No Handphone </label>
                            <div class="col-sm-4">
                                <input type="number" name="no_hp" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Level</label>
                            <div class="col-sm-4">
                                <select class='form-control input-sm' tabindex='2' name='level' required>
                                    <option value='' disabled selected></option>
                                    <?php  
                                        $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT * FROM golongan")->result_array(); 
                                    ?>
                                    <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['golongan'] ?>' <?php if ($dk['golongan'] == set_value('golongan')) { echo 'SELECTED';} ?>>
                                            <?= $dk['golongan']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Jabatan dilamar </label>
                            <div class="col-sm-4">
                                <input type="text" name="jabatan_dilamar" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Int HRD </label>
                            <div class="col-sm-4">
                                <input type="date" name="int_hrd" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Hint HRD </label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="hint_hrd">
                                    <option value=""></option>
                                    <option value="ok">OK</option>
                                    <option value="not ok">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Psikotes </label>
                            <div class="col-sm-4">
                                <input type="date" name="psikotes" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Hasil Psikotes </label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="hpsikotes">
                                    <option value=""></option>
                                    <option value="ok">OK</option>
                                    <option value="not ok">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tes Lap </label>
                            <div class="col-sm-4">
                                <input type="date" name="tes_lap" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Hasil Tes Lap </label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="htes_lap">
                                    <option value=""></option>
                                    <option value="ok">OK</option>
                                    <option value="not ok">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Interview User </label>
                            <div class="col-sm-4">
                                <input type="date" name="int_user" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Hasil Interview User </label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="hint_user">
                                    <option value=""></option>
                                    <option value="ok">OK</option>
                                    <option value="not ok">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Offering</label>
                            <div class="col-sm-4">
                                <input type="date" name="offering" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Hasil Offering</label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="hoffering">
                                    <option value=""></option>
                                    <option value="ok">OK</option>
                                    <option value="not ok">NOT OK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Join</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_join" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Evaluasi</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_evaluasi" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="ket" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                <a href="<?= base_url('recruitment/index_seleksi'); ?>" class="btn btn-theme04">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>