<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> HR Admin <i class="fa fa-angle-right"></i> Memo Karyawan Baru </h4>
        <div class="col-md-6">
            <p>
                <a href="#" style="font-size:13px;" class="btn btn-info" data-target="#modal-delete" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
                <div class="modal fade" id="modal-delete">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <form class="form-horizontal" action="<?= base_url('hr_admin/tambahdata'); ?>" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Apakah anda yakin ingin mengahapus data ini?</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Tanggal Internal Memo</label>
                                            <input type="date" class="form-control input-sm" name="tgl_im" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Nomor Internal Memo</label>
                                            <input type="text" class="form-control input-sm" name="memo" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Departemen</label>
                                            <select class="select2" data-placeholder="Pilih Satu Depatemen" name="dept" required>
                                                <?php $queryDept = $this->db->get('dept')->result_array();?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryDept as $dd) : ?>
                                                    <option value="<?= $dd['code']; ?>"><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Dibuat oleh</label>
                                            <select name="dibuat_oleh" class="form-control input-sm">
                                                <option value="" disabled selected>-Dibuat oleh-</option>
                                                <?php
                                                    $query = $this->db->query("SELECT * FROM tbl_makar WHERE dept='HRD' AND status_aktif=1")->result_array();
                                                ?>
                                                <?php foreach ($query as $dc) : ?>
                                                    <option value="<?= $dc['nama'] ?>" <?php if ($dc['nama'] == set_value('dibuat_oleh')) {
                                                        echo "SELECTED";
                                                    } ?>><?= $dc['nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" name="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                <th>Nomor Memo</th>
                                <th>Tanggal Memo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $data = $this->db->query("SELECT * FROM im_karyawanbaru ORDER BY memo ASC")->result_array(); 
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modaledit<?= $result['id'] ?>" style="grey; font-size:13px;"> Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('hr_admin/printmemo_karyawanbaru/').$result['id']; ?>" style="color: black; font-size:13px;">Cetak</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modalHapus<?= $result['id'] ?>" style="color: black; font-size:13px;"><i class="fa fa-trash"></i> Hapus</a>
                                            </li>
                                        </ul>
                                    </li>
                                </td>
                                <div class="modal fade" id="modaledit<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
                                    <form role="form" action="<?= base_url('hr_admin/ubahdata/').$result['id']; ?>" method="POST">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h3 class="modal-title">Ubah Data </h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label>Tanggal Internal Memo</label>
                                                            <input type="date" class="form-control input-sm" name="tgl_im" value="<?= $result['tgl']; ?>" required>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Nomor Internal Memo</label>
                                                            <input type="text" class="form-control input-sm" value="<?= $result['memo']; ?>" name="memo" required>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label>Dibuat oleh</label>
                                                            <select name="dibuat_oleh" class="form-control input-sm">
                                                                <option value="" disabled selected>-Dibuat oleh-</option>
                                                                <?php
                                                                    $query = $this->db->query("SELECT * FROM tbl_makar WHERE dept='HRD' AND status_aktif=1")->result_array();
                                                                ?>
                                                                <?php foreach ($query as $dc) : ?>
                                                                    <option value="<?= $dc['nama'] ?>" <?php if ($dc['nama'] == $result['dibuat_oleh']) {
                                                                        echo "SELECTED";
                                                                    } ?>><?= $dc['nama']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpah Perubahan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal fade" id="modalHapus<?= $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapus" aria-hidden="true">
                                    <form role="form" action="<?= base_url('hr_admin/hapusmemo_kabar/').$result['id']; ?>" method="POST">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h3 class="modal-title">Apakah anda yakin ingin menghapus data ini ? </h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <td><a href="<?= base_url('hr_admin/editdata/').$result['id']; ?>" style="text-decoration: underline;"><?= $result['memo']; ?></a></td>
                                <td><?= $result['tgl']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
