				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/upload.png"></img>
							</td>
							<td>
								<h1>File Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1><?php echo $title;?></h1></center>
					<div id="form">
					<?php if(!isset($data_file)){$action='c_add_file';}else{$action='c_edit_file/'.$data_file['id_file'];} ?>
				
					<?php echo form_open_multipart('admin/c_upload/'.$action.''); ?>
							<table>
								<tr>
									<td>
										<div class="form-group">
											<label for="nama_file">Nama File</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="nama_file" name="nama_file" value="<?php if(isset($data_file)){echo $data_file['judul_file'];} ?>" required placeholder="maks 100 karakter"/>
										 </div>
										<div class="error"> <?php echo form_error('nama_file'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div>
											<label for="tampil_file" class="col-sm-2 control-label">Tampilkan</label>
										</div>
									</td>
									<td>
										<div class="radio">
											<label class="radio-inline">
											  <input type="radio" name="tampil_file" id="tampil_file" value="0" <?php if(isset($data_file)){if($data_file['tampil_file']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_file" id="tampil_file" value="1" <?php if(isset($data_file)){if($data_file['tampil_file']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										 </div>
										 <div class="error"><?php echo form_error('tampil_file'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="prioritas">Prioritas</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php if(isset($data_file)){echo $data_file['prioritas'];} ?>" required />
										 </div>
										<div class="error"> <?php echo form_error('prioritas'); ?></div>
									</td>
								</tr>
								<?php
									if(!isset($data_file)){
										echo '
										<tr>
											<td>
												<div class="form-group">
													<label for="input_file">Input File</label>
												</div>
											</td>
											<td>
												<div class="form-group">
													<input type="file" id="input_file" name="input_file" required />
													Maks 2MB (.pdf)
												 </div>
												  <div class="error">'.$error.'</div>
											</td>
										</tr>';
									}else{
										echo '
										<tr>
											<td>
												<div class="form-group">
													<label for="input_file">Nama File</label>
												</div>
											</td>
											<td>
												<div class="form-group">
													'.$data_file['nama_file'].'
												 </div>
											</td>
										</tr>';
									}
								?>
								
								<tr>
									<td colspan="2" align="right"><button type="submit" class="btn btn-default"><?php if(isset($data_file)){echo 'Update';}else{echo 'Tambah';} ?></button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_upload/show_file')?>";
									}
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>