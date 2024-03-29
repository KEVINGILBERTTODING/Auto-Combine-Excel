<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->



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

		<!-- Isi content -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-12">
					<div class="card mb-4 ">
						<div class="card-header ">
							<h3 id="h1">Auto Combine Excel</h3>
							<!-- Div flash data -->
							<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>

							<div class="d-flex justify-content-center">
								<lottie-player src="https://assets5.lottiefiles.com/packages/lf20_jkdsmf9r.json" id="siang" background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>

							</div>
						</div>
						<div class="container-md containerku">
							<form action="<?= base_url('ExcelJoin/import_excel'); ?>" method="post" enctype="multipart/form-data">

								<div class="row">
									<div class="col">
										<div class="row">
											<h4>Table 1</h4>
											<div class="col">
												<label for="Col">Primary Key<span class="text-danger">*</span></label>
												<div class="form-group w-20">
													<input class="form-control " type="number" id="col" name="col_unique_1" value="" required>
												</div>
											</div>

										</div>
										<div class="form-group" id="form_input_file">
											<h6>File Table 1<span class="text-danger">*</span></h6>
											<input class="form-control " type="file" id="input_file" name="fileExcel1" accept=".xls, .xlsx" required>
										</div>
									</div>

									<div class="col">
										<div class="row">
											<h4>Table 2</h4>
											<div class="col">
												<label for="Col">Primary Key<span class="text-danger">*</span></label>
												<div class="form-group w-20">
													<input class="form-control " type="number" id="col" name="col_unique_2" value="" required>
												</div>
											</div>

										</div>
										<div class="form-group" id="form_input_file">
											<h6>File Table 2<span class="text-danger">*</span></h6>
											<input class="form-control " type="file" id="input_file" name="fileExcel2" accept=".xls, .xlsx" required>
										</div>
									</div>
								</div>
								<div>
									<button class='btn btn-primary w-100' id="btn_submit" type="submit">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										Join
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>








			<div class=" modal fade" id="alertError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">

							<div class="form-group  d-flex justify-content-center">
								<div class="row">
									<lottie-player class="text-center" src=" https://assets10.lottiefiles.com/packages/lf20_tl52xzvn.json" id="anim_email_failed" background="transparent" speed="1" style="width: 120px; height: 120px;" loop autoplay></lottie-player>
									<div class="col">

										<br>
										<h5>Harap periksa kembali file yang anda upload</h5>
										<p>Seperti format file dan ukuran file</p>

									</div>
								</div>

							</div>


						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>

						</div>
					</div>
				</div>
			</div>

			<div id="footer">
				<?php $this->load->view('pengentry/_partials/footer') ?>
			</div>

	</main>





	<div class="fixed-plugin">
		<?php $this->load->view('pengentry/_partials/settingbar') ?>
	</div>

	<!-- Load file javascript untuk sweet alert dan jquery -->
	<?php $this->load->view('pengentry/_partials/myjs') ?>
	<!--   Core JS Files   -->
	<?php $this->load->view('pengentry/_partials/js') ?>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- pengentryLTE App -->
	<script src="<?php echo base_url(); ?>assets/assets/js/app.min.js" type="text/javascript"></script>






	<!-- Fungsi memunculkan allert gagal -->
	<?php
	$upload_error =  $this->session->flashdata('upload_error');
	if (isset($upload_error)) {

	?>
		<script>
			$(document).ready(function() {
				$('#alertError').modal('show');

			});
		</script>
	<?php
	} else {
	?>

	<?php
	}
	?>










</body>

</html>