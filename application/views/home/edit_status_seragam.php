<script language="javascript">
    // function _sk() {
    //     var statuskaryawan = document.getElementById('sk').value;
    //     // console.log(statuskaryawan);
    //     if (statuskaryawan == "Kontrak1" || statuskaryawan == "Kontrak2" || statuskaryawan == "Resigned") {
    //         $('#tgltetap').attr('readonly', true);
    //         $('#kontrak_awal').removeAttr("readonly");
    //         $('#kontrak_akhir').removeAttr("readonly");
    //     } else {
    //         $('#tgltetap').removeAttr("readonly");
    //         $('#kontrak_awal').attr('readonly', true);
    //         $('#kontrak_akhir').attr('readonly', true);
    //     }
    // }
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
                <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('home'); ?>"> Human Resource Information Sistem </a><i class="fa fa-angle-right"></i> Edit Tanggal dan Status Terima Seragam</h4>
                <form class="form-style-4" action="<?= base_url('home/edit_tgl_terima/') . $user['name']. '/'. $makar->id; ?>" method="post">
                    <div class="form-panel">
                        <div class="form">
                            <div class="form-group">
                                <table width="100%" border="0">
                                        <tr>
                                            <th>
                                                <label>
                                                    <span>Nomor SCAN <span  style="color: red">(*)</span></span><br>
                                                    <input type="number" value="<?= $makar->no_scan; ?>" name="no_scan" placeholder="Nomor Absen/Scan" readonly>
                                                </label>
                                            </th>
                                            <th>
                                                <label>
                                                    <span>Nama Lengkap <span style="color: red">(*)</span></span><br>
                                                    <input type="text" value="<?= $makar->nama; ?>" onkeyup="this.value = this.value.toUpperCase();" name="nama" placeholder="Nama Lengkap"  readonly>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <label>
                                                    <span>Departemen <span style="color: red">(*)</span></span><br>
                                                    <input type="text" value="<?= $makar->dept; ?>" name="dept" placeholder="Departemen" readonly>
                                                </label>
                                            </th>
                                            <th>
                                                <label>
                                                    <span>Jabatan <span style="color: red">(*)</span></span><br>
                                                    <input type="text" value="<?= $makar->jabatan; ?>" name="jabatan" placeholder="jabatan" readonly>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>                         
                                            <th>
                                                <label>
                                                    <span>Tanggal Masuk Karyawan <span style="color: red">(*)</span></span><br>
                                                    <input type="date" value="<?= $makar->tgl_masuk; ?>" name="tgl_masuk" placeholder="Tanggal Masuk Karyawan" readonly>
                                                </label><BR>
                                            </th>
                                            <th>
                                                <!-- <label>
                                                    <span>Tanggal Terima Seragam</span><br>
                                                    <input class="form-control input-sm input-sm" value="<?= $makar->tgl_seragam; ?>"  name="tgl_seragam" type="date">
                                                </label> -->
                                                <label>
                                                    <span>Seragam dan ID Card<span style="color: red">(*)</span></span>
                                                    <select name="status_seragam" class="select2" data-placeholder="Pilih status seragam dan ID Card" readonly>
                                                        <option value="" disabled selected>---------------------------------------------------</option>
                                                            <?php $queryseragam= $this->db->get('status_idcseragam')->result_array(); ?>
                                                            <?php foreach ($queryseragam as $dsg) : ?>
                                                        <option value="<?= $dsg['status_seragam'] ?>" <?php if ($dsg['status_seragam'] == $makar->status_seragam) { echo "SELECTED"; } ?>><?= $dsg['status_seragam'] ?></option>
                                                            <?php endforeach; ?>
                                                    </select>
                                                </label>
                                            </th>
                                        </tr>                                                          
                                        <tr>
                                            <th><br><br>
                                                <label>
                                                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
                                                    <!-- <button class="btn btn-default btn-sm" type="submit" name="duplicate" value="1">Duplicate</button> -->
                                                    <a href="<?= base_url('home/statusseragam'); ?>" class="btn btn-default btn-sm">Back</a>
                                                </label>
                                            </th>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>