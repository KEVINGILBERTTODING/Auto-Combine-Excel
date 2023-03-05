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
							<h3 id="h1">Final Result</h3>



							<!-- Div flash data -->
							<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>

						</div>

						<?php
						$query_string = http_build_query($result_1);
						$query_string2 = http_build_query($result_2);



						$count = count(array_filter($result_1[1], function ($value) {
							return $value !== null;
						}));

						$count2 = count(array_filter($result_2[1], function ($value) {
							return $value !== null;
						}));

						// var_dump($data);

						?>


						<div class="container-md containerku">
							<div class="d-flex justify-content-end">
								<form action="<?= base_url('ExcelJoin/export'); ?>" method="post" target="_blank">
									<input type="text" name="data" value="<?= $query_string; ?>" hidden>
									<input type="text" name="total_row_1" value="<?= $count; ?>" hidden>
									<input type="text" name="data2" value="<?= $query_string2; ?>" hidden>
									<input type="text" name="total_row_2" value="<?= $count2; ?>" hidden>
									<input type="text" name="col_unique_1" value="<?= $coll_unique_1; ?>" hidden>
									<input type="text" name="col_unique_2" value="<?= $coll_unique_2; ?>" hidden>

									<button type="submit" class="btn btn-primary">Export to .xlsx</button>
								</form>

							</div>
							<?php

							if ($result_1 == null || $result_2 == null) { ?>

								<div class="text-center">
									<div class="d-flex justify-content-center"><lottie-player src="https://assets6.lottiefiles.com/packages/lf20_agnejizn.json" mode="bounce" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player></div>
								</div>

								<div class='text-warning text-center mt-3'>
									<h5>Sorry data not found</h5>
									<p>Please check your file again</p>
								</div>
								<div class="text-center ">
									<a class="btn btn-primary d-flex justify-content-center w-100" href="<?= base_url('pengentry/Coklit/insert_data') ?>">Kembali</a>

								</div>
							<?php } else { ?>
								<div class="table-responsive  tb-iwkl p-0">
									<table class="table table-striped align-items-center mt-3 mb-0" id="tbl_result">
										<thead>
											<tr>

												<?php

												$alpahbeth = range('A', 'Z');
												$no = 1;

												echo '<th class="text-uppercase text-xxs font-weight-bolder bg-primary text-white">No</th>';

												// Header table 1
												for ($i = 0; $i < $total_row_1; $i++) {

													echo "<th class='text-uppercase text-xxs font-weight-bolder bg-primary text-white'>" . $result_1[1][$alpahbeth[$i]] . "</th>";
												}


												echo '<th class="text-uppercase text-xxs font-weight-bolder bg-primary "> </th>';


												// Header table 2
												for ($i = 0; $i < $total_row_2; $i++) {

													echo "<th class='text-uppercase text-xxs font-weight-bolder bg-primary text-white'>" . $result_2[1][$alpahbeth[$i]] . "</th>";
												}


												?>

											</tr>
										</thead>

										<tbody>




											<?php $no = 1; ?>
											<?php

											$not_match_1 = array();
											$not_match_2 = array();


											foreach ($result_1 as $row) {
												$founded = false;

												foreach ($result_2 as $row2) {
													if ($row[$coll_unique_1] == $row2[$coll_unique_2]) {
														$founded = true;
														break;
													}
												}

												if (!$founded) {
													$not_match_1[] = $row;
												}
											}

											foreach ($result_2 as $row2) {
												$founded = false;

												foreach ($result_1 as $row) {
													if ($row[$coll_unique_1] == $row2[$coll_unique_2]) {
														$founded = true;
														break;
													}
												}

												if (!$founded) {
													$not_match_2[] = $row2;
												}
											}



											foreach ($result_1 as $row) {
												foreach ($result_2 as $row2) {
													if ($row[$coll_unique_1] == $row2[$coll_unique_2]) {
														echo "<tr>";
														echo "<td>" . $no++ . "</td>";
														for ($i = 0; $i < $total_row_1; $i++) {
															echo "<td>" . $row[$alpahbeth[$i]] . "</td>";
														}
														echo "<td ></td>";
														for ($i = 0; $i < $total_row_2; $i++) {
															echo "<td>" . $row2[$alpahbeth[$i]] . "</td>";
														}
														echo "</tr>";
													}
												}
											}
											?>

										</tbody>
									</table>

								</div>


								<button class="btn btn-warning btn-sm w-100 mt-2" id="btn_detail">More Detail <i class="fas fa-angle-double-down"></i></button>
								<button class="btn btn-warning btn-sm w-100 mt-2" id="btn_close_detail">Close Detail <i class="fas fa-angle-double-up"></i></button>



								<div class="table-responsive   tb-iwkl p-0" id="tbl_not_found_1">

									<table class="table table-striped align-items-center mt-3 mb-0" id="tbl_not_match_1">
										<h5 class="text-secondary">Data doesn't match in table 1</h5>
										<thead>
											<tr>

												<?php

												$alpahbeth = range('A', 'Z');
												$no = 1;

												echo '<th class="text-uppercase text-xxs font-weight-bolder bg-danger text-white">No</th>';

												// Header table 1
												for ($i = 0; $i < $total_row_1; $i++) {

													echo "<th class='text-uppercase text-xxs font-weight-bolder bg-danger text-white'>" . $result_1[1][$alpahbeth[$i]] . "</th>";
												}





												?>

											</tr>
										</thead>

										<tbody>


											<?php $no = 1; ?>
											<?php



											foreach ($not_match_1 as $row) {
												echo "<tr>";
												echo "<td>" . $no++ . "</td>";
												for ($i = 0; $i < $total_row_1; $i++) {
													echo "<td>" . $row[$alpahbeth[$i]] . "</td>";
												}
												echo "</tr>";
											}



											?>

										</tbody>
									</table>
								</div>


								<div class="table-responsive mt-4 tb-iwkl p-0" id="tbl_not_found_2">
									<h5 class="text-secondary">Data doesn't match in table 2</h5>



									<table class="table table-striped align-items-center mt-3 mb-0" id="tbl_not_match_2">
										<thead>
											<tr>

												<?php

												$alpahbeth = range('A', 'Z');
												$no = 1;

												echo '<th class="text-uppercase text-xxs font-weight-bolder bg-danger text-white">No</th>';


												// Header table 2
												for ($i = 0; $i < $total_row_2; $i++) {

													echo "<th class='text-uppercase text-xxs font-weight-bolder bg-danger text-white'>" . $result_2[1][$alpahbeth[$i]] . "</th>";
												}


												?>

											</tr>
										</thead>

										<tbody>




											<?php $no = 1; ?>
											<?php



											foreach ($not_match_2 as $row2) {
												echo "<tr>";
												echo "<td>" . $no++ . "</td>";
												for ($i = 0; $i < $total_row_2; $i++) {
													echo "<td>" . $row2[$alpahbeth[$i]] . "</td>";
												}
												echo "</tr>";
											}



											?>

										</tbody>
									</table>
								</div>
							<?php }



							?>






						</div>
					</div>
				</div>






				<div class=" modal fade" id="alertError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Warning</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>

							<div class="modal-body">

								<div class="form-group  d-flex justify-content-center">
									<div class="row">
										<lottie-player class="text-center" src=" https://assets10.lottiefiles.com/packages/lf20_tl52xzvn.json" id="anim_email_failed" background="transparent" speed="1" style="width: 120px; height: 120px;" loop autoplay></lottie-player>
										<div class="col">

											<br>
											<h5>Please check your file again!</h5>
											<p class="text-secondary">Please check your file again, because your file doesn't match with the table</p>

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

	<script>
		$(document).ready(function() {
			$('#tbl_result').DataTable({
				lengthMenu: [
					[-1],
					["All"]
				]
			});

			$('#tbl_not_match_1').DataTable({
				lengthMenu: [
					[-1],
					["All"]
				]
			});

			$('#tbl_not_match_2').DataTable({
				lengthMenu: [
					[-1],
					["All"]
				]
			});


		});
	</script>

	<script>
		$(document).ready(function() {
			$('#tbl_not_found_1').hide();
			$('#tbl_not_found_2').hide();
			$('#btn_close_detail').hide();



			$('#btn_detail').click(function() {
				$('#tbl_not_found_1').show();
				$('#tbl_not_found_2').show();
				$('#btn_close_detail').show();
				$('#btn_detail').hide();

			});


			$('#btn_close_detail').click(function() {
				$('#tbl_not_found_1').hide();
				$('#tbl_not_found_2').hide();
				$('#btn_close_detail').hide();
				$('#btn_detail').show();

			});
		});
	</script>


</body>

</html>