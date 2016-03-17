<html>
	<head>
		<title>Administrator</title>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/css/bootstrap.css">  
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/jquery-1.11.2.min.js"></script>  
		<script src="<?php echo base_url();?>assets/bootstrap-3.3.2-dist/js/bootstrap.js"></script> 
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/style2.css"></link>
		
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,400italic' rel='stylesheet' type='text/css'>
	</head>
	<body>
			<div id="header">
			<!--
				<div id="title_header">
					<h1>Administrator</h1>
				</div>-->
			</div>
			<div id="content">
				<div id="login_wrapper">
					<div id="login">
						<div id="header_login">
							<h1>Login</h1>
						</div>
						<div id="content_login">
							<div id="img_login">
								<img src="<?php echo base_url();?>assets/admin/images/login.png"/>
							</div>
							<div id="form_login">
								<form Method="POST" action="<?php echo site_url('admin/c_auth/login');?>">
								<?php
									if (isset($error)){
										echo $error;
									}
								?>
									<table>
										<tr>
											<td>
												<div class="form-group">
													<label for="username">Username</label>
												 </div>
											</td>
											<td>
												<div class="form-group">
													<input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
												 </div>
												 <?php echo form_error('username'); ?>
											</td>
										</tr>
										<tr>
											<td>
												<div class="form-group">
													<label for="username">Password</label>
												 </div>
											</td>
											<td>
												<div class="form-group">
													<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
												</div>
												<?php echo form_error('password'); ?>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="right"><button type="submit" class="btn btn-primary">Submit</button></td>
										</tr>
									</table>
								</form>
							</div>
							<div style="clear:both;">
							</div>
						</div>
						<div id="footer_login">
							<a href="#">Magister Matematika</a>
						</div>
					</div>
				</div>
			</div>
			<div id="footer">
				&copy Magister Matematika FSM - UNDIP 2015
			</div>
	</body>
</html>