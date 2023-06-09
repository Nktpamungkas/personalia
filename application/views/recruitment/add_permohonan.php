<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script language="javascript">
    function proses() {
        // var lttarget    = document.getElementById('lt_target').value;
        // var fptk        = document.getElementById('tgl_fptk').value;
        // var hariKedepan = new Date(new Date(fptk).getTime()+(lttarget*24*60*60*1000));
        // var weekday = new Array(7);
        //     weekday[0] = "Minggu";
        //     weekday[1] = "Senin";
        //     weekday[2] = "Selasa";
        //     weekday[3] = "Rabu";
        //     weekday[4] = "Kamis";
        //     weekday[5] = "Jumat";
        //     weekday[6] = "Sabtu";
        // var n = weekday[hariKedepan.getDay()];
        // var dd = hariKedepan.getDate();
        // var mm = hariKedepan.getMonth()+1; 
        // var yyyy = hariKedepan.getFullYear();
        // if(dd<10){
        //     dd='0'+dd
        // } 
        // if(mm<10){
        //     mm='0'+mm
        // } 
        // hariKedepan = yyyy+'-'+mm+'-'+dd;

        // document.getElementById('tgl_target').value = hariKedepan
    }
</script>
<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Tambah Permohonan</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                    <form class="form-horizontal style-form" method="POST" action="<?= base_url('recruitment/proses_permohonan'); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">No. FPTK</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_fptk" class="form-control input-sm" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal FPTK</label>
                            <div class="col-sm-4">
                                <input type="date" name="tgl_fptk" id="tgl_fptk" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Sifat permohonan</label>
                            <div class="col-sm-4">
                                <select class="form-control input-sm" name="sifat_permohonan">
                                    <option value="internal">Internal</option>
                                    <option value="external">External</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Alasan</label>
                            <div class="col-sm-10">
                                <input type="text" name="alasan" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Departemen</label>
                            <div class="col-sm-2">
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
                            <label class="col-sm-2 col-sm-2 control-label">Level</label>
                            <div class="col-sm-2">
                                <select class='form-control input-sm' tabindex='2' name='level' required>
                                    <option value='' disabled selected></option>
                                    <?php  
                                        $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT * FROM jabatan")->result_array(); 
                                    ?>
                                    <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['jabatan'] ?>' <?php if ($dk['jabatan'] == set_value('jabatan')) { echo 'SELECTED';} ?>>
                                            <?= $dk['jabatan']; ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="jabatan" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Total Need</label>
                            <div class="col-sm-4">
                                <input type="number" name="total_need" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">Total Fulfil</label>
                            <div class="col-sm-4">
                                <input type="number" name="total_fulfil" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control input-sm" name="status">
                                    <option value="open">OPEN</option>
                                    <option value="closed">CLOSED</option>
                                    <option value="hold">HOLD</option>
                                    <option value="khusus">KHUSUS</option>
                                    <option value="cancle">CANCEL</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Kode Gol</label>
                            <div class="col-sm-4">
                                <input type="number" name="kode_gol" class="form-control input-sm round-form">
                            </div>
                            <label class="col-sm-2 col-sm-2 control-label">LT TARGET</label>
                            <div class="col-sm-4">
                                <input type="number" name="lt_target" id="lt_target" onchange="proses();" class="form-control input-sm round-form">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Aktual</label>
                            <div class="col-sm-4">
                                <input type="date" name="tgl_aktual" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Join</label>
                            <div class="col-sm-4">
                                <input type="date" name="tgl_join" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama Pelamar </label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pelamar" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Keterangan </label>
                            <div class="col-sm-10">
                                <input type="text" name="ket" class="form-control input-sm round-form">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Lulus OJT</label>
                            <div class="col-sm-10">
                                <select class="form-control input-sm" name="lulus_ojt">
                                    <option value=""></option>
                                    <option value="ya">YA</option>
                                    <option value="tidak">TIDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                                <a href="<?= base_url('recruitment/index_permohonan'); ?>" class="btn btn-theme04">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>