<html>
	<head>
		<title>Administrator</title>
		<!--<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.css">-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.min.css">
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/jquery-1.11.2.min.js"></script>  
		<!--<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.js"></script>-->
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin/js/fungsi.js"></script>		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/style.css"></link>
		
		
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<?php 
					$data['session'] = $this->session->all_userdata();
					$this->load->view('admin/header',$data);?>
			<div id="content">
				<?php $this->load->view('admin/'.$page);?>
			</div>
			<div id="footer">
				<?php $this->load->view('admin/footer');?>
			</div>
		</div>
	</body>
</html>