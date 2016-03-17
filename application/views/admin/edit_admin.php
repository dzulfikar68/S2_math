				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/user_manager.png"></img>
							</td>
							<td>
								<h1>User Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1>TAMBAH ADMIN</h1></center>
					<div id="form">
							
					<?php echo form_open('admin/c_admin/c_edit_admin'); ?>
							<table>
								<tr>
									<td>
										<div class="form-group">
											<label for="nama_admin">Nama</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php echo set_value('nama_admin'); ?>" required />
										 </div>
										 <?php echo form_error('nama_admin'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="username">Username</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" required />
										 </div>
										 <?php echo form_error('username'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="password">Password</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="password" class="form-control" id="password" name="password" required />
										 </div>
										 <?php echo form_error('password'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="re_password">Ulangi Password</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="password" class="form-control" id="re_password" name="re_password" required />
										 </div>
										 <?php echo form_error('re_password'); ?>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right"><button type="submit" class="btn btn-default">Update</button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
								<script>
									function back(){
										 document.location.href ="show_admin";
									}
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>