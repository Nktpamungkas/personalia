<?php
        $sql= $this->db->query( "SELECT count(*) as jumlah
                                FROM tbl_makar
                                where status_karyawan like '%Kontrak%' and status_seragam ='Belum' and status_idcard ='Belum'and masa_kerja = 6 and status_aktif = 1")->row();
$jumlahKaryawanBaru = $sql->jumlah;
		$sql_karyawanbaru=$this->db->query( "SELECT
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

		$datakontrak = $this->db->query("SELECT count(*) as jml_kontakhabis
				FROM
					tbl_makar a
					INNER JOIN ( SELECT * FROM tbl_kontrak ) b ON b.no_scan = a.no_scan 
				WHERE
				b.kontrak_akhir BETWEEN NOW()
							AND DATE_ADD( NOW(), INTERVAL '1' week )
					and NOT a.status_karyawan in( 'Resigned' ,'perubahan_status')
					and a.status_email_kontrak is null 
				ORDER BY
					b.kontrak_akhir ASC")->row();
		$humlahkontrak = $datakontrak->jml_kontakhabis;
								
?>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-9 main-chart">
                <div class="border-head">
                    <h3>HUMAN RESOURCES INFORMATION SYSTEM</h3>
                </div>
				<?php
					// Misalnya, Anda memiliki variabel $peran yang berisi peran pengguna saat ini
					$peran = $user['name'] == "iso.hrd";

					if ($peran) {
						// Jika peran pengguna adalah iso.hrd, maka tampilkan HTML
					?>
				<div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Karyawn Baru (ID Card dan Seragam)</h5>
                  </div>
				  <a href="<?= base_url('home/statusseragam'); ?>">
                  <h1 class="mt"><i class="fa fa-id-badge fa-2x"></i></h1>
				  </a>
                  <footer>
                    <div class="centered">
					<p> Karyawan Baru Masa Kerja 6 Bulan</p>
					<h3 id="important" style="display: inline;"><span style="color: red;"><?= $jumlahKaryawanBaru; ?></span></h3>
						<script>
							// Fungsi untuk membuat teks berkelap-kelip
							function blink() {
								var element = document.getElementById('important');
								var jumlahKaryawanBaru = <?= $jumlahKaryawanBaru; ?>; 

								// Cek apakah jumlahKaryawanBaru bukan 0
								if (jumlahKaryawanBaru !== 0) {
									setInterval(function() {
										element.style.visibility = (element.style.visibility == 'hidden' ? '' : 'hidden');
									}, 500); // Interval dalam milidetik (500ms = setengah detik)
								}
							}
							blink(); // Panggil fungsi blink untuk membuat teks berkelap-kelip jika jumlahKaryawanBaru tidak sama dengan 0
						</script>

						 <h5>Karyawan</h5>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>

			  <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Habis Kontrak</h5>
                  </div>
				  <a href="<?= base_url('home/habiskontrak'); ?>">
                  <h1><i class="fa fa-file-text fa-2x"></i></h1>
				  </a>
                 <footer>
                    <div class="centered">
					 <p>Karyawan Yang Akan Habis Kontrak 7 hari kedepan</p>
					 <h3 id="important3" style="display: inline;">
						<?php if ($humlahkontrak == 0): ?>
							<span style="color: white;"><?= $humlahkontrak; ?></span>
						<?php else: ?>
							<span style="color: red;"><?= $humlahkontrak; ?></span>
						<?php endif; ?>
					</h3>
					<!-- <h3 id="important3" style="display: inline;"><span style="color: red;"><?= $humlahkontrak; ?></span></h3> -->
					<script>
							// Fungsi untuk membuat teks berkelap-kelip
							function blink3() {
								var element = document.getElementById('important3');
								var humlahkontrak = <?= $humlahkontrak; ?>; 

								// Cek apakah jumlahKaryawanBaru bukan 0
								if (humlahkontrak !== 0) {
									setInterval(function() {
										element.style.visibility = (element.style.visibility == 'hidden' ? '' : 'hidden');
									}, 500); // Interval dalam milidetik (500ms = setengah detik)
								}
							}
							blink3(); // Panggil fungsi blink untuk membuat teks berkelap-kelip jika jumlahKaryawanBaru tidak sama dengan 0
						</script>
					  <h5>Karyawan</h5>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>

			  <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Evaluasi</h5>
                  </div>
				  <a href="<?= base_url('home/karyawanbaru'); ?>">
                  <h1 class="mt"><i class="fa fa-user fa-2x"></i></h1>
				  </a>
                <footer>
                    <div class="centered">
					<p>karyawan baru yang harus di evaluasi</p>					
					<h3 id="important2" style="display: inline;"><span style="color: red;"><?= $jumlahVerifikasi; ?></span></h3>
					<script>
							// Fungsi untuk membuat teks berkelap-kelip
							function blink2() {
								var element = document.getElementById('important2');
								var jumlahVerifikasi = <?= $jumlahVerifikasi; ?>; 

								// Cek apakah jumlahKaryawanBaru bukan 0
								if (jumlahVerifikasi !== 0) {
									setInterval(function() {
										element.style.visibility = (element.style.visibility == 'hidden' ? '' : 'hidden');
									}, 500); // Interval dalam milidetik (500ms = setengah detik)
								}
							}
							blink2(); // Panggil fungsi blink untuk membuat teks berkelap-kelip jika jumlahKaryawanBaru tidak sama dengan 0
						</script>
					 <h5>Karyawan</h5>
                    </div>
                </footer>
                </div>
                <!--  /darkblue panel -->
              </div>
			  <?php
				}
			?>
                <!-- SERVER STATUS PANELS -->
                <div class="row mt">
                    <div class="col-md-3 col-sm-8 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5><b>TOTAL KARYAWAN PRIA</b></h5>
                            </div>
                            <?php 
                                $aktiveL = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1' AND jenis_kelamin='Laki' AND NOT status_karyawan in ('perubahan_status','Resigned')")->row();
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
                                    $active = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_aktif = '1'AND NOT status_karyawan in ('perubahan_status','Resigned')")->row();
                                ?>
                                <h5>TOTAL KARYAWAN TETAP & KONTRAK</h5>
                            </div>
                           
                            <p><img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle" width="50"></p>
                            <p><b>PT. INDOTAICHEN TEXTILE INDUSTRI</b><br><?= $active->jml; ?></p>
                            
                            <div class="row">
                                <?php 
                                    $kontrak    = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%Kontrak%' AND status_aktif = '1'")->row();
                                    $tetap      = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%Tetap%' AND status_aktif = '1'")->row();
                                    $pkwt    = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%PKWT%'  AND status_aktif = '1'")->row();
                                    $expat      = $this->db->query("SELECT Count(*) AS jml FROM tbl_makar WHERE status_karyawan LIKE '%expat%' AND status_aktif = '1'")->row();
                                ?>
                                <div class="col-md-3">
                                    <p class="small mt">Expat</p>
                                    <p><?= $expat->jml; ?></p>
                                </div>
                                <div class="col-md-3">
                                     <p class="small mt">KARYAWAN TETAP</p>
                                    <p><?= $tetap->jml; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="small mt">KARYAWAN KONTRAK</p>
                                    <p><?= $kontrak->jml; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="small mt">PKWT-PD</p>
                                    <p><?= $pkwt->jml; ?></p>
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
