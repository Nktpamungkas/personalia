<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                
                <!-- SERVER STATUS PANELS -->
                <div class="row mt">
                    <div class="col-md-3 col-sm-8 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5><b>TOTAL KARYAWAN PRIA</b></h5>
                            </div>
                            <?php 
                                $aktiveL = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND jenis_kelamin='Laki' AND NOT status_karyawan='perubahan_status'")->row();
                            ?>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h2><?= $aktiveL->jml; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-4 mb">
                        <div class="white-panel pn">
                            <div class="white-header">
                                <?php 
                                    $active = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1'")->row();
                                ?>
                                <h5>TOTAL KARYAWAN TETAP & KONTRAK</h5>
                                
                            </div>
                            <p><img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle" width="50"></p>
                            <p><b>PT. INDOTAICHEN TEXTILE INDUSTRI</b><br><?= $active->jml; ?></p>
                            
                            <div class="row">
                                <?php 
                                    $kontrak    = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%Kontrak%' AND status_aktif = '1'")->row();
                                    $tetap      = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%Tetap%' AND status_aktif = '1'")->row();
                                ?>
                                <div class="col-md-6">
                                <p class="small mt">KARYAWAN TETAP</p>
                                <p><?= $tetap->jml; ?></p>
                                </div>
                                <div class="col-md-6">
                                <p class="small mt">KARYAWAN KONTRAK</p>
                                <p><?= $kontrak->jml; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-8 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5><b>TOTAL KARYAWAN WANITA</b></h5>
                            </div>
                            <?php 
                                $aktiveP = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND jenis_kelamin='Wanita' AND NOT status_karyawan='perubahan_status'")->row();
                            ?>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h2><?= $aktiveP->jml; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb">
                        <div class="content-panel">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Departement</th>
                                            <th class="numeric">Jumlah Karyawan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $data = $this->db->query("SELECT a.`code`, a.dept_name, count( a.`code` ) AS total
                                                                        FROM
                                                                            dept a
                                                                        LEFT JOIN ( SELECT * FROM tbl_makar b ) b ON b.dept = a.CODE 
                                                                        WHERE status_aktif = 1
                                                                        GROUP BY a.CODE")->result_array();
                                        ?>
                                        <?php foreach($data AS $result) : ?>
                                            <tr>
                                                <td><?= $result['code']; ?></td>
                                                <td><?= $result['dept_name']; ?></td>
                                                <td><?= $result['total']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb">
                        
                    </div>
                    <div class="col-md-4 mb">
                        
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    
                </div>
                <div class="col-md-4 col-sm-4 mb">
                    
                </div>
                <!-- /col-md-4 -->
                </div>
            </div>
            <div class="col-lg-3 ds">             
                <h4 class="centered mt">ANGGOTA TIM ONLINE</h4>
                <?php
                $dataLogged     = $this->db->get_where('user', array('logged' => '1'))->result_array();
                ?>
                <?php foreach($dataLogged AS $dl) : ?>
                <div class="desc">
                    <div class="thumb">
                        <img class="img-circle" src="<?= base_url() ?>img/on.gif" width="16px" height="16px" align="">
                    </div>
                    <div class="details">
                        <p>
                            <a href="#" data-toggle="modal" data-target="#modalName<?= $dl['id']; ?>" style="color: black;"><?= $dl['name']; ?></a><br />
                            <muted>Available</muted>
                        </p>
                    </div>
                </div>
                <div class="modal fade" id="modalName<?= $dl['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalName">
                    <form role="form" action="<?= base_url('setting/add/') . $user['name'];  ?>" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="thumb">
                                    <img class="img-circle" src="<?= base_url() ?>img/<?= $dl['image']; ?>" width="35px" height="35px" align="">
                                </div>
                                    <h3 class="modal-title">Profile of member</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-4">Nama</label>
                                        <label class="col-sm-6"> : <?= $dl['name']; ?></label>
                                        <label></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Email</label>
                                        <label class="col-sm-6"> : <?= $dl['email']; ?></label>
                                        <label></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4">Tanggal Registration</label>
                                        <label class="col-sm-6"> : <?= date('d F Y', $dl['date_created']); ?></label>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endforeach ?>
                
                <div id="calendar" class="mb">
                    <div class="panel green-panel no-margin">
                        <div class="panel-body">
                            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="disadding: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!-- <div id="gritter-notice-wrapper" class="bottom-right">
    <div id="gritter-item-1" class="gritter-item-wrapper my-sticky-class hover" style="">
        <div class="gritter-with-image">
            <img src="<?= base_url('ramadhan/ramadhan indotaichen.jpeg') ?>" width="240" height="400">
        </div>
    </div>
</div> -->