<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Training report</h3>
        <div class="col-md-6">
            <p>
                <a href="<?= base_url('training_report/addTraining'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add New Training</a>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                        <thead>
                            <tr>
                                <th>No Scan</th>
                                <th>Nama Peserta</th>
                                <th>Dept</th>
                                <th>Materi Training</th>
                                <th>Penyelenggara</th>
                                <th width="250">Option</th>
                            </tr>
                        </thead>
                        <tbody  id="show_data">
                            
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
        tampil_data_training();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();
          
        //fungsi tampil barang
        function tampil_data_training(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= base_url()?>training_report/data_training',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i = 0; i < data.length; i++){
                        html += '<tr class="gradeX">'+
                                '<td>'+data[i].no_scan+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].dept+'</td>'+
                                '<td>'+data[i].materi_training+'</td>'+
                                '<td>'+data[i].penyelenggara+'</td>'+
                                `<td><a href="<?= base_url(); ?>training_report/tampil/`+data[i].id+`"><i class="fa fa-edit"></i>Edit</a> | 
                                    <a href="#" data-toggle="modal" data-target="#modalDelete`+data[i].id+`"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalDelete`+data[i].id+`" tabindex="-1" role="dialog" aria-labelledby="modalResign" aria-hidden="true">
                                            <form role="form" action="<?= base_url('training_report/delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
                                                        <input class="form-control input-sm" value="`+data[i].no_scan+`" name="no_scan" type="hidden">
                                                        <input class="form-control input-sm" value="`+data[i].id+`" name="id" type="text">
                                                        <input class="form-control input-sm" value="`+data[i].kode+`" name="kode" type="hidden">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
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