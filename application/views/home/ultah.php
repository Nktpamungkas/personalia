<style>
    .blinking{
        animation:blinkingText 0.8s infinite;
    }
    @keyframes blinkingImage{
        0%{     color: #00000;    }
        100%{    color: transparent; }
        100%{   color: #00000;    }
    }
</style>    
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <?php if($user['dept'] == "DIT" OR $user['dept'] == "HRD" OR $user['dept'] == "GAC") : ?>
                    <div class="row">
                        <div class="col-md-4 mb">
                            <?= form_open(base_url('Home/send_mail'));  ?>
                                <label>
                                    <input type="submit" name="submit" class="btn btn-theme04" value="Kirim ucapan melalui email">
                                </label>
                            <?= form_close(); ?> 
                        </div>
                    </div>
                <?php endif; ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="row">
                    <?php 
                        $query = $this->db->query("SELECT * FROM tbl_makar WHERE
                                                        DATE_FORMAT( tgl_lahir, '%m-%d' ) = DATE_FORMAT( Now( ), '%m-%d' ) 
                                                        AND NOT status_aktif = 0")->result_array(); 
                    ?>
                    <?php foreach($query AS $data) : ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="showback">
                            <div>
                                <center>
                                    <img src="<?= base_url(); ?>img/ultah.gif" weight="150" height="150"><br>
                                    <b><?= $data['nama']; ?></b>, Departement <b><?= $data['dept']; ?><br></b> 
                                        <?php 
                                            if ($user['dept'] == "HRD" || $user['dept'] == "DIT") {
                                                if(!empty($data['email_pribadi'])){ 
                                                    echo $data['email_pribadi']; 
                                                } else { 
                                                    echo "<i>e-mail belum tersedia</i>"; 
                                                }
                                            }
                                        ?>
                                </center>
                                <input type="hidden" name="email_address[]" value="<?= $data['email_pribadi']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
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
                <h4 class="centered mt">ANGGOTA TEAM ONLINE</h4>
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