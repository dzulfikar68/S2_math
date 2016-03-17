				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/link_manager.png"></img>
							</td>
							<td>
								<h1>Tautan Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1><?php echo $title;?></h1></center>
					<div id="form">
					<?php if(!isset($data_tautan)){
						$action='c_add_tautan';
					}else{
						$action='c_edit_tautan/'.$data_tautan['id_tautan'];
					} 
					
					?>
				
					<?php echo form_open('admin/c_tautan/'.$action.''); ?>
							<table>
								<tr>
									<td>
										<div>
											<label for="nama_tautan" class="col-sm-2 control-label">Nama Tautan</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="nama_tautan" name="nama_tautan" value="<?php if(isset($data_tautan)){echo $data_tautan['nama_tautan'];} ?>" required />
										 </div>
										 <div class="error"><?php echo form_error('nama_tautan'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div>
											<label for="username" class="col-sm-2 control-label">Link</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="link_tautan" name="link_tautan" value="<?php if(isset($data_tautan)){echo $data_tautan['link_tautan'];} ?>" required />
										 </div>
										 <div class="error"><?php echo form_error('link_tautan'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div>
											<label for="tampil_tautan" class="col-sm-2 control-label">Tampilkan</label>
										</div>
									</td>
									<td>
										<div class="radio">
											<label class="radio-inline">
											  <input type="radio" name="tampil_tautan" id="tampil_tautan" value="0" <?php if(isset($data_tautan)){if($data_tautan['tampil_tautan']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_tautan" id="tampil_tautan" value="1" <?php if(isset($data_tautan)){if($data_tautan['tampil_tautan']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										 </div>
										 <div class="error"><?php echo form_error('tampil_tautan'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div>
											<label for="prioritas" class="col-sm-2 control-label">Prioritas</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php if(isset($data_tautan)){echo $data_tautan['prioritas'];} ?>" required />
										 </div>
										 <?php echo form_error('prioritas'); ?>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="right"><button type="submit" class="btn btn-default"><?php if(isset($data_tautan)){echo 'Update';}else{echo 'Tambah';} ?></button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_tautan/show_tautan')?>";
									}
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>