<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
                <div class="row">
                    <div class="col-md-12 mb">
                        <center><h5><b>DATA KARYAWAN KELUAR SEMUA DEPARTEMEN</b></h5></center>
                        <?php if($user['dept'] == "DIT" OR $user['dept'] == "HRD" OR $user['dept'] == "GAC" OR $user['dept'] == "ACC") : ?>
                            <div class="row">
                                <div class="col-md-4 mb">
                                    <label>
                                        <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                                        <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form action="<?= base_url('home/export_excel') ?>" method="POST">
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
                                                                        <h4 class="modal-title"><i class="fa fa-calendar"></i></h4>
                                                                        <label>
                                                                            Dari tanggal
                                                                            <input type="date" name="start" class="form-control input-sm" required>
                                                                        </label>
                                                                        <label> s/d </label>
                                                                        <label>
                                                                            tanggal
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
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                                    <thead>
                                        <tr>
                                            <th width="25">No</th>
                                            <th width="125">No Scan</th>
                                            <th width="300">Nama</th>
                                            <th width="100">Departemen</th>
                                            <th width="200">Tgl Masuk</th>
                                            <th width="200">Tgl Keluar</th>
                                            <th width="50">Jabatan</th>
                                            <th width="50">Status</th>
                                            <th width="50">Option</th>
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
                                        tampil_data_kontrak();   //pemanggilan fungsi tampil employee.
                                        
                                        $('#mydata').dataTable();
                                        
                                        //fungsi tampil employee
                                        function tampil_data_kontrak(){
                                            $.ajax({
                                                type  : 'ajax',
                                                url   : '<?= base_url()?>home/data_keluar',
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
                                                                    '<td>'+data[i].ftgl_masuk+'</td>'+
                                                                    '<td>'+data[i].ftgl_keluar+'</td>'+
                                                                    '<td>'+data[i].jabatan+'</td>'+
                                                                    '<td>'+data[i].status_karyawan+'</td>'+
                                                                    `<td>
                                                                        <?php if ($user['dept'] == "DIT" || $user['dept'] == "HRD" || $user['dept'] == "GAC") : ?>
                                                                            <a href="<?= base_url(); ?>data_karyawan/edit_employee/`+data[i].no_scan+`"><i class="fa fa-eye"></i> View</a>  
                                                                        <?php else : ?>

                                                                        <?php endif; ?>
                                                                        <div class="modal fade" id="modalDelete`+data[i].no_scan+`" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                                                            <form role="form" action="<?= base_url('data_karyawan/delete/') . $user['name'];  ?>" method="POST">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                                                        </div>
                                                                                        <input class="form-control input-sm" value="`+data[i].no_scan+`" name="no_scan" type="hidden">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div> 
                                                                        
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="modalResign`+data[i].no_scan+`" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                                                            <form role="form" action="<?= base_url('data_karyawan/resign/') . $user['name'];  ?>" method="POST">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                            <h4 class="modal-title"><i class="fa fa-sign-out"></i>Resign</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-5">
                                                                                                    <label class="control-label col-lg-12">Masukan Tanggal Resign</label>
                                                                                                </div>
                                                                                                <div class="col-lg-7">
                                                                                                    <input value="`+data[i].no_scan+`" id="no_scan" name="no_scan" type="hidden" >
                                                                                                    <input class="form-control input-sm" value="`+data[i].tgl_resign+`" name="tgl_resign" type="date" required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
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
                </div>
                <div class="row">
                    <div class="col-md-4 mb">
                        
                    </div>
                    <div class="col-md-4 mb">
                        
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    
                </div>
                <!-- /col-md-4 -->
                </div>
            </div>
            <div class="col-lg-3 ds">
                <h4 class="centered mt">ANGGOTA TEAM ONLINE</h4>
                <?php
                $dataLogged     = $this->db->get_where('user', array('logged' => '1'))->result_array();
                ?>
                <?php foreach($dataLogged AS $dl) : ?>
                <div class="desc">
                    <div class="thumb">
                        <img class="img-circle" src="<?= base_url() ?>img/on.gif" width="16px" height="16px" align="">
                    </div>
                    <div class="details">
                        <p>
                            <a href="#" data-toggle="modal" data-target="#modalName<?= $dl['id']; ?>" style="color: black;"><?= $dl['name']; ?></a><br />
                            <muted>Available</muted>
                        </p>
                    </div>
                </div>
                <div class="modal fade" id="modalName<?= $dl['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalName">
                    <form role="form" action="<?= base_url('setting/add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="thumb">
                                    <img class="img-circle" src="<?= base_url() ?>img/<?= $dl['image']; ?>" width="35px" height="35px" align="">
                                </div>
                                    <h3 class="modal-title">Profile of member</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-4">Nama</label>
                                        <label class="col-sm-6"> : <?= $dl['name']; ?></label>
                                        <label></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Email</label>
                                        <label class="col-sm-6"> : <?= $dl['email']; ?></label>
                                        <label></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Tanggal Registration</label>
                                        <label class="col-sm-6"> : <?= date('d F Y', $dl['date_created']); ?></label>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endforeach ?>
                
                <div id="calendar" class="mb">
                    <div class="panel green-panel no-margin">
                        <div class="panel-body">
                            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="disadding: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>