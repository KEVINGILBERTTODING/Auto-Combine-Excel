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
							<h3 id="h1" class="text-primary">Introductions</h3>
						</div>
						<div class="container-md containerku">
							<div class="div">
								<h5 class="font-weight-bold text-primary">Story of ACE</h5>
								<span class="text-secondary text-sm">[11/02/2023]</span>
								<p class="text-secondary text-justify MT-2">"My name is Kevin Gilbert Toding and I am
									a computer science student at Dian Nuswantoro University in Semarang, Indonesia.
									During my internship at one of the largest insurance companies in Indonesia, I was tasked with many manual data comparison tasks that could have been completed much faster with technology. One such task was comparing data from hundreds of rows in multiple Excel tables, which was time-consuming.
									I struggled with this task due to my need to prepare for my internship report exams and present it to my examiner. It would take me anywhere from 3-4 hours just to match the data.

									This experience inspired me to create a website that would alleviate this burden. The website, ACE (Auto Combine Excel), allows users to simply upload their Excel files, and the system will automatically compare and group the data, identifying which data has a relationship and which does not.
									This solution has the potential to save hours of time and effort compared to manual data comparison methods."</p>
							</div>


							<div class="div">
								<h5 class="font-weight-bold text-primary">What's ACE?</h5>
								<p class="text-secondary text-justify">
									"Welcome to ACE, where data merging has never been easier.
									No longer will you have to spend time and effort using vlookup and hlookup formulas
									to merge your data. We offer a fast, accurate, and user-friendly auto merge solution.
									Simply upload your Excel files and let us handle the hard work for you. Get the right merged data
									results, ready to use in just minutes. Try it now and feel the difference!"
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