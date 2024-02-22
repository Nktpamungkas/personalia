    <script type="text/javascript">
function functionGaji() {
    var checkBox = document.getElementById('gaji');
    if (checkBox.checked == true){
        $.ajax ({
        type: 'POST',
        url: '<?= base_url()."data_karyawan/search_gaji" ?>',
        dataType: 'json',
        success: function(data){
            document.getElementById('upah').value = data[0].gaji;
            }
        });
    } else {
        document.getElementById('upah').value = " "
    }
}
   
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="form">
                        <form class="cmxform form-horizontal style-form" action="<?= base_url('PKWT/add_pkwt/') . $makar->no_scan; ?>" method="post">
                        <p><?= $this->session->flashdata('message'); ?></p>
                            <div class="form-group col-md-12">
                                <label class="control-label col-lg-2">Status Karyawan <span style="color: red">(*)</span></label>
                                <div class="col-lg-4">
                                    <select class="form-control chosen-select" data-placeholder="Pilih Status Karyawan..." name="status_karyawan" required>
                                        <?php
                                            $queryStatus = $this->db->query('SELECT * FROM `status` WHERE NOT id="tetap" AND NOT id="Resigned"')->result_array();
                                        ?>
                                        <option value="" disabled selected></option>
                                        <?php foreach ($queryStatus as $ds) : ?>
                                            <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == set_value('status_karyawan')) {
                                            echo "SELECTED";
                                            } ?>><?= $ds['jabatan'] . ' - ' . $ds['id'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="control-label col-lg-2">Upah</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" name="upah" id="upah" type="text" required>
                                </div>
                                <div class="col-lg-4">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" onclick="functionGaji()" name="gaji" id="gaji" required> Upah Minimum Regional 
                                        (<i>Rp. 
                                            <?php 
                                                $Gaji = $this->db->query("SELECT * FROM tbl_gaji LIMIT 1")->row();
                                                echo $Gaji->gaji;
                                            ?>
                                        </i>)
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                            <label class="control-label col-lg-2">Tgl kontrak awal</label>
                            <div class="col-lg-4">
                                <input class="form-control input-sm" value="<?= set_value('kontrak_awal'); ?>" id="kontrak_awal" name="kontrak_awal" type="date" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-lg-2">Durasi</label>
                            <div class="col-lg-2">
                                <!-- <input class="form-control input-sm" id="durasi" name="durasi" type="text" required>/Bulan <br><i style="font-size: 10px">(To change, please press "Tab")</i> -->
                                <input class="form-control input-sm" type="number" id="durasi" name="durasi" placeholder="Jumlah Bulan" value="" min="1" required>
                                                        
                            </div>
                        </div>

                        <script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
                        <!-- Tambahkan skrip JavaScript berikut -->
                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Mendapatkan elemen input
                                var inputKontrakAwal = document.getElementById('kontrak_awal');
                                var inputDurasi = document.getElementById('durasi');
                                var inputKontrakAkhir = document.getElementById('kontrak_akhir');

                                // Menonaktifkan input tanggal masuk
                                inputKontrakAwal.disabled = true;

                                // Menambahkan event listener pada input jumlah bulan
                                inputDurasi.addEventListener('input', function() {
                                    // Aktifkan tanggal masuk setelah jumlah bulan diisi
                                    inputKontrakAwal.disabled = false;

                                    // Ambil nilai dari input tanggal masuk
                                    var kontrakAwal = new Date(inputKontrakAwal.value);

                                    // Ambil nilai dari input jumlah bulan
                                    var jumlahBulan = parseInt(inputDurasi.value, 10);

                                    // Tambahkan jumlah bulan ke tanggal masuk
                                    kontrakAwal.setMonth(kontrakAwal.getMonth() + jumlahBulan);

                                    // Kurangkan 1 hari dari tanggal akhir
                                    kontrakAwal.setDate(kontrakAwal.getDate() - 1);

                                    // Format tanggal untuk input tanggal evaluasi
                                    var kontrakAkhir = kontrakAwal.toISOString().split('T')[0];

                                    // Set nilai pada input tanggal evaluasi
                                    inputKontrakAkhir.value = kontrakAkhir;
                                });
                            });

                            </script>


                        <div class="form-group col-sm-12">
                            <label class="control-label col-lg-2">Tgl kontrak akhir</label>
                            <div class="col-lg-4">
                                <input class="form-control input-sm" id="kontrak_akhir" name="kontrak_akhir" type="date" readonly>
                            </div>
                        </div>

                            <div class="form-group col-sm-12">
                                <label class="control-label col-lg-2">Keterangan</label>
                                <div class="col-lg-4">
                                    <input class="form-control input-sm" name="libur" type="text" placeholder="Keterangan" required>
                                    <!-- <label style="font-size: 10px;">(Contoh: 01 Maret 2020 - 02 Maret 2020)</label> -->
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="col-lg-offset-2 col-lg-10">
                                <?= form_error('kabupaten_domisili', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
                                <?= form_error('kecamatan_domisili', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
                                <?= form_error('email_pribadi', '<h5 class="text-danger pl-3">*', '</h5>'); ?>
                                <input value=" <?php echo $this->session->name ;?>" name="username" type="hidden">
                                <button class="btn btn-theme" type="submit" name="submit">Save</button>
                                    <a href="<?= base_url('PKWT'); ?>" class="btn btn-theme04">Back</a>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <p>
                                    <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                        <span style="font-size: 16px; padding: 0 10px; color: black;">
                                            <b>* Histori Kontrak</b>
                                        </span>
                                    </div>
                                    <br>
                                </p>
                                <?php if($user['dept'] == "HRD"): ?>
                                    <a href="<?= base_url(); ?>PKWT/printPKWT/<?= $makar->no_scan; ?>" class="btn btn-warning">Print PKWT Terakhir</a>
                                    <a href="<?= base_url(); ?>PKWT/PrintKaryawanPKWT/<?= $makar->no_scan; ?>" class="btn btn-info">Print Data Karyawan PKWT</a>
                                <?php endif; ?>
                            </div>
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                                <thead>
                                    <tr>
                                        <th width="25">No</th>
                                        <th width="125">No Scan</th>
                                        <th width="300">Nama</th>
                                        <th width="100">Departemen</th>
                                        <th width="200">Tgl Kontrak Awal</th>
                                        <th width="200">Tgl Kontrak Akhir</th>
                                        <th width="200">Libur Kontrak</th>
                                        <th width="100">Gaji</th>
                                        <th width="50">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php  
                                        $no_scan = $makar->no_scan;
                                        $data = $this->db->query("SELECT b.id,
                                                                        b.no_scan,
                                                                        b.durasi,
                                                                        a.nama,
                                                                        a.dept,
                                                                        DATE_FORMAT( b.kontrak_awal, '%d %M %Y' ) AS kontrak_awal,
                                                                        DATE_FORMAT( b.kontrak_akhir, '%d %M %Y' ) AS kontrak_akhir,
                                                                        b.kontrak_awal AS f_kontrak_awal,
                                                                        b.kontrak_akhir AS f_kontrak_akhir,
                                                                        b.keterangan,
                                                                        b.gaji,
                                                                        b.status,
                                                                        b.libur
                                                                    FROM
                                                                        tbl_makar a
                                                                        INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                                                        WHERE b.no_scan = '$no_scan' ORDER BY b.id DESC")->result_array();
                                                                        $no = 1;
                                    ?>
                                    <?php foreach($data AS $result) : ?>
                                        <tr class="gradeX">
                                            <td><?= $no++; ?></td>
                                            <td><?= $result['no_scan'] ?></td>
                                            <td><?= $result['nama'] ?></td>
                                            <td><?= $result['dept'] ?></td>
                                            <td><?= $result['kontrak_awal'] ?></td>
                                            <td><?= $result['kontrak_akhir'] ?></td>
                                            <td><?= $result['libur'] ?></td>
                                            <td align="right"><?= $result['gaji'] ?></td>
                                            <td><?= $result['keterangan'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
                            <script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
                            <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    tampil_data_kontrak();   //pemanggilan fungsi tampil employee.
                                    
                                    $('#mydata').dataTable();
                                    
                                    //fungsi tampil employee
                                    function tampil_data_kontrak(){
                                        $.ajax({
                                            type  : 'ajax',
                                            url   : '<?= base_url()?>pkwt/history/<?= $makar->no_scan; ?>',
                                            async : false,
                                            dataType : 'json',
                                            success : function(data){
                                                var html = '';
                                                var i;
                                                var no = 1;
                                                for(i = 0; i < data.length; i++){
                                                    html += '<tr class="gradeX">'+
                                                                '<td>'+[no++]+'</td>'+
                                                                '<td>'+data[i].no_scan+'</td>'+
                                                                '<td>'+data[i].nama+'</td>'+
                                                                '<td>'+data[i].dept+'</td>'+
                                                                '<td>'+data[i].kontrak_awal+'</td>'+
                                                                '<td>'+data[i].kontrak_akhir+'</td>'+
                                                                '<td>'+data[i].libur+'</td>'+
                                                                '<td align="right">'+data[i].gaji+'</td>'+
                                                                '<td>'+data[i].keterangan+'</td>'+
                                                            '</tr>';
                                                }
                                                $('#show_data').html(html);
                                            }
                                        });
                                    }

                                });
                            </script> 
                        </form>
                    </div>
                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
    </section>
</section>