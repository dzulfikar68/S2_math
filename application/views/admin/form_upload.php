						<?php if(!isset($data_file)){
							$action='c_add_file';
							$title = 'Tambah Berkas';
							}else{
							$action='c_edit_file/'.$data_file['id_file'];
							$title = 'Ubah Berkas';} 
						?>

						<div id="page_title" class="col-md-12">
							<h1><?php echo $title;?></h1>
						</div>
						
						<div id="page_content" class="container-fluid">	
							<?php $attributes=array('class'=>'form-horizontal');echo form_open_multipart('admin/c_upload/'.$action.'',$attributes); ?>
							
								<div id="form" class="row">
									<div class="form-group">
										<label for="nama_file" class="col-sm-2 control-label">Nama File*</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nama_file" name="nama_file" value="<?php if(isset($data_file)){echo $data_file['judul_file'];} ?>" required placeholder="maks 100 karakter"/>
											 <div class="error"><?php echo form_error('nama_file'); ?></div>
										</div>
									</div>
				
									<div class="form-group">
										<label for="tampil_file" class="col-sm-2 control-label">Tampilkan</label>
										<div class="col-sm-4">
											<label class="radio-inline">
											  <input type="radio" name="tampil_file" id="tampil_file" value="0" <?php if(isset($data_file)){if($data_file['tampil_file']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_file" id="tampil_file" value="1" <?php if(isset($data_file)){if($data_file['tampil_file']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										</div>
									</div>
									
									<div class="form-group">
										<label for="prioritas" class="col-sm-2 control-label">Prioritas*</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php if(isset($data_file)){echo $data_file['prioritas'];} ?>" required />
											<div class="error"><?php echo form_error('prioritas'); ?></div>
										</div>
									</div>
									
									<?php
									if(!isset($data_file)){
										echo '
											<div class="form-group">
												<label for="input_file" class="col-sm-2 control-label">Input File</label>
												<div class="col-sm-4">
													<div class="col-sm-9"id="input"><input id="upload_file" placeholder=".pdf maks 2MB" class="form-control" readonly="disabled" /></div>
													<div class="file_upload btn btn-primary">
														<span>Upload</span>
														<input type="file" class="upload" name="input_file" id="input_file" required/>
													</div>
													
													Maks 2MB (.pdf)
													<div class="error">'.$error.'</div>
												</div>
											</div>';
									}else{
										echo '
											<div class="form-group">
												<label for="file" class="col-sm-2 control-label">File</label>
												<div class="col-sm-4">
													'.$data_file['nama_file'].'
													</div>
											</div>';
									}
								?>
									
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-4">
											<button type="submit" class="btn btn-primary"><?php if(isset($data_file)){echo 'Simpan';}else{echo 'Tambah';} ?></button>
											<button type="button" class="btn btn-primary" onclick="back()">Kembali</button>
										</div>
									</div>
								</div>
							<?php echo form_close(); ?>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_upload/show_file')?>";
									}
									
									
									$('#input_file').on('change', function(){
                var file = $(this)[0].files[0];
                if(file != undefined){
                    $('#upload_file').val(file.name);
                }else{
                    $('#upload_file').val('');
                }
            });
								</script>
						</div>

