<script type="text/javascript">
function functionGaji() {
    var checkBox = document.getElementById('gaji');
    if (checkBox.checked == true){
        $.ajax ({
        type: 'POST',
        url: '<?= base_url()."data_karyawan/search_gaji" ?>',
        dataType: 'json',
        success: function(data){
            document.getElementById('upah').value = data[0].gaji;
            }
        });
    } else {
        document.getElementById('upah').value = " "
    }
}
</script>
<section id="main-content">
    <section class="wrapper">
        <!-- FORM VALIDATION -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <div class="form">
                    <p><?= $this->session->flashdata('message'); ?></p>
                        <div class="form-group col-md-12">
                            <p>
                                <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: left;">
                                    <span style="font-size: 16px; padding: 0 10px; color: black;">
                                        <b>* Histori Kontrak</b>
                                    </span>
                                </div>
                                <br>
                            </p>
                            <?php if($user['dept'] == "HRD"): ?>
                                <a href="<?= base_url(); ?>PKWT/printPKWT/<?= $makar->no_scan; ?>" class="btn btn-warning">Print PKWT</a>
                            <?php endif; ?>
                                <a href="<?= base_url('PKWT'); ?>" class="btn btn-theme04">Back</a>
                        </div>
                        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="mydata">
                            <thead>
                                <tr>
                                    <th width="25">No</th>
                                    <th width="100">No Scan</th>
                                    <th width="250">Nama</th>
                                    <th width="100">Departemen</th>
                                    <th width="150">Tgl Kontrak Awal</th>
                                    <th width="150">Tgl Kontrak Akhir</th>
                                    <th width="200">Libur Kontrak</th>
                                    <th width="75">Gaji</th>
                                    <th width="50">Keterangan</th>
                                    <th width="200">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $data = $this->db->query("SELECT b.id,
                                                                    b.no_scan,
                                                                    b.durasi,
                                                                    a.nama,
                                                                    a.dept,
                                                                    DATE_FORMAT( b.kontrak_awal, '%d %M %Y' ) AS kontrak_awal,
                                                                    DATE_FORMAT( b.kontrak_akhir, '%d %M %Y' ) AS kontrak_akhir,
                                                                    b.kontrak_awal AS f_kontrak_awal,
                                                                    b.kontrak_akhir AS f_kontrak_akhir,
                                                                    b.keterangan,
                                                                    b.gaji,
                                                                    b.status,
                                                                    b.libur
                                                                FROM
                                                                    tbl_makar a
                                                                    INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
                                                                    WHERE b.no_scan = '$no_scan' ORDER BY b.id DESC")->result_array();
                                                                    $no = 1;
                                ?>
                                <?php foreach($data AS $result) : ?>
                                    <tr class="gradeX">
                                        <td><?= $no++; ?></td>
                                        <td><?= $result['no_scan'] ?></td>
                                        <td><?= $result['nama'] ?></td>
                                        <td><?= $result['dept'] ?></td>
                                        <td><?= $result['kontrak_awal'] ?></td>
                                        <td><?= $result['kontrak_akhir'] ?></td>
                                        <td><?= $result['libur'] ?></td>
                                        <td align="right"><?= $result['gaji'] ?></td>
                                        <td><?= $result['keterangan'] ?></td>
                                        <td>
                                            <?php if ($user['dept'] == "HRD") : ?>
                                                <a href="#" data-toggle="modal" data-target="#modalEdit<?= $result['id'] ?>"><i class="fa fa-edit"></i> Edit</a> |
                                                <a href="#" data-toggle="modal" data-target="#modalHapus<?= $result['id'] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            <?php endif; ?>
                                            <div class="modal fade" id="modalEdit<?= $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalEdit">
                                                <form role="form" action="<?= base_url('PKWT/edit_history/') . $user['name']; ?>" method="POST">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h3 class="modal-title">Edit PKWT </h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mt">
                                                                    <div class="form">
                                                                        <div class="form-group col-md-12">
                                                                            <label class="control-label col-lg-4">Tgl Kontrak Awal</label>
                                                                            <input class="form-control col-md-8 input-sm" value="<?= $result['f_kontrak_awal'] ?>" name="kontrak_awal" type="date" required>
                                                                            <input value="<?= $result['id'] ?>" name="id" type="hidden">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="col-md-4">Durasi</label>
                                                                            <input class="form-control col-md-8 input-sm" value="<?= $result['durasi'] ?>" name="durasi" type="text" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="col-md-4">Tgl Kontrak Akhir</label>
                                                                            <input class="form-control col-md-8 input-sm" value="<?= $result['f_kontrak_akhir'] ?>" name="kontrak_akhir" type="date" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="col-md-4">Gaji</label>
                                                                            <input class="form-control col-md-8 input-sm" value="<?= $result['gaji'] ?>" name="gaji" type="text" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="col-md-4">Keterangan</label>
                                                                            <select class="form-control input-sm" data-placeholder="Pilih Status Karyawan..." tabindex="2" name="status_karyawan" required>
                                                                                <?php
                                                                                    $queryStatus = $this->db->query('SELECT * FROM `status` WHERE NOT id="tetap" AND NOT id="Resigned"')->result_array();
                                                                                ?>
                                                                                <option value="" disabled selected></option>
                                                                                <?php foreach ($queryStatus as $ds) : ?>
                                                                                    <option value="<?= $ds['id']; ?>" <?php if ($ds['id'] == $result['keterangan'] ) {
                                                                                    echo "SELECTED";
                                                                                    } ?>><?= $ds['id'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label class="col-md-4">Keterangan Libur</label>
                                                                            <input class="form-control input-sm" name="libur" value="<?= $result['libur'] ?>" type="text" placeholder="Kosongkan jika tidak ada libur">
                                                                            <label style="font-size: 10px;">(Contoh: 01 Maret 2020 - 02 Maret 2020)</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input value="<?= $result['id'] ?>" name="id" type="hidden">
                                                                <input value="<?= $result['no_scan'] ?>" name="no_scan" type="hidden">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal fade" id="modalHapus<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus">
                                                <form role="form" action="<?= base_url('PKWT/hapus_history/') . $result['id']; ?>" method="POST">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h3 class="modal-title">Apakah anda yakin ingin menghapus data ini ? </h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input value="<?= $result['no_scan'] ?>" name="no_scan" type="hidden">
                                                                <input value=" <?php echo $this->session->name ;?>" name="username"type="hidden">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>