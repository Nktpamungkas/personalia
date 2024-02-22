<style>
    .separator {
    margin-left: 5px; /* Sesuaikan dengan margin yang Anda inginkan */
    margin-right: 5px; /* Sesuaikan dengan margin yang Anda inginkan */
}
</style>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="showback">
                    <a href="<?= base_url('career_adm/transision'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-arrow-left"></i> <span>Kembali..</span></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?php
                    $noscan = $no_scan;
                    $data   = $this->db->query("SELECT * FROM tbl_makar WHERE no_scan = '$noscan'")->row();
                ?>
                <form role="form" action="<?= base_url(); ?>Career_adm/proses_AddCareerTransition" method="POST">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">&times;</span></button> -->
                        <h4 class="modal-title" id="myModalLabel">Career Transition </h4>
                    </div>
                    <div class="modal-body" style="border-radius: 5px; background-color: #F5FFFA; padding: 20px;">
                        <div class="row mt">
                            <div class="col-lg-12">
                            <!-- <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4> -->                                
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">No Scan</label>
                                <div class="col-sm-10">
                                    <select name="no_scan" style='X' class="form-control input-sm select2" required onchange="updateReadOnlyFields()" required>
                                        <option value="" disabled selected>No scan</option>
                                        <?php
                                            error_reporting(0);
                                            $makar = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1")->result_array();
                                        ?>
                                        <?php foreach ($makar as $dMakar) : ?>
                                            <!-- <option value="<?= $dMakar['no_scan'] ?>" <?php if ($dMakar['no_scan'] == $data->no_scan) {
                                                echo "SELECTED";
                                            } ?>><?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?></option> -->
                                            <option value="<?= $dMakar['no_scan'] ?>" data-dept="<?= $dMakar['dept'] ?>" data-bagian="<?= $dMakar['bagian'] ?>" data-golongan="<?= $dMakar['golongan'] ?>" data-jabatan="<?= $dMakar['jabatan'] ?>" data-kodejabatan="<?= $dMakar['kode_jabatan'] ?>">
                                                <?= $dMakar['no_scan']; ?> - <?= $dMakar['nama']; ?> - <?= $dMakar['dept']; ?> - <?= $dMakar['jabatan']; ?>
                                            </option>
                                        <?php endforeach ?>                                                
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Departemen Lama</label>
                                <div class="col-sm-10">
                                    <input type="text" style=';' class="form-control input-sm" placeholder="Departemen Lama" value="<?= $data->dept; ?>" name="dept_lama" readonly>
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Bagian Lama</label>
                                    <div class="col-sm-10">
                                        <input type="text" style='' class="form-control input-sm" placeholder="Bagian Lama" value="<?= $data->bagian; ?>" name="bagian_lama" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jabatan Lama</label>
                                    <div class="col-sm-10">
                                        <div style="display: flex;">
                                            <input type="text" style="width: 500px; margin-right: 10px;" class="form-control input-sm" placeholder="Jabatan Lama" value="<?= $data->jabatan; ?>" name="jabatan_lama" readonly>
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Jabatan Lama</label>
                                            <input type="text" style="width: 500px; margin-left: 10px;" class="form-control input-sm" placeholder="Kode Jabatan Lama" value="<?= $data->kode_jabatan; ?>" name="kode_jabatan_lama" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Golongan Lama</label>
                                    <div class="col-sm-10">
                                        <input type="text" style='' class="form-control input-sm" placeholder="Golongan Lama" value="<?= $data->golongan; ?>" name="golongan_lama" readonly>
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <BR>
                        <div class="row mt">
                            <div class="col-lg-12">
                            <!-- <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4> -->                                
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"> Proses</label>
                                        <div class="col-sm-10">
                                        <select name="proses" class="form-control input-sm select2" required>
                                            <option value="" disabled selected>Proses</option>
                                            <option value="mutasi">Mutasi</option>
                                            <option value="rotasi">Rotasi</option>
                                            <option value="promosi">Promosi</option>
                                            <option value="demosi">Demosi</option>
                                        </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tanggal Efektif</label>
                                    <div class="col-sm-10">
                                        <input class="form-control input-sm" value="<?= set_value('tgl_efektif'); ?>" name="tgl_efektif" placeholder="" type="date">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Departemen Baru</label>
                                    <div class="col-sm-10">
                                    <select class="form-control input-sm select2" data-placeholder="Pilih Satu Depatemen" name="dept_baru" required>
                                            <?php error_reporting(0); $queryDept = $this->db->get('dept')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryDept as $dd) : ?>
                                                <option value="<?= $dd['code']; ?>" <?php if ($dd['code'] == set_value('dept_baru')) { echo "SELECTED"; } ?>><?= $dd['code'] . ' - ' . $dd['dept_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"> Bagian Baru</label>
                                    <div class="col-sm-10">
                                        <select  style='100%' class="select2" data-placeholder="Pilih Satu Bagian" name="bagian_baru" required>
                                            <?php $queryBagian = $this->db->get('bagian')->result_array();?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryBagian as $db) : ?>
                                                <option value="<?= $db['bagian']; ?>" <?php if ($db['bagian'] ==  set_value('bagian')) { echo "SELECTED"; } ?>><?= $db['bagian']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Golongan Baru</label>
                                    <div class="col-sm-10">
                                        <select class="form-control input-sm select2" style='x' data-placeholder="Pilih Satu Golongan" name="golongan_baru" required>
                                            <?php error_reporting(0); $queryGolongan = $this->db->get('golongan')->result_array(); ?>
                                            <option value="" disabled selected>---------------------------------------------------</option>
                                            <?php foreach ($queryGolongan as $dg) : ?>
                                                <option value="<?= $dg['golongan']; ?>" <?php if ($dg['golongan'] == set_value('golongan_baru')) { echo "SELECTED"; } ?>><?= $dg['golongan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Jabatan baru</label>
                                    <div class="col-sm-10">
                                        <div style="display: flex;">
                                            <select class="form-control input-sm select2" style="width: 500px;" data-placeholder="Pilih Satu Jabatan" name="jabatan_baru" required>
                                                <?php error_reporting(0); $queryGolongan = $this->db->get('jabatan')->result_array(); ?>
                                                <option value="" disabled selected>---------------------------------------------------</option>
                                                <?php foreach ($queryGolongan as $dg) : ?>
                                                    <option value="<?= $dg['jabatan']; ?>" <?php if ($dg['jabatan'] == set_value('jabatan_baru')) { echo "SELECTED"; } ?>><?= $dg['jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Jabatan baru</label>
                                            <select class="select2" data-placeholder="Kode Jabatan" name="atasan2" id="atasan2" style="width: 500px;" required>
                                                    <option value="" disabled selected></option>
                                                    <?php
                                                        $queryaddinfo = $this->db->query("SELECT kode, left(jabatan,70) as jabatan  FROM additional_info")->result_array();
                                                    ?>
                                                    <?php foreach ($queryaddinfo as $dfi) : ?>
                                                    <option value="<?= $dfi['kode'] ?>" <?php if ($dfi['kode'] == set_value('kode')) {
                                                    echo "SELECTED";
                                                } ?>><?= $dfi['kode'].' - '.$dfi['jabatan']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label"> Atasan 1</label>
                                    <div class="col-sm-10">
                                        <div style="display: flex;">
                                            <select class="select2" data-placeholder="Atasan 1" name="atasan1" id="atasan1" style="width: 500px;" required>
                                                <option value="" disabled selected></option>
                                                <?php
                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' and GOLONGAN not in ('OPERATOR', 'STAFF' , 'DRIVER','SECURITY','ADMIN','Specialist') ORDER BY nama")->result_array();
                                                ?>
                                                <?php foreach ($queryShift as $dk) : ?>
                                                    <option value="<?= $dk['nama'] ?>" <?php if ($dk['nama'] == set_value('nama')) {
                                                        echo "SELECTED";
                                                    } ?>><?= $dk['nama'].' - '.$dk['dept'].' '.$dk['jabatan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <label class="col-sm-2 col-sm-2 control-label">Atasan 2</label>
                                            <select class="select2" data-placeholder="Atasan 2" name="atasan2" id="atasan2" style="width: 500px;" required>
                                                <option value="" disabled selected></option>
                                                <?php
                                                    $queryShift = $this->db->query("SELECT * FROM tbl_makar WHERE status_aktif = 1 AND NOT status_karyawan = 'perubahan_status' and GOLONGAN not in ('OPERATOR', 'STAFF' , 'DRIVER','SECURITY','ADMIN','Specialist') ORDER BY nama")->result_array();
                                                ?>
                                                <?php foreach ($queryShift as $dk) : ?>
                                                    <option value="<?= $dk['nama'] ?>" <?php if ($dk['nama'] == set_value('nama')) {
                                                        echo "SELECTED";
                                                    } ?>><?= $dk['nama'].' - '.$dk['dept'].' '.$dk['jabatan']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>  
                        </div>
                        </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="title" style="color: red">Informasi</h4>
                        <ol>
                            <!-- <li>-<span style="color: red;">-</span>.</li> -->
                            <li>Dengan mengisi form career transition, data karyawan yang bersangkutan otomatis akan otomatis berubah di menu Employee Information.</li>
                            <li>Pastikan seluruh data sudah terisi dengan benar.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" style="width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;">Simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>
<script>
    // Fungsi untuk memperbarui nilai elemen-elemen input readonly
    function updateReadOnlyFields() {
        // Ambil elemen data karyawan
        var selectNoScan = document.getElementsByName('no_scan')[0];

        // Ambil data dari opsi yang dipilih
        var selectedOption = selectNoScan.options[selectNoScan.selectedIndex];

        // Update nilai elemen-elemen input dari data karyawan
        document.getElementsByName('dept_lama')[0].value = selectedOption.getAttribute('data-dept');
        document.getElementsByName('bagian_lama')[0].value = selectedOption.getAttribute('data-bagian');
        document.getElementsByName('golongan_lama')[0].value = selectedOption.getAttribute('data-golongan');
        document.getElementsByName('jabatan_lama')[0].value = selectedOption.getAttribute('data-jabatan');
        document.getElementsByName('kode_jabatan_lama')[0].value = selectedOption.getAttribute('data-kodejabatan');
    }

    // Tambahkan fungsi updateReadOnlyFields saat opsi dipilih
    document.getElementsByName('no_scan')[0].addEventListener('change', updateReadOnlyFields);

    // Panggil fungsi updateReadOnlyFields saat halaman dimuat (untuk menginisialisasi nilainya)
    window.addEventListener('load', updateReadOnlyFields);
</script>


