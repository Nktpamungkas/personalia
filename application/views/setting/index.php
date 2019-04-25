<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/DT_bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?= base_url(); ?>lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        tampil_data_additional_info();   //pemanggilan fungsi tampil additional info.
         
        $('#mydata').dataTable();
          
        //fungsi tampil employee
        function tampil_data_additional_info(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= base_url()?>setting/data_additional_info',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i = 0; i < data.length; i++){
                        html += '<tr class="gradeX">'+
                                '<td>'+data[i].kode+'</td>'+
                                '<td>'+data[i].jabatan+'</td>'+
                                `<td><a href="#" data-toggle="modal" data-target="#modalEdit`+data[i].kode+`"><i class="fa fa-edit"></i>Edit</a>
                                        <div class="modal fade" id="modalEdit`+data[i].kode+`" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                            <form role="form" action="<?= base_url('setting/add_edit/') . $user['name']; ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h3 class="modal-title">Edit additional info</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                                <label class="">Kode (Wajib)</label>
                                                                <input class="form-control input-sm" size="90" value="`+data[i].kode+`" name="kode" type="text" required>
                                                                <br><br>
                                                                <label class="">Jabatan (Wajib)</label>
                                                                <input class="form-control input-sm" size="90" value="`+data[i].jabatan+`" name="jabatan" type="text" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        |
                                        <a href="#" data-toggle="modal" data-target="#modalDelete`+data[i].kode+`"><i class="fa fa-trash"></i>Delete</a>
                                        <!-- Modal Delete-->
                                        <div class="modal fade" id="modalDelete`+data[i].kode+`" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                                            <form role="form" action="<?= base_url('setting/add_delete/') . $user['name'];  ?>" method="POST">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title"><i class="fa fa-trash"></i> Are you sure ?</h4>
                                                        </div>
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