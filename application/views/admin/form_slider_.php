
				<div id="header_content">
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>assets/admin/images/media.png"></img>
							</td>
							<td>
								<h1>Slider Manager</h1>
							</td>
						</tr>
					</table>
				</div>
				<div id="isi_content">
					<center><h1><?php echo $title;?></h1></center>
					<div id="form">
					<?php if(!isset($data_slider)){$action='c_add_slider';}else{$action='c_edit_slider/'.$data_slider['id_media'];} ?>
				
					<?php echo form_open_multipart('admin/c_slider/'.$action.''); ?>
							<table>
								<tr>
									<td>
										<div class="form-group">
											<label for="label_slider">Label Slider</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="text" class="form-control" id="label_slider" name="label_slider" value="<?php if(isset($data_slider)){echo $data_slider['label'];} ?>" required placeholder="maks 100 karakter"/>
										 </div>
										<div class="error"> <?php echo form_error('label_slider'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div>
											<label for="tampil_slider" class="col-sm-2 control-label">Tampilkan</label>
										</div>
									</td>
									<td>
										<div class="radio">
											<label class="radio-inline">
											  <input type="radio" name="tampil_slider" id="tampil_slider" value="0" <?php if(isset($data_slider)){if($data_slider['tampil_slider']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_slider" id="tampil_slider" value="1" <?php if(isset($data_slider)){if($data_slider['tampil_slider']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										 </div>
										 <div class="error"><?php echo form_error('tampil_slider'); ?></div>
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
											<input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php if(isset($data_slider)){echo $data_slider['prioritas'];} ?>" required />
										 </div>
										<div class="error"> <?php echo form_error('prioritas'); ?></div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="form-group">
											<label for="input_slider">Input File</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<input type="file" id="input_slider" name="input_slider" required />
											File (.png|.jpg|.jpeg) Ukuran (lebar 1000-1300px tinggi 600px)
										 </div>
										  <div class="error"><?php echo $error; ?></div>
									</td>
								</tr>
								<!--
								<tr>
									<td>
										<div class="form-group">
											<label for="input_slider">Input Slider</label>
										</div>
									</td>
									<td>
										<div class="form-group">
											<div class="image-editor">
												<input type="file"  name="input_slider" class="cropit-image-input"  required />
												<div class="cropit-image-preview"></div>
												<div class="image-size-label">
												  Resize image
												</div>
												<input type="range" class="cropit-image-zoom-input" />
												
											</div>
											<input type="hidden" name="image-data" id="image-data" class="hidden-image-data" />
										</div>
										<div class="error"></div>
									</td>
								</tr>-->
								<tr>
									<td colspan="2" align="right"><button type="submit" class="btn btn-default"><?php if(isset($data_slider)){echo 'Update';}else{echo 'Tambah';} ?></button>
									<button type="button" class="btn btn-default" onclick="back()">Kembali</button></td>
								</tr>
								<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
								<script src="<?php echo base_url('assets/cropit-master/dist/jquery.cropit.js');?>"></script>
								<script>
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_slider/show_slider')?>";
									}
								</script>
								<script>
								  $(function() {
									/*$('.image-editor').cropit();

									$('form').submit(function() {
									  // Move cropped image data to hidden input
									  var imageData = $('.image-editor').cropit('export');
									  $('.hidden-image-data').val(imageData);

									  // Prevent the form from actually submitting
									  //return false;
									});
								  });*/
								</script>
							</table>
						<?php echo form_close(); ?>
					</div>
				</div>
				<div id="footer_content">
				
				</div>