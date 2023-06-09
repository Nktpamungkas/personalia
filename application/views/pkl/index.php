<section id="main-content">
    <section class="wrapper">
        <h4><i class="fa fa-angle-right"></i> Time Attendance <i class="fa fa-angle-right"></i> Form Surat Perintah Lembur </h4>
        <div class="col-md-6">
            <p>
                <?php if($user['dept'] != 'HRD') : ?>  
                    <a href="<?= base_url('pkl/add_Request'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Masukan nama karyawan lembur</a>
                    <!-- <i href="#" class="btn btn-warning"><i class=" fa fa-frown-o"></i>&nbsp;&nbsp;<i>Under Maintenance</i></a> -->
                <?php else : ?>
                    <a href="<?= base_url('pkl/index_all'); ?>" class="btn btn-warning"><i class=" fa fa-list-alt"></i>&nbsp;&nbsp;Tampilkan Semua Daftar Lembur</a>
                    <a href="<?= base_url('pkl/add_Request'); ?>" class="btn btn-info"><i class=" fa fa-plus"></i>&nbsp;&nbsp;Add Form Lembur</a>
                    <!-- <a href="#" class="btn btn-warning"><i class=" fa fa-frown-o"></i>&nbsp;&nbsp;<i>Under Maintenance</i></a> -->
                <?php endif ?>
            </p>
        </div>
        <div class="row mb col-sm-12">
            <?= $this->session->flashdata('message'); ?>
            <div class="content-panel">
                <div class="adv-table">
                <!-- <center><label style="font-size: 15px; color: Blue;">*Note : Klik <b>Nama</b> pembuat form lembur untuk mengubah data.</label></center> -->
                    <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="table-indexAll-pkl">
                        <thead>
                            <tr>
                                <th><i class="fa fa-gear"></i></th>
                                <th>Kode Lembur</th>
                                <th>Tanggal</th>
                                <th>Shift</th>
                                <th>Tujuan Lembur</th>
                                <th>Target Lembur</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $dept = $user['dept'];
                                $query = $this->db->query("SELECT id, kode_lembur,
                                                                tanggal,
                                                                shift,
                                                                target_lembur, 
                                                                dibuat_oleh_nama,
                                                                `status`
                                                            FROM    
                                                                permohonan_kerja_lembur 
                                                            WHERE 
                                                                dept = '$dept' 
                                                            GROUP BY 
                                                                kode_lembur 
                                                        UNION
                                                            SELECT
                                                                id,
                                                                kode_lembur,
                                                                tanggal as tanggal2,
                                                                shift as shift2,
                                                                target_lembur,
                                                                dibuat_oleh_nama,
                                                                `status` 
                                                            FROM
                                                                permohonan_kerja_lembur 
                                                            WHERE
                                                                dept = '$dept' 
                                                            GROUP BY
                                                                tanggal2,
                                                                shift2 
                                                            ORDER BY
                                                                tanggal DESC")->result_array(); 
                            ?>
                            <?php foreach($query AS $result) : ?>
                            <?php 
                                $kd_lembur  = $result['kode_lembur'];
                                $pkl  = $this->db->query("SELECT *, DATE_FORMAT( tanggal_permohonan, '%d %b %Y' ) AS tgl_format, SUBSTRING( keterangan, 1, 60 ) AS tujuan_lembur FROM daftar_lembur WHERE kode_lembur = '$kd_lembur'")->row();
                            ?>
                            <tr>
                                <td>
                                    <li class="dropdown" style="list-style-type:none;">
                                        <a href="#" class="fa fa-align-justify" data-toggle="dropdown"></a>
                                        <?php if($result['status'] == "Verifikasi") : ?>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif">Ubah nama karyawan lembur</a></li>
                                                <!-- <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif">Print permohonan kerja lembur</a></li> -->
                                                <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif">Tambah nama karyawan lembur</a></li>
                                                <li class="divider"></li>
                                                <!-- <li class="divider"></li> -->
                                                <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif"><b>Buat surat perintah lembur</b></li>
                                                <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif"><b>Print surat perintah lembur</b></a></li>
                                                <li class="divider"></li>
                                                <!-- <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif">Hapus Permohonan Lembur</a></li> -->
                                                <li><a href="#" style="color: grey; text-decoration: line-through; font-size:13px;" title="Tidak aktif">Hapus surat perintah lembur</a></li>
                                            </ul>
                                        <?php else : ?>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= base_url(); ?>pkl/edit_request/<?= $result['kode_lembur']; ?>" style="font-size:13px;">Ubah nama karyawan</a></li>
                                                <!-- <li><a href="<?= base_url(); ?>pkl/print_permohonan/<?= $result['kode_lembur']; ?>" style="font-size:13px;">Print permohonan kerja lembur</a></li> -->
                                                <li><a href="<?= base_url(); ?>pkl/tambah/<?= $result['kode_lembur']; ?>" style="font-size:13px;">Tambah nama karyawan lembur</a></li>
                                                <li class="divider"></li>
                                                <!-- <li class="divider"></li> -->
                                                <li><a href="<?= base_url(); ?>pkl/add_overtime_list/<?= $result['kode_lembur']; ?>" style="font-size:13px;"><b>Buat surat perintah lembur</b></a></li>
                                                <li><a href="<?= base_url(); ?>pkl/print_daftar_lembur/<?= $result['kode_lembur']; ?>" style="font-size:13px;"><b>Print surat perintah lembur</b></a></li>
                                                <li class="divider"><hr></li>
                                                <!-- <li><a href="<?= base_url(); ?>pkl/hapus_permohonan_lembur/<?= $result['kode_lembur']; ?>" style="font-size:13px;">Hapus Permohonan Lembur</a></li> -->
                                                <li><a href="<?= base_url(); ?>pkl/hapus_daftar_lembur/<?= $result['kode_lembur']; ?>" style="font-size:13px;">Hapus surat perintah lembur</a></li>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                </td>
                                <td style="font-size: 12px;"><a href="#" style="text-decoration: underline;"><?= $result['kode_lembur']; ?></a></td>
                                <td style="font-size: 12px;"><?php error_reporting(0); if($pkl->tgl_format){ echo $pkl->tgl_format; } else { echo "<i>Silahkan buat surat perintah lembur</i>"; } ?></td>
                                <td style="font-size: 12px;"><?= $result['shift']; ?></td>
                                <td style="font-size: 12px;"><?php error_reporting(0); if($pkl->tujuan_lembur){ echo $pkl->tujuan_lembur; } else { echo "<i>Silahkan buat surat perintah lembur</i>"; } ?></td>
                                <td style="font-size: 12px;"><?= $result['target_lembur']; ?></td>
                                <td style="font-size: 12px;">
                                    <?php if($result['status'] == "Verifikasi") : ?>
                                        <span class="fa fa-check" style="color: #326ada;"> <b>Terverifikasi Oleh HRD.</b></span>
                                    <?php else : ?>
                                        <span class="fa fa-envelope" style="color: #FF4500;"> <b>On Proses.</b></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>