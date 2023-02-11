<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('pengentry/_partials/header') ?>
</head>


<body class="g-sidenav-show   bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>

	<?php $this->load->view('pengentry/_partials/sidebar') ?>

	<main class="main-content position-relative border-radius-lg ">

		<!-- Navbar -->
		<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
			<div class="container-fluid py-1 px-3">

				<!-- Load breadcumb -->

				<?php $this->load->view('pengentry/_partials/breadcumb') ?>

				<!-- Load navbar -->
				<?php $this->load->view('pengentry/_partials/navbar') ?>

			</div>

		</nav>

		<!-- MENU PROPOSAL -->
		<div class="container-fluid py-4">
			<div class="row">
				<h6 class="font-weight-light  text-white greeting mb-2">

				</h6>

				<h5 class=" text-white">Welcome to ACE, where data merging has never been easier.</h5>


				<!-- QOUTES -->
				<!-- <h6 class="font-weight-light text-white"><?= $quote; ?></h6>
				<p class="font-weight-bolder text-white font-italic mb-4">"<?= $author; ?>"</p> -->



				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<a class="card-block stretched-link text-decoration-none" href="<?php echo base_url() ?>ExcelJoin/insert_data">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-8">
										<div class="numbers">
											<p class="text-sm mb-0 text-uppercase font-weight-bold">Upload Excel File</p>
											<h5 class="font-weight-bolder">
												2 Tables

											</h5>
											<p class="mb-0">


											</p>
										</div>
									</div>
									<div class="col-4 text-end">
										<div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
											<i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
										</div>
									</div>
								</div>

							</div>
						</a>
					</div>
				</div>




				<div class="d-flex justify-content-end fixed-bottom">
					<lottie-player src="https://assets8.lottiefiles.com/packages/lf20_5i5k8eh3.json" id="siang" background="transparent" speed="1" style="width: 160px; height: 160px;" loop autoplay></lottie-player>
					<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_qxv9rb7w.json" id="malam" background="transparent" speed="0.5" style="width: 160px; height: 160px;" loop autoplay></lottie-player>
					<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_xcvaucib.json" id="pagi" background="transparent" speed="0.5" style="width: 160px; height: 160px;" loop autoplay></lottie-player>
				</div>
			</div>
		</div>
		<div id="footer" class="fixed-bottom">
			<?php $this->load->view('pengentry/_partials/footer') ?>
		</div>
	</main>

	<div class="fixed-plugin">
		<?php $this->load->view('pengentry/_partials/settingbar') ?>
	</div>
	<!--   Core JS Files   -->
	<?php $this->load->view('pengentry/_partials/js') ?>
	<!-- Load file javascript untuk sweet alert dan jquery -->
	<?php $this->load->view('pengentry/_partials/myjs') ?>



	<script type="text/javascript">
		$(document).ready(function() {
			var date = new Date();
			var jam = date.getHours();
			if (jam >= 0 && jam <= 10) {
				$('.greeting').html('Good Morning, Have a wonderful day!');
				$('#pagi').show();
				$('#siang').hide();
				$('#malam').hide();

			} else if (jam >= 11 && jam <= 14) {
				$('.greeting').html('Good Afternoon, Have a nice day!');
				$('#pagi').hide();
				$('#siang').show();
				$('#malam').hide();
			} else if (jam >= 15 && jam <= 18) {
				$('.greeting').html('Good Afternoon, Have a sweet Day!');
				$('#pagi').hide();
				$('#siang').show();
				$('#malam').hide();
			} else {
				$('.greeting').html('Good Evening, Have a amazing night!');
				$('#pagi').hide();
				$('#siang').hide();
				$('#malam').show();


			}

		});
	</script>




</body>

</html>