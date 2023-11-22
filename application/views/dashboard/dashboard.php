<!-- Main Content -->
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Dashboard</h4>
		</div>

		<!-- USER SESSION -->
		<?php
			if($this->fungsi->user_login()->level == 2) { ?>
				<div class="row">
					<div class="col-6">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-users"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Jumlah Lisensi EA</p>
											<h4 class="card-title"><?=$this->lisensi_model->count_filtered()?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="far fa-list-alt"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Jumlah Akun Termonitor</p>
											<h4 class="card-title"><?=$this->monitoring_model->count_filtered()?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php } ?>

		<!-- ADMIN SESSION -->
		<?php
		if($this->fungsi->user_login()->level == 1) { ?>

				<div class="row">
					<div class="col-xl-4">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-user"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Data User Total</p>
											<h4 class="card-title"><?php $ci =& get_instance(); echo $ci->user_model->totaluserforadmin()?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-list-alt"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Data Monitoring Total</p>
											<h4 class="card-title"><?php $ci =& get_instance(); echo $ci->user_model->totalMonitoringforAdmin() ?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="card card-stats card-round">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-key"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Data Lisensi Total</p>
											<h4 class="card-title"><?php $ci =& get_instance(); echo $ci->user_model->totalLisensiforAdmin() ?></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- End Main Content -->