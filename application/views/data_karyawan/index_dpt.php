<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Employee Department Information</h4>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th width="50"></th>
                                <th>No</th>
                                <th width="50"><Center>No Scan</th>
                                <th width="250">Nama Karyawan</th>
                                <th width="80">Department</th>
                                <th width="100">Jabatan</th>
                                <th width="250">Alamat Lengkap</th>
                                <th width="100">Nomor Tlp</th>
                                <th width="60">Email</th>
                                <th width="150"><Center>Tanggal Masuk</th>
                                <th width="100"><Center>Status Karyawan</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_employee();   //pemanggilan fungsi tampil employee.
         
        $('#mydata').dataTable();
          
        //fungsi tampil employee
        function tampil_data_employee(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= base_url()?>data_karyawan/data_employee_dpt/<?= $user['dept']; ?>',
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
                                            <li><a href="<?= base_url(); ?>data_karyawan/tanda_tangan/`+data[i].no_scan+`"><i class="fa fa-gears"></i> Buat Tanda Tangan</a></li>
                                        </ul>
                                    </li>
                                </td>`+
                                '<td>'+[no++]+'</td>'+
                                '<td>'+data[i].no_scan+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].dept+'</td>'+
                                '<td>'+data[i].jabatan+'</td>'+
                                '<td>'+data[i].alamat_domisili+'</td>'+
                                '<td>'+data[i].no_hp+'</td>'+
                                '<td>'+data[i].email_pribadi+'</td>'+
                                '<td>'+data[i].tgl_masuk+'</td>'+
                                '<td>'+data[i].status_karyawan+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

    });
</script> 