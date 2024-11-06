<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= htmlspecialchars($title); ?></title>
	<link href="<?= base_url(); ?>img/logo.png" rel="icon">
	<link href="<?= base_url(); ?>img/logo.png" rel="apple-touch-icon">
	<link href="<?= base_url(); ?>lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?= base_url(); ?>css/style.css" rel="stylesheet">
	<script src="<?= base_url(); ?>lib/jquery/jquery.js"></script>
	<script src="<?= base_url(); ?>jSignature/libs/jSignature.min.js"></script>
	<script src="<?= base_url(); ?>jSignature/libs/modernizr.js"></script>
	<style>
		#signature {
			width: 100%;
			height: auto;
			border: 1px solid black;
		}

		.centered {
			text-align: center;
		}
	</style>
</head>

<body>
	<section id="container">
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>
			<a href="index.html" class="logo"><b>HR<span>IS</span></b></a>
			<div class="top-menu">
				<ul class="nav pull-right top-menu">
					<li><a class="logout" href="<?= base_url('auth/logout/') . urlencode($user['name']); ?>">Logout</a>
					</li>
				</ul>
			</div>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse">
				<ul class="sidebar-menu" id="nav-accordion">
					<p class="centered">
						<a href="#">
							<img src="<?= base_url('img/profile/') . $user['image']; ?>" class="img-circle" width="80"
								alt="Profile Picture">
						</a>
					</p>
					<h5 class="centered">Welcome, <?= htmlspecialchars($user['name']); ?></h5>
				</ul>
			</div>
		</aside>
	</section>
	<section id="main-content">
		<section class="wrapper">
			<h4><i class="fa fa-angle-right"></i> Create Signature</h4>
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 mb">
					<div class="weather-2 pn">
						<div class="weather-2-header">
							<div class="row">
								<div class="col-sm-12 col-xs-12 centered">
									<p>Touch and move your mouse in the area below to create your signature.</p>
								</div>
							</div>
						</div>
						<form action="<?= base_url(); ?>data_karyawan/addttd/<?= $no_scan; ?>" method="POST"
							enctype="multipart/form-data">
							<div class="row data">
								<div id="signature"></div>
								<center>
									<?php $key = $this->db->query("SELECT nama FROM tbl_makar WHERE no_scan='$no_scan'")->row(); ?>
									<strong><?= strtoupper(htmlspecialchars($key->nama)); ?></strong>
								</center>
								<a href="<?= base_url(); ?>data_karyawan" class="btn btn-primary btn-sm">Back</a>
								<input type='submit' id='click' value='Preview' class="btn btn-success btn-sm">
								<textarea id='output' name="ttd"></textarea>
								<img id='sign_prev' style='display: none;' alt="Signature Preview">
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</section>
	<script>
		$(document).ready(function () {
			// Initialize jSignature
			var $sigdiv = $("#signature").jSignature({
				'UndoButton': true
			});

			$('#click').click(function (event) {
				event.preventDefault(); // Prevent form submission
				// Get response of type image
				var data = $sigdiv.jSignature('getData', 'image');

				// Store in textarea
				$('#output').val(data);

				// Set image source
				$('#sign_prev').attr('src', "data:" + data);
				$('#sign_prev').show();
			});
		});
	</script>
</body>

</html>