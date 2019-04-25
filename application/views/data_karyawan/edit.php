<script type="text/javascript">
    function _sk() {
        var statuskaryawan = document.getElementById('sk').value;
        // console.log(statuskaryawan);
        if (statuskaryawan == "Kontrak1" || statuskaryawan == "Kontrak2") {
            $('#tgltetap').attr('readonly', true);
            $('#tglkontrak1').removeAttr("readonly");
            $('#durasi').removeAttr("readonly");
            $('#tglkontrak2').removeAttr("readonly");
        } else {
            $('#tgltetap').removeAttr("readonly");
            $('#tglkontrak1').attr('readonly', true);
            $('#durasi').attr('readonly', true);
            $('#tglkontrak2').attr('readonly', true);
        }
    }

    function _durasi() {
        var duration = document.getElementById('durasi').value;
        console.log(duration);
    }
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee data </a><i class="fa fa-angle-right"></i> Form Employee</h4>
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('data_karyawan/addEmployed/') . $user['name']; ?>" method="post">
                            <p><?= $this->session->flashdata('message'); ?></p>
                            <p>
                                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                    <span style="font-size: 16px; padding: 0 10px; color: black;">
                                        <b>* Personal Information</b>
                                    </span>
                                </div>
                                <br>
                            </p>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->no_ktp; ?>" id="no_ktp" name="no_ktp" type="number" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor SCAN (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->no_scan; ?>" id="no_scan" name="no_scan" type="number" readonly>
                                    <?= form_error('no_scan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nama Sesuai KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input onkeyup="this.value = this.value.toUpperCase();" class="form-control input-sm" value="<?= $makar->nama; ?>" id="nama" name="nama" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tempat Lahir (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->tempat_lahir; ?>" id="tempat_lahir" name="tempat_lahir" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Lahir (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->tgl_lahir; ?>" id="tgl_lahir" name="tgl_lahir" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Alamat KTP (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->alamat_ktp; ?>" id="alamat_ktp" name="alamat_ktp" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Alamat Domisili (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->alamat_domisili; ?>" id="alamat_domisili" name="alamat_domisili" type="text">
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
                                            <option value="<?= $dr['kabupaten'] ?>" <?php if ($dr['kabupaten'] == $makar->kabupaten_domisili) {
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
                                            <option value="<?= $dr['kecamatan'] ?>" <?php if ($dr['kecamatan'] == $makar->kecamatan_domisili) {
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
                                        <option value="<?= $dr['religion'] ?>" <?php if ($dr['religion'] == $makar->agama) {
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
                                        <option value="<?= $djk['id'] ?>" <?php if ($djk['id'] == $makar->jenis_kelamin) {
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
                                            <option value="<?= $dr['status_kel'] ?>" <?php if ($dr['status_kel'] == $makar->status_kel) {
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
                                            <option value="<?= $dp['pendidikan'] ?>" <?php if ($dp['pendidikan'] == $makar->pendidikan) {
                                                                                echo "SELECTED";
                                                                            } ?>><?= $dp['pendidikan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Jurusan</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->jurusan; ?>" id="jurusan" name="jurusan" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">IPK</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->ipk; ?>" id="ipk" name="ipk" type="text">
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
                                            <option value="<?= $dg['gol_darah'] ?>" <?php if ($dg['gol_darah'] == $makar->gol_darah) {
                                                                                echo "SELECTED";
                                                                            } ?>><?= $dg['gol_darah'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Email Pribadi</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->email_pribadi; ?>" id="email_pribadi" name="email_pribadi" type="text">
                                    <?= form_error('email_pribadi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor Handphone (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->no_hp; ?>" id="no_hp" name="no_hp" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Pengalaman Kerja</label>
                                <div class="col-lg-10">
                                    <textarea name="pengalaman_kerja" class="form-control input-sm"><?= $makar->pengalaman_kerja; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Keterampilan Khusus</label>
                                <div class="col-lg-10">
                                    <textarea name="keterampilan_khusus" class="form-control input-sm"><?= $makar->keterampilan_khusus; ?></textarea>
                                </div>
                            </div>
                            <p>
                                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                    <span style="font-size: 16px; padding: 0 10px; color: black;">
                                        <b>* Employee Information</b>
                                    </span>
                                </div>
                                <br>
                            </p>
                            <!-- ---------------------------------------------------------------------------------------------------------- -->
                            <!-- ---------------------------------------------------------------------------------------------------------- -->
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Masuk (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->tgl_masuk; ?>" id="tgl_masuk" name="tgl_masuk" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Status Karyawan (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="status_karyawan" id="sk" onChange="_sk();" required>
                                        <?php
                                            $queryStatus = $this->db->get('status')->result_array();
                                        ?>
                                        <option value="" disabled selected>Status Karyawan</option>
                                        <?php foreach ($queryStatus as $ds) : ?>
                                            <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == $makar->status_karyawan) {
                                            echo "SELECTED";
                                            } ?>><?= $ds['jabatan'] . ' - ' . $ds['id'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Tetap (Wajib bila tetap)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->tgl_tetap; ?>" id="tgltetap" name="tgl_tetap" type="date">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tanggal Kontrak 1</label>
                                <div class="col-lg-3">
                                    <input class="form-control input-sm" id="tglkontrak1" value="<?php if($historiKontrak->id != 0){ echo $historiKontrak->kontrak1; } ?>" name="tgl_kontrak1" type="date">
                                </div>
                                <div class="col-lg-1">
                                    <input class="form-control input-sm" id="durasi" value="<?php if($historiKontrak->id != 0){ echo $historiKontrak->durasi; } ?>" ontextchanged="_durasi();" placeholder="Durasi.." name="durasi" type="number">Bulan
                                </div>
                                <div class="col-lg-3">
                                    <input class="form-control input-sm" id="tglkontrak2" value="<?php if($historiKontrak->id != 0){ echo $historiKontrak->kontrak2; } ?>" name="tgl_kontrak2" type="date">
                                </div>
                                <div class="col-lg-2">
                                    <label class="control-label">Tanggal Kontrak 2</label>
                                </div>
                            </div>
                            
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Golongan (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="golongan" required>
                                        <?php
                                            $queryGolongan = $this->db->get('golongan')->result_array();
                                        ?>
                                        <option value="" disabled selected>Golongan</option>
                                        <?php foreach ($queryGolongan as $dg) : ?>
                                            <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == $makar->golongan) {
                                            echo "SELECTED";
                                            } ?>><?= $dg['golongan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Jabatan (Wajib)</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->jabatan; ?>" id="jabatan" name="jabatan" type="text" placeholder="Jabatan...">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Department (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="dept" required>
                                        <?php
                                            $queryDept = $this->db->get('dept')->result_array();
                                        ?>
                                        <option value="" disabled selected>Select Departments</option>
                                        <?php foreach ($queryDept as $dd) : ?>
                                            <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == $makar->dept) {
                                            echo "SELECTED";
                                            } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Bagian (Wajib)</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="bagian" required>
                                        <?php
                                            $queryDept = $this->db->query('select * from departments group by bagian')->result_array();
                                        ?>
                                        <option value="" disabled selected>Select Bagian</option>
                                        <?php foreach ($queryDept as $db) : ?>
                                            <option value="<?= $db['bagian']; ?>" <?php if ($db['bagian'] == $makar->bagian) {
                                            echo "SELECTED";
                                            } ?>><?= $db['bagian'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Atasan 1</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->atasan1; ?>" id="atasan1" name="atasan1" type="text" placeholder="<<optional>>">
                                </div>
                                <div class="col-lg-2">
                                    <label class="control-label col-lg-12">Atasan 2</label>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->atasan2; ?>" id="atasan2" name="atasan2" type="text" placeholder="<<optional>>">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor BPJS Tenaga Kerja</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->no_bpjs_tk; ?>" id="no_bpjs_tk" name="no_bpjs_tk" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Nomor BPJS Kesehatan</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $makar->no_bpjs_kes; ?>" id="no_bpjs_kes" name="no_bpjs_kes" type="text">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Status Aktif</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm" name="status_aktif" required>
                                        <option value="" disabled selected>Status Aktif</option>
                                        <option value="1" <?php if (1 == $makar->status_aktif) { echo "SELECTED";} ?>>Aktif</option>
                                        <option value="0" <?php if (0 == $makar->status_aktif) { echo "SELECTED";} ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Tgl Resign</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?php if ($makar->tgl_resign == 0) { echo " "; } else {echo date(' d F  Y', $makar->tgl_resign);}?>" id="tgl_resign" name="tgl_resign" type="text" disabled>
                                </div>
                            </div>
                            <p>
                                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                    <span style="font-size: 16px; padding: 0 10px; color: black;">
                                        <b>* Additional Info (Wajib lapor tenaga kerja)</b>
                                    </span>
                                </div>
                                <br>
                            </p>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kode Jabatan</label>
                                <div class="col-lg-10">
                                    <select class="form-control chosen-select" data-placeholder="Choose a Country..." tabindex="2" name="kode_jabatan">
                                        <?php
                                            $queryAdditional = $this->db->get('additional_info')->result_array();
                                        ?>
                                        <option value="" disabled selected>Kode Jabatan</option>
                                        <?php foreach ($queryAdditional as $da) : ?>
                                            <option value="<?= $da['kode']; ?>" <?php if ($da['kode'] == $makar->kode_jabatan) {
                                            echo "SELECTED";
                                            } ?>><?= $da['kode'] .' - '. $da['jabatan']; ?></option>
                                        <?php endforeach; ?>
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
            </div>
        </div>
    </section>
</section>