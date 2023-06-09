<script language="javascript">
    function tambahDataKeluarga() {
        var idf = document.getElementById("idf").value;
        var stre = "<tr id='srow" + idf + "'><td><label><input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga'></label></td><td><label><input type='text' name='hubungan_keluarga[]' class='form-control input-sm' placeholder='Hubungan Keluarga'></label></td><td><label><input type='text' name='tempat[]' class='form-control input-sm' placeholder='Tempat Lahir'></label></td><td><label><input type='date' name='tgl_lahir_keluarga[]' class='form-control input-sm'></label></td><td><label><input type='text' name='pekerjaan[]' class='form-control input-sm'></label></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></td></tr>";

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
</script>
<style type="text/css">
    .form-style-4{
        font-size: 10px;
    }
    .form-style-4 input[type=submit],
    .form-style-4 input[type=button],
    .form-style-4 input[type=text],
    .form-style-4 input[type=email],
    .form-style-4 textarea,
    .form-style-4 label
    {
        font-family: Georgia, "Times New Roman", Times, serif;
        font-size: 12px;
        color: #000;

    }
    .form-style-4 label {
        display:block;
        margin-bottom: 10px;
    }
    .form-style-4 label > span{
        display: inline-block;
        float: left;
        width: 100%;
    }
    .form-style-4 input[type=text],
    .form-style-4 input[type=date],
    .form-style-4 input[type=number],
    .form-style-4 input[type=email] 
    {
        background: transparent;
        border: none;
        border-bottom: 1px dashed #000;
        width: 200px;
        outline: none;
        padding: 0px 0px 0px 0px;
        font-style: italic;
    }
    .form-style-4 textarea{
        font-style: italic;
        padding: 0px 0px 0px 0px;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 1px dashed #000;
        width: 275px%;
        overflow: hidden;
        resize:none;
        height:20px;
    }

    .form-style-4 textarea:focus, 
    .form-style-4 input[type=text]:focus,
    .form-style-4 input[type=email]:focus,
    .form-style-4 input[type=email] :focus
    {
        border-bottom: 1px dashed #000;
    }

    .form-style-4 input[type=submit],
    .form-style-4 input[type=button]{
        background: #000;
        border: none;
        padding: 8px 10px 8px 10px;
        border-radius: 5px;
        color: #000;
    }
    .form-style-4 input[type=submit]:hover,
    .form-style-4 input[type=button]:hover{
        background: #000;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee Information </a><i class="fa fa-angle-right"></i> Add Form Employee</h4>
                <?= $this->session->flashdata('message'); ?>
                <form class="form-style-4" action="<?= base_url('data_karyawan/add/') . $user['name']; ?>" method="post">
                    <div class="form-panel">
                        <div class="form">
                            <div class="form-group">
                                <table width="100%" border="0">
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Nomor KTP <span  style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= set_value('no_ktp'); ?>" name="no_ktp" placeholder="Nomor KTP" required autofocus>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nomor SCAN <span  style="color: red">(*)</span></span><br>
                                                <input type="number" value="<?= set_value('no_scan'); ?>" name="no_scan" placeholder="Nomor Absen/Scan" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nama Lengkap <span style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= set_value('nama'); ?>" onkeyup="this.value = this.value.toUpperCase();" name="nama" placeholder="Nama Lengkap"  required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Tempat Lahir <span style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= set_value('tempat_lahir'); ?>" name="tempat_lahir" placeholder="Tempat Lahir" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Tanggal Lahir <span style="color: red">(*)</span></span><br>
                                                <input type="date" value="<?= set_value('tgl_lahir'); ?>" name="tgl_lahir" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Alamat KTP <span style="color: red">(*)</span></span><br>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?= set_value('alamat_domisili'); ?>" placeholder="Alamat Sesuai KTP" name="alamat_ktp" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Alamat Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?= set_value('alamat_domisili'); ?>" name="alamat_domisili" placeholder="Alamat Domisi/Tinggal" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>RT <span style="color: red">(*)</span></span><br>
                                                <input type="number" name="RT" value="<?= set_value('RT'); ?>" placeholder="RT" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>RW <span style="color: red">(*)</span></span><br>
                                                <input type="number" name="RW" value="<?= set_value('RW'); ?>" placeholder="RW" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Kota/Kab Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" name="kabupaten_domisili" value="<?= set_value('kabupaten_domisili'); ?>" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Kecamatan Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" name="kecamatan_domisili" value="<?= set_value('kecamatan_domisili'); ?>" required>
                                            </label>
                                        </th>                          
                                        <th>
                                            <label>
                                                <span>Kode Pos <span style="color: red">(*)</span></span><br>
                                                <input type="number" value="<?= set_value('kode_pos'); ?>" name="kode_pos" placeholder="Kode Pos" required>
                                            </label>
                                        </th>
                                    </tr> 
                                    <tr>   
                                        <th>
                                            <label>
                                                <span>Agama <span style="color: red">(*)</span></span><br>
                                                <select name="agama" class="select2" data-placeholder="Pilih Agama" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryReligion = $this->db->get('religion')->result_array(); ?>
                                                    <?php foreach ($queryReligion as $dr) : ?>
                                                    <option value="<?= $dr['religion'] ?>" <?php if ($dr['religion'] == set_value('agama')) { echo "SELECTED"; } ?>><?= $dr['religion'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Status Rumah <span style="color: red">(*)</span></span><br>
                                                <select name="status_rumah" class="select2" data-placeholder="Pilih Status Rumah" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryReligion = $this->db->get('status_rumah')->result_array(); ?>
                                                    <?php foreach ($queryReligion as $dr) : ?>
                                                    <option value="<?= $dr['code'] ?>" <?php if ($dr['code'] == set_value('status_rumah')) { echo "SELECTED"; } ?>><?= $dr['deskripsi'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </th>                                  
                                        <th>
                                            <label>
                                                <span>Jenis Kelamin <span style="color: red">(*)</span></span><br>
                                                <select class="select2" data-placeholder="Pilih Jenis Kelamin" name="jenis_kelamin" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryJenisKelamin = $this->db->get('jenis_kelamin')->result_array(); ?>
                                                    <?php foreach ($queryJenisKelamin as $djk) : ?>
                                                    <option value="<?= $djk['id'] ?>" 
                                                    <?php if ($djk['id'] == set_value('jenis_kelamin')) { echo "SELECTED"; } ?>
                                                    ><?= $djk['jenis_kelamin'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Status Keluarga <span style="color: red">(*)</span></span><br>
                                                <select class="select2" data-placeholder="Pilih Status Keluarga" name="status_kel" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryReligion = $this->db->get('status_kel')->result_array(); ?>
                                                    <?php foreach ($queryReligion as $dr) : ?>
                                                    <option value="<?= $dr['status_kel'] ?>" <?php if ($dr['status_kel'] == set_value('status_kel')) { echo "SELECTED"; } ?>><?= $dr['deskripsi'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Pendidikan Terakhir <span style="color: red">(*)</span></span><br>
                                                <select class="select2" name="pendidikan" data-placeholder="Pilih Pendidikan Terakhir" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryPendidikan = $this->db->get('pendidikan')->result_array();?>
                                                    <?php foreach ($queryPendidikan as $dp) : ?>
                                                    <option value="<?= $dp['pendidikan'] ?>" <?php if ($dp['pendidikan'] == set_value('pendidikan')) { echo "SELECTED";} ?>><?= $dp['pendidikan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nama Sekolah <span style="color: red">(*)</span></span><br>
                                                <input value="<?= set_value('nama_sekolah'); ?>" name="nama_sekolah" type="text" placeholder="Nama Sekolah" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Jurusan </span><br>
                                                <input value="<?= set_value('jurusan'); ?>" name="jurusan" type="text" placeholder="Jurusan">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nilai Terakhir </span><br>
                                                <input value="<?= set_value('ipk'); ?>" name="ipk" type="number" placeholder="Nilai Terakhir">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Golongan Darah <span style="color: red">(*)</span></span><br>
                                                <select class="select2" name="gol_darah" data-placeholder="Pilih Golongan Darah">
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryGoldar = $this->db->get('gol_darah')->result_array(); ?>
                                                    <?php foreach ($queryGoldar as $dg) : ?>
                                                    <option value="<?= $dg['gol_darah'] ?>" <?php if ($dg['gol_darah'] == set_value('gol_darah')) { echo "SELECTED"; } ?>><?= $dg['gol_darah'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Email Pribadi <span style="color: red">(*)</span></span><br>
                                                <input value="<?= set_value('email_pribadi'); ?>" name="email_pribadi" type="text" placeholder="Email Pribadi" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Pengalaman Kerja </span><br>
                                                <input value="<?= set_value('pengalaman_kerja'); ?>" name="pengalaman_kerja" type="text" placeholder="Pengalaman Kerja">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nomor Handphone <span style="color: red">(*)</span></span><br>
                                                <input value="<?= set_value('no_hp'); ?>" name="no_hp" type="text" placeholder="Nomor Handphone" required>
                                            </label>
                                        </th>
                                    </tr>
                                       <th>
                                            <label>
                                                <span>Nomor Kartu Keluarga </span><br>
                                                <input value="<?= set_value('kartu_keluarga'); ?>" name="kartu_keluarga" type="text" placeholder="Nomor Kartu Keluarga">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Masa Berlaku KTP </span><br>
                                                <input value="<?= set_value('masa_berlaku_ktp'); ?>" name="masa_berlaku_ktp" type="date">
                                                <span style="color: red;">*jika masa berlaku selamanya, <br>silahkan diabaikan.</span><br>
                                            </label>
                                        </th>
                                        <th> 
                                            <label>
                                                <span>Status Seragam dan ID Card<span style="color: red">(*)</span></span>
                                                <select class="select2" name="status_seragam" data-placeholder="Pilih Status Seragam dan Id Card">
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryseragam = $this->db->get('status_idcseragam')->result_array(); ?>
                                                    <?php foreach ($queryseragam as $dg) : ?>
                                                    <option value="<?= $dg['status_seragam'] ?>" <?php if ($dg['status_seragam'] == set_value('status_seragam')) { echo "SELECTED"; } ?>><?= $dg['status_seragam'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-panel">
                        <input id="idf" value="1" type="hidden">
                        <table width="100%">
                            <thead> 
                                <tr>
                                    <th><label><span>Nama</span></label></th>
                                    <th><label><span>Hubungan</span></label></th>
                                    <th><label><span>Tempat Lahir</span></label></th>
                                    <th><label><span>Tanggal Lahir</span></label></th>
                                    <th><label><span>Pekerjaan</span></label></th>
                                    <th><label><span>Option</span></label></th>
                                </tr>
                            </thead>
                            <tbody id="divSite">
                                <tr>
                                    <td>
                                        <label>
                                            <input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga'>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='hubungan_keluarga[]' class='form-control input-sm' placeholder='Hubungan Keluarga'>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='tempat[]' class='form-control input-sm' placeholder='Tempat Lahir'>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='date' name='tgl_lahir_keluarga[]' class='form-control input-sm'>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='pekerjaan[]' class='form-control input-sm' placeholder="Pekerjaan">
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <span style="color: red">*Wajib diisi</span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <button type="button" class="btn btn-default btn-xs" onclick="tambahDataKeluarga(); return false;"><i class="fa fa-plus"></i></button>
                        </center>
                    </div>
                    <div class="form-panel">
                        <input id="idf_pk" value="1" type="hidden">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th><label><span>Nama Perusahaan</span></label></th>
                                    <th><label><span>Bagian/Departemen</span></label></th>
                                    <th><label><span>Jabatan</span></label></th>
                                    <th><label><span>Masa Kerja</span></label></th>
                                    <th><label><span>Option</span></label></th>
                                </tr>
                            </thead>
                            <tbody id="divSite_pk">
                                <tr>
                                    <td>
                                        <label>
                                           <input type='text' name='nama_perusahaan[]' class='form-control input-sm' placeholder="Nama Perusahaan">
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='dept_perusahaan[]' class='form-control input-sm' placeholder="Departemen">
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='jabatan_perusahaan[]' class='form-control input-sm' placeholder="Jabatan">
                                            
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='masa_kerja_perusahaan[]' class='form-control input-sm' placeholder="Masa Kerja">
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <span style="color: red">*Wajib diisi</span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <button type="button" class="btn btn-default btn-xs" onclick="tambahPengalamanKerja(); return false;"><i class="fa fa-plus"></i></button>
                        </center>
                    </div>
                    <div class="form-panel">
                        <table width="100%" border="0">
                            <tr>
                                <th>
                                    <label>
                                        <span>Status Karyawan <span  style="color: red">(*)</span></span><br>
                                        <select class="select2" data-placeholder="Pilih Status Karyawan" name="status_karyawan" id="sk" onChange="_sk();" required>
                                        <?php $queryStatus = $this->db->get('status')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryStatus as $ds) : ?>
                                                <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == set_value('status_karyawan')) { echo "SELECTED"; } ?>><?= $ds['id']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Departemen <span style="color: red">(*)</span></span></span><br>
                                        <select class="select2" data-placeholder="Pilih Satu Departemen" name="dept" required>
                                            <?php $querydept = $this->db->get('dept')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($querydept as $dd) : ?>
                                                <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == set_value('code')) { echo "SELECTED"; } ?>><?= $dd['code'] . ' - ' . $dd['dept_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Jabatan <span style="color: red">(*)</span></span><br>
                                        <select class="select2" data-placeholder="Pilih Satu Jabatan" name="jabatan" required>
                                            <?php $queryJab = $this->db->get('jabatan')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryJab as $dj) : ?>
                                                <option value="<?= $dj['jabatan']; ?>" <?php if ($dj['jabatan'] == set_value('jabatan')) { echo "SELECTED"; } ?>><?= $dj['jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>Golongan <span style="color: red">(*)</span></span>
                                        <select class="select2" data-placeholder="Pilih Satu Golongan" name="golongan" required>
                                            <?php $queryGolongan = $this->db->get('golongan')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryGolongan as $dg) : ?>
                                                <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == set_value('golongan')) { echo "SELECTED"; } ?>><?= $dg['golongan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Bagian <span style="color: red">(*)</span></span><br>
                                        <select class="select2" data-placeholder="Pilih Satu Bagian" name="bagian" required>
                                            <?php $queryBagian = $this->db->get('bagian')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryBagian as $db) : ?>
                                                <option value="<?= $db['bagian']; ?>" <?php if ($db['bagian'] ==  set_value('bagian')) { echo "SELECTED"; } ?>><?= $db['bagian']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tgl Masuk Karyawan (bulan/tgl/tahun) <span style="color: red">(*)</span></span><br>
                                        <input type="date" value="<?= set_value('tgl_masuk'); ?>" name="tgl_masuk" placeholder="Tanggal Masuk Karyawan" required>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>Tanggal Kontrak Awal</span><br>
                                        <input type="date" value="<?= set_value('kontrak_awal'); ?>" name="kontrak_awal" >
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tanggal Kontrak Selesai</span><br>
                                        <input type="date" value="<?= set_value('kontrak_akhir'); ?>" name="kontrak_akhir" >
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tanggal Tetap Karyawan</span><br>
                                        <input type="date" value="<?= set_value('tgl_tetap'); ?>" name="tgl_tetap" >
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>Atasan 1 </span><br>
                                        <input value="<?= set_value('atasan1'); ?>" name="atasan1" type="text" placeholder="Atasan 1">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Atasan 2 </span><br>
                                        <input value="<?= set_value('atasan2'); ?>" name="atasan2" type="text" placeholder="Atasan 2">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Status Aktif Karyawan<span style="color: red">(*)</span></span>
                                        <select name="status_aktif" required>
                                            <option value="" disabled selected>Status Aktif</option>
                                            <option value="1" <?php if (set_value('status_aktif') == 1) { echo "SELECTED"; } ?>>Aktif</option>
                                            <option value="0" <?php if (set_value('status_aktif') == 0) { echo "SELECTED"; } ?>>Tidak Aktif</option>
                                        </select>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>No. BPJS (Ketenagakerjaan)</span>
                                        <input name="no_bpjs_tk" type="text" value="<?= set_value('no_bpjs_tk'); ?>" placeholder="No. BPJS Ketenagakerjaan">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>No. BPJS (KES)</span>
                                        <input name="no_bpjs_kes" type="text" value="<?= set_value('no_bpjs_kes'); ?>" placeholder="No. BPJS Kesehatan">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>No. NPWP</span>
                                        <input name="npwp" type="text" value="<?= set_value('npwp'); ?>" placeholder="No. NPWP">
                                    </label>
                                </th>
                            </tr>
                            <tr>
                               <th>
                                    <label>
                                        <span>Alamat NPWP</span>
                                        <input name="alamat_npwp" type="text" value="<?= set_value('alamat_npwp'); ?>" placeholder="Alamat NPWP">
                                    </label>
                               </th>
                               <th colspan="2">
                                    <label>
                                        <span>Kode Jabatan</span>
                                        <select class="select2" data-placeholder="Kode Jabatan" name="kode_jabatan">
                                        <?php $queryAdditional = $this->db->get('additional_info')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryAdditional as $da) : ?>
                                                <option value="<?= $da['kode']; ?>"><?= $da['kode'] .' - '. $da['jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                               </th>
                            </tr>
                            <tr>
                                <th><br><br>
                                    <label>
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
                                        <a href="<?= base_url('data_karyawan'); ?>" class="btn btn-default btn-sm">Back</a>
                                    </label>
                                </th>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>