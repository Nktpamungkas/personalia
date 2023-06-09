<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
        <div class="col-lg-25">
            <div class="showback">
                <div class="row">
                    <div class="col-md-500 mb">
                        <center><h5><b>DATA STATUS SERAGAM DAN ID CARD KARYAWAN</b></h5></center>
                        <?php if($user['dept'] == "DIT" OR $user['dept'] == "HRD") : ?>
                            <div class="row">
                                <div class="col-md-4 mb">
                                    <label>
                                        <a href="#" data-toggle="modal" data-target="#modalExport" class="btn btn-default btn-sm">Export to Excel</a>
                                        <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form action="<?= base_url('home/export_excel_Status_seragam') ?>" method="POST">
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
                                            <th width="15"><i class="fa fa-gear"></th>
                                            <th width="10">No</th>
                                            <th width="80"><center>No Scan</center></th>
                                            <th width="300"><center>Nama</center></th>
                                            <th width="80"><center>Departemen</center></th>
                                            <th width="250"><center>Jabatan</center></th>
                                            <th width="200"><center>Tanggal Masuk</center></th>
                                            <th width="150"><center>Masa Kerja (Bulan)</center></th>
                                            <th width="170"><center>Status Seragam Dan ID Card</center></th>
                                            <th width="200"><center>Tanggal Menerima Seragam</center></th>
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
                                        tampil_data_Seragam();   //pemanggilan fungsi tampil employee.
                                        
                                        $('#mydata').dataTable();
                                        
                                        //fungsi tampil employee
                                        function tampil_data_Seragam(){
                                            $.ajax({
                                                type  : 'ajax',
                                                url   : '<?= base_url()?>home/data_status_idcseragam_dept',
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
                                                                    <li><a href="#" data-toggle="modal" data-target="#modalIDCseragam`+data[i].no_scan+`"><i class="fa fa-sign-out"></i>  Send Email</a></li>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>   
                                                        <!-- Modal Resign-->
                                                        <div class="modal fade" id="modalIDCseragam`+data[i].no_scan+`" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                                            <form role="form" action="<?= base_url('home/edit_status_seragam/') . $user['name'];  ?>" method="POST">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title"><i class="fa fa-sign-out"></i>Send Email Employee Status Id Card Seragam</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">No Scan </label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                <input class="form-control input-sm" value="`+data[i].no_scan+`" name="no_scan" readonly>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Nama</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                <input class="form-control input-sm" value="`+data[i].nama+`" name="nama" readonly>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Departemen</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                <input class="form-control input-sm" value="`+data[i].dept+`" name="dept" readonly>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Jabatan</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                   <input class="form-control input-sm" value="`+data[i].jabatan+`" name="jabatan" readonly>
                                                                                 </div>
                                                                                 <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Tanggal Masuk</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                   <input class="form-control input-sm" value="`+data[i].tgl_masuk+`" name="tgl_masuk" readonly>
                                                                                 </div>
                                                                                 <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Tanggal Terimas Id Card Seragam</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                   <input class="form-control input-sm" value="`+data[i].tgl_seragam+`" name="tgl_masuk" readonly>
                                                                                   <input class="form-control input-sm" value="`+data[i].dept_email1+`" name="email1" type="hidden">
                                                                                   <input class="form-control input-sm" value="`+data[i].dept_email2+`" name="email2" type="hidden">
                                                                                   <input class="form-control input-sm" value="`+data[i].dept_email3+`" name="email3" type="hidden">
                                                                                   <input class="form-control input-sm" value="`+data[i].dept_email4+`" name="email4" type="hidden">
                                                                                   <input class="form-control input-sm" value="`+data[i].dept_email5+`" name="email5" type="hidden">
                                                                                 </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Send Email</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>                                             
                                                     </td>`+
                                                    '<td>'+[no++]+'</td>'+
                                                    '<td><center>'+data[i].no_scan+'</center></td>'+
                                                    '<td>'+data[i].nama+'</td>'+
                                                    '<td><center>'+data[i].dept+'</center></td>'+
                                                    '<td>'+data[i].jabatan+'</td>'+
                                                    '<td><center>'+data[i].tgl_masuk+'</center></td>'+
                                                    '<td><center>'+data[i].masa_kerja+'</center></td>'+
                                                    '<td><center>'+data[i].status_seragam+'</center></td>'+
                                                    '<td><center>'+data[i].tgl_seragam+'</center></td>'+
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
                    <div class = "col-md-4">
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3 ds">
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
            </div> -->
                </div>
                </div>
        </div>
    </section>
</section>