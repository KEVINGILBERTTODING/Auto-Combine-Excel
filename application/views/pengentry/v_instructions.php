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
							<h3 id="h1" class="text-primary">Instructions</h3>
						</div>
						<div class="container-md containerku">
							<div class="div">
								<h5 class="font-weight-bold text-primary">Excel File Requirements</h5>
								<p class="text-secondary text-justify MT-2">
									Here are some of the requirements that are needed for a successful join of Excel tables:
								</p>
								<ul>
									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Data format consistency</strong> - The columns in both tables should have the same data format, such as date, text, or number.
										</p>
									</li>
									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Unique identifier:</strong> - Both tables should contain a common column, such as a primary key or an ID number, that can be used to join the tables together.
										</p>
									</li>

									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Column header:</strong> - Both tables should has a column header at the top of the table or in the first row.
										</p>
									</li>

									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Data type compatibility</strong> - The data types of the columns being joined should be compatible. For example, you cannot join a text column with a numeric column.
										</p>
									</li>

									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Data quality</strong> - The data in both tables should be accurate and free of errors, such as duplicates or missing values.
										</p>
									</li>

									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Software compatibility</strong> - The software being used to join the tables should be compatible with the format and size of the Excel files.
										</p>
									</li>
								</ul>
								<p class="text-secondary text-justify MT-2">
									By ensuring these requirements are met, the process of joining Excel tables should be successful and the resulting joined table should accurately reflect the data.
								</p>
							</div>


							<div class="div">
								<h5 class="font-weight-bold text-primary">How to Join Excel Tables</h5>
								<p class="text-secondary text-justify MT-2">
									Here are some of the ways to join tables in Excel using ACE:
								</p>
								<ul>
									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Specify the primary key</strong> - To join two tables, you need to specify the primary key of both tables. To do this, open your excel file and count the number of coloumn in the first table. Then input the number of coloumn in the <strong class="text-primary">Primary Key</strong> field. Here is an example:
										</p>
										<img src="<?= base_url('assets/img/example_tbl_1.png'); ?>" alt="Example count row" class="img-fluid">
										<p>
											<strong class="text-primary">Note:</strong> The primary key is the column that contains the unique identifier for each row in the table. In this example, the primary key is the <strong class="text-primary">No Pemesanan</strong> which mean located in the <strong class="text-primary">first column</strong>.
										</p>
									</li>
									<li>
										<p class="text-secondary text-justify MT-2">
											<strong class="text-primary">Joining two tables</strong> - To join two tables, you need to select the both tables and click the <strong class="text-primary">Join</strong> button. Here is an example:
										</p>
										<img src="<?= base_url('assets/img/example_tbl_2.png'); ?>" alt="Example join table" class="img-fluid w-75">

									</li>
									<li>
										<p class="text-secondary text-justify mt-4">
											<strong class="text-primary">Result</strong> - Congratulations! You have successfully joined two tables. Here is the result:
										</p>
										<img src="<?= base_url('assets/img/example_tbl_3.png'); ?>" alt="Example join table" class="img-fluid w-75">

										<p class="text-secondary text-justify mt-4">
											You can also view the details of which data does not have a relationship by clicking the <strong class="text-primary">View Details</strong> button. Here is the result:
										</p>
										<img src="<?= base_url('assets/img/example_tbl_4.png'); ?>" alt="Example join table" class="img-fluid w-75">
									</li>
								</ul>
							</div>



						</div>
					</div>
				</div>

				<div id="footer">
					<?php $this->load->view('pengentry/_partials/footer') ?>
				</div>
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

</body>

</html>