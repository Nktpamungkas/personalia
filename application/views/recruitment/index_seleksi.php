<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Recruitment <i class="fa fa-angle-right"></i> Seleksi </h4>
        <div class="col-md-6">
            <p>
                <?php if($user['dept'] == 'HRD' || $user['dept'] == 'DIT') : ?>  
                    <a href="<?= base_url('recruitment/add_seleksi'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Tambah data</a>
                    <a href="<?= base_url('recruitment/export_seleksi'); ?>" class="btn btn-warning btn-sm"><i class=" fa fa-download"></i>&nbsp;&nbsp;Export To Excell</a>
                <?php else : ?>

                <?php endif ?>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-pemohon">
                        <thead>
                            <tr>
                                <th><i class="fa fa-gear"></i></th>
                                <th>NO. FPTK</th>
                                <th>NAMA</th>
                                <th>DEPT</th>
                                <th>TGL INTRVIEW HRD</th>
                                <th>TGL PSIKOTES</th>
                                <th>TGL INT. USER</th>
                                <th>TGL JOIN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                if($user['dept'] == 'HRD' || $user['dept'] == 'DIT') {
                                    $data = $this->db->query("SELECT * FROM recruitment_seleksi order by tgl_panggil  desc " )->result_array(); 
                                }else{
                                    $data = $this->db->query("SELECT * FROM recruitment_seleksi WHERE dept='$dept' order by tgl_panggil  desc "  )->result_array(); 
                                }
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <?php if($user['dept'] == 'HRD' || $user['dept'] == 'DIT') : ?>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?= base_url('recruitment/edit_seleksi/'). $result['id']; ?>" style="font-size:13px;">Ubah</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?= base_url('recruitment/proses_hapus_seleksi/'). $result['id']; ?>" style="font-size:13px;">Hapus</a>
                                            </li>
                                        </ul>
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </li>
                                </td>
                                <td><?= $result['no']; ?></td>
                                <td><?= $result['nama']; ?></td>
                                <td><?= $result['dept']; ?></td>
                                <td><?= $result['int_hrd']; ?></td>
                                <td><?= $result['psikotes']; ?></td>
                                <td><?= $result['int_user']; ?></td>
                                <td><?= $result['tgl_join']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
