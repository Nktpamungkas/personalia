<script language="javascript">
    function tambahDataKeluarga() {
        var idf = document.getElementById("idf").value;
        var stre = "<tr id='srow" + idf + "'><tr><td><label><input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga'></label></td><td><label><input type='text' name='hubungan_keluarga[]' class='form-control input-sm' placeholder='Hubungan Keluarga'></label></td><td><label><input type='text' name='tempat[]' class='form-control input-sm' placeholder='Tempat Lahir'></label></td><td><label><input type='date' name='tgl_lahir_keluarga[]' class='form-control input-sm'></label></td><td><label><input type='text' name='pekerjaan[]' class='form-control input-sm'></label></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></td></tr>";

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
        <?= $this->session->flashdata('message'); ?>
            <div class="col-lg-12">
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee Information </a><i class="fa fa-angle-right"></i> Edit Form Employee</h4>
                <form class="form-style-4" action="<?= base_url('data_karyawan/addEmployed/') . $user['name']. '/'. $makar->id; ?>" method="post">
                    <div class="form-panel">
                        <div class="form">
                            <div class="form-group">
                                <table width="100%" border="0">
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Nomor KTP <span  style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= $makar->no_ktp; ?>" name="no_ktp" placeholder="Nomor KTP" required autofocus>
                                                <span style="color: red;"><i><b>Jika ingin duplicate data, tambahkan kutip (') hanya diawal karakter.</b></i></span>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nomor SCAN <span  style="color: red">(*)</span></span><br>
                                                <input type="number" value="<?= $makar->no_scan; ?>" name="no_scan" placeholder="Nomor Absen/Scan" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nama Lengkap <span style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= $makar->nama; ?>" onkeyup="this.value = this.value.toUpperCase();" name="nama" placeholder="Nama Lengkap"  required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Tempat Lahir <span style="color: red">(*)</span></span><br>
                                                <input type="text" value="<?= $makar->tempat_lahir; ?>" name="tempat_lahir" placeholder="Tempat Lahir" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Tanggal Lahir <span style="color: red">(*)</span></span><br>
                                                <input type="date" value="<?= $makar->tgl_lahir; ?>" name="tgl_lahir" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Alamat KTP <span style="color: red">(*)</span></span><br>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?= $makar->alamat_ktp; ?>" placeholder="Alamat Sesuai KTP" name="alamat_ktp" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Alamat Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" value="<?= $makar->alamat_domisili; ?>" name="alamat_domisili" placeholder="Alamat Domisi/Tinggal" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>RT <span style="color: red">(*)</span></span><br>
                                                <input type="number" name="RT" value="<?= $makar->RT ?>" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>RW <span style="color: red">(*)</span></span><br>
                                                <input type="number" name="RW" value="<?= $makar->RW ?>" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Kota/Kab Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" name="kabupaten_domisili" value="<?= $makar->kabupaten_domisili ?>" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Kecamatan Domisili <span style="color: red">(*)</span></span><br>
                                                <input type="text" name="kecamatan_domisili" value="<?= $makar->kecamatan_domisili ?>" required>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Kode Pos <span style="color: red">(*)</span></span><br>
                                                <input type="number" value="<?= $makar->kode_pos; ?>" name="kode_pos" placeholder="Kode Pos" required>
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
                                                    <option value="<?= $dr['religion'] ?>" <?php if ($dr['religion'] == $makar->agama) { echo "SELECTED"; } ?>><?= $dr['religion'] ?></option>
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
                                                        <option value="<?= $dr['code']; ?>" <?php if($dr['code'] == $makar->status_rumah ) { echo "selected"; } ?>><?= $dr['code']; ?></option>
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
                                                    <?php if ($djk['id'] == $makar->jenis_kelamin) { echo "SELECTED"; } ?>
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
                                                    <option value="<?= $dr['status_kel'] ?>" <?php if ($dr['status_kel'] == $makar->status_kel) { echo "SELECTED"; } ?>><?= $dr['status_kel'] ?></option>
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
                                                    <option value="<?= $dp['pendidikan'] ?>" <?php if ($dp['pendidikan'] == $makar->pendidikan) { echo "SELECTED";} ?>><?= $dp['pendidikan'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                </div>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nama Sekolah <span style="color: red">(*)</span></span><br>
                                                <input value="<?= $makar->nama_sekolah ?>" name="nama_sekolah" type="text" placeholder="Nama Sekolah" required>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Jurusan </span><br>
                                                <input value="<?= $makar->jurusan; ?>" name="jurusan" type="text" placeholder="Jurusan">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nilai Terakhir </span><br>
                                                <input value="<?= $makar->ipk; ?>" name="ipk" type="number" placeholder="Nilai Terakhir">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Golongan Darah <span style="color: red">(*)</span></span><br>
                                                <select class="select2" name="gol_darah" data-placeholder="Pilih Golongan Darah">
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryGoldar = $this->db->get('gol_darah')->result_array(); ?>
                                                    <?php foreach ($queryGoldar as $dg) : ?>
                                                    <option value="<?= $dg['gol_darah'] ?>" <?php if ($dg['gol_darah'] == $makar->gol_darah) { echo "SELECTED"; } ?>><?= $dg['gol_darah'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <label>
                                                <span>Email Pribadi </span><br>
                                                <input value="<?= $makar->email_pribadi; ?>" name="email_pribadi" type="text" placeholder="Email Pribadi">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Pengalaman Kerja </span><br>
                                                <input value="<?= $makar->pengalaman_kerja; ?>" name="pengalaman_kerja" type="text" placeholder="Pengalaman Kerja">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Nomor Handphone </span><br>
                                                <input value="<?= $makar->no_hp; ?>" name="no_hp" type="text" placeholder="Nomor Handphone">
                                            </label>
                                        </th>
                                        </tr>
                                        <tr>
                                        <th>
                                            <label>
                                                <span>Nomor Kartu Keluarga </span><br>
                                                <input value="<?= $makar->kartu_keluarga; ?>" name="kartu_keluarga" type="text" placeholder="Nomor Kartu Keluarga">
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Masa Berlaku KTP </span><br>
                                                <input value="<?= $makar->masa_berlaku_ktp; ?>" name="masa_berlaku_ktp" type="date">
                                                <span style="color: red;">*jika masa berlaku selamanya, <br>silahkan diabaikan.</span><br>
                                            </label>
                                        </th>
                                        <th>
                                            <label>
                                                <span>Seragam dan ID Card<span style="color: red">(*)</span></span>
                                                <select name="status_seragam" class="select2" data-placeholder="Pilih status seragam dan ID Card" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryseragam= $this->db->get('status_idcseragam')->result_array(); ?>
                                                    <?php foreach ($queryseragam as $dsg) : ?>
                                                    <option value="<?= $dsg['status_seragam'] ?>" <?php if ($dsg['status_seragam'] == $makar->status_seragam) { echo "SELECTED"; } ?>><?= $dsg['status_seragam'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label>
                                            <!-- <label>
                                                <span>ID Card <span style="color: red">(*)</span></span><br>
                                                <select name="status_idcard" class="select2" data-placeholder="Pilih Status Rumah" required>
                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                    <?php $queryidcard = $this->db->get('status_idcseragam')->result_array(); ?>
                                                    <?php foreach ($queryidcard as $dcr) : ?>
                                                        <option value="<?= $dcr['status_idcard']; ?>" <?php if($dcr['status_idcard'] == $makar->status_idcard ) { echo "selected"; } ?>><?= $dcr['status_idcard']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </label> -->
                                        </th>



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
                                    <th colspan="6" style="text-align:left"><label><h4>DATA KELUARGA</h4></label> <i>*Jika ingin merubah <b>data keluarga</b>, silahkan hapus dan klik tanda + (tambah)</i></th>
                                </tr>
                                <tr><th></th></tr>
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
                            <?php 
                                $query = $this->db->query("SELECT * FROM data_keluarga WHERE no_scan='$no_scan'")->result_array(); 
                                $queryRow = $this->db->query("SELECT * FROM data_keluarga WHERE no_scan='$no_scan'")->row(); 
                            ?>
                            <?php if($queryRow) : ?>
                                <?php foreach($query AS $result) : ?>
                                    <tr>
                                        <td>
                                            <?php if ($result['nama']) : ?>
                                            <label>
                                                <input type='text' name='nama_keluarga_edit[]' class='form-control input-sm' placeholder='Nama Keluarga' value="<?= $result['nama'] ?>" readonly>
                                            </label>
                                            <?php else : ?>
                                            <label>
                                                <input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga'>
                                            </label>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='hubungan_keluarga_edit[]' class='form-control input-sm' placeholder='Hubungan Keluarga' value="<?= $result['hubungan'] ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='tempat_edit[]' class='form-control input-sm' placeholder='Tempat Lahir' value="<?= $result['tempat'] ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='date' name='tgl_lahir_keluarga_edit[]' class='form-control input-sm' value="<?= $result['tgl_lahir'] ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='pekerjaan_edit[]' class='form-control input-sm' placeholder="Pekerjaan" value="<?= $result['pekerjaan'] ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <span><a href="<?= base_url('data_karyawan/delete_data_keluarga/').$result['id']; ?>">Hapus</a></span>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td>
                                        <label>
                                            <input type='text' name='nama_keluarga[]' class='form-control input-sm' placeholder='Nama Keluarga' required>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='hubungan_keluarga[]' class='form-control input-sm' placeholder='Hubungan Keluarga' required>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='tempat[]' class='form-control input-sm' placeholder='Tempat Lahir' required>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='date' name='tgl_lahir_keluarga[]' class='form-control input-sm' required>
                                        </label>
                                    </td>
                                    <td>
                                        <label>
                                            <input type='text' name='pekerjaan[]' class='form-control input-sm' required>
                                        </label>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
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
                                    <th colspan="6" style="text-align:left"><label><h4>PENGALAMAN KERJA</h4> <i>*Jika ingin merubah <b>pengalaman kerja</b>, silahkan hapus dan klik tanda + (tambah)</i></label></th>
                                </tr>
                                <tr><th></th></tr>
                                <tr>
                                    <th><label><span>Nama Perusahaan</span></label></th>
                                    <th><label><span>Bagian/Departemen</span></label></th>
                                    <th><label><span>Jabatan</span></label></th>
                                    <th><label><span>Masa Kerja</span></label></th>
                                    <th><label><span>Option</span></label></th>
                                </tr>
                            </thead>
                            <tbody id="divSite_pk">
                            <?php 
                                $query = $this->db->query("SELECT * FROM data_pengalaman_kerja WHERE no_scan = '$no_scan'")->result_array(); 
                                $queryRow = $this->db->query("SELECT * FROM data_pengalaman_kerja WHERE no_scan = '$no_scan'")->row(); 
                            ?>
                            <?php if($queryRow) : ?>
                                <?php foreach($query AS $key) : ?>
                                    <tr>
                                        <td>
                                            <label>
                                            <input type='text' name='nama_perusahaan_edit[]' class='form-control input-sm' placeholder="Nama Perusahaan" value="<?= $key['nama_perusahaan']; ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='dept_perusahaan_edit[]' class='form-control input-sm' placeholder="Departemen" value="<?= $key['bagian']; ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='jabatan_perusahaan_edit[]' class='form-control input-sm' placeholder="Jabatan" value="<?= $key['jabatan']; ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type='text' name='masa_kerja_perusahaan_edit[]' class='form-control input-sm' placeholder="Masa Kerja" value="<?= $key['masa_kerja']; ?>" readonly>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <span><a href="<?= base_url('data_karyawan/delete_data_pengalaman_kerja/').$key['id']; ?>">Hapus</a></span>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td>
                                        <input type='text' name='nama_perusahaan[]' class='form-control input-sm' required>
                                    </td>
                                    <td>
                                        <input type='text' name='dept_perusahaan[]' class='form-control input-sm' required>
                                    </td>
                                    <td>
                                        <input type='text' name='jabatan_perusahaan[]' class='form-control input-sm' required>
                                    </td>
                                    <td>
                                        <input type='text' name='masa_kerja_perusahaan[]' class='form-control input-sm' required>
                                    </td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
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
                                        <?php 
                                            $queryStatus = $this->db->get('status')->result_array(); 
                                            $queryKontrak = $this->db->query("SELECT * FROM tbl_kontrak WHERE no_scan = '$makar->no_scan' ORDER BY id DESC LIMIT 1")->row();
                                            if ($makar->status_karyawan == "Kontrak1" OR $makar->status_karyawan == "Kontrak2") {
                                                $status_karyawan = $queryKontrak->keterangan;
                                            } else {
                                                $status_karyawan = $makar->status_karyawan;
                                            }
                                        ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryStatus as $ds) : ?>
                                                <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == $makar->status_karyawan) { echo "SELECTED"; } ?>><?= $ds['id']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                    </label>
                                </th>
                                <!-- <th>
                                    <label>
                                        <span>Departemen <span style="color: red">(*)</span></span><br>
                                        <select class="select2" data-placeholder="Pilih Satu Depatemen" name="dept" required>
                                            <?php $queryDept = $this->db->get('dept')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryDept as $dd) : ?>
                                                <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == $makar->dept) { echo "SELECTED"; } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th> -->
                                <th>
                                    <label>
                                        <span>Departemen <span style="color: red">(*)</span></span><br>
                                        <select class="select2" data-placeholder="Pilih Satu Departemen" name="dept" required>
                                            <?php $queryDept = $this->db->get('dept')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryDept as $dd) : ?>
                                                <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == $makar->dept) { echo "SELECTED"; } ?>><?= $dd['code']. ' - ' . $dd['dept_name']; ?></option>
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
                                                <option value="<?= $dj['jabatan']; ?>" <?php if ($dj['jabatan'] == $makar->jabatan) { echo "SELECTED"; } ?>><?= $dj['jabatan']; ?></option>
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
                                                <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == $makar->golongan) { echo "SELECTED"; } ?>><?= $dg['golongan'] ?></option>
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
                                                <option value="<?= $db['bagian']; ?>" <?php if ($db['bagian'] == $makar->bagian) { echo "SELECTED"; } ?>><?= $db['bagian']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tanggal Masuk Karyawan <span style="color: red">(*)</span></span><br>
                                        <input type="date" value="<?= $makar->tgl_masuk; ?>" name="tgl_masuk" placeholder="Tanggal Masuk Karyawan" required>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>Tanggal Kontrak Awal</span><br>
                                        <?php
                                            if($makar->status_karyawan == "Kontrak1" OR $makar->status_karyawan == "Kontrak2") {
                                                $queryKontrak12 = $this->db->query("SELECT * FROM tbl_kontrak WHERE no_scan = '$makar->no_scan' ORDER BY id DESC LIMIT 1")->row();
                                                if ($queryKontrak12) {
                                                    $kontrak1 = $queryKontrak12->kontrak_awal;
                                                    $kontrak2 = $queryKontrak12->kontrak_akhir;
                                                }else{
                                                    $kontrak1 = "0000-00-00";
                                                    $kontrak2 = "0000-00-00";
                                                }
                                            }else{
                                                $kontrak1 = "0000-00-00";
                                                $kontrak2 = "0000-00-00";
                                            }
                                        ?>
                                        <input class="form-control input-sm input-sm" value="<?= $kontrak1; ?>" name="kontrak_awal" id="kontrak_awal" type="date" <?php if($makar->status_karyawan == "Kontrak1" || $makar->status_karyawan == "Kontrak2" || $makar->status_karyawan == "Resigned"){ echo ""; }else { echo "readonly"; } ?>>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tanggal Kontrak Selesai</span><br>
                                        <input class="form-control input-sm input-sm" value="<?= $kontrak2; ?>" name="kontrak_akhir" id="kontrak_akhir" type="date" <?php if($makar->status_karyawan == "Kontrak1" || $makar->status_karyawan == "Kontrak2" || $makar->status_karyawan == "Resigned"){ echo ""; } else { echo "readonly"; } ?>>
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Tanggal Tetap Karyawan</span><br>
                                        <input class="form-control input-sm input-sm" value="<?= $makar->tgl_tetap; ?>" id="tgltetap" name="tgl_tetap" type="date" <?php if($makar->status_karyawan == "Kontrak1" || $makar->status_karyawan == "Kontrak2" || $makar->status_karyawan == "Resigned"){ echo "readonly"; } ?>>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>Atasan 1 </span><br>
                                        <input value="<?= $makar->atasan1; ?>" name="atasan1" type="text" placeholder="Atasan 1">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Atasan 2 </span><br>
                                        <input value="<?= $makar->atasan2; ?>" name="atasan2" type="text" placeholder="Atasan 2">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Status Aktif Karyawan<span style="color: red">(*)</span></span>
                                        <select name="status_aktif" required>
                                            <option value="" disabled selected>Status Aktif</option>
                                            <option value="1" <?php if (1 == $makar->status_aktif) { echo "SELECTED";} ?>>Aktif</option>
                                            <option value="0" <?php if (0 == $makar->status_aktif) { echo "SELECTED";} ?>>Tidak Aktif</option>
                                        </select>
                                    </label>
                                </th>
                            </tr>
                            <tr>
                            <tr>
                                <th>
                                    <label>
                                        <span>No. BPJS (Ketenagakerjaan)</span>
                                        <input name="no_bpjs_tk" type="text" value="<?= $makar->no_bpjs_tk; ?>" placeholder="No. BPJS Ketenagakerjaan">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>No. BPJS (KES)</span>
                                        <input name="no_bpjs_kes" type="text" value="<?= $makar->no_bpjs_kes; ?>" placeholder="No. BPJS Kesehatan">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Ukuran T-Shirt</span>
                                        <input name="ukuran_baju_shirt" type="text" value="<?= $makar->ukuran_baju_shirt; ?>" placeholder="No. BPJS Kesehatan">
                                    </label>
                                </th>
                            </tr>
                            <tr>
                               <th>
                                    <label>
                                        <span>Alamat NPWP</span>
                                        <input name="alamat_npwp" type="text" value="<?= $makar->alamat_npwp; ?>" placeholder="Alamat NPWP">
                                    </label>
                               </th>
                               <th>
                                    <label>
                                        <span>No. NPWP</span>
                                        <input name="npwp" type="text" value="<?= $makar->npwp; ?>" placeholder="No. NPWP">
                                    </label>
                                </th>
                                <th>
                                    <label>
                                        <span>Ukuran Baju Polo</span>
                                        <input name="ukuran_baju_polo" type="text" value="<?= $makar->ukuran_baju_polo; ?>" placeholder="No. NPWP">
                                    </label>
                                </th>
                            </tr>
                            <tr>
                               <th colspan="2">
                                    <label>
                                        <span>Kode Jabatan</span>
                                        <select class="select2" data-placeholder="Kode Jabatan" name="kode_jabatan">
                                        <?php $queryAdditional = $this->db->get('additional_info')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryAdditional as $da) : ?>
                                                <option value="<?= $da['kode']; ?>" <?php if ($da['kode'] == $makar->kode_jabatan) { echo "SELECTED"; } ?>><?= $da['kode'] .' - '. $da['jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                               </th>
                            </tr>
                            <tr>
                                <th><br><br>
                                    <label>
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
                                        <button class="btn btn-default btn-sm" type="submit" name="duplicate" value="1">Duplicate</button>
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