<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> People Development <i class="fa fa-angle-right"></i> Kompetensi </h4>
        <div class="col-md-6">
            <p>
                <a href="<?= base_url('kompetensi/tambahdata'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-pci">
                        <thead>
                            <tr>
                                <th><i class="fa fa-gear"></i></th>
                                <th>Jabatan</th>
                                <th>Bagian</th>
                                <th>Pemangku Jabatan</th>
                                <th>Departemen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $role_id = $user['role_id'];
                                if($user['role_id'] == 2 OR $user['role_id'] == 5 OR $user['role_id'] == 1){
                                    $data = $this->db->query("SELECT a.id,
                                                                    a.no_scan,
                                                                    b.nama,
                                                                    b.dept,
                                                                    b.jabatan,
                                                                    b.bagian
                                                            FROM
                                                                kompetensi a
                                                                LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.no_scan = b.no_scan 
                                                            GROUP BY 
                                                                a.no_scan
                                                            ORDER BY
                                                                a.no_scan DESC")->result_array(); 
                                }else {
                                    $data = $this->db->query("SELECT a.id,
                                                                    a.no_scan,
                                                                    b.nama,
                                                                    b.dept,
                                                                    b.jabatan,
                                                                    b.bagian
                                                            FROM
                                                                kompetensi a
                                                                LEFT JOIN ( SELECT * FROM tbl_makar ) b ON a.no_scan = b.no_scan 
                                                            WHERE
                                                                b.dept = '$dept'
                                                            GROUP BY 
                                                                a.no_scan
                                                            ORDER BY
                                                                a.no_scan DESC")->result_array(); 
                                }
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= base_url('kompetensi/editdata/').$result['no_scan']; ?>" style="color: grey; font-size:13px;">Ubah</a></li>
                                            <li><a href="<?= base_url('kompetensi/print/').$result['no_scan']; ?>" style="color: grey; font-size:13px;">Cetak</a></li>
                                            <li class="divider"></li>
                                            <li><a href="<?= base_url('kompetensi/hapus/').$result['no_scan']; ?>" style="color: grey; font-size:13px;" title="Hapus tidak aktif">Hapus</a></li>
                                        </ul>
                                        <div class="modal fade" id="modal-delete<?= $result['id']; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form class="form-horizontal" action="<?= base_url(); ?>pci/delete/<?= $result['id']; ?>" method="post">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus data ini?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </td>
                                <td><?= $result['jabatan']; ?></td>
                                <td><?= $result['bagian']; ?></td>
                                <td>
                                    <a href="<?= base_url('kompetensi/editdata/').$result['no_scan']; ?>" style="text-decoration: underline;"><?= $result['nama'].' ('.$result['no_scan'].')'; ?></a>
                                </td>
                                <td><?= $result['dept']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
