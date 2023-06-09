<script type="text/javascript">
    function _sk() {
        var statuskaryawan = document.getElementById('sk').value;
        // console.log(statuskaryawan);
        if (statuskaryawan == "Kontrak1" || statuskaryawan == "Kontrak2" || statuskaryawan == "Resigned") {
            $('#tgltetap').attr('readonly', true);
            $('#kontrak_awal').removeAttr("readonly");
            $('#kontrak_akhir').removeAttr("readonly");
        } else {
            $('#tgltetap').removeAttr("readonly");
            $('#kontrak_awal').attr('readonly', true);
            $('#kontrak_akhir').attr('readonly', true);
        }
    }
    function tambahDataKeluarga() {
        var idf = document.getElementById("idf").value;
        var stre = "<tr id='srow" + idf + "'><td><input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga'></td><td><input type='text' name='hubungan_keluarga[]' class='form-control input-sm' placeholder='Hubungan Keluarga'></td><td><input type='text' name='tempat[]' class='form-control input-sm' placeholder='Tempat'><input type='date' name='tgl_lahir_keluarga[]' class='form-control input-sm'></td><td><input type='text' name='pekerjaan[]' class='form-control input-sm'></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></td></tr>";

        $("#divSite").append(stre);
        idf = (idf - 1) + 2;
        
        document.getElementById("idf").value = idf;

        $('.select2').select2()
    }

    function hapusElemen(idf) {
        $(idf).remove();
    }

    function tambahPengalamanKerja() {
        var idf_pk = document.getElementById("idf_pk").value;
        var stre_pk = "<tr id='srow" + idf_pk + "'><td><input type='text' name='nama_perusahaan[]' class='form-control input-sm'></td><td><input type='text' name='dept_perusahaan[]' class='form-control input-sm'></td><td><input type='text' name='jabatan_perusahaan[]' class='form-control input-sm'></td><td><input type='text' name='masa_kerja_perusahaan[]' class='form-control input-sm'></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf_pk + "\"); return false;'>Hapus</a></td></tr>";

        $("#divSite_pk").append(stre_pk);
        idf_pk = (idf_pk - 1) + 2;
        
        document.getElementById("idf_pk").value = idf_pk;

        $('.select2').select2()
    }

    function hapusElemen(idf_pk) {
        $(idf_pk).remove();
    }
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee data </a><i class="fa fa-angle-right"></i> Form Edit Employee</h4>
                <div class="form-panel">
                    <div class=" form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('data_karyawan/edit/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Nomor KTP <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->no_ktp; ?>" id="no_ktp" name="no_ktp" type="number">
                                </div>
                                <label class="control-label col-lg-2">Nomor SCAN <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->no_scan; ?>" id="no_scan" name="no_scan" type="number" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input onkeyup="this.value = this.value.toUpperCase();" class="form-control input-sm" value="<?= $makar->nama; ?>" id="nama" name="nama" type="text">
                                </div>
                                <label class="control-label col-lg-2">Tempat Lahir <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->tempat_lahir; ?>" id="tempat_lahir" name="tempat_lahir" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Tanggal Lahir <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->tgl_lahir; ?>" id="tgl_lahir" name="tgl_lahir" type="date">
                                </div>
                                <label class="control-label col-lg-2">Alamat KTP <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->alamat_ktp; ?>" id="alamat_ktp" name="alamat_ktp" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Alamat Domisili <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->alamat_domisili; ?>" id="alamat_domisili" name="alamat_domisili" type="text">
                                </div>
                                <label class="control-label col-lg-2">Kab/Kot Domisili <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm select2" data-placeholder="Choose a Country..." tabindex="2" name="kabupaten_domisili" required>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Kecamatan Domisili <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm select2" data-placeholder="Choose a Country..." tabindex="2" name="kecamatan_domisili" required>
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
                                </div>
                                <label class="control-label col-lg-2">Agama <span style="color: red">(*)</span><br> &nbsp;</label>
                                <div class="col-lg-4">
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
                            <div class="form-group">
                                <label class="control-label col-lg-2">Kode Pos <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->kode_pos; ?>" name="kode_pos" type="text">
                                </div>
                                <label class="control-label col-lg-2">Status Rumah <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control input-sm select2" tabindex="2" name="status_rumah">
                                        <option value="" disabled selected>Select</option>
                                        <option value="Sendiri" <?php if($makar->status_rumah == "Sendiri" ) { echo "selected"; } ?>>Sendiri</option>
                                        <option value="Kontrak" <?php if($makar->status_rumah == "Kontrak" ) { echo "selected"; } ?>>Kontrak</option>
                                        <option value="Dgn. Orang Tua" <?php if($makar->status_rumah == "Dgn. Orang Tua" ) { echo "selected"; } ?>>Dgn. Orang Tua</option>
                                        <option value="Dgn. Saudara" <?php if($makar->status_rumah == "Dgn. Saudara" ) { echo "selected"; } ?>>Dgn. Saudara</option>

                                    </select>
                                    <?= form_error('kabupaten_domisili', '<h5 class="text-danger pl-3">', '</h5>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Jenis Kelamin <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
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
                                <label class="control-label col-lg-2">Status Keluarga</label>
                                <div class="col-lg-4">
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
                            <div class="form-group">
                                <label class="control-label col-lg-2">Pendidikan Terakhir <span style="color: red">(*)</span></label>
                                <div class="col-lg-2">
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
                                <div class="col-lg-2">
                                    <input class="form-control input-sm" value="<?= $makar->nama_sekolah ?>" name="nama_sekolah" type="text" placeholder="Nama Sekolah" required>
                                </div>
                                <label class="control-label col-lg-2">Jurusan <br> &nbsp;</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->jurusan; ?>" id="jurusan" name="jurusan" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">IPK</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->ipk; ?>" id="ipk" name="ipk" type="text">
                                </div>
                                <label class="control-label col-lg-2">Gol Darah</label>
                                <div class="col-lg-4">
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
                            <div class="form-group">
                                <label class="control-label col-lg-2">Email Pribadi</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->email_pribadi; ?>" id="email_pribadi" name="email_pribadi" type="text">
                                    <?= form_error('email_pribadi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label class="control-label col-lg-2">Nomor Handphone <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $makar->no_hp; ?>" id="no_hp" name="no_hp" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Pengalaman Kerja</label>
                                <div class="col-lg-4">
                                    <textarea name="pengalaman_kerja" class="form-control input-sm"><?= $makar->pengalaman_kerja; ?></textarea>
                                </div>
                                <label class="control-label col-lg-2">Keterampilan Khusus</label>
                                <div class="col-lg-4">
                                    <textarea name="keterampilan_khusus" class="form-control input-sm"><?= $makar->keterampilan_khusus; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <p>
                                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                        <span style="font-size: 16px; padding: 0 10px; color: black;">
                                            <b>* Data Keluarga</b>
                                        </span>
                                    </div>
                                    <br>
                                </p>
                            </div>
                            <div class="adv-table">
                                <input id="idf" value="1" type="hidden">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Hubungan</th>
                                            <th>Tempat / Tgl Lahir</th>
                                            <th>Pekerjaan</th>
                                            <th>Option </th>
                                        </tr>
                                    </thead>
                                    <tbody id="divSite">
                                        <?php 
                                            $query = $this->db->query("SELECT * FROM data_keluarga WHERE no_scan='$no_scan'")->result_array(); 
                                        ?>
                                        <?php foreach($query AS $result) : ?>
                                            <input type='hidden' name='id_keluarga_edit[]' value="<?= $result['id'] ?>">
                                            <tr>
                                                <td><input type='text' name='nama_keluarga_edit[]' class='form-control input-sm' placeholder='Nama Keluarga' value="<?= $result['nama'] ?>"></td>
                                                <td><input type='text' name='hubungan_keluarga_edit[]' class='form-control input-sm' placeholder='Hubungan Keluarga' value="<?= $result['hubungan'] ?>"></td>
                                                <td><input type='text' name='tempat_edit[]' class='form-control input-sm' placeholder='Tempat' value="<?= $result['tempat'] ?>">
                                                    <input type='date' name='tgl_lahir_keluarga_edit[]' class='form-control input-sm' value="<?= $result['tgl_lahir'] ?>"></td>
                                                <td><input type='text' name='pekerjaan_edit[]' class='form-control input-sm' value="<?= $result['pekerjaan'] ?>"></td>
                                                <td>
                                                    <center>
                                                        <a href="<?= base_url(); ?>Data_karyawan/delete_data_keluarga/<?= $result['id']; ?>">
                                                            <i class="fa fa-times" style="color: red;"></i>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <center>
                                    <button type="button" class="btn btn-default btn-xs" onclick="tambahDataKeluarga(); return false;"><i class="fa fa-plus"></i></button>
                                </center>
                            </div>
                            <div class="form-group col-md-12">
                                <p>
                                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                        <span style="font-size: 16px; padding: 0 10px; color: black;">
                                            <b>* Data Pengalaman Kerja</b>
                                        </span>
                                    </div>
                                    <br>
                                </p>
                            </div>
                            <div class="adv-table">
                                <input id="idf_pk" value="1" type="hidden">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Perusahaan</th>
                                            <th>Bagian/Departemen</th>
                                            <th>Jabatan</th>
                                            <th>Masa Kerja</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody id="divSite_pk">
                                        <?php 
                                            $query = $this->db->query("SELECT * FROM data_pengalaman_kerja WHERE no_scan = '$no_scan'")->result_array(); 
                                        ?>
                                        <?php foreach($query AS $key) : ?>
                                            <input type='hidden' name='id_pengalaman_edit[]' value="<?= $key['id'] ?>">
                                            <tr>
                                                <td><input type='text' name='nama_perusahaan_edit[]' class='form-control input-sm' value="<?= $key['nama_perusahaan']; ?>"></td>
                                                <td><input type='text' name='dept_perusahaan_edit[]' class='form-control input-sm' value="<?= $key['bagian']; ?>"></td>
                                                <td><input type='text' name='jabatan_perusahaan_edit[]' class='form-control input-sm' value="<?= $key['jabatan']; ?>"></td>.
                                                <td><input type='text' name='masa_kerja_perusahaan_edit[]' class='form-control input-sm' value="<?= $key['masa_kerja']; ?>"></td>
                                                <td>
                                                    <center>
                                                        <a href="<?= base_url(); ?>Data_karyawan/delete_data_pengalaman_kerja/<?= $key['id']; ?>">
                                                            <i class="fa fa-times" style="color: red;"></i>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <center>
                                    <button type="button" class="btn btn-default btn-xs" onclick="tambahPengalamanKerja(); return false;"><i class="fa fa-plus"></i></button>
                                </center>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10">
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
</section> s 