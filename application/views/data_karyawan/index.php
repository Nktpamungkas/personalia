<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Employee Information</h4>
        <div class="col-md-6">
             <?php if($user['dept'] == "HRD") : ?>
                <p class="inline">
                    <a href="<?= base_url('data_karyawan/addNewEmployee'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Employee</a></<a>
                    <!-- <a href="<?= base_url('users/index'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Upload Data New Employee</a></<a> -->
                    <a href="<?= base_url('data_karyawan/ExportToExcell'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
            <?php endif; ?>
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
                                <th><center>Tanggal Tetap</center></th>
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
                            tampil_data_employee();   //pemanggilan fungsi tampil employee.
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
                            function tampil_data_employee(){
                                $.ajax({
                                    type  : 'ajax',
                                    url   : '<?= base_url()?>data_karyawan/data_employee',
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
                                                                    <li><a href="<?= base_url(); ?>data_karyawan/edit_employee/`+data[i].no_scan+`"><i class="fa fa-edit"></i> Edit</a></li>
                                                                    <li><a href="#" data-toggle="modal" data-target="#modalResign`+data[i].no_scan+`"><i class="fa fa-sign-out"></i>Pengajuan Resign</a></li>
                                                                    <li><a href="<?= base_url(); ?>data_karyawan/print_datakaryawan/`+data[i].no_scan+`"><i class="fa fa-print"></i> Print</a></li>
                                                                    <li><a href="<?= base_url(); ?>data_karyawan/tanda_tangan/`+data[i].no_scan+`"><i class="fa fa-gears"></i> Buat Tanda Tangan</a></li>
                                                                    <li><a href="<?= base_url(); ?>Career_adm/AddCareerTransition/`+data[i].no_scan+`"><i class="fa fa-gears"></i> Career Transition</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#" data-toggle="modal" data-target="#modalDelete`+data[i].no_scan+`"><i class="fa fa-trash"></i> Delete</a></li>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>

                                                        <!-- Modal Delete Karyawan -->
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
                                                        
                                                        <!-- Modal Resign-->
                                                        <div class="modal fade" id="modalResign`+data[i].no_scan+`" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                                            <form role="form" action="<?= base_url('data_karyawan/resign/') . $user['name'];  ?>" method="POST">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title"><i class="fa fa-sign-out"></i>Proses Resign</h4>
                                                                        </div>
                                                                        <div class="modal-body" width = '480'>
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
                                                                                    <label class="control-label col-lg-12">Masukan Tanggal  Resign</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                    <input value="`+data[i].no_scan+`" id="no_scan" name="no_scan" type="hidden" >
                                                                                    <input class="form-control input-sm" value="`+data[i].tgl_resign+`" name="tgl_resign" type="date" required>
                                                                                </div>
                                                                                <div class="col-lg-5">
                                                                                    <label class="control-label col-lg-12">Keterangan Resign</label>
                                                                                </div>
                                                                                <div class="col-lg-7">
                                                                                    <input value="`+data[i].no_scan+`" id="no_scan" name="no_scan" type="hidden" >
                                                                                    <select class="select2" name="ket_resign" data-placeholder="Pilih Keterangan Resign" required>
                                                                                    <option value="" disabled selected>---------------------------------------------------</option>
                                                                                    <?php $queryketresign = $this->db->get('ket_resign')->result_array();?>
                                                                                    <?php foreach ($queryketresign as $dp) : ?>
                                                                                    <option value="<?= $dp['desc_resign'] ?>" <?php if ($dp['desc_resign'] == set_value('desc_resign')) { echo "SELECTED";} ?>><?= $dp['desc_resign'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
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
                                                    </td>`+
                                                    '<td>'+[no++]+'</td>'+
                                                    '<td>'+data[i].no_scan+'</td>'+
                                                    '<td>'+data[i].nama+'</td>'+
                                                    '<td>'+data[i].dept+'</td>'+
                                                    '<td>'+data[i].bagian+'</td>'+
                                                    '<td>'+data[i].jabatan+'</td>'+
                                                    '<td><center>'+data[i].tgl_masuk+'</center></td>'+
                                                    '<td><center>'+data[i].tgl_tetap+'</center></td>'+
                                                    '<td>'+data[i].status_karyawan+'</td>'+
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
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No Scan</th>
                                <th>Nama Karyawan</th>
                                <th>Department</th>
                                <th>Tanggal Masuk</th>
                                <th>Kontrak Awal</th>
                                <th>Kontrak Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $data = $this->db->query("SELECT no_scan, nama, dept,
                                                            date_format(tgl_masuk, '%d-%m-%Y') as tgl_masuk
                                                            FROM
                                                                tbl_makar 
                                                            WHERE
                                                                status_karyawan LIKE '%Kontrak%' 
                                                            ORDER BY
                                                                no_scan DESC")->result_array();
                            ?>
                            <?php foreach ($data as $dd) : ?>
                                <?php
                                    $noscan = $dd['no_scan'];
                                    $data_kontrak = $this->db->query("SELECT no_scan,
                                                                        kontrak_awal,
                                                                        kontrak_akhir 
                                                                    FROM
                                                                        tbl_kontrak 
                                                                    WHERE
                                                                        id IN ( SELECT MAX( id ) FROM tbl_kontrak GROUP BY no_scan ) AND no_scan = '$noscan'")->row();
                                ?>
                            <tr>
                                <td><?= $dd['no_scan']; ?></td>
                                <td><?= $dd['nama']; ?></td>
                                <td><?= $dd['dept']; ?></td>
                                <td><?= $dd['tgl_masuk']; ?></td>
                                <td><?php error_reporting(0); echo $data_kontrak->kontrak_awal; ?></td>
                                <td><?php error_reporting(0); echo $data_kontrak->kontrak_akhir; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </section>
</section>
