<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
                <!-- SERVER STATUS PANELS -->
                <div class="row">
                    <div class="col-md-12 mb">
                        <div class="col-lg-6 col-lg-offset-3 p404 centered">
                            <img src="<?= base_url(); ?>img/404.png" alt="">
                            <h1>OOPS!!</h1>
                            <h3>Halaman sedang dalam perbaikan :-( <br>
                            Mohon mencoba beberapa saat lagi.</h3>
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