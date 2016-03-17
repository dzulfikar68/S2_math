						<div id="page_title" class="col-md-12">
							<h1>Manajer Tautan</h1>
						</div>
						<div id="button" class=col-md-12>
								<a class="btn btn-primary" href="c_add_tautan" role="button">Tambah Tautan</a>
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
									<th>Nama</th>
									<th>Link</th>
									<th>Prioritas</th>
									<th>Tampil</th>
								
								</thead>
								<?php
								
								$no=1;

								foreach($data_tautan as $tautan){
									$id = $tautan['id_tautan'];
									$url = site_url('admin/c_tautan/c_delete_tautan');
									if($tautan['tampil_tautan'] == 1){
										$tampil = 'Ya';
									}else{
										$tampil = 'Tidak';
									}

									echo 
									'<tr>
										<td>'.$no.'</td>
										<td><div class="item">'.$tautan['nama_tautan'].'</div><span class="action"><a href='.site_url('admin/c_tautan/c_edit_tautan/'.$id.'').'>Ubah</a> | <a href=# onclick="return delete_data('.$id.',\''.$url.'\')" class="delete">Hapus</a></span></td>
										<td>'.$tautan['link_tautan'].'</td>
										<td>'.$tautan['prioritas'].'</td>
										<td>'.$tampil.'</td>
										

									</tr>';
									
									$no++;

								}
								?>

							</table>
							<?php
								if($data_tautan==null){
									echo '<p  align="center">Data kosong<p>';
								}
							?>

						</div>
						<div id="footer_content">
							
						</div>
			