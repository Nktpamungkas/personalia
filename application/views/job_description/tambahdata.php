<script language="javascript">
    function tanggungjawab() {
        var id_tanggungjawab = document.getElementById("id_tanggungjawab").value;
        var nourut = document.getElementById("nourut").value;
            nourut = (nourut - 1) + 2;
        var stre = "<tr id='srow" + id_tanggungjawab + "'><td>4."+ nourut +"</td><td><input type='text' name='job_responsibilities[]' class='form-control input-sm' required></td><td><input type='text' name='output[]' class='form-control input-sm' required></td><td><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow" + id_tanggungjawab + "\"); return false;'>Hapus</a></td></tr>";
        $("#Site_tj").append(stre);
        id_tanggungjawab = (id_tanggungjawab - 1) + 2;

        document.getElementById("id_tanggungjawab").value = id_tanggungjawab; 
        document.getElementById("nourut").value = nourut; 

        $('.select2').select2()
    }

    function hapusElemen(id_tanggungjawab) {
        $(id_tanggungjawab).remove();
    }
    
    function wewenang() {
        var id_wewenang = document.getElementById("id_wewenang").value;
        var stre = "<p id='srow_wewenang" + id_wewenang + "'><input type='text' name='wewenang[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_wewenang" + id_wewenang + "\"); return false;'>Hapus</a></td></p>";
        $("#Site_w").append(stre);
        id_wewenang = (id_wewenang - 1) + 2;
        
        document.getElementById("id_wewenang").value = id_wewenang;

        $('.select2').select2()
    }

    function hapusElemen(id_wewenang) {
        $(id_wewenang).remove();
    }
    
    function tantanganpekerjaan() {
        var id_tantanganpekerjaan = document.getElementById("id_tantanganpekerjaan").value;
        var stre = "<p id='srow_tp" + id_tantanganpekerjaan + "'><input type='text' name='tantanganpekerjaan[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_tp" + id_tantanganpekerjaan + "\"); return false;'>Hapus</a></td></p>";
        $("#site_tp").append(stre);
        id_tantanganpekerjaan = (id_tantanganpekerjaan - 1) + 2;
        
        document.getElementById("id_tantanganpekerjaan").value = id_tantanganpekerjaan;

        $('.select2').select2()
    }

    function hapusElemen(id_tantanganpekerjaan) {
        $(id_tantanganpekerjaan).remove();
    }
    
    function interaksi_internal() {
        var id_interaksi_internal = document.getElementById("id_interaksi_internal").value;
        var stre = "<p id='srow_in" + id_interaksi_internal + "'><input type='text' name='interaksi_internal[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_in" + id_interaksi_internal + "\"); return false;'>Hapus</a></td></p>";
        $("#site_internal").append(stre);
        id_interaksi_internal = (id_interaksi_internal - 1) + 2;
        
        document.getElementById("id_interaksi_internal").value = id_interaksi_internal;

        $('.select2').select2()
    }

    function hapusElemen(id_interaksi_internal) {
        $(id_interaksi_internal).remove();
    }
    

    function interaksi_external() {
        var id_interaksi_external = document.getElementById("id_interaksi_external").value;
        var stre = "<p id='srow_eks" + id_interaksi_external + "'><input type='text' name='interaksi_external[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_eks" + id_interaksi_external + "\"); return false;'>Hapus</a></td></p>";
        $("#site_eksternal").append(stre);
        id_interaksi_external = (id_interaksi_external - 1) + 2;
        
        document.getElementById("id_interaksi_external").value = id_interaksi_external;

        $('.select2').select2()
    }

    function hapusElemen(id_interaksi_external) {
        $(id_interaksi_external).remove();
    }

</script>
<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> People Development <i class="fa fa-angle-right"></i><a href="<?= base_url('job_description'); ?>"> Job Description </a><i class="fa fa-angle-right"></i> Tambah Data</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <form class="form-horizontal" action="<?= base_url('job_description/proses_tambahdata'); ?>" method="post" enctype="multipart/form-data">
                    <marquee>*Nb : Jika ada pertanyaan tentang cara pengisian, silahkan hub: stefanus (ext. 802)</marquee>
                    <div class="form-panel">
                            <div class="form">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <select class='form-control input-sm select2' name='jabatan' required>
                                            <option value='' disabled selected>-Pilih Jabatan-</option>
                                            <?php  
                                                $jabatan = $this->db->query("SELECT * FROM jabatan ORDER BY id ASC")->result_array(); ?> 
                                            <?php foreach ($jabatan as $dj) : ?> 
                                                <option value='<?= $dj['jabatan'] ?>' <?php if ($dj['jabatan'] == set_value('jabatan')) { echo 'SELECTED';} ?>>
                                                <?= $dj['jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pemangku Jabatan</label>
                                    <div class="col-sm-10">
                                        <select class='form-control input-sm select2' name='no_scan' required>
                                            <option value='' disabled selected>-Pilih Nama Karyawan-</option>
                                            <?php  
                                                $dept = $user['dept']; 
                                                $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE NOT status_aktif = 0 AND NOT status_karyawan = 'Resigned' ORDER BY nama ASC")->result_array(); ?> 
                                            <?php foreach ($queryShift as $dk) : ?> 
                                            <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>>
                                            <?= $dk['no_scan'].' - '.$dk['nama']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Struktur organisasi</label>

                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="lampiran">
                                    </div>
                                    <div class="col-sm-6">
                                    <i style="font-size: 13px;">Maximum upload file size: 5MB. <br>(*.jpeg, *.png)</i>
                                    </div>
                                </div>
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">Fungsi utama jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-sm" name="fungsi_utama_jabatan" required>
                                    </div>
                                </div>
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-12 control-label"><b>Kualifikasi jabatan</b></label>
                                    <div class="col-sm-2">
                                        <label class="col-sm-2 control-label">*Pendidikan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="pendidikan" required>
                                    </div>

                                    <label class="col-sm-12 control-label"></label>
                                    <div class="col-sm-2">
                                        <label class="col-sm-2 control-label">*Pengalaman</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="pengalaman" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                        <h5><center><u>TUGAS & TANGGUNG JAWAB</u></center></h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><center></center></th>
                                        <th><center>Job Responsibilities</center></th>
                                        <th><center>Output & Perf. Indicator</center></th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody id="Site_tj">
                                    
                                </tbody>
                            </table>
                            <input id="id_tanggungjawab" value="1" type="hidden">
                            <input id="nourut" value="0" type="hidden">
                            <button type="button" class="btn btn-default btn-sm" onclick="tanggungjawab(); return false;">Add</button>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Wewenang</label>
                                <div class="col-sm-8" id="Site_w">
                                    
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_wewenang" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="wewenang(); return false;">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Tantangan Pekerjaan</label>
                                <div class="col-sm-8" id="site_tp">

                                </div>
                                <div class="col-sm-2">
                                    <input id="id_tantanganpekerjaan" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tantanganpekerjaan(); return false;">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Interaksi Internal</label>
                                <div class="col-sm-8" id="site_internal">

                                </div>
                                <div class="col-sm-2">
                                    <input id="id_interaksi_internal" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="interaksi_internal(); return false;">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Interaksi External</label>
                                <div class="col-sm-8" id="site_eksternal">

                                </div>
                                <div class="col-sm-2">
                                    <input id="id_interaksi_external" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="interaksi_external(); return false;">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                            <a href="<?= base_url('job_description'); ?>" class="btn btn-theme04">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>