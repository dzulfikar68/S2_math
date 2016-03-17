						<div id="page_title" class="col-md-12">
							<h1>Manajer Berkas</h1>
						</div>
						<div id="button" class=col-md-12>
								<a class="btn btn-primary" href="c_add_file" role="button">Tambah Berkas</a>
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
									<th>Nama File</th>
									<th>Tampil</th>
									<th>Prioritas</th>
									<th>Hits</th>
									<th>Tgl Insert</th>
									<th>Tgl Update</th>
								</thead>
								<?php
								$no=1;

								foreach($data_file as $file){
									$nama_file = $file['nama_file'];
									$url = site_url('admin/c_upload/c_delete_file');
									if($file['tampil_file'] == 1){
										$tampil = 'Ya';
									}else{
										$tampil = 'Tidak';
									}

									echo 
									'<tr>
										<td>'.$no.'</td>
										<td><div class="item">'.$file['judul_file'].'</div><span class="action"><a target=_blank href='.site_url('assets/uploads/'.$nama_file.'').'>Pratinjau</a> | <a href='.site_url('admin/c_upload/c_edit_file/'.$file['id_file'].'').'>Ubah</a> | <a href=# onclick="return delete_data(\''.$nama_file.'\',\''.$url.'\')" class="delete">Hapus</a></span></td>
										<td>'.$tampil.'</td>
										<td>'.$file['prioritas'].'</td>
										<td>'.$file['hits'].'</td>
										<td>'.$file['tgl_insert_file'].'</td>
										<td>'.$file['tgl_update_file'].'</td>					
										
									</tr>';
									$no++;
								}


								?>

							</table>
							<?php
								if($data_file==null){
									echo '<p  align="center">Data kosong<p>';
								}
							?>

						</div>
						<div id="footer_content">
							<ul class="pagination">
								<?php
									foreach($links as $link){
										echo '<li>'.$link.'</li>';
									}
								?>
							</ul>
						</div>
						
			

