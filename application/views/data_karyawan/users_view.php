<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i><a href="<?= base_url('data_karyawan'); ?>"> Employee Information </a><i class="fa fa-angle-right"></i> Import New Employee</h4>
        <div class="col-md-6">
             <?php if($user['dept'] == "HRD") : ?>
                <p class="inline">
                    <a href="<?= base_url('data_karyawan'); ?>" class="btn btn-warning"><i class=" fa fa-reply"></i>&nbsp;&nbsp;Back</a>
                    <a href="#" data-toggle="modal" data-target="#modalImport" class="btn btn-info">Import Data Employee</a>
                    <a href="<?= base_url('users/index_verified'); ?>" class="btn btn-info btn"></i>&nbsp;&nbsp;Data New Employee Verified</a></<a>
            <?php endif; ?>
                </p>
                <p>
                <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImport" aria-hidden="true">
                    <form action="<?= base_url('Users/import_employee'); ?>" method="POST"enctype="multipart/form-data">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-plus"></i> Import data karyawan Baru </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label col-lg-4">File Data Karyawan<span style="color: red">(*)</span></label>
                                            <div class="col-lg-8">
                                                <input type='file' name='file_data_employee' > 
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" value='Upload' name="upload" class="btn btn-success">Import</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th width="50"></th>
                                <th><center>No</center></th>
                                <th><center>No Scan</center></th>
                                <th><center>Nama Karyawan</center></th>
                                <th><center>Department</center></th>
                                <th><center>Bagian</center></th>
                                <th><center>Jabatan</center></th>
                                <th><center>Tanggal Masuk</center></th>
                                <th><center>Status Karyawan</center></th>
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
                            tampil_data_employee_TEMP();   //pemanggilan fungsi tampil employee.
                            $('#mydata').dataTable({
                                "aoColumnDefs": [{
                                "bSortable": true,
                                "aTargets": [0]
                                }],
                                "aaSorting": [
                                    [3, 'asc']
                                ]
                            });
                            
                            //fungsi tampil employee
                            function tampil_data_employee_TEMP(){
                                $.ajax({
                                    type  : 'ajax',
                                    url   : '<?= base_url()?>data_karyawan/data_employee_temp',
                                    async : false,
                                    dataType : 'json',
                                    success : function(data){
                                        var html = '';
                                        var i;
                                        var no = 1;
                                        for(i = 0; i < data.length; i++){
                                            html += '<tr class="gradeX">'+
                                                    `<td>
                                                        <?php if ($user['special_user'] == 1) : ?>
                                                            <li class="dropdown" style="list-style-type:none;">
                                                                <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                                                <ul class="dropdown-menu">
                                                                <li><a href="<?= base_url(); ?>data_karyawan/edit_employee_temp/`+data[i].no_scan+`"><i class="fa fa-edit"></i> Verifikasi</a></li>
                                                           </li>
                                                        <?php endif; ?>          
                                                    </td>`+
                                                    '<td>'+[no++]+'</td>'+
                                                    '<td>'+data[i].no_scan+'</td>'+
                                                    '<td>'+data[i].nama+'</td>'+
                                                    '<td>'+data[i].dept+'</td>'+
                                                    '<td>'+data[i].bagian+'</td>'+
                                                    '<td>'+data[i].jabatan+'</td>'+
                                                    '<td><center>'+data[i].tgl_masuk+'</center></td>'+
                                                    '<td>'+data[i].status_verifikasi+'</td>'+
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
    </section>
</section>
