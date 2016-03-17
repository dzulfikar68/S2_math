<html>
	<head>
		<title>Administrator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css" type="text/css" media="screen" />
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/jquery-1.11.2.min.js"></script>
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.js"></script>  
		<script src="<?php echo base_url();?>assets/chart/Chart.js"></script>  
		<script src="<?php echo base_url();?>assets/admin/js/fungsi.js"></script> 
		
	</head>
	<body>
		<div class="container-fluid">
			<div id="header" class="row">
				<div id="navbar" class="col-md-12">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<a class="navbar-brand" target="_blank" href="<?php echo site_url();?>/c_site">Magister Matematika</a>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
									<li><a target="_blank" href="<?php echo site_url();?>/c_site">Lihat Web</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hi, <?php echo $this->session->userdata('username');?> <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											<li><a href="<?php echo site_url('admin/c_auth/logout')?>">Keluar</a></li>
										</ul>
									</li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
			</div><!-- /end of header -->
			<div id="content" class="row">
				<div id="content_left" class="col-md-2">
					<div id="menu_left">
						<ul class="nav nav-stacked">
							<!--<li role="presentation">Star<a href="<?php //echo site_url('admin/c_auth/home_admin');?>"><h3>Dashboard</h3></a></li>-->
							<li role="presentation"><a href="<?php echo site_url('admin/c_artikel/show_artikel');?>">Artikel</a></li>
							<li role="presentation"><a href="<?php echo site_url('admin/c_tautan/show_tautan');?>">Tautan</a></li>
							<li role="presentation"><a href="<?php echo site_url('admin/c_upload/show_file');?>">Berkas</a></li>
							<li role="presentation"><a href="<?php echo site_url('admin/c_admin/show_admin');?>">Admin</a></li>
							<!--<li role="presentation"><a href="<?php //echo site_url('admin/c_slider/show_slider');?>">Slider</a></li>-->
						</ul>
					</div>
				</div>
				<div id="content_right" class="col-md-10">
					<div id="page" class="row">