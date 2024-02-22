<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Lembur </h4>
        <div class="col-md-6">
            <p>
                <form action="<?= base_url('pkl/show_verifikasi'); ?>" method="POST">
                    <a href="<?= base_url('pkl'); ?>" class="btn btn-warning"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                    <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-info">Export to Excel</a>     
                </form>
                <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                    <form action="<?= base_url('pkl/export_excel') ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-calendar"></i> Range Tanggal Export </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <b>Range tanggal berdasarkan Tanggal Lembur</b>
                                                <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                <label>
                                                    Tanggal Mulai
                                                    <input type="date" name="start" class="form-control input-sm" required>
                                                </label>
                                                <label> s/d </label>
                                                <label>
                                                    Tanggal Akhir
                                                    <input type="date" name="stop" class="form-control input-sm" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Export Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <label style="font-size: 14px;">DATA KARYAWAN LEMBUR</label>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="150px">Kode Lembur</th>
                                <th width="150px">Tanggal</th>
                                <th width="150px">Department</th>
                                <th width="100px">Shift</th>
                                <th width="500px">Tujuan Lembur</th>
                                <th >Dibuat Oleh</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                            
                        </tbody>
                    </table>
            <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
            <script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
            <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    tampil_data_index_all();   //pemanggilan fungsi tampil employee.
                        
                    $('#mydata').dataTable({
                        "aoColumnDefs": [{
                        "bSortable": true,
                        "aTargets": [0]
                        }],
                        "aaSorting": [
                            [2, 'asc']
                        ]
                    });
                        
                    //fungsi tampil employee
                    function tampil_data_index_all(){
                        $.ajax({
                            type  : 'ajax',
                            url   : '<?= base_url()?>pkl/data_index_all',
                            async : false,
                            dataType : 'json',
                            success : function(data){
                                var html = '';
                                var i;
                                var no = 1;
                                for(i = 0; i < data.length; i++){
                                    html += 
                                    '<tr class="gradeX">'+
                                         `<td>
                                            <li class="dropdown" style="list-style-type:none;">
                                            <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= base_url(); ?>pkl/tambah_revisi/`+data[i].kode_lembur+`" style="font-size:13px;">Tambah Nama Karyawan Lembur(revisi)</a></li>
                                                <li><a href="<?= base_url(); ?>pkl/add_overtime_list_revisi/`+data[i].kode_lembur+`" style="font-size:13px;"><b>Buat Surat Perintah Lembur(revisi)</b></a></li>
                                            </ul> 
                                            </li>                                       
                                        </td>`+

                                        '<td style="font-size: 12px;"><a href="#" style="text-decoration: underline;">'+data[i].kode_lembur+'</a></td>'+

                                        `<td>`+data[i].tgl_format+`</td>`+
                                        
                                        '<td>'+data[i].dept+'</td>'+

                                        '<td>'+data[i].shift+'</td>'+

                                        '<td>'+data[i].tujuan_lembur+'</td>'+

                                        '<td>'+data[i].dibuat_oleh_nama+'</td>'+

                                        `<td>
                                            <a href="<?= base_url(); ?>pkl/add_overtime_list/`+data[i].kode_lembur+`" class="btn btn-warning btn-xs"><span class="fa fa-check" title="verifikasi"></span></a>

                                            <a href="#" data-toggle="modal" data-target="#modal-delete`+data[i].id+`" class="btn btn-danger btn-xs"><span class="fa fa-trash" title="Hapus"></span></a>
                                            <div class="modal fade" id="modal-delete`+data[i].id+`">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <form class="form-horizontal" action="<?= base_url(); ?>pkl/hapus_permohonan_lembur/`+data[i].kode_lembur+`" method="post">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-trash"> Apakah anda yakin ingin mengahapus data ini?</span></h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>`
                                    '</tr>';
                                }
                                $('#show_data').html(html);
                            }
                        });
                    }

                });
            </script>
                </div>
            </div>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <label style="font-size: 14px;">DATA KARYAWAN YANG SUDAH VERIFIKASI</label>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata2">
                        <thead>
                            <tr>
                                <th width="150px">Kode Lembur</th>
                                <th width="150px">Tanggal</th>
                                <th width="150px">Department</th>
                                <th width="100px">Shift</th>
                                <th width="500px">Tujuan Lembur</th>
                                <th>Dibuat Oleh</th>
                                <th  width="150px">Status</th>
                            </tr>
                        </thead>
                        <tbody id="show_data2">
                            
                        </tbody>
                    </table>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
                    <script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
                    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            tampil_data_index_all_verifikasi();   //pemanggilan fungsi tampil employee.
                                
                            $('#mydata2').dataTable({
                                "aoColumnDefs": [{
                                "bSortable": true,
                                "aTargets": [0]
                                }],
                                "aaSorting": [
                                    [2, 'asc']
                                ]
                            });
                                
                            //fungsi tampil employee
                            function tampil_data_index_all_verifikasi(){
                                $.ajax({
                                    type  : 'ajax',
                                    url   : '<?= base_url()?>pkl/data_index_all_verifikasi',
                                    async : false,
                                    dataType : 'json',
                                    success : function(data){
                                        var html = '';
                                        var i;
                                        var no = 1;
                                        for(i = 0; i < data.length; i++){
                                            html += '<tr class="gradeY">'+
                                                        '<td style="font-size: 12px;"> <a href="<?= base_url(); ?>pkl/add_overtime_list2/'+data[i].kode_lembur+'" style="text-decoration: underline;">'+data[i].kode_lembur+'</a></td>'+
                                                            
                                                        `<td>`+data[i].tgl_format+`</td>`+
                                                        
                                                        '<td>'+data[i].dept+'</td>'+

                                                        '<td>'+data[i].shift+'</td>'+

                                                        '<td>'+data[i].tujuan_lembur+'</td>'+

                                                        '<td>'+data[i].dibuat_oleh_nama+'</td>'+

                                                        '<td>'+data[i].status+'</td>'+
                                                    '</tr>';
                                        }
                                        $('#show_data2').html(html);
                                    }
                                });
                            }

                        });
                    </script>
        </div>
    </section>
</section>