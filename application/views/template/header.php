<?php
$sql = $this->db->query("SELECT count(*) as jumlah
                                FROM tbl_makar
                                where status_karyawan like '%Kontrak%' and status_seragam ='Belum' and status_idcard ='Belum'and masa_kerja = 6 and status_aktif = 1")->row();
$jumlahKaryawanBaru = $sql->jumlah;
$sql_karyawanbaru = $this->db->query("SELECT
											count(*) as jumlah_karyawan_Verifikasi
											FROM
												tbl_makar
											WHERE
												NOT status_karyawan IN ('Resigned', 'perubahan_status')
												and year(tgl_evaluasi) = year(now())
												and tgl_evaluasi BETWEEN DATE_SUB(tgl_evaluasi, INTERVAL 14 day) AND now() 
												and status_email_kontrak is null
											ORDER BY
												tgl_masuk asc;")->row();
$jumlahVerifikasi = $sql_karyawanbaru->jumlah_karyawan_Verifikasi;

?>
<?php
if ($user['name']): ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>

    <link href="<?= base_url(); ?>img/logo.png" rel="icon">
    <link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">

    <link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url(); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>lib/gritter/css/jquery.gritter.css" />
    <link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
    <link href="<?= base_url(); ?>css/style-responsive.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/toastr/toastr.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>lib/chart-master/Chart.js"></script>

    <link rel="stylesheet" href="<?= base_url(); ?>lib/advanced-datatable/css/DT_bootstrap.css" />
    <link href="<?= base_url(); ?>lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url(); ?>select2/dist/css/select2.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Tambahkan ini di bagian <head> di template/header -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

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
            <a href="index.html" class="logo"><b>HR<span>IS</span></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <?php if ($user['dept'] == "HRD"): ?>
                <ul class="nav top-menu">
                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">
                            <i class="fa fa-bell-o"></i>
                            <!-- buat hitungan jumlah notif karyawan baru seragam + karyawan baru verifikasi -->
                            <span class="badge bg-important"><?= $jumlahKaryawanBaru + $jumlahVerifikasi; ?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">Ada <?= $jumlahKaryawanBaru; ?> Karyawan Baru Masa Kerja 6 Bulan</p>
                                <a href="<?= base_url('home/statusseragam'); ?>">
                                    <span class="label label-warning"><i class="far fa-id-badge"></i></span>
                                    <span class="small italic">Klik untuk Kirim Email</span>
                                </a>
                            </li>
                            <li>
                                <p class="green">Ada <?= $jumlahVerifikasi; ?> karyawan baru yang harus di evaluasi</p>
                                <a href="<?= base_url('home/karyawanbaru'); ?>">
                                    <span class="label label-success"><i class="far fa-id-badge"></i></span>
                                    <span class="small italic">Klik untuk untuk Email Evauasi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>

                <?php endif; ?>
                <!--  notification end -->

            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" id="logout" href="<?= base_url('auth/logout/') . $user['name']; ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- **********************************************************************************************************************************************************
		MAIN SIDEBAR MENU
		*********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="<?= base_url('home/editprofile'); ?>"><img
                                src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle"
                                width="80"></a></p>
                    <h5 class="centered">Welcome, <?= $user['name']; ?></h5>

                    <?php
						$role_id = $this->session->userdata('role_id');
						$special_user = $this->session->userdata('special_user');
						?>
                    <li>
                        <a href="<?= base_url('home/editprofile'); ?>"><i class="fa fa-edit"></i>PROFILE</a>
                    </li>
                    <?php if ($role_id == 8 || $role_id == 4 || $role_id == 2 || $role_id == 3 || $role_id == 9 || $role_id == 12 || $role_id == 13): ?>
                    <li class="sub-menu">
                        <a <?php if ($title == "Pengajuan" || $title == "Pengajuan1" || $title == "Pengajuan2" || $title == "Historis") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>APPROVAL TUGAS DINAS</span>
                        </a>
                        <ul class="sub">
                            <li <?php if ($title == "Pengajuan1")
										echo 'class="active"'; ?>>
                                <a href="<?= base_url('pci/tugas_dinas_menyetujui'); ?>">Pengajuan Tugas Dinas</a>
                            </li>

                            <li <?php if ($title == "Historis")
										echo 'class="active"'; ?>>
                                <a href="<?= base_url('pci/histori_tugas_dinas'); ?>">Histori Pengajuan</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <?php if ($role_id == 8 || $special_user == 2 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 9 || $role_id == 12 || $role_id == 13): ?>
                        <a <?php if ($title == "Pengajuan_cuti" || $title == "Pengajuan_cuti1" || $title == "Pengajuan_cuti2" || $title == "Historis_cuti") {
										echo 'class="active"';
									} ?> href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>APPROVAL CUTI</span>
                        </a>
                        <ul class="sub">
                            <li <?php if ($title == "Pengajuan_cuti1")
											echo 'class="active"'; ?>>
                                <a href="<?= base_url('pci/approve_cuti_menyetujui'); ?>">Pengajuan Cuti</a>
                            </li>

                            <li <?php if ($title == "Historis")
											echo 'class="active"'; ?>>
                                <a href="<?= base_url('pci/histori_approve_cuti'); ?>">Histori Pengajuan</a>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                    <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                    <li class="sub-menu">
                        <a <?php if ($title == "Dashboard" || $title == "Dashboard Karyawan Baru" || $title == "headdepartment" || $title == "Karyawan Habis Kontrak" || $title == "Status Seragam Dan ID card Karyawan Dept" || $title == "Status Seragam Dan ID card Karyawan ALL" || $title == "Data Karyawan Kedisiplinan" || $title == "Data Karyawan Keluar" || $title == "Data Karyawan Ulang Tahun" || $title == "Data Karyawan Masa Percobaan") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-dashboard"></i>
                            <span>DASHBOARD</span>
                        </a>
                        <ul class="sub">
                            <li <?php if ($title == "Dashboard") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home'); ?>">Headcount Karyawan</a></li>
                            <li <?php if ($title == "Dashboard Karyawan Baru") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/karyawanbaru'); ?>">Karyawan Baru</a></li>
                            <!-- <?php if ($role_id == 1 || $role_id == 2 || $role_id == 5): ?>
										<li <?php if ($title == "Dashboard Karyawan Baru 2") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('home/karyawanbaru2'); ?>">Karyawan Baru (test kirim email)</a></li>    
									<?php endif; ?>  -->
                            <!-- <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
										<li <?php if ($title == "headdepartment") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('data_atasan\index_atasan'); ?>">Atasan Dept</a></li>
									<?php endif; ?> -->
                            <li <?php if ($title == "Karyawan Habis Kontrak") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/habiskontrak'); ?>">Habis Kontrak</a></li>
                            <!-- <?php if ($role_id == 1 || $role_id == 2 || $role_id == 5 || $role_id == 2): ?>
										<li <?php if ($title == "Karyawan Habis Kontrak 2") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('home/habiskontrak2'); ?>">Habis Kontrak (test kirim email)</a></li>    
									<?php endif; ?>  -->
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Status Seragam Dan ID card Karyawan Dept") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('home\statusseragam_dept'); ?>">Seragam Dan ID
                                    Card Dept</a></li>
                            <?php endif; ?>
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 5 || $role_id == 2): ?>
                            <li <?php if ($title == "Status Seragam Dan ID card Karyawan ALL") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('home\statusseragam'); ?>">Seragam Dan ID Card
                                    ALL</a></li>
                            <?php endif; ?>
                            <li <?php if ($title == "Data Karyawan Kedisiplinan") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/kedisiplinan'); ?>">Surat Peringatan</a></li>
                            <li <?php if ($title == "Data Karyawan Keluar") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/keluar'); ?>">Karyawan Keluar</a></li>
                            <li <?php if ($title == "Data Karyawan Ulang Tahun") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/ulangtahun'); ?>">Karyawan Ulang Tahun</a>
                            </li>
                            <!-- <li <?php if ($title == "Data Karyawan Masa Percobaan") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('home/karyawantraining'); ?>">Karyawan Training</a></li> -->

                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7 || $role_id == 13 || $role_id == 9): ?>
                    <li class="sub-menu">
                        <a <?php if ($title == "Employee Information" || $title == "Employee Dept. Information" || $title == "PKWT" || $title == "Career Administration | Discipline" || $title == "Employee | Data Seragam") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>EMPLOYEE</span>
                        </a>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Employee Information") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('data_karyawan'); ?>">Employee Information</a>
                            </li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Employee Dept. Information") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('data_karyawan/per_dpt'); ?>">Employee Dept.
                                    Information</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li><a href="<?= base_url('data_karyawan/report'); ?>">Employee Report</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "PKWT") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('PKWT/index'); ?>">PKWT</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Career Administration | Discipline") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('career_adm/discipline'); ?>">Surat
                                    Peringatan</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Employee | Data Seragam ") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('Data_karyawan/seragam'); ?>">Data Seragam</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                    <li class="sub-menu">
                        <a <?php if ($title == "Recruitment | Permohonan" || $title == "Recruitment | Seleksi" || $title == "Recruitment | Exit Interview") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>RECRUITMENT</span>
                        </a>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Recruitment | Permohonan") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('Recruitment/index_permohonan'); ?>">Permohonan</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Recruitment | Seleksi") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('Recruitment/index_seleksi'); ?>">Seleksi</a>
                            </li>
                            <?php endif; ?>
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 9): ?>
                            <li <?php if ($title == "Recruitment | Exit Interview") {
											echo 'class="active"';
										} ?>><a href="<?= base_url('Recruitment/List_form_exit_interview'); ?>">Exit Interview</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <li class="sub-menu">
                        <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                        <a href="javascript:;" <?php if ($title == "Career Administration | Transition" || $title == "Career Administration | Report") {
									echo 'class="active"';
								} ?>>
                            <i class="fa fa-archive"></i>
                            <span>CAREER ADMINISTRATION</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Career Administration | Transision") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('career_adm/transision'); ?>">Career Transision</a>
                            </li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Career Administration | Report") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('career_adm/report'); ?>">Career Report</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7 || $role_id == 13 || $role_id == 9 || $role_id == 14): ?>
                        <a href="javascript:;" <?php if ($title == "Time Attendance | Izin Cuti" || $title == "Time Attendance | Lembur" || $title == "Time Attendance | Laporan Absen" || $title == "Time Attendance | Generate Cuti" || $title == "Time Attendance | Lembur Test") {
									echo 'class="active"';
								} ?>>
                            <i class="fa fa-clock-o"></i>
                            <span>TIME ATTENDANCE</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7 || $role_id == 13 || $role_id == 9 || $role_id == 14): ?>
                            <li <?php if ($title == "Time Attendance | Izin Cuti") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('pci'); ?>">Izin Cuti</a></li>
                            <?php endif; ?>

                            <!-- <?php if ($role_id == 1 || $role_id == 5): ?>
									<li <?php if ($title == "Time Attendance | Lembur Test") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('pkl2'); ?>">Lembur Test </a></li>
								<?php endif; ?> -->

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 7 || $role_id == 13 || $role_id == 9 ): ?>
                            <li <?php if ($title == "Time Attendance | Lembur") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('pkl'); ?>">Lembur</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Time Attendance | Laporan Absen") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('pci/laporan_absen'); ?>">Laporan Absen</a> </li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13 || $role_id == 14): ?>
                            <li <?php if ($title == "Time Attendance | Generate Cuti") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('pci/generate_cuti'); ?>">Laporan Sisa Cuti</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                        <a <?php if ($title == "Training" || $title == "Pelatihan" || $title == "Training Program" || $title == "Training Record" || $title == "Kompetensi" || $title == "Job Description" || $title == "OJT") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>People Development</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Training") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Training'); ?>">1. TNA</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Training Program") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Training/index_training_program'); ?>">2. Program
                                    Training</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Add Training Record") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Training_report/addTraining'); ?>">3. Add Record
                                    Training</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Training Record") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Training_report'); ?>">4. Record Training</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Evaluasi Training") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Training_report'); ?>">5. Evaluasi Training</a>
                            </li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "Upload Data Training") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('UploadDataTraining'); ?>">6. Upload Data
                                    Training</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Kompetensi") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Kompetensi'); ?>">Kompetensi</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "Job Description") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('job_description'); ?>">Job Description</a></li>
                            <?php endif; ?>

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "OJT") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('#'); ?>">OJT</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                        <a <?php if ($title == "KPI Karyawan" || $title == "KPI Karyawan | Setting | Setting BSC" || $title == "KPI Karyawan | Setting | Setting IPP" || $title == "KPI Karyawan | Setting | Laporan KPI" || $title == "KPI Karyawan | Setting | Feedback Dept") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-file-text"></i>
                            <span>KPI Karyawan</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub">
                            <?php if ($role_id == 1 || $role_id == 2): ?>
                            <li <?php if ($title == "KPI Karyawan | Setting | Setting BSC") {
										echo 'class="active"';
									} ?>>
                                <a href="<?= base_url('Kpi_karyawan/setting_bsc'); ?>">Setting BSC </a>
                            </li>
                            <li <?php if ($title == "KPI Karyawan | Setting | Setting IPP") {
										echo 'class="active"';
									} ?>>
                                <a href="<?= base_url('Kpi_karyawan/setting_ipp'); ?>">Setting IPP</a>
                            </li>
                            <li <?php if ($title == "KPI Karyawan | Setting | Laporan KPI") {
										echo 'class="active"';
									} ?>>
                                <a href="<?= base_url('Kpi_karyawan/laporan_kpi'); ?>">Laporan KPI</a>
                            </li>
                            <li <?php if ($title == "KPI Karyawan | Setting | Feedback Dept") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Kpi_karyawan/feedback'); ?>">Feedback Dept</a>
                            </li>
                            <?php elseif ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 6 || $role_id == 13): ?>
                            <li <?php if ($title == "KPI Karyawan | Setting | Laporan KPI") {
										echo 'class="active"';
									} ?>>
                                <a href="<?= base_url('Kpi_karyawan/laporan_kpi'); ?>">Laporan KPI</a>
                            </li>
                            <li <?php if ($title == "KPI Karyawan | Setting | Feedback Dept") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('Kpi_karyawan/feedback'); ?>">Feedback Dept</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                        <a <?php if ($title == "HR Admin") {
									echo 'class="active"';
								} ?> href="javascript:;">
                            <i class="fa fa-building-o"></i>
                            <span>HR Admin</span>
                        </a>
                        <?php endif; ?>
                        <ul class="sub">

                            <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4 || $role_id == 5 || $role_id == 13): ?>
                            <li <?php if ($title == "HR Admin") {
										echo 'class="active"';
									} ?>><a href="<?= base_url('hr_admin/karyawanbaru'); ?>">Memo karyawan baru</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if ($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 5 || $role_id == 13): ?>
                    <li>
                        <a <?php if ($title == "Setting" || $title == "History" || $title == "Menu Management" || $title == "Setting | Additional Info" || $title == "Setting | Divisi" || $title == "Setting | Golongan Darah" || $title == "Setting | Golongan" || $title == "Setting | Alamat" || $title == "Setting | Materi Training" || $title == "Setting | Pendidikan" || $title == "Setting | Religion") {
									echo 'class="active"';
								} ?> href="<?= base_url('setting'); ?>">
                            <i class="fa fa-gear"></i>
                            <span>SETTING</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <?php else: ?>
        <?php redirect('auth/out'); ?>
        <?php endif; ?>
