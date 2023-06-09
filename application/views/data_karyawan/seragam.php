<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Employee Information | Data seragam </h4>
        <div class="col-md-6">
            <p class="inline">
                <?php if($user['dept'] == "HRD") : ?>
                    <a href="<?= base_url('data_karyawan/ExportSeragam'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
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
                                <th>No</th>
                                <th>No Scan</th>
                                <th>Nama Karyawan</th>
                                <th>Jenis Kelamin</th>
                                <th>Department</th>
                                <th>Bagian</th>
                                <th>Jabatan</th>
                                <th style="font-size: 10px; text-align: center;">Uk. Baju Polo</th>
                                <th style="font-size: 10px; text-align: center;">Uk. Baju T-Shirt</th>
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
                            tampil_data_employee();   //pemanggilan fungsi tampil employee.
                            
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
                            function tampil_data_employee(){
                                $.ajax({
                                    type  : 'ajax',
                                    url   : '<?= base_url()?>data_karyawan/data_employee_seragam/<?= $user['dept']; ?>',
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
                                                    `<td>`+data[i].nama+`</td>`+
                                                    `<td>`+data[i].jenis_kelamin+`</td>`+
                                                    '<td>'+data[i].dept+'</td>'+
                                                    '<td>'+data[i].bagian+'</td>'+
                                                    '<td>'+data[i].jabatan+'</td>'+
                                                    '<td>'+data[i].ukuran_baju_polo+'</td>'+
                                                    '<td>'+data[i].ukuran_baju_shirt+'</td>'+
                                                    `<td>
                                                        <a href="#" data-toggle="modal" data-target="#modalSeragam`+data[i].no_scan+`"><i class="fa fa-pencil"></i> Masukan Ukuran Seragam</a> 
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalSeragam`+data[i].no_scan+`" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                                            <form role="form" action="<?= base_url('data_karyawan/addseragam');  ?>" method="POST">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title"><i class="fa fa-users"></i> Ukuran Seragam</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <label class="control-label col-lg-12">Masukan Ukuran Seragam Polo</label>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <input value="`+data[i].no_scan+`" name="no_scan" type="hidden">
                                                                                    <select class="form-control input-sm" name="ukuran_baju_polo" required>
                                                                                        <option value="S">S</option>
                                                                                        <option value="M">M</option>
                                                                                        <option value="L">L</option>
                                                                                        <option value="XL">XL</option>
                                                                                        <option value="XXL">XXL</option>
                                                                                        <option value="XXXL">XXXL</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label class="control-label col-lg-12">Masukan Ukuran Seragam T-Shirt</label>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <select class="form-control input-sm" name="ukuran_baju_shirt" required>
                                                                                        <option value="S">S</option>
                                                                                        <option value="M">M</option>
                                                                                        <option value="L">L</option>
                                                                                        <option value="XL">XL</option>
                                                                                        <option value="XXL">XXL</option>
                                                                                        <option value="XXXL">XXXL</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <label style="font-size:11px;">*Catatan : Perubahan ukuran baju hanya bisa dilakukan oleh HRD. Silahkan hubungi departemen terkait.</label><br>
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" `+data[i].disabled_ub+`>Save changes</button>
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
                    <!-- <label>*Note : Klik nama karyawan untuk membuat <b>PERJANJIAN KERJA WAKTU TERTENTU</b></label> -->
                </div>
            </div>
        </div>
    </section>
</section>
