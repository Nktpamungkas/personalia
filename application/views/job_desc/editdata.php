<script language="javascript">
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
    
 
    function TJawab_kepada() {
        var id_TJawab_kepada = document.getElementById("id_TJawab_kepada").value;
        var stre = "<p id='srow_TJawab_kepada" + id_TJawab_kepada + "'><input type='text' name='tjawab_kepada[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_TJawab_kepada" + id_TJawab_kepada + "\"); return false;'>Hapus</a></td></p>";
        $("#site_tjk").append(stre);
        id_TJawab_kepada = (id_TJawab_kepada - 1) + 2;
        
        document.getElementById("id_TJawab_kepada").value = id_TJawab_kepada;

        $('.select2').select2()
    }

    function hapusElemen(id_TJawab_kepada) {
        $(id_TJawab_kepada).remove();
    }

    function job_responsibilities() {
        var id_job_responsibilities = document.getElementById("id_job_responsibilities").value;
        var stre = "<p id='srow_job_responsibilities" + id_job_responsibilities + "'><input type='text' name='job_responsibilities[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_job_responsibilities" + id_job_responsibilities + "\"); return false;'>Hapus</a></td></p>";
        $("#site_job_responsibilities").append(stre);
        id_job_responsibilities = (id_job_responsibilities - 1) + 2;
        
        document.getElementById("id_job_responsibilities").value = id_job_responsibilities;

        $('.select2').select2()
    }

    function hapusElemen(id_job_responsibilities) {
        $(id_job_responsibilities).remove();
    }

    function tjawab_untuk() {
        var id_tjawab_untuk = document.getElementById("id_tjawab_untuk").value;
        var stre = "<p id='srow_tp" + id_tjawab_untuk + "'><input type='text' name='tjawab_untuk[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_tp" + id_tjawab_untuk + "\"); return false;'>Hapus</a></td></p>";
        $("#site_tp").append(stre);
        id_tjawab_untuk = (id_tjawab_untuk - 1) + 2;
        
        document.getElementById("id_tjawab_untuk").value = id_tjawab_untuk;

        $('.select2').select2()
    }

    function hapusElemen(id_tjawab_untuk) {
        $(id_tjawab_untuk).remove();
    } 

        function persyaratan_khusus() {
        var id_persyaratan_khusus = document.getElementById("id_persyaratan_khusus").value;
        var stre = "<p id='srow_sk" + id_persyaratan_khusus + "'><input type='text' name='persyaratan_khusus[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_sk" + id_persyaratan_khusus + "\"); return false;'>Hapus</a></td></p>";
        $("#site_persyaratan_khusus").append(stre);
        id_persyaratan_khusus = (id_persyaratan_khusus - 1) + 2;
        
        document.getElementById("id_persyaratan_khusus").value = id_persyaratan_khusus;

        $('.select2').select2()
    }

    function hapusElemen(id_persyaratan_khusus) {
        $(id_persyaratan_khusus).remove();
    }

    function Pelatihan() {
        var id_Pelatihan = document.getElementById("id_Pelatihan").value;
        var stre = "<p id='srow_in" + id_Pelatihan + "'><input type='text' name='pelatihan[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_in" + id_Pelatihan + "\"); return false;'>Hapus</a></td></p>";
        $("#site_tjkepada").append(stre);
        id_Pelatihan = (id_Pelatihan - 1) + 2;
        
        document.getElementById("id_Pelatihan").value = id_Pelatihan;

        $('.select2').select2()
    }

    function hapusElemen(id_Pelatihan) {
        $(id_Pelatihan).remove();
    }
    
    function pengalaman() {
        var id_pengalaman = document.getElementById("id_pengalaman").value;
        var stre = "<p id='srow_pel" + id_pengalaman + "'><input type='text' name='pengalaman[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_pel" + id_pengalaman + "\"); return false;'>Hapus</a></td></p>";
        $("#site_pengalaman").append(stre);
        id_pengalaman = (id_pengalaman - 1) + 2;
        
        document.getElementById("id_pengalaman").value = id_pengalaman;

        $('.select2').select2()
    }

    function hapusElemen(id_pengalaman) {
        $(id_pengalaman).remove();
    }
    function keterampilan() {
        var id_keterampilan = document.getElementById("id_keterampilan").value;
        var stre = "<p id='srow_ket" + id_keterampilan + "'><input type='text' name='keterampilan[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_ket" + id_keterampilan + "\"); return false;'>Hapus</a></td></p>";
        $("#site_keterampilan").append(stre);
        id_keterampilan = (id_keterampilan - 1) + 2;
        
        document.getElementById("id_keterampilan").value = id_keterampilan;

        $('.select2').select2()
    }

    function hapusElemen(id_keterampilan) {
        $(id_keterampilan).remove();
    }

    function pendidikan () {
        var id_pendidikan = document.getElementById("id_pendidikan").value;
        var stre = "<p id='srow_ped" + id_pendidikan + "'><input type='text' name='pendidikan[]' class='form-control input-sm' required><a href='#' style=\"color:#3399FD;\"onclick='hapusElemen(\"#srow_ped" + id_pendidikan + "\"); return false;'>Hapus</a></td></p>";
        $("#site_pendidikan").append(stre);
        id_pendidikan = (id_pendidikan - 1) + 2;
        
        document.getElementById("id_pendidikan").value = id_pendidikan;

        $('.select2').select2()
    }

    function hapusElemen(id_pendidikan) {
        $(id_pendidikan).remove();
    }

    <?php  
      $iddocjobdesc = $id_docjobdesc->id;             
    ?> 
</script>
<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> People Development <i class="fa fa-angle-right"></i><a href="<?= base_url('job_description'); ?>"> Job Description </a><i class="fa fa-angle-right"></i> Edit Data Jobdesk</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <form class="form-horizontal" action="<?= base_url('job_description/proses_editdata_jobdesc'); ?>" method="post" enctype="multipart/form-data">
                    <marquee>*Nb : Jika ada pertanyaan tentang cara pengisian, silahkan hub: stefanus (ext. 802)</marquee>
                    <div class="form-panel">
                            <div class="form">
                            <div class="form-group has-success has-feedback">
                            <input type="hidden" class="form-control input-sm" name="id" value="<?= $doc_jobdesc_1['id']; ?>">
                                    <label class="col-sm-2 control-label">Judul Dokumen</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="judul_doc" value="<?= $doc_jobdesc_1['judul_doc']; ?>">                                                                               
                                    </div>
                                </div>
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">No. Revisi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="no_revisi"  value="<?= $doc_jobdesc_1['no_revisi']; ?>">
                                        
                                    </div>
                                </div> 
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">Tanggal Terbit</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="tgl_terbit" value="<?= $doc_jobdesc_1['tgl_terbit']; ?>">
                                       
                                    </div>
                                </div>
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <select class='form-control input-sm select2' name='jabatan' required>
                                            <option value='' disabled selected>-Pilih Jabatan-</option>
                                            <?php  
                                                $jabatan = $this->db->query("SELECT * FROM jabatan ORDER BY id ASC")->result_array(); ?> 
                                            <?php foreach ($jabatan as $dj) : ?> 
                                                <option value='<?= $dj['jabatan'] ?>' <?php if ($dj['jabatan'] == $doc_jobdesc_1['jabatan']) { echo 'SELECTED';} ?>>
                                                <?= $dj['jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">Nama Departemen</label>
                                    <div class="col-sm-8">
                                        <select class='form-control input-sm select2' name='dept_name' required>
                                            <option value='' disabled selected>-Pilih Departemen-</option>
                                            <?php  
                                                $dept_name = $this->db->query("SELECT * FROM dept ORDER BY id ASC")->result_array(); 
                                            ?> 
                                            <?php foreach ($dept_name as $dp) : ?> 
                                                <option value='<?= $dp['dept_name'] ?>' <?php if ($dp['dept_name'] == $doc_jobdesc_1['dept']) { echo 'SELECTED';} ?>>
                                                <?= $dp['dept_name']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group has-success has-feedback">
                                        <label class="col-sm-2 control-label">Fungsi utama jabatan</label>
                                        <div class="col-sm-8">
                                        <input type="text" class="form-control input-sm" name="fungsi_utama_jabatan" value="<?= $doc_jobdesc_1['fungsi_utama_jabatan']; ?>">
                                        </div>
                                     </div> 
                                 <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                    </div>
                                </div>  
                                </form>                        
                        </div>
                    </div>  
                    <div class="form-panel row">
                        <div class="form">
                        <form class="form-horizontal" action="<?= base_url('job_description/proses_editdata_tjawab_kepada/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Tanggung Jawab kepada</label>
                                <div class="col-sm-8" id="site_tjk">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM tjawab_kepada WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                        <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='tjawab_kepada_edit[]' value="<?= $result['tj_kepada'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_TJawab_kepada/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_TJawab_kepada" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="TJawab_kepada(); return false;">Add</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                         </form> 
                                 <form class="form-horizontal" action="<?= base_url('job_description/proses_editdata_tjawab_untuk/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Tanggung Jawab Untuk</label>
                                <div class="col-sm-8" id="site_tp">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM tjawab_untuk WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                        <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='tjawab_untuk_edit[]' value="<?= $result['tj_untuk'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_tjawab_untuk/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_tjawab_untuk" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="tjawab_untuk(); return false;">Add</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                         </form> 
                        </div>
                     </div>
                               <div class="form-panel row">
                                <div class="form">
                                     <form class="form-horizontal" action="<?= base_url('job_description/proses_editdata_wewenang/').$iddocjobdesc; ?>" method="post">
                                     <div class="form-group has-success has-feedback">
                                    <label class="col-sm-2 control-label">Wewenang</label>
                                         <div class="col-sm-8" id="Site_w">
                                         <?php 
                                            $data = $this->db->query("SELECT * FROM wewenang_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                        <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='wewenang_edit[]' value="<?= $result['wewenang'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_wewenang/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                        </div>
                                            <div class="col-sm-2">
                                            <input id="id_wewenang" value="0" type="hidden">
                                            <button type="button" class="btn btn-default btn-sm" onclick="wewenang(); return false;">Add</button>
                                            <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                 </form>
                             </div>
                         </div>
                                <div class="form-panel row">
                                <div class="form">
                                <form class="form-horizontal" action="<?= base_url('job_description/proses_editdata_tanggungjawab/').$iddocjobdesc; ?>" method="post">
                                    <div class="form-group has-success has-feedback">
                                         <label class="col-sm-2 control-label">Tugas Dan Tanggung Jawab</label>
                                         <div class="col-sm-8" id="site_job_responsibilities">
                                         <?php 
                                            $data = $this->db->query("SELECT * FROM tanggung_jawab_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='job_responsibilities_edit[]' value="<?= $result['job_responsibilities'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_job_responsibilities/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                         </div>
                                         <div class="col-sm-2">
                                         <input id="id_job_responsibilities" value="0" type="hidden">
                                         <button type="button" class="btn btn-default btn-sm" onclick="job_responsibilities(); return false;">Add</button>
                                         <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                </div>
                     
                         <div class="form-panel row">
                         <div class="form">
                        <form class="form-horizontal" action="<?= base_url('job_description/prosess_editdata_pendidikan/').$iddocjobdesc; ?>" method="post">
                               <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Pendidikan</label>
                                <div class="col-sm-8" id="site_pendidikan">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM pendidikan_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='pendidikan_edit[]' value="<?= $result['pendidikan'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_pendidikan/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_pendidikan" value="0" type="hidden">
                                       <button type="button" class="btn btn-default btn-sm" onclick="pendidikan(); return false;">Add</button>
                                       <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" action="<?= base_url('job_description/prosess_editdata_keterampilan/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Keterampilan</label>
                                <div class="col-sm-8" id="site_keterampilan">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM keterampilan_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='keterampilan_edit[]' value="<?= $result['keterampilan'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_keterampilan/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_keterampilan" value="0" type="hidden">
                                       <button type="button" class="btn btn-default btn-sm" onclick="keterampilan(); return false;">Add</button>
                                       <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                               	</div>
                            </div>
                        </form>
                            <form class="form-horizontal" action="<?= base_url('job_description/prosess_editdata_pengalaman/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Pengalaman</label>
                                <div class="col-sm-8" id="site_pengalaman">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM pengalaman_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='pengalaman_edit[]' value="<?= $result['pengalaman'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_pengalaman/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                               	<div class="col-sm-2">
                                   	<input id="id_pengalaman" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="pengalaman(); return false;">Add</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                               </div>
    `                       </form> 
                        </div>
                    </div>    
                   
                    <div class="form-panel row">
                        <div class="form">
                        <form class="form-horizontal" action="<?= base_url('job_description/prosess_editdata_pelatihan/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Pelatihan</label>
                                <div class="col-sm-8" id="site_tjkepada">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM pelatihan_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='pelatihan_edit[]' value="<?= $result['pelatihan'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_pelatihan/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_Pelatihan" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="Pelatihan(); return false;">Add</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-panel row">
                        <div class="form">
                        <form class="form-horizontal" action="<?= base_url('job_description/prosess_editdata_persyaratan_khusus/').$iddocjobdesc; ?>" method="post">
                            <div class="form-group has-success has-feedback">
                                <label class="col-sm-2 control-label">Persyaratan Khusus</label>
                                <div class="col-sm-8" id="site_persyaratan_khusus">
                                <?php 
                                            $data = $this->db->query("SELECT * FROM persyaratan_khusus_1 WHERE id_docjobdesc = '$iddocjobdesc' ORDER BY id ASC")->result_array(); 
                                        ?>
                                         <?php foreach($data AS $result): ?>
                                            <input type='hidden' name='id[]' value="<?= $result['id'] ?>">
                                            <input type='text' name='persyaratan_khusus_edit[]' value="<?= $result['Persyaratan_khusus'] ?>" class='form-control input-sm'>
                                            <a href="<?= base_url(); ?>job_description/delete_persyaratan_khusus/<?= $result['id']; ?>" title="Delete">
                                                Hapus
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                                <div class="col-sm-2">
                                    <input id="id_persyaratan_khusus" value="0" type="hidden">
                                    <button type="button" class="btn btn-default btn-sm" onclick="persyaratan_khusus(); return false;">Add</button>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Simpan Perubahan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <!-- <button class="btn btn-primary" type="submit" name="submit">Simpan</button> -->
                            <a href="<?= base_url('job_description'); ?>" class="btn btn-theme04">Kembali</a>
                            <a href="<?= base_url('job_description/print_jobdesc/').$result['id_docjobdesc']; ?>" class="btn btn-theme03">Cetak</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
