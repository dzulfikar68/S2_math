						<div id="page_title" class="col-md-12">
							<h1>Slider Manajer</h1>
						</div>
						<div id="button" class=col-md-12>
								<a class="btn btn-primary" href="c_add_slider" role="button">Tambah Slider</a>
						</div>
						<div class=col-md-12>
						<?php if($message!=''){
							echo '<div class="alert alert-success">'.$message.'</div>';
						}?>
						</div>
						<div id="page_content" class="container-fluid">	
							<table class="table table-bordered table-hover">
								<thead>
									<th>No</th>
									<th>Label Slider</th>
									<th>Tampil</th>
									<th>Prioritas</th>
								</thead>
								<?php
								$no=1;

								foreach($data_slider as $slider){
									$nama_slider = $slider['nama_media'];
									$url = site_url('admin/c_slider/c_delete_slider');
									if($slider['tampil_media'] == 1){
										$tampil = 'Ya';
									}else{
										$tampil = 'Tidak';
									}

									echo 
									'<tr>
										<td>'.$no.'</td>
										<td><div class="item">'.$slider['label'].'</div><span class="action"><a data-toggle="modal" data-target="#myModal" data-image='.base_url('assets/images/slider/'.$slider['nama_media'].'').' data-title="'.$slider['label'].'" href="#" class="preview">Preview</a> <a href='.site_url('admin/c_slider/c_edit_slider/'.$slider['id_media'].'').'>Edit</a> <a href=# onclick="return delete_data(\''.$nama_slider.'\',\''.$url.'\')">Hapus</a></span></td>
										<td>'.$tampil.'</td>
										<td>'.$slider['prioritas'].'</td>					
									</tr>';
									$no++;
								}


								?>

							</table>

						</div>
						<div id="footer_content">
							<ul class="pagination">
								<!--<'?php
									foreach($links as $link){
										echo '<li>'.$link.'</li>';
									}
								?>-->
							</ul>
						</div>
						
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel"></h4>
									</div>
									<div class="modal-body">
										<img src="" class="image" width="800px"></img>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div>
								</div>
							</div>
						</div>

						<script>
							$(document).on("click", ".preview", function () {
								 var images = $(this).data('image');
								var title = $(this).data('title');
								 $(".modal-body .image").attr('src', images);
								 $('.modal-title').text(title);
								 // As pointed out in comments, 
								 // it is superfluous to have to manually call the modal.
								 // $('#addBookDialog').modal('show');
						});
							
						</script>
			

