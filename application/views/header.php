<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html lang="en">
	<head>
		<title>Magister Matematika Universitas Diponegoro</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.css" type="text/css" media="screen" />-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.min.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="screen" />
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/jquery-1.11.2.min.js"></script>  
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.js"></script>
		<!--<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.js"></script>-->
	</head>
	<body>
		<div id="main_wrapper">
			<!--<div id="wrapper">-->
				<div id="header">
					<div id="logo">
						<img id="img_logo" src="<?php echo base_url();?>assets/images/logo.png" alt="logo" title="Program Magister Matematika Universitas Diponegoro"/>
					</div><!--end of logo-->
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
							<li><a href="<?php echo site_url();?>">Beranda</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profil <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo site_url('page/latar_belakang');?>">Latar Belakang</a></li>
								<li><a href="<?php echo site_url('page/visi_misi');?>">Visi dan Misi</a></li>
								<li><a href="<?php echo site_url('page/tujuan');?>">Tujuan</a></li>
								<li><a href="<?php echo site_url('page/staff');?>">Staff</a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Akademik <span class="caret"></span></a>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo site_url('page/kurikulum');?>">Kurikulum</a></li>
							  </ul>
							</li>
							<li><a href="<?php echo site_url('page/sarana');?>">Fasilitas</a></li>
                                                        <li><a href="<?php echo site_url('download');?>">Download Area</a></li>
						  </ul>
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>