<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title; ?></title>
    <link href="<?= base_url(); ?>img/logo.png" rel="icon">
    <link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">
    <link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
    <script src="<?= base_url(); ?>lib/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>jSignature/libs/jSignature.min.js"></script>
    <script src="<?= base_url(); ?>jSignature/libs/modernizr.js"></script>
</head>
<style>
    #signature{
    width: 100%;
    height: auto;
    border: 1px solid black;    
    }
</style>
<body>
    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>HR<span>IS</span></b></a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?= base_url('auth/logout/') . $user['name']; ?>">Logout</a></li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="#"><img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle" width="80"></a></p>
                    <h5 class="centered">Welcome, <?= $user['name']; ?></h5>
                </ul>
            </div>
        </aside>
    </section>
    <section id="main-content">
        <section class="wrapper">
            <h4><i class="fa fa-angle-right"></i> Buat Tanda Tangan</h4>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 mb">
                    <div class="weather-2 pn">
                        <div class="weather-2-header">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <center><p>Sentuh dan gerakkan mouse anda pada area di bawah ini untuk membuat gambar tanda tangan.</p></center>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url(); ?>data_karyawan/addttd/<?= $no_scan; ?>" method="POST" enctype="multipart/form-data">
                            <div class="row data">
                                <div id="signature" style="color:black;"></div>
                                <center style="color:black; font-weight:bold;">
                                    <?php $key = $this->db->query("SELECT nama FROM tbl_makar WHERE no_scan='$no_scan'")->row(); ?>
                                    <?= strtoupper($key->nama); ?>
                                </center>
                                <a href="<?= base_url(); ?>data_karyawan" class="btn btn-primary btn-sm">Kembali</a>
                                <input type='submit' id='click' value='Preview' class="btn btn-success btn-sm">
                                <textarea id='output' name="ttd" hidden></textarea>
                                <img id='sign_prev' name="ttd" style='display: none;' hidden>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
</html>
<!-- Script -->
<script>
    $(document).ready(function() {

    // Initialize jSignature
    var $sigdiv = $("#signature").jSignature({'UndoButton':true});

        $('#click').click(function(){
            // Get response of type image
            var data = $sigdiv.jSignature('getData', 'image');

            // Storing in textarea
            $('#output').val(data);

            // Alter image source 
            $('#sign_prev').attr('src',"data:"+data);
            $('#sign_prev').show();
        });
    });
</script>