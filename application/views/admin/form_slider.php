					<script src="<?php echo base_url('assets/crop/dist/jquery.cropit.js');?>"></script>	
					<?php if(!isset($data_slider)){
							$action='c_add_slider';
							$title = 'Tambah Slider';
						}else{
							$action='c_edit_slider/'.$data_slider['id_media'];
							$title = 'Edit Slider';

						} 

						?>
						<div id="page_title" class="col-md-12">
							<h1><?php echo $title;?></h1>
						</div>
						<div class=col-md-12>
							<?php if($message!=''){
								echo '<div class="alert alert-success">'.$message.'</div>';
							}?>
						</div>
						<div id="page_content" class="container-fluid">	
							<?php $attributes=array('class'=>'form-horizontal');echo form_open_multipart('admin/c_slider/'.$action.'',$attributes); ?>
							
								<div id="form" class="row">
									<div class="form-group">
										<label for="nama_file" class="col-sm-2 control-label">Label Slider</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="label_slider" name="label_slider" value="<?php if(isset($data_slider)){echo $data_slider['label'];} ?>" required placeholder="maks 100 karakter"/>
											 <div class="error"><?php echo form_error('label_slider'); ?></div>
										</div>
									</div>
				
									<div class="form-group">
										<label for="tampil_file" class="col-sm-2 control-label">Tampilkan</label>
										<div class="col-sm-4">
											<label class="radio-inline">
											  <input type="radio" name="tampil_slider" id="tampil_slider" value="0" <?php if(isset($data_slider)){if($data_slider['tampil_slider']==0) echo 'checked';}?>> Tidak
											</label>
											<label class="radio-inline">
											  <input type="radio" name="tampil_slider" id="tampil_slider" value="1" <?php if(isset($data_slider)){if($data_slider['tampil_slider']==1) echo 'checked';}else{echo 'checked';}?>> Ya
											</label>
										</div>
									</div>
									
									<div class="form-group">
										<label for="prioritas" class="col-sm-2 control-label">Prioritas</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php if(isset($data_slider)){echo $data_slider['prioritas'];} ?>" required />
											<div class="error"><?php echo form_error('prioritas'); ?></div>
										</div>
									</div>
									
									<?php
									if(!isset($data_slider)){
										echo '
											<div class="form-group">
												<label for="input_slider" class="col-sm-2 control-label">Input File</label>
												<div class="col-sm-4">
													<a href="" class="btn btn-primary" id="upload" data-toggle="modal" data-target="#myModal" >Upload</a>
													<div id="image" class="col-md-12">
														<img src="" id="gambar"/>
													</div>
													<div class="error">'.$error.'</div>
												</div>
											</div>';
									}else{
										echo '
											<div class="form-group">
												<label for="input_slider" class="col-sm-2 control-label">File</label>
												<div class="col-sm-4">
													'.$data_slider['nama_media'].'
													</div>
											</div>';
									}
								?>
									
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-4">
											<button type="submit" class="btn btn-primary"><?php if(isset($data_slider)){echo 'Update';}else{echo 'Tambah';} ?></button>
											<button type="button" class="btn btn-primary" onclick="back()">Kembali</button>
										</div>
									</div>
								</div>
								
								
							<?php echo form_close(); ?>
								
						</div>
							<!--modal upload-->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Upload Gambar Slider</h4>
											</div>
											<div class="modal-body">
													<div class="image-editor">
														<input type="file" class="cropit-image-input">
														<!-- .cropit-image-preview-container is needed for background image to work -->
														<div class="cropit-image-preview-container">
															<div class="cropit-image-preview"></div>
														</div>
														<div class="image-size-label">
															Resize image
														</div>
														<input type="range" class="cropit-image-zoom-input">
														<button id="export" class="btn btn-primary" data-dismiss="modal">Export</button>
													</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>

								<script>
									
								
									function back(){
										 document.location.href ="<?php echo site_url('admin/c_slider/show_slider')?>";
									}
									
									$(document).ready(function(){
										
										$('#image').hide();
									});
									
									$('.cropit-image-input').bind('change', function() {
										//this.files[0].size gets the size of your file.
										
										if(this.files[0].size < 1024*1024*2){
											alert('ukuran minimum 2Mb');
											this.value = null;
										}
										
									});
									
									$(function() {
										$('.image-editor').cropit({
											exportZoom: 1.25,
											imageBackground: true,
											imageBackgroundBorderWidth: 20,
										
										});

										$('#export').click(function() {
											var imageData = $('.image-editor').cropit('export');
											$.ajax({
												type: "POST",
												dataType: "html",
												url: "<?php echo site_url('admin/c_slider/c_upload_slider');?>",
												data: {value:imageData},
												success: function(msg){	
													if(msg='sukses'){
														var url = '<?php echo base_url('assets/temp/temp_image.png');?>';														
														$('#image').show();
														$('#image img').attr('src', url+'?'+Math.random());
														$("#input_gambar").value = url;
													
													}else{
														alert('gagal upload');
													}
													
													//alert(msg);
												}
											});   
											return;
										});
									});
								</script>