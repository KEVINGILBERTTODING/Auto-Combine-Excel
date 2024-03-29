<aside class="sidenav sidenavbar bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href="<?php echo base_url('dashboard') ?>">
			<img src="<?php echo base_url(); ?>assets/img/xls.png" class="navbar-brand-img h-100" alt="main_logo">
			<span class="ms-1 font-weight-bold">ACE v1.2.0</span>
		</a>
	</div>
	<hr class="horizontal dark mt-0">
	<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder">Main Page</h6>
			</li>

			<li class="nav-item ">
				<a class="nav-link  <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>" href="<?php echo site_url('dashboard') ?>">
					<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa fa-tv text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Dashboard</span>
				</a>
			</li>

			<li class="nav-item  ">
				<a class="nav-link <?php echo $this->uri->segment(2) == 'insert_data' ? 'active' : '' ?> " href="<?php echo site_url('ExcelJoin/insert_data') ?>">
					<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa fa-upload text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Combine Excel</span>
				</a>
			</li>

			<li class="nav-item  ">
				<a class="nav-link <?php echo $this->uri->segment(2) == 'introduction' ? 'active' : '' ?> " href="<?php echo site_url('ExcelJoin/introduction') ?>">
					<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa fa-book text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Introductions</span>
				</a>
			</li>



			<li class="nav-item  ">
				<a class="nav-link <?php echo $this->uri->segment(2) == 'instructions' ? 'active' : '' ?> " href="<?php echo site_url('ExcelJoin/instructions') ?>">
					<div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa fa-book text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Instructions</span>
				</a>
			</li>

		</ul>
	</div>
	</div>
</aside>