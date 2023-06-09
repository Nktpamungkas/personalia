<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                        <i class="fa fa-gear"></i><b> Setting </b> 
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li <?php if($title == "History"){ echo 'class="active"'; } ?>><a href="<?= base_url('history') ?>"> <i class="fa fa-clock-o"></i> History</a></li>
                            <li <?php if($title == "Menu Management"){ echo 'class="active"'; } ?>><a href="<?= base_url('menu') ?>"> <i class="fa fa-user-md"></i> Management</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-gear"></i><b> Setting Cuti</b> 
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li <?php if($title == "Setting | Cuti"){ echo 'class="active"'; } ?> ><a href="<?= base_url('setting/cuti') ?>"> <i class="fa fa-pencil"></i> Keterangan Cuti </a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-gear"></i><b> Setting Master Data</b> 
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li <?php if($title == "Setting | Additional Info"){ echo 'class="active"'; } ?> ><a href="<?= base_url('setting/additional_info') ?>"> <i class="fa fa-pencil"></i> Additional Info </a></li>

                            <li <?php if($title == "Setting | Divisi"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/divisi') ?>"> <i class="fa fa-pencil"></i> Divisi</a></li>

                            <li <?php if($title == "Setting | Golongan Darah"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/gol_darah') ?>"> <i class="fa fa-pencil"></i> Golongan Darah</a></li>

                            <li <?php if($title == "Setting | Golongan"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/golongan') ?>"> <i class="fa fa-pencil"></i> Golongan</a></li>
                            
                            <li <?php if($title == "Setting | Alamat"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/alamat') ?>"> <i class="fa fa-pencil"></i> Alamat</a></li>
                            
                            <li <?php if($title == "Setting | Materi Training"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/materi_training') ?>"> <i class="fa fa-pencil"></i> Materi Training</a></li>
                            
                            <li <?php if($title == "Setting | Pendidikan"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/pendidikan') ?>"> <i class="fa fa-pencil"></i> Pendidikan</a></li>
                            
                            <li <?php if($title == "Setting | Religion"){ echo 'class="active"'; } ?>><a href="<?= base_url('setting/religion') ?>"> <i class="fa fa-pencil"></i> Religion</a></li>
                        </ul>
                    </div>
                </section>
            </div>
       