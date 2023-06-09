<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">
                <div class="border-head">
                <h3>DATA KARYAWAN MASA PERCOBAAN 2 MINGGU</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
                <div class="row">
                    <div class="col-md-12 mb">
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
                                            <th width="50">Jabatan</th>
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
                                        tampil_data_training();   //pemanggilan fungsi tampil employee.
                                        
                                        $('#mydata').dataTable();
                                        
                                        //fungsi tampil employee
                                        function tampil_data_training(){
                                            $.ajax({
                                                type  : 'ajax',
                                                url   : '<?= base_url()?>home/data_karyawan_training',
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
                                                                    '<td>'+data[i].tgl_masuk+'</td>'+
                                                                    '<td>'+data[i].jabatan+'</td>'+
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
            </div>
        </div>
    </section>
</section>