<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script>src="<?= base_url(); ?>lib/select2/dist/css/select2.min.css"</Script>
<script>src="<?= base_url(); ?>lib/select2/dist/css/select2.css"</Script>

<body>
<section id="main-content">
    <section class="wrapper">
    <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('pkl'); ?>"> Time Attendance </a><i class="fa fa-angle-right"></i> <a href="<?= base_url('pkl'); ?>"> Form Lembur </a><i class="fa fa-angle-right"></i> Add Form Daftar Lembur</h4>
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('pkl/add_ol/') . $user['name']; ?>" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">KODE LEMBUR</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $dl->dept; ?>" name="dept" type="hidden" readonly>
                                    <input class="form-control input-sm" value="<?= $dl->kode_lembur; ?>" name="kode_lembur" type="text" readonly>
                                    <input value="<?= $dl->tanggal ?>" type="hidden">
                                </div>
                                <!-- <label class="control-label col-lg-2">Tanggal permohonan kerja lembur</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= date_format(date_create($dl->tanggal), 'd M Y'); ?>" type="text" readonly>
                                    <input value="<?= $dl->tanggal ?>" name="tanggal_permohonan" type="hidden">
                                </div> -->
                            </div>
                            <div class="form-group has-warning">
                                <label class="control-label col-lg-2"><b>*Shift</b></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" value="<?= $dl->shift; ?>" name="shift" type="hidden">
                                    <input class="form-control input-sm" value="<?php 
                                                                                    $_shift = $dl->shift;
                                                                                    $query_shift = "SELECT * FROM shift WHERE `desc` = '$_shift' ";
                                                                                    $data_shift = $this->db->query($query_shift)->row();

                                                                                    echo $data_shift->ket;
                                                                                ?>" type="text" readonly>
                                </div>
                                <label class="control-label col-lg-2"><b>*Tanggal</b></label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" name="tanggal" type="date" required>
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
                                                <div class="col-sm-5">
                                                    *No Absensi
                                                </div>
                                                <div class="col-sm-7">
                                                    Istirahat
                                                </div>
                                            </th>
                                            <th colspan="2"><center>*Waktu Lembur</center></th>
                                            <th>*Total Jam Lembur</th>
                                            <th>Tujuan Lembur</th>
                                            <th>Tipe Lembur</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <div class="col-sm-5">

                                                </div>
                                                <div class="col-sm-7">
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
                                            <th>
                                                <div class="checkbox">
                                                        <label title="Berdasarkan data 1">
                                                            <input type="checkbox" class="check_as_one_tipeLembur" value=""><small><strong>Same as 1</strong></small>
                                                        </label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query_pkl = $this->db->query("SELECT
                                                a.id, a.no_scan, b.nama 
                                            FROM
                                                permohonan_kerja_lembur a
                                                LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.no_scan = a.no_scan 
                                            WHERE
                                                a.kode_lembur ='$dl->kode_lembur'")->result_array();
                                            $no = 1;
                                            $t1 = 1;
                                            $t2 = 1;
                                            $t  = 1;
                                        ?>
                                        <?php foreach ($query_pkl as $dp) : ?>
                                        <tr>
                                            <td>
                                                <center>
                                                    <a href="<?= base_url(); ?>pkl/delete_overtime_list/<?= $dp['id']; ?>" title="hapus dari daftar lembur dan permohonan lembur">
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center><b><?= $no++; ?></b></center>
                                            </td>
                                            <td>
                                                <input value="<?= $dp['id']; ?>" name="id[]" type="hidden">
                                                <input class="form-control input-sm" value="<?= $dp['nama']; ?>" name="nama[]" id="nama<?= $dp['no_scan']; ?>" title="nama karyawan lembur" type="text" required>
                                            </td>
                                            <td>
                                                <div class="col-sm-6">
                                                    <input class="form-control input-sm " name="no_absen[]" type="text" value="<?= $dp['no_scan']; ?>" title="Nomor Absen Karayawan" id="no_scan<?= $dp['no_scan']; ?>" readonly>
                                                </div>
                                                <div class="col-sm 6">
                                                    <select class="form-input input-sm rest" name="istirahat[]" id="istirahat<?= $dp['no_scan']; ?>" title="Total Istirahat">
                                                        <option value="0">Full</option>
                                                        <option value="1">1 Jam</option>
                                                        <option value="0.5">1/2 Jam</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <input class="form-control input-sm start" name="wl_1[]" type="time" onLoad="wl_1<?= $dp['no_scan']; ?>" id="wl_1<?= $dp['no_scan']; ?>" placeholder="--.--" title="Waktu Mulai Lembur" required>
                                            </td>
                                            <td>
                                                <input class="form-control input-sm end" name="wl_2[]" type="time" onLoad="wl_2<?= $dp['no_scan']; ?>" id="wl_2<?= $dp['no_scan']; ?>" placeholder="--.--" title="Waktu Selesai Lembur" required>
                                            </td>
                                            <td>
                                                <input class="form-control input-sm sum" name="total_jam_lembur[]" type="number" step="0.01" id="total_jam_lembur<?= $dp['no_scan']; ?>" title="Total jam lembur" required>
                                            </td>
                                            <td>
                                                <input class="form-control input-sm purpose" name="keterangan[]" type="text" placeholder="..." title="Keterangan lain-lain">
                                            </td>
                                            <td>
                                                <div class="col-sm 6">
                                                    <select class="form-control input-sm tipeLembur" name="status_tipe_lembur[]" title="Tipe Lembur" required >
                                                    <option value="kosong" disabled selected>Pilih Jenis Lembur</option>
                                                        <option value="Awal">Lembur Awal</option>
                                                        <option value="Akhir">Lembur Akhir</option>
                                                        <option value="">Lembur Biasa/Hari Libur</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <script type="text/javascript">
                                                $(document).ready(function(){
                                                    // START HITUNG WAKTU DAN MENGURANI OTOMATIS ISTIRAHAT
                                                        $('#wl_1<?= $dp['no_scan']; ?>').change(function(){
                                                            _wl_1 = document.getElementById('wl_1<?= $dp['no_scan']; ?>').value;
                                                            _wl_2 = document.getElementById('wl_2<?= $dp['no_scan']; ?>').value;
                                                            istirahat = document.getElementById('istirahat<?= $dp['no_scan']; ?>').value;

                                                            if ( _wl_2 < _wl_1) {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            } else {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            }

                                                            hasil = ((hours * 60) + minutes) / 60;

                                                            hasil_istirahat = hasil - istirahat;

                                                            document.getElementById('total_jam_lembur<?= $dp['no_scan']; ?>').value = hasil_istirahat;
                                                        });
                                                        
                                                        $('#wl_2<?= $dp['no_scan']; ?>').change(function(){
                                                            _wl_1 = document.getElementById('wl_1<?= $dp['no_scan']; ?>').value;
                                                            _wl_2 = document.getElementById('wl_2<?= $dp['no_scan']; ?>').value;
                                                            istirahat = document.getElementById('istirahat<?= $dp['no_scan']; ?>').value;

                                                            if ( _wl_2 < _wl_1) {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            } else {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            }

                                                            hasil = ((hours * 60) + minutes) / 60;
                                                            
                                                            hasil_istirahat = hasil - istirahat;

                                                            document.getElementById('total_jam_lembur<?= $dp['no_scan']; ?>').value = hasil_istirahat;
                                                        });

                                                        $('#istirahat<?= $dp['no_scan']; ?>').change(function(){
                                                            _wl_1 = document.getElementById('wl_1<?= $dp['no_scan']; ?>').value;
                                                            _wl_2 = document.getElementById('wl_2<?= $dp['no_scan']; ?>').value;

                                                            istirahat = document.getElementById('istirahat<?= $dp['no_scan']; ?>').value;

                                                            if ( _wl_2 < _wl_1) {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0] + 24;
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            } else {
                                                                hours       = _wl_2.split(':')[0] - _wl_1.split(':')[0];
                                                                minutes     = _wl_2.split(':')[1] - _wl_1.split(':')[1];
                                                            }

                                                            hasil = ((hours * 60) + minutes) / 60;

                                                            hasil_istirahat = hasil - istirahat;

                                                            document.getElementById('total_jam_lembur<?= $dp['no_scan']; ?>').value = hasil_istirahat;
                                                        });
                                                    // END HITUNG WAKTU DAN MENGURANI OTOMATIS ISTIRAHAT

                                                    // START SEARCH NAMA
                                                        $('#wl_1<?= $dp['no_scan']; ?>').change(function(){
                                                            var _nama    = document.getElementById('no_scan<?= $dp['no_scan']; ?>').value;
                                                            var _none    = "Nama tidak ditemukan";

                                                            $.ajax ({
                                                                type: 'POST',
                                                                url: '<?= base_url()."pkl/search_nama" ?>/' + <?= $dp['no_scan']; ?>,
                                                                dataType: 'json',
                                                                success: function(dataSearch){
                                                                    document.getElementById('nama<?= $dp['no_scan']; ?>').value = dataSearch[0].nama;
                                                                }
                                                            });
                                                        });
                                                        
                                                        $('#wl_2<?= $dp['no_scan']; ?>').change(function(){
                                                            var _nama    = document.getElementById('no_scan<?= $dp['no_scan']; ?>').value;
                                                            var _none    = "Nama tidak ditemukan";

                                                            $.ajax ({
                                                                type: 'POST',
                                                                url: '<?= base_url()."pkl/search_nama" ?>/' + <?= $dp['no_scan']; ?>,
                                                                dataType: 'json',
                                                                success: function(dataSearch){
                                                                    document.getElementById('nama<?= $dp['no_scan']; ?>').value = dataSearch[0].nama;
                                                                }
                                                            });
                                                        });
                                                    // END SERACH NAMA
                                                });
                                            </script>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <br>
                            <div class="adv-table" align="center">
                                <table class="display">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th><center>Dibuat Oleh : </center></th>
                                            <th><center>Diperiksa Oleh : </center></th>
                                            <th><center>Disetujui Oleh : </center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->dibuat_oleh_nama; ?>" name="dibuat_oleh_nama" type="text" required></td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->diperiksa_oleh_nama; ?>" name="diperiksa_oleh_nama" type="text" required></td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->dt_disetujui_nama; ?>" name="disetujui_oleh_nama" type="text" required></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->dibuat_oleh_jabatan; ?>" name="dibuat_oleh_jabatan" type="text" required></td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->diperiksa_oleh_jabatan; ?>" name="diperiksa_oleh_jabatan" type="text" required></td>
                                            <td><input class="form-control input-sm col-lg-2" value="<?= $dl->dt_disetujui_jabatan; ?>" name="disetujui_oleh_jabatan" type="text" required></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td colspan="3"><input class="form-control input-sm col-lg-2" name="tanggal_ttd" type="date" required></td>
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
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
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
            // console.log(value_rest);
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

        $(".check_as_one_tipeLembur").click(function() {
            var value_tipeLembur = $("table.display tbody tr:eq(0) td:eq(8) div:eq(0) select option:selected").val();

            if ($(this).prop("checked")) {
                $(".form-control.input-sm.tipeLembur").val(value_tipeLembur);
                console.log(value_tipeLembur);
            } else if ($("#check_as_one_tipeLembur").prop("checked") == false){
                console.log("tipe Lembur not doing anything!");
            }
        });

        $("table.display tbody tr:eq(0) td:eq(8) div:eq(0) select option:selected").change(function(){
            var value_tipeLembur = $("table.display tbody tr:eq(0) td:eq(8) div:eq(0) select option:selected").val();
            
            if ($(".check_as_one_tipeLembur").prop("checked") == true) {
                $(".form-control.input-sm.tipeLembur").val(value_tipeLembur);
            } else if ($("#check_as_one_tipeLembur").prop("checked") == false){
                console.log("tipe Lembur not doing anything!");
            }
        });

        
      });
</script>


