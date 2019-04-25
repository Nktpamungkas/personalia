<?php
if ($user['name']) : ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>

    <!-- Favicons -->
    <link href="<?= base_url(); ?>img/logoitti.png" rel="icon">
    <link href="<?= base_url(); ?>img/logoitti.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url(); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>css/style-responsive.css" rel="stylesheet">
    <script src="<?= base_url(); ?>lib/chart-master/Chart.js"></script>
    <!-- CLASS TABLE -->
    <link rel="stylesheet" href="<?= base_url(); ?>lib/advanced-datatable/css/DT_bootstrap.css" />
    <link href="<?= base_url(); ?>lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
    <!-- choosen -->
    <link rel="stylesheet" href="<?= base_url(); ?>chosen/docsupport/prism.css">
    <link rel="stylesheet" href="<?= base_url(); ?>chosen/chosen.css">

</head>


<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>HC<span>IS</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?= base_url('auth/logout/') . $user['name']; ?>">Logout</a></li>
                </ul>
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="profile.html"><img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle" width="80"></a></p>
                    <h5 class="centered">Welcome, <?= $user['name']; ?></h5>

                    <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_sub_menu`.`id`, `title`, `icon`, `url`
                                    FROM `user_sub_menu` JOIN `user_access_menu`
                                     ON  `user_sub_menu`.`id` = `user_access_menu`.`menu_id`
                                   WHERE `user_access_menu`.`role_id` = $role_id AND NOT `user_sub_menu`.`is_active` = 0 
                                ORDER BY `user_access_menu`.`menu_id` ASC
                                ";
                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>
                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>
                    <?php if ($title == $m['title']) : ?>
                    <li>
                        <a class="active" href="<?= base_url($m['url']); ?>">
                            <?php else : ?>
                    <li>
                        <a class="" href="<?= base_url($m['url']); ?>">
                            <?php endif; ?>

                            <i class="<?= $m['icon']; ?>"></i>
                            <span><?= $m['title']; ?></span>
                        </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside> 
<?php else : ?>
<?php redirect('auth/out'); ?>
<?php endif; ?>