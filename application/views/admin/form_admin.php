						<?php if(!isset($data_admin)){
							$action='c_add_admin';
							$title='Tambah Admin';
						}else{
							$action='c_edit_admin/'.$data_admin['id_admin'];
							$title='Ubah Admin';
						} 
						?>

						<div id="page_title" class="col-md-12">
							<h1><?php echo $title;?></h1>
						</div>
						
						<div id="page_content" class="container-fluid">	
							<?php $attributes=array('class'=>'form-horizontal');echo form_open('admin/c_admin/'.$action.'',$attributes); ?>
								<div id="form" class="row">
									<div class="form-group">
										<label for="nama_admin" class="col-sm-2 control-label">Nama Admin</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?php if(isset($data_admin)){echo $data_admin['nama_admin'];} ?>" required />
											 <div class="error"><?php echo form_error('nama_admin'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="username" class="col-sm-2 control-label">Username</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="username" name="username" value="<?php if(isset($data_admin)){echo $data_admin['username'];} ?>" required />
											 <div class="error"><?php echo form_error('username'); ?></div>
										</div>
									</div>
												
									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="password" name="password" required />
											 <div class="error"><?php echo form_error('password'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="re_password" class="col-sm-2 control-label">Konfirmasi Password</label>
										<div class="col-sm-4">
											<input type="password" class="form-control" id="re_password" name="re_password" required />
											 <div class="error"><?php echo form_error('re_password'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-4">
											<button type="submit" class="btn btn-primary"><?php if(isset($data_admin)){echo 'Simpan';}else{echo 'Tambah';} ?></button>
											<button type="button" class="btn btn-primary" onclick="back()">Kembali</button>
										</div>
									</div>
								</div>
							<?php echo form_close(); ?>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/C_Admin/show_admin')?>";
									}
								</script>
						</div>

