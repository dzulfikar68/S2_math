						<?php if(!isset($data_tautan)){
							$action='c_add_tautan';
							$title = 'Tambah Tautan';
						}else{
							$action='c_edit_tautan/'.$data_tautan['id_tautan'];
							$title = 'Ubah Tautan';
						} 

						?>
						<div id="page_title" class="col-md-12">
							<h1><?php echo $title;?></h1>
						</div>
						
						<div id="page_content" class="container-fluid">	
							<?php $attributes=array('class'=>'form-horizontal');echo form_open('admin/c_tautan/'.$action.'',$attributes); ?>
								<div id="form" class="row">
									<div class="form-group">
										<label for="nama_tautan" class="col-sm-2 control-label">Nama Tautan*</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama_tautan" name="nama_tautan" placeholder="maksimum 50 karakter"value="<?php if(isset($data_tautan)){echo $data_tautan['nama_tautan'];} ?>" required />
											 <div class="error"><?php echo form_error('nama_tautan'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="link_tautan" class="col-sm-2 control-label">Link*</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="link_tautan" name="link_tautan" value="<?php if(isset($data_tautan)){echo $data_tautan['link_tautan'];} ?>" required />
											 <div class="error"><?php echo form_error('link_tautan'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="tampil_tautan" class="col-sm-2 control-label">Tampilkan</label>
										<div class="col-sm-4">
											<label class="radio-inline">
											  <input type="radio" name="tampil_tautan" id="tampil_tautan" value="0" <?php if(isset($data_tautan)){if($data_tautan['tampil_tautan']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_tautan" id="tampil_tautan" value="1" <?php if(isset($data_tautan)){if($data_tautan['tampil_tautan']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										</div>
									</div>
									
									<div class="form-group">
										<label for="prioritas" class="col-sm-2 control-label">Prioritas*</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="prioritas" name="prioritas" placeholder="bilangan bulat"value="<?php if(isset($data_tautan)){echo $data_tautan['prioritas'];} ?>" required />
											 <div class="error"><?php echo form_error('prioritas'); ?></div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-4">
											<button type="submit" class="btn btn-primary"><?php if(isset($data_tautan)){echo 'Simpan';}else{echo 'Tambah';} ?></button>
											<button type="button" class="btn btn-primary" onclick="back()">Kembali</button>
										</div>
									</div>
								</div>
							<?php echo form_close(); ?>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_tautan/show_tautan')?>";
									}
								</script>
						</div>

