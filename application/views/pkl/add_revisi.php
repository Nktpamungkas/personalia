<!-- <script language="javascript">
    function tambahNama() {
        var idf  = document.getElementById("idf").value;
        var stre = "<div class='col-lg-2' class='form-group'><p id='srow" + idf + "'><select class='form-control input-sm select2' tabindex='2' name='no_scan[]' required><option value='' disabled selected></option><?php  $dept = $user['dept']; $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_karyawan = 'perubahan_status' AND NOT status_aktif = 0 ORDER BY nama ASC")->result_array(); ?> <?php foreach ($queryShift as $dk) : ?> <option value='<?= $dk['no_scan'] ?>' <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?></option><?php endforeach ?></select><a href='#' style=\"color:#3399FD;\" onclick='hapusElemen(\"#srow" + idf + "\"); return false;'>Hapus</a></p></div>";
        $("#divSite").append(stre);
        idf = (idf - 1) + 2;
        
        document.getElementById("idf").value = idf;

        $('.select2').select2()
    }

    function hapusElemen(idf) {
        $(idf).remove();
    }
</script> -->
<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pkl'); ?>"> Time Attendance </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('pkl'); ?>"> Form Lembur</a><i class="fa fa-angle-right"></i> Add Form Lembur</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('pkl/add/') . $user['name']; ?>" method="post">
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Kode Lembur</label>
                                <div class="col-lg-10">
                                <select class="form-control input-sm select2" name="kode_lembur" required>
                                        <option value="" disabled selected>Pilih Kode Lembur</option>
                                        <?php
                                            $querykode = $this->db->query("SELECT distinct 
                                            kode_lembur, shift,dept FROM permohonan_kerja_lembur where `status`='Printed' and nama ='' and not kode_lembur ='' order by kode_lembur desc")->result_array();
                                        ?>
                                        <?php foreach ($querykode as $dkl) : ?>
                                            <option value="<?= $dkl['kode_lembur'] ?>" <?php if ($dkl['kode_lembur'] == set_value('kode_lembur')) {
                                                echo "SELECTED";
                                            } ?>><?= $dkl['kode_lembur'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="control-label col-lg-2">Shift</label>
                                <div class="col-lg-10">
                                    <select class="form-control input-sm select2" name="shift" required>
                                        <option value="" disabled selected>Pilih Shift</option>
                                        <?php
                                            $queryShift = $this->db->query("SELECT * FROM shift")->result_array();
                                        ?>
                                        <?php foreach ($queryShift as $ds) : ?>
                                            <option value="<?= $ds['desc'] ?>" <?php if ($ds['desc'] == $dkl->kode_lembur) {
                                                echo "SELECTED";
                                            } ?>><?= $ds['ket'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Department</label>
                                <div class="col-lg-10">
                                    <input class="form-control input-sm" value="<?= $user['dept']; ?>" name="dept" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">
                                    <!-- <button type="button" class="btn btn-default btn-sm" onclick="tambahNama(); return false;">
                                        Tambah Nama <?= $user['name']; ?>
                                    </button> -->
                                </label>
                                <div class="col-lg-10" id="divSite" class="form-group">
                                    <input id="idf" value="1" type="hidden">
                                </div>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="adv-table" align="center">
                                <table class="display table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><center>#Delete</center></th>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>
                                                <div class="col-sm-6">
                                                    *No Absensi
                                                </div>
                                                <div class="col-sm-6">
                                                    Istirahat
                                                </div>
                                            </th>
                                            <th colspan="2"><center>*Waktu Lembur</center></th>
                                            <th>*Total Jam Lembur</th>
                                            <th>Tujuan Lembur</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <div class="col-sm-6">

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="checkbox">
                                                        <label title="Berdasarkan data 1">
                                                            <input type="checkbox" id="check_as_one_rest" value=""><small><strong>Same as 1<strong></small>
                                                        </label>
                                                    </div>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="checkbox">
                                                    <label title="Berdasarkan data 1">
                                                        <input type="checkbox" id="check_as_one_start" value=""><small><strong>Same as 1<strong></small>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="checkbox">
                                                    <label title="Berdasarkan data 1">
                                                        <input type="checkbox" id="check_as_one_end" value="" ><small><strong>Same as 1<strong></small>
                                                    </label>
                                                </div>
                                            </th>
                                            <th></th>
                                            <th>
                                                <div class="checkbox">
                                                    <label title="Berdasarkan data 1">
                                                        <input type="checkbox" id="check_as_one_purpose" value="" ><small><strong>Same as 1<strong></small>
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>
                                   
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        <select class='form-control input-sm select2' tabindex='2' name='no_scan[]' required><option value='' disabled selected>

                                        </option><?php  $dept = $user['dept']; 
                                        $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE dept = '$dept' AND NOT status_karyawan = 'perubahan_status' AND NOT status_aktif = 0 ORDER BY nama ASC")->result_array(); ?> 
                                        <?php foreach ($queryShift as $dk) : ?> 
                                        <option value='<?= $dk['no_scan'] ?>' 
                                        <?php if ($dk['no_scan'] == set_value('no_scan')) { echo 'SELECTED';} ?>><?= $dk['no_scan'].' - '.$dk['nama']; ?>
                                        </option><?php endforeach ?></select>
                                        </td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input class="form-control input-sm " name="no_absen[]" type="text" value="" title="Nomor Absen Karayawan" id="no_scan" readonly>
                                            </div>
                                            <div class="col-sm 6">
                                                <select class="form-input input-sm rest" name="istirahat[]" id="istirahat" title="Total Istirahat">
                                                    <option value="0">Full</option>
                                                    <option value="1">1 Jam</option>
                                                    <option value="0.5">1/2 Jam</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control input-sm start" name="wl_1[]" type="time" onLoad="wl_1" id="wl_1" placeholder="--.--" title="Waktu Mulai Lembur" required>
                                        </td>
                                        <td>
                                            <input class="form-control input-sm end" name="wl_2[]" type="time" onLoad="wl_2" id="wl_2" placeholder="--.--" title="Waktu Selesai Lembur" required>
                                        </td>
                                        <td>
                                            <input class="form-control input-sm sum" name="total_jam_lembur[]" type="number" step="0.01" id="total_jam_lembur" title="Total jam lembur" required>
                                        </td>
                                        <td>
                                            <input class="form-control input-sm purpose" name="keterangan[]" type="text" placeholder="..." title="Keterangan lain-lain">
                                        </td>
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                // START HITUNG WAKTU DAN MENGURANI OTOMATIS ISTIRAHAT
                                                    $('#wl_1<?= $dp['no_scan']; ?>').change(function(){
                                                        _wl_1 = document.getElementById('wl_1').value;
                                                        _wl_2 = document.getElementById('wl_2').value;
                                                        istirahat = document.getElementById('istirahat').value;

                                                        if ( _wl_2 < _wl_1) {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        } else {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        }

                                                        hasil = ((hours * 60) + minutes) / 60;

                                                        hasil_istirahat = hasil - istirahat;

                                                        document.getElementById('total_jam_lembur').value = hasil_istirahat;
                                                    });
                                                    
                                                    $('#wl_2<?= $dp['no_scan']; ?>').change(function(){
                                                        _wl_1 = document.getElementById('wl_1').value;
                                                        _wl_2 = document.getElementById('wl_2').value;
                                                        istirahat = document.getElementById('istirahat').value;

                                                        if ( _wl_2 < _wl_1) {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        } else {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        }

                                                        hasil = ((hours * 60) + minutes) / 60;
                                                        
                                                        hasil_istirahat = hasil - istirahat;

                                                        document.getElementById('total_jam_lembur').value = hasil_istirahat;
                                                    });

                                                    $('#istirahat<?= $dp['no_scan']; ?>').change(function(){
                                                        _wl_1 = document.getElementById('wl_1').value;
                                                        _wl_2 = document.getElementById('wl_2').value;

                                                        istirahat = document.getElementById('istirahat').value;

                                                        if ( _wl_2 < _wl_1) {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        } else {
                                                            hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                            minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                        }

                                                        hasil = ((hours * 60) + minutes) / 60;

                                                        hasil_istirahat = hasil - istirahat;

                                                        document.getElementById('total_jam_lembur').value = hasil_istirahat;
                                                    });
                                                // END HITUNG WAKTU DAN MENGURANI OTOMATIS ISTIRAHAT

                                                // START SEARCH NAMA
                                                    $('#wl_1<?= $dp['no_scan']; ?>').change(function(){
                                                        var _nama    = document.getElementById('no_scan').value;
                                                        var _none    = "Nama tidak ditemukan";

                                                        $.ajax ({
                                                            type: 'POST',
                                                            url: '<?= base_url()."pkl/search_nama" ?>/',
                                                            dataType: 'json',
                                                            success: function(dataSearch){
                                                                document.getElementById('nama').value = dataSearch[0].nama;
                                                            }
                                                        });
                                                    });
                                                    
                                                    $('#wl_2<?= $dp['no_scan']; ?>').change(function(){
                                                        var _nama    = document.getElementById('no_scan').value;
                                                        var _none    = "Nama tidak ditemukan";

                                                        $.ajax ({
                                                            type: 'POST',
                                                            url: '<?= base_url()."pkl/search_nama" ?>/' ,
                                                            dataType: 'json',
                                                            success: function(dataSearch){
                                                                document.getElementById('nama').value = dataSearch[0].nama;
                                                            }
                                                        });
                                                    });
                                                // END SERACH NAMA
                                            });
                                        </script>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('pkl'); ?>" class="btn btn-theme04">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
</body>
<script>
    $(document).ready(function() {
        ////REST SAME ALL AS NO.1
        $("table.display tbody tr:eq(0)").css("background-color", "#e7e8c3"); 

        $("#check_as_one_rest").click(function(){
            var value_rest = $("table.display tbody tr:eq(0) td:eq(3) div:eq(1) select option:selected").val();
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum

            if($("#check_as_one_rest").prop("checked") == true){
                $("select.form-input.input-sm.rest").val(value_rest);
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_rest").prop("checked") == false){
                console.log("rest not doing anything !");
            }
        });

        $("table.display tbody tr:eq(0) td:eq(3) div:eq(1) select.form-input.input-sm.rest").change(function(){
            var value_rest = $("table.display tbody tr:eq(0) td:eq(3) div:eq(1) select option:selected").val();
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum

            if($("#check_as_one_rest").prop("checked") == true){
                $("select.form-input.input-sm.rest").val(value_rest);
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_rest").prop("checked") == false){
                console.log("rest not doing anything !");
            }
        });
        
        ////SAME ALL AS NO.1 PURPOSE
        $("#check_as_one_purpose").click(function(){
            var value_end_purpose = $("table.display tbody tr:eq(0) td:eq(7) input").val();
            
            if($("#check_as_one_purpose").prop("checked") == true){
                $("input.form-control.input-sm.purpose").val(value_end_purpose); 
                console.log(value_end_purpose)
            } else if ($("#check_as_one_purpose").prop("checked") == false){
                console.log("purpose not doing anything !");
            }
        });

        $("table.display tbody tr:eq(0) td:eq(3) input.form-control.input-sm.purpose").change(function(){
            var value_end_purpose = $("table.display tbody tr:eq(0) td:eq(7) input").val();
            
            if($("#check_as_one_purpose").prop("checked") == true){
                $("input.form-control.input-sm.purpose").val(value_end_purpose); 
                console.log(value_end_purpose)
            } else if ($("#check_as_one_purpose").prop("checked") == false){
                console.log("purpose not doing anything !");
            }
        });

        ////START SAME ALL AS NO.1
        $("#check_as_one_start").click(function(){ 
            var value_start = $("table.display tbody tr:eq(0) td:eq(4) input").val(); //start
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum

            if($("#check_as_one_start").prop("checked") == true){
                $("input.form-control.input-sm.start").val(value_start); //start
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_start").prop("checked") == false){
                console.log("start not doing anything !");
            }
        });

        $("table.display tbody tr:eq(0) td:eq(4) input.form-control.input-sm.start").change(function(){ 
            var value_start = $("table.display tbody tr:eq(0) td:eq(4) input").val(); //start
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum

            if($("#check_as_one_start").prop("checked") == true){
                $("input.form-control.input-sm.start").val(value_start); //start
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_start").prop("checked") == false){
                console.log("start not doing anything !");
            }
        });

        ////END SAME ALL AS NO.1
        $("#check_as_one_end").click(function(){
            var value_end = $("table.display tbody tr:eq(0) td:eq(5) input").val(); //end
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum
            
            if($("#check_as_one_end").prop("checked") == true){
                $("input.form-control.input-sm.end").val(value_end); //end
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_end").prop("checked") == false){
                console.log("end not doing anything !");
            }
        });

        $("table.display tbody tr:eq(0) td:eq(5) input.form-control.input-sm.end").change(function(){
            var value_end = $("table.display tbody tr:eq(0) td:eq(5) input").val(); //end
            var value_sum = $("table.display tbody tr:eq(0) td:eq(6) input").val(); //sum
            
            if($("#check_as_one_end").prop("checked") == true){
                $("input.form-control.input-sm.end").val(value_end); //end
                $("input.form-control.input-sm.sum").val(value_sum); //sum
            } else if ($("#check_as_one_end").prop("checked") == false){
                console.log("end not doing anything !");
            }
        });

    });
</script>