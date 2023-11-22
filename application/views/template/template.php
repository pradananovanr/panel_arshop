<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Panel - RumahRobotForex</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/assets/img/favicon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?=base_url()?>assets/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/azzara.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/sweetalert2.min.css" id="theme-styles">

</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="purple">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="<?=base_url()?>" class="logo">
					<img src="<?=base_url()?>assets/assets/img/logoku-inkscape.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="<?=base_url()?>assets/assets/img/avatar2.svg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="<?=base_url()?>assets/assets/img/avatar2.svg" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4><?= $this->fungsi->user_login()->fullname ?></h4>
											<p class="text-muted"><?= $this->fungsi->user_login()->email ?></p><a href="<?= site_url('profile/my')?>" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?=site_url('auth/logout')?>">Logout</a>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar USER SESSION -->
		<?php
		if($this->fungsi->user_login()->level == 2) { ?>
		<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?=base_url()?>assets/assets/img/avatar2.svg" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" aria-expanded="true">
								<span>
									<?= $this->fungsi->user_login()->fullname ?>
									<span class="user-level"><?= $this->fungsi->user_login()->username ?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="<?=base_url()?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Kontrol EA</h4>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('daftar/listlisensi')?>">
								<i class="fas fa-list-alt"></i>
								<p>List Lisensi</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?=site_url('pesan/messages')?>">
								<i class="fas fa-envelope"></i>
								<p>Kirim Pesan</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Monitoring EA</h4>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('monitoring/monitor')?>">
								<i class="fas fa-list"></i>
								<p>Monitoring</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('monitoring/public')?>">
								<i class="fas fa-link"></i>
								<p>Setting Public Link</p>
							</a>
						</li>

						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Log</h4>
						</li>
						<li class="nav-item">
							<a href="<?=site_url('logger/log')?>">
								<i class="fas fa-sticky-note"></i>
								<p>Logger</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Account</h4>
						</li>

						<li class="nav-item">
							<a href="<?=site_url('profile/my')?>">
								<i class="fas fa-cog"></i>
								<p>My Account</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar USER SESSION -->
		<?php } ?>

		<?php 
		if($this->fungsi->user_login()->level == 1) { ?>
		<!-- Sidebar ADMIN SESSION -->
		<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?=base_url()?>assets/assets/img/avatar2.svg" class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" aria-expanded="true">
								<span>
									<?= $this->fungsi->user_login()->fullname ?>
									<span class="user-level"><?= $this->fungsi->user_login()->username ?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="<?=base_url()?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?=base_url()?>daftar/listUser">
								<i class="fas fa-list"></i>
								<p>List User</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Account</h4>
						</li>

						<li class="nav-item">
							<a href="<?=site_url('profile/my')?>">
								<i class="fas fa-cog"></i>
								<p>My Account</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- End Sidebar ADMIN SESSION -->

		<!-- <script src="<?=base_url()?>assets/assets/js/core/jquery-3.5.1.js"></script> -->
		<script src="<?=base_url()?>assets/assets/js/core/jquery.3.2.1.min.js"></script>

		<?php echo $contents ?>
	</div>
</div>
<!--   Core JS Files   -->
<!-- <script src="<?=base_url()?>assets/assets/js/core/jquery-3.5.1.js"></script> -->
<script src="<?=base_url()?>assets/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="<?=base_url()?>assets/assets/js/core/popper.min.js"></script>
<script src="<?=base_url()?>assets/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="<?=base_url()?>assets/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?=base_url()?>assets/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?=base_url()?>assets/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<script src="<?=base_url()?>assets/assets/js/plugin/moment/moment.min.js"></script>

<!-- Chart JS -->
<script src="<?=base_url()?>assets/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?=base_url()?>assets/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?=base_url()?>assets/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?=base_url()?>assets/assets/js/plugin/datatables/datatables.min.js"></script>
<!-- <script src="<?=base_url()?>assets/assets/js/plugin/datatables/dataTables.fixedColumns.min.js"></script> -->

<!-- Bootstrap Notify -->
<script src="<?=base_url()?>assets/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Bootstrap Toggle -->
<script src="<?=base_url()?>assets/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?=base_url()?>assets/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>assets/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Google Maps Plugin -->
<script src="<?=base_url()?>assets/assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="<?=base_url()?>assets/assets/js/plugin/sweetalert/sweetalert2.min.js"></script>

<!-- Azzara JS -->
<script src="<?=base_url()?>assets/assets/js/ready.min.js"></script>


<script>
	$(document).on('click', '#deleteuser', function(e) {
		e.preventDefault();
		var link = $(this).attr('href');

		Swal.fire({
			title: 'Yakin Hapus Data?',
			text: "Data Tidak Dapat Dikembalikan",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
		if(result.isConfirmed) {
			window.location = link;
		}
		})
	})
</script>


</body>
</html>