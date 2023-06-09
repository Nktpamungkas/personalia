<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Recruitment <i class="fa fa-angle-right"></i> Permohonan </h4>
        <div class="col-md-6">
            <p>
                <?php if($user['dept'] == 'HRD' || $user['dept'] == 'DIT') : ?>  
                    <a href="<?= base_url('recruitment/add_permohonan'); ?>" class="btn btn-info btn-sm"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Tambah Permohonan</a>
                    <a href="<?= base_url('recruitment/export_permohonan'); ?>" class="btn btn-warning btn-sm"><i class=" fa fa-download"></i>&nbsp;&nbsp;Export To Excell</a>
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
                                <th>TGL FPTK</th>
                                <th>DEPARTEMEN</th>
                                <th>JABATAN</th>
                                <th>LT TARGET</th>
                                <th>STATUS</th>
                                <th>TGL TARGET</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                if($user['dept'] == 'HRD') {
                                    $data = $this->db->query("SELECT *, RIGHT ( NO, 2 ) AS thn FROM recruitment_permohonan ORDER BY thn DESC, `no` DESC")->result_array(); 
                                }else{
                                    $data = $this->db->query("SELECT *, RIGHT ( NO, 2 ) AS thn FROM recruitment_permohonan WHERE dept='$dept' ORDER BY thn DESC, `no` DESC")->result_array(); 
                                }
                            ?>
                            <?php foreach($data AS $result): ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <?php if($user['dept'] == 'HRD') : ?>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?= base_url('recruitment/edit_permohonan/'). $result['id']; ?>" style="font-size:13px;">Ubah</a>
                                                <a href="<?= base_url('recruitment/duplicate_permohonan/'). $result['id']; ?>" style="font-size:13px;">Duplicate</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?= base_url('recruitment/proses_hapus_permohonan/'). $result['id']; ?>" style="font-size:13px;">Hapus</a>
                                            </li>
                                        </ul>
                                        <?php else : ?>
                                        <?php endif; ?>
                                    </li>
                                </td>
                                <td><?= $result['no']; ?></td>
                                <td><?= $result['tgl_fptk']; ?></td>
                                <td><?= $result['dept']; ?></td>
                                <td><?= $result['jabatan']; ?></td>
                                <td><?= $result['lt_target']; ?></td>
                                <td><?php echo strtoupper($result['status']); ?></td>
                                <td><?= $result['tgl_target']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
