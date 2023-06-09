<script src="<?= base_url(); ?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kode5kpd').change(function(){
            var _kode5kpd = document.getElementById('kode5kpd').value;
            $.ajax ({
                type: 'POST',
                url: '<?= base_url()."kpi_karyawan/search_targetkode5kpd" ?>/' + _kode5kpd,   
                dataType: 'json',
                success: function(data){
                    document.getElementById('target1').value = data[0].target;
                    }
            });
        });
    });
</script>
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="#" class="btn btn-success" data-target="#modal-tambah" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> <span>Tambah data..</span></a>
                    <?php if($user['dept'] == "DIT" or $user['dept'] == "HRD") : ?>
                    <a href="<?= base_url('Kpi_karyawan/ExportToExcell'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
                <?php endif; ?>
                </div>
                </div>
            <div class="modal fade bd-example-modal-lg" id="modal-tambah" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form role="form" action="<?= base_url(); ?>kpi_karyawan/tambah_ipp/" method="POST">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Data BSC</h4>
                            </div>
                            <div class="modal-body" style="border-radius: 5px; background-color: #f2f2f2; padding: 20px;">
                                <label><b><i><u>Lengkapi form dibawah ini</u></i></b></label><br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <input type="text" title="Kode IPP" placeholder="Otomatis Kode IPP.." class="form-control input-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                                <input type="date" name="tgl" title="Tanggal" class="form-control input-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                </span>
                                                <select name="no_scan" style='width: 100%' class="form-control input-sm select2">
                                                    <option value="" disabled selected>No scan karyawan</option>
                                                    <?php
                                                        $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                                    ?>
                                                    <?php foreach ($makar as $dMakar) : ?>
                                                        <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == set_value('no_scan')) {
                                                            echo "SELECTED";
                                                        } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="fa fa-users"></span>
                                                </span>
                                                <select name="no_scan_atasan" style='width: 100%' class="form-control input-sm select2">
                                                    <option value="" disabled selected>No scan atasan karyawan</option>
                                                    <?php
                                                        $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif=1")->result_array();
                                                    ?>
                                                    <?php foreach ($makar as $dMakar) : ?>
                                                        <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == set_value('no_scan')) {
                                                            echo "SELECTED";
                                                        } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="fa fa-tags"></span>
                                                </span>
                                                <select name="kode5kpd" id="kode5kpd" style='width: 100%' class="form-control input-sm select2">
                                                    <option value="" disabled selected>Kode 5 KPD (KPI Departemen)</option>
                                                    <?php
                                                        $kode5kpd = $this->db->query("SELECT kode5, kpi_dept FROM kode5kpd")->result_array();
                                                    ?>
                                                    <?php foreach ($kode5kpd as $Dkode5) : ?>
                                                        <option value="<?= $Dkode5['kode5'] ?>" <?php if ($Dkode5['kode5'] == set_value('kode5kpd')) {
                                                            echo "SELECTED";
                                                        } ?>><?= $Dkode5['kode5']; ?> - <?= $Dkode5['kpi_dept']; ?> </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <input type="text" name="target1" id="target1" class="form-control input-sm" placeholder="Target..">
                                            </div>
                                        </div>
                                        <div class="col-lg" style="margin-top: 5px;">
                                            <div class="input-group">
                                                <span class="input-group-addon"  id="sepreated">
                                                    <span class="glyphicon glyphicon-tasks"></span>
                                                </span>
                                                <select class="form-control input-sm " name="jenis" style="width: 100%;">
                                                    <option disabled selected>Pilih jenis</option>
                                                    <option value="HIG (high is good)">High Is Good</option>
                                                    <option value="HIB (high is bad)">High Is Bad</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="showback">
                <?= $this->session->flashdata('message'); ?>
                    <h4><i class="fa fa-angle-right"></i> KPI Individu</h4>
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th width="50px"><i class="fa fa-gear"></i></th>
                                <th width="100px">Kode6</th>
                                <th width="100px">Tanggal</th>
                                <th width="100px">No Scan</th>
                                <th width="100px">Nama Karyawan</th>
                                <th width="100px">Jabatan Karyawan</th>
                                <th width="100px">Dept</th>
                                <th width="100px">No Scan Atasan</th>
                                <th width="100px">Kode5</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></>
                    <script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            tampil_KPIindividu();
                           
                            $('#mydata').dataTable({
                                "aoColumnDefs": [{
                                "bSortable": true,
                                "aTargets": [0]
                                }],
                                "aaSorting": [
                                    [3, 'asc']
                                ]
                            });
                            //fungsi tampil kpi individu
                            function tampil_KPIindividu(){
                                $.ajax({
                                    type  : 'ajax',
                                    url   : '<?= base_url()?>kpi_karyawan/kpi_individu',
                                    async : false,
                                    dataType : 'json',
                                    success : function(data){
                                        var html = '';
                                        var i;
                                        var no = 1;
                                        for(i = 0; i < data.length; i++){
                                            html += '<tr class="gradeX">'+
                                                        `<td>
                                                            <li class="dropdown" style="list-style-type:none;">
                                                                <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="<?= base_url(); ?>kpi_karyawan/print_kpi_individu/`+data[i].no_scan+`"><i class="fa fa-print"></i> <b>Print</b></a></li>
                                                                    <li><a href="<?= base_url('kpi_karyawan/edit_ipp/'); ?>`+data[i].id+`"><i class="fa fa-edit"></i><b> Ubah</b></a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#" style="color: black; font-size:13px;" data-target="#modal-delete`+data[i].id+`" data-toggle="modal"><i class="fa fa-trash"></i><b> Hapus</b></a></li>
                                                                </ul>
                                                                <div class="modal fade" id="modal-delete`+data[i].id+`">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <form class="form-horizontal" action="<?= base_url(); ?>kpi_karyawan/hapus_ipp/`+data[i].id+`" method="post">
                                                                                <div class="container">
                                                                                    <h1>Hapus Data</h1>
                                                                                    <p>Apakah anda yakin ingin menghapus data `+data[i].kode6+`?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 100%; padding: 5px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 1px; box-sizing: border-box;">Close</button>
                                                                                    <button type="submit" class="btn btn-danger" name="submit" style="width: 100%; padding: 5px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 1px; box-sizing: border-box;">Delete</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </td>`+
                                                        '<td style="display: none;">'+[no++]+'</td>'+
                                                        `<td><a href="<?= base_url('kpi_karyawan/edit_ipp/'); ?>`+data[i].id+`"><b>`+data[i].kode6+`</b></a></td>`+
                                                        `<td>`+data[i].tgl+`</td>`+
                                                        `<td>`+data[i].no_scan+`</td>`+
                                                        `<td>`+data[i].nama+`</td>`+
                                                        `<td>`+data[i].jabatan+`</td>`+
                                                        `<td>`+data[i].dept+`</td>`+
                                                        `<td>`+data[i].no_scan_atasan+`</td>`+
                                                        `<td>`+data[i].kode5kpd+`</td>`+
                                                    '</tr>';
                                        }
                                        $('#show_data').html(html);
                                    }
                                });
                            }
                        });
                    </script>
                    <br><br>
                </div>
            </div>
        </div>
    </section>
</section>
            