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
                        <?php if($user['dept'] == 'HRD' || $user['dept'] == 'DIT') : ?>  <!-- Jika dept lain -->
                        <p class="inline">
                        <a href="<?= base_url('home/ExportExcellhabiskontrak'); ?>" class="btn btn-default btn-sm">Export to Excel</a>
                            <center><h5><b>DATA HABIS KONTRAK</b></h5></center>
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                                    <thead>
                                        <tr>
                                            <th width="25">No</th>
                                            <th width="125">No Scan</th>
                                            <th width="300">Nama</th>
                                            <th width="100">Departemen</th>
                                            <th width="200">Tgl Kontrak Akhir</th>
                                            <th width="50">Keterangan</th>
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
                                                url   : '<?= base_url()?>home/data_habis_kontrak',
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
                                                                    '<td>'+data[i].kontrak_akhir+'</td>'+
                                                                    '<td>'+data[i].keterangan+'</td>'+
                                                                '</tr>';
                                                    }
                                                    $('#show_data').html(html);
                                                }
                                            });
                                        }

                                    });
                                </script>
                                <?php else : ?> <!-- Jika dept DIT & HRD -->
                                <center><h5><b>DATA HABIS KONTRAK DEPARTEMEN <?= $user['dept']; ?></b></h5></center>
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                                    <thead>
                                        <tr>
                                            <th width="25">No</th>
                                            <th width="125">No Scan</th>
                                            <th width="300">Nama</th>
                                            <th width="100">Departemen</th>
                                            <th width="200">Tgl Kontrak Akhir</th>
                                            <th width="50">Keterangan</th>
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
                                                url   : '<?= base_url()?>home/data_habis_kontrak_dept/<?= $user['dept'] ?>',
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
                                                                    '<td>'+data[i].kontrak_akhir+'</td>'+
                                                                    '<td>'+data[i].keterangan+'</td>'+
                                                                '</tr>';
                                                    }
                                                    $('#show_data').html(html);
                                                }
                                            });
                                        }

                                    });
                                </script> 
                                <?php endif; ?>
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
        </div>
    </section>
</section>