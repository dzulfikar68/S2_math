				<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.cleditor.css" />
				<script type="text/javascript" src="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url();?>assets/CLEditor1_4_5/jquery.cleditor.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function () { $("#input").cleditor(); });
				</script>
				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/article_manager.png"></img>
							</td>
							<td>
								<h1>Artikel Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1><?php echo $title;?></h1></center>
					<div id="form">
					<?php if(!isset($data_artikel)){
						$action='c_add_artikel';
					}else{
						$action='c_edit_artikel/'.$data_artikel['id_artikel'];
					} 
					
					?>
				
					<?php echo form_open('admin/c_artikel/'.$action.''); ?>
							<table>
								<tr>
									<td>
										<div class="form-group">
											<label for="judul">Judul Artikel</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="judul" name="judul" placeholder="maks 100 karaker" value="<?php if(isset($data_artikel)){echo $data_artikel['judul_artikel'];} ?>" required />
										 </div>
										 <?php echo form_error('judul'); ?>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="tampil_tautan">Tampilkan</label>
										</div>
									</td>
									<td>
										<div class="radio">
											<label class="radio-inline">
											  <input type="radio" name="tampil_artikel" id="tampil_artikel" value="0" <?php if(isset($data_artikel)){if($data_artikel['tampil_artikel']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_artikel" id="tampil_artikel" value="1" <?php if(isset($data_artikel)){if($data_artikel['tampil_artikel']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										 </div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="kategori">Kategori</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<select class="form_control" name="kategori" id="kategori">
												<option value="1" <?php if(isset($data_artikel)){if($data_artikel['id_kategori']==1) echo 'selected';}else{echo 'selected';}?>>Akademik</option>
												<option value="2" <?php if(isset($data_artikel)){if($data_artikel['id_kategori']==2) echo 'selected';}?>>Non Akademik</option>
											</select>
										 </div>
									</td>
								</tr>
							</table>
							<table>
								<tr>
									<td>
										<textarea id="input" name="isi_artikel"><?php if(isset($data_artikel)){echo $data_artikel['isi_artikel'];} ?></textarea>
										<?php echo form_error('isi_artikel'); ?>
									</td>
								</tr>
							</table>
							<table>
								<tr>
									<td colspan="2" align="right"><button type="submit" class="btn btn-default"><?php if(isset($data_artikel)){echo 'Update';}else{echo 'Tambah';} ?></button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
							</table>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_artikel/show_artikel')?>";
									}
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>