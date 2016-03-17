				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/user_manager.png"></img>
							</td>
							<td>
								<h1>Admin Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1><?php echo $title;?></h1></center>
					<div id="form">
					<?php if(!isset($data_admin)){$action='c_add_admin';}else{$action='c_edit_admin/'.$data_admin['id_admin'];} ?>
				
					<?php echo form_open('admin/c_admin/'.$action.''); ?>
							<table>
								<tr>
									<td>
										<div class="form-group">
											<label for="nama_admin">Nama</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php if(isset($data_admin)){echo $data_admin['nama_admin'];} ?>" required />
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
											<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($data_admin)){echo $data_admin['username'];} ?>" required />
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
									<td colspan="2" align="right"><button type="submit" class="btn btn-default"><?php if(isset($data_admin)){echo 'Update';}else{echo 'Tambah';} ?></button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/C_Admin/show_admin')?>";
									}
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>